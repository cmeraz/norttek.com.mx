<?php
header('Content-Type: text/html; charset=UTF-8');
/**
 * header.php
 * Header dinámico que configura el SEO, CSS, meta robots y scripts para cada página.
 * Usa variables globales:
 *   $pageName -> nombre de la página actual (sin extensión .php)
 *   $cssFiles -> array de archivos CSS adicionales por página
 *   $seo      -> array con datos de SEO (title, description, keywords, robots, Open Graph, Twitter Card)
 */

// Determina el nombre de la página si no se ha definido previamente
$pageName = $pageName ?? basename($_SERVER['PHP_SELF'], ".php");

// Inicializa arrays si no existen
$cssFiles = $cssFiles ?? [];
$seo = $seo ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Título de la página -->
<title><?= $seo['title'] ?? 'Norttek Solutions' ?></title>

<!-- Meta descripción y palabras clave -->
<meta name="description" content="<?= $seo['description'] ?? 'Soluciones de seguridad integral para empresas y hogares.' ?>">
<meta name="keywords" content="<?= $seo['keywords'] ?? 'CCTV, alarmas, control de acceso, redes, automatización' ?>">

<!-- Meta robots para controlar indexación y seguimiento -->
<meta name="robots" content="<?= $seo['robots'] ?? 'index, follow' ?>">

<!-- URL canonical para evitar contenido duplicado -->
<link rel="canonical" href="https://www.norttek.com.mx/<?= $pageName ?>.php">

<!-- Favicon -->
<link rel="shortcut icon" href="assets/img/favicon-32x32.png" type="image/png">

<!-- CSS global -->
<link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">
<link href="assets/css/loader.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- CSS específicos por página -->
<?php
foreach($cssFiles as $css){
    // Construye la ruta de cada archivo CSS
    $cssFile = "$css.css"; 
    $cssPathServer = __DIR__ . "/../assets/css/$cssFile"; // Ruta del servidor
    $cssPathBrowser = "assets/css/$cssFile";             // Ruta para el navegador
    if(file_exists($cssPathServer)){
        echo "<link rel='stylesheet' href='$cssPathBrowser'>\n";
    }
}

// CSS automático según el nombre de la página
$autoCssFile = "$pageName.css";
$autoCssPathServer = __DIR__ . "/../assets/css/$autoCssFile";
$autoCssPathBrowser = "assets/css/$autoCssFile";
if(file_exists($autoCssPathServer)){
    echo "<link rel='stylesheet' href='$autoCssPathBrowser'>\n";
}
?>

<!-- Open Graph (para compartir en redes sociales) -->
<meta property="og:title" content="<?= $seo['og_title'] ?? $seo['title'] ?>">
<meta property="og:description" content="<?= $seo['og_description'] ?? $seo['description'] ?>">
<meta property="og:url" content="<?= $seo['og_url'] ?? 'https://www.norttek.com.mx/' ?>">
<meta property="og:image" content="<?= $seo['og_image'] ?? 'https://www.norttek.com.mx/assets/img/webpage.png' ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Norttek Solutions">
<meta property="og:locale" content="es_MX">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= $seo['twitter_title'] ?? $seo['title'] ?>">
<meta name="twitter:description" content="<?= $seo['twitter_description'] ?? $seo['description'] ?>">
<meta name="twitter:image" content="<?= $seo['twitter_image'] ?? $seo['og_image'] ?>">

<!-- Librerías externas -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- Scripts generales -->
<script src="https://unpkg.com/feather-icons"></script>
<script src="assets/js/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js"></script>

<?php if (!empty($externalJsHead)): ?>
    <?php foreach ($externalJsHead as $src): ?>
        <script src="<?= htmlspecialchars($src) ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
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
