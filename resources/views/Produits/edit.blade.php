<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer un Produit</title>
</head>
<body>
    <h1>Éditer le Produit</h1>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="Reference">Référence:</label>
        <input type="number" name="Reference" id="Reference" value="{{ $produit->Reference }}" required>

        <label for="Libelle">Libellé:</label>
        <input type="text" name="Libelle" id="Libelle" value="{{ $produit->Libelle }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $produit->description }}</textarea>

        <label for="Prix">Prix:</label>
        <input type="number" step="0.01" name="Prix" id="Prix" value="{{ $produit->Prix }}" required>

        <label for="quantite">Quantité:</label>
        <input type="number" name="quantite" id="quantite" value="{{ $produit->quantite }}" required>

        <label for="Quantite_Alerte">Quantité Alerte:</label>
        <input type="number" name="Quantite_Alerte" id="Quantite_Alerte" value="{{ $produit->Quantite_Alerte }}" required>

        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
