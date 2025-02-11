<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeReview extends Model
{
    use HasFactory;
    protected $fillable = [ "review_id" ];


    /**
     * Get the user that owns the HomeReview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }
}
