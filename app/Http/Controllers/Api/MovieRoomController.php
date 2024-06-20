<?php

namespace App\Http\Controllers\Api;

use App\Models\MovieRoom;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;


class MovieRoomController extends Controller
{
    public function index()
    {
        $projections = MovieRoom::with('movie', 'room', 'slot')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Projections retrieved successfully',
            'results' => $projections
        ], 200);
    }

    public function getSlots(Request $request)
    {
        if ($request->query('rid') && $request->query('pdate')) {
            $rid = $request->query('rid');
            $pdate = $request->query('pdate');
            $slots_projection = MovieRoom::where('room_id', $rid)
                ->where('date_projection', $pdate)->get();
        }else{
            $slots_projection =[];
           
        }
        $slotIdOccupati = [];
        foreach ($slots_projection as $slot) {
            $slotIdOccupati[] = $slot->slot_id;
        }
            //crea un array slotIdOccupati che contiene l'id di tutti i slot occupati
            //slot_projection sono le proiezioni di una data in una data stanza
            $allSlots = Slot::all();
            $results= [];
            foreach ($allSlots as $slot) {
                if (!in_array($slot->id, $slotIdOccupati)) { //se l'id del slot è nell$slot->id            {
                    $results[] = $slot;
                }
            }
        return response()->json([
            'status' => 'success',
            'message' => 'Projections retrieved successfully',
            'results' => $results
        ], 200);
    }
}