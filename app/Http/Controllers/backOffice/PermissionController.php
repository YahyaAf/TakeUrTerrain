<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class PermissionController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:view-permission')->only(['index', 'show']);
        $this->middleware('permission:create-permission')->only(['create', 'store']);
        $this->middleware('permission:update-permission')->only(['edit', 'update']);
        $this->middleware('permission:delete-permission')->only('destroy');
    }


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