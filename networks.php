<?php
/**
 * Página de Redes y Cableado Estructurado
 */
$seo = [
    'title'       => 'Redes y Cableado Estructurado | Norttek Solutions',
    'description' => 'Diseño, instalación y soporte de redes empresariales, cableado estructurado, WiFi profesional y soluciones de conectividad para tu empresa u hogar.',
    'keywords'    => 'redes, cableado estructurado, wifi, conectividad, Norttek, instalación de redes',
    'robots'      => 'index, follow',
    'og_url'      => 'https://www.norttek.com.mx/networks',
    'og_image'    => 'https://www.norttek.com.mx/assets/img/webpage.png'
];
$seo['og_title']        = $seo['og_title']        ?? $seo['title'];
$seo['og_description']  = $seo['og_description']  ?? $seo['description'];
$seo['twitter_title']   = $seo['twitter_title']   ?? $seo['title'];
$seo['twitter_description'] = $seo['twitter_description'] ?? $seo['description'];
$seo['twitter_image']   = $seo['twitter_image']   ?? $seo['og_image'];

$pageName = basename(__FILE__, ".php");
$cssFiles = ['networks'];
$jsFiles  = ['networks'];

include __DIR__ . '/includes/pageTemplate.php';
?>