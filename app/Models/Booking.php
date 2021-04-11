<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function status()
    {
        return $this->belongsTo(BookingStatus::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
