<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CarouselSetting;
use App\Models\FutureDevelopment;
use App\Models\HeroSlide;
use App\Models\HistoryEra;
use App\Models\SubMenu;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $slides = HeroSlide::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->map(fn (HeroSlide $slide) => [
                'title' => $slide->title,
                'description' => $slide->description,
                'cta' => $slide->cta_label,
                'href' => $slide->cta_url ?? '#',
                'image' => $slide->imageUrl(),
            ]);

        $carouselSettings = CarouselSetting::current();

        $events = Article::query()
            ->whereHas('category', fn ($query) => $query->where('slug', 'events'))
            ->where('is_published', true)
            ->orderBy('event_date')
            ->take(4)
            ->get();

        $news = Article::query()
            ->whereHas('category', fn ($query) => $query->where('slug', 'news'))
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->take(4)
            ->get();

        $highlights = $news->take(2)->map(fn (Article $article) => [
            'badge' => __('News'),
            'date' => $article->published_at?->format('d M Y'),
            'title' => $article->title,
            'image' => $article->imageUrl(),
            'href' => route('articles.show', $article->slug),
            'cta' => __('Read More'),
        ])->merge($events->take(2)->map(fn (Article $article) => [
            'badge' => __('Event'),
            'date' => $article->event_date?->format('d M Y'),
            'title' => $article->title,
            'image' => $article->imageUrl(),
            'href' => route('articles.show', $article->slug),
            'cta' => __('Register Now'),
        ]))->values();

        $activeTenants = Tenant::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $anchorTenants = $activeTenants->where('is_anchor', true)->values();

        $tenantCategories = $activeTenants->pluck('category')->filter()->unique()->values();

        $tenantTabs = $tenantCategories->mapWithKeys(fn (string $category) => [
            Str::slug($category) => [
                'label' => $category,
                'anchorItems' => $activeTenants
                    ->where('is_anchor', true)
                    ->where('category', $category)
                    ->take(6)
                    ->values(),
                'items' => $activeTenants
                    ->where('is_anchor', false)
                    ->where('category', $category)
                    ->take(6)
                    ->values(),
            ],
        ]);

        $historyEras = HistoryEra::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->with(['milestones' => fn ($query) => $query->where('is_active', true)->orderBy('sort_order')])
            ->get();

        $futureDevelopments = FutureDevelopment::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $aboutSubMenu = SubMenu::query()
            ->where('slug', 'about-kota-jababeka')
            ->whereHas('menu', fn ($query) => $query->where('slug', 'city-life'))
            ->where('is_active', true)
            ->first();

        return view('pages.home', [
            'slides' => $slides,
            'carouselAutoplay' => $carouselSettings->autoplay,
            'carouselIntervalMs' => $carouselSettings->interval_seconds * 1000,
            'featuredEvent' => $events->first(),
            'compactEvents' => $events->slice(1),
            'news' => $news,
            'highlights' => $highlights,
            'aboutSubMenu' => $aboutSubMenu,
            'aboutExcerpt' => $this->firstParagraph($aboutSubMenu?->description()),
            'aboutImage' => $this->firstImage($aboutSubMenu?->description()),
            'anchorTenants' => $anchorTenants,
            'tenantTabs' => $tenantTabs,
            'historyEras' => $historyEras,
            'futureDevelopments' => $futureDevelopments,
        ]);
    }

    private function firstParagraph(?string $html): ?string
    {
        if (! $html) {
            return null;
        }

        preg_match_all('/<p[^>]*>(.*?)<\/p>/is', $html, $matches);

        foreach ($matches[1] ?? [] as $paragraph) {
            $text = trim(html_entity_decode(strip_tags($paragraph), ENT_QUOTES, 'UTF-8'));

            if ($text !== '') {
                return $text;
            }
        }

        return null;
    }

    private function firstImage(?string $html): ?string
    {
        if ($html && preg_match('/<img[^>]+src="([^"]+)"/i', $html, $match)) {
            return $match[1];
        }

        return null;
    }
}
