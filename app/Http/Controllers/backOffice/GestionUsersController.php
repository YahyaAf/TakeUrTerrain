<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backOffice\UpdateUserRequest;
use Illuminate\Routing\Controller as BaseController;

class GestionUsersController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:view-user')->only(['index']);
        $this->middleware('permission:update-user')->only(['edit', 'update']);
        $this->middleware('permission:delete-user')->only('destroy');
    }


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

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id); 
        
        $user->roles()->sync([$request->role]);

        $user->statut = $request->statut;
        $user->banned = $request->banned; 
        $user->save();

        return redirect()->route('backOffice.gestionUsers.index')
                        ->with('success', 'Utilisateur mis à jour avec succès');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id); 
        $user->delete();
        return redirect()->route('backOffice.gestionUsers.index')
                         ->with('success', 'Utilisateur supprimé avec succès');
    }
}

