@extends('frontOffice.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6 text-center">🎟️ Mes Tickets</h2>

    @forelse($tickets as $ticket)
        <div class="bg-white shadow-xl rounded-2xl p-6 mb-6 border-l-8 border-blue-500 relative">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-1/3">
                    @if ($ticket->terrain && $ticket->terrain->photo)
                        <img src="{{ asset('storage/' . $ticket->terrain->photo) }}" class="w-full h-48 object-cover rounded-lg" alt="Photo du terrain">
                    @else
                        <img src="{{ asset('images/default-terrain.jpg') }}" class="w-full h-48 object-cover rounded-lg" alt="Pas d’image">
                    @endif
                </div>

                <div class="md:w-2/3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $ticket->terrain->name ?? 'Nom terrain inconnu' }}</h3>
                        <p><span class="font-medium">📍 Localisation:</span> {{ $ticket->terrain->adresse ?? 'Non définie' }}</p>
                        <p><span class="font-medium">👤 Utilisateur:</span> {{ $ticket->reservation->client->name ?? 'N/A' }}</p>
                        <p><span class="font-medium">📅 Date de réservation:</span> {{ $ticket->reservation->date_reservation ?? $ticket->reservation_date }}</p>
                        <p><span class="font-medium">💰 Prix:</span> {{ $ticket->price }} €</p>
                        <p><span class="font-medium">💳 Paiement:</span> 
                            <span class="px-2 py-1 rounded text-white 
                                {{ $ticket->payment_status === 'success' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ ucfirst($ticket->payment_status) }}
                            </span>
                        </p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('ticket.pdf', $ticket->id) }}" 
                           class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                            📄 Télécharger PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-600">Aucun ticket trouvé.</p>
    @endforelse
</div>
@endsection
