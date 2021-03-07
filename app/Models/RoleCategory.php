<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleCategory extends Model
{
    use HasFactory;

    protected $with = ['categories'];

    protected $fillable = [
        'name'
    ];

    public function categories()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function scopeRootCategories($query)
    {
        return $query->whereNull('parent_id');
    }
}
