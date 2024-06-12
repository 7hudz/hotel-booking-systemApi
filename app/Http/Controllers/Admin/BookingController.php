<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.bookings.index', ['bookings' => Booking::all()]);
    }

    public function show($id)
    {
        return view('admin.bookings.show', ['booking' => Booking::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return redirect()->route('admin.bookings.index');
    }

    public function destroy($id)
    {
        Booking::destroy($id);
        return redirect()->route('admin.bookings.index');
    }
}
