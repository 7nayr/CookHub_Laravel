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
        color: #4CAF50; /* Green color for titles */
    }
    .card-text {
        flex-grow: 1;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #FF9800; /* Orange color for text */
    }
    .modal-header {
        background-color: #673AB7; /* Purple color for modal header */
        color: white;
    }
    .btn-close {
        color: white;
    }
    .btn-success {
        background-color: #8BC34A; /* Light green color for buttons */
        border-color: #8BC34A;
    }
    .btn-danger {
        background-color: #ff1100; /* Red color for delete button */
        border-color: #F44336;
    }
    .btn-warning {
        background-color: #FFC107; /* Yellow color for edit button */
        border-color: #FFC107;
    }
    .btn-round {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: white;
        background-color: #4CAF50; /* Green color for round button */
        border: none;
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>

<div class="container py-5">
    <h1 class="text-center mb-4">Liste des Ateliers Culinaires</h1>
    <div class="text-center mb-4">
        <a href="{{ route('workshops.create') }}" class="btn btn-success">Créer un nouvel atelier</a>
    </div>
    <div class="row">
        @foreach($workshops as $workshop)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 position-relative">
                <button class="btn btn-round" id="register-btn-{{ $workshop->id }}" onclick="registerWorkshop('{{ $workshop->id }}')">V</button>
                <div class="card-body">
                    <h5 class="card-title">{{ $workshop->name }}</h5>
                    <p class="card-text">{{ $workshop->description }}</p>
                    <p><strong>Date :</strong> {{ $workshop->date }}</p>
                    <p><strong>Durée :</strong> {{ $workshop->duration }} minutes</p>
                    <form action="{{ route('workshops.destroy', $workshop->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet atelier ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <a href="{{ route('workshops.edit', $workshop->id) }}" class="btn btn-warning mt-2">Modifier</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function registerWorkshop(workshopId) {
        // Simulate registration process
        alert('Vous vous êtes inscrit à l\'atelier ' + workshopId);
        document.getElementById('register-btn-' + workshopId).style.display = 'none';
    }
</script>
@endsection
