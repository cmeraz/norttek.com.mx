<?php
// Lenguaje = Español
/**
 * Página: internet.php
 * Propósito: Punto de entrada de la vista "Internet". Declara el nombre base de la página,
 *            lista de hojas de estilo y scripts específicos y delega el render mediante
 *            el template genérico pageTemplate.php.
 *
 * Flujo de carga:
 *  1. Se obtiene $pageName para que el sistema de plantillas pueda auto–resolver
 *     el archivo de contenido en /contents/{pageName}Content.php -> internetContent.php
 *  2. Se definen arrays $cssFiles y $jsFiles con los nombres (sin extensión) para que
 *     el footer incluya automáticamente assets/css/internet.css y assets/js/internet.js
 *  3. Se incluye el template principal que arma <html>, <head>, header, navbar, contenido y footer.
 *
 * Variables expuestas a pageTemplate.php:
 *  - $pageName : string  (clave para cargar contenido y posibles metas dinámicas)
 *  - $cssFiles : string[] (lista de estilos específicos de la página)
 *  - $jsFiles  : string[] (lista de scripts específicos de la página)
 *
 * Notas de mantenimiento:
 *  - Si se requiere añadir más assets solo agregarlos a los arrays.
 *  - La lógica interactiva (planes, costos, modal, WhatsApp) vive en internet.js
 *  - El marcado estructural y semántico está en contents/internetContent.php
 */
$pageName = basename(__FILE__, '.php');       // "internet" (se usa para localizar el contenido)
$cssFiles = ['internet'];                     // Carga assets/css/internet.css
$jsFiles  = ['internet'];                     // Carga assets/js/internet.js
include __DIR__ . '/includes/pageTemplate.php'; // Render maestro (encabezado + contenido + pie)
<?php
$pageName = basename(__FILE__, '.php');
$cssFiles = ['internet'];
$jsFiles = ['internet'];
include __DIR__ . '/includes/pageTemplate.php';
