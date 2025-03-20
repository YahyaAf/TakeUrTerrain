@extends('backOffice.layouts.app')

@section('content')
<div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10">
            <div class="relative mb-4 md:mb-0">
                <h1 class="text-3xl font-bold text-indigo-800">Catégories</h1>
                <div class="absolute -bottom-2 left-0 h-1 w-20 bg-indigo-500 rounded-full"></div>
                <div class="absolute -bottom-2 left-20 h-1 w-10 bg-blue-400 rounded-full"></div>
            </div>
            
            <a href="{{ route('categories.create') }}" 
               class="group px-5 py-3 bg-gradient-to-r from-indigo-600 to-blue-500 text-white rounded-lg hover:from-indigo-700 hover:to-blue-600 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-pulse" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Ajouter une Catégorie
                </span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($categories as $category)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 border border-indigo-50 group">
                <div class="p-6">
                    <div class="flex justify-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-blue-500 text-white flex items-center justify-center rounded-full text-xl font-bold shadow-md group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    
                    <h2 class="mt-5 text-xl font-semibold text-center text-indigo-800 group-hover:text-indigo-600">{{ $category->name }}</h2>
                    
                    <div class="mt-6 pt-4 border-t border-indigo-50 flex justify-center space-x-6">
                        <a href="{{ route('categories.edit', $category->id) }}" 
                           class="w-10 h-10 flex items-center justify-center rounded-full bg-green-50 text-green-500 hover:bg-green-100 hover:text-green-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                        
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" 
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-red-50 text-red-500 hover:bg-red-100 hover:text-red-600 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="h-1.5 bg-gradient-to-r from-indigo-500 to-blue-500"></div>
            </div>
            @endforeach
        </div>
        
        @if(count($categories) == 0)
        <div class="bg-white rounded-xl shadow p-8 text-center">
            <div class="w-20 h-20 mx-auto bg-indigo-100 text-indigo-500 flex items-center justify-center rounded-full mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
            </div>
            <h3 class="text-xl font-medium text-indigo-800 mb-2">Aucune catégorie trouvée</h3>
            <p class="text-indigo-600 mb-6">Commencez par ajouter votre première catégorie</p>
            <a href="{{ route('categories.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Ajouter une catégorie
            </a>
        </div>
        @endif
    </div>
</div>
@endsection