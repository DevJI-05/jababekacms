<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<SubMenu>
 */
class SubMenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $label = ucfirst(fake()->unique()->words(3, true));

        return [
            'menu_id' => Menu::factory(),
            'label' => $label,
            'slug' => Str::slug($label),
            'icon' => null,
            'sort_order' => 0,
            'is_active' => true,
        ];
    }
}
