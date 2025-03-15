<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TerrainPro | Premium Terrain Reservation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hero-pattern {
            background-image: url('/api/placeholder/1920/1080');
            background-size: cover;
            background-position: center;
        }
        .gradient-overlay {
            background: linear-gradient(to right, rgba(31, 41, 55, 0.9), rgba(31, 41, 55, 0.6), rgba(31, 41, 55, 0.2));
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
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Navigation -->
    <nav class="fixed w-full z-30 top-0 bg-white bg-opacity-90 backdrop-filter backdrop-blur-sm">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
            <div class="pl-4 flex items-center">
                <a class="text-2xl font-bold text-green-600 no-underline hover:no-underline" href="#">
                    <i class="fas fa-mountain text-green-600 mr-2"></i>TerrainPro
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle" class="flex items-center p-1 text-green-600 hover:text-green-800 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-gray-800 font-bold no-underline hover:text-green-600" href="#">Home</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-green-600 hover:font-bold py-2 px-4" href="#">Properties</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-green-600 hover:font-bold py-2 px-4" href="#">Services</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-green-600 hover:font-bold py-2 px-4" href="#">About</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-green-600 hover:font-bold py-2  px-4" href="#">Contact</a>
                    </li>
                </ul>
                <a href="#" class="mx-auto lg:mx-0 hover:underline bg-green-600 text-white font-bold rounded-full mt-4 lg:mt-0 py-2 px-6 shadow hover:bg-green-700 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Book Now
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <div class="flex flex-col w-full lg:w-1/2 justify-center items-start pt-12 pb-24 px-6">
                <h1 class="font-bold text-4xl md:text-5xl lg:text-6xl mb-4 text-gray-800">Find Your Perfect Terrain</h1>
                <p class="leading-normal mb-8 text-xl text-gray-600">Discover and reserve premium terrains for your dream projects, adventures, and developments.</p>
                
                <!-- Search Box -->
                <div class="bg-white rounded-lg p-5 shadow-lg w-full max-w-lg">
                    <h3 class="font-bold text-lg mb-4">Find Available Terrains</h3>
                    <div class="flex flex-col space-y-4">
                        <div class="flex flex-row space-x-4">
                            <div class="w-full">
                                <label class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2 border" placeholder="City, Region or ZIP">
                            </div>
                        </div>
                        <div class="flex flex-row space-x-4">
                            <div class="w-1/2">
                                <label class="block text-sm font-medium text-gray-700">Terrain Type</label>
                                <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2 border">
                                    <option>All Types</option>
                                    <option>Residential</option>
                                    <option>Commercial</option>
                                    <option>Agricultural</option>
                                    <option>Forest</option>
                                </select>
                            </div>
                            <div class="w-1/2">
                                <label class="block text-sm font-medium text-gray-700">Size (m²)</label>
                                <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2 border">
                                    <option>Any Size</option>
                                    <option>Less than 500</option>
                                    <option>500 - 1000</option>
                                    <option>1000 - 5000</option>
                                    <option>5000+</option>
                                </select>
                            </div>
                        </div>
                        <button class="mt-4 w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-md focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            Search Terrains
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 lg:py-6 text-center">
                <img class="w-full md:w-4/5 z-50 mx-auto animate-float custom-shadow rounded-lg" src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=800&q=80" alt="Terrain map visualization">
            </div>
        </div>
    </div>

    <!-- Featured Properties -->
    <section class="bg-white py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col text-center w-full mb-12">
                <h2 class="text-3xl font-bold mb-2 text-gray-800">Featured Terrains</h2>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600">Discover our most sought-after properties perfect for your next project.</p>
            </div>
            <div class="flex flex-wrap -m-4">
                <!-- Property Card 1 -->
                <div class="p-4 md:w-1/3">
                    <div class="h-full rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <img class="lg:h-64 md:h-48 w-full object-cover object-center" src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&q=80" alt="Mountain Terrain">
                        <div class="p-6">
                            <h3 class="title-font text-lg font-medium text-gray-900 mb-1">Alpine Vista Land</h3>
                            <div class="flex items-center mb-3">
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full uppercase font-semibold tracking-wide">Mountain</span>
                                <span class="ml-2 text-gray-600 text-sm">5000 m²</span>
                            </div>
                            <p class="leading-relaxed mb-5">Beautiful mountainside plot with panoramic views, perfect for luxury villa development.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-green-600 text-xl font-bold">$85,000</span>
                                <button class="text-white bg-green-600 border-0 py-2 px-6 focus:outline-none hover:bg-green-700 rounded-lg transition-colors duration-300">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Property Card 2 -->
                <div class="p-4 md:w-1/3">
                    <div class="h-full rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <img class="lg:h-64 md:h-48 w-full object-cover object-center" src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&q=80" alt="Lakeside Terrain">
                        <div class="p-6">
                            <h3 class="title-font text-lg font-medium text-gray-900 mb-1">Blue Waters Estate</h3>
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full uppercase font-semibold tracking-wide">Lakeside</span>
                                <span class="ml-2 text-gray-600 text-sm">2500 m²</span>
                            </div>
                            <p class="leading-relaxed mb-5">Prime lakefront property with private beach access, ideal for residential development.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-green-600 text-xl font-bold">$120,000</span>
                                <button class="text-white bg-green-600 border-0 py-2 px-6 focus:outline-none hover:bg-green-700 rounded-lg transition-colors duration-300">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Property Card 3 -->
                <div class="p-4 md:w-1/3">
                    <div class="h-full rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <img class="lg:h-64 md:h-48 w-full object-cover object-center" src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80" alt="Agricultural Terrain">
                        <div class="p-6">
                            <h3 class="title-font text-lg font-medium text-gray-900 mb-1">Golden Fields Farm</h3>
                            <div class="flex items-center mb-3">
                                <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded-full uppercase font-semibold tracking-wide">Agricultural</span>
                                <span class="ml-2 text-gray-600 text-sm">10000 m²</span>
                            </div>
                            <p class="leading-relaxed mb-5">Fertile agricultural land with irrigation system, perfect for organic farming.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-green-600 text-xl font-bold">$65,000</span>
                                <button class="text-white bg-green-600 border-0 py-2 px-6 focus:outline-none hover:bg-green-700 rounded-lg transition-colors duration-300">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-8">
                <a href="#" class="text-green-600 hover:text-green-800 font-bold flex items-center">
                    View All Properties
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works (Completed Section) -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col text-center w-full mb-12">
                <h2 class="text-3xl font-bold mb-2 text-gray-800">How It Works</h2>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600">Simple steps to find and reserve your perfect terrain</p>
            </div>
            
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-green-200 px-4 py-6 rounded-lg bg-white hover:shadow-lg transition-shadow duration-300">
                        <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-5 flex-shrink-0 mx-auto">
                            <i class="fas fa-search text-xl"></i>
                        </div>
                        <h3 class="text-gray-900 text-lg font-medium mb-3">Search</h3>
                        <p class="leading-relaxed">Browse our extensive collection of terrains using our advanced search filters.</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-green-200 px-4 py-6 rounded-lg bg-white hover:shadow-lg transition-shadow duration-300">
                        <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-5 flex-shrink-0 mx-auto">
                            <i class="fas fa-map-marked-alt text-xl"></i>
                        </div>
                        <h3 class="text-gray-900 text-lg font-medium mb-3">Visit</h3>
                        <p class="leading-relaxed">Schedule a visit to selected properties with our professional agents.</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-green-200 px-4 py-6 rounded-lg bg-white hover:shadow-lg transition-shadow duration-300">
                        <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-5 flex-shrink-0 mx-auto">
                            <i class="fas fa-file-signature text-xl"></i>
                        </div>
                        <h3 class="text-gray-900 text-lg font-medium mb-3">Reserve</h3>
                        <p class="leading-relaxed">Complete the secure online reservation process with flexible payment options.</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-green-200 px-4 py-6 rounded-lg bg-white hover:shadow-lg transition-shadow duration-300">
                        <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-5 flex-shrink-0 mx-auto">
                            <i class="fas fa-key text-xl"></i>
                        </div>
                        <h3 class="text-gray-900 text-lg font-medium mb-3">Own</h3>
                        <p class="leading-relaxed">Receive full ownership documents and start planning your development.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col text-center w-full mb-12">
                <h2 class="text-3xl font-bold mb-2 text-gray-800">Client Testimonials</h2>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600">What our clients say about our services</p>
            </div>
            
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/3">
                    <div class="h-full bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg>
                        <p class="leading-relaxed mb-6">TerrainPro made finding our dream property incredibly easy. The search process was intuitive, and their team was supportive from initial browsing to completing the purchase.</p>
                        <div class="inline-flex items-center">
                            <img alt="testimonial" src="https://randomuser.me/api/portraits/women/65.jpg" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">Emily Johnson</span>
                                <span class="text-gray-500 text-sm">Residential Buyer</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="h-full bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg>
                        <p class="leading-relaxed mb-6">As a commercial developer, I've worked with many land brokers, but TerrainPro's expertise and selection of premium commercial plots is unmatched in the industry.</p>
                        <div class="inline-flex items-center">
                            <img alt="testimonial" src="https://randomuser.me/api/portraits/women/32.jpg" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">Michael Reynolds</span>
                                <span class="text-gray-500 text-sm">Commercial Developer</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="h-full bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg>
                        <p class="leading-relaxed mb-6">The agricultural land I purchased through TerrainPro has been perfect for my organic farming venture. Their team's knowledge of soil quality and water access was invaluable.</p>
                        <div class="inline-flex items-center">
                            <img alt="testimonial" src="https://randomuser.me/api/portraits/men/52.jpg" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">Sarah Martinez</span>
                                <span class="text-gray-500 text-sm">Agricultural Entrepreneur</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-green-600">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h2 class="text-3xl font-bold text-white mb-4">Ready to Find Your Perfect Terrain?</h2>
                    <p class="text-green-100 mb-8 text-lg">Join thousands of satisfied clients who have found their ideal property through TerrainPro.</p>
                    <div class="flex flex-col sm:flex-row">
                        <a href="#" class="bg-white text-green-600 font-bold py-3 px-6 rounded-lg shadow hover:bg-gray-100 transition-colors duration-300 mb-4 sm:mb-0 sm:mr-4 text-center">
                            Browse Properties
                        </a>
                        <a href="#" class="bg-transparent text-white border-2 border-white font-bold py-3 px-6 rounded-lg hover:bg-white hover:text-green-600 transition-colors duration-300 text-center">
                            Contact an Agent
                        </a>
                    </div>
                </div>
                <div class="md:w-1/3">
                    <img class="rounded-lg shadow-xl" src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=500&q=80" alt="Beautiful property">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="flex flex-wrap justify-between">
                <!-- Company Info -->
                <div class="w-full md:w-1/4 mb-10 md:mb-0">
                    <h3 class="text-2xl font-bold mb-4">
                        <i class="fas fa-mountain mr-2"></i>TerrainPro
                    </h3>
                    <p class="mb-4 text-gray-400">Premium terrain reservation platform for residential, commercial, agricultural, and recreational properties worldwide.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="w-full md:w-1/4 mb-10 md:mb-0">
                    <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Properties</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Services</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Property Types -->
                <div class="w-full md:w-1/4 mb-10 md:mb-0">
                    <h4 class="text-lg font-bold mb-4">Property Types</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Residential</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Commercial</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Agricultural</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Forest</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Lakeside</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="w-full md:w-1/4">
                    <h4 class="text-lg font-bold mb-4">Contact Us</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2 text-green-500"></i>
                            <span class="text-gray-400">123 Terrain Street, Land City, TC 10100</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2 text-green-500"></i>
                            <span class="text-gray-400">+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-green-500"></i>
                            <span class="text-gray-400">info@terrainpro.com</span>
                        </li>
                    </ul>
                    <form class="mt-4">
                        <input type="email" placeholder="Subscribe to newsletter" class="w-full p-2 bg-gray-700 rounded-lg mb-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300">Subscribe</button>
                    </form>
                </div>
            </div>
            
            <hr class="my-8 border-gray-700">
            
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2025 TerrainPro. All rights reserved.</p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-300">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-300">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-300">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for menu toggle -->
    <script>
        document.getElementById('nav-toggle').onclick = function(){
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>
</body>
</html>