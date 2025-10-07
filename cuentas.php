<?php
/**
 * cuentas.php - Sistema de Gestión Segura de Cuentas
 * =======================================================
 * Sistema de autenticación y compartición segura mediante tokens
 * 
 * SEGURIDAD:
 * - Login de administrador con contraseña hasheada
 * - Generación de tokens únicos con expiración de 24h
 * - Registro de accesos con IP
 * - Protección contra fuerza bruta
 * - Revocación automática de tokens expirados
 */

// ============================================
// CONFIGURACIÓN INICIAL
// ============================================
session_start();

// Configuración de seguridad
define('ADMIN_USER', 'cmeraz');
define('ADMIN_PASSWORD_HASH', '$2y$10$0gqPOWiClmOUbdaa/c4HbushOkS5atgmV7CeYabZmOGH9bnxoo1DK'); // Hash de: Root01068280
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOCKOUT_TIME', 900); // 15 minutos en segundos
define('TOKEN_EXPIRATION', 86400); // 24 horas en segundos
define('TOKENS_FILE', __DIR__ . '/data/tokens.json');
define('LOG_FILE', __DIR__ . '/data/log.txt');
define('BLOCKED_IPS_FILE', __DIR__ . '/data/blocked_ips.json');

// Crear directorio de datos si no existe
if (!file_exists(__DIR__ . '/data')) {
    mkdir(__DIR__ . '/data', 0755, true);
}

// ============================================
// FUNCIONES DE SEGURIDAD
// ============================================

/**
 * Obtiene la IP real del usuario
 */
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $_SERVER['REMOTE_ADDR'];
}

/**
 * Registra un evento en el log
 */
function logAccess($message) {
    $ip = getUserIP();
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "[{$timestamp}] IP: {$ip} - {$message}\n";
    file_put_contents(LOG_FILE, $logEntry, FILE_APPEND);
}

/**
 * Verifica si una IP está bloqueada
 */
function isIPBlocked() {
    $ip = getUserIP();
    
    if (!file_exists(BLOCKED_IPS_FILE)) {
        return false;
    }
    
    $blockedIPs = json_decode(file_get_contents(BLOCKED_IPS_FILE), true) ?: [];
    
    if (isset($blockedIPs[$ip])) {
        $blockExpiry = $blockedIPs[$ip]['expiry'];
        
        if (time() < $blockExpiry) {
            return true; // Todavía bloqueado
        } else {
            // Desbloquear IP expirada
            unset($blockedIPs[$ip]);
            file_put_contents(BLOCKED_IPS_FILE, json_encode($blockedIPs, JSON_PRETTY_PRINT));
        }
    }
    
    return false;
}

/**
 * Registra un intento fallido de login
 */
function registerFailedAttempt() {
    $ip = getUserIP();
    
    $blockedIPs = file_exists(BLOCKED_IPS_FILE) 
        ? json_decode(file_get_contents(BLOCKED_IPS_FILE), true) 
        : [];
    
    if (!isset($blockedIPs[$ip])) {
        $blockedIPs[$ip] = ['attempts' => 0, 'expiry' => 0];
    }
    
    $blockedIPs[$ip]['attempts']++;
    
    if ($blockedIPs[$ip]['attempts'] >= MAX_LOGIN_ATTEMPTS) {
        $blockedIPs[$ip]['expiry'] = time() + LOCKOUT_TIME;
        logAccess("IP BLOQUEADA por exceder intentos de login. Bloqueado por 15 minutos.");
    }
    
    file_put_contents(BLOCKED_IPS_FILE, json_encode($blockedIPs, JSON_PRETTY_PRINT));
}

/**
 * Limpia los intentos fallidos de una IP
 */
function clearFailedAttempts() {
    $ip = getUserIP();
    
    if (file_exists(BLOCKED_IPS_FILE)) {
        $blockedIPs = json_decode(file_get_contents(BLOCKED_IPS_FILE), true) ?: [];
        
        if (isset($blockedIPs[$ip])) {
            unset($blockedIPs[$ip]);
            file_put_contents(BLOCKED_IPS_FILE, json_encode($blockedIPs, JSON_PRETTY_PRINT));
        }
    }
}

