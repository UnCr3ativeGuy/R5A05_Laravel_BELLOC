<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Élève</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Modifier Élève</h1>

    <form action="{{ route('eleves.update', $eleve->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $eleve->name }}" required>
        </div>

        <div class="form-group">
            <label for="prénom">Prénom</label>
            <input type="text" name="prénom" id="prénom" class="form-control" value="{{ $eleve->prénom }}" required>
        </div>

        <div class="form-group">
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" name="date_naissance" id="date_naissance" class="form-control" value="{{ $eleve->date_naissance }}" required>
        </div>

        <div class="form-group">
            <label for="numéro_étudiant">Numéro Étudiant</label>
            <input type="text" name="numéro_étudiant" id="numéro_étudiant" class="form-control" value="{{ $eleve->numéro_étudiant }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $eleve->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('eleves.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html>
