<?php

namespace App\Support;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Throwable;

class ImageThumbnailer
{
    private const WIDTH = 480;

    private const QUALITY = 75;

    private const IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];

    public static function isImage(string $path): bool
    {
        return in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), self::IMAGE_EXTENSIONS, true);
    }

    public static function thumbPathFor(string $path): string
    {
        $directory = pathinfo($path, PATHINFO_DIRNAME);
        $filename = pathinfo($path, PATHINFO_FILENAME);

        return ($directory !== '.' ? $directory.'/' : '')."thumb-{$filename}.webp";
    }

    /**
     * Generate a WebP thumbnail next to the given path on the given disk.
     * Returns the thumbnail's relative path, or null if it couldn't be generated
     * (not an image, source missing, or a processing error).
     */
    public static function generate(string $disk, string $path): ?string
    {
        if (! self::isImage($path)) {
            return null;
        }

        $storage = Storage::disk($disk);

        if (! $storage->exists($path)) {
            return null;
        }

        try {
            $image = ImageManager::gd()->read($storage->path($path));
            $image->scaleDown(width: self::WIDTH);
            $encoded = (string) $image->toWebp(quality: self::QUALITY);
        } catch (Throwable) {
            return null;
        }

        $thumbPath = self::thumbPathFor($path);
        $storage->put($thumbPath, $encoded);

        self::copyVisibility($storage, $path, $thumbPath);

        return $thumbPath;
    }

    private static function copyVisibility(Filesystem $storage, string $path, string $thumbPath): void
    {
        rescue(function () use ($storage, $path, $thumbPath) {
            if ($storage->getVisibility($path) === 'public') {
                $storage->setVisibility($thumbPath, 'public');
            }
        }, report: false);
    }
}
