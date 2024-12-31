<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes de l'élève</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Notes de {{ $eleve->name }}</h1>

    @if($notes->isEmpty())
        <p>Aucune note disponible.</p>
    @else
        <table class="table">
            <thead>
            <tr>
                <th>Évaluation</th>
                <th>Note</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{ $note->evaluation->titre }}</td>
                    <td>{{ $note->note }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h2>Moyenne : {{ number_format($moyenne, 2) }}</h2>
    @endif
</div>
</body>
</html>
