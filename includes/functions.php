<?php
/**
 * functions.php
 * Funciones utilitarias y helpers para plantillas, secciones y componentes FAQ.
 * 
 * Estructura y convenciones según la arquitectura modular de Norttek Solutions.
 */

/**
 * Incluye un template desde la carpeta /templates.
 * Uso: includeTemplate('header');
 * 
 * @param string $templateName Nombre del template (sin extensión)
 */
function includeTemplate($templateName) {
    $templateName = basename($templateName); // Seguridad: evita rutas externas
    $file = __DIR__ . "/../templates/{$templateName}.php";

    if (file_exists($file)) {
        include $file;
    } else {
        echo "<!-- Template {$templateName}.php not found in templates folder {$file} -->";
    }
}

/**
 * Genera un encabezado estandarizado según el nuevo sistema visual 2025.
 * Ejemplo:
 *   echo nt_heading('Instalación Profesional', 'fa-solid fa-plug', 'lg', 'Opcional subtítulo');
 * @param string $text       Texto principal del heading
 * @param string $icon       Clase(s) del icono FontAwesome (sin <i>)
 * @param string $size       xl|lg|md|sm (default lg)
 * @param string|null $sub   Subtítulo opcional (renderizado debajo en menor tamaño)
 * @param array $attrs       Atributos HTML extra (['id' => 'mi-id'])
 * @return string            HTML del encabezado
 */
function nt_heading($text, $icon = 'fa-solid fa-circle', $size = 'lg', $sub = null, $attrs = []) {
    $allowedSizes = ['xl','lg','md','sm'];
    if (!in_array($size, $allowedSizes, true)) { $size = 'lg'; }
    $cls = 'nt-heading nt-heading-' . $size;

    // Soporte de flags especiales dentro de $attrs sin romper firma existente
    $animate = false;
    $delay = null;
    if (isset($attrs['animate'])) {
        $animate = (bool)$attrs['animate'];
        unset($attrs['animate']);
    }
    if (isset($attrs['delay'])) {
        $delay = in_array($attrs['delay'], ['sm','md','lg'], true) ? $attrs['delay'] : null;
        unset($attrs['delay']);
    }
    if (isset($attrs['class'])) { // permitir clases extra
        $cls .= ' ' . trim(preg_replace('/\s+/', ' ', $attrs['class']));
        unset($attrs['class']);
    }
    if ($animate) {
        $cls .= ' nt-heading-anim';
        if ($delay) { $cls .= ' delay-' . $delay; }
    }

    // Añadir semántica accesible si no se define explícitamente
    $sizeMap = ['xl'=>1,'lg'=>2,'md'=>3,'sm'=>4];
    if (!isset($attrs['role'])) {
        $attrs['role'] = 'heading';
    }
    if (!isset($attrs['aria-level'])) {
        $attrs['aria-level'] = $sizeMap[$size] ?? 2;
    }

    $attrStr = '';
    if (!empty($attrs) && is_array($attrs)) {
        foreach ($attrs as $k => $v) {
            if ($v === null) continue;
            $k = htmlspecialchars($k, ENT_QUOTES, 'UTF-8');
            $v = htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
            $attrStr .= " {$k}='{$v}'";
        }
    }
    $iconHtml = $icon ? '<i class="'.htmlspecialchars($icon, ENT_QUOTES, 'UTF-8').'"></i>' : '';
    $html  = '<div class="'.$cls.'"'.$attrStr.'>'.$iconHtml.'<span>'.htmlspecialchars($text, ENT_QUOTES, 'UTF-8').'</span>';
    if ($sub) {
        $html .= '<span class="nt-sub">'.htmlspecialchars($sub, ENT_QUOTES, 'UTF-8').'</span>';
    }
    $html .= '</div>';
    return $html;
}

/**
 * Incluye una sección de template pasando variables (con valores por defecto).
 * Uso: includeSection('nombre', ['var1' => 'valor']);
 * 
 * @param string $templateName Nombre del template (sin extensión)
 * @param array $variables Variables a pasar al template
 */
