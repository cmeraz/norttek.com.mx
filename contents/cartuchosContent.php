<?php
require_once __DIR__ . '/../includes/functions.php';

// ======================================
// Lógica PHP optimizada: Sistema de filtrado completo + paginación
// ======================================

// Configuración de paginación
$itemsPorPagina = 50;
$paginaActual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$busqueda = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';

// Archivo JSON con información de cartuchos
$jsonFile = __DIR__ . '/../includes/json/cartuchos.json';
$cartuchos = [];
$totalCartuchos = 0;
$cartuchosPaginados = [];
$cartuchosCompletos = [];

// Validar existencia del archivo JSON
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $cartuchosCompletos = json_decode($jsonData, true);

    if ($cartuchosCompletos === null) {
        die("Error al decodificar el JSON.");
    }
    
    // Convertir a array plano para procesamiento
    $cartuchosPlanos = [];
    foreach ($cartuchosCompletos as $marca => $listaCartuchos) {
        foreach ($listaCartuchos as $cartucho) {
            $cartucho['marca'] = $marca;
            $cartuchosPlanos[] = $cartucho;
        }
    }
    
    // Aplicar filtro de búsqueda si existe
    $cartuchosFiltrados = $cartuchosPlanos;
    if (!empty($busqueda)) {
        $cartuchosFiltrados = array_filter($cartuchosPlanos, function($cartucho) use ($busqueda) {
            $textoCompleto = strtolower(
                $cartucho['marca'] . ' ' . 
                (isset($cartucho['modelo']) ? $cartucho['modelo'] : '') . ' ' . 
                (isset($cartucho['descripcion']) ? $cartucho['descripcion'] : '') . ' ' .
                (isset($cartucho['impresoras_compatibles']) ? implode(' ', $cartucho['impresoras_compatibles']) : '') . ' ' .
                (isset($cartucho['toner_rendimiento']) ? $cartucho['toner_rendimiento'] : '') . ' ' .
                (isset($cartucho['tambor']['modelo']) ? $cartucho['tambor']['modelo'] : '')
            );
            return strpos($textoCompleto, strtolower($busqueda)) !== false;
        });
    }
    
    $totalCartuchos = count($cartuchosFiltrados);
    $totalPaginas = ceil($totalCartuchos / $itemsPorPagina);
    
    // Aplicar paginación a los resultados filtrados
    $offset = ($paginaActual - 1) * $itemsPorPagina;
    $cartuchosPaginados = array_slice($cartuchosFiltrados, $offset, $itemsPorPagina);
    
    // Estadísticas
    $marcasUnicas = array_unique(array_column($cartuchosPlanos, 'marca'));
    $totalMarcas = count($marcasUnicas);
} else {
    die("El archivo JSON no se encontró.");
}

