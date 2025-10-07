<?php
/**
 * Diagnóstico Completo del Sistema de Login
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar sesión para ver su estado
session_start();

echo "<!DOCTYPE html>";
echo "<html><head>";
echo "<meta charset='UTF-8'>";
echo "<title>Diagnóstico Sistema Login</title>";
echo "<style>
body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
.container { max-width: 1000px; margin: 0 auto; }
.section { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
.success { color: #4CAF50; font-weight: bold; }
.error { color: #f44336; font-weight: bold; }
.warning { color: #ff9800; font-weight: bold; }
pre { background: #f5f5f5; padding: 15px; border-radius: 4px; overflow-x: auto; }
table { width: 100%; border-collapse: collapse; }
table td { padding: 8px; border-bottom: 1px solid #ddd; }
table td:first-child { font-weight: bold; width: 200px; }
.btn { display: inline-block; padding: 10px 20px; background: #2196F3; color: white; text-decoration: none; border-radius: 4px; margin: 5px; }
.btn-danger { background: #f44336; }
.btn-success { background: #4CAF50; }
</style>";
echo "</head><body>";
echo "<div class='container'>";

echo "<h1>🔍 Diagnóstico Completo - Sistema de Login</h1>";

// ============================================
// 1. CONFIGURACIÓN
// ============================================
echo "<div class='section'>";
echo "<h2>1. Configuración del Sistema</h2>";

define('ADMIN_USER', 'cmeraz');
define('ADMIN_PASSWORD_HASH', '$2y$10$0gqPOWiClmOUbdaa/c4HbushOkS5atgmV7CeYabZmOGH9bnxoo1DK');

echo "<table>";
echo "<tr><td>Usuario Admin:</td><td>" . ADMIN_USER . "</td></tr>";
echo "<tr><td>Hash Almacenado:</td><td style='font-family: monospace; font-size: 11px;'>" . ADMIN_PASSWORD_HASH . "</td></tr>";
echo "<tr><td>Archivo cuentas.php:</td><td>" . (file_exists('cuentas.php') ? '<span class="success">✓ Existe</span>' : '<span class="error">✗ No existe</span>') . "</td></tr>";
echo "</table>";
echo "</div>";

// ============================================
// 2. ESTADO DE LA SESIÓN
// ============================================
echo "<div class='section'>";
echo "<h2>2. Estado de la Sesión Actual</h2>";

echo "<table>";
echo "<tr><td>Session ID:</td><td>" . session_id() . "</td></tr>";
echo "<tr><td>Session Status:</td><td>" . session_status() . " (" . (session_status() === PHP_SESSION_ACTIVE ? "ACTIVA" : "INACTIVA") . ")</td></tr>";
echo "<tr><td>¿Sesión iniciada?:</td><td>" . (isset($_SESSION['admin_user']) ? '<span class="success">✓ SÍ</span>' : '<span class="error">✗ NO</span>') . "</td></tr>";

if (isset($_SESSION['admin_user'])) {
    echo "<tr><td>Usuario en sesión:</td><td>" . htmlspecialchars($_SESSION['admin_user']) . "</td></tr>";
    echo "<tr><td>Rol:</td><td>" . htmlspecialchars($_SESSION['admin_role'] ?? 'No definido') . "</td></tr>";
    echo "<tr><td>Tiempo de login:</td><td>" . (isset($_SESSION['login_time']) ? date('Y-m-d H:i:s', $_SESSION['login_time']) : 'No registrado') . "</td></tr>";
}

echo "<tr><td>Variables $_SESSION:</td><td><pre>" . print_r($_SESSION, true) . "</pre></td></tr>";
echo "</table>";

if (isset($_SESSION['admin_user'])) {
    echo "<p><a href='?destroy_session=1' class='btn btn-danger'>Destruir Sesión</a></p>";
}

echo "</div>";

// ============================================
// 3. VERIFICACIÓN DE CONTRASEÑA
// ============================================
echo "<div class='section'>";
echo "<h2>3. Verificación de Contraseña</h2>";

$testPassword = 'Root01068280';
$isValid = password_verify($testPassword, ADMIN_PASSWORD_HASH);

echo "<table>";
echo "<tr><td>Contraseña de prueba:</td><td>{$testPassword}</td></tr>";
echo "<tr><td>Resultado password_verify():</td><td>" . ($isValid ? '<span class="success">✓ VÁLIDA</span>' : '<span class="error">✗ INVÁLIDA</span>') . "</td></tr>";
echo "</table>";

if (!$isValid) {
    echo "<p class='warning'>⚠️ PROBLEMA: El hash no coincide con la contraseña esperada!</p>";
    $newHash = password_hash($testPassword, PASSWORD_DEFAULT);
    echo "<p>Nuevo hash generado (copiar a cuentas.php):</p>";
    echo "<pre style='background: #ffe; border: 2px solid #ff9800; padding: 15px;'>{$newHash}</pre>";
}
echo "</div>";

// ============================================
// 4. ARCHIVOS DE DATOS
// ============================================
echo "<div class='section'>";
echo "<h2>4. Archivos de Datos</h2>";

$files = [
    'data/tokens.json' => 'Tokens',
    'data/blocked_ips.json' => 'IPs Bloqueadas',
    'data/log.txt' => 'Logs'
];

echo "<table>";
foreach ($files as $file => $label) {
    $exists = file_exists($file);
    $readable = $exists ? is_readable($file) : false;
    $writable = $exists ? is_writable($file) : false;
    $size = $exists ? filesize($file) : 0;
    
    echo "<tr><td>{$label}:</td><td>";
    echo $exists ? '<span class="success">✓ Existe</span>' : '<span class="error">✗ No existe</span>';
    echo " | ";
    echo $readable ? '<span class="success">Lectura ✓</span>' : '<span class="error">Lectura ✗</span>';
    echo " | ";
    echo $writable ? '<span class="success">Escritura ✓</span>' : '<span class="error">Escritura ✗</span>';
    echo " | Tamaño: " . number_format($size) . " bytes";
    echo "</td></tr>";
}
echo "</table>";
echo "</div>";

// ============================================
// 5. ÚLTIMO LOG
// ============================================
echo "<div class='section'>";
echo "<h2>5. Últimos 10 Registros del Log</h2>";

if (file_exists('data/log.txt')) {
    $logLines = file('data/log.txt');
    $lastLines = array_slice($logLines, -10);
    echo "<pre>";
    foreach ($lastLines as $line) {
        if (strpos($line, 'exitoso') !== false) {
            echo "<span class='success'>{$line}</span>";
        } elseif (strpos($line, 'fallido') !== false || strpos($line, 'bloqueada') !== false) {
            echo "<span class='error'>{$line}</span>";
        } else {
            echo $line;
        }
    }
    echo "</pre>";
} else {
    echo "<p class='error'>No se puede leer el archivo de log</p>";
}
echo "</div>";

// ============================================
// 6. IPs BLOQUEADAS
// ============================================
echo "<div class='section'>";
echo "<h2>6. IPs Bloqueadas</h2>";

if (file_exists('data/blocked_ips.json')) {
    $blocked = json_decode(file_get_contents('data/blocked_ips.json'), true) ?: [];
    
    if (empty($blocked)) {
        echo "<p class='success'>✓ No hay IPs bloqueadas actualmente</p>";
    } else {
        echo "<table>";
        echo "<tr><td><strong>IP</strong></td><td><strong>Intentos</strong></td><td><strong>Expira</strong></td></tr>";
        foreach ($blocked as $ip => $data) {
            $expired = time() > $data['expiry'];
            echo "<tr>";
            echo "<td>{$ip}</td>";
            echo "<td>{$data['attempts']}</td>";
            echo "<td>" . ($expired ? '<span class="success">Expirado</span>' : '<span class="error">Bloqueado hasta ' . date('H:i:s', $data['expiry']) . '</span>') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<p><a href='?clear_blocked=1' class='btn btn-danger'>Limpiar IPs Bloqueadas</a></p>";
    }
}
echo "</div>";

// ============================================
// 7. PRUEBA DE LOGIN
// ============================================
echo "<div class='section'>";
echo "<h2>7. Prueba de Login en Vivo</h2>";

if (isset($_POST['test_login'])) {
    $testUser = $_POST['username'] ?? '';
    $testPass = $_POST['password'] ?? '';
    
    echo "<div style='background: #e3f2fd; padding: 15px; border-radius: 4px; margin-bottom: 15px;'>";
    echo "<strong>Resultado de la prueba:</strong><br><br>";
    echo "Usuario ingresado: <code>{$testUser}</code><br>";
    echo "Contraseña ingresada: <code>{$testPass}</code><br><br>";
    
    $userMatch = ($testUser === ADMIN_USER);
    $passMatch = password_verify($testPass, ADMIN_PASSWORD_HASH);
    
    echo "✓ Usuario coincide: " . ($userMatch ? '<span class="success">SÍ</span>' : '<span class="error">NO</span>') . "<br>";
    echo "✓ Contraseña válida: " . ($passMatch ? '<span class="success">SÍ</span>' : '<span class="error">NO</span>') . "<br><br>";
    
    if ($userMatch && $passMatch) {
        echo "<div class='success' style='font-size: 18px;'>✓✓✓ LOGIN SERÍA EXITOSO ✓✓✓</div>";
        echo "<p>Las credenciales son correctas. El problema debe estar en otro lado.</p>";
    } else {
        echo "<div class='error' style='font-size: 18px;'>✗✗✗ LOGIN FALLARÍA ✗✗✗</div>";
        if (!$userMatch) echo "<p class='error'>• Usuario incorrecto</p>";
        if (!$passMatch) echo "<p class='error'>• Contraseña incorrecta</p>";
    }
    echo "</div>";
}

echo "<form method='POST'>";
echo "<table>";
echo "<tr><td>Usuario:</td><td><input type='text' name='username' value='cmeraz' style='width: 300px; padding: 8px;'></td></tr>";
echo "<tr><td>Contraseña:</td><td><input type='password' name='password' value='Root01068280' style='width: 300px; padding: 8px;'></td></tr>";
echo "</table>";
echo "<button type='submit' name='test_login' class='btn btn-success' style='margin-top: 10px;'>Probar Login</button>";
echo "</form>";
echo "</div>";

// ============================================
// 8. ACCIONES
// ============================================
echo "<div class='section'>";
echo "<h2>8. Acciones Rápidas</h2>";
echo "<a href='cuentas.php' class='btn'>Ir a cuentas.php</a>";
echo "<a href='?phpinfo=1' class='btn'>Ver phpinfo()</a>";
echo "<a href='?clear_all=1' class='btn btn-danger'>Limpiar Todo (Sesión + Logs + Bloqueos)</a>";
echo "</div>";

echo "</div>"; // container

// ============================================
// PROCESAMIENTO DE ACCIONES
// ============================================

if (isset($_GET['destroy_session'])) {
    session_destroy();
    header('Location: debug-cliente.php');
    exit;
}

if (isset($_GET['clear_blocked'])) {
    file_put_contents('data/blocked_ips.json', '{}');
    header('Location: debug-cliente.php');
    exit;
}

if (isset($_GET['clear_all'])) {
    session_destroy();
    file_put_contents('data/blocked_ips.json', '{}');
    file_put_contents('data/log.txt', "# Log limpiado el " . date('Y-m-d H:i:s') . "\n");
    header('Location: debug-cliente.php');
    exit;
}

if (isset($_GET['phpinfo'])) {
    phpinfo();
    exit;
}

echo "</body></html>";
