@extends('frontOffice.layouts.app')

@section('content')
<section >
    <div class="  from-cyan-600 to-blue-700 py-60 " style="background-image: url('img/téléchargé.png'); background-size: 100% 100%; background-position: center; background-repeat: no-repeat;">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-bold text-black mb-4">Réservez Votre Terrain</h1>
                <p class="text-xl max-w-2xl mx-auto text-white">Découvrez nos terrains disponibles et réservez dès maintenant pour votre prochaine activité sportive</p>
            </div>
        </div>
        <div class="absolute inset-0 overflow-hidden">
            <svg class="absolute left-0 bottom-0 opacity-10" viewBox="0 0 1920 1080" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,0 C300,150 500,0 900,200 C1300,400 1500,100 1920,300 L1920,1080 L0,1080 Z" fill="white"/>
            </svg>
        </div>
    </div>

    <section class="py-16 bg-gradient-to-b from-cyan-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($terrains as $terrain)
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:transform hover:-translate-y-1 group">
                    <div class="relative">
                        <img class="h-64 w-full object-cover" src="{{ asset('storage/' . $terrain->photo) }}" alt="{{ $terrain->name }}">
                        <div class="absolute top-4 right-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-md">
                            {{ $terrain->prix }}€ /heure
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                            <div class="p-4 w-full">
                                <a href="" class="block w-full text-center bg-white/90 backdrop-filter backdrop-blur-sm hover:bg-white text-cyan-600 font-medium py-2 rounded-lg transition duration-300 shadow-lg">
                                    Réserver Maintenant
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-3">
                            <span class="inline-block bg-cyan-100 text-cyan-800 text-xs px-2 py-1 rounded-full mr-2">
                                {{ $terrain->category->name ?? 'Non catégorisé' }}
                            </span>
                            <div class="flex items-center text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <span class="text-xs text-gray-600 ml-1">4.5</span>
                            </div>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $terrain->name }}</h2>
                        <p class="text-gray-500 text-sm mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $terrain->location }}
                        </p>
                        <p class="text-gray-600 text-sm mb-6 line-clamp-2">{{ $terrain->description }}</p>
                        <div class="flex justify-between items-center">
                            <a href="" class="text-cyan-600 hover:text-cyan-700 font-medium flex items-center">
                                Détails
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <div class="flex items-center">
                                <span class="text-sm text-gray-500 mr-2">Disponible</span>
                                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="mt-12">
                {{ $terrains->links() }}
            </div> 
        </div>
    </section>
</section>

@endsection