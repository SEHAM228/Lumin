<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
   
   
    public function show()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }
    public function showother($id)
    {
        // Récupérer l'utilisateur à afficher en fonction de son ID
        $user = User::findOrFail($id);
    
        return view('user.other', compact('user'));
    }
    
    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    
    public function updateprofile(Request $request)
    {
        // Valider les données du formulaire
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'nullable|string|max:500',
        ]);

        // Récupérer l'utilisateur connecté
        $user = auth()->user();

        // Préparer les données à mettre à jour
        $data = [
            'name' => $request->input('name'),
            'about' => $request->input('about'),
        ];

        // Gérer la mise à jour de la photo de profil si elle est fournie
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $image_name = time() . '_photo_' . $file->getClientOriginalName();
            $file->move('uploads', $image_name);
            $data['photo'] = 'uploads/' . $image_name;

            // Supprimer l'ancienne photo de profil s'il en existe une
           
        }

        // Mettre à jour le profil de l'utilisateur
        $user->update($data);

        return redirect()->route('profile.show')->with([
            'success' => 'Profil mis à jour avec succès'
        ]);
    }
}
