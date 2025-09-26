<?php
// Lenguaje = Español
/**
 * footer.php (restaurado / mejorado)
 * Cierra el layout principal, muestra información corporativa y carga scripts.
 */
?>

    </main>
    <footer class="bg-gray-900 text-gray-300 py-16 font-sans" role="contentinfo">
      <div class="max-w-7xl mx-auto px-6 lg:px-20 grid grid-cols-1 md:grid-cols-4 gap-10">
        <div>
          <img src="assets/img/logo-norttek.png" alt="Logo Norttek Solutions" class="w-32 mb-4">
          <p class="text-gray-400 text-sm leading-relaxed">
            <span class="text-white font-semibold">Norttek Solutions</span> integra seguridad, telefonía IP y redes con enfoque en continuidad operativa y soporte profesional.
          </p>
        </div>
        <div>
          <h3 class="text-white font-bold text-lg mb-4 tracking-wide">Servicios</h3>
          <ul class="space-y-2 text-gray-300 text-sm">
            <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-video text-teal-400 w-5"></i> <a href="/cctv">Seguridad y CCTV</a></li>
            <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-phone-volume text-teal-400 w-5"></i> <a href="/telefonia">Telefonía IP</a></li>
            <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-door-closed text-teal-400 w-5"></i> <a href="/control-acceso">Control de Acceso</a></li>
            <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-network-wired text-teal-400 w-5"></i> <a href="#">Redes y Cableado</a></li>
            <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-shield-halved text-teal-400 w-5"></i> <a href="#">Ciberseguridad</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-white font-bold text-lg mb-4 tracking-wide">Contacto</h3>
          <ul class="space-y-2 text-gray-300 text-sm" aria-label="Datos de contacto">
            <li class="flex items-center gap-2"><i class="fas fa-phone-alt text-teal-400 w-5"></i> <a href="tel:+526252690997" class="hover:text-teal-400 transition" rel="nofollow">+52 (625) 269 0997</a></li>
            <li class="flex items-center gap-2"><i class="fas fa-envelope text-teal-400 w-5"></i> <a href="mailto:contacto@norttek.com.mx" class="hover:text-teal-400 transition">contacto@norttek.com.mx</a></li>
            <li class="flex items-center gap-2"><i class="fas fa-map-marker-alt text-teal-400 w-5"></i> <span>Rayón y Agustín Melgar #608, Zona Centro</span></li>
            <li class="flex items-center gap-2"><i class="fab fa-whatsapp text-teal-400 w-5"></i> <a href="https://wa.me/526252690997" class="hover:text-teal-400 transition">WhatsApp</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-white font-bold text-lg mb-4 tracking-wide">Síguenos</h3>
          <div class="flex space-x-4 mb-6 text-2xl">
            <a href="#" class="text-gray-300 hover:text-teal-400 transition transform hover:scale-110" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-300 hover:text-teal-400 transition transform hover:scale-110" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-300 hover:text-teal-400 transition transform hover:scale-110" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-gray-300 hover:text-teal-400 transition transform hover:scale-110" aria-label="GitHub"><i class="fab fa-github"></i></a>
          </div>
          <h3 class="text-white font-bold text-sm mb-2 tracking-wide">Newsletter</h3>
          <form class="flex flex-col sm:flex-row gap-2" aria-label="Formulario de suscripción newsletter">
            <label class="sr-only" for="newsletter-email">Correo</label>
            <input id="newsletter-email" type="email" placeholder="Tu correo" class="px-4 py-2 rounded-md text-gray-900 flex-1 focus:outline-none text-sm font-medium" required>
            <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition transform hover:scale-105">Suscribirse</button>
          </form>
        </div>
      </div>
      <div class="mt-12 text-center text-gray-400 text-xs font-medium tracking-wide">
        © 2025 <span class="text-white font-semibold">Norttek Solutions</span>. Todos los derechos reservados. <a href="#privacidad" class="hover:text-teal-400 transition">Aviso de privacidad</a>
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
    // Carga de JS específicos declarados en la página
    global $jsFiles; if(!isset($jsFiles) || !is_array($jsFiles)) { $jsFiles = []; }
    foreach($jsFiles as $js){
      $jsFile = basename($js).'.js';
      $server = __DIR__.'/../assets/js/'.$jsFile;
      $browser = 'assets/js/'.$jsFile;
      if(file_exists($server)) echo "<script src=\"$browser\"></script>\n"; else echo "<!-- JS $browser no encontrado -->\n";
    }
    ?>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
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

    <script src="assets/js/scripts.js"></script>
  </body>
</html>