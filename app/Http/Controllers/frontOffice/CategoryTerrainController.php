<?php

namespace App\Http\Controllers\frontOffice;

use App\Models\Terrain;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryTerrainController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->has('category')) {
            $terrains = Terrain::where('categorie_id', $request->category)->get();
        } else {
            $terrains = Terrain::all();
        }

        return view('frontOffice.terrains.index', compact('terrains', 'categories'));
    }
}

