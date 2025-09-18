<?php
/**
 * header.php
 * Header dinámico que usa variables SEO, CSS y nombre de página
 */

$pageName = $pageName ?? basename($_SERVER['PHP_SELF'], ".php");
$cssFiles = $cssFiles ?? [];
$seo = $seo ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= $seo['title'] ?? 'Norttek Solutions' ?></title>
<meta name="description" content="<?= $seo['description'] ?? 'Soluciones de seguridad integral para empresas y hogares.' ?>">
<meta name="keywords" content="<?= $seo['keywords'] ?? 'CCTV, alarmas, control de acceso, redes, automatización' ?>">

<link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

<!-- CSS global -->
<link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">
<link href="assets/css/loader.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- CSS específicos por página -->
<?php
foreach($cssFiles as $css){
    $cssFile = "$css.css"; // Agregar extensión automáticamente
    $cssPathServer = __DIR__ . "/../assets/css/$cssFile";
    $cssPathBrowser = "assets/css/$cssFile";
    if(file_exists($cssPathServer)){
        echo "<link rel='stylesheet' href='$cssPathBrowser'>\n";
    }
}

// CSS automático por página según $pageName
$autoCssFile = "$pageName.css";
$autoCssPathServer = __DIR__ . "/../assets/css/$autoCssFile";
$autoCssPathBrowser = "assets/css/$autoCssFile";
if(file_exists($autoCssPathServer)){
    echo "<link rel='stylesheet' href='$autoCssPathBrowser'>\n";
}
?>


<!-- Open Graph -->
<meta property="og:title" content="<?= $seo['og_title'] ?? $seo['title'] ?>">
<meta property="og:description" content="<?= $seo['og_description'] ?? $seo['description'] ?>">
<meta property="og:url" content="<?= $seo['og_url'] ?? 'https://www.norttek.com.mx/' ?>">
<meta property="og:image" content="<?= $seo['og_image'] ?? 'https://www.norttek.com.mx/assets/images/og-image.jpg' ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Norttek Solutions">
<meta property="og:locale" content="es_MX">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= $seo['twitter_title'] ?? $seo['title'] ?>">
<meta name="twitter:description" content="<?= $seo['twitter_description'] ?? $seo['description'] ?>">


<!-- Librerías externas -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<script src="https://unpkg.com/feather-icons"></script>
<script src="assets/js/loader.js"></script>
</head>
<body>
<img id="preload-bg" src="assets/img/loader.jpg" style="display:none;">
<!-- Loader -->
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
