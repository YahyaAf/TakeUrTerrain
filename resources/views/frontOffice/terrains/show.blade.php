@extends('frontOffice.layouts.app')

@section('content')
<section class="relative">

    <div class="relative bg-gradient-to-r from-gray-800 to-black py-16">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-6">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-3">Réservez Votre Terrain</h1>
                <p class="text-xl max-w-2xl mx-auto text-white">Découvrez nos terrains disponibles et réservez dès maintenant</p>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md py-4 sticky top-0 z-30">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <h2 class="text-2xl font-bold text-gray-900 mr-4">{{ $terrain->name }}</h2>
                    <div class="flex space-x-2">
                        <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm font-medium">{{ $terrain->disponibility }}</span>
                    </div>
                </div>
                <button id="openReservationModal" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-6 rounded-lg transition duration-300 shadow-md">
                    Réserver maintenant
                </button>
            </div>
        </div>
    </div>
</section>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                <div class="h-96 relative">
                    <img src="{{ asset('storage/' . $terrain->photo) }}" alt="{{ $terrain->name }}" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                        <div class="flex items-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $terrain->adresse }}
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Description</h2>
                    <div class="prose max-w-none text-gray-700">
                        {{ $terrain->description }}
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">Calendrier des disponibilités</h2>
                </div>
                <div class="p-6">
                    <div id="calendar" class="min-h-[400px]"></div>
                    <div class="mt-4 flex items-center text-sm">
                        <div class="flex items-center mr-4">
                            <div class="h-3 w-3 bg-red-500 rounded-sm mr-1"></div>
                            <span>Réservé</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <button id="toggleLocationBtn" class="flex items-center justify-between w-full p-6 border-b border-gray-200 focus:outline-none">
                    <h2 class="text-xl font-bold text-gray-900">Localisation</h2>
                    <svg id="locationArrow" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                
                <div id="locationContent" class="hidden">
                    @if ($terrain->latitude && $terrain->longitude)
                        <div class="flex justify-end p-2 bg-gray-50">
                            <button id="fullscreenBtn" class="text-black hover:text-gray-700 p-1 flex items-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Agrandir
                            </button>
                        </div>
                        <div id="map" class="w-full h-80"></div>
                        <div class="bg-white p-4 flex justify-between items-center text-sm">
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 rounded-full bg-black"></div>
                                <span class="text-gray-600">{{ $terrain->name }}</span>
                            </div>
                            <div class="text-gray-500">
                                {{ number_format($terrain->latitude, 6) }}, {{ number_format($terrain->longitude, 6) }}
                            </div>
                        </div>
                    @else
                        <div class="p-6 flex flex-col items-center justify-center bg-gray-50 h-64">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            <p class="text-gray-500 mt-2">Aucune localisation disponible.</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900">Avis sur {{ $terrain->name }}</h2>
                        <div class="flex items-center">
                            <div class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-medium flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.799-2.034c-.784-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span>{{ $terrain->feedbacks->avg('note') ? number_format($terrain->feedbacks->avg('note'), 1) : '0' }} / 5</span>
                            </div>
                            <span class="ml-2 text-gray-500 text-sm">({{ $terrain->feedbacks->count() }} avis)</span>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @auth
                        @if (session('success'))
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        @permission('create-feedback')
                        <form action="{{ route('feedback.store') }}" method="POST" class="bg-gray-50 p-6 rounded-xl mb-8">
                            @csrf
                            <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">
                            
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Partagez votre expérience</h3>
                            
                            <div class="mb-4">
                                <div class="flex items-center mb-2">
                                    <label for="note" class="block text-sm font-medium text-gray-700 mr-3">Votre note</label>
                                    <div class="flex items-center space-x-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <label for="star{{ $i }}" class="cursor-pointer">
                                                <input type="radio" id="star{{ $i }}" name="note" value="{{ $i }}" class="hidden" required>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 star-rating" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.799-2.034c-.784-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </label>
                                        @endfor
                                    </div>
                                </div>
                                @error('note')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-1">Votre commentaire</label>
                                <textarea name="commentaire" id="commentaire" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-gray-300 focus:border-gray-300 resize-none" placeholder="Partagez votre expérience avec ce terrain..." required></textarea>
                                @error('commentaire')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-6 rounded-lg transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                </svg>
                                Publier mon avis
                            </button>
                        </form>
                        @endpermission
                    @else
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-8 rounded-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-800">Vous devez <a href="{{ route('login') }}" class="font-medium underline hover:text-blue-600">vous connecter</a> pour laisser un commentaire.</p>
                                </div>
                            </div>
                        </div>
                    @endauth

                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Tous les avis ({{ $terrain->feedbacks->count() }})</h3>
                        </div>

                        @forelse ($terrain->feedbacks->sortByDesc('created_at') as $feedback)
                            <div class="mb-6 border-b border-gray-100 pb-6 last:border-b-0 last:pb-0">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex items-start">
                                        <div class="h-10 w-10 rounded-full bg-gray-100 text-gray-600 font-bold flex items-center justify-center mr-3">
                                            {{ strtoupper(substr($feedback->user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900">{{ $feedback->user->name }}</h4>
                                            <div class="flex items-center text-sm text-gray-500">
                                                <span>{{ $feedback->created_at->format('d M Y') }}</span>
                                                <span class="mx-2">•</span>
                                                <div class="flex items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 {{ $i <= $feedback->note ? 'text-yellow-500' : 'text-gray-300' }}" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.799-2.034c-.784-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                        </svg>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if($feedback->user_id === Auth::id())
                                        <div class="flex items-center">
                                            <form action="{{ route('feedback.delete', $feedback->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-gray-400 hover:text-red-600 transition duration-200" title="Supprimer l'avis">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="text-gray-700 mt-2 whitespace-pre-line">{{ $feedback->commentaire }}</div>
                            </div>
                        @empty
                            <div class="bg-gray-50 rounded-lg p-8 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                <p class="text-gray-600 mb-2">Aucun avis disponible pour ce terrain.</p>
                                <p class="text-gray-500 text-sm">Soyez le premier à partager votre expérience !</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-24">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-900">{{ number_format($terrain->prix, 0, ',', ' ') }} €</h2>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">{{ $terrain->categorie->name }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    @if(count($terrain->sponsors) > 0)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Sponsors</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($terrain->sponsors as $sponsor)
                                <div class="h-12 w-12 rounded-full bg-gray-50 p-1 flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}" class="max-h-full max-w-full object-contain rounded-full">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Coordonnées</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col">
                                <span class="text-gray-600 text-sm">Latitude</span>
                                <span class="font-medium">{{ $terrain->latitude }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-gray-600 text-sm">Longitude</span>
                                <span class="font-medium">{{ $terrain->longitude }}</span>
                            </div>
                        </div>
                    </div>
                
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($terrain->tags as $tag)
                                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    
                    <button id="openReservationModalSidebar" class="w-full bg-black hover:bg-gray-800 text-white font-bold py-3 px-4 rounded-lg transition duration-300 shadow-md flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Réserver maintenant
                    </button>
                </div>
            </div>
            
            <div class="text-right">
                <a href="{{ route('home') }}" class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-7-7v14" />
                    </svg>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div>

<div id="reservationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-md mx-4 transform transition-all">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-900">Réserver {{ $terrain->name }}</h2>
            <button id="closeReservationModal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        @if(session('error'))
            <div class="bg-red-100 text-red-500 border border-red-500 rounded-lg p-3 mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('checkout') }}" method="POST" id="reservationForm">
            @csrf
            <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">
            
            <div class="mb-4">
                <label for="date_reservation" class="block text-gray-700 font-medium mb-1">Date de réservation</label>
                <input type="date" id="date_reservation" name="date_reservation" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-500 focus:border-gray-500" required>
            </div>
        
            <div class="mb-4">
                <label for="heure_debut" class="block text-gray-700 font-medium mb-1">Heure de début</label>
                <input type="time" id="heure_debut" name="heure_debut" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-500 focus:border-gray-500" required>
            </div>
        
            <div class="mb-4">
                <label for="creneaux" class="block text-gray-700 font-medium mb-1">Durée</label>
                <select name="creneaux" id="creneaux" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-500 focus:border-gray-500" required>
                    <option value="1">1 heure</option>
                    <option value="2">2 heures</option>
                </select>
            </div>
        
            <div class="mb-4 text-sm text-gray-500" id="calculated_end"></div>
        
            <button type="submit" class="w-full bg-black hover:bg-gray-800 text-white font-bold py-3 px-4 rounded-lg transition duration-300 shadow-md flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Réserver et Payer
            </button>
        </form>
    </div>
</div>

<div id="adminReservationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-md mx-4 transform transition-all">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-900">Réservation Admin pour {{ $terrain->name }}</h2>
            <button id="closeAdminReservationModal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form action="{{ route('admin.reservation.checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">
        
            <div class="mb-4">
                <label for="client_id" class="block text-gray-700 font-medium mb-1">Client</label>
                <select name="client_id" id="client_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-500 focus:border-gray-500" required>
                    <option value="">-- Sélectionner un utilisateur --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>
        
            <div class="mb-4">
                <label for="admin_date_reservation" class="block text-gray-700 font-medium mb-1">Date de réservation</label>
                <input type="date" id="admin_date_reservation" name="date_reservation" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-500 focus:border-gray-500" required>
            </div>
        
            <div class="mb-4">
                <label for="admin_heure_debut" class="block text-gray-700 font-medium mb-1">Heure de début</label>
                <input type="time" id="admin_heure_debut" name="heure_debut" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-500 focus:border-gray-500" required>
            </div>
        
            <div class="mb-4">
                <label for="admin_creneaux" class="block text-gray-700 font-medium mb-1">Durée</label>
                <select name="creneaux" id="admin_creneaux" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-500 focus:border-gray-500" required>
                    <option value="1">1 heure</option>
                    <option value="2">2 heures</option>
                </select>
            </div>
        
            <div class="mb-4 text-sm text-gray-500" id="admin_calculated_end"></div>
        
            <button type="submit" class="w-full bg-black hover:bg-gray-800 text-white font-bold py-3 px-4 rounded-lg transition duration-300 shadow-md flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Réserver pour le client
            </button>
        </form>
    </div>
</div>

@if(Auth::check() && Auth::user()->role === 'admin')
<div class="fixed bottom-6 right-6">
    <button id="openAdminReservationModal" class="bg-black hover:bg-gray-800 text-white font-bold py-3 px-4 rounded-full shadow-lg transition duration-300 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Réservation Admin
    </button>
</div>
@endif

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.15/index.global.min.css" rel="stylesheet">

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleLocationBtn = document.getElementById('toggleLocationBtn');
        const locationContent = document.getElementById('locationContent');
        const locationArrow = document.getElementById('locationArrow');
        
        toggleLocationBtn.addEventListener('click', function() {
            locationContent.classList.toggle('hidden');
            locationArrow.classList.toggle('rotate-180');
            
            if (!locationContent.classList.contains('hidden') && !window.mapInitialized) {
                initializeMap();
                window.mapInitialized = true;
            }
        });
        
        const openReservationModal = document.getElementById('openReservationModal');
        const openReservationModalSidebar = document.getElementById('openReservationModalSidebar');
        const closeReservationModal = document.getElementById('closeReservationModal');
        const reservationModal = document.getElementById('reservationModal');
        
        if (openReservationModal) {
            openReservationModal.addEventListener('click', function() {
                reservationModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        }
        
        if (openReservationModalSidebar) {
            openReservationModalSidebar.addEventListener('click', function() {
                reservationModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        }
        
        if (closeReservationModal) {
            closeReservationModal.addEventListener('click', function() {
                reservationModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });
        }
        
        if (reservationModal) {
            reservationModal.addEventListener('click', function(e) {
                if (e.target === reservationModal) {
                    reservationModal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });
        }
        
        const openAdminReservationModal = document.getElementById('openAdminReservationModal');
        const closeAdminReservationModal = document.getElementById('closeAdminReservationModal');
        const adminReservationModal = document.getElementById('adminReservationModal');
        
        if (openAdminReservationModal) {
            openAdminReservationModal.addEventListener('click', function() {
                adminReservationModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        }
        
        if (closeAdminReservationModal) {
            closeAdminReservationModal.addEventListener('click', function() {
                adminReservationModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });
        }
        
        if (adminReservationModal) {
            adminReservationModal.addEventListener('click', function(e) {
                if (e.target === adminReservationModal) {
                    adminReservationModal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });
        }
        
        function initializeMap() {
            var latitude = @json($terrain->latitude);
            var longitude = @json($terrain->longitude);

            if (latitude && longitude) {
                var map = L.map('map', {
                    zoomControl: true,
                    attributionControl: false
                }).setView([latitude, longitude], 14);
                
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: ''
                }).addTo(map);
                
                var marker = L.marker([latitude, longitude]).addTo(map);
                
                var circle = L.circle([latitude, longitude], {
                    color: '#000000',
                    fillColor: '#000000',
                    fillOpacity: 0.2,
                    radius: 300
                }).addTo(map);
                
                marker.bindPopup(`
                    <div class="custom-popup">
                        <h3 class="font-bold">${@json($terrain->name)}</h3>
                        <p class="text-sm text-gray-600">${@json($terrain->adresse)}</p>
                    </div>
                `);
            
                document.getElementById('fullscreenBtn').addEventListener('click', function() {
                    if (map.isFullscreen) {
                        map.isFullscreen = false;
                        document.getElementById('map').style.height = '20rem';
                        document.getElementById('map').style.position = '';
                        document.getElementById('map').style.top = '';
                        document.getElementById('map').style.left = '';
                        document.getElementById('map').style.right = '';
                        document.getElementById('map').style.bottom = '';
                        document.getElementById('map').style.zIndex = '';
                        document.getElementById('fullscreenBtn').innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Agrandir
                        `;
                        map.invalidateSize();
                    } else {
                        map.isFullscreen = true;
                        document.getElementById('map').style.height = '100vh';
                        document.getElementById('map').style.position = 'fixed';
                        document.getElementById('map').style.top = '0';
                        document.getElementById('map').style.left = '0';
                        document.getElementById('map').style.right = '0';
                        document.getElementById('map').style.bottom = '0';
                        document.getElementById('map').style.zIndex = '9999';
                        document.getElementById('fullscreenBtn').innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v-4m0 0h4m-4 0l5-5m11 5v-4m0 0h-4m4 0l-5-5" clip-rule="evenodd" />
                            </svg>
                            Réduire
                        `;
                        map.invalidateSize();
                    }
                });
            }
        }
        
        var calendarEl = document.getElementById('calendar');
        if (calendarEl) {
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                allDaySlot: false,
                height: 'auto',
                slotMinTime: "08:00:00", 
                slotMaxTime: "23:00:00", 
                events: [
                    @foreach ($reservations as $reservation)
                        @php
                            $start = $reservation->date_reservation . 'T' . $reservation->heure_debut;
                            $endDate = $reservation->date_reservation;
                            if ($reservation->heure_fin < $reservation->heure_debut) {
                                $endDate = \Carbon\Carbon::parse($reservation->date_reservation)->addDay()->toDateString();
                            }
                            $end = $endDate . 'T' . $reservation->heure_fin;
                        @endphp
                        {
                            title: 'Réservé',
                            start: '{{ $start }}',
                            end: '{{ $end }}',
                            color: '#ef4444'
                        }@if (!$loop->last),@endif
                    @endforeach
                ],
                selectable: true,
                select: function(info) {
                    var date = new Date(info.startStr);
                    var formattedDate = date.toISOString().slice(0, 16);
                    document.getElementById('heure_debut').value = formattedDate;
                },
                locale: 'fr',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'today'
                },
                buttonText: {
                    today: 'Aujourd\'hui',
                    month: 'Mois',
                    week: 'Semaine',
                    day: 'Jour'
                }
            });
            calendar.render();
        }
        
        const stars = document.querySelectorAll('.star-rating');
        const ratingInputs = document.querySelectorAll('input[name="note"]');
        
        function updateStars(rating) {
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('text-yellow-500');
                    star.classList.remove('text-gray-300');
                } else {
                    star.classList.add('text-gray-300');
                    star.classList.remove('text-yellow-500');
                }
            });
        }
        updateStars(0);
    
        ratingInputs.forEach((input, index) => {
            input.addEventListener('change', function() {
                updateStars(index + 1);
            });
        });
        
        @if($errors->any())
            document.getElementById('openReservationModal').click();
        @endif
        
        @if(session('error'))
            document.getElementById('openReservationModal').click();
        @endif
    });
</script>

<style>
    .custom-popup .leaflet-popup-content-wrapper {
        border-radius: 8px;
        padding: 0;
    }
    
    .custom-popup .leaflet-popup-content {
        margin: 10px;
    }
    
    .marker-pin {
        width: 24px;
        height: 24px;
        border-radius: 50% 50% 50% 0;
        background: #000000;
        position: absolute;
        transform: rotate(-45deg);
        left: 50%;
        top: 50%;
        margin: -15px 0 0 -15px;
        animation: pulse 1.5s infinite;
    }
    
    .marker-pin::after {
        content: '';
        width: 14px;
        height: 14px;
        margin: 5px 0 0 5px;
        background: white;
        position: absolute;
        border-radius: 50%;
    }
    
    @keyframes pulse {
        0% {
            transform: rotate(-45deg) scale(1);
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.5);
        }
        70% {
            transform: rotate(-45deg) scale(1);
            box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
        }
        100% {
            transform: rotate(-45deg) scale(1);
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
        }
    }
</style>
@endsection
