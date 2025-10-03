<?php
/**
 * telefonia.php
 * Página de Telefonía IP Empresarial con sistema Yeastar P-Series
 */

// Nombre de la página
$pageName = 'telefonia';

// SEO optimizado para Telefonía IP y Yeastar
$seo = [
  'title' => 'Telefonía IP Empresarial Yeastar - Sistema PBX en la Nube | Norttek',
  'description' => 'Transforma tu comunicación empresarial con Yeastar P-Series. Sistema PBX en la nube con extensiones virtuales, grabación de llamadas, IVR y reportes en tiempo real. Prueba gratuita 30 días sin compromiso.',
  'keywords' => 'Telefonía IP, PBX en la nube, Yeastar, Yeastar P-Series, extensiones virtuales, VoIP, sistema telefónico empresarial, comunicaciones unificadas, IVR, grabación de llamadas, Norttek, PBX virtual',
  'robots' => 'index, follow',
  'og_title' => 'Telefonía IP Empresarial Yeastar - Sistema PBX en la Nube',
  'og_description' => 'Revoluciona tu comunicación empresarial con Yeastar P-Series: extensiones desde cualquier lugar, grabación de llamadas, IVR profesional y análisis en tiempo real. Demo gratis.',
  'og_url' => 'https://www.norttek.com.mx/telefonia',
  'og_image' => 'https://www.norttek.com.mx/assets/img/yeastar-hero.webp',
  'twitter_title' => 'Telefonía IP Empresarial Yeastar - PBX en la Nube',
  'twitter_description' => 'Sistema de comunicación empresarial Yeastar con extensiones virtuales, IVR y reportes desde cualquier dispositivo. Prueba gratis 30 días.',
  'twitter_image' => 'https://www.norttek.com.mx/assets/img/yeastar-hero.webp'
];

// Assets específicos
$cssFiles = ['telefonia-refactored'];
$jsFiles  = ['telefonia-refactored'];

// Incluir plantilla base
include __DIR__ . '/includes/pageTemplate.php';