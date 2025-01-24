@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Modifier la Recette</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titre de la recette</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $recipe->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $recipe->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ $recipe->category }}" required>
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingrédients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required>{{ $recipe->ingredients }}</textarea>
        </div>
        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions</label>
            <textarea class="form-control" id="instructions" name="instructions" rows="5" required>{{ $recipe->instructions }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="img-thumbnail mt-2" width="150">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour la recette</button>
    </form>
</div>
@endsection
