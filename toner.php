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

// Función para generar HTML de impresoras compatibles
function impresorasList($impresoras) {
    $html = '<ul class="list-disc list-inside">';
    foreach ($impresoras as $impresora) {
        $html .= '<li>' . htmlspecialchars($impresora) . '</li>';
    }
    $html .= '</ul>';
    return $html;
}
?>



<!-- ======================================
     HTML: Buscador + Tabla
     ====================================== -->

<div class="pt-[150px] px-4 max-w-7xl mx-auto">
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

    <!-- Contenido con imagen y texto -->
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
                Bienvenido al catálogo interactivo de <strong>cartuchos de toner HP</strong>, diseñado para que encuentres de manera rápida y segura el cartucho compatible con tu impresora. 
                Cada registro incluye información detallada sobre <strong>marca, modelo, impresoras compatibles, rendimiento del toner</strong> y, cuando corresponda, <strong>modelo y rendimiento del tambor</strong>.
            </p>

            <p class="text-gray-700 text-lg leading-relaxed">
                Nuestra <span class="font-semibold text-blue-600">tabla interactiva</span> permite filtrar en tiempo real cualquier cartucho por marca, modelo, impresora o tambor, garantizando eficiencia y evitando errores de compatibilidad.
            </p>

            <p class="text-gray-700 text-lg leading-relaxed flex items-center gap-2">
                <i class="fas fa-bolt text-orange-500"></i>
                <span>Rápido, intuitivo y confiable: todo lo que necesitas para elegir el cartucho correcto sin complicaciones.</span>
            </p>
        </div>
    </div>
</section>



    <!-- 🔍 Buscador con lupa y limpiar -->
    <div class="relative w-full max-w-xl mx-auto mb-6">
        <!-- Icono lupa -->
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>

        <!-- Input -->
        <input 
            type="text"
            id="buscador"
            placeholder="Buscar por marca, modelo, impresora o tambor..."
            class="w-full pl-10 pr-10 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-900"
        >

        <!-- Botón limpiar -->
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

    <!-- 📋 Tabla premium -->
    <div class="overflow-x-auto shadow-lg rounded-lg relative">
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


<!-- 🟢 Script: Filtrado en vivo + resaltar coincidencias + limpiar -->
<script>
const buscador = document.getElementById("buscador");
const limpiarBtn = document.getElementById("limpiarBusqueda");
const filas = document.querySelectorAll("#tablaCartuchos tbody tr");

// Evento limpiar búsqueda
limpiarBtn.addEventListener("click", () => {
    buscador.value = "";
    buscador.dispatchEvent(new Event("input")); // restaurar tabla
    buscador.focus();
});

// Filtrado en vivo
buscador.addEventListener("input", function () {
    const filtro = this.value.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");

    filas.forEach(fila => {
        const celdas = fila.querySelectorAll("td");
        let textoFila = "";
        celdas.forEach(celda => textoFila += celda.innerText + " ");

        const textoNormalizado = textoFila.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");

        if (textoNormalizado.includes(filtro)) {
            fila.style.display = "";
            // Restaurar contenido original
            celdas.forEach(celda => {
                celda.innerHTML = celda.innerText;
            });
            // Resaltar coincidencias
            if (filtro.trim() !== "") {
                celdas.forEach(celda => {
                    const regex = new RegExp(`(${filtro})`, "gi");
                    celda.innerHTML = celda.innerHTML.replace(regex, '<mark style="background-color: orange; transition: background-color 2s;">$1</mark>');
                });
            }
        } else {
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
