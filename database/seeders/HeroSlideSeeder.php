<?php

namespace Database\Seeders;

use App\Models\CarouselSetting;
use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarouselSetting::current();

        $slides = [
            [
                'title' => 'Discover the new Love My Kwinana',
                'description' => 'Connect, contribute, and help shape the future of Kwinana.',
                'cta_label' => 'Visit Love My Kwinana',
                'cta_url' => '#',
                'sort_order' => 1,
            ],
            [
                'title' => 'Have your say on the Draft Local Planning Strategy',
                'description' => 'Community feedback closes soon — help guide how the City grows over the next decade.',
                'cta_label' => 'Have Your Say',
                'cta_url' => '#',
                'sort_order' => 2,
            ],
            [
                'title' => 'Kwinana Adventure Playground is open',
                'description' => "Western Australia's largest nature play space is now open to the public, free of charge.",
                'cta_label' => 'Plan Your Visit',
                'cta_url' => '#',
                'sort_order' => 3,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::updateOrCreate(
                ['title' => $slide['title']],
                [...$slide, 'is_active' => true],
            );
        }
    }
}
