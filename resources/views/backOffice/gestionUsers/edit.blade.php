@extends('backOffice.layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'utilisateur</h1>
    <form action="{{ route('backOffice.gestionUsers.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="role">Rôle</label>
            <select name="role" id="role" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" 
                        @if($user->roles->contains($role->id)) selected @endif>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="statut">Statut</label>
            <select name="statut" id="statut" class="form-control">
                <option value="accepted" @if($user->statut == 'accepted') selected @endif>Accepted</option>
                <option value="refuse" @if($user->statut == 'refuse') selected @endif>Refuse</option>
                <option value="pending" @if($user->statut == 'pending') selected @endif>Pending</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
