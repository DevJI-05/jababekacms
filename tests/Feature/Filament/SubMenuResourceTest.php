<?php

use App\Filament\Resources\SubMenus\Pages\CreateSubMenu;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    config(['app.env' => 'local']);
});

it('lists sub menus with their parent menu', function () {
    $user = User::factory()->create();
    $menu = Menu::factory()->create(['label_en' => 'Property and Pets']);
    SubMenu::factory()->for($menu)->create(['label' => 'Rates and Property Details']);

    $response = $this->actingAs($user)->get('/admin/sub-menus');

    $response->assertOk();
    $response->assertSee('Rates and Property Details');
    $response->assertSee('Property and Pets');
});

it('can create a sub menu under a menu', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $menu = Menu::factory()->create();

    Livewire::test(CreateSubMenu::class)
        ->fillForm([
            'menu_id' => $menu->id,
            'label' => 'Rates and Property Details',
            'slug' => 'rates-and-property-details',
            'is_active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $subMenu = SubMenu::where('slug', 'rates-and-property-details')->first();

    expect($subMenu)->not->toBeNull()
        ->and($subMenu->menu_id)->toBe($menu->id);
});

it('can create a sub menu with an optional button url', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $menu = Menu::factory()->create();

    Livewire::test(CreateSubMenu::class)
        ->fillForm([
            'menu_id' => $menu->id,
            'label' => 'Rates and Property Details',
            'slug' => 'rates-and-property-details',
            'button_url' => 'https://example.com/rates-portal',
            'button_label_en' => 'Go to rates portal',
            'is_active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $subMenu = SubMenu::where('slug', 'rates-and-property-details')->first();

    expect($subMenu->button_url)->toBe('https://example.com/rates-portal');
});

it('rejects an invalid button url', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $menu = Menu::factory()->create();

    Livewire::test(CreateSubMenu::class)
        ->fillForm([
            'menu_id' => $menu->id,
            'label' => 'Rates and Property Details',
            'slug' => 'rates-and-property-details',
            'button_url' => 'not-a-valid-url',
            'is_active' => true,
        ])
        ->call('create')
        ->assertHasFormErrors(['button_url' => 'url']);

    expect(SubMenu::where('slug', 'rates-and-property-details')->exists())->toBeFalse();
});

it('scopes slug uniqueness per menu', function () {
    $menuA = Menu::factory()->create();
    $menuB = Menu::factory()->create();

    SubMenu::factory()->for($menuA)->create(['slug' => 'shared-slug']);
    $subMenu = SubMenu::factory()->for($menuB)->create(['slug' => 'shared-slug']);

    expect($subMenu->exists)->toBeTrue();
});
