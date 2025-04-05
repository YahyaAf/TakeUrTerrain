@extends('backOffice.layouts.app')

@section('content')
    @foreach($terrains as $terrain)
        <div class="mb-4 border p-6 rounded-lg bg-gray-50 shadow-md transition-all duration-300 hover:shadow-lg">
            <!-- Terrain Photo -->
            @if($terrain->photo)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $terrain->photo) }}" alt="Photo of {{ $terrain->name }}" class="w-full h-64 object-cover rounded-lg">
                </div>
            @else
                <div class="mb-4">
                    <p class="text-gray-500">No photo available</p>
                </div>
            @endif

            <h3 class="text-xl font-semibold text-gray-900">{{ $terrain->name }}</h3>
            
            <div class="flex justify-between items-center mt-2">
                <p class="text-gray-700">Status: <strong class="{{ $terrain->statut == 'accepted' ? 'text-green-600' : ($terrain->statut == 'refuse' ? 'text-red-600' : 'text-yellow-600') }}">{{ ucfirst($terrain->statut) }}</strong></p>
                <span class="text-sm text-gray-500">Price: {{ $terrain->prix }}€ /hour</span>
            </div>

            @if($terrain->statut == 'pending')
                <div class="mt-4">
                    <a href="{{ route('publications.accept', $terrain->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-200">Accept</a>
                    <a href="{{ route('publications.refuse', $terrain->id) }}" class="ml-4 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200">Refuse</a>
                </div>
            @else
                <p class="text-gray-500 mt-4">This terrain's status is already {{ $terrain->statut }}.</p>
            @endif

            <div class="mt-4 text-gray-600">
                <h4 class="font-medium">Description:</h4>
                <p>{{ Str::limit($terrain->description, 150, '...') }}</p>
            </div>

            <div class="mt-4">
                <h4 class="font-medium text-gray-700">Category:</h4>
                <p class="text-sm text-gray-600">{{ $terrain->categorie->name ?? 'Uncategorized' }}</p>
            </div>

            <div class="mt-4">
                <h4 class="font-medium text-gray-700">Address:</h4>
                <p class="text-sm text-gray-600">{{ $terrain->adresse }}</p>
            </div>
        </div>
    @endforeach
@endsection
