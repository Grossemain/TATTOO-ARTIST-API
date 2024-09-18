<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;


class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function currentUser()
    {
        $user= auth()->user()->load('artstyles');
 
        return response()->json($user);
    }

    public function index()
    {
        // On récupère tous les utilisateurs
        $users = User::with(['tattooshop'])->get();
        // On retourne les informations des utilisateurs en JSON
        return response()->json($users);
    }

    public function show(User $user)
    {
        // On retourne les informations de l'utilisateur en JSON
        return response()->json($user);
    }

    public function search(Request $request)
    {

        $users = User::query()
            ->when(
                $request->search,
                function (Builder $builder) use ($request) {
                    $builder->where('pseudo_user', 'like', "%{$request->search}%")
                        ->orWhere('city', 'like', "%{$request->search}%")
                        ->orWhere('departement', 'like', "%{$request->search}%")
                        ->orWhere('description', 'like', "%{$request->search}%");
                }
            )->get();

        return response()->json($users);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required',
            // 'password' => 'required',
            'pseudo_user' => 'required|max:50',
            'email' => 'required',
            'tel'=>'nullable',
            'description'=>'nullable',
            'instagram'=>'nullable',
            
            'city'=>'nullable',
            'departement'=>'nullable',
            'coordonnes'=>'nullable',
            'tattooshop'=>'nullable',
            'tattooshop_id'=>'nullable',
        ]);

        //validate du changement de l'update de l'image
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

        

        $user->update([
            'pseudo_user' => $request['pseudo_user'],
            'email' => $request['email'],
            'email_contact' => $request['email_contact'],
            'tel' => $request['tel'],
            'description' => $request['description'],
            'instagram' => $request['instagram'],
            'img_profil' => $request['img_profil'],
            'city' => $request['city'],
            'departement' => $request['departement'],
            'coordonnes' => $request['coordonnes'],
            'tattooshop' => $request['tattooshop'],
            'tattooshop_id' => $request['tattooshop_id'],
            'img_profil' => $filename 
        ]);

        $artstyles = $request->artstyle_id;
        $user->artstyles()->sync($artstyles);


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
