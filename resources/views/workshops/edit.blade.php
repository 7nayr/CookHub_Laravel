@extends('layouts.app')

@section('content')
<div class="container mx-auto py-5">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-blue-500 text-white text-center py-4">
                    <h1 class="text-2xl font-bold">Modifier l'atelier</h1>
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

                    <form action="{{ route('workshops.update', $workshop->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Nom de l'atelier</label>
                            <input type="text" class="form-control block w-full px-3 py-2 border rounded" id="name" name="name" value="{{ $workshop->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                            <textarea class="form-control block w-full px-3 py-2 border rounded" id="description" name="description" rows="3" required>{{ $workshop->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 font-bold mb-2">Date</label>
                            <input type="date" class="form-control block w-full px-3 py-2 border rounded" id="date" name="date" value="{{ $workshop->date }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="duration" class="block text-gray-700 font-bold mb-2">Durée (en minutes)</label>
                            <input type="number" class="form-control block w-full px-3 py-2 border rounded" id="duration" name="duration" value="{{ $workshop->duration }}" required>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="bg-blue-500 text-black font-bold py-2 px-4 rounded hover:bg-blue-700">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
