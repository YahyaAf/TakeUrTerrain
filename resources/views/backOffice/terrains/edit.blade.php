@extends('backOffice.layouts.app')

@section('content')
<form action="{{ route('terrains.update', $terrain->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="name">Nom</label>
    <input type="text" name="name" value="{{ old('name', $terrain->name) }}"><br>

    <label for="description">Description</label>
    <textarea name="description" cols="30" rows="10">{{ old('description', $terrain->description) }}</textarea><br>

    <label for="photo">Photo</label>
    <input type="file" name="photo" accept="image/*"><br>
    @if($terrain->photo)
        <img src="{{ asset('storage/' . $terrain->photo) }}" alt="Terrain Image" width="100">
    @endif
    <br>

    <label for="prix">Prix</label>
    <input type="number" name="prix" value="{{ old('prix', $terrain->prix) }}"><br>

    <label for="categorie">Catégorie</label>
    <select name="categorie_id">
        <option value="">Choisissez une catégorie</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $terrain->categorie_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br>

    <label for="disponibility">Disponibilité</label>
    <select name="disponibility">
        <option value="">Sélectionnez la disponibilité</option>
        <option value="disponible" {{ $terrain->disponibility == 'disponible' ? 'selected' : '' }}>Disponible</option>
        <option value="indisponible" {{ $terrain->disponibility == 'indisponible' ? 'selected' : '' }}>Indisponible</option>
    </select><br>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" value="{{ old('adresse', $terrain->adresse) }}"><br>

    <label for="tags">Tags</label>
    <select name="tags[]" multiple>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}" {{ $terrain->tags->contains($tag->id) ? 'selected' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select><br>

    <label for="sponsors">Sponsors</label>
    <select name="sponsors[]" multiple>
        @foreach($sponsors as $sponsor)
            <option value="{{ $sponsor->id }}" {{ $terrain->sponsors->contains($sponsor->id) ? 'selected' : '' }}>
                {{ $sponsor->name }}
            </option>
        @endforeach
    </select><br>

    <button type="submit">Mettre à jour</button>
</form>
@endsection
