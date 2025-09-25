<?php
// Navbar remasterizado 2025
$current = basename($_SERVER['PHP_SELF'], '.php');
$activePage = $current === 'index' ? 'inicio' : $current;

$business_address   = 'Av. Rayon y Agustin Melgar, Cuauhtemoc';
$business_phone_raw = '+52 (625) 269-0997';
$business_phone_tel = '+526252690997';
$google_maps_link   = 'https://maps.app.goo.gl/Q6XmT59jjiWULAWu5?g_st=aw';

// Menú con descripciones para mega panel de servicios
$menu = [
    [ 'label'=>'Inicio','icon'=>'fa-solid fa-house','url'=>'/' ],
    [ 'label'=>'Nosotros','icon'=>'fa-solid fa-users','url'=>'about' ],
    [
        'label'=>'Servicios','icon'=>'fa-solid fa-layer-group','url'=>'#','children'=>[
            ['label'=>'Seguridad y CCTV','icon'=>'fa-solid fa-video','url'=>'cctv','desc'=>'Monitoreo, grabación y vigilancia inteligente.'],
            ['label'=>'Alarmas Inteligentes','icon'=>'fa-solid fa-bell','url'=>'alarma','desc'=>'Sensores, alertas móviles y respuesta rápida.'],
            ['label'=>'Control de Acceso','icon'=>'fa-solid fa-key','url'=>'control-acceso','desc'=>'Biométrico, tarjetas, QR y auditoría.'],
            ['label'=>'Redes y Cableado','icon'=>'fa-solid fa-network-wired','url'=>'networks','desc'=>'Infraestructura, switching y cableado estructurado.'],
            ['label'=>'Telefonía IP','icon'=>'fa-solid fa-phone-volume','url'=>'telefonia','desc'=>'PBX en la nube, extensiones y comunicación unificada.'],
            ['label'=>'Interfón / Telefonía','icon'=>'fa-solid fa-headset','url'=>'interfon','desc'=>'Intercomunicación y atención remota.'],
        ]
    ],
    [ 'label'=>'Herramientas','icon'=>'fa-solid fa-screwdriver-wrench','url'=>'cartuchos' ],
    [ 'label'=>'Contacto','icon'=>'fa-solid fa-envelope','url'=>'contact' ],
];

// Helper de clase activa
function nt_is_active($itemUrl, $activePage){
    $base = trim($itemUrl,'/');
    if($base === '' || $base === '/') return $activePage==='inicio';
    return basename($base,'.php') === $activePage;
}
?>

