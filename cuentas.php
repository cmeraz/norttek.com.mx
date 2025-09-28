<?php
$pageName = basename(__FILE__, ".php");

// SEO - Página privada, no indexar
$seo = [
    'title' => 'Cuentas de Pago - Norttek Solutions',
    'description' => 'Panel privado de cuentas de pago y datos empresariales',
    'keywords' => 'norttek, cuentas, pago, privado',
    'robots' => 'noindex, nofollow, noarchive, nosnippet',
    'og_title' => 'Cuentas de Pago - Norttek Solutions',
    'og_description' => 'Panel privado de información empresarial',
    'og_url' => 'https://www.norttek.com.mx/cuentas.php',
    'og_image' => 'https://www.norttek.com.mx/assets/img/logo-norttek.png'
];

// CSS específicos
$cssFiles = ['cuentas'];

// JS específicos  
$jsFiles = ['cuentas'];

include __DIR__ . '/includes/pageTemplate.php';
?>