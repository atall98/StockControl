<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
</head>
<body>
    <h1>Liste des Produits</h1>
    <a href="{{ route('produits.create') }}">Ajouter un Produit</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Référence</th>
                <th>Libellé</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Quantité Alerte</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->Reference }}</td>
                    <td>{{ $produit->Libelle }}</td>
                    <td>{{ $produit->description }}</td>
                    <td>{{ $produit->Prix }}</td>
                    <td>{{ $produit->quantite }}</td>
                    <td>{{ $produit->Quantite_Alerte }}</td>
                    <td>
                        <a href="{{ route('produits.show', $produit->id) }}">Voir</a>
                        <a href="{{ route('produits.edit', $produit->id) }}">Éditer</a>
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
</body>
</html>
