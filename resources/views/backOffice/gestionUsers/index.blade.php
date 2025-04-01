@extends('backOffice.layouts.app')

@section('content')
<div class="container">
    <h1>Gestion des Utilisateurs</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Statut</th>
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
                            <a href="{{ route('backOffice.gestionUsers.edit', $user->id) }}" class="btn btn-primary">Modifier</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
