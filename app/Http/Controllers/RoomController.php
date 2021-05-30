<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Requests\SeoRequests;
use App\Models\Property;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function edit(Room $room)
    {
        return view('properties.rooms.edit', compact('room'));
    }

    public function update(RoomRequest $request, Room $room): RedirectResponse
    {
        $room->update($request->validated());

        return back()->with('success', __('Main settings has been updated'));
    }

    public function destroy(Room $room)
    {
        $room->delete();
    }

    public function updateMedia(Request $request, Room $room)
    {
        dd('media upload');
    }

    public function updateSeo(SeoRequests $request, Room $room): RedirectResponse
    {
        $room->update($request->validated());

        return back()->with('success', __('Seo Settings has been updated!'));
    }
}
