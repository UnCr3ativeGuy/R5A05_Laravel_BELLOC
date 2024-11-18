<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        // Validation de l'image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation du fichier image
        ]);

        // Récupérer l'image téléchargée
        $imagePath = $request->file('image')->store('images', 'public'); // 'images' est le dossier de stockage

        // Retourner une vue avec l'image téléchargée (ou redirection avec message)
        return view('image-show', ['imagePath' => $imagePath]);
    }
}
