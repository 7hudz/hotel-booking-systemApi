<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->enum('room',['single', 'double', 'suite']);
            $table->foreignId('client_id')->constrained();
            $table->foreignId('room_id')->constrained();
            $table->enum('status', ['approved', 'rejected', 'pending']);
            $table->timestamp('booked_at');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
