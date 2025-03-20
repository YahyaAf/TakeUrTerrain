<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\backOffice\SponsorRequest;
use App\Http\Requests\backOffice\UpdateSponsorRequest;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::latest()->paginate(10);
        return view('backOffice.sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        return view('backOffice.sponsors.create');
    }

    public function store(SponsorRequest $request)
    {
        $logoPath = $request->file('logo')->store('sponsors', 'public');

        Sponsor::create([
            'name' => $request->name,
            'logo' => $logoPath,
        ]);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor ajouté avec succès !');
    }

    public function show(Sponsor $sponsor)
    {
        return view('backOffice.sponsors.show', compact('sponsor'));
    }

    public function edit(Sponsor $sponsor)
    {
        return view('backOffice.sponsors.edit', compact('sponsor'));
    }

    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        $sponsor->name = $request->name;

        if ($request->hasFile('logo')) {
            if ($sponsor->logo) {
                Storage::disk('public')->delete($sponsor->logo);
            }

            $sponsor->logo = $request->file('logo')->store('sponsors', 'public');
        }
        $sponsor->save();

        return redirect()->route('sponsors.index')->with('success', 'Sponsor mis à jour avec succès !');
    }

    public function destroy(Sponsor $sponsor)
    {
        if ($sponsor->logo) {
            Storage::disk('public')->delete($sponsor->logo);
        }

        $sponsor->delete();

        return redirect()->route('sponsors.index')->with('success', 'Sponsor supprimé avec succès !');
    }
}
