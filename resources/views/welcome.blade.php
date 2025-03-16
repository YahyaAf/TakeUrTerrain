<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsPitch | Premium Sports Court Reservation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        .hero-pattern {
            background-image: url('/api/placeholder/1920/1080');
            background-size: cover;
            background-position: center;
        }
        
        .gradient-overlay {
            background: linear-gradient(to right, rgba(6, 182, 212, 0.9), rgba(6, 182, 212, 0.7), rgba(6, 182, 212, 0.5));
        }
        
        .custom-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .sport-card:hover .sport-overlay {
            opacity: 1;
        }
        
        .court-card:hover {
            transform: translateY(-10px);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        .time-slot:hover {
            background-color: #06b6d4;
            color: white;
            transform: scale(1.05);
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #06b6d4, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .loader {
            border-top-color: #06b6d4;
            -webkit-animation: spinner 1.5s linear infinite;
            animation: spinner 1.5s linear infinite;
        }
        
        @-webkit-keyframes spinner {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }
        
        @keyframes spinner {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">
    <!-- Navigation -->
    <nav class="fixed w-full z-30 top-0 bg-white bg-opacity-90 backdrop-filter backdrop-blur-sm">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
            <div class="pl-4 flex items-center">
                <a class="text-2xl font-bold text-cyan-600 no-underline hover:no-underline" href="#">
                    <i class="fas fa-table-tennis-paddle-ball text-cyan-600 mr-2"></i>SportsPitch
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle" class="flex items-center p-1 text-cyan-600 hover:text-cyan-800 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-gray-800 font-bold no-underline hover:text-cyan-600" href="#">Home</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-cyan-600 hover:font-bold py-2 px-4" href="#">Sports</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-cyan-600 hover:font-bold py-2 px-4" href="#">Courts</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-cyan-600 hover:font-bold py-2 px-4" href="#">Pricing</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-cyan-600 hover:font-bold py-2 px-4" href="#">Contact</a>
                    </li>
                </ul>
                <a href="#" class="mx-auto lg:mx-0 hover:underline bg-gradient-to-r from-cyan-500 to-blue-500 text-white font-bold rounded-full mt-4 lg:mt-0 py-2 px-6 shadow hover:shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Book Now
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
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
                        <img class="h-64 w-full object-cover object-center" src="/api/placeholder/600/400" alt="Basketball">
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
                        <img class="h-64 w-full object-cover object-center" src="/api/placeholder/600/400" alt="Tennis">
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
                        <img class="h-64 w-full object-cover object-center" src="/api/placeholder/600/400" alt="Volleyball">
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
                            <img class="h-56 w-full object-cover object-center" src="/api/placeholder/600/400" alt="Elite Football Arena">
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
                            <img class="h-56 w-full object-cover object-center" src="/api/placeholder/600/400" alt="Grand Slam Tennis">
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
                            <img class="h-56 w-full object-cover object-center" src="/api/placeholder/600/400" alt="Pro Basketball Arena">
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
                            <img alt="testimonial" src="/api/placeholder/100/100" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
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
                            <img alt="testimonial" src="/api/placeholder/100/100" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
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
                            <img alt="testimonial" src="/api/placeholder/100/100" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
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

    <!-- Pricing & Membership -->
    <section class="py-16 bg-gradient-to-b from-cyan-50 to-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col text-center w-full mb-12">
                <p class="font-medium text-cyan-600 uppercase tracking-wide mb-2">Flexible Options</p>
                <h2 class="text-4xl font-bold mb-2 text-gray-800">Membership Plans</h2>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600">Choose the plan that best fits your sporting needs</p>
            </div>
            
            <div class="flex flex-wrap -m-4">
                <!-- Pricing Card 1 -->
                <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                    <div class="h-full p-6 rounded-2xl shadow-lg flex flex-col relative overflow-hidden bg-white">
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium text-cyan-600 uppercase">Basic</h2>
                        <h1 class="text-5xl text-gray-900 pb-4 mb-4 border-b border-gray-200 leading-none">Free</h1>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Access to search all courts
                        </p>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Standard booking
                        </p>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Email support
                        </p>
                        <button class="flex items-center mt-auto text-white bg-cyan-500 border-0 py-3 px-4 w-full focus:outline-none hover:bg-cyan-600 rounded-lg transition duration-300">Sign Up
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Pricing Card 2 -->
                <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                    <div class="h-full p-6 rounded-2xl shadow-lg flex flex-col relative overflow-hidden bg-white">
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium text-cyan-600 uppercase">Basic</h2>
                        <h1 class="text-5xl text-gray-900 pb-4 mb-4 border-b border-gray-200 leading-none">Free</h1>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Access to search all courts
                        </p>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Standard booking
                        </p>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Email support
                        </p>
                        <button class="flex items-center mt-auto text-white bg-cyan-500 border-0 py-3 px-4 w-full focus:outline-none hover:bg-cyan-600 rounded-lg transition duration-300">Sign Up
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                    <div class="h-full p-6 rounded-2xl shadow-lg flex flex-col relative overflow-hidden bg-white">
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium text-cyan-600 uppercase">Basic</h2>
                        <h1 class="text-5xl text-gray-900 pb-4 mb-4 border-b border-gray-200 leading-none">Free</h1>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Access to search all courts
                        </p>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Standard booking
                        </p>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Email support
                        </p>
                        <button class="flex items-center mt-auto text-white bg-cyan-500 border-0 py-3 px-4 w-full focus:outline-none hover:bg-cyan-600 rounded-lg transition duration-300">Sign Up
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                    <div class="h-full p-6 rounded-2xl shadow-lg flex flex-col relative overflow-hidden bg-white">
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium text-cyan-600 uppercase">Basic</h2>
                        <h1 class="text-5xl text-gray-900 pb-4 mb-4 border-b border-gray-200 leading-none">Free</h1>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Access to search all courts
                        </p>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Standard booking
                        </p>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-cyan-500 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Email support
                        </p>
                        <button class="flex items-center mt-auto text-white bg-cyan-500 border-0 py-3 px-4 w-full focus:outline-none hover:bg-cyan-600 rounded-lg transition duration-300">Sign Up
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- App Download Section -->
    <section class="py-16 bg-gradient-to-r from-cyan-600 to-blue-600 relative overflow-hidden">
        <!-- Background Design Elements -->
        <div class="absolute top-0 left-0 w-full h-full opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 rounded-full bg-white"></div>
            <div class="absolute bottom-10 right-20 w-48 h-48 rounded-full bg-white"></div>
            <div class="absolute top-1/2 left-1/3 w-16 h-16 rounded-full bg-white"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-1/2 mb-10 lg:mb-0">
                    <h2 class="text-4xl font-bold text-white mb-4">Take SportsPitch With You</h2>
                    <p class="text-cyan-100 text-lg mb-8">Download our mobile app to book courts on the go, receive instant notifications, and manage your reservations.</p>
                    <div class="flex flex-wrap">
                        <a href="#" class="flex items-center bg-black text-white rounded-xl px-6 py-3 mr-4 mb-4 hover:bg-gray-900 transition duration-300">
                            <svg class="w-8 h-8 mr-3" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5646 6.43871C16.1942 4.70499 14.04 3.66285 11.684 3.66285C7.35385 3.66285 3.81487 7.12801 3.81487 11.5752C3.81487 12.941 4.12754 14.2678 4.69423 15.4454L3.69849 20.4258L8.76299 19.4538C9.8998 19.9741 11.158 20.2522 12.4544 20.2522H12.4929C16.8201 20.2522 20.5132 16.7858 20.5132 12.3386C20.5132 10.0421 19.3655 7.84973 17.5646 6.43871ZM11.684 18.9636C10.5364 18.9636 9.42695 18.7004 8.43121 18.2038L8.12002 18.0258L5.13436 18.6083L5.72024 15.7111L5.52296 15.3866C4.96834 14.3559 4.6956 12.9796 4.6956 11.5752C4.6956 7.65832 7.69418 4.52859 11.722 4.52859C13.7251 4.52859 15.5645 5.40429 16.7506 6.85693C17.9383 8.31115 18.5625 10.175 18.5625 12.3386C18.5241 16.2932 15.7126 18.9636 11.684 18.9636ZM15.7126 13.5903C15.5153 13.4906 14.354 12.9193 14.1951 12.8581C14.0361 12.7969 13.9139 12.7673 13.7934 12.9647C13.6729 13.162 13.2164 13.694 13.1342 13.8139C13.052 13.9352 12.9698 13.9473 12.7724 13.8476C11.2431 13.0847 10.2459 12.4869 9.24869 10.7506C8.98696 10.3303 9.49063 10.3643 9.9549 9.45019C10.0371 9.32887 10.0371 9.22764 10.0755 9.12949C10.1139 9.03134 10.1139 8.87121 10.0755 8.74989C10.0371 8.62857 9.53193 7.46812 9.37146 7.07674C9.21247 6.69703 9.05348 6.74822 8.97128 6.74822C8.88909 6.74822 8.76692 6.74822 8.64623 6.74822C8.52554 6.74822 8.32826 6.78776 8.16779 6.98407C8.00732 7.18037 7.39206 7.75213 7.39206 8.91258C7.39206 10.073 8.24798 11.1948 8.37016 11.316C8.49085 11.4373 9.51012 13.0996 11.1581 13.9376C12.3069 14.5354 12.7738 14.5966 13.3789 14.5C13.7934 14.4388 14.7508 13.9257 14.9113 13.4624C15.0717 12.9988 15.0717 12.6074 15.0333 12.5462C14.9949 12.485 14.8742 12.4484 14.6768 12.3884C14.4795 12.3284 15.7126 13.5903 15.7126 13.5903Z"/>
                            </svg>
                            <div>
                                <div class="text-xs">Get it on</div>
                                <div class="text-xl font-semibold">App Store</div>
                            </div>
                        </a>
                        <a href="#" class="flex items-center bg-black text-white rounded-xl px-6 py-3 mb-4 hover:bg-gray-900 transition duration-300">
                            <svg class="w-8 h-8 mr-3" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5225 11.5915L14.6928 10.0346L6.3875 5.3175C6.2175 5.2215 6.0405 5.1705 5.8618 5.1705C5.2658 5.1705 4.7798 5.6565 4.7798 6.2525V18.6545C4.7798 19.0125 4.9538 19.3995 5.2455 19.5735C5.3985 19.6695 5.5755 19.7205 5.7525 19.7205C5.9295 19.7205 6.1065 19.6695 6.2595 19.5735L17.6115 13.4525C17.8955 13.2755 18.0725 12.9855 18.0725 12.6615C18.0708 12.2715 17.8598 11.9265 17.5225 11.5915Z"/>
                            </svg>
                            <div>
                                <div class="text-xs">Download on</div>
                                <div class="text-xl font-semibold">Google Play</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 flex justify-center lg:justify-end">
                    <div class="relative">
                        <img src="/api/placeholder/380/760" alt="Mobile App" class="w-64 relative z-10 rounded-3xl shadow-2xl">
                        <!-- Phone decoration elements -->
                        <div class="absolute -top-4 -left-4 w-64 h-full border-2 border-cyan-200 rounded-3xl"></div>
                        <div class="absolute -bottom-4 -right-4 w-64 h-full border-2 border-cyan-200 rounded-3xl"></div>
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

    <!-- Footer Main -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <!-- Brand Column -->
                <div class="w-full md:w-1/4 mb-10 md:mb-0">
                    <a class="text-2xl font-bold text-white flex items-center mb-6" href="#">
                        <i class="fas fa-table-tennis-paddle-ball text-cyan-400 mr-2"></i>SportsPitch
                    </a>
                    <p class="text-gray-400 mb-6">The easiest way to book premium sports courts online. Play your favorite sports at top-rated facilities.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-gray-800 hover:bg-cyan-600 w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="#" class="bg-gray-800 hover:bg-cyan-600 w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="#" class="bg-gray-800 hover:bg-cyan-600 w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                        <a href="#" class="bg-gray-800 hover:bg-cyan-600 w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                            <i class="fab fa-youtube text-white"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="w-full md:w-1/4 mb-10 md:mb-0">
                    <h3 class="text-lg font-bold mb-6 relative">
                        Quick Links
                        <span class="absolute bottom-0 left-0 w-10 h-1 bg-cyan-500"></span>
                    </h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Sports</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Locations</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Sports -->
                <div class="w-full md:w-1/4 mb-10 md:mb-0">
                    <h3 class="text-lg font-bold mb-6 relative">
                        Sports
                        <span class="absolute bottom-0 left-0 w-10 h-1 bg-cyan-500"></span>
                    </h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Football</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Basketball</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Tennis</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Volleyball</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Badminton</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition duration-300">Cricket</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div class="w-full md:w-1/4">
                    <h3 class="text-lg font-bold mb-6 relative">
                        Contact Us
                        <span class="absolute bottom-0 left-0 w-10 h-1 bg-cyan-500"></span>
                    </h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-cyan-400 mt-1 mr-3"></i>
                            <span class="text-gray-400">123 Stadium Drive, Sports Valley, SV 12345</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt text-cyan-400 mt-1 mr-3"></i>
                            <span class="text-gray-400">+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope text-cyan-400 mt-1 mr-3"></i>
                            <span class="text-gray-400">info@sportspitch.com</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-clock text-cyan-400 mt-1 mr-3"></i>
                            <span class="text-gray-400">Mon-Fri: 8AM - 10PM<br>Sat-Sun: 9AM - 8PM</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2025 SportsPitch. All rights reserved.</p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-cyan-400 text-sm transition duration-300">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-cyan-400 text-sm transition duration-300">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-cyan-400 text-sm transition duration-300">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>