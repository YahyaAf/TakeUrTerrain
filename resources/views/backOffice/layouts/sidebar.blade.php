<div class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 shadow-lg transition-transform duration-300 ease-in-out" id="sidebar">
    <div class="flex items-center justify-between p-4 border-b border-gray-100">
        <div class="flex items-center">
            <i class="fas fa-chart-line text-indigo-600 text-xl mr-2"></i>
            <h1 class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-blue-500 bg-clip-text text-transparent"># DASHMIN</h1>
        </div>
        <button id="sidebar-toggle" class="p-1 rounded-md text-gray-500 hover:bg-gray-100 lg:hidden">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="p-4 border-b border-gray-100">
        <div class="flex items-center space-x-3">
            <div class="h-10 w-10 rounded-full overflow-hidden shadow-md">
                @if(Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Photo de profil" class="h-10 w-10 object-cover rounded-full">
                @else
                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-indigo-600 to-blue-500 flex items-center justify-center text-white">
                        <span>{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</span>
                    </div>
                @endif
            </div>
            <div>
                <p class="font-medium text-gray-800">{{ Auth::user()->name ?? 'Admin User' }}</p>
                <p class="text-xs font-medium text-gray-500 bg-gray-100 rounded-full px-2 py-0.5 inline-block mt-1">
                    {{ Auth::user()->roles->first()->name ?? 'Aucun rôle' }}
                </p>                
            </div>
        </div>
    </div>
    
    <div class="py-4 px-2">
        <div class="mb-2 px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Main</div>
        
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 mb-1 rounded-lg text-indigo-600 bg-indigo-50 font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <span>Dashboard</span>
        </a>
        
        <div class="mb-2 mt-6 px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Content</div>

        @permission('view-category')
        <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-2.5 mb-1 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors duration-200">
            <!-- SVG + Text -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
            </svg>
            <span>Catégorie</span>
        </a>
        @endpermission

        @permission('view-sponsor')
        <a href="{{ route('sponsors.index') }}" class="flex items-center px-4 py-2.5 mb-1 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            <span>Sponsors</span>
        </a>
        @endpermission

        @permission('view-tag')
        <a href="{{ route('tags.index') }}" class="flex items-center px-4 py-2.5 mb-1 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            <span>Tags</span>
        </a>
        @endpermission

        @permission('view-terrain')
        <a href="{{ route('terrains.index') }}" class="flex items-center px-4 py-2.5 mb-1 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            <span>Terrains</span>
        </a>
        @endpermission

        @permission('check-reservation')
        <a href="{{ route('backOffice.reservations.index') }}" class="flex items-center px-4 py-2.5 mb-1 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            <span>Reservations</span>
        </a>
        @endpermission
        
        @auth
            @if (auth()->user()->hasRole('admin'))
                <div class="mb-2 mt-6 px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Administration
                </div>
            @endif
        @endauth

        @permission('view-user')
        <a href="{{ route('backOffice.gestionUsers.index') }}" class="flex items-center px-4 py-2.5 mb-1 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span>Utilisateurs</span>
        </a>
        @endpermission

        @permission('view-publication')
        <a href="{{ route('publications.index') }}" class="flex items-center px-4 py-2.5 mb-1 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span>Publications</span>
        </a>
        @endpermission
        
        @permission('view-role')
        <a href="{{ route('roles.index') }}" class="flex items-center px-4 py-2.5 mb-1 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            <span>Roles</span>
        </a>
        @endpermission
        
        @permission('view-permission')
        <a href="{{ route('permissions.index') }}" class="flex items-center px-4 py-2.5 mb-1 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
            </svg>
            <span>Permissions</span>
        </a>
        @endpermission
    </div>
</div>

<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
        
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', toggleSidebar);
        }
        
        if (overlay) {
            overlay.addEventListener('click', toggleSidebar);
        }
        
        if (window.innerWidth < 1024) {
            sidebar.classList.add('-translate-x-full');
        }
    });
</script>