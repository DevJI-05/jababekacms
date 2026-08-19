<?php

use App\Filament\Resources\Contents\Pages\CreateContent;
use App\Models\Content;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    config(['app.env' => 'local']);
});

it('lists contents with their menu and sub menu', function () {
    $user = User::factory()->create();
    $menu = Menu::factory()->create(['label_en' => 'Property and Pets']);
    $subMenu = SubMenu::factory()->for($menu)->create(['label' => 'Rates and Property Details']);
    Content::factory()->for($menu)->for($subMenu, 'subMenu')->create(['title' => 'About Your Rates']);

    $response = $this->actingAs($user)->get('/admin/contents');

    $response->assertOk();
    $response->assertSee('About Your Rates');
    $response->assertSee('Property and Pets');
    $response->assertSee('Rates and Property Details');
});

it('can create content nested under a sub menu with a bilingual description, image and links', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $menu = Menu::factory()->create();
    $subMenu = SubMenu::factory()->for($menu)->create();

    Livewire::test(CreateContent::class)
        ->fillForm([
            'menu_id' => $menu->id,
            'sub_menu_id' => $subMenu->id,
            'title' => 'About Your Rates',
            'slug' => 'about-your-rates',
            'description_en' => 'Everything about rates.',
            'description_id' => 'Semua tentang tarif.',
            'urls' => [
                ['label' => 'Rates Fact Sheet', 'url' => 'https://example.com/fact-sheet'],
            ],
            'body' => 'Full detail page content.',
            'is_active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $content = Content::where('slug', 'about-your-rates')->first();

    expect($content)->not->toBeNull()
        ->and($content->menu_id)->toBe($menu->id)
        ->and($content->sub_menu_id)->toBe($subMenu->id)
        ->and($content->description_en)->toBe('Everything about rates.')
        ->and($content->urls)->toHaveCount(1);
});

it('can create content directly under a menu without a sub menu', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $menu = Menu::factory()->create();

    Livewire::test(CreateContent::class)
        ->fillForm([
            'menu_id' => $menu->id,
            'sub_menu_id' => null,
            'title' => 'Community Support',
            'slug' => 'community-support',
            'is_active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $content = Content::where('slug', 'community-support')->first();

    expect($content)->not->toBeNull()
        ->and($content->menu_id)->toBe($menu->id)
        ->and($content->sub_menu_id)->toBeNull();
});
