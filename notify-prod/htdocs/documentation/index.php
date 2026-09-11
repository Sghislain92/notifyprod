<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Documentation API | NotifyBridge v6.0</title>
    <meta name="description" content="Documentation technique complète de l'API NotifyBridge v6.0. Guides d'intégration, authentification, gestion des sessions, envoi de messages, groupes, contacts, webhooks, codes d'erreur et exemples de code.">
    
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
        pre { white-space: pre-wrap; word-wrap: break-word; }
        .response-example {
            background: #0f172a;
            border-radius: 0.75rem;
            padding: 1rem;
            overflow-x: auto;
        }
        .param-table td, .param-table th {
            padding: 12px 16px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }
        .param-table th {
            background-color: #f9fafb;
            font-weight: 600;
        }
        .error-table td, .error-table th {
            padding: 12px 16px;
            border-bottom: 1px solid #e5e7eb;
        }
        .error-table th {
            background-color: #f9fafb;
            font-weight: 600;
        }
        .tab-btn.active {
            color: #04fbca;
            border-bottom: 2px solid #04fbca;
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans antialiased">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <a href="https://notify.caddieverse.com/">
                    <div class="flex items-center space-x-2">
                        <svg class="w-8 h-8 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        <span class="text-2xl font-bold tracking-tight text-brand-dark">Notify<span class="text-evergreen-500">Bridge</span></span>
                        <span class="ml-2 text-xs bg-evergreen-100 text-evergreen-700 px-2 py-1 rounded-full">v6.0</span>
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
            <p class="text-base md:text-lg text-gray-600 max-w-3xl mx-auto">Intégrez WhatsApp à vos applications en quelques minutes avec notre API RESTful complète. Gérez sessions, messages, groupes, contacts et webhooks.</p>
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <div class="bg-brand-dark text-white px-4 py-2 rounded-xl text-sm font-semibold">Base URL: <span class="text-vanilla-custard-400">https://notifybridge-production.up.railway.app</span></div>
                <div class="bg-gray-100 text-gray-700 px-4 py-2 rounded-xl text-sm font-semibold">Version: <span class="text-emerald-depths-500">v6.0</span></div>
                <div class="bg-evergreen-50 text-evergreen-700 px-4 py-2 rounded-xl text-sm font-semibold">Rate Limit: <span class="font-mono">100 req/min</span></div>
            </div>
        </div>

        <div class="grid lg:grid-cols-4 gap-8 lg:gap-12">
            <!-- Sidebar Navigation -->
            <aside class="hidden lg:block space-y-6 sticky top-28 h-fit">
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Sommaire</h3>
                    <ul class="space-y-1">
                        <li><a href="#introduction" class="toc-link text-gray-600">Introduction</a></li>
                        <li><a href="#quick-start" class="toc-link text-gray-600">Démarrage rapide</a></li>
                        <li><a href="#authentication" class="toc-link text-gray-600">Authentification</a></li>
                        <li><a href="#error-codes" class="toc-link text-gray-600">Codes d'erreur</a></li>
                        <li><a href="#session-states" class="toc-link text-gray-600">États de session</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">SESSIONS</span></li>
                        <li><a href="#session-start" class="toc-link text-gray-600 pl-3">Démarrer une session</a></li>
                        <li><a href="#session-qr" class="toc-link text-gray-600 pl-3">Récupérer le QR code</a></li>
                        <li><a href="#session-status" class="toc-link text-gray-600 pl-3">Statut de session</a></li>
                        <li><a href="#session-info" class="toc-link text-gray-600 pl-3">Informations détaillées</a></li>
                        <li><a href="#session-phone" class="toc-link text-gray-600 pl-3">Numéro de téléphone</a></li>
                        <li><a href="#session-repair" class="toc-link text-gray-600 pl-3">Réparer une session</a></li>
                        <li><a href="#session-logout" class="toc-link text-gray-600 pl-3">Déconnexion</a></li>
                        <li><a href="#session-delete" class="toc-link text-gray-600 pl-3">Supprimer une session</a></li>
                        <li><a href="#session-list" class="toc-link text-gray-600 pl-3">Lister les sessions</a></li>
                        <li><a href="#session-ping" class="toc-link text-gray-600 pl-3">Ping / Keep-alive</a></li>
                        <li><a href="#session-disconnect-info" class="toc-link text-gray-600 pl-3">Info déconnexion</a></li>
                        <li><a href="#session-close-all" class="toc-link text-gray-600 pl-3">Fermer toutes les sessions</a></li>
                        <li><a href="#session-cleanup" class="toc-link text-gray-600 pl-3">Nettoyer sessions orphelines</a></li>
                        <li><a href="#session-webhook" class="toc-link text-gray-600 pl-3">Webhooks</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">MESSAGES</span></li>
                        <li><a href="#msg-send" class="toc-link text-gray-600 pl-3">Envoyer un texte</a></li>
                        <li><a href="#msg-image" class="toc-link text-gray-600 pl-3">Envoyer une image</a></li>
                        <li><a href="#msg-video" class="toc-link text-gray-600 pl-3">Envoyer une vidéo</a></li>
                        <li><a href="#msg-audio" class="toc-link text-gray-600 pl-3">Envoyer un audio</a></li>
                        <li><a href="#msg-file" class="toc-link text-gray-600 pl-3">Envoyer un fichier</a></li>
                        <li><a href="#msg-sticker" class="toc-link text-gray-600 pl-3">Envoyer un sticker</a></li>
                        <li><a href="#msg-location" class="toc-link text-gray-600 pl-3">Envoyer une localisation</a></li>
                        <li><a href="#msg-contact" class="toc-link text-gray-600 pl-3">Envoyer un contact</a></li>
                        <li><a href="#msg-edit" class="toc-link text-gray-600 pl-3">Éditer un message</a></li>
                        <li><a href="#msg-delete" class="toc-link text-gray-600 pl-3">Supprimer un message</a></li>
                        <li><a href="#msg-status" class="toc-link text-gray-600 pl-3">Statut d'un message</a></li>
                        <li><a href="#msg-history" class="toc-link text-gray-600 pl-3">Historique des messages</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">GROUPES</span></li>
                        <li><a href="#groups-create" class="toc-link text-gray-600 pl-3">Créer un groupe</a></li>
                        <li><a href="#groups-get" class="toc-link text-gray-600 pl-3">Infos groupe</a></li>
                        <li><a href="#groups-participants" class="toc-link text-gray-600 pl-3">Gérer participants</a></li>
                        <li><a href="#groups-subject" class="toc-link text-gray-600 pl-3">Modifier le sujet</a></li>
                        <li><a href="#groups-description" class="toc-link text-gray-600 pl-3">Modifier la description</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">CONTACTS</span></li>
                        <li><a href="#contacts-list" class="toc-link text-gray-600 pl-3">Lister contacts</a></li>
                        <li><a href="#contacts-get" class="toc-link text-gray-600 pl-3">Détails contact</a></li>
                        <li><a href="#contacts-block" class="toc-link text-gray-600 pl-3">Bloquer / Débloquer</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">PRÉSENCE</span></li>
                        <li><a href="#presence-typing" class="toc-link text-gray-600 pl-3">Simuler l'écriture</a></li>
                        <li><a href="#presence-recording" class="toc-link text-gray-600 pl-3">Simuler l'enregistrement</a></li>
                        <li><a href="#presence-get" class="toc-link text-gray-600 pl-3">Voir la présence</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">CHATS</span></li>
                        <li><a href="#chats-list" class="toc-link text-gray-600 pl-3">Lister chats</a></li>
                        <li><a href="#chats-archive" class="toc-link text-gray-600 pl-3">Archiver / Désarchiver</a></li>
                        <li><a href="#chats-pin" class="toc-link text-gray-600 pl-3">Épingler / Désépingler</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">SYSTÈME</span></li>
                        <li><a href="#health" class="toc-link text-gray-600 pl-3">Health check</a></li>
                        <li><a href="#health-extended" class="toc-link text-gray-600 pl-3">Health extended</a></li>
                        <li><a href="#stats" class="toc-link text-gray-600 pl-3">Statistiques</a></li>
                    </ul>
                </div>
                <div class="bg-gradient-to-r from-evergreen-50 to-emerald-depths-50 rounded-2xl p-6 border border-evergreen-100">
                    <svg class="w-8 h-8 text-evergreen-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <p class="text-sm font-semibold text-brand-dark mb-2">Support technique</p>
                    <p class="text-xs text-gray-600 mb-3">Besoin d'aide ? Consultez notre FAQ ou contactez notre support.</p>
                    <a href="#" class="text-evergreen-600 text-xs font-semibold hover:underline">Contacter le support →</a>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="lg:col-span-3 space-y-12 md:space-y-16">
                <!-- Introduction -->
                <section id="introduction">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-4">Introduction</h2>
                    <p class="text-gray-600 mb-4">NotifyBridge est une API RESTful qui vous permet d'automatiser l'envoi de messages WhatsApp sans avoir à gérer la complexité technique de WhatsApp Web. Notre solution utilise une technologie <span class="text-emerald-depths-600 font-semibold">stealth avancée</span> pour garantir une connexion stable et sécurisée.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
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
                        <div class="p-4 rounded-xl border border-gray-200">
                            <svg class="w-6 h-6 text-emerald-depths-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="font-bold text-brand-dark text-sm">Multimédia</h3>
                            <p class="text-xs text-gray-500 mt-1">Images, vidéos, fichiers, stickers, localisation, contacts</p>
                        </div>
                    </div>
                </section>

                <!-- Quick Start -->
                <section id="quick-start">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-4">Démarrage rapide</h2>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <p class="text-vanilla-custard-400 text-xs font-mono mb-2">Étape 1</p>
                            <p class="text-white text-sm font-semibold">Créez un compte</p>
                            <p class="text-gray-300 text-xs mt-1">Obtenez votre clé API</p>
                        </div>
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <p class="text-vanilla-custard-400 text-xs font-mono mb-2">Étape 2</p>
                            <p class="text-white text-sm font-semibold">POST /sessions/{id}/start</p>
                            <p class="text-gray-300 text-xs mt-1">Démarrez une session</p>
                        </div>
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <p class="text-vanilla-custard-400 text-xs font-mono mb-2">Étape 3</p>
                            <p class="text-white text-sm font-semibold">GET /sessions/{id}/qr</p>
                            <p class="text-gray-300 text-xs mt-1">Scannez le QR code</p>
                        </div>
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <p class="text-vanilla-custard-400 text-xs font-mono mb-2">Étape 4</p>
                            <p class="text-white text-sm font-semibold">POST /messages/send</p>
                            <p class="text-gray-300 text-xs mt-1">Envoyez des messages</p>
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
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="error-table w-full">
                            <thead class="bg-gray-50">
                                <tr><th class="p-3 text-left">Code</th><th class="p-3 text-left">Description</th><th class="p-3 text-left">Solution</th></tr>
                            </thead>
                            <tbody>
                                <tr><td class="p-3 font-mono text-red-600">400</td><td>Paramètres manquants ou session non prête</td><td>Vérifiez les champs requis (sessionId, to, text)</td></tr>
                                <tr><td class="p-3 font-mono text-red-600">401</td><td>Clé API invalide ou manquante</td><td>Vérifiez votre clé dans la console NotifyBridge</td></tr>
                                <tr><td class="p-3 font-mono text-red-600">403</td><td>Permissions insuffisantes</td><td>Votre clé n'a pas les droits pour cette action</td></tr>
                                <tr><td class="p-3 font-mono text-red-600">404</td><td>Session ou message non trouvé</td><td>La session n'existe pas ou a été supprimée</td></tr>
                                <tr><td class="p-3 font-mono text-red-600">429</td><td>Limite démo atteinte (4 messages) ou rate limit</td><td>Créez un compte gratuit ou réduisez la fréquence</td></tr>
                                <tr><td class="p-3 font-mono text-red-600">500</td><td>Erreur interne du serveur</td><td>Réessayez plus tard ou contactez le support</td></tr>
                                <tr><td class="p-3 font-mono text-red-600">503</td><td>Service d'authentification indisponible</td><td>Service temporairement indisponible, réessayez</td></tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Session States -->
                <section id="session-states">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-4">États d'une session WhatsApp</h2>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                        <div class="text-center p-3 bg-gray-50 rounded-xl"><span class="status-badge status-starting">STARTING</span><p class="text-xs mt-1">Initialisation</p></div>
                        <div class="text-center p-3 bg-gray-50 rounded-xl"><span class="status-badge status-scan">SCAN_QR</span><p class="text-xs mt-1">En attente de scan</p></div>
                        <div class="text-center p-3 bg-gray-50 rounded-xl"><span class="status-badge bg-purple-100 text-purple-700">AUTHENTICATED</span><p class="text-xs mt-1">Authentifié</p></div>
                        <div class="text-center p-3 bg-gray-50 rounded-xl"><span class="status-badge status-working">WORKING</span><p class="text-xs mt-1">Prête</p></div>
                        <div class="text-center p-3 bg-gray-50 rounded-xl"><span class="status-badge status-disconnected">DISCONNECTED</span><p class="text-xs mt-1">Déconnectée</p></div>
                    </div>
                </section>

                <!-- SESSIONS SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b border-evergreen-200 pb-2">Gestion des sessions</h2>

                    <!-- POST /sessions/:id/start -->
                    <div id="session-start" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/start</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Initialise une session WhatsApp. La session est persistante localement. Utilisez un identifiant unique par numéro WhatsApp.</p>
                        
                        <div class="mb-4">
                            <h4 class="font-bold text-sm mb-2">Paramètres</h4>
                            <div class="overflow-x-auto rounded-xl border border-gray-200">
                                <table class="param-table w-full">
                                    <thead><tr><th>Nom</th><th>Type</th><th>Requis</th><th>Description</th></tr></thead>
                                    <tbody><tr><td class="font-mono">sessionId</td><td>string</td><td>oui</td><td>Identifiant unique de la session (ex: "client_123")</td></tr></tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h4 class="font-bold text-sm mb-2">Exemples</h4>
                            <div class="border rounded-xl overflow-hidden">
                                <div class="flex flex-wrap border-b bg-gray-50">
                                    <button class="tab-btn px-4 py-2 text-sm font-medium hover:text-evergreen-600 transition" data-tab="curl-start">cURL</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium hover:text-evergreen-600 transition" data-tab="php-start">PHP</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium hover:text-evergreen-600 transition" data-tab="python-start">Python</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium hover:text-evergreen-600 transition" data-tab="javascript-start">JavaScript</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium hover:text-evergreen-600 transition" data-tab="java-start">Java</button>
                                </div>
                                <div class="code-block p-4" id="curl-start"><pre><code>curl -X POST https://notifybridge-production.up.railway.app/api/sessions/client_123/start \
  -H "x-api-key: VOTRE_CLE_API" \
  -H "Content-Type: application/json"</code></pre></div>
                                <div class="code-block p-4 hidden" id="php-start"><pre><code>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/sessions/client_123/start');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'x-api-key: VOTRE_CLE_API',
    'Content-Type: application/json'
]);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</code></pre></div>
                                <div class="code-block p-4 hidden" id="python-start"><pre><code>import requests
