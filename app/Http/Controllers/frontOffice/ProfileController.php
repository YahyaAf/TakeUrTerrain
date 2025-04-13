<?php

namespace App\Http\Controllers\frontOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // on récupère l'utilisateur connecté
        return view('frontOffice.profiles.index', compact('user'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        // Validation des champs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Mise à jour du nom et email
        $user->name = $request->name;
        $user->email = $request->email;

        // Mise à jour de la photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne si elle existe
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            $photoPath = $request->file('photo')->store('photos', 'public');
            $user->photo = $photoPath;
        }

        // Mise à jour du mot de passe si rempli
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Votre profil a été mis à jour avec succès.');
    }
}
