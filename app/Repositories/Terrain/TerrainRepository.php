<?php

namespace App\Repositories\Terrain;

use App\Models\Terrain;

class TerrainRepository
{
    public function all()
    {
        return Terrain::with('categorie', 'tags', 'sponsors')->get();
    }

    public function findById($id)
    {
        return Terrain::with('categorie', 'tags', 'sponsors')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Terrain::create($data);
    }

    public function update(Terrain $terrain, array $data)
    {
        return $terrain->update($data);
    }

    public function delete(Terrain $terrain)
    {
        return $terrain->delete();
    }
}
