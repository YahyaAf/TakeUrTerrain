@extends('backOffice.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Liste des Paiements</h2>

    @if ($reservations->isEmpty())
        <p class="text-gray-600">Aucun paiement trouvé.</p>
    @else
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 text-left">
                    <tr>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Client</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Terrain</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Montant</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Devise</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Statut</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-500">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($reservations as $payment)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $payment->reservation->client->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $payment->reservation->terrain->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $payment->amount }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ strtoupper($payment->currency) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ ucfirst($payment->status) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
