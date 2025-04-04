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
        }
        .info {
            margin-top: 20px;
        }
        .info p {
            margin: 6px 0;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="title">🎟️ Ticket de Réservation</div>

        <div class="info">
            <p><strong>Terrain :</strong> {{ $ticket->terrain->name ?? 'N/A' }}</p>
            <p><strong>Adresse :</strong> {{ $ticket->terrain->adresse ?? 'N/A' }}</p>
            <p><strong>Utilisateur :</strong> {{ $ticket->reservation->client->name ?? 'N/A' }}</p>
            <p><strong>Date de réservation :</strong> {{ $ticket->reservation->date_reservation ?? $ticket->reservation_date }}</p>
            <p><strong>Heure de début:</strong> {{ \Carbon\Carbon::parse($ticket->reservation->heure_debut)->format('H:i') }}</p>
            <p><strong>Heure de fin:</strong> {{ \Carbon\Carbon::parse($ticket->reservation->heure_fin)->format('H:i') }}</p>
            <p><strong>Prix :</strong> {{ $ticket->price }} €</p>
        </div>
    </div>
</body>
</html>
