@extends('backOffice.layouts.app')

@section('content')
<div class="p-6 bg-gradient-to-br from-blue-50 to-blue-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <div class="relative mb-8">
            <h1 class="text-3xl font-bold text-blue-800 inline-block">Ajouter un Terrain</h1>
            <div class="absolute -bottom-2 left-0 h-1 w-20 bg-blue-400 rounded-full"></div>
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

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-teal-50">
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-4 text-white">
                <h2 class="font-semibold text-lg">Informations du Terrain</h2>
            </div>
            
            <div class="p-6">
                <form action="{{ route('terrains.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-blue-800 font-medium mb-2">Nom du Terrain</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0H5a2 2 0 002-2V5a2 2 0 012-2h4a2 2 0 012 2v12a2 2 0 002 2h2m0 0h2v-4a2 2 0 00-2-2H7" />
                                    </svg>
                                </div>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" 
                                    class="w-full pl-10 pr-4 py-3 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                    placeholder="Entrez le nom du terrain" required>
                            </div>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="prix" class="block text-blue-800 font-medium mb-2">Prix du Terrain</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <input type="number" id="prix" name="prix" value="{{ old('prix') }}" 
                                    class="w-full pl-10 pr-4 py-3 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                    placeholder="Entrez le prix" required>
                            </div>
                            @error('prix')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-blue-800 font-medium mb-2">Description du Terrain</label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full px-4 py-3 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                            placeholder="Décrivez le terrain...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="photo" class="block text-blue-800 font-medium mb-2">Photo du Terrain</label>
                            <div class="relative">
                                <div id="photoPreviewContainer" class="hidden mb-3 h-48 w-full rounded-lg border-2 border-dashed border-blue-300 flex items-center justify-center overflow-hidden">
                                    <img id="photoPreview" src="#" alt="Photo preview" class="h-full w-full object-cover">
                                </div>
                                <div class="flex items-center justify-center border-2 border-dashed border-blue-300 rounded-lg p-6">
                                    <div class="space-y-2 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <div class="flex justify-center text-sm text-blue-600">
                                            <label for="photo" class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                                <span>Télécharger une photo</span>
                                                <input id="photo" name="photo" type="file" class="sr-only" accept="image/*" required>
                                            </label>
                                        </div>
                                        <p class="text-xs text-blue-400">PNG, JPG, GIF jusqu'à 2MB</p>
                                    </div>
                                </div>
                                @error('photo')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label for="categorie_id" class="block text-blue-800 font-medium mb-2">Catégorie</label>
                                <select id="categorie_id" name="categorie_id" 
                                    class="w-full px-4 py-3 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" required>
                                    <option value="">Sélectionnez une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('categorie_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="disponibility" class="block text-blue-800 font-medium mb-2">Disponibilité</label>
                                <select id="disponibility" name="disponibility" 
                                    class="w-full px-4 py-3 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" required>
                                    <option value="">Sélectionnez la disponibilité</option>
                                    <option value="disponible">Disponible</option>
                                    <option value="indisponible">Indisponible</option>
                                </select>
                                @error('disponibility')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="adresse" class="block text-blue-800 font-medium mb-2">Adresse</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}" 
                                    class="w-full pl-10 pr-4 py-3 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                    placeholder="Entrez l'adresse" required>
                            </div>
                            @error('adresse')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="sponsors" class="block text-blue-800 font-medium mb-2">Sponsors</label>
                            <select id="sponsors" name="sponsors[]" multiple
                                class="w-full px-4 py-3 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                @foreach($sponsors as $sponsor)
                                    <option value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="tags" class="block text-blue-800 font-medium mb-2">Tags</label>
                        <select id="tags" name="tags[]" multiple
                            class="w-full px-4 py-3 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3 pt-6 border-t border-teal-50">
                        <a href="{{ route('terrains.index') }}" 
                            class="px-5 py-3 bg-white text-blue-700 border border-blue-300 rounded-lg hover:bg-teal-50 shadow-sm transition-all duration-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Retour
                        </a>
                        <button type="submit" 
                            class="group px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-lg hover:from-blue-700 hover:to-blue-600 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-pulse" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Créer le Terrain
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const photoInput = document.getElementById('photo');
        const photoPreview = document.getElementById('photoPreview');
        const photoPreviewContainer = document.getElementById('photoPreviewContainer');
        
        photoInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    photoPreview.src = e.target.result;
                    photoPreviewContainer.classList.remove('hidden');
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endsection