@extends('backOffice.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Ajouter un Sponsor</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('sponsors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nom du sponsor</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="logo" class="block text-gray-700 font-medium mb-2">Logo du sponsor</label>
                <input type="file" id="logo" name="logo" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('logo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('sponsors.index') }}" class="px-4 py-2 text-gray-600 border rounded-lg hover:bg-gray-100">Annuler</a>
                <button type="submit" class="ml-3 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Ajouter</button>
            </div>
        </form>
    </div>
</div>
@endsection
