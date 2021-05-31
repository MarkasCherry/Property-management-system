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
            'color' => 'red'
        ],
        [
            'id' => 2,
            'name' => 'Cancelled by administrator',
            'color' => 'red'
        ],
        [
            'id' => 3,
            'name' => 'Not confirmed',
            'color' => 'gold'
        ],
        [
            'id' => 4,
            'name' => 'Confirmed',
            'color' => 'green'
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
            BookingStatus::firstOrCreate([
                'name' => $status['name']
            ], $status);
        }
    }
}
