<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Stock Control</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">SUPERETTE NABOU</div>
            <ul>
                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('produits.index') }}">Produit</a></li>
                <li><a href="{{ route('clients.index') }}">Client</a></li>
                <li><a href="#">Fournisseur</a></li>
                <li><a href="#">Catégories</a></li>
                <li><a href="#">Utilisateurs</a></li>
                <li><a href="#">Réceptions</a></li>
                <li><a href="#">Expédition</a></li>
                <li><a href="#">Rapports</a></li>
            </ul>
            <div class="user">
                <span>Stock Control</span>
                <img src="avatar.png" alt="user avatar">
            </div>
        </nav>
    </header>
    
    <main>
        <div class="dashboard">
            <div class="card">
                <h3>6</h3>
                <p>Nombre des produits Sortie</p>
            </div>
            <div class="card">
                <h3>93</h3>
                <p>Produits en Stock</p>
            </div>
            <div class="card">
                <h3>4</h3>
                <p>Nombre des Clients</p>
            </div>
        </div>

        <section class="charts">
            <h3>Vente par Jour</h3>
            <div class="chart">
                <img src="chart-example.png" alt="Graphique de ventes">
            </div>
            <h3>Rapport en Graphe</h3>
            <div class="chart">
                <img src="report-graph.png" alt="Rapport en graphe">
            </div>
        </section>

        <section class="stock-status">
            <h3>État de Stock</h3>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Code Produit</th>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="imprimante.png" alt="Imprimante"></td>
                        <td>ABC123</td>
                        <td>Imprimante TM-T88V</td>
                    </tr>
                    <tr>
                        <td><img src="barcode-scanner.png" alt="Scanner de code-barres"></td>
                        <td>XYZ789</td>
                        <td>Scanner de Codes-Barres</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
