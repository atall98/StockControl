<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer un Produit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: rgb(8, 41, 255);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: white;
        }

        input[type="number"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        textarea {
            height: 100px;
        }
    </style>
</head>
<body>
   
    <h1>Modifier le Produit</h1>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="reference">Référence:</label>
        <input type="number" name="reference" id="reference" value="{{ $produit->reference }}" required>

        <label for="libelle">Libellé:</label>
        <input type="text" name="libelle" id="libelle" value="{{ $produit->libelle }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $produit->description }}</textarea>

        <label for="prix_achat">Prix d'achat:</label>
        <input type="number" step="0.01" name="prix_achat" id="prix_achat" value="{{ $produit->prix_achat }}" required>

        <label for="prix_vente">Prix de vente:</label>
        <input type="number" step="0.01" name="prix_vente" id="prix_vente" value="{{ $produit->prix_vente }}" required>

        <label for="quantite">Quantité:</label>
        <input type="number" name="quantite" id="quantite" value="{{ $produit->quantite }}" required>

        <label for="quantite_alerte">Quantité Alerte:</label>
        <input type="number" name="quantite_alerte" id="quantite_alerte" value="{{ $produit->quantite_alerte }}" required>

        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
