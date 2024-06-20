<?php
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\MovieRoomController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('movies', [MovieController::class, 'index']);

Route::get('rooms', [RoomController::class, 'index']);

Route::get('projections', [MovieRoomController::class, 'index']);

Route::get('freeslots', [MovieRoomController::class, 'getSlots']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
