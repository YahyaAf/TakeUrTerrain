<?php

namespace App\Http\Controllers\frontOffice;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\frontOffice\StoreFeedbackRequest;

class FeedbackController extends Controller
{
    public function store(StoreFeedbackRequest $request)
    {
        Feedback::create([
            'terrain_id' => $request->terrain_id,
            'user_id' => Auth::id(),
            'commentaire' => $request->commentaire,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('success', 'Merci pour votre avis !');
    }

    public function show($id)
    {
        $terrain = Terrain::with('feedbacks.user')->findOrFail($id);
        return view('terrains.show', compact('terrain'));
    }

    public function getAverageRating($terrain_id)
    {
        $terrain = Terrain::with('feedbacks')->findOrFail($terrain_id);

        $average = $terrain->feedbacks->avg('note');

        return response()->json([
            'terrain_id' => $terrain_id,
            'average_rating' => round($average, 1)
        ]);
    }

}
