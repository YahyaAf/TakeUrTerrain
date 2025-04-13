@extends('backOffice.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Liste des Réservations</h2>

    @if ($reservations->isEmpty())
        <p class="text-gray-600">Aucune réservation trouvée.</p>
    @else
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 text-left">
                    <tr>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Client</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Terrain</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Date</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Heure</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Créneaux</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Statut</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reservation->client->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reservation->terrain->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reservation->date_reservation }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reservation->heure_debut }} - {{ $reservation->heure_fin }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $reservation->creneaux }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ ucfirst($reservation->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
