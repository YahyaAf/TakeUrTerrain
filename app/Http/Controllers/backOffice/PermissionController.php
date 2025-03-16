<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('backOffice.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('backOffice.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name|max:255'
        ]);

        Permission::create($request->only('name'));

        return redirect()->route('permissions.index')->with('success', 'Permission ajoutée avec succès.');
    }

    public function edit(Permission $permission)
    {
        return view('backOffice.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id . '|max:255'
        ]);

        $permission->update($request->only('name'));

        return redirect()->route('permissions.index')->with('success', 'Permission mise à jour.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission supprimée.');
    }
}