@extends('frontOffice.layouts.app')

@section('content')
    <div class="pt-24 bg-gradient-to-r from-cyan-500 to-blue-500" style="background-image: url('https://images.unsplash.com/photo-1552168324-d612d77725e3?q=80&w=2000&auto=format&fit=crop'); background-size: cover; background-blend-mode: overlay;">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <div class="flex flex-col w-full lg:w-1/2 justify-center items-start pt-12 pb-24 px-6">
                <h1 class="font-bold text-4xl md:text-5xl lg:text-6xl mb-4 text-white">Book Your Court in Seconds</h1>
                <p class="leading-normal mb-8 text-xl text-white opacity-80">Reserve premium sports courts for football, basketball, tennis and more - anytime, anywhere.</p>
                
                <!-- Search Box -->
                <div class="glass-effect rounded-2xl p-6 shadow-xl w-full max-w-lg">
                    <h3 class="font-bold text-lg mb-4 text-white">Find Available Courts</h3>
                    <div class="flex flex-col space-y-4">
                        <div class="flex flex-row space-x-4">
                            <div class="w-full">
                                <label class="block text-sm font-medium text-white opacity-90">Location</label>
                                <input type="text" class="mt-1 block w-full border-0 rounded-lg shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-3" placeholder="City, Region or ZIP">
                            </div>
                        </div>
                        <div class="flex flex-row space-x-4">
                            <div class="w-1/2">
                                <label class="block text-sm font-medium text-white opacity-90">Sport Type</label>
                                <select class="mt-1 block w-full border-0 rounded-lg shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-3">
                                    <option>All Sports</option>
                                    <option>Football</option>
                                    <option>Basketball</option>
                                    <option>Tennis</option>
                                    <option>Volleyball</option>
                                </select>
                            </div>
                            <div class="w-1/2">
                                <label class="block text-sm font-medium text-white opacity-90">Date</label>
                                <input type="date" class="mt-1 block w-full border-0 rounded-lg shadow-sm focus:ring-cyan-500 focus:border-cyan-500 p-3">
                            </div>
                        </div>
                        <button class="mt-4 w-full bg-white text-cyan-600 font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            Find Courts
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 lg:py-6 text-center">
                <img class="w-full md:w-4/5 z-50 mx-auto animate-float custom-shadow rounded-2xl" src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?q=80&w=1000&auto=format&fit=crop" alt="Sports court visualization">
            </div>
        </div>
        
        <!-- Wave Separator -->
        <div class="w-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-24 transform rotate-180">
                <path fill="#f9fafb" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
            </svg>
        </div>
    </div>

    <!-- Sport Categories -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col text-center w-full mb-12">
                <p class="font-medium text-cyan-600 uppercase tracking-wide mb-2">Find Your Game</p>
                <h2 class="text-4xl font-bold mb-2 text-gray-800">Popular Sports</h2>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600">Premium courts available for all your favorite sports</p>
            </div>
            <div class="flex flex-wrap -m-4">
                <!-- Sport Card 1 -->
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
                
                <!-- Sport Card 2 -->
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
                
                <!-- Sport Card 3 -->
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
                
                <!-- Sport Card 4 -->
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

    <!-- Featured Courts -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col text-center w-full mb-12">
                <p class="font-medium text-cyan-600 uppercase tracking-wide mb-2">Premium Experience</p>
                <h2 class="text-4xl font-bold mb-2 text-gray-800">Featured Courts</h2>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600">Discover our top-rated sports facilities with state-of-the-art amenities</p>
            </div>
            
            <div class="flex flex-wrap -m-4">
                <!-- Court Card 1 -->
                <div class="p-4 lg:w-1/3 md:w-1/2">
                    <div class="h-full court-card bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl">
                        <div class="relative">
                            <img class="h-56 w-full object-cover object-center" src="https://images.pexels.com/photos/270085/pexels-photo-270085.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Elite Football Arena">
                            <div class="absolute top-4 right-4 bg-white py-1 px-3 rounded-full">
                                <span class="text-sm font-bold text-cyan-600">⭐ 4.9</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-1">Elite Football Arena</h2>
                            <p class="text-gray-500 text-sm mb-3"><i class="fas fa-map-marker-alt mr-2 text-cyan-600"></i>Central Park, New York</p>
                            <div class="flex flex-wrap mb-4">
                                <span class="mr-2 mb-2 px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs"><i class="fas fa-tshirt mr-1"></i>Changing Rooms</span>
                                <span class="mr-2 mb-2 px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs"><i class="fas fa-shower mr-1"></i>Showers</span>
                                <span class="mr-2 mb-2 px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs"><i class="fas fa-parking mr-1"></i>Parking</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-xl font-bold text-cyan-600">$45</span>
                                    <span class="text-gray-600 text-sm">/hour</span>
                                </div>
                                <button class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                                    Book Court
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Court Card 2 -->
                <div class="p-4 lg:w-1/3 md:w-1/2">
                    <div class="h-full court-card bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl">
                        <div class="relative">
                            <img class="h-56 w-full object-cover object-center" src="https://cdn.pixabay.com/photo/2016/05/09/11/09/tennis-1381230_1280.jpg" alt="Grand Slam Tennis">
                            <div class="absolute top-4 right-4 bg-white py-1 px-3 rounded-full">
                                <span class="text-sm font-bold text-cyan-600">⭐ 4.8</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-1">Grand Slam Tennis</h2>
                            <p class="text-gray-500 text-sm mb-3"><i class="fas fa-map-marker-alt mr-2 text-cyan-600"></i>Riverside, Chicago</p>
                            <div class="flex flex-wrap mb-4">
                                <span class="mr-2 mb-2 px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs"><i class="fas fa-lightbulb mr-1"></i>Floodlights</span>
                                <span class="mr-2 mb-2 px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs"><i class="fas fa-utensils mr-1"></i>Café</span>
                                <span class="mr-2 mb-2 px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs"><i class="fas fa-wifi mr-1"></i>Free WiFi</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-xl font-bold text-cyan-600">$38</span>
                                    <span class="text-gray-600 text-sm">/hour</span>
                                </div>
                                <button class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                                    Book Court
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Court Card 3 -->
                <div class="p-4 lg:w-1/3 md:w-1/2">
                    <div class="h-full court-card bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl">
                        <div class="relative">
                            <img class="h-56 w-full object-cover object-center" src="https://images.unsplash.com/photo-1504450758481-7338eba7524a?q=80&w=2069&auto=format&fit=crop" alt="Pro Basketball Arena">
                            <div class="absolute top-4 right-4 bg-white py-1 px-3 rounded-full">
                                <span class="text-sm font-bold text-cyan-600">⭐ 4.7</span>
                            </div>
                            <div class="absolute top-4 left-4 bg-gradient-to-r from-purple-500 to-purple-700 text-white py-1 px-3 rounded-full text-xs font-bold">
                                FEATURED
                            </div>
                        </div>
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-1">Pro Basketball Arena</h2>
                            <p class="text-gray-500 text-sm mb-3"><i class="fas fa-map-marker-alt mr-2 text-cyan-600"></i>Downtown, Los Angeles</p>
                            <div class="flex flex-wrap mb-4">
                                <span class="mr-2 mb-2 px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs"><i class="fas fa-basketball-ball mr-1"></i>Pro Equipment</span>
                                <span class="mr-2 mb-2 px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs"><i class="fas fa-dumbbell mr-1"></i>Gym Access</span>
                                <span class="mr-2 mb-2 px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs"><i class="fas fa-video mr-1"></i>Recording</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-xl font-bold text-cyan-600">$52</span>
                                    <span class="text-gray-600 text-sm">/hour</span>
                                </div>
                                <button class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                                    Book Court
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center px-8 py-3 border border-cyan-600 text-cyan-600 font-medium rounded-full hover:bg-cyan-600 hover:text-white transition duration-300">
                    View All Courts
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col text-center w-full mb-12">
                <p class="font-medium text-cyan-600 uppercase tracking-wide mb-2">Simple Process</p>
                <h2 class="text-4xl font-bold mb-2 text-gray-800">How It Works</h2>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600">Book your favorite sports court in just three easy steps</p>
            </div>
            <div class="flex flex-wrap -m-4">
                <!-- Step 1 -->
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-2xl h-full bg-white p-8 flex-col shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 mr-4 inline-flex items-center justify-center rounded-full bg-cyan-100 text-cyan-600 flex-shrink-0">
                                <span class="text-xl font-bold">1</span>
                            </div>
                            <h2 class="text-gray-900 text-lg font-medium">Search & Discover</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="text-gray-600 text-base">Find the perfect court by location, sport type, price range and available amenities.</p>
                            <div class="mt-4 text-cyan-600 inline-flex items-center">
                                Browse Courts
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-2xl h-full bg-white p-8 flex-col shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 mr-4 inline-flex items-center justify-center rounded-full bg-cyan-100 text-cyan-600 flex-shrink-0">
                                <span class="text-xl font-bold">2</span>
                            </div>
                            <h2 class="text-gray-900 text-lg font-medium">Book & Pay</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="text-gray-600 text-base">Select your preferred date and time slot, then complete your booking with secure payment.</p>
                            <div class="mt-4 text-cyan-600 inline-flex items-center">
                                View Payment Options
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-2xl h-full bg-white p-8 flex-col shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 mr-4 inline-flex items-center justify-center rounded-full bg-cyan-100 text-cyan-600 flex-shrink-0">
                                <span class="text-xl font-bold">3</span>
                            </div>
                            <h2 class="text-gray-900 text-lg font-medium">Play & Enjoy</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="text-gray-600 text-base">Receive instant confirmation and check-in details. Just show up and enjoy your game!</p>
                            <div class="mt-4 text-cyan-600 inline-flex items-center">
                                Read FAQs
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col text-center w-full mb-12">
                <p class="font-medium text-cyan-600 uppercase tracking-wide mb-2">Customer Stories</p>
                <h2 class="text-4xl font-bold mb-2 text-gray-800">What Athletes Say</h2>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600">Read what sports enthusiasts think about our courts and services</p>
            </div>
            
            <div class="flex flex-wrap -m-4">
                <!-- Testimonial 1 -->
                <div class="p-4 md:w-1/3">
                    <div class="h-full bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-8 h-8 text-cyan-400 mb-4" viewBox="0 0 975.036 975.036">
                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg>
                        <p class="leading-relaxed mb-6 text-gray-600">SportsPitch has completely transformed how I book courts. No more waiting in lines or making phone calls. Their tennis courts are world-class and always well-maintained.</p>
                        <div class="inline-flex items-center">
                            <img alt="testimonial" src="https://randomuser.me/api/portraits/men/32.jpg" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <div class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">Sarah Johnson</span>
                                <span class="text-gray-500 text-sm">Tennis Enthusiast</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="p-4 md:w-1/3">
                    <div class="h-full bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-8 h-8 text-cyan-400 mb-4" viewBox="0 0 975.036 975.036">
                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg>
                        <p class="leading-relaxed mb-6 text-gray-600">Our basketball team uses SportsPitch for all our practices. The booking system is seamless, and we love the modern facilities. Highly recommended for any serious team!</p>
                        <div class="inline-flex items-center">
                            <img alt="testimonial" src="https://randomuser.me/api/portraits/women/45.jpg" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <div class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">Michael Torres</span>
                                <span class="text-gray-500 text-sm">Basketball Coach</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="p-4 md:w-1/3">
                    <div class="h-full bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-8 h-8 text-cyan-400 mb-4" viewBox="0 0 975.036 975.036">
                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg>
                        <p class="leading-relaxed mb-6 text-gray-600">The ease of booking on SportsPitch is unmatched. I love that I can see real-time availability and the football pitch conditions. Great value for the quality provided!</p>
                        <div class="inline-flex items-center">
                            <img alt="testimonial" src="https://randomuser.me/api/portraits/men/76.jpg" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <div class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">Emma Liu</span>
                                <span class="text-gray-500 text-sm">Football Player</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 relative overflow-hidden">
                <!-- Decorative elements -->
                <div class="absolute -right-12 -top-12 w-40 h-40 rounded-full bg-cyan-50"></div>
                <div class="absolute -left-12 -bottom-12 w-40 h-40 rounded-full bg-blue-50"></div>
                
                <div class="relative z-10">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Stay Updated</h3>
                        <p class="text-gray-600">Subscribe to our newsletter for exclusive offers, new court openings and sports tips.</p>
                    </div>
                    <form class="flex flex-col md:flex-row gap-4">
                        <input type="email" placeholder="Enter your email" class="flex-grow px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                        <button type="submit" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium py-3 px-6 rounded-lg transition duration-300 whitespace-nowrap">
                            Subscribe Now
                        </button>
                    </form>
                    <p class="text-xs text-gray-500 mt-4 text-center">We respect your privacy. Unsubscribe at any time.</p>
                </div>
            </div>
        </div>
    </section>
@endsection