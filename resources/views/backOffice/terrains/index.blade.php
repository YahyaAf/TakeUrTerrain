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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($terrains as $terrain)
                <tr>
                    <td>{{ $terrain->name }}</td>
                    <td>{{ $terrain->description }}</td>
                    <td>
                        @if($terrain->photo)
                            <img src="{{ asset('storage/' . $terrain->photo) }}" alt="{{ $terrain->name }}" width="100">
                        @else
                            Pas d'image
                        @endif
                    </td>
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
                    <td>
                        <a href="{{ route('terrains.edit', $terrain->id) }}">Modifier</a> |
                        <form action="{{ route('terrains.destroy', $terrain->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce terrain ?');">Supprimer</button>
                        </form>
                        <a href="{{ route('terrains.show', $terrain->id) }}">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
