<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TattooShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TattooShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tattooshops = TattooShop::all();
        return response()->json($tattooshops);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|max:50',
            'adresse' => 'nullable|max:50',
            'city' => 'nullable',
            'departement'=>'nullable',
            'meta_description'=>'nullable',
            'img_tattooshop' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $filename = "";
        if ($request->hasFile('img_tattooshop')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('img_tattooshop')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('img_tattooshop')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin/storage/app
            $request->file('img_tattooshop')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

//en faisant Auth::user() on récupère les information de l'utilisateur connécté
$tattooshop = TattooShop::create(array_merge($request->all(), ['img_tattooshop' => $filename,'user_id'=>Auth::user()->user_id]));


        return response()->json([
            'status' => 'Success',
            'data' => $tattooshop,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TattooShop $tattooShop)
    {
        return response()->json($tattooShop);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TattooShop $tattooShop)
    {
        $request->validate([
            'name' => 'nullable|max:50',
            'adresse' => 'nullable|max:50',
            'city' => 'nullable',
            'departement'=>'nullable',
            'meta_description'=>'nullable',
            'img_tattooshop' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        //validate du changement de l'update de l'image
        $filename = "";
        if ($request->hasFile('img_tattooshop')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('img_tattooshop')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('img_tattooshop')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin/storage/app
            $request->file('img_tattooshop')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        $tattooShop->update(array_merge($request->all(), ['img_tattooshop' => $filename]));

        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TattooShop $tattooShop)
    {
        $tattooShop->delete();
        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
