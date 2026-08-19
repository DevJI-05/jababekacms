<?php

namespace Database\Factories;

use App\Models\HeroSlide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HeroSlide>
 */
class HeroSlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst(fake()->unique()->sentence(4)),
            'description' => fake()->sentence(),
            'image' => null,
            'cta_label' => 'Learn More',
            'cta_url' => '#',
            'sort_order' => 0,
            'is_active' => true,
        ];
    }
}
