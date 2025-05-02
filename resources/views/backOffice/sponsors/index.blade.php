@extends('backOffice.layouts.app')

@section('content')
<div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="relative mb-8">
            <h1 class="text-3xl font-bold text-indigo-800 inline-block">Liste des Sponsors</h1>
            <div class="absolute -bottom-2 left-0 h-1 w-20 bg-indigo-500 rounded-full"></div>
            <div class="absolute -bottom-2 left-20 h-1 w-10 bg-blue-400 rounded-full"></div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-lg shadow-md animate-fadeIn flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
                <button class="ml-auto text-green-700 hover:text-green-800 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        @endif

        <!-- Add Button -->
        <div class="mb-6 flex justify-end">
            @permission('create-sponsor')
            <a href="{{ route('sponsors.create') }}" 
               class="group px-5 py-3 bg-gradient-to-r from-indigo-600 to-blue-500 text-white rounded-lg hover:from-indigo-700 hover:to-blue-600 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-pulse" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Ajouter un Sponsor
            </a>
            @endpermission
        </div>

        <!-- Table Card -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-indigo-50">
            <!-- Table Header with Gradient -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 p-4 text-white">
                <h2 class="font-semibold text-lg">Partenaires & Sponsors</h2>
            </div>
            
            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-indigo-50 border-b border-indigo-100">
                            <th class="p-4 text-left text-indigo-800 font-semibold">#</th>
                            <th class="p-4 text-left text-indigo-800 font-semibold">Logo</th>
                            <th class="p-4 text-left text-indigo-800 font-semibold">Nom</th>
                            <th class="p-4 text-center text-indigo-800 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sponsors as $sponsor)
                        <tr class="border-b border-indigo-50 hover:bg-blue-50 transition-colors">
                            <td class="p-4 text-indigo-700">{{ $loop->iteration }}</td>
                            <td class="p-4">
                                <div class="h-14 w-14 rounded-full border-2 border-indigo-200 p-0.5 shadow-md overflow-hidden">
                                    <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}" class="h-full w-full object-cover rounded-full">
                                </div>
                            </td>
                            <td class="p-4 font-medium text-indigo-800">{{ $sponsor->name }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('sponsors.show', $sponsor) }}" 
                                       class="text-blue-500 hover:text-blue-700 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    @permission('update-sponsor')
                                    <a href="{{ route('sponsors.edit', $sponsor) }}" 
                                       class="text-green-500 hover:text-green-700 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    @endpermission

                                    @permission('delete-sponsor')
                                    <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('Voulez-vous vraiment supprimer ce sponsor ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                    @endpermission
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center">
                                <div class="flex flex-col items-center justify-center text-indigo-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    <p class="text-lg font-medium">Aucun sponsor trouvé</p>
                                    <p class="text-sm mt-1">Ajoutez votre premier sponsor en cliquant sur le bouton ci-dessus</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">
            {{ $sponsors->links() }}
        </div>
    </div>
</div>
@endsection