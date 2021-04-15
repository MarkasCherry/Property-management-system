<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Client;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class BookingComponent extends Component
{
    public ?Booking $booking;

    public bool $is_paid = false;
    public $client_id;
    public $room_id;
    public $booked_from;
    public $booked_to;
    public $deposit_paid = 0;
    public $price;
    public $status_id;

    public $formTitle;
    public $indexRoute;
    public $formSubmitButtonText;
    public $formAction;

    protected $listeners = ['setDates'];

    protected array $rules = [
        'client_id' => 'required',
        'room_id' => 'required',
        'booked_from' => 'required',
        'booked_to' => 'required',
        'status_id' => 'required',
        'price' => 'required',
    ];

    public function mount($booking = null)
    {
        if ($booking instanceof Booking) {
            $this->booking = $booking;
            $this->is_paid = $booking->is_paid;
            $this->client_id = $booking->client_id;
            $this->room_id = $booking->room_id;
            $this->booked_from = $booking->booked_from;
            $this->booked_to = $booking->booked_to;
            $this->deposit_paid = $booking->deposit_paid;
            $this->price = $booking->price;
            $this->status_id = $booking->status_id;
        }
    }

    public function setDates($startDate, $endDate)
    {
        $this->booked_from = $startDate;
        $this->booked_to = $endDate;
    }

    public function update()
    {
        $this->validate();

//        $this->client->update([
//            'name' => $this->name,
//            'lastname' => $this->lastname,
//            'phone' => $this->phone,
//            'active' => $this->active
//        ]);

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Client has been updated!'
        ]);
    }

    public function store()
    {
        $this->validate();

        Booking::create([
            'code' => Str::random(8),
            'is_paid' => $this->is_paid,
            'client_id' => $this->client_id,
            'room_id' => $this->room_id,
            'booked_from' => Carbon::create($this->booked_from),
            'booked_to' => Carbon::create($this->booked_to),
            'deposit_paid' => $this->deposit_paid,
            'price' => $this->price,
            'status_id' => $this->status_id
        ]);

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Client has been created!'
        ]);

        $this->reset([
            'is_paid',
            'client_id',
            'room_id',
            'deposit_paid',
            'price',
            'status_id'
        ]);
    }

    public function render()
    {
        $statuses = BookingStatus::all()->pluck('name', 'id')->toArray();
        $rooms = Room::active()->get()->pluck('name', 'id')->toArray();
        $clients = Client::all()->pluck('name', 'id')->toArray();

        return view('livewire.bookings.booking-component', compact('statuses', 'rooms', 'clients'));
    }
}
