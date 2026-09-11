<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Référence API | NotifyBridge</title>
    <meta name="description" content="Documentation technique complète de l'API NotifyBridge. Tous les endpoints, exemples de code, codes d'erreur et bonnes pratiques.">
    
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
            background: #003D2F;
            color: #e2e8f0;
            font-family: 'JetBrains Mono', monospace;
            border-radius: 1rem;
            overflow-x: auto;
        }
        .code-block-light {
            background: #1e293b;
            color: #e2e8f0;
            font-family: 'JetBrains Mono', monospace;
            border-radius: 0.75rem;
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
        .tab-button {
            transition: all 0.2s;
        }
        .tab-button.active {
            border-bottom-color: #04fbca;
            color: #003D2F;
            font-weight: 600;
        }
        pre { white-space: pre-wrap; word-wrap: break-word; }
        .error-table td { padding: 12px 16px; border-bottom: 1px solid #e5e7eb; }
        .error-table th { padding: 12px 16px; text-align: left; background-color: #f9fafb; font-weight: 600; }
        .toc-link {
            transition: all 0.2s;
            display: block;
            padding: 0.5rem 0;
            font-size: 0.875rem;
        }
        .toc-link:hover { color: #04fbca; }
        .toc-link.active { color: #04fbca; font-weight: 600; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .response-example { background: #0f172a; border-radius: 0.75rem; padding: 1rem; overflow-x: auto; }
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
                    <a href="https://notify.caddieverse.com/htdocs/documentation/" class="text-gray-700 hover:text-evergreen-600 font-semibold transition">Documentation</a>
                    <a href="https://notify.caddieverse.com/htdocs/api/" class="text-evergreen-600 font-semibold">API</a>
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
            <a href="https://notify.caddieverse.com/htdocs/documentation/" class="block text-gray-700 hover:text-evergreen-600 font-semibold py-2">Documentation</a>
            <a href="https://notify.caddieverse.com/htdocs/api/" class="block text-evergreen-600 font-semibold py-2">API</a>
            <a href="#" class="block bg-brand-dark text-white text-center px-4 py-2 rounded-xl font-semibold hover:bg-brand-forest transition">Console</a>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <!-- Banner: Create Account -->
        <div class="mb-8 p-5 bg-gradient-to-r from-evergreen-50 via-emerald-depths-50 to-vanilla-custard-50 rounded-2xl border border-evergreen-200">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3">
                    <svg class="w-10 h-10 text-vanilla-custard-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    <div>
                        <h3 class="font-bold text-brand-dark text-lg">Prêt à commencer ?</h3>
                        <p class="text-gray-700 text-sm">Avant d'utiliser l'API, créez un compte et obtenez votre clé API.</p>
                    </div>
                </div>
                <a href="#" class="bg-brand-dark text-white px-6 py-2 rounded-xl font-semibold hover:bg-brand-forest transition whitespace-nowrap">Créer un compte</a>
            </div>
        </div>

        <div class="grid lg:grid-cols-4 gap-8 lg:gap-12">
            <!-- Sidebar Navigation -->
            <aside class="hidden lg:block space-y-6 sticky top-28 h-fit">
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Sommaire</h3>
                    <ul class="space-y-1">
                        <li><a href="#intro" class="toc-link text-gray-600">Introduction</a></li>
                        <li><a href="#auth" class="toc-link text-gray-600">Authentification</a></li>
                        <li><a href="#errors" class="toc-link text-gray-600">Codes d'erreur</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">SESSIONS</span></li>
                        <li><a href="#session-start" class="toc-link text-gray-600 pl-3">Démarrer une session</a></li>
                        <li><a href="#session-qr" class="toc-link text-gray-600 pl-3">Récupérer le QR Code</a></li>
                        <li><a href="#session-status" class="toc-link text-gray-600 pl-3">Statut de session</a></li>
                        <li><a href="#session-info" class="toc-link text-gray-600 pl-3">Informations détaillées</a></li>
                        <li><a href="#session-phone" class="toc-link text-gray-600 pl-3">Numéro de téléphone</a></li>
                        <li><a href="#session-repair" class="toc-link text-gray-600 pl-3">Réparer une session</a></li>
                        <li><a href="#session-logout" class="toc-link text-gray-600 pl-3">Déconnexion</a></li>
                        <li><a href="#session-delete" class="toc-link text-gray-600 pl-3">Supprimer une session</a></li>
                        <li><a href="#session-list" class="toc-link text-gray-600 pl-3">Lister les sessions</a></li>
                        <li><a href="#session-ping" class="toc-link text-gray-600 pl-3">Ping / Keep-alive</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">MESSAGES</span></li>
                        <li><a href="#msg-send" class="toc-link text-gray-600 pl-3">Envoyer un texte</a></li>
                        <li><a href="#msg-image" class="toc-link text-gray-600 pl-3">Envoyer une image</a></li>
                        <li><a href="#msg-status" class="toc-link text-gray-600 pl-3">Statut d'un message</a></li>
                        <li><a href="#msg-list" class="toc-link text-gray-600 pl-3">Historique des messages</a></li>
                        <li class="pt-2"><span class="text-xs font-bold text-evergreen-600">SYSTÈME</span></li>
                        <li><a href="#health" class="toc-link text-gray-600 pl-3">Health Check</a></li>
                        <li><a href="#stats" class="toc-link text-gray-600 pl-3">Statistiques</a></li>
                    </ul>
                </div>
                <div class="bg-gradient-to-r from-evergreen-50 to-emerald-depths-50 rounded-2xl p-6 border border-evergreen-100">
                    <svg class="w-8 h-8 text-evergreen-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <p class="text-sm font-semibold text-brand-dark mb-2">Support technique</p>
                    <p class="text-xs text-gray-600 mb-3">Besoin d'aide ? Consultez notre documentation ou contactez notre support.</p>
                    <a href="#" class="text-evergreen-600 text-xs font-semibold hover:underline">Contacter le support →</a>
                </div>
            </aside>

            <!-- API Content -->
            <div class="lg:col-span-3 space-y-12 md:space-y-16">
                <!-- Intro -->
                <section id="intro">
                    <h1 class="text-3xl md:text-4xl font-bold text-brand-dark mb-4">Référence API NotifyBridge</h1>
                    <p class="text-base md:text-lg text-gray-600">L'API NotifyBridge est une API RESTful qui vous permet de gérer vos sessions WhatsApp et d'automatiser l'envoi de messages de manière fiable et sécurisée.</p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <div class="bg-brand-dark text-white px-4 py-2 rounded-xl text-sm font-semibold">Base URL: <span class="text-vanilla-custard-400">https://notifybridge-production.up.railway.app</span></div>
                        <div class="bg-emerald-depths-100 text-emerald-depths-800 px-4 py-2 rounded-xl text-sm font-semibold">Version: <span class="text-emerald-depths-600">v1.0</span></div>
                        <div class="bg-evergreen-100 text-evergreen-800 px-4 py-2 rounded-xl text-sm font-semibold">Rate Limit: <span class="text-evergreen-600">60 req/min</span></div>
                    </div>
                </section>

                <!-- Authentication -->
                <section id="auth">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-4">Authentification</h2>
                    <p class="text-gray-600 mb-4">Toutes les requêtes API doivent inclure votre clé API dans l'en-tête <code class="bg-gray-100 px-2 py-1 rounded text-sm font-mono text-evergreen-700">x-api-key</code>. Obtenez votre clé après <strong class="text-brand-dark">création de compte</strong> sur notre plateforme.</p>
                    <div class="code-block p-5 rounded-2xl shadow-inner mb-4">
                        <pre><code>x-api-key: nb_live_xxxxxxxxxxxxxxxxxxxxxxxx</code></pre>
                    </div>
                    <div class="bg-amber-50 border-l-4 border-vanilla-custard-500 p-4 rounded-r-xl">
                        <div class="flex gap-3">
                            <svg class="w-5 h-5 text-vanilla-custard-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <p class="text-sm text-amber-800"><strong class="font-semibold">Important :</strong> Conservez votre clé API secrète. Ne la partagez jamais publiquement. Pour les applications front-end, utilisez un proxy backend.</p>
                        </div>
                    </div>
                </section>

                <!-- Error Codes -->
                <section id="errors">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-4">Codes d'erreur</h2>
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="error-table w-full">
                            <thead class="bg-gray-50">
                                <tr><th>Code HTTP</th><th>Description</th><th>Solution recommandée</th></tr>
                            </thead>
                            <tbody>
                                <tr><td class="font-mono text-red-600 font-semibold">400</td><td>Paramètres manquants ou session non prête</td><td>Vérifiez que tous les champs requis sont présents (sessionId, to, text)</td></tr>
                                <tr><td class="font-mono text-red-600 font-semibold">401</td><td>Clé API invalide ou manquante</td><td>Vérifiez votre clé dans la console NotifyBridge</td></tr>
                                <tr><td class="font-mono text-red-600 font-semibold">404</td><td>Session ou message non trouvé</td><td>La session n'existe pas ou a été supprimée</td></tr>
                                <tr><td class="font-mono text-red-600 font-semibold">409</td><td>Session déjà existante</td><td>Utilisez /repair si la session est instable</td></tr>
                                <tr><td class="font-mono text-red-600 font-semibold">429</td><td>Trop de requêtes</td><td>Ralentissez le rythme des appels (limite 60 req/min)</td></tr>
                                <tr><td class="font-mono text-red-600 font-semibold">500</td><td>Erreur interne du serveur</td><td>Réessayez plus tard ou contactez le support</td></tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- SESSIONS SECTION -->
                <div class="space-y-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b-2 border-evergreen-200 pb-2">📱 Gestion des sessions</h2>

                    <!-- Start Session -->
                    <div id="session-start" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-post px-3 py-1 rounded-lg text-xs font-bold">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/start</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Initialise une nouvelle instance WhatsApp pour un identifiant donné. La session est persistante et reste active même après redémarrage du serveur.</p>
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-xs font-semibold text-gray-500 mb-2">Paramètres URL</p>
                                <p class="text-sm font-mono">sessionId <span class="text-gray-400">(string, requis)</span></p>
                                <p class="text-xs text-gray-500 mt-1">Identifiant unique pour cette session (ex: "client_123", "user_456")</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-xs font-semibold text-gray-500 mb-2">Réponse succès (200)</p>
                                <pre class="text-xs bg-gray-900 text-gray-300 p-2 rounded"><code>{
  "ok": true,
  "message": "Initialisation lancée",
  "sessionId": "client_123",
  "phoneNumber": null,
  "pushname": null
}</code></pre>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4 class="font-bold text-sm mb-3 text-brand-dark">Exemples de code</h4>
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
                    </div>

                    <!-- QR Code -->
                    <div id="session-qr" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-get px-3 py-1 rounded-lg text-xs font-bold">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/qr</code>
                        </div>
                        <p class="text-gray-600 text-sm">Récupère le QR code sous forme de dataURL (image base64) pour scanner avec WhatsApp. À afficher dans votre interface utilisateur.</p>
                        <div class="mt-3 response-example">
                            <pre class="text-xs text-gray-300"><code>{
  "qr": "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...",
  "status": "SCAN_QR"
}</code></pre>
                        </div>
                        <div class="mt-3 p-3 bg-vanilla-custard-50 rounded-lg">
                            <p class="text-xs text-vanilla-custard-800"><span class="font-semibold">💡 Astuce :</span> Affichez ce QR code dans un élément &lt;img src="data:image/png;base64,..." /&gt; pour que l'utilisateur puisse le scanner.</p>
                        </div>
                    </div>

                    <!-- Session Status -->
                    <div id="session-status" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-get px-3 py-1 rounded-lg text-xs font-bold">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/status</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Vérifie l'état actuel de la session.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="status-badge status-starting">STARTING</span>
                            <span class="status-badge status-scan">SCAN_QR</span>
                            <span class="status-badge status-working">WORKING</span>
                            <span class="status-badge status-disconnected">DISCONNECTED</span>
                        </div>
                        <div class="mt-3 response-example mt-3">
                            <pre class="text-xs text-gray-300"><code>{
  "ok": true,
  "status": "WORKING",
  "phoneNumber": "22501234567",
  "pushname": "John Doe",
  "error": null
}</code></pre>
                        </div>
                    </div>

                    <!-- Info -->
                    <div id="session-info" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-get px-3 py-1 rounded-lg text-xs font-bold">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/info</code>
                        </div>
                        <p class="text-gray-600 text-sm">Obtient les informations détaillées de la session : numéro, nom, infos appareil, batterie, photo de profil, etc.</p>
                    </div>

                    <!-- Phone Number -->
                    <div id="session-phone" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-get px-3 py-1 rounded-lg text-xs font-bold">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/phone-number</code>
                        </div>
                        <p class="text-gray-600 text-sm">Récupère le numéro de téléphone associé à la session ainsi que les informations de contact (nom formaté, code pays, photo de profil).</p>
                    </div>

                    <!-- Repair -->
                    <div id="session-repair" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-post px-3 py-1 rounded-lg text-xs font-bold">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/repair</code>
                        </div>
                        <p class="text-gray-600 text-sm">Tente de réparer une session déconnectée. Recrée le client WhatsApp et génère un nouveau QR Code si nécessaire. Idéal pour les reconnexions automatiques.</p>
                        <div class="mt-3 p-3 bg-emerald-depths-50 rounded-lg">
                            <p class="text-xs text-emerald-depths-700"><span class="font-semibold">🔧 Utilisation :</span> Appelez cet endpoint lorsque vous détectez un statut DISCONNECTED ou une erreur d'envoi pour restaurer automatiquement la connexion.</p>
                        </div>
                    </div>

                    <!-- Logout & Delete -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div id="session-logout" class="endpoint-card bg-white rounded-2xl p-5">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span class="method-post px-3 py-1 rounded-lg text-xs font-bold">POST</span>
                                <code class="text-xs bg-gray-100 px-2 py-1 rounded font-mono break-all">/api/sessions/:sessionId/logout</code>
                            </div>
                            <p class="text-xs text-gray-600">Déconnecte la session de WhatsApp Web et supprime le client. Permet de reconnecter un autre appareil.</p>
                        </div>
                        <div id="session-delete" class="endpoint-card bg-white rounded-2xl p-5">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span class="method-delete px-3 py-1 rounded-lg text-xs font-bold">DELETE</span>
                                <code class="text-xs bg-gray-100 px-2 py-1 rounded font-mono break-all">/api/sessions/:sessionId</code>
                            </div>
                            <p class="text-xs text-gray-600">Supprime définitivement la session et toutes ses données locales.</p>
                        </div>
                    </div>

                    <!-- List Sessions -->
                    <div id="session-list" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-get px-3 py-1 rounded-lg text-xs font-bold">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono">/api/sessions</code>
                        </div>
                        <p class="text-gray-600 text-sm">Liste toutes les sessions actives avec leurs métadonnées (statut, numéro, nombre de messages, dernière activité).</p>
                    </div>

                    <!-- Ping -->
                    <div id="session-ping" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-post px-3 py-1 rounded-lg text-xs font-bold">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/ping</code>
                        </div>
                        <p class="text-gray-600 text-sm">Maintient la session active. À appeler toutes les 30-60 secondes pour éviter les timeouts et garder la connexion stable.</p>
                        <div class="mt-3 p-3 bg-evergreen-50 rounded-lg">
                            <p class="text-xs text-evergreen-700"><span class="font-semibold">⏱️ Bonne pratique :</span> Configurez un cron job ou un setInterval côté serveur pour appeler /ping régulièrement.</p>
                        </div>
                    </div>
                </div>

                <!-- MESSAGES SECTION -->
                <div class="space-y-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b-2 border-evergreen-200 pb-2">💬 Envoi et suivi des messages</h2>

                    <!-- Send Text -->
                    <div id="msg-send" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-post px-3 py-1 rounded-lg text-xs font-bold">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono">/api/messages/send</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Envoie un message texte à un destinataire WhatsApp. Le message est envoyé avec un timeout de 60 secondes et une tentative de retry automatique en cas d'échec.</p>
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="text-xs font-semibold text-gray-500 mb-2">Corps de la requête</p>
                                <div class="code-block-light p-3 rounded-xl">
                                    <pre class="text-xs text-gray-300"><code>{
  "sessionId": "client_123",
  "to": "2250700000000",
  "text": "Bonjour, votre commande est prête !",
  "mentions": ["2250700000000"],
  "reactions": "👍"
}</code></pre>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 mb-2">Réponse (200)</p>
                                <div class="code-block-light p-3 rounded-xl">
                                    <pre class="text-xs text-gray-300"><code>{
  "ok": true,
  "messageId": "ABC123XYZ789",
  "status": "sent",
  "from": {
    "number": "22501234567",
    "pushname": "John Doe"
  },
  "timestamp": "2024-03-25T10:00:00Z",
  "hasMedia": false
}</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-xl mb-4">
                            <p class="text-xs text-gray-600"><span class="font-semibold text-evergreen-600">📞 Format du numéro :</span> Numéro au format international sans le '+' (ex: 2250700000000 pour la Côte d'Ivoire, 33612345678 pour la France)</p>
                        </div>
                        <div class="mt-4">
                            <h4 class="font-bold text-sm mb-3 text-brand-dark">Exemples de code</h4>
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
  -d '{"sessionId":"client_123","to":"2250700000000","text":"Hello World"}'</code></pre></div>
                                <div class="code-block p-4 hidden" id="php-send"><pre><code>&lt;?php
$data = json_encode([
    "sessionId" => "client_123",
    "to" => "2250700000000",
    "text" => "Hello World"
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
payload = {"sessionId": "client_123", "to": "2250700000000", "text": "Hello World"}
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
        text: 'Hello World'
    })
})
.then(res => res.json())
.then(data => console.log(data));</code></pre></div>
                                <div class="code-block p-4 hidden" id="java-send"><pre><code>// Using OkHttp
OkHttpClient client = new OkHttpClient();
String json = "{\"sessionId\":\"client_123\",\"to\":\"2250700000000\",\"text\":\"Hello\"}";
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
                    </div>

                    <!-- Send Image -->
                    <div id="msg-image" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-post px-3 py-1 rounded-lg text-xs font-bold">POST</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono">/api/messages/send-image</code>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Envoie une image (depuis une URL ou en base64). Supporte les formats JPEG, PNG et GIF.</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs font-semibold text-gray-500 mb-2">Avec URL</p>
                                <div class="code-block-light p-3 rounded-xl">
                                    <pre class="text-xs text-gray-300"><code>{
  "sessionId": "client_123",
  "to": "2250700000000",
  "caption": "Votre facture #1234",
  "imageUrl": "https://example.com/invoice.jpg"
}</code></pre>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 mb-2">Avec Base64</p>
                                <div class="code-block-light p-3 rounded-xl">
                                    <pre class="text-xs text-gray-300"><code>{
  "sessionId": "client_123",
  "to": "2250700000000",
  "caption": "Image reçue",
  "imageBase64": "/9j/4AAQSkZJRgABAQEAYABgAAD..."
}</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Message Status -->
                    <div id="msg-status" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-get px-3 py-1 rounded-lg text-xs font-bold">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/messages/:messageId/status</code>
                        </div>
                        <p class="text-gray-600 text-sm">Vérifie l'accusé de réception d'un message. Retourne le statut détaillé du message.</p>
                        <div class="mt-3 flex flex-wrap gap-4">
                            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-gray-400"></span><span class="text-xs">pending</span><span class="text-xs text-gray-400">- En attente d'envoi</span></div>
                            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-blue-400"></span><span class="text-xs">sent</span><span class="text-xs text-gray-400">- Envoyé au serveur WhatsApp</span></div>
                            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-green-400"></span><span class="text-xs">delivered</span><span class="text-xs text-gray-400">- Délivré au téléphone</span></div>
                            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-evergreen-500"></span><span class="text-xs">read</span><span class="text-xs text-gray-400">- Lu par le destinataire</span></div>
                        </div>
                    </div>

                    <!-- List messages -->
                    <div id="msg-list" class="endpoint-card bg-white rounded-2xl p-5 md:p-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="method-get px-3 py-1 rounded-lg text-xs font-bold">GET</span>
                            <code class="text-sm bg-gray-100 px-3 py-1 rounded font-mono break-all">/api/sessions/:sessionId/messages</code>
                        </div>
                        <p class="text-gray-600 text-sm">Liste tous les messages envoyés pour une session donnée avec leurs statuts respectifs.</p>
                    </div>
                </div>

                <!-- SYSTEM SECTION -->
                <div class="space-y-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark border-b-2 border-evergreen-200 pb-2">⚙️ Système & Monitoring</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div id="health" class="endpoint-card bg-white rounded-2xl p-5">
                            <div class="flex flex-wrap items-center gap-3 mb-2">
                                <span class="method-get px-3 py-1 rounded-lg text-xs font-bold">GET</span>
                                <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/health</code>
                            </div>
                            <p class="text-xs text-gray-600">Vérifie l'état du service NotifyBridge. Retourne le nombre de sessions actives et le timestamp.</p>
                        </div>
                        <div id="stats" class="endpoint-card bg-white rounded-2xl p-5">
                            <div class="flex flex-wrap items-center gap-3 mb-2">
                                <span class="method-get px-3 py-1 rounded-lg text-xs font-bold">GET</span>
                                <code class="text-sm bg-gray-100 px-2 py-1 rounded font-mono">/api/stats</code>
                            </div>
                            <p class="text-xs text-gray-600">Statistiques globales : nombre de sessions actives, messages envoyés par statut, détails par session.</p>
                        </div>
                    </div>
                </div>

                <!-- Best Practices -->
                <section class="mt-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-6">✨ Bonnes pratiques</h2>
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
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <svg class="w-6 h-6 text-vanilla-custard-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <h3 class="font-bold text-white text-sm">Rate Limiting</h3>
                            <p class="text-gray-300 text-xs mt-1">Respectez les limites : 5-10 messages/minute par session pour éviter les blocages</p>
                        </div>
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <svg class="w-6 h-6 text-evergreen-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <h3 class="font-bold text-white text-sm">Gestion des erreurs</h3>
                            <p class="text-gray-300 text-xs mt-1">Implémentez une logique de retry exponentiel pour les erreurs 5xx</p>
                        </div>
                        <div class="p-4 bg-brand-dark rounded-xl">
                            <svg class="w-6 h-6 text-emerald-depths-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6-4h12a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 4v-2m-8 2v-2m8 4H6"></path>
                            </svg>
                            <h3 class="font-bold text-white text-sm">Session unique</h3>
                            <p class="text-gray-300 text-xs mt-1">Utilisez un sessionId unique par numéro WhatsApp pour éviter les conflits</p>
                        </div>
                    </div>
                </section>

                <!-- FAQ -->
                <section class="mt-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-dark mb-6">❓ Foire aux questions</h2>
                    <div class="space-y-4">
                        <div class="border rounded-xl p-4">
                            <h3 class="font-semibold text-brand-dark">Comment obtenir ma clé API ?</h3>
                            <p class="text-sm text-gray-600 mt-1">Créez un compte sur notre plateforme et accédez à la section "API Keys" de votre tableau de bord.</p>
                        </div>
                        <div class="border rounded-xl p-4">
                            <h3 class="font-semibold text-brand-dark">Que faire si le QR Code expire ?</h3>
                            <p class="text-sm text-gray-600 mt-1">Utilisez l'endpoint /repair pour générer un nouveau QR Code et relancer la session.</p>
                        </div>
                        <div class="border rounded-xl p-4">
                            <h3 class="font-semibold text-brand-dark">Puis-je utiliser le même numéro sur plusieurs sessions ?</h3>
                            <p class="text-sm text-gray-600 mt-1">Non, un numéro WhatsApp ne peut être connecté qu'à une seule session à la fois. Déconnectez-vous d'abord avec /logout.</p>
                        </div>
                        <div class="border rounded-xl p-4">
                            <h3 class="font-semibold text-brand-dark">Les sessions sont-elles persistantes ?</h3>
                            <p class="text-sm text-gray-600 mt-1">Oui, les sessions sont conservées localement. En cas de redémarrage du serveur, les sessions reconnectées automatiquement.</p>
                        </div>
                    </div>
                </section>

                <!-- Footer -->
                <footer class="pt-8 border-t border-gray-100 text-center text-gray-400 text-xs md:text-sm">
                    <p>&copy; 2025 NotifyBridge. Tous droits réservés.</p>
                    <p class="mt-2">API v1.0 | Dernière mise à jour : Mars 2025 | <a href="#" class="text-evergreen-600 hover:underline">Statut du service</a></p>
                </footer>
            </div>
        </div>
    </main>

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
                const allTabs = container.querySelectorAll('.tab-btn');
                const allCodeBlocks = container.querySelectorAll('[id$="start"], [id$="send"], [id$="image"]');
                allTabs.forEach(tab => tab.classList.remove('active', 'text-evergreen-600', 'border-b-2', 'border-evergreen-500'));
                allCodeBlocks.forEach(block => block.classList.add('hidden'));
                btn.classList.add('active', 'text-evergreen-600', 'border-b-2', 'border-evergreen-500');
                const targetElement = document.getElementById(targetId);
                if (targetElement) targetElement.classList.remove('hidden');
            });
            // Activate first tab by default
            if (btn.closest('.border') && btn === btn.closest('.border').querySelector('.tab-btn')) {
                btn.click();
            }
        });

        // Active link highlighting on scroll
        const sections = document.querySelectorAll('section[id], div[id]');
        const tocLinks = document.querySelectorAll('.toc-link');
        
        function highlightActiveLink() {
            let scrollPosition = window.scrollY + 150;
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