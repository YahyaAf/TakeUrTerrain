@extends('backOffice.layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 to-blue-50 p-4 sm:p-6 lg:p-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header Section with Creative Design -->
        <div class="relative mb-10">
            <div class="absolute inset-0 bg-blue-600 rounded-xl opacity-10 transform -rotate-1"></div>
            <div class="relative bg-white rounded-lg shadow-xl p-6 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-indigo-600 opacity-10 rounded-full transform translate-x-16 -translate-y-16"></div>
                
                <div class="flex items-center">
                    <div class="bg-blue-600 rounded-lg w-12 h-12 flex items-center justify-center shadow-md mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-indigo-700">Ajouter un Tag</h1>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="relative p-8">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 h-40 w-40 bg-blue-50 rounded-full opacity-70 transform translate-x-20 -translate-y-20"></div>
                <div class="absolute bottom-0 left-0 h-24 w-24 bg-indigo-50 rounded-full opacity-70 transform -translate-x-10 translate-y-10"></div>
                
                <form action="{{ route('tags.store') }}" method="POST" class="relative space-y-8">
                    @csrf

                    <div class="relative z-10">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1 ml-1">Nom du tag</label>
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg opacity-30 group-hover:opacity-40 blur-sm transition-all duration-200 -m-1"></div>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white"
                                    placeholder="Entrez le nom du tag..."
                                    required
                                >
                            </div>
                        </div>
                        
                        @error('name')
                            <div class="mt-2 flex items-center text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <p class="text-sm">{{ $message }}</p>
                            </div>
                        @enderror
                        
                        <p class="mt-2 text-xs text-gray-500 ml-1">Les tags sont utilisés pour catégoriser et organiser le contenu.</p>
                    </div>

                    <div class="flex justify-between items-center pt-4 relative z-10">
                        <a href="{{ route('tags.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Retour
                        </a>
                        
                        <button type="submit" class="group relative inline-flex items-center px-6 py-3 overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-full hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                            <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Ajouter le Tag
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Tips Card -->
        <div class="mt-8 bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6 border-l-4 border-blue-500">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-gray-800">Conseils pour les tags</h3>
                        <div class="mt-2 text-sm text-gray-600">
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Utilisez des noms courts et descriptifs</li>
                                <li>Évitez les doublons et les noms trop similaires</li>
                                <li>Les tags sont insensibles à la casse</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}
</style>
@endsection