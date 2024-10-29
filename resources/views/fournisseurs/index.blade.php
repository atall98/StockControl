<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des fournisseurs</title>
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
    
    <div class="main-content"> <!-- Div pour le contenu principal -->
        <div class="container">
            <h1>Liste des fournisseurs</h1>
            <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary">Ajouter un fournisseur</a>

            <!-- Message de succès -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Matricule</th>
                        <th>Société</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fournisseurs as $fournisseur)
                        <tr>
                            <td>{{ $fournisseur->nom_fournisseurs }}</td>
                            <td>{{ $fournisseur->matricule_fournisseurs }}</td>
                            <td>{{ $fournisseur->societe }}</td>
                            <td>{{ $fournisseur->telephone }}</td>
                            <td>{{ $fournisseur->email }}</td>
                            <td>{{ $fournisseur->adresse }}</td>
                            <td>
                                <a href="{{ route('fournisseurs.show', $fournisseur->id) }}" class="btn btn-info btn-sm">Voir</a>
                                <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-warning btn-sm">Éditer</a>
                                <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