function includeSection($templateName, $variables = []) {
    $file = __DIR__ . "/$templateName.php";

    // Valores por defecto para SEO y otros
    $defaults = [
        'seo' => [
            'title' => 'Norttek Solutions',
            'description' => 'Soluciones de seguridad integral para empresas y hogares.',
            'keywords' => 'CCTV, alarmas, control de acceso, redes, automatización',
            'og_title' => 'Norttek Solutions',
            'og_description' => 'Seguridad confiable para tu hogar y oficina.',
            'og_url' => 'https://www.norttek.com.mx/',
            'og_image' => 'https://www.norttek.com.mx/assets/img/webpage.png',
            'twitter_title' => 'Norttek Solutions',
            'twitter_description' => 'Seguridad confiable para tu hogar y oficina.',
            'twitter_image' => 'https://www.norttek.com.mx/assets/img/webpage.png'
        ],
        'pageName' => basename($_SERVER['PHP_SELF'], ".php"),
        'cssFiles' => []
    ];

    // Mezcla variables enviadas con defaults
    $variables = array_merge($defaults, $variables);

    // Convierte elementos del array en variables locales
    extract($variables);

    if(file_exists($file)) {
        include $file;
    } else {
        echo "<!-- Template $templateName not found -->";
    }
}

/**
 * Renderiza un componente FAQ a partir de un archivo JSON arbitrario.
 * El JSON debe ser un array de objetos con "pregunta", "respuesta", "icono" (opcional), "imagen" (opcional).
 * Uso: echo renderFAQComponent('/ruta/faq.json', ['title' => 'Preguntas Frecuentes']);
 * 
 * @param string $jsonFile Ruta absoluta al archivo JSON
 * @param array $options Opciones como 'title'
 * @return string HTML renderizado del componente FAQ
 */
function renderFAQComponent($jsonFile, $options = []) {
    $title = isset($options['title']) ? htmlspecialchars($options['title']) : 'Preguntas Frecuentes';
    $iconoGenerico = 'fas fa-question-circle';

    if (!file_exists($jsonFile)) {
        return "<!-- FAQ JSON file not found: {$jsonFile} -->";
    }

    $faqs = json_decode(file_get_contents($jsonFile), true);
    if (!is_array($faqs)) {
        return "<!-- FAQ JSON invalid format: {$jsonFile} -->";
    }

    ob_start();
    ?>
    <section class="faq-component max-w-2xl mx-auto my-8">
        <h2 class="text-2xl font-bold mb-4 text-blue-700"><?= $title ?></h2>
        <div class="faq-list divide-y divide-gray-200">
            <?php foreach ($faqs as $i => $faq): 
                $icono = !empty($faq['icono']) ? htmlspecialchars($faq['icono']) : $iconoGenerico;
                $pregunta = isset($faq['pregunta']) ? htmlspecialchars($faq['pregunta']) : '';
                $respuesta = isset($faq['respuesta']) ? nl2br(htmlspecialchars($faq['respuesta'])) : '';
                // Si hay imagen, la incrusta al final de la respuesta
                if (!empty($faq['imagen'])) {
                    $imgSrc = htmlspecialchars($faq['imagen']);
                    $respuesta .= '<div class="mt-3"><img src="'.$imgSrc.'" alt="Imagen relacionada" class="rounded shadow max-h-40 mx-auto"></div>';
                }
            ?>
                <!-- Cada pregunta frecuente se muestra como un <details> para accesibilidad y UX -->
                <details class="py-3 group" <?= $i === 0 ? 'open' : '' ?>>
                    <summary class="cursor-pointer font-semibold text-gray-800 flex items-center justify-between gap-2">
                        <span>
                            <i class="<?= $icono ?> text-blue-500 mr-2"></i><?= $pregunta ?>
                        </span>
                        <span class="ml-2 transition-transform group-open:rotate-90">&#9654;</span>
                    </summary>
                    <div class="mt-2 text-gray-600"><?= $respuesta ?></div>
                </details>
            <?php endforeach; ?>
        </div>
    </section>
    <style>
        /* Rota el icono de flecha cuando el <details> está abierto */
        .faq-component details[open] summary span:last-child {
            transform: rotate(90deg);
        }
        .faq-component summary::-webkit-details-marker { display: none; }
        .faq-component img { max-width: 100%; height: auto; }
    </style>
    <?php
    return ob_get_clean();
}

/**
 * faq: genera una sección de Preguntas Frecuentes a partir de un JSON.
 * - $id: slug/identificador del FAQ, se usará también como anchor (id del <section>)
 * - $opts:
 *    - title: título visible (por defecto "Preguntas frecuentes")
 *    - json: ruta JSON alternativa (por defecto busca en includes/json/{id}.json, includes/json/faq-{id}.json o includes/json/faqs/{id}.json)
 *    - containerClass: clases extra para el <section>
 *
 * Estructura JSON esperada: [ { "q": "Pregunta", "a": "Respuesta (HTML permitido)" }, ... ]
 */
