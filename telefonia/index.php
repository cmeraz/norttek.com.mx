<?php
// Página modular Telefonía IP - Ubicación: /telefonia/index.php
$pageName = 'telefonia';
$seo = [
  'title' => 'Telefonía IP Empresarial - Sistema PBX en la Nube | Norttek Solutions',
  'description' => 'Transforma tu comunicación empresarial con telefonía IP. Extensiones virtuales, grabación de llamadas, IVR y reportes desde cualquier dispositivo. Prueba gratuita 30 días.',
  'keywords' => 'Telefonía IP, PBX en la nube, extensiones virtuales, VoIP, sistema telefónico empresarial, comunicaciones unificadas, Norttek',
  'og_title' => 'Telefonía IP Empresarial - Sistema PBX en la Nube | Norttek Solutions',
  'og_description' => 'Revolutiona tu comunicación empresarial con telefonía IP: extensiones desde cualquier lugar, grabación de llamadas e IVR profesional.',
  'og_url' => 'https://www.norttek.com.mx/telefonia',
  'og_image' => 'https://www.norttek.com.mx/assets/img/business-benefits-phone.jpg',
  'twitter_title' => 'Telefonía IP Empresarial - Sistema PBX en la Nube',
  'twitter_description' => 'Transforma tu comunicación empresarial con telefonía IP profesional desde cualquier dispositivo.',
  'twitter_image' => 'https://www.norttek.com.mx/assets/img/business-benefits-phone.jpg'
];

// CSS y JS - usar archivos locales de telefonia
$cssFiles = [];
$jsFiles  = [];

// Cargar funciones y preparar includes
include __DIR__ . '/../includes/functions.php';

// 1️⃣ Cargar header y navbar
includeSection('header', ['seo' => $seo, 'pageName' => $pageName, 'cssFiles' => $cssFiles]);
?>
<!-- CSS específico de telefonía desde su carpeta local -->
<link rel="stylesheet" href="telefonia/assets/css/telefonia.css">
<?php
includeSection('navbar');

// 2️⃣ Cargar contenido desde /telefonia/contents/
echo '<main id="main-content" class="nt-main-shell">' . PHP_EOL;
$contentFile = __DIR__ . '/contents/telefoniaContent.php';
if(file_exists($contentFile)){
    include $contentFile;
} else {
    echo "<p>Contenido no disponible para esta página.</p>";
}
echo "</main>";

// 3️⃣ Cargar footer
includeSection('footer');

// 4️⃣ JS desde /telefonia/assets/js/
?>
<script src="telefonia/assets/js/telefonia.js" defer></script>

