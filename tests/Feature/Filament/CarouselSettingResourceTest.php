<?php

use App\Filament\Resources\CarouselSettings\Pages\EditCarouselSetting;
use App\Models\CarouselSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    config(['app.env' => 'local']);
});

it('redirects the index page straight to the singleton edit form', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/admin/carousel-settings');

    $response->assertRedirect();

    $setting = CarouselSetting::current();
    $response->assertRedirect("/admin/carousel-settings/{$setting->id}/edit");
});

it('can update the autoplay and interval settings', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $setting = CarouselSetting::current();

    Livewire::test(EditCarouselSetting::class, ['record' => $setting->getRouteKey()])
        ->fillForm([
            'autoplay' => false,
            'interval_seconds' => 10,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($setting->fresh())
        ->autoplay->toBeFalse()
        ->interval_seconds->toBe(10);
});
