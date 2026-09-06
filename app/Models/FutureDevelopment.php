<?php

namespace App\Models;

use Database\Factories\FutureDevelopmentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable(['title', 'description', 'image', 'sort_order', 'is_active'])]
class FutureDevelopment extends Model
{
    /** @use HasFactory<FutureDevelopmentFactory> */
    use HasFactory;

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
