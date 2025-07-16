<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserContoller extends Controller
{    public function index()
    {
        $users = User::all();
        $roles=Role::all();
        return view('admin.users.index', compact('users','roles'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        'telephone' => 'required|string',

        ]);



        User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone'=>$request->telephone,

        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur ajouté.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edite', compact('user', 'roles'));
    }

public function update(Request $request, User $user)
{
    // 1. Règles de validation
    $rules = [
        'nom'       => 'required|string|max:255',
        'prenom'    => 'required|string|max:255',
        'email'     => 'required|email|max:255|unique:users,email,' . $user->id,
        'telephone' => 'required|string|max:20',
        'role'      => 'required|string|max:50',
    ];

    // 2. Si un mot de passe est fourni
    if ($request->filled('password')) {
        $rules['password'] = 'string|min:6|confirmed';
    }

    // 3. Validation
    $validated = $request->validate($rules);

    // 4. Hachage du mot de passe si fourni
    if ($request->filled('password')) {
        $validated['password'] = bcrypt($request->password);
    }

    // 5. Mise à jour des champs sauf rôle
    $user->update(Arr::except($validated, ['role']));

    // 6. Synchroniser le rôle (remplace tous les rôles existants par celui sélectionné)
    $user->syncRoles($validated['role']);

    return redirect()->route('users.index')->with('success', 'Utilisateur modifié.');
}



    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé.');
    }
}
