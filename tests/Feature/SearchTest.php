<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\Content;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows a prompt when no search term is given', function () {
    $response = $this->get('/search');

    $response->assertOk();
    $response->assertSee('Enter a search term above to get started.');
});

it('finds a published article by title', function () {
    $news = Category::factory()->create(['slug' => 'news']);
    Article::factory()->for($news)->create(['title' => 'New Playground Opens in Kwinana', 'slug' => 'new-playground-opens']);
    Article::factory()->for($news)->create(['title' => 'Unrelated Story', 'slug' => 'unrelated-story']);

    $response = $this->get('/search?q=Playground');

    $response->assertOk();
    $response->assertSee('New Playground Opens in Kwinana');
    $response->assertDontSee('Unrelated Story');
});

it('does not find an unpublished article', function () {
    $news = Category::factory()->create(['slug' => 'news']);
    Article::factory()->for($news)->create(['title' => 'Draft Playground Story', 'is_published' => false]);

    $response = $this->get('/search?q=Playground');

    $response->assertOk();
    $response->assertSee('No results found');
    $response->assertDontSee('Draft Playground Story');
});

it('finds a menu page by its description', function () {
    Menu::factory()->create([
        'slug' => 'industrial-and-property',
        'label_en' => 'Industrial & Property',
        'description_en' => 'Explore industrial opportunities across Kota Jababeka.',
    ]);

    $response = $this->get('/search?q=industrial+opportunities');

    $response->assertOk();
    $response->assertSee('Industrial & Property');
});

it('finds a sub menu by its rich text description', function () {
    $menu = Menu::factory()->create(['slug' => 'community']);
    SubMenu::factory()->for($menu)->create([
        'label' => 'NZICC',
        'slug' => 'nzicc',
        'description_en' => '<p>Net Zero Industrial Cluster Community initiative.</p>',
    ]);

    $response = $this->get('/search?q=Net+Zero');

    $response->assertOk();
    $response->assertSee('NZICC');
});

it('finds a content item and links to its detail page', function () {
    $menu = Menu::factory()->create(['slug' => 'business-and-development']);
    $subMenu = SubMenu::factory()->for($menu)->create(['slug' => 'tenant-list']);
    Content::factory()->for($menu)->for($subMenu, 'subMenu')->create([
        'title' => 'JSmart',
        'slug' => 'jsmart',
        'description_en' => 'A smart tenant management platform.',
    ]);

    $response = $this->get('/search?q=JSmart');

    $response->assertOk();
    $response->assertSee('JSmart');
    $response->assertSee(route('menu.content.show', ['business-and-development', 'tenant-list', 'jsmart']), false);
});

it('does not blow up when searching for an unmatched term', function () {
    $response = $this->get('/search?q=zzzznomatchzzzz');

    $response->assertOk();
    $response->assertSee('No results found');
});
