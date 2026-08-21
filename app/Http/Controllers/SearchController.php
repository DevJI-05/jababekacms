<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Content;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SearchController extends Controller
{
    private const PER_PAGE = 9;

    /**
     * @var array<string, string>
     */
    private const PAGE_TYPES = [
        'all' => 'All',
        'article' => 'Article',
        'page' => 'Page',
    ];

    /**
     * Site-wide search across published articles and menu pages. Results
     * from every source are merged into one flat, clickable results list.
     */
    public function index(Request $request): View
    {
        $query = trim((string) $request->query('q', ''));
        $type = $request->query('type', 'all');

        if (! array_key_exists($type, self::PAGE_TYPES)) {
            $type = 'all';
        }

        $allResults = $query === ''
            ? collect()
            : $this->searchArticles($query)
                ->concat($this->searchMenus($query))
                ->concat($this->searchSubMenus($query))
                ->concat($this->searchContents($query))
                ->values();

        $filteredResults = $type === 'all'
            ? $allResults
            : $allResults->where('type_key', $type)->values();

        $page = max(1, $request->integer('page', 1));

        $results = new LengthAwarePaginator(
            $filteredResults->forPage($page, self::PER_PAGE)->values(),
            $filteredResults->count(),
            self::PER_PAGE,
            $page,
            ['path' => $request->url(), 'query' => $request->query()],
        );

        return view('pages.search', [
            'title' => __('Search results'),
            'query' => $query,
            'results' => $results,
            'pageTypes' => self::PAGE_TYPES,
            'selectedType' => $type,
        ]);
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    private function searchArticles(string $query): Collection
    {
        return Article::query()
            ->where('is_published', true)
            ->where(fn ($q) => $q
                ->where('title', 'like', "%{$query}%")
                ->orWhere('excerpt', 'like', "%{$query}%")
                ->orWhere('body', 'like', "%{$query}%"))
            ->latest('published_at')
            ->get()
            ->map(fn (Article $article) => [
                'type' => __('Article'),
                'type_key' => 'article',
                'title' => $article->title,
                'description' => Str::limit((string) $article->excerpt, 120),
                'image' => $article->imageUrl(),
                'href' => route('articles.show', $article->slug),
            ]);
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    private function searchMenus(string $query): Collection
    {
        return Menu::query()
            ->where('is_active', true)
            ->where(fn ($q) => $q
                ->where('label_en', 'like', "%{$query}%")
                ->orWhere('label_id', 'like', "%{$query}%")
                ->orWhere('description_en', 'like', "%{$query}%")
                ->orWhere('description_id', 'like', "%{$query}%"))
            ->get()
            ->map(fn (Menu $menu) => [
                'type' => __('Page'),
                'type_key' => 'page',
                'title' => $menu->label(),
                'description' => Str::limit((string) $menu->description(), 120),
                'image' => null,
                'href' => route('menu.show', $menu->slug),
            ]);
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    private function searchSubMenus(string $query): Collection
    {
        return SubMenu::query()
            ->where('is_active', true)
            ->whereHas('menu', fn ($q) => $q->where('is_active', true))
            ->where(fn ($q) => $q
                ->where('label', 'like', "%{$query}%")
                ->orWhere('description_en', 'like', "%{$query}%")
                ->orWhere('description_id', 'like', "%{$query}%"))
            ->with('menu')
            ->get()
            ->map(fn (SubMenu $subMenu) => [
                'type' => __('Page'),
                'type_key' => 'page',
                'title' => $subMenu->label,
                'description' => $this->excerptFromHtml($subMenu->description()),
                'image' => null,
                'href' => route('menu.section.show', [$subMenu->menu->slug, $subMenu->slug]),
            ]);
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    private function searchContents(string $query): Collection
    {
        return Content::query()
            ->where('is_active', true)
            ->whereHas('menu', fn ($q) => $q->where('is_active', true))
            ->where(fn ($q) => $q
                ->where('title', 'like', "%{$query}%")
                ->orWhere('description_en', 'like', "%{$query}%")
                ->orWhere('description_id', 'like', "%{$query}%")
                ->orWhere('body', 'like', "%{$query}%"))
            ->with(['menu', 'subMenu'])
            ->get()
            ->map(fn (Content $content) => [
                'type' => __('Page'),
                'type_key' => 'page',
                'title' => $content->title,
                'description' => $this->excerptFromHtml($content->description()),
                'image' => $content->imageUrl(),
                'href' => $content->subMenu
                    ? route('menu.content.show', [$content->menu->slug, $content->subMenu->slug, $content->slug])
                    : route('menu.section.show', [$content->menu->slug, $content->slug]),
            ]);
    }

    /**
     * Flatten HTML (from a WYSIWYG field) into a clean, single-line excerpt
     * instead of running words together across stripped tag boundaries.
     */
    private function excerptFromHtml(?string $html): string
    {
        $spaced = str_replace(['<', '>'], [' <', '> '], (string) $html);

        return Str::limit(Str::squish(strip_tags($spaced)), 120);
    }
}
