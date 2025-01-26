<?php

namespace App\Traits;

trait HandleImagePath
{
    /**
     * Check if the image path is a URL.
     * If not, prepend the application URL.
     *
     * @param string|null $imagePath
     * @return string|null
     */
    public function getImagePath(?string $imagePath): ?string
    {
        if (empty($imagePath)) {
            return null;
        }

        // Check if the image path is a valid URL
        if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
            return $imagePath;
        }

        // Prepend the application URL
        return rtrim(config('app.url'), '/') . '/' . 'storage' . '/' . ltrim($imagePath, '/');
    }
}
