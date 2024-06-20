<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieRoom extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }
    
    public function slot() {
        return $this->belongsTo(Slot::class);
    }

    
}
