<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CarouselSetting;
use App\Models\HeroSlide;
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

        return view('pages.home', [
            'slides' => $slides,
            'carouselAutoplay' => $carouselSettings->autoplay,
            'carouselIntervalMs' => $carouselSettings->interval_seconds * 1000,
            'featuredEvent' => $events->first(),
            'compactEvents' => $events->slice(1),
            'news' => $news,
        ]);
    }
}
