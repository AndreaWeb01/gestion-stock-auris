<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <h1>Modifier un produit</h1>

    <form method="POST" action="{{ route('produits.update', $produit->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nom du produit:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $produit->nom) }}" required>
        </div>

        <div>
            <label for="prix">Prix:</label>
            <input type="number" id="prix" name="prix" value="{{ old('prix', $produit->prix) }}" required>
        </div>
        <div>
            <label for="seuil_alerte">Seuil d'alerte:</label>
            <input type="number" id="seuil_alerte" name="seuil_alerte" value="{{ old('seuil_alerte', $produit->seuil_alerte) }}" required>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>

    <a href="{{ route('produits.index') }}">Retour à la liste des produits</a>


</body>
</html>
