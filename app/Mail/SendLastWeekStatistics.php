<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendLastWeekStatistics extends Mailable
{
    use Queueable, SerializesModels;

    public $statistic;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($statistic)
    {
        $this->statistic = $statistic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send-last-week-statistics');
    }
}
