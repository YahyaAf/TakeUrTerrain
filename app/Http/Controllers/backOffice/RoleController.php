<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class RoleController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:view-role')->only(['index', 'show']);
        $this->middleware('permission:create-role')->only(['create', 'store']);
        $this->middleware('permission:update-role')->only(['edit', 'update']);
        $this->middleware('permission:delete-role')->only('destroy');
    }


    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('backOffice.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('backOffice.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name|max:255',
            'permissions' => 'array'
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Rôle ajouté avec succès.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('backOffice.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id . '|max:255',
            'permissions' => 'array'
        ]);

        $role->update(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Rôle mis à jour.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rôle supprimé.');
    }
}