<header id="site-header" class="nt-nav-shell fixed top-0 left-0 w-full z-50 transition-all duration-300">
    <div class="nt-nav-backdrop absolute inset-0 -z-10"></div>
    <!-- Barra superior compacta (info util + mini CTA) -->
    <div class="nt-nav-top hidden xl:flex items-center justify-between px-10 gap-6 text-xs tracking-wide nt-nav-top-anim">
        <div class="flex items-center gap-2 text-[11px] text-gray-500">
            <span class="hidden 2xl:inline">Innovando seguridad y comunicación · 2015—<?= date('Y') ?></span>
        </div>
        <div class="flex items-center gap-6">
            <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-blue-600"></i><?= $business_address ?></span>
            <a href="tel:<?= $business_phone_tel ?>" class="flex items-center gap-2 hover:underline"><i class="fa-solid fa-phone text-blue-600"></i><?= $business_phone_raw ?></a>
            <a href="<?= $google_maps_link ?>" target="_blank" class="nt-btn nt-btn-outline" style="--_border:linear-gradient(135deg,#c8daec,#a7c6e2);font-size:.6rem;padding:.35rem .6rem;"> <i class="fa-solid fa-map"></i><span>Ubicación</span></a>
            <button id="theme-toggle-desktop" class="nt-btn nt-btn-outline icon-only" aria-label="Cambiar tema" style="padding:.45rem .55rem;"><i class="fa-solid fa-moon"></i></button>
        </div>
    </div>

    <!-- Línea principal -->
    <div class="nt-nav-main flex items-center justify-between px-4 md:px-8 py-2 gap-6">
        <!-- Logo -->
    <a href="/" class="flex items-center gap-2 shrink-0 group leading-none" aria-label="Inicio Norttek Solutions">
            <img src="assets/img/logo-norttek.png" alt="Norttek" class="nt-logo w-12 md:w-14 h-auto drop-shadow transition-all duration-300" loading="lazy">
            <span class="hidden sm:inline text-base md:text-lg font-semibold tracking-tight text-slate-800 group-hover:text-slate-900 dark:text-slate-100">Norttek Solutions</span>
        </a>

        <!-- Menú Desktop -->
    <nav class="nt-primary-nav hidden lg:flex items-center gap-1" aria-label="Principal">
            <?php foreach($menu as $item): ?>
                <?php $isActive = nt_is_active($item['url'], $activePage) || (!empty($item['children']) && array_filter($item['children'], fn($c)=>nt_is_active($c['url'],$activePage))); ?>
                <?php if(isset($item['children'])): ?>
                    <div class="nt-nav-item has-panel relative">
                        <button class="nt-nav-link <?= $isActive?'is-active':'' ?>" aria-haspopup="true" aria-expanded="false" aria-controls="panel-servicios">
                            <i class="<?= $item['icon'] ?>"></i><span class="lbl"><?= $item['label'] ?></span><i class="fa-solid fa-chevron-down caret"></i>
                        </button>
                        <!-- Mega panel -->
                        <div id="panel-servicios" class="nt-nav-panel" role="menu" aria-label="Servicios">
                            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                <?php foreach($item['children'] as $child): $childActive = nt_is_active($child['url'],$activePage); ?>
                                    <a href="/<?= $child['url'] ?>" class="nt-panel-link <?= $childActive?'active':'' ?>" role="menuitem">
                                        <span class="icon"><i class="<?= $child['icon'] ?>"></i></span>
                                        <span class="meta">
                                            <span class="t"><?= $child['label'] ?></span>
                                            <?php if(!empty($child['desc'])): ?><span class="d"><?= $child['desc'] ?></span><?php endif; ?>
                                        </span>
                                        <i class="fa-solid fa-angle-right arrow"></i>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?= strpos($item['url'],'/')===0? $item['url'] : '/'.$item['url'] ?>" class="nt-nav-link <?= $isActive?'is-active':'' ?>" aria-current="<?= $isActive?'page':'false' ?>">
                        <i class="<?= $item['icon'] ?>"></i><span class="lbl"><?= $item['label'] ?></span>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>

        <!-- Acciones derecha -->
        <div class="flex items-center gap-2 md:gap-3">
            <!-- Buscador compacto -->
            <form id="nav-search" class="nt-nav-search" role="search" method="get" action="/search.php" aria-label="Buscar en el sitio" data-track="nav-search">
                <button type="button" class="search-trigger" aria-label="Abrir búsqueda" tabindex="0"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="text" name="q" placeholder="Buscar..." aria-label="Término de búsqueda" autocomplete="off" />
            </form>
            <a href="https://tienda.norttek.com.mx" target="_blank" class="nt-btn nt-btn-primary hidden md:inline-flex" style="font-size:.72rem; padding:.55rem .85rem;" data-track="nav" data-item="tienda" data-action="open" data-label="tienda-top">
                <i class="fa-solid fa-bag-shopping"></i><span>Tienda</span>
            </a>
            <a href="/contact" class="nt-btn nt-btn-outline hidden xl:inline-flex" style="font-size:.7rem;padding:.55rem .85rem;" data-track="nav" data-item="contacto" data-action="navigate" data-label="contacto-top">
                <i class="fa-solid fa-comments"></i><span>Contacto</span>
            </a>
            <button id="mobile-open" class="lg:hidden nt-btn nt-btn-outline icon-only" aria-label="Menú móvil" data-track="nav" data-item="menu-mobile" data-action="open"><i class="fa-solid fa-bars"></i></button>
        </div>
    </div>
