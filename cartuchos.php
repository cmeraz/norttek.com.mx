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

$seo = [
    // SEO básico
    'title'       => 'Norttek Solutions - Seguridad Integral para tu Hogar y Oficina',
    'description' => 'Norttek Solutions ofrece instalación profesional de CCTV, alarmas inteligentes, control de acceso, redes y cableado estructurado.',
    'keywords'    => 'Seguridad, CCTV, Alarmas, Control de acceso, Redes, Automatización, Norttek, Oficina, Hogar, Empresas',
    'robots'      => 'index, follow',

    // Open Graph
    'og_title'       => 'Norttek Solutions - Inicio',
    'og_description' => 'Protege tu hogar y empresa con soluciones integrales de seguridad de Norttek.',
    'og_url'         => 'https://www.norttek.com.mx/',
    'og_image'       => 'https://www.norttek.com.mx/assets/images/og-image.jpg',

    // Twitter Card
    'twitter_title'       => 'Norttek Solutions - Inicio',
    'twitter_description' => 'Protege tu hogar y empresa con soluciones integrales de seguridad de Norttek.',
    'twitter_image'       => 'https://www.norttek.com.mx/assets/images/og-image.jpg'
];

// 1️⃣ Determinar nombre de la página automáticamente (por defecto, nombre del archivo sin .php)
$pageName = basename(__FILE__, ".php");

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