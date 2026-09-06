<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anchorTenants = [
            ['name' => 'Hyundai', 'category' => 'Automotive'],
            ['name' => 'Yamaha', 'category' => 'Automotive'],
            ['name' => 'Denso', 'category' => 'Automotive'],
            ['name' => 'Samsung', 'category' => 'Technology'],
            ['name' => 'Nippon Steel', 'category' => 'Chemical'],
            ['name' => 'Ajinomoto', 'category' => 'Food'],
            ['name' => 'Mitsubishi', 'category' => 'Automotive'],
            ['name' => 'Unilever', 'category' => 'Consumer Goods'],
            ['name' => 'Daikin', 'category' => 'Technology'],
            ['name' => 'Bosch', 'category' => 'Automotive'],
            ['name' => 'NOK', 'category' => 'Plastic'],
            ['name' => 'Panasonic', 'category' => 'Technology'],
        ];

        foreach ($anchorTenants as $index => $tenant) {
            Tenant::updateOrCreate(
                ['name' => $tenant['name']],
                [
                    'slug' => Str::slug($tenant['name']),
                    'category' => $tenant['category'],
                    'logo' => $this->placeholderLogo($tenant['name']),
                    'description' => "{$tenant['name']} is one of the anchor tenants operating within Kota Jababeka's {$tenant['category']} industrial cluster, contributing to the estate's manufacturing and export activities.",
                    'address' => 'Kawasan Industri Jababeka, Cikarang, Bekasi, West Java, Indonesia',
                    'phone' => '+62 21 893 '.random_int(1000, 9999),
                    'email' => 'info@'.Str::slug($tenant['name']).'.co.id',
                    'website' => 'https://www.'.Str::slug($tenant['name']).'.com',
                    'is_anchor' => true,
                    'sort_order' => $index,
                    'is_active' => true,
                ],
            );
        }

        $otherTenants = [
            ['name' => 'Apple Flavors and Fragrances Indonesia', 'category' => 'Consumer Goods'],
            ['name' => 'Wings Surya', 'category' => 'Consumer Goods'],
            ['name' => 'Glow Industry Herbal Care', 'category' => 'Consumer Goods'],
            ['name' => 'Sanken Indonesia', 'category' => 'Technology'],
            ['name' => 'Cikos Indonesia', 'category' => 'Technology'],
            ['name' => 'Kao Indonesia', 'category' => 'Technology'],
            ['name' => 'Sanbe Farma', 'category' => 'Pharmacy'],
            ['name' => 'Kalbe Farma', 'category' => 'Pharmacy'],
            ['name' => 'Dexa Medica', 'category' => 'Pharmacy'],
            ['name' => 'DKSH Indonesia', 'category' => 'Warehouse'],
            ['name' => 'Schenker Logistics', 'category' => 'Warehouse'],
            ['name' => 'DHL Supply Chain', 'category' => 'Warehouse'],
            ['name' => 'Kansai Paint Indonesia', 'category' => 'Chemical'],
            ['name' => 'Nippon Paint Indonesia', 'category' => 'Chemical'],
            ['name' => 'Azmya Barokah Insani', 'category' => 'Chemical'],
            ['name' => 'Artha Utama Gemilang Foodindo', 'category' => 'Food'],
            ['name' => 'Sinar Sosro', 'category' => 'Food'],
            ['name' => 'Indofood Sukses Makmur', 'category' => 'Food'],
            ['name' => 'Mega Andalan Kalasan', 'category' => 'Automotive'],
            ['name' => 'Bima Asri Intermitra', 'category' => 'Automotive'],
            ['name' => 'Berkah Duta Tidar', 'category' => 'Plastic'],
            ['name' => 'Bratako', 'category' => 'Plastic'],
            ['name' => 'Pan Brothers', 'category' => 'Textile'],
            ['name' => 'Sri Rejeki Isman', 'category' => 'Textile'],
        ];

        foreach ($otherTenants as $index => $tenant) {
            Tenant::updateOrCreate(
                ['name' => $tenant['name']],
                [
                    'slug' => Str::slug($tenant['name']),
                    'category' => $tenant['category'],
                    'logo' => null,
                    'description' => "{$tenant['name']} operates within Kota Jababeka's {$tenant['category']} sector, part of the estate's growing base of over 2,000 companies and tenants.",
                    'address' => 'Kawasan Industri Jababeka, Cikarang, Bekasi, West Java, Indonesia',
                    'phone' => '+62 21 891 '.random_int(1000, 9999),
                    'email' => 'contact@'.Str::slug($tenant['name']).'.co.id',
                    'website' => null,
                    'is_anchor' => false,
                    'sort_order' => $index,
                    'is_active' => true,
                ],
            );
        }
    }

    /**
     * Generate a simple placeholder logo (SVG) so anchor tenants have
     * something to render without needing real artwork.
     */
    private function placeholderLogo(string $name): string
    {
        $path = 'tenants/'.Str::slug($name).'.svg';

        $initials = collect(explode(' ', $name))->map(fn (string $word) => mb_strtoupper(mb_substr($word, 0, 1)))->take(3)->implode('');

        $svg = <<<SVG
        <svg xmlns="http://www.w3.org/2000/svg" width="240" height="120" viewBox="0 0 240 120">
            <rect width="240" height="120" fill="#eef6f0"/>
            <text x="120" y="68" font-family="Arial, sans-serif" font-size="34" font-weight="700" fill="#1f6f4a" text-anchor="middle">{$initials}</text>
        </svg>
        SVG;

        Storage::disk('public')->put($path, $svg);

        return $path;
    }
}
