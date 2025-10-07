#!/usr/bin/env php
<?php
/**
 * Utilidades de Gestión del Sistema de Seguridad
 * ================================================
 * Script CLI para administrar tokens, logs y usuarios bloqueados
 * 
 * Uso: php manage-security.php [comando]
 */

define('TOKENS_FILE', __DIR__ . '/data/tokens.json');
define('LOG_FILE', __DIR__ . '/data/log.txt');
define('BLOCKED_IPS_FILE', __DIR__ . '/data/blocked_ips.json');

// Colores para terminal
const COLOR_GREEN = "\033[32m";
const COLOR_RED = "\033[31m";
const COLOR_YELLOW = "\033[33m";
const COLOR_BLUE = "\033[34m";
const COLOR_RESET = "\033[0m";

function printHeader($text) {
    echo COLOR_BLUE . "\n========================================\n";
    echo "  " . $text . "\n";
    echo "========================================\n" . COLOR_RESET;
}

function printSuccess($text) {
    echo COLOR_GREEN . "✓ " . $text . COLOR_RESET . "\n";
}

function printError($text) {
    echo COLOR_RED . "✗ " . $text . COLOR_RESET . "\n";
}

function printWarning($text) {
    echo COLOR_YELLOW . "⚠ " . $text . COLOR_RESET . "\n";
}

function showMenu() {
    printHeader("Sistema de Gestión - Cuentas Norttek");
    echo "\nComandos disponibles:\n";
    echo "  1. list-tokens    - Listar todos los tokens activos\n";
    echo "  2. revoke-token   - Revocar un token específico\n";
    echo "  3. clean-expired  - Limpiar tokens expirados\n";
    echo "  4. list-blocked   - Listar IPs bloqueadas\n";
    echo "  5. unblock-ip     - Desbloquear una IP específica\n";
    echo "  6. show-logs      - Mostrar últimos logs\n";
    echo "  7. generate-hash  - Generar hash de contraseña\n";
    echo "  8. stats          - Estadísticas del sistema\n";
    echo "  9. help           - Mostrar esta ayuda\n";
    echo "\n";
}

function listTokens() {
    printHeader("Tokens Activos");
    
    if (!file_exists(TOKENS_FILE)) {
        printWarning("No hay archivo de tokens.");
        return;
    }
    
    $tokens = json_decode(file_get_contents(TOKENS_FILE), true) ?: [];
    
    if (empty($tokens)) {
        printWarning("No hay tokens registrados.");
        return;
    }
    
    $currentTime = time();
    echo "\n";
    
    foreach ($tokens as $token => $data) {
        $status = $currentTime > $data['expiry'] ? COLOR_RED . "EXPIRADO" : COLOR_GREEN . "VÁLIDO";
        $expiryDate = date('Y-m-d H:i:s', $data['expiry']);
        
        echo "Token: " . COLOR_BLUE . substr($token, 0, 16) . "..." . COLOR_RESET . "\n";
        echo "  Estado: {$status}" . COLOR_RESET . "\n";
        echo "  Creado: {$data['created']}\n";
        echo "  Expira: {$expiryDate}\n";
        echo "  Creador: {$data['created_by']}\n";
        echo "\n";
    }
}

function revokeToken() {
    echo "Ingrese el token a revocar (completo o primeros 16 caracteres): ";
    $input = trim(fgets(STDIN));
    
    if (empty($input)) {
        printError("Token no puede estar vacío.");
        return;
    }
    
    $tokens = json_decode(file_get_contents(TOKENS_FILE), true) ?: [];
    $found = false;
    
    foreach ($tokens as $token => $data) {
        if ($token === $input || strpos($token, $input) === 0) {
            unset($tokens[$token]);
            file_put_contents(TOKENS_FILE, json_encode($tokens, JSON_PRETTY_PRINT));
            printSuccess("Token revocado exitosamente.");
            $found = true;
            break;
        }
    }
    
    if (!$found) {
        printError("Token no encontrado.");
    }
}

function cleanExpiredTokens() {
    printHeader("Limpieza de Tokens Expirados");
    
    $tokens = json_decode(file_get_contents(TOKENS_FILE), true) ?: [];
    $currentTime = time();
    $removed = 0;
    
    foreach ($tokens as $token => $data) {
        if ($currentTime > $data['expiry']) {
            unset($tokens[$token]);
            $removed++;
        }
    }
    
    file_put_contents(TOKENS_FILE, json_encode($tokens, JSON_PRETTY_PRINT));
    printSuccess("Se eliminaron {$removed} tokens expirados.");
}

