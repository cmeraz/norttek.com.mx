<?php
/**
 * cartuchos.php
 * Página de catálogo de cartuchos de tóner HP y otras marcas para Norttek Solutions
 *
 * Cómo usar:
 * 1️⃣ El contenido principal está en contents/cartuchosContent.php.
 * 2️⃣ SEO y metas se definen aquí.
 * 3️⃣ Los assets (CSS/JS) se cargan automáticamente si agregas los archivos en assets/css/ y assets/js/ con el nombre 'cartuchos'.
 * 4️⃣ Incluye pageTemplate.php para cargar la estructura base.
 */

$seo = [
    'title'       => 'Catálogo de Cartuchos de Tóner HP y Compatibles | Norttek Solutions',
    'description' => 'Encuentra en segundos el cartucho o tambor correcto para tu impresora HP, Brother, Samsung, Xerox, Kyocera y más. Información confiable sobre compatibilidad y rendimiento.',
    'keywords'    => 'Cartuchos de tóner, HP, impresoras, consumibles, Norttek, Samsung, Brother, Xerox, Kyocera, cartuchos compatibles, tóner láser, impresoras láser',
    'robots'      => 'index, follow',

    // Open Graph
    'og_title'       => 'Catálogo de Cartuchos de Tóner HP y Compatibles | Norttek Solutions',
    'og_description' => 'Herramienta interactiva para encontrar el cartucho o tambor correcto, con información confiable sobre marcas, modelos y compatibilidad.',
    'og_url'         => 'https://www.norttek.com.mx/cartuchos',
    'og_image'       => 'https://www.norttek.com.mx/assets/img/webpage.png',

    // Twitter Card
    'twitter_title'       => 'Catálogo de Cartuchos de Tóner HP y Compatibles | Norttek Solutions',
    'twitter_description' => 'Encuentra el cartucho ideal para tu impresora en segundos con Norttek Solutions.',
    'twitter_image'       => 'https://www.norttek.com.mx/assets/img/webpage.png'
];


// Archivos CSS y JS específicos para esta página
$cssFiles = ['cartuchos'];
$jsFiles  = ['cartuchos'];

// Mueve esto ANTES del include:
$externalJsHead = [
    'https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js'
];

// Incluir plantilla base (header, navbar, contenido, footer)
include __DIR__ . '/includes/pageTemplate.php';
?>