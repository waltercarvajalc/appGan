<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|max:80',
            'description' =>'required|max:80'
            
        ]);
        $medicine = new Medicine;
        $medicine->name=$request->input('name');
        $medicine->description=$request->input('description');
        $medicine->save();

        //return redirect('medicines');
        return redirect()->route('medicines.index')->with('success', '¡Registro exitoso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('medicines.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('medicines.edit', compact('medicine'));
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
        $medicine = Medicine::findOrFail($id);
        $medicine->name = $validatedData['name'];
        $medicine->description = $validatedData['description'] ?? $medicine->description;
        $medicine->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('medicines.index')->with('success', '!Medicine updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', '!Medicine deleted successfully!');
    }
}
