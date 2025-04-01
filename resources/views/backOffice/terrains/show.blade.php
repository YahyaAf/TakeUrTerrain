@extends('backOffice.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-2xl rounded-xl overflow-hidden">
        <!-- Hero Section with Gradient Overlay on Image -->
        <div class="relative h-64 md:h-96">
            <img 
                src="{{ asset('storage/' . $terrain->photo) }}" 
                alt="{{ $terrain->name }}" 
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-8">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $terrain->name }}</h1>
                <div class="flex items-center space-x-2 flex-wrap">
                    @if($terrain->categorie)
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                            {{ $terrain->categorie->name }}
                        </span>
                    @endif
                    <span class="text-white/90 bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full text-sm">
                        {{ $terrain->disponibility }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid md:grid-cols-12 gap-8 p-6">
            <!-- Left Column - Map and Price Info -->
            <div class="md:col-span-5 space-y-6">
                <!-- Price Card -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl p-5 text-white shadow-lg">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-sm font-medium opacity-80">Prix</h3>
                            <p class="text-3xl font-bold">{{ number_format($terrain->prix, 2) }} €</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Address Card -->
                <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100">
                    <div class="flex items-start space-x-4">
                        <div class="bg-blue-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm text-gray-500 mb-1">Adresse</h4>
                            <p class="text-gray-800 font-medium">{{ $terrain->adresse }}</p>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Map with Modern Design -->
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
            </div>

            <!-- Right Column - Description and Tags -->
            <div class="md:col-span-7 space-y-6">
                <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        Description
                    </h3>
                    <p class="text-gray-700 leading-relaxed">{{ $terrain->description }}</p>
                </div>

                <!-- Tags Section -->
                <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                        Tags
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @forelse($terrain->tags as $tag)
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $tag->name }}
                            </span>
                        @empty
                            <span class="text-gray-500">Aucun tag</span>
                        @endforelse
                    </div>
                </div>

                <!-- Sponsors Section -->
                <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                        Sponsors
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @forelse($terrain->sponsors as $sponsor)
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $sponsor->name }}
                            </span>
                        @empty
                            <span class="text-gray-500">Aucun sponsor</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Action Bar -->
        <div class="bg-gray-50 p-6 flex justify-between items-center border-t border-gray-100">
            <a 
                href="{{ route('terrains.index') }}" 
                class="px-5 py-2.5 bg-white text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors flex items-center space-x-2 shadow-sm"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span>Retour à la liste</span>
            </a>
            
            <div class="flex space-x-3">
                <a 
                    href="{{ route('terrains.edit', $terrain) }}" 
                    class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center space-x-2 shadow-md"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    <span>Modifier</span>
                </a>
            </div>
        </div>
    </div>
</div>

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

<style>
    /* Custom marker styling */
    .custom-map-marker {
        position: relative;
    }
    
    .marker-pin {
        width: 20px;
        height: 20px;
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
        width: 10px;
        height: 10px;
        margin: 5px 0 0 5px;
        background: white;
        position: absolute;
        border-radius: 50%;
    }
    
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(59, 130, 246, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
        }
    }
    
    .leaflet-popup-content-wrapper {
        border-radius: 12px;
        padding: 5px;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .leaflet-popup-content {
        margin: 10px 12px;
    }
    
    .custom-popup h3 {
        margin: 0 0 5px 0;
        color: #1f2937;
    }
</style>
@endsection