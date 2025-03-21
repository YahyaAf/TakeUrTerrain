<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Tag;
use App\Models\Sponsor;
use App\Models\Terrain;
use Illuminate\Http\Request;
use App\Http\Requests\backOffice\TerrainRequest;
use App\Http\Requests\backOffice\UpdateTerrainRequest;

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

    public function store(TerrainRequest $request)
    {
        $terrain = Terrain::create($request->only([
            'name', 'description', 'photo', 'prix', 'categorie', 'statut', 'adresse'
        ]));

        if ($request->has('tags')) {
            $terrain->tags()->attach($request->tags);
        }

        if ($request->has('sponsors')) {
            $terrain->sponsors()->attach($request->sponsors);
        }

        return redirect()->route('terrains.index')->with('success', 'Terrain créé avec succès!');
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

    public function update(UpdateTerrainRequest $request, Terrain $terrain)
    {
        $terrain->update($request->only([
            'name', 'description', 'photo', 'prix', 'categorie', 'statut', 'adresse'
        ]));

        if ($request->has('tags')) {
            $terrain->tags()->sync($request->tags);
        }

        if ($request->has('sponsors')) {
            $terrain->sponsors()->sync($request->sponsors);
        }

        return redirect()->route('terrains.index')->with('success', 'Terrain mis à jour avec succès!');
    }


    public function destroy(Terrain $terrain)
    {
        $terrain->tags()->detach(); 
        $terrain->sponsors()->detach(); 
        $terrain->delete();

        return redirect()->route('terrains.index')->with('success', 'Terrain deleted successfully!');
    }
}
