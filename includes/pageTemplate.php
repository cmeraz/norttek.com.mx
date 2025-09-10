<?php
/**
 * pageTemplate.php
 * Plantilla base para todas las páginas
 */

// Funciones para incluir templates
include __DIR__ . '/includeTemplate.php';

// Incluir header y navbar
includeTemplate("header");
includeTemplate("navbar");

// Abrir main
echo "<main>\n";

// La página específica insertará su contenido aquí
// Por ejemplo, en index.php o nosotros.php:
?>
<!-- CONTENIDO DINÁMICO VA AQUÍ -->
<?php
// Al final de la página (después del contenido dinámico) se incluye el footer
// includeTemplate("footer");
?>
