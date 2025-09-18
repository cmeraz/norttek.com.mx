<?php
// ======================================
// Configuración de la página
// ======================================

// Título de la página (se usa en el header)
$pageTitle = "Catalogo de Cartuchos de Toner - Norttek Solutions";

// Archivos CSS y JS adicionales (opcional)
$cssFiles = ["style.css"];      // CSS global opcional
$jsFiles  = ["scripts.js"];     // JS global opcional

// Incluir la plantilla base
include 'includes/pageTemplate.php';
?>

<?php
// ======================================
// Lógica PHP: Leer JSON y generar funciones
// ======================================

// Archivo JSON con información de cartuchos
$jsonFile = __DIR__ . '/includes/json/cartuchos.json';
$cartuchos = [];

// Validar existencia del archivo JSON
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $cartuchos = json_decode($jsonData, true);

    if ($cartuchos === null) {
        die("Error al decodificar el JSON.");
    }
} else {
    die("El archivo JSON no se encontró.");
}

// Función para generar HTML de impresoras compatibles
function impresorasList($impresoras) {
    $html = '<ul class="list-disc list-inside list-none pl-0">';
    foreach ($impresoras as $impresora) {
        $html .= '<li>' . htmlspecialchars($impresora) . '</li>';
    }
    $html .= '</ul>';
    return $html;
}
?>

<!-- ======================================
     HTML: Sección principal con título, subtítulo y descripción
     ====================================== -->

<div class="pt-[180px] px-4 max-w-7xl mx-auto">
    <a href="index.php" class="text-sm text-blue-600 hover:underline flex items-center gap-1 mb-4">
        <i class="fas fa-arrow-left"></i> Volver al inicio
    </a>
<section class="p-8 mb-8 max-w-6xl mx-auto">

    <!-- Título principal con ícono -->
    <div class="flex items-center justify-center mb-6 space-x-3">
        <i class="fas fa-print text-blue-600 text-4xl"></i>
        <h1 class="text-4xl font-extrabold text-blue-800 text-center">
            Catálogo de Cartuchos de Toner HP
        </h1>
    </div>

    <!-- Subtítulo con línea decorativa -->
    <div class="flex items-center justify-center mb-8">
        <hr class="border-t-2 border-blue-300 w-16 mr-3">
        <h2 class="text-2xl font-semibold text-gray-700">
            Encuentra rápidamente el cartucho compatible con tu impresora
        </h2>
        <hr class="border-t-2 border-blue-300 w-16 ml-3">
    </div>

    <!-- Contenido con imagen decorativa y texto explicativo -->
    <div class="flex flex-col lg:flex-row items-center gap-8">

        <!-- Imagen decorativa -->
        <div class="flex-shrink-0">
            <img src="https://images.pexels.com/photos/33475146/pexels-photo-33475146.jpeg?cs=srgb&dl=pexels-zeleboba-33475146.jpg&fm=jpg&w=640&h=480&_gl=1*flopsy*_ga*NTcxNDE2NTY3LjE3NTc2NDgwMDk.*_ga_8JE65Q40S6*czE3NTc5MDkxMjQkbzIkZzEkdDE3NTc5MDkxNjEkajIzJGwwJGgw" 
                 alt="Cartuchos de Toner HP" 
                 class="rounded-xl shadow-lg w-80 h-auto object-cover">
        </div>

        <!-- Texto descriptivo -->
        <div class="flex-1 space-y-4">
            <p class="text-gray-700 text-lg leading-relaxed">
    Sabemos que al momento de comprar un cartucho siempre surge la misma pregunta: 
    <em>¿será el adecuado para mi impresora?</em>.  
    Por eso creamos esta <strong>herramienta interactiva</strong>, pensada para que encuentres en segundos el 
    <strong>cartucho o tambor correcto</strong>, con información confiable sobre <strong>marcas, modelos, compatibilidad y rendimiento</strong>.  
    Así podrás elegir tu consumible con total seguridad, evitando errores y ahorrando tiempo.
</p>


            <p class="text-gray-700 text-lg leading-relaxed">
                Nuestra <span class="font-semibold text-blue-600">tabla interactiva</span> permite filtrar en tiempo real cualquier cartucho por marca, modelo, impresora o tambor, garantizando eficiencia y evitando errores de compatibilidad.
            </p>


