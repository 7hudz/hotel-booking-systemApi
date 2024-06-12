<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
