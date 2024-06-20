<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Rooms retrieved successfully',
            'results' => $rooms
        ], 200);
    }
}
