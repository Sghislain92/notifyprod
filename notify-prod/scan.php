<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotifyBridge - Scanner QR WhatsApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .log-success { background-color: #f0fdf4; border-left: 4px solid #22c55e; }
        .log-error { background-color: #fef2f2; border-left: 4px solid #ef4444; }
        .log-info { background-color: #eff6ff; border-left: 4px solid #3b82f6; }
        .log-warning { background-color: #fffbeb; border-left: 4px solid #f59e0b; }
        .log-json { font-family: monospace; font-size: 11px; background: #1e293b; color: #e2e8f0; padding: 8px; border-radius: 6px; overflow-x: auto; white-space: pre-wrap; word-break: break-all; max-height: 200px; overflow-y: auto; }
        .log-entry { padding: 8px 12px; margin-bottom: 8px; border-radius: 8px; transition: all 0.2s; }
        .log-entry:hover { transform: translateX(4px); }
    </style>
</head>
<body class="bg-gradient-to-br from-green-50 to-blue-50 min-h-screen">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.531 3.506z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">NotifyBridge</h1>
                        <p class="text-sm text-gray-500">Connecteur WhatsApp Business API</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div id="connection-status" class="flex items-center space-x-2 text-sm">
                        <div id="status-dot" class="w-2 h-2 bg-gray-400 rounded-full"></div>
                        <span id="status-text" class="text-gray-600">Déconnecté</span>
                    </div>
                    <div id="session-identity" class="hidden text-sm bg-gray-100 rounded-lg px-3 py-1">
                        <span class="font-mono text-xs" id="session-number"></span>
                        <span class="text-gray-400 mx-1">•</span>
                        <span id="session-pushname"></span>
                    </div>
                    <button onclick="clearLogs()" class="text-xs bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded-full transition">
                        🧹 Effacer logs
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Colonne gauche : Contrôle et QR -->
            <div class="space-y-6">
                <!-- Control Panel -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-800">Panneau de Contrôle</h2>
                        <div id="session-id-display" class="text-xs text-gray-500 font-mono hidden">
                            Session: <span id="current-session-id"></span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <button id="start-session-btn" onclick="startNewSession()" 
                                class="flex items-center justify-center space-x-2 bg-green-500 hover:bg-green-600 disabled:bg-gray-300 text-white font-medium py-3 px-4 rounded-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span>Nouvelle Session</span>
                        </button>
                        
                        <button id="refresh-qr-btn" onclick="refreshQR()" disabled
                                class="flex items-center justify-center space-x-2 bg-blue-500 hover:bg-blue-600 disabled:bg-gray-300 text-white font-medium py-3 px-4 rounded-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            <span>Actualiser QR</span>
                        </button>
                        
                        <button id="get-info-btn" onclick="getSessionInfo()" disabled
                                class="flex items-center justify-center space-x-2 bg-purple-500 hover:bg-purple-600 disabled:bg-gray-300 text-white font-medium py-3 px-4 rounded-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Infos Session</span>
                        </button>
                        
                        <button id="stop-session-btn" onclick="stopSession()" disabled
                                class="flex items-center justify-center space-x-2 bg-red-500 hover:bg-red-600 disabled:bg-gray-300 text-white font-medium py-3 px-4 rounded-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <span>Fermer Session</span>
                        </button>
                    </div>
                    
                    <div id="status-message" class="mt-4 p-3 rounded-lg bg-gray-50 border border-gray-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-700">En attente</p>
                                <p class="text-xs text-gray-500">Cliquez sur "Nouvelle Session" pour commencer</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- QR Code Section -->
                <div id="qr-section" class="bg-white rounded-xl shadow-lg p-6 hidden">
                    <div class="text-center">
                        <div class="flex items-center justify-center space-x-3 mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Code QR WhatsApp</h3>
                            <div id="qr-timer" class="hidden">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span id="timer-seconds">0</span>s
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex flex-col items-center space-y-6">
                            <div class="relative">
                                <div id="qr-container" class="p-6 bg-white rounded-lg border-2 border-gray-200 shadow-inner">
                                    <div id="qr-loading" class="flex flex-col items-center space-y-3">
                                        <div class="animate-spin rounded-full h-16 w-16 border-4 border-gray-200 border-t-green-500"></div>
                                        <p class="text-sm text-gray-600">Génération du QR code...</p>
                                    </div>
                                    <div id="qr-display" class="hidden"></div>
                                </div>
                                <div id="qr-expired-overlay" class="hidden absolute inset-0 bg-red-500 bg-opacity-20 rounded-lg flex items-center justify-center">
                                    <div class="bg-white rounded-lg p-3 shadow-lg">
                                        <p class="text-red-600 font-medium text-sm">QR expiré</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="max-w-md">
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                    <div class="flex items-start space-x-3">
                                        <svg class="w-5 h-5 text-blue-500 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <div class="text-sm">
                                            <p class="font-medium text-blue-800 mb-2">Comment scanner :</p>
                                            <ol class="text-blue-700 space-y-1 text-xs">
                                                <li>1️⃣ Ouvrez <strong>WhatsApp Business</strong> sur votre téléphone</li>
                                                <li>2️⃣ Menu ⋯ → <strong>Appareils liés</strong></li>
                                                <li>3️⃣ <strong>Lier un appareil</strong></li>
                                                <li>4️⃣ Scannez le QR code <strong>rapidement</strong></li>
                                            </ol>
                                            <div class="mt-3 p-2 bg-orange-50 border border-orange-200 rounded text-xs">
                                                ⚠️ <strong>Important :</strong> Le QR code se renouvelle toutes les 20 secondes
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Session Info Display -->
                <div id="session-info-panel" class="bg-white rounded-xl shadow-lg p-6 hidden">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                        </svg>
                        Informations WhatsApp
                    </h3>
                    <div id="session-details" class="space-y-4"></div>
                </div>

                <!-- Message Test Section -->
                <div id="test-message-section" class="bg-white rounded-xl shadow-lg p-6 hidden">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Test d'Envoi de Message</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Numéro destinataire <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="test-recipient" placeholder="22912345678" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                            <p class="text-xs text-gray-500 mt-1">Format international sans le + (ex: 22912345678)</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Message <span class="text-red-500">*</span>
                            </label>
                            <textarea id="test-message" rows="3" placeholder="Test depuis NotifyBridge API !"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none transition-all"></textarea>
                        </div>
                        
                        <div class="flex space-x-3">
                            <button id="send-test-btn" onclick="sendTestMessage()" disabled
                                    class="flex items-center justify-center space-x-2 bg-blue-500 hover:bg-blue-600 disabled:bg-gray-300 text-white font-medium py-2 px-4 rounded-lg transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                <span>Envoyer Test</span>
                            </button>
                            
                            <button onclick="clearTestForm()" 
                                    class="flex items-center justify-center space-x-2 bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                <span>Vider</span>
                            </button>
                        </div>
                    </div>
                    
                    <div id="test-result" class="hidden mt-4"></div>
                </div>

                <!-- API Health -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">État de l'API</h3>
                        <button onclick="checkAPIHealth()" class="text-sm text-blue-600 hover:text-blue-800 underline">
                            Vérifier
                        </button>
                    </div>
                    <div id="api-health" class="text-sm text-gray-600">
                        Cliquez sur "Vérifier" pour tester l'API
                    </div>
                </div>
            </div>

            <!-- Colonne droite : Logs des réponses API -->
            <div class="bg-gray-900 rounded-xl shadow-lg overflow-hidden sticky top-20 h-[calc(100vh-100px)] flex flex-col">
                <div class="bg-gray-800 px-4 py-3 border-b border-gray-700 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <h3 class="text-sm font-semibold text-gray-200">📡 Journal des appels API</h3>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span id="log-count" class="text-xs text-gray-400 bg-gray-700 px-2 py-0.5 rounded-full">0</span>
                    </div>
                </div>
                <div id="api-logs" class="flex-1 overflow-y-auto p-3 space-y-2 bg-gray-900">
                    <div class="text-center text-gray-500 text-xs py-8">
                        📭 Aucun appel API pour le moment<br>
                        Cliquez sur "Nouvelle Session" pour commencer
                    </div>
                </div>
                <div class="bg-gray-800 px-4 py-2 border-t border-gray-700 text-xs text-gray-400 flex justify-between">
                    <span>🔑 API Key configurée</span>
                    <span>🌐 notifybridge-production.up.railway.app</span>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white border-t mt-8">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="text-sm text-gray-500">
                    <p>NotifyBridge API v3.0.0 - Interface de Test avec Infos WhatsApp</p>
                    <p class="mt-1">Basé sur <span class="text-green-600 font-medium">whatsapp-web.js</span> avec Stealth Mode</p>
                </div>
                <div class="mt-4 md:mt-0 text-sm text-gray-400">
                    <p>Railway: <span class="font-mono">notifybridge-production.up.railway.app</span></p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // ===============================================
        // CONFIGURATION GLOBALE
        // ===============================================
        
        const CONFIG = {
            API_KEY: 'BWxD1xkzuPxJ0luWnsaECtn3CVZkYG6dtNUxnwUsBWWwYwvkKYl1ZZWnDuP6M',
            BASE_URL: 'https://notifybridge-production.up.railway.app',
            POLLING_INTERVAL: 2000,
            MAX_POLLING_ATTEMPTS: 150
        };
        
        // ===============================================
        // VARIABLES GLOBALES
        // ===============================================
        
        let state = {
            currentSessionId: null,
            pollingActive: false,
            qrTimer: null,
            qrGeneratedAt: null,
            pollingAttempts: 0,
            sessionInfo: null
        };
        
        let logs = [];
        
        // ===============================================
        // GESTION DES LOGS
        // ===============================================
        
        function addLog(endpoint, method, requestData, responseData, error = null) {
            const timestamp = new Date().toLocaleTimeString();
            const logEntry = {
                id: Date.now(),
                timestamp,
                endpoint,
                method,
                requestData,
                responseData,
                error,
                success: !error && responseData && (responseData.ok !== false)
            };
            
            logs.unshift(logEntry);
            if (logs.length > 100) logs.pop();
            
            renderLogs();
            updateLogCount();
        }
        
        function renderLogs() {
            const container = document.getElementById('api-logs');
            if (!container) return;
            
            if (logs.length === 0) {
                container.innerHTML = '<div class="text-center text-gray-500 text-xs py-8">📭 Aucun appel API pour le moment<br>Cliquez sur "Nouvelle Session" pour commencer</div>';
                return;
            }
            
            container.innerHTML = logs.map(log => {
                let statusClass = '';
                let statusIcon = '';
                
                if (log.error) {
                    statusClass = 'log-error';
                    statusIcon = '❌';
                } else if (log.success) {
                    statusClass = 'log-success';
                    statusIcon = '✅';
                } else {
                    statusClass = 'log-warning';
                    statusIcon = '⚠️';
                }
                
                const requestPreview = log.requestData ? JSON.stringify(log.requestData).substring(0, 100) : 'aucune donnée';
                const responsePreview = log.responseData ? JSON.stringify(log.responseData).substring(0, 200) : 'aucune réponse';
                const errorMsg = log.error ? log.error.message || log.error : null;
                
                return `
                    <div class="log-entry ${statusClass} text-xs">
                        <div class="flex items-center justify-between mb-1">
                            <div class="flex items-center space-x-2">
                                <span class="font-mono text-gray-500">${log.timestamp}</span>
                                <span class="font-bold ${log.success ? 'text-green-600' : 'text-red-600'}">${statusIcon} ${log.method}</span>
                                <span class="text-blue-600 font-mono">${log.endpoint}</span>
                            </div>
                        </div>
                        <div class="text-gray-600 mt-1">
                            <span class="text-gray-400">📤 Requête:</span>
                            <pre class="text-gray-700 text-[10px] mt-0.5 overflow-x-auto">${escapeHtml(requestPreview)}</pre>
                        </div>
                        ${errorMsg ? `
                        <div class="text-red-600 mt-1">
                            <span class="text-red-400">💥 Erreur:</span>
                            <pre class="text-red-700 text-[10px] mt-0.5">${escapeHtml(errorMsg)}</pre>
                        </div>
                        ` : `
                        <div class="mt-1">
                            <span class="text-gray-400">📥 Réponse:</span>
                            <pre class="log-json text-[10px] mt-0.5">${escapeHtml(responsePreview)}</pre>
                        </div>
                        `}
                    </div>
                `;
            }).join('');
            
            container.scrollTop = 0;
        }
        
        function updateLogCount() {
            const countEl = document.getElementById('log-count');
            if (countEl) countEl.textContent = logs.length;
        }
        
        function clearLogs() {
            logs = [];
            renderLogs();
            updateLogCount();
            showNotification('Logs effacés', 'info');
        }
        
        function escapeHtml(str) {
            if (!str) return '';
            return str.replace(/[&<>]/g, function(m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            });
        }
        
        // ===============================================
        // ÉLÉMENTS DOM
        // ===============================================
        
        const elements = {
            statusDot: document.getElementById('status-dot'),
            statusText: document.getElementById('status-text'),
            statusMessage: document.getElementById('status-message'),
            sessionIdDisplay: document.getElementById('session-id-display'),
            currentSessionId: document.getElementById('current-session-id'),
            sessionIdentity: document.getElementById('session-identity'),
            sessionNumber: document.getElementById('session-number'),
            sessionPushname: document.getElementById('session-pushname'),
            startBtn: document.getElementById('start-session-btn'),
            refreshQRBtn: document.getElementById('refresh-qr-btn'),
            getInfoBtn: document.getElementById('get-info-btn'),
            stopBtn: document.getElementById('stop-session-btn'),
            sendTestBtn: document.getElementById('send-test-btn'),
            qrSection: document.getElementById('qr-section'),
            qrLoading: document.getElementById('qr-loading'),
            qrDisplay: document.getElementById('qr-display'),
            qrTimer: document.getElementById('qr-timer'),
            timerSeconds: document.getElementById('timer-seconds'),
            qrExpiredOverlay: document.getElementById('qr-expired-overlay'),
            sessionInfoPanel: document.getElementById('session-info-panel'),
            sessionDetails: document.getElementById('session-details'),
            testSection: document.getElementById('test-message-section'),
            testRecipient: document.getElementById('test-recipient'),
            testMessage: document.getElementById('test-message'),
            testResult: document.getElementById('test-result'),
            apiHealth: document.getElementById('api-health')
        };
        
        // ===============================================
        // UTILITAIRES
        // ===============================================
        
        function updateConnectionStatus(status, color = 'gray') {
            const colorMap = {
                gray: { bg: 'bg-gray-400', text: 'text-gray-600' },
                green: { bg: 'bg-green-400 animate-pulse', text: 'text-green-600' },
                orange: { bg: 'bg-orange-400 animate-pulse', text: 'text-orange-600' },
                red: { bg: 'bg-red-400', text: 'text-red-600' },
                blue: { bg: 'bg-blue-400 animate-pulse', text: 'text-blue-600' }
            };
            
            if (elements.statusDot) elements.statusDot.className = `w-2 h-2 rounded-full ${colorMap[color].bg}`;
            if (elements.statusText) {
                elements.statusText.className = colorMap[color].text;
                elements.statusText.textContent = status;
            }
        }
        
        function updateSessionIdentity(number, pushname) {
            if (number) {
                elements.sessionIdentity.classList.remove('hidden');
                elements.sessionNumber.textContent = number;
                elements.sessionPushname.textContent = pushname || 'Utilisateur';
            } else {
                elements.sessionIdentity.classList.add('hidden');
            }
        }
        
        function updateStatusMessage(title, description, color = 'gray') {
            const colorMap = {
                gray: 'bg-gray-50 border-gray-200',
                green: 'bg-green-50 border-green-200',
                orange: 'bg-orange-50 border-orange-200', 
                red: 'bg-red-50 border-red-200',
                blue: 'bg-blue-50 border-blue-200'
            };
            
            if (elements.statusMessage) {
                elements.statusMessage.className = `mt-4 p-3 rounded-lg border ${colorMap[color]}`;
                elements.statusMessage.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-${color}-100 rounded-lg flex items-center justify-center">
                            <div class="w-3 h-3 bg-${color}-400 rounded-full"></div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">${title}</p>
                            <p class="text-xs text-gray-500">${description}</p>
                        </div>
                    </div>
                `;
            }
        }
        
        function showNotification(message, type = 'info', duration = 5000) {
            const notification = document.createElement('div');
            const colorMap = {
                success: 'bg-green-500',
                error: 'bg-red-500',
                warning: 'bg-orange-500',
                info: 'bg-blue-500'
            };
            
            notification.className = `fixed bottom-4 right-4 ${colorMap[type]} text-white px-6 py-4 rounded-lg shadow-lg z-50 max-w-sm transform translate-x-full transition-transform duration-300`;
            notification.innerHTML = `<p class="text-sm font-medium">${message}</p>`;
            
            document.body.appendChild(notification);
            
            setTimeout(() => notification.classList.remove('translate-x-full'), 100);
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, duration);
        }
        
        function generateSessionId() {
            return 'session-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
        }
        
        // ===============================================
        // APPELS API AVEC LOGS
        // ===============================================
        
        async function apiCall(method, endpoint, data = null, description = '') {
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
                const responseData = await response.json().catch(() => ({ error: 'Invalid JSON response' }));
                
                if (!response.ok) {
                    throw new Error(responseData.error || `HTTP ${response.status}`);
                }
                
                addLog(endpoint, method, data, responseData, null);
                return responseData;
                
            } catch (err) {
                addLog(endpoint, method, data, null, { message: err.message });
                throw err;
            }
        }
        
        // ===============================================
        // GESTION DES SESSIONS
        // ===============================================
        
        async function startNewSession() {
            if (state.currentSessionId) {
                showNotification('Une session est déjà active', 'warning');
                return;
            }
            
            const sessionId = generateSessionId();
            state.currentSessionId = sessionId;
            
            updateConnectionStatus('Démarrage...', 'orange');
            updateStatusMessage('Démarrage', 'Création de la session en cours...', 'orange');
            
            try {
                const result = await apiCall('POST', `/api/sessions/${sessionId}/start`, null, 'Démarrage session');
                
                if (result.ok) {
                    updateConnectionStatus('Scan QR', 'orange');
                    updateStatusMessage('QR Code', 'Le QR code a été généré, scannez-le avec WhatsApp', 'blue');
                    
                    elements.qrSection.classList.remove('hidden');
                    elements.startBtn.disabled = true;
                    elements.refreshQRBtn.disabled = false;
                    elements.getInfoBtn.disabled = true;
                    elements.stopBtn.disabled = false;
                    elements.sessionIdDisplay.classList.remove('hidden');
                    elements.currentSessionId.textContent = sessionId.substring(0, 20) + '...';
                    
                    startPolling();
                } else {
                    throw new Error(result.error || 'Erreur inconnue');
                }
                
            } catch (error) {
                console.error('Erreur démarrage session:', error);
                showNotification('Erreur: ' + error.message, 'error');
                updateConnectionStatus('Erreur', 'red');
                updateStatusMessage('Erreur', error.message, 'red');
                
                state.currentSessionId = null;
                elements.startBtn.disabled = false;
                elements.sessionIdDisplay.classList.add('hidden');
            }
        }
        
        async function stopSession() {
            if (!state.currentSessionId) {
                showNotification('Aucune session active', 'warning');
                return;
            }
            
            showNotification('Fermeture de la session...', 'info');
            
            try {
                const result = await apiCall('DELETE', `/api/sessions/${state.currentSessionId}`, null, 'Arrêt session');
                
                if (result.ok) {
                    resetInterface();
                    showNotification('Session fermée avec succès', 'success');
                    updateConnectionStatus('Déconnecté', 'gray');
                    updateStatusMessage('Terminé', 'La session a été fermée', 'gray');
                    updateSessionIdentity(null, null);
                } else {
                    throw new Error(result.error || 'Erreur inconnue');
                }
            } catch (error) {
                console.error('Erreur arrêt session:', error);
                showNotification('Erreur: ' + error.message, 'error');
            }
        }
        
        async function refreshQR() {
            if (!state.currentSessionId) {
                showNotification('Aucune session active', 'warning');
                return;
            }
            showNotification('Rafraîchissement du QR code...', 'info');
            await fetchQRCode();
        }
        
        async function getSessionInfo() {
            if (!state.currentSessionId) {
                showNotification('Aucune session active', 'warning');
                return;
            }
            
            showNotification('Récupération des informations...', 'info');
            
            try {
                const info = await apiCall('GET', `/api/sessions/${state.currentSessionId}/info`, null, 'Infos session');
                
                if (info.ok && info.contactInfo) {
                    state.sessionInfo = info;
                    displaySessionInfo(info);
                    updateSessionIdentity(info.contactInfo.number, info.contactInfo.pushname);
                    showNotification('Informations récupérées avec succès', 'success');
                } else {
                    throw new Error(info.error || 'Impossible de récupérer les infos');
                }
            } catch (error) {
                console.error('Erreur récupération infos:', error);
                showNotification('Erreur: ' + error.message, 'error');
            }
        }
        
        function displaySessionInfo(info) {
            elements.sessionInfoPanel.classList.remove('hidden');
            
            const contact = info.contactInfo;
            const user = info.userInfo;
            
            elements.sessionDetails.innerHTML = `
                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex items-center space-x-3 mb-4">
                        ${contact.profilePicUrl ? 
                            `<img src="${contact.profilePicUrl}" class="w-12 h-12 rounded-full object-cover">` :
                            `<div class="w-12 h-12 bg-green-200 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                </svg>
                            </div>`
                        }
                        <div>
                            <p class="font-bold text-gray-800">${contact.pushname || contact.name || 'Utilisateur'}</p>
                            <p class="text-sm text-gray-500">${contact.formattedNumber || contact.number}</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <div>
                            <p class="text-gray-500">Numéro (format court)</p>
                            <p class="font-mono text-gray-800">${contact.number}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Code pays</p>
                            <p class="text-gray-800">+${contact.countryCode || 'N/A'}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Statut</p>
                            <p class="text-gray-800">${contact.about || 'Non défini'}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Plateforme</p>
                            <p class="text-gray-800">${user?.personal?.platform || 'N/A'}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Appareil</p>
                            <p class="text-gray-800">${user?.phone?.device_model || 'N/A'}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Version WhatsApp</p>
                            <p class="text-gray-800">${user?.phone?.wa_version || 'N/A'}</p>
                        </div>
                        ${user?.battery ? `
                        <div>
                            <p class="text-gray-500">Batterie</p>
                            <p class="text-gray-800">${user.battery.percentage}% ${user.battery.plugged ? '🔌' : '🔋'}</p>
                        </div>
                        ` : ''}
                        <div>
                            <p class="text-gray-500">Compte Business</p>
                            <p class="text-gray-800">${contact.isBusiness ? '✅ Oui' : '❌ Non'}</p>
                        </div>
                    </div>
                </div>
            `;
        }
        
        function resetInterface() {
            if (state.pollingActive) state.pollingActive = false;
            if (state.qrTimer) clearInterval(state.qrTimer);
            
            state.currentSessionId = null;
            state.qrGeneratedAt = null;
            state.pollingAttempts = 0;
            state.sessionInfo = null;
            
            elements.qrSection.classList.add('hidden');
            elements.sessionInfoPanel.classList.add('hidden');
            elements.testSection.classList.add('hidden');
            elements.qrLoading.classList.remove('hidden');
            elements.qrDisplay.classList.add('hidden');
            elements.qrTimer.classList.add('hidden');
            elements.qrExpiredOverlay.classList.add('hidden');
            if (elements.qrDisplay) elements.qrDisplay.innerHTML = '';
            elements.startBtn.disabled = false;
            elements.refreshQRBtn.disabled = true;
            elements.getInfoBtn.disabled = true;
            elements.stopBtn.disabled = true;
            elements.sendTestBtn.disabled = true;
            elements.sessionIdDisplay.classList.add('hidden');
            elements.sessionDetails.innerHTML = '';
        }
        
        // ===============================================
        // POLLING ET QR CODE
        // ===============================================
        
        async function startPolling() {
            if (state.pollingActive) return;
            
            state.pollingActive = true;
            state.pollingAttempts = 0;
            
            const poll = async () => {
                if (!state.pollingActive || !state.currentSessionId) return;
                
                try {
                    const sessionData = await apiCall('GET', `/api/sessions/${state.currentSessionId}/status`, null, 'Vérification statut');
                    state.pollingAttempts++;
                    
                    switch (sessionData.status) {
                        case 'SCAN_QR':
                            updateConnectionStatus('Scan QR', 'orange');
                            updateStatusMessage('QR Code', 'Le QR code est disponible, scannez-le avec WhatsApp', 'blue');
                            await fetchQRCode();
                            break;
                            
                        case 'WORKING':
                            updateConnectionStatus('Connecté', 'green');
                            updateStatusMessage('Connecté', `WhatsApp connecté (${sessionData.phoneNumber || 'numéro inconnu'})`, 'green');
                            state.pollingActive = false;
                            elements.testSection.classList.remove('hidden');
                            elements.sendTestBtn.disabled = false;
                            elements.getInfoBtn.disabled = false;
                            elements.qrTimer.classList.add('hidden');
                            elements.qrExpiredOverlay.classList.add('hidden');
                            
                            if (sessionData.phoneNumber) {
                                updateSessionIdentity(sessionData.phoneNumber, sessionData.pushname);
                            }
                            
                            await getSessionInfo();
                            showNotification('WhatsApp connecté avec succès !', 'success');
                            break;
                            
                        case 'DISCONNECTED':
                        case 'STOPPED':
                            updateConnectionStatus('Déconnecté', 'red');
                            updateStatusMessage('Session arrêtée', 'La session a été fermée', 'red');
                            state.pollingActive = false;
                            resetInterface();
                            updateSessionIdentity(null, null);
                            showNotification('La session a été fermée', 'warning');
                            break;
                            
                        case 'AUTH_FAILURE':
                            updateConnectionStatus('Erreur', 'red');
                            updateStatusMessage('Erreur auth', sessionData.error || 'Échec d\'authentification', 'red');
                            break;
                            
                        default:
                            updateConnectionStatus('En attente', 'orange');
                            updateStatusMessage('Statut', sessionData.status || 'Initialisation...', 'orange');
                            break;
                    }
                    
                    if (state.pollingAttempts > CONFIG.MAX_POLLING_ATTEMPTS && sessionData.status === 'SCAN_QR') {
                        updateStatusMessage('Timeout', 'Le QR code a expiré, veuillez redémarrer une session', 'red');
                        showNotification('Temps d\'attente dépassé', 'warning');
                        resetInterface();
                        state.pollingActive = false;
                    }
                    
                } catch (error) {
                    console.error('Polling error:', error);
                    if (state.pollingAttempts > CONFIG.MAX_POLLING_ATTEMPTS) {
                        updateStatusMessage('Erreur', 'Problème de connexion avec l\'API', 'red');
                        state.pollingActive = false;
                    }
                }
            };
            
            poll();
            const intervalId = setInterval(() => {
                if (state.pollingActive) poll();
                else clearInterval(intervalId);
            }, CONFIG.POLLING_INTERVAL);
        }
        
        async function fetchQRCode() {
            if (!state.currentSessionId) return;
            
            try {
                const qrData = await apiCall('GET', `/api/sessions/${state.currentSessionId}/qr`, null, 'Récupération QR code');
                
                if (qrData.qr) {
                    elements.qrLoading.classList.add('hidden');
                    elements.qrDisplay.classList.remove('hidden');
                    elements.qrTimer.classList.remove('hidden');
                    elements.qrDisplay.innerHTML = `<img src="${qrData.qr}" alt="QR Code" class="w-64 h-64 mx-auto">`;
                    
                    if (state.qrTimer) clearInterval(state.qrTimer);
                    state.qrGeneratedAt = Date.now();
                    
                    state.qrTimer = setInterval(() => {
                        const elapsed = Math.floor((Date.now() - state.qrGeneratedAt) / 1000);
                        const remaining = Math.max(0, 20 - elapsed);
                        if (elements.timerSeconds) elements.timerSeconds.textContent = remaining;
                        
                        if (remaining <= 0) {
                            clearInterval(state.qrTimer);
                            elements.qrExpiredOverlay.classList.remove('hidden');
                            showNotification('QR code expiré, veuillez rafraîchir', 'warning');
                        } else {
                            elements.qrExpiredOverlay.classList.add('hidden');
                        }
                    }, 1000);
                }
                
            } catch (error) {
                console.error('QR fetch error:', error);
                elements.qrLoading.classList.remove('hidden');
                elements.qrDisplay.classList.add('hidden');
                updateStatusMessage('Erreur QR', 'Impossible de générer le QR code', 'red');
            }
        }
        
        // ===============================================
        // ENVOI DE MESSAGES
        // ===============================================
        
        async function sendTestMessage() {
            if (!state.currentSessionId) {
                showNotification('Aucune session active', 'warning');
                return;
            }
            
            const recipient = elements.testRecipient.value.trim();
            const message = elements.testMessage.value.trim();
            
            if (!recipient) {
                showNotification('Veuillez entrer un numéro de destinataire', 'warning');
                return;
            }
            
            if (!message) {
                showNotification('Veuillez entrer un message', 'warning');
                return;
            }
            
            let formattedNumber = recipient;
            if (!formattedNumber.includes('@') && !formattedNumber.includes('+')) {
                formattedNumber = `${recipient}@c.us`;
            }
            
            elements.sendTestBtn.disabled = true;
            elements.sendTestBtn.innerHTML = `<span>⏳ Envoi...</span>`;
            
            try {
                const payload = {
                    sessionId: state.currentSessionId,
                    to: formattedNumber,
                    text: message
                };
                
                const result = await apiCall('POST', '/api/messages/send', payload, 'Envoi message');
                
                if (result.ok) {
                    showNotification('✅ Message envoyé avec succès !', 'success');
                    
                    elements.testResult.classList.remove('hidden');
                    elements.testResult.innerHTML = `
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5-1.5 1.5L9 20 21.5 7.5z"/>
                                </svg>
                                <p class="text-sm text-green-800 font-medium">Message envoyé à ${recipient}</p>
                            </div>
                            <p class="text-xs text-green-600 mt-1">${message.substring(0, 100)}${message.length > 100 ? '...' : ''}</p>
                            <div class="mt-2 pt-2 border-t border-green-200 text-xs text-green-600">
                                📤 Expéditeur: ${result.from?.number || 'N/A'} (${result.from?.pushname || 'N/A'})
                            </div>
                            ${result.messageId ? `<p class="text-xs text-gray-500 mt-1">📨 ID: ${result.messageId}</p>` : ''}
                        </div>
                    `;
                    
                    elements.testRecipient.value = '';
                    elements.testMessage.value = '';
                    
                    setTimeout(() => elements.testResult.classList.add('hidden'), 5000);
                } else {
                    throw new Error(result.error || 'Erreur inconnue');
                }
                
            } catch (error) {
                console.error('Send message error:', error);
                showNotification('❌ Erreur: ' + error.message, 'error');
                
                elements.testResult.classList.remove('hidden');
                elements.testResult.innerHTML = `
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <p class="text-sm text-red-800 font-medium">Erreur d'envoi</p>
                        </div>
                        <p class="text-xs text-red-600 mt-1">${error.message}</p>
                    </div>
                `;
                setTimeout(() => elements.testResult.classList.add('hidden'), 5000);
            } finally {
                elements.sendTestBtn.disabled = false;
                elements.sendTestBtn.innerHTML = `<span>📤 Envoyer Test</span>`;
            }
        }
        
        function clearTestForm() {
            elements.testRecipient.value = '';
            elements.testMessage.value = '';
            elements.testResult.classList.add('hidden');
        }
        
        // ===============================================
        // API HEALTH CHECK
        // ===============================================
        
        async function checkAPIHealth() {
            elements.apiHealth.innerHTML = '<div class="animate-spin rounded-full h-4 w-4 border-2 border-gray-300 border-t-blue-500"></div>';
            
            try {
                const data = await apiCall('GET', '/api/health', null, 'Health check');
                
                elements.apiHealth.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <div>
                            <p class="text-green-700 font-medium">✅ API opérationnelle</p>
                            <p class="text-xs text-gray-500">${data.timestamp ? new Date(data.timestamp).toLocaleString() : new Date().toLocaleString()}</p>
                            <p class="text-xs text-gray-400 mt-1">📊 Sessions actives: ${data.activeSessions || 0} | Messages suivis: ${data.trackedMessages || 0}</p>
                        </div>
                    </div>
                `;
            } catch (error) {
                elements.apiHealth.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                        <div>
                            <p class="text-red-700 font-medium">❌ API indisponible</p>
                            <p class="text-xs text-gray-500">${error.message}</p>
                        </div>
                    </div>
                `;
            }
        }
        
        // ===============================================
        // INITIALISATION
        // ===============================================
        
        function init() {
            console.log('🚀 Interface NotifyBridge démarrée');
            setTimeout(() => checkAPIHealth(), 1000);
        }
        
        init();
        
    </script>
</body>
</html>