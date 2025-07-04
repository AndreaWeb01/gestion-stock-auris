<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <h1>Créer un nouveau client</h1>
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
            @error('nom')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" required>
            @error('prenom')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}" required>
            @error('telephone')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" value="{{ old('adresse') }}" required>
            @error('adresse')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Créer Client</button>
    </form>

</body>
</html>