</header>

<!-- Drawer móvil -->
<div id="nt-mobile-overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 opacity-0 invisible transition-opacity duration-300"></div>
<aside id="nt-mobile-drawer" class="fixed top-0 left-0 h-full w-[300px] max-w-[85%] bg-white dark:bg-[#101d2b] shadow-2xl z-50 -translate-x-full transition-transform duration-300 flex flex-col">
    <div class="flex items-center justify-between px-4 py-4 border-b border-slate-200 dark:border-slate-700">
        <span class="font-bold tracking-wide text-slate-800 dark:text-slate-100">Menú</span>
        <button id="mobile-close" class="nt-btn nt-btn-outline icon-only" aria-label="Cerrar menú"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="px-4 py-3 border-b border-slate-200 dark:border-slate-700 space-y-2 text-[13px] text-slate-600 dark:text-slate-300">
        <div class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-blue-600"></i><span><?= $business_address ?></span></div>
        <a href="tel:<?= $business_phone_tel ?>" class="flex items-center gap-2 hover:text-blue-600"><i class="fa-solid fa-phone text-blue-600"></i><?= $business_phone_raw ?></a>
        <a href="<?= $google_maps_link ?>" target="_blank" class="nt-btn nt-btn-outline w-full justify-center" style="font-size:.65rem;padding:.45rem .6rem;">
            <i class="fa-solid fa-map"></i><span>Ubicación</span>
        </a>
        <button id="theme-toggle-mobile" class="nt-btn nt-btn-outline w-full justify-center" style="font-size:.65rem;padding:.45rem .6rem;" aria-label="Cambiar tema">
            <i class="fa-solid fa-moon"></i><span>Tema</span>
        </button>
        <form id="mobile-search" class="nt-mobile-search" role="search" method="get" action="/search.php" data-track="nav-search-mobile">
            <div class="field">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="q" placeholder="Buscar..." aria-label="Buscar" autocomplete="off" />
            </div>
        </form>
    </div>
    <nav class="flex-1 overflow-y-auto py-3" aria-label="Menú móvil">
        <ul class="px-2 space-y-1">
            <?php $__mobiIndex=0; foreach($menu as $item): $isActive = nt_is_active($item['url'],$activePage); ?>
                <li>
                    <?php if(isset($item['children'])): $subId='m-sub-'.($__mobiIndex++); ?>
                        <button class="nt-mobile-parent w-full" data-mobile-panel aria-expanded="false" aria-controls="<?= $subId ?>">
                            <span class="flex items-center gap-2"><i class="<?= $item['icon'] ?>"></i><span><?= $item['label'] ?></span></span>
                            <i class="fa-solid fa-chevron-down caret" aria-hidden="true"></i>
                        </button>
                        <ul class="nt-mobile-sub" id="<?= $subId ?>" hidden role="group" aria-label="Submenú <?= htmlspecialchars($item['label'],ENT_QUOTES) ?>">
                            <?php foreach($item['children'] as $child): $childActive=nt_is_active($child['url'],$activePage); ?>
                                <li>
                                    <a href="/<?= $child['url'] ?>" class="nt-mobile-link <?= $childActive?'active':'' ?>">
                                        <i class="<?= $child['icon'] ?>"></i><span><?= $child['label'] ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <a href="<?= strpos($item['url'],'/')===0? $item['url'] : '/'.$item['url'] ?>" class="nt-mobile-link <?= $isActive?'active':'' ?>">
                            <i class="<?= $item['icon'] ?>"></i><span><?= $item['label'] ?></span>
                        </a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <div class="p-4 border-t border-slate-200 dark:border-slate-700 space-y-2">
        <a href="https://tienda.norttek.com.mx" target="_blank" class="nt-btn nt-btn-primary w-full justify-center" style="font-size:.7rem;">
            <i class="fa-solid fa-bag-shopping"></i><span>Abrir Tienda</span>
        </a>
        <a href="/contact" class="nt-btn nt-btn-outline w-full justify-center" style="font-size:.7rem;">
            <i class="fa-solid fa-envelope-open-text"></i><span>Escríbenos</span>
        </a>
    </div>
