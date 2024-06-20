<?php

use App\Http\Controllers\Admin\MovieRoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\SlotController;
use App\Http\Controllers\Admin\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

//middleware: una funzionalità che si pongono in mezzo tra la tua login e la risorsa da andare a prendere
Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('rooms',RoomController::class)->parameters(['rooms' => 'room:id']);
    Route::resource('movies',MovieController::class)->parameters(['movies' => 'movie:slug']);
    Route::resource('slots',SlotController::class)->parameters(['slots' => 'slot:id'])->except('show');
    Route::resource('movie_rooms', MovieRoomController::class)->parameters(['movieRoom' => 'movie_rooms:id'])->except('show');
    Route::resource('reviews', ReviewController::class)->parameters(['reviews' => 'review:id', 'movie' => 'movie:id'])->except('index', 'create');
    Route::get('movies/{movie}/reviews/create', [MovieController::class, 'createReview'])->name('movies.reviews.create');
});

// group: raggruppa tutte le rotte che posso avere qualcosa in comune
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::fallback(function () {
    return redirect()->route('admin.dashboard');
});
