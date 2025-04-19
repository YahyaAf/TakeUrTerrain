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
            
            @permission('create-category')
            <a href="{{ route('categories.create') }}" 
               class="group px-5 py-3 bg-gradient-to-r from-indigo-600 to-blue-500 text-white rounded-lg hover:from-indigo-700 hover:to-blue-600 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-pulse" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Ajouter une Catégorie
                </span>
            </a>
            @endpermission
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-indigo-50">
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 p-4">
                <div class="flex items-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    <h2 class="font-semibold text-lg">Liste des Catégories</h2>
                </div>
            </div>
            
            @if(count($categories) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-indigo-100">
                    <thead>
                        <tr class="bg-indigo-50">
                            <th class="px-6 py-4 text-left text-xs font-medium text-indigo-800 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-indigo-800 uppercase tracking-wider">
                                Icône
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-indigo-800 uppercase tracking-wider">
                                Nom
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-indigo-800 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-indigo-50">
                        @foreach ($categories as $category)
                        <tr class="hover:bg-indigo-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-indigo-900">
                                {{ $category->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-blue-500 text-white flex items-center justify-center rounded-full shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-800">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-3">
                                    @permission('update-category')
                                    <a href="{{ route('categories.edit', $category->id) }}" 
                                       class="w-8 h-8 flex items-center justify-center rounded-full bg-green-50 text-green-500 hover:bg-green-100 hover:text-green-600 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                    @endpermission
                                    
                                    @permission('delete-category')
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" 
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="w-8 h-8 flex items-center justify-center rounded-full bg-red-50 text-red-500 hover:bg-red-100 hover:text-red-600 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                    @endpermission
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="px-6 py-4 bg-indigo-50 border-t border-indigo-100">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-indigo-600">
                        Total: {{ count($categories) }} catégorie(s)
                    </div>
                </div>
            </div>
            @else
            <div class="bg-white p-8 text-center">
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
</div>
@endsection