@extends('backOffice.layouts.app')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Mettre à Jour le Rôle</h1>

    <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Nom du Rôle</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-center">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Mettre à Jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
