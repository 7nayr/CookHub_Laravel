<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    // Affiche le formulaire de création de recette
    public function create()
    {
        return view('recipes.create');
    }

    // Gère l'enregistrement d'une nouvelle recette
    public function store(Request $request)
    {
        // Validation des données envoyées
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Sauvegarde de l'image
        $imagePath = $request->file('image')->store('images', 'public');

        // Création de la recette
        Recipe::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'instructions' => $request->input('instructions'),
            'image' => $imagePath,
        ]);



        // Redirection avec un message de succès
        return redirect()->route('recipes.index')->with('success', 'Recette créée avec succès !');
    }
}