url = "https://notifybridge-production.up.railway.app/api/sessions/client_123/start"
headers = {"x-api-key": "VOTRE_CLE_API"}
response = requests.post(url, headers=headers)
print(response.json())</code></pre></div>
                                <div class="code-block p-4 hidden" id="javascript-start"><pre><code>fetch('https://notifybridge-production.up.railway.app/api/sessions/client_123/start', {
    method: 'POST',
    headers: { 'x-api-key': 'VOTRE_CLE_API' }
})
.then(res => res.json())
.then(data => console.log(data));</code></pre></div>
                                <div class="code-block p-4 hidden" id="java-start"><pre><code>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/sessions/client_123/start"))
    .header("x-api-key", "VOTRE_CLE_API")
    .POST(HttpRequest.BodyPublishers.noBody())
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</code></pre></div>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-bold text-sm mb-2">Réponse (200)</h4>
                            <div class="response-example">
                                <pre class="text-xs text-gray-300"><code>{
  "ok": true,
  "message": "Initialisation lancée",
  "sessionId": "client_123",
  "phoneNumber": null,
  "pushname": null
}</code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- GET /sessions/:id/qr -->
                    <div id="session-qr" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/qr</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Récupère le QR code au format dataURL pour scanner avec WhatsApp.</p>
                        
                        <div class="mb-4">
                            <h4 class="font-bold text-sm mb-2">Exemples</h4>
                            <div class="border rounded-xl overflow-hidden">
                                <div class="flex flex-wrap border-b bg-gray-50">
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="curl-qr">cURL</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="php-qr">PHP</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="python-qr">Python</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="javascript-qr">JavaScript</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="java-qr">Java</button>
                                </div>
                                <div class="code-block p-4" id="curl-qr"><pre><code>curl -X GET https://notifybridge-production.up.railway.app/api/sessions/client_123/qr \
  -H "x-api-key: VOTRE_CLE_API"</code></pre></div>
                                <div class="code-block p-4 hidden" id="php-qr"><pre><code>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/sessions/client_123/qr');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-api-key: VOTRE_CLE_API']);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</code></pre></div>
                                <div class="code-block p-4 hidden" id="python-qr"><pre><code>import requests
