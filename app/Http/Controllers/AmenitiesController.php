<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    public function index()
    {
        $amenities = Amenity::active()->get();

        return view('amenities.index', compact('amenities'));
    }

    public function create()
    {
        return view('amenities.create');
    }

    public function edit()
    {
        return view('amenities.create');
    }
}
