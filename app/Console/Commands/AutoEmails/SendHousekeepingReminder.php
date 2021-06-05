<?php

namespace App\Console\Commands\AutoEmails;

use App\Mail\SendHousekeepingRooms;
use App\Models\Room;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendHousekeepingReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:housekeeping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): void
    {
        $rooms = Room::whereHas('bookings', function ($query) {
            return $query->whereDate('booked_to', '=', Carbon::now())
                ->orWhereDate('booked_from', '=', Carbon::now()->subDay());
        })
            ->orWhere(function ($query) {
                return $query->whereDate('last_housekeeping', '<=', Carbon::now()->subDays(7))
                    ->whereHas('bookings', function ($subQuery) {
                        return $subQuery->whereDate('booked_from', '>', Carbon::now())
                            ->whereDate('booked_to', '<', Carbon::now());
                    });
            })
            ->orWhere(function ($query) {
                return $query->whereDate('last_housekeeping', '<=', Carbon::now()->subDays(7))
                    ->wheredoesnthave('bookings');
            })
            ->get();
        Mail::to(Setting::whereName('Housekeeping Email')->first()->value)
            ->send(new SendHousekeepingRooms($rooms));
    }
}
