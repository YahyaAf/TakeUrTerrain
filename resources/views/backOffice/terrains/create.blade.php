@extends('backOffice.layouts.app')

@section('content')
<form action="{{ route('terrains.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">name</label>
    <input type="text" name="name"><br>

    <label for="description">description</label>
    <textarea name="description" cols="30" rows="10"></textarea><br>

    <label for="photo">photo</label>
    <input type="file" name="photo" accept="image/*"><br>

    <label for="prix">Prix</label>
    <input type="number" name="prix"><br>


    <label for="categorie">categorie</label>
    <select name="categorie_id" id="">
        <option value="">chose ur categorie</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br>

    <label for="disponibility">Disponibility</label>
    <select name="disponibility" id="">
        <option value="">select votre disponibility</option>
        <option value="disponible">disponible</option>
        <option value="indisponible">indisponible</option>
    </select><br>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse"><br>

    <label for="tags">Tags</label>
    <select name="tags[]" multiple>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select><br>

    <label for="sponsors">Sponsors</label>
    <select name="sponsors[]" multiple>
        @foreach($sponsors as $sponsor)
            <option value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
        @endforeach
    </select><br>

    <button type="submit">enregistrer</button>
</form>
@endsection
