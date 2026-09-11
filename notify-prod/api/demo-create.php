<?php
/**
 * demo-create.php
 * 
 * Endpoint pour créer une session démo WhatsApp
 * Génère une clé API temporaire et une session de test
 * 
 * Paramètres POST:
 * - session_id: L'ID de la session démo (format: demo-xxxxxxxxxxxxx)
 * 
 * Réponse:
 * {
 *   "success": true/false,
 *   "demo": {
 *     "session_id": "demo-...",
 *     "api_key": "wa_demo_...",
 *     "max_messages": 10,
 *     "remaining_messages": 10,
 *     "expires_in": 3600,
 *     "created_at": "2026-01-01T00:00:00Z",
 *     "expires_at": "2026-01-01T01:00:00Z"
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

// Récupérer les données
$input = json_decode(file_get_contents('php://input'), true);
$session_id = $input['session_id'] ?? null;

if (!$session_id || !preg_match('/^demo-[a-zA-Z0-9]{13}$/', $session_id)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Invalid session_id format (demo-xxxxxxxxxxxxx)'
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
    // GÉNÉRER UNE CLÉ API DÉMO
    // ============================================
    
    $api_key = 'wa_demo_' . bin2hex(random_bytes(30));  // 70 caractères
    $uuid = 'demo_' . bin2hex(random_bytes(8));
    $uuid_vendeur = 'demo_' . bin2hex(random_bytes(8));
    $jwt_secret = bin2hex(random_bytes(32));
    
    $now = date('Y-m-d H:i:s');
    $expires_at = date('Y-m-d H:i:s', time() + 3600);  // 1 heure
    
    // ============================================
    // VÉRIFIER SI LA SESSION DÉMO EXISTE
    // ============================================
    
    $stmt = $conn->prepare("
        SELECT api_key, status
        FROM whatsapp_api_keys
        WHERE uuid = ? AND status IN ('active', 'demo')
        LIMIT 1
    ");
    
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }
    
    $stmt->bind_param('s', $session_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // La session démo existe déjà
        $existing_key = $result->fetch_assoc();
        $api_key = $existing_key['api_key'];
        
        $stmt->close();
        
        // Récupérer les infos complètes
        $stmt = $conn->prepare("
            SELECT 
                id,
                uuid,
                api_key,
                status,
                created_at,
                updated_at
            FROM whatsapp_api_keys
            WHERE uuid = ?
            LIMIT 1
        ");
        
        $stmt->bind_param('s', $session_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $demo_data = $result->fetch_assoc();
        $stmt->close();
        
        http_response_code(200);
        echo json_encode([
            'success' => true,
            'demo' => [
                'session_id' => $session_id,
                'api_key' => $demo_data['api_key'],
                'max_messages' => 10,
                'remaining_messages' => 10,
                'expires_in' => 3600,
                'created_at' => $demo_data['created_at'],
                'expires_at' => date('Y-m-d H:i:s', strtotime($demo_data['created_at']) + 3600)
            ]
        ]);
        $conn->close();
        exit;
    }
    
    $stmt->close();
    
    // ============================================
    // CRÉER UNE NOUVELLE CLÉ API DÉMO
    // ============================================
    
    $stmt = $conn->prepare("
        INSERT INTO whatsapp_api_keys (
            uuid,
            uuid_vendeur,
            api_key,
            jwt_secret,
            status,
            created_at,
            updated_at,
            ip_address,
            user_agent
        ) VALUES (?, ?, ?, ?, 'demo', ?, ?, ?, ?)
    ");
    
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }
    
    $ip_address = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
    
    $stmt->bind_param(
        'sssssss',
        $session_id,
        $uuid_vendeur,
        $api_key,
        $jwt_secret,
        $now,
        $now,
        $ip_address,
        $user_agent
    );
    
    if (!$stmt->execute()) {
        throw new Exception('Insert failed: ' . $stmt->error);
    }
    
    $stmt->close();
    
    // ============================================
    // RÉPONDRE AVEC LES DONNÉES
    // ============================================
    
    http_response_code(201);
    echo json_encode([
        'success' => true,
        'demo' => [
            'session_id' => $session_id,
            'api_key' => $api_key,
            'max_messages' => 10,
            'remaining_messages' => 10,
            'expires_in' => 3600,
            'created_at' => $now,
            'expires_at' => $expires_at
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