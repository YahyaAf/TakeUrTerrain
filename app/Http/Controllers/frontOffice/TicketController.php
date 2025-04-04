<?php

namespace App\Http\Controllers\frontOffice;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())
                        ->with('reservation', 'terrain', 'payment') 
                        ->latest()
                        ->get();

        return view('frontOffice.tickets.index', compact('tickets'));
    }
}
