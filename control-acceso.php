<?php
/**
 * Página de Control de Acceso
 */
$seo = [
    'title'       => 'Control de Acceso | Norttek Solutions',
    'description' => 'Soluciones de control de acceso para empresas, oficinas y residencias. Seguridad, biometría, tarjetas y gestión inteligente de entradas.',
    'keywords'    => 'control de acceso, biometría, tarjetas, seguridad, Norttek',
    'robots'      => 'index, follow',
    'og_url'      => 'https://www.norttek.com.mx/control-acceso',
    'og_image'    => 'https://www.norttek.com.mx/assets/img/webpage.png'
];
$seo['og_title']        = $seo['og_title']        ?? $seo['title'];
$seo['og_description']  = $seo['og_description']  ?? $seo['description'];
$seo['twitter_title']   = $seo['twitter_title']   ?? $seo['title'];
$seo['twitter_description'] = $seo['twitter_description'] ?? $seo['description'];
$seo['twitter_image']   = $seo['twitter_image']   ?? $seo['og_image'];

$pageName = basename(__FILE__, ".php");
$cssFiles = ['control-acceso'];
$jsFiles  = ['control-acceso'];

include __DIR__ . '/includes/pageTemplate.php';
?>