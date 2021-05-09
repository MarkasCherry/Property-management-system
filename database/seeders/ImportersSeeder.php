<?php

namespace Database\Seeders;

use App\Models\Importer;
use Illuminate\Database\Seeder;

class ImportersSeeder extends Seeder
{
    public $importers = [
        [
            'id' => 1,
            'name' => 'Admin',
            'is_local' => true,
            'active' => true
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->importers as $importer) {
            Importer::create($importer);
        }
    }
}
