<?php

namespace App\Http\Controllers\frontOffice;

use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\Terrain;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\URL;
use Stripe\Exception\CardException;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;


class ReservationAdminController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:reservation-admin')->only(['AdminCreateCheckoutSession', 'AdminPaymentSuccess','AdminPaymentCancel']);
    }

    public function adminStoreReservation(Request $request)
    {
        $request->validate([
            'terrain_id' => 'required|exists:terrains,id',
            'client_id' => 'required|exists:users,id',
            'date_reservation' => 'required|date|after_or_equal:today',
            'heure_debut' => 'required|date_format:H:i',
            'creneaux' => 'required|in:1,2',
        ]);

        $terrain = Terrain::findOrFail($request->terrain_id);
        $prix = $terrain->prix;
        $heureDebut = Carbon::createFromFormat('H:i', $request->heure_debut);
        $creneaux = (int) $request->creneaux;

        if ($creneaux > 2) {
            return redirect()->back()->with('error', 'Le créneau ne peut pas dépasser 2 heures.');
        }

        $heureFin = $heureDebut->copy()->addHours($creneaux);
        $debutTime = $heureDebut->format('H:i');
        $finTime = $heureFin->format('H:i');

        if (
            ($debutTime > '23:00' || $debutTime < '08:00') ||
            ($finTime > '00:00' && $finTime < '08:00')
        ) {
            return redirect()->back()->with('error', 'Les réservations entre 23:01 et 07:59 ne sont pas autorisées.');
        }

        $existingReservation = Reservation::where('terrain_id', $request->terrain_id)
            ->where('date_reservation', $request->date_reservation)
            ->whereIn('status', ['confirmée', 'en attente'])
            ->where(function ($query) use ($heureDebut, $heureFin) {
                $query->whereBetween('heure_debut', [$heureDebut, $heureFin])
                    ->orWhereBetween('heure_fin', [$heureDebut, $heureFin])
                    ->orWhere(function ($query) use ($heureDebut, $heureFin) {
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

        if ($request->price_deposit > $amount) {
            return redirect()->back()->with('error', 'Le montant de l\'acompte ne peut pas dépasser le prix total de la réservation.');
        }

        $reservation = Reservation::create([
            'terrain_id' => $request->terrain_id,
            'client_id' => $request->client_id,
            'date_reservation' => $request->date_reservation,
            'heure_debut' => $heureDebut,
            'heure_fin' => $heureFin,
            'creneaux' => $creneaux,
            'status' => 'en attente', 
        ]);

        Payment::create([
            'reservation_id' => $reservation->id,
            'amount' => $request->price_deposit,
            'status' => 'en attente', 
        ]);

        $payment = Payment::where('reservation_id', $reservation->id)->first();

        Ticket::create([
            'reservation_id' => $reservation->id,
            'terrain_id'     => $reservation->terrain_id,
            'payment_id'     => $payment->id,
            'user_id'        => $reservation->client_id, 
            'price'          => $payment->amount,
            'status'         => 'en attente',
            'code_unique' => strtoupper(Str::random(10)),

        ]);

        return redirect()->route('frontOffice.terrains.index')->with('success', 'Réservation créée avec succès et mise en attente de paiement.');
    }


}
