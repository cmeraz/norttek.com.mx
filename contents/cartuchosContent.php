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
    $html = '<div class="flex flex-wrap gap-1.5">';
    foreach ($impresoras as $index => $impresora) {
        $colorClass = $index % 3 === 0 ? 'bg-blue-50 text-blue-700 border-blue-200' : 
                     ($index % 3 === 1 ? 'bg-green-50 text-green-700 border-green-200' : 
                      'bg-purple-50 text-purple-700 border-purple-200');
        $html .= '<span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full border ' . $colorClass . '">';
        $html .= '<i class="fa-solid fa-print w-3 h-3 mr-1.5 text-current"></i>';
        $html .= htmlspecialchars($impresora);
        $html .= '</span>';
    }
    $html .= '</div>';
    return $html;
}

// Contar total de cartuchos para estadísticas
$totalCartuchos = 0;
$totalMarcas = count($cartuchos);
foreach ($cartuchos as $marca => $listaCartuchos) {
    $totalCartuchos += count($listaCartuchos);
}
?>

<!-- Hero Section Modernizado -->
<section class="cartuchos-hero nt-hero-wrapper is-soft" style="min-height:500px;" aria-label="Catálogo de Cartuchos Norttek">
    <div class="hero-content max-w-7xl mx-auto px-6 py-20">
        <!-- Header con estadísticas -->
        <div class="text-center mb-12">
            <div class="opacity-0 nt-heading-anim delay-sm" style="transform:translateY(34px) scale(.955);">
                <?= nt_heading('Catálogo Inteligente de Cartuchos', 'fa-solid fa-print', 'xl', null, ['animate'=>false,'class'=>'nt-heading-hero nt-heading-invert nt-heading-accent-bar']); ?>
            </div>
            <p class="nt-hero-sub nt-hero-sub-invert nt-heading-anim delay-md text-xl leading-relaxed" style="opacity:0; transform:translateY(34px) scale(.955); max-width:800px; margin: 0 auto;">
                Descubre compatibilidad instantánea para tu impresora. Base de datos con <strong><?= $totalCartuchos ?></strong> cartuchos de <strong><?= $totalMarcas ?></strong> marcas líderes.
            </p>
            
            <!-- Estadísticas visuales -->
            <div class="flex flex-wrap justify-center gap-6 mt-8 opacity-0 nt-heading-anim delay-lg" style="transform:translateY(34px) scale(.955);">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl px-6 py-4 border border-white/20">
                    <div class="text-2xl font-bold text-white"><?= $totalCartuchos ?></div>
                    <div class="text-blue-100 text-sm font-medium">Cartuchos</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl px-6 py-4 border border-white/20">
                    <div class="text-2xl font-bold text-white"><?= $totalMarcas ?></div>
                    <div class="text-blue-100 text-sm font-medium">Marcas</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl px-6 py-4 border border-white/20">
                    <div class="text-2xl font-bold text-white">100%</div>
                    <div class="text-blue-100 text-sm font-medium">Compatibilidad</div>
                </div>
            </div>
        </div>

        <!-- Botones de acción modernos -->
        <div class="flex flex-wrap justify-center gap-4 opacity-0 nt-heading-anim delay-xl" style="transform:translateY(34px) scale(.955);">
            <a href="#catalogo" class="group bg-white text-gray-900 px-8 py-4 rounded-2xl font-semibold shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-search text-sm"></i>
                </div>
                <span>Buscar Cartuchos</span>
            </a>
            <a href="#herramientas" class="group bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-camera text-sm"></i>
                </div>
                <span>Identificar por Foto</span>
            </a>
        </div>
    </div>
</section>

