<?php

use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists published events ordered by soonest event date', function () {
    $events = Category::factory()->create(['slug' => 'events', 'is_event' => true]);

    $soonest = Article::factory()->for($events)->create(['title' => 'Soonest Event', 'event_date' => now()->addDay()]);
    $later = Article::factory()->for($events)->create(['title' => 'Later Event', 'event_date' => now()->addWeek()]);
    Article::factory()->for($events)->create(['title' => 'Draft Event', 'is_published' => false]);

    $response = $this->get('/events');

    $response->assertOk();
    $response->assertSeeInOrder(['Soonest Event', 'Later Event']);
    $response->assertDontSee('Draft Event');
    $response->assertSee(route('articles.show', $soonest->slug), false);
});

it('lists published news ordered by most recently published', function () {
    $news = Category::factory()->create(['slug' => 'news', 'is_event' => false]);

    $older = Article::factory()->for($news)->create(['title' => 'Older News', 'published_at' => now()->subWeek()]);
    $newer = Article::factory()->for($news)->create(['title' => 'Newer News', 'published_at' => now()]);

    $response = $this->get('/news');

    $response->assertOk();
    $response->assertSeeInOrder(['Newer News', 'Older News']);
});

it('paginates the events listing', function () {
    $events = Category::factory()->create(['slug' => 'events', 'is_event' => true]);
    Article::factory()->for($events)->count(10)->sequence(fn ($sequence) => ['event_date' => now()->addDays($sequence->index)])->create();

    $response = $this->get('/events');

    $response->assertOk();
    $response->assertSee('/events?page=2', false);
});

it('shows a friendly empty state when there are no events yet', function () {
    Category::factory()->create(['slug' => 'events', 'is_event' => true]);

    $response = $this->get('/events');

    $response->assertOk();
    $response->assertSee('Nothing to show here yet');
});

it('404s for the events page when the events category is missing', function () {
    $this->get('/events')->assertNotFound();
});

it('shows recommended events on an event detail page, excluding itself and unpublished items', function () {
    $events = Category::factory()->create(['slug' => 'events', 'is_event' => true]);

    $current = Article::factory()->for($events)->create(['title' => 'Current Event', 'slug' => 'current-event', 'event_date' => now()]);
    $related = Article::factory()->for($events)->create(['title' => 'Related Event', 'event_date' => now()->addDay()]);
    Article::factory()->for($events)->create(['title' => 'Draft Related Event', 'is_published' => false]);

    $response = $this->get('/articles/current-event');

    $response->assertOk();
    $response->assertSee('More events you might like');
    $response->assertSee('Related Event');
    $response->assertDontSee('Draft Related Event');
    $response->assertSee(route('articles.show', $related->slug), false);
});

it('shows recommended news on a news detail page', function () {
    $news = Category::factory()->create(['slug' => 'news', 'is_event' => false]);

    Article::factory()->for($news)->create(['title' => 'Current News', 'slug' => 'current-news']);
    Article::factory()->for($news)->create(['title' => 'Other News']);

    $response = $this->get('/articles/current-news');

    $response->assertOk();
    $response->assertSee('You might also like');
    $response->assertSee('Other News');
});

it('does not show a recommendations section when there is nothing else to recommend', function () {
    $news = Category::factory()->create(['slug' => 'news', 'is_event' => false]);
    Article::factory()->for($news)->create(['title' => 'Only Article', 'slug' => 'only-article']);

    $response = $this->get('/articles/only-article');

    $response->assertOk();
    $response->assertDontSee('You might also like');
});

it('links "view all events" and "view all news" from the home page to the listing pages', function () {
    $response = $this->get('/');

    $response->assertOk();
    $response->assertSee(route('articles.events'), false);
    $response->assertSee(route('articles.news'), false);
});
