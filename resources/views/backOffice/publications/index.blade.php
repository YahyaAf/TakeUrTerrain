@extends('backOffice.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-4">Terrain Management</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($terrains as $terrain)
            <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="relative">
                    @if($terrain->photo)
                        <div class="h-52 bg-gray-200">
                            <img src="{{ asset('storage/' . $terrain->photo) }}" alt="Photo of {{ $terrain->name }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="h-52 bg-gray-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ 
                            $terrain->statut == 'accepted' ? 'bg-green-100 text-green-800' : 
                            ($terrain->statut == 'refuse' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') 
                        }}">
                            {{ ucfirst($terrain->statut) }}
                        </span>
                    </div>
                    
                    <div class="absolute bottom-4 right-4">
                        <span class="bg-white px-3 py-1 rounded-lg shadow-md text-sm font-bold text-gray-700">
                            {{ $terrain->prix }}€<span class="text-xs font-normal text-gray-500">/hour</span>
                        </span>
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $terrain->name }}</h3>
                    
                    <div class="mb-4">
                        <span class="inline-block bg-blue-50 text-blue-700 text-xs px-2 py-1 rounded-md">
                            {{ $terrain->categorie->name ?? 'Uncategorized' }}
                        </span>
                    </div>
                    
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($terrain->description, 100, '...') }}</p>
                    
                    <div class="flex items-center text-gray-500 text-sm mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $terrain->adresse }}
                    </div>
                    
                    @if($terrain->statut == 'pending')
                        <div class="flex space-x-3 pt-3 border-t border-gray-100">
                            <a href="{{ route('publications.accept', $terrain->id) }}" class="flex-1 bg-gradient-to-r from-green-500 to-green-600 text-white text-center py-2 rounded-lg text-sm font-medium hover:from-green-600 hover:to-green-700 transition duration-300 shadow-sm hover:shadow">
                                Accept
                            </a>
                            <a href="{{ route('publications.refuse', $terrain->id) }}" class="flex-1 bg-gradient-to-r from-red-500 to-red-600 text-white text-center py-2 rounded-lg text-sm font-medium hover:from-red-600 hover:to-red-700 transition duration-300 shadow-sm hover:shadow">
                                Refuse
                            </a>
                        </div>
                    @else
                        <div class="pt-3 border-t border-gray-100">
                            <p class="text-gray-500 text-sm text-center">This terrain's status is already <span class="font-medium">{{ $terrain->statut }}</span>.</p>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    
    @if(count($terrains) === 0)
        <div class="bg-gray-50 rounded-xl p-8 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
            </svg>
            <h3 class="text-xl font-medium text-gray-700">No terrains available</h3>
            <p class="text-gray-500 mt-2">No terrains have been added to the system yet.</p>
        </div>
    @endif
</div>
@endsection