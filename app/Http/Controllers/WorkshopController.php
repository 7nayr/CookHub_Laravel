<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class WorkshopController extends Controller
{
    // Affiche la liste des ateliers
    public function index()
    {
        $workshops = Workshop::all();
        return view('workshops.index', compact('workshops'));
    }

    // Affiche le formulaire pour créer un atelier
    public function create()
    {
        return view('workshops.create');
    }

    // Enregistre un nouvel atelier
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'duration' => 'required|integer',
        ]);

        $workshop = new Workshop([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'date' => $request->get('date'),
            'duration' => $request->get('duration'),
        ]);

        $workshop->save();

        return redirect()->route('workshops.index')->with('success', 'Workshop created successfully.');
    }

    public function destroy($id)
    {
        $workshop = Workshop::findOrFail($id);
        $workshop->delete();

        return redirect()->route('workshops.index')->with('success', 'Workshop deleted successfully.');
    }

    public function edit($id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('workshops.edit', compact('workshop'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'duration' => 'required|integer',
        ]);

        $workshop = Workshop::findOrFail($id);
        $workshop->name = $request->get('name');
        $workshop->description = $request->get('description');
        $workshop->date = $request->get('date');
        $workshop->duration = $request->get('duration');
        $workshop->save();

        return redirect()->route('workshops.index')->with('success', 'Workshop updated successfully.');
    }
}
