<?php

namespace App\Enums;

enum SliderLocation: string
{
    case HOME = 'home';
    case PRODUCTS = 'products';
    case CATEGORY_ITEM = 'category_item';

    /**
     * Get all values of the enum.
     *
     * @return array
     */
    public static function values(): array
    {
        return array_map(fn ($case) => $case->value, self::cases());
    }
}
