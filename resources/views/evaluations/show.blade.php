<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Évaluation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Détails de l'Évaluation</h1>

    <p><strong>Titre :</strong> {{ $evaluation->titre }}</p>
    <p><strong>Date :</strong> {{ $evaluation->date }}</p>
    <p><strong>Coefficient :</strong> {{ $evaluation->coefficient }}</p>
    <p><strong>Module :</strong> {{ $evaluation->module->nom }}</p>

    <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
</body>
</html>
