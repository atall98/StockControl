<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ventes</title>

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
                <li><a href="{{ route('parametres.index') }}"
                        class="{{ request()->routeIs('parametres.index') ? 'active' : '' }}">Paramètres</a></li>
            </ul>
        </nav>
    </div>
    
    <div class="main-content"> <!-- Ajout de la classe main-content ici -->
        <div class="container">
            <h1 class="mb-4 text-center" style="font-size: 2rem;">Liste des ventes</h1>
        
            <!-- Bouton pour ajouter une nouvelle vente -->
            <a href="{{ route('ventes.create') }}" class="btn btn-primary mb-4 btn-sm">Ajouter une nouvelle vente</a>
        
            <div class="row">
                @foreach($ventes as $vente)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <h5 class="card-title h6">vente #{{ $vente->id }} - client: {{ $vente->client ? $vente->client->nom_clients : 'Pas de client' }}</h5>
                                <ul class="list-unstyled mb-2">
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach($vente->produits as $produit)
                                        <li>{{ $produit->libelle }} - Quantité: {{ $produit->pivot->quantite }} - Prix: {{ number_format($produit->prix_vente, 2) }}</li>
                                        @php
                                            $total += $produit->pivot->quantite * $produit->prix_vente;
                                        @endphp
                                    @endforeach
                                </ul>
                                <p class="mb-0"><strong>Total de l'vente:</strong> {{ number_format($total, 2) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
</body>

</html>
