<?php
/**
 * index.php
 * Página de inicio de Norttek Solutions
 */

// 1️⃣ Determinar nombre de la página
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

// 3️⃣ Archivos CSS extra para esta página
$cssFiles = ['']; // Si quieres cargar más, agregar al array

// 4️⃣ Archivos JS extra para esta página (opcional)
$jsFiles = ['home'];

// 5️⃣ Incluir plantilla base
include __DIR__ . '/includes/pageTemplate.php';
?>