/**
 * Limpia tokens expirados del archivo
 */
function cleanExpiredTokens() {
    if (!file_exists(TOKENS_FILE)) {
        return;
    }
    
    $tokens = json_decode(file_get_contents(TOKENS_FILE), true) ?: [];
    $currentTime = time();
    $cleaned = false;
    
    foreach ($tokens as $token => $data) {
        if ($currentTime > $data['expiry']) {
            unset($tokens[$token]);
            $cleaned = true;
        }
    }
    
    if ($cleaned) {
        file_put_contents(TOKENS_FILE, json_encode($tokens, JSON_PRETTY_PRINT));
    }
}

/**
 * Verifica si un token es válido
 */
function isValidToken($token) {
    if (!file_exists(TOKENS_FILE)) {
        return false;
    }
    
    $tokens = json_decode(file_get_contents(TOKENS_FILE), true) ?: [];
    
    if (!isset($tokens[$token])) {
        return false;
    }
    
    $tokenData = $tokens[$token];
    
    // Verificar expiración
    if (time() > $tokenData['expiry']) {
        logAccess("Token expirado usado: {$token}");
        return false;
    }
    
    // Registrar acceso válido
    logAccess("Acceso mediante token válido: {$token}");
    return true;
}

/**
 * Genera un nuevo token de acceso
 */
function generateToken() {
    $token = bin2hex(random_bytes(16)); // 32 caracteres hexadecimales
    $expiry = time() + TOKEN_EXPIRATION;
    
    $tokens = file_exists(TOKENS_FILE) 
        ? json_decode(file_get_contents(TOKENS_FILE), true) 
        : [];
    
    $tokens[$token] = [
        'created' => date('Y-m-d H:i:s'),
        'expiry' => $expiry,
        'created_by' => $_SESSION['admin_user'] ?? 'system'
    ];
    
    file_put_contents(TOKENS_FILE, json_encode($tokens, JSON_PRETTY_PRINT));
    logAccess("Token generado: {$token}");
    
    return $token;
}

// ============================================
// PROCESAMIENTO DE LOGIN
// ============================================

// Procesar logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: cuentas.php');
    exit;
}

// Procesar login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Verificar si la IP está bloqueada
    if (isIPBlocked()) {
        $error = "Tu IP ha sido bloqueada temporalmente por exceder el límite de intentos. Intenta en 15 minutos.";
        logAccess("Intento de login desde IP bloqueada");
    } else {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if ($username === ADMIN_USER && password_verify($password, ADMIN_PASSWORD_HASH)) {
            // Login exitoso
            session_regenerate_id(true); // Regenerar ID de sesión por seguridad
            $_SESSION['admin_user'] = $username;
            $_SESSION['admin_role'] = 'admin';
            $_SESSION['login_time'] = time();
            
            clearFailedAttempts(); // Limpiar intentos fallidos
            logAccess("Login exitoso de administrador: {$username}");
            
            header('Location: cuentas.php');
            exit;
        } else {
            // Login fallido
            registerFailedAttempt();
            $error = "Usuario o contraseña incorrectos.";
            logAccess("Intento de login fallido - Usuario: {$username}");
        }
    }
}

// Procesar generación de token (solo admin)
if (isset($_POST['generate_token']) && isset($_SESSION['admin_role'])) {
    $token = generateToken();
    $tokenURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") 
                . "://" . $_SERVER['HTTP_HOST'] 
                . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) 
                . "?token=" . $token;
    
    $successMessage = "Enlace generado exitosamente. Válido por 24 horas.";
}

// ============================================
// VERIFICACIÓN DE ACCESO
// ============================================

cleanExpiredTokens(); // Limpiar tokens expirados al cargar la página

$isAdmin = isset($_SESSION['admin_role']) && $_SESSION['admin_role'] === 'admin';
$hasValidToken = false;
$showShareButton = false;

// Verificar acceso mediante token
if (isset($_GET['token'])) {
    $token = htmlspecialchars($_GET['token'], ENT_QUOTES, 'UTF-8');
    
    if (isValidToken($token)) {
        $hasValidToken = true;
    } else {
        logAccess("Intento de acceso con token inválido o expirado: {$token}");
        $tokenError = "El enlace ha expirado o es inválido.";
    }
}

