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
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
