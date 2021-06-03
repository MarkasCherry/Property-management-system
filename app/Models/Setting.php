<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class Setting extends Model
{
    const PRIVACY_POLICY = 1;

    protected $fillable = [
        'id',
        'name',
        'value'
    ];
}
