<?php
/**
 * health.php
 * 
 * Endpoint de health check pour l'API Node.js
 * Vérifie que la base de données et les services PHP sont opérationnels
 * 
 * Paramètres: Aucun
 * 
 * Réponse:
 * {
 *   "success": true,
 *   "status": "healthy",
 *   "timestamp": "2026-01-01T00:00:00Z",
 *   "database": {
 *     "connected": true,
 *     "response_time": 15
 *   },
 *   "services": {
 *     "api": "operational",
 *     "auth": "operational"
 *   },
 *   "version": "1.0.0"
 * }
 */

header('Content-Type: application/json');

// Vérifier le secret interne
$internal_secret = $_SERVER['HTTP_X_INTERNAL_SECRET'] ?? '';
$expected_secret = getenv('INTERNAL_SECRET') ?: 'X7k9P2mN4qR8sT5vW3yZ1aB6cD0eF9gH2jK5lM7nP3qR8sT1uV4wX6yZ8';

if ($internal_secret !== $expected_secret) {
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'status' => 'unauthorized',
        'error' => 'Invalid internal secret'
    ]);
    exit;
}

// ============================================
// VÉRIFIER LA CONNEXION À LA BASE DE DONNÉES
// ============================================

$db_health = [
    'connected' => false,
    'response_time' => 0,
    'error' => null
];

try {
    $start_time = microtime(true);
    
    $db_host = getenv('DB_HOST') ?: 'localhost';
    $db_user = getenv('DB_USER') ?: 'root';
    $db_password = getenv('DB_PASSWORD') ?: '';
    $db_name = getenv('DB_NAME') ?: 'c1286229c_wazana_paiements';
    
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    
    if ($conn->connect_error) {
        throw new Exception('Connection failed: ' . $conn->connect_error);
    }
    
    // Tester une requête simple
    $result = $conn->query('SELECT 1');
    if (!$result) {
        throw new Exception('Query failed: ' . $conn->error);
    }
    
    $response_time = round((microtime(true) - $start_time) * 1000, 2);
    
    $db_health = [
        'connected' => true,
        'response_time' => $response_time,
        'error' => null
    ];
    
    $conn->close();
    
} catch (Exception $e) {
    $db_health['error'] = $e->getMessage();
}

// ============================================
// VÉRIFIER LES TABLES CRITIQUES
// ============================================

$tables_health = [
    'whatsapp_api_keys' => false,
    'whatsapp_apps' => false,
    'whatsapp_messages' => false,
    'users' => false
];

if ($db_health['connected']) {
    try {
        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        
        foreach (array_keys($tables_health) as $table) {
            $result = $conn->query("SHOW TABLES LIKE '$table'");
            $tables_health[$table] = $result && $result->num_rows > 0;
        }
        
        $conn->close();
    } catch (Exception $e) {
        // Silencieusement ignorer les erreurs de vérification des tables
    }
}

// ============================================
// DÉTERMINER LE STATUT GLOBAL
// ============================================

$overall_status = 'healthy';
$services_status = 'operational';

if (!$db_health['connected']) {
    $overall_status = 'unhealthy';
    $services_status = 'degraded';
}

// Vérifier que les tables critiques existent
$critical_tables = ['whatsapp_api_keys', 'users'];
foreach ($critical_tables as $table) {
    if (!$tables_health[$table]) {
        $overall_status = 'unhealthy';
        $services_status = 'degraded';
    }
}

// ============================================
// RÉPONDRE AVEC LES DONNÉES
// ============================================

$response_code = ($overall_status === 'healthy') ? 200 : 503;
http_response_code($response_code);

echo json_encode([
    'success' => $overall_status === 'healthy',
    'status' => $overall_status,
    'timestamp' => date('c'),
    'database' => $db_health,
    'tables' => $tables_health,
    'services' => [
        'api' => $services_status,
        'auth' => $services_status
    ],
    'version' => '1.0.0'
]);
?>