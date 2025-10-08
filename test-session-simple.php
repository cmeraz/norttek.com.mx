<?php
/**
 * Test Simple de Sesión - Sin configuraciones complejas
 */

// Habilitar todos los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Test Simple</title>";
echo "<style>body{font-family:monospace;padding:20px;background:#f5f5f5;}";
echo ".ok{color:green;font-weight:bold;}.error{color:red;font-weight:bold;}</style></head><body>";

echo "<h1>🔍 Test de Sesión Simple</h1>";
echo "<hr><br>";

// Test 1: Intentar iniciar sesión sin configuración
echo "<h2>Test 1: session_start() básico</h2>";
try {
    $result = session_start();
    if ($result) {
        echo "<span class='ok'>✓ session_start() retornó TRUE</span><br>";
        echo "Session ID: " . session_id() . "<br>";
        echo "Session Status: " . session_status() . " (2=activa)<br>";
    } else {
        echo "<span class='error'>✗ session_start() retornó FALSE</span><br>";
    }
} catch (Exception $e) {
    echo "<span class='error'>✗ ERROR: " . $e->getMessage() . "</span><br>";
}

echo "<br><hr><br>";

// Test 2: Verificar directorio de sesiones
echo "<h2>Test 2: Directorio de Sesiones</h2>";
$savePath = session_save_path();
if (empty($savePath)) {
    $savePath = sys_get_temp_dir();
}
echo "session.save_path: <strong>" . htmlspecialchars($savePath) . "</strong><br>";

if (file_exists($savePath)) {
    echo "<span class='ok'>✓ El directorio existe</span><br>";
    if (is_writable($savePath)) {
        echo "<span class='ok'>✓ El directorio es escribible</span><br>";
    } else {
        echo "<span class='error'>✗ El directorio NO es escribible (PROBLEMA CRÍTICO)</span><br>";
        echo "Permisos: " . substr(sprintf('%o', fileperms($savePath)), -4) . "<br>";
    }
} else {
    echo "<span class='error'>✗ El directorio NO existe (PROBLEMA CRÍTICO)</span><br>";
}

echo "<br><hr><br>";

// Test 3: Intentar escribir en sesión
echo "<h2>Test 3: Escribir en Sesión</h2>";
if (session_status() === PHP_SESSION_ACTIVE) {
    $_SESSION['test'] = 'Valor de prueba: ' . date('Y-m-d H:i:s');
    $_SESSION['counter'] = ($_SESSION['counter'] ?? 0) + 1;
    echo "<span class='ok'>✓ Variables escritas en \$_SESSION</span><br>";
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
} else {
    echo "<span class='error'>✗ La sesión no está activa</span><br>";
}

echo "<br><hr><br>";

// Test 4: Información del servidor
echo "<h2>Test 4: Configuración del Servidor</h2>";
echo "PHP Version: <strong>" . PHP_VERSION . "</strong><br>";
echo "Server Software: <strong>" . ($_SERVER['SERVER_SOFTWARE'] ?? 'N/A') . "</strong><br>";
echo "session.use_cookies: " . ini_get('session.use_cookies') . "<br>";
echo "session.use_only_cookies: " . ini_get('session.use_only_cookies') . "<br>";
echo "session.cookie_lifetime: " . ini_get('session.cookie_lifetime') . "<br>";
echo "session.gc_maxlifetime: " . ini_get('session.gc_maxlifetime') . "<br>";

echo "<br><hr><br>";

// Test 5: Verificar si hay archivos de sesión
echo "<h2>Test 5: Archivos de Sesión</h2>";
if (!empty($savePath) && is_dir($savePath)) {
    $sessionFiles = glob($savePath . '/sess_*');
    if ($sessionFiles) {
        echo "<span class='ok'>✓ Encontrados " . count($sessionFiles) . " archivos de sesión</span><br>";
        echo "Últimos 5 archivos:<br>";
        foreach (array_slice($sessionFiles, -5) as $file) {
            $mtime = date('Y-m-d H:i:s', filemtime($file));
            echo "- " . basename($file) . " (modificado: $mtime)<br>";
        }
    } else {
        echo "<span class='error'>⚠ No se encontraron archivos de sesión</span><br>";
    }
} else {
    echo "<span class='error'>✗ No se puede leer el directorio de sesiones</span><br>";
}

echo "<br><hr><br>";

// Test 6: Headers y cookies
echo "<h2>Test 6: Cookies Enviadas</h2>";
if (headers_sent($file, $line)) {
    echo "<span class='error'>⚠ Headers ya enviados en $file línea $line</span><br>";
} else {
    echo "<span class='ok'>✓ Headers aún no enviados</span><br>";
}

if (isset($_COOKIE[session_name()])) {
    echo "Cookie de sesión recibida: <strong>" . $_COOKIE[session_name()] . "</strong><br>";
} else {
    echo "<span class='error'>⚠ No se recibió cookie de sesión</span><br>";
}

echo "<br><hr><br>";
echo "<h3>Acciones:</h3>";
echo "<a href='test-session-simple.php' style='display:inline-block;padding:10px 20px;background:#007bff;color:white;text-decoration:none;border-radius:5px;margin:5px;'>🔄 Recargar</a>";
echo "<a href='test-session-simple.php?clear=1' style='display:inline-block;padding:10px 20px;background:#dc3545;color:white;text-decoration:none;border-radius:5px;margin:5px;'>🗑️ Limpiar Sesión</a>";

if (isset($_GET['clear']) && session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
    echo "<br><br><span class='ok'>✓ Sesión destruida</span>";
}

echo "</body></html>";
?>
