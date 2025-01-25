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
        position: relative;
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
    .toggle-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
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
                    <button class="toggle-btn" onclick="toggleDetails(this)">+</button>
                    <div class="recipe-details" style="display: none;">
                        <p><strong>Catégorie :</strong> {{ $recipe->category }}</p>
                        <p><strong>Ingrédients :</strong> {{ $recipe->ingredients }}</p>
                        <p><strong>Instructions :</strong> {{ $recipe->instructions }}</p>
                        <p><strong>Étoiles :</strong> {{ $recipe->etoiles }}</p>
                    </div>
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-warning mt-2">Modifier</a>
                    @if($recipe->ratings && $recipe->ratings->isNotEmpty())
                    @foreach($recipe->ratings as $rating)
                    <div class="mt-3">
                        <p><strong>Commentaire :</strong> {{ $rating->comment }}</p>
                        <a href="{{ route('ratings.edit', $rating->id) }}" class="btn btn-secondary">Modifier l'avis</a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function toggleDetails(button) {
        const details = button.nextElementSibling;
        if (details.style.display === "none") {
            details.style.display = "block";
            button.textContent = "-";
        } else {
            details.style.display = "none";
            button.textContent = "+";
        }
    }
</script>
@endsection
