<?php
// Lenguaje = Español
/**
 * Footer unificado (versión remasterizada)
 * Objetivos de la refactorización:
 *  - Unificar look & feel con la nueva UI (gradientes suaves, tarjetas, tipografía consistente)
 *  - Mejorar accesibilidad (roles, labels, foco, contraste)
 *  - Centralizar listado de enlaces para facilitar mantenimiento
 *  - Añadir año dinámico y estructuras semánticas limpias
 */

// Definición de bloques para mantener mantenible el footer
$servicios = [
  ['/cctv','Seguridad y CCTV','fa-video','nt-ico nt-ico-cctv'],
  ['/telefonia','Telefonía IP','fa-phone-volume','nt-ico nt-ico-telefonia'],
  ['/control-acceso','Control de Acceso','fa-door-closed','nt-ico nt-ico-acceso'],
  ['#','Redes y Cableado','fa-network-wired','nt-ico nt-ico-redes'],
  ['#','Ciberseguridad','fa-shield-halved','nt-ico nt-ico-ciber'],
];

$social = [
  ['#','Facebook','fa-facebook-f'],
  ['#','Twitter','fa-x-twitter fa-twitter'], // Ajustable a X / Twitter
  ['#','LinkedIn','fa-linkedin-in'],
  ['#','GitHub','fa-github'],
];

