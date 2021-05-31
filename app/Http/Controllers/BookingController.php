<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()->paginate(25);

        return view('bookings.index', compact('bookings'));
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
