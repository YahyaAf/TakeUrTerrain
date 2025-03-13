<?php

namespace App\Http\Controllers\backOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the permissions.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Static data for permissions (this can later be replaced by actual database data)
        $permissions = [
            ['name' => 'Créer des utilisateurs', 'description' => 'Permet de créer de nouveaux utilisateurs', 'status' => 'active'],
            ['name' => 'Modifier des rôles', 'description' => 'Permet de modifier les rôles des utilisateurs', 'status' => 'active'],
            ['name' => 'Supprimer des utilisateurs', 'description' => 'Permet de supprimer des utilisateurs', 'status' => 'inactive'],
            ['name' => 'Voir les rapports', 'description' => 'Permet de voir les rapports et les statistiques', 'status' => 'active'],
            ['name' => 'Accéder aux paramètres', 'description' => 'Permet d\'accéder aux paramètres de l\'application', 'status' => 'inactive'],
        ];

        return view('backOffice.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backOffice.permissions.create');
    }

    /**
     * Show the form for editing the specified permission.
     *
     * @param int $permissionId
     * @return \Illuminate\View\View
     */
    public function edit($permissionId)
    {
        // Static data for an example (replace with actual data from the database later)
        $permission = (object)[
            'id' => $permissionId,
            'name' => 'Créer des utilisateurs',
            'description' => 'Permet de créer de nouveaux utilisateurs',
            'status' => 'active',
        ];

        return view('backOffice.permissions.edit', compact('permission'));
    }
}
