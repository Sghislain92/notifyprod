<?php
/**
 * verify-key.php
 * 
 * Endpoint pour vérifier une clé API WhatsApp
 * Appelé par l'API Node.js pour valider les clés
 * 
 * Paramètres GET:
 * - key: La clé API à vérifier
 * 
 * Réponse:
 * {
 *   "success": true/false,
 *   "data": {
 *     "key_id": 123,
 *     "uuid_vendeur": "vend_...",
 *     "api_key": "wa_...",
 *     "status": "active",
 *     "created_at": "2026-01-01T00:00:00Z",
 *     "max_sessions": 5,
 *     "current_sessions": 2
 *   },
 *   "error": "Message d'erreur si échec"
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
        'error' => 'Invalid internal secret'
    ]);
    exit;
}

// Récupérer la clé API
$api_key = $_GET['key'] ?? null;

if (!$api_key) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'API key required'
    ]);
    exit;
}

// ============================================
// CONNEXION À LA BASE DE DONNÉES
// ============================================

try {
    $db_host = getenv('DB_HOST') ?: 'localhost';
    $db_user = getenv('DB_USER') ?: 'root';
    $db_password = getenv('DB_PASSWORD') ?: '';
    $db_name = getenv('DB_NAME') ?: 'c1286229c_wazana_paiements';
    
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    
    if ($conn->connect_error) {
        throw new Exception('Database connection failed: ' . $conn->connect_error);
    }
    
    // ============================================
    // VÉRIFIER LA CLÉ API
    // ============================================
    
    $stmt = $conn->prepare("
        SELECT 
            id,
            uuid,
            uuid_vendeur,
            api_key,
            jwt_secret,
            status,
            created_at,
            updated_at,
            ip_address,
            user_agent
        FROM whatsapp_api_keys
        WHERE api_key = ? AND status = 'active'
        LIMIT 1
    ");
    
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }
    
    $stmt->bind_param('s', $api_key);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        http_response_code(401);
        echo json_encode([
            'success' => false,
            'error' => 'Invalid or inactive API key'
        ]);
        $stmt->close();
        $conn->close();
        exit;
    }
    
    $key_data = $result->fetch_assoc();
    $stmt->close();
    
    // ============================================
    // RÉCUPÉRER LES INFOS DU VENDEUR
    // ============================================
    
    $stmt = $conn->prepare("
        SELECT 
            id,
            uuid,
            email,
            name,
            status,
            created_at
        FROM users
        WHERE uuid = ?
        LIMIT 1
    ");
    
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }
    
    $stmt->bind_param('s', $key_data['uuid_vendeur']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $vendor_data = $result->num_rows > 0 ? $result->fetch_assoc() : null;
    $stmt->close();
    
    // ============================================
    // COMPTER LES SESSIONS ACTIVES
    // ============================================
    
    $stmt = $conn->prepare("
        SELECT COUNT(*) as count
        FROM whatsapp_apps
        WHERE uuid_vendeur = ? AND status IN ('SCAN_QR', 'WORKING', 'AUTHENTICATED')
    ");
    
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }
    
    $stmt->bind_param('s', $key_data['uuid_vendeur']);
    $stmt->execute();
    $result = $stmt->get_result();
    $sessions_count = $result->fetch_assoc()['count'] ?? 0;
    $stmt->close();
    
    // ============================================
    // RÉPONDRE AVEC LES DONNÉES
    // ============================================
    
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'data' => [
            'key_id' => (int)$key_data['id'],
            'uuid' => $key_data['uuid'],
            'uuid_vendeur' => $key_data['uuid_vendeur'],
            'api_key' => $key_data['api_key'],
            'status' => $key_data['status'],
            'created_at' => $key_data['created_at'],
            'updated_at' => $key_data['updated_at'],
            'vendor' => $vendor_data ? [
                'uuid' => $vendor_data['uuid'],
                'email' => $vendor_data['email'],
                'name' => $vendor_data['name'],
                'status' => $vendor_data['status']
            ] : null,
            'current_sessions' => (int)$sessions_count,
            'max_sessions' => 10  // À adapter selon votre plan
        ]
    ]);
    
    $conn->close();
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>