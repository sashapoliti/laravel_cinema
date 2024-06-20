<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rooms.create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $form_data = $request->validated();
        if ($request->hasFile('image')) {
            $path = Storage::put('img_room', $request->image);
            $form_data['img_room'] = $path;
        }

        $room = Room::create($form_data);
        return redirect()->route('admin.rooms.show', $room->id)->with('message', 'La sala' . $form_data['name'] . ' è stata creata');

    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('admin.rooms.show', compact('room'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $form_data = $request->validated();
            
        // if ($request->hasFile('image')) {
        //     if ($room->image) {
        //         Storage::delete($room->image);
        //     }
        //     $path = Storage::put('uploads', $form_data['image']);
        // }

        $room->update($form_data);
        return redirect()->route('admin.rooms.show', $room->id)->with('message', 'La sala' . $form_data['name'] . ' è stata modificata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('message', 'La sala' . $room->name . ' è stata eliminata');
    }
}
