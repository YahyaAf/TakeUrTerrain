<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Tag;
use App\Models\Sponsor;
use App\Models\Terrain;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backOffice\TerrainRequest;
use App\Http\Requests\backOffice\UpdateTerrainRequest;

class TerrainController extends Controller
{
    public function index()
    {
        $terrains = Terrain::with('categorie', 'tags', 'sponsors')->get();
        return view('backOffice.terrains.index', compact('terrains'));
    }

    public function create()
    {
        $tags = Tag::all(); 
        $sponsors = Sponsor::all(); 
        $categories = Category::all(); 
        return view('backOffice.terrains.create', compact('tags', 'sponsors','categories'));
    }

    public function store(TerrainRequest $request)
    {
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('terrains', 'public');
        }

        $terrain = Terrain::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $photoPath,
            'prix' => $request->prix,
            'categorie_id' => $request->categorie_id,
            'disponibility' => $request->disponibility,
            'adresse' => $request->adresse,
        ]);

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
        return view('backOffice.terrains.show', compact('terrain'));
    }

    public function edit(Terrain $terrain)
    {
        $tags = Tag::all(); 
        $sponsors = Sponsor::all(); 
        return view('backOffice.terrains.edit', compact('terrain', 'tags', 'sponsors'));
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
