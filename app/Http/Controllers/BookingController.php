<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $todayBookings = Booking::whereDate('booked_from', Carbon::today())->get();

        $excludedIds = $todayBookings->pluck('id')->toArray();

        $bookings = Booking::whereNotIn('id', $excludedIds)->latest()->paginate(25);

        return view('bookings.index', compact('bookings', 'todayBookings'));
    }

    public function create() {
        return view('bookings.create');
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    public function getDestroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back();
    }
}
