<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

     // Define the many-to-many relationship with Permission
     public function permissions()
     {
         return $this->belongsToMany(Permission::class, 'permission_group_items', 'permission_group_id', 'permission_id');
     }
     
}
