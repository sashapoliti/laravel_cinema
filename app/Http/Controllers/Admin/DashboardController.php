<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(5);
        $rooms = Room::all();
        return view('admin.dashboard', compact('movies', 'rooms'));
    }
}
