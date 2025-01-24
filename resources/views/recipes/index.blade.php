@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    body {
        background-image: url('{{ asset('images/background.jpeg') }}');
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
        position: relative;
        z-index: 0;
    }
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(5px);
        z-index: -1;
    }
    .card {
        transition: transform 0.2s;
        height: 100%;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }
    .card-text {
        flex-grow: 1;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .modal-header {
        background-color: #007bff;
        color: white;
    }
    .btn-close {
        color: white;
    }
</style>

<div class="container py-5">
    <h1 class="text-center mb-4">Nos Recettes</h1>

    <div class="text-center mb-4">
        <a href="{{ route('recipes.create') }}" class="btn btn-success">Créer une nouvelle recette</a>
    </div>

    <div class="row">
        @foreach($recipes as $recipe)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $recipe->title }}</h5>
                    <p class="card-text">{{ $recipe->description }}</p>
                    <p><strong>Catégorie :</strong> {{ $recipe->category }}</p>
                    <p><strong>Ingrédients :</strong> {{ $recipe->ingredients }}</p>
                    <p><strong>Instructions :</strong> {{ $recipe->instructions }}</p>
                    <p><strong>Note moyenne :</strong> {{ $recipe->average_rating }}</p>
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-warning mt-2">Modifier</a>
                    <form action="{{ route('ratings.store', $recipe->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="rating" class="form-label">Note</label>
                            <select class="form-select" id="rating" name="rating" required>
                                <option value="1">1 étoile</option>
                                <option value="2">2 étoiles</option>
                                <option value="3">3 étoiles</option>
                                <option value="4">4 étoiles</option>
                                <option value="5">5 étoiles</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Commentaire</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
