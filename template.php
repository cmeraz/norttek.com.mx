<?php
/**
 * template.php
 * Plantilla base para todas las páginas del sitio
 */

// SEO de la página: título, descripción, palabras clave y metas para redes sociales
$seo = [
    'title'       => 'Norttek Solutions - Seguridad Integral para tu Hogar y Oficina',
    'description' => 'Norttek Solutions ofrece instalación profesional de CCTV, alarmas inteligentes, control de acceso, redes y cableado estructurado.',
    'keywords'    => 'Seguridad, CCTV, Alarmas, Control de acceso, Redes, Automatización, Norttek, Oficina, Hogar, Empresas',
    'robots'      => 'index, follow',
    // Open Graph y Twitter: solo define si quieres sobrescribir, si no, se heredan
    'og_url'      => 'https://www.norttek.com.mx/',
    'og_image'    => 'https://www.norttek.com.mx/assets/images/og-image.jpg',
    'twitter_image' => 'https://www.norttek.com.mx/assets/images/og-image.jpg'
];

// Nombre de la página, usado para personalizar o detectar la vista
$pageName = basename(__FILE__, ".php");

// CSS y JS específicos de esta página
$cssFiles = [];
$jsFiles  = [];

// Incluir la plantilla base, que carga header, footer, CSS/JS y usa $seo
include __DIR__ . '/includes/pageTemplate.php';
?>
