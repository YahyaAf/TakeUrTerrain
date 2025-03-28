@extends('backOffice.layouts.app')

@section('content')
<div class="p-6 bg-gradient-to-br from-blue-50 to-blue-50 min-h-screen">
    <div class="max-w-full mx-auto">
        <div class="relative mb-8">
            <h1 class="text-3xl font-bold text-blue-800 inline-block">Liste des Terrains</h1>
            <div class="absolute -bottom-2 left-0 h-1 w-20 bg-blue-400 rounded-full"></div>
            <div class="absolute -bottom-2 left-20 h-1 w-10 bg-blue-400 rounded-full"></div>
            
            <div class="mt-4 flex justify-end">
                <a href="{{ route('terrains.create') }}" 
                   class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-lg hover:from-blue-700 hover:to-blue-600 transition-all duration-300 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Ajouter un Terrain
                </a>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                            <th class="px-4 py-3 text-left">Photo</th>
                            <th class="px-4 py-3 text-left">Nom</th>
                            <th class="px-4 py-3 text-left">Prix</th>
                            <th class="px-4 py-3 text-left">Catégorie</th>
                            <th class="px-4 py-3 text-left">Disponibilité</th>
                            <th class="px-4 py-3 text-left">Tags</th>
                            <th class="px-4 py-3 text-left">Sponsors</th>
                            <th class="px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($terrains as $terrain)
                            <tr class="border-b hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-4 py-3">
                                    <div class="w-20 h-20 rounded-lg overflow-hidden">
                                        @if($terrain->photo)
                                            <img 
                                                src="{{ asset('storage/' . $terrain->photo) }}" 
                                                alt="{{ $terrain->name }}" 
                                                class="w-full h-full object-cover"
                                            >
                                        @else
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">
                                                Pas d'image
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-medium text-blue-800">{{ $terrain->name }}</td>
                                <td class="px-4 py-3">{{ number_format($terrain->prix, 2) }} €</td>
                                <td class="px-4 py-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                        {{ $terrain->categorie->name ?? 'Non spécifié' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="{{ $terrain->disponibility == 'disponible' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} text-xs px-2 py-1 rounded-full">
                                        {{ $terrain->disponibility }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($terrain->tags as $tag)
                                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-0.5 rounded-full">
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($terrain->sponsors as $sponsor)
                                            <span class="bg-purple-100 text-purple-800 text-xs px-2 py-0.5 rounded-full">
                                                {{ $sponsor->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('terrains.show', $terrain->id) }}" 
                                           class="text-blue-500 hover:text-blue-700 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('terrains.edit', $terrain->id) }}" 
                                           class="text-green-500 hover:text-green-700 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('terrains.destroy', $terrain->id) }}" method="POST" class="inline" 
                                              onsubmit="return confirm('Voulez-vous vraiment supprimer ce terrain ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if($terrains->isEmpty())
            <div class="bg-white shadow-lg rounded-xl p-8 text-center mt-6">
                <p class="text-gray-600">Aucun terrain n'a été trouvé.</p>
            </div>
        @endif
    </div>
</div>
@endsection