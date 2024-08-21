<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function currentUser()
    {
        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'User fetched successfully!',
            ],
            'data' => [
                'user' => auth()->user(),
            ],
        ]);
    }
    public function index()
    {
        // On récupère tous les utilisateurs
        $users = User::all();
        // On retourne les informations des utilisateurs en JSON
        return response()->json($users);
    }

    public function show(User $user)
    {
        // On retourne les informations de l'utilisateur en JSON
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email_account' => 'required',
            'password' => 'required',
            'pseudo_user' => 'required|max:50',
            'email' => 'nullable',
            'tel'=>'nullable',
            'description'=>'nullable',
            'slug'=>'nullable',
            'style'=>'nullable',
            'instagram'=>'nullable',
            'img_profil'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'status_profil'=>'nullable',
            'city'=>'nullable',
            'departement'=>'nullable',
            'coordonnes'=>'nullable',
            'tattooshop'=>'nullable',
            'title'=>'nullable',
            'meta_description'=>'nullable',
            'tattooshop_id'=>'nullable',
        ]);
        // On crée un nouvel utilisateur
        $user->update($request->all());
        //retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
