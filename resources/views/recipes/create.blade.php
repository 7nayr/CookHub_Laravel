@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Créer une Nouvelle Recette</h1>
    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-white">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titre de la recette</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions</label>
            <textarea class="form-control" id="instructions" name="instructions" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Créer la recette</button>
        <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
