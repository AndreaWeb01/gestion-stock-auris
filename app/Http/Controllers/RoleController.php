<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Role::with('permissions')->get();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:roles,name',
        'permissions' => 'array|required', // les permissions doivent être un tableau
    ]);

    // 1. Créer le rôle avec guard_name
    $role = Role::create([
        'name' => $request->name,
        'guard_name' => 'web', // important si non défini dans modèle
    ]);

    // 2. Attribuer les permissions sélectionnées
    $role->syncPermissions($request->permissions);

    return redirect()->route('roles.index')->with('success', 'Rôle créé avec permissions.');
}

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edite', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'array|required',
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Rôle mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
