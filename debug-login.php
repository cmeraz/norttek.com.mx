<?php
/**
 * Debug de login - cuentas.php
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

echo "<h2>Debug de Login - Cuentas Norttek</h2>";
echo "<pre>";

// Configuración
define('ADMIN_USER', 'cmeraz');
define('ADMIN_PASSWORD_HASH', '$2y$10$0gqPOWiClmOUbdaa/c4HbushOkS5atgmV7CeYabZmOGH9bnxoo1DK');

echo "=== CONFIGURACIÓN ===\n";
echo "Usuario admin: " . ADMIN_USER . "\n";
echo "Hash almacenado: " . ADMIN_PASSWORD_HASH . "\n\n";

// Simular POST
$_POST['username'] = 'cmeraz';
$_POST['password'] = 'Root01068280';
$_POST['login'] = '1';

echo "=== DATOS POST (simulados) ===\n";
echo "Username recibido: " . $_POST['username'] . "\n";
echo "Password recibido: " . $_POST['password'] . "\n\n";

echo "=== VERIFICACIONES ===\n";
echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "\n";
echo "isset(\$_POST['login']): " . (isset($_POST['login']) ? 'SÍ' : 'NO') . "\n\n";

echo "=== VALIDACIÓN ===\n";
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

echo "Usuario coincide: " . ($username === ADMIN_USER ? 'SÍ ✓' : 'NO ✗') . "\n";
echo "  - Recibido: '{$username}'\n";
echo "  - Esperado: '" . ADMIN_USER . "'\n\n";

echo "Password verify:\n";
$passwordMatch = password_verify($password, ADMIN_PASSWORD_HASH);
echo "  - Resultado: " . ($passwordMatch ? 'SÍ ✓' : 'NO ✗') . "\n";
echo "  - Password: '{$password}'\n";
echo "  - Hash: " . ADMIN_PASSWORD_HASH . "\n\n";

echo "=== CONDICIÓN COMPLETA ===\n";
if ($username === ADMIN_USER && password_verify($password, ADMIN_PASSWORD_HASH)) {
    echo "✓ LOGIN SERÍA EXITOSO\n";
    echo "Se asignarían las variables de sesión:\n";
    echo "  - \$_SESSION['admin_user'] = '{$username}'\n";
    echo "  - \$_SESSION['admin_role'] = 'admin'\n";
    echo "  - \$_SESSION['login_time'] = " . time() . "\n";
} else {
    echo "✗ LOGIN FALLARÍA\n";
    if ($username !== ADMIN_USER) {
        echo "  Razón: Usuario no coincide\n";
    }
    if (!password_verify($password, ADMIN_PASSWORD_HASH)) {
        echo "  Razón: Contraseña no coincide\n";
    }
}

echo "\n=== PRUEBA CON FORMULARIO REAL ===\n";
?>
</pre>

<form method="POST" action="" style="padding: 20px; background: #f0f0f0; border-radius: 8px; max-width: 400px;">
    <h3>Probar Login Real</h3>
    <div style="margin-bottom: 15px;">
        <label>Usuario:</label><br>
        <input type="text" name="username" value="cmeraz" style="width: 100%; padding: 8px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label>Contraseña:</label><br>
        <input type="password" name="password" value="Root01068280" style="width: 100%; padding: 8px;">
    </div>
    <button type="submit" name="login_test" style="padding: 10px 20px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
        Probar Login
    </button>
</form>

<?php
if (isset($_POST['login_test'])) {
    echo "<pre style='background: #e8f5e9; padding: 15px; border-radius: 8px; margin-top: 20px;'>";
    echo "<strong>RESULTADO DE LOGIN REAL:</strong>\n\n";
    
    $testUser = $_POST['username'] ?? '';
    $testPass = $_POST['password'] ?? '';
    
    echo "Usuario ingresado: '{$testUser}'\n";
    echo "Contraseña ingresada: '{$testPass}'\n\n";
    
    if ($testUser === ADMIN_USER && password_verify($testPass, ADMIN_PASSWORD_HASH)) {
        echo "✓✓✓ LOGIN EXITOSO ✓✓✓\n";
        echo "Las credenciales son correctas!\n";
    } else {
        echo "✗✗✗ LOGIN FALLIDO ✗✗✗\n";
        if ($testUser !== ADMIN_USER) {
            echo "Problema: Usuario '{$testUser}' no coincide con '" . ADMIN_USER . "'\n";
        }
        if (!password_verify($testPass, ADMIN_PASSWORD_HASH)) {
            echo "Problema: Contraseña incorrecta\n";
            echo "Hash esperado: " . ADMIN_PASSWORD_HASH . "\n";
            echo "Password verify result: " . (password_verify($testPass, ADMIN_PASSWORD_HASH) ? 'true' : 'false') . "\n";
        }
    }
    echo "</pre>";
}
?>

<a href="cuentas.php" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background: #2196F3; color: white; text-decoration: none; border-radius: 4px;">
    ← Volver a cuentas.php
</a>
