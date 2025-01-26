<?php

namespace App\Models;

use App\Traits\HandleImagePath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubImage extends Model
{
    use HasFactory, HandleImagePath;

    protected $fillable = ['product_id', 'image_path'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getImagePathAttribute()
    {
        return $this->getImagePath($this->attributes['image_path'] ?? '');
    }
}
