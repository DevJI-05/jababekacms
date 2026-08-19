<?php

use App\Filament\Resources\Articles\Pages\CreateArticle;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    config(['app.env' => 'local']);
});

it('lists articles with their category and tags', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create(['name' => 'News']);
    $article = Article::factory()->for($category)->create(['title' => 'Kwinana leading WA in small business growth']);
    $article->tags()->attach(Tag::factory()->create(['name' => 'Business']));

    $response = $this->actingAs($user)->get('/admin/articles');

    $response->assertOk();
    $response->assertSee('Kwinana leading WA in small business growth');
    $response->assertSee('News');
    $response->assertSee('Business');
});

it('can create an article with tags under a regular category, with no event date field required', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $category = Category::factory()->create(['is_event' => false]);
    $tag = Tag::factory()->create();

    Livewire::test(CreateArticle::class)
        ->fillForm([
            'category_id' => $category->id,
            'title' => 'Kwinana leading WA in small business growth',
            'slug' => 'kwinana-leading-wa-in-small-business-growth',
            'tags' => [$tag->id],
            'excerpt' => 'Fastest-growing small business community.',
            'body' => 'Full article body.',
            'is_published' => true,
            'published_at' => now(),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $article = Article::where('slug', 'kwinana-leading-wa-in-small-business-growth')->first();

    expect($article)->not->toBeNull()
        ->and($article->category_id)->toBe($category->id)
        ->and($article->tags->pluck('id')->all())->toBe([$tag->id])
        ->and($article->event_date)->toBeNull();
});

it('can create an event article with an event date', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $category = Category::factory()->create(['is_event' => true]);
    $eventDate = now()->addWeek()->startOfMinute();

    Livewire::test(CreateArticle::class)
        ->fillForm([
            'category_id' => $category->id,
            'title' => 'Darius Block Walk',
            'slug' => 'darius-block-walk',
            'event_date' => $eventDate,
            'is_published' => true,
            'published_at' => now(),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $article = Article::where('slug', 'darius-block-walk')->first();

    expect($article)->not->toBeNull()
        ->and($article->event_date->equalTo($eventDate))->toBeTrue();
});