// Determinar si mostrar contenido
$showContent = $isAdmin || $hasValidToken;
$showShareButton = $isAdmin; // Solo admin ve el botón de compartir

// ============================================
// HTML - LOGIN O CONTENIDO
// ============================================

if (!$showContent) {
    // Mostrar formulario de login
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex, nofollow, noarchive, nosnippet">
        <title>Login - Cuentas Norttek Solutions</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/cuentas.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            .login-container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                padding: 20px;
            }
            .login-box {
                background: white;
                border-radius: 12px;
                box-shadow: 0 10px 40px rgba(0,0,0,0.2);
                padding: 40px;
                max-width: 400px;
                width: 100%;
            }
            .login-header {
                text-align: center;
                margin-bottom: 30px;
            }
            .login-header h1 {
                color: #333;
                margin-bottom: 10px;
                font-size: 24px;
            }
            .login-header p {
                color: #666;
                font-size: 14px;
            }
            .form-group {
                margin-bottom: 20px;
            }
            .form-group label {
                display: block;
                margin-bottom: 8px;
                color: #333;
                font-weight: 600;
            }
            .form-group input {
                width: 100%;
                padding: 12px;
                border: 2px solid #e0e0e0;
                border-radius: 6px;
                font-size: 14px;
                transition: border-color 0.3s;
            }
            .form-group input:focus {
                outline: none;
                border-color: #667eea;
            }
            .btn-login {
                width: 100%;
                padding: 14px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                border: none;
                border-radius: 6px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: transform 0.2s;
            }
            .btn-login:hover {
                transform: translateY(-2px);
            }
            .error-message {
                background: #fee;
                border-left: 4px solid #f44;
                padding: 12px;
                margin-bottom: 20px;
                border-radius: 4px;
                color: #c33;
            }
            .token-error {
                background: #fff3cd;
                border-left: 4px solid #ffc107;
                padding: 12px;
                margin-bottom: 20px;
                border-radius: 4px;
                color: #856404;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <div class="login-box">
                <div class="login-header">
                    <h1><i class="fa-solid fa-shield-halved"></i> Acceso Seguro</h1>
                    <p>Panel de Cuentas - Norttek Solutions</p>
                </div>
                
                <?php if (isset($error)): ?>
                    <div class="error-message">
                        <i class="fa-solid fa-exclamation-triangle"></i> <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($tokenError)): ?>
                    <div class="token-error">
                        <i class="fa-solid fa-clock"></i> <?= htmlspecialchars($tokenError) ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username">
                            <i class="fa-solid fa-user"></i> Usuario
                        </label>
                        <input type="text" id="username" name="username" required autocomplete="username">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">
                            <i class="fa-solid fa-lock"></i> Contraseña
                        </label>
                        <input type="password" id="password" name="password" required autocomplete="current-password">
                    </div>
                    
                    <button type="submit" name="login" class="btn-login">
                        <i class="fa-solid fa-sign-in-alt"></i> Iniciar Sesión
                    </button>
                </form>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// ============================================
// CONTENIDO PRINCIPAL (Usuario autenticado)
// ============================================

$pageName = basename(__FILE__, ".php");

// SEO - Página privada, no indexar
$seo = [
    'title' => 'Cuentas de Pago - Norttek Solutions',
    'description' => 'Panel privado de cuentas de pago y datos empresariales',
    'keywords' => 'norttek, cuentas, pago, privado',
    'robots' => 'noindex, nofollow, noarchive, nosnippet',
    'og_title' => 'Cuentas de Pago - Norttek Solutions',
    'og_description' => 'Panel privado de información empresarial',
    'og_url' => 'https://www.norttek.com.mx/cuentas.php',
    'og_image' => 'https://www.norttek.com.mx/assets/img/norttek-acounts.jpg'
];

// CSS específicos
$cssFiles = ['cuentas'];

// JS específicos  
$jsFiles = ['cuentas'];

include __DIR__ . '/includes/pageTemplate.php';
?>