<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Note</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Modifier la Note</h1>

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

    <form action="{{ route('evaluationEleve.update', $evaluationEleve->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="evaluation_id">Évaluation :</label>
            <select id="evaluation_id" name="evaluation_id" class="form-control" required>
                <option value="">Sélectionnez une évaluation</option>
                @foreach($evaluations as $evaluation)
                    <option value="{{ $evaluation->id }}" {{ $evaluation->id == $evaluationEleve->evaluation_id ? 'selected' : '' }}>{{ $evaluation->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="eleve_id">Élève :</label>
            <select id="eleve_id" name="eleve_id" class="form-control" required>
                <option value="">Sélectionnez un élève</option>
                @foreach($eleves as $eleve)
                    <option value="{{ $eleve->id }}" {{ $eleve->id == $evaluationEleve->eleve_id ? 'selected' : '' }}>{{ $eleve->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="note">Note :</label>
            <input type="number" id="note" name="note" class="form-control" value="{{ old('note', $evaluationEleve->note) }}" min="0" max="20" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour la Note</button>
    </form>
</div>
</body>
</html>
