<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Référence API | NotifyBridge v6.0 - API WhatsApp Business multi-sessions</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Documentation technique complète de l'API NotifyBridge v6.0. API RESTful pour WhatsApp Business : sessions, messages, groupes, contacts, webhooks. Intégration facile pour e-commerce, CRM et SaaS.">
    <meta name="keywords" content="whatsapp api, whatsapp business api, api whatsapp, notifybridge, whatsapp web api, multi-session whatsapp, automation whatsapp, envoi message whatsapp, api rest whatsapp, webhook whatsapp">
    <meta name="author" content="NotifyBridge">
    <meta name="copyright" content="NotifyBridge">
    <meta name="robots" content="index, follow">
    <meta name="language" content="French">
    <meta name="geo.region" content="CI">
    <meta name="geo.country" content="Côte d'Ivoire">
    
    <!-- Open Graph -->
    <meta property="og:title" content="NotifyBridge v6.0 - API WhatsApp Business multi-sessions">
    <meta property="og:description" content="API RESTful complète pour WhatsApp. Connectez plusieurs numéros, envoyez messages, images, vidéos, gérez groupes et contacts.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://notifybridge.com/htdocs/api/">
    <meta property="og:site_name" content="NotifyBridge">
    <meta property="og:locale" content="fr_FR">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="NotifyBridge v6.0 - API WhatsApp Business">
    <meta name="twitter:description" content="API RESTful complète pour WhatsApp. Multi-sessions, messages, groupes, contacts, webhooks.">
    
    <!-- Canonical -->
    <link rel="canonical" href="https://notifybridge.com/htdocs/api/">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'evergreen': { 500: '#04fbca', 600: '#03c9a1', 700: '#029779', 800: '#026451', 900: '#013228' },
                        'brand': { dark: '#003D2F', forest: '#295840', cream: '#FFF2B5' }
                    },
                    fontFamily: { 'mono': ['JetBrains Mono', 'Consolas', 'monospace'] }
                }
            }
        }
    </script>
    <style>
        .method-badge { display: inline-block; padding: 0.25rem 0.75rem; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; color: white; }
        .method-get { background: #10b981; }
        .method-post { background: #3b82f6; }
        .method-delete { background: #ef4444; }
        .method-put { background: #f59e0b; }
        .code-block { background: #1e293b; color: #e2e8f0; font-family: 'JetBrains Mono', Consolas, monospace; border-radius: 0.75rem; overflow-x: auto; padding: 1rem; font-size: 0.8rem; }
        .response-example { background: #0f172a; border-radius: 0.75rem; padding: 1rem; margin-top: 1rem; }
        .endpoint-card { border: 1px solid #e5e7eb; border-radius: 1rem; transition: all 0.2s ease; background: white; }
        .endpoint-card:hover { transform: translateY(-2px); box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1); border-color: #04fbca; }
        .toc-link { display: block; padding: 0.5rem 0; font-size: 0.875rem; color: #4b5563; border-left: 3px solid transparent; padding-left: 0.75rem; transition: all 0.2s; }
        .toc-link:hover, .toc-link.active { color: #04fbca; border-left-color: #04fbca; }
        .lang-tab { cursor: pointer; padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; border-bottom: 2px solid transparent; transition: all 0.2s; }
        .lang-tab.active { color: #04fbca; border-bottom-color: #04fbca; }
        .lang-content { display: none; }
        .lang-content.active { display: block; }
        .copy-btn { position: absolute; top: 0.5rem; right: 0.5rem; background: #04fbca; color: #003D2F; padding: 0.25rem 0.75rem; border-radius: 0.375rem; font-size: 0.7rem; cursor: pointer; opacity: 0; transition: opacity 0.2s; }
        .code-block:hover .copy-btn { opacity: 1; }
        @media (max-width: 768px) { .copy-btn { opacity: 1; } }
        .sticky-toc { position: sticky; top: 100px; max-height: calc(100vh - 120px); overflow-y: auto; }
        .param-table { width: 100%; border-collapse: collapse; }
        .param-table th { background: #f9fafb; padding: 0.75rem; text-align: left; font-weight: 600; border-bottom: 2px solid #e5e7eb; }
        .param-table td { padding: 0.75rem; border-bottom: 1px solid #e5e7eb; }
        .required-badge { background: #fee2e2; color: #991b1b; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.7rem; font-weight: 600; }
        .optional-badge { background: #dbeafe; color: #1e40af; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.7rem; font-weight: 600; }
        @media (max-width: 1024px) { .sticky-toc { position: relative; top: auto; max-height: none; } }
    </style>
</head>
<body class="bg-white text-gray-800">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-evergreen-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                    <span class="text-xl font-bold text-brand-dark">Notify<span class="text-evergreen-500">Bridge</span></span>
                    <span class="text-xs bg-evergreen-100 text-evergreen-700 px-2 py-1 rounded-full">v6.0</span>
                </a>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-evergreen-600 font-semibold">Accueil</a>
                    <a href="/docs" class="text-gray-700 hover:text-evergreen-600 font-semibold">Documentation</a>
                    <a href="/api" class="text-evergreen-600 font-semibold">Référence API</a>
                </nav>
                <a href="/console" class="hidden md:block bg-brand-dark text-white px-6 py-2 rounded-xl font-semibold hover:bg-brand-forest transition">Console</a>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-brand-dark mb-4">Référence API NotifyBridge</h1>
            <p class="text-gray-600 max-w-3xl mx-auto">Documentation complète de l'API RESTful pour intégrer WhatsApp Business dans vos applications.</p>
            <div class="flex flex-wrap justify-center gap-3 mt-6">
                <div class="bg-brand-dark text-white px-4 py-2 rounded-xl text-sm font-semibold">Base URL: <span class="text-evergreen-400">https://notifybridge-production.up.railway.app/api</span></div>
                <div class="bg-gray-100 text-gray-700 px-4 py-2 rounded-xl text-sm font-semibold">Version: 6.0</div>
                <div class="bg-evergreen-50 text-evergreen-700 px-4 py-2 rounded-xl text-sm font-semibold">Rate Limit: 100 req/min</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar TOC -->
            <aside class="lg:col-span-1">
                <div class="sticky-toc bg-gray-50 rounded-xl p-4 border border-gray-100">
                    <h3 class="text-xs font-bold text-gray-400 uppercase mb-4">Sommaire</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#introduction" class="toc-link">Introduction</a></li>
                        <li><a href="#authentication" class="toc-link">Authentification</a></li>
                        <li><a href="#error-codes" class="toc-link">Codes d'erreur</a></li>
                        <li class="pt-2 mt-2 border-t border-gray-200"><span class="text-xs font-bold text-evergreen-600">SESSIONS</span></li>
                        <li><a href="#session-start" class="toc-link pl-4">POST /sessions/:id/start</a></li>
                        <li><a href="#session-qr" class="toc-link pl-4">GET /sessions/:id/qr</a></li>
                        <li><a href="#session-status" class="toc-link pl-4">GET /sessions/:id/status</a></li>
                        <li><a href="#session-info" class="toc-link pl-4">GET /sessions/:id/info</a></li>
                        <li><a href="#session-delete" class="toc-link pl-4">DELETE /sessions/:id</a></li>
                        <li class="pt-2 mt-2 border-t border-gray-200"><span class="text-xs font-bold text-evergreen-600">MESSAGES</span></li>
                        <li><a href="#msg-send" class="toc-link pl-4">POST /messages/send</a></li>
                        <li><a href="#msg-batch" class="toc-link pl-4">POST /messages/batch</a></li>
                        <li><a href="#msg-status" class="toc-link pl-4">GET /messages/:id/status</a></li>
                        <li class="pt-2 mt-2 border-t border-gray-200"><span class="text-xs font-bold text-evergreen-600">UTILITAIRES</span></li>
                        <li><a href="#health" class="toc-link pl-4">GET /health</a></li>
                        <li><a href="#health-extended" class="toc-link pl-4">GET /health/extended</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Introduction -->
                <section id="introduction" class="scroll-mt-20">
                    <h2 class="text-2xl font-bold text-brand-dark mb-4">Introduction</h2>
                    <p class="text-gray-600">NotifyBridge est une API RESTful qui vous permet d'automatiser l'envoi de messages WhatsApp. Cette référence contient tous les endpoints disponibles, leurs paramètres, exemples de code et réponses.</p>
                </section>

                <!-- Authentication -->
                <section id="authentication" class="scroll-mt-20">
                    <h2 class="text-2xl font-bold text-brand-dark mb-4">Authentification</h2>
                    <p class="text-gray-600 mb-4">Toutes les requêtes doivent inclure votre clé API dans l'en-tête <code class="bg-gray-100 px-2 py-1 rounded">x-api-key</code>.</p>
                    <div class="code-block relative">
                        <pre>x-api-key: wa_your_api_key_here</pre>
                        <button class="copy-btn" onclick="copyToClipboard(this)">Copier</button>
                    </div>
                </section>

                <!-- Error Codes -->
                <section id="error-codes" class="scroll-mt-20">
                    <h2 class="text-2xl font-bold text-brand-dark mb-4">Codes d'erreur</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded"><strong>400</strong> - Paramètres invalides</div>
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded"><strong>401</strong> - Clé API invalide</div>
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded"><strong>404</strong> - Ressource non trouvée</div>
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded"><strong>429</strong> - Rate limit dépassé</div>
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded"><strong>500</strong> - Erreur serveur</div>
                    </div>
                </section>

                <!-- SESSIONS -->
                <h2 class="text-2xl font-bold text-evergreen-600 pt-4">Sessions</h2>

                <!-- POST /sessions/:id/start -->
                <div id="session-start" class="endpoint-card p-5 scroll-mt-20">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="method-badge method-post">POST</span>
                        <code class="text-gray-700 font-mono">/sessions/:sessionId/start</code>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Démarre une nouvelle session WhatsApp. Retourne l'ID de session et génère un QR code pour le scan.</p>
                    
                    <div class="mb-4">
                        <h4 class="font-semibold text-sm mb-2">Paramètres</h4>
                        <table class="param-table text-sm">
                            <thead><tr><th>Paramètre</th><th>Type</th><th>Description</th></tr></thead>
                            <tbody><tr><td><code>:sessionId</code></td><td>string</td><td>Identifiant unique de la session</td></tr></tbody>
                        </table>
                    </div>

                    <h4 class="font-semibold text-sm mb-2">Exemples</h4>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="flex flex-wrap bg-gray-50 border-b">
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="curl-start">cURL</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="php-start">PHP</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="python-start">Python</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="javascript-start">JavaScript</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="java-start">Java</button>
                        </div>
                        <div id="curl-start" class="lang-content code-block relative"><pre>curl -X POST https://notifybridge-production.up.railway.app/api/sessions/user_123/start \
  -H "x-api-key: wa_your_api_key_here"</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="php-start" class="lang-content code-block relative"><pre>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/sessions/user_123/start');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-api-key: wa_your_api_key_here']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="python-start" class="lang-content code-block relative"><pre>import requests
url = "https://notifybridge-production.up.railway.app/api/sessions/user_123/start"
headers = {"x-api-key": "wa_your_api_key_here"}
response = requests.post(url, headers=headers)
print(response.json())</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="javascript-start" class="lang-content code-block relative"><pre>fetch('https://notifybridge-production.up.railway.app/api/sessions/user_123/start', {
    method: 'POST',
    headers: { 'x-api-key': 'wa_your_api_key_here' }
})
.then(res => res.json())
.then(data => console.log(data));</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="java-start" class="lang-content code-block relative"><pre>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/sessions/user_123/start"))
    .header("x-api-key", "wa_your_api_key_here")
    .POST(HttpRequest.BodyPublishers.noBody())
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                    </div>

                    <h4 class="font-semibold text-sm mb-2 mt-4">Réponse (200)</h4>
                    <div class="response-example"><pre class="text-xs text-gray-300">{
  "ok": true,
  "message": "Session initialisée",
  "sessionId": "user_123"
}</pre></div>
                </div>

                <!-- GET /sessions/:id/qr -->
                <div id="session-qr" class="endpoint-card p-5 scroll-mt-20">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="method-badge method-get">GET</span>
                        <code class="text-gray-700 font-mono">/sessions/:sessionId/qr</code>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Récupère le QR code au format base64 pour scanner avec WhatsApp.</p>
                    
                    <h4 class="font-semibold text-sm mb-2">Exemples</h4>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="flex flex-wrap bg-gray-50 border-b">
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="curl-qr">cURL</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="php-qr">PHP</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="python-qr">Python</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="javascript-qr">JavaScript</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="java-qr">Java</button>
                        </div>
                        <div id="curl-qr" class="lang-content code-block relative"><pre>curl -X GET https://notifybridge-production.up.railway.app/api/sessions/user_123/qr \
  -H "x-api-key: wa_your_api_key_here"</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="php-qr" class="lang-content code-block relative"><pre>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/sessions/user_123/qr');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-api-key: wa_your_api_key_here']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="python-qr" class="lang-content code-block relative"><pre>import requests
url = "https://notifybridge-production.up.railway.app/api/sessions/user_123/qr"
headers = {"x-api-key": "wa_your_api_key_here"}
response = requests.get(url, headers=headers)
print(response.json())</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="javascript-qr" class="lang-content code-block relative"><pre>fetch('https://notifybridge-production.up.railway.app/api/sessions/user_123/qr', {
    headers: { 'x-api-key': 'wa_your_api_key_here' }
})
.then(res => res.json())
.then(data => console.log(data));</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="java-qr" class="lang-content code-block relative"><pre>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/sessions/user_123/qr"))
    .header("x-api-key", "wa_your_api_key_here")
    .GET()
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                    </div>

                    <h4 class="font-semibold text-sm mb-2 mt-4">Réponse (200)</h4>
                    <div class="response-example"><pre class="text-xs text-gray-300">{
  "ok": true,
  "qr": "data:image/png;base64,iVBORw0KGgo...",
  "status": "SCAN_QR"
}</pre></div>
                </div>

                <!-- GET /sessions/:id/status -->
                <div id="session-status" class="endpoint-card p-5 scroll-mt-20">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="method-badge method-get">GET</span>
                        <code class="text-gray-700 font-mono">/sessions/:sessionId/status</code>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Vérifie l'état de la session (STARTING, SCAN_QR, WORKING, DISCONNECTED).</p>
                    
                    <h4 class="font-semibold text-sm mb-2">Exemples</h4>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="flex flex-wrap bg-gray-50 border-b">
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="curl-status">cURL</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="php-status">PHP</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="python-status">Python</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="javascript-status">JavaScript</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="java-status">Java</button>
                        </div>
                        <div id="curl-status" class="lang-content code-block relative"><pre>curl -X GET https://notifybridge-production.up.railway.app/api/sessions/user_123/status \
  -H "x-api-key: wa_your_api_key_here"</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="php-status" class="lang-content code-block relative"><pre>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/sessions/user_123/status');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-api-key: wa_your_api_key_here']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="python-status" class="lang-content code-block relative"><pre>import requests
url = "https://notifybridge-production.up.railway.app/api/sessions/user_123/status"
headers = {"x-api-key": "wa_your_api_key_here"}
response = requests.get(url, headers=headers)
print(response.json())</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="javascript-status" class="lang-content code-block relative"><pre>fetch('https://notifybridge-production.up.railway.app/api/sessions/user_123/status', {
    headers: { 'x-api-key': 'wa_your_api_key_here' }
})
.then(res => res.json())
.then(data => console.log(data));</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="java-status" class="lang-content code-block relative"><pre>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/sessions/user_123/status"))
    .header("x-api-key", "wa_your_api_key_here")
    .GET()
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                    </div>

                    <h4 class="font-semibold text-sm mb-2 mt-4">Réponse (200)</h4>
                    <div class="response-example"><pre class="text-xs text-gray-300">{
  "ok": true,
  "status": "WORKING",
  "phoneNumber": "33612345678",
  "pushname": "Ghislain",
  "error": null
}</pre></div>
                </div>

                <!-- GET /sessions/:id/info -->
                <div id="session-info" class="endpoint-card p-5 scroll-mt-20">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="method-badge method-get">GET</span>
                        <code class="text-gray-700 font-mono">/sessions/:sessionId/info</code>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Récupère toutes les informations du numéro connecté (batterie, plateforme, infos appareil).</p>
                    
                    <h4 class="font-semibold text-sm mb-2">Exemples</h4>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="flex flex-wrap bg-gray-50 border-b">
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="curl-info">cURL</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="php-info">PHP</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="python-info">Python</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="javascript-info">JavaScript</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="java-info">Java</button>
                        </div>
                        <div id="curl-info" class="lang-content code-block relative"><pre>curl -X GET https://notifybridge-production.up.railway.app/api/sessions/user_123/info \
  -H "x-api-key: wa_your_api_key_here"</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="php-info" class="lang-content code-block relative"><pre>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/sessions/user_123/info');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-api-key: wa_your_api_key_here']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="python-info" class="lang-content code-block relative"><pre>import requests
url = "https://notifybridge-production.up.railway.app/api/sessions/user_123/info"
headers = {"x-api-key": "wa_your_api_key_here"}
response = requests.get(url, headers=headers)
print(response.json())</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="javascript-info" class="lang-content code-block relative"><pre>fetch('https://notifybridge-production.up.railway.app/api/sessions/user_123/info', {
    headers: { 'x-api-key': 'wa_your_api_key_here' }
})
.then(res => res.json())
.then(data => console.log(data));</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="java-info" class="lang-content code-block relative"><pre>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/sessions/user_123/info"))
    .header("x-api-key", "wa_your_api_key_here")
    .GET()
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                    </div>

                    <h4 class="font-semibold text-sm mb-2 mt-4">Réponse (200)</h4>
                    <div class="response-example"><pre class="text-xs text-gray-300">{
  "ok": true,
  "sessionId": "user_123",
  "status": "WORKING",
  "userInfo": {
    "battery": { "percentage": 85, "plugged": true },
    "platform": "windows"
  },
  "contactInfo": {
    "pushname": "Ghislain",
    "formattedNumber": "+33 6 12 34 56 78"
  }
}</pre></div>
                </div>

                <!-- DELETE /sessions/:id -->
                <div id="session-delete" class="endpoint-card p-5 scroll-mt-20">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="method-badge method-delete">DELETE</span>
                        <code class="text-gray-700 font-mono">/sessions/:sessionId</code>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Supprime définitivement une session WhatsApp.</p>
                    
                    <h4 class="font-semibold text-sm mb-2">Exemples</h4>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="flex flex-wrap bg-gray-50 border-b">
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="curl-delete">cURL</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="php-delete">PHP</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="python-delete">Python</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="javascript-delete">JavaScript</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="java-delete">Java</button>
                        </div>
                        <div id="curl-delete" class="lang-content code-block relative"><pre>curl -X DELETE https://notifybridge-production.up.railway.app/api/sessions/user_123 \
  -H "x-api-key: wa_your_api_key_here"</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="php-delete" class="lang-content code-block relative"><pre>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/sessions/user_123');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-api-key: wa_your_api_key_here']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="python-delete" class="lang-content code-block relative"><pre>import requests
url = "https://notifybridge-production.up.railway.app/api/sessions/user_123"
headers = {"x-api-key": "wa_your_api_key_here"}
response = requests.delete(url, headers=headers)
print(response.json())</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="javascript-delete" class="lang-content code-block relative"><pre>fetch('https://notifybridge-production.up.railway.app/api/sessions/user_123', {
    method: 'DELETE',
    headers: { 'x-api-key': 'wa_your_api_key_here' }
})
.then(res => res.json())
.then(data => console.log(data));</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="java-delete" class="lang-content code-block relative"><pre>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/sessions/user_123"))
    .header("x-api-key", "wa_your_api_key_here")
    .DELETE()
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                    </div>

                    <h4 class="font-semibold text-sm mb-2 mt-4">Réponse (200)</h4>
                    <div class="response-example"><pre class="text-xs text-gray-300">{
  "ok": true,
  "message": "Session supprimée",
  "sessionId": "user_123"
}</pre></div>
                </div>

                <!-- MESSAGES -->
                <h2 class="text-2xl font-bold text-evergreen-600 pt-4">Messages</h2>

                <!-- POST /messages/send -->
                <div id="msg-send" class="endpoint-card p-5 scroll-mt-20">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="method-badge method-post">POST</span>
                        <code class="text-gray-700 font-mono">/messages/send</code>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Envoie un message texte ou un média (image, vidéo, audio, fichier).</p>
                    
                    <div class="mb-4">
                        <h4 class="font-semibold text-sm mb-2">Paramètres (JSON)</h4>
                        <table class="param-table text-sm">
                            <thead><tr><th>Paramètre</th><th>Type</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>sessionId</code></td><td>string</td><td><span class="required-badge">Obligatoire</span> ID de session</td></tr>
                                <tr><td><code>to</code></td><td>string</td><td><span class="required-badge">Obligatoire</span> Numéro destinataire</td></tr>
                                <tr><td><code>text</code></td><td>string</td><td><span class="required-badge">Obligatoire</span> Contenu du message</td></tr>
                                <tr><td><code>image</code></td><td>URL</td><td><span class="optional-badge">Optionnel</span> URL de l'image</td></tr>
                                <tr><td><code>video</code></td><td>URL</td><td><span class="optional-badge">Optionnel</span> URL de la vidéo</td></tr>
                                <tr><td><code>audio</code></td><td>URL</td><td><span class="optional-badge">Optionnel</span> URL de l'audio</td></tr>
                                <tr><td><code>file</code></td><td>URL</td><td><span class="optional-badge">Optionnel</span> URL du fichier</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="font-semibold text-sm mb-2">Exemples</h4>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="flex flex-wrap bg-gray-50 border-b">
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="curl-send">cURL</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="php-send">PHP</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="python-send">Python</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="javascript-send">JavaScript</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="java-send">Java</button>
                        </div>
                        <div id="curl-send" class="lang-content code-block relative"><pre>curl -X POST https://notifybridge-production.up.railway.app/api/messages/send \
  -H "x-api-key: wa_your_api_key_here" \
  -H "Content-Type: application/json" \
  -d '{"sessionId":"user_123","to":"33612345678","text":"Bonjour !"}'</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="php-send" class="lang-content code-block relative"><pre>&lt;?php
$data = json_encode(["sessionId" => "user_123", "to" => "33612345678", "text" => "Bonjour !"]);
$ch = curl_init("https://notifybridge-production.up.railway.app/api/messages/send");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["x-api-key: wa_your_api_key_here", "Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo curl_exec($ch);
curl_close($ch);
?&gt;</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="python-send" class="lang-content code-block relative"><pre>import requests
url = "https://notifybridge-production.up.railway.app/api/messages/send"
headers = {"x-api-key": "wa_your_api_key_here", "Content-Type": "application/json"}
payload = {"sessionId": "user_123", "to": "33612345678", "text": "Bonjour !"}
r = requests.post(url, json=payload, headers=headers)
print(r.json())</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="javascript-send" class="lang-content code-block relative"><pre>fetch('https://notifybridge-production.up.railway.app/api/messages/send', {
    method: 'POST',
    headers: { 'x-api-key': 'wa_your_api_key_here', 'Content-Type': 'application/json' },
    body: JSON.stringify({ sessionId: 'user_123', to: '33612345678', text: 'Bonjour !' })
})
.then(res => res.json())
.then(data => console.log(data));</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="java-send" class="lang-content code-block relative"><pre>OkHttpClient client = new OkHttpClient();
String json = "{\"sessionId\":\"user_123\",\"to\":\"33612345678\",\"text\":\"Bonjour !\"}";
RequestBody body = RequestBody.create(json, MediaType.parse("application/json"));
Request request = new Request.Builder()
    .url("https://notifybridge-production.up.railway.app/api/messages/send")
    .addHeader("x-api-key", "wa_your_api_key_here")
    .post(body)
    .build();
Response response = client.newCall(request).execute();
System.out.println(response.body().string());</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                    </div>

                    <h4 class="font-semibold text-sm mb-2 mt-4">Réponse (200)</h4>
                    <div class="response-example"><pre class="text-xs text-gray-300">{
  "ok": true,
  "messageId": "msg_1234567890_abc123",
  "status": "sent",
  "to": "33612345678",
  "text": "Bonjour !",
  "timestamp": "2026-03-23T10:30:00Z"
}</pre></div>
                </div>

                <!-- POST /messages/batch -->
                <div id="msg-batch" class="endpoint-card p-5 scroll-mt-20">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="method-badge method-post">POST</span>
                        <code class="text-gray-700 font-mono">/messages/batch</code>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Envoie le même message à plusieurs destinataires.</p>
                    
                    <div class="mb-4">
                        <h4 class="font-semibold text-sm mb-2">Paramètres (JSON)</h4>
                        <table class="param-table text-sm">
                            <thead><tr><th>Paramètre</th><th>Type</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>sessionId</code></td><td>string</td><td><span class="required-badge">Obligatoire</span> ID de session</td></tr>
                                <tr><td><code>recipients</code></td><td>array</td><td><span class="required-badge">Obligatoire</span> Tableau de numéros</td></tr>
                                <tr><td><code>text</code></td><td>string</td><td><span class="required-badge">Obligatoire</span> Contenu du message</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="font-semibold text-sm mb-2">Exemples</h4>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="flex flex-wrap bg-gray-50 border-b">
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="curl-batch">cURL</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="php-batch">PHP</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="python-batch">Python</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="javascript-batch">JavaScript</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="java-batch">Java</button>
                        </div>
                        <div id="curl-batch" class="lang-content code-block relative"><pre>curl -X POST https://notifybridge-production.up.railway.app/api/messages/batch \
  -H "x-api-key: wa_your_api_key_here" \
  -H "Content-Type: application/json" \
  -d '{"sessionId":"user_123","recipients":["33612345678","33687654321"],"text":"Message groupé"}'</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="php-batch" class="lang-content code-block relative"><pre>&lt;?php
$data = json_encode(["sessionId" => "user_123", "recipients" => ["33612345678","33687654321"], "text" => "Message groupé"]);
$ch = curl_init("https://notifybridge-production.up.railway.app/api/messages/batch");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["x-api-key: wa_your_api_key_here", "Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo curl_exec($ch);
curl_close($ch);
?&gt;</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="python-batch" class="lang-content code-block relative"><pre>import requests
url = "https://notifybridge-production.up.railway.app/api/messages/batch"
headers = {"x-api-key": "wa_your_api_key_here", "Content-Type": "application/json"}
payload = {"sessionId": "user_123", "recipients": ["33612345678","33687654321"], "text": "Message groupé"}
r = requests.post(url, json=payload, headers=headers)
print(r.json())</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="javascript-batch" class="lang-content code-block relative"><pre>fetch('https://notifybridge-production.up.railway.app/api/messages/batch', {
    method: 'POST',
    headers: { 'x-api-key': 'wa_your_api_key_here', 'Content-Type': 'application/json' },
    body: JSON.stringify({ sessionId: 'user_123', recipients: ['33612345678','33687654321'], text: 'Message groupé' })
})
.then(res => res.json())
.then(data => console.log(data));</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="java-batch" class="lang-content code-block relative"><pre>OkHttpClient client = new OkHttpClient();
String json = "{\"sessionId\":\"user_123\",\"recipients\":[\"33612345678\",\"33687654321\"],\"text\":\"Message groupé\"}";
RequestBody body = RequestBody.create(json, MediaType.parse("application/json"));
Request request = new Request.Builder()
    .url("https://notifybridge-production.up.railway.app/api/messages/batch")
    .addHeader("x-api-key", "wa_your_api_key_here")
    .post(body)
    .build();
Response response = client.newCall(request).execute();
System.out.println(response.body().string());</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                    </div>

                    <h4 class="font-semibold text-sm mb-2 mt-4">Réponse (200)</h4>
                    <div class="response-example"><pre class="text-xs text-gray-300">{
  "ok": true,
  "sent": 2,
  "failed": 0,
  "messages": [
    { "messageId": "msg_abc123", "to": "33612345678", "status": "sent" },
    { "messageId": "msg_abc124", "to": "33687654321", "status": "sent" }
  ]
}</pre></div>
                </div>

                <!-- GET /messages/:id/status -->
                <div id="msg-status" class="endpoint-card p-5 scroll-mt-20">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="method-badge method-get">GET</span>
                        <code class="text-gray-700 font-mono">/messages/:messageId/status</code>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Vérifie le statut d'un message (pending, sent, delivered, read, played).</p>
                    
                    <h4 class="font-semibold text-sm mb-2">Exemples</h4>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="flex flex-wrap bg-gray-50 border-b">
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="curl-msgstatus">cURL</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="php-msgstatus">PHP</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="python-msgstatus">Python</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="javascript-msgstatus">JavaScript</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="java-msgstatus">Java</button>
                        </div>
                        <div id="curl-msgstatus" class="lang-content code-block relative"><pre>curl -X GET https://notifybridge-production.up.railway.app/api/messages/msg_1234567890_abc123/status \
  -H "x-api-key: wa_your_api_key_here"</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="php-msgstatus" class="lang-content code-block relative"><pre>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/messages/msg_1234567890_abc123/status');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-api-key: wa_your_api_key_here']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="python-msgstatus" class="lang-content code-block relative"><pre>import requests
url = "https://notifybridge-production.up.railway.app/api/messages/msg_1234567890_abc123/status"
headers = {"x-api-key": "wa_your_api_key_here"}
response = requests.get(url, headers=headers)
print(response.json())</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="javascript-msgstatus" class="lang-content code-block relative"><pre>fetch('https://notifybridge-production.up.railway.app/api/messages/msg_1234567890_abc123/status', {
    headers: { 'x-api-key': 'wa_your_api_key_here' }
})
.then(res => res.json())
.then(data => console.log(data));</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="java-msgstatus" class="lang-content code-block relative"><pre>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/messages/msg_1234567890_abc123/status"))
    .header("x-api-key", "wa_your_api_key_here")
    .GET()
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                    </div>

                    <h4 class="font-semibold text-sm mb-2 mt-4">Réponse (200)</h4>
                    <div class="response-example"><pre class="text-xs text-gray-300">{
  "ok": true,
  "messageId": "msg_1234567890_abc123",
  "status": "read",
  "ack": 3,
  "lastUpdate": "2026-03-23T10:35:00Z"
}</pre></div>
                    <p class="text-xs text-gray-500 mt-2">Statuts: pending (0), sent (1), delivered (2), read (3), played (4)</p>
                </div>

                <!-- UTILITAIRES -->
                <h2 class="text-2xl font-bold text-evergreen-600 pt-4">Utilitaires</h2>

                <!-- GET /health -->
                <div id="health" class="endpoint-card p-5 scroll-mt-20">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="method-badge method-get">GET</span>
                        <code class="text-gray-700 font-mono">/health</code>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Vérifie l'état de santé de l'API.</p>
                    
                    <h4 class="font-semibold text-sm mb-2">Exemples</h4>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="flex flex-wrap bg-gray-50 border-b">
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="curl-health">cURL</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="php-health">PHP</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="python-health">Python</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="javascript-health">JavaScript</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="java-health">Java</button>
                        </div>
                        <div id="curl-health" class="lang-content code-block relative"><pre>curl https://notifybridge-production.up.railway.app/api/health</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="php-health" class="lang-content code-block relative"><pre>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/health');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="python-health" class="lang-content code-block relative"><pre>import requests
response = requests.get('https://notifybridge-production.up.railway.app/api/health')
print(response.json())</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="javascript-health" class="lang-content code-block relative"><pre>fetch('https://notifybridge-production.up.railway.app/api/health')
.then(res => res.json())
.then(data => console.log(data));</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="java-health" class="lang-content code-block relative"><pre>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/health"))
    .GET()
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                    </div>

                    <h4 class="font-semibold text-sm mb-2 mt-4">Réponse (200)</h4>
                    <div class="response-example"><pre class="text-xs text-gray-300">{
  "status": "ok",
  "timestamp": "2026-03-23T10:30:00Z",
  "activeSessions": 5,
  "trackedMessages": 42
}</pre></div>
                </div>

                <!-- GET /health/extended -->
                <div id="health-extended" class="endpoint-card p-5 scroll-mt-20">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="method-badge method-get">GET</span>
                        <code class="text-gray-700 font-mono">/health/extended</code>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Health check détaillé avec métriques PHP, cache et mémoire.</p>
                    
                    <h4 class="font-semibold text-sm mb-2">Exemples</h4>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="flex flex-wrap bg-gray-50 border-b">
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="curl-hext">cURL</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="php-hext">PHP</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="python-hext">Python</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="javascript-hext">JavaScript</button>
                            <button class="lang-tab px-4 py-2 text-sm" data-lang="java-hext">Java</button>
                        </div>
                        <div id="curl-hext" class="lang-content code-block relative"><pre>curl https://notifybridge-production.up.railway.app/api/health/extended</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="php-hext" class="lang-content code-block relative"><pre>&lt;?php
$ch = curl_init('https://notifybridge-production.up.railway.app/api/health/extended');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?&gt;</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="python-hext" class="lang-content code-block relative"><pre>import requests
response = requests.get('https://notifybridge-production.up.railway.app/api/health/extended')
print(response.json())</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="javascript-hext" class="lang-content code-block relative"><pre>fetch('https://notifybridge-production.up.railway.app/api/health/extended')
.then(res => res.json())
.then(data => console.log(data));</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                        <div id="java-hext" class="lang-content code-block relative"><pre>HttpClient client = HttpClient.newHttpClient();
HttpRequest request = HttpRequest.newBuilder()
    .uri(URI.create("https://notifybridge-production.up.railway.app/api/health/extended"))
    .GET()
    .build();
client.sendAsync(request, HttpResponse.BodyHandlers.ofString())
    .thenAccept(System.out::println);</pre><button class="copy-btn" onclick="copyToClipboard(this)">Copier</button></div>
                    </div>

                    <h4 class="font-semibold text-sm mb-2 mt-4">Réponse (200)</h4>
                    <div class="response-example"><pre class="text-xs text-gray-300">{
  "status": "ok",
  "timestamp": "2026-03-23T10:30:00Z",
  "activeSessions": 5,
  "php": { "available": true, "responseTime": 45 },
  "authCacheSize": 12,
  "memoryUsage": { "used": 128, "total": 512 }
}</pre></div>
                </div>

                <!-- Footer -->
                <div class="border-t pt-8 mt-8 text-center text-gray-500 text-sm">
                    <p>© 2026 NotifyBridge. Tous droits réservés.</p>
                    <p class="mt-2">API v6.0 | Dernière mise à jour : Mars 2026</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Copy to clipboard
        function copyToClipboard(button) {
            const pre = button.parentElement.querySelector('pre');
            const text = pre ? pre.textContent : '';
            navigator.clipboard.writeText(text).then(() => {
                const original = button.textContent;
                button.textContent = '✓ Copié!';
                setTimeout(() => button.textContent = original, 2000);
            });
        }

        // Language tabs activation
        document.querySelectorAll('.lang-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                const langId = this.getAttribute('data-lang');
                const container = this.closest('.border');
                const langContents = container.querySelectorAll('.lang-content');
                const tabs = container.querySelectorAll('.lang-tab');
                
                langContents.forEach(content => content.classList.remove('active'));
                tabs.forEach(t => t.classList.remove('active'));
                
                document.getElementById(langId).classList.add('active');
                this.classList.add('active');
            });
        });

        // Activate first tab of each group
        document.querySelectorAll('.border').forEach(container => {
            const firstTab = container.querySelector('.lang-tab');
            if (firstTab) {
                const firstLangId = firstTab.getAttribute('data-lang');
                const firstContent = document.getElementById(firstLangId);
                if (firstContent) {
                    firstContent.classList.add('active');
                    firstTab.classList.add('active');
                }
            }
        });

        // Active TOC link on scroll
        const sections = document.querySelectorAll('section[id], div[id][class*="endpoint-card"]');
        const tocLinks = document.querySelectorAll('.toc-link');
        
        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (pageYOffset >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });
            tocLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>