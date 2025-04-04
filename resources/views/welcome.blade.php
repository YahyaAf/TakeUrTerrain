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
    <section class="py-20 bg-gradient-to-br from-cyan-50 to-blue-50 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute top-0 right-0 w-64 h-64 rounded-full bg-cyan-100 opacity-30 -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full bg-blue-100 opacity-30 translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
        
        <div class="container mx-auto px-4 relative z-10">
          <!-- Section Header -->
          <div class="flex flex-col items-center mb-16">
            <span class="inline-block px-4 py-1 rounded-full bg-cyan-100 text-cyan-700 font-semibold text-sm tracking-wider uppercase mb-3">Simple Process</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2 relative">
              How It <span class="text-cyan-600">Works</span>
              <div class="absolute h-1 w-20 bg-cyan-500 bottom-0 left-1/2 transform -translate-x-1/2 mt-4"></div>
            </h2>
            <p class="text-gray-600 max-w-2xl text-center mt-6">Reserve your favorite sports court in just three simple steps and get ready to play!</p>
          </div>
          
          <!-- Process Steps -->
          <div class="flex flex-col md:flex-row gap-8">
            <!-- Step 1 -->
            <div class="flex-1 group">
              <div class="bg-white rounded-xl p-8 shadow-lg h-full transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl relative overflow-hidden">
                <!-- Background accent -->
                <div class="absolute w-32 h-32 -top-10 -right-10 rounded-full bg-cyan-50 opacity-70 group-hover:bg-cyan-100 transition-all duration-300"></div>
                
                <!-- Icon & Number -->
                <div class="flex items-center justify-between mb-6 relative">
                  <div class="w-14 h-14 flex items-center justify-center rounded-full bg-cyan-100 text-cyan-700 group-hover:bg-cyan-600 group-hover:text-white transition-all duration-300">
                    <i class="fas fa-search text-xl"></i>
                  </div>
                  <span class="text-6xl font-bold text-gray-100 group-hover:text-cyan-50 transition-all duration-300">01</span>
                </div>
                
                <!-- Content -->
                <h3 class="text-xl font-bold text-gray-800 mb-3">Search & Discover</h3>
                <p class="text-gray-600 mb-6">Find the perfect court by location, sport type, price range and available amenities.</p>
                
                <!-- Action Button -->
                <div class="relative">
                  <a href="#" class="inline-flex items-center text-cyan-600 font-medium group-hover:text-cyan-700 transition-all duration-300">
                    Browse Courts
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            
            <!-- Step 2 -->
            <div class="flex-1 group">
              <div class="bg-white rounded-xl p-8 shadow-lg h-full transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl relative overflow-hidden">
                <!-- Background accent -->
                <div class="absolute w-32 h-32 -top-10 -right-10 rounded-full bg-cyan-50 opacity-70 group-hover:bg-cyan-100 transition-all duration-300"></div>
                
                <!-- Icon & Number -->
                <div class="flex items-center justify-between mb-6 relative">
                  <div class="w-14 h-14 flex items-center justify-center rounded-full bg-cyan-100 text-cyan-700 group-hover:bg-cyan-600 group-hover:text-white transition-all duration-300">
                    <i class="fas fa-calendar-check text-xl"></i>
                  </div>
                  <span class="text-6xl font-bold text-gray-100 group-hover:text-cyan-50 transition-all duration-300">02</span>
                </div>
                
                <!-- Content -->
                <h3 class="text-xl font-bold text-gray-800 mb-3">Book & Pay</h3>
                <p class="text-gray-600 mb-6">Select your preferred date and time slot, then complete your booking with secure payment.</p>
                
                <!-- Action Button -->
                <div class="relative">
                  <a href="#" class="inline-flex items-center text-cyan-600 font-medium group-hover:text-cyan-700 transition-all duration-300">
                    View Payment Options
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            
            <!-- Step 3 -->
            <div class="flex-1 group">
              <div class="bg-white rounded-xl p-8 shadow-lg h-full transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl relative overflow-hidden">
                <!-- Background accent -->
                <div class="absolute w-32 h-32 -top-10 -right-10 rounded-full bg-cyan-50 opacity-70 group-hover:bg-cyan-100 transition-all duration-300"></div>
                
                <!-- Icon & Number -->
                <div class="flex items-center justify-between mb-6 relative">
                  <div class="w-14 h-14 flex items-center justify-center rounded-full bg-cyan-100 text-cyan-700 group-hover:bg-cyan-600 group-hover:text-white transition-all duration-300">
                    <i class="fas fa-basketball-ball text-xl"></i>
                  </div>
                  <span class="text-6xl font-bold text-gray-100 group-hover:text-cyan-50 transition-all duration-300">03</span>
                </div>
                
                <!-- Content -->
                <h3 class="text-xl font-bold text-gray-800 mb-3">Play & Enjoy</h3>
                <p class="text-gray-600 mb-6">Receive instant confirmation and check-in details. Just show up and enjoy your game!</p>
                
                <!-- Action Button -->
                <div class="relative">
                  <a href="#" class="inline-flex items-center text-cyan-600 font-medium group-hover:text-cyan-700 transition-all duration-300">
                    Read FAQs
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                  </a>
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
@endsection