<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUserReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking, $text)
    {
        $this->booking = $booking;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send-booking-reminder');
    }
}
