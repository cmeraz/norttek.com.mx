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

<!-- Footer Profesional -->
<footer class="bg-gray-900 text-gray-200 pt-16 pb-10">
  <div class="max-w-7xl mx-auto px-6 lg:px-20 grid grid-cols-1 md:grid-cols-4 gap-10">

    <!-- 1. Logo + descripción -->
    <div>
      <img src="assets/img/logo-norttek.png" alt="Norttek Solutions Logo" class="w-28 mb-4">
      <p class="text-gray-400 text-sm">
        Soluciones integrales de seguridad, telefonía IP y redes con tecnología de vanguardia.
      </p>
    </div>

    <!-- 2. Servicios -->
    <div>
      <h3 class="text-white font-semibold text-lg mb-4">Servicios</h3>
      <ul class="space-y-2 text-gray-400 text-sm">
        <li><a href="#cctv" class="hover:text-teal-400 transition">Seguridad y CCTV</a></li>
        <li><a href="#telefonia" class="hover:text-teal-400 transition">Telefonía IP</a></li>
        <li><a href="#control" class="hover:text-teal-400 transition">Control de Acceso</a></li>
        <li><a href="#redes" class="hover:text-teal-400 transition">Redes y Cableado</a></li>
        <li><a href="#interfon" class="hover:text-teal-400 transition">Interfón / Telefonía</a></li>
      </ul>
    </div>

    <!-- 3. Contacto -->
    <div>
      <h3 class="text-white font-semibold text-lg mb-4">Contacto</h3>
      <ul class="space-y-2 text-gray-400 text-sm">
        <li>📞 <a href="tel:+525512345678" class="hover:text-teal-400 transition">+52 55 1234 5678</a></li>
        <li>✉ <a href="mailto:contacto@nortteksolutions.com" class="hover:text-teal-400 transition">contacto@nortteksolutions.com</a></li>
        <li>📍 Calle Ficticia 123, CDMX</li>
        <li>💬 <a href="https://wa.me/525512345678" class="hover:text-teal-400 transition">WhatsApp</a></li>
      </ul>
    </div>

    <!-- 4. Redes sociales -->
    <div>
      <h3 class="text-white font-semibold text-lg mb-4">Síguenos</h3>
      <div class="flex space-x-4 mb-6 text-xl">
        <a href="#" class="text-gray-400 hover:text-teal-400 transition"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-gray-400 hover:text-teal-400 transition"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-gray-400 hover:text-teal-400 transition"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" class="text-gray-400 hover:text-teal-400 transition"><i class="fab fa-github"></i></a>
      </div>

      <h3 class="text-white font-semibold mb-2 text-sm">Newsletter</h3>
      <form class="flex flex-col sm:flex-row gap-2">
        <input type="email" placeholder="Tu correo" class="px-4 py-2 rounded-md text-gray-900 flex-1 focus:outline-none text-sm">
        <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md text-sm font-medium transition">
          Suscribirse
        </button>
      </form>
    </div>

  </div>

  <!-- Derechos reservados -->
  <div class="mt-10 border-t border-gray-700 pt-6 text-center text-gray-500 text-xs">
    © 2025 Norttek Solutions. Todos los derechos reservados. <a href="#privacidad" class="hover:text-teal-400 transition">Aviso de privacidad</a>
  </div>
</footer>


<!-- AOS Animaciones -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true
  });
</script>

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