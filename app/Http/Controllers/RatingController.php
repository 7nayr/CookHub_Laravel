<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request, $recipeId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $recipe = Recipe::findOrFail($recipeId);

        Rating::create([
            'recipe_id' => $recipe->id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        // Mettre à jour la note moyenne de la recette
        $recipe->average_rating = $recipe->ratings()->avg('rating');
        $recipe->save();

        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Votre avis a été ajouté avec succès !');
    }
}
