<?php
/**
 * searchContent.php
 * Página de resultados de búsqueda simple (versión inicial).
 */
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$normalized = mb_strtolower($q, 'UTF-8');
$results = [];

// Índice embebido (fallback)
$indexInline = [
  ['title'=>'Cámaras de Seguridad y Videovigilancia','url'=>'/cctv','tags'=>['cctv','seguridad','video','cámaras','vigilancia','grabación','soporte','instalaciones']],
  ['title'=>'Alarmas Inteligentes','url'=>'/alarma','tags'=>['alarma','sensores','humo','movimiento','intrusión','app','monitoreo']],
  ['title'=>'Control de Acceso Inteligente','url'=>'/control-acceso','tags'=>['control','acceso','biométrico','tarjetas','qr','asistencia']],
  ['title'=>'Telefonía IP en la Nube','url'=>'/telefonia','tags'=>['telefonía','ip','pbx','nube','extensiones','voip','comunicaciones']],
  ['title'=>'Cartuchos de Tóner (Herramienta)','url'=>'/cartuchos','tags'=>['cartuchos','toner','impresoras','hp','compatibilidad','herramienta']],
  ['title'=>'Sobre Nosotros','url'=>'/about','tags'=>['nosotros','empresa','historia','misión','visión','valores']],
  ['title'=>'Contacto','url'=>'/contact','tags'=>['contacto','soporte','formulario','ayuda','cotización']],
];

// Intentar cargar archivo JSON externo para permitir ampliación sin tocar PHP
$jsonFile = __DIR__.'/../includes/json/search-index.json';
$index = $indexInline;
if(is_file($jsonFile)){
  $jsonData = json_decode(file_get_contents($jsonFile), true);
  if(is_array($jsonData)){
    // Merge: JSON tiene prioridad; fallback se agrega si falta entrada
    $indexMap = [];
    foreach($jsonData as $row){ if(!empty($row['url'])) $indexMap[$row['url']] = $row; }
    foreach($indexInline as $row){ if(!isset($indexMap[$row['url']])) $indexMap[$row['url']] = $row; }
    $index = array_values($indexMap);
  }
}

if($normalized !== ''){
  foreach($index as $item){
    $tags = is_array($item['tags']) ? implode(' ', $item['tags']) : $item['tags'];
    $haystack = mb_strtolower($item['title'].' '.$tags,'UTF-8');
    if(strpos($haystack, $normalized) !== false){
      $results[] = $item;
    }
  }
}
?>
<section class="pt-40 pb-20 max-w-5xl mx-auto px-6">
  <div class="mb-8 text-center">
    <?= nt_heading('Resultados de búsqueda', 'fa-solid fa-magnifying-glass', 'lg', $q ? 'Término: '.htmlspecialchars($q) : 'Ingresa un término para buscar', ['class'=>'nt-heading-accent-bar']); ?>
  </div>

  <form action="/search.php" method="get" class="nt-section mb-10 flex flex-col sm:flex-row gap-4 items-stretch" role="search" aria-label="Buscar nuevamente">
    <div class="flex-1 nt-input-icon">
      <i class="fa-solid fa-magnifying-glass"></i>
      <input type="text" name="q" value="<?= htmlspecialchars($q) ?>" placeholder="Buscar servicios, soluciones o herramientas..." class="nt-input" autofocus>
    </div>
    <button class="nt-btn nt-btn-primary" type="submit"><i class="fa-solid fa-search"></i><span>Buscar</span></button>
  </form>

  <?php if($q === ''): ?>
    <div class="nt-alert nt-alert-info"><i class="fa-solid fa-circle-info"></i><span>Escribe un término arriba para ver resultados.</span></div>
  <?php elseif(empty($results)): ?>
    <div class="nt-alert nt-alert-warning"><i class="fa-solid fa-triangle-exclamation"></i><span>No se encontraron resultados que coincidan con "<strong><?= htmlspecialchars($q) ?></strong>".</span></div>
  <?php else: ?>
    <div class="grid gap-5 md:grid-cols-2">
      <?php foreach($results as $r): ?>
        <a href="<?= $r['url'] ?>" class="block group rounded-2xl border border-transparent bg-white dark:bg-[#142636] p-5 shadow-sm hover:shadow-lg hover:-translate-y-1 transition relative overflow-hidden" style="background:linear-gradient(#ffffff,#f5f9fc);">
          <div class="flex items-start gap-3">
            <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white flex items-center justify-center shadow group-hover:scale-105 transition">
              <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
            <div>
              <h3 class="font-bold text-sm tracking-wide text-slate-800 mb-1 group-hover:text-blue-700">
                <?= htmlspecialchars($r['title']) ?>
              </h3>
              <p class="text-[11px] uppercase tracking-wider text-slate-500">Acceder</p>
            </div>
          </div>
          <div class="absolute inset-0 opacity-0 group-hover:opacity-10 bg-gradient-to-tr from-blue-400 to-blue-700 transition"></div>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <div class="mt-14 text-center">
    <a href="/" class="nt-btn nt-btn-outline"><i class="fa-solid fa-house"></i><span>Volver al inicio</span></a>
  </div>
</section>
