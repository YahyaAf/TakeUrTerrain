@extends('backOffice.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Permissions</h1>

    <!-- Button to add new permission -->
    <div class="mb-6 text-right">
        <a href="{{ route('permissions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Ajouter une nouvelle permission
        </a>
    </div>

    <!-- Permissions Table -->
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="text-left text-sm text-gray-700 bg-gray-100">
                <th class="px-4 py-2">Nom</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Static permissions data -->
            @foreach ($permissions as $permission)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">{{ $permission['name'] }}</td>
                <td class="px-4 py-2">{{ $permission['description'] }}</td>
                <td class="px-4 py-2">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $permission['status'] == 'active' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                        {{ ucfirst($permission['status']) }}
                    </span>
                </td>
                <td class="px-4 py-2">
                    <a href="" class="text-blue-500 hover:underline">Modifier</a>
                    <form action="#" method="POST" class="inline-block ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
