<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    // Méthode pour afficher le formulaire de création de recette
    public function create()
    {
        return view('recipes.create');
    }

    // Méthode pour enregistrer une nouvelle recette
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Recipe::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'instructions' => $request->input('instructions'),
            'image' => $imagePath,
        ]);

        return redirect()->route('recipes.index')->with('success', 'Recette créée avec succès !');
    }

    // Méthode pour afficher la liste des recettes
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    // Méthode pour supprimer une recette
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recette supprimée avec succès !');
    }
}
