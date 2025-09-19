<?php
/**
 * index.php
 * Página de inicio de Norttek Solutions
 */

$seo = [
    // SEO básico
    'title'       => 'Index Solutions - Seguridad Integral para tu Hogar y Oficina',
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

// 1️⃣ Determinar nombre de la página
$pageName = basename(__FILE__, ".php");

// 3️⃣ Archivos CSS extra para esta página
$cssFiles = ['']; // Si quieres cargar más, agregar al array

// 4️⃣ Archivos JS extra para esta página (opcional)
$jsFiles = ['home'];

// 5️⃣ Incluir plantilla base
include __DIR__ . '/includes/pageTemplate.php';
?>
