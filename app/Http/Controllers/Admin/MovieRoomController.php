<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\MovieRoom;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Slot;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovieRoomRequest;
use App\Http\Requests\UpdateMovieRoomRequest;

class MovieRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        $query = MovieRoom::query();
        $movies = Movie::all();
        $rooms = Room::all();
        if ($request->has('date') && $request->date) {
            $query->whereDate('date_projection', $request->date);
        }
    
        $movieRoom = $query->get();
    
        return view('admin.movie_rooms.index', compact('movieRoom', 'movies', 'rooms'));
    }

    /*
{
    $query = MovieRoom::query();

    if ($request->has('date') && $request->date) {
        $query->whereDate('date_projection', $request->date);
    }

    $movieRoom = $query->get();

    return view('admin.movie_rooms.index', compact('movieRoom'));
}
    
    */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        $rooms = Room::all();
        $slots = Slot::all();
        return view('admin.movie_rooms.create', compact('movies', 'rooms', 'slots'));    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRoomRequest $request)
    {
        $form_data = $request->validated();
        $ceck = MovieRoom::where('slot_id', $form_data['slot_id'])->where('date_projection', $form_data['date_projection'])->where('room_id', $form_data['room_id'])->first();
        // if($ceck){
        //     return redirect()->route('admin.movie_rooms.create')->with('message', 'Nella stanza'. $form_data['room_id'] .'  per la proiezione del'. $form_data['date_projection']. 'è già programmato' . $ceck->movie->title . ' nello slot ' . $ceck->slot->time_slot);
        // }
        $newMovieRoom = new MovieRoom();
        $room = Room::findOrFail($form_data['room_id']);
        if($room->isense == 1 ){
            $form_data['ticket_price'] = $room->base_price + 3;
        } else{
            $form_data['ticket_price'] = $room->base_price;
        }
        $newMovieRoom->fill($form_data);
        $newMovieRoom->save();
        if ($request->has('room_id')) {
            $newMovieRoom->room()->associate($request->room_id);
        }
        if ($request->has('movie_id')) {
            $newMovieRoom->movie()->associate($request->movie_id);
        }
        if ($request->has('slot_id')) {
            $newMovieRoom->slot()->associate($request->slot_id);
        }
        return redirect()->route('admin.movie_rooms.index')->with('message', 'Proiezione id:'. $newMovieRoom->id .' creata con successo');
     }

    /**
     * Display the specified resource.
     */
    public function show(MovieRoom $movieRoom)
    {
        return view('admin.movie_rooms.show', compact('movieRoom'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MovieRoom $movieRoom)
    {
        $movies = Movie::all();
        $rooms = Room::all();
        $slots = Slot::all();
        
        return view('admin.movie_rooms.edit', compact('movies', 'rooms', 'slots', 'movieRoom'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MovieRoom $movieRoom)
    {
        $data_update = $request->all();
        $room = Room::findOrFail($data_update['room_id']);
        if($room->isense == 1 ){
            $data_update['ticket_price'] = $room->base_price + 3;
        } else{
            $data_update['ticket_price'] = $room->base_price;
        }
        $movieRoom->update($data_update);
        return redirect()->route('admin.movie_rooms.index')->with('message', 'Proiezione modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovieRoom $movieRoom)
    {
        
        $movieRoom->delete();
        return redirect()->route('admin.movie_rooms.index')->with('message', 'La proiezione del'. $movieRoom->date_projection .'è stata cancellata con successo');
    }
}
