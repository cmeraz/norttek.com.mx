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



<!-- JS locales -->
<?php
if(isset($jsFiles) && is_array($jsFiles)){
    foreach($jsFiles as $js){
        $jsPathServer = __DIR__ . "/../assets/js/$js";
        $jsPathBrowser = "assets/js/$js";
        if(file_exists($jsPathServer)){
            echo "<script src='$jsPathBrowser'></script>\n";
        } else {
            echo "<!-- JS $jsPathBrowser no encontrado -->\n";
        }
    }
}

// JS automático por nombre de página
$autoJsPathServer = __DIR__ . "/../assets/js/$pageName.js";
$autoJsPathBrowser = "assets/js/$pageName.js";

if(file_exists($autoJsPathServer)){
    echo "<script src='$autoJsPathBrowser'></script>\n";
} else {
    echo "<!-- JS automático $autoJsPathBrowser no encontrado -->\n";
}
?>

<!-- JS desde CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

</body>
</html>