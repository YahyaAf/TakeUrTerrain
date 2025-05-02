<?php

namespace App\Http\Controllers\frontOffice;

use App\Models\User;
use App\Models\Terrain;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class CategoryTerrainController extends BaseController
{

    public function __construct()
    {
        // $this->middleware('permission:terrain-page')->only(['index']);
        $this->middleware('permission:detail-terrain')->only(['show']);
    }


    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Terrain::with(['sponsors', 'tags', 'categorie', 'feedbacks'])
            ->where('statut', 'accepted')
            ->where('disponibility', 'disponible');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('adresse')) {
            $query->where('adresse', 'like', '%' . $request->adresse . '%');
        }

        if ($request->filled('categorie_id')) {
            $query->where('categorie_id', $request->categorie_id);
        }

        if ($request->filled('prix_max')) {
            $query->where('prix', '<=', $request->prix_max);
        }

        $terrains = $query->paginate(9);

        $moyennes = [];
        foreach ($terrains as $terrain) {
            $average = $terrain->feedbacks->avg('note');
            $moyennes[$terrain->id] = $average;
        }

        return view('frontOffice.terrains.index', compact('terrains', 'categories', 'moyennes'));
    }




    public function show($id)
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })->with('roles')->get();
        $terrain = Terrain::with(['sponsors', 'tags', 'categorie'])->findOrFail($id);
        $reservations = Reservation::where('terrain_id', $terrain->id)
            ->whereIn('status', ['confirmée', 'en attente'])
            ->get(['date_reservation', 'heure_debut', 'heure_fin']);

        return view('frontOffice.terrains.show', compact('terrain','reservations','users'));
    }


}

