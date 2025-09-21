<?php
/**
 * about.php
 * Página "Nosotros" de Norttek Solutions
 *
 * USO:
 * 1️⃣ Copia este archivo y renómbralo como la página que quieras (ej: servicios.php).
 * 2️⃣ Edita el array $seo con los datos específicos de tu página.
 * 3️⃣ Si necesitas un nombre de página diferente, cambia $pageName.
 * 4️⃣ Agrega archivos CSS/JS específicos en $cssFiles y $jsFiles (sin extensión).
 * 5️⃣ Crea el archivo contents/{nombrePagina}Content.php con el contenido principal.
 * 6️⃣ Incluye pageTemplate.php para cargar la estructura base y los assets.
 *
 * NOTA: Las metas Open Graph y Twitter Card se heredan automáticamente de los valores principales.
 */

// --------------- SEO PRINCIPAL (solo escribe una vez cada dato) ---------------
$seo = [
    'title'       => 'Nosotros - Norttek Solutions',
    'description' => 'Conoce la historia, misión y valores de Norttek Solutions. Somos expertos en soluciones de seguridad, automatización y tecnología para empresas y hogares en México.',
    'keywords'    => 'Nosotros, Norttek, historia, misión, valores, seguridad, automatización, tecnología',
    'robots'      => 'index, follow',
    'og_url'      => 'https://www.norttek.com.mx/about',
    'og_image'    => 'https://www.norttek.com.mx/assets/images/og-image.jpg'
];

// ----------- HERENCIA AUTOMÁTICA PARA OG Y TWITTER (no repitas datos) -----------
$seo['og_title']        = $seo['og_title']        ?? $seo['title'];
$seo['og_description']  = $seo['og_description']  ?? $seo['description'];
$seo['twitter_title']   = $seo['twitter_title']   ?? $seo['title'];
$seo['twitter_description'] = $seo['twitter_description'] ?? $seo['description'];
$seo['twitter_image']   = $seo['twitter_image']   ?? $seo['og_image'];

// --------------- NOMBRE DE LA PÁGINA (para assets y contenido) ---------------
$pageName = basename(__FILE__, ".php"); // Usado para cargar contenido y assets automáticamente

// --------------- ASSETS ESPECÍFICOS POR PÁGINA (opcional) ---------------
$cssFiles = ['about']; // Ejemplo: ['servicios', 'custom']
$jsFiles  = ['about']; // Ejemplo: ['servicios']

// --------------- INCLUYE LA PLANTILLA BASE DEL SITIO ---------------
include __DIR__ . '/includes/pageTemplate.php';
?>
