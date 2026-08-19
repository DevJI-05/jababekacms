<?php

use App\Filament\Resources\HeroSlides\Pages\CreateHeroSlide;
use App\Models\HeroSlide;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    config(['app.env' => 'local']);
});

it('lists hero slides', function () {
    $user = User::factory()->create();
    HeroSlide::factory()->create(['title' => 'Discover the new Love My Kwinana']);

    $response = $this->actingAs($user)->get('/admin/hero-slides');

    $response->assertOk();
    $response->assertSee('Discover the new Love My Kwinana');
});

it('can create a hero slide with an uploaded image', function () {
    Storage::fake('public');

    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test(CreateHeroSlide::class)
        ->fillForm([
            'title' => 'Discover the new Love My Kwinana',
            'description' => 'Connect, contribute, and help shape the future.',
            'image' => UploadedFile::fake()->image('slide.jpg'),
            'cta_label' => 'Visit',
            'cta_url' => '#',
            'is_active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $slide = HeroSlide::where('title', 'Discover the new Love My Kwinana')->first();

    expect($slide)->not->toBeNull()
        ->and($slide->image)->not->toBeNull();

    Storage::disk('public')->assertExists($slide->image);
});
