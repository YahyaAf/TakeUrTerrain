<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Terrain;
use App\Models\Tag;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    public function index()
    {
        $terrains = Terrain::all(); 
        return view('terrains.index', compact('terrains')); 
    }

    public function create()
    {
        $tags = Tag::all(); 
        $sponsors = Sponsor::all(); 
        return view('terrains.create', compact('tags', 'sponsors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string',
            'statut' => 'required|string|in:disponible,réservé,indisponible',
            'adresse' => 'required|string',
            'tags' => 'array|exists:tags,id', 
            'sponsors' => 'array|exists:sponsors,id', 
        ]);

        $terrain = Terrain::create($request->only([
            'name', 'description', 'photo', 'prix', 'categorie', 'statut', 'adresse'
        ]));

        if ($request->has('tags')) {
            $terrain->tags()->attach($request->tags);
        }

        if ($request->has('sponsors')) {
            $terrain->sponsors()->attach($request->sponsors);
        }

        return redirect()->route('terrains.index')->with('success', 'Terrain created successfully!');
    }

    public function show(Terrain $terrain)
    {
        return view('terrains.show', compact('terrain'));
    }

    public function edit(Terrain $terrain)
    {
        $tags = Tag::all(); 
        $sponsors = Sponsor::all(); 
        return view('terrains.edit', compact('terrain', 'tags', 'sponsors'));
    }

    public function update(Request $request, Terrain $terrain)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string',
            'statut' => 'required|string|in:disponible,réservé,indisponible',
            'adresse' => 'required|string',
            'tags' => 'array|exists:tags,id',
            'sponsors' => 'array|exists:sponsors,id',
        ]);

        $terrain->update($request->only([
            'name', 'description', 'photo', 'prix', 'categorie', 'statut', 'adresse'
        ]));

        if ($request->has('tags')) {
            $terrain->tags()->sync($request->tags);
        }

        if ($request->has('sponsors')) {
            $terrain->sponsors()->sync($request->sponsors);
        }

        return redirect()->route('terrains.index')->with('success', 'Terrain updated successfully!');
    }

    public function destroy(Terrain $terrain)
    {
        $terrain->tags()->detach(); 
        $terrain->sponsors()->detach(); 
        $terrain->delete();

        return redirect()->route('terrains.index')->with('success', 'Terrain deleted successfully!');
    }
}
