<?php
/**
 * header.php
 * Header dinámico que abre html, head y body
 * Incluye CSS locales, CSS por página y librerías CDN
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Norttek Solutions - <?php echo isset($pageTitle) ? $pageTitle : "Bienvenido"; ?></title>

    <!-- Meta descripción dinámica (opcionalmente se puede variar por página) -->
    <meta name="description" content="Seguridad empresarial completa: instalación de CCTV, alarmas y control de accesos, y papelería para empresas y oficinas con entrega confiable a domicilio.">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!-- CSS principal -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Open Graph Meta Tags para Facebook y WhatsApp -->
    <meta property="og:title" content="Norttek Solutions - Seguridad y Servicios Empresariales">
    <meta property="og:description" content="Seguridad empresarial completa: instalación de CCTV, alarmas y control de accesos, y papelería para empresas y oficinas con entrega confiable a domicilio.">
    <meta property="og:url" content="https://www.norttek.com.mx/">
    <meta property="og:image" content="https://www.norttek.com.mx/assets/images/og-image.jpg">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Norttek Solutions">
    <meta property="og:locale" content="es_MX">

    <!-- Twitter Card (opcional, si quieres compartir también en Twitter) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Norttek Solutions - Seguridad y Servicios Empresariales">
    <meta name="twitter:description" content="Seguridad empresarial completa: instalación de CCTV, alarmas y control de accesos, y papelería para empresas y oficinas con entrega confiable a domicilio.">
    <meta name="twitter:image" content="https://www.norttek.com.mx/assets/images/og-image.jpg">

    <!-- CSS locales -->
    <?php
    if(isset($cssFiles) && is_array($cssFiles)){
        foreach($cssFiles as $css){
            $cssPathServer = __DIR__ . "/../assets/css/$css";
            $cssPathBrowser = "assets/css/$css";
            if(file_exists($cssPathServer)){
                echo "<link rel='stylesheet' href='$cssPathBrowser'>\n";
            } else {
                echo "<!-- CSS $cssPathBrowser no encontrado -->\n";
            }
        }
    }

    // CSS automático por nombre de página
    $pageName = basename($_SERVER['PHP_SELF'], ".php");
    $autoCssPathServer = __DIR__ . "/../assets/css/$pageName.css";
    $autoCssPathBrowser = "assets/css/$pageName.css";

    if(file_exists($autoCssPathServer)){
        echo "<link rel='stylesheet' href='$autoCssPathBrowser'>\n";
    } else {
        echo "<!-- CSS automático $autoCssPathBrowser no encontrado -->\n";
    }
    ?>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets//imgfavicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">    

    <!-- CSS desde CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


    <!-- Feather Icons -->
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