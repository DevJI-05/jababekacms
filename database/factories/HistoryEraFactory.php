<?php

namespace Database\Factories;

use App\Models\HistoryEra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HistoryEra>
 */
class HistoryEraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startYear = fake()->numberBetween(1989, 2020);
        $endYear = $startYear + fake()->numberBetween(1, 8);

        return [
            'label_en' => ucfirst(fake()->unique()->words(2, true)),
            'label_id' => null,
            'year_range' => "{$startYear}–{$endYear}",
            'sort_order' => 0,
            'is_active' => true,
        ];
    }
}
