<?php

namespace Database\Seeders;

use App\Models\HistoryEra;
use App\Models\HistoryMilestone;
use Illuminate\Database\Seeder;

class CompanyHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eras = [
            [
                'label_en' => 'Early Development',
                'year_range' => '1989–1996',
                'sort_order' => 1,
                'milestones' => [
                    [
                        'year' => '1989',
                        'title_en' => 'From Former Brick Quarries to a Bold Vision',
                        'description_en' => 'The West Java Provincial Government granted a consortium of 21 entrepreneurs permission to develop unproductive former brick and tile quarry land in Cikarang. Initiated by S.D. Darmono and Hadi Rahardja, the project marked the beginning of Jababeka and its vision to build Indonesia\'s first integrated industrial estate.',
                    ],
                    [
                        'year' => '1989',
                        'title_en' => 'Jababeka Industrial Estate Begins',
                        'description_en' => 'Construction of Phase I began, laying the foundation for what would become one of Southeast Asia\'s largest industrial estates.',
                    ],
                    [
                        'year' => '1992',
                        'title_en' => 'Cikarang Baru: A Green City Concept',
                        'description_en' => 'Jababeka began developing Cikarang Baru as an integrated residential area under the "Green City" concept, combining homes, green spaces, and artificial lakes.',
                    ],
                    [
                        'year' => '1994',
                        'title_en' => 'The City Takes Shape',
                        'description_en' => 'The first hotel and 1,000 homes were completed, alongside essential infrastructure including water treatment, wastewater treatment, power, and telecommunications facilities.',
                    ],
                    [
                        'year' => '1994',
                        'title_en' => 'Jababeka Goes Public',
                        'description_en' => 'Jababeka became the first industrial estate developer to be listed on the Jakarta and Surabaya Stock Exchanges, supporting its next phase of expansion.',
                    ],
                    [
                        'year' => '1996',
                        'title_en' => 'Jababeka Golf & Country Club',
                        'description_en' => 'An 18-hole golf course and country club were launched, strengthening Jababeka\'s vision of a city that is not only industrial, but also livable.',
                    ],
                ],
            ],
            [
                'label_en' => 'Industrial & Educational Growth',
                'year_range' => '1997–2009',
                'sort_order' => 2,
                'milestones' => [
                    [
                        'year' => '1997',
                        'title_en' => 'The Foundation of President University',
                        'description_en' => 'The vision for a university within the industrial estate was developed by S.D. Darmono and Prof. Donald W. Watts. It later evolved into President University, becoming an integral part of the Jababeka ecosystem.',
                    ],
                    [
                        'year' => '2000',
                        'title_en' => 'Industrial Growth Accelerates',
                        'description_en' => 'Global companies including L\'Oréal, Mattel, Samsung, Unilever, United Tractors, Akzo Nobel, Nissin, and ICI Paints invested in Jababeka, driving rapid industrial, residential, and commercial growth.',
                    ],
                    [
                        'year' => '2001–2009',
                        'title_en' => 'A Complete City Emerges',
                        'description_en' => 'The Capitol, Metro Boulevard, Plaza JB, Metropark Condominium, Beverly Hills Pavilion, Roxy Plaza, Pecenongan Square, Jababeka Botanical Garden, UKM Center, President Executive Club, and Bekasi Police Headquarters were developed, strengthening Jababeka\'s transformation into a complete social and commercial city.',
                    ],
                ],
            ],
            [
                'label_en' => 'Expansion & Diversification',
                'year_range' => '2010–2019',
                'sort_order' => 3,
                'milestones' => [
                    [
                        'year' => '2010',
                        'title_en' => 'Cikarang Dry Port Opens',
                        'description_en' => 'The 200-hectare Cikarang Dry Port began operations, providing integrated customs and logistics services and connecting industries directly to the Port of Tanjung Priok.',
                    ],
                    [
                        'year' => '2011',
                        'title_en' => 'Expansion to Tanjung Lesung',
                        'description_en' => 'Jababeka expanded to Tanjung Lesung, Banten, developing a 1,500-hectare area and beginning its journey toward a multi-city development model.',
                    ],
                    [
                        'year' => '2012',
                        'title_en' => 'Jababeka Kendal',
                        'description_en' => 'The integrated industrial estate model expanded to Kendal, Central Java, through a joint venture with Sembcorp.',
                    ],
                    [
                        'year' => '2013',
                        'title_en' => 'Bekasi Power Begins Operations',
                        'description_en' => 'The 130 MW Bekasi Power plant strengthened Jababeka\'s energy independence and supported thousands of industrial tenants.',
                    ],
                ],
            ],
        ];

        foreach ($eras as $eraData) {
            $era = HistoryEra::updateOrCreate(
                ['label_en' => $eraData['label_en']],
                [
                    'year_range' => $eraData['year_range'],
                    'sort_order' => $eraData['sort_order'],
                    'is_active' => true,
                ],
            );

            foreach ($eraData['milestones'] as $index => $milestone) {
                HistoryMilestone::updateOrCreate(
                    ['history_era_id' => $era->id, 'title_en' => $milestone['title_en']],
                    [
                        'year' => $milestone['year'],
                        'description_en' => $milestone['description_en'],
                        'sort_order' => $index,
                        'is_active' => true,
                    ],
                );
            }
        }
    }
}
