<?php

namespace App\Http\Controllers\backOffice;

use App\Http\Controllers\Controller;
use App\Models\Terrain;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class StatistiqueController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $terrainCount = Terrain::where('user_id', $userId)->count();
        $categorieCount = Category::count();
        $tagCount = Tag::count();

        $reservationCount = Reservation::whereHas('terrain', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        return view('backOffice.dashboard', compact(
            'terrainCount',
            'categorieCount',
            'tagCount',
            'reservationCount'
        ));
    }
}

