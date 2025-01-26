<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'brand_name', 'brand_website', 'logo', 'brand_description', 'confirmed', 'accepted_to_sell',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
