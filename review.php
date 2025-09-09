<?php
// review.php

// URL final a la que se redirigirá al usuario
$redirect_url = "https://g.page/r/CX5aW7FJPwJCEBM/review"; // Cambia esto por tu enlace de reseña de Google

// Metadatos para compartir en redes
$meta_title = "¡Queremos conocer tu opinión sobre Norttek Solutions!";
$meta_description = "Tu experiencia es muy importante para nosotros. Déjanos una reseña rápida en Google y ayúdanos a mejorar nuestros servicios.";
$meta_image = "https://norttek.com.mx/assets/img/review.png"; // Imagen para compartir
$meta_url = "https://norttek.com.mx/review.php"; // URL de esta página
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($meta_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($meta_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($meta_image); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($meta_url); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="<?php echo htmlspecialchars($meta_title); ?>">
    <meta property="twitter:description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <meta property="twitter:image" content="<?php echo htmlspecialchars($meta_image); ?>">

    <meta http-equiv="refresh" content="0; url=<?php echo $redirect_url; ?>">
</head>
<body>
    <p>Redirigiendo a la reseña... <a href="<?php echo $redirect_url; ?>">Haz clic aquí si no se redirige automáticamente</a>.</p>
    <script>
        // Redirección inmediata con JS
        window.location.replace("<?php echo $redirect_url; ?>");
    </script>
</body>
</html>
