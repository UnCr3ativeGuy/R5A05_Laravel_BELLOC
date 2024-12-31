<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Note</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Détails de la Note</h1>

    <div class="alert alert-info">
        <strong>Évaluation :</strong> {{ $evaluation->titre }} <br>
        <strong>Élève :</strong> {{ $eleve->name }} {{ $eleve->prénom }} <br>
        <strong>Note :</strong> {{ $evaluationEleve->note }} <br>
        <strong>Date de l'Évaluation :</strong> {{ $evaluationEleve->created_at->format('d/m/Y') }} <br>
    </div>

    <a href="{{ route('evaluationEleve.index') }}" class="btn btn-secondary">Retour à la Liste</a>
</div>
</body>
</html>
