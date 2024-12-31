<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Modules</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Liste des Modules</h1>

    @if($modules->isEmpty())
        <p>Aucun module trouvé.</p>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Nom</th>
                <th>Coefficient</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($modules as $module)
                <tr>
                    <td>{{ $module->id }}</td>
                    <td>{{ $module->code }}</td>
                    <td>{{ $module->nom }}</td>
                    <td>{{ $module->coefficient }}</td>
                    <td>
                        <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $modules->links() }}
    @endif
</div>
</body>
</html>
