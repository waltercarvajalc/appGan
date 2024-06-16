<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\Animal;
use App\Models\Medicine;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
   
    public function index()
    {
        //$treatments = Treatment::with('animal')->paginate(4);
        //return view('treatments.index', compact('treatments'));
        $treatments = Treatment::with('animal', 'medicines')->get();
        return view('treatments.index', compact('treatments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animals = Animal::all();
        $medicines = Medicine::all();
        return view('treatments.create', compact('animals', 'medicines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'date' => 'required|date',
            'detail' => 'required|string',
            'description' => 'required|string',
            'medicine_ids' => 'required|array',
            'medicine_ids.*' => 'exists:medicines,id',
        ]);

        $treatment = Treatment::create($request->only('animal_id', 'date', 'detail', 'description'));
        $treatment->medicines()->attach($request->medicine_ids);

        return redirect()->route('treatments.index')->with('success', 'Treatment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $treatment = Treatment::with('animal', 'medicines')->findOrFail($id);
        return view('treatments.show', compact('treatment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $treatment = Treatment::findOrFail($id);
        $animals = Animal::all();
        $medicines = Medicine::all();
        $selectedMedicines = $treatment->medicines->pluck('id')->toArray();

        return view('treatments.edit', compact('treatment', 'animals', 'medicines', 'selectedMedicines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',  
            'date' => 'required|date',
            'detail' => 'required|string',
            'description' => 'required|string',
            'medicine_ids' => 'required|array',
            'medicine_ids.*' => 'exists:medicines,id',
        ]);

        $treatment = Treatment::findOrFail($id);
        $treatment->update($request->only('animal_id', 'date', 'detail', 'description'));
        $treatment->medicines()->sync($request->medicine_ids);

        return redirect()->route('treatments.index')->with('success', 'Treatment updated successfully');
    }

    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->medicines()->detach();
        $treatment->delete();

        return redirect()->route('treatments.index')->with('success', 'Treatment deleted successfully');
    }
}
