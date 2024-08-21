<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function register(Request $request)
    {
        $request->validate([
            'pseudo_user' => 'required|string|min:2|max:255',
            'email_account' => 'required|email_account|unique:users',
            'password' => 'required|string|min:6|max:255',
            'role_id' => 'nullable',
            'email' => 'nullable',
            'tel' => 'nullable',
            'description' => 'nullable',
            'slug' => 'nullable',
            'style' => 'nullable',
            'instagram' => 'nullable',
            'img_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'status_profil' => 'nullable',
            'city' => 'nullable',
            'departement' => 'nullable',
            'coordonnes' => 'nullable',
            'tattooshop' => 'nullable',
            'title' => 'nullable',
            'meta_description' => 'nullable',
            'tattooshop_id' => 'nullable',
        ]);
        $filename = "";
        if ($request->hasFile('img_profil')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('img_profil')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('img_profil')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin/storage/app
            $request->file('img_profil')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        $img_profil = User::create(array_merge($request->all(), ['img_profil' => $filename]));


        return response()->json([
            'status' => 'Success',
            'data' => $img_profil,
        ]);

        $user = $this->user::create([
            'pseudo_user' => $request['pseudo_user'],
            'email_account' => $request['email_account'],
            'password' => bcrypt($request['password']),
            'role_id' => $request['role_id'],
            'email' => $request['email'],
            'tel' => $request['tel'],
            'description' => $request['description'],
            'slug' => $request['slug'],
            'style' => $request['style'],
            'instagram' => $request['instagram'],
            'img_profil' => $request['img_profil'],
            'status_profil' => $request['status_profil'],
            'city' => $request['city'],
            'departement' => $request['departement'],
            'coordonnes' => $request['coordonnes'],
            'tattooshop' => $request['tattooshop'],
            'title' => $request['title'],
            'meta_description' => $request['meta_description'],
            'tattooshop_id' => $request['tattooshop_id'],
        ]);
        $token = auth()->login($user);
        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'User created successfully!',
            ],
            'data' => [
                'user' => $user,
                'access_token' => [
                    'token' => $token,
                    'type' => 'Bearer',
                    'expires_in' => auth()->factory()->getTTL() * 3600, // Renseigne le temps d'expiration du token en secondes
                ],
            ],
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email_account' => 'required|string',
            'password' => 'required|string',
        ]);
        $token = auth()->attempt([
            'email_account' => $request->email_account,
            'password' => $request->password,
        ]);
        if ($token) {
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Quote fetched successfully.',
                ],
                'data' => [
                    'user' => auth()->user(),
                    'access_token' => [
                        'token' => $token,
                        'type' => 'Bearer',
                        'expires_in' => auth()->factory()->getTTL() * 3600,
                    ],
                ],
            ]);
        }
    }
    public function logout()
    {
        $token = JWTAuth::getToken();
        $invalidate = JWTAuth::invalidate($token);
        if ($invalidate) {
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Successfully logged out',
                ],
                'data' => [],
            ]);
        }
    }
}
