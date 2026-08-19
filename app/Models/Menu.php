<?php

namespace App\Models;

use Database\Factories\MenuFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['label_en', 'label_id', 'slug', 'icon', 'description_en', 'description_id', 'sort_order', 'is_active'])]
class Menu extends Model
{
    /** @use HasFactory<MenuFactory> */
    use HasFactory;

    /**
     * @return HasMany<SubMenu, $this>
     */
    public function subMenus(): HasMany
    {
        return $this->hasMany(SubMenu::class)->orderBy('sort_order');
    }

    /**
     * Content items attached directly to this menu (not grouped under a sub menu).
     *
     * @return HasMany<Content, $this>
     */
    public function contents(): HasMany
    {
        return $this->hasMany(Content::class)->whereNull('sub_menu_id')->orderBy('sort_order');
    }

    public function label(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        return ($locale === 'id' ? ($this->label_id ?: $this->label_en) : ($this->label_en ?: $this->label_id))
            ?? '';
    }

    public function description(?string $locale = null): ?string
    {
        $locale ??= app()->getLocale();

        return $locale === 'id'
            ? ($this->description_id ?: $this->description_en)
            : ($this->description_en ?: $this->description_id);
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
