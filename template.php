<?php
/**
 * template.php
 * Plantilla base para crear nuevas páginas en Norttek Solutions
 *
 * Cómo usar:
 * 1️⃣ Copia este archivo y renómbralo como la página que quieras (ej: servicios.php).
 * 2️⃣ Cambia el contenido de $pageName si quieres un nombre distinto para SEO o metas.
 * 3️⃣ Agrega metas específicas en extra/metas/{nombrePagina}.php
 * 4️⃣ Agrega archivos CSS específicos en $cssFiles.
 * 5️⃣ Agrega archivos JS específicos en $jsFiles.
 * 6️⃣ Incluye pageTemplate.php para cargar la estructura base.
 */

// 1️⃣ Determinar nombre de la página automáticamente (por defecto, nombre del archivo sin .php)
$pageName = basename(__FILE__, ".php");

// 2️⃣ Incluir metas específicas si existen
$metaFile = __DIR__ . '/extra/metas/' . $pageName . '.php';
if(file_exists($metaFile)){
    include $metaFile; // Esto define $seo con título, descripción, etc.
} else {
    // Valores por defecto si no hay archivo de metas
    $seo = [
        'title' => 'Norttek Solutions',
        'description' => 'Soluciones integrales de seguridad electrónica',
        'keywords' => 'CCTV, Alarmas, Control de acceso'
    ];
}

// 3️⃣ Archivos CSS extra para esta página (vacío por defecto)
$cssFiles = [
    // 'estilos-home.css', 'slider.css', etc.
];

// 4️⃣ Archivos JS extra para esta página (vacío por defecto)
$jsFiles = [
    // 'home.js', 'contacto.js', etc.
];

// 5️⃣ Incluir plantilla base (header, footer, estructura general)
include __DIR__ . '/includes/pageTemplate.php';

/**
 * 🚀 Tips para crear nuevas páginas:
 * - Cada página puede tener su propio archivo de metas en extra/metas/.
 * - Si agregas CSS o JS, ponlos en las carpetas correspondientes y añádelos a $cssFiles / $jsFiles.
 * - Todo el contenido principal se define dentro de pageTemplate.php usando $pageName para condicionar vistas si es necesario.
 * - Para incluir secciones dinámicas, puedes usar include __DIR__ . '/includes/seccion.php';
 */
?>
