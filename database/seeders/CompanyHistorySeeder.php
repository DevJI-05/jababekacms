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
                'label_id' => 'Tahap Pembangunan Awal',
                'year_range' => '1989–1996',
                'sort_order' => 1,
                'milestones' => [
                    [
                        'year' => '1989',
                        'title_en' => 'From Former Brick Quarries to a Bold Vision',
                        'title_id' => 'Dari Lahan Bekas Galian Bata, Lahir Sebuah Visi',
                        'description_en' => 'The West Java Provincial Government granted a consortium of 21 entrepreneurs permission to develop unproductive former brick and tile quarry land in Cikarang. Initiated by S.D. Darmono and Hadi Rahardja, the project marked the beginning of Jababeka and its vision to build Indonesia\'s first integrated industrial estate.',
                        'description_id' => 'Pada 12 Januari 1989, Pemerintah Provinsi Jawa Barat memberikan izin kepada konsorsium 21 pengusaha untuk mengembangkan lahan bekas galian bata dan genteng yang tak produktif di Cikarang. Digagas oleh S.D. Darmono bersama Hadi Rahardja, dari sinilah cikal bakal PT Kawasan Industri Jababeka Tbk dimulai. Lahan tersebut diproyeksikan menjadi kawasan industri terpadu pertama di Indonesia.',
                    ],
                    [
                        'year' => '1989',
                        'title_en' => 'Jababeka Industrial Estate Begins',
                        'title_id' => 'Perkembangan Kawasan Industri Jababeka di Cikarang',
                        'description_en' => 'Construction of Phase I began, laying the foundation for what would become one of Southeast Asia\'s largest industrial estates.',
                        'description_id' => 'Pembangunan fisik kawasan industri tahap I dimulai. Ini menjadi fondasi dari apa yang kelak tumbuh menjadi kawasan industri terbesar di Asia Tenggara.',
                    ],
                    [
                        'year' => '1992',
                        'title_en' => 'Cikarang Baru: A Green City Concept',
                        'title_id' => 'Perkembangan Kawasan Perumahan di Cikarang',
                        'description_en' => 'Jababeka began developing Cikarang Baru as an integrated residential area under the "Green City" concept, combining homes, green spaces, and artificial lakes.',
                        'description_id' => 'Jababeka mulai mengembangkan kawasan hunian pendamping industri: Cikarang Baru, dipasarkan dengan tagline "Kota Hijau" di atas lahan 700 hektar tahap pertama. Konsep ini menggabungkan rumah tinggal, jalur hijau, dan danau buatan, sesuatu yang belum umum untuk kawasan industri saat itu.',
                    ],
                    [
                        'year' => '1994',
                        'title_en' => 'The City Takes Shape',
                        'title_id' => 'Fasilitas Pertama Kota Jababeka Terwujud',
                        'description_en' => 'The first hotel and 1,000 homes were completed, alongside essential infrastructure including water treatment, wastewater treatment, power, and telecommunications facilities.',
                        'description_id' => 'Cikarang Baru mulai menampakkan wujud sebagai kota mandiri: hotel pertama di Cikarang Baru dibangun, dan 1.000 unit rumah pertama selesai dibangun. Di saat bersamaan, pusat pengolahan air bersih, pusat pengolahan air limbah, pusat tenaga listrik, dan pusat telekomunikasi mulai dibangun sebagai infrastruktur dasar kawasan, cikal bakal dari sistem WTP/WWTP yang masih beroperasi hingga kini.',
                    ],
                    [
                        'year' => '1994',
                        'title_en' => 'Jababeka Goes Public',
                        'title_id' => 'Jababeka Melantai di Bursa Efek',
                        'description_en' => 'Jababeka became the first industrial estate developer to be listed on the Jakarta and Surabaya Stock Exchanges, supporting its next phase of expansion.',
                        'description_id' => 'Jababeka menjadi perusahaan pengembang kawasan industri pertama yang tercatat di Bursa Efek Jakarta dan Surabaya yaitu PT Jababeka Tbk, sebuah langkah besar yang mempercepat ekspansi kawasan di tahun-tahun berikutnya.',
                    ],
                    [
                        'year' => '1996',
                        'title_en' => 'Jababeka Golf & Country Club',
                        'title_id' => 'Peluncuran Jababeka Golf & Country Club',
                        'description_en' => 'An 18-hole golf course and country club were launched, strengthening Jababeka\'s vision of a city that is not only industrial, but also livable.',
                        'description_id' => 'Sebagai bagian dari visi kota terpadu yang tidak hanya industrial tapi juga livable, Jababeka meluncurkan lapangan golf 18 hole beserta country club sebagai salah satu fasilitas rekreasi & bisnis pertama di kawasan.',
                    ],
                ],
            ],
            [
                'label_en' => 'Industrial & Educational Growth',
                'label_id' => 'Pertumbuhan Industri & Pendidikan',
                'year_range' => '1997–2009',
                'sort_order' => 2,
                'milestones' => [
                    [
                        'year' => '1997',
                        'title_en' => 'The Foundation of President University',
                        'title_id' => 'Cikal Bakal President University Dirumuskan',
                        'description_en' => 'The vision for a university within the industrial estate was developed by S.D. Darmono and Prof. Donald W. Watts. It later evolved into President University, becoming an integral part of the Jababeka ecosystem.',
                        'description_id' => 'Rencana konseptual sebuah universitas di dalam kawasan industri pertama kali dirumuskan oleh S.D. Darmono bersama Prof. Donald W. Watts (Presiden Bond University, Queensland). Pendirian President University berawal sebagai Sekolah Tinggi Teknik Cikarang, dan pada 16 April 2004 resmi berkembang menjadi universitas serta menjadi bagian integral dari ekosistem Kota Jababeka, yang kemudian diikuti dengan pendirian SMP dan SMA Presiden.',
                    ],
                    [
                        'year' => '2000',
                        'title_en' => 'Industrial Growth Accelerates',
                        'title_id' => 'Pertumbuhan Tenant Industri',
                        'description_en' => 'Global companies including L\'Oréal, Mattel, Samsung, Unilever, United Tractors, Akzo Nobel, Nissin, and ICI Paints invested in Jababeka, driving rapid industrial, residential, and commercial growth.',
                        'description_id' => 'Kawasan industri terus berkembang, menarik nama-nama besar multinasional lintas sektor seperti L\'Oréal, Mattel, Samsung, Unilever, United Tractors, Akzo Nobel, Nissin, dan ICI Paints untuk berinvestasi di Jababeka. Perkembangan yang sangat pesat ini membawa Jababeka menjadi kawasan industri terbesar se-Asia Tenggara serta mendorong permintaan akan kawasan hunian dan komersial di Kota Jababeka.',
                    ],
                    [
                        'year' => '2001–2009',
                        'title_en' => 'A Complete City Emerges',
                        'title_id' => 'Denyut Kehidupan Kota Jababeka Mulai Terbentuk',
                        'description_en' => 'The Capitol, Metro Boulevard, Plaza JB, Metropark Condominium, Beverly Hills Pavilion, Roxy Plaza, Pecenongan Square, Jababeka Botanical Garden, UKM Center, President Executive Club, and Bekasi Police Headquarters were developed, strengthening Jababeka\'s transformation into a complete social and commercial city.',
                        'description_id' => 'Sejumlah fasilitas yang menjadi "denyut kehidupan" kawasan residensial Kota Jababeka mulai dibangun: Jababeka Commercial Business District (CBD) mencakup The Capitol, Metro Boulevard, dan Plaza JB; peluncuran Metropark Condominium, Beverly Hills Pavilion, Ruko Roxy Plaza, dan Pecenongan Square; Jababeka Botanical Garden; UKM Center; President Executive Club; hingga peresmian Markas Polres Bekasi di dalam kawasan. Periode ini menegaskan transformasi Jababeka dari kawasan industri menjadi kota yang lengkap secara sosial dan komersial.',
                    ],
                ],
            ],
            [
                'label_en' => 'Expansion & Diversification',
                'label_id' => 'Ekspansi & Diversifikasi Kawasan',
                'year_range' => '2010–2019',
                'sort_order' => 3,
                'milestones' => [
                    [
                        'year' => '2010',
                        'title_en' => 'Cikarang Dry Port Opens',
                        'title_id' => 'Cikarang Dry Port Mulai Beroperasi',
                        'description_en' => 'The 200-hectare Cikarang Dry Port began operations, providing integrated customs and logistics services and connecting industries directly to the Port of Tanjung Priok.',
                        'description_id' => 'Cikarang Dry Port (CDP) resmi beroperasi di atas lahan 200 hektar, menjadi Kawasan Berikat/Layanan Bea Cukai Terpadu pertama dan satu-satunya di Indonesia. CDP berfungsi sebagai perpanjangan Pelabuhan Tanjung Priok, memangkas waktu dan biaya logistik ekspor-impor bagi tenant industri Jababeka.',
                    ],
                    [
                        'year' => '2011',
                        'title_en' => 'Expansion to Tanjung Lesung',
                        'title_id' => 'Ekspansi ke Tanjung Lesung',
                        'description_en' => 'Jababeka expanded to Tanjung Lesung, Banten, developing a 1,500-hectare area and beginning its journey toward a multi-city development model.',
                        'description_id' => 'Jababeka memperluas jangkauan di luar Cikarang dengan mengembangkan kawasan seluas 1.500 hektar di Tanjung Lesung, Banten. Hal ini menandai langkah pertama menuju model "kota-kota baru" di berbagai wilayah Indonesia.',
                    ],
                    [
                        'year' => '2012',
                        'title_en' => 'Jababeka Kendal',
                        'title_id' => 'Perkembangan Kawasan Industri Kendal',
                        'description_en' => 'The integrated industrial estate model expanded to Kendal, Central Java, through a joint venture with Sembcorp.',
                        'description_id' => 'Kawasan industri terpadu Jababeka direplikasi di Kendal, Jawa Tengah, memperluas jejak Jababeka sebagai pengembang kawasan industri berskala nasional. Kawasan Industri Kendal dikembangkan melalui joint venture dengan Sembcorp.',
                    ],
                    [
                        'year' => '2013',
                        'title_en' => 'Bekasi Power Begins Operations',
                        'title_id' => 'Bekasi Power Mulai Beroperasi',
                        'description_en' => 'The 130 MW Bekasi Power plant strengthened Jababeka\'s energy independence and supported thousands of industrial tenants.',
                        'description_id' => 'Setelah proses pembangunan sejak 2007, PLTGU Bekasi Power berkapasitas 130 MW resmi beroperasi, memperkuat kemandirian energi Kota Jababeka bagi ribuan tenant industri.',
                    ],
                    [
                        'year' => '2013',
                        'title_en' => 'Jababeka Residence Established',
                        'title_id' => 'Pembentukan Jababeka Residence',
                        'description_en' => 'PT Jababeka Tbk established Jababeka Residence as a dedicated business unit to develop and manage new residential areas within Kota Jababeka targeting the upper-middle market, laying the foundation for the faster wave of residential and commercial development in the following decade.',
                        'description_id' => 'Pada tahun 2013, PT Jababeka Tbk membentuk Jababeka Residence sebagai unit usaha khusus untuk mengembangkan dan mengelola kawasan residensial baru di dalam Kota Jababeka, dengan target pasar segmen menengah atas. Langkah ini menjadi fondasi bagi gelombang pembangunan residensial & komersial yang jauh lebih pesat pada dekade berikutnya.',
                    ],
                    [
                        'year' => '2018',
                        'title_en' => 'Development of Morotai Island',
                        'title_id' => 'Perkembangan Pulau Morotai',
                        'description_en' => 'Jababeka expanded to Morotai Island, North Maluku, developing a Special Economic Zone combining industry and tourism, projected to absorb tens of thousands of jobs in eastern Indonesia.',
                        'description_id' => 'Jababeka masuk ke Pulau Morotai, Maluku Utara, mengembangkan Kawasan Ekonomi Khusus yang memadukan industri dan pariwisata yang diproyeksikan menyerap puluhan ribu tenaga kerja di wilayah timur Indonesia.',
                    ],
                    [
                        'year' => '2019',
                        'title_en' => 'Smart City Concept Formulated and Implemented',
                        'title_id' => 'Perumusan & Implementasi Smart City Project',
                        'description_en' => 'Jababeka began formulating and implementing the Smart City concept, marking a new chapter of digital transformation in estate management, including the early foundations of digital systems such as E-Billing, J-One (ERP), IoT-based Smart Meters, and J-Smart, which continue to be developed today.',
                        'description_id' => 'Kawasan Jababeka mulai merumuskan dan mengimplementasikan konsep Smart City, menandai babak baru transformasi digital dalam pengelolaan kawasan, termasuk cikal bakal sistem digital seperti E-Billing, J-One (ERP), Smart Meter berbasis IoT, dan J-Smart yang terus dikembangkan sejak tahun ini.',
                    ],
                ],
            ],
            [
                'label_en' => 'Toward a Sustainable Industrial Estate',
                'label_id' => 'Menuju Kawasan Industri Berkelanjutan',
                'year_range' => '2022–2025 & Masa Depan',
                'sort_order' => 4,
                'milestones' => [
                    [
                        'year' => '2022',
                        'title_en' => 'Beginning of the Sustainability Transformation',
                        'title_id' => 'Awal Transformasi Menuju Sustainability',
                        'description_en' => 'Strategic Partnerships & Green Energy: on 18 January 2022, Jababeka signed a memorandum of understanding with Pertamina for industrial estate development cooperation. On 29 August 2022, Pertamina NRE and Jababeka Infrastruktur signed a contract to develop a green industrial cluster through the installation of rooftop solar power. At the B20 Event on 11 November 2022, Jababeka Industrial Estate was declared the first Net Zero industrial cluster in Southeast Asia.',
                        'description_id' => 'Kemitraan Strategis & Energi Hijau: pada 18 Januari 2022, Jababeka menandatangani nota kesepahaman dengan Pertamina untuk kerja sama pengembangan industrial estate. Pada 29 Agustus 2022, Pertamina NRE & Jababeka Infrastruktur menandatangani kontrak pengembangan green industrial cluster melalui pemasangan PLTS Atap. Pada B20 Event, 11 November 2022, Kawasan Industri Jababeka dinyatakan sebagai klaster industri Net Zero pertama di Asia Tenggara.',
                    ],
                    [
                        'year' => '2023',
                        'title_en' => 'Global Commitment with the World Economic Forum',
                        'title_id' => 'Komitmen Global Bersama World Economic Forum',
                        'description_en' => 'Jababeka Net Zero Industrial Cluster (NZICC): on 17 January 2023, the Jababeka Net Zero Cluster was announced at the World Economic Forum in Davos, Switzerland, making Jababeka the first industrial estate in Southeast Asia to join the WEF\'s global Net Zero Industrial Cluster initiative. Throughout the year, Jababeka also held the Jababeka Eco Summit 2023, including an FGD to establish the NZICC, the planting of 50,000 mangroves in Muara Gembong, and the official declaration of the NZICC commitment.',
                        'description_id' => 'Jababeka Net Zero Industrial Cluster (NZICC): pada 17 Januari 2023, Jababeka Net Zero Cluster diumumkan dalam World Economic Forum di Davos, Swiss, menjadikan Jababeka kawasan industri pertama di Asia Tenggara yang bergabung dengan misi global WEF untuk pembentukan Net Zero Industrial Cluster. Sepanjang tahun ini, Jababeka juga menggelar Jababeka Eco Summit 2023: FGD pembentukan NZICC, penanaman 50.000 mangrove di Muara Gembong, hingga deklarasi komitmen resmi NZICC.',
                    ],
                    [
                        'year' => '2024',
                        'title_en' => 'Real Action Toward Decarbonization',
                        'title_id' => 'Aksi Nyata Dekarbonisasi Kawasan',
                        'description_en' => 'Jababeka implemented several energy efficiency programs: a 230 kWp Solar PV installation at the Water Treatment Plant in partnership with Pertamina New & Renewable Energy, the replacement of street lighting with LEDs across the estate, and community programs such as a World Environment Day campaign and Jababeka EcoForum 2024 on industrial circular economy.',
                        'description_id' => 'Jababeka merealisasikan sejumlah program efisiensi energi: instalasi Solar PV 230 kWp di Water Treatment Plant bekerja sama dengan Pertamina New & Renewable Energy, penggantian lampu jalan ke LED di seluruh kawasan, serta program komunitas seperti Campaign untuk World Environment Day dan Jababeka EcoForum 2024 tentang ekonomi sirkular industri.',
                    ],
                    [
                        'year' => '2025',
                        'title_en' => 'Roadmap Toward Net Zero 2050',
                        'title_id' => 'Peta Jalan Menuju Net Zero 2050',
                        'description_en' => 'Smart Security-Command Center & Decarbonization Roadmap: Jababeka built a Smart Security-Command Center to enhance technology-based estate security. At the national level, the Ministry of Industry, together with WRI Indonesia and IESR, launched the Industrial Decarbonization Roadmap targeting net zero emissions by 2050, ahead of the national 2060 target, with Jababeka positioning itself as a pilot area for its implementation.',
                        'description_id' => 'Pembangunan Smart Security-Command Center & Roadmap Dekarbonisasi: Jababeka membangun Smart Security-Command Center untuk meningkatkan keamanan kawasan berbasis teknologi. Di tingkat nasional, Kementerian Perindustrian bersama WRI Indonesia dan IESR meluncurkan Peta Jalan Dekarbonisasi Industri yang menargetkan emisi nol bersih pada 2050, lebih cepat dari target nasional 2060, dan Jababeka memposisikan diri sebagai kawasan percontohan pelaksanaannya.',
                    ],
                    [
                        'year' => '2026',
                        'title_en' => 'A Continuously Growing Estate',
                        'title_id' => 'Kawasan yang Terus Tumbuh',
                        'description_en' => 'Kota Jababeka Today: Kota Jababeka has grown from former brick quarry land into a self-sufficient industrial city spanning 5,600 hectares, home to more than 1,800 industrial tenants, a population of 1.2 million, 4 hospitals, over 50,000 residential units, the 28,000-seat Wibawa Mukti Stadium, and more than 241,000 trees across approximately 1,832 hectares of green space, a long journey from the vision of one entrepreneurial consortium in 1989 to becoming one of Southeast Asia\'s largest industrial estates.',
                        'description_id' => 'Kota Jababeka Hari Ini: Kini Kota Jababeka telah berkembang dari lahan bekas galian bata menjadi kota industri mandiri seluas 5.600 hektar dengan lebih dari 1.800 tenant industri, populasi 1,2 juta jiwa, 4 rumah sakit, 50.000+ unit hunian, lapangan sepak bola berkapasitas 28.000 kursi bernama Stadion Wibawa Mukti, serta lebih dari 241.000 pohon dan ±1.832 hektar area hijau, perjalanan panjang dari visi satu konsorsium pengusaha di tahun 1989 menjadi salah satu kawasan industri terbesar di Asia Tenggara.',
                    ],
                    [
                        'year' => 'Masa Depan',
                        'title_en' => 'Future Development',
                        'title_id' => 'Pengembangan Masa Depan',
                        'description_en' => 'Jababeka continues moving toward its Net Zero Industrial Ecosystem vision: expanding the Net Zero Industrial Cluster Community with tenants, developing a new dry port in Weleri (Kendal), and pursuing sustainable development across its estates (Cikarang, Kendal, Morotai, Tanjung Lesung), in line with the national Net Zero Emission 2060 target and the 2050 industrial roadmap.',
                        'description_id' => 'Jababeka terus melangkah menuju visi Net Zero Industrial Ecosystem: perluasan Net Zero Industrial Cluster Community bersama tenant, pengembangan dry port baru di Weleri (Kendal), serta pembangunan berkelanjutan lintas kawasan (Cikarang, Kendal, Morotai, Tanjung Lesung) sejalan dengan target nasional Net Zero Emission 2060 dan peta jalan industri 2050.',
                    ],
                ],
            ],
        ];

        foreach ($eras as $eraData) {
            $era = HistoryEra::updateOrCreate(
                ['label_en' => $eraData['label_en']],
                [
                    'label_id' => $eraData['label_id'],
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
                        'title_id' => $milestone['title_id'],
                        'description_en' => $milestone['description_en'],
                        'description_id' => $milestone['description_id'],
                        'sort_order' => $index,
                        'is_active' => true,
                    ],
                );
            }
        }
    }
}
