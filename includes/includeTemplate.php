<?php
/**
 * includeTemplate.php
 * Función para incluir templates de manera centralizada
 */
function includeTemplate($templateName) {
    $file = __DIR__ . "/$templateName.php"; // __DIR__ apunta a includes/
    if(file_exists($file)) {
        include $file;
    } else {
        echo "<!-- Template $templateName not found -->";
    }
}
?>
