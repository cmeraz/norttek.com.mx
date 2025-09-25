<?php
/**
 * contact.php
 * Página de contacto creativa para Norttek Solutions
 *
 * USO:
 * 1️⃣ Edita el array $seo con los datos específicos de tu página.
 * 2️⃣ Agrega archivos CSS/JS específicos en $cssFiles y $jsFiles (sin extensión).
 * 3️⃣ Crea el archivo contents/contactContent.php con el contenido principal.
 * 4️⃣ Incluye pageTemplate.php para cargar la estructura base y los assets.
 */

// --------------- SEO PRINCIPAL (solo escribe una vez cada dato) ---------------
$seo = [
    'title'       => 'Contacto | Norttek Solutions',
    'description' => '¿Listo para transformar tu seguridad y tecnología? Contáctanos y recibe asesoría personalizada de Norttek Solutions. ¡Hablemos de tu proyecto!',
    'keywords'    => 'Contacto, Norttek, asesoría, seguridad, automatización, cotización, soporte',
    'robots'      => 'index, follow',
    'og_url'      => 'https://www.norttek.com.mx/contact',
    'og_image'    => 'https://www.norttek.com.mx/assets/img/webpage.png'
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
$cssFiles = ['contact']; // Ejemplo: ['servicios', 'custom']
$jsFiles  = ['contact']; // Ejemplo: ['servicios']

// --------------- INCLUYE LA PLANTILLA BASE DEL SITIO ---------------
include __DIR__ . '/includes/pageTemplate.php';
?>
