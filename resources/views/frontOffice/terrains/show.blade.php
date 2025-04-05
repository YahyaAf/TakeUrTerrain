@extends('frontOffice.layouts.app')

@section('content')
<section class="terrain-details">
    <div class="bg-black py-16">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-6">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Réservez Votre Terrain</h1>
                <p class="text-lg max-w-2xl mx-auto text-white">Découvrez nos terrains disponibles et réservez dès maintenant</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $terrain->name }}</h1>
                <p class="text-gray-600 flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $terrain->adresse }}
                </p>
            </div>
            <div class="mt-4 md:mt-0 flex items-center gap-3">
                <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">{{ $terrain->statut }}</span>
                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">{{ $terrain->disponibility }}</span>
                <button id="openReservationModal" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Réserver
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div class="lg:col-span-2 rounded-lg overflow-hidden shadow-md h-80">
                <img src="{{ asset('storage/' . $terrain->photo) }}" alt="{{ $terrain->name }}" class="w-full h-full object-cover">
            </div>
            <div class="bg-white rounded-lg shadow-md p-5">
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-2xl font-bold text-gray-900">{{ number_format($terrain->prix, 0, ',', ' ') }} €</h2>
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">{{ $terrain->categorie->name }}</span>
                        @foreach($terrain->sponsors as $sponsor)
                            <div class="h-12 w-12 rounded-full bg-gray-50 p-1 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}" class="max-h-full max-w-full object-contain rounded-full">
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="mb-5">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Coordonnées</h3>
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
            
                <div class="mb-5">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($terrain->tags as $tag)
                            <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>            
        </div>

        <div class="bg-white rounded-lg shadow-md p-5 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-3">Description</h2>
            <div class="prose max-w-none text-gray-700">
                {{ $terrain->description }}
            </div>
        </div>

        <div class="mb-8">
            <button id="toggleLocationBtn" class="flex items-center justify-between w-full bg-white p-4 rounded-t-lg shadow-md border-b border-gray-200 focus:outline-none">
                <h2 class="text-xl font-bold text-gray-900">Localisation</h2>
                <svg id="locationArrow" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            
            <div id="locationContent" class="bg-white rounded-b-lg shadow-md overflow-hidden hidden">
                @if ($terrain->latitude && $terrain->longitude)
                    <div class="flex justify-end p-2 bg-gray-50">
                        <button id="fullscreenBtn" class="text-blue-600 hover:text-blue-800 p-1 flex items-center text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Agrandir
                        </button>
                    </div>
                    <div id="map" class="w-full h-64"></div>
                    <div class="bg-white p-3 flex justify-between items-center text-sm">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 rounded-full bg-blue-600"></div>
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
    </div>
</section>
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h2 class="text-xl font-bold text-gray-900 mb-4">Laissez un commentaire</h2>

    @auth
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">

            <div class="mb-4">
                <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-1">Votre commentaire</label>
                <textarea name="commentaire" id="commentaire" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300 resize-none" required></textarea>
                @error('commentaire')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="note" class="block text-sm font-medium text-gray-700 mb-1">Note (1 à 5)</label>
                <select name="note" id="note" class="w-20 px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
                    <option value="">--</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                @error('rating')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg">
                Envoyer
            </button>
        </form>
    @else
        <p class="text-gray-600">Vous devez <a href="{{ route('login') }}" class="text-blue-600 hover:underline">vous connecter</a> pour laisser un commentaire.</p>
    @endauth
</div>

<div class="p-3 text-right">
    <a href="{{ route('home') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
        <i class="fas fa-home mr-2"></i> Retour à l'accueil
    </a>
</div>



<div id="reservationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-900">Réserver {{ $terrain->name }}</h2>
            <button id="closeReservationModal" class="text-gray-500 hover:text-gray-700">
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

        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">
            <div class="mb-4">
                <label for="date_reservation" class="block text-gray-700 font-medium mb-1">Date de réservation</label>
                <input type="date" id="date_reservation" name="date_reservation" class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300" required>
                @error('date_reservation')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="heure_debut" class="block text-gray-700 font-medium mb-1">Heure de début</label>
                <input type="time" id="heure_debut" name="heure_debut" class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300" required>
                @error('heure_debut')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="heure_fin" class="block text-gray-700 font-medium mb-1">Heure de fin</label>
                <input type="time" id="heure_fin" name="heure_fin" class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300" required>
                @error('heure_fin')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Réserver et Payer
            </button>
        </form>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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
        const closeReservationModal = document.getElementById('closeReservationModal');
        const reservationModal = document.getElementById('reservationModal');
        
        openReservationModal.addEventListener('click', function() {
            reservationModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
        
        closeReservationModal.addEventListener('click', function() {
            reservationModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });
        
        reservationModal.addEventListener('click', function(e) {
            if (e.target === reservationModal) {
                reservationModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });
        
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
                    color: '#3b82f6',
                    fillColor: '#3b82f6',
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
                        document.getElementById('map').style.height = '16rem';
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
    
    .custom-map-marker {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .marker-pin {
        width: 24px;
        height: 24px;
        border-radius: 50% 50% 50% 0;
        background: #3b82f6;
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
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.5);
        }
        70% {
            transform: rotate(-45deg) scale(1);
            box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
        }
        100% {
            transform: rotate(-45deg) scale(1);
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
        }
    }
</style>
@endsection