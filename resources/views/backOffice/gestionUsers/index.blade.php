@extends('backOffice.layouts.app')

@section('content')
<div class="container">
    <h1>Gestion des Utilisateurs</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Statut</th>
                <th>Banni</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @if(!$user->roles->contains('name', 'admin') || $loop->index > 0)  
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                {{ $role->name }}@if(!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>{{ ucfirst($user->statut) }}</td>
                        <td>
                            <span class="{{ $user->banned ? 'text-danger' : 'text-success' }}">
                                {{ $user->banned ? 'Banni' : 'Non banni' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('backOffice.gestionUsers.edit', $user->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('backOffice.gestionUsers.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
