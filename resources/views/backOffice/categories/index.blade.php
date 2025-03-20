@extends('backOffice.layouts.app')

@section('content')
<div class="p-6">
    <!-- En-tête avec le bouton Ajouter -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Catégories</h1>
        <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            <i class="fas fa-plus mr-2"></i> Ajouter une Catégorie
        </a>
    </div>

    <!-- Affichage dynamique des catégories -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($categories as $category)
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center relative">
            <div class="w-16 h-16 bg-blue-500 text-white flex items-center justify-center rounded-full text-xl font-bold">
                📁
            </div>
            <h2 class="mt-4 text-xl font-semibold text-gray-800">{{ $category->name }}</h2>
            <div class="mt-4 flex space-x-4">
                <a href="{{ route('categories.edit', $category->id) }}" class="text-green-500 hover:text-green-700">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
