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
        $terrains = Terrain::with(['sponsors', 'tags', 'categorie', 'feedbacks'])
                   ->where('statut', 'accepted')
                   ->paginate(9);
        $moyennes = [];
        foreach ($terrains as $terrain) {
            $average = $terrain->feedbacks->avg('note');
            $moyennes[$terrain->id] = $average;
        }

        return view('frontOffice.terrains.index', compact('terrains', 'categories', 'moyennes'));
    }

    public function show($id)
    {
        $terrain = Terrain::with(['sponsors', 'tags', 'categorie'])->findOrFail($id);

        return view('frontOffice.terrains.show', compact('terrain'));
    }


}

