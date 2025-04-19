<?php

namespace App\Http\Controllers\frontOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller as BaseController;

class ContactController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:contact-message')->only(['index', 'send']);
    }

    public function index()
    {
        return view('frontOffice.contacts.index');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('yahyaclarke0@gmail.com')->send(new ContactMessage($request->name, $request->email, $request->message));

        return back()->with('success', 'Votre message a été envoyé avec succès!');
    }

}
