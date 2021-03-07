<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * @property string name
 * @property Collection permissions
 */
class Role extends \Spatie\Permission\Models\Role
{
    protected $fillable = [
        'name',
        'guard_name'
    ];
}
