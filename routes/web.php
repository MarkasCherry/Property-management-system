<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AmenitiesController;

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
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //Properties
    Route::resource('properties', PropertyController::class);
    Route::put('properties/{property}/updateDescription', [PropertyController::class, 'updateDescription'])->name('properties.updateDescription');
    Route::put('properties/{property}/updateMedia', [PropertyController::class, 'updateMedia'])->name('properties.updateMedia');
    Route::put('properties/{property}/updateSeo', [PropertyController::class, 'updateSeo'])->name('properties.updateSeo');

    //Facilities
    Route::resource('amenities', AmenitiesController::class);
});
