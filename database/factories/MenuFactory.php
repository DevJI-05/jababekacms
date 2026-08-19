<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $label = ucfirst(fake()->unique()->words(2, true));

        return [
            'label_en' => $label,
            'label_id' => null,
            'slug' => Str::slug($label),
            'icon' => null,
            'sort_order' => 0,
            'is_active' => true,
        ];
    }
}
