<?php

use App\Filament\Resources\Categories\Pages\CreateCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    config(['app.env' => 'local']);
});

it('lists categories', function () {
    $user = User::factory()->create();
    Category::factory()->create(['name' => 'Events']);

    $response = $this->actingAs($user)->get('/admin/categories');

    $response->assertOk();
    $response->assertSee('Events');
});

it('can create an event category', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test(CreateCategory::class)
        ->fillForm([
            'name' => 'Events',
            'slug' => 'events',
            'is_event' => true,
            'is_active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Category::where('slug', 'events')->first())
        ->is_event->toBeTrue();
});
