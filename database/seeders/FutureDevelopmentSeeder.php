<?php

namespace Database\Seeders;

use App\Models\FutureDevelopment;
use Illuminate\Database\Seeder;

class FutureDevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Building a Net Zero Industrial Ecosystem',
                'description' => "Jababeka continues to advance its vision of a Net Zero Industrial Ecosystem by expanding the Net Zero Industrial Cluster Community together with industrial tenants and strategic partners. These initiatives are aligned with Indonesia's long-term Net Zero Emission 2060 target and the industrial decarbonization roadmap toward 2050.",
            ],
            [
                'title' => 'A New Dry Port in Weleri, Kendal',
                'description' => "Future initiatives include the development of a new dry port in Weleri, Kendal, strengthening logistics connectivity for industrial tenants across Central Java and supporting the region's growing manufacturing base.",
            ],
            [
                'title' => 'Sustainable Growth in Cikarang, Morotai & Tanjung Lesung',
                'description' => 'Jababeka continues sustainable development across its key destinations in Cikarang, Kendal, Morotai, and Tanjung Lesung, reinforcing its commitment to building more sustainable, connected, and resilient industrial cities for the future.',
            ],
        ];

        foreach ($items as $index => $item) {
            FutureDevelopment::updateOrCreate(
                ['title' => $item['title']],
                [
                    'description' => $item['description'],
                    'sort_order' => $index,
                    'is_active' => true,
                ],
            );
        }
    }
}
