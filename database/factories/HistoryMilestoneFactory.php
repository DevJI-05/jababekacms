<?php

namespace Database\Factories;

use App\Models\HistoryEra;
use App\Models\HistoryMilestone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HistoryMilestone>
 */
class HistoryMilestoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'history_era_id' => HistoryEra::factory(),
            'year' => (string) fake()->numberBetween(1989, 2026),
            'title_en' => ucfirst(fake()->sentence(4)),
            'title_id' => null,
            'description_en' => fake()->paragraph(),
            'description_id' => null,
            'media' => null,
            'sort_order' => 0,
            'is_active' => true,
        ];
    }
}
