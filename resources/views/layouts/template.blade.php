<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script defer src="/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .low-stock {
            color: red;
            font-weight: bold;
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

    <div class="main-content">
        <header>
            <h1 class="mb-4" style="text-align: center; font-size: 3rem; margin-bottom: 1rem;">Accueil</h1>

            <div class="profile">
                <img src="{{ asset('images/th.jpeg') }}" alt="Profile Utilisateur">

                <div class="profile-menu" id="profileMenu">
                    <ul>
                        <li><a href="{{ route('profile.index') }}">Voir Profile</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit">Déconnexion</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="dashboard">
            <div class="cards">
                <div class="card">{{ $produitsCount }} Articles</div>
                <div class="card">{{ $usersCount }} Utilisateurs</div>
                <div class="card">{{ $categoriesCount }} Catégories</div>
                <div class="card">{{ $fournisseursCount }} Fournisseurs</div>
                <div class="card">{{ $achatsCount }} Achats</div>
                <div class="card">{{ $clientsCount }} Clients</div>
                <div class="card">{{ $ventesCount }} Ventes</div>
            </div>

            <div class="notification">
                <h3>Notifications</h3>
                <div class="stock-alert">
                    <p>Articles bientôt en rupture de stock <span>{{ $produitsEnRupture->count() }}</span></p>

                    @if ($produitsEnRupture->count() > 0)
                        <table>
                            <thead>
                                <tr>
                                    <th>Désignation</th>
                                    <th>Quantité</th>
                                    <th>Quantité d'Alerte</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produitsEnRupture as $produit)
                                    <tr class="{{ $produit->quantite <= 1 ? 'low-stock' : '' }}">
                                        <td>{{ $produit->libelle }}</td>
                                        <td>{{ $produit->quantite }}</td>
                                        <td>{{ $produit->quantite_alerte }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Aucun article en rupture de stock pour le moment.</p>
                    @endif
                </div>
            </div>

            <div class="dashboard-bottom">
                <div class="stock-value">
                    <h3>Valeur de Stock</h3>
                    <canvas id="stockChart"></canvas>
                </div>

                <div class="report">
                    <h3>Rapport des Achats et Ventes</h3>
                    <canvas id="reportChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour le graphique -->
    <script>
        const stockCtx = document.getElementById('stockChart').getContext('2d');
        const stockChart = new Chart(stockCtx, {
            type: 'pie',
            data: {
                labels: ['Coût', 'Prix', 'Bénéfice estimé'],
                datasets: [{
                    data: [{{ $totalStockCost }}, {{ $totalStockValue }}, {{ $estimatedProfit }}],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            }
        });

        const reportCtx = document.getElementById('reportChart').getContext('2d');
        const reportChart = new Chart(reportCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!}, // Assurez-vous que $labels est passé
                datasets: [{
                    label: 'Achats',
                    data: {!! json_encode($achats_values) !!},
                    backgroundColor: '#3498db',
                }, {
                    label: 'Ventes',
                    data: {!! json_encode($ventes_values) !!},
                    backgroundColor: '#e74c3c',
                }]
            }
        });
    </script>




</body>

</html>
