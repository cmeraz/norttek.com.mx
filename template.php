<?php
/**
 * template.php
 * Plantilla base para crear nuevas páginas en Norttek Solutions
 *
 * IMPORTANTE: Este es un archivo TEMPLATE/EJEMPLO para desarrolladores
 * 
 * Cómo usar:
 * 1️⃣ Copia este archivo y renómbralo como la página que quieras (ej: servicios.php).
 * 2️⃣ Cambia el contenido de $seo con los datos específicos de tu página.
 * 3️⃣ Modifica $pageName si necesitas un nombre diferente al del archivo.
 * 4️⃣ Agrega archivos CSS específicos en $cssFiles.
 * 5️⃣ Agrega archivos JS específicos en $jsFiles.
 * 6️⃣ Crea el archivo contents/{nombrePagina}Content.php con el contenido principal.
 * 7️⃣ Incluye pageTemplate.php para cargar la estructura base.
 */

// SEO de la página: título, descripción, palabras clave y metas para redes sociales
$seo = [
    'title'       => 'Norttek Solutions - Plantilla de Página',
    'description' => 'Archivo template para crear nuevas páginas en el sitio web de Norttek Solutions. Estructura modular y reutilizable.',
    'keywords'    => 'Plantilla, Template, Desarrollo, Norttek, PHP, Estructura',
    'robots'      => 'noindex, nofollow', // No indexar esta página template
    'og_title'       => 'Norttek Solutions - Plantilla de Página',
    'og_description' => 'Archivo template para desarrolladores del sitio web de Norttek Solutions.',
    'og_url'         => 'https://www.norttek.com.mx/template',
    'og_image'       => 'https://www.norttek.com.mx/assets/images/og-image.jpg',
    'twitter_title'       => 'Norttek Solutions - Plantilla de Página',
    'twitter_description' => 'Archivo template para desarrolladores del sitio web de Norttek Solutions.',
    'twitter_image'       => 'https://www.norttek.com.mx/assets/images/og-image.jpg'
];

// Nombre de la página, usado para personalizar o detectar la vista
$pageName = basename(__FILE__, ".php");

// CSS y JS específicos de esta página
$cssFiles = []; // Array de archivos CSS adicionales (sin extensión)
$jsFiles = [];  // Array de archivos JS adicionales (sin extensión)

// Incluir la plantilla base, que carga header, footer, CSS/JS y usa $seo
include __DIR__ . '/includes/pageTemplate.php';
?>
