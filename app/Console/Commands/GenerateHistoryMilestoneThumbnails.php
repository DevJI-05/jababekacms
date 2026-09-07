<?php

namespace App\Console\Commands;

use App\Models\HistoryMilestone;
use App\Support\ImageThumbnailer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateHistoryMilestoneThumbnails extends Command
{
    protected $signature = 'history-milestones:generate-thumbnails {--force : Regenerate thumbnails even if they already exist}';

    protected $description = 'Generate WebP thumbnails for existing history milestone photos';

    public function handle(): int
    {
        $disk = Storage::disk('public');
        $generated = 0;
        $skipped = 0;
        $failed = 0;

        HistoryMilestone::query()->whereNotNull('media')->each(function (HistoryMilestone $milestone) use ($disk, &$generated, &$skipped, &$failed) {
            foreach ($milestone->media ?? [] as $path) {
                if (blank($path) || ! ImageThumbnailer::isImage($path)) {
                    continue;
                }

                $thumbPath = ImageThumbnailer::thumbPathFor($path);

                if (! $this->option('force') && $disk->exists($thumbPath)) {
                    $skipped++;

                    continue;
                }

                if (ImageThumbnailer::generate('public', $path) === null) {
                    $this->warn("Failed to generate thumbnail for: {$path}");
                    $failed++;

                    continue;
                }

                $generated++;
            }
        });

        $this->info("Thumbnails generated: {$generated}, skipped (already existed): {$skipped}, failed: {$failed}.");

        return self::SUCCESS;
    }
}
