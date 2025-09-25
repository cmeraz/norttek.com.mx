<?php
require_once __DIR__ . '/../includes/functions.php';

// ======================================
// Lógica PHP: Leer JSON y generar funciones
// ======================================

// Archivo JSON con información de cartuchos
$jsonFile = __DIR__ . '/../includes/json/cartuchos.json';
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

<div class="pt-[180px] px-4 max-w-7xl mx-auto">
    <a href="index.php" class="nt-btn nt-btn-outline mb-6" style="--_border:linear-gradient(135deg,#c3d9ef,#aac9e6)"><i class="fas fa-arrow-left"></i><span>Volver al inicio</span></a>

    <section class="nt-section inset mb-10">
        <div class="text-center mb-10">
            <?= nt_heading('Catálogo de Cartuchos de Tóner HP', 'fa-solid fa-print', 'lg', 'Encuentra el modelo compatible en segundos', ['animate'=>true,'delay'=>'sm','class'=>'nt-heading-accent-bar']); ?>
            <p class="nt-lead max-w-3xl mx-auto mt-5">Herramienta interactiva para localizar rápidamente el <strong>cartucho o tambor correcto</strong> según tu impresora. Datos confiables de <strong>modelos, compatibilidad y rendimiento</strong> para que compres sin duda.</p>
        </div>
        <div class="flex flex-col lg:flex-row items-center gap-10">
            <div class="flex-shrink-0">
                <div class="rounded-2xl overflow-hidden shadow-lg ring-1 ring-gray-200">
                    <img src="https://images.pexels.com/photos/33475146/pexels-photo-33475146.jpeg?auto=compress&cs=tinysrgb&w=640" alt="Cartuchos de Tóner HP" class="w-80 h-auto object-cover">
                </div>
            </div>
            <div class="flex-1 space-y-5">
                <p class="text-gray-700 leading-relaxed">Al comprar un consumible siempre aparece la duda:<em> ¿será el adecuado para mi impresora?</em> Con esta <strong>herramienta interactiva</strong> lo resuelves en segundos.</p>
                <p class="text-gray-700 leading-relaxed">Filtra por <strong>marca</strong>, <strong>modelo</strong>, <strong>impresora</strong> o <strong>tambor</strong> y obtén compatibilidad inmediata.</p>
                <p class="text-gray-700 leading-relaxed flex items-start gap-2"><i class="fas fa-bolt text-orange-500 mt-1"></i><span><strong>Rápido e intuitivo</strong>: evita errores y ahorra tiempo en tu compra.</span></p>
                <div>
                    <a href="https://tienda.norttek.com.mx" target="_blank" class="nt-btn nt-btn-primary"><i class="fa-solid fa-cart-shopping"></i><span>Comprar cartucho ahora</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================
         Tabs de navegación (Tabla y FAQ)
    ========================== -->
    <div class="nt-btn-group mb-8">
        <button class="ejemplo-tab-btn nt-btn nt-btn-primary active" data-tab="tab1" type="button"><i class="fas fa-table"></i><span>Compatibilidades</span></button>
        <button class="ejemplo-tab-btn nt-btn nt-btn-outline" data-tab="tab2" type="button"><i class="fas fa-question-circle"></i><span>FAQ</span></button>
    </div>

    <!-- =========================
         Contenido de la TAB 1: Tabla de compatibilidades
    ========================== -->
    <section class="tabla-compatibilidades nt-section" id="compatibilidades">
        <div class="mb-6">
          <?= nt_heading('Tabla interactiva', 'fa-solid fa-table-list', 'md', 'Filtra por cualquier campo', ['animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
        </div>
        <!-- Buscador interactivo con iconos y botón limpiar -->
        <div class="relative w-full max-w-xl mx-auto mb-8">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <input 
                type="text"
                id="buscador"
                placeholder="Buscar por marca, modelo, impresora o tambor..."
                class="nt-input pl-10 pr-10"
            >
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

        <!-- Botón para buscar por foto -->
        <div class="flex justify-end mb-4">
            <button id="fotoBtn" type="button" class="nt-btn nt-btn-outline"><i class="fas fa-camera"></i><span>Buscar por foto</span></button>
            <input type="file" id="fotoInput" accept="image/*" class="hidden">
        </div>

        <!-- Contador de resultados dinámico -->
        <div class="mb-4 text-right text-gray-600 font-semibold text-sm" id="resultado-contador">
            Mostrando <span id="total-resultados">0</span> cartuchos
        </div>

        <!-- Tabla interactiva de cartuchos -->
        <div class="overflow-x-auto shadow-lg rounded-lg relative mb-10 border border-gray-100 bg-white">
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
                            <tr class="odd:bg-white even:bg-gray-50 hover:bg-blue-100 transition-colors duration-200 cartucho-row">
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
    </section>

    <!-- =========================
         Contenido de la TAB 2: Preguntas frecuentes
    ========================== -->
    <section class="preguntas-frecuentes nt-section" id="preguntas-frecuentes">
    <?= nt_heading('Preguntas Frecuentes', 'fa-solid fa-circle-question', 'md', 'Dudas comunes sobre cartuchos', ['animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
        <!-- Sección de preguntas frecuentes generada dinámicamente -->
        <?php
            if (function_exists('faq')) {
                echo faq('faq-cartuchos', ['title' => 'Preguntas Frecuentes sobre Cartuchos']);
            }
        ?>
    </section>
</div>