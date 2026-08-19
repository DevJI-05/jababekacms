<?php

namespace App\Models;

use Database\Factories\SubMenuFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['menu_id', 'label', 'slug', 'icon', 'description_en', 'description_id', 'button_label_en', 'button_label_id', 'button_url', 'sort_order', 'is_active'])]
class SubMenu extends Model
{
    /** @use HasFactory<SubMenuFactory> */
    use HasFactory;

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function description(?string $locale = null): ?string
    {
        $locale ??= app()->getLocale();

        return $locale === 'id'
            ? ($this->description_id ?: $this->description_en)
            : ($this->description_en ?: $this->description_id);
    }

    public function buttonLabel(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        return ($locale === 'id'
            ? ($this->button_label_id ?: $this->button_label_en)
            : ($this->button_label_en ?: $this->button_label_id))
            ?: __('Learn more');
    }

    /**
     * @return HasMany<Content, $this>
     */
    public function contents(): HasMany
    {
        return $this->hasMany(Content::class)->orderBy('sort_order');
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
