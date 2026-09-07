<?php

namespace App\Models;

use App\Support\ImageThumbnailer;
use Database\Factories\HistoryMilestoneFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

#[Fillable(['history_era_id', 'year', 'title_en', 'title_id', 'description_en', 'description_id', 'media', 'sort_order', 'is_active'])]
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

    private const VIDEO_EXTENSIONS = ['mp4', 'mov', 'webm', 'ogg', 'ogv', 'avi', 'mkv'];

    /**
     * @return array<int, array{path: string, type: string, url: string, thumbUrl: string}>
     */
    public function mediaItems(): array
    {
        $disk = Storage::disk('public');

        return collect($this->media ?? [])
            ->filter(fn (?string $path) => filled($path))
            ->map(function (string $path) use ($disk) {
                $type = in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), self::VIDEO_EXTENSIONS, true) ? 'video' : 'image';
                $url = $disk->url($path);
                $thumbPath = ImageThumbnailer::thumbPathFor($path);

                return [
                    'path' => $path,
                    'type' => $type,
                    'url' => $url,
                    'thumbUrl' => ($type === 'image' && $disk->exists($thumbPath)) ? $disk->url($thumbPath) : $url,
                ];
            })
            ->values()
            ->all();
    }

    public function primaryMedia(): ?array
    {
        return $this->mediaItems()[0] ?? null;
    }

    public function imageUrl(): ?string
    {
        $primary = $this->primaryMedia();

        return $primary && $primary['type'] === 'image' ? $primary['url'] : null;
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'media' => 'array',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
