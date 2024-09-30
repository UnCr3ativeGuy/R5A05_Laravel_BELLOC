<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EleveController extends Controller
{
    // Afficher le formulaire d'ajout
    public function create()
    {
        return view('eleves.create');
    }

    // Enregistrer un nouvel élève dans la base de données
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'prénom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numéro_étudiant' => 'required|string|unique:eleves,numéro_étudiant',
            'email' => 'required|email|unique:eleves,email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Ajoutez les messages d'erreur
                ->withInput(); // Renvoyez les anciennes entrées
        }

        // Enregistrer l'élève
        Eleve::create([
            'name' => $request->name,
            'prénom' => $request->prénom,
            'date_naissance' => $request->date_naissance,
            'numéro_étudiant' => $request->numéro_étudiant,
            'email' => $request->email,
            'image' => $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null
        ]);

        return redirect()->route('eleves.create')->with('success', 'Élève ajouté avec succès!');
    }
}