url = "https://notifybridge-production.up.railway.app/api/sessions/client_123/qr"
headers = {"x-api-key": "VOTRE_CLE_API"}
response = requests.get(url, headers=headers)
print(response.json())</code></pre></div>
                                <div class="code-block p-4 hidden" id="javascript-qr"><pre><code>fetch('https://notifybridge-production.up.railway.app/api/sessions/client_123/qr', {
    headers: { 'x-api-key': 'VOTRE_CLE_API' }
})
.then(res => res.json())
.then(data => console.log(data));</code></pre></div>
                                <div class="code-block p-4 hidden" id="java-qr"><pre><code>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/sessions/client_123/qr"))
    .header("x-api-key", "VOTRE_CLE_API")
    .GET()
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</code></pre></div>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-bold text-sm mb-2">Réponse (200)</h4>
                            <div class="response-example">
                                <pre class="text-xs text-gray-300"><code>{
  "qr": "data:image/png;base64,iVBORw0KGgo...",
  "status": "SCAN_QR"
}</code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- GET /sessions/:id/status -->
                    <div id="session-status" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/status</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Vérifie l'état actuel de la session. À utiliser pour le polling d'attente de connexion.</p>
                        
                        <div class="mb-4">
                            <h4 class="font-bold text-sm mb-2">Exemples</h4>
                            <div class="border rounded-xl overflow-hidden">
                                <div class="flex flex-wrap border-b bg-gray-50">
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="curl-status">cURL</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="php-status">PHP</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="python-status">Python</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="javascript-status">JavaScript</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="java-status">Java</button>
                                </div>
                                <div class="code-block p-4" id="curl-status"><pre><code>curl -X GET https://notifybridge-production.up.railway.app/api/sessions/client_123/status \
  -H "x-api-key: VOTRE_CLE_API"</code></pre></div>
                                <div class="code-block p-4 hidden" id="php-status"><pre><code>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/sessions/client_123/status');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-api-key: VOTRE_CLE_API']);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</code></pre></div>
                                <div class="code-block p-4 hidden" id="python-status"><pre><code>import requests
