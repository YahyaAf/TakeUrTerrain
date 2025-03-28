<div class="bg-white shadow-sm flex justify-between items-center py-3 px-6">
    <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </span>
        <input type="text" class="py-2 pl-10 pr-4 block w-64 rounded-lg bg-gray-100 border-transparent focus:bg-white focus:border-gray-300 focus:ring-0 transition duration-200" placeholder="Search">
    </div>
    
    <div class="flex items-center space-x-6">

        <div class="relative">
            <button class="p-2 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded-full transition duration-200">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </button>
          
            <span class="absolute top-0 right-0 h-5 w-5 flex items-center justify-center bg-red-500 text-white text-xs font-bold rounded-full">3</span>
        </div>
        
       
        <div class="relative">
            <button class="p-2 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded-full transition duration-200">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>
           
            <span class="absolute top-0 right-0 h-5 w-5 flex items-center justify-center bg-red-500 text-white text-xs font-bold rounded-full">8</span>
        </div>
        
       
        <div class="relative" x-data="{ open: false }">
            <div class="flex items-center space-x-2 cursor-pointer" @click="open = !open">
                <div class="h-10 w-10 rounded-full overflow-hidden shadow-md">
                    @if(Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Photo de profil" class="h-10 w-10 object-cover rounded-full">
                    @else
                        <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center text-white">
                            <span class="font-semibold text-base">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</span>
                        </div>
                    @endif
                </div>
                <div class="hidden md:block">
                    <div class="text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'Admin User' }}</div>
                    <div class="text-xs text-gray-500">Administrator</div>
                </div>
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        
            <div id="dropdownMenu" class="absolute right-0 hidden bg-white shadow-lg rounded-lg mt-2 w-48 py-1 z-10 border border-gray-200">
                <div class="px-4 py-2 border-b border-gray-100 flex items-center space-x-3">
                    <div class="h-10 w-10 rounded-full overflow-hidden shadow-md">
                        @if(Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Photo de profil" class="h-10 w-10 object-cover rounded-full">
                        @else
                            <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center text-white">
                                <span class="font-semibold text-base">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</span>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700">{{ Auth::user()->name ?? 'Admin User' }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                    </div>
                </div>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <i class="fas fa-user mr-2 text-gray-400"></i> My Profile
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <i class="fas fa-cog mr-2 text-gray-400"></i> Settings
                </a>
                <div class="border-t border-gray-100 mt-1"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>        
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileDropdown = document.querySelector('.relative[x-data]');
        const dropdownMenu = document.getElementById('dropdownMenu');
        
        profileDropdown.querySelector('.flex.items-center').addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });
        
        document.addEventListener('click', function(e) {
            if (!profileDropdown.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>