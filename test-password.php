<?php
$password = 'Root01068280';
$hash = '$2y$10$0gqPOWiClmOUbdaa/c4HbushOkS5atgmV7CeYabZmOGH9bnxoo1DK';

echo "Contraseña: {$password}\n";
echo "Hash: {$hash}\n";
echo "Verificación: " . (password_verify($password, $hash) ? 'CORRECTO ✓' : 'INCORRECTO ✗') . "\n";

// Generar nuevo hash fresco
$newHash = password_hash($password, PASSWORD_DEFAULT);
echo "\nNuevo hash generado:\n{$newHash}\n";
echo "Verificación nuevo hash: " . (password_verify($password, $newHash) ? 'CORRECTO ✓' : 'INCORRECTO ✗') . "\n";
