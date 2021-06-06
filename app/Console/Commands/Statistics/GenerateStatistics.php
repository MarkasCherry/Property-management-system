<?php

namespace App\Console\Commands\Statistics;

use App\Mail\SendLastWeekStatistics;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Setting;
use App\Models\WeeklyStatistics;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class GenerateStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate weekly statistics of the PMS';

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

            $statistic = WeeklyStatistics::create([
                'bookings_count' => $this->getLastWeekData(Booking::class)->count(),
                'new_clients_count' => $this->getLastWeekData(Client::class)->count(),
                'total_income' => $this->getLastWeekData(Booking::class)->sum('price'),
            ]);

            Mail::to(Setting::whereName('Email')->first()->value)
                ->send(new SendLastWeekStatistics($statistic));

            $this->output->success('Weekly statistics has been generated successfully!');
        } catch (\Exception $exception) {
            $this->output->error('There was an error while generated last week statistics');
        }
    }

    private function getLastWeekData(string $model)
    {
        return $model::whereDate('created_at', '>=', now()->subDays(7)->toDateTimeString())
            ->get();
    }
}
