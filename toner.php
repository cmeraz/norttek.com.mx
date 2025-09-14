<?php
// Título de la página (se usa en header)
$pageTitle = "Servicios - Norttek";

// Archivos CSS y JS adicionales (opcional)
$cssFiles  = ["style.css"];       // CSS global opcional
$jsFiles   = ["scripts.js"];       // JS global opcional

// Incluye la plantilla base
include 'includes/pageTemplate.php';

// ======================================
// Lógica PHP: Leer y procesar el JSON
// ======================================
$jsonFile = __DIR__ . '/includes/json/cartuchos.json';
$cartuchos = [];

if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $cartuchos = json_decode($jsonData, true);

    if ($cartuchos === null) {
        die("Error al decodificar el JSON.");
    }
} else {
    die("El archivo JSON no se encontró.");
}

// Función para generar el HTML de las impresoras compatibles
function impresorasList($impresoras) {
    $html = '<ul>';
    foreach ($impresoras as $impresora) {
        $html .= '<li>' . htmlspecialchars($impresora) . '</li>';
    }
    $html .= '</ul>';
    return $html;
}
?>

<!-- ======================================
     HTML: Tabla completa con encabezado
     ====================================== -->
<!-- Contenedor principal con margen superior para que no lo cubra el header -->
<div class="mt-[100px] p-4 overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Modelo</th>
                <th class="px-4 py-2 border">Impresoras Compatibles</th>
                <th class="px-4 py-2 border">Rendimiento Toner</th>
                <th class="px-4 py-2 border">Modelo Tambor</th>
                <th class="px-4 py-2 border">Rendimiento Tambor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartuchos['HP'] as $cartucho): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border"><?= htmlspecialchars($cartucho['modelo']); ?></td>
                    <td class="px-4 py-2 border"><?= impresorasList($cartucho['impresoras_compatibles']); ?></td>
                    <td class="px-4 py-2 border"><?= htmlspecialchars($cartucho['toner_rendimiento']); ?></td>
                    <td class="px-4 py-2 border"><?= htmlspecialchars($cartucho['tambor']['modelo']); ?></td>
                    <td class="px-4 py-2 border"><?= htmlspecialchars($cartucho['tambor']['rendimiento']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php
  // Al final, cerrar main y cargar footer
  includeTemplate("footer");
?>