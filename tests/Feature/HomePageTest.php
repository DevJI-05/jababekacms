<?php

use App\Models\Article;
use App\Models\CarouselSetting;
use App\Models\Category;
use App\Models\HeroSlide;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows a friendly empty state when there are no events or news yet', function () {
    $response = $this->get('/');

    $response->assertOk();
    $response->assertSee('No upcoming events right now');
    $response->assertSee('No news articles published yet');
});

it('does not render the hero carousel when there are no active slides', function () {
    HeroSlide::factory()->create(['is_active' => false]);

    $response = $this->get('/');

    $response->assertOk();
    $response->assertDontSee('data-carousel', false);
});

it('renders active hero slides with the configured autoplay interval', function () {
    HeroSlide::factory()->create(['title' => 'Discover the new Love My Kwinana', 'sort_order' => 1, 'is_active' => true]);
    HeroSlide::factory()->create(['title' => 'Hidden Slide', 'sort_order' => 2, 'is_active' => false]);

    CarouselSetting::current()->update(['autoplay' => false, 'interval_seconds' => 12]);

    $response = $this->get('/');

    $response->assertOk();
    $response->assertSee('Discover the new Love My Kwinana');
    $response->assertDontSee('Hidden Slide');
    $response->assertSee('data-carousel-autoplay="0"', false);
    $response->assertSee('data-carousel-interval="12000"', false);
});

it('shows the soonest event as featured and the rest as compact, ordered by event date', function () {
    $events = Category::factory()->create(['slug' => 'events', 'is_event' => true]);

    $soonest = Article::factory()->for($events)->create(['title' => 'Soonest Event', 'event_date' => now()->addDay()]);
    $later = Article::factory()->for($events)->create(['title' => 'Later Event', 'event_date' => now()->addWeek()]);

    $response = $this->get('/');

    $response->assertOk();
    $response->assertSeeInOrder(['Soonest Event', 'Later Event']);
    $response->assertSee(route('articles.show', $soonest->slug), false);
});

it('shows news articles ordered by most recently published', function () {
    $news = Category::factory()->create(['slug' => 'news', 'is_event' => false]);

    $older = Article::factory()->for($news)->create(['title' => 'Older News', 'published_at' => now()->subWeek()]);
    $newer = Article::factory()->for($news)->create(['title' => 'Newer News', 'published_at' => now()]);

    $response = $this->get('/');

    $response->assertOk();
    $response->assertSeeInOrder(['Newer News', 'Older News']);
});

it('does not show unpublished articles on the home page', function () {
    $news = Category::factory()->create(['slug' => 'news']);
    Article::factory()->for($news)->create(['title' => 'Draft Article', 'is_published' => false]);

    $response = $this->get('/');

    $response->assertOk();
    $response->assertDontSee('Draft Article');
});

it('shows the article detail page', function () {
    $events = Category::factory()->create(['slug' => 'events', 'is_event' => true]);
    $article = Article::factory()->for($events)->create([
        'title' => 'Darius Block Walk',
        'slug' => 'darius-block-walk',
        'excerpt' => 'A relaxed walk around the block.',
        'body' => '<p>Full event details.</p>',
        'event_date' => now()->addWeek(),
    ]);

    $response = $this->get('/articles/darius-block-walk');

    $response->assertOk();
    $response->assertSee('Darius Block Walk');
    $response->assertSee('A relaxed walk around the block.');
    $response->assertSee('Full event details.');
});

it('404s for an unpublished or unknown article', function () {
    $news = Category::factory()->create(['slug' => 'news']);
    Article::factory()->for($news)->create(['slug' => 'draft-article', 'is_published' => false]);

    $this->get('/articles/draft-article')->assertNotFound();
    $this->get('/articles/does-not-exist')->assertNotFound();
});
