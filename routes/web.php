<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\RatingController;

Route::get('/', function () {
    return view('welcome');
});

// Formulaire pour créer une recette
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
Route::delete('/workshops/{workshop}', [WorkshopController::class, 'destroy'])->name('workshops.destroy');
Route::get('/workshops/{workshop}/edit', [WorkshopController::class, 'edit'])->name('workshops.edit');
Route::put('/workshops/{workshop}', [WorkshopController::class, 'update'])->name('workshops.update');
// Soumettre le formulaire pour créer une recette
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Admin Dashboard';
    })->name('admin.dashboard');
});


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('recipes', RecipeController::class);
});

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');

// Route pour afficher la liste des ateliers
Route::get('/workshops', [WorkshopController::class, 'index'])->name('workshops.index');

// Route pour afficher le formulaire de création
Route::get('/workshops/create', [WorkshopController::class, 'create'])->name('workshops.create');


// Route pour enregistrer un nouvel atelier
Route::post('/workshops', [WorkshopController::class, 'store'])->name('workshops.store');


Route::resource('recipes', RecipeController::class);
Route::post('recipes/{recipe}/ratings', [RatingController::class, 'store'])->name('ratings.store');


Route::resource('recipes', RecipeController::class);
Route::post('recipes/{recipe}/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::resource('recipes', RecipeController::class);
Route::post('recipes/{recipe}/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('ratings/{rating}/edit', [RatingController::class, 'edit'])->name('ratings.edit');
Route::put('ratings/{rating}', [RatingController::class, 'update'])->name('ratings.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('recipes', RecipeController::class)->except(['destroy']);
    Route::post('recipes/{recipe}/ratings', [RatingController::class, 'store'])->name('ratings.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
    Route::resource('recipes', RecipeController::class)->only(['destroy']);
});
require __DIR__.'/auth.php';
