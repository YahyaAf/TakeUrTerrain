<?php

namespace App\Http\Controllers\backOffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class GestionUsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('backOffice.gestionUsers.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); 
        $roles = Role::all(); 
        return view('backOffice.gestionUsers.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|exists:roles,id', 
            'statut' => 'required', 
        ]);

        $user = User::findOrFail($id);

        $user->roles()->sync([$request->role]);

        $user->statut = $request->statut;
        $user->save();

        return redirect()->route('backOffice.gestionUsers.index')->with('success', 'Utilisateur mis à jour avec succès');
    }
}
