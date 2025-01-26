<?php

namespace App\Traits;

use Illuminate\Support\Str;

use voku\helper\ASCII; // Import the helper

trait SlugTrait
{
    /**
     * Generate a slug for the given product name and append a random number.
     *
     * @param string $title
     * @return string
     */
    public function createSlug(string $title)
    {

        $title = Str::lower($title);

        // Convert spaces to hyphens while preserving Arabic characters
        $slug = preg_replace('/\s+/u', '-', trim($title));

        // Append a random number to handle potential duplicate names
        $randomNumber = rand(1000, 99999);

        // Return the slug with the random number
        return $slug . '-' . $randomNumber;
    }
}
