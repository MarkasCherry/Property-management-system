<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed code
 * @property mixed deposit_paid
 * @property mixed booked_to
 * @property mixed is_paid
 * @property mixed client_id
 * @property mixed room_id
 * @property mixed booked_from
 * @property mixed price
 * @property mixed status_id
 * @property mixed guest_no
 * @property mixed breakfast_needed
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
        'guest_no',
        'breakfast_needed'
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
