@extends('backOffice.layouts.app')

@section('content')
<div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <div class="relative mb-8">
            <h1 class="text-3xl font-bold text-indigo-800 inline-block">Détails du Sponsor</h1>
            <div class="absolute -bottom-2 left-0 h-1 w-20 bg-indigo-500 rounded-full"></div>
            <div class="absolute -bottom-2 left-20 h-1 w-10 bg-blue-400 rounded-full"></div>
        </div>

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

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-indigo-50">
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 p-4 text-white">
                <h2 class="font-semibold text-lg">Informations du Sponsor</h2>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-indigo-800 font-medium mb-2">Nom du Sponsor</label>
                            <div class="p-4 bg-indigo-50 rounded-lg border border-indigo-100 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-indigo-900 font-medium">{{ $sponsor->name }}</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-indigo-800 font-medium mb-2">Date de création</label>
                            <div class="p-4 bg-indigo-50 rounded-lg border border-indigo-100 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-indigo-900">{{ $sponsor->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-indigo-800 font-medium mb-2">Dernière mise à jour</label>
                            <div class="p-4 bg-indigo-50 rounded-lg border border-indigo-100 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-indigo-900">{{ $sponsor->updated_at->format('d/m/Y à H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-indigo-800 font-medium mb-2">Logo du Sponsor</label>
                        <div class="bg-white p-6 rounded-lg border border-indigo-100 shadow-sm flex flex-col items-center justify-center">
                            @if ($sponsor->logo)
                                <div class="h-40 w-40 rounded-full border-4 border-indigo-200 p-1 shadow-lg overflow-hidden mb-4">
                                    <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}" class="h-full w-full object-cover rounded-full">
                                </div>
                                <p class="text-indigo-600 font-medium text-center">Logo officiel</p>
                            @else
                                <div class="h-40 w-40 rounded-full border-4 border-dashed border-indigo-200 flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <p class="text-indigo-400 text-center">Aucun logo disponible</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-6 mt-6 border-t border-indigo-50">
                    <a href="{{ route('sponsors.index') }}" 
                       class="text-indigo-500 hover:text-indigo-700 transition-colors" 
                       title="Retour à la liste">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    @permission('update-sponsor')
                    <a href="{{ route('sponsors.edit', $sponsor->id) }}" 
                       class="text-green-500 hover:text-green-700 transition-colors"
                       title="Modifier">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    @endpermission

                    @permission('delete-sponsor')
                    <form action="{{ route('sponsors.destroy', $sponsor->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onsubmit="return confirm('Voulez-vous vraiment supprimer ce sponsor ?')"
                                class="text-red-500 hover:text-red-700 transition-colors"
                                title="Supprimer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                    @endpermission
                </div>
            </div>
        </div>
    </div>
</div>
@endsection