// Función optimizada para generar HTML de impresoras compatibles
function impresorasList($impresoras, $limite = 5) {
    // Validar entrada
    if (!is_array($impresoras) || empty($impresoras)) {
        return '<span class="text-sm text-gray-500 italic">No especificado</span>';
    }
    
    $html = '<div class="flex flex-wrap gap-1.5">';
    $mostradas = 0;
    
    foreach ($impresoras as $index => $impresora) {
        if ($mostradas >= $limite) {
            $restantes = count($impresoras) - $limite;
            $html .= '<span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full border bg-gray-50 text-gray-600 border-gray-200">';
            $html .= '+' . $restantes . ' más';
            $html .= '</span>';
            break;
        }
        
        $colorClass = $index % 3 === 0 ? 'bg-blue-50 text-blue-700 border-blue-200' : 
                     ($index % 3 === 1 ? 'bg-green-50 text-green-700 border-green-200' : 
                      'bg-purple-50 text-purple-700 border-purple-200');
        $html .= '<span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full border ' . $colorClass . '">';
        $html .= '<i class="fa-solid fa-print w-3 h-3 mr-1.5 text-current"></i>';
        $html .= htmlspecialchars($impresora);
        $html .= '</span>';
        $mostradas++;
    }
    $html .= '</div>';
    return $html;
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
            <button onclick="showFotoModal()" class="group bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-camera text-sm"></i>
                </div>
                <span>Identificar por Foto</span>
            </button>
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

                    <!-- Buscador rediseñado con búsqueda manual -->
                    <div class="max-w-2xl mx-auto mb-8">
                        <form method="GET" action="" class="relative">
                            <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                    <i class="fa-solid fa-search text-white text-sm"></i>
                                </div>
                            </div>
                            <input 
                                type="text"
                                id="buscador"
                                name="buscar"
                                value="<?php echo htmlspecialchars($busqueda); ?>"
                                placeholder="Buscar por marca, modelo o impresora..."
                                class="w-full pl-16 pr-16 py-4 bg-white/90 backdrop-blur-sm border-2 border-gray-200 rounded-2xl shadow-lg focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 focus:outline-none transition-all duration-300 text-gray-900 placeholder-gray-500 font-medium"
                            >
                            
                            <!-- Botón de búsqueda simplificado -->
                            <button 
                                type="submit"
                                id="botonBuscar"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-blue-600 transition-colors duration-300"
                                title="Buscar"
                            >
                                <div class="w-8 h-8 hover:bg-blue-50 rounded-full flex items-center justify-center transition-colors duration-300">
                                    <i class="fa-solid fa-arrow-right text-sm"></i>
                                </div>
                            </button>
                            
                            <!-- Botón limpiar (solo cuando hay búsqueda activa) -->
                            <?php if (!empty($busqueda)): ?>
                            <a 
                                href="?"
                                id="limpiarBusqueda"
                                class="absolute inset-y-0 right-12 pr-2 flex items-center text-gray-400 hover:text-red-500 transition-colors duration-300"
                                title="Limpiar búsqueda"
                            >
                                <div class="w-6 h-6 hover:bg-red-50 rounded-full flex items-center justify-center transition-colors duration-300">
                                    <i class="fa-solid fa-times text-xs"></i>
                                </div>
                            </a>
                            <?php endif; ?>
                            
                            <!-- Mantener página actual si existe -->
                            <?php if (isset($_GET['pagina']) && !empty($busqueda)): ?>
                            <input type="hidden" name="pagina" value="1">
                            <?php endif; ?>
                        </form>
                        
                        <!-- Instrucciones simplificadas -->
                        <div class="text-center mt-2">
                            <p class="text-xs text-gray-500">
                                Busca automáticamente en la página actual, o presiona <kbd class="px-1 py-0.5 bg-gray-100 rounded text-xs">Enter</kbd> para búsqueda completa
                            </p>
                        </div>
                        
                        <!-- Datos para búsqueda JavaScript -->
                        <script>
                        window.cartuchosData = {
                            cartuchosPagina: <?php echo json_encode($cartuchosPaginados); ?>,
                            totalCartuchos: <?php echo $totalCartuchos; ?>,
                            paginaActual: <?php echo $paginaActual; ?>,
                            busquedaActiva: <?php echo json_encode($busqueda); ?>
                        };
                        </script>
                    </div>

                    <!-- Herramientas adicionales -->
                    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
                        <div class="flex items-center gap-4">
                            <button onclick="showFotoModal()" class="group bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-3">
                                <div class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fa-solid fa-camera text-sm"></i>
                                </div>
                                <span>Identificar por Foto</span>
                            </button>
                        </div>
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-4 py-2 rounded-xl border border-gray-200">
                            <span class="text-gray-600 font-medium text-sm">
                                <?php if (!empty($busqueda)): ?>
                                    Búsqueda: "<strong><?php echo htmlspecialchars($busqueda); ?></strong>" - 
                                <?php endif; ?>
                                Mostrando <?php echo count($cartuchosPaginados); ?> de 
                            </span>
                            <span id="total-resultados" class="text-blue-600 font-bold"><?php echo $totalCartuchos; ?></span>
                            <span class="text-gray-600 font-medium text-sm"> cartuchos</span>
                            <?php if ($totalPaginas > 1): ?>
                                <span class="text-gray-600 font-medium text-sm"> (Página <?php echo $paginaActual; ?> de <?php echo $totalPaginas; ?>)</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Tabla responsive optimizada para móviles -->
                    <div class="overflow-hidden rounded-2xl border border-gray-200 shadow-xl bg-white">
                        
                        <!-- Vista de tabla para desktop -->
                        <div class="hidden lg:block overflow-x-auto">
                            <table id="tablaCartuchos" class="min-w-full">
                                <thead>
                                    <tr class="bg-gradient-to-r from-gray-900 to-gray-800 text-white">
                                        <th class="px-4 py-3 text-left font-bold text-xs uppercase tracking-wider border-r border-gray-700">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-tag text-blue-400"></i>
                                                Marca
                                            </div>
                                        </th>
                                        <th class="px-4 py-3 text-left font-bold text-xs uppercase tracking-wider border-r border-gray-700">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-code text-green-400"></i>
                                                Modelo
                                            </div>
                                        </th>
                                        <th class="px-4 py-3 text-left font-bold text-xs uppercase tracking-wider border-r border-gray-700">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-print text-purple-400"></i>
                                                Impresoras
                                            </div>
                                        </th>
                                        <th class="px-4 py-3 text-left font-bold text-xs uppercase tracking-wider border-r border-gray-700">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-fill-drip text-orange-400"></i>
                                                Tóner
                                            </div>
                                        </th>
                                        <th class="px-4 py-3 text-left font-bold text-xs uppercase tracking-wider border-r border-gray-700">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-circle text-pink-400"></i>
                                                Tambor
                                            </div>
                                        </th>
                                        <th class="px-4 py-3 text-left font-bold text-xs uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <i class="fa-solid fa-chart-bar text-cyan-400"></i>
                                                Rendimiento
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php foreach ($cartuchosPaginados as $cartucho): ?>
                                        <tr class="cartucho-row hover:bg-blue-50 transition-colors duration-200">
                                            <td class="px-4 py-3 border-r border-gray-100">
                                                <span class="font-semibold text-gray-900"><?= htmlspecialchars($cartucho['marca']) ?></span>
                                            </td>
                                            <td class="px-4 py-3 border-r border-gray-100">
                                                <div class="font-mono font-semibold text-gray-900 px-2 py-1 inline-block bg-gray-50 rounded">
                                                    <?= htmlspecialchars(isset($cartucho['modelo']) ? $cartucho['modelo'] : 'N/A') ?>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 border-r border-gray-100">
                                                <?= impresorasList(isset($cartucho['impresoras_compatibles']) ? $cartucho['impresoras_compatibles'] : []) ?>
                                            </td>
                                            <td class="px-4 py-3 border-r border-gray-100">
                                                <div class="inline-flex items-center gap-1 text-orange-800 px-2 py-1 font-semibold text-sm">
                                                    <i class="fa-solid fa-fill-drip text-orange-600"></i>
                                                    <?= htmlspecialchars(isset($cartucho['toner_rendimiento']) ? $cartucho['toner_rendimiento'] : 'No especificado') ?>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 border-r border-gray-100">
                                                <?php if (isset($cartucho['tambor']['modelo']) && !empty($cartucho['tambor']['modelo']) && $cartucho['tambor']['modelo'] !== 'No aplica'): ?>
                                                    <div class="font-mono font-semibold text-gray-900 px-2 py-1 bg-gray-50 rounded text-sm">
                                                        <?= htmlspecialchars($cartucho['tambor']['modelo']) ?>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="text-gray-400 italic text-sm">No aplica</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-4 py-3">
                                                <?php if (isset($cartucho['tambor']['rendimiento']) && !empty($cartucho['tambor']['rendimiento']) && $cartucho['tambor']['rendimiento'] !== 'No aplica'): ?>
                                                    <div class="font-mono font-semibold text-gray-900 px-2 py-1 bg-gray-50 rounded text-sm">
                                                        <?= htmlspecialchars($cartucho['tambor']['rendimiento']) ?>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="text-gray-400 italic text-sm">No aplica</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Vista de cards para móviles y tablets -->
                        <div class="lg:hidden p-4 space-y-4">
                            <?php foreach ($cartuchosPaginados as $cartucho): ?>
                                <div class="cartucho-row bg-white border border-gray-200 rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                                    <!-- Header del card -->
                                    <div class="flex items-start justify-between mb-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                                <i class="fa-solid fa-fill-drip text-white text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-bold text-gray-900 text-lg"><?= htmlspecialchars($cartucho['marca']) ?></div>
                                                <div class="font-mono font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded text-sm inline-block">
                                                    <?= htmlspecialchars(isset($cartucho['modelo']) ? $cartucho['modelo'] : 'N/A') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Información del tóner -->
                                    <div class="mb-3">
                                        <div class="flex items-center gap-2 mb-2">
                                            <i class="fa-solid fa-fill-drip text-orange-500 text-sm w-4"></i>
                                            <span class="font-medium text-gray-700 text-sm">Rendimiento del Tóner:</span>
                                        </div>
                                        <div class="text-orange-800 font-semibold ml-6">
                                            <?= htmlspecialchars(isset($cartucho['toner_rendimiento']) ? $cartucho['toner_rendimiento'] : 'No especificado') ?>
                                        </div>
                                    </div>

                                    <!-- Información del tambor (si aplica) -->
                                    <?php if (isset($cartucho['tambor']['modelo']) && !empty($cartucho['tambor']['modelo']) && $cartucho['tambor']['modelo'] !== 'No aplica'): ?>
                                    <div class="mb-3">
                                        <div class="flex items-center gap-2 mb-2">
                                            <i class="fa-solid fa-circle text-pink-500 text-sm w-4"></i>
                                            <span class="font-medium text-gray-700 text-sm">Tambor:</span>
                                        </div>
                                        <div class="ml-6">
                                            <div class="font-mono font-semibold text-gray-900 bg-gray-50 px-2 py-1 rounded inline-block text-sm mb-1">
                                                <?= htmlspecialchars($cartucho['tambor']['modelo']) ?>
                                            </div>
                                            <?php if (isset($cartucho['tambor']['rendimiento']) && $cartucho['tambor']['rendimiento'] !== 'No aplica'): ?>
                                                <div class="text-gray-600 text-sm">
                                                    Rendimiento: <?= htmlspecialchars($cartucho['tambor']['rendimiento']) ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <!-- Impresoras compatibles -->
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <i class="fa-solid fa-print text-purple-500 text-sm w-4"></i>
                                            <span class="font-medium text-gray-700 text-sm">Impresoras compatibles:</span>
                                        </div>
                                        <div class="ml-6">
                                            <?= impresorasList(isset($cartucho['impresoras_compatibles']) ? $cartucho['impresoras_compatibles'] : [], 3) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <!-- Controles de paginación -->
                        <?php if ($totalPaginas > 1): ?>
                        <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="text-sm text-gray-600">
                                Mostrando <?= $offset + 1 ?> a <?= min($offset + $itemsPorPagina, $totalCartuchos) ?> de <?= $totalCartuchos ?> cartuchos
                            </div>
                            <?php
                            // Función auxiliar para construir URLs con parámetros
                            function construirUrl($pagina, $busqueda = '') {
                                $params = ['pagina' => $pagina];
                                if (!empty($busqueda)) {
                                    $params['buscar'] = $busqueda;
                                }
                                return '?' . http_build_query($params);
                            }
                            ?>
                            
                            <nav class="flex items-center gap-2">
                                <?php if ($paginaActual > 1): ?>
                                    <a href="<?= construirUrl($paginaActual - 1, $busqueda) ?>" 
                                       class="px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                        <i class="fa-solid fa-chevron-left mr-1"></i>
                                        Anterior
                                    </a>
                                <?php endif; ?>
                                
                                <?php 
                                $inicioRango = max(1, $paginaActual - 2);
                                $finRango = min($totalPaginas, $paginaActual + 2);
                                
                                for ($i = $inicioRango; $i <= $finRango; $i++): ?>
                                    <a href="<?= construirUrl($i, $busqueda) ?>" 
                                       class="px-3 py-2 text-sm font-medium rounded-lg transition-colors <?= $i === $paginaActual ? 'bg-blue-600 text-white' : 'text-gray-600 bg-white border border-gray-300 hover:bg-gray-50' ?>">
                                        <?= $i ?>
                                    </a>
                                <?php endfor; ?>
                                
                                <?php if ($paginaActual < $totalPaginas): ?>
                                    <a href="<?= construirUrl($paginaActual + 1, $busqueda) ?>" 
                                       class="px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                        Siguiente
                                        <i class="fa-solid fa-chevron-right ml-1"></i>
                                    </a>
                                <?php endif; ?>
                            </nav>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenido de la TAB 2: FAQ modernizada con datos JSON -->
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
                        <!-- FAQ usando datos JSON -->
                        <div class="nt-faq-container">
                            <?php
                            $faqFile = __DIR__ . '/../includes/json/faqs/faq-cartuchos.json';
                            if (file_exists($faqFile)) {
                                $faqs = json_decode(file_get_contents($faqFile), true);
                                if (is_array($faqs)) {
                                    foreach ($faqs as $index => $faq) {
                                        $icono = !empty($faq['icono']) ? htmlspecialchars($faq['icono']) : 'fas fa-question-circle';
                                        $pregunta = isset($faq['pregunta']) ? htmlspecialchars($faq['pregunta']) : '';
                                        $respuesta = isset($faq['respuesta']) ? htmlspecialchars($faq['respuesta']) : '';
                            ?>
                                <div class="nt-faq-item" data-expanded="false">
                                    <h3 class="nt-faq-q">
                                        <button 
                                            class="nt-faq-toggle" 
                                            type="button" 
                                            aria-expanded="false" 
                                            aria-controls="faq-answer-<?= $index ?>"
                                        >
                                            <i class="nt-faq-q-ico <?= $icono ?>"></i>
                                            <span class="nt-faq-q-text"><?= $pregunta ?></span>
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </h3>
                                    <div 
                                        class="nt-faq-a" 
                                        id="faq-answer-<?= $index ?>" 
                                        aria-hidden="true" 
                                        hidden
                                    >
                                        <div class="nt-faq-a-inner">
                                            <p><?= $respuesta ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                    }
                                }
                            }
                            ?>
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