<?php
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
    <a href="index.php" class="text-sm text-blue-600 hover:underline flex items-center gap-1 mb-4">
        <i class="fas fa-arrow-left"></i> Volver al inicio
    </a>

    <!-- Sección principal con título, subtítulo y descripción -->
    <section class="p-8 mb-8 max-w-6xl mx-auto">
        <div class="flex items-center justify-center mb-6 space-x-3">
            <i class="fas fa-print text-blue-600 text-4xl"></i>
            <h1 class="text-4xl font-extrabold text-blue-800 text-center">
                Catálogo de Cartuchos de Toner HP
            </h1>
        </div>
        <div class="flex items-center justify-center mb-8">
            <hr class="border-t-2 border-blue-300 w-16 mr-3">
            <h2 class="text-2xl font-semibold text-gray-700">
                Encuentra rápidamente el cartucho compatible con tu impresora
            </h2>
            <hr class="border-t-2 border-blue-300 w-16 ml-3">
        </div>
        <div class="flex flex-col lg:flex-row items-center gap-8">
            <div class="flex-shrink-0">
                <img src="https://images.pexels.com/photos/33475146/pexels-photo-33475146.jpeg?cs=srgb&dl=pexels-zeleboba-33475146.jpg&fm=jpg&w=640&h=480&_gl=1*flopsy*_ga*NTcxNDE2NTY3LjE3NTc2NDgwMDk.*_ga_8JE65Q40S6*czE3NTc5MDkxMjQkbzIkZzEkdDE3NTc5MDkxNjEkajIzJGwwJGgw" 
                     alt="Cartuchos de Toner HP" 
                     class="rounded-xl shadow-lg w-80 h-auto object-cover">
            </div>
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

    <!-- TABS DE EJEMPLO: HORIZONTALES ARRIBA, CONTENIDO DEBAJO, SIN SHADOW NI ROUNDED -->

    <div class="flex flex-row gap-2 items-start mb-6">
        <button class="ejemplo-tab-btn active flex items-center gap-2 px-5 py-2 rounded-lg bg-blue-600 text-white shadow text-sm hover:bg-blue-700 transition-all duration-200 focus:outline-none"
            data-tab="tab1" type="button">
            <i class="fas fa-table"></i>
            <span>Tabla de Compatibilidades</span>
        </button>
        <button class="ejemplo-tab-btn flex items-center gap-2 px-5 py-2 rounded-lg bg-blue-600 text-white shadow text-sm hover:bg-blue-700 transition-all duration-200 focus:outline-none"
            data-tab="tab2" type="button">
            <i class="fas fa-question-circle"></i>
            <span>Preguntas Frecuentes</span>
        </button>
    </div>
    <hr class="border-t-1 border-gray-300 mb-8">
    
    <!-- El resto del contenido de tabs debajo de la línea -->
    
    <!-- Sección de tabla de compatibilidades con buscador, botón y contador -->

<section class="tabla-compatibilidades" id="compatibilidades">
    <!-- Buscador interactivo con iconos y botón limpiar -->
    <div class="relative w-full max-w-xl mx-auto mb-6">
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
            class="w-full pl-10 pr-10 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-900"
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

    <!-- Botón visible siempre -->
    <div class="flex justify-end mb-2">
        <button id="fotoBtn" type="button"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2 text-sm">
            <i class="fas fa-camera"></i> Buscar por foto
        </button>
        <input type="file" id="fotoInput" accept="image/*" class="hidden">
    </div>

    <!-- Contador de resultados dinámico -->
    <div class="mb-4 text-right text-gray-600 font-semibold" id="resultado-contador">
        Mostrando <span id="total-resultados">0</span> cartuchos
    </div>

    <!-- Tabla interactiva premium -->
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
</section>
<section class="preguntas-frecuentes" id="preguntas-frecuentes">
    <!-- Sección de preguntas frecuentes -->

        <?= faq('faq-general', ['title' => 'Preguntas Frecuentes']) ?>
        <?php
            if (function_exists('faq')) {
                echo faq('faq-cartuchos', ['title' => 'Preguntas Frecuentes sobre Cartuchos']);
            }
        ?>

    
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.ejemplo-tab-btn');
    const tabContents = {
        tab1: document.getElementById('compatibilidades'),
        tab2: document.getElementById('preguntas-frecuentes')
    };

    // Limpia animación previa y oculta todos los tabs
    function hideAllTabs() {
        Object.values(tabContents).forEach(tc => {
            tc.classList.add('hidden');
            tc.classList.remove('tab-animate-in');
        });
    }

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Botón activo visual
            tabBtns.forEach(b => b.classList.remove('active', 'text-gray-700', 'border-blue-400'));
            tabBtns.forEach(b => b.classList.add('text-gray-500'));

            btn.classList.add('active', 'text-gray-700', 'border-blue-400');
            btn.classList.remove('text-gray-500');

            // Animación de barrido
            hideAllTabs();
            const tabId = btn.getAttribute('data-tab');
            const content = tabContents[tabId];
            if (content) {
                content.classList.remove('hidden');
                // Forzar reflow para reiniciar animación
                void content.offsetWidth;
                content.classList.add('tab-animate-in');
            }
        });
    });

    // Mostrar por defecto el primer tab con animación
    hideAllTabs();
    if (tabBtns.length && tabContents.tab1) {
        tabBtns[0].classList.add('active', 'text-gray-700', 'border-blue-400');
        tabBtns[0].classList.remove('text-gray-500');
        tabContents.tab1.classList.remove('hidden');
        tabContents.tab1.classList.add('tab-animate-in');
    }
});
</script>

<style>
@keyframes tab-sweep-down {
    0% {
        opacity: 0;
        transform: translateY(-30px);
        background: linear-gradient(to bottom, #e0e7ef 0%, #fff 100%);
        clip-path: inset(0 0 100% 0);
    }
    60% {
        opacity: 1;
        background: linear-gradient(to bottom, #e0e7ef 0%, #fff 100%);
        clip-path: inset(0 0 0 0);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
        background: #fff;
        clip-path: inset(0 0 0 0);
    }
}
.tab-animate-in {
    animation: tab-sweep-down 0.5s cubic-bezier(.4,0,.2,1);
}
</style>