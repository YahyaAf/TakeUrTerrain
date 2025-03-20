@extends('backOffice.layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 to-blue-50 p-4 sm:p-6 lg:p-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header Section with Creative Design -->
        <div class="relative mb-12">
            <div class="absolute inset-0 bg-blue-600 rounded-xl opacity-10 transform -rotate-1"></div>
            <div class="relative bg-white rounded-lg shadow-xl p-6 md:p-8 overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-blue-400 to-indigo-600 opacity-10 rounded-full transform translate-x-20 -translate-y-20"></div>
                
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="flex items-center">
                        <div class="bg-blue-600 rounded-lg w-12 h-12 flex items-center justify-center shadow-md mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-indigo-700">Liste des Tags</h1>
                    </div>
                    
                    <a href="{{ route('tags.create') }}" class="group mt-6 md:mt-0 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-full hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 flex items-center">
                        <span class="mr-2 group-hover:rotate-90 transition-transform duration-300">+</span>
                        <span>Ajouter un Tag</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Notification -->
        @if(session('success'))
            <div class="mb-8 transform transition-all duration-500 animate-fade-in-down">
                <div class="bg-green-50 border-l-4 border-green-500 rounded-lg shadow-md p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Tags Grid View -->
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="p-6 md:p-8">
                @if(count($tags) > 0)
                    <!-- Desktop Table View -->
                    <div class="hidden md:block">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left pb-4 text-xs uppercase tracking-wider text-gray-500 font-semibold">#</th>
                                    <th class="text-left pb-4 text-xs uppercase tracking-wider text-gray-500 font-semibold">Nom</th>
                                    <th class="text-left pb-4 text-xs uppercase tracking-wider text-gray-500 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag)
                                    <tr class="group relative">
                                        <td class="py-4 pr-4 w-16">
                                            <span class="bg-gray-100 text-gray-700 w-8 h-8 rounded-full flex items-center justify-center font-semibold text-sm">{{ $loop->iteration }}</span>
                                        </td>
                                        <td class="py-4 pr-4 w-2/3">
                                            <span class="px-4 py-2 text-sm bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-full inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                </svg>
                                                {{ $tag->name }}
                                            </span>
                                        </td>
                                        <td class="py-4">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('tags.edit', $tag) }}" class="px-3 py-2 bg-amber-100 text-amber-700 rounded-md hover:bg-amber-200 transition-colors duration-200 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                    Modifier
                                                </a>
                                                <form action="{{ route('tags.destroy', $tag) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce tag ?');" class="px-3 py-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors duration-200 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="h-px">
                                        <td colspan="3" class="border-b border-gray-100"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="grid grid-cols-1 gap-4 md:hidden">
                        @foreach($tags as $tag)
                            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                                <div class="p-4">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="bg-gray-100 text-gray-700 w-8 h-8 rounded-full flex items-center justify-center font-semibold text-sm">{{ $loop->iteration }}</span>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('tags.edit', $tag) }}" class="p-2 bg-amber-100 text-amber-700 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('tags.destroy', $tag) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce tag ?');" class="p-2 bg-red-100 text-red-700 rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="mt-2 flex justify-center">
                                        <span class="px-4 py-2 text-sm bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-full inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                            </svg>
                                            {{ $tag->name }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-700 mb-1">Aucun tag trouvé</h3>
                        <p class="text-gray-500">Commencez par ajouter un nouveau tag</p>
                        <div class="mt-6">
                            <a href="{{ route('tags.create') }}" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-full hover:shadow-lg transition-all duration-300 inline-flex items-center">
                                <span class="mr-2">+</span>
                                <span>Ajouter votre premier tag</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fade-in-down {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-fade-in-down {
  animation: fade-in-down 0.5s ease-out forwards;
}
</style>
@endsection