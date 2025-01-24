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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Sauvegarde de l'image
        $imagePath = $request->file('image')->store('images', 'public');

        // Création de la recette
        Recipe::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'image' => $imagePath,
            'average_rating' => 0, // Initialement à 0
        ]);

        // Redirection avec un message de succès
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
