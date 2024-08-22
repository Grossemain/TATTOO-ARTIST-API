<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ArtStyle;
use Illuminate\Http\Request;

class ArtStyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les Styles
        $artStyles = ArtStyle::all();
        // On retourne les informations des styles en JSON
        return response()->json($artStyles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'img_style' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $filename = "";
        if ($request->hasFile('img_style')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('img_style')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('img_style')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin/storage/app
            $request->file('img_style')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        $artStyle = ArtStyle::create(array_merge($request->all(), ['img_style' => $filename]));


        return response()->json([
            'status' => 'Success',
            'data' => $artStyle,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ArtStyle $artStyle)
    {
        return response()->json($artStyle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArtStyle $artStyle)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'img_style' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $artStyle->update($request->all());
        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArtStyle $artStyle)
    {
        $artStyle->delete();
        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
