<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sortOrder = 0;

        $sortOrder = $this->seedFromCsv(database_path('users/anchor_tenants.csv'), isAnchor: true, sortOrder: $sortOrder);
        $this->seedFromCsv(database_path('users/support_tenants.csv'), isAnchor: false, sortOrder: $sortOrder);
    }

    private function seedFromCsv(string $path, bool $isAnchor, int $sortOrder): int
    {
        if (! is_file($path)) {
            $this->command?->warn("Tenant CSV not found: {$path}");

            return $sortOrder;
        }

        $handle = fopen($path, 'r');
        $header = fgetcsv($handle, escape: '\\');
        $header[0] = preg_replace('/^\x{FEFF}/u', '', $header[0]);

        while (($row = fgetcsv($handle, escape: '\\')) !== false) {
            if (count($row) < 2 || trim((string) $row[1]) === '') {
                continue;
            }

            $data = array_combine($header, $row);

            $name = trim($data['Nama Perusahaan']);

            Tenant::updateOrCreate(
                ['name' => $name],
                [
                    'slug' => Str::slug($name),
                    'category' => $this->nullableTrim($data['Kategori Industri'] ?? null),
                    'land_area' => $this->parseDecimal($data['Luas Lahan (m2)'] ?? null),
                    'description' => null,
                    'address' => $this->nullableTrim($data['Alamat'] ?? null),
                    'estate' => $this->nullableTrim($data['Kawasan'] ?? null),
                    'industry_type' => $this->nullableTrim($data['Jenis Industri'] ?? null),
                    'investment_country' => $this->nullableTrim($data['Negara Investasi'] ?? null),
                    'building_type' => $this->nullableTrim($data['Jenis Bangunan'] ?? null),
                    'is_anchor' => $isAnchor,
                    'sort_order' => $sortOrder,
                    'is_active' => true,
                ],
            );

            $sortOrder++;
        }

        fclose($handle);

        return $sortOrder;
    }

    private function nullableTrim(?string $value): ?string
    {
        $value = trim((string) $value);

        return $value === '' ? null : $value;
    }

    private function parseDecimal(?string $value): ?float
    {
        $value = trim((string) $value);

        return $value === '' ? null : (float) $value;
    }
}
