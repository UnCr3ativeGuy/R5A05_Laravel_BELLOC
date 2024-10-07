<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Notes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Liste des Notes</h1>

    @if($evaluationEleves->isEmpty())
        <p>Aucune note trouvée.</p>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Évaluation</th>
                <th>Élève</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($evaluationEleves as $EvaluationEleve)
                <tr>
                    <td>{{ $EvaluationEleve->id }}</td>
                    <td>{{ $EvaluationEleve->evaluation->titre }}</td>
                    <td>{{ $EvaluationEleve->eleve->name }}</td>
                    <td>{{ $EvaluationEleve->note }}</td>
                    <td>
                        <a href="{{ route('evaluationEleve.edit', $EvaluationEleve->id) }}" class="btn btn-warning">Modifier</a>

                        <form action="{{ route('evaluationEleve.destroy', $EvaluationEleve->id) }}" method="POST"
                              style="display:inline;">
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
        {{ $evaluationEleves->links() }}
    @endif

    <a href="{{ route('evaluationEleve.create') }}" class="btn btn-primary">Ajouter une Note</a>
</div>
</body>
</html>
