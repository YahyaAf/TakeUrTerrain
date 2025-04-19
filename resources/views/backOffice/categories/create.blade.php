@extends('backOffice.layouts.app')

@section('content')
<div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
    <div class="max-w-2xl mx-auto">
        <div class="relative mb-8">
            <h1 class="text-3xl font-bold text-indigo-800 inline-block">Ajouter une Catégorie</h1>
            <div class="absolute -bottom-2 left-0 h-1 w-16 bg-indigo-500 rounded-full"></div>
            <div class="absolute -bottom-2 left-16 h-1 w-8 bg-blue-400 rounded-full"></div>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-8 border border-indigo-100 transition-all duration-300 hover:shadow-xl">
            <div id="successMsg" class="hidden mb-4 text-green-600 font-semibold">Catégorie ajoutée avec succès !</div>
            <div id="errorMsg" class="hidden mb-4 text-red-600 font-semibold"></div>

            <form id="categoryForm">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block text-indigo-700 font-medium mb-2">Nom de la catégorie</label>
                    <div class="relative">
                        <input type="text" id="name" name="name" 
                            class="w-full px-4 py-3 pr-10 border-2 border-indigo-200 rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-200" 
                            placeholder="Entrez le nom de la catégorie" required>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400 absolute right-3 top-3.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('categories.index') }}" 
                        class="px-6 py-2.5 text-indigo-600 bg-indigo-50 border border-indigo-100 rounded-lg hover:bg-indigo-100 transition-colors duration-200 font-medium flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Annuler
                    </a>
                    <button type="submit" 
                        class="px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-blue-600 text-white rounded-lg hover:from-indigo-600 hover:to-blue-700 transition-all duration-200 font-medium flex items-center shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Ajouter
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-8 flex justify-end">
            <div class="h-2 w-24 bg-blue-400 rounded-full"></div>
            <div class="h-2 w-12 bg-indigo-500 ml-2 rounded-full"></div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('categoryForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        const successMsg = document.getElementById('successMsg');
        const errorMsg = document.getElementById('errorMsg');

        // Reset messages
        successMsg.classList.add('hidden');
        errorMsg.classList.add('hidden');

        fetch("{{ route('categories.store') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(async response => {
            if (!response.ok) {
                throw new Error('Erreur dans la requête');
            }
            const data = await response.json();
            if (data.success) {
                successMsg.textContent = data.message;
                successMsg.classList.remove('hidden');
                form.reset();
                setTimeout(function() {
                    window.location.href = "{{ route('categories.index') }}"; 
                }, 2000);
            } else {
                throw new Error(data.message);
            }
        })
        .catch(error => {
            console.log("Erreur AJAX:", error);
            errorMsg.textContent = error.message || 'Une erreur est survenue.';
            errorMsg.classList.remove('hidden');
        });
    });
});


</script>
