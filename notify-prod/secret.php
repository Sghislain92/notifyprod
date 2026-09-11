<?php
/**
 * Génère une clé secrète ultra sécurisée
 * @param int $length Longueur de la clé (défaut: 64 caractères)
 * @return string Clé secrète générée
 */
function generateSecretKey($length = 64) {
    // Caractères autorisés (majuscules, minuscules, chiffres)
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $secretKey = '';
    
    // Utilisation de random_int() pour une sécurité maximale (cryptographiquement sécurisé)
    for ($i = 0; $i < $length; $i++) {
        $secretKey .= $characters[random_int(0, $charactersLength - 1)];
    }
    
    return $secretKey;
}

// Génération de la clé
$secret = generateSecretKey(64);
echo "Clé secrète générée :\n";
echo $secret . "\n";
echo "Longueur : " . strlen($secret) . " caractères\n";
?>