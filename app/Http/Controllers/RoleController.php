<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display the list of roles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Static example of roles (replace with database data later)
        $roles = [
            ['name' => 'Administrateur', 'description' => 'Gestion complète de l\'application', 'status' => 'active'],
            ['name' => 'Modérateur', 'description' => 'Modération des utilisateurs et contenus', 'status' => 'active'],
            ['name' => 'Utilisateur', 'description' => 'Accès limité aux fonctionnalités', 'status' => 'inactive'],
            ['name' => 'Support', 'description' => 'Assistance technique aux utilisateurs', 'status' => 'active'],
            ['name' => 'Visiteur', 'description' => 'Accès public aux contenus', 'status' => 'inactive'],
        ];

        return view('backOffice.roles.index', compact('roles'));
    }

    /**
     * Show the form to create a new role.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backOffice.roles.create');
    }

    /**
     * Show the form to edit the role.
     *
     * @param  int  $roleId
     * @return \Illuminate\View\View
     */
    public function edit($roleId)
    {
        // Example role data, this should be fetched from the database
        $role = (object)[
            'id' => $roleId,
            'name' => 'Administrateur'
        ];

        return view('backOffice.roles.edit', compact('role'));
    }

    /**
     * Update the role in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $roleId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $roleId)
    {
        // Validation for the form data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the role by ID and update it in the database (simulate with static data)
        // In a real scenario, use: Role::find($roleId)->update(['name' => $request->name]);

        // After updating, redirect back to the roles page with a success message
        return redirect()->route('roles.index')->with('success', 'Rôle mis à jour avec succès');
    }
}
