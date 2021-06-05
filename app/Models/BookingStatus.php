<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static firstOrCreate(string[] $array, string[] $status)
 * @method static updateOrCreate(array $array, array $status)
 */
class BookingStatus extends Model
{
    protected $fillable = [
        'id',
        'name',
        'color'
    ];
}
