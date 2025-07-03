<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Liste des Produits</title>
</head>
<body>
    <h1>Liste des Produits</h1>

    <a href="{{ route('produits.create') }}">Ajouter un nouveau produit</a>

    @if ($produits->isEmpty())
        <p>Aucun produit trouvé.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Seuil d'alerte</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td>{{ $produit->id }}</td>
                        <td>{{ $produit->nom }}</td>
                        <td>{{ $produit->prix }}</td>
                        <td>{{ $produit->quantite }}</td>
                        <td>{{ $produit->seuil_alerte }}</td>
                        <td>
                            <a href="{{ route('produits.edit', $produit->id) }}">Modifier</a>
                            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $produits->links() }} <!-- Pagination links -->
    @endif

</body>
</html>
