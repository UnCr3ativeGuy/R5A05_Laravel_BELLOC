<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Évaluation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Modifier une Évaluation</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="module_id">Module :</label>
            <select id="module_id" name="module_id" class="form-control" required>
                <option value="">Sélectionnez un module</option>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}" {{ $evaluation->module_id == $module->id ? 'selected' : '' }}>
                        {{ $module->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre', $evaluation->titre) }}" required>
        </div>

        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ old('date', $evaluation->date) }}" required>
        </div>

        <div class="form-group">
            <label for="coefficient">Coefficient :</label>
            <input type="number" step="0.01" id="coefficient" name="coefficient" class="form-control" value="{{ old('coefficient', $evaluation->coefficient) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour l'évaluation</button>
    </form>
</div>
</body>
</html>
