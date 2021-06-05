<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendBreakfastNeeded extends Mailable
{
    use Queueable, SerializesModels;

    public $breakfastNeeded;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($breakfastNeeded)
    {
        $this->breakfastNeeded = $breakfastNeeded;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): SendBreakfastNeeded
    {
        return $this->markdown('emails.send-breakfast-needed');
    }
}
