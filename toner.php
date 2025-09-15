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

<div class="pt-[150px] p-4 overflow-x-auto"]>
<!-- 🔍 Formulario de búsqueda -->
<div class="mt-[50px] p-4">
    <input 
        type="text" 
        id="buscador" 
        placeholder="Buscar por marca, modelo, impresora o tambor..." 
        class="w-full p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
    >
</div>

<!-- 📋 Tabla filtrada -->

    <table id="tablaCartuchos" class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-100 sticky top-0 z-10 shadow">
            <tr>
                <th class="px-4 py-2 border">Marca</th>
                <th class="px-4 py-2 border">Modelo</th>
                <th class="px-4 py-2 border">Impresoras Compatibles</th>
                <th class="px-4 py-2 border">Rendimiento Toner</th>
                <th class="px-4 py-2 border">Modelo Tambor</th>
                <th class="px-4 py-2 border">Rendimiento Tambor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartuchos as $marca => $listaCartuchos): ?>
                <?php foreach ($listaCartuchos as $cartucho): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border"><?= htmlspecialchars($marca); ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($cartucho['modelo']); ?></td>
                        <td class="px-4 py-2 border"><?= impresorasList($cartucho['impresoras_compatibles']); ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($cartucho['toner_rendimiento']); ?></td>
                        <td class="px-4 py-2 border">
                            <?= !empty($cartucho['tambor']['modelo']) ? htmlspecialchars($cartucho['tambor']['modelo']) : 'No aplica'; ?>
                        </td>
                        <td class="px-4 py-2 border">
                            <?= !empty($cartucho['tambor']['rendimiento']) ? htmlspecialchars($cartucho['tambor']['rendimiento']) : 'No aplica'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- 🟢 Script de filtrado en vivo -->
<script>
const buscador = document.getElementById("buscador");
const filas = document.querySelectorAll("#tablaCartuchos tbody tr");

buscador.addEventListener("input", function () {
    const filtro = this.value.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, ""); 

    filas.forEach(fila => {
        const celdas = fila.querySelectorAll("td");
        let textoFila = "";
        celdas.forEach(celda => textoFila += celda.innerText + " ");

        const textoNormalizado = textoFila.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");

        if (textoNormalizado.includes(filtro)) {
            fila.style.display = "";
            // 🔄 restaurar texto original
            celdas.forEach(celda => {
                const original = celda.innerText;
                celda.innerHTML = original;
            });
            // ✨ resaltar coincidencias
            if (filtro.trim() !== "") {
                celdas.forEach(celda => {
                    const regex = new RegExp(`(${filtro})`, "gi");
                    celda.innerHTML = celda.innerHTML.replace(regex, `<mark style="background-color: rgba(22, 119, 166, 0.5);">$1</mark>`);
                });
            }
        } else {
            fila.style.display = "none";
        }
    });
});
</script>




<?php
  // Al final, cerrar main y cargar footer
  includeTemplate("footer");
?>