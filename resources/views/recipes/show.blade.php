@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">{{ $recipe->title }}</h1>

    <div class="card mb-4">
        <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $recipe->title }}</h5>
            <p class="card-text">{{ $recipe->description }}</p>
            <p><strong>Catégorie :</strong> {{ $recipe->category }}</p>
            <p><strong>Ingrédients :</strong> {{ $recipe->ingredients }}</p>
@endsection
