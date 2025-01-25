<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
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
        ]);

        // Redirection avec un message de succès
        return redirect()->route('recipes.index')->with('success', 'Recette créée avec succès !');
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $recipe = Recipe::findOrFail($id);

        if ($request->hasFile('image')) {
            // Sauvegarde de la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            $recipe->image = $imagePath;
        }

        $recipe->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
        ]);

        // Redirection avec un message de succès
        return redirect()->route('recipes.index')->with('success', 'Recette mise à jour avec succès !');
    }

    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);

        if (Auth::user()->isAdmin() || Auth::id() === $recipe->user_id) {
            $recipe->delete();
            return redirect()->route('recipes.index')->with('success', 'Recette supprimée avec succès !');
        }

        return redirect()->route('recipes.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette recette.');
    }
}
