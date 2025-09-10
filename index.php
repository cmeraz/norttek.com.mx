<?php
// Título de la página (se usa en header)
$pageTitle = "Servicios - Norttek";

// Archivos CSS y JS adicionales (opcional)
$cssFiles  = ["styles.css"];       // CSS global opcional
$jsFiles   = ["scripts.js"];       // JS global opcional

// Incluye la plantilla base
include 'includes/pageTemplate.php';
?>

<!-- HERO -->
<section class="relative bg-blue-900 pt-24">
  <!-- Imagen de fondo con overlay -->
  <div class="absolute inset-0">
    <img src="https://images.unsplash.com/photo-1695668548342-c0c1ad479aee?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Tecnología y seguridad" class="w-full h-full object-cover brightness-50">
    <div class="absolute inset-0 bg-blue-900/70"></div>
  </div>

  <!-- Contenido del hero -->
  <div class="relative max-w-7xl mx-auto px-6 py-32 text-center text-white">
    <h1 class="text-4xl md:text-5xl font-bold mb-2">
  Protege y optimiza tu empresa
</h1>
<h2 class="text-2xl md:text-3xl font-semibold mb-6">
  Soluciones de seguridad y tecnología integrales
</h2>
<p class="text-lg md:text-xl mb-8">
  Implementa CCTV de última generación, alarmas inteligentes, control de acceso eficiente, redes confiables, cableado estructurado profesional y sistemas de automatización de iluminación y audio ambiental. Todo diseñado para que tu empresa funcione de manera segura, moderna y eficiente.
</p>

    <!-- Lista de servicios con iconos -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
      <div class="flex flex-col items-center gap-2 bg-white/10 rounded-lg p-4">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/zoom.png" alt="CCTV" class="w-10 h-10">
        <span>CCTV</span>
      </div>
      <div class="flex flex-col items-center gap-2 bg-white/10 rounded-lg p-4">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/siren.png" alt="Alarmas" class="w-10 h-10">
        <span>Alarmas</span>
      </div>
      <div class="flex flex-col items-center gap-2 bg-white/10 rounded-lg p-4">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/lock.png" alt="Control de acceso" class="w-10 h-10">
        <span>Control de acceso</span>
      </div>
      <div class="flex flex-col items-center gap-2 bg-white/10 rounded-lg p-4">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/wifi.png" alt="Redes" class="w-10 h-10">
        <span>Redes</span>
      </div>
      <div class="flex flex-col items-center gap-2 bg-white/10 rounded-lg p-4">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/cable.png" alt="Cableado" class="w-10 h-10">
        <span>Cableado</span>
      </div>
      <div class="flex flex-col items-center gap-2 bg-white/10 rounded-lg p-4">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/light-on.png" alt="Automatización" class="w-10 h-10">
        <span>Automatización</span>
      </div>
      <div class="flex flex-col items-center gap-2 bg-white/10 rounded-lg p-4">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/speaker.png" alt="Audio ambiental" class="w-10 h-10">
        <span>Audio ambiental</span>
      </div>
      <div class="flex flex-col items-center gap-2 bg-white/10 rounded-lg p-4">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/phone.png" alt="Telefonía IP" class="w-10 h-10">
        <span>Telefonía IP</span>
      </div>
    </div>
  </div>
</section>

<!-- SECCIÓN DE TIENDA -->
<section class="bg-gray-50 py-12">
  <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
    
    <!-- Texto y CTA -->
    <div class="md:w-1/2 text-left">
      <h2 class="text-2xl font-bold text-blue-900 mb-4">Explora nuestra tienda en línea</h2>
      <p class="text-gray-700 mb-6">
        Descubre todos nuestros productos y soluciones para seguridad, control de acceso, redes, cableado estructurado, automatización de iluminación y audio ambiental. Compra fácil y rápido desde nuestra plataforma en línea.
      </p>

      <!-- Contenedor de botones con espacio -->
      <div class="flex flex-col sm:flex-row gap-4">
        <!-- Botón Visitar Tienda -->
        <a href="https://tienda.norttek.com.mx" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-700 text-white font-semibold rounded-xl shadow hover:bg-blue-800 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l1-5H6.4M7 13l-1 5h12l-1-5M7 13h10m0 0L21 6H5l2 7z" />
          </svg>
          Visitar Tienda
        </a>

        <!-- Botón Compartir por WhatsApp -->
<button id="btnWhatsapp" class="px-6 py-3 bg-green-500 text-white rounded-xl shadow hover:opacity-90 flex items-center gap-2">
  <i class="fab fa-whatsapp text-xl"></i>
  Compartir por WhatsApp
</button>

      </div>
    </div>

    <!-- Imagen -->
    <div class="md:w-1/2 flex justify-center">
      <img 
        src="https://www.sicarx.com/images/new/analyze-data-03.webp" 
        alt="Tienda en línea Norttek" 
        class="w-full max-w-sm"
      >
    </div>
  </div>
</section>


<!-- Modal -->
<div id="modalWhatsapp" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
  <div class="bg-white rounded-xl p-6 w-80 relative">
    <h2 class="text-lg font-bold mb-4">Compartir Tienda en línea</h2>
    <label class="block mb-2">Número de WhatsApp de la persona a la que le quieres compartir el enlace:</label>
    <input type="text" id="numeroWhatsapp" placeholder="Ej: 6251234455" class="border p-2 w-full rounded mb-4" />
    <button id="enviarWhatsapp" class="bg-green-500 text-white px-4 py-2 rounded w-full">Enviar</button>
    <button id="cerrarModal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 font-bold">X</button>
  </div>
