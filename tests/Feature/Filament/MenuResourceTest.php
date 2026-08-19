<?php

use App\Filament\Resources\Menus\Pages\CreateMenu;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    config(['app.env' => 'local']);
});

it('lists menus in the navigation and table', function () {
    $user = User::factory()->create();
    Menu::factory()->create(['label_en' => 'Property and Pets', 'sort_order' => 1]);

    $response = $this->actingAs($user)->get('/admin/menus');

    $response->assertOk();
    $response->assertSee('Property and Pets');
});

it('can create a menu with bilingual labels', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test(CreateMenu::class)
        ->fillForm([
            'label_en' => 'Council',
            'label_id' => 'Dewan',
            'slug' => 'council',
            'is_active' => true,
            'sort_order' => 5,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $menu = Menu::where('slug', 'council')->first();

    expect($menu)->not->toBeNull()
        ->and($menu->label_en)->toBe('Council')
        ->and($menu->label_id)->toBe('Dewan')
        ->and($menu->label('en'))->toBe('Council')
        ->and($menu->label('id'))->toBe('Dewan');
});

it('falls back to the english label when the indonesian label is empty', function () {
    $menu = Menu::factory()->create(['label_en' => 'Council', 'label_id' => null]);

    expect($menu->label('id'))->toBe('Council');
});
