<?php
/**
 * template.php
 * Plantilla base para todas las páginas del sitio
 */

// SEO de la página: título, descripción, palabras clave y metas para redes sociales
$seo = [
    'title'       => 'Index Solutions - Seguridad Integral para tu Hogar y Oficina',
    'description' => 'Norttek Solutions ofrece instalación profesional de CCTV, alarmas inteligentes, control de acceso, redes y cableado estructurado.',
    'keywords'    => 'Seguridad, CCTV, Alarmas, Control de acceso, Redes, Automatización, Norttek, Oficina, Hogar, Empresas',
    'robots'      => 'index, follow',
    'og_title'       => 'Norttek Solutions - Inicio',
    'og_description' => 'Protege tu hogar y empresa con soluciones integrales de seguridad de Norttek.',
    'og_url'         => 'https://www.norttek.com.mx/',
    'og_image'       => 'https://www.norttek.com.mx/assets/images/og-image.jpg',
    'twitter_title'       => 'Norttek Solutions - Inicio',
    'twitter_description' => 'Protege tu hogar y empresa con soluciones integrales de seguridad de Norttek.',
    'twitter_image'       => 'https://www.norttek.com.mx/assets/images/og-image.jpg'
];

// Nombre de la página, usado para personalizar o detectar la vista
$pageName = basename(__FILE__, ".php");

// CSS y JS específicos de esta página
$cssFiles = ['']; // Array vacío si no hay CSS extra
$jsFiles  = ['home']; // JS extra que se cargará solo en esta página

// Incluir la plantilla base, que carga header, footer, CSS/JS y usa $seo
include __DIR__ . '/includes/pageTemplate.php';
?>
