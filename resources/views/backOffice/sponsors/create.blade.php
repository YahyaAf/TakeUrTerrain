@extends('backOffice.layouts.app')

@section('content')
<div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <div class="relative mb-8">
            <h1 class="text-3xl font-bold text-indigo-800 inline-block">Ajouter un Sponsor</h1>
            <div class="absolute -bottom-2 left-0 h-1 w-20 bg-indigo-500 rounded-full"></div>
            <div class="absolute -bottom-2 left-20 h-1 w-10 bg-blue-400 rounded-full"></div>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-lg shadow-md animate-fadeIn">
                <div class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-semibold">Veuillez corriger les erreurs suivantes:</span>
                </div>
                <ul class="list-disc pl-10">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-indigo-50">
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 p-4 text-white">
                <h2 class="font-semibold text-lg">Informations du Sponsor</h2>
            </div>
            
            <div class="p-6">
                <form action="{{ route('sponsors.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-indigo-800 font-medium mb-2">Nom du sponsor</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" 
                                    class="w-full pl-10 pr-4 py-3 border border-indigo-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="Entrez le nom du sponsor" required>
                            </div>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="logo" class="block text-indigo-800 font-medium mb-2">Logo du sponsor</label>
                            <div class="relative">
                                <div id="logoPreviewContainer" class="hidden mb-3 h-32 w-32 rounded-full border-2 border-dashed border-indigo-300 flex items-center justify-center overflow-hidden">
                                    <img id="logoPreview" src="#" alt="Logo preview" class="h-full w-full object-cover">
                                </div>
                                <div class="flex items-center justify-center border-2 border-dashed border-indigo-300 rounded-lg p-6">
                                    <div class="space-y-2 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <div class="flex justify-center text-sm text-indigo-600">
                                            <label for="logo" class="relative cursor-pointer rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                                <span>Télécharger un fichier</span>
                                                <input id="logo" name="logo" type="file" class="sr-only" accept="image/*" required>
                                            </label>
                                        </div>
                                        <p class="text-xs text-indigo-400">PNG, JPG, GIF jusqu'à 2MB</p>
                                    </div>
                                </div>
                                @error('logo')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-6 border-t border-indigo-50">
                        <a href="{{ route('sponsors.index') }}" 
                            class="px-5 py-3 bg-white text-indigo-700 border border-indigo-300 rounded-lg hover:bg-indigo-50 shadow-sm transition-all duration-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Retour
                        </a>
                        <button type="submit" 
                            class="group px-5 py-3 bg-gradient-to-r from-indigo-600 to-blue-500 text-white rounded-lg hover:from-indigo-700 hover:to-blue-600 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-pulse" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Créer le Sponsor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoInput = document.getElementById('logo');
        const logoPreview = document.getElementById('logoPreview');
        const logoPreviewContainer = document.getElementById('logoPreviewContainer');
        
        logoInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    logoPreview.src = e.target.result;
                    logoPreviewContainer.classList.remove('hidden');
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endsection