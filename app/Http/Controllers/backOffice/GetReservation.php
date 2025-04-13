<?php

namespace App\Http\Controllers\backOffice;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class GetReservation extends Controller
{
    public function reservation()
    {
        $reservations = Reservation::with(['client', 'terrain'])
            ->whereHas('terrain', function ($query) {
                $query->where('user_id', Auth::id()); 
            })
            ->latest()
            ->get();

        return view('backOffice.reservations.reservation', compact('reservations'));
    }

    public function payment()
    {
        $reservations = Reservation::with(['payment', 'client', 'terrain'])
            ->whereHas('terrain', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereHas('payment') 
            ->latest()
            ->get();

        return view('backOffice.reservations.payment', compact('reservations'));
    }
}