$anio = date('Y');
// Variante de estilo del footer: 'dark' (default) o 'light'
// Para usar la versión clara en una página específica, antes de incluir el template:
// $footerStyle = 'light';
$footerStyle = $footerStyle ?? 'light'; // ahora la variante clara es el valor por defecto
$footerVariantClass = $footerStyle === 'light' ? ' nt-footer--light' : '';
?>

    </main>
  <footer class="nt-footer font-sans relative<?= $footerVariantClass ?>" role="contentinfo" aria-label="Información corporativa y navegación secundaria">
      <div class="nt-footer-bg absolute inset-0 -z-10"></div>
      <div class="max-w-[1250px] mx-auto px-6 lg:px-10 xl:px-14 py-14">
        <div class="grid gap-12 md:gap-10 lg:gap-14 md:grid-cols-3 xl:grid-cols-5 nt-footer-grid">
          <!-- Marca / Descripción -->
          <div class="col-span-1 xl:col-span-2 flex flex-col gap-5">
            <div class="flex items-center gap-3">
              <img src="assets/img/logo-norttek.png" alt="Logo Norttek Solutions" class="h-14 w-auto drop-shadow" loading="lazy" decoding="async">
              <div class="text-sm font-semibold tracking-wide uppercase text-slate-600 dark:text-slate-300">Norttek Solutions</div>
            </div>
            <p class="text-[.82rem] leading-relaxed text-slate-600 dark:text-slate-300 max-w-md">
              Integramos <strong class="font-semibold text-slate-800 dark:text-white">seguridad, telefonía IP y redes</strong> con enfoque en continuidad operativa, alta disponibilidad y soporte profesional especializado.
            </p>
            <div class="flex gap-3 flex-wrap">
              <?php foreach($social as [$url,$label,$icon]): ?>
                <a href="<?= htmlspecialchars($url) ?>" aria-label="<?= htmlspecialchars($label) ?>" class="nt-social-btn group">
                  <i class="fa-brands <?= htmlspecialchars($icon) ?>" aria-hidden="true"></i>
                </a>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Servicios -->
          <nav class="flex flex-col gap-4" aria-label="Servicios">
            <h3 class="nt-foot-title"><i class="fa-solid fa-layer-group"></i> Servicios</h3>
            <ul class="flex flex-col gap-2 text-[.78rem] font-medium">
              <?php foreach($servicios as [$url,$txt,$icon,$cls]): ?>
                <li>
                  <a href="<?= htmlspecialchars($url) ?>" class="nt-foot-link">
                    <i class="fa-solid <?= htmlspecialchars($icon) ?> <?= htmlspecialchars($cls) ?>"></i><span><?= htmlspecialchars($txt) ?></span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </nav>

          <!-- Contacto -->
            <div class="flex flex-col gap-4">
              <h3 class="nt-foot-title"><i class="fa-solid fa-headset"></i> Contacto</h3>
              <ul class="flex flex-col gap-3 text-[.78rem] font-medium" aria-label="Datos de contacto">
                <li class="nt-foot-contact"><i class="fa-solid fa-phone"></i><a href="tel:+526252690997" rel="nofollow">+52 (625) 269 0997</a></li>
                <li class="nt-foot-contact"><i class="fa-solid fa-envelope"></i><a href="mailto:contacto@norttek.com.mx">contacto@norttek.com.mx</a></li>
                <li class="nt-foot-contact"><i class="fa-solid fa-location-dot"></i><span>Rayón y Agustín Melgar #608<br>Zona Centro · Cuauhtémoc</span></li>
                <li class="nt-foot-contact"><i class="fab fa-whatsapp"></i><a href="https://wa.me/526252690997">WhatsApp Soporte</a></li>
              </ul>
            </div>

          <!-- Newsletter / Avisos -->
          <div class="flex flex-col gap-4 xl:col-span-1">
            <h3 class="nt-foot-title"><i class="fa-solid fa-paper-plane"></i> Newsletter</h3>
            <form class="nt-news-form" aria-label="Formulario de suscripción newsletter" onsubmit="event.preventDefault(); if(window.NTNotify){ NTNotify.success('Suscripción enviada (demo)'); }">
              <label for="newsletter-email" class="sr-only">Correo</label>
              <input id="newsletter-email" type="email" required placeholder="Tu correo" class="nt-news-input" autocomplete="email" />
              <button type="submit" class="nt-news-btn">Suscribirse</button>
            </form>
            <p class="text-[.65rem] leading-relaxed text-slate-500 dark:text-slate-400 max-w-xs">
              Recibe avisos técnicos, mejoras de servicio y consejos de optimización de red.
            </p>
          </div>
        </div>

        <div class="nt-foot-divider" aria-hidden="true"></div>

        <div class="flex flex-col md:flex-row gap-4 md:items-center justify-between text-[.66rem] font-semibold tracking-wide text-slate-500 dark:text-slate-400 mt-10">
          <div class="flex flex-wrap items-center gap-3">
            <span>© <?= $anio ?> Norttek Solutions</span>
            <span class="hidden md:inline">•</span>
            <a href="#privacidad" class="nt-foot-mini-link">Aviso de privacidad</a>
            <span class="hidden md:inline">•</span>
            <a href="#" class="nt-foot-mini-link">Términos de uso</a>
          </div>
          <div class="flex items-center gap-2">
            <a href="#top" class="nt-back-top" aria-label="Volver arriba"><i class="fa-solid fa-arrow-up"></i></a>
          </div>
        </div>
      </div>
    </footer>

    <!-- Datos estructurados LocalBusiness -->
  <script type="application/ld+json">{
      "@context":"https://schema.org",
      "@type":"LocalBusiness",
      "name":"Norttek Solutions",
      "image":"https://www.norttek.com.mx/assets/img/logo-norttek.png",
      "address":{
        "@type":"PostalAddress",
        "streetAddress":"Rayón y Agustín Melgar #608, Zona Centro",
        "addressLocality":"Ciudad Cuauhtémoc",
        "postalCode":"31500",
        "addressCountry":"MX"
      },
      "telephone":"+52-625-269-0997",
      "url":"https://www.norttek.com.mx"
    }</script>

    <?php
      // Carga automática de scripts específicos declarados en la página
      global $jsFiles; if(!isset($jsFiles) || !is_array($jsFiles)) { $jsFiles = []; }
      foreach($jsFiles as $js){
        $jsFile = basename($js).'.js';
        $server = __DIR__.'/../assets/js/'.$jsFile;
        $browser = 'assets/js/'.$jsFile;
        if(file_exists($server)) {
          echo "<script src=\"$browser\" defer></script>\n"; // defer para mejor rendimiento percibido
        } else {
          echo "<!-- JS $browser no encontrado -->\n";
        }
      }
    ?>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-Iu7OGb9l8tW0JQIS+Vw8r4aQe6oB6y3n7Vj1E3IKWvQz8Qk+YxXoR37kaG0i9I5YwG4kM8MW0Cwo3uRasJ0V1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Contenedor de notificaciones -->
    <div id="nt-alert-stack" class="fixed inset-0 z-[9999] flex flex-col items-center justify-center gap-4 pointer-events-none p-4"></div>

  <script>
    // Sistema de notificaciones unificado
    window.NTNotify=(function(){
      const stack=()=>document.getElementById('nt-alert-stack');
      const variants={info:'nt-alert-info',success:'nt-alert-success',warning:'nt-alert-warning',danger:'nt-alert-danger'};
      function icon(t){ switch(t){case 'success':return 'fa-circle-check';case 'warning':return 'fa-triangle-exclamation';case 'danger':return 'fa-circle-xmark';default:return 'fa-circle-info';} }
      function push(type,html,opts={}){
        const el=document.createElement('div');
        el.className=`nt-alert shadow-lg pointer-events-auto translate-x-8 opacity-0 transition-all duration-500 ${variants[type]||variants.info}`;
        el.style.minWidth='260px'; el.style.maxWidth='380px';
        el.innerHTML=`<i class=\"fa-solid ${icon(type)}\"></i><div style=\"flex:1;\">${html}</div><button aria-label=\"Cerrar\" class=\"nt-close\" style=\"background:none;border:none;font-size:.9rem;opacity:.6;cursor:pointer;\">✕</button>`;
        stack().appendChild(el); requestAnimationFrame(()=>{ el.classList.remove('translate-x-8'); el.style.opacity=1; });
        const ttl=opts.ttl||4800; let hid=setTimeout(close,ttl);
        function close(){ el.style.opacity=0; el.style.transform='translateX(12px)'; setTimeout(()=>el.remove(),460); }
        el.querySelector('.nt-close').addEventListener('click',()=>{ clearTimeout(hid); close(); });
        el.addEventListener('mouseenter',()=>clearTimeout(hid));
        el.addEventListener('mouseleave',()=>{ hid=setTimeout(close, 1600); });
        return {close,el};
      }
      return { info:(m,o)=>push('info',m,o), success:(m,o)=>push('success',m,o), warning:(m,o)=>push('warning',m,o), danger:(m,o)=>push('danger',m,o) };
    })();
    <?php if (basename($_SERVER['PHP_SELF']) === 'index.php'): ?>
    // Aviso solo en página principal
    setTimeout(()=>{ const n=NTNotify.info('<strong>Página en desarrollo</strong><br>Estamos mejorando tu experiencia.',{ttl:4200}); n.el.classList.add('nt-alert-emph'); },700);
    // Atajo interno opcional para volver a mostrar (Alt+N)
    window.ntShowConstruction=()=>{ const n=NTNotify.info('<strong>Página en desarrollo</strong><br>Trabajando en nuevos módulos.',{ttl:4000}); n.el.classList.add('nt-alert-emph'); };
    document.addEventListener('keydown',e=>{ if(e.altKey && e.key==='n'){ ntShowConstruction(); }});
    <?php endif; ?>
    </script>

    <script src="assets/js/scripts.js" defer></script>
  </body>
</html>