<?php

namespace App\Http\Controllers\frontOffice;

use App\Models\Terrain;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryTerrainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $terrains = Terrain::with(['sponsors', 'tags', 'categorie'])->paginate(9); 

        return view('frontOffice.terrains.index', compact('terrains', 'categories'));
    }

    public function show($id)
    {
        $terrain = Terrain::with(['sponsors', 'tags', 'categorie'])->findOrFail($id);

        return view('frontOffice.terrains.show', compact('terrain'));
    }


}

