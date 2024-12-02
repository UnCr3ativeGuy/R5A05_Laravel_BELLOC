<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Note</title>
</head>
<body>
<h1>Bonjour {{ $note->eleve->name }},</h1>
<p>Une nouvelle note a été saisie pour votre évaluation.</p>

<p><strong>Note :</strong> {{ $note->note }}</p>
<p><strong>Date :</strong> {{ $note->created_at->format('d/m/Y') }}</p>
<p><strong>Évaluation :</strong> {{ $note->evaluation->titre }}</p>

<p>Cordialement,<br>Votre établissement</p>
</body>
</html>
