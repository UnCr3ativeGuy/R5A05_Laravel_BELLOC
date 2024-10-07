<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Module</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('layouts.menu')
    <h1>Ajouter un Module</h1>

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

    <form action="{{ route('modules.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Code :</label>
            <input type="text" id="code" name="code" class="form-control" value="{{ old('code') }}" required>
        </div>

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>

        <div class="form-group">
            <label for="coefficient">Coefficient :</label>
            <input type="number" step="0.01" id="coefficient" name="coefficient" class="form-control" value="{{ old('coefficient') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter le module</button>
    </form>
</div>
</body>
</html>
