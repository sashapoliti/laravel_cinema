<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function generateSlug($title){
        $slug = Str::slug($title, '-');
        
        return $slug;

    }

    /* public function rooms(){
        return $this->belongsToMany(Room::class);
    } */

    public function movie_rooms(){
        return $this->hasMany(MovieRoom::class);
    }

    public function reviews() {
        return $this->hasMany(review::class);
    }
}
