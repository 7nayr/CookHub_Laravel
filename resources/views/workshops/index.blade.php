@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Liste des Ateliers Culinaires</h1>
    <div class="text-center mb-4">
        <a href="{{ route('workshops.create') }}" class="btn btn-success">Créer un nouvel atelier</a>
    </div>
    <div class="row">
        @foreach($workshops as $workshop)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $workshop->name }}</h5>
                    <p class="card-text">{{ $workshop->description }}</p>
                    <p><strong>Date :</strong> {{ $workshop->date }}</p>
                    <p><strong>Durée :</strong> {{ $workshop->duration }} minutes</p>
                    <p><strong>Participants :</strong></p>
                    <ul>
                        @foreach($workshop->participants as $participant)
                        <li>{{ $participant->name }} ({{ $participant->email }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