url = "https://notifybridge-production.up.railway.app/api/sessions/client_123/status"
headers = {"x-api-key": "VOTRE_CLE_API"}
response = requests.get(url, headers=headers)
print(response.json())</code></pre></div>
                                <div class="code-block p-4 hidden" id="javascript-status"><pre><code>fetch('https://notifybridge-production.up.railway.app/api/sessions/client_123/status', {
    headers: { 'x-api-key': 'VOTRE_CLE_API' }
})
.then(res => res.json())
.then(data => console.log(data));</code></pre></div>
                                <div class="code-block p-4 hidden" id="java-status"><pre><code>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/sessions/client_123/status"))
    .header("x-api-key", "VOTRE_CLE_API")
    .GET()
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</code></pre></div>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-bold text-sm mb-2">Réponse (200)</h4>
                            <div class="response-example">
                                <pre class="text-xs text-gray-300"><code>{
  "ok": true,
  "status": "WORKING",
  "phoneNumber": "22501234567",
  "pushname": "John Doe",
  "error": null
}</code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- GET /sessions/:id/info -->
                    <div id="session-info" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/info</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Obtient les informations détaillées de la session : numéro de téléphone, nom WhatsApp, batterie, plateforme, infos appareil.</p>
                    </div>

                    <!-- GET /sessions/:id/phone-number -->
                    <div id="session-phone" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/phone-number</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Récupère le numéro de téléphone associé à la session.</p>
                    </div>

                    <!-- POST /sessions/:id/repair -->
                    <div id="session-repair" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/repair</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Tente de réparer une session déconnectée. Recrée le client WhatsApp et génère un nouveau QR code.</p>
                    </div>

                    <!-- POST /sessions/:id/logout -->
                    <div id="session-logout" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/logout</code>
                        </div>
                        <p class="text-gray-600 text-sm">Déconnecte la session de WhatsApp Web.</p>
                    </div>

                    <!-- DELETE /sessions/:id -->
                    <div id="session-delete" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-delete">DELETE</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId</code>
                        </div>
                        <p class="text-gray-600 text-sm">Supprime définitivement la session et toutes ses données locales.</p>
                    </div>

                    <!-- GET /sessions -->
                    <div id="session-list" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono">/api/sessions</code>
                        </div>
                        <p class="text-gray-600 text-sm">Liste toutes les sessions actives avec leurs métadonnées.</p>
                    </div>

                    <!-- POST /sessions/:id/ping -->
                    <div id="session-ping" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/ping</code>
                        </div>
                        <p class="text-gray-600 text-sm">Maintient la session active. À appeler toutes les 30-60 secondes.</p>
                    </div>

                    <!-- GET /sessions/:id/disconnect-info -->
                    <div id="session-disconnect-info" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/disconnect-info</code>
                        </div>
                        <p class="text-gray-600 text-sm">Retourne la raison de la dernière déconnexion (LOGOUT, REMOTE_LOGOUT, ACCOUNT_REMOVED).</p>
                    </div>

                    <!-- POST /sessions/close-all -->
                    <div id="session-close-all" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono">/api/sessions/close-all</code>
                        </div>
                        <p class="text-gray-600 text-sm">Ferme toutes les sessions actives.</p>
                    </div>

                    <!-- POST /sessions/cleanup-orphans -->
                    <div id="session-cleanup" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono">/api/sessions/cleanup-orphans</code>
                        </div>
                        <p class="text-gray-600 text-sm">Nettoie les sessions orphelines (timeout QR, initialisation bloquée).</p>
                    </div>

                    <!-- Webhooks -->
                    <div id="session-webhook" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/webhook</code>
                            <span class="method-badge method-delete ml-2">DELETE</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/webhook</code>
                        </div>
                        <p class="text-gray-600 text-sm">Configure ou supprime un webhook pour recevoir les événements WhatsApp en temps réel.</p>
                        <div class="code-block-light p-3 rounded-xl mt-2">
                            <pre class="text-xs text-gray-300"><code>{
  "url": "https://votre-site.com/webhook/whatsapp"
}</code></pre>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-3">
                            <span class="text-xs bg-gray-100 px-2 py-1 rounded-full">message</span>
                            <span class="text-xs bg-gray-100 px-2 py-1 rounded-full">message_ack</span>
                            <span class="text-xs bg-gray-100 px-2 py-1 rounded-full">ready</span>
                            <span class="text-xs bg-gray-100 px-2 py-1 rounded-full">disconnected</span>
                            <span class="text-xs bg-gray-100 px-2 py-1 rounded-full">group_join</span>
                            <span class="text-xs bg-gray-100 px-2 py-1 rounded-full">group_leave</span>
                        </div>
                    </div>
                </div>

                <!-- MESSAGES SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b border-evergreen-200 pb-2">Envoi de messages</h2>

                    <!-- POST /messages/send -->
                    <div id="msg-send" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono">/api/messages/send</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Envoie un message texte. Le message est envoyé avec un timeout de 60 secondes et une tentative de retry automatique.</p>
                        
                        <div class="mb-4">
                            <h4 class="font-bold text-sm mb-2">Paramètres</h4>
                            <div class="overflow-x-auto rounded-xl border border-gray-200">
                                <table class="param-table w-full">
                                    <thead><tr><th>Nom</th><th>Type</th><th>Requis</th><th>Description</th></tr></thead>
                                    <tbody>
                                        <tr><td class="font-mono">sessionId</td><td>string</td><td>oui</td><td>Identifiant de la session</td></tr>
                                        <tr><td class="font-mono">to</td><td>string</td><td>oui</td><td>Numéro destinataire (format international sans +)</td></tr>
                                        <tr><td class="font-mono">text</td><td>string</td><td>oui</td><td>Contenu du message (max 4096 caractères)</td></tr>
                                        <tr><td class="font-mono">mentions</td><td>array</td><td>non</td><td>Liste des numéros à mentionner</td></tr>
                                        <tr><td class="font-mono">reactions</td><td>string</td><td>non</td><td>Émoji de réaction</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h4 class="font-bold text-sm mb-2">Exemples</h4>
                            <div class="border rounded-xl overflow-hidden">
                                <div class="flex flex-wrap border-b bg-gray-50">
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="curl-send">cURL</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="php-send">PHP</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="python-send">Python</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="javascript-send">JavaScript</button>
                                    <button class="tab-btn px-4 py-2 text-sm font-medium" data-tab="java-send">Java</button>
                                </div>
                                <div class="code-block p-4" id="curl-send"><pre><code>curl -X POST https://notifybridge-production.up.railway.app/api/messages/send \
  -H "x-api-key: VOTRE_CLE_API" \
  -H "Content-Type: application/json" \
  -d '{"sessionId":"client_123","to":"2250700000000","text":"Bonjour !"}'</code></pre></div>
                                <div class="code-block p-4 hidden" id="php-send"><pre><code>&lt;?php
