<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class BookingComponent extends Component
{
    public ?Booking $booking;

    public $code;
    public bool $is_paid = false;

    public $formTitle;
    public $indexRoute;
    public $formSubmitButtonText;
    public $formAction;

    protected array $rules = [
        'code' => 'required|unique',
    ];

    public function mount($booking = null)
    {
        if ($booking instanceof Booking) {
            $this->booking = $booking;
            $this->code = $booking->code;
        }
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
//        $client = Client::create([
//            'name' => $this->name,
//            'lastname' => $this->lastname,
//            'email' => $this->email,
//            'phone' => $this->phone,
//            'active' => $this->active,
//            'password' => bcrypt($generatedPassword)
//        ]);

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Client has been created!'
        ]);

        $this->reset([
            'code',
        ]);
    }

    public function render()
    {
        return view('livewire.bookings.booking-component');
    }
}
