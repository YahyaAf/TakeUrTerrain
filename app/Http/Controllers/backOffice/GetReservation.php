<?php

namespace App\Http\Controllers\backOffice;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class GetReservation extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:check-reservation')->only(['reservation']);
    }

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
}
