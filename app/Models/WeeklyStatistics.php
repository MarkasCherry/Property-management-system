<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static latest()
 */
class WeeklyStatistics extends Model
{
    protected $fillable = [
        'bookings_count',
        'new_clients_count',
        'total_income'
    ];
}
