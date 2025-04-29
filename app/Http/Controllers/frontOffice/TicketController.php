<?php

namespace App\Http\Controllers\frontOffice;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller as BaseController;

class TicketController extends BaseController
{
    public function __construct()
    {
        $this->middleware('permission:view-ticket')->only(['index']);
        $this->middleware('permission:download-ticket')->only(['downloadPDF']);
    }

    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())
                        ->with('reservation.client', 'reservation.terrain', 'reservation.payment')
                        ->latest()
                        ->get();

        return view('frontOffice.tickets.index', compact('tickets'));
    }



    public function downloadPDF($id)
    {
        $ticket = Ticket::with(['terrain', 'reservation.client'])->findOrFail($id);

        $pdf = Pdf::loadView('frontOffice.tickets.pdf', compact('ticket'));
        
        return $pdf->download('ticket_' . $ticket->id . '.pdf');
    }
}
