<?php

namespace App\Http\Controllers;

use App\Google\GoogleMapsAPI;
use App\Http\Requests\DescriptionRequest;
use App\Http\Requests\PropertyRequest;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\SeoRequests;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(10);

        return view('properties.index', compact('properties'));
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(PropertyRequest $request): RedirectResponse
    {
        $property = Property::create($request->validated());

        return redirect()->route('properties.edit', $property)
            ->with('success', __('New property has been successfully added! Now you can fill the additional information and make property publicly visible'));
    }

    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function addRoom(Property $property)
    {
        return view('properties.rooms.create', compact('property'));
    }

    public function storeRoom(RoomRequest $request, Property $property): RedirectResponse
    {
        $property->rooms()->create($request->validated() + [
            'code' => 'p' . $property->id . '-r' . ($property->rooms()->count() + 1)
        ]);

        return redirect()->route('properties.show', $property);
    }

    public function update(PropertyRequest $request, Property $property): RedirectResponse
    {
        $property->update($request->validated());

        $googleMaps = new GoogleMapsAPI;
        $googleMaps->setLocation($request->get('address'));

        $property->update([
            'address' => $googleMaps->getData()->formatted_address ?? $request->get('address')
        ]);

        return back()->with('success', __('Main property settings has been updated!'));
    }

    public function destroy(Property $property)
    {
        $property->delete();
    }

    public function updateDescription(DescriptionRequest $request, Property $property)
    {
        $property->update($request->validated());

        return back()->with('success', __('Property description has been updated!'));
    }

    public function updateMedia(Request $request, Property $property)
    {
        dd('media upload');
    }

    public function updateSeo(SeoRequests $request, Property $property)
    {
        $property->update($request->validated());

        return back()->with('success', __('Seo Settings has been updated!'));
    }

    public function updateAmenities(Request $request, Property $property) {
        $property->amenities()->sync($request->get('amenities'));

        return back()->with('success', __('Property amenities has been updated!'));
    }
}
