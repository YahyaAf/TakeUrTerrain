@extends('backOffice.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Modifier la Catégorie</h1>

    <form action="" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
            <input type="text" id="name" name="name" value="" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $category->description }}</textarea>
        </div>

        <div>
            <label for="icon" class="block text-sm font-medium text-gray-700">Icône</label>
            <input type="text" id="icon" name="icon" value="" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                <i class="fas fa-save mr-2"></i> Enregistrer les modifications
            </button>
        </div>
    </form>
</div>
@endsection
