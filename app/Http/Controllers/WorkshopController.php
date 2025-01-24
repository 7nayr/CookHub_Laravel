<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Participant;

class WorkshopController extends Controller
{
    // Affiche la liste des ateliers
    public function index()
    {
        $workshops = Workshop::with('participants')->get();
        return view('workshops.index', compact('workshops'));
    }

    // Affiche le formulaire pour créer un atelier
    public function create()
    {
        $participants = Participant::all();
        return view('workshops.create', compact('participants'));
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

        $workshop = Workshop::create($request->all());

        // Ajouter des participants (exemple)
        $participants = Participant::find($request->input('participants'));
        $workshop->participants()->attach($participants);

        return redirect()->route('workshops.index')->with('success', 'Atelier créé avec succès !');
    }
}
