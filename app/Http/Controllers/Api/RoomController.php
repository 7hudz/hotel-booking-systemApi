<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return Room::where('status', 'available')->get();
    }

    public function show($id)
    {
        return Room::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'status' => 'required|string|in:available,booked,pending',
        ]);

        return Room::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());
        return $room;
    }

    public function destroy($id)
    {
        Room::destroy($id);
        return response()->noContent();
    }
}
