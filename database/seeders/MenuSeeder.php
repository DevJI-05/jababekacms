<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Number of placeholder content items generated for a sub menu when no
     * real content titles are given.
     */
    private const PLACEHOLDER_CONTENT_COUNT = 6;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $managedSlugs = ['industrial-and-property', 'business-and-development', 'city-life', 'community'];

        // Remove menus from earlier demo data that this seeder no longer manages.
        Menu::whereNotIn('slug', $managedSlugs)->get()->each->delete();

        $this->seedMenu(
            slug: 'industrial-and-property',
            labelEn: 'Industrial & Property',
            labelId: 'Industri & Properti',
            icon: 'heroicon-o-building-office-2',
            descriptionEn: 'Everything you need to explore properties, discover industrial opportunities, and learn more about the facilities, regulations, and services available across Kota Jababeka.',
            descriptionId: 'Semua yang Anda butuhkan untuk menjelajahi properti, menemukan peluang industri, dan mempelajari lebih lanjut tentang fasilitas, regulasi, serta layanan yang tersedia di seluruh Kota Jababeka.',
            sortOrder: 1,
            subMenus: [
                [
                    'slug' => 'residential',
                    'label' => 'Residential',
                    'icon' => 'heroicon-o-home',
                    'contents' => ['New Product', 'Rates and Property Details'],
                ],
                [
                    'slug' => 'industrial',
                    'label' => 'Industrial',
                    'icon' => 'heroicon-o-building-office',
                    'contents' => [
                        'Land Available',
                        'Ready to Use Building',
                        'Rates and Property Details',
                        'Estate Regulations and Permit',
                        'Infrastructure and Facilities',
                    ],
                ],
                [
                    'slug' => 'news-and-publications',
                    'label' => 'News and Publications',
                    'icon' => 'heroicon-o-newspaper',
                    'contents' => [],
                ],
            ],
        );

        $this->seedMenu(
            slug: 'business-and-development',
            labelEn: 'Business and Development',
            labelId: 'Bisnis dan Pengembangan',
            icon: 'heroicon-o-briefcase',
            descriptionEn: 'Discover the business ecosystem that keeps Kota Jababeka connected, powered, and ready for growth. Explore our tenants, utilities, technology, logistics, and business services.',
            descriptionId: 'Temukan ekosistem bisnis yang membuat Kota Jababeka tetap terhubung, bertenaga, dan siap untuk berkembang. Jelajahi para penyewa, utilitas, teknologi, logistik, dan layanan bisnis kami.',
            sortOrder: 2,
            subMenus: [
                [
                    'slug' => 'tenant-list',
                    'label' => 'Tenant List',
                    'icon' => 'heroicon-o-building-storefront',
                    'contents' => ['JSmart'],
                ],
                [
                    'slug' => 'internet-solutions',
                    'label' => 'Internet Solutions',
                    'icon' => 'heroicon-o-wifi',
                    'contents' => ['ICTel'],
                ],
                [
                    'slug' => 'gas',
                    'label' => 'GAS',
                    'icon' => 'heroicon-o-fire',
                    'contents' => ['NGE'],
                ],
                [
                    'slug' => 'dryport',
                    'label' => 'Dryport',
                    'icon' => 'heroicon-o-truck',
                    'contents' => ['CDP'],
                ],
                [
                    'slug' => 'electricity',
                    'label' => 'Electricity',
                    'icon' => 'heroicon-o-bolt',
                    'contents' => ['Bekasi Power'],
                ],
                [
                    'slug' => 'e-billing-and-online-payment',
                    'label' => 'E-billing and Online Payment',
                    'icon' => 'heroicon-o-credit-card',
                    'contents' => [],
                ],
            ],
        );

        $this->seedMenu(
            slug: 'city-life',
            labelEn: 'City Life',
            labelId: 'Kehidupan Kota',
            icon: 'heroicon-o-building-library',
            descriptionEn: 'Discover what makes Kota Jababeka more than a place to work, a vibrant city to live, connect, explore, and experience.',
            descriptionId: 'Temukan hal yang menjadikan Kota Jababeka lebih dari sekadar tempat bekerja — sebuah kota yang dinamis untuk hidup, terhubung, menjelajah, dan merasakan pengalaman baru.',
            sortOrder: 3,
            subMenus: [
                [
                    'slug' => 'about-kota-jababeka',
                    'label' => 'About Kota Jababeka',
                    'icon' => 'heroicon-o-information-circle',
                    'contents' => [],
                ],
                [
                    'slug' => 'our-vision-and-values',
                    'label' => 'Our Vision and Values',
                    'icon' => 'heroicon-o-flag',
                    'contents' => [],
                ],
                [
                    'slug' => 'living-in-jababeka',
                    'label' => 'Living in Jababeka',
                    'icon' => 'heroicon-o-home-modern',
                    'contents' => [
                        'Leisure and Hospitality',
                        'Health Facility',
                        'Sports Area',
                        'Commercial Area',
                        'Education Facility',
                    ],
                ],
                [
                    'slug' => 'arts-and-culture',
                    'label' => 'Arts and Culture',
                    'icon' => 'heroicon-o-paint-brush',
                    'contents' => ['Festivals', 'Jetgolf', 'Sakura Matsuri', 'Capgomeh', 'Gardening'],
                ],
                [
                    'slug' => 'history-and-heritage',
                    'label' => 'History and Heritage',
                    'icon' => 'heroicon-o-book-open',
                    'contents' => [],
                ],
                [
                    'slug' => 'love-my-kwinana',
                    'label' => 'Love my Kwinana',
                    'icon' => 'heroicon-o-heart',
                    'contents' => ['Carbon Calculator'],
                ],
                [
                    'slug' => 'emergency-and-rescue',
                    'label' => 'Emergency and Rescue',
                    'icon' => 'heroicon-o-exclamation-triangle',
                    'contents' => [],
                ],
                [
                    'slug' => 'jsmart-app',
                    'label' => 'JSmart App',
                    'icon' => 'heroicon-o-device-phone-mobile',
                    'contents' => [],
                ],
            ],
        );

        $this->seedMenu(
            slug: 'community',
            labelEn: 'Community',
            labelId: 'Komunitas',
            icon: 'heroicon-o-user-group',
            descriptionEn: 'Connect, participate, and grow together with the people, businesses, and communities that make Kota Jababeka a vibrant place to live and work.',
            descriptionId: 'Terhubung, berpartisipasi, dan bertumbuh bersama masyarakat, pelaku usaha, dan komunitas yang menjadikan Kota Jababeka tempat yang dinamis untuk hidup dan bekerja.',
            sortOrder: 4,
            subMenus: [
                [
                    'slug' => 'nzicc',
                    'label' => 'NZICC',
                    'icon' => 'heroicon-o-globe-asia-australia',
                    'descriptionEn' => '<p>Net Zero Industrial Cluster Community (NZICC) — a collaborative initiative driving sustainable, low-carbon industrial practices across Kota Jababeka.</p>',
                    'descriptionId' => '<p>Net Zero Industrial Cluster Community (NZICC) — sebuah inisiatif kolaboratif yang mendorong praktik industri berkelanjutan dan rendah karbon di seluruh Kota Jababeka.</p>',
                    'contents' => [],
                ],
                [
                    'slug' => 'tenant-gathering',
                    'label' => 'Tenant Gathering',
                    'icon' => 'heroicon-o-users',
                    'contents' => [],
                ],
                [
                    'slug' => 'community-gathering-social-csr',
                    'label' => 'Community Gathering Social',
                    'icon' => 'heroicon-o-hand-raised',
                    'descriptionEn' => '<p>Community Gathering Social (CSR) — regular initiatives that bring tenants, businesses, and residents together to support the community.</p>',
                    'descriptionId' => '<p>Community Gathering Social (CSR) — inisiatif rutin yang mempertemukan penyewa, pelaku usaha, dan warga untuk mendukung komunitas.</p>',
                    'contents' => [],
                ],
                [
                    'slug' => 'news',
                    'label' => 'News',
                    'icon' => 'heroicon-o-newspaper',
                    'contents' => [],
                ],
                [
                    'slug' => 'connect-with-us',
                    'label' => 'Connect with Us',
                    'icon' => 'heroicon-o-chat-bubble-left-right',
                    'contents' => [],
                ],
            ],
        );
    }

    /**
     * @param  array<int, array{slug: string, label: string, icon: string, contents: array<int, string>, descriptionEn?: string, descriptionId?: string}>  $subMenus
     */
    private function seedMenu(
        string $slug,
        string $labelEn,
        string $labelId,
        string $icon,
        string $descriptionEn,
        string $descriptionId,
        int $sortOrder,
        array $subMenus,
    ): void {
        $menu = Menu::updateOrCreate(
            ['slug' => $slug],
            [
                'label_en' => $labelEn,
                'label_id' => $labelId,
                'icon' => $icon,
                'description_en' => $descriptionEn,
                'description_id' => $descriptionId,
                'sort_order' => $sortOrder,
                'is_active' => true,
            ],
        );

        foreach ($subMenus as $index => $subMenuData) {
            $subMenu = $menu->subMenus()->updateOrCreate(
                ['slug' => $subMenuData['slug']],
                [
                    'label' => $subMenuData['label'],
                    'icon' => $subMenuData['icon'],
                    'description_en' => ($subMenuData['descriptionEn'] ?? '').$this->richDescription($subMenuData['label'], 'en'),
                    'description_id' => ($subMenuData['descriptionId'] ?? '').$this->richDescription($subMenuData['label'], 'id'),
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ],
            );

            $titles = $subMenuData['contents'] !== [] ? $subMenuData['contents'] : $this->placeholderTitles();

            foreach ($titles as $contentIndex => $title) {
                $subMenu->contents()->updateOrCreate(
                    ['menu_id' => $menu->id, 'slug' => Str::slug($title)],
                    [
                        'menu_id' => $menu->id,
                        'title' => $title,
                        'image' => null,
                        'description_en' => fake()->sentence(),
                        'description_id' => fake()->sentence(),
                        'body' => collect(fake()->paragraphs(3))->map(fn (string $paragraph) => "<p>{$paragraph}</p>")->implode(''),
                        'sort_order' => $contentIndex + 1,
                        'is_active' => true,
                    ],
                );
            }
        }
    }

    /**
     * @return array<int, string>
     */
    private function placeholderTitles(): array
    {
        return collect(range(1, self::PLACEHOLDER_CONTENT_COUNT))
            ->map(fn (int $number) => "Lorem Ipsum {$number}")
            ->all();
    }

    /**
     * A long-form WYSIWYG sub menu description: heading, placeholder image,
     * several paragraphs and a highlights list — showcasing what the rich
     * text editor can hold rather than a single short blurb.
     */
    private function richDescription(string $label, string $locale): string
    {
        $heading = $locale === 'id' ? 'Ringkasan' : 'Overview';
        $subheading = $locale === 'id' ? 'Sorotan Utama' : 'Key Highlights';
        $imageAlt = $locale === 'id' ? "Gambar ilustrasi {$label}" : "Illustrative image for {$label}";

        $paragraphs = collect(fake()->paragraphs(4))
            ->map(fn (string $paragraph) => "<p>{$paragraph}</p>")
            ->implode('');

        $highlights = collect(range(1, 4))
            ->map(fn () => '<li>'.ucfirst(fake()->sentence(6)).'</li>')
            ->implode('');

        $image = $this->placeholderImage($label);

        return <<<HTML
            <h2>{$heading}</h2>
            <img src="{$image}" alt="{$imageAlt}">
            {$paragraphs}
            <h3>{$subheading}</h3>
            <ul>{$highlights}</ul>
            HTML;
    }

    /**
     * A self-contained SVG placeholder image (no file storage, no external
     * network calls) labelled with the given text.
     */
    private function placeholderImage(string $label): string
    {
        $safeLabel = htmlspecialchars($label, ENT_QUOTES);

        $svg = <<<SVG
            <svg xmlns="http://www.w3.org/2000/svg" width="960" height="480" viewBox="0 0 960 480">
                <rect width="960" height="480" fill="#0f3a63"/>
                <text x="50%" y="50%" fill="#ffffff" font-family="sans-serif" font-size="32" text-anchor="middle" dominant-baseline="middle">{$safeLabel}</text>
            </svg>
            SVG;

        return 'data:image/svg+xml;base64,'.base64_encode($svg);
    }
}
