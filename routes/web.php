<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

Route::middleware('auth:admin')->group(function () {
    Route::resource('admin/rooms', AdminRoomController::class);
    Route::resource('admin/bookings', AdminBookingController::class);
});
Route::get('/', function () {
    return view('welcome');
});
