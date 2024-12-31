<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Élève</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assurez-vous que le CSS est bien intégré -->
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Ajouter un Élève</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Affichage des erreurs de validation -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eleves.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="prénom">Prénom :</label>
            <input type="text" id="prénom" name="prénom" class="form-control" value="{{ old('prénom') }}" required>
        </div>

        <div class="form-group">
            <label for="date_naissance">Date de naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}" required>
        </div>

        <div class="form-group">
            <label for="numéro_étudiant">Numéro étudiant :</label>
            <input type="text" id="numéro_étudiant" name="numéro_étudiant" class="form-control" value="{{ old('numéro_étudiant') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image (optionnel) :</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter l'élève</button>
    </form>
</div>
</body>
</html>
