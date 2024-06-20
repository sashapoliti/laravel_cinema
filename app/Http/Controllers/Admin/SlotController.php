<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slots = Slot::all();
        return view('admin.slots.index', compact('slots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'time_slot' => 'required|max:255',
            'start_time' => 'required|dateFormat:H:i',
            'end_time' => 'required|dateFormat:H:i|after:start_time',
        ]);
        $form_data = $request->all();
        $newSlot = Slot::create($form_data);
        return redirect()->route('admin.slots.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slot $slot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slot $slot)
    {
        return view('admin.slots.edit', compact('slot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slot $slot)
    {
        $request->validate([
            'time_slot' => 'required|max:255',
            'start_time' => 'required|dateFormat:H:i',
            'end_time' => 'required|dateFormat:H:i|after:start_time',
        ]);
        $form_data = $request->all();
        $slot->update($form_data);
        return redirect()->route('admin.slots.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slot $slot)
    {
        $slot->delete();
        return redirect()->route('admin.slots.index');

    }
}
