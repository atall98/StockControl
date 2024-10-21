<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-[#87CEFA] text-black">
    <div class="bg-white text-black">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-7xl px-6">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Ton SVG ici -->
                        </svg>
                    </div>
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>
                
                <!-- Section d'accueil -->
                <section class="text-center py-20">
                    <h1 class="text-4xl font-bold text-[#FF2D20]">Bienvenue dans notre système de gestion de stock !</h1>
                    <p class="mt-4 text-lg text-black/70">Optimisez votre gestion de stock avec nos solutions efficaces.</p>
                    <a href="#services" class="mt-8 inline-block px-6 py-3 text-white bg-[#FF2D20] rounded-md hover:bg-[#FF2D20]/80">Découvrez nos fonctionnalités</a>
                </section>

                <!-- Section des fonctionnalités -->
                <section id="services" class="py-20">
                    <h2 class="text-3xl font-semibold text-center">Fonctionnalités Principales</h2>
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                            <h3 class="text-xl font-bold">Suivi en Temps Réel</h3>
                            <p class="mt-2">Surveillez vos niveaux de stock en temps réel pour éviter les ruptures.</p>
                        </div>
                        <div class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                            <h3 class="text-xl font-bold">Alertes de Stock</h3>
                            <p class="mt-2">Recevez des alertes lorsque le stock atteint un seuil critique.</p>
                        </div>
                        <div class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                            <h3 class="text-xl font-bold">Rapports Personnalisables</h3>
                            <p class="mt-2">Générez des rapports détaillés pour une meilleure prise de décision.</p>
                        </div>
                    </div>
                </section>

                <!-- Section des témoignages -->
                {{-- <section class="py-20 bg-gray-100">
                    <h2 class="text-3xl font-semibold text-center">Ce Que Disent Nos Clients</h2>
                    <div class="mt-8 flex flex-col items-center">
                        <blockquote class="p-6 bg-white rounded-lg shadow-lg">
                            <p class="italic">"Ce système a transformé notre gestion de stock, un gain de temps incroyable !"</p>
                            <cite class="block mt-4 text-right">- Client satisfait</cite>
                        </blockquote>
                    </div>
                </section> --}}
            </div>
        </div>
        <!-- Pied de page -->
        <footer class="py-10 text-center">
            <p class="text-black/50">© 2024 Mon Système de Gestion de Stock. Tous droits réservés.</p>
            <div class="mt-4">
                <a href="#" class="text-[#FF2D20] hover:underline">Contact</a>
                <span class="mx-2">|</span>
                <a href="#" class="text-[#FF2D20] hover:underline">Politique de confidentialité</a>
            </div>
        </footer>
    </div>
</body>
</html>
