<?php

namespace App\Repositories\Terrain;

use App\Models\Terrain;

class TerrainRepository
{
    public function all()
    {
        return Terrain::with('categorie', 'tags', 'sponsors')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
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

    public function getAllWithRelations()
    {
        return Terrain::with(['tags', 'categorie', 'sponsors'])
            ->orderByDesc('created_at')
            ->get();
    }

    public function updateStatus($id, $status)
    {
        $terrain = Terrain::findOrFail($id);
        $terrain->statut = $status;
        $terrain->save();
        return $terrain;
    }
}
