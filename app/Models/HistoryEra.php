<?php

namespace App\Models;

use Database\Factories\HistoryEraFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['label_en', 'label_id', 'year_range', 'sort_order', 'is_active'])]
class HistoryEra extends Model
{
    /** @use HasFactory<HistoryEraFactory> */
    use HasFactory;

    /**
     * @return HasMany<HistoryMilestone, $this>
     */
    public function milestones(): HasMany
    {
        return $this->hasMany(HistoryMilestone::class)->orderBy('sort_order');
    }

    public function label(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        return ($locale === 'id' ? ($this->label_id ?: $this->label_en) : ($this->label_en ?: $this->label_id))
            ?? '';
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
