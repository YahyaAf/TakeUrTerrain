@extends('frontOffice.layouts.app')

@section('content')
<section >
    <div class="from-cyan-600 to-blue-700 py-60 " style="background-image: url('img/lionel-messi-football-barcelona-hd-wallpaper-preview.jpg'); background-size: 100% 100%; background-position: center; background-repeat: no-repeat;">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Réservez Votre Terrain</h1>
                <p class="text-xl max-w-2xl mx-auto text-white">Découvrez nos terrains disponibles et réservez dès maintenant pour votre prochaine activité sportive</p>
            </div>
        </div>
        {{-- <div class="absolute inset-0 overflow-hidden">
            <svg class="absolute left-0 bottom-0 opacity-10" viewBox="0 0 1920 1080" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,0 C300,150 500,0 900,200 C1300,400 1500,100 1920,300 L1920,1080 L0,1080 Z" fill="white"/>
            </svg>
        </div> --}}
    </div>

    <section class="py-20 bg-gradient-to-b from-cyan-50 to-blue-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($terrains as $terrain)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:transform hover:-translate-y-2 group border border-gray-100">
                    <div class="relative">
                        <img class="h-72 w-full object-cover" src="{{ asset('storage/' . $terrain->photo) }}" alt="{{ $terrain->name }}">
                        <div class="absolute top-4 right-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            {{ $terrain->prix }}€ <span class="text-xs font-normal opacity-90">/heure</span>
                        </div>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <h3 class="text-2xl font-bold text-white mb-2">{{ $terrain->name }}</h3>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-block bg-gradient-to-r from-cyan-100 to-blue-100 text-cyan-800 text-xs px-3 py-1.5 rounded-full font-medium">
                                {{ $terrain->categorie->name ?? 'Non catégorisé' }}
                            </span>
                            <div class="flex items-center">
                                <div class="flex items-center text-yellow-400">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 {{ $i < 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-xs font-medium text-gray-600 ml-1">4.5</span>
                            </div>
                        </div>
                        
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $terrain->name }}</h2>
                        
                        <p class="text-gray-500 text-sm mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $terrain->location }}
                        </p>
                        
                        <!-- Features -->
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-md flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Équipé
                            </span>
                            <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-md flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                                Vestiaires
                            </span>
                            <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-md flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Plus
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <a href="{{ route('frontOffice.terrains.show',$terrain->id ) }}" class="text-cyan-600 hover:text-cyan-700 font-medium text-sm flex items-center group/details">
                                Voir les détails
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transition-transform duration-300 group-hover/details:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <div class="flex items-center">
                                <span class="text-sm text-gray-500 mr-2">Disponible</span>
                                <span class="w-3 h-3 bg-green-500 rounded-full relative">
                                    <span class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-75"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination with improved styling -->
            <div class="mt-16 flex justify-center">
                <div class="inline-flex rounded-md shadow-sm">
                    {{ $terrains->onEachSide(1)->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </section>
</section>

@endsection