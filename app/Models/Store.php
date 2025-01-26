<?php

namespace App\Models;

use App\Traits\HandleImagePath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory , HandleImagePath;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'about',
        'whatsapp',
        'email',
        'logo',
        'icon',
        'facebook',
        'twitter',
        'instagram',
        'tiktok',
        'linkedin',
    ];

    public function getLogoAttribute()
    {
        return $this->getImagePath($this->attributes['logo'] ?? null);
    }
    public function getIconAttribute()
    {
        return $this->getImagePath($this->attributes['icon'] ?? null);
    }

}
