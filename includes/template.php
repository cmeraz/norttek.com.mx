<?php
// Título de la página (se usa en header)
$pageTitle = "Servicios - Norttek";

// Archivos CSS y JS adicionales (opcional)
$cssFiles  = ["styles.css"];       // CSS global opcional
$jsFiles   = ["scripts.js"];       // JS global opcional

// Incluye la plantilla base
include 'includes/pageTemplate.php';
?>

<!-- CONTENIDO DINÁMICO VA AQUÍ -->

<?php
// Al final, cerrar main y cargar footer
includeTemplate("footer");
?>