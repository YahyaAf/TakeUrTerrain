<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Réservation</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .ticket-container {
            width: 100%;
            max-width: 380px;
            margin: 0 auto;
        }
        
        .ticket {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }
        
        .ticket-header {
            background: linear-gradient(45deg, #3a47d5, #00d2ff);
            color: white;
            padding: 25px 20px;
            text-align: center;
            position: relative;
        }
        
        .ticket-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .ticket-subtitle {
            font-size: 14px;
            font-weight: 300;
            opacity: 0.9;
        }
        
        .ticket-code {
            background: white;
            color: #333;
            border-radius: 8px;
            margin: 15px auto 5px;
            padding: 12px;
            font-weight: 600;
            font-size: 18px;
            max-width: 220px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .ticket-divider {
            height: 20px;
            background-image: linear-gradient(45deg, white 25%, transparent 25%, transparent 50%, white 50%, white 75%, transparent 75%, transparent);
            background-size: 20px 20px;
            margin-top: -1px;
            margin-bottom: -1px;
            position: relative;
            z-index: 2;
        }
        
        .ticket-body {
            padding: 20px;
        }
        
        .status {
            text-align: center;
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: 600;
            margin: 20px auto;
            display: inline-block;
            font-size: 14px;
            min-width: 150px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .status-container {
            text-align: center;
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
            padding: 15px;
            background-color: #fff3cd;
            border-radius: 8px;
            color: #856404;
            font-size: 14px;
        }
        
        .ticket-details {
            margin-top: 25px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        .detail-label {
            color: #777;
            font-weight: 500;
        }
        
        .detail-value {
            font-weight: 600;
            color: #333;
            text-align: right;
        }
        
        .ticket-footer {
            border-top: 1px dashed #ddd;
            padding: 15px 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
            background-color: #f9f9f9;
        }
        
        .circle-left, .circle-right {
            width: 40px;
            height: 40px;
            background: #f5f5f5;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 3;
        }
        
        .circle-left {
            left: -20px;
        }
        
        .circle-right {
            right: -20px;
        }
        
        .ticket-price {
            background: #ff5b0d;
            color: white;
            position: absolute;
            top: 25px;
            right: -15px;
            transform: rotate(45deg);
            padding: 8px 30px;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }
        
        .info-icon {
            display: inline-block;
            width: 18px;
            height: 18px;
            margin-right: 5px;
            vertical-align: middle;
            fill: currentColor;
        }
        
        .ticket-id {
            font-size: 12px;
            opacity: 0.6;
            margin-top: 5px;
        }
        
        @media print {
            body {
                background: white;
                padding: 0;
            }
            
            .ticket-container {
                max-width: 100%;
            }
            
            .ticket {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket">
            <div class="ticket-header">
                <div class="ticket-title">🎟️ Ticket de Réservation</div>
                <div class="ticket-subtitle">Votre accès à l'événement</div>
                <div class="ticket-code">
                    {{ $ticket->code_unique ?? 'ABC-123456' }}
                </div>
                <div class="ticket-id">ID: #{{ substr($ticket->id ?? '12345', 0, 6) }}</div>
            </div>
            
            <div class="ticket-divider"></div>
            
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
            
            <div class="ticket-body">
                <div class="status-container">
                    <div class="status {{ $statusClass }}">
                        {{ ucfirst($statusText) }}
                    </div>
                </div>
                
                @if(strtolower($statusText) == 'en attente')
                <div class="warning-message">
                    <strong>⚠️ Attention:</strong> Ce ticket n'est pas confirmé à 100%. Veuillez compléter votre paiement pour finaliser votre réservation.
                </div>
                @endif
                
                <div class="ticket-details">
                    <div class="detail-row">
                        <div class="detail-label">
                            <svg class="info-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12,2C6.48,2 2,6.48 2,12C2,17.52 6.48,22 12,22C17.52,22 22,17.52 22,12C22,6.48 17.52,2 12,2M15.5,8C16.33,8 17,8.67 17,9.5C17,10.33 16.33,11 15.5,11C14.67,11 14,10.33 14,9.5C14,8.67 14.67,8 15.5,8M8.5,8C9.33,8 10,8.67 10,9.5C10,10.33 9.33,11 8.5,11C7.67,11 7,10.33 7,9.5C7,8.67 7.67,8 8.5,8M12,17.5C9.67,17.5 7.69,16.04 6.89,14H17.11C16.31,16.04 14.33,17.5 12,17.5Z"></path>
                            </svg>
                            Terrain
                        </div>
                        <div class="detail-value">{{ $ticket->reservation->terrain->name ?? 'Terrain Premium' }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">
                            <svg class="info-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"></path>
                            </svg>
                            Adresse
                        </div>
                        <div class="detail-value">{{ $ticket->reservation->terrain->adresse ?? '123 Rue du Sport' }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">
                            <svg class="info-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                            </svg>
                            Client
                        </div>
                        <div class="detail-value">{{ $ticket->reservation->client->name ?? 'Jean Dupont' }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">
                            <svg class="info-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z"></path>
                            </svg>
                            Date
                        </div>
                        <div class="detail-value">{{ $ticket->reservation->date_reservation ?? '15/05/2025' }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">
                            <svg class="info-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"></path>
                            </svg>
                            Horaire
                        </div>
                        <div class="detail-value">
                            {{ \Carbon\Carbon::parse($ticket->reservation->heure_debut)->format('H:i') ?? '14:00' }} - 
                            {{ \Carbon\Carbon::parse($ticket->reservation->heure_fin)->format('H:i') ?? '16:00' }}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="ticket-divider">
                <div class="circle-left"></div>
                <div class="circle-right"></div>
            </div>
            
            <div class="ticket-footer">
                Présentez ce ticket à votre arrivée • Merci pour votre réservation
            </div>
            
            <div class="ticket-price">
                {{ $ticket->price ?? '45' }} €
            </div>
        </div>
    </div>
</body>
</html>