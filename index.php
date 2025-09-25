<?php
/**
 * index.php
 * Página principal de Norttek Solutions
 *
 * Basado en template.php y optimizado para SEO.
 */

// --------------- SEO PRINCIPAL ---------------
$seo = [
    'title'       => 'Norttek Solutions | Seguridad, Automatización y Tecnología para Hogar y Empresa',
    'description' => 'Especialistas en instalación de CCTV, alarmas inteligentes, control de acceso, redes, cableado estructurado y automatización. Soluciones integrales para proteger y modernizar tu hogar, oficina o negocio en Chihuahua y todo México.',
    'keywords'    => 'seguridad, cctv, alarmas, automatización, control de acceso, redes, cableado estructurado, tecnología, Norttek Solutions, hogar, empresa, oficina, Chihuahua, México',
    'robots'      => 'index, follow',
    'og_url'      => 'https://www.norttek.com.mx/',
    'og_image'    => 'https://www.norttek.com.mx/assets/img/webpage.png'
];

// ----------- HERENCIA AUTOMÁTICA PARA OG Y TWITTER -----------
$seo['og_title']        = $seo['og_title']        ?? $seo['title'];
$seo['og_description']  = $seo['og_description']  ?? $seo['description'];
$seo['twitter_title']   = $seo['twitter_title']   ?? $seo['title'];
$seo['twitter_description'] = $seo['twitter_description'] ?? $seo['description'];
$seo['twitter_image']   = $seo['twitter_image']   ?? $seo['og_image'];

// --------------- NOMBRE DE LA PÁGINA ---------------
$pageName = basename(__FILE__, ".php");

// --------------- ASSETS ESPECÍFICOS POR PÁGINA ---------------
$cssFiles = ['servicios']; // CSS específico para sección servicios/FAQ separado de plantilla
$jsFiles  = ['home','servicios']; // JS principal + lógica de anclas/FAQ

// --------------- INCLUYE LA PLANTILLA BASE DEL SITIO ---------------
include __DIR__ . '/includes/pageTemplate.php';
?>
