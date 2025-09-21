<?php
// ======================================
// Lógica PHP: Cargar y validar JSON
// ======================================

// Ruta del archivo JSON de cartuchos
$jsonFile = __DIR__ . '/../includes/json/cartuchos.json';
$cartuchos = [];

// Manejo robusto de errores
if (!file_exists($jsonFile)) {
    error_log("El archivo JSON no se encontró: $jsonFile");
    $errorMsg = "Lo sentimos, el catálogo no está disponible temporalmente.";
} else {
    $jsonData = file_get_contents($jsonFile);
    $cartuchos = json_decode($jsonData, true);

    if (!is_array($cartuchos)) {
        error_log("Error al decodificar el JSON: $jsonFile");
        $errorMsg = "El catálogo presenta un error. Por favor, intente más tarde.";
    }
}

// Función para generar la lista de impresoras compatibles
function impresorasList(array $impresoras): string {
    if (empty($impresoras)) return '<em>No especificado</em>';
    $html = '<ul class="list-disc list-inside list-none pl-0" aria-label="Impresoras compatibles">';
    foreach ($impresoras as $impresora) {
        $html .= '<li>' . htmlspecialchars($impresora, ENT_QUOTES, 'UTF-8') . '</li>';
    }
    $html .= '</ul>';
    return $html;
}
?>
<main class="pt-[180px] px-4 max-w-7xl mx-auto">

    <nav aria-label="Navegación principal">
        <a href="index.php" class="text-sm text-blue-600 hover:underline flex items-center gap-1 mb-4">
            <i class="fas fa-arrow-left" aria-hidden="true"></i> Volver al inicio
        </a>
    </nav>

    <section class="p-8 mb-8 max-w-6xl mx-auto" aria-labelledby="catalogo-title">
        <div class="flex items-center justify-center mb-6 space-x-3">
            <i class="fas fa-print text-blue-600 text-4xl" aria-hidden="true"></i>
            <h1 id="catalogo-title" class="text-4xl font-extrabold text-blue-800 text-center">
                Catálogo de Cartuchos de Tóner HP
            </h1>
        </div>

        <div class="flex items-center justify-center mb-8">
            <hr class="border-t-2 border-blue-300 w-16 mr-3" aria-hidden="true">
            <h2 class="text-2xl font-semibold text-gray-700">
                Encuentra rápidamente el cartucho compatible con tu impresora
            </h2>
            <hr class="border-t-2 border-blue-300 w-16 ml-3" aria-hidden="true">
        </div>

        <div class="flex flex-col lg:flex-row items-center gap-8">
            <div class="flex-shrink-0">
                <img src="https://images.pexels.com/photos/33475146/pexels-photo-33475146.jpeg?auto=compress&w=640&h=480"
                    alt="Cartuchos de tóner HP sobre fondo blanco"
                    class="rounded-xl shadow-lg w-80 h-auto object-cover" loading="lazy">
            </div>
            <div class="flex-1 space-y-4">
                <p class="text-gray-700 text-lg leading-relaxed">
                    Sabemos que al momento de comprar un cartucho siempre surge la misma pregunta:
                    <em>¿será el adecuado para mi impresora?</em>. Por eso creamos esta <strong>herramienta interactiva</strong>,
                    pensada para que encuentres en segundos el <strong>cartucho o tambor correcto</strong>, con información confiable sobre
                    <strong>marcas, modelos, compatibilidad y rendimiento</strong>. Así podrás elegir tu consumible con total seguridad, evitando errores y ahorrando tiempo.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Nuestra <span class="font-semibold text-blue-600">tabla interactiva</span> permite filtrar en tiempo real cualquier cartucho por marca, modelo, impresora o tambor,
                    garantizando eficiencia y precisión.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed flex items-center gap-2">
                    <i class="fas fa-bolt text-orange-500" aria-hidden="true"></i>
                    <span><strong>Rápido, intuitivo y confiable</strong>: diseñado para ahorrarte tiempo y garantizar compatibilidad total con tu impresora.</span>
                </p>
                <p class="text-center mt-4">
                    <a href="https://tienda.norttek.com.mx" target="_blank" rel="noopener"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-300 inline-flex items-center gap-2">
                        🛒 Comprar mi cartucho de tóner ahora
                    </a>
                </p>
            </div>
        </div>
    </section>

    <?php if (isset($errorMsg)): ?>
        <div class="p-4 bg-red-100 text-red-700 rounded text-center font-semibold mb-8">
            <?= htmlspecialchars($errorMsg) ?>
        </div>
    <?php else: ?>
    <!-- Buscador interactivo -->
    <section class="relative w-full max-w-xl mx-auto mb-6" aria-label="Buscador de cartuchos">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" aria-hidden="true">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
        </div>
        <input
            type="text"
            id="buscador"
            placeholder="Buscar por marca, modelo, impresora o tambor..."
            class="w-full pl-10 pr-10 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-900"
            aria-label="Buscar cartuchos"
            autocomplete="off"
        >
        <button
            id="limpiarBusqueda"
            type="button"
            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700"
            title="Borrar búsqueda"
            aria-label="Borrar búsqueda">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </section>

    <!-- Contador de resultados -->
    <div class="mb-4 text-right text-gray-600 font-semibold" id="resultado-contador">
        Mostrando <span id="total-resultados">0</span> cartuchos
    </div>

    <!-- Tabla de cartuchos -->
    <div class="overflow-x-auto shadow-lg rounded-lg relative mb-20">
        <table id="tablaCartuchos" class="min-w-full table-fixed border-collapse" aria-label="Catálogo de cartuchos">
            <thead class="text-white sticky top-0 z-10" style="background-color: rgba(22, 119, 166, 0.5);">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Marca</th>
                    <th scope="col" class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Modelo</th>
                    <th scope="col" class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Impresoras Compatibles</th>
                    <th scope="col" class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Rendimiento Tóner</th>
                    <th scope="col" class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Modelo Tambor</th>
                    <th scope="col" class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Rendimiento Tambor</th>
                </tr>
            </thead>
            <tbody class="text-gray-900 text-sm font-light">
                <?php foreach ($cartuchos as $marca => $listaCartuchos): ?>
                    <?php foreach ($listaCartuchos as $cartucho): ?>
                        <tr class="odd:bg-white even:bg-gray-50 hover:bg-blue-100 transition-colors duration-200">
                            <td class="px-6 py-3 border-b border-gray-200"><?= htmlspecialchars($marca) ?></td>
                            <td class="px-6 py-3 border-b border-gray-200"><?= htmlspecialchars($cartucho['modelo']) ?></td>
                            <td class="px-6 py-3 border-b border-gray-200"><?= impresorasList($cartucho['impresoras_compatibles'] ?? []) ?></td>
                            <td class="px-6 py-3 border-b border-gray-200"><?= htmlspecialchars($cartucho['toner_rendimiento'] ?? 'No especificado') ?></td>
                            <td class="px-6 py-3 border-b border-gray-200">
                                <?= !empty($cartucho['tambor']['modelo']) ? htmlspecialchars($cartucho['tambor']['modelo']) : 'No aplica'; ?>
                            </td>
                            <td class="px-6 py-3 border-b border-gray-200">
                                <?= !empty($cartucho['tambor']['rendimiento']) ? htmlspecialchars($cartucho['tambor']['rendimiento']) : 'No aplica'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</main>

<!-- Filtrado y contador dinámico -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const buscador = document.getElementById("buscador");
    const btnBorrar = document.getElementById("limpiarBusqueda");
    const contador = document.getElementById("total-resultados");
    const tabla = document.getElementById("tablaCartuchos");
    if (buscador) buscador.focus();

    function normalizar(texto) {
        return texto.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    function actualizarFiltrado() {
        const filtro = normalizar(buscador.value.trim());
        const palabras = filtro.split(/\s+/);
        let visibles = 0;
        tabla.querySelectorAll("tbody tr").forEach(fila => {
            const textoFila = Array.from(fila.cells).map(celda => normalizar(celda.innerText)).join(" ");
            const mostrar = palabras.every(palabra => textoFila.includes(palabra));
            fila.style.display = mostrar ? "" : "none";
            if (mostrar) visibles++;
        });
        contador.textContent = visibles;
    }

    if (buscador) {
        buscador.addEventListener("input", actualizarFiltrado);
    }
    if (btnBorrar) {
        btnBorrar.addEventListener("click", () => {
            buscador.value = "";
            actualizarFiltrado();
            buscador.focus();
        });
    }
    actualizarFiltrado();
});
</script>