<?php

namespace App\Http\Controllers\backOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        return view('BackOffice.Categories.index');
    }

    public function create()
    {
        return view('BackOffice.Categories.create');
    }

    public function edit($id)
    {
        return view('BackOffice.Categories.edit', compact('id'));
    }

    public function show($id)
    {
        return view('BackOffice.Categories.show', compact('id'));
    }
}