</aside>

<style>
/* ================= NAVBAR REWORK (scoped) ================ */
.nt-main-shell { padding-top: 150px; }
@media (max-width:1279px){ .nt-main-shell { padding-top: 108px; } }
@media (max-width:1023px){ .nt-main-shell { padding-top: 92px; } }
/* Cuando navbar contraído por scroll reducimos espacio visual extra */
.nt-nav-shell.scrolled ~ main.nt-main-shell { padding-top: 120px; }
@media (max-width:1279px){ .nt-nav-shell.scrolled ~ main.nt-main-shell { padding-top: 96px; } }
@media (max-width:1023px){ .nt-nav-shell.scrolled ~ main.nt-main-shell { padding-top: 86px; } }
.nt-nav-shell { backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px); }
.nt-nav-backdrop { background: linear-gradient(135deg,rgba(255,255,255,.82),rgba(255,255,255,.65)); border-bottom:1px solid rgba(180,200,220,.4); }
html.dark .nt-nav-backdrop { background: linear-gradient(135deg,rgba(16,29,43,.88),rgba(18,38,56,.7)); border-color:#203349; }
.nt-nav-top { height:32px; font-weight:500; color:#4a5b70; }
html.dark .nt-nav-top { color:#90a4b8; }
.nt-nav-top-anim { will-change: transform, opacity; animation: ntTopBarIn .75s cubic-bezier(.4,.8,.4,1); }
@keyframes ntTopBarIn { 0% { opacity:0; transform: translateY(-14px) scale(.98); filter:blur(4px);} 60% { opacity:1; filter:blur(0);} 100% { transform: translateY(0) scale(1); } }
/* Cuando se oculta por scroll: transición propia */
.nt-nav-shell.scrolled .nt-nav-top { transition: transform .55s cubic-bezier(.55,.1,.35,1), opacity .45s ease; }
.nt-nav-shell.scrolled .nt-nav-top:not(.force-visible){ transform:translateY(-120%); opacity:0; }
.nt-nav-shell:not(.scrolled) .nt-nav-top { transform:translateY(0); opacity:1; }
.nt-nav-main { position:relative; display:flex; align-items:center; min-height:82px; }
.nt-nav-shell.scrolled .nt-nav-main { padding-top:.15rem; padding-bottom:.15rem; transition:padding .35s ease, min-height .35s ease; min-height:60px; }
.nt-primary-nav { font-size:.78rem; }
.nt-nav-shell.scrolled .nt-primary-nav { font-size:.72rem; transition:font-size .35s ease; }
.nt-nav-link { position:relative; display:inline-flex; align-items:center; gap:.55rem; padding:.55rem .95rem; font-weight:700; color:#2a516d; border-radius:8px; line-height:1.05; letter-spacing:.4px; transition:.25s; background:transparent; cursor:pointer; }
.nt-nav-link i, .nt-nav-link .lbl, .nt-nav-link .caret { line-height:1; display:inline-flex; align-items:center; }
.nt-nav-shell.scrolled .nt-nav-link { padding:.4rem .6rem; }
.nt-nav-link i { font-size:.95em; }
.nt-nav-link .caret { font-size:.6rem; opacity:.6; transition:transform .3s; }
.nt-logo { transform-origin:left center; }
.nt-nav-shell.scrolled .nt-logo { width:2.1rem; }
.nt-nav-link .lbl { display:inline; }
.nt-nav-link:hover { color:#174261; background:rgba(0,0,0,.04); }
.nt-nav-link.is-active { color:#0f3f76; background:linear-gradient(#fff,#fff) padding-box,var(--nt-gradient-border) border-box; border:1px solid transparent; box-shadow:0 4px 8px rgba(15,23,42,.06); }
html.dark .nt-nav-link { color:#b5c8d9; }
html.dark .nt-nav-link:hover { background:rgba(255,255,255,.06); color:#fff; }
html.dark .nt-nav-link.is-active { color:#fff; background:linear-gradient(var(--nt-surface),var(--nt-surface)) padding-box,var(--nt-gradient-border) border-box; }

/* Mega panel */
.nt-nav-item { --panel-w: 900px; }
.nt-nav-item .nt-nav-panel { position:absolute; left:50%; top:100%; transform:translate(-50%,14px); width:var(--panel-w); max-width:calc(100vw - 2rem); background:linear-gradient(#fff,#f5f9fc); border:1px solid #d8e4ef; border-radius:18px; padding:1.1rem 1.25rem 1.4rem; box-shadow:0 24px 48px -12px rgba(15,23,42,.18), 0 4px 10px rgba(15,23,42,.06); opacity:0; visibility:hidden; transition:.35s cubic-bezier(.4,.8,.4,1); z-index:60; }
.nt-nav-item .nt-nav-panel:before { content:""; position:absolute; top:-8px; left:50%; width:18px; height:18px; background:#fff; border:1px solid #d8e4ef; border-bottom:none; border-right:none; transform:translateX(-50%) rotate(45deg); }
html.dark .nt-nav-item .nt-nav-panel { background:linear-gradient(#132435,#101d2b); border-color:#203349; }
html.dark .nt-nav-item .nt-nav-panel:before { background:#132435; border-color:#203349; }
.nt-nav-item.open > .nt-nav-link .caret { transform:rotate(180deg); }
.nt-nav-item.open > .nt-nav-panel { opacity:1; visibility:visible; transform:translate(-50%,8px); }

.nt-panel-link { position:relative; display:flex; align-items:flex-start; gap:.75rem; padding:.75rem .85rem; border-radius:14px; text-decoration:none; background:linear-gradient(#ffffff,#f7fbff); border:1px solid #e1ebf4; box-shadow:0 2px 6px rgba(15,23,42,.04); transition:.3s; }
.nt-panel-link .icon { width:38px; height:38px; flex:0 0 38px; border-radius:12px; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,var(--nt-primary),var(--nt-primary-strong)); color:#fff; font-size:1rem; box-shadow:0 4px 10px var(--nt-ring); }
.nt-panel-link .meta { display:flex; flex-direction:column; gap:.15rem; }
.nt-panel-link .t { font-weight:700; font-size:.8rem; letter-spacing:.4px; color:#123652; }
.nt-panel-link .d { font-size:.65rem; line-height:1.25; color:#4d6a80; max-width:240px; }
.nt-panel-link .arrow { margin-left:auto; font-size:.7rem; opacity:0; transform:translateX(-4px); transition:.3s; color:#1c4d6f; }
.nt-panel-link:hover { transform:translateY(-4px); background:linear-gradient(#fff,#eef5ff); border-color:#cddbea; box-shadow:0 10px 24px -6px rgba(15,23,42,.20),0 3px 8px rgba(15,23,42,.08); }
.nt-panel-link:hover .arrow { opacity:1; transform:translateX(0); }
.nt-panel-link.active { border-color: var(--nt-primary-strong); box-shadow:0 0 0 2px var(--nt-ring),0 4px 10px rgba(15,23,42,.1); }
html.dark .nt-panel-link { background:linear-gradient(#16293a,#132435); border-color:#203349; }
html.dark .nt-panel-link .t { color:#d6e6f2; }
html.dark .nt-panel-link .d { color:#8eabc2; }
html.dark .nt-panel-link:hover { background:linear-gradient(#1d3650,#16293a); }
html.dark .nt-panel-link .arrow { color:#9bc4ff; }
.nt-panel-link.active .icon { box-shadow:0 0 0 3px var(--nt-ring); }

/* Active icon pulse */
@keyframes navPulse { 0%{ box-shadow:0 0 0 0 rgba(111,164,255,.55);} 70%{ box-shadow:0 0 0 14px rgba(111,164,255,0);} 100%{ box-shadow:0 0 0 0 rgba(111,164,255,0);} }
.nt-panel-link.active .icon { animation: navPulse 2.2s ease-in-out infinite; }
html.dark .nt-panel-link.active .icon { animation: navPulse 2.2s ease-in-out infinite; }

/* Compact search (desktop) */
.nt-nav-search { position:relative; width:40px; height:34px; display:flex; align-items:center; justify-content:center; border:1px solid #d2e0ec; border-radius:999px; background:linear-gradient(#ffffff,#f4f9fd); box-shadow:0 2px 4px rgba(15,23,42,.08); transition: width .35s cubic-bezier(.4,.8,.4,1), background .35s; overflow:hidden; }
.nt-nav-search button { background:none; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; color:#1c4d6f; width:34px; height:34px; }
.nt-nav-search input { border:none; background:transparent; font-size:.7rem; padding:0; margin:0; width:0; opacity:0; transition:.35s; color:#123652; font-weight:600; letter-spacing:.4px; }
.nt-nav-search.open { width:210px; padding:0 .55rem 0 .4rem; }
.nt-nav-search.open input { width:100%; opacity:1; padding:.3rem .2rem; }
.nt-nav-search:hover { background:linear-gradient(#ffffff,#eef5ff); }
.nt-nav-search:focus-within { background:linear-gradient(#ffffff,#e7f0fa); border-color:#b8d2ea; box-shadow:0 0 0 4px var(--nt-ring); }
html.dark .nt-nav-search { background:linear-gradient(#132435,#101d2b); border-color:#203349; box-shadow:0 2px 6px rgba(0,0,0,.4); }
html.dark .nt-nav-search:hover { background:linear-gradient(#162c3e,#132435); }
html.dark .nt-nav-search:focus-within { border-color:#2c4a63; }
html.dark .nt-nav-search input { color:#d6e6f2; }
.nt-nav-search input::placeholder { color:#6d889b; }
html.dark .nt-nav-search input::placeholder { color:#7d97aa; }

/* Mobile search */
.nt-mobile-search { margin-top:.35rem; }
.nt-mobile-search .field { display:flex; align-items:center; gap:.4rem; background:linear-gradient(#fff,#f6f9fc); border:1px solid #d8e4ef; padding:.45rem .65rem; border-radius:12px; }
.nt-mobile-search i { color:#1c4d6f; font-size:.8rem; }
.nt-mobile-search input { flex:1; background:transparent; border:none; font:inherit; font-size:.72rem; color:#123652; }
.nt-mobile-search input:focus { outline:none; }
html.dark .nt-mobile-search .field { background:linear-gradient(#16293a,#132435); border-color:#203349; }
html.dark .nt-mobile-search i { color:#9bc4ff; }
html.dark .nt-mobile-search input { color:#d6e6f2; }

/* Mobile drawer */
#nt-mobile-drawer { font-size:.82rem; }
.nt-mobile-parent { position:relative; display:flex; align-items:center; justify-content:space-between; width:100%; padding:.7rem .9rem; font-weight:700; border:none; background:transparent; color:#27455c; border-radius:10px; transition:.25s; text-align:left; }
.nt-mobile-parent:hover, .nt-mobile-parent.open { background:rgba(0,0,0,.04); }
.nt-mobile-parent .caret { font-size:.65rem; opacity:.6; transition:transform .35s cubic-bezier(.4,.8,.4,1); }
.nt-mobile-parent.open .caret { transform:rotate(180deg); }
html.dark .nt-mobile-parent { color:#d1e2ef; }
.nt-mobile-sub { padding:.25rem .25rem .6rem 1.2rem; display:flex; flex-direction:column; gap:.2rem; }
.nt-mobile-link { display:flex; align-items:center; gap:.55rem; padding:.55rem .9rem; text-decoration:none; font-weight:600; border-radius:10px; color:#325067; position:relative; }
.nt-mobile-link:hover { background:rgba(0,0,0,.05); color:#123652; }
.nt-mobile-link.active { background:linear-gradient(#fff,#fff) padding-box,var(--nt-gradient-border) border-box; border:1px solid transparent; }
html.dark .nt-mobile-link { color:#b9ccda; }
html.dark .nt-mobile-link:hover { background:rgba(255,255,255,.07); color:#fff; }
html.dark .nt-mobile-link.active { background:linear-gradient(var(--nt-surface-alt),var(--nt-surface-alt)) padding-box,var(--nt-gradient-border) border-box; }

/* Scroll shrink */
@media (min-width:1024px){
  .nt-nav-shell.scrolled .nt-nav-top{ transform:translateY(-100%); opacity:0; pointer-events:none; }
  .nt-nav-shell.scrolled .nt-nav-backdrop{ backdrop-filter:blur(18px); }
        .nt-nav-shell.scrolled .nt-primary-nav .nt-nav-link { padding:.4rem .55rem; }
        .nt-nav-shell.scrolled .nt-primary-nav .nt-nav-link .lbl { width:0; opacity:0; margin:0; padding:0; overflow:hidden; transition:.3s; }
        .nt-nav-shell.scrolled .nt-primary-nav .nt-nav-item.has-panel .nt-nav-link .caret { display:none; }
    .nt-nav-shell.scrolled .nt-primary-nav:hover .nt-nav-link .lbl { width:auto; opacity:1; padding-left:.1rem; }
}
</style>

<script>
// =================== NAVBAR INTERACTIVO ===================
(function(){
  const shell = document.getElementById('site-header');
  const navItem = shell.querySelector('.nt-nav-item');
  const navLink = navItem ? navItem.querySelector('.nt-nav-link') : null;
  const panel = navItem ? navItem.querySelector('.nt-nav-panel') : null;
  let panelOpen = false; let closeTimer; 

  function openPanel(){ if(!navItem) return; panelOpen=true; navItem.classList.add('open'); navLink.setAttribute('aria-expanded','true'); }
  function closePanel(){ if(!navItem) return; panelOpen=false; navItem.classList.remove('open'); navLink.setAttribute('aria-expanded','false'); }

  if(navLink){
    navLink.addEventListener('click', e=>{ e.preventDefault(); panelOpen ? closePanel() : openPanel(); });
    navItem.addEventListener('mouseenter', ()=>{ clearTimeout(closeTimer); openPanel(); });
    navItem.addEventListener('mouseleave', ()=>{ closeTimer=setTimeout(closePanel,160); });
    document.addEventListener('keydown', e=>{ if(e.key==='Escape' && panelOpen){ closePanel(); navLink.focus(); }});
    document.addEventListener('click', e=>{ if(panelOpen && !navItem.contains(e.target)){ closePanel(); }});
  }

  // Scroll shrink
    function onScroll(){
        if(window.scrollY>30){ shell.classList.add('scrolled'); }
        else { shell.classList.remove('scrolled'); }
    }
  window.addEventListener('scroll', onScroll, {passive:true}); onScroll();

  // MOBILE drawer
  const drawer = document.getElementById('nt-mobile-drawer');
  const overlay = document.getElementById('nt-mobile-overlay');
  const openBtn = document.getElementById('mobile-open');
  const closeBtn = document.getElementById('mobile-close');
  const focusableSelector = 'a,button';
  let lastFocus = null;

  function openDrawer(){ lastFocus=document.activeElement; drawer.classList.remove('-translate-x-full'); overlay.classList.remove('opacity-0','invisible'); drawer.setAttribute('aria-hidden','false'); overlay.setAttribute('aria-hidden','false'); setTimeout(()=>{ const first=drawer.querySelector(focusableSelector); if(first) first.focus(); },80); }
  function closeDrawer(){ drawer.classList.add('-translate-x-full'); overlay.classList.add('opacity-0','invisible'); drawer.setAttribute('aria-hidden','true'); overlay.setAttribute('aria-hidden','true'); if(lastFocus) lastFocus.focus(); }
  if(openBtn) openBtn.addEventListener('click', openDrawer);
  if(closeBtn) closeBtn.addEventListener('click', closeDrawer);
  overlay.addEventListener('click', closeDrawer);
  document.addEventListener('keydown', e=>{ if(e.key==='Escape') closeDrawer(); });

  // Submenús móviles
    // Submenús móviles accesibles (solo uno abierto)
    drawer.querySelectorAll('[data-mobile-panel]').forEach(btn=>{
        btn.addEventListener('click',()=>{
            const subId = btn.getAttribute('aria-controls');
            const sub = subId ? document.getElementById(subId) : null;
            if(!sub) return;
            const isOpen = !sub.hasAttribute('hidden');
            // Cierra otros
            drawer.querySelectorAll('.nt-mobile-sub:not([hidden])').forEach(openSub=>{
                if(openSub === sub) return;
                openSub.setAttribute('hidden','');
                const otherBtn = drawer.querySelector('[aria-controls="'+openSub.id+'"]');
                if(otherBtn){ otherBtn.setAttribute('aria-expanded','false'); otherBtn.classList.remove('open'); }
            });
            // Toggle actual
            if(isOpen){
                sub.setAttribute('hidden','');
                btn.setAttribute('aria-expanded','false');
                btn.classList.remove('open');
            } else {
                sub.removeAttribute('hidden');
                btn.setAttribute('aria-expanded','true');
                btn.classList.add('open');
            }
        });
    });

  // Tema (íconos) reutilizando NTTheme
  function updateThemeIcons(){
    const isDark = document.documentElement.classList.contains('dark');
        document.querySelectorAll('#theme-toggle-desktop i, #theme-toggle-mobile i').forEach(ic=>{
      ic.classList.toggle('fa-moon', !isDark); ic.classList.toggle('fa-sun', isDark);
    });
  }
    ['theme-toggle-desktop','theme-toggle-mobile'].forEach(id=>{
    const btn=document.getElementById(id); if(!btn) return; btn.addEventListener('click',()=>{ if(window.NTTheme){ NTTheme.toggle(); updateThemeIcons(); }});
  });
  updateThemeIcons();

    // ============= Buscador Desktop =============
    const searchForm = document.getElementById('nav-search');
    if(searchForm){
        const trigger = searchForm.querySelector('.search-trigger');
        const input = searchForm.querySelector('input');
        function openSearch(){ searchForm.classList.add('open'); setTimeout(()=>input.focus(),50); }
        function closeSearch(){ if(!input.value){ searchForm.classList.remove('open'); input.blur(); } }
        trigger.addEventListener('click',(e)=>{ if(!searchForm.classList.contains('open')){ e.preventDefault(); openSearch(); } else if(!input.value){ closeSearch(); } else { searchForm.submit(); }});
        input.addEventListener('keydown',e=>{ if(e.key==='Escape'){ input.value=''; closeSearch(); }});
        input.addEventListener('blur',()=>{ setTimeout(closeSearch,120); });
        searchForm.addEventListener('submit',e=>{ if(!input.value.trim()){ e.preventDefault(); closeSearch(); }});
    }

    // ============= Tracking básico (console) =============
    document.querySelectorAll('[data-track]').forEach(el=>{
        el.addEventListener('click',()=>{
            if(window.NTAnalytics && typeof NTAnalytics.track==='function'){
                NTAnalytics.track({cat:el.dataset.track, item:el.dataset.item, action:el.dataset.action, label:el.dataset.label});
            } else {
                console.debug('[track]', el.dataset.track, el.dataset.item||'', el.dataset.action||'', el.dataset.label||'');
            }
        });
    });
})();
</script>
