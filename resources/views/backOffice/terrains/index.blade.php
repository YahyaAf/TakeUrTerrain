@extends('backOffice.layouts.app')

@section('content')
    <h1>Liste des Terrains</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Disponibilité</th>
                <th>Adresse</th>
                <th>Tags</th>
                <th>Sponsors</th>
            </tr>
        </thead>
        <tbody>
            @foreach($terrains as $terrain)
                <tr>
                    <td>{{ $terrain->name }}</td>
                    <td>{{ $terrain->description }}</td>
                    <td><img src="{{ asset('storage/' . $terrain->photo) }}" alt="{{ $terrain->name }}" width="100"></td>
                    <td>{{ $terrain->prix }}</td>
                    <td>{{ $terrain->categorie->name ?? 'Non spécifié' }}</td>
                    <td>{{ $terrain->disponibility }}</td>
                    <td>{{ $terrain->adresse }}</td>
                    <td>
                        @foreach($terrain->tags as $tag)
                            <span>{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach($terrain->sponsors as $sponsor)
                            <span>{{ $sponsor->name }}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
