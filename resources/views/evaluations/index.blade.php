<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Évaluations</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Liste des Évaluations</h1>

    @if($evaluations->isEmpty())
        <p>Aucune évaluation trouvée.</p>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Date</th>
                <th>Coefficient</th>
                <th>Module</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->id }}</td>
                    <td>{{ $evaluation->titre }}</td>
                    <td>{{ $evaluation->date }}</td>
                    <td>{{ $evaluation->coefficient }}</td>
                    <td>{{ $evaluation->module->nom }}</td> <!-- Assurez-vous que vous avez une relation dans le modèle -->
                    <td>
                        <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-warning">Modifier</a>

                        <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $evaluations->links() }}
    @endif

    <a href="{{ route('evaluations.create') }}" class="btn btn-primary">Ajouter une Évaluation</a>
</div>
</body>
</html>
