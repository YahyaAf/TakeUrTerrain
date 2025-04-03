<nav class="fixed w-full z-30 top-0 bg-gradient-to-r from-cyan-500/90 via-blue-500/90 to-cyan-600/90 backdrop-filter backdrop-blur-md shadow-lg">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between py-3">
        <div class="pl-4 flex items-center">
            <a class="flex items-center text-2xl font-bold text-white no-underline hover:scale-105 transition duration-300" href="{{ route('home') }}">
                <i class="fas fa-table-tennis-paddle-ball text-white mr-2"></i>
                <span class="relative">
                    TakeUrTerrain
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-white transform scale-x-0 origin-left transition-transform group-hover:scale-x-100"></span>
                </span>
            </a>
        </div>
    

        <div class="block lg:hidden pr-4">
            <button id="nav-toggle" class="flex items-center p-2 rounded-full bg-white/20 text-white hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white/50 transition duration-300">
                <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>
        
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white/5 lg:bg-transparent rounded-xl backdrop-blur-lg lg:backdrop-blur-none p-4 lg:p-0 z-20" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center space-y-2 lg:space-y-0">
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-white font-medium no-underline hover:bg-white/20 rounded-lg transition-all duration-300" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-white font-medium no-underline hover:bg-white/20 rounded-lg transition-all duration-300" href="{{ route('frontOffice.terrains.index') }}">
                        Terrains
                    </a>
                </li>
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-white font-medium no-underline hover:bg-white/20 rounded-lg transition-all duration-300" href="">
                        Contact
                    </a>
                </li>
                
                @guest
                    <li class="mr-3">
                        <a class="inline-block py-2 px-6 text-cyan-600 font-medium bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300" href="{{ route('login') }}">
                            Login / Register
                        </a>
                    </li>
                @else
                    <li class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false" class="flex items-center space-x-2 py-2 px-3 rounded-lg hover:bg-white/20 transition duration-300">
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="h-8 w-8 rounded-full object-cover border-2 border-white">
                            <span class="text-white font-medium">{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white transition-transform duration-300" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200" 
                             x-transition:enter-start="opacity-0 scale-95" 
                             x-transition:enter-end="opacity-100 scale-100" 
                             x-transition:leave="transition ease-in duration-150" 
                             x-transition:leave-start="opacity-100 scale-100" 
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-50">
                            <div class="p-4 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-600">Signed in as</p>
                                <p class="text-sm font-bold text-gray-800">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="py-1">
                                <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-cyan-600 transition duration-150">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Profile
                                    </div>
                                </a>
                                <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-cyan-600 transition duration-150">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        My Bookings
                                    </div>
                                </a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-red-600 transition duration-150">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Sign Out
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('nav-toggle').addEventListener('click', function() {
            const navContent = document.getElementById('nav-content');
            navContent.classList.toggle('hidden');
        });
    });
</script>