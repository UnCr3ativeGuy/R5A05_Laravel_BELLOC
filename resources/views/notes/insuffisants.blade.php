<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Élèves n'ayant pas eu la moyenne</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assurez-vous que ce chemin est correct -->
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Élèves n'ayant pas eu la moyenne</h1>

    @if($notes->isEmpty())
        <p>Tous les élèves ont eu la moyenne.</p>
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
