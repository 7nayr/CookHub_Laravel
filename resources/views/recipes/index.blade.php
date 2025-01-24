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
        background: rgba(0, 0, 0, 0.3); /* Adjust the opacity as needed */
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
    @if (Auth::check() && Auth::user()->hasRole('admin'))
        <div class="text-center mb-4">
            <a href="{{ route('recipes.create') }}" class="btn btn-success">Créer une nouvelle recette</a>
        </div>
    @endif

    <div class="row">
        @foreach($recipes as $recipe)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="{{ asset($recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $recipe->title }}</h5>
                    <p class="card-text">{{ $recipe->description }}</p>
                    <button class="btn btn-primary mt-auto" onclick="toggleRecipeModal('{{ $recipe->title }}', '{{ $recipe->description }}', '{{ asset($recipe->image) }}', '{{ $recipe->instructions }}')">
                        Voir la recette
                    </button>
                    @if (Auth::check() && Auth::user()->hasRole('admin'))
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div id="recipeModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title"></h5>
                <button type="button" class="btn-close" onclick="closeRecipeModal()"></button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid mb-3" alt="">
                <p id="modalDescription"></p>
                <h6>Instructions:</h6>
                <p id="modalInstructions"></p>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleRecipeModal(title, description, image, instructions) {
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalDescription').textContent = description;
        document.getElementById('modalImage').src = image;
        document.getElementById('modalInstructions').textContent = instructions;
        new bootstrap.Modal(document.getElementById('recipeModal')).show();
    }

    function closeRecipeModal() {
        let modalEl = document.getElementById('recipeModal');
        let modalInstance = bootstrap.Modal.getInstance(modalEl);
        modalInstance.hide();
    }
</script>

@endsection
