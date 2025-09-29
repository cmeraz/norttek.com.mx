<?php
$pageName = basename(__FILE__, ".php");

// SEO para página de privacidad
$seo = [
    'title' => 'Aviso de Privacidad - Norttek Solutions',
    'description' => 'Aviso de privacidad de Norttek Solutions. Cómo protegemos y utilizamos sus datos personales conforme a la LFPDPPP.',
    'keywords' => 'aviso de privacidad, datos personales, LFPDPPP, protección de datos, norttek',
    'robots' => 'index, follow',
    'og_title' => 'Aviso de Privacidad - Norttek Solutions',
    'og_description' => 'Conoce cómo protegemos tus datos personales conforme a la ley mexicana.',
    'og_url' => 'https://www.norttek.com.mx/privacidad.php',
    'og_image' => 'https://www.norttek.com.mx/assets/img/logo-norttek.png'
];

include __DIR__ . '/includes/pageTemplate.php';
?>