<?php
/**
 * footer.php
 * Cierra main y body, carga JS locales y librerías CDN
 */
// Asegurarse de que $pageName esté definido
if(!isset($pageName)) {
    $pageName = basename($_SERVER['PHP_SELF'], ".php");
}
?>

<!-- Footer Profesional Moderno -->
<footer class="bg-gray-900 text-gray-300 py-16 font-sans">
  <div class="max-w-7xl mx-auto px-6 lg:px-20 grid grid-cols-1 md:grid-cols-4 gap-10">

    <!-- 1. Logo + descripción -->
    <div>
      <img src="assets/img/logo-norttek.png" alt="Norttek Solutions Logo" class="w-32 mb-4">
      <p class="text-gray-400 text-sm leading-relaxed">
        <span class="text-white font-semibold">Norttek Solutions</span> brinda soluciones integrales en seguridad, telefonía IP y redes con tecnología de vanguardia.
      </p>
    </div>

    <!-- 2. Servicios -->
    <div>
      <h3 class="text-white font-bold text-lg mb-4 tracking-wide">Servicios</h3>
      <ul class="space-y-2 text-gray-300 text-sm">
        <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-video text-teal-400 w-5"></i> <a href="#cctv">Seguridad y CCTV</a></li>
        <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-phone-alt text-teal-400 w-5"></i> <a href="#telefonia">Telefonía IP</a></li>
        <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-door-closed text-teal-400 w-5"></i> <a href="#control">Control de Acceso</a></li>
        <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-network-wired text-teal-400 w-5"></i> <a href="#redes">Redes y Cableado</a></li>
        <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-phone-square-alt text-teal-400 w-5"></i> <a href="#interfon">Interfón / Telefonía</a></li>
      </ul>
    </div>

    <!-- 3. Contacto -->
    <div>
      <h3 class="text-white font-bold text-lg mb-4 tracking-wide">Contacto</h3>
      <ul class="space-y-2 text-gray-300 text-sm">
        <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-phone-alt text-teal-400 w-5"></i> <a href="tel:+525512345678">+52 55 1234 5678</a></li>
        <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-envelope text-teal-400 w-5"></i> <a href="mailto:contacto@nortteksolutions.com">contacto@nortteksolutions.com</a></li>
        <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fas fa-map-marker-alt text-teal-400 w-5"></i> Calle Ficticia 123, CDMX</li>
        <li class="flex items-center gap-2 hover:text-teal-400 transition"><i class="fab fa-whatsapp text-teal-400 w-5"></i> <a href="https://wa.me/525512345678">WhatsApp</a></li>
      </ul>
    </div>

    <!-- 4. Redes sociales + Newsletter -->
    <div>
      <h3 class="text-white font-bold text-lg mb-4 tracking-wide">Síguenos</h3>
      <div class="flex space-x-4 mb-6 text-2xl">
        <a href="#" class="text-gray-300 hover:text-teal-400 transition transform hover:scale-110"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-gray-300 hover:text-teal-400 transition transform hover:scale-110"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-gray-300 hover:text-teal-400 transition transform hover:scale-110"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" class="text-gray-300 hover:text-teal-400 transition transform hover:scale-110"><i class="fab fa-github"></i></a>
      </div>

      <h3 class="text-white font-bold text-sm mb-2 tracking-wide">Newsletter</h3>
      <form class="flex flex-col sm:flex-row gap-2">
        <input type="email" placeholder="Tu correo" class="px-4 py-2 rounded-md text-gray-900 flex-1 focus:outline-none text-sm font-medium" />
        <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition transform hover:scale-105">
          Suscribirse
        </button>
      </form>
    </div>

  </div>

  <!-- Derechos reservados -->
  <div class="mt-12 text-center text-gray-400 text-xs font-medium tracking-wide">
    © 2025 <span class="text-white font-semibold">Norttek Solutions</span>. Todos los derechos reservados. <a href="#privacidad" class="hover:text-teal-400 transition">Aviso de privacidad</a>
  </div>
</footer>
</main>

<!-- Schema.org: LocalBusiness -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "Norttek Solutions",
    "image": "https://nortteksolutions.com/assets/img/logo-norttek.png",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Rayón y Agustin Meglar #608, Zona Centro",
      "addressLocality": "Ciudad Cuauhtémoc",
      "postalCode": "31500",
      "addressCountry": "MX"
    },
    "telephone": "+52-625-269-0997",
    "url": "https://norttek.com.mx",
     }
  </script>


