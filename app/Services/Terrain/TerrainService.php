<?php

namespace App\Services\Terrain;

use App\Repositories\Terrain\TerrainRepository;
use Illuminate\Support\Facades\Storage;

class TerrainService
{
    protected $terrainRepository;

    public function __construct(TerrainRepository $terrainRepository)
    {
        $this->terrainRepository = $terrainRepository;
    }

    public function getAllTerrains()
    {
        return $this->terrainRepository->all();
    }

    public function getTerrainById($id)
    {
        return $this->terrainRepository->findById($id);
    }

    public function createTerrain(array $data)
    {
        if (isset($data['photo']) && $data['photo']->isValid()) {
            $data['photo'] = $data['photo']->store('terrains', 'public');
        }

        $data['user_id'] = auth()->id();

        return $this->terrainRepository->create($data);
    }

    public function updateTerrain($terrain, array $data)
    {
        if (isset($data['photo']) && $data['photo']->isValid()) {
            if ($terrain->photo) {
                Storage::disk('public')->delete($terrain->photo);
            }
            $data['photo'] = $data['photo']->store('terrains', 'public');
        }

        return $this->terrainRepository->update($terrain, $data);
    }

    public function deleteTerrain($terrain)
    {
        if ($terrain->photo) {
            Storage::disk('public')->delete($terrain->photo);
        }

        return $this->terrainRepository->delete($terrain);
    }

    public function getAllWithRelations()
    {
        return $this->terrainRepository->getAllWithRelations();
    }

    public function updateStatus($id, $status)
    {
        return $this->terrainRepository->updateStatus($id, $status);
    }
}