<!-- Contenido Principal Modernizado -->
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/50 to-indigo-50/30">
    <div class="max-w-7xl mx-auto px-4 py-12">
        
        <!-- Breadcrumb moderno -->
        <nav class="flex items-center space-x-2 text-sm mb-8 bg-white/60 backdrop-blur-sm rounded-full px-6 py-3 w-fit shadow-sm border border-white/20">
            <a href="index.php" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition-colors">
                <i class="fa-solid fa-home text-xs"></i>
                <span>Inicio</span>
            </a>
            <i class="fa-solid fa-chevron-right text-gray-400 text-xs"></i>
            <span class="text-gray-900 font-medium">Catálogo de Cartuchos</span>
        </nav>

        <!-- Sección de herramientas modernizada -->
        <section class="mb-16" id="catalogo">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 overflow-hidden">
                <div class="p-8 lg:p-12">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div class="space-y-6">
                            <div class="space-y-4">
                                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white px-4 py-2 rounded-full text-sm font-semibold">
                                    <i class="fa-solid fa-magic-wand-sparkles"></i>
                                    <span>Herramienta Inteligente</span>
                                </div>
                                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight">
                                    Encuentra tu cartucho en <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">segundos</span>
                                </h2>
                                <p class="text-gray-600 text-lg leading-relaxed">
                                    Resuelve la duda: <em class="text-gray-800 font-medium">¿será el cartucho adecuado para mi impresora?</em> 
                                    Con nuestra herramienta interactiva lo sabrás instantáneamente.
                                </p>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <i class="fa-solid fa-bolt text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Búsqueda Inteligente</h3>
                                        <p class="text-gray-600">Filtra por marca, modelo, impresora o tambor con resultados instantáneos</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <i class="fa-solid fa-shield-check text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">100% Compatibilidad</h3>
                                        <p class="text-gray-600">Evita errores y devoluciones con información confiable y actualizada</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <i class="fa-solid fa-clock text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Ahorra Tiempo</h3>
                                        <p class="text-gray-600">Interface intuitiva que te lleva directo al cartucho que necesitas</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="pt-4">
                                <a href="https://tienda.norttek.com.mx" target="_blank" 
                                   class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                        <i class="fa-solid fa-cart-shopping text-sm"></i>
                                    </div>
                                    <span>Comprar Ahora</span>
                                    <i class="fa-solid fa-arrow-right text-sm"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="relative">
                            <div class="relative bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-8 shadow-2xl">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-2xl"></div>
                                <div class="relative">
                                    <div class="flex items-center gap-3 mb-6">
                                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                                            <i class="fa-solid fa-print text-white text-lg"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-white font-semibold">HP LaserJet Pro M404dn</h3>
                                            <p class="text-gray-400 text-sm">Ejemplo de búsqueda</p>
                                        </div>
                                    </div>
                                    
                                    <div class="space-y-3 text-sm">
                                        <div class="flex justify-between items-center p-3 bg-white/5 rounded-lg border border-white/10">
                                            <span class="text-gray-300">Cartucho Compatible:</span>
                                            <span class="text-white font-medium">CF258A</span>
                                        </div>
                                        <div class="flex justify-between items-center p-3 bg-white/5 rounded-lg border border-white/10">
                                            <span class="text-gray-300">Rendimiento:</span>
                                            <span class="text-white font-medium">3,200 páginas</span>
                                        </div>
                                        <div class="flex justify-between items-center p-3 bg-green-500/20 rounded-lg border border-green-500/20">
                                            <span class="text-green-200">Estado:</span>
                                            <div class="flex items-center gap-2">
                                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                                <span class="text-green-300 font-medium">Compatible</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Navegación por pestañas modernizada -->
        <div class="flex flex-wrap justify-center mb-8">
            <div class="inline-flex bg-white/80 backdrop-blur-sm p-2 rounded-2xl shadow-lg border border-white/20">
                <button class="ejemplo-tab-btn px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-2 active" 
                        data-tab="tab1" type="button">
                    <div class="w-6 h-6 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-table text-white text-xs"></i>
                    </div>
                    <span>Base de Datos</span>
                </button>
                <button class="ejemplo-tab-btn px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-2 text-gray-600 hover:text-gray-900" 
                        data-tab="tab2" type="button">
                    <div class="w-6 h-6 bg-gray-200 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-circle-question text-gray-600 text-xs"></i>
                    </div>
                    <span>Preguntas Frecuentes</span>
                </button>
            </div>
        </div>

        <!-- Contenido de la TAB 1: Tabla modernizada -->
        <section class="tabla-compatibilidades nt-section" id="compatibilidades">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 overflow-hidden">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center">
                                <i class="fa-solid fa-database text-white text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Base de Datos Interactiva</h2>
                                <p class="text-gray-600 text-sm">Busca y filtra entre todos nuestros cartuchos</p>
                            </div>
                        </div>
                    </div>

                    <!-- Buscador rediseñado -->
                    <div class="max-w-2xl mx-auto mb-8">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                    <i class="fa-solid fa-search text-white text-sm"></i>
                                </div>
                            </div>
                            <input 
                                type="text"
                                id="buscador"
                                placeholder="Buscar por marca, modelo, impresora o tambor..."
                                class="w-full pl-16 pr-16 py-4 bg-white/90 backdrop-blur-sm border-2 border-gray-200 rounded-2xl shadow-lg focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 focus:outline-none transition-all duration-300 text-gray-900 placeholder-gray-500 font-medium"
                            >
                            <button 
                                id="limpiarBusqueda"
                                type="button"
                                class="absolute inset-y-0 right-0 pr-6 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-300"
                                title="Limpiar búsqueda"
                            >
                                <div class="w-8 h-8 hover:bg-gray-100 rounded-full flex items-center justify-center transition-colors duration-300">
                                    <i class="fa-solid fa-times text-sm"></i>
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- Herramientas adicionales -->
                    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
                        <div class="flex items-center gap-4">
                            <button id="fotoBtn" type="button" 
                                    class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-pink-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                                <i class="fa-solid fa-camera"></i>
                                <span>Buscar por Foto</span>
                            </button>
                            <input type="file" id="fotoInput" accept="image/*" class="hidden">
                        </div>
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-4 py-2 rounded-xl border border-gray-200">
                            <span class="text-gray-600 font-medium text-sm">Mostrando </span>
                            <span id="total-resultados" class="text-blue-600 font-bold">0</span>
                            <span class="text-gray-600 font-medium text-sm"> cartuchos</span>
                        </div>
                    </div>

                    <!-- Tabla completamente rediseñada -->
                    <div class="overflow-hidden rounded-2xl border border-gray-200 shadow-xl bg-white">
                        <div class="overflow-x-auto">
                            <table id="tablaCartuchos" class="min-w-full">
                                <thead>
                                    <tr class="bg-gradient-to-r from-gray-900 to-gray-800 text-white">
                                        <th class="px-6 py-4 text-left font-bold text-sm uppercase tracking-wider border-r border-gray-700 last:border-r-0">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-tag text-blue-400"></i>
                                                Marca
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left font-bold text-sm uppercase tracking-wider border-r border-gray-700 last:border-r-0">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-code text-green-400"></i>
                                                Modelo
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left font-bold text-sm uppercase tracking-wider border-r border-gray-700 last:border-r-0">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-print text-purple-400"></i>
                                                Impresoras
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left font-bold text-sm uppercase tracking-wider border-r border-gray-700 last:border-r-0">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-fill-drip text-orange-400"></i>
                                                Tóner
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left font-bold text-sm uppercase tracking-wider border-r border-gray-700 last:border-r-0">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-circle text-pink-400"></i>
                                                Tambor
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left font-bold text-sm uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-chart-bar text-cyan-400"></i>
                                                Rendimiento
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php foreach ($cartuchos as $marca => $listaCartuchos): ?>
                                        <?php foreach ($listaCartuchos as $index => $cartucho): ?>
                                            <tr class="cartucho-row hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300 group">
                                                <td class="px-6 py-4 border-r border-gray-100 last:border-r-0">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-sm">
                                                            <?= strtoupper(substr($marca, 0, 2)) ?>
                                                        </div>
                                                        <span class="font-semibold text-gray-900"><?= htmlspecialchars($marca) ?></span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 border-r border-gray-100 last:border-r-0">
                                                    <div class="font-mono font-semibold text-gray-900 bg-gray-100 px-3 py-1 rounded-lg inline-block">
                                                        <?= htmlspecialchars($cartucho['modelo']) ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 border-r border-gray-100 last:border-r-0">
                                                    <?= impresorasList($cartucho['impresoras_compatibles']) ?>
                                                </td>
                                                <td class="px-6 py-4 border-r border-gray-100 last:border-r-0">
                                                    <div class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-100 to-red-100 text-orange-800 px-3 py-2 rounded-xl font-semibold">
                                                        <i class="fa-solid fa-fill-drip text-orange-600"></i>
                                                        <?= htmlspecialchars($cartucho['toner_rendimiento']) ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 border-r border-gray-100 last:border-r-0">
                                                    <?php if (!empty($cartucho['tambor']['modelo'])): ?>
                                                        <div class="font-mono font-semibold text-pink-800 bg-pink-100 px-3 py-1 rounded-lg inline-block">
                                                            <?= htmlspecialchars($cartucho['tambor']['modelo']) ?>
                                                        </div>
                                                    <?php else: ?>
                                                        <span class="text-gray-400 italic">No aplica</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <?php if (!empty($cartucho['tambor']['rendimiento'])): ?>
                                                        <div class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-100 to-blue-100 text-cyan-800 px-3 py-2 rounded-xl font-semibold">
                                                            <i class="fa-solid fa-chart-bar text-cyan-600"></i>
                                                            <?= htmlspecialchars($cartucho['tambor']['rendimiento']) ?>
                                                        </div>
                                                    <?php else: ?>
                                                        <span class="text-gray-400 italic">No aplica</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenido de la TAB 2: FAQ modernizada -->
        <section class="preguntas-frecuentes nt-section hidden" id="preguntas-frecuentes">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 overflow-hidden">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-600 rounded-2xl flex items-center justify-center">
                                <i class="fa-solid fa-circle-question text-white text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Preguntas Frecuentes</h2>
                                <p class="text-gray-600 text-sm">Resuelve todas tus dudas sobre cartuchos</p>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-4xl mx-auto">
                        <!-- Sección de preguntas frecuentes -->
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 border border-blue-200 rounded-2xl p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <i class="fa-solid fa-lightbulb text-yellow-500"></i>
                                    ¿Cómo saber qué cartucho necesita mi impresora?
                                </h3>
                                <p class="text-gray-700 leading-relaxed">
                                    La forma más fácil es utilizar nuestra herramienta de búsqueda. Solo ingresa el modelo de tu impresora y automáticamente te mostraremos todos los cartuchos compatibles con su rendimiento y especificaciones técnicas.
                                </p>
                            </div>

                            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <i class="fa-solid fa-shield-check text-green-500"></i>
                                    ¿Los cartuchos compatibles afectan la garantía?
                                </h3>
                                <p class="text-gray-700 leading-relaxed">
                                    No, usar cartuchos compatibles no anula la garantía de tu impresora. Todos nuestros cartuchos cumplen con estándares de calidad y son completamente seguros para tu equipo.
                                </p>
                            </div>

                            <div class="bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 rounded-2xl p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <i class="fa-solid fa-recycle text-purple-500"></i>
                                    ¿Qué hago con los cartuchos vacíos?
                                </h3>
                                <p class="text-gray-700 leading-relaxed">
                                    Ofrecemos un programa de reciclaje gratuito. Trae tus cartuchos vacíos a nuestras oficinas y nosotros nos encargamos de su disposición ecológica. Además, obtienes descuentos en tu próxima compra.
                                </p>
                            </div>

                            <div class="bg-gradient-to-r from-orange-50 to-red-50 border border-orange-200 rounded-2xl p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <i class="fa-solid fa-chart-bar text-orange-500"></i>
                                    ¿Cuánto dura un cartucho de tóner?
                                </h3>
                                <p class="text-gray-700 leading-relaxed">
                                    El rendimiento varía según el modelo, pero generalmente oscila entre 1,500 y 15,000 páginas. En nuestra tabla puedes ver el rendimiento específico de cada cartucho para calcular el costo por página.
                                </p>
                            </div>

                            <div class="bg-gradient-to-r from-teal-50 to-cyan-50 border border-teal-200 rounded-2xl p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <i class="fa-solid fa-truck text-teal-500"></i>
                                    ¿Hacen entregas a domicilio?
                                </h3>
                                <p class="text-gray-700 leading-relaxed">
                                    Sí, realizamos entregas sin costo adicional en la zona metropolitana. Para pedidos fuera de la ciudad, aplicamos tarifas preferenciales de envío. ¡Contacta para más información!
                                </p>
                            </div>
                        </div>

                        <!-- Llamada a la acción -->
                        <div class="mt-12 text-center">
                            <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-8 text-white">
                                <h3 class="text-xl font-bold mb-4">¿Tienes más preguntas?</h3>
                                <p class="text-gray-300 mb-6">Nuestro equipo de expertos está aquí para ayudarte</p>
                                <div class="flex flex-wrap justify-center gap-4">
                                    <a href="contact.php" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                        <i class="fa-solid fa-comments"></i>
                                        <span>Contáctanos</span>
                                    </a>
                                    <a href="tel:+526252690997" class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-6 py-3 rounded-xl font-semibold border border-white/20 hover:bg-white/20 transition-all duration-300">
                                        <i class="fa-solid fa-phone"></i>
                                        <span>(625) 269-0997</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>