<p class="text-gray-700 text-lg leading-relaxed flex items-center gap-2">
    <i class="fas fa-bolt text-orange-500"></i>
    <span><strong>Rápido, intuitivo y confiable</strong>: diseñado para ahorrarte tiempo y garantizar compatibilidad total con tu impresora.</span>
</p>

<p class="text-center mt-4">
    <a href="https://tienda.norttek.com.mx" target="_blank" 
       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-300 inline-flex items-center gap-2">
        🛒 Comprar mi cartucho de tóner ahora
    </a>
</p>


        </div>
    </div>
</section>

<!-- ======================================
     Buscador interactivo con iconos y botón limpiar
     ====================================== -->
<div class="relative w-full max-w-xl mx-auto mb-6">

    <!-- Icono de lupa -->
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
        class="w-full pl-10 pr-10 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-900"
    >

    <!-- Botón limpiar búsqueda -->
    <button 
        id="limpiarBusqueda"
        type="button"
        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700"
        title="Borrar búsqueda"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>
</div>

<!-- ======================================
     Contador de resultados dinámico
     ====================================== -->
<div class="mb-4 text-right text-gray-600 font-semibold" id="resultado-contador">
    Mostrando <span id="total-resultados">0</span> cartuchos
</div>

<!-- ======================================
     Tabla interactiva premium
     ====================================== -->
<div class="overflow-x-auto shadow-lg rounded-lg relative mb-20">
    <table id="tablaCartuchos" class="min-w-full table-fixed border-collapse">
        <thead class="text-white sticky top-0 z-10" style="background-color: rgba(22, 119, 166, 0.5);">
            <tr>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Marca</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Modelo</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Impresoras Compatibles</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Rendimiento Toner</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Modelo Tambor</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider border-b border-white/40">Rendimiento Tambor</th>
            </tr>
        </thead>
        <tbody class="text-gray-900 text-sm font-light">
            <?php foreach ($cartuchos as $marca => $listaCartuchos): ?>
                <?php foreach ($listaCartuchos as $cartucho): ?>
                    <tr class="odd:bg-white even:bg-gray-50 hover:bg-blue-100 transition-colors duration-200">
                        <td class="px-6 py-3 border-b border-gray-200"><?= htmlspecialchars($marca); ?></td>
                        <td class="px-6 py-3 border-b border-gray-200"><?= htmlspecialchars($cartucho['modelo']); ?></td>
                        <td class="px-6 py-3 border-b border-gray-200"><?= impresorasList($cartucho['impresoras_compatibles']); ?></td>
                        <td class="px-6 py-3 border-b border-gray-200"><?= htmlspecialchars($cartucho['toner_rendimiento']); ?></td>
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
</div>

<!-- ======================================
     Script: Filtrado en vivo y contador dinámico
     ====================================== -->
<script>
// Selección de elementos
const filas = document.querySelectorAll("#tablaCartuchos tbody tr");
const contador = document.getElementById("total-resultados");
const buscador = document.getElementById("buscador");
const btnBorrar = document.getElementById("limpiarBusqueda");

// Función para actualizar el contador de resultados visibles
function actualizarContador() {
    const visibles = Array.from(filas).filter(fila => fila.style.display !== "none");
    contador.textContent = visibles.length;
}

// Función de normalización (minúsculas y sin acentos)
function normalizar(texto) {
    return texto.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

// Filtrado mejorado: palabras separadas y compuestas
buscador.addEventListener("input", function () {
    const filtro = normalizar(this.value.trim());
    const palabras = filtro.split(/\s+/); // Dividir por espacios

    filas.forEach(fila => {
        const textoFila = Array.from(fila.cells)
            .map(celda => normalizar(celda.innerText))
            .join(" ");

        // Mostrar la fila solo si contiene todas las palabras
        const mostrar = palabras.every(palabra => textoFila.includes(palabra));
        fila.style.display = mostrar ? "" : "none";
    });

    actualizarContador();
});

// Botón para limpiar búsqueda
btnBorrar.addEventListener("click", () => {
    buscador.value = "";
    filas.forEach(fila => fila.style.display = "");
    actualizarContador();
});

// Inicializar contador al cargar la página
window.addEventListener("DOMContentLoaded", () => actualizarContador());
</script>
