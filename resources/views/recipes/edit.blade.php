@extends('layouts.app')

@section('content')
<div class="container mx-auto py-5">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-blue-500 text-white text-center py-4">
                    <h1 class="text-2xl font-bold">Modifier la Recette</h1>
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

                    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-bold mb-2">Titre de la recette</label>
                            <input type="text" class="form-control block w-full px-3 py-2 border rounded" id="title" name="title" value="{{ old('title', $recipe->title) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                            <textarea class="form-control block w-full px-3 py-2 border rounded" id="description" name="description" rows="3" required>{{ old('description', $recipe->description) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 font-bold mb-2">Catégorie</label>
                            <input type="text" class="form-control block w-full px-3 py-2 border rounded" id="category" name="category" value="{{ old('category', $recipe->category) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="ingredients" class="block text-gray-700 font-bold mb-2">Ingrédients</label>
                            <textarea class="form-control block w-full px-3 py-2 border rounded" id="ingredients" name="ingredients" rows="3" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="instructions" class="block text-gray-700 font-bold mb-2">Instructions</label>
                            <textarea class="form-control block w-full px-3 py-2 border rounded" id="instructions" name="instructions" rows="5" required>{{ old('instructions', $recipe->instructions) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="stars" class="block text-gray-700 font-bold mb-2">Étoiles</label>
                            <input type="number" class="form-control block w-full px-3 py-2 border rounded" id="stars" name="stars" min="1" max="5" required>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                            <input type="file" class="form-control block w-full px-3 py-2 border rounded" id="image" name="image">
                            @if($recipe->image)
                                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="mt-2 w-32 h-32 object-cover rounded">
                            @endif
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="bg-black text-white font-bold py-2 px-4 rounded hover:bg-gray-700">Mettre à jour la recette</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
