<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.rooms.index', ['rooms' => Room::all()]);
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'status' => 'required|string|in:available,booked,pending',
        ]);

        Room::create($request->all());
        return redirect()->route('admin.rooms.index');
    }

    public function edit($id)
    {
        return view('admin.rooms.edit', ['room' => Room::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());
        return redirect()->route('admin.rooms.index');
    }

    public function destroy($id)
    {
        Room::destroy($id);
        return redirect()->route('admin.rooms.index');
    }
}