$data = json_encode([
    "sessionId" => "client_123",
    "to" => "2250700000000",
    "text" => "Bonjour !"
]);
$ch = curl_init("https://notifybridge-production.up.railway.app/api/messages/send");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "x-api-key: VOTRE_CLE_API",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo curl_exec($ch);
curl_close($ch);
?&gt;</code></pre></div>
                                <div class="code-block p-4 hidden" id="python-send"><pre><code>import requests
url = "https://notifybridge-production.up.railway.app/api/messages/send"
headers = {"x-api-key": "VOTRE_CLE_API", "Content-Type": "application/json"}
payload = {"sessionId": "client_123", "to": "2250700000000", "text": "Bonjour !"}
r = requests.post(url, json=payload, headers=headers)
print(r.json())</code></pre></div>
                                <div class="code-block p-4 hidden" id="javascript-send"><pre><code>fetch('https://notifybridge-production.up.railway.app/api/messages/send', {
    method: 'POST',
    headers: {
        'x-api-key': 'VOTRE_CLE_API',
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        sessionId: 'client_123',
        to: '2250700000000',
        text: 'Bonjour !'
    })
})
.then(res => res.json())
.then(data => console.log(data));</code></pre></div>
                                <div class="code-block p-4 hidden" id="java-send"><pre><code>// Using OkHttp
