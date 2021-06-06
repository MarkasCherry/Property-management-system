<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Models\BookingStatus;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FinishedVisits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visits:completed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changes the status of the visits which are ending today';

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
        $bookings = Booking::whereDate('booked_to', Carbon::today())->get();

        $status = BookingStatus::whereName('Completed')->first();

        foreach ($bookings as $booking) {
            $booking->update([
                'status_id' => $status->id
            ]);

            $this->output->success('#' . $booking->id . ' booking as been completed');
        }

        $this->output->success('All bookings updated');
    }
}
