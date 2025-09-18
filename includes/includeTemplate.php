<?php
/**
 * includeTemplate.php
 * Función para incluir templates pasando variables y con valores por defecto
 */

function includeTemplate($templateName, $variables = []) {
    $file = __DIR__ . "/$templateName.php";

    // Valores por defecto
    $defaults = [
        'seo' => [
            'title' => 'Norttek Solutions',
            'description' => 'Soluciones de seguridad integral para empresas y hogares.',
            'keywords' => 'CCTV, alarmas, control de acceso, redes, automatización',
            'og_title' => 'Norttek Solutions',
            'og_description' => 'Seguridad confiable para tu hogar y oficina.',
            'og_url' => 'https://www.norttek.com.mx/',
            'og_image' => 'https://www.norttek.com.mx/assets/images/og-image.jpg',
            'twitter_title' => 'Norttek Solutions',
            'twitter_description' => 'Seguridad confiable para tu hogar y oficina.',
            'twitter_image' => 'https://www.norttek.com.mx/assets/images/og-image.jpg'
        ],
        'pageName' => basename($_SERVER['PHP_SELF'], ".php"),
        'cssFiles' => []
    ];

    // Mezcla variables enviadas con defaults
    $variables = array_merge($defaults, $variables);

    // Convierte elementos del array en variables locales
    extract($variables);

    if(file_exists($file)) {
        include $file;
    } else {
        echo "<!-- Template $templateName not found -->";
    }
}
?>
