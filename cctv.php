<?php
/**
 * Página de CCTV - Videovigilancia
 */
$seo = [
    'title'       => 'CCTV y Videovigilancia | Norttek Solutions',
    'description' => 'Instalación profesional de cámaras de seguridad, monitoreo remoto y sistemas de videovigilancia para empresas y hogares en México.',
    'keywords'    => 'CCTV, cámaras de seguridad, videovigilancia, monitoreo, Norttek',
    'robots'      => 'index, follow',
    'og_url'      => 'https://www.norttek.com.mx/cctv',
    'og_image'    => 'https://www.norttek.com.mx/assets/images/og-cctv.jpg'
];
$seo['og_title']        = $seo['og_title']        ?? $seo['title'];
$seo['og_description']  = $seo['og_description']  ?? $seo['description'];
$seo['twitter_title']   = $seo['twitter_title']   ?? $seo['title'];
$seo['twitter_description'] = $seo['twitter_description'] ?? $seo['description'];
$seo['twitter_image']   = $seo['twitter_image']   ?? $seo['og_image'];

$pageName = basename(__FILE__, ".php");
$cssFiles = ['cctv'];
$jsFiles  = ['cctv'];

include __DIR__ . '/includes/pageTemplate.php';
?>

