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
}
