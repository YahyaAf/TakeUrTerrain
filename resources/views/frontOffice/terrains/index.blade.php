@extends('frontOffice.layouts.app')

@section('content')
<main class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- Hero Section with Angled Design -->
    <section class="relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-400 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-cyan-400 rounded-full blur-3xl"></div>
        
        <!-- Hero Background -->
        <div class="relative h-[500px] bg-gradient-to-r from-blue-800 to-cyan-600 overflow-hidden">
            <!-- Background Image without Overlay -->
            <div class="absolute inset-0">
                <img src="img/lionel-messi-football-barcelona-hd-wallpaper-preview.jpg" alt="Football field" class="w-full h-full object-cover object-center">
            </div>
            
            <!-- Decorative Shapes -->
            <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-br from-gray-50 to-blue-50 transform -skew-y-3"></div>
            
            <!-- Content -->
            <div class="container mx-auto px-4 relative z-10 pt-28">
                <div class="max-w-3xl">
                    <span class="inline-block px-4 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-sm font-medium mb-6">Réservez en quelques clics</span>
                    <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight">Trouvez le <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-200">terrain parfait</span> pour votre sport</h1>
                    <p class="text-xl text-blue-100 mb-8 max-w-2xl">Découvrez nos terrains disponibles et réservez dès maintenant pour votre prochaine activité sportive</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    <section class="relative z-20 -mt-24 container mx-auto px-4 mb-12">
        <div class="bg-white rounded-2xl shadow-xl p-6 backdrop-blur-sm border border-gray-100">
            <form method="GET" action="{{ route('frontOffice.terrains.index') }}">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom du terrain</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ request('name') }}"
                                placeholder="Rechercher par nom"
                                class="w-full pl-10 pr-4 py-3 border-0 focus:ring-0 rounded-xl bg-gray-50 text-gray-900 focus:bg-white transition focus:shadow-sm"
                            />
                        </div>
                    </div>
            
                    <div class="space-y-2">
                        <label for="adresse" class="block text-sm font-medium text-gray-700">Localisation</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="adresse"
                                name="adresse"
                                value="{{ request('adresse') }}"
                                placeholder="Rechercher par adresse"
                                class="w-full pl-10 pr-4 py-3 border-0 focus:ring-0 rounded-xl bg-gray-50 text-gray-900 focus:bg-white transition focus:shadow-sm"
                            />
                        </div>
                    </div>
            
                    <div class="space-y-2">
                        <label for="categorie_id" class="block text-sm font-medium text-gray-700">Type de terrain</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                            </div>
                            <select
                                id="categorie_id"
                                name="categorie_id"
                                class="w-full pl-10 pr-10 py-3 border-0 focus:ring-0 rounded-xl bg-gray-50 text-gray-900 focus:bg-white transition focus:shadow-sm appearance-none"
                            >
                                <option value="">Toutes les catégories</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ request('category_id') == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="prix_max" class="block text-sm font-medium text-gray-700">Budget maximum</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input
                                type="number"
                                id="prix_max"
                                name="prix_max"
                                value="{{ request('prix_max') }}"
                                placeholder="Prix maximum"
                                class="w-full pl-10 pr-4 py-3 border-0 focus:ring-0 rounded-xl bg-gray-50 text-gray-900 focus:bg-white transition focus:shadow-sm"
                            />
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 flex justify-center">
                    <button
                        type="submit"
                        class="px-8 py-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white font-medium rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1 flex items-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Rechercher
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Terrains Section -->
    <section class="container mx-auto px-4 py-12 mb-20">
        <header class="text-center mb-16">
            <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-medium uppercase tracking-wider mb-3">Nos terrains</span>
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Découvrez nos espaces sportifs</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Choisissez parmi notre sélection de terrains de haute qualité pour vos activités sportives</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($terrains as $terrain)
            <div class="group relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 border border-gray-100 flex flex-col h-full transform hover:-translate-y-2">
                <!-- Image with gradient overlay -->
                <div class="relative h-64 overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                         src="{{ asset('storage/' . $terrain->photo) }}" 
                         alt="{{ $terrain->name }}">
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4 z-10">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full bg-white backdrop-blur-sm text-xs font-medium text-blue-800">
                            {{ $terrain->categorie->name ?? 'Non catégorisé' }}
                        </span>
                    </div>
                    
                    <!-- Price Badge -->
                    <div class="absolute top-4 right-4 z-10">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 text-white text-sm font-bold shadow-lg">
                            {{ $terrain->prix }}€<span class="text-xs font-normal">/h</span>
                        </span>
                    </div>
                    
                    <!-- Gradient Overlay - Removed opacity -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent group-hover:opacity-80 transition-opacity"></div>
                    
                    <!-- Content Over Image -->
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-cyan-300 transition-colors">{{ $terrain->name }}</h3>
                        <p class="text-gray-200 text-sm flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $terrain->adresse }}
                        </p>
                        
                        <!-- Rating -->
                        <div class="flex items-center">
                            <div class="flex items-center text-yellow-400">
                                @php
                                    $note = round($moyennes[$terrain->id] ?? 0, 1);
                                    $fullStars = floor($note); 
                                    $halfStar = ($note - $fullStars) >= 0.5 ? true : false; 
                                @endphp
                                
                                @for($i = 0; $i < $fullStars; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                @endfor
                        
                                @if($halfStar)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                @endif
                        
                                @for($i = $fullStars + ($halfStar ? 1 : 0); $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-xs font-medium text-white ml-2">
                                {{ number_format($note, 1) }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Features -->
                <div class="p-6 flex-grow">
                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1.5 rounded-lg flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Équipé
                        </span>
                        <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1.5 rounded-lg flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                            Vestiaires
                        </span>
                        <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1.5 rounded-lg flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Plus
                        </span>
                    </div>
                    
                    <!-- Status & Action -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <span class="relative flex h-3 w-3 mr-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                            </span>
                            <span class="text-sm text-gray-600">Disponible maintenant</span>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="px-6 pb-6 mt-auto">
                    <a href="{{ route('frontOffice.terrains.show',$terrain->id ) }}" 
                       class="block w-full py-3 px-4 text-center bg-gradient-to-r from-blue-50 to-cyan-50 hover:from-blue-500 hover:to-cyan-500 text-blue-600 hover:text-white font-medium rounded-xl transition-colors duration-300 border border-blue-200 hover:border-transparent">
                        Voir les détails
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-16 flex justify-center">
            <div class="inline-flex rounded-lg overflow-hidden">
                {{ $terrains->onEachSide(1)->links('pagination::tailwind') }}
            </div>
        </div>
    </section>
</main>
@endsection