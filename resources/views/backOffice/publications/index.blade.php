@extends('backOffice.layouts.app')

@section('content')
@foreach($terrains as $terrain)
    <div class="mb-4 border p-4 rounded bg-gray-100">
        <h3 class="text-lg font-semibold">{{ $terrain->name }}</h3>
        <p>Status: <strong>{{ ucfirst($terrain->statut) }}</strong></p>

        @if($terrain->statut == 'pending')
            <a href="{{ route('publications.accept', $terrain->id) }}" class="text-green-600 hover:text-green-800">Accept</a>
            <a href="{{ route('publications.refuse', $terrain->id) }}" class="text-red-600 hover:text-red-800 ml-4">Refuse</a>
        @else
            <p class="text-gray-500">This terrain's status is already {{ $terrain->statut }}.</p>
        @endif
    </div>
@endforeach
@endsection