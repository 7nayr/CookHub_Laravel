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

        Workshop::create($request->all());

        return redirect()->route('workshops.index')->with('success', 'Atelier créé avec succès !');
    }
}
