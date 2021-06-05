<?php

namespace App\Console\Commands\AutoEmails;

use App\Mail\SendBreakfastNeeded;
use App\Models\Booking;
use App\Models\Setting;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;

class NeededBreakfast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:breakfast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends email to kitchen with needed breakfast count today';

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
            $kitchenEmail = Setting::whereName('Kitchen Email')->first()->value;

            $breakfastCount = Booking::whereHas('status', function (Builder $query) {
                $query->where('name', 'Ongoing');
            })->whereBreakfastNeeded(true)->sum('guest_no');

            Mail::to($kitchenEmail)
                ->send(new SendBreakfastNeeded($breakfastCount));

            $this->output->success('Email has been successfully sent to the kitchen');

        } catch (\Exception $exception) {
            $this->output->error('There was an error while sending email to kitchen');
        }
    }
}
