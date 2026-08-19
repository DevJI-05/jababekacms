<?php

namespace App\Models;

use Database\Factories\ContentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

#[Fillable(['menu_id', 'sub_menu_id', 'title', 'slug', 'image', 'description_en', 'description_id', 'urls', 'body', 'sort_order', 'is_active'])]
class Content extends Model
{
    /** @use HasFactory<ContentFactory> */
    use HasFactory;

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function subMenu(): BelongsTo
    {
        return $this->belongsTo(SubMenu::class);
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
            'urls' => 'array',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
