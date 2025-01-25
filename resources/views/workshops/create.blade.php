@extends('layouts.app')

@section('content')
<div class="container mx-auto py-5">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-blue-500 text-white text-center py-4">
                    <h1 class="text-2xl font-bold">Créer un nouvel atelier</h1>
                </div>
                <div class="p-6">
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('workshops.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Nom de l'atelier</label>
                            <input type="text" class="form-control block w-full px-3 py-2 border rounded" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                            <textarea class="form-control block w-full px-3 py-2 border rounded" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 font-bold mb-2">Date</label>
                            <input type="date" class="form-control block w-full px-3 py-2 border rounded" id="date" name="date" value="{{ old('date') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="duration" class="block text-gray-700 font-bold mb-2">Durée (en minutes)</label>
                            <input type="number" class="form-control block w-full px-3 py-2 border rounded" id="duration" name="duration" value="{{ old('duration') }}" required>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="bg-blue-500 text-black font-bold py-2 px-4 rounded hover:bg-blue-700">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .form-label {
        font-weight: bold;
        text-align: right;
        display: block;
    }
    .form-control {
        border-radius: 0;
        box-shadow: none;
        border-color: #ced4da;
    }
    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 0;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
