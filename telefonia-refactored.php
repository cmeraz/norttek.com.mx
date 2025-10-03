<?php
/**
 * telefonia-refactored.php
 * Página de Telefonía IP Empresarial con sistema Yeastar P-Series (Versión Refactorizada)
 */

// Nombre de la página
$pageName = basename(__FILE__, ".php");

// Assets específicos
$cssFiles = ['telefonia', 'telefonia-refactored'];

// SEO optimizado para Telefonía IP y Yeastar
$seo = [
    'title' => 'Telefonía IP Yeastar en la Nube - Comunicación Empresarial Moderna | Norttek',
    'description' => 'Descubre cómo el sistema Yeastar P-Series puede transformar tu empresa. Llamadas ilimitadas, extensiones móviles, sin hardware complicado. Demo gratis 30 días sin compromiso.',
    'keywords' => 'telefonía IP, PBX en la nube, telefonía empresarial, Yeastar, Yeastar P-Series, llamadas ilimitadas, extensiones móviles, VoIP, comunicaciones unificadas, IVR, Norttek',
    'robots' => 'index, follow',
    'og_url' => 'https://www.norttek.com.mx/telefonia-refactored',
    'og_title' => 'Telefonía IP Yeastar - Sistema PBX en la Nube',
    'og_description' => 'Sistema Yeastar P-Series: telefonía empresarial moderna con extensiones virtuales, IVR y reportes en tiempo real.',
    'og_image' => 'https://www.norttek.com.mx/assets/img/yeastar-hero.webp',
    'twitter_title' => 'Telefonía IP Yeastar - PBX en la Nube',
    'twitter_description' => 'Transforma tu comunicación empresarial con Yeastar P-Series. Demo gratis 30 días.',
    'twitter_image' => 'https://www.norttek.com.mx/assets/img/yeastar-hero.webp'
];

// Incluir plantilla base
include __DIR__ . '/includes/pageTemplate.php';
?>