</div>

  </div>
</section


  <!-- SERVICIOS -->
  <section id="servicios" class="py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold text-blue-600">Nuestros Servicios</h2>
      <p class="mt-2 text-gray-600 max-w-2xl mx-auto">
        Ofrecemos soluciones completas de seguridad y telecomunicaciones adaptadas a tu empresa.
      </p>
      <div class="mt-10 grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center hover:scale-105 transition">
          <i data-feather="video" class="w-12 h-12 text-blue-600 mb-4"></i>
          <h3 class="font-semibold text-lg mb-2">CCTV</h3>
          <p class="text-gray-600 text-sm text-center">Instalación y monitoreo de cámaras de seguridad para proteger tus instalaciones.</p>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center hover:scale-105 transition">
          <i data-feather="alert-triangle" class="w-12 h-12 text-blue-600 mb-4"></i>
          <h3 class="font-semibold text-lg mb-2">Alarmas</h3>
          <p class="text-gray-600 text-sm text-center">Sistemas de alarmas conectados a monitoreo para mayor seguridad.</p>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center hover:scale-105 transition">
          <i data-feather="phone" class="w-12 h-12 text-blue-600 mb-4"></i>
          <h3 class="font-semibold text-lg mb-2">Interfón & Control de Acceso</h3>
          <p class="text-gray-600 text-sm text-center">Gestión de accesos y comunicación interna de manera segura y eficiente.</p>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center hover:scale-105 transition">
          <i data-feather="phone-call" class="w-12 h-12 text-blue-600 mb-4"></i>
          <h3 class="font-semibold text-lg mb-2">Telefonía IP</h3>
          <p class="text-gray-600 text-sm text-center">Conmutador en la nube para manejar llamadas, extensiones y reportes sin infraestructura local.</p>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center hover:scale-105 transition">
          <i data-feather="cpu" class="w-12 h-12 text-blue-600 mb-4"></i>
          <h3 class="font-semibold text-lg mb-2">Cableado Estructurado</h3>
          <p class="text-gray-600 text-sm text-center">Diseño e instalación de redes estructuradas para asegurar conectividad estable.</p>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center hover:scale-105 transition">
          <i data-feather="wifi" class="w-12 h-12 text-blue-600 mb-4"></i>
          <h3 class="font-semibold text-lg mb-2">Redes</h3>
          <p class="text-gray-600 text-sm text-center">Implementación y mantenimiento de redes LAN/WAN para oficinas y sucursales.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FUNCIONES -->
  <section id="funciones" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold text-blue-600">Funciones destacadas</h2>
      <p class="mt-2 text-gray-600">Todo lo que tu empresa necesita para comunicarse y gestionar su seguridad</p>
      <ul class="mt-6 grid md:grid-cols-2 gap-4 list-disc list-inside text-left max-w-4xl mx-auto text-gray-700">
        <li>Administración de extensiones y troncales</li>
        <li>Ruteo automático de llamadas con IVR personalizado</li>
        <li>Grabación de llamadas y reportes detallados</li>
        <li>Control de accesos y gestión de alarmas</li>
        <li>Monitoreo de CCTV en tiempo real</li>
        <li>Telefonía IP desde cualquier dispositivo</li>
        <li>Configuración rápida y sin infraestructura local</li>
        <li>Soporte técnico dedicado</li>
      </ul>
    </div>
  </section>

  <!-- PLANES -->
  <section id="planes" class="py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold text-blue-600">Planes y llamadas ilimitadas</h2>
      <p class="mt-4 text-gray-600 text-lg max-w-2xl mx-auto">
        Elige el plan que se adapta a tu empresa. Todos incluyen numeración LADA México y soporte técnico. Además, solicita una demo gratuita de 30 días con numeración demo para probar todas las funciones sin compromiso.
      </p>
      <button id="openDemoModal2" class="mt-6 px-6 py-3 rounded-xl bg-blue-600 text-white shadow hover:bg-blue-700 transition">
        Solicitar Demo
      </button>
    </div>
  </section>

  <!-- MODAL DEMO -->
  <div id="demoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-white rounded-xl p-8 max-w-md w-full relative scale-95 transition-transform duration-300">
      <button id="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        &times;
      </button>
      <h2 class="text-2xl font-bold mb-4 text-blue-600">Solicita tu Demo Gratuita</h2>
      <form id="demoForm" class="flex flex-col gap-4">
        <div class="flex items-center gap-2 border rounded p-2">
          <i data-feather="user" class="w-5 h-5 text-gray-400"></i>
          <input type="text" name="nombre" placeholder="Nombre" class="w-full outline-none text-gray-700" required>
        </div>
        <div class="flex items-center gap-2 border rounded p-2">
          <i data-feather="mail" class="w-5 h-5 text-gray-400"></i>
          <input type="email" name="email" placeholder="Email" class="w-full outline-none text-gray-700" required>
        </div>
        <div class="flex items-center gap-2 border rounded p-2">
          <i data-feather="phone" class="w-5 h-5 text-gray-400"></i>
          <input type="tel" name="telefono" placeholder="Teléfono" class="w-full outline-none text-gray-700" required pattern="[0-9]{10,15}">
        </div>
        <button type="submit" class="bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Enviar por WhatsApp</button>
      </form>
    </div>
  </div>

<?php
  // Al final, cerrar main y cargar footer
  includeTemplate("footer");
?>