<div class="fixed inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-gray-50 to-white border-r border-gray-200 shadow-lg transition-all duration-300 ease-in-out flex flex-col" id="sidebar">
    <!-- Header with Logo - Fixed -->
    <div class="flex items-center justify-between p-5 border-b border-gray-100 bg-white">
        <div class="flex items-center space-x-2">
            <div class="h-8 w-8 bg-gradient-to-br from-indigo-600 to-blue-500 rounded-lg flex items-center justify-center shadow-md">
                <i class="fas fa-chart-line text-white text-lg"></i>
            </div>
            <h1 class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-blue-500 bg-clip-text text-transparent tracking-tight">DASHMIN</h1>
        </div>
        <button id="sidebar-toggle" class="p-2 rounded-full text-gray-500 hover:bg-gray-100 hover:text-indigo-600 transition-all duration-200 lg:hidden focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- User Profile Section - Fixed -->
    <div class="p-5 border-b border-gray-100 bg-white">
        <div class="flex items-center space-x-4">
            <div class="h-12 w-12 rounded-full overflow-hidden shadow-md ring-2 ring-indigo-100">
                @if(Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Photo de profil" class="h-12 w-12 object-cover rounded-full">
                @else
                    <div class="h-12 w-12 rounded-full bg-gradient-to-br from-indigo-600 to-blue-500 flex items-center justify-center text-white font-medium text-lg">
                        <span>{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</span>
                    </div>
                @endif
            </div>
            <div>
                <p class="font-semibold text-gray-800">{{ Auth::user()->name ?? 'Admin User' }}</p>
                <p class="text-xs font-medium text-indigo-600 bg-indigo-50 rounded-full px-3 py-1 inline-block mt-1 shadow-sm">
                    {{ Auth::user()->roles->first()->name ?? 'Aucun rôle' }}
                </p>                
            </div>
        </div>
    </div>
    
    <!-- Navigation Menu - Scrollable -->
    <div class="flex-1 overflow-y-auto custom-scrollbar">
        <div class="py-5 px-3">
            @auth
                @if (auth()->user()->hasRole('organisateur'))
                    <div class="mb-3 px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider flex items-center">
                        <span class="mr-2">Main</span>
                        <div class="h-px flex-grow bg-gradient-to-r from-gray-200 to-transparent"></div>
                    </div>
                @endif
            @endauth
            
            @permission('statistique-organizateur')
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl text-indigo-600 bg-indigo-50 font-medium shadow-sm hover:shadow-md transition-all duration-200 group">
                <div class="h-9 w-9 rounded-lg bg-white shadow-sm flex items-center justify-center mr-3 group-hover:bg-indigo-600 group-hover:text-white text-indigo-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                </div>
                <span>Dashboard</span>
            </a>
            @endpermission
            
            <div class="mb-3 mt-6 px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider flex items-center">
                <span class="mr-2">Content</span>
                <div class="h-px flex-grow bg-gradient-to-r from-gray-200 to-transparent"></div>
            </div>

            @permission('view-category')
            <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition-all duration-200 group">
                <div class="h-9 w-9 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-white group-hover:shadow-sm text-gray-500 group-hover:text-indigo-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                    </svg>
                </div>
                <span>Catégorie</span>
            </a>
            @endpermission

            @permission('view-sponsor')
            <a href="{{ route('sponsors.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition-all duration-200 group">
                <div class="h-9 w-9 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-white group-hover:shadow-sm text-gray-500 group-hover:text-indigo-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
                <span>Sponsors</span>
            </a>
            @endpermission

            @permission('view-tag')
            <a href="{{ route('tags.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition-all duration-200 group">
                <div class="h-9 w-9 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-white group-hover:shadow-sm text-gray-500 group-hover:text-indigo-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <span>Tags</span>
            </a>
            @endpermission

            @permission('view-terrain')
            <a href="{{ route('terrains.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition-all duration-200 group">
                <div class="h-9 w-9 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-white group-hover:shadow-sm text-gray-500 group-hover:text-indigo-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </div>
                <span>Terrains</span>
            </a>
            @endpermission

            @permission('check-reservation')
            <a href="{{ route('backOffice.reservations.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition-all duration-200 group">
                <div class="h-9 w-9 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-white group-hover:shadow-sm text-gray-500 group-hover:text-indigo-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span>Reservations</span>
            </a>
            @endpermission
            
            @auth
                @if (auth()->user()->hasRole('admin'))
                    <div class="mb-3 mt-6 px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider flex items-center">
                        <span class="mr-2">Administration</span>
                        <div class="h-px flex-grow bg-gradient-to-r from-gray-200 to-transparent"></div>
                    </div>
                @endif
            @endauth

            @permission('view-user')
            <a href="{{ route('backOffice.gestionUsers.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition-all duration-200 group">
                <div class="h-9 w-9 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-white group-hover:shadow-sm text-gray-500 group-hover:text-indigo-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <span>Utilisateurs</span>
            </a>
            @endpermission

            @permission('view-publication')
            <a href="{{ route('publications.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition-all duration-200 group">
                <div class="h-9 w-9 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-white group-hover:shadow-sm text-gray-500 group-hover:text-indigo-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <span>Publications</span>
            </a>
            @endpermission
            
            @permission('view-role')
            <a href="{{ route('roles.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition-all duration-200 group">
                <div class="h-9 w-9 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-white group-hover:shadow-sm text-gray-500 group-hover:text-indigo-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <span>Roles</span>
            </a>
            @endpermission
            
            @permission('view-permission')
            <a href="{{ route('permissions.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition-all duration-200 group">
                <div class="h-9 w-9 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-white group-hover:shadow-sm text-gray-500 group-hover:text-indigo-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                    </svg>
                </div>
                <span>Permissions</span>
            </a>
            @endpermission
            
            <!-- Spacer to ensure bottom content is visible when scrolling -->
            <div class="h-6"></div>
        </div>
    </div>
</div>

<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 20px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #cbd5e0;
    }
    
    /* For Firefox */
    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #e2e8f0 transparent;
    }
    
    /* To ensure the sidebar takes the full height */
    html, body {
        height: 100%;
    }
</style>

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
        
        // Add active state styling to current page
        const currentPath = window.location.pathname;
        const links = document.querySelectorAll('#sidebar a');
        
        links.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('bg-indigo-50', 'text-indigo-600', 'shadow-sm');
                link.classList.remove('text-gray-700', 'hover:bg-gray-50');
                
                // Style the icon container
                const iconContainer = link.querySelector('div');
                if (iconContainer) {
                    iconContainer.classList.add('bg-white', 'text-indigo-500');
                    iconContainer.classList.remove('bg-gray-100', 'text-gray-500');
                }
            }
        });
    });
</script>