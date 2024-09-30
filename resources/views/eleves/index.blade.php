<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Élèves</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Liste des Élèves</h1>

    @if($eleves->isEmpty())
        <p>Aucun élève trouvé.</p>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Numéro Étudiant</th>
                <th>Email</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($eleves as $eleve)
                <tr>
                    <td>{{ $eleve->id }}</td>
                    <td>{{ $eleve->name }}</td>
                    <td>{{ $eleve->prénom }}</td>
                    <td>{{ $eleve->date_naissance }}</td>
                    <td>{{ $eleve->numéro_étudiant }}</td>
                    <td>{{ $eleve->email }}</td>
                    <td>
                        @if($eleve->image)
                            <img src="{{ asset('storage/' . $eleve->image) }}" alt="Image de {{ $eleve->name }}" style="width: 50px; height: auto;">
                        @else
                            Pas d'image
                        @endif
                    </td>
                    <td>
                        <!-- Lien vers le formulaire de modification -->
                        <a href="{{ route('eleves.edit', $eleve->id) }}" class="btn btn-warning">Modifier</a>

                        <!-- Formulaire de suppression -->
                        <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE') <!-- Indique que la méthode est DELETE -->
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $eleves->links() }}
    @endif
</div>
</body>
</html>
