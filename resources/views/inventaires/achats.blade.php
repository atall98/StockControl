<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaire des Achats</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table {
            background-color: white;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .card {
            margin-top: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1>Inventaire des Achats ({{ ucfirst($periode) }})</h1>
                <!-- Formulaire pour sélectionner la période -->
                <form method="GET" action="{{ route('inventaires.index') }}" class="form-inline mt-2">
                    <div class="form-group">
                        <label for="periode" class="mr-2">Filtrer par :</label>
                        <select name="periode" id="periode" class="form-control mr-2">
                            <option value="jour" {{ $periode === 'jour' ? 'selected' : '' }}>Jour</option>
                            <option value="mois" {{ $periode === 'mois' ? 'selected' : '' }}>Mois</option>
                            <option value="annee" {{ $periode === 'annee' ? 'selected' : '' }}>Année</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-light">Filtrer</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Date</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($achats as $achat)
                            @foreach($achat->produits as $produit)
                            <tr>
                                <td>{{ $produit->libelle }}</td>
                                <td>{{ $produit->pivot->quantite }}</td>
                                <td>{{ $produit->pivot->prix_total }}</td>
                                <td>{{ $achat->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('inventaires.index') }}" class="btn btn-secondary mt-3">Retour aux Inventaires</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
