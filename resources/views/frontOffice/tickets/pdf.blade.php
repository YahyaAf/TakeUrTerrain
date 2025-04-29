<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ticket PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .ticket {
            border: 2px dashed #333;
            padding: 20px;
            width: 100%;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
        .code-unique {
            text-align: center;
            font-size: 16px;
            margin: 5px 0 15px 0;
            padding: 5px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
        .info {
            margin-top: 20px;
        }
        .info p {
            margin: 6px 0;
        }
        .status {
            text-align: center;
            margin: 15px 0;
            padding: 8px;
            border-radius: 4px;
            font-weight: bold;
        }
        .status-confirmed {
            background-color: #d1f7dd;
            color: #0c6e32;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
        .status-completed {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        .warning-message {
            margin: 15px 0;
            padding: 10px;
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="title">🎟️ Ticket de Réservation</div>
        
        <div class="code-unique">
            <strong>Code unique:</strong> {{ $ticket->code_unique ?? 'N/A' }}
        </div>

        @php
            $statusClass = 'status-confirmed';
            $statusText = $ticket->status ?? 'Confirmé';
            
            if (strtolower($statusText) == 'en attente') {
                $statusClass = 'status-pending';
            } elseif (strtolower($statusText) == 'annulé') {
                $statusClass = 'status-cancelled';
            } elseif (strtolower($statusText) == 'terminé') {
                $statusClass = 'status-completed';
            }
        @endphp

        <div class="status {{ $statusClass }}">
            Statut: {{ ucfirst($statusText) }}
        </div>

        @if(strtolower($statusText) == 'en attente')
        <div class="warning-message">
            <strong>Attention:</strong> Ce ticket n'est pas confirmé à 100%. Veuillez compléter votre paiement pour finaliser votre réservation.
        </div>
        @endif

        <div class="info">
            <p><strong>Terrain :</strong> {{ $ticket->reservation->terrain->name ?? 'N/A' }}</p>
            <p><strong>Adresse :</strong> {{ $ticket->reservation->terrain->adresse ?? 'N/A' }}</p>
            <p><strong>Utilisateur :</strong> {{ $ticket->reservation->client->name ?? 'N/A' }}</p>
            <p><strong>Date de réservation :</strong> {{ $ticket->reservation->date_reservation ?? 'N/A' }}</p>
            <p><strong>Heure de début:</strong> {{ \Carbon\Carbon::parse($ticket->reservation->heure_debut)->format('H:i') }}</p>
            <p><strong>Heure de fin:</strong> {{ \Carbon\Carbon::parse($ticket->reservation->heure_fin)->format('H:i') }}</p>
            <p><strong>Prix :</strong> {{ $ticket->price }} €</p>
        </div>
    </div>
</body>
</html>
