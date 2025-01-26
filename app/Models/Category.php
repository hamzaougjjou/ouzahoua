<?php

namespace App\Models;

use App\Traits\HandleImagePath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HandleImagePath;
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'level',
        'parent_id',
        'slug'
    ];

    public function getImagePathAttribute()
    {
        return $this->getImagePath($this->attributes['image_path'] ?? '');
    }
    
}
