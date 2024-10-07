<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Module</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Détails du Module</h1>

    <div class="card">
        <div class="card-body">
            <h2>{{ $module->code }} - {{ $module->nom }}</h2>
            <p><strong>Code:</strong> {{ $module->code }}</p>
            <p><strong>Nom:</strong> {{ $module->nom }}</p>
            <p><strong>Coefficient:</strong> {{ $module->coefficient }}</p>
        </div>
    </div>

    <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
</body>
</html>
