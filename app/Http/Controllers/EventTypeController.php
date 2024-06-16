<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    
    public function index()
    {
        $eventTypes = EventType::all();
        return view('eventTypes.index', compact('eventTypes'));
    }

    public function create()
    {
        return view('eventTypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|max:80',
            'description' =>'required|max:80'
            
        ]);
        $eventType = new EventType;
        $eventType->name=$request->input('name');
        $eventType->description=$request->input('description');
        $eventType->save();

        return redirect()->route('event_types.index')->with('success', '¡Event Type created successfully!'); 

    }

    public function show($id)
    {
        $eventType = EventType::findOrFail($id);
        return view('eventTypes.show', compact('eventType'));
    }

    public function edit($id)
    {
        $eventType = EventType::findOrFail($id);
        return view('eventTypes.edit', compact('eventType'));
    }

    public function update(Request $request, $id)
    {

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Encontrar el registro existente y actualizarlo
        $eventType = EventType::findOrFail($id);
        $eventType->name = $validatedData['name'];
        $eventType->description = $validatedData['description'] ?? $eventType->description;
        $eventType->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('event_types.index')->with('success', '!Event Type updated successfully!');
    }

    public function destroy($id)
    {
        $eventType = EventType::findOrFail($id);
        $eventType->delete();
        return redirect()->route('event_types.index')->with('success', '!Event Type deleted successfully!');
    }
}
