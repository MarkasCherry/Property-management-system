<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static firstOrCreate(string[] $array, string[] $status)
 */
class BookingStatus extends Model
{
    protected $fillable = [
        'name',
        'color'
    ];
}
