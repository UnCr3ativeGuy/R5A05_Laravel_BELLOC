<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes d'évaluation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Notes de l'évaluation</h1>

    @if($notes->isEmpty())
        <p>Aucune note disponible.</p>
    @else
        <table class="table">
            <thead>
            <tr>
                <th>Élève</th>
                <th>Note</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{ $note->eleve->name }}</td>
                    <td>{{ $note->note }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
