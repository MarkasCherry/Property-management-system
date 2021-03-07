<?php

namespace App\Http\Controllers;

use App\Http\Requests\DescriptionRequest;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::active()->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(PropertyRequest $request)
    {
        Property::create($request->validated());

        return redirect()->route('properties.index')->with('success', __('New property has been successfully added!'));
    }

    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->validated());

        return redirect()->back()->with('success', __('Main property settings has been updated!'));
    }

    public function updateDescription(DescriptionRequest $request, Property $property)
    {
        $property->update($request->validated());

        return redirect()->back()->with('success', __('Property description has been updated!'));
    }
}
