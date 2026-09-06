<?php

namespace App\Models;

use Database\Factories\HistoryMilestoneFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

#[Fillable(['history_era_id', 'year', 'title_en', 'title_id', 'description_en', 'description_id', 'image', 'sort_order', 'is_active'])]
class HistoryMilestone extends Model
{
    /** @use HasFactory<HistoryMilestoneFactory> */
    use HasFactory;

    public function era(): BelongsTo
    {
        return $this->belongsTo(HistoryEra::class, 'history_era_id');
    }

    public function title(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        return ($locale === 'id' ? ($this->title_id ?: $this->title_en) : ($this->title_en ?: $this->title_id))
            ?? '';
    }

    public function description(?string $locale = null): ?string
    {
        $locale ??= app()->getLocale();

        return $locale === 'id'
            ? ($this->description_id ?: $this->description_en)
            : ($this->description_en ?: $this->description_id);
    }

    public function imageUrl(): ?string
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
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
