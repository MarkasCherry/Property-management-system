<?php

namespace App\Providers;

use App\Models\Amenity;
use Illuminate\Support\ServiceProvider;

class ViewAmenitiesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'properties.edit',
        ], function ($view) {
            $view->with('amenities', Amenity::active()->get());
        });
    }
}
