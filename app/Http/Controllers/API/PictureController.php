<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //on va récupérer les données de users pour les afficher en objet json avec les données de picture
        $pictures = Picture::with(['user'])->get();

        return response()->json($pictures);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture_name'=> 'required|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'alt' => 'required|max:100',

        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('image')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin/storage/app
            $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }
//en faisant Auth::user() on récupère les information de l'utilisateur connécté

        $picture = Picture::create(array_merge($request->all(), ['image' => $filename,'user_id'=>Auth::user()->user_id]));
        // $artStyle = $request->artStyle;
        // for ($i = 0; $i < count($artStyle); $i++) {
        //     $picture->artstyles()->attach($artStyle[$i]);
        // }

        return response()->json([
            'status' => 'Success',
            'data' => $picture,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        //on va telecharger les données de users pour les afficher en objet json avec les données de picture
        $picture->load('user');
        return response()->json($picture);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Picture $picture)
    {

        $request->validate([
            'picture_name'=> 'required|max:50',
            'alt' => 'required|max:100',
            'user_id' => 'nullable|max:50'
        ]);

        //validate du changement de l'update de l'image
        $filename = "";
        if ($request->hasFile('image')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('image')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin/storage/app
            $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = $picture->image;
        }

    $picture->update(array_merge($request->all(), ['image' => $filename]));

        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture)
    {
        $picture->delete();
        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
