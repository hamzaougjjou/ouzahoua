<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseItem extends Model
{
    use HasFactory;
    // Define fillable properties
    protected $fillable = [
        'product_id',
        'video_url',
        'title',
        'description',
    ];

    // Relationship: A course item belongs to a course
    public function course()
    {
        return $this->belongsTo(Product::class);
    }
}