function listBlockedIPs() {
    printHeader("IPs Bloqueadas");
    
    if (!file_exists(BLOCKED_IPS_FILE)) {
        printWarning("No hay archivo de IPs bloqueadas.");
        return;
    }
    
    $blockedIPs = json_decode(file_get_contents(BLOCKED_IPS_FILE), true) ?: [];
    
    if (empty($blockedIPs)) {
        printWarning("No hay IPs bloqueadas.");
        return;
    }
    
    $currentTime = time();
    echo "\n";
    
    foreach ($blockedIPs as $ip => $data) {
        $status = $currentTime < $data['expiry'] ? COLOR_RED . "BLOQUEADA" : COLOR_YELLOW . "EXPIRADA";
        $expiryDate = date('Y-m-d H:i:s', $data['expiry']);
        
        echo "IP: " . COLOR_BLUE . $ip . COLOR_RESET . "\n";
        echo "  Estado: {$status}" . COLOR_RESET . "\n";
        echo "  Intentos: {$data['attempts']}\n";
        echo "  Expira: {$expiryDate}\n";
        echo "\n";
    }
}

function unblockIP() {
    echo "Ingrese la IP a desbloquear: ";
    $ip = trim(fgets(STDIN));
    
    if (empty($ip)) {
        printError("IP no puede estar vacía.");
        return;
    }
    
    $blockedIPs = json_decode(file_get_contents(BLOCKED_IPS_FILE), true) ?: [];
    
    if (isset($blockedIPs[$ip])) {
        unset($blockedIPs[$ip]);
        file_put_contents(BLOCKED_IPS_FILE, json_encode($blockedIPs, JSON_PRETTY_PRINT));
        printSuccess("IP desbloqueada exitosamente.");
    } else {
        printError("IP no encontrada en la lista de bloqueados.");
    }
}

function showLogs() {
    printHeader("Últimos Registros del Log");
    
    if (!file_exists(LOG_FILE)) {
        printWarning("No hay archivo de log.");
        return;
    }
    
    echo "¿Cuántas líneas mostrar? (default: 20): ";
    $lines = trim(fgets(STDIN));
    $lines = empty($lines) ? 20 : (int)$lines;
    
    $command = PHP_OS_FAMILY === 'Windows' 
        ? "powershell -Command \"Get-Content '" . LOG_FILE . "' -Tail {$lines}\"" 
        : "tail -n {$lines} " . LOG_FILE;
    
    echo "\n";
    system($command);
    echo "\n";
}

function generateHash() {
    echo "Ingrese la contraseña para generar hash: ";
    $password = trim(fgets(STDIN));
    
    if (empty($password)) {
        printError("Contraseña no puede estar vacía.");
        return;
    }
    
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    printHeader("Hash Generado");
    echo "\nContraseña: " . COLOR_YELLOW . $password . COLOR_RESET . "\n";
    echo "Hash: " . COLOR_GREEN . $hash . COLOR_RESET . "\n\n";
    echo "Copie este hash a la constante ADMIN_PASSWORD_HASH en cuentas.php\n\n";
}

function showStats() {
    printHeader("Estadísticas del Sistema");
    
    // Tokens
    $tokens = json_decode(file_get_contents(TOKENS_FILE), true) ?: [];
    $validTokens = 0;
    $expiredTokens = 0;
    $currentTime = time();
    
    foreach ($tokens as $data) {
        if ($currentTime > $data['expiry']) {
            $expiredTokens++;
        } else {
            $validTokens++;
        }
    }
    
    // IPs bloqueadas
    $blockedIPs = json_decode(file_get_contents(BLOCKED_IPS_FILE), true) ?: [];
    $activeBlocks = 0;
    
    foreach ($blockedIPs as $data) {
        if ($currentTime < $data['expiry']) {
            $activeBlocks++;
        }
    }
    
    // Logs
    $logLines = file_exists(LOG_FILE) ? count(file(LOG_FILE)) : 0;
    
    echo "\n";
    echo COLOR_BLUE . "Tokens:\n" . COLOR_RESET;
    echo "  Válidos: " . COLOR_GREEN . $validTokens . COLOR_RESET . "\n";
    echo "  Expirados: " . COLOR_YELLOW . $expiredTokens . COLOR_RESET . "\n";
    echo "  Total: " . ($validTokens + $expiredTokens) . "\n\n";
    
    echo COLOR_BLUE . "IPs Bloqueadas:\n" . COLOR_RESET;
    echo "  Activos: " . COLOR_RED . $activeBlocks . COLOR_RESET . "\n";
    echo "  Total registrado: " . count($blockedIPs) . "\n\n";
    
    echo COLOR_BLUE . "Logs:\n" . COLOR_RESET;
    echo "  Entradas: " . $logLines . "\n\n";
}

// Procesamiento de comandos
if ($argc < 2) {
    showMenu();
    exit(0);
}

$command = $argv[1];

switch ($command) {
    case 'list-tokens':
    case '1':
        listTokens();
        break;
        
    case 'revoke-token':
    case '2':
        revokeToken();
        break;
        
    case 'clean-expired':
    case '3':
        cleanExpiredTokens();
        break;
        
    case 'list-blocked':
    case '4':
        listBlockedIPs();
        break;
        
    case 'unblock-ip':
    case '5':
        unblockIP();
        break;
        
    case 'show-logs':
    case '6':
        showLogs();
        break;
        
    case 'generate-hash':
    case '7':
        generateHash();
        break;
        
    case 'stats':
    case '8':
        showStats();
        break;
        
    case 'help':
    case '9':
    default:
        showMenu();
        break;
}
