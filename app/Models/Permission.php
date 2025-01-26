<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'text'];

    public function group()
    {
        return $this->belongsTo(PermissionGroup::class, 'group_id');
    }

    
}