function faq(string $id, array $opts = []): string {
    $title   = $opts['title'] ?? 'Preguntas frecuentes';
    $cClass  = $opts['containerClass'] ?? '';
    $paths   = [];

    if (!empty($opts['json'])) {
        $paths[] = $opts['json'];
    }
    $base = __DIR__ . '/json/';
    $paths[] = $base . $id . '.json';
    $paths[] = $base . 'faq-' . $id . '.json';
    $paths[] = $base . 'faqs/' . $id . '.json';

    $data = [];
    $src  = null;
    foreach ($paths as $p) {
        if (is_string($p) && is_file($p)) { $src = $p; break; }
    }
    if ($src) {
        $raw  = file_get_contents($src);
        $data = json_decode($raw, true);
        if (!is_array($data)) $data = [];
    }

    if (!$data) {
        // Mensaje suave si no hay datos
        $safeId = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
        return '<section id="' . $safeId . "\" class=\"nt-faq container {$cClass}\"><div class=\"nt-faq-header\"><h2 class=\"nt-faq-title\"><i class=\"fa-solid fa-circle-question\" aria-hidden=\"true\"></i> " . htmlspecialchars($title) . "</h2><p class=\"nt-faq-sub\">No hay preguntas registradas por el momento.</p></div></section>";
    }

    // JSON-LD
    $faqEntities = array_map(function ($it) {
        return [
            '@type' => 'Question',
            'name'  => isset($it['q']) ? strip_tags($it['q']) : '',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => isset($it['a']) ? $it['a'] : ''
            ],
        ];
    }, $data);

    $safeId = preg_replace('/[^a-z0-9\-\_]/i', '-', $id);
    $safeId = trim($safeId, '-');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

    // Construcción del listado
    $itemsHtml = '';
    foreach ($data as $i => $it) {
        $q = $it['q'] ?? '';
        $a = $it['a'] ?? '';
        $qid = $safeId . '-q-' . ($i + 1);
        $aid = $safeId . '-a-' . ($i + 1);
        $itemsHtml .= '
        <article class="nt-faq-item" role="listitem" id="'.htmlspecialchars($qid).'">
          <h3 class="nt-faq-q">
            <button type="button" class="nt-faq-toggle" aria-expanded="false" aria-controls="'.htmlspecialchars($aid).'" data-faq-toggle>
              <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
              <span class="nt-faq-q-text">'. $q .'</span>
            </button>
          </h3>
          <div id="'.htmlspecialchars($aid).'" class="nt-faq-a" role="region" aria-labelledby="'.htmlspecialchars($qid).'" hidden>
            <div class="nt-faq-a-inner">'. $a .'</div>
          </div>
        </article>';
    }

    // Encabezado (usa nt_heading si existe)
    if (function_exists('nt_heading')) {
        $heading = nt_heading($safeTitle, 'fa-solid fa-circle-question', 'md', '', ['class'=>'nt-heading-accent-bar']);
    } else {
        $heading = '<h2 class="nt-faq-title"><i class="fa-solid fa-circle-question" aria-hidden="true"></i> '.$safeTitle.'</h2>';
    }

    // CSS/JS inline de respaldo (solo una vez por página)
    static $faqAssetsInjected = false;
    $inlineAssets = '';
    if (!$faqAssetsInjected) {
        $faqAssetsInjected = true;
        $inlineAssets = <<<HTML
<style>
/* FAQ — look & feel moderno (inline fallback) */
.nt-faq{max-width:1100px;margin-inline:auto;padding:2rem 1rem}
.nt-faq-header{display:grid;gap:.75rem;margin-bottom:1rem}
.nt-faq-title{display:flex;align-items:center;gap:.6rem;font-size:clamp(1.25rem,1rem + 1vw,1.8rem);margin:0}
.nt-faq-title i{color:#0a4bff}
.nt-faq-tools{display:flex;flex-wrap:wrap;gap:.5rem .75rem;align-items:center;justify-content:space-between}
.nt-faq-search{display:inline-flex;align-items:center;gap:.5rem;background:#f4f7ff;border:1px solid #e3eafe;border-radius:12px;padding:.4rem .6rem;min-width:min(420px,100%);flex:1}
.nt-faq-search input{border:0;background:transparent;outline:0;width:100%;padding:.25rem;font-size:.98rem;color:#0b1739}
.nt-faq-actions{display:inline-flex;gap:.5rem}
.nt-faq-btn{display:inline-flex;align-items:center;gap:.45rem;border-radius:10px;padding:.5rem .8rem;font-weight:600;border:1px solid #dbe6ff;background:#eef3ff;color:#002c99;cursor:pointer;transition:background .2s ease,transform .15s ease}
.nt-faq-btn:hover{background:#e4eeff;transform:translateY(-1px)}
.nt-faq-btn.ghost{background:#fff;color:#274472}
.nt-faq-list{display:grid;gap:.75rem}
.nt-faq-item{background:#fff;border:1px solid #e8ecf3;border-radius:14px;overflow:clip;box-shadow:0 6px 18px rgba(2,24,84,.06)}
.nt-faq-q{margin:0}
.nt-faq-toggle{width:100%;text-align:left;display:grid;grid-template-columns:24px 1fr;align-items:center;gap:.6rem;padding:.9rem 1rem;border:0;background:linear-gradient(180deg,#fafdff,#f3f7ff);color:#0b1739;font-weight:700;cursor:pointer}
.nt-faq-toggle i{color:#5f76ff;transition:transform .25s ease}
.nt-faq-toggle[aria-expanded="true"] i{transform:rotate(-180deg)}
.nt-faq-a{border-top:1px solid #eef2fa;background:#fff}
.nt-faq-a-inner{padding:.9rem 1rem;color:#263043;line-height:1.55}
.nt-faq-item.highlight{outline:2px solid #9ab6ff;outline-offset:2px;animation:faqPulse 2.2s ease-in-out 1}
@keyframes faqPulse{0%{box-shadow:0 0 0 0 rgba(10,75,255,.18)}60%{box-shadow:0 0 0 8px rgba(10,75,255,0)}100%{box-shadow:0 0 0 0 rgba(10,75,255,0)}}
.nt-faq-a[aria-hidden="false"],.nt-faq-a:not([hidden]){animation:faqReveal .35s ease both}
@keyframes faqReveal{from{opacity:0;transform:translateY(-4px)}to{opacity:1;transform:translateY(0)}}
.nt-faq-toggle:focus-visible{outline:3px solid #9ab6ff;outline-offset:2px}
@media (prefers-reduced-motion:reduce){.nt-faq-toggle i{transition:none}.nt-faq-a[aria-hidden="false"],.nt-faq-a:not([hidden]){animation:none}}
</style>
<script>
(function(){
  const lists=document.querySelectorAll('[data-faq-list]'); if(!lists.length) return;
  const norm=s=>s.toLowerCase().normalize('NFD').replace(/\\p{Diacritic}/gu,'');
  const setExpanded=(btn,expand)=>{
    const id=btn.getAttribute('aria-controls'); const panel=document.getElementById(id);
    btn.setAttribute('aria-expanded', expand?'true':'false');
    if(expand){ panel.hidden=false; panel.setAttribute('aria-hidden','false'); }
    else{ panel.hidden=true; panel.setAttribute('aria-hidden','true'); }
  };
  lists.forEach(list=>{
    const section=list.closest('.nt-faq');
    const search=section.querySelector('[data-faq-search]');
    const btnExpand=section.querySelector('[data-faq-expand]');
    const btnCollapse=section.querySelector('[data-faq-collapse]');
    const items=[...list.querySelectorAll('.nt-faq-item')];
    const toggles=items.map(it=>it.querySelector('[data-faq-toggle]'));
    // Click/teclado
    list.addEventListener('click',ev=>{
      const btn=ev.target.closest('[data-faq-toggle]'); if(!btn) return;
      const exp=btn.getAttribute('aria-expanded')==='true'; setExpanded(btn,!exp);
      const host=btn.closest('.nt-faq-item'); if(host?.id) history.replaceState(null,'','#'+host.id);
    });
    list.addEventListener('keydown',ev=>{
      if(!['Enter',' '].includes(ev.key)) return;
      const btn=ev.target.closest('[data-faq-toggle]'); if(!btn) return; ev.preventDefault(); btn.click();
    });
    // Buscar
    if(search){
      let last='';
      const doFilter=()=>{
        const q=norm(search.value||''); if(q===last) return; last=q;
        items.forEach(it=>{
          const txt=norm(it.textContent||''); const match=q.length<2?true:txt.includes(q);
          it.style.display=match?'':'none';
        });
      };
      search.addEventListener('input',doFilter);
    }
    // Expand/Collapse
    if(btnExpand) btnExpand.addEventListener('click',()=>toggles.forEach(b=>setExpanded(b,true)));
    if(btnCollapse) btnCollapse.addEventListener('click',()=>toggles.forEach(b=>setExpanded(b,false)));
    // Deep-link por hash
    const openByHash=()=>{
      const id=decodeURIComponent(location.hash||'').replace('#',''); if(!id) return;
      const target=document.getElementById(id);
      if(target && target.classList.contains('nt-faq-item')){
        const btn=target.querySelector('[data-faq-toggle]'); setExpanded(btn,true);
        target.classList.add('highlight'); setTimeout(()=>target.classList.remove('highlight'),1600);
        target.scrollIntoView({behavior:'smooth',block:'start'});
      }
    };
    window.addEventListener('hashchange',openByHash); setTimeout(openByHash,50);
  });
})();
</script>
HTML;
    }

    // Herramientas (search + expand/collapse)
    $tools = '
      <div class="nt-faq-tools" role="toolbar" aria-label="Herramientas de FAQ">
        <label class="nt-faq-search">
          <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
          <input type="search" placeholder="Buscar en las preguntas..." aria-label="Buscar preguntas" data-faq-search>
        </label>
        <div class="nt-faq-actions">
          <button type="button" class="nt-faq-btn" data-faq-expand title="Expandir todo" aria-label="Expandir todo">
            <i class="fa-solid fa-square-plus" aria-hidden="true"></i> Expandir
          </button>
          <button type="button" class="nt-faq-btn ghost" data-faq-collapse title="Colapsar todo" aria-label="Colapsar todo">
            <i class="fa-solid fa-square-minus" aria-hidden="true"></i> Colapsar
          </button>
        </div>
      </div>';

    // Ensamblado final
    $html = '
    <section id="'.htmlspecialchars($safeId).'" class="nt-faq container '.htmlspecialchars($cClass).'" aria-labelledby="'.htmlspecialchars($safeId).'-title">
      <header class="nt-faq-header">
        '. $heading .'
        '. $tools .'
      </header>
      <div class="nt-faq-list" role="list" data-faq-list>
        '. $itemsHtml .'
      </div>
      <script type="application/ld+json">'. json_encode([
          '@context' => 'https://schema.org',
          '@type'    => 'FAQPage',
          'mainEntity' => $faqEntities
      ], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) .'</script>
    </section>' . $inlineAssets;

    return $html;
}

/**
 * Renderiza una alerta contextual usando el sistema de clases .nt-alert.
 * @param string $type info|success|warning|danger
 * @param string $message HTML o texto del mensaje (se escapa por defecto, usar $raw=true para HTML confiable)
 * @param bool $dismissible (reservado para futura implementación de cierre)
 * @param bool $raw Si true no escapa $message (solo contenido seguro)
 * @return string
 */
function nt_alert($type = 'info', $message = '', $dismissible = false, $raw = false){
    $allowed = ['info','success','warning','danger'];
    if(!in_array($type,$allowed,true)) $type='info';
    $cls = 'nt-alert nt-alert-' . $type;
    $iconMap = [
        'info' => 'fa-solid fa-circle-info',
        'success' => 'fa-solid fa-circle-check',
        'warning' => 'fa-solid fa-triangle-exclamation',
        'danger' => 'fa-solid fa-circle-exclamation'
    ];
    $icon = $iconMap[$type];
    $msg = $raw ? $message : htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    return "<div class='$cls'><i class='$icon'></i><div class='nt-alert-body'>$msg</div></div>";
}

/**
 * Componente Timeline reutilizable.
 * @param array $events Lista de eventos: [['year'=>2020,'title'=>'Título','text'=>'Descripción']]
 * @param array $opts ['title'=>..., 'subtitle'=>..., 'icon'=>...]
 * @return string HTML
 */
function nt_timeline(array $events, array $opts = []): string {
    if(empty($events)) return '<!-- nt_timeline: sin eventos -->';
    $title = $opts['title'] ?? null;
    $subtitle = $opts['subtitle'] ?? null;
    $icon = $opts['icon'] ?? 'fa-solid fa-route';
    ob_start(); ?>
    <section class="nt-section nt-timeline">
    <?php if($title){ echo nt_heading($title, $icon, 'md', $subtitle, ['animate'=>true]); } ?>
        <div class="nt-timeline-track">
            <?php foreach($events as $ev):
                $year = htmlspecialchars((string)($ev['year'] ?? ''), ENT_QUOTES,'UTF-8');
                $t = htmlspecialchars((string)($ev['title'] ?? ''), ENT_QUOTES,'UTF-8');
                $txt = htmlspecialchars((string)($ev['text'] ?? ''), ENT_QUOTES,'UTF-8');
            ?>
            <div class="nt-timeline-item nt-fade-in">
                <div class="nt-timeline-badge"><?=$year?></div>
                <div class="nt-timeline-content">
                    <h4 class="nt-timeline-title"><?=$t?></h4>
                    <p class="nt-timeline-text"><?=$txt?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php return ob_get_clean();
}
?>
