<?php

namespace App\Models;

use Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable(['name', 'slug', 'category', 'land_area', 'logo', 'description', 'address', 'estate', 'industry_type', 'investment_country', 'building_type', 'website', 'is_anchor', 'sort_order', 'is_active'])]
class Tenant extends Model
{
    /** @use HasFactory<TenantFactory> */
    use HasFactory;

    public function logoUrl(): ?string
    {
        return $this->logo ? Storage::disk('public')->url($this->logo) : null;
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_anchor' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'land_area' => 'decimal:2',
        ];
    }
}
