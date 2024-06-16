<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    
    public function index()
    {
        $breeds = Breed::paginate(4);
        return view('breeds.index', compact('breeds'));
    }

    public function create()
    {
        return view('breeds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|max:80',
            'description' =>'required|max:80'
            
        ]);
        $breed = new Breed;
        $breed->name=$request->input('name');
        $breed->description=$request->input('description');
        $breed->save();

        //return redirect('breeds');
        return redirect()->route('breeds.index')->with('success', '¡Registro exitoso!');     
    }
        
    public function show($id)
    {
        $breed = Breed::findOrFail($id);
        return view('breeds.show', compact('breed'));
    }
    public function edit($id)
    {
        $breed = Breed::findOrFail($id);
        return view('breeds.edit', compact('breed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

         // Validar los datos de entrada
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Encontrar el registro existente y actualizarlo
        $breed = Breed::findOrFail($id);
        $breed->name = $validatedData['name'];
        $breed->description = $validatedData['description'] ?? $breed->description;
        $breed->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('breeds.index')->with('success', '!Breed updated successfully!');
    }
    public function destroy($id)
    {
        $breed = Breed::findOrFail($id);

         // Antes de eliminar la raza, verifica si tiene animales asociados
         if ($breed->animals()->count() > 0) {
            return redirect()->route('breeds.index')->with('error', 'No se puede eliminar la raza porque tiene animales asociados.');
        }else{
            // Eliminar la raza
        $breed->delete();

        return redirect()->route('breeds.index')->with('success', 'Ok');
        }

        
    }
}
