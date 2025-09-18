<?php
/**
 * pageTemplate.php
 * Plantilla base modular
 */

include __DIR__ . '/includeTemplate.php';

// Determinar nombre de la página
$pageName = basename($_SERVER['PHP_SELF'], ".php");

// Variables SEO por defecto
if (!isset($seo)) {
    $seo = [
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
    ];
}

// Cargar metas extra por página (si existe)
$metaExtraFile = __DIR__ . '/../extra/metas/' . $pageName . '.php';
if (file_exists($metaExtraFile)) {
    include $metaExtraFile; // Esto puede sobrescribir $seo
}

// CSS extra específico por página (opcional)
$cssFiles = $cssFiles ?? [];

// 1️⃣ Cargar header y navbar
includeTemplate('header', ['seo' => $seo, 'pageName' => $pageName, 'cssFiles' => $cssFiles]);
includeTemplate('navbar');

// 2️⃣ Determinar archivo de contenido
$contentFile = __DIR__ . '/../contents/' . $pageName . 'Content.php';
echo '<main id="main-content">' . PHP_EOL;
if(file_exists($contentFile)){
    include $contentFile;
} else {
    echo "<p>Contenido no disponible para esta página.</p>";
}
echo "</main>";

// 3️⃣ Cargar footer
includeTemplate('footer');

// 4️⃣ JS extra específico por página
$scriptFiles = $scriptFiles ?? [];
if(!empty($scriptFiles) && is_array($scriptFiles)){
    foreach($scriptFiles as $js){
        $jsPathServer = __DIR__ . '/../assets/js/' . $js;
        $jsPathBrowser = 'assets/js/' . $js;
        if(file_exists($jsPathServer)){
            echo "<script src='$jsPathBrowser'></script>\n";
        }
    }
}

// 5️⃣ Scripts adicionales desde extra/scripts
$extraScriptFile = __DIR__ . '/../extra/scripts/' . $pageName . '.php';
if(file_exists($extraScriptFile)){
    include $extraScriptFile;
}
?>
