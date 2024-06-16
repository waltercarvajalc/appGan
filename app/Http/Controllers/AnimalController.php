<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\breed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    
    public function index()
    {
        $animals = Animal::with('breed')->paginate(4);
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        $breeds = Breed::all();
        return view('animals.create', compact('breeds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'birthdate'=>'required|date',
            'breed_id'=>'required|numeric',
            'sex'=>'required',
            'father'=>'required',
            'mother'=>'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $animal = Animal::create($request->all());

        if($request->hasFile('image')){
            $nombre = $animal->id.'.'.$request->file('image')->getClientOriginalExtension();
            $img = $request->file('image')->storeAs('public/img',$nombre);
            $animal->image = '/img/'.$nombre;
            $animal->save();
        }
        
        return redirect()->route('animals.index')->with('success','!Animal creado satisfactoriamente!');
    }
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animals.show', compact('animal'));
    }

    public function showTreatments(Animal $animal)
    {
        $treatments = $animal->treatments()->with('medicines')->get();
        return view('animals.treatments', compact('animal', 'treatments'));
    }

    public function showEvents(Animal $animal)
    {
        // Cargar los eventos del animal con el tipo de evento
        $events = $animal->events()->with('eventType')->get();
        return view('animals.events', compact('animal', 'events'));
    }
    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $breeds = Breed::all();
        return view('animals.edit', compact('animal', 'breeds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
    $request->validate([
        'name' => 'required',
        'birthdate' => 'required|date',
        'breed_id' => 'required|numeric',
        'sex' => 'required',
        'father' => 'required',
        'mother' => 'required',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

        // Buscar el animal por ID
        $animal = Animal::findOrFail($id);

        // Actualizar los datos del animal excepto la imagen
        $animal->update($request->all());

        // Manejo de la imagen
        if ($request->hasFile('image')) {
            // Borrar la imagen anterior si existe
            if ($animal->image) {
                Storage::delete('public' . $animal->image);
            }

            // Guardar la nueva imagen
            $nombre = $animal->id . '.' . $request->file('image')->getClientOriginalExtension();
            $img = $request->file('image')->storeAs('public/img', $nombre);
            $animal->image = '/img/' . $nombre;
            $animal->save();
        }

        return redirect()->route('animals.index')->with('success', '!Animal actualizado!');
    }
    
    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->route('animals.index')->with('success', '!Animal deleted successfully!');
    }
}
