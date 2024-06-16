<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use App\Models\Animal;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $events = Event::with(['eventType', 'animal'])->paginate(4);
        return view('events.index', compact('events'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eventTypes = EventType::all();
        $animals = Animal::all();
        return view('events.create', compact('eventTypes', 'animals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'event_type_id' => 'required|exists:event_types,id',
            'animal_id' => 'required|exists:animals,id',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);

        Event::create($validated);

        return redirect()->route('events.index')->with('success', '¡Registro exitoso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    


    //public function show($id)
    //{
    //   $animal = Animal::findOrFail($id);
    //    return view('animals.show', compact('animal'));
    //}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $eventTypes = EventType::all();
        $animals = Animal::all();
        return view('events.edit', compact('event', 'eventTypes', 'animals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            
            'event_type_id' => 'required|exists:event_types,id',
            'animal_id' => 'required|exists:animals,id',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', '¡Actualización exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', '!Event deleted successfully!');
    }
}
