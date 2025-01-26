<?php

namespace App\Models;

use App\Enums\SliderLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'background',
        'background_sm',
        'title',
        'subtitle',
        'button1_text',
        'button1_link',
        'button2_text',
        'button2_link',
        'location',
    ];


    protected $casts = [
        'location' => SliderLocation::class, // Cast the location field to the SliderLocation enum
    ];


    public static function getSliderByLocation($location)
    {
        return self::where('location', $location)->get();
    }

}
