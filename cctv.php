<?php
// Nombre de la página (por defecto, nombre del archivo sin .php)
$pageName = basename(__FILE__, ".php");

// Metas específicas si existen
$metaFile = __DIR__ . '/extra/metas/' . $pageName . '.php';
if(file_exists($metaFile)){
    include $metaFile; // Define $seo
} else {
    $seo = [
        'title' => 'Norttek Solutions - CCTV Video Vigilancia',
        'description' => 'Soluciones integrales de CCTV y video vigilancia para hogares y empresas. Instalación profesional y equipos de alta calidad.',
        'keywords' => 'CCTV, Hikvision, Dahua, Video Vigilancia, Seguridad, Cámaras, Norttek',
        'robots' => 'index , follow'
    ];
}

// Archivos CSS y JS específicos
$cssFiles = [];
$jsFiles = [];

// Plantilla base
include __DIR__ . '/includes/pageTemplate.php';
?>

