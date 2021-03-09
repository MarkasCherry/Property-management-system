<?php

namespace App\Http\Controllers;

use App\Google\GoogleMapsAPI;
use App\Http\Requests\DescriptionRequest;
use App\Http\Requests\PropertyRequest;
use App\Http\Requests\SeoRequests;
use App\Models\Property;
use Illuminate\Http\Request;
use Sopamo\LaravelFilepond\Filepond;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(PropertyRequest $request)
    {
        $property = Property::create($request->validated());

        return redirect()->route('properties.edit', $property)
            ->with('success', __('New property has been successfully added! Now you can fill the additional information and make property publicly visible'));
    }

    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->validated());

        $googleMaps = new GoogleMapsAPI;
        $googleMaps->setLocation($request->get('address'));

        $property->update([
            'address' => $googleMaps->getData()->formatted_address ?? 'unknown'
        ]);

        return redirect()->back()->with('success', __('Main property settings has been updated!'));
    }

    public function updateDescription(DescriptionRequest $request, Property $property)
    {
        $property->update($request->validated());

        return redirect()->back()->with('success', __('Property description has been updated!'));
    }

    public function updateMedia(Request $request, Property $property)
    {
        dd('media upload');
    }

    public function updateSeo(SeoRequests $request, Property $property)
    {
        $property->update($request->validated());

        return redirect()->back()->with('success', __('Seo Settings has been updated!'));
    }
}
