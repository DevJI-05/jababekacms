<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function show(string $article): View
    {
        $article = Article::where('slug', $article)
            ->where('is_published', true)
            ->with(['category', 'tags'])
            ->firstOrFail();

        return view('pages.article-show', [
            'article' => $article,
            'recommended' => $this->recommendedArticles($article),
            'breadcrumbs' => [
                'Home' => route('home'),
                $article->category->name => '#',
                $article->title => route('articles.show', $article->slug),
            ],
        ]);
    }

    public function events(): View
    {
        return $this->categoryListing('events', __('Events'));
    }

    public function news(): View
    {
        return $this->categoryListing('news', __('News'));
    }

    private function categoryListing(string $categorySlug, string $title): View
    {
        $category = Category::where('slug', $categorySlug)
            ->where('is_active', true)
            ->firstOrFail();

        $articles = Article::query()
            ->where('category_id', $category->id)
            ->where('is_published', true)
            ->when($category->is_event, fn ($query) => $query->orderBy('event_date'))
            ->when(! $category->is_event, fn ($query) => $query->orderByDesc('published_at'))
            ->paginate(9)
            ->withQueryString();

        return view('pages.article-list', [
            'title' => $title,
            'category' => $category,
            'articles' => $articles,
            'activeNav' => '',
            'breadcrumbs' => [
                'Home' => route('home'),
                $title => $category->is_event ? route('articles.events') : route('articles.news'),
            ],
        ]);
    }

    /**
     * A handful of other published articles from the same category, to
     * surface as recommendations on an article's detail page.
     *
     * @return Collection<int, Article>
     */
    private function recommendedArticles(Article $article): Collection
    {
        return Article::query()
            ->where('category_id', $article->category_id)
            ->where('is_published', true)
            ->where('id', '!=', $article->id)
            ->when($article->category->is_event, fn ($query) => $query->orderBy('event_date'))
            ->when(! $article->category->is_event, fn ($query) => $query->orderByDesc('published_at'))
            ->take(3)
            ->get();
    }
}
