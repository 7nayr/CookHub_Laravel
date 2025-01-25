@extends('layouts.app')

@section('content')
<div class="container mx-auto py-5">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-blue-500 text-white text-center py-4">
                    <h1 class="text-2xl font-bold">Créer une Nouvelle Recette</h1>
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

                    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-bold mb-2">Titre de la recette</label>
                            <input type="text" class="form-control block w-full px-3 py-2 border rounded" id="title" name="title" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                            <textarea class="form-control block w-full px-3 py-2 border rounded" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 font-bold mb-2">Catégorie</label>
                            <input type="text" class="form-control block w-full px-3 py-2 border rounded" id="category" name="category" required>
                        </div>
                        <div class="mb-4">
                            <label for="ingredients" class="block text-gray-700 font-bold mb-2">Ingrédients</label>
                            <textarea class="form-control block w-full px-3 py-2 border rounded" id="ingredients" name="ingredients" rows="3" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="instructions" class="block text-gray-700 font-bold mb-2">Instructions</label>
                            <textarea class="form-control block w-full px-3 py-2 border rounded" id="instructions" name="instructions" rows="5" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                            <input type="file" class="form-control block w-full px-3 py-2 border rounded" id="image" name="image" required>
                        </div>
                        <div class="mb-4">
                            <label for="comment" class="block text-gray-700 font-bold mb-2">Commentaire</label>
                            <textarea class="form-control block w-full px-3 py-2 border rounded" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="bg-blue-500 text-black font-bold py-2 px-4 rounded hover:bg-blue-700">Créer la recette</button>
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
