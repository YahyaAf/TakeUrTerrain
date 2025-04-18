<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Tag;
use App\Models\Sponsor;
use App\Models\Category;
use App\Models\Terrain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Terrain\TerrainService;
use App\Http\Requests\backOffice\TerrainRequest;
use App\Http\Requests\backOffice\UpdateTerrainRequest;
use Illuminate\Routing\Controller as BaseController;

class TerrainController extends BaseController
{
    protected $terrainService;

    public function __construct(TerrainService $terrainService)
    {
        $this->terrainService = $terrainService;
        $this->middleware('permission:view-terrain')->only(['index', 'show']);
        $this->middleware('permission:create-terrain')->only(['create', 'store']);
        $this->middleware('permission:update-terrain')->only(['edit', 'update']);
        $this->middleware('permission:delete-terrain')->only('destroy');
        $this->middleware('permission:view-publication')->only('publication');
        $this->middleware('permission:accept-publication')->only('accept');
        $this->middleware('permission:refuse-publication')->only('refuse');
    }

    public function index()
    {
        $terrains = $this->terrainService->getAllTerrains();
        return view('backOffice.terrains.index', compact('terrains'));
    }

    public function create()
    {
        $tags = Tag::all(); 
        $sponsors = Sponsor::all(); 
        $categories = Category::all(); 
        return view('backOffice.terrains.create', compact('tags', 'sponsors', 'categories'));
    }

    public function store(TerrainRequest $request)
    {
        $terrain = $this->terrainService->createTerrain($request->all());

        if ($request->has('tags')) {
            $terrain->tags()->attach($request->tags);
        }
        if ($request->has('sponsors')) {
            $terrain->sponsors()->attach($request->sponsors);
        }

        return redirect()->route('terrains.index')->with('success', 'Terrain créé avec succès!');
    }

    public function show($id)
    {
        $terrain = $this->terrainService->getTerrainById($id);
        return view('backOffice.terrains.show', compact('terrain'));
    }

    public function edit(Terrain $terrain)
    {
        $tags = Tag::all();
        $sponsors = Sponsor::all();
        $categories = Category::all();
        return view('backOffice.terrains.edit', compact('terrain', 'tags', 'sponsors', 'categories'));
    }

    public function update(UpdateTerrainRequest $request, Terrain $terrain)
    {
        $this->terrainService->updateTerrain($terrain, $request->all());

        $terrain->tags()->sync($request->tags ?? []);
        $terrain->sponsors()->sync($request->sponsors ?? []);

        return redirect()->route('terrains.index')->with('success', 'Terrain mis à jour avec succès!');
    }

    public function destroy(Terrain $terrain)
    {
        $this->terrainService->deleteTerrain($terrain);

        $terrain->tags()->detach();
        $terrain->sponsors()->detach();

        return redirect()->route('terrains.index')->with('success', 'Terrain supprimé avec succès!');
    }

    public function publication()
    {
        $terrains =Terrain::with(['tags', 'categorie', 'sponsors'])
            ->orderByDesc('created_at')
            ->get();

        return view('backOffice.publications.index', compact('terrains'));
    }


    public function accept($id)
    {
        $terrain = Terrain::findOrFail($id);

        $terrain->statut = 'accepted';
        $terrain->save();

        return redirect()->route('publications.index')->with('message', 'Terrain has been accepted successfully.');
    }

    public function refuse($id)
    {
        $terrain = Terrain::findOrFail($id);

        $terrain->statut = 'refuse';
        $terrain->save();

        return redirect()->route('publications.index')->with('message', 'Terrain has been refused.');
    }
}
