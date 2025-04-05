<?php

namespace App\Http\Controllers\frontOffice;

use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\Terrain;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\URL;
use Stripe\Exception\CardException;
use App\Http\Controllers\Controller;


class ReservationController extends Controller
{

    public function createCheckoutSession(Request $request)
    {
        $request->validate([
            'terrain_id' => 'required|exists:terrains,id',
            'date_reservation' => 'required|date|after_or_equal:today', 
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut', 
        ]);

        $terrain = Terrain::findOrFail($request->terrain_id);
        $prix = $terrain->prix;

        $heureDebut = Carbon::createFromFormat('H:i', $request->heure_debut);
        $heureFin = Carbon::createFromFormat('H:i', $request->heure_fin);

        $creneaux = $heureDebut->diffInHours($heureFin);

        if ($creneaux > 2) {
            return redirect()->back()->with('error', 'Le créneau ne peut pas dépasser 2 heures.');
        }

        $existingReservation = Reservation::where('terrain_id', $request->terrain_id)
                                            ->where('date_reservation', $request->date_reservation)
                                            ->where('status', 'confirmée')
                                            ->where(function ($query) use ($heureDebut, $heureFin) {
                                                $query->whereBetween('heure_debut', [$heureDebut, $heureFin])
                                                    ->orWhereBetween('heure_fin', [$heureDebut, $heureFin])
                                                    ->orWhere(function($query) use ($heureDebut, $heureFin) {
                                                        $query->where('heure_debut', '<', $heureDebut)
                                                                ->where('heure_fin', '>', $heureFin);
                                                    });
                                            })
                                            ->first(); 

        if ($existingReservation) {
            $start = Carbon::parse($existingReservation->heure_debut)->format('H:i');
            $end = Carbon::parse($existingReservation->heure_fin)->format('H:i');

            return redirect()->back()->with('error', "Le terrain est déjà réservé ce jour-là entre $start et $end.");
        }

        $amount = $prix * $creneaux;

        $reservation = Reservation::create([
            'terrain_id' => $request->terrain_id,
            'client_id' => auth()->id(),
            'date_reservation' => $request->date_reservation,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'creneaux' => $creneaux,
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Réservation de terrain #' . $reservation->id,
                    ],
                    'unit_amount' => $amount * 100, 
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', $reservation->id),
            'cancel_url' => route('payment.cancel', $reservation->id),
            'metadata' => [
                'reservation_id' => $reservation->id,
            ],
        ]);

        Payment::create([
            'reservation_id' => $reservation->id,
            'amount' => $amount,
            'status' => 'pending', 
        ]);

        return redirect($session->url);
    }


    public function paymentSuccess($id)
    {
        $reservation = Reservation::findOrFail($id);
        
        $reservation->update([
            'status' => 'confirmée',
            'payment_status' => 'payé',
        ]);

        $payment = Payment::where('reservation_id', $reservation->id)->first();
        if ($payment) {
            $payment->status = 'success';
            $payment->save();

            Ticket::create([
                'reservation_id'   => $reservation->id,
                'terrain_id'       => $reservation->terrain_id,
                'payment_id'       => $payment->id,
                'user_id'          => $reservation->client_id, 
                'price'            => $payment->amount,
            ]);
            
        }

        return redirect()->route('tickets.index')->with('success', 'Paiement réussi ! Réservation confirmée.');
    }



    public function paymentCancel($id)
    {
        $reservation = Reservation::findOrFail($id);
    
        $reservation->update([
            'status' => 'annulée',
            'payment_status' => 'échoué',
        ]);

        $payment = Payment::where('reservation_id', $reservation->id)->first();
        if ($payment) {
            $payment->status = 'failed';
            $payment->save();
        }

        return redirect()->route('home')->with('error', 'Paiement annulé. Réservation non confirmée.');
    }



}
