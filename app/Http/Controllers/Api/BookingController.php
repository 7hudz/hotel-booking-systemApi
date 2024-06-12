<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::all();
    }

    public function show($id)
    {
        return Booking::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|string|in:approved,rejected,pending',
        ]);

        return Booking::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return $booking;
    }

    public function destroy($id)
    {
        Booking::destroy($id);
        return response()->noContent();
    }
}
