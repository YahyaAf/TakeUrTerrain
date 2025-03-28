@extends('backOffice.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="bg-gradient-to-r from-blue-500 to-teal-400 p-6">
            <h1 class="text-3xl font-bold text-white mb-2">{{ $terrain->name }}</h1>
            <div class="flex items-center space-x-2">
                @if($terrain->categorie)
                    <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm">
                        {{ $terrain->categorie->name }}
                    </span>
                @endif
                <span class="text-white/70">{{ $terrain->disponibility }}</span>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 p-6">
            <div>
                <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img 
                        src="{{ asset('storage/' . $terrain->photo) }}" 
                        alt="{{ $terrain->name }}" 
                        class="w-full h-96 object-cover"
                    >
                </div>
            </div>

            <div>
                <div class="space-y-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Description</h3>
                        <p class="text-gray-600">{{ $terrain->description }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white border rounded-lg p-4 shadow-sm">
                            <h4 class="text-sm text-gray-500 mb-1">Prix</h4>
                            <p class="font-bold text-blue-600">{{ number_format($terrain->prix, 2) }} €</p>
                        </div>
                        <div class="bg-white border rounded-lg p-4 shadow-sm">
                            <h4 class="text-sm text-gray-500 mb-1">Adresse</h4>
                            <p class="text-gray-700">{{ $terrain->adresse }}</p>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @forelse($terrain->tags as $tag)
                                <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded-full">
                                    {{ $tag->name }}
                                </span>
                            @empty
                                <span class="text-gray-500">Aucun tag</span>
                            @endforelse
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Sponsors</h3>
                        <div class="flex flex-wrap gap-2">
                            @forelse($terrain->sponsors as $sponsor)
                                <span class="bg-green-100 text-green-800 text-xs px-2.5 py-0.5 rounded-full">
                                    {{ $sponsor->name }}
                                </span>
                            @empty
                                <span class="text-gray-500">Aucun sponsor</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-100 p-6 flex justify-between items-center">
            <a 
                href="{{ route('terrains.index') }}" 
                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors flex items-center space-x-2"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span>Retour à la liste</span>
            </a>
        </div>
    </div>
</div>
@endsection