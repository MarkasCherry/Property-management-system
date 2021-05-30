<?php

namespace App\Console\Commands\Importers\Admin;

use App\Importers\Admin;
use App\Models\Property;
use Illuminate\Console\Command;

class GetProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:properties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching properties from Admin server';

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
     * @return void
     */
    public function handle(): void
    {
        $this->output->warning('Getting ready to import data from Admin...');

        try {
            $importer = new Admin();
            $importer->requestProperties();

            $response = $importer->getJsonResponse();

            foreach ($response->properties as $property) {
                $currentProperty = Property::updateOrCreate([
                    'import_id' => Admin::ADMIN,
                    'code' => $property->id,
                ], [
                    'import_id' => Admin::ADMIN,
                    'code' => $property->id,
                    'name' => $property->name,
                    'rating' => $property->rating,
                    'address' => $property->address,
                    'short_description' => $property->short_description,
                    'long_description' => $property->long_description,
                    'active' => $property->active,
                    'seo_h1_title' => $property->seo_h1_title,
                    'seo_meta_title' => $property->seo_meta_title,
                    'seo_meta_description' => $property->seo_meta_description
                ]);

                $this->output->success('Property "' . $currentProperty->name . '" has been imported');

                foreach ($property->amenities as $amenity) {
                    $currentAmenity = $currentProperty->amenities()->updateOrCreate([
                        'name' => $amenity->name,
                    ],
                        [
                            'name' => $amenity->name,
                            'active' => $amenity->active,
                            'font_awesome' => $amenity->font_awesome
                        ]);

                    $this->output->success('Amenity "' . $currentAmenity->name . '" has been linked');
                }

                foreach ($property->media as $media) {
                    $currentProperty->storeUniqueMedia($media->url);
                    $this->output->success('Downloaded media from: ' . $media->url);
                }

                foreach ($property->rooms as $room) {
                    $currentRoom = $currentProperty->rooms()->updateOrCreate([
                        'code' => $room->id,
                        'name' => $room->name,
                    ], [
                        'code' => $room->id,
                        'name' => $room->name,
                        'room_number' => $room->room_number,
                        'night_price' => $room->price,
                        'capacity' => $room->capacity,
                        'bed_count' => $room->bed_count,
                        'bathroom_count' => $room->bathroom_count,
                        'short_description' => $room->short_description,
                        'long_description' => $room->long_description,
                        'active' => $room->active,
                        'seo_h1_title' => $room->seo_h1_title,
                        'seo_meta_title' => $room->seo_meta_title,
                        'seo_meta_description' => $room->seo_meta_description,
                    ]);

                    $this->output->success('Room "' . $currentRoom->name . '" has been imported');

                    foreach ($room->media as $media) {
                        $currentRoom->storeUniqueMedia($media->url);
                        $this->output->success('Downloaded media from: ' . $media->url);
                    }
                }
            }

            $this->output->success('Import from Admin has been completed');

        } catch (\Exception $exception) {
            $this->output->error($exception->getMessage());
        }
    }
}
