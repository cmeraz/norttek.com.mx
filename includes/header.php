<?php
/**
 * header.php
 * Header dinámico que configura el SEO, CSS, meta robots y scripts para cada página.
 * Usa variables globales:
 *   $pageName -> nombre de la página actual (sin extensión .php)
 *   $cssFiles -> array de archivos CSS adicionales por página
 *   $seo      -> array con datos de SEO (title, description, keywords, robots, Open Graph, Twitter Card)
 */

// Muestra todos los errores (solo para desarrollo, quitar en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Determina el nombre de la página si no se ha definido previamente
$pageName = $pageName ?? basename($_SERVER['PHP_SELF'], ".php");

// Valores por defecto para SEO
$defaults = [
    'title' => 'Norttek Solutions',
    'description' => 'Soluciones de seguridad integral para empresas y hogares.',
    'keywords' => 'CCTV, alarmas, control de acceso, redes, automatización',
    'robots' => 'index, follow',
    'og_title' => null,
    'og_description' => null,
    'og_url' => 'https://www.norttek.com.mx/',
    'og_image' => 'https://www.norttek.com.mx/assets/images/og-image.jpg',
    'twitter_title' => null,
    'twitter_description' => null,
    'twitter_image' => 'https://www.norttek.com.mx/assets/images/og-image.jpg'
];

// Mezcla los valores definidos con los defaults
$seo = array_merge($defaults, $seo ?? []);

// Hereda valores generales si OG/Twitter no están definidos
$seo['og_title'] = $seo['og_title'] ?? $seo['title'];
$seo['og_description'] = $seo['og_description'] ?? $seo['description'];
$seo['twitter_title'] = $seo['twitter_title'] ?? $seo['title'];
$seo['twitter_description'] = $seo['twitter_description'] ?? $seo['description'];

// Inicializa arrays si no existen
$cssFiles = $cssFiles ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($seo['title']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($seo['keywords']) ?>">
    <meta name="robots" content="<?= htmlspecialchars($seo['robots']) ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?= htmlspecialchars($seo['og_title']) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seo['og_description']) ?>">
    <meta property="og:url" content="<?= htmlspecialchars($seo['og_url']) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og_image']) ?>">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['twitter_title']) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['twitter_description']) ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['twitter_image']) ?>">

    <!-- Favicon, CSS, etc... -->
    <?php
    // Carga CSS extra si corresponde
    if (!empty($cssFiles) && is_array($cssFiles)) {
        foreach ($cssFiles as $css) {
            $cssPath = 'assets/css/' . $css . '.css';
            if (file_exists(__DIR__ . '/../' . $cssPath)) {
                echo "<link rel='stylesheet' href='/$cssPath'>\n";
            }
        }
    }
    ?>

    <!-- Mantener estilos externos/globales si aplican -->
    <link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Reconectar la lógica del loader desde el archivo externo (restaura la animación y la muestra de main-content) -->
    <script src="assets/js/loader.js"></script>
</head>
<body>

<!-- Preload de imagen de fondo (oculto inicialmente) -->
<img id="preload-bg" src="assets/img/loader.jpg" style="display:none;">

<!-- Loader inicial de la página -->
<div id="loader">
    <div class="loader-content">
        <img src="assets/img/logo-norttek.png" alt="Logo Norttek" class="company-logo">
        <div class="spinner"></div>
        <div class="progress-bar">
            <div class="progress-fill"></div>
        </div>
        <div class="progress-text">0%</div>
    </div>
</div>

<!-- NOTA: se eliminó el script inline conflictivo que solo ocultaba el loader sin manejar main-content -->