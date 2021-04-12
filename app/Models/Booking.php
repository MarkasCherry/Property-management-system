<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed code
 */
class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'client_id',
        'room_id',
        'booked_from',
        'booked_to',
        'deposit_paid',
        'price',
        'status_id',
        'is_paid',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(BookingStatus::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
