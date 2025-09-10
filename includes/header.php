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

    <!-- CSS desde CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    

</head>
<body>
