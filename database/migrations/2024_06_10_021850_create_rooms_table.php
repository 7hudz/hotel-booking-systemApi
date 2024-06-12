<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
           $table->id();
    $table->string('name');
    $table->unsignedBigInteger('room_type_id');
    $table->enum('status', ['available', 'booked', 'pending']);
    $table->timestamps();

    $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