OkHttpClient client = new OkHttpClient();
String json = "{\"sessionId\":\"client_123\",\"to\":\"2250700000000\",\"text\":\"Bonjour !\"}";
RequestBody body = RequestBody.create(json, MediaType.parse("application/json"));
Request request = new Request.Builder()
    .url("https://notifybridge-production.up.railway.app/api/messages/send")
    .addHeader("x-api-key", "VOTRE_CLE_API")
    .post(body)
    .build();
Response response = client.newCall(request).execute();
System.out.println(response.body().string());</code></pre></div>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-bold text-sm mb-2">Réponse (200)</h4>
                            <div class="response-example">
                                <pre class="text-xs text-gray-300"><code>{
  "ok": true,
  "messageId": "ABC123XYZ789",
  "status": "sent",
  "from": {
    "number": "22501234567",
    "pushname": "John"
  },
  "timestamp": "2025-04-01T10:00:00Z"
}</code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- POST /messages/send-image -->
                    <div id="msg-image" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/messages/send-image</code>
                        </div>
                        <p class="text-gray-600 text-sm">Envoie une image (URL ou base64). Paramètres : sessionId, to, caption, imageUrl, imageBase64.</p>
                    </div>

                    <!-- POST /messages/send-video -->
                    <div id="msg-video" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/messages/send-video</code>
                        </div>
                        <p class="text-gray-600 text-sm">Envoie une vidéo. Paramètres : sessionId, to, caption, videoUrl, videoBase64.</p>
                    </div>

                    <!-- POST /messages/send-audio -->
                    <div id="msg-audio" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/messages/send-audio</code>
                        </div>
                        <p class="text-gray-600 text-sm">Envoie un audio (voice note). Paramètres : sessionId, to, audioUrl, audioBase64, asVoice (bool).</p>
                    </div>

                    <!-- POST /messages/send-file -->
                    <div id="msg-file" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/messages/send-file</code>
                        </div>
                        <p class="text-gray-600 text-sm">Envoie un document. Paramètres : sessionId, to, caption, fileUrl, fileBase64, fileName.</p>
                    </div>

                    <!-- POST /messages/send-sticker -->
                    <div id="msg-sticker" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/messages/send-sticker</code>
                        </div>
                        <p class="text-gray-600 text-sm">Envoie un sticker. Paramètres : sessionId, to, stickerUrl, stickerBase64.</p>
                    </div>

                    <!-- POST /messages/send-location -->
                    <div id="msg-location" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/messages/send-location</code>
                        </div>
                        <p class="text-gray-600 text-sm">Envoie une localisation GPS. Paramètres : sessionId, to, latitude, longitude, description.</p>
                    </div>

                    <!-- POST /messages/send-contact -->
                    <div id="msg-contact" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/messages/send-contact</code>
                        </div>
                        <p class="text-gray-600 text-sm">Envoie un contact vCard. Paramètres : sessionId, to, contactName, contactNumber.</p>
                    </div>

                    <!-- POST /messages/:id/edit -->
                    <div id="msg-edit" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono break-all">/api/messages/:messageId/edit</code>
                        </div>
                        <p class="text-gray-600 text-sm">Édite un message envoyé.</p>
                    </div>

                    <!-- POST /messages/:id/delete -->
                    <div id="msg-delete" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono break-all">/api/messages/:messageId/delete</code>
                        </div>
                        <p class="text-gray-600 text-sm">Supprime un message. Paramètre everyone (bool).</p>
                    </div>

                    <!-- GET /messages/:id/status -->
                    <div id="msg-status" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono break-all">/api/messages/:messageId/status</code>
                        </div>
                        <p class="text-gray-600 text-sm">Retourne le statut du message (pending, sent, delivered, read).</p>
                    </div>

                    <!-- GET /sessions/:id/messages -->
                    <div id="msg-history" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono break-all">/api/sessions/:sessionId/messages</code>
                        </div>
                        <p class="text-gray-600 text-sm">Liste tous les messages envoyés pour une session. Paramètres optionnels : limit, offset, status.</p>
                    </div>
                </div>

                <!-- GROUPES SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b border-evergreen-200 pb-2">Groupes WhatsApp</h2>

                    <div id="groups-create" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/groups</code>
                        </div>
                        <p class="text-gray-600 text-sm">Crée un groupe. Paramètres : name (string), participants (array de numéros).</p>
                    </div>

                    <div id="groups-get" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/groups/:groupId</code>
                        </div>
                        <p class="text-gray-600 text-sm">Retourne les informations du groupe (nom, description, participants, propriétaire).</p>
                    </div>

                    <div id="groups-participants" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/groups/:groupId/participants</code>
                        </div>
                        <p class="text-gray-600 text-sm">Ajoute ou retire des participants. Paramètres : add (array), remove (array).</p>
                    </div>

                    <div id="groups-subject" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-put">PUT</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/groups/:groupId/subject</code>
                        </div>
                        <p class="text-gray-600 text-sm">Modifie le sujet du groupe. Paramètre : subject (string).</p>
                    </div>

                    <div id="groups-description" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-put">PUT</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/groups/:groupId/description</code>
                        </div>
                        <p class="text-gray-600 text-sm">Modifie la description du groupe. Paramètre : description (string).</p>
                    </div>
                </div>

                <!-- CONTACTS SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b border-evergreen-200 pb-2">Contacts WhatsApp</h2>

                    <div id="contacts-list" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/contacts</code>
                        </div>
                        <p class="text-gray-600 text-sm">Liste tous les contacts du compte WhatsApp.</p>
                    </div>

                    <div id="contacts-get" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/contacts/:contactId</code>
                        </div>
                        <p class="text-gray-600 text-sm">Infos détaillées d'un contact.</p>
                    </div>

                    <div id="contacts-block" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/contacts/:contactId/block</code>
                            <span class="method-badge method-post ml-2">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/unblock</code>
                        </div>
                        <p class="text-gray-600 text-sm">Bloque ou débloque un contact.</p>
                    </div>
                </div>

                <!-- PRESENCE SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b border-evergreen-200 pb-2">Présence et états</h2>

                    <div id="presence-typing" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/chats/:chatId/typing</code>
                        </div>
                        <p class="text-gray-600 text-sm">Simule l'écriture dans un chat.</p>
                    </div>

                    <div id="presence-recording" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/chats/:chatId/recording</code>
                        </div>
                        <p class="text-gray-600 text-sm">Simule l'enregistrement audio.</p>
                    </div>

                    <div id="presence-get" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/chats/:chatId/presence</code>
                        </div>
                        <p class="text-gray-600 text-sm">Retourne la présence du contact.</p>
                    </div>
                </div>

                <!-- CHATS SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b border-evergreen-200 pb-2">Gestion des chats</h2>

                    <div id="chats-list" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/chats</code>
                        </div>
                        <p class="text-gray-600 text-sm">Liste tous les chats avec leurs métadonnées.</p>
                    </div>

                    <div id="chats-archive" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/chats/:chatId/archive</code>
                            <span class="method-badge method-post ml-2">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/unarchive</code>
                        </div>
                        <p class="text-gray-600 text-sm">Archive ou désarchive un chat.</p>
                    </div>

                    <div id="chats-pin" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-post">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/sessions/:sessionId/chats/:chatId/pin</code>
                            <span class="method-badge method-post ml-2">POST</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/unpin</code>
                        </div>
                        <p class="text-gray-600 text-sm">Épingle ou désépingle un chat.</p>
                    </div>
                </div>

                <!-- SYSTEM SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b border-evergreen-200 pb-2">Système et monitoring</h2>

                    <div id="health" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/health</code>
                        </div>
                        <p class="text-gray-600 text-sm">Health check basique.</p>
                        <div class="response-example mt-2">
                            <pre class="text-xs text-gray-300"><code>{
  "status": "ok",
  "activeSessions": 3,
  "trackedMessages": 1250,
  "timestamp": "2025-04-01T10:00:00Z"
}</code></pre>
                        </div>
                    </div>

                    <div id="health-extended" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/health/extended</code>
                        </div>
                        <p class="text-gray-600 text-sm">Health check détaillé avec métriques PHP, cache, mémoire.</p>
                    </div>

                    <div id="stats" class="endpoint-card bg-white rounded-2xl p-5">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="method-badge method-get">GET</span>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/stats</code>
                        </div>
                        <p class="text-gray-600 text-sm">Statistiques globales : sessions actives, messages par statut.</p>
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
                            <h3 class="font-bold text-white text-sm">Keep-alive régulier</h3>
                            <p class="text-gray-300 text-xs mt-1">Appelez /ping toutes les 30-60 secondes pour maintenir la session active</p>
                        </div>
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <svg class="w-6 h-6 text-evergreen-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <h3 class="font-bold text-white text-sm">Réparation automatique</h3>
                            <p class="text-gray-300 text-xs mt-1">En cas d'échec d'envoi, appelez /repair pour restaurer la connexion</p>
                        </div>
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <svg class="w-6 h-6 text-emerald-depths-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="font-bold text-white text-sm">Suivez vos messages</h3>
                            <p class="text-gray-300 text-xs mt-1">Stockez les messageId pour tracker les accusés de réception</p>
                        </div>
                    </div>
                </section>

                <!-- FAQ -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-6">Foire aux questions</h2>
                    <div class="space-y-4">
                        <div class="border rounded-xl p-4">
                            <h3 class="font-semibold text-brand-dark">Comment obtenir ma clé API ?</h3>
                            <p class="text-sm text-gray-600 mt-1">Créez un compte sur notre plateforme et accédez à la section "API Keys" de votre tableau de bord.</p>
                        </div>
                        <div class="border rounded-xl p-4">
                            <h3 class="font-semibold text-brand-dark">Que faire si le QR Code expire ?</h3>
                            <p class="text-sm text-gray-600 mt-1">Utilisez l'endpoint /repair pour générer un nouveau QR Code.</p>
                        </div>
                        <div class="border rounded-xl p-4">
                            <h3 class="font-semibold text-brand-dark">Puis-je utiliser le même numéro sur plusieurs sessions ?</h3>
                            <p class="text-sm text-gray-600 mt-1">Non, un numéro WhatsApp ne peut être connecté qu'à une seule session à la fois.</p>
                        </div>
                        <div class="border rounded-xl p-4">
                            <h3 class="font-semibold text-brand-dark">Les sessions sont-elles persistantes ?</h3>
                            <p class="text-sm text-gray-600 mt-1">Oui, les sessions sont conservées localement et se reconnectent automatiquement au redémarrage.</p>
                        </div>
                    </div>
                </section>

                <!-- Footer -->
                <footer class="pt-8 border-t border-gray-100 text-center text-gray-400 text-xs md:text-sm">
                    <p>&copy; 2025 NotifyBridge. Tous droits réservés.</p>
                    <p class="mt-2">API v6.0 | Dernière mise à jour : Avril 2025 | <a href="#" class="text-evergreen-600 hover:underline">Statut du service</a></p>
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

        // Tab switching logic
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const targetId = btn.getAttribute('data-tab');
                const container = btn.closest('.border');
                if (container) {
                    const allTabs = container.querySelectorAll('.tab-btn');
                    const allCodeBlocks = container.querySelectorAll('.code-block');
                    allTabs.forEach(tab => tab.classList.remove('active', 'text-evergreen-600', 'border-b-2', 'border-evergreen-500'));
                    allCodeBlocks.forEach(block => block.classList.add('hidden'));
                    btn.classList.add('active', 'text-evergreen-600', 'border-b-2', 'border-evergreen-500');
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) targetElement.classList.remove('hidden');
                }
            });
            
            // Activate first tab by default in each container
            const container = btn.closest('.border');
            if (container && btn === container.querySelector('.tab-btn')) {
                btn.click();
            }
        });

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