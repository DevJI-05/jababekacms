<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['autoplay', 'interval_seconds'])]
class CarouselSetting extends Model
{
    /**
     * There is only ever one row of carousel settings. Fetch (or lazily
     * create) it through this accessor rather than querying directly.
     */
    public static function current(): self
    {
        return static::query()->firstOrCreate(['id' => 1], [
            'autoplay' => true,
            'interval_seconds' => 6,
        ]);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'autoplay' => 'boolean',
            'interval_seconds' => 'integer',
        ];
    }
}
