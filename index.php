<?php
/**
 * index.php
 * Página de inicio de Norttek Solutions
 */

// 1️⃣ Determinar nombre de la página
$pageName = basename(__FILE__, ".php");

// 2️⃣ Incluir metas específicas
$metaFile = __DIR__ . '/extra/metas/' . $pageName . '.php';
if(file_exists($metaFile)){
    include $metaFile; // Esto define $seo
}

// 3️⃣ Archivos CSS extra para esta página
$cssFiles = ['']; // Si quieres cargar más, agregar al array

// 4️⃣ Archivos JS extra para esta página (opcional)
$jsFiles = ['home'];

// 5️⃣ Incluir plantilla base
include __DIR__ . '/includes/pageTemplate.php';
?>
