<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir l'inventaire</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <script defer src="/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar {
            width: 250px; /* Largeur de la sidebar */
            float: left; /* Alignement à gauche */
        }

        .container {
            margin-left: 300px; /* Ajustez cette valeur en fonction de la largeur de votre sidebar */
            background-color: #f8f9fa; /* Couleur de fond claire */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombre portée */
            padding: 20px; /* Rembourrage intérieur */
            margin-top: 20px; /* Espace en haut */
        }

        h1 {
            color: #343a40; /* Couleur du texte */
            font-weight: bold; /* Gras */
        }

        .btn {
            margin-right: 10px; /* Espace entre les boutons */
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo" style="display: flex; align-items: center;">
            <img src="{{ asset('images/logo.png') }}" alt="logo" width="30%" style="margin-right: 10px;">
            <h2 style="margin: 0;">SA MA SHOP</h2>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Tableau de bord</a></li>
                <li><a href="{{ route('produits.index') }}" class="{{ request()->routeIs('produits.index') ? 'active' : '' }}">Produits</a></li>
                <li><a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">Catégories</a></li>
                <li><a href="{{ route('clients.index') }}" class="{{ request()->routeIs('clients.index') ? 'active' : '' }}">Clients</a></li>
                <li><a href="{{ route('fournisseurs.index') }}" class="{{ request()->routeIs('fournisseurs.index') ? 'active' : '' }}">Fournisseurs</a></li>
                <li><a href="{{ route('achats.index') }}" class="{{ request()->routeIs('achats.index') ? 'active' : '' }}">Achats</a></li>
                <li><a href="{{ route('ventes.index') }}" class="{{ request()->routeIs('ventes.index') ? 'active' : '' }}">Ventes</a></li>
                <li><a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.index') ? 'active' : '' }}">Utilisateurs</a></li>
                <li><a href="{{ route('inventaires.index') }}" class="{{ request()->routeIs('inventaires.index') ? 'active' : '' }}">Inventaire</a></li>
                <li><a href="{{ route('parametres.index') }}" class="{{ request()->routeIs('parametres.index') ? 'active' : '' }}">Paramètres</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <h1>Choisir l'inventaire</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>Ventes</h2>
                <a href="{{ route('inventaires.ventes', 'jour') }}" class="btn btn-primary">Inventaire du jour</a>
                <a href="{{ route('inventaires.ventes', 'mois') }}" class="btn btn-primary">Inventaire du mois</a>
                <a href="{{ route('inventaires.ventes', 'annee') }}" class="btn btn-primary">Inventaire de l'année</a>
            </div>
            <div class="col-md-6">
                
                <h2>Achats</h2>
                <a href="{{ route('inventaires.achats', 'jour') }}" class="btn btn-primary">Inventaire du jour</a>
                <a href="{{ route('inventaires.achats', 'mois') }}" class="btn btn-primary">Inventaire du mois</a>
                <a href="{{ route('inventaires.achats', 'annee') }}" class="btn btn-primary">Inventaire de l'année</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
