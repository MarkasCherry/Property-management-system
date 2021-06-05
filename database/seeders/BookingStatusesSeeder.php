<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;

class BookingStatusesSeeder extends Seeder
{
    private $statuses = [
        [
            'id' => 1,
            'name' => 'Cancelled by client',
            'color' => '#ff000073'
        ],
        [
            'id' => 2,
            'name' => 'Cancelled by administrator',
            'color' => '#ff000073'
        ],
        [
            'id' => 3,
            'name' => 'Upcoming',
            'color' => 'gold'
        ],
        [
            'id' => 4,
            'name' => 'Ongoing',
            'color' => '#72ff72'
        ],
        [
            'id' => 5,
            'name' => 'Completed',
            'color' => '#50daff'
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->statuses as $status) {
            BookingStatus::updateOrCreate([
                'id' => $status['id']
            ], $status);
        }
    }
}
