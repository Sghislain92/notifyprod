 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Documentation API | NotifyBridge</title>
    <meta name="description" content="Documentation technique complète de l'API NotifyBridge. Intégration, authentification, gestion des sessions, envoi de messages, codes d'erreur et exemples de code.">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'evergreen': {
                            50: '#e6fffa', 100: '#cdfef4', 200: '#9bfdea', 300: '#68fddf', 400: '#36fcd4',
                            500: '#04fbca', 600: '#03c9a1', 700: '#029779', 800: '#026451', 900: '#013228', 950: '#01231c'
                        },
                        'emerald-depths': {
                            50: '#eef7f2', 100: '#dcefe5', 200: '#badecb', 300: '#97ceb2', 400: '#74be98',
                            500: '#52ad7e', 600: '#418b65', 700: '#31684c', 800: '#214532', 900: '#102319', 950: '#0b1812'
                        },
                        'vanilla-custard': {
                            50: '#fefae6', 100: '#fef5cd', 200: '#fceb9c', 300: '#fbe16a', 400: '#fad638',
                            500: '#f9cc06', 600: '#c7a305', 700: '#957b04', 800: '#635203', 900: '#322901', 950: '#231d01'
                        },
                        'brand': {
                            dark: '#003D2F',
                            forest: '#295840',
                            cream: '#FFF2B5',
                            deep: '#013D31',
                            'light-cream': '#FDF0B7'
                        }
                    },
                    fontFamily: {
                        'sans': ['"ITC Avant Garde Gothic"', '"Century Gothic"', 'Avenir', 'system-ui', 'sans-serif'],
                        'mono': ['"JetBrains Mono"', 'Consolas', 'monospace']
                    }
                }
            }
        }
    </script>
    <style>
        @font-face {
            font-family: 'ITC Avant Garde Gothic';
            src: local('ITC Avant Garde Gothic Std Book'), local('ITCAvantGardeStd-Book');
            font-weight: normal;
            font-style: normal;
        }
        .code-block {
            background: #1e293b;
            color: #e2e8f0;
            font-family: 'JetBrains Mono', monospace;
            border-radius: 1rem;
            overflow-x: auto;
        }
        .code-block pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .method-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.25rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.05em;
        }
        .method-get { background: #10b981; color: white; }
        .method-post { background: #3b82f6; color: white; }
        .method-delete { background: #ef4444; color: white; }
        .method-put { background: #f59e0b; color: white; }
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        .status-starting { background: #fef3c7; color: #d97706; }
        .status-scan { background: #ede9fe; color: #7c3aed; }
        .status-working { background: #d1fae5; color: #059669; }
        .status-disconnected { background: #fee2e2; color: #dc2626; }
        .endpoint-card {
            transition: all 0.2s ease;
            border: 1px solid #e5e7eb;
        }
        .endpoint-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            border-color: #04fbca;
        }
        .toc-link {
            transition: all 0.2s;
            display: block;
            padding: 0.5rem 0;
            font-size: 0.875rem;
        }
        .toc-link:hover {
            color: #04fbca;
        }
        .toc-link.active {
            color: #04fbca;
            font-weight: 600;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        pre { white-space: pre-wrap; word-wrap: break-word; }
        .response-example {
            background: #0f172a;
            border-radius: 0.75rem;
            padding: 1rem;
            overflow-x: auto;
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans antialiased">
    <!-- ========== HEADER ========== -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <a href="https://notify.caddieverse.com/">
                    <div class="flex items-center space-x-2">
                        <svg class="w-8 h-8 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        <span class="text-2xl font-bold tracking-tight text-brand-dark">Notify<span class="text-evergreen-500">Bridge</span></span>
                    </div>
                </a>
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="https://notify.caddieverse.com/" class="text-gray-700 hover:text-evergreen-600 font-semibold transition">Accueil</a>
                    <a href="https://notify.caddieverse.com/htdocs/documentation/" class="text-evergreen-600 font-semibold">Documentation</a>
                    <a href="https://notify.caddieverse.com/htdocs/api/" class="text-gray-700 hover:text-evergreen-600 font-semibold transition">API</a>
                </nav>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#" class="bg-brand-dark text-white px-6 py-2 rounded-xl font-semibold hover:bg-brand-forest transition">Console</a>
                </div>
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-gray-100 shadow-lg">
        <div class="px-4 py-4 space-y-3">
            <a href="https://notify.caddieverse.com/" class="block text-gray-700 hover:text-evergreen-600 font-semibold py-2">Accueil</a>
            <a href="https://notify.caddieverse.com/htdocs/documentation/" class="block text-evergreen-600 font-semibold py-2">Documentation</a>
            <a href="https://notify.caddieverse.com/htdocs/api/" class="block text-gray-700 hover:text-evergreen-600 font-semibold py-2">API</a>
            <a href="#" class="block bg-brand-dark text-white text-center px-4 py-2 rounded-xl font-semibold hover:bg-brand-forest transition">Console</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <!-- Hero Section -->
        <div class="text-center mb-12 md:mb-16">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-brand-dark mb-4">Documentation API</h1>
            <p class="text-base md:text-lg text-gray-600 max-w-3xl mx-auto">Intégrez WhatsApp à vos applications en quelques minutes avec notre API RESTful complète et documentée.</p>
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <div class="bg-brand-dark text-white px-4 py-2 rounded-xl text-sm font-semibold">Base URL: <span class="text-vanilla-custard-400">https://notifybridge-production.up.railway.app</span></div>
                <div class="bg-gray-100 text-gray-700 px-4 py-2 rounded-xl text-sm font-semibold">Version: <span class="text-emerald-depths-500">v1.0</span></div>
            </div>
        </div>

        <div class="grid lg:grid-cols-4 gap-8 lg:gap-12">
            <!-- Sidebar Navigation - Responsive -->
            <aside class="hidden lg:block space-y-6 sticky top-28 h-fit">
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Sommaire</h3>
                    <ul class="space-y-1">
                        <li><a href="#introduction" class="toc-link text-gray-600 hover:text-evergreen-600">Introduction</a></li>
                        <li><a href="#quick-start" class="toc-link text-gray-600 hover:text-evergreen-600">Démarrage rapide</a></li>
                        <li><a href="#authentication" class="toc-link text-gray-600 hover:text-evergreen-600">Authentification</a></li>
                        <li><a href="#error-codes" class="toc-link text-gray-600 hover:text-evergreen-600">Codes d'erreur</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">SESSIONS</span></li>
                        <li><a href="#session-start" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Démarrer une session</a></li>
                        <li><a href="#session-qr" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Récupérer le QR Code</a></li>
                        <li><a href="#session-status" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Statut de session</a></li>
                        <li><a href="#session-info" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Informations détaillées</a></li>
                        <li><a href="#session-repair" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Réparer une session</a></li>
                        <li><a href="#session-logout" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Déconnexion</a></li>
                        <li><a href="#session-delete" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Supprimer une session</a></li>
                        <li><a href="#session-list" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Lister les sessions</a></li>
                        <li><a href="#session-ping" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Ping / Keep-alive</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">MESSAGES</span></li>
                        <li><a href="#msg-send" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Envoyer un texte</a></li>
                        <li><a href="#msg-image" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Envoyer une image</a></li>
                        <li><a href="#msg-status" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Statut d'un message</a></li>
                        <li><a href="#msg-list" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Historique des messages</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">SYSTÈME</span></li>
                        <li><a href="#health" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Health Check</a></li>
                        <li><a href="#stats" class="toc-link text-gray-600 hover:text-evergreen-600 pl-3">Statistiques</a></li>
                    </ul>
                </div>
                <div class="bg-gradient-to-r from-evergreen-50 to-emerald-depths-50 rounded-2xl p-6 border border-evergreen-100">
                    <svg class="w-8 h-8 text-evergreen-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <p class="text-sm font-semibold text-brand-dark mb-2">Support technique</p>
                    <p class="text-xs text-gray-600 mb-3">Une question ? Consultez notre FAQ ou contactez notre support.</p>
                    <a href="#" class="text-evergreen-600 text-xs font-semibold hover:underline">Contacter le support →</a>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="lg:col-span-3 space-y-12 md:space-y-16">
                <!-- Introduction -->
                <section id="introduction">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-4">Introduction</h2>
                    <p class="text-gray-600 mb-4">NotifyBridge est une API RESTful qui vous permet d'automatiser l'envoi de messages WhatsApp sans avoir à gérer la complexité technique de WhatsApp Web. Notre solution utilise une technologie <span class="text-emerald-depths-600 font-semibold">stealth avancée</span> pour garantir une connexion stable et sécurisée.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                        <div class="p-4 rounded-xl border border-gray-200">
                            <svg class="w-6 h-6 text-vanilla-custard-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <h3 class="font-bold text-brand-dark text-sm">Haute disponibilité</h3>
                            <p class="text-xs text-gray-500 mt-1">Sessions persistantes avec reconnexion automatique</p>
                        </div>
                        <div class="p-4 rounded-xl border border-gray-200">
                            <svg class="w-6 h-6 text-evergreen-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6-4h12a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 4v-2m-8 2v-2m8 4H6"></path>
                            </svg>
                            <h3 class="font-bold text-brand-dark text-sm">Suivi des accusés</h3>
                            <p class="text-xs text-gray-500 mt-1">Statuts en temps réel (envoyé, délivré, lu)</p>
                        </div>
                    </div>
                </section>

                <!-- Quick Start -->
                <section id="quick-start">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-4">Démarrage rapide</h2>
                    <div class="space-y-6">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="flex-1 p-4 bg-brand-dark rounded-xl">
                                <p class="text-vanilla-custard-400 text-xs font-mono mb-2">Étape 1</p>
                                <p class="text-white text-sm font-semibold">Créez un compte</p>
                                <p class="text-gray-300 text-xs mt-1">Obtenez votre clé API depuis la console</p>
                            </div>
                            <div class="flex-1 p-4 bg-brand-dark rounded-xl">
                                <p class="text-vanilla-custard-400 text-xs font-mono mb-2">Étape 2</p>
                                <p class="text-white text-sm font-semibold">Démarrez une session</p>
                                <p class="text-gray-300 text-xs mt-1">POST /api/sessions/{id}/start</p>
                            </div>
                            <div class="flex-1 p-4 bg-brand-dark rounded-xl">
                                <p class="text-vanilla-custard-400 text-xs font-mono mb-2">Étape 3</p>
                                <p class="text-white text-sm font-semibold">Scannez le QR Code</p>
                                <p class="text-gray-300 text-xs mt-1">GET /api/sessions/{id}/qr</p>
                            </div>
                            <div class="flex-1 p-4 bg-brand-dark rounded-xl">
                                <p class="text-vanilla-custard-400 text-xs font-mono mb-2">Étape 4</p>
                                <p class="text-white text-sm font-semibold">Envoyez des messages</p>
                                <p class="text-gray-300 text-xs mt-1">POST /api/messages/send</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Authentication -->
                <section id="authentication">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-4">Authentification</h2>
                    <p class="text-gray-600 mb-4">Toutes les requêtes API doivent inclure votre clé API dans l'en-tête <code class="bg-gray-100 px-2 py-1 rounded text-sm font-mono">x-api-key</code>.</p>
                    <div class="code-block p-4 mb-4">
                        <pre><code>x-api-key: nb_live_xxxxxxxxxxxxxxxxxxxxxxxx</code></pre>
                    </div>
                    <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-r-xl">
                        <div class="flex gap-2">
                            <svg class="w-5 h-5 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <p class="text-sm text-amber-800">Ne partagez jamais votre clé API publiquement. Pour les applications front-end, utilisez un proxy backend.</p>
                        </div>
                    </div>
                </section>

                <!-- Error Codes -->
                <section id="error-codes">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-4">Codes d'erreur</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm border border-gray-200 rounded-xl">
                            <thead class="bg-gray-50">
                                <tr><th class="p-3 text-left">Code</th><th class="p-3 text-left">Erreur</th><th class="p-3 text-left">Solution</th></tr>
                            </thead>
                            <tbody class="divide-y">
                                <tr><td class="p-3 font-mono text-red-600">400</td><td>Paramètres manquants</td><td>Vérifiez que tous les champs requis sont présents</td></tr>
                                <tr><td class="p-3 font-mono text-red-600">401</td><td>Clé API invalide</td><td>Vérifiez votre clé dans la console NotifyBridge</td></tr>
                                <tr><td class="p-3 font-mono text-red-600">404</td><td>Session non trouvée</td><td>La session n'existe pas ou a été supprimée</td></tr>
                                <tr><td class="p-3 font-mono text-red-600">409</td><td>Session déjà existante</td><td>Utilisez /repair si la session est instable</td></tr>
                                <tr><td class="p-3 font-mono text-red-600">500</td><td>Erreur interne</td><td>Réessayez plus tard ou contactez le support</td></tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- SESSIONS SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b pb-2">Gestion des sessions</h2>

                    <!-- Start Session -->
                    <div id="session-start" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/start</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Initialise une nouvelle session WhatsApp. La session est persistante et reste active même après redémarrage du serveur.</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-xs font-semibold text-gray-500 mb-2">Paramètres URL</p>
                                <p class="text-sm font-mono">sessionId <span class="text-gray-400">(string, requis)</span></p>
                                <p class="text-xs text-gray-500 mt-1">Identifiant unique pour cette session (ex: "client_123")</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-xs font-semibold text-gray-500 mb-2">Réponse (200)</p>
                                <pre class="text-xs bg-gray-900 text-gray-300 p-2 rounded"><code>{
  "ok": true,
  "message": "Initialisation lancée",
  "sessionId": "client_123",
  "phoneNumber": null,
  "pushname": null
}</code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- QR Code -->
                    <div id="session-qr" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/qr</code>
                        </div>
                        <p class="text-gray-600 text-sm">Récupère le QR Code sous forme de dataURL. À afficher dans votre interface pour que l'utilisateur scanne avec WhatsApp.</p>
                        <div class="mt-3 response-example">
                            <pre class="text-xs text-gray-300"><code>{
  "qr": "data:image/png;base64,iVBORw0KGgo...",
  "status": "SCAN_QR"
}</code></pre>
                        </div>
                    </div>

                    <!-- Status -->
                    <div id="session-status" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/status</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Vérifie l'état actuel de la session.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="status-badge status-starting">STARTING</span>
                            <span class="status-badge status-scan">SCAN_QR</span>
                            <span class="status-badge status-working">WORKING</span>
                            <span class="status-badge status-disconnected">DISCONNECTED</span>
                        </div>
                    </div>

                    <!-- Info -->
                    <div id="session-info" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/info</code>
                        </div>
                        <p class="text-gray-600 text-sm">Obtient les informations détaillées de la session : numéro de téléphone, nom, photo de profil, batterie, etc.</p>
                    </div>

                    <!-- Repair -->
                    <div id="session-repair" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/repair</code>
                        </div>
                        <p class="text-gray-600 text-sm">Tente de réparer une session déconnectée. Recrée le client WhatsApp et génère un nouveau QR Code si nécessaire.</p>
                        <div class="mt-3 bg-emerald-depths-50 p-3 rounded-lg">
                            <p class="text-xs text-emerald-depths-700"><span class="font-semibold">💡 Astuce :</span> Utilisez cet endpoint automatiquement lorsque vous détectez un statut DISCONNECTED ou une erreur d'envoi.</p>
                        </div>
                    </div>

                    <!-- Logout & Delete -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div id="session-logout" class="endpoint-card bg-white rounded-2xl p-5">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span class="method-badge method-post">POST</span>
                                <code class="text-xs bg-gray-100 px-2 py-1 rounded font-mono break-all">/api/sessions/:sessionId/logout</code>
                            </div>
                            <p class="text-xs text-gray-600">Déconnecte la session de WhatsApp Web et supprime le client.</p>
                        </div>
                        <div id="session-delete" class="endpoint-card bg-white rounded-2xl p-5">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span class="method-badge method-delete">DELETE</span>
                                <code class="text-xs bg-gray-100 px-2 py-1 rounded font-mono break-all">/api/sessions/:sessionId</code>
                            </div>
                            <p class="text-xs text-gray-600">Supprime définitivement la session et toutes ses données.</p>
                        </div>
                    </div>

                    <!-- List Sessions -->
                    <div id="session-list" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono">/api/sessions</code>
                        </div>
                        <p class="text-gray-600 text-sm">Liste toutes les sessions actives avec leurs métadonnées.</p>
                    </div>

                    <!-- Ping -->
                    <div id="session-ping" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/ping</code>
                        </div>
                        <p class="text-gray-600 text-sm">Maintient la session active. À appeler toutes les 30-60 secondes pour éviter les timeouts.</p>
                    </div>
                </div>

                <!-- MESSAGES SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b pb-2">Envoi de messages</h2>

                    <!-- Send Text -->
                    <div id="msg-send" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono">/api/messages/send</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Envoie un message texte à un destinataire WhatsApp.</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs font-semibold text-gray-500 mb-2">Corps de la requête</p>
                                <div class="bg-gray-900 rounded-xl p-3">
                                    <pre class="text-xs text-gray-300"><code>{
  "sessionId": "client_123",
  "to": "2250700000000",
  "text": "Bonjour, votre commande est prête !"
}</code></pre>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 mb-2">Réponse (200)</p>
                                <div class="bg-gray-900 rounded-xl p-3">
                                    <pre class="text-xs text-gray-300"><code>{
  "ok": true,
  "messageId": "ABC123XYZ789",
  "status": "sent",
  "from": {
    "number": "22501234567",
    "pushname": "John"
  },
  "timestamp": "2024-03-25T10:00:00Z"
}</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 p-3 bg-gray-50 rounded-xl">
                            <p class="text-xs text-gray-500"><span class="font-semibold text-evergreen-600">Format du numéro :</span> Numéro au format international sans le '+' (ex: 2250700000000 pour la Côte d'Ivoire)</p>
                        </div>
                    </div>

                    <!-- Send Image -->
                    <div id="msg-image" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono">/api/messages/send-image</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Envoie une image (depuis une URL ou en base64).</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs font-semibold text-gray-500 mb-2">Avec URL</p>
                                <div class="bg-gray-900 rounded-xl p-3">
                                    <pre class="text-xs text-gray-300"><code>{
  "sessionId": "client_123",
  "to": "2250700000000",
  "caption": "Votre facture",
  "imageUrl": "https://example.com/invoice.jpg"
}</code></pre>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 mb-2">Avec Base64</p>
                                <div class="bg-gray-900 rounded-xl p-3">
                                    <pre class="text-xs text-gray-300"><code>{
  "sessionId": "client_123",
  "to": "2250700000000",
  "caption": "Image",
  "imageBase64": "/9j/4AAQSkZJRg..."
}</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Message Status -->
                    <div id="msg-status" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/messages/:messageId/status</code>
                        </div>
                        <p class="text-gray-600 text-sm">Vérifie l'accusé de réception d'un message.</p>
                        <div class="mt-3 flex flex-wrap gap-3">
                            <div class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-gray-400"></span><span class="text-xs">pending</span></div>
                            <div class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-blue-400"></span><span class="text-xs">sent</span></div>
                            <div class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-green-400"></span><span class="text-xs">delivered</span></div>
                            <div class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-evergreen-500"></span><span class="text-xs">read</span></div>
                        </div>
                    </div>

                    <!-- Message List -->
                    <div id="msg-list" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/messages</code>
                        </div>
                        <p class="text-gray-600 text-sm">Liste tous les messages envoyés pour une session donnée.</p>
                    </div>
                </div>

                <!-- SYSTEM SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b pb-2">Système & Monitoring</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div id="health" class="endpoint-card bg-white rounded-2xl p-5">
                            <div class="flex flex-wrap items-center gap-3 mb-2">
                                <span class="method-badge method-get">GET</span>
                                <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/health</code>
                            </div>
                            <p class="text-xs text-gray-600">Vérifie l'état du service NotifyBridge.</p>
                        </div>
                        <div id="stats" class="endpoint-card bg-white rounded-2xl p-5">
                            <div class="flex flex-wrap items-center gap-3 mb-2">
                                <span class="method-badge method-get">GET</span>
                                <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/stats</code>
                            </div>
                            <p class="text-xs text-gray-600">Statistiques globales : sessions actives, messages par statut.</p>
                        </div>
                    </div>
                </div>

                <!-- Best Practices -->
                <section id="best-practices">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-6">Bonnes pratiques</h2>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <svg class="w-6 h-6 text-vanilla-custard-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="font-bold text-white text-sm">Keep-alive</h3>
                            <p class="text-gray-300 text-xs mt-1">Utilisez /ping toutes les 30-60 secondes</p>
                        </div>
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <svg class="w-6 h-6 text-evergreen-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <h3 class="font-bold text-white text-sm">Réparation auto</h3>
                            <p class="text-gray-300 text-xs mt-1">Appelez /repair en cas d'échec</p>
                        </div>
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <svg class="w-6 h-6 text-emerald-depths-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="font-bold text-white text-sm">Suivez vos messages</h3>
                            <p class="text-gray-300 text-xs mt-1">Stockez les messageId pour le tracking</p>
                        </div>
                    </div>
                </section>

                <!-- Footer -->
                <footer class="pt-8 border-t border-gray-100 text-center text-gray-400 text-xs md:text-sm">
                    <p>&copy; 2025 NotifyBridge. Tous droits réservés.</p>
                    <p class="mt-2">API v1.0 | Dernière mise à jour : Mars 2025</p>
                </footer>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Active link highlighting on scroll
        const sections = document.querySelectorAll('section[id], div[id]');
        const tocLinks = document.querySelectorAll('.toc-link');
        
        function highlightActiveLink() {
            let scrollPosition = window.scrollY + 120;
            let currentSection = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionBottom = sectionTop + section.offsetHeight;
                if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                    currentSection = section.getAttribute('id');
                }
            });
            
            tocLinks.forEach(link => {
                link.classList.remove('active', 'text-evergreen-600');
                const href = link.getAttribute('href');
                if (href === `#${currentSection}`) {
                    link.classList.add('active', 'text-evergreen-600');
                }
            });
        }
        
        window.addEventListener('scroll', highlightActiveLink);
        highlightActiveLink();
    </script>
</body>
</html>