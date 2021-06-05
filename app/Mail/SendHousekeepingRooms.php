<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendHousekeepingRooms extends Mailable
{
    use Queueable, SerializesModels;

    public $rooms;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rooms)
    {
        $this->rooms = $rooms;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send-housekeeping-reminder');
    }
}
