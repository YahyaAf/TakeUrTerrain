@extends('frontOffice.layouts.app')

@section('content')
<div class="container">
    <h1>Tous les Terrains</h1>

    <form method="GET" action="{{ route('frontOffice.terrains.index') }}" class="mb-4">
        <div class="form-group">
            <label for="category">Filtrer par catégorie</label>
            <select name="category" id="category" class="form-control" onchange="this.form.submit()">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <div class="row">
        @foreach($terrains as $terrain)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/' . $terrain->photo) }}" class="card-img-top" alt="{{ $terrain->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $terrain->name }}</h5>
                    <p class="card-text">{{ $terrain->description }}</p>
                    <p class="card-text"><strong>Prix :</strong> {{ $terrain->prix }} €</p>
                    <a href="" class="btn btn-primary">Voir Détails</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
