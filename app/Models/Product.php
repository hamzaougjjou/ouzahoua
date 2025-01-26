<?php

namespace App\Models;

use App\Traits\HandleImagePath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\SlugTrait;

class Product extends Model
{
    use HasFactory, HandleImagePath;

    use SlugTrait; // Make sure to use the trait
    protected $fillable = [
        "name",
        "description",
        "slug",
        "price",
        "body",
        "discount_price",
        "category_id",
        "is_active",
        "thumbnail",
        "meta_title",
        "meta_description",
        "meta_keywords",
        "deleted_at",
        "featured"
    ];

    public function getThumbnailAttribute()
    {
        return $this->getImagePath($this->attributes['thumbnail'] ?? '');
    }

    public static function boot()
    {
        parent::boot();

        // Automatically create a slug when a product is created
        static::creating(function ($product) {
            $product->slug = $product->createSlug($product->name);
        });
    }



    /**
     * Get all of the comments for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function subImages()
    {
        return $this->hasMany(ProductSubImage::class);
    }
    public function courseItems()
    {
        return $this->hasMany(CourseItem::class);
    }

}
