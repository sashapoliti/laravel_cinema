<?php

namespace App\Http\Controllers\Api;

use App\Models\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with([
            'movie_rooms' => function ($query) {
                $query->whereNotNull('date_projection')
                    ->whereBetween('date_projection', [Carbon::today(), Carbon::today()->addDays(7)]);
            },
            'movie_rooms.room',
            'movie_rooms.slot',
            'reviews',
        ])->whereHas('movie_rooms', function ($query) {
            $query->whereNotNull('date_projection')
                ->whereBetween('date_projection', [Carbon::today(), Carbon::today()->addDays(7)]);
        })->get();


        return response()->json([
            'status' => 'success',
            'message' => 'Movies retrieved successfully',
            'results' => $movies
        ], 200);
    }
}
