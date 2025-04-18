<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Tag;
use App\Models\Terrain;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class StatistiqueController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:statistique-organizateur')->only(['index']);
    }


    public function index()
    {
        $userId = Auth::id();

        $terrainCount = Terrain::where('user_id', $userId)->count();
        $categorieCount = Category::count();
        $tagCount = Tag::count();

        $reservationCount = Reservation::whereHas('terrain', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        $reservationsByMonth = Reservation::whereHas('terrain', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->selectRaw('DATE_FORMAT(date_reservation, "%Y-%m") as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month');

        $terrainsByCategory = DB::table('categories')
            ->join('terrains', 'categories.id', '=', 'terrains.categorie_id')
            ->where('terrains.user_id', $userId)
            ->select('categories.name', DB::raw('COUNT(terrains.id) as count'))
            ->groupBy('categories.name')
            ->pluck('count', 'categories.name');

        return view('backOffice.dashboard', compact(
            'terrainCount',
            'categorieCount',
            'tagCount',
            'reservationCount',
            'reservationsByMonth',
            'terrainsByCategory'
        ));
    }
}

