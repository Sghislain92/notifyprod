<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Comment ça marche | NotifyBridge</title>
    <meta name="description" content="Découvrez comment fonctionne NotifyBridge : connexion multi-sessions, QR Code sécurisé, API REST, et envoi de messages WhatsApp en toute simplicité.">
    
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
        @font-face {
            font-family: 'ITC Avant Garde Gothic';
            src: local('ITC Avant Garde Gothic Std Bold'), local('ITCAvantGardeStd-Bold');
            font-weight: bold;
            font-style: normal;
        }
        .step-number {
            background: #04fbca;
            color: #003D2F;
            font-weight: bold;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1.25rem;
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
        .timeline-line {
            position: absolute;
            left: 24px;
            top: 60px;
            bottom: 20px;
            width: 2px;
            background: linear-gradient(to bottom, #04fbca, #e5e7eb);
        }
        @media (max-width: 768px) {
            .timeline-line {
                left: 20px;
            }
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans antialiased">
    <!-- ========== HEADER ========== -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">
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
                    <a href="https://notify.caddieverse.com/" class="text-gray-700 hover:text-evergreen-600 transition font-semibold">Accueil</a>
                    <a href="https://notify.caddieverse.com/htdocs/how-it-works/" class="text-evergreen-600 font-semibold">Comment ça marche</a>
                    <a href="https://notify.caddieverse.com/htdocs/documentation/" class="text-gray-700 hover:text-evergreen-600 transition font-semibold">Documentation</a>
                    <a href="https://notify.caddieverse.com/htdocs/api/" class="text-gray-700 hover:text-evergreen-600 transition font-semibold">API</a>
                </nav>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#" class="bg-brand-dark text-white px-6 py-2 rounded-xl font-semibold hover:bg-brand-forest transition">Console</a>
                </div>
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-gray-600 hover:text-evergreen-500 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 px-4 pb-4">
            <a href="https://notify.caddieverse.com/" class="block py-2 text-gray-700 hover:text-evergreen-600 font-semibold">Accueil</a>
            <a href="https://notify.caddieverse.com/htdocs/how-it-works/" class="block py-2 text-evergreen-600 font-semibold">Comment ça marche</a>
            <a href="https://notify.caddieverse.com/htdocs/documentation/" class="block py-2 text-gray-700 hover:text-evergreen-600 font-semibold">Documentation</a>
            <a href="https://notify.caddieverse.com/htdocs/api/" class="block py-2 text-gray-700 hover:text-evergreen-600 font-semibold">API</a>
            <a href="#" class="block mt-2 bg-brand-dark text-white text-center px-4 py-2 rounded-xl font-semibold hover:bg-brand-forest transition">Console</a>
        </div>
    </header>

    <main>
        <!-- ========== HERO SECTION ========== -->
        <section class="relative overflow-hidden bg-gradient-to-br from-brand-light-cream via-white to-evergreen-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
                <div class="text-center max-w-3xl mx-auto fade-up">
                    <div class="inline-flex items-center gap-2 bg-brand-dark/10 rounded-full px-4 py-1 mb-6">
                        <svg class="w-4 h-4 text-evergreen-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span class="text-sm font-medium text-brand-dark">Processus simplifié</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-brand-dark mb-6">
                        Comment ça marche ?
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600 mb-8">
                        Connectez votre WhatsApp à notre API en 4 étapes simples et commencez à automatiser vos communications en quelques minutes.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="#etapes" class="bg-brand-dark text-white px-6 py-3 rounded-xl font-semibold hover:bg-brand-forest transition-all hover:scale-105 inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                            Découvrir les étapes
                        </a>
                        <a href="https://notify.caddieverse.com/htdocs/api/" class="border border-gray-300 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                            Voir la documentation
                        </a>
                    </div>
                </div>
            </div>
            <!-- Decorative elements -->
            <div class="absolute bottom-0 left-0 w-full h-20 bg-gradient-to-t from-white to-transparent"></div>
        </section>

        <!-- ========== OVERVIEW CARDS ========== -->
        <section class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-gradient-to-br from-emerald-depths-50 to-white rounded-2xl p-6 text-center hover-scale fade-up">
                        <div class="w-14 h-14 bg-brand-dark rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-evergreen-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-brand-dark mb-2">1. Configuration unique</h3>
                        <p class="text-sm text-gray-500">Créez votre compte, obtenez votre clé API et initialisez votre première session.</p>
                    </div>
                    <div class="bg-gradient-to-br from-vanilla-custard-50 to-white rounded-2xl p-6 text-center hover-scale fade-up">
                        <div class="w-14 h-14 bg-brand-dark rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-vanilla-custard-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-brand-dark mb-2">2. Connexion WhatsApp</h3>
                        <p class="text-sm text-gray-500">Scannez le QR Code généré avec l'application WhatsApp de votre téléphone.</p>
                    </div>
                    <div class="bg-gradient-to-br from-evergreen-50 to-white rounded-2xl p-6 text-center hover-scale fade-up">
                        <div class="w-14 h-14 bg-brand-dark rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-evergreen-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-brand-dark mb-2">3. Automatisation</h3>
                        <p class="text-sm text-gray-500">Envoyez des messages via notre API REST, intégrez à vos applications.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== DETAILED STEPS ========== -->
        <section id="etapes" class="py-16 md:py-24 bg-gray-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-dark mb-4">Procédure détaillée</h2>
                    <p class="text-lg text-gray-600">Suivez ces 4 étapes simples pour connecter et utiliser NotifyBridge</p>
                </div>

                <div class="relative">
                    <!-- Timeline line (desktop) -->
                    <div class="hidden md:block absolute left-[48px] top-12 bottom-12 w-0.5 bg-gradient-to-b from-evergreen-400 to-gray-200"></div>
                    
                    <!-- Step 1 -->
                    <div class="relative flex flex-col md:flex-row gap-6 mb-12 fade-up">
                        <div class="flex-shrink-0">
                            <div class="step-number relative z-10">1</div>
                        </div>
                        <div class="flex-1 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-4">
                                <svg class="w-6 h-6 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                <h3 class="text-xl font-bold text-brand-dark">Créez votre compte</h3>
                            </div>
                            <p class="text-gray-600 mb-4">Inscrivez-vous gratuitement sur notre plateforme pour obtenir votre clé API unique. Aucun engagement requis.</p>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-sm font-mono text-gray-500 mb-2">Ce que vous obtenez :</p>
                                <ul class="space-y-2 text-sm text-gray-600">
                                    <li class="flex items-center gap-2"><svg class="w-4 h-4 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Clé API sécurisée</li>
                                    <li class="flex items-center gap-2"><svg class="w-4 h-4 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Accès à la console d'administration</li>
                                    <li class="flex items-center gap-2"><svg class="w-4 h-4 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Support technique inclus</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative flex flex-col md:flex-row gap-6 mb-12 fade-up">
                        <div class="flex-shrink-0">
                            <div class="step-number relative z-10">2</div>
                        </div>
                        <div class="flex-1 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-4">
                                <svg class="w-6 h-6 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                <h3 class="text-xl font-bold text-brand-dark">Initialisez une session</h3>
                            </div>
                            <p class="text-gray-600 mb-4">Utilisez notre API pour créer une session unique pour chaque numéro WhatsApp. Un QR Code est automatiquement généré.</p>
                            <div class="bg-gray-900 rounded-xl p-4">
                                <pre class="text-sm text-gray-300 font-mono overflow-x-auto"><code>POST /api/sessions/mon_entreprise/start
Headers: x-api-key: votre_cle_api</code></pre>
                            </div>
                            <p class="text-xs text-gray-400 mt-3">La session reste persistante même après redémarrage du serveur.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative flex flex-col md:flex-row gap-6 mb-12 fade-up">
                        <div class="flex-shrink-0">
                            <div class="step-number relative z-10">3</div>
                        </div>
                        <div class="flex-1 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-4">
                                <svg class="w-6 h-6 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 9.75h16.5m-16.5 0a2.25 2.25 0 01-2.25-2.25V6.75A2.25 2.25 0 013.75 4.5h16.5A2.25 2.25 0 0122.5 6.75v.75a2.25 2.25 0 01-2.25 2.25m-16.5 0v6m0 0a2.25 2.25 0 002.25 2.25h12a2.25 2.25 0 002.25-2.25v-6" />
                                </svg>
                                <h3 class="text-xl font-bold text-brand-dark">Scannez le QR Code</h3>
                            </div>
                            <p class="text-gray-600 mb-4">Récupérez le QR Code via l'API et affichez-le dans votre interface. Scannez-le avec l'application WhatsApp (Paramètres > Appareils connectés).</p>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-gray-50 rounded-xl p-4 text-center">
                                    <svg class="w-20 h-20 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                    </svg>
                                    <p class="text-xs text-gray-500">QR Code valable 20 secondes</p>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <p class="text-sm font-medium text-gray-700 mb-2">Étapes de connexion :</p>
                                    <ol class="text-xs text-gray-600 space-y-1 list-decimal list-inside">
                                        <li>Ouvrez WhatsApp sur votre téléphone</li>
                                        <li>Allez dans Paramètres > Appareils connectés</li>
                                        <li>Appuyez sur "Connecter un appareil"</li>
                                        <li>Scannez le QR Code affiché</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative flex flex-col md:flex-row gap-6 fade-up">
                        <div class="flex-shrink-0">
                            <div class="step-number relative z-10">4</div>
                        </div>
                        <div class="flex-1 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-4">
                                <svg class="w-6 h-6 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                                <h3 class="text-xl font-bold text-brand-dark">Envoyez vos premiers messages</h3>
                            </div>
                            <p class="text-gray-600 mb-4">Une fois la session connectée (statut WORKING), vous pouvez envoyer des messages via notre API.</p>
                            <div class="bg-gray-900 rounded-xl p-4 mb-4">
                                <pre class="text-sm text-gray-300 font-mono overflow-x-auto"><code>POST /api/messages/send
Headers: x-api-key: votre_cle_api
Body: {
  "sessionId": "mon_entreprise",
  "to": "22912345678",
  "text": "Bonjour, votre commande est prête !"
}</code></pre>
                            </div>
                            <div class="flex flex-wrap gap-3 text-sm">
                                <div class="flex items-center gap-1 text-green-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Messages texte</div>
                                <div class="flex items-center gap-1 text-blue-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>Images & médias</div>
                                <div class="flex items-center gap-1 text-purple-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>Fichiers & documents</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== ARCHITECTURE ========== -->
        <section class="py-16 md:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-dark mb-4">Architecture technique</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Comment NotifyBridge communique avec WhatsApp et vos applications</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="space-y-6 fade-up">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-evergreen-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-evergreen-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-brand-dark">Stealth Technology</h3>
                                <p class="text-sm text-gray-500">Notre solution utilise Puppeteer avec des techniques anti-détection pour une connexion stable et durable.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-evergreen-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-evergreen-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-brand-dark">Multi-sessions isolées</h3>
                                <p class="text-sm text-gray-500">Chaque session est indépendante, avec ses propres données d'authentification et son historique.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-evergreen-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-evergreen-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-brand-dark">Webhooks temps réel</h3>
                                <p class="text-sm text-gray-500">Recevez des notifications instantanées sur les statuts de vos messages (envoyé, délivré, lu).</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-2xl p-6 fade-up">
                        <div class="text-center mb-4">
                            <span class="text-vanilla-custard-400 text-sm font-mono">Flow d'automatisation</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2 text-xs">
                                <span class="text-gray-400">Votre App</span>
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                                <span class="text-evergreen-400">API NotifyBridge</span>
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                                <span class="text-vanilla-custard-400">Session WhatsApp</span>
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                                <span class="text-gray-400">Client final</span>
                            </div>
                            <div class="h-px bg-gray-800 my-4"></div>
                            <div class="flex items-center justify-between gap-2 text-xs">
                                <span class="text-gray-400">Webhook</span>
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" /></svg>
                                <span class="text-evergreen-400">Statuts temps réel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== BENEFITS ========== -->
        <section class="py-16 md:py-24 bg-gradient-to-br from-evergreen-50 via-white to-emerald-depths-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-dark mb-4">Pourquoi notre solution est unique</h2>
                    <p class="text-lg text-gray-600">Des avantages techniques pensés pour les développeurs et les entreprises</p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center p-6 fade-up">
                        <div class="w-16 h-16 bg-brand-dark rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-evergreen-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-brand-dark mb-2">Messages illimités</h3>
                        <p class="text-sm text-gray-500">Aucune limite de volume. Envoyez autant de messages que nécessaire pour votre activité.</p>
                    </div>
                    <div class="text-center p-6 fade-up">
                        <div class="w-16 h-16 bg-brand-dark rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-vanilla-custard-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-brand-dark mb-2">Disponibilité 99.9%</h3>
                        <p class="text-sm text-gray-500">Infrastructure redondée avec reconnexion automatique en cas d'incident.</p>
                    </div>
                    <div class="text-center p-6 fade-up">
                        <div class="w-16 h-16 bg-brand-dark rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-emerald-depths-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-brand-dark mb-2">Support dédié</h3>
                        <p class="text-sm text-gray-500">Équipe technique à votre écoute pour vous accompagner dans votre intégration.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== FAQ ========== -->
        <section class="py-16 md:py-20 bg-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 fade-up">
                    <h2 class="text-3xl font-bold text-brand-dark mb-4">Questions fréquentes</h2>
                    <p class="text-gray-600">Tout ce que vous devez savoir pour bien démarrer</p>
                </div>
                <div class="space-y-4">
                    <details class="bg-gray-50 rounded-xl p-5 shadow-sm fade-up">
                        <summary class="font-semibold cursor-pointer text-brand-dark flex items-center gap-2">
                            <svg class="w-5 h-5 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Combien de temps dure une session ?
                        </summary>
                        <p class="mt-2 text-gray-600 pl-7">Les sessions sont persistantes. Tant que vous ne vous déconnectez pas, la session reste active indéfiniment. Nous recommandons d'utiliser l'endpoint /ping toutes les 30-60 secondes pour maintenir la connexion active.</p>
                    </details>
                    <details class="bg-gray-50 rounded-xl p-5 shadow-sm fade-up">
                        <summary class="font-semibold cursor-pointer text-brand-dark flex items-center gap-2">
                            <svg class="w-5 h-5 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                            Puis-je connecter plusieurs numéros ?
                        </summary>
                        <p class="mt-2 text-gray-600 pl-7">Oui ! Notre solution est multi-sessions. Vous pouvez connecter autant de numéros que votre plan le permet, chacun avec sa propre session isolée.</p>
                    </details>
                    <details class="bg-gray-50 rounded-xl p-5 shadow-sm fade-up">
                        <summary class="font-semibold cursor-pointer text-brand-dark flex items-center gap-2">
                            <svg class="w-5 h-5 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Que faire si le QR Code expire ?
                        </summary>
                        <p class="mt-2 text-gray-600 pl-7">Utilisez l'endpoint /repair pour régénérer un nouveau QR Code sans perdre votre session. Le QR Code est valable 20 secondes, après quoi il faut en générer un nouveau.</p>
                    </details>
                    <details class="bg-gray-50 rounded-xl p-5 shadow-sm fade-up">
                        <summary class="font-semibold cursor-pointer text-brand-dark flex items-center gap-2">
                            <svg class="w-5 h-5 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                            Est-ce compatible avec WhatsApp Business ?
                        </summary>
                        <p class="mt-2 text-gray-600 pl-7">Oui, notre API fonctionne avec WhatsApp Business et WhatsApp standard. Utilisez simplement votre numéro professionnel pour la connexion.</p>
                    </details>
                </div>
                <div class="text-center mt-10">
                    <a href="https://notify.caddieverse.com/htdocs/documentation/" class="inline-flex items-center gap-2 text-evergreen-600 font-semibold hover:gap-3 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                        Consulter la documentation complète
                    </a>
                </div>
            </div>
        </section>

        <!-- ========== CTA ========== -->
        <section class="py-16 bg-brand-dark">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Prêt à automatiser vos communications ?</h2>
                <p class="text-lg text-evergreen-200 mb-8">Rejoignez les entreprises qui utilisent NotifyBridge pour envoyer des milliers de messages chaque jour.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#" class="bg-vanilla-custard-500 text-brand-dark px-8 py-3 rounded-xl font-semibold hover:bg-vanilla-custard-400 transition-all hover:scale-105 inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Commencer gratuitement
                    </a>
                    <a href="#" class="border border-white/30 text-white px-8 py-3 rounded-xl font-semibold hover:bg-white/10 transition-all inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                        Contacter un expert
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- ========== FOOTER ========== -->
    <footer class="bg-brand-dark text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-evergreen-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        <span class="font-bold text-xl">NotifyBridge</span>
                    </div>
                    <p class="mt-2 text-sm text-gray-300">API WhatsApp multi‑numéros, automatisez vos communications.</p>
                </div>
                <div>
                    <h4 class="font-semibold">Produit</h4>
                    <ul class="mt-2 space-y-1 text-sm text-gray-300">
                        <li><a href="#" class="hover:text-evergreen-400">Fonctionnalités</a></li>
                        <li><a href="#tarifs" class="hover:text-evergreen-400">Tarifs</a></li>
                        <li><a href="#" class="hover:text-evergreen-400">API</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold">Ressources</h4>
                    <ul class="mt-2 space-y-1 text-sm text-gray-300">
                        <li><a href="https://notify.caddieverse.com/htdocs/documentation/" class="hover:text-evergreen-400">Documentation</a></li>
                        <li><a href="#" class="hover:text-evergreen-400">Exemples</a></li>
                        <li><a href="#" class="hover:text-evergreen-400 flex items-center"><span id="status-indicator" class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>Statut API</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold">Légal</h4>
                    <ul class="mt-2 space-y-1 text-sm text-gray-300">
                        <li><a href="#" class="hover:text-evergreen-400">Conditions</a></li>
                        <li><a href="#" class="hover:text-evergreen-400">Confidentialité</a></li>
                        <li><a href="#" class="hover:text-evergreen-400">Mentions légales</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-6 text-center text-sm text-gray-400">© 2025 NotifyBridge – Tous droits réservés.</div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-button');
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                const mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu) mobileMenu.classList.toggle('hidden');
            });
        }

        // Scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>