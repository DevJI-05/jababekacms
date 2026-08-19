<?php

namespace Database\Factories;

use App\Models\Content;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucfirst(fake()->unique()->words(3, true));

        return [
            'menu_id' => Menu::factory(),
            'sub_menu_id' => null,
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => null,
            'description_en' => fake()->sentence(),
            'description_id' => fake()->sentence(),
            'urls' => [],
            'body' => fake()->paragraphs(3, true),
            'sort_order' => 0,
            'is_active' => true,
        ];
    }
}
