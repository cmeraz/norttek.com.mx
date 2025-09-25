<?php
/**
 * Página de Alarmas Inteligentes
 */
$seo = [
    'title'       => 'Alarmas Inteligentes | Norttek Solutions',
    'description' => 'Alarmas para casa y negocio con monitoreo, sensores inteligentes y notificaciones en tiempo real. Protege lo que más importa.',
    'keywords'    => 'alarmas, seguridad, sensores, monitoreo, Norttek',
    'robots'      => 'index, follow',
    'og_url'      => 'https://www.norttek.com.mx/alarma',
    'og_image'    => 'https://www.norttek.com.mx/assets/img/webpage.png'
];
$seo['og_title']        = $seo['og_title']        ?? $seo['title'];
$seo['og_description']  = $seo['og_description']  ?? $seo['description'];
$seo['twitter_title']   = $seo['twitter_title']   ?? $seo['title'];
$seo['twitter_description'] = $seo['twitter_description'] ?? $seo['description'];
$seo['twitter_image']   = $seo['twitter_image']   ?? $seo['og_image'];

$pageName = basename(__FILE__, ".php");
$cssFiles = ['alarma'];
$jsFiles  = ['alarma'];

include __DIR__ . '/includes/pageTemplate.php';
?>