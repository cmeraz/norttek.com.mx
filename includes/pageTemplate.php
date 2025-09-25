<?php
/**
 * pageTemplate.php
 * Plantilla base modular
 */

include __DIR__ . '/functions.php';

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
    'og_image' => 'https://www.norttek.com.mx/assets/img/webpage.png',
        'twitter_title' => 'Norttek Solutions',
        'twitter_description' => 'Seguridad confiable para tu hogar y oficina.',
    'twitter_image' => 'https://www.norttek.com.mx/assets/img/webpage.png'
    ];
}

// CSS extra específico por página (opcional)
$cssFiles = $cssFiles ?? [];

// 1️⃣ Cargar header y navbar
includeSection('header', ['seo' => $seo, 'pageName' => $pageName, 'cssFiles' => $cssFiles]);
includeSection('navbar');

// 2️⃣ Alert de construcción (solo se muestra si la variable está definida)
if (!empty($showConstructionAlert)) {
    echo '<div class="w-full bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 px-4 py-3 text-sm mb-4">';
    echo 'Sitio en construcción';
    echo '</div>';
}

// 3️⃣ Determinar archivo de contenido
$contentFile = __DIR__ . '/../contents/' . $pageName . 'Content.php';
// Offset superior para no quedar oculto tras navbar fijo
echo '<main id="main-content" class="nt-main-shell">' . PHP_EOL;
if(file_exists($contentFile)){
    include $contentFile;
} else {
    echo "<p>Contenido no disponible para esta página.</p>";
}
echo "</main>";

// 4️⃣ Cargar footer
includeSection('footer');

/* // 5️⃣ JS extra específico por página
$scriptFiles = $scriptFiles ?? [];
if(!empty($scriptFiles) && is_array($scriptFiles)){
    foreach($scriptFiles as $js){
        $jsPathServer = __DIR__ . '/../assets/js/' . $js;
        $jsPathBrowser = 'assets/js/' . $js;
        if(file_exists($jsPathServer)){
            echo "<script src='$jsPathBrowser'></script>\n";
        }
    }
} */

// 5️⃣ JS específicos declarados ($jsFiles) + autoload por nombre de página
if(!isset($jsFiles)) { $jsFiles = []; }
if(is_array($jsFiles)){
    foreach($jsFiles as $js){
        $js = basename($js);
        $jsServer = __DIR__ . '/../assets/js/' . $js . '.js';
        $jsBrowser = 'assets/js/' . $js . '.js';
        if(file_exists($jsServer)) echo "<script src='$jsBrowser' defer></script>\n";
    }
}
// Autoload según pageName si existe un JS homónimo
$autoJsServer = __DIR__ . '/../assets/js/' . $pageName . '.js';
if(file_exists($autoJsServer)){
    $autoJsBrowser = 'assets/js/' . $pageName . '.js';
    echo "<script src='$autoJsBrowser' defer></script>\n";
}

// 6️⃣ Scripts adicionales desde extra/scripts (PHP que genera JS inline si aplica)
$extraScriptFile = __DIR__ . '/../extra/scripts/' . $pageName . '.php';
if(file_exists($extraScriptFile)){
    include $extraScriptFile;
}

// 7️⃣ Scripts externos que el desarrollador solicitó para el head (ya impresos allí si existían)
?>
