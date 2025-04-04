@extends('frontOffice.layouts.app')

@section('content')
<section class="terrain-details">
    <div class="  from-cyan-600 to-blue-700 py-20 bg-black">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Réservez Votre Terrain</h1>
                <p class="text-xl max-w-2xl mx-auto text-white">Découvrez nos terrains disponibles et réservez dès maintenant pour votre prochaine activité sportive</p>
            </div>
        </div>
        <div class="absolute inset-0 overflow-hidden">
            <svg class="absolute left-0 bottom-0 opacity-10" viewBox="0 0 1920 1080" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,0 C300,150 500,0 900,200 C1300,400 1500,100 1920,300 L1920,1080 L0,1080 Z" fill="white"/>
            </svg>
        </div>
    </div>
    <div class="container mx-auto px-4 py-8">
        <!-- Property Header -->
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
            <div class="mt-4 md:mt-0">
                <span class="bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-semibold">{{ $terrain->statut }}</span>
                <span class="ml-2 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-semibold">{{ $terrain->disponibilite }}</span>
            </div>
        </div>

        <!-- Property Gallery & Info -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
            <!-- Main Image -->
            <div class="lg:col-span-2 rounded-lg overflow-hidden shadow-lg h-96">
                <img src="{{ asset('storage/' . $terrain->photo) }}" alt="{{ $terrain->name }}" class="w-full h-full object-cover">
            </div>

            <!-- Property Details -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">{{ number_format($terrain->prix, 0, ',', ' ') }} €</h2>
                    <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">{{ $terrain->categorie->name }}</span>
                </div>

                <!-- Property Coordinates -->
                <div class="mb-6">
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

                <!-- Tags -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($terrain->tags as $tag)
                            <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Contact Button -->
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                    Contacter le vendeur
                </button>
            </div>
        </div>

        <!-- Description -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Description</h2>
            <div class="prose max-w-none text-gray-700">
                {{ $terrain->description }}
            </div>
        </div>

        <div class="rounded-xl overflow-hidden shadow-lg border border-gray-100">
            <div class="bg-gray-100 p-4 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Localisation</h3>
                <button id="fullscreenBtn" class="text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            
            @if ($terrain->latitude && $terrain->longitude)
                <div id="map" class="w-full h-64 md:h-80"></div>
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

        <!-- Sponsors -->
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Sponsors</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($terrain->sponsors as $sponsor)
                    <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center justify-center">
                        <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}" class="h-16 mb-2">
                        <p class="text-center text-gray-700 font-medium">{{ $sponsor->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Formulaire de Réservation -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-10">

            @if(session('error'))
                <div class="bg-red-100 text-red-500 border border-red-500 rounded-lg p-4 mb-4">
                    {{ session('error') }}
                </div>
            @endif
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Réserver ce terrain</h2>
        
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">
        
                <!-- Date de réservation -->
                <div class="mb-4">
                    <label for="date_reservation" class="block text-gray-700 font-medium mb-2">Date de réservation</label>
                    <input type="date" id="date_reservation" name="date_reservation" class="w-full border-gray-300 rounded-lg p-3 focus:ring focus:ring-blue-300" required>
                    @error('date_reservation')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
        
                <!-- Heure de début -->
                <div class="mb-4">
                    <label for="heure_debut" class="block text-gray-700 font-medium mb-2">Heure de début</label>
                    <input type="time" id="heure_debut" name="heure_debut" class="w-full border-gray-300 rounded-lg p-3 focus:ring focus:ring-blue-300" required>
                    @error('heure_debut')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
        
                <!-- Heure de fin -->
                <div class="mb-4">
                    <label for="heure_fin" class="block text-gray-700 font-medium mb-2">Heure de fin</label>
                    <input type="time" id="heure_fin" name="heure_fin" class="w-full border-gray-300 rounded-lg p-3 focus:ring focus:ring-blue-300" required>
                    @error('heure_fin')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
        
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                    Réserver et Payer
                </button>
            </form>
        </div>
        
        

    </div>
</section>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var latitude = @json($terrain->latitude);
        var longitude = @json($terrain->longitude);

        if (latitude && longitude) {
            var map = L.map('map', {
                zoomControl: false,
                attributionControl: false
            }).setView([latitude, longitude], 14);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: ''
            }).addTo(map);
            
            document.getElementById('map').style.zIndex = 1;
            
            var pulsingIcon = L.divIcon({
                className: 'custom-map-marker',
                html: `<div class="marker-pin"></div>`,
                iconSize: [30, 30],
                iconAnchor: [15, 15]
            });
            
            var marker = L.marker([latitude, longitude], {
                icon: pulsingIcon
            }).addTo(map);
            
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
                    document.getElementById('map').style.height = '';
                    document.getElementById('map').style.position = '';
                    document.getElementById('map').style.top = '';
                    document.getElementById('map').style.left = '';
                    document.getElementById('map').style.right = '';
                    document.getElementById('map').style.bottom = '';
                    document.getElementById('map').style.zIndex = '';
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
                    map.invalidateSize();
                }
            });
        }
    });
</script>
@endsection