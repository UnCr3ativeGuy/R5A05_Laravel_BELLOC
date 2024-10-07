<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Module</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Modifier Module</h1>

    <form action="{{ route('modules.update', $module->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="code">Code :</label>
            <input type="text" id="code" name="code" class="form-control" value="{{ $module->code }}" required>
        </div>

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ $module->nom }}" required>
        </div>

        <div class="form-group">
            <label for="coefficient">Coefficient :</label>
            <input type="number" step="0.01" id="coefficient" name="coefficient" class="form-control" value="{{ $module->coefficient }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('modules.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html>
