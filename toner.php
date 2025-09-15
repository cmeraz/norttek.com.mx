<?php
// ======================================
// Configuración de la página
// ======================================

// Título de la página (se usa en el header)
$pageTitle = "Servicios - Norttek";

// Archivos CSS y JS adicionales (opcional)
$cssFiles = ["style.css"];      // CSS global opcional
$jsFiles  = ["scripts.js"];     // JS global opcional

// Incluir la plantilla base
include 'includes/pageTemplate.php';

// ======================================
// Lógica PHP: Leer y procesar el JSON
// ======================================

// Ruta del archivo JSON
$jsonFile = __DIR__ . '/includes/json/cartuchos.json';

// Inicializar array de cartuchos
$cartuchos = [];

// Verificar si el archivo JSON existe
if (file_exists($jsonFile)) {
    // Leer contenido del JSON
    $jsonData = file_get_contents($jsonFile);
    // Decodificar JSON a array asociativo
    $cartuchos = json_decode($jsonData, true);

    // Validar que la decodificación sea correcta
    if ($cartuchos === null) {
        die("Error al decodificar el JSON.");
    }
} else {
    die("El archivo JSON no se encontró.");
}

// ======================================
// Funciones auxiliares
// ======================================

/**
 * Genera un listado HTML de impresoras compatibles.
 * @param array $impresoras Array de nombres de impresoras
 * @return string HTML de la lista
 */
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
     Contenido principal de la página
     ====================================== -->
<div class="pt-[150px] p-4 overflow-x-auto">

    <!-- 🔍 Formulario de búsqueda en vivo -->
    <div class="mt-[50px] p-4">
        <input 
            type="text" 
            id="buscador" 
            placeholder="Buscar por marca, modelo, impresora o tambor..." 
            class="w-full p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
    </div>

    <!-- 📋 Tabla de cartuchos -->
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
                        <!-- Marca del cartucho -->
                        <td class="px-4 py-2 border"><?= htmlspecialchars($marca); ?></td>
                        <!-- Modelo del cartucho -->
                        <td class="px-4 py-2 border"><?= htmlspecialchars($cartucho['modelo']); ?></td>
                        <!-- Lista de impresoras compatibles -->
                        <td class="px-4 py-2 border"><?= impresorasList($cartucho['impresoras_compatibles']); ?></td>
                        <!-- Rendimiento del toner -->
                        <td class="px-4 py-2 border"><?= htmlspecialchars($cartucho['toner_rendimiento']); ?></td>
                        <!-- Modelo del tambor (si no aplica, mostrar "No aplica") -->
                        <td class="px-4 py-2 border">
                            <?= !empty($cartucho['tambor']['modelo']) ? htmlspecialchars($cartucho['tambor']['modelo']) : 'No aplica'; ?>
                        </td>
                        <!-- Rendimiento del tambor (si no aplica, mostrar "No aplica") -->
                        <td class="px-4 py-2 border">
                            <?= !empty($cartucho['tambor']['rendimiento']) ? htmlspecialchars($cartucho['tambor']['rendimiento']) : 'No aplica'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- ======================================
     Script de búsqueda en vivo y resaltado
     ====================================== -->
<script>
const buscador = document.getElementById("buscador"); // Input de búsqueda
const filas = document.querySelectorAll("#tablaCartuchos tbody tr"); // Todas las filas de la tabla

buscador.addEventListener("input", function () {
    // Normalizar y quitar acentos para búsqueda insensible a mayúsculas/minúsculas y acentos
    const filtro = this.value.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, ""); 

    filas.forEach(fila => {
        const celdas = fila.querySelectorAll("td");
        let textoFila = "";

        // Concatenar texto de todas las celdas de la fila
        celdas.forEach(celda => textoFila += celda.innerText + " ");

        // Normalizar el texto de la fila
        const textoNormalizado = textoFila.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");

        if (textoNormalizado.includes(filtro)) {
            // Mostrar fila si coincide
            fila.style.display = "";

            // 🔄 Restaurar texto original (eliminar resaltados anteriores)
            celdas.forEach(celda => {
                const original = celda.innerText;
                celda.innerHTML = original;
            });

            // ✨ Resaltar coincidencias
            if (filtro.trim() !== "") {
                celdas.forEach(celda => {
                    const regex = new RegExp(`(${filtro})`, "gi");
                    celda.innerHTML = celda.innerHTML.replace(regex, `<mark style="background-color: rgba(22, 119, 166, 0.5);">$1</mark>`);
                });
            }
        } else {
            // Ocultar fila si no coincide
            fila.style.display = "none";
        }
    });
});
</script>

<?php
// ======================================
// Cierre de contenido y footer
// ======================================
includeTemplate("footer");
?>
