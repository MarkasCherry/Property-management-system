<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@propertiesmanager.co.uk',
            'password' => bcrypt('secret'),
            'profile_photo_path' => 'profile-photos/admin.jpg'
        ]);
    }
}
