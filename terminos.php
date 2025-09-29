<?php
$pageName = basename(__FILE__, ".php");

// SEO para página de términos
$seo = [
    'title' => 'Términos de Uso - Norttek Solutions',
    'description' => 'Términos y condiciones de uso de los servicios de Norttek Solutions. Políticas de servicio, garantías y responsabilidades.',
    'keywords' => 'términos de uso, condiciones, políticas, norttek, seguridad, CCTV',
    'robots' => 'index, follow',
    'og_title' => 'Términos de Uso - Norttek Solutions',
    'og_description' => 'Términos y condiciones de uso de nuestros servicios de seguridad.',
    'og_url' => 'https://www.norttek.com.mx/terminos.php',
    'og_image' => 'https://www.norttek.com.mx/assets/img/logo-norttek.png'
];

include __DIR__ . '/includes/pageTemplate.php';
?>