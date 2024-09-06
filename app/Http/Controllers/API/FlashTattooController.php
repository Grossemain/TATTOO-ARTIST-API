<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FlashTattoo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlashTattooController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flashtattoos = FlashTattoo::all();
        return response()->json($flashtattoos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|max:100',
            'h1_title' => 'nullable|max:100',
            'content' => 'nullable',
            'img_flashtattoo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'disponibility'=>'nullable',

        ]);

        $filename = "";
        if ($request->hasFile('img_flashtattoo')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('img_flashtattoo')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('img_flashtattoo')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin/storage/app
            $request->file('img_flashtattoo')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

//en faisant Auth::user() on récupère les information de l'utilisateur connécté
$flashtattoo = FlashTattoo::create(array_merge($request->all(), ['img_flashtattoo' => $filename,'user_id'=>Auth::user()->user_id]));

        return response()->json([
            'status' => 'Success',
            'data' => $flashtattoo,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(FlashTattoo $flashTattoo)
    {
        return response()->json($flashTattoo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FlashTattoo $flashTattoo)
    {
        $request->validate([
            'title' => 'nullable|max:100',
            'h1_title' => 'nullable|max:100',
            'content' => 'nullable',
            'img_flashtattoo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'disponibility'=>'nullable',
            'user_id' => 'nullable|max:50'
        ]);

        //validate du changement de l'update de l'image
        $filename = "";
        if ($request->hasFile('img_flashtattoo')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('img_flashtattoo')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('img_flashtattoo')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin/storage/app
            $request->file('img_flashtattoo')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        $flashTattoo->update(array_merge($request->all(), ['img_flashtattoo' => $filename]));

        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlashTattoo $flashTattoo)
    {
        $flashTattoo->delete();
        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
