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

    <!-- 🔍 Formulario de búsqueda mejorado -->
<div class="mt-[50px] p-4 flex justify-center">
    <div class="relative w-full max-w-xl">
        <!-- Icono de lupa dentro del input -->
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>

        <!-- Input de búsqueda -->
        <input 
            type="text"
            id="buscador"
            placeholder="Buscar por marca, modelo, impresora o tambor..."
            class="w-full pl-10 pr-10 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        <!-- Botón de limpiar búsqueda -->
        <button 
            id="limpiarBusqueda"
            type="button"
            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700"
            title="Borrar búsqueda"
        >
            <!-- Icono de cruz -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
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

<!-- 🟢 Script para limpiar búsqueda -->
<script>
const limpiarBtn = document.getElementById("limpiarBusqueda");
const buscadorInput = document.getElementById("buscador");

limpiarBtn.addEventListener("click", () => {
    buscadorInput.value = "";           // Limpiar input
    buscadorInput.dispatchEvent(new Event("input")); // Disparar evento para restaurar tabla
    buscadorInput.focus();              // Mantener foco en input
});
</script>

<?php
// ======================================
// Cierre de contenido y footer
// ======================================
includeTemplate("footer");
?>
