@extends('frontOffice.layouts.app')

@section('content')
<div class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-black to-gray-700 inline-block mb-2">Mes Tickets</h2>
            <p class="text-gray-600 max-w-lg mx-auto">Retrouvez tous vos tickets de réservation de terrains en un seul endroit</p>
        </div>

        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-full shadow-md px-6 py-2 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 100-4V6z" />
                </svg>
                <span class="font-medium text-gray-700">{{ count($tickets) }} {{ count($tickets) > 1 ? 'tickets' : 'ticket' }}</span>
            </div>
        </div>

        @forelse($tickets as $ticket)
            <div class="mb-10 max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition hover:scale-[1.01] relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-gray-100 to-transparent rounded-bl-full opacity-60"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-gray-100 to-transparent rounded-tr-full opacity-60"></div>

                    <div class="absolute left-0 top-0 bottom-0 w-2 bg-gradient-to-b from-black to-gray-700"></div>
                    
                    <div class="relative">
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-2/5 relative group">
                                @if ($ticket->terrain && $ticket->terrain->photo)
                                    <img src="{{ asset('storage/' . $ticket->terrain->photo) }}" class="w-full h-64 md:h-full object-cover" alt="Photo du terrain">
                                @else
                                    <div class="w-full h-64 md:h-full bg-gray-200 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-start p-4">
                                    <span class="text-white font-medium">{{ $ticket->terrain->name ?? 'Nom terrain inconnu' }}</span>
                                </div>
                            </div>

                     
                            <div class="md:w-3/5 p-6 md:p-8">
                                
                                <div class="flex justify-between items-start mb-6">
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-800">{{ $ticket->terrain->name ?? 'Nom terrain inconnu' }}</h3>
                                        <p class="text-sm text-gray-500">Ticket #{{ $ticket->id }}</p>
                                    </div>
                                    <div class="bg-gray-100 text-black font-medium px-3 py-1 rounded-full text-sm">
                                        Confirmé
                                    </div>
                                </div>

                              
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 mb-6">
                                    <div class="flex items-center">
                                        <div class="bg-gray-100 rounded-full p-2 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-xs font-medium text-gray-500">Localisation</div>
                                            <div class="text-sm">{{ $ticket->terrain->adresse ?? 'Non définie' }}</div>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <div class="bg-gray-100 rounded-full p-2 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-xs font-medium text-gray-500">Réservé par</div>
                                            <div class="text-sm">{{ $ticket->reservation->client->name ?? 'N/A' }}</div>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <div class="bg-gray-100 rounded-full p-2 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-xs font-medium text-gray-500">Date</div>
                                            <div class="text-sm">{{ \Carbon\Carbon::parse($ticket->reservation->date_reservation ?? $ticket->reservation_date)->format('d M Y') }}</div>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <div class="bg-gray-100 rounded-full p-2 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-xs font-medium text-gray-500">Horaires</div>
                                            <div class="text-sm">{{ \Carbon\Carbon::parse($ticket->reservation->heure_debut)->format('H:i') }} - {{ \Carbon\Carbon::parse($ticket->reservation->heure_fin)->format('H:i') }}</div>
                                        </div>
                                    </div>
                                </div>

                            
                                <div class="flex flex-col sm:flex-row justify-between items-center pt-4 border-t border-gray-100">
                                    <div class="mb-3 sm:mb-0">
                                        <div class="text-xs text-gray-500 mb-1">Prix total</div>
                                        <div class="text-2xl font-bold text-black">{{ $ticket->price }} €</div>
                                    </div>
                                    
                                    <div class="flex space-x-3">
                                        @permission('download-ticket')
                                        <a href="{{ route('ticket.pdf', $ticket->id) }}" class="flex items-center justify-center bg-gradient-to-r from-black to-gray-700 text-white px-5 py-2.5 rounded-xl shadow-md hover:from-gray-800 hover:to-black transition transform hover:scale-105">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd" />
                                            </svg>
                                            Télécharger
                                        </a>
                                        @endpermission
                                        
                                        <button class="flex items-center justify-center bg-gray-100 text-gray-700 px-4 py-2.5 rounded-xl hover:bg-gray-200 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  
                    <div class="hidden md:block absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-1/2">
                        <div class="flex flex-col space-y-1">
                            @for($i = 0; $i < 10; $i++)
                                <div class="h-2 w-2 rounded-full bg-white"></div>
                            @endfor
                        </div>
                    </div>
                    <div class="hidden md:block absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-1/2">
                        <div class="flex flex-col space-y-1">
                            @for($i = 0; $i < 10; $i++)
                                <div class="h-2 w-2 rounded-full bg-white"></div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        @empty
           
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden md:max-w-2xl p-8 text-center">
                <div class="mb-6">
                    <div class="mx-auto w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 mb-2">Aucun ticket trouvé</h3>
                <p class="text-gray-600 mb-6">Vous n'avez pas encore réservé de terrain. Explorez nos terrains disponibles et réservez dès maintenant.</p>
                
                <a href="{{ route('home') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-black to-gray-700 text-white font-medium rounded-xl shadow-md hover:from-gray-800 hover:to-black transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    Réserver un terrain
                </a>
            </div>
        @endforelse

    
        <div class="text-center mt-8">
            <a href="{{ route('home') }}" class="inline-flex items-center text-black hover:text-gray-800 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tickets = document.querySelectorAll('.mb-10');
    tickets.forEach((ticket, index) => {
        ticket.style.opacity = '0';
        ticket.style.transform = 'translateY(20px)';
        ticket.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        
        setTimeout(() => {
            ticket.style.opacity = '1';
            ticket.style.transform = 'translateY(0)';
        }, 100 * index);
    });
});
</script>
@endsection