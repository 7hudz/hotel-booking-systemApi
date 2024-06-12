<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\AuthController;



Route::middleware('api')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('api')->group(function () {
    Route::get('/rooms', [RoomController::class, 'index']);
    Route::post('/rooms', [RoomController::class, 'store']);
    Route::get('/rooms/{id}', [RoomController::class, 'show']);
    Route::put('/rooms/{id}', [RoomController::class, 'update']);
    Route::delete('/rooms/{id}', [RoomController::class, 'destroy']);

    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/bookings', [BookingController::class, 'store']);
    Route::get('/bookings/{id}', [BookingController::class, 'show']);
    Route::put('/bookings/{id}', [BookingController::class, 'update']);
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);
});


