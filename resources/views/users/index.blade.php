<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <script defer src="/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="logo" style="display: flex; align-items: center;">
            <img src="{{ asset('images/logo.png') }}" alt="logo" width="30%" style="margin-right: 10px;">
            <h2 style="margin: 0;">SA MA SHOP</h2>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Tableau de bord</a></li>
                <li><a href="{{ route('produits.index') }}"
                        class="{{ request()->routeIs('produits.index') ? 'active' : '' }}">Produits</a></li>
                <li><a href="{{ route('categories.index') }}"
                        class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">Catégories</a></li>
                <li><a href="{{ route('clients.index') }}"
                        class="{{ request()->routeIs('clients.index') ? 'active' : '' }}">Clients</a></li>
                <li><a href="{{ route('fournisseurs.index') }}"
                        class="{{ request()->routeIs('fournisseurs.index') ? 'active' : '' }}">Fournisseurs</a></li>
                <li><a href="{{ route('achats.index') }}"
                        class="{{ request()->routeIs('achats.index') ? 'active' : '' }}">Achats</a></li>
                <li><a href="{{ route('ventes.index') }}"
                        class="{{ request()->routeIs('ventes.index') ? 'active' : '' }}">Ventes</a></li>
                <li><a href="{{ route('users.index') }}"
                        class="{{ request()->routeIs('users.index') ? 'active' : '' }}">Utilisateurs</a></li>
                        <li><a href="{{ route('inventaires.index') }}"
                            class="{{ request()->routeIs('inventaires.index') ? 'active' : '' }}">Inventaire</a></li>
                <li><a href="{{ route('parametres.index') }}"
                        class="{{ request()->routeIs('parametres.index') ? 'active' : '' }}">Paramètres</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content"> <!-- Ajout d'une div main-content pour le contenu -->
        <div class="container mt-4">
            <h1 class="mb-4">Liste des Utilisateurs</h1>
            @if (auth()->check() && auth()->user()->is_admin)
                <a href="{{ route('users.create') }}" class="btn btn-primary mb-4">Ajouter un utilisateur</a>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Administrateur</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin ? 'Oui' : 'Non' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional: include Bootstrap JS and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
