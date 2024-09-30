<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use Illuminate\Http\Request;

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
