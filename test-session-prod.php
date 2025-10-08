<?php
/**
 * Diagnóstico de Sesiones para Producción
 * Uso: Accede a https://norttek.com.mx/test-session-prod.php
 */

// Habilitar errores para diagnóstico
error_reporting(E_ALL);
ini_set('display_errors', 1);

$sessionError = '';

// Configurar directorio de sesiones personalizado si es necesario
$customSessionPath = __DIR__ . '/data/sessions';
if (is_dir($customSessionPath) && is_writable($customSessionPath)) {
    session_save_path($customSessionPath);
}

// Configurar sesión igual que cuentas.php
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);

// Detectar HTTPS correctamente
$isHttps = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
    (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
    (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
    (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
);

ini_set('session.cookie_secure', $isHttps ? 1 : 0);
ini_set('session.cookie_samesite', 'Lax');
ini_set('session.gc_maxlifetime', 86400);
ini_set('session.cookie_lifetime', 0);

// Intentar iniciar sesión con captura de errores
try {
    $sessionStarted = @session_start();
    if (!$sessionStarted) {
        $sessionError = 'session_start() retornó false';
    }
} catch (Exception $e) {
    $sessionError = 'Exception: ' . $e->getMessage();
} catch (Error $e) {
    $sessionError = 'Error: ' . $e->getMessage();
}

// Procesar test
$action = $_GET['action'] ?? 'view';

if ($action === 'set') {
    $_SESSION['test_var'] = 'Test Value ' . date('Y-m-d H:i:s');
    $_SESSION['test_counter'] = ($_SESSION['test_counter'] ?? 0) + 1;
    session_write_close();
    header('Location: test-session-prod.php?action=check');
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de Sesión - Producción</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 30px;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 2em;
        }
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1em;
        }
        .section {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .section h2 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 1.3em;
        }
        .info-grid {
            display: grid;
            gap: 10px;
        }
        .info-item {
            display: flex;
            padding: 10px;
            background: white;
            border-radius: 5px;
            border: 1px solid #e0e0e0;
        }
        .info-label {
            font-weight: bold;
            color: #555;
            min-width: 200px;
        }
        .info-value {
            color: #333;
            word-break: break-all;
        }
        .status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9em;
        }
        .status.ok {
            background: #d4edda;
            color: #155724;
        }
        .status.error {
            background: #f8d7da;
            color: #721c24;
        }
        .status.warning {
            background: #fff3cd;
            color: #856404;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 5px;
            transition: all 0.3s;
        }
        .btn:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background: #6c757d;
        }
        .btn-secondary:hover {
            background: #5a6268;
        }
        .actions {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
        }
        pre {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-size: 0.9em;
        }
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .alert-info {
            background: #d1ecf1;
            border-left: 4px solid #0c5460;
            color: #0c5460;
        }
        .alert-success {
            background: #d4edda;
            border-left: 4px solid #155724;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Diagnóstico de Sesión</h1>
        <p class="subtitle">Test de persistencia de sesión en producción</p>

        <?php if (!empty($sessionError)): ?>
            <div class="alert alert-success" style="background:#f8d7da;border-left-color:#721c24;color:#721c24;">
                <strong>❌ ERROR CRÍTICO:</strong> No se pudo iniciar la sesión.
                <br><strong>Detalle:</strong> <?= htmlspecialchars($sessionError) ?>
                <br><br>
                <strong>Posibles causas:</strong>
                <ul style="margin-top:10px;margin-left:20px;">
                    <li>El directorio de sesiones no tiene permisos de escritura</li>
                    <li>El directorio de sesiones no existe</li>
                    <li>PHP está configurado para no usar sesiones</li>
                    <li>Conflicto con configuración de cookies</li>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($action === 'check'): ?>
            <div class="alert alert-info">
                <strong>✓ Test completado:</strong> Se estableció una variable de sesión y se redirigió a esta página.
                Si ves los valores abajo, la sesión está funcionando correctamente.
            </div>
        <?php endif; ?>

        <!-- Estado General -->
        <div class="section">
            <h2>📊 Estado de la Sesión</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Session ID:</span>
                    <span class="info-value"><?= session_id() ?: '<span class="status error">NO HAY SESSION</span>' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Estado:</span>
                    <span class="info-value">
                        <?php
                        $status = session_status();
                        if ($status === PHP_SESSION_ACTIVE) {
                            echo '<span class="status ok">ACTIVA</span>';
                        } elseif ($status === PHP_SESSION_NONE) {
                            echo '<span class="status error">NO INICIADA</span>';
                        } else {
                            echo '<span class="status warning">DESHABILITADA</span>';
                        }
                        ?>
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">Variables en sesión:</span>
                    <span class="info-value"><?= count($_SESSION) ?></span>
                </div>
            </div>
        </div>

        <!-- Variables de Sesión -->
        <div class="section">
            <h2>💾 Variables de Sesión</h2>
            <?php if (empty($_SESSION)): ?>
                <div class="alert alert-info">
                    <strong>ℹ️ Sesión vacía:</strong> No hay variables almacenadas actualmente.
                </div>
            <?php else: ?>
                <pre><?= htmlspecialchars(print_r($_SESSION, true)) ?></pre>
            <?php endif; ?>
        </div>

        <!-- Configuración PHP -->
        <div class="section">
            <h2>⚙️ Configuración de Sesión PHP</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">session.save_handler:</span>
                    <span class="info-value"><?= ini_get('session.save_handler') ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">session.save_path:</span>
                    <span class="info-value"><?= ini_get('session.save_path') ?: '<em>default</em>' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">session.use_cookies:</span>
                    <span class="info-value"><?= ini_get('session.use_cookies') ? 'Sí' : 'No' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">session.use_only_cookies:</span>
                    <span class="info-value"><?= ini_get('session.use_only_cookies') ? 'Sí' : 'No' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">session.cookie_httponly:</span>
                    <span class="info-value"><?= ini_get('session.cookie_httponly') ? 'Sí' : 'No' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">session.cookie_secure:</span>
                    <span class="info-value"><?= ini_get('session.cookie_secure') ? 'Sí (HTTPS)' : 'No' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">session.cookie_samesite:</span>
                    <span class="info-value"><?= ini_get('session.cookie_samesite') ?: '<em>no configurado</em>' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">session.gc_maxlifetime:</span>
                    <span class="info-value"><?= ini_get('session.gc_maxlifetime') ?> segundos (<?= round(ini_get('session.gc_maxlifetime')/3600, 2) ?> horas)</span>
                </div>
                <div class="info-item">
                    <span class="info-label">session.cookie_lifetime:</span>
                    <span class="info-value"><?= ini_get('session.cookie_lifetime') == 0 ? 'Hasta cerrar navegador' : ini_get('session.cookie_lifetime') . ' segundos' ?></span>
                </div>
            </div>
        </div>

        <!-- Detección HTTPS -->
        <div class="section">
            <h2>🔒 Detección de HTTPS</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">HTTPS detectado:</span>
                    <span class="info-value">
                        <?php if ($isHttps): ?>
                            <span class="status ok">SÍ - Usando HTTPS</span>
                        <?php else: ?>
                            <span class="status warning">NO - Usando HTTP</span>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">$_SERVER['HTTPS']:</span>
                    <span class="info-value"><?= $_SERVER['HTTPS'] ?? '<em>no definido</em>' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">$_SERVER['HTTP_X_FORWARDED_PROTO']:</span>
                    <span class="info-value"><?= $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '<em>no definido</em>' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">$_SERVER['HTTP_X_FORWARDED_SSL']:</span>
                    <span class="info-value"><?= $_SERVER['HTTP_X_FORWARDED_SSL'] ?? '<em>no definido</em>' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">$_SERVER['SERVER_PORT']:</span>
                    <span class="info-value"><?= $_SERVER['SERVER_PORT'] ?? '<em>no definido</em>' ?></span>
                </div>
            </div>
        </div>

        <!-- Información del Servidor -->
        <div class="section">
            <h2>🖥️ Información del Servidor</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">PHP Version:</span>
                    <span class="info-value"><?= PHP_VERSION ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Server Software:</span>
                    <span class="info-value"><?= $_SERVER['SERVER_SOFTWARE'] ?? '<em>no definido</em>' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">IP del Cliente:</span>
                    <span class="info-value"><?= $_SERVER['REMOTE_ADDR'] ?? '<em>no definido</em>' ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">User Agent:</span>
                    <span class="info-value"><?= $_SERVER['HTTP_USER_AGENT'] ?? '<em>no definido</em>' ?></span>
                </div>
            </div>
        </div>

        <!-- Acciones -->
        <div class="actions">
            <h2 style="margin-bottom: 15px;">🧪 Probar Persistencia de Sesión</h2>
            <p style="margin-bottom: 15px; color: #666;">
                Este test establecerá una variable de sesión, hará un redirect con <code>session_write_close()</code>, 
                y verificará si la variable persiste después del redirect.
            </p>
            <a href="test-session-prod.php?action=set" class="btn">🚀 Ejecutar Test de Persistencia</a>
            <a href="test-session-prod.php" class="btn btn-secondary">🔄 Recargar Página</a>
        </div>

    </div>
</body>
</html>
