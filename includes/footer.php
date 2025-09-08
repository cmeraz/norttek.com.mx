<!-- Footer -->
<footer class="bg-gray-900 text-gray-200 pt-20 pb-12 relative overflow-hidden">

  <!-- Fondo animado sutil -->
  <div class="absolute inset-0 pointer-events-none">
    <svg class="w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
      <path d="M0,64 C150,192 350,0 600,96 C850,192 1050,32 1200,128 L1200,0 L0,0 Z" fill="#00d1b2"/>
    </svg>
  </div>

  <div class="relative container mx-auto px-6 lg:px-20 grid grid-cols-1 md:grid-cols-4 gap-12">

    <!-- 1. Logo + descripción -->
    <div data-aos="fade-up" data-aos-delay="100">
      <img src="logo.png" alt="Norttek Solutions Logo" class="w-28 mb-4">
      <p class="text-gray-400 text-base">
        Norttek Solutions: soluciones integrales de seguridad, telefonía IP y redes con tecnología de vanguardia.
      </p>
    </div>

    <!-- 2. Servicios -->
    <div data-aos="fade-up" data-aos-delay="200">
      <h3 class="text-3xl text-white font-bold mb-6">Servicios</h3>
      <ul class="space-y-3 text-gray-300 text-base">
        <li><a href="#cctv" class="hover:text-teal-400 transition">Seguridad y CCTV</a></li>
        <li><a href="#telefonia" class="hover:text-teal-400 transition">Telefonía IP</a></li>
        <li><a href="#control" class="hover:text-teal-400 transition">Control de Acceso</a></li>
        <li><a href="#redes" class="hover:text-teal-400 transition">Redes y Cableado</a></li>
        <li><a href="#interfon" class="hover:text-teal-400 transition">Interfón / Telefonía</a></li>
      </ul>
    </div>

    <!-- 3. Contacto -->
    <div data-aos="fade-up" data-aos-delay="300">
      <h3 class="text-3xl text-white font-bold mb-6">Contacto</h3>
      <ul class="space-y-3 text-gray-300 text-base">
        <li class="flex items-center gap-2"><span>📞</span> <a href="tel:+525512345678" class="hover:text-teal-400 transition">+52 55 1234 5678</a></li>
        <li class="flex items-center gap-2"><span>✉</span> <a href="mailto:contacto@nortteksolutions.com" class="hover:text-teal-400 transition">contacto@nortteksolutions.com</a></li>
        <li class="flex items-center gap-2"><span>📍</span> <span>Calle Ficticia 123, CDMX</span></li>
        <li class="flex items-center gap-2"><span>💬</span> <a href="https://wa.me/525512345678" class="hover:text-teal-400 transition">WhatsApp</a></li>
      </ul>
    </div>

    <!-- 4. Redes sociales + Newsletter -->
    <div data-aos="fade-up" data-aos-delay="400">
      <h3 class="text-3xl text-white font-bold mb-6">Síguenos</h3>
      <div class="flex space-x-5 mb-6 text-2xl">
        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i>👍</a>
        <a href="#" class="social-icon"><i class="fab fa-twitter"></i>🐦</a>
        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i>💼</a>
        <a href="#" class="social-icon"><i class="fab fa-github"></i>💻</a>
      </div>

      <h3 class="text-white font-semibold mb-3 text-xl">Newsletter</h3>
      <form class="flex flex-col sm:flex-row gap-3">
        <input type="email" placeholder="Tu correo" class="px-4 py-3 rounded-md text-gray-900 flex-1 focus:outline-none">
        <button type="submit" class="btn-newsletter bg-teal-500 hover:bg-teal-600 text-white px-5 py-3 rounded-md font-semibold transition">Suscribirse</button>
      </form>
    </div>

  </div>

  <!-- Derechos reservados -->
  <div class="mt-16 border-t border-gray-700 pt-8 text-center text-gray-500 text-sm" data-aos="fade-up" data-aos-delay="500">
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