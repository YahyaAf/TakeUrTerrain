@extends('frontOffice.layouts.app')

@section('content')
    <div class="pt-24 bg-gradient-to-r from-cyan-500 to-blue-500" style="background-image: url('{{ asset('img/test4.jpg') }}'); background-size: 100% 100%; background-position: center; background-repeat: no-repeat;">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <div class="flex flex-col w-full lg:w-1/2 justify-center items-start pt-12 pb-24 px-6">
                <h1 class="font-bold text-4xl md:text-5xl lg:text-6xl mb-4 text-white">Book Your Court in Seconds</h1>
                <p class="leading-normal mb-8 text-xl text-white opacity-80">Reserve premium sports courts for football, basketball, tennis and more - anytime, anywhere.</p>
                
                <div class="glass-effect rounded-2xl p-6 shadow-xl w-full max-w-lg">
                    <h3 class="font-bold text-lg mb-4 text-white">About Our Courts</h3>
                    <div class="flex flex-col space-y-4">
                        <div class="flex flex-row space-x-4">
                            <div class="w-full">
                                <h4 class="block text-sm font-medium text-white opacity-90 mb-2">Premium Locations</h4>
                                <p class="mt-1 block w-full bg-white/10 backdrop-blur-sm rounded-lg p-3 text-white">
                                    Our courts are strategically located across major cities, providing easy access for all sports enthusiasts. Each location is carefully selected to offer the best experience.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="w-full text-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-24 transform rotate-180 fill-current">
                    <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Sport Categories -->
    <section class="py-16 bg-gray-50" >
        <div class="container mx-auto px-4">
            <div class="flex flex-col text-center w-full mb-12">
                <p class="font-medium text-cyan-600 uppercase tracking-wide mb-2">Find Your Game</p>
                <h2 class="text-4xl font-bold mb-2 text-gray-800">Popular Sports</h2>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600">Premium courts available for all your favorite sports</p>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="sport-card relative rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <img class="h-64 w-full object-cover object-center" src="https://images.unsplash.com/photo-1556056504-5c7696c4c28d?q=80&w=2076&auto=format&fit=crop" alt="Football">
                        <div class="sport-overlay opacity-0 absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent transition-opacity duration-300 flex items-end">
                            <div class="p-6">
                                <h3 class="text-white text-xl font-bold">Football</h3>
                                <p class="text-gray-300 mb-3">Indoor & Outdoor Pitches</p>
                                <button class="bg-cyan-500 hover:bg-cyan-600 text-white text-sm px-4 py-2 rounded-full transition duration-300">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="sport-card relative rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <img class="h-64 w-full object-cover object-center" src="https://images.unsplash.com/photo-1577471488278-16eec37ffcc2?q=80&w=2070&auto=format&fit=crop" alt="Basketball">
                        <div class="sport-overlay opacity-0 absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent transition-opacity duration-300 flex items-end">
                            <div class="p-6">
                                <h3 class="text-white text-xl font-bold">Basketball</h3>
                                <p class="text-gray-300 mb-3">Professional Courts</p>
                                <button class="bg-cyan-500 hover:bg-cyan-600 text-white text-sm px-4 py-2 rounded-full transition duration-300">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="sport-card relative rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <img class="h-64 w-full object-cover object-center" src="https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?q=80&w=2070&auto=format&fit=crop" alt="Tennis">
                        <div class="sport-overlay opacity-0 absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent transition-opacity duration-300 flex items-end">
                            <div class="p-6">
                                <h3 class="text-white text-xl font-bold">Tennis</h3>
                                <p class="text-gray-300 mb-3">Clay & Hard Courts</p>
                                <button class="bg-cyan-500 hover:bg-cyan-600 text-white text-sm px-4 py-2 rounded-full transition duration-300">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="sport-card relative rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <img class="h-64 w-full object-cover object-center" src="https://images.unsplash.com/photo-1612872087720-bb876e2e67d1?q=80&w=2007&auto=format&fit=crop" alt="Volleyball">
                        <div class="sport-overlay opacity-0 absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent transition-opacity duration-300 flex items-end">
                            <div class="p-6">
                                <h3 class="text-white text-xl font-bold">Volleyball</h3>
                                <p class="text-gray-300 mb-3">Indoor & Beach Courts</p>
                                <button class="bg-cyan-500 hover:bg-cyan-600 text-white text-sm px-4 py-2 rounded-full transition duration-300">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-br from-slate-800 to-slate-900 py-16 px-6">
        <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-cyan-700/50 rounded-full border border-cyan-600/50 text-black text-sm font-medium mb-4">
            Notre valeur ajoutée
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-black mb-4">Pourquoi choisir notre plateforme</h2>
            <p class="text-black max-w-2xl mx-auto">Découvrez les avantages qui font de notre service la solution idéale pour tous vos besoins de réservation de terrains sportifs.</p>
        </div>
    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white/90 backdrop-blur-sm p-6 rounded-xl border border-cyan-800/30 hover:border-cyan-500/50 transition-all shadow-lg">
            <div class="w-12 h-12 bg-cyan-500/20 rounded-lg flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 mb-2">Réservation facile</h3>
            <p class="text-slate-700">Réservez votre terrain en quelques clics depuis notre application ou site web, à tout moment.</p>
            </div>
    
            <div class="bg-white/90 backdrop-blur-sm p-6 rounded-xl border border-cyan-800/30 hover:border-cyan-500/50 transition-all shadow-lg">
            <div class="w-12 h-12 bg-cyan-500/20 rounded-lg flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 mb-2">Terrains de qualité</h3>
            <p class="text-slate-700">Accédez aux meilleurs terrains de football, basketball et tennis dans votre région.</p>
            </div>
    
            <div class="bg-white/90 backdrop-blur-sm p-6 rounded-xl border border-cyan-800/30 hover:border-cyan-500/50 transition-all shadow-lg">
            <div class="w-12 h-12 bg-cyan-500/20 rounded-lg flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 mb-2">Prix compétitifs</h3>
            <p class="text-slate-700">Bénéficiez de tarifs avantageux et transparents pour toutes vos sessions sportives.</p>
            </div>
        </div>
        </div>
    </section>
@endsection