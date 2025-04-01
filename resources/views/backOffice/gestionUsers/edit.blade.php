@extends('backOffice.layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'utilisateur</h1>

    <form action="{{ route('backOffice.gestionUsers.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="role">Rôle</label>
            <select name="role" class="form-control" id="role" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="statut">Statut</label>
            <input type="text" name="statut" class="form-control" id="statut" value="{{ $user->statut }}" required>
        </div>

        <div class="form-group">
            <label for="banned">Utilisateur Banni</label>
            <input type="hidden" name="banned" value="0">
            <input type="checkbox" name="banned" id="banned" value="1" {{ $user->banned ? 'checked' : '' }}>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
