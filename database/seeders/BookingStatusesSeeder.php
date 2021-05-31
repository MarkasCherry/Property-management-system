<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;

class BookingStatusesSeeder extends Seeder
{
    private $statuses = [
        [
            'name' => 'Cancelled by client',
            'color' => 'red'
        ],
        [
            'name' => 'Cancelled by administrator',
            'color' => 'red'
        ],
        [
            'name' => 'Not confirmed',
            'color' => 'gold'
        ],
        [
            'name' => 'Not confirmed',
            'color' => 'gold'
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
