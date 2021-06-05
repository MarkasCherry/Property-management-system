<?php

namespace App\Console\Commands\AutoEmails;

use App\Mail\SendUserReminder;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendReminderToClient extends Command
{
    private $customMessage = [
        0 => "You have a visit booked today",
        3 => "We are expecting you in 3 days ",
        7 => "One week left until your booking"
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends reminder to client about his upcoming booking';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        try {
            $this->sendEmailReminderToClients(0);
            $this->sendEmailReminderToClients(3);
            $this->sendEmailReminderToClients(7);

        } catch (\Exception $exception) {
            $this->output->error($exception->getMessage());
        }
    }

    private function sendEmailReminderToClients(int $daysInAdvance)
    {
        Booking::whereDate('booked_from', '=', Carbon::now()->subDays($daysInAdvance))->each(function ($booking) use ($daysInAdvance) {
            Mail::to($booking->client->email)
                ->send(new SendUserReminder($booking, $this->customMessage[$daysInAdvance]));

            $this->output->success('Email has been sent to: ' . $booking->client->email);
            sleep(2);
        });
    }
}
