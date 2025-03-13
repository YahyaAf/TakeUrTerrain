<?php

namespace App\Http\Controllers\backOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GestionUsersController extends Controller
{
    public function index()
    {
        return view('backOffice.gestionUsers.index'); 
    }
}
