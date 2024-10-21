<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
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

        .container {
            background-color: rgb(8, 41, 255);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        p {
            margin: 10px 0;
            line-height: 1.6;
            color: white;
        }

        strong {
            color: #333;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Détails du Produit</h1>

    <div class="container">
        <p><strong>Référence:</strong> {{ $produit->reference }}</p>
        <p><strong>Libellé:</strong> {{ $produit->libelle }}</p>
        <p><strong>Description:</strong> {{ $produit->description }}</p>
        <p><strong>Prix d'achat:</strong> {{ $produit->prix_achat }} €</p>
        <p><strong>Prix de vente:</strong> {{ $produit->prix_vente }} €</p>
        <p><strong>Quantité:</strong> {{ $produit->quantite }}</p>
        <p><strong>Quantité d'alerte:</strong> {{ $produit->quantite_alerte }}</p>
        
        <a href="{{ route('produits.index') }}" class="back-button">Retour à la liste des produits</a>
    </div>
</body>
</html>
