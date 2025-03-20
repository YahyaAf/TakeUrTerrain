@extends('backOffice.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Détails du Sponsor</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nom du Sponsor</label>
            <p class="text-gray-800">{{ $sponsor->name }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Logo du Sponsor</label>
            @if ($sponsor->logo)
                <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo du Sponsor" class="w-32 h-32 object-contain">
            @else
                <p class="text-gray-500">Aucun logo disponible.</p>
            @endif
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('sponsors.index') }}" class="px-4 py-2 text-gray-600 border rounded-lg hover:bg-gray-100">Retour à la liste</a>
            <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                <i class="fas fa-edit mr-2"></i> Modifier
            </a>
        </div>
    </div>
</div>
@endsection
