<?php

namespace Database\Factories;

use App\Models\FutureDevelopment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FutureDevelopment>
 */
class FutureDevelopmentFactory extends Factory
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
            'description' => fake()->paragraph(),
            'image' => null,
            'sort_order' => 0,
            'is_active' => true,
        ];
    }
}
