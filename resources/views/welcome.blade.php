<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Simplifiée des Stocks</title>
    <style>
        /* Styles globaux */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #e3f2fd);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Conteneur principal */
        .container {
            max-width: 900px;
            width: 100%;
            background: #ffffff;
            color: #4a4a4a;
            border-radius: 15px;
            padding: 2em;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            overflow: hidden;
        }

        /* Header */
        header {
            text-align: center;
            margin-bottom: 1.5em;
        }
        header svg {
            width: 80px;
            height: auto;
            fill: #4db6ac;
            margin-bottom: 0.5em;
            animation: bounce 1.5s infinite;
        }
        header h1 {
            font-size: 2.2em;
            font-weight: bold;
            color: #00796b;
            margin-bottom: 0.5em;
        }

        /* Animation du logo */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        /* Navigation */
        nav {
            display: flex;
            justify-content: center;
            gap: 1em;
            margin-top: 1em;
        }
        nav a {
            color: #00796b;
            text-decoration: none;
            padding: 0.5em 1em;
            border: 2px solid #00796b;
            border-radius: 50px;
            transition: background 0.3s, color 0.3s;
            font-weight: bold;
        }
        nav a:hover {
            background: #00796b;
            color: #fff;
        }

        /* Section de bienvenue */
        .welcome-section {
            margin: 2em 0;
            font-size: 1.2em;
        }
        .welcome-section p {
            color: #616161;
            margin: 0.5em 0;
        }
        .button {
            background: #4db6ac;
            color: #fff;
            padding: 0.75em 1.5em;
            border: none;
            border-radius: 50px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s;
            text-decoration: none;
        }
        .button:hover {
            background: #00796b;
        }

        /* Section des fonctionnalités */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5em;
            margin-top: 2em;
        }
        .feature-item {
            background: #e0f2f1;
            color: #00796b;
            padding: 1.5em;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s;
            text-align: center;
        }
        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .feature-item h3 {
            font-size: 1.3em;
            color: #004d40;
            margin-bottom: 0.5em;
        }

        /* Pied de page */
        footer {
            margin-top: 2em;
            color: rgba(0, 77, 64, 0.8);
            font-size: 0.875em;
        }
        footer a {
            color: #4db6ac;
            text-decoration: none;
            margin: 0 0.5em;
            transition: color 0.3s;
        }
        footer a:hover {
            color: #00796b;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header avec le logo et le titre -->
        <header>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 62 65"><!-- SVG ici --></svg>
            <h1>Gestion Simplifiée des Stocks</h1>
        </header>

        <!-- Navigation -->
        <nav>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif --}}
                @endauth
            @endif
        </nav>

        <!-- Section de bienvenue -->
        <section class="welcome-section">
            <h2>Découvrez une gestion de stock intuitive</h2>
            <p>Améliorez votre organisation et gardez le contrôle sur vos stocks à chaque instant.</p><br>
            <a href="#services" class="button">Explorez Nos Outils</a>
        </section>

        <!-- Section des fonctionnalités -->
        <section id="services" class="features">
            <div class="feature-item">
                <h3>Suivi Actif en Direct</h3>
                <p>Visualisez vos stocks en temps réel pour anticiper et éviter les ruptures.</p>
            </div>
            <div class="feature-item">
                <h3>Notifications de Réapprovisionnement</h3>
                <p>Recevez des alertes automatiques lorsque vos niveaux de stock sont bas.</p>
            </div>
            <div class="feature-item">
                <h3>Analyses et Rapports Clairs</h3>
                <p>Générez des rapports précis pour une meilleure prise de décision.</p>
            </div>
        </section>

        <!-- Pied de page -->
        <footer>
            <p>© 2024 Gestion Simplifiée des Stocks. Tous droits réservés.</p>
            <div>
                <a href="#">Contact</a>
                <span>|</span>
                <a href="#">Politique de Confidentialité</a>
            </div>
        </footer>
    </div>
</body>
</html>
