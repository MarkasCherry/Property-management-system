<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\RoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'middleware' => [
        'auth:sanctum',
        'verified'
    ],
], function () {
    //Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    //Roles
    Route::resource('roles', RoleController::class);

    //Users
    Route::resource('users', UserController::class);

    //Media
    Route::get('media/{modelId}/{modelName}', [MediaController::class, 'index'])->name('media.index');
    Route::post('media/delete', [MediaController::class, 'destroy'])->name('media.destroy');
    Route::post('media/{modelId}/{modelName}/create', [MediaController::class, 'create'])->name('media.create');

    //Properties
    Route::resource('properties', PropertyController::class);
    Route::put('properties/{property}/updateDescription', [PropertyController::class, 'updateDescription'])->name('properties.updateDescription');
    Route::put('properties/{property}/updateMedia', [PropertyController::class, 'updateMedia'])->name('properties.updateMedia');
    Route::put('properties/{property}/updateSeo', [PropertyController::class, 'updateSeo'])->name('properties.updateSeo');
    Route::put('properties/{property}/updateAmenities', [PropertyController::class, 'updateAmenities'])->name('properties.updateAmenities');
    Route::get('properties/{property}/add-room', [PropertyController::class, 'addRoom'])->name('properties.addRoom');
    Route::post('properties/{property}/add-room', [PropertyController::class, 'storeRoom'])->name('properties.storeRoom');

    //Rooms
    Route::resource('rooms', RoomController::class);
    Route::put('rooms/{room}/updateMedia', [RoomController::class, 'updateMedia'])->name('rooms.updateMedia');
    Route::put('rooms/{room}/updateSeo', [RoomController::class, 'updateSeo'])->name('rooms.updateSeo');

    //Facilities
    Route::resource('amenities', AmenityController::class);

    //Clients
    Route::resource('clients', ClientController::class);

    //Bookings
    Route::resource('bookings', BookingController::class);
});