<!-- JS locales -->
<?php
/**
 * footer.php
 * Cierra main y body, carga JS locales y librerías CDN
 */

// Asegurarse de que $jsFiles sea global y un array
global $jsFiles;
if(!isset($jsFiles) || !is_array($jsFiles)){
    $jsFiles = [];
}

// JS específicos por página
foreach($jsFiles as $js){
    $jsFile = "$js.js"; // agregar extensión automáticamente
    $jsPathServer = __DIR__ . "/../assets/js/$jsFile";
    $jsPathBrowser = "assets/js/$jsFile"; // ruta absoluta
    if(file_exists($jsPathServer)){
        echo "<script src='$jsPathBrowser'></script>\n";
    } else {
        echo "<!-- JS $jsPathBrowser no encontrado -->\n";
    }
}

/* // JS automático por página según $pageName
$autoJsFile = "$pageName.js";
$autoJsPathServer = __DIR__ . "/../assets/js/$autoJsFile";
$autoJsPathBrowser = "/assets/js/$autoJsFile"; // ruta absoluta
if(file_exists($autoJsPathServer)){
    echo "<script src='$autoJsPathBrowser'></script>\n";
} else {
    echo "<!-- JS automático $autoJsPathBrowser no encontrado -->\n";
} */
?>



<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Contenedor de alertas dinámicas -->
<div id="nt-alert-stack" class="fixed top-[88px] right:0 md:top-5 md:right-5 z-[9999] flex flex-col gap-3 px-3 md:px-0 w-full md:w-auto pointer-events-none"></div>

<script>
// Sistema ligero de notificaciones (reemplaza Toastify)
window.NTNotify = (function(){
  const stack = () => document.getElementById('nt-alert-stack');
  const variants = {
    info: 'nt-alert-info', success: 'nt-alert-success', warning: 'nt-alert-warning', danger: 'nt-alert-danger'
  };
  function push(type, html, opts={}){
    const el = document.createElement('div');
    el.className = `nt-alert shadow-lg pointer-events-auto translate-x-8 opacity-0 transition-all duration-500 ${variants[type]||variants.info}`;
    el.style.minWidth = '260px'; el.style.maxWidth = '360px';
    el.innerHTML = `<i class="fa-solid ${icon(type)}"></i><div style="flex:1;">${html}</div><button aria-label="Cerrar" class="nt-close" style="background:none;border:none;font-size:.9rem;opacity:.6;cursor:pointer;">✕</button>`;
    stack().appendChild(el);
    requestAnimationFrame(()=>{ el.classList.remove('translate-x-8'); el.style.opacity=1; });
    const ttl = opts.ttl || 4800;
    let hid = setTimeout(()=>close(), ttl);
    function close(){ el.style.opacity=0; el.style.transform='translateX(12px)'; setTimeout(()=>el.remove(),480); }
    el.querySelector('.nt-close').addEventListener('click',()=>{ clearTimeout(hid); close(); });
    el.addEventListener('mouseenter',()=>clearTimeout(hid));
    el.addEventListener('mouseleave',()=>{ hid=setTimeout(()=>close(), 1800); });
    return {close, el};
  }
  function icon(t){ switch(t){ case 'success':return 'fa-circle-check'; case 'warning':return 'fa-triangle-exclamation'; case 'danger':return 'fa-circle-xmark'; default:return 'fa-circle-info'; } }
  return { info:(m,o)=>push('info',m,o), success:(m,o)=>push('success',m,o), warning:(m,o)=>push('warning',m,o), danger:(m,o)=>push('danger',m,o) };
})();

// Ejemplo condicional: mostrar aviso de demo sólo una vez por sesión
if(!sessionStorage.getItem('nt_demo_notice')){
  sessionStorage.setItem('nt_demo_notice','1');
  setTimeout(()=>{ NTNotify.info('Interfaz en evolución: seguimos integrando módulos al nuevo diseño.'); }, 900);
}
</script>

<!-- Script global de utilidades y animaciones (headings, tabs, tema) -->
<script src="assets/js/scripts.js"></script>

</body>
</html>