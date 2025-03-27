@extends('backOffice.layouts.app')

@section('content')
    <h1>Détails du Terrain : {{ $terrain->name }}</h1>

    <p><strong>Description :</strong> {{ $terrain->description }}</p>

    <p><strong>Prix :</strong> {{ $terrain->prix }} €</p>

    <p><strong>Disponibilité :</strong> {{ $terrain->disponibility }}</p>

    <p><strong>Adresse :</strong> {{ $terrain->adresse }}</p>

    <p><strong>Catégorie :</strong> {{ $terrain->categorie->name ?? 'Non spécifié' }}</p>

    <p><strong>Tags :</strong> 
        @forelse($terrain->tags as $tag)
            <span>{{ $tag->name }}</span>
        @empty
            <span>Aucun tag</span>
        @endforelse
    </p>

    <p><strong>Sponsors :</strong> 
        @forelse($terrain->sponsors as $sponsor)
            <span>{{ $sponsor->name }}</span>
        @empty
            <span>Aucun sponsor</span>
        @endforelse
    </p>

    <p><strong>Photo :</strong></p>
    <img src="{{ asset('storage/' . $terrain->photo) }}" alt="{{ $terrain->name }}" width="200">

    <br>
    <a href="{{ route('terrains.index') }}">Retour à la liste</a>
@endsection
