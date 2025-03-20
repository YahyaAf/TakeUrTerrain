@extends('backOffice.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Liste des Sponsors</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 flex justify-end">
        <a href="{{ route('sponsors.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            + Ajouter un Sponsor
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Logo</th>
                    <th class="p-3 text-left">Nom</th>
                    <th class="p-3 text-left text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sponsors as $sponsor)
                <tr class="border-b">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">
                        <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}" class="h-12 w-12 object-cover rounded-full">
                    </td>
                    <td class="p-3">{{ $sponsor->name }}</td>
                    <td class="p-3 text-center">
                        <a href="{{ route('sponsors.show', $sponsor) }}" class="text-blue-500 hover:underline">Voir</a> |
                        <a href="{{ route('sponsors.edit', $sponsor) }}" class="text-yellow-500 hover:underline">Modifier</a> |
                        <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Voulez-vous vraiment supprimer ce sponsor ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">Aucun sponsor trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $sponsors->links() }}
    </div>
</div>
@endsection
