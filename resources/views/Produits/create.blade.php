<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
</head>
<body>
    <h1>Ajouter un Produit</h1>

    <form action="{{ route('produits.store') }}" method="POST">
        @csrf
        <label for="Reference">Référence:</label>
        <input type="number" name="Reference" id="Reference" required>

        <label for="Libelle">Libellé:</label>
        <input type="text" name="Libelle" id="Libelle" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>

        <label for="Prix">Prix:</label>
        <input type="number" step="0.01" name="Prix" id="Prix" required>

        <label for="quantite">Quantité:</label>
        <input type="number" name="quantite" id="quantite" required>

        <label for="Quantite_Alerte">Quantité Alerte:</label>
        <input type="number" name="Quantite_Alerte" id="Quantite_Alerte" required>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
