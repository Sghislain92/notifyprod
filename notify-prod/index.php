<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>NotifyBridge | API WhatsApp Business multi‑sessions</title>
    <meta name="description" content="API WhatsApp puissante pour connecter plusieurs numéros, envoyer des messages illimités et automatiser vos communications. Intégration facile pour e‑commerce, CRM, SaaS.">
    <meta name="keywords" content="whatsapp api, business api, multi‑session, notification, webhook, automatisation, côte d'ivoire, afrique">
    <meta name="author" content="NotifyBridge">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook / LinkedIn / WhatsApp / Telegram -->
    <meta property="og:title" content="NotifyBridge – API WhatsApp multi‑numéros">
    <meta property="og:description" content="Connectez plusieurs comptes WhatsApp, envoyez des messages illimités, gérez vos automatisations via une API REST simple. Plans dès 5 000 FCFA/mois.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://notifybridge.com">
    <meta property="og:image" content="https://notifybridge.com/og-image.jpg">
    <meta property="og:image:alt" content="NotifyBridge – API WhatsApp Business">
    <meta property="og:site_name" content="NotifyBridge">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="NotifyBridge – API WhatsApp multi‑numéros">
    <meta name="twitter:description" content="API WhatsApp pour connecter plusieurs numéros, messages illimités, webhooks, automatisations. Essai gratuit disponible.">
    <meta name="twitter:image" content="https://notifybridge.com/og-image.jpg">
    <meta name="twitter:site" content="@notifybridge">
    
    <!-- Canonical -->
    <link rel="canonical" href="https://notifybridge.com">
    
    <!-- Tailwind CSS + Custom config -->
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
        @font-face {
            font-family: 'ITC Avant Garde Gothic';
            src: local('ITC Avant Garde Gothic Std Bold'), local('ITCAvantGardeStd-Bold');
            font-weight: bold;
            font-style: normal;
        }

        .hover-scale {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .hover-scale:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 25px -12px rgba(0,0,0,0.1);
        }
        
        .fade-up { 
            opacity: 0; 
            transform: translateY(20px); 
            transition: opacity 0.6s ease, transform 0.6s ease; 
        }
        
        .fade-up.visible { 
            opacity: 1; 
            transform: translateY(0); 
        }
        
        /* Animation QR Hero */
        .qr-pulse {
            animation: qr-pulse 3s ease-in-out infinite;
            transform-origin: center;
        }
        
        @keyframes qr-pulse {
            0%, 100% { transform: scale(1); opacity: 0.9; }
            50% { transform: scale(1.05); opacity: 1; }
        }
        
        /* Code syntax highlighting */
        .code-block { background: #1e293b; color: #e2e8f0; font-family: 'JetBrains Mono', monospace; }
        .code-keyword { color: #38bdf8; }
        .code-string { color: #10b981; }
        .code-comment { color: #64748b; font-style: italic; }
        textarea {
            resize: vertical;
        }

    </style>
    <!-- Heroicons via SVG inline -->
</head>
<body class="bg-white text-gray-800 font-sans antialiased">
    <!-- ========== HEADER ========== -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <!-- Logo -->
                <a href="https://notify.caddieverse.com/">
                    <div class="flex items-center space-x-2">
                        <svg class="w-8 h-8 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        <span class="text-2xl font-bold tracking-tight text-brand-dark">Notify<span class="text-evergreen-500">Bridge</span></span>
                    </div>
                </a>
                <!-- Desktop menu -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="https://notify.caddieverse.com/" class="text-gray-700 hover:text-evergreen-600 transition font-semibold">Accueil</a>
                    <a href="#fonctionnalites" class="text-gray-700 hover:text-evergreen-600 transition font-semibold">Fonctionnalités</a>
                    <a href="#tarifs" class="text-gray-700 hover:text-evergreen-600 transition font-semibold">Tarifs</a>
                    <a href="https://notify.caddieverse.com/htdocs/documentation/" class="text-gray-700 hover:text-evergreen-600 transition font-semibold">Documentation</a>
                    <a href="#demo" class="text-gray-700 hover:text-evergreen-600 transition font-semibold">Démo</a>
                </nav>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#" class="bg-brand-dark text-vanilla-custard-100 px-8 py-4 rounded-xl font-semibold hover:bg-brand-forest transition-all flex items-center justify-center gap-2">Commencer maintenant</a>
                    <a href="#" class="bg-vanilla-custard-500 text-brand-dark px-8 py-4 rounded-xl font-semibold transition">Se connecter</a>
                </div>
                <!-- mobile menu button -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-gray-600 hover:text-evergreen-500 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- mobile menu (hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 px-4 pb-4">
            <a href="https://notify.caddieverse.com/" class="block py-2 text-gray-700 hover:text-evergreen-600 font-semibold">Accueil</a>
            <a href="#fonctionnalites" class="block py-2 text-gray-700 hover:text-evergreen-600 font-semibold">Fonctionnalités</a>
            <a href="#tarifs" class="block py-2 text-gray-700 hover:text-evergreen-600 font-semibold">Tarifs</a>
            <a href="https://notify.caddieverse.com/htdocs/documentation/" class="block py-2 text-gray-700 hover:text-evergreen-600 font-semibold">Documentation</a>
            <a href="#demo" class="block py-2 text-gray-700 hover:text-evergreen-600 font-semibold">Démo</a>
            <a href="#" class="bg-brand-dark text-vanilla-custard-100 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-brand-forest transition-all hover:scale-105 flex items-center justify-center gap-2">Commencer maintenant</a>
            <a href="#" class="bg-vanilla-custard-500 text-vanilla-custard-100 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-brand-forest transition-all hover:scale-105 flex items-center justify-center gap-2">Se connecter</a>
        </div>
    </header>

    <main>
        <!-- ========== HERO SECTION ========== -->
        <section id="accueil" class="relative overflow-hidden bg-gradient-to-br from-brand-light-cream via-white to-evergreen-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="fade-up">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight tracking-tight text-brand-dark">
                            Automatisez vos communications 
                            <span class="text-evergreen-500">WhatsApp</span> sans limites
                        </h1>
                        <p class="mt-6 text-lg text-gray-600">API REST puissante, multi‑numéros, messages illimités. Intégrez facilement à votre e‑commerce, CRM ou SaaS. Webhooks temps réel, automatisations avancées.</p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="#demo" class="bg-brand-dark text-vanilla-custard-100 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-brand-forest transition-all hover:scale-105 flex items-center justify-center gap-2">Commencer maintenant</a>
                            <a href="https://notify.caddieverse.com/htdocs/api/" class="bg-vanilla-custard-500 text-brand-dark px-8 py-4 rounded-xl font-semibold transition">Voir l'API</a>
                        </div>
                        <div class="mt-8 flex items-center space-x-6 text-sm text-gray-500">
                            <div class="flex items-center space-x-1">
                                <svg class="w-5 h-5 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>Messages illimités</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <svg class="w-5 h-5 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>Jusqu'à 10+ numéros</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <svg class="w-5 h-5 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>API REST complète</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- QR Animation Hero -->
                    <div class="relative flex justify-center fade-up">
                        <div class="relative w-80 h-80">
                            <!-- QR Code principal avec animation pulse -->
                            <div class="absolute inset-0 qr-pulse">
                                <svg class="w-full h-full text-evergreen-500" viewBox="0 0 100 100" fill="currentColor">
                                    <!-- QR Code stylisé -->
                                    <rect x="0" y="0" width="20" height="20"/>
                                    <rect x="0" y="25" width="5" height="5"/>
                                    <rect x="10" y="25" width="10" height="5"/>
                                    <rect x="0" y="35" width="5" height="5"/>
                                    <rect x="15" y="35" width="5" height="5"/>
                                    <rect x="0" y="80" width="20" height="20"/>
                                    <rect x="80" y="0" width="20" height="20"/>
                                    <rect x="80" y="80" width="20" height="20"/>
                                    <!-- Patterns intérieurs -->
                                    <rect x="5" y="5" width="10" height="10" fill="white"/>
                                    <rect x="85" y="5" width="10" height="10" fill="white"/>
                                    <rect x="5" y="85" width="10" height="10" fill="white"/>
                                    <rect x="85" y="85" width="10" height="10" fill="white"/>
                                    <!-- Points centraux -->
                                    <rect x="8" y="8" width="4" height="4"/>
                                    <rect x="88" y="8" width="4" height="4"/>
                                    <rect x="8" y="88" width="4" height="4"/>
                                    <rect x="88" y="88" width="4" height="4"/>
                                    <!-- Pattern data -->
                                    <rect x="30" y="10" width="5" height="5"/>
                                    <rect x="40" y="15" width="5" height="5"/>
                                    <rect x="50" y="10" width="5" height="5"/>
                                    <rect x="60" y="15" width="5" height="5"/>
                                    <rect x="35" y="25" width="5" height="5"/>
                                    <rect x="45" y="30" width="5" height="5"/>
                                    <rect x="55" y="25" width="5" height="5"/>
                                    <rect x="30" y="40" width="5" height="5"/>
                                    <rect x="45" y="45" width="10" height="10"/>
                                    <rect x="65" y="40" width="5" height="5"/>
                                    <rect x="25" y="55" width="5" height="5"/>
                                    <rect x="35" y="60" width="5" height="5"/>
                                    <rect x="50" y="65" width="5" height="5"/>
                                    <rect x="65" y="55" width="5" height="5"/>
                                </svg>
                            </div>
                            <!-- Glow effect -->
                            <div class="absolute inset-0 bg-evergreen-500/20 rounded-2xl blur-xl -z-10 qr-pulse"></div>
                            <!-- Floating particles -->
                            <div class="absolute -top-4 -right-4 w-3 h-3 bg-vanilla-custard-400 rounded-full animate-bounce" style="animation-delay: 0s;"></div>
                            <div class="absolute top-10 -left-6 w-2 h-2 bg-evergreen-300 rounded-full animate-bounce" style="animation-delay: 1s;"></div>
                            <div class="absolute -bottom-6 right-12 w-4 h-4 bg-emerald-depths-300 rounded-full animate-bounce" style="animation-delay: 2s;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ========== FONCTIONNALITÉS ========== -->
        <section id="fonctionnalites" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-dark">Pourquoi choisir <span class="text-evergreen-500">NotifyBridge</span> ?</h2>
                    <p class="mt-4 text-xl text-gray-500 max-w-2xl mx-auto">Une API complète pour automatiser WhatsApp sans compromis.</p>
                </div>
                <div class="mt-16 grid md:grid-cols-3 gap-8">
                    <div class="bg-gradient-to-br from-emerald-depths-50 rounded-2xl p-6 shadow-sm hover-scale fade-up">
                        <div class="w-12 h-12 bg-brand-dark rounded-lg flex items-center justify-center"><svg class="w-6 h-6 text-evergreen-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15" /></svg></div>
                        <h3 class="mt-4 text-xl font-bold text-brand-dark">Multi‑numéros</h3>
                        <p class="mt-2 text-gray-600">Connectez 2, 5, 10 numéros ou plus selon votre plan. Gérez plusieurs applications simultanément.</p>
                    </div>
                    <div class="bg-gradient-to-br from-vanilla-custard-50 to-white rounded-2xl p-6 shadow-sm hover-scale fade-up">
                        <div class="w-12 h-12 bg-brand-dark rounded-lg flex items-center justify-center"><svg class="w-6 h-6 text-evergreen-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg></div>
                        <h3 class="mt-4 text-xl font-bold text-brand-dark">API REST & Webhooks</h3>
                        <p class="mt-2 text-gray-600">Envoi de messages, images, vidéos, fichiers. Webhooks temps réel pour recevoir les statuts de lecture.</p>
                    </div>
                    <div class="bg-gradient-to-br from-evergreen-50 rounded-2xl p-6 shadow-sm hover-scale fade-up">
                        <div class="w-12 h-12 bg-brand-dark rounded-lg flex items-center justify-center"><svg class="w-6 h-6 text-evergreen-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" /></svg></div>
                        <h3 class="mt-4 text-xl font-bold text-brand-dark">Automatisations avancées</h3>
                        <p class="mt-2 text-gray-600">Relances, notifications, campagnes marketing, envoi groupé, suivi des lectures.</p>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- ========== SECTION API - STYLE MODERNE ========== -->
        <section id="api" class="py-20 lg:py-32 bg-gradient-to-br from-emerald-depths-50 via-white to-evergreen-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Left Content -->
                    <div class="fade-up">
                        <span class="inline-block bg-brand-dark text-evergreen-400 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                            API REST
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-bold text-brand-dark mb-6">
                            Une API <span class="text-evergreen-500">puissante</span> et <span class="text-evergreen-500">documentée</span>
                        </h2>
                        <p class="text-lg text-emerald-depths-600 mb-8">
                            Intégrez NotifyBridge à vos systèmes existants grâce à notre API RESTful complète. 
                            Documentation interactive, SDKs dans plusieurs langages, et support technique dédié.
                        </p>
                        
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 bg-evergreen-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-emerald-depths-700 font-medium">Authentification par clé API sécurisée</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 bg-evergreen-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-emerald-depths-700 font-medium">Messages illimités avec suivi temps réel</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 bg-evergreen-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-emerald-depths-700 font-medium">Réponses JSON structurées et cohérentes</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 bg-evergreen-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-emerald-depths-700 font-medium">Webhooks pour recevoir les statuts de lecture</span>
                            </li>
                        </ul>
                        
                        <a href="https://notify.caddieverse.com/htdocs/documentation/" class="inline-flex items-center gap-2 bg-brand-dark text-vanilla-custard-100 px-8 py-4 rounded-xl font-semibold hover:bg-brand-forest transition-all duration-300 shadow-lg hover:shadow-xl group">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                            Documentation complète
                        </a>
                    </div>
                    
                    <!-- Right Content - Code Preview avec Tabs -->
                    <div class="bg-brand-dark rounded-2xl overflow-hidden shadow-2xl fade-up">
                        <div class="flex items-center gap-2 px-4 py-3 bg-brand-deep border-b border-emerald-depths-800">
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                            <span class="ml-4 text-emerald-depths-400 text-sm font-mono">api.notifybridge.com</span>
                        </div>
                        
                        <!-- Language Tabs -->
                        <div class="flex border-b border-emerald-depths-800 px-4 pt-3">
                            <button data-api-tab="curl" class="api-tab-btn px-4 py-2 text-sm font-medium text-emerald-depths-300 hover:text-evergreen-400 transition-colors border-b-2 border-transparent data-[active=true]:border-evergreen-500 data-[active=true]:text-evergreen-400">cURL</button>
                            <button data-api-tab="php" class="api-tab-btn px-4 py-2 text-sm font-medium text-emerald-depths-300 hover:text-evergreen-400 transition-colors border-b-2 border-transparent">PHP</button>
                            <button data-api-tab="js" class="api-tab-btn px-4 py-2 text-sm font-medium text-emerald-depths-300 hover:text-evergreen-400 transition-colors border-b-2 border-transparent">JavaScript</button>
                            <button data-api-tab="python" class="api-tab-btn px-4 py-2 text-sm font-medium text-emerald-depths-300 hover:text-evergreen-400 transition-colors border-b-2 border-transparent">Python</button>
                        </div>
                        
                        <!-- Code Blocks -->
                        <div class="p-6 overflow-x-auto">
                            <!-- cURL -->
                            <div id="api-code-curl" class="api-code-block">
                                <pre class="text-sm font-mono"><code class="text-emerald-depths-300"><span class="text-vanilla-custard-400">curl -X POST</span> https://api.notifybridge.com/api/sessions/mon_id/start \
          -H <span class="text-evergreen-400">"x-api-key: nb_live_xxxxxxxxxxxxx"</span> \
          -H <span class="text-evergreen-400">"Content-Type: application/json"</span>
        
        <span class="text-vanilla-custard-400">curl</span> https://api.notifybridge.com/api/sessions/mon_id/qr \
          -H <span class="text-evergreen-400">"x-api-key: nb_live_xxxxxxxxxxxxx"</span>
        
        <span class="text-vanilla-custard-400">curl -X POST</span> https://api.notifybridge.com/api/messages/send \
          -H <span class="text-evergreen-400">"x-api-key: nb_live_xxxxxxxxxxxxx"</span> \
          -H <span class="text-evergreen-400">"Content-Type: application/json"</span> \
          -d <span class="text-vanilla-custard-300">'{
            "sessionId": "mon_id",
            "to": "22912345678@c.us",
            "text": "Bonjour depuis l'API !"
          }'</span></code></pre>
                            </div>
                            
                            <!-- PHP -->
                            <div id="api-code-php" class="api-code-block hidden">
                                <pre class="text-sm font-mono"><code class="text-emerald-depths-300"><span class="text-vanilla-custard-400">&lt;?php</span>
        <span class="text-evergreen-400">$apiKey</span> = <span class="text-vanilla-custard-300">'nb_live_xxxxxxxxxxxxx'</span>;
        <span class="text-evergreen-400">$baseUrl</span> = <span class="text-vanilla-custard-300">'https://api.notifybridge.com'</span>;
        
        <span class="text-vanilla-custard-400">// Démarrer une session</span>
        <span class="text-evergreen-400">$ch</span> = curl_init(<span class="text-vanilla-custard-300">$baseUrl . '/api/sessions/mon_id/start'</span>);
        curl_setopt(<span class="text-evergreen-400">$ch</span>, CURLOPT_POST, true);
        curl_setopt(<span class="text-evergreen-400">$ch</span>, CURLOPT_HTTPHEADER, [<span class="text-vanilla-custard-300">"x-api-key: $apiKey"</span>]);
        curl_exec(<span class="text-evergreen-400">$ch</span>);
        
        <span class="text-vanilla-custard-400">// Envoyer un message</span>
        <span class="text-evergreen-400">$payload</span> = [
            <span class="text-vanilla-custard-300">'sessionId'</span> => <span class="text-vanilla-custard-300">'mon_id'</span>,
            <span class="text-vanilla-custard-300">'to'</span> => <span class="text-vanilla-custard-300">'22912345678@c.us'</span>,
            <span class="text-vanilla-custard-300">'text'</span> => <span class="text-vanilla-custard-300">'Bonjour !'</span>
        ];
        curl_setopt(<span class="text-evergreen-400">$ch</span>, CURLOPT_POSTFIELDS, json_encode(<span class="text-evergreen-400">$payload</span>));
        curl_exec(<span class="text-evergreen-400">$ch</span>);
        ?&gt;</code></pre>
                            </div>
                            
                            <!-- JavaScript -->
                            <div id="api-code-js" class="api-code-block hidden">
                                <pre class="text-sm font-mono"><code class="text-emerald-depths-300"><span class="text-vanilla-custard-400">const</span> API_KEY = <span class="text-vanilla-custard-300">'nb_live_xxxxxxxxxxxxx'</span>;
        <span class="text-vanilla-custard-400">const</span> BASE_URL = <span class="text-vanilla-custard-300">'https://api.notifybridge.com'</span>;
        
        <span class="text-vanilla-custard-400">// Démarrer une session</span>
        <span class="text-vanilla-custard-400">await</span> fetch(<span class="text-vanilla-custard-300">`${BASE_URL}/api/sessions/mon_id/start`</span>, {
            method: <span class="text-vanilla-custard-300">'POST'</span>,
            headers: { <span class="text-vanilla-custard-300">'x-api-key'</span>: API_KEY }
        });
        
        <span class="text-vanilla-custard-400">// Envoyer un message</span>
        <span class="text-vanilla-custard-400">await</span> fetch(<span class="text-vanilla-custard-300">`${BASE_URL}/api/messages/send`</span>, {
            method: <span class="text-vanilla-custard-300">'POST'</span>,
            headers: {
                <span class="text-vanilla-custard-300">'x-api-key'</span>: API_KEY,
                <span class="text-vanilla-custard-300">'Content-Type'</span>: <span class="text-vanilla-custard-300">'application/json'</span>
            },
            body: JSON.stringify({
                sessionId: <span class="text-vanilla-custard-300">'mon_id'</span>,
                to: <span class="text-vanilla-custard-300">'22912345678@c.us'</span>,
                text: <span class="text-vanilla-custard-300">'Bonjour !'</span>
            })
        });</code></pre>
                            </div>
                            
                            <!-- Python -->
                            <div id="api-code-python" class="api-code-block hidden">
                                <pre class="text-sm font-mono"><code class="text-emerald-depths-300"><span class="text-vanilla-custard-400">import</span> requests
        
        <span class="text-evergreen-400">API_KEY</span> = <span class="text-vanilla-custard-300">'nb_live_xxxxxxxxxxxxx'</span>
        <span class="text-evergreen-400">BASE_URL</span> = <span class="text-vanilla-custard-300">'https://api.notifybridge.com'</span>
        
        <span class="text-vanilla-custard-400"># Démarrer une session</span>
        <span class="text-evergreen-400">response</span> = requests.post(
            <span class="text-vanilla-custard-300">f"{BASE_URL}/api/sessions/mon_id/start"</span>,
            headers={<span class="text-vanilla-custard-300">'x-api-key'</span>: API_KEY}
        )
        
        <span class="text-vanilla-custard-400"># Envoyer un message</span>
        <span class="text-evergreen-400">payload</span> = {
            <span class="text-vanilla-custard-300">'sessionId'</span>: <span class="text-vanilla-custard-300">'mon_id'</span>,
            <span class="text-vanilla-custard-300">'to'</span>: <span class="text-vanilla-custard-300">'22912345678@c.us'</span>,
            <span class="text-vanilla-custard-300">'text'</span>: <span class="text-vanilla-custard-300">'Bonjour !'</span>
        }
        <span class="text-evergreen-400">response</span> = requests.post(
            <span class="text-vanilla-custard-300">f"{BASE_URL}/api/messages/send"</span>,
            json=<span class="text-evergreen-400">payload</span>,
            headers={<span class="text-vanilla-custard-300">'x-api-key'</span>: API_KEY}
        )</code></pre>
                            </div>
                        </div>
                        
                        <!-- Info badge -->
                        <div class="px-6 py-3 bg-brand-deep/50 border-t border-emerald-depths-800 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-evergreen-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-xs text-emerald-depths-400">Tous les exemples incluent la gestion d'erreurs</span>
                            </div>
                            <button class="text-xs text-evergreen-400 hover:text-evergreen-300 transition-colors flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                Copier l'exemple
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Endpoints grid (3 endpoints) -->
                <div class="mt-20 grid md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all">
                        <div class="w-12 h-12 bg-evergreen-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-evergreen-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">POST /sessions/:id/start</h3>
                        <p class="text-gray-500 text-sm mb-3">Démarre une session WhatsApp et génère un QR code</p>
                        <div class="flex items-center gap-2 text-xs text-gray-400 font-mono">
                            <span class="px-2 py-1 bg-gray-100 rounded">Retourne sessionId</span>
                            <span class="px-2 py-1 bg-gray-100 rounded">Statut STARTING</span>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all">
                        <div class="w-12 h-12 bg-evergreen-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-evergreen-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 9.75h16.5m-16.5 0a2.25 2.25 0 01-2.25-2.25V6.75A2.25 2.25 0 013.75 4.5h16.5A2.25 2.25 0 0122.5 6.75v.75a2.25 2.25 0 01-2.25 2.25m-16.5 0v6m0 0a2.25 2.25 0 002.25 2.25h12a2.25 2.25 0 002.25-2.25v-6"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">GET /sessions/:id/qr</h3>
                        <p class="text-gray-500 text-sm mb-3">Récupère le QR code au format base64 (data URL)</p>
                        <div class="flex items-center gap-2 text-xs text-gray-400 font-mono">
                            <span class="px-2 py-1 bg-gray-100 rounded">Retourne image base64</span>
                            <span class="px-2 py-1 bg-gray-100 rounded">Expiration 20s</span>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all">
                        <div class="w-12 h-12 bg-evergreen-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-evergreen-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">POST /messages/send</h3>
                        <p class="text-gray-500 text-sm mb-3">Envoie un message texte, image, vidéo ou fichier</p>
                        <div class="flex items-center gap-2 text-xs text-gray-400 font-mono">
                            <span class="px-2 py-1 bg-gray-100 rounded">Messages illimités</span>
                            <span class="px-2 py-1 bg-gray-100 rounded">Suivi temps réel</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- ========== DÉMO INTERACTIVE ========== -->
        <section id="demo" class="py-20 bg-brand-light-cream">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-dark">Testez l'API en direct</h2>
                    <p class="mt-2 text-gray-600">Connectez votre WhatsApp et envoyez vos premiers messages via notre API.</p>
                </div>
                
                <div class="mt-12 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="p-6 md:p-8">
                        <!-- Status Panel -->
                        <div class="flex items-center justify-between flex-wrap gap-4 mb-8 p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <div id="demo-status-dot" class="w-3 h-3 bg-gray-400 rounded-full"></div>
                                    <span id="demo-status-text" class="text-sm font-medium">Déconnecté</span>
                                </div>
                                <div id="demo-session-info" class="text-xs text-gray-500">Cliquez sur "Nouvelle Session" pour commencer</div>
                                <div id="demo-message-count" class="hidden text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">0/4 messages</div>
                            </div>
                            <div class="flex gap-2">
                                <button id="demo-start-btn" class="px-4 py-2 bg-evergreen-500 text-white rounded-lg text-sm hover:bg-evergreen-600 transition disabled:opacity-50">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Nouvelle Session
                                </button>
                                <button id="demo-refresh-qr" class="px-4 py-2 bg-blue-500 text-white rounded-lg text-sm hover:bg-blue-600 transition disabled:opacity-50" disabled>
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Actualiser QR
                                </button>
                                <button id="demo-stop-btn" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600 transition disabled:opacity-50" disabled>
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Fermer
                                </button>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- QR Section -->
                            <div class="space-y-6">
                                <div class="text-center">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Code QR WhatsApp</h3>
                                    <div class="relative">
                                        <div class="w-80 h-80 mx-auto border-2 border-gray-200 rounded-xl flex items-center justify-center bg-gray-50">
                                            <div id="demo-qr-loading" class="flex flex-col items-center">
                                                <div class="animate-spin rounded-full h-12 w-12 border-4 border-gray-200 border-t-evergreen-500"></div>
                                                <p class="text-sm mt-3 text-gray-600">Génération QR...</p>
                                            </div>
                                            <div id="demo-qr-img" class="hidden w-full h-full flex items-center justify-center"></div>
                                        </div>
                                        <div id="demo-qr-timer" class="hidden absolute top-2 right-2 bg-white/90 px-2 py-1 rounded-lg text-xs font-medium">
                                            <span id="demo-timer-seconds">0</span>s
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Session Info -->
                                <div id="demo-connection-info" class="hidden bg-green-50 border border-green-200 rounded-lg p-4">
                                    <h4 class="font-medium text-green-800 mb-3">✅ WhatsApp Connecté</h4>
                                    <div id="demo-connection-details" class="space-y-2 text-sm"></div>
                                </div>
                            </div>

                            <!-- Message Form -->
                            <div class="space-y-6">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Envoyer un message de test</h3>
                                    <div id="demo-message-form" class="space-y-4">
                                        <div>
                                            <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2">
                                                <svg class="w-4 h-4 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                                <span>Numéro destinataire</span>
                                            </label>
                                            <input type="text" id="demo-recipient" placeholder="22912345678" 
                                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-evergreen-500 focus:border-transparent disabled:opacity-50" disabled>
                                            <p class="text-xs text-gray-500 mt-1">Format international sans le + (ex: 22912345678)</p>
                                        </div>
                                        
                                        <div>
                                            <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2">
                                                <svg class="w-4 h-4 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                                <span>Message</span>
                                            </label>
                                            <textarea id="demo-message" rows="4" placeholder="Salut ! Je teste l'API NotifyBridge 🚀"
                                                      class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm resize-y min-h-[100px] focus:ring-2 focus:ring-evergreen-500 focus:border-transparent disabled:opacity-50" disabled></textarea>
                                        </div>
                                        
                                        <button id="demo-send-btn" class="w-full bg-blue-500 text-white px-4 py-3 rounded-lg text-sm font-medium hover:bg-blue-600 transition disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                            </svg>
                                            Envoyer message de test
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Results -->
                                <div id="demo-results" class="space-y-3"></div>
                                <div id="demo-warning" class="hidden mb-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.732 16.5c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                        <p class="text-sm text-yellow-800">
                                            <strong>Important :</strong> Un numéro WhatsApp ne peut être connecté qu'à une seule session à la fois.
                                            Si vous avez déjà connecté ce numéro ailleurs, il sera automatiquement déconnecté ici.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== TARIFS ========== -->
        <section id="tarifs" class="py-20 lg:py-28 bg-gradient-to-b from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center fade-up">
                    <span class="inline-block bg-brand-dark text-evergreen-400 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                        Tarifs transparents
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-dark">Des plans adaptés à tous vos besoins</h2>
                    <p class="mt-4 text-lg text-gray-500 max-w-2xl mx-auto">Sans engagement, messages illimités, support prioritaire. Évoluez facilement d'un forfait à l'autre.</p>
                </div>
                
                <div class="mt-16 grid md:grid-cols-4 gap-6">
                    <!-- STARTER -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 fade-up flex flex-col">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-brand-dark">Starter</h3>
                            <div class="mt-4">
                                <span class="text-4xl font-bold text-evergreen-600">5 000</span>
                                <span class="text-gray-500"> FCFA</span>
                                <p class="text-sm text-gray-400">/mois</p>
                            </div>
                        </div>
                        <ul class="mt-6 space-y-3 text-sm flex-grow">
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>2 numéros WhatsApp</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>2 applications connectées</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Messages illimités</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>API REST + Webhooks</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Support standard</li>
                        </ul>
                        <div class="mt-8">
                            <a href="#" class="block w-full bg-brand-dark text-vanilla-custard-100 px-6 py-3 rounded-xl font-semibold text-center hover:bg-brand-forest transition-all duration-300">Choisir ce plan</a>
                            <a href="#" class="block w-full text-center text-xs text-gray-400 hover:text-evergreen-500 mt-3 transition-colors">Voir plus de détails →</a>
                        </div>
                    </div>
                    
                    <!-- GROWTH - RECOMMANDÉ -->
                    <div class="bg-white rounded-2xl p-6 shadow-xl border-2 border-vanilla-custard-500 relative hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 fade-up flex flex-col">
                        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                            <span class="bg-vanilla-custard-500 text-brand-dark text-xs font-bold px-4 py-1 rounded-full shadow-md">RECOMMANDÉ</span>
                        </div>
                        <div class="text-center mt-2">
                            <h3 class="text-2xl font-bold text-brand-dark">Growth</h3>
                            <div class="mt-4">
                                <span class="text-4xl font-bold text-evergreen-600">12 500</span>
                                <span class="text-gray-500"> FCFA</span>
                                <p class="text-sm text-gray-400">/mois</p>
                            </div>
                        </div>
                        <ul class="mt-6 space-y-3 text-sm flex-grow">
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>5 numéros WhatsApp</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>5 applications connectées</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Médias (images, vidéos, audio)</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Automatisations + statistiques</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Support prioritaire</li>
                        </ul>
                        <div class="mt-8">
                            <a href="#" class="block w-full bg-vanilla-custard-500 text-brand-dark px-6 py-3 rounded-xl font-semibold text-center hover:bg-vanilla-custard-600 transition-all duration-300">Choisir ce plan</a>
                            <a href="#" class="block w-full text-center text-xs text-gray-400 hover:text-evergreen-500 mt-3 transition-colors">Voir plus de détails →</a>
                        </div>
                    </div>
                    
                    <!-- BUSINESS -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 fade-up flex flex-col">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-brand-dark">Business</h3>
                            <div class="mt-4">
                                <span class="text-4xl font-bold text-evergreen-600">25 000</span>
                                <span class="text-gray-500"> FCFA</span>
                                <p class="text-sm text-gray-400">/mois</p>
                            </div>
                        </div>
                        <ul class="mt-6 space-y-3 text-sm flex-grow">
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>10 numéros / 10 applications</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>API avancée multi‑clients</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Logs complets, statistiques</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Gestion multi‑utilisateurs</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Support prioritaire</li>
                        </ul>
                        <div class="mt-8">
                            <a href="#" class="block w-full bg-brand-dark text-vanilla-custard-100 px-6 py-3 rounded-xl font-semibold text-center hover:bg-brand-forest transition-all duration-300">Choisir ce plan</a>
                            <a href="#" class="block w-full text-center text-xs text-gray-400 hover:text-evergreen-500 mt-3 transition-colors">Voir plus de détails →</a>
                        </div>
                    </div>
                    
                    <!-- ENTERPRISE -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 fade-up flex flex-col">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-brand-dark">Enterprise</h3>
                            <div class="mt-4">
                                <span class="text-4xl font-bold text-evergreen-600">Sur devis</span>
                            </div>
                        </div>
                        <ul class="mt-6 space-y-3 text-sm flex-grow">
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Numéros illimités</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Infrastructure dédiée</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>SLA garanti 99.9%</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>API personnalisée</li>
                            <li class="flex items-center"><svg class="w-4 h-4 text-evergreen-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Support dédié 24/7</li>
                        </ul>
                        <div class="mt-8">
                            <a href="#" class="block w-full bg-brand-dark text-vanilla-custard-100 px-6 py-3 rounded-xl font-semibold text-center hover:bg-brand-forest transition-all duration-300">Nous contacter</a>
                            <a href="#" class="block w-full text-center text-xs text-gray-400 hover:text-evergreen-500 mt-3 transition-colors">Voir plus de détails →</a>
                        </div>
                    </div>
                </div>
                
                <!-- Lien vers la page de comparaison -->
                <div class="text-center mt-12">
                    <a href="#" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-evergreen-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Comparer tous les plans en détail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>


        <!-- ========== FAQ ========== -->
        <section class="py-20 bg-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-brand-dark">Questions fréquentes</h2>
                <div class="mt-12 space-y-4">
                    <details class="bg-gray-50 rounded-xl p-5 shadow-sm"><summary class="font-semibold cursor-pointer text-brand-dark">Comment connecter mon numéro WhatsApp ?</summary><p class="mt-2 text-gray-600">Via l’interface ou l’API, un QR code est généré. Scannez‑le avec WhatsApp Business pour lier votre appareil.</p></details>
                    <details class="bg-gray-50 rounded-xl p-5 shadow-sm"><summary class="font-semibold cursor-pointer text-brand-dark">Puis-je utiliser plusieurs numéros sur un même compte ?</summary><p class="mt-2 text-gray-600">Oui, chaque plan inclut un nombre de numéros simultanés. L’API gère plusieurs sessions indépendamment.</p></details>
                    <details class="bg-gray-50 rounded-xl p-5 shadow-sm"><summary class="font-semibold cursor-pointer text-brand-dark">Les messages sont‑ils limités ?</summary><p class="mt-2 text-gray-600">Non, tous nos plans proposent des messages illimités.</p></details>
                </div>
            </div>
        </section>
    </main>

    <!-- ========== FOOTER ========== -->
    <footer class="bg-brand-dark text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div><div class="flex items-center space-x-2"><svg class="w-6 h-6 text-evergreen-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg><span class="font-bold text-xl">NotifyBridge</span></div><p class="mt-2 text-sm text-gray-300">API WhatsApp multi‑numéros, automatisez vos communications.</p></div>
                <div><h4 class="font-semibold">Produit</h4><ul class="mt-2 space-y-1 text-sm text-gray-300"><li><a href="#" class="hover:text-evergreen-400">Fonctionnalités</a></li><li><a href="#" class="hover:text-evergreen-400">Tarifs</a></li><li><a href="#" class="hover:text-evergreen-400">API</a></li></ul></div>
                <div><h4 class="font-semibold">Ressources</h4><ul class="mt-2 space-y-1 text-sm text-gray-300"><li><a href="https://notify.caddieverse.com/htdocs/documentation/" class="hover:text-evergreen-400">Documentation</a></li><li><a href="#" class="hover:text-evergreen-400">Exemples</a></li><li><a href="#" class="hover:text-evergreen-400 flex items-center"><span id="status-indicator" class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>Statut API</a></li></ul></div>
                <div><h4 class="font-semibold">Légal</h4><ul class="mt-2 space-y-1 text-sm text-gray-300"><li><a href="#" class="hover:text-evergreen-400">Conditions</a></li><li><a href="#" class="hover:text-evergreen-400">Confidentialité</a></li><li><a href="#" class="hover:text-evergreen-400">Mentions légales</a></li></ul></div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-6 text-center text-sm text-gray-400">© 2026 NotifyBridge – Tous droits réservés.</div>
        </div>
    </footer>

    <!-- ========== JAVASCRIPT ========== -->
<script>
    // Configuration API
    const CONFIG = {
        API_KEY: 'BWxD1xkzuPxJ0luWnsaECtn3CVZkYG6dtNUxnwUsBWWwYwvkKYl1ZZWnDuP6M', 
        BASE_URL: 'https://notifybridge-production.up.railway.app',
        POLLING_INTERVAL: 3000,
        MAX_TEST_MESSAGES: 4
    };

    // State de la démo
    let demoState = {
        sessionId: null,
        status: 'disconnected',
        messageCount: 0,
        polling: false,
        pollingInterval: null,
        qrTimer: null,
        qrStartTime: null
    };

    // ========== MENU MOBILE ========== 
    const mobileMenuBtn = document.getElementById('mobile-menu-button');
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu) {
                mobileMenu.classList.toggle('hidden');
            }
        });
    }

    // ========== API CALLS ==========
    async function apiCall(method, endpoint, data = null) {
        try {
            const options = {
                method,
                headers: {
                    'x-api-key': CONFIG.API_KEY,
                    'Content-Type': 'application/json'
                }
            };
            
            if (data) {
                options.body = JSON.stringify(data);
            }
            
            const response = await fetch(`${CONFIG.BASE_URL}${endpoint}`, options);
            
            if (!response.ok) {
                const errorData = await response.json().catch(() => ({}));
                throw new Error(errorData.error || `HTTP ${response.status}`);
            }
            
            return await response.json();
        } catch (error) {
            console.error(`API Error (${endpoint}):`, error);
            throw error;
        }
    }

    // ========== DEMO FUNCTIONS ==========
    function updateDemoStatus(status, message, color = 'gray') {
        const statusDot = document.getElementById('demo-status-dot');
        const statusText = document.getElementById('demo-status-text');
        const sessionInfo = document.getElementById('demo-session-info');
        
        if (!statusDot || !statusText || !sessionInfo) return;
        
        const colorMap = {
            gray: 'bg-gray-400',
            green: 'bg-green-500 animate-pulse',
            orange: 'bg-orange-500 animate-pulse',
            red: 'bg-red-500',
            blue: 'bg-blue-500 animate-pulse'
        };
        
        statusDot.className = `w-3 h-3 rounded-full ${colorMap[color] || colorMap.gray}`;
        statusText.textContent = status;
        sessionInfo.textContent = message;
        
        demoState.status = status.toLowerCase().replace(' ', '_');
    }

    function updateButtonStates() {
        const startBtn = document.getElementById('demo-start-btn');
        const refreshBtn = document.getElementById('demo-refresh-qr');
        const stopBtn = document.getElementById('demo-stop-btn');
        const sendBtn = document.getElementById('demo-send-btn');
        const recipientInput = document.getElementById('demo-recipient');
        const messageInput = document.getElementById('demo-message');
        
        if (demoState.status === 'connecté') {
            if (startBtn) startBtn.disabled = true;
            if (refreshBtn) refreshBtn.disabled = true;
            if (stopBtn) stopBtn.disabled = false;
            if (sendBtn) sendBtn.disabled = false;
            if (recipientInput) recipientInput.disabled = false;
            if (messageInput) messageInput.disabled = false;
        } else if (demoState.status === 'scan_qr') {
            if (startBtn) startBtn.disabled = true;
            if (refreshBtn) refreshBtn.disabled = false;
            if (stopBtn) stopBtn.disabled = false;
            if (sendBtn) sendBtn.disabled = true;
            if (recipientInput) recipientInput.disabled = true;
            if (messageInput) messageInput.disabled = true;
        } else {
            if (startBtn) startBtn.disabled = false;
            if (refreshBtn) refreshBtn.disabled = true;
            if (stopBtn) stopBtn.disabled = true;
            if (sendBtn) sendBtn.disabled = true;
            if (recipientInput) recipientInput.disabled = true;
            if (messageInput) messageInput.disabled = true;
        }

        const messageCountEl = document.getElementById('demo-message-count');
        if (messageCountEl) {
            if (demoState.status === 'connecté') {
                messageCountEl.classList.remove('hidden');
                messageCountEl.textContent = `${demoState.messageCount}/${CONFIG.MAX_TEST_MESSAGES} messages`;
                if (sendBtn && demoState.messageCount >= CONFIG.MAX_TEST_MESSAGES) {
                    sendBtn.disabled = true;
                    sendBtn.innerHTML = '🚫 Limite atteinte (4/4)';
                }
            } else {
                messageCountEl.classList.add('hidden');
            }
        }
    }

    async function startDemoSession() {
        try {
            demoState.sessionId = 'demo-' + Date.now();
            demoState.messageCount = 0;
            
            updateDemoStatus('Démarrage...', 'Initialisation de la session WhatsApp...', 'orange');
            updateButtonStates();
            
            await apiCall('POST', `/api/sessions/${demoState.sessionId}/start`);
            
            updateDemoStatus('Initialisation', 'Génération du QR code...', 'blue');
            
            startPolling();
            
        } catch (error) {
            console.error('Erreur start demo:', error);
            updateDemoStatus('Erreur', error.message, 'red');
            updateButtonStates();
        }
    }

    async function stopDemoSession() {
        try {
            stopPolling();
            
            if (demoState.sessionId) {
                await apiCall('DELETE', `/api/sessions/${demoState.sessionId}`);
            }
            
            resetDemoUI();
            updateDemoStatus('Déconnecté', 'Session fermée', 'gray');
            
        } catch (error) {
            console.error('Erreur stop demo:', error);
            resetDemoUI();
        }
    }

    function resetDemoUI() {
        demoState.sessionId = null;
        demoState.status = 'disconnected';
        demoState.messageCount = 0;
        demoState.polling = false;
        
        if (demoState.pollingInterval) {
            clearInterval(demoState.pollingInterval);
            demoState.pollingInterval = null;
        }
        if (demoState.qrTimer) {
            clearInterval(demoState.qrTimer);
            demoState.qrTimer = null;
        }
        
        const qrLoading = document.getElementById('demo-qr-loading');
        const qrImg = document.getElementById('demo-qr-img');
        const qrTimer = document.getElementById('demo-qr-timer');
        const connectionInfo = document.getElementById('demo-connection-info');
        
        if (qrLoading) qrLoading.style.display = 'flex';
        if (qrImg) qrImg.classList.add('hidden');
        if (qrTimer) qrTimer.classList.add('hidden');
        if (connectionInfo) connectionInfo.classList.add('hidden');
        
        const recipient = document.getElementById('demo-recipient');
        const results = document.getElementById('demo-results');
        if (recipient) recipient.value = '';
        if (results) results.innerHTML = '';
        
        updateButtonStates();
    }

    function startPolling() {
        if (demoState.polling) return;
        
        demoState.polling = true;
        
        demoState.pollingInterval = setInterval(async () => {
            if (!demoState.polling || !demoState.sessionId) return;
            
            try {
                const status = await apiCall('GET', `/api/sessions/${demoState.sessionId}/status`);
                
                if (status.status === 'SCAN_QR') {
                    await fetchAndDisplayQR();
                    updateDemoStatus('Scan QR', 'Scannez le QR code avec WhatsApp Business', 'orange');
                } else if (status.status === 'WORKING') {
                    stopPolling();
                    await handleConnectionSuccess(status);
                } else if (status.status === 'AUTH_FAILURE') {
                    updateDemoStatus('Échec', 'Erreur d\'authentification WhatsApp', 'red');
                    stopPolling();
                }
                
            } catch (error) {
                console.error('Polling error:', error);
                if (error.message.includes('404')) {
                    stopPolling();
                    updateDemoStatus('Expiré', 'Session expirée', 'red');
                }
            }
        }, CONFIG.POLLING_INTERVAL);
    }

    function stopPolling() {
        demoState.polling = false;
        if (demoState.pollingInterval) {
            clearInterval(demoState.pollingInterval);
            demoState.pollingInterval = null;
        }
        if (demoState.qrTimer) {
            clearInterval(demoState.qrTimer);
            demoState.qrTimer = null;
        }
    }

    async function fetchAndDisplayQR() {
        try {
            const qrResponse = await apiCall('GET', `/api/sessions/${demoState.sessionId}/qr`);
            
            if (qrResponse.qr) {
                const qrLoading = document.getElementById('demo-qr-loading');
                const qrImg = document.getElementById('demo-qr-img');
                
                if (qrLoading) qrLoading.style.display = 'none';
                if (qrImg) {
                    qrImg.classList.remove('hidden');
                    qrImg.innerHTML = `<img src="${qrResponse.qr}" alt="QR Code" class="w-72 h-72 mx-auto rounded-lg shadow-md">`;
                }
                
                if (!demoState.qrStartTime) {
                    demoState.qrStartTime = Date.now();
                    startQRTimer();
                }
            }
        } catch (error) {
            console.error('QR fetch error:', error);
        }
    }

    function startQRTimer() {
        const timerEl = document.getElementById('demo-qr-timer');
        const secondsEl = document.getElementById('demo-timer-seconds');
        if (timerEl) timerEl.classList.remove('hidden');
        
        if (demoState.qrTimer) clearInterval(demoState.qrTimer);
        
        demoState.qrTimer = setInterval(() => {
            const elapsed = Math.floor((Date.now() - demoState.qrStartTime) / 1000);
            if (secondsEl) secondsEl.textContent = elapsed;
            
            if (elapsed >= 20) {
                clearInterval(demoState.qrTimer);
                demoState.qrTimer = null;
                demoState.qrStartTime = null;
                
                const qrExpired = document.getElementById('demo-qr-expired');
                if (qrExpired) qrExpired.classList.remove('hidden');
                setTimeout(() => {
                    if (qrExpired) qrExpired.classList.add('hidden');
                }, 3000);
            }
        }, 1000);
    }

    async function handleConnectionSuccess(status) {
        updateDemoStatus('Connecté', `WhatsApp connecté: ${status.phoneNumber || 'N/A'}`, 'green');
        
        const qrImg = document.getElementById('demo-qr-img');
        const qrTimer = document.getElementById('demo-qr-timer');
        const qrLoading = document.getElementById('demo-qr-loading');
        
        if (qrImg) qrImg.classList.add('hidden');
        if (qrTimer) qrTimer.classList.add('hidden');
        if (qrLoading) qrLoading.style.display = 'none';
        
        try {
            const sessionInfo = await apiCall('GET', `/api/sessions/${demoState.sessionId}/info`);
            displayConnectionInfo(sessionInfo);
        } catch (error) {
            console.error('Erreur info session:', error);
        }
        
        updateButtonStates();
    }

    function displayConnectionInfo(info) {
        const connectionInfo = document.getElementById('demo-connection-info');
        const detailsEl = document.getElementById('demo-connection-details');
        
        if (!connectionInfo || !detailsEl) return;
        
        const phoneNumber = info.phoneNumber || 'N/A';
        const pushname = info.contactInfo?.pushname || 'Non défini';
        const countryCode = info.contactInfo?.countryCode || 'N/A';
        const platform = info.userInfo?.personal?.platform || 'N/A';
        
        detailsEl.innerHTML = `
            <div class="flex justify-between"><span>📱 Numéro:</span><span class="font-mono">${phoneNumber}</span></div>
            <div class="flex justify-between"><span>👤 Nom:</span><span>${pushname}</span></div>
            <div class="flex justify-between"><span>🌍 Pays:</span><span>+${countryCode}</span></div>
            <div class="flex justify-between"><span>💻 Plateforme:</span><span>${platform}</span></div>
        `;
        
        connectionInfo.classList.remove('hidden');
    }

    // ========== ENVOI DE MESSAGE - SIMPLIFIÉ COMME SCAN.HTML ==========
    async function sendTestMessage() {
        const recipient = document.getElementById('demo-recipient');
        const message = document.getElementById('demo-message');
        
        if (!recipient || !message) return;
        
        const recipientValue = recipient.value.trim();
        const messageValue = message.value.trim();
        
        if (!recipientValue || !messageValue) {
            showDemoResult('error', 'Veuillez remplir le numéro et le message');
            return;
        }
        
        if (demoState.messageCount >= CONFIG.MAX_TEST_MESSAGES) {
            showDemoResult('error', 'Limite de 4 messages de test atteinte');
            return;
        }
        
        if (!/^\d{8,15}$/.test(recipientValue)) {
            showDemoResult('error', 'Format de numéro invalide (8-15 chiffres sans le +)');
            return;
        }
        
        const sendBtn = document.getElementById('demo-send-btn');
        if (!sendBtn) return;
        
        const originalText = sendBtn.innerHTML;
        sendBtn.disabled = true;
        sendBtn.innerHTML = '⏳ Envoi...';
        
        try {
            // Formatage simple comme dans scan.html
            const formattedNumber = recipientValue.includes('@') ? recipientValue : `${recipientValue}@c.us`;
            
            const result = await apiCall('POST', '/api/messages/send', {
                sessionId: demoState.sessionId,
                to: formattedNumber,
                text: messageValue
            });
            
            demoState.messageCount++;
            updateButtonStates();
            
            showDemoResult('success', `✅ Message envoyé !`, {
                'ID': result.messageId?.slice(-8) || 'N/A',
                'Destinataire': `+${recipientValue}`,
                'Heure': new Date().toLocaleTimeString('fr-FR')
            });
            
            recipient.value = '';
            message.value = '';
            
        } catch (error) {
            console.error('Erreur:', error);
            showDemoResult('error', `❌ ${error.message}`);
            
        } finally {
            if (demoState.messageCount < CONFIG.MAX_TEST_MESSAGES) {
                sendBtn.disabled = false;
                sendBtn.innerHTML = originalText;
            }
        }
    }
    
    function showDemoResult(type, message, details = {}) {
        const resultsEl = document.getElementById('demo-results');
        if (!resultsEl) return;
        
        const colorMap = {
            success: 'bg-green-50 border-green-200 text-green-800',
            error: 'bg-red-50 border-red-200 text-red-800',
            warning: 'bg-yellow-50 border-yellow-200 text-yellow-800',
            info: 'bg-blue-50 border-blue-200 text-blue-800'
        };
        
        let html = `
            <div class="p-4 rounded-lg border ${colorMap[type]}">
                <p class="font-medium">${message}</p>
        `;
        
        if (Object.keys(details).length > 0) {
            html += '<div class="mt-2 space-y-1 text-xs">';
            for (const [key, value] of Object.entries(details)) {
                html += `<div class="flex justify-between"><span class="opacity-75">${key}:</span><span class="font-mono">${value}</span></div>`;
            }
            html += '</div>';
        }
        
        html += '</div>';
        
        resultsEl.innerHTML = html + resultsEl.innerHTML;
        
        setTimeout(() => {
            const firstResult = resultsEl.firstElementChild;
            if (firstResult) {
                firstResult.style.opacity = '0.5';
                setTimeout(() => firstResult?.remove(), 1000);
            }
        }, 8000);
    }

    // ========== API STATUS MONITORING ==========
    async function checkAPIStatus() {
        const indicator = document.getElementById('status-indicator');
        if (!indicator) return;
        
        try {
            await apiCall('GET', '/api/health');
            indicator.className = 'w-2 h-2 bg-green-500 rounded-full animate-pulse';
        } catch (error) {
            indicator.className = 'w-2 h-2 bg-red-500 rounded-full';
        }
    }

    // ========== NETTOYAGE AUTOMATIQUE ==========
    let cleanupInterval = null;

    async function cleanupOrphanSessions() {
        try {
            const result = await apiCall('POST', '/api/sessions/cleanup-orphans');
            if (result.cleaned && result.cleaned.length > 0) {
                console.log(`🧹 ${result.message}`);
                if (demoState.sessionId && result.cleaned.some(s => s.sessionId === demoState.sessionId)) {
                    resetDemoUI();
                    showDemoResult('warning', '⚠️ Votre session bloquée a été nettoyée');
                }
            }
        } catch (error) {
            console.warn('Erreur nettoyage:', error.message);
        }
    }

    async function forceCleanupIfNeeded() {
        try {
            const sessions = await apiCall('GET', '/api/sessions');
            if (sessions.activeSessions > 10) {
                const toClose = sessions.sessions.filter(s => s.status !== 'WORKING');
                for (const session of toClose) {
                    try {
                        await apiCall('DELETE', `/api/sessions/${session.sessionId}`);
                        console.log(`🗑️ Supprimée: ${session.sessionId}`);
                    } catch (e) {}
                }
                if (toClose.length > 0) {
                    showDemoResult('info', `🧹 ${toClose.length} session(s) orpheline(s) nettoyée(s)`);
                }
            }
        } catch (error) {
            console.warn('Erreur vérification:', error.message);
        }
    }

    function startAutoCleanup() {
        if (cleanupInterval) clearInterval(cleanupInterval);
        cleanupInterval = setInterval(async () => {
            await cleanupOrphanSessions();
            await forceCleanupIfNeeded();
        }, 120000);
    }

    function stopAutoCleanup() {
        if (cleanupInterval) {
            clearInterval(cleanupInterval);
            cleanupInterval = null;
        }
    }

    // ========== EVENT LISTENERS ==========
    const startBtn = document.getElementById('demo-start-btn');
    const stopBtn = document.getElementById('demo-stop-btn');
    const refreshBtn = document.getElementById('demo-refresh-qr');
    const sendBtn = document.getElementById('demo-send-btn');
    
    if (startBtn) startBtn.addEventListener('click', startDemoSession);
    if (stopBtn) stopBtn.addEventListener('click', stopDemoSession);
    if (refreshBtn) refreshBtn.addEventListener('click', () => {
        demoState.qrStartTime = null;
        if (demoState.qrTimer) clearInterval(demoState.qrTimer);
        fetchAndDisplayQR();
    });
    if (sendBtn) sendBtn.addEventListener('click', sendTestMessage);

    // ========== SCROLL ANIMATIONS ==========
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

    // ========== INITIALIZATION ==========
    document.addEventListener('DOMContentLoaded', function() {
        updateButtonStates();
        checkAPIStatus();
        setInterval(checkAPIStatus, 30000);
        startAutoCleanup();
        console.log('🚀 NotifyBridge Interface loaded');
    });

    window.addEventListener('beforeunload', stopAutoCleanup);

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Gestion des tabs pour la section API
    const apiTabs = document.querySelectorAll('.api-tab-btn');
    const apiCodeBlocks = {
        curl: document.getElementById('api-code-curl'),
        php: document.getElementById('api-code-php'),
        js: document.getElementById('api-code-js'),
        python: document.getElementById('api-code-python')
    };
    
    function setActiveApiTab(tabId) {
        apiTabs.forEach(btn => {
            const isActive = btn.getAttribute('data-api-tab') === tabId;
            if (isActive) {
                btn.setAttribute('data-active', 'true');
            } else {
                btn.removeAttribute('data-active');
            }
        });
        
        Object.entries(apiCodeBlocks).forEach(([key, block]) => {
            if (block) {
                if (key === tabId) {
                    block.classList.remove('hidden');
                } else {
                    block.classList.add('hidden');
                }
            }
        });
    }
    
    apiTabs.forEach(btn => {
        btn.addEventListener('click', () => {
            const tabId = btn.getAttribute('data-api-tab');
            setActiveApiTab(tabId);
        });
    });
    
    setActiveApiTab('curl');
    
    document.querySelectorAll('.bg-brand-dark .copy-btn, .bg-brand-dark button:last-child').forEach(btn => {
        btn.addEventListener('click', async () => {
            const activeCodeBlock = document.querySelector('.api-code-block:not(.hidden) pre code');
            if (activeCodeBlock) {
                const text = activeCodeBlock.innerText;
                await navigator.clipboard.writeText(text);
                const originalText = btn.innerHTML;
                btn.innerHTML = '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Copié !';
                setTimeout(() => {
                    btn.innerHTML = originalText;
                }, 2000);
            }
        });
    });
</script>
</body>
</html>