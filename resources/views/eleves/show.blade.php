<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'Étudiant</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Profil de l'Étudiant</h1>

    <div class="card">
        <div class="card-body">
            <h2>{{ $eleve->name }} {{ $eleve->prénom }}</h2>
            <p><strong>Date de Naissance:</strong> {{ \Carbon\Carbon::parse($eleve->date_naissance)->format('d/m/Y') }}</p>
            <p><strong>Numéro Étudiant:</strong> {{ $eleve->numéro_étudiant }}</p>
            <p><strong>Email:</strong> {{ $eleve->email }}</p>
            <img src="{{ asset('images/' . $eleve->image) }}" alt="Image de l'élève" class="profile-image">
        </div>
    </div>

    <a href="{{ route('eleves.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
</body>
</html>
