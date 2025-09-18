<?php
// Nombre de la página (por defecto, nombre del archivo sin .php)
$pageName = basename(__FILE__, ".php");

// Metas específicas si existen
$metaFile = __DIR__ . '/extra/metas/' . $pageName . '.php';
if(file_exists($metaFile)){
    include $metaFile; // Define $seo
} else {
    $seo = [
        'title' => 'Norttek Solutions',
        'description' => 'Soluciones integrales de seguridad electrónica',
        'keywords' => 'CCTV, Alarmas, Control de acceso',
        'robots' => 'noindex, nofollow'
    ];
}

// Archivos CSS y JS específicos
$cssFiles = [];
$jsFiles = [];

// Plantilla base
include __DIR__ . '/includes/pageTemplate.php';
?>

