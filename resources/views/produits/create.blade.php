<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <h1>ajouter un produit</h1>

    <form method="POST" action="{{ route('produits.store') }}">
        @csrf

        <div>
            <label for="nom">Nom du produit:</label>
            <input type="text" id="nom" name="nom" >
        </div>

        <div>
            <label for="prix">Prix:</label>
            <input type="number" id="prix" name="prix" >
        </div>
        <div>
            <label for="seuil_alerte">Seuil d'alerte:</label>
            <input type="number" id="seuil_alerte" name="seuil_alerte">
        </div>

        <button type="submit">Ajouter</button>
    </form>

    <a href="{{ route('produits.index') }}">Retour à la liste des produits</a>

</body>
</html>
