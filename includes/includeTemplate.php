<?php
/**
 * includeTemplate.php
 * Función para incluir templates de manera centralizada
 */
function includeTemplate($templateName, $variables = []) {
    $file = __DIR__ . "/$templateName.php";

    // Extrae las variables al scope local del include
    if (is_array($variables) && count($variables) > 0) {
        extract($variables);
    }

    if(file_exists($file)) {
        include $file;
    } else {
        echo "<!-- Template $templateName not found -->";
    }
}
?>
