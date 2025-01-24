@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Créer un nouvel atelier</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('workshops.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom de l'atelier</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
        </div>
        <div class="form-group">
            <label for="duration">Durée (en minutes)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
