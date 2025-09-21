<?php
// SEO y metaetiquetas específicas para Telefonía IP en la Nube
$seo = [
    'title'       => 'Telefonía IP en la Nube - Norttek Solutions',
    'description' => 'Centraliza las comunicaciones de tu empresa con Norttek PBX en la nube. Extensiones, IVR, grabación de llamadas y más, desde cualquier dispositivo.',
    'keywords'    => 'Telefonía IP, PBX en la nube, extensiones virtuales, VoIP, Norttek, conmutador, comunicaciones empresariales',
    // Open Graph
    'og_title'       => 'Telefonía IP en la Nube - Norttek Solutions',
    'og_description' => 'Centraliza tus comunicaciones empresariales en la nube y trabaja desde cualquier lugar.',
    'og_url'         => 'https://www.norttek.com.mx/telefonia.php',
    'og_image'       => 'https://www.norttek.com.mx/assets/images/telefonia-og.jpg',
    // Twitter Card
    'twitter_title'       => 'Telefonía IP en la Nube - Norttek Solutions',
    'twitter_description' => 'Centraliza tus comunicaciones empresariales en la nube con Norttek PBX.',
    'twitter_image'       => 'https://www.norttek.com.mx/assets/images/telefonia-og.jpg'
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'includes/header.php'; ?>
    <link rel="stylesheet" href="assets/css/telefonia.css">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <?php $activePage = 'telefonia'; ?>
    <?php include 'includes/navbar.php'; ?>

    <!-- HERO -->
    <section class="relative bg-white py-20" id="hero" aria-labelledby="hero-title">
      <div class="max-w-7xl mx-auto px-4 grid lg:grid-cols-2 gap-10 items-center">
        <div class="hero-text">
          <h1 id="hero-title" class="text-4xl lg:text-5xl font-bold leading-tight opacity-0 translate-y-10">
            Telefonía IP en la Nube con <span class="text-blue-600">Norttek PBX</span>
          </h1>
          <p class="text-gray-700 text-lg leading-relaxed mt-4 opacity-0 translate-y-10">
            Gestiona todas las comunicaciones de tu empresa de manera <strong>centralizada desde la nube</strong>.
            Con nuestro <strong>conmutador en la nube</strong> administra <strong>extensiones</strong>,
            configura <strong>troncales</strong>, IVR personalizado, grabación de llamadas y <strong>reportes detallados</strong>.
            Accede desde <strong>PC, smartphone o teléfono físico</strong>, sin infraestructura local ni mantenimiento complejo.
          </p>
          <div class="mt-6 flex flex-wrap gap-3 opacity-0 translate-y-10">
            <a href="#planes" class="px-6 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg hover:from-blue-700 hover:to-blue-600 transition" role="button">Cotiza tu plan</a>
            <a href="#demo" class="px-6 py-3 rounded-xl border border-gray-300 hover:border-blue-500 transition" role="button">Solicitar demo</a>
          </div>
        </div>
        <div class="hero-image-container opacity-0 translate-y-10">
          <img class="hero-image" width="996" height="749" src="https://www.net2phone.com/hs-fs/hubfs/Business%20phone%20systems%20interface.webp?width=996&height=749&name=Business%20phone%20systems%20interface.webp"
               alt="Interfaz gráfica de telefonía IP Norttek PBX en laptop">
        </div>
      </div>
    </section>

    <!-- DISPOSITIVOS -->
    <section id="dispositivos" class="py-16 bg-gray-100" aria-labelledby="dispositivos-title">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 id="dispositivos-title" class="text-3xl font-bold text-gray-900 mb-12">Accede desde cualquier dispositivo</h2>
        <div class="grid md:grid-cols-1 gap-8">
          <!-- Card 1: PC / Laptop -->
          <div class="md:flex md:items-center md:gap-8 bg-white rounded-2xl shadow-lg p-6 transform transition hover:-translate-y-2 hover:shadow-2xl animate-fade-in">
            <div class="md:w-1/3 flex justify-center">
              <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/net2phones%20business%20phone%20system%20interface%20on%20a%20laptop.webp" alt="Interfaz PBX en laptop" class="rounded-2xl shadow" loading="lazy">
            </div>
            <div class="md:w-2/3 mt-6 md:mt-0 text-left">
              <h3 class="text-2xl font-bold text-blue-700 mb-4">PC / Laptop</h3>
              <p class="text-gray-700 text-lg leading-relaxed">
                Accede a tu <span class="font-semibold text-blue-600">central telefónica</span> desde tu computadora.
                Gestiona <span class="font-semibold">llamadas, videollamadas, mensajes y reportes</span> sin instalar hardware adicional.
                Ideal para oficinas modernas donde necesitas controlar todas las comunicaciones desde un solo lugar, <span class="text-blue-600 font-semibold">rápida y eficientemente</span>.
              </p>
            </div>
          </div>
          <!-- Card 2: Smartphone / Linkus -->
          <div class="md:flex md:items-center md:gap-8 flex-col-reverse md:flex-row-reverse bg-white rounded-2xl shadow-lg p-6 transform transition hover:-translate-y-2 hover:shadow-2xl animate-fade-in">
            <div class="md:w-1/3 flex justify-center">
              <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/net2phone%D1%91s%20business%20phone%20system%20interface%20on%20mobile%20and%20tablet.webp" alt="App Linkus en smartphone" class="rounded-2xl shadow" loading="lazy">
            </div>
            <div class="md:w-2/3 mt-6 md:mt-0 text-left">
              <h3 class="text-2xl font-bold text-blue-700 mb-4">Smartphone / App Linkus</h3>
              <p class="text-gray-700 text-lg leading-relaxed">
                Mantente <span class="font-semibold text-blue-600">conectado estés donde estés</span>. Con la app <span class="font-semibold">Linkus</span> para móvil, puedes realizar y recibir llamadas, transferir, grabar y acceder a reportes desde cualquier lugar.
                Perfecto para empleados remotos o que necesitan movilidad, <span class="text-blue-600 font-semibold">sin perder conexión con tu empresa</span>.
              </p>
            </div>
          </div>
          <!-- Card 3: Teléfono físico SIP -->
          <div class="md:flex md:items-center md:gap-8 bg-white rounded-2xl shadow-lg p-6 transform transition hover:-translate-y-2 hover:shadow-2xl animate-fade-in">
            <div class="md:w-1/3 flex justify-center">
              <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/Desk%20Business%20Phone.webp" alt="Teléfono físico SIP" class="rounded-2xl shadow" loading="lazy">
            </div>
            <div class="md:w-2/3 mt-6 md:mt-0 text-left">
              <h3 class="text-2xl font-bold text-blue-700 mb-4">Teléfono físico SIP</h3>
              <p class="text-gray-700 text-lg leading-relaxed">
                Si prefieres la experiencia tradicional de un teléfono, los <span class="font-semibold text-blue-600">dispositivos SIP físicos</span> se integran perfectamente con tu PBX Norttek.
                Garantizan <span class="font-semibold text-blue-600">calidad de voz superior, facilidad de uso</span> y compatibilidad con funciones avanzadas como transferencias, colas y buzón de voz.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

 <!-- PLANES -->
<section id="planes" class="py-20 bg-gray-50" aria-labelledby="planes-title">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <h2 id="planes-title" class="text-4xl font-bold text-gray-900 mb-4">Planes y llamadas ilimitadas</h2>
    <p class="text-gray-700 mb-4 max-w-2xl mx-auto text-lg">
      Elige el plan que mejor se adapta a tu empresa. Todos incluyen numeración LADA México y soporte técnico.
    </p>
    <div class="mt-12 grid md:grid-cols-3 gap-8">
      
      <!-- Plan Básico -->
      <div class="bg-white p-8 rounded-3xl shadow-lg flex flex-col justify-between">
        <h3 class="font-bold text-2xl text-blue-600 mb-6">Plan Básico</h3>
        <ul class="text-gray-700 mb-6 space-y-2 text-left">
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>1 extensión</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>1 troncal (2 canales)</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>Numeración LADA México</li>
        </ul>
        <p class="font-bold text-blue-600 text-xl mb-6">$379 / mes + IVA</p>
        <a href="#"
           data-plan="Plan Básico"
           data-precio="$379 / mes + IVA"
           data-ext="1 extensión"
           data-troncal="1 troncal (2 canales)"
           data-numeracion="Numeración LADA México"
           class="bg-blue-600 text-white py-2 px-6 rounded-full font-semibold hover:bg-blue-700 transition"
           role="button">
           Solicitar Plan
        </a>
      </div>

      <!-- Plan Premium (destacado) -->
      <div class="bg-white p-8 rounded-3xl shadow-lg border-2 border-blue-600 relative flex flex-col justify-between">
        <span class="absolute top-0 left-0 bg-yellow-400 text-xs font-bold px-3 py-1 rounded-br-2xl">Recomendado</span>
        <h3 class="font-bold text-2xl text-blue-600 mb-6">Plan Premium</h3>
        <ul class="text-gray-700 mb-6 space-y-2 text-left">
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>3 extensiones</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>1 troncal (2 canales)</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>Numeración LADA México</li>
        </ul>
        <p class="font-bold text-blue-600 text-xl mb-6">$605 / mes + IVA</p>
        <a href="#"
           data-plan="Plan Premium"
           data-precio="$605 / mes + IVA"
           data-ext="3 extensiones"
           data-troncal="1 troncal (2 canales)"
           data-numeracion="Numeración LADA México"
           class="bg-blue-600 text-white py-2 px-6 rounded-full font-semibold hover:bg-blue-700 transition"
           role="button">
           Solicitar Plan
        </a>
      </div>

      <!-- Plan Empresarial -->
      <div class="bg-white p-8 rounded-3xl shadow-lg flex flex-col justify-between">
        <h3 class="font-bold text-2xl text-blue-600 mb-6">Plan Empresarial</h3>
        <ul class="text-gray-700 mb-6 space-y-2 text-left">
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>10 extensiones</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>1 troncal (10 canales)</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>Numeración LADA México</li>
        </ul>
        <p class="font-bold text-blue-600 text-xl mb-6">$1,490 / mes + IVA</p>
        <a href="#"
           data-plan="Plan Empresarial"
           data-precio="$1,490 / mes + IVA"
           data-ext="10 extensiones"
           data-troncal="1 troncal (10 canales)"
           data-numeracion="Numeración LADA México"
           class="bg-blue-600 text-white py-2 px-6 rounded-full font-semibold hover:bg-blue-700 transition"
           role="button">
           Solicitar Plan
        </a>
      </div>

    </div>
  </div>
</section>


    <!-- DEMO -->
    <section id="demo" class="py-20 bg-gray-50" aria-labelledby="demo-title">
      <div class="max-w-7xl mx-auto px-6 lg:flex lg:items-center lg:justify-between gap-10">
        <!-- Texto -->
        <div class="flex-1 text-center lg:text-left animate-fadeInSlow">
          <h2 id="demo-title" class="text-4xl md:text-3xl font-extrabold text-blue-600 mb-4">
            ¿Quieres migrar tus telecomunicaciones a la nube?
          </h2>
          <p class="text-gray-700 text-lg mb-6">
            Eleva la productividad de tu empresa, reduce costos y olvídate del mantenimiento de sistemas locales. Solicita ahora tu <strong>demo gratuita de 30 días</strong> y prueba todas las funciones avanzadas de Norttek PBX.
          </p>
          <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
            <button id="openModal" class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition flex items-center gap-2" type="button" role="button">
              <i class="fas fa-clipboard-check"></i>
              Solicitar Demo
            </button>
            <button id="openVideo" data-video="https://www.youtube.com/embed/HVc0M7uDKAE?si=IGVoEfbvS5Rl5-tG" class="bg-gray-200 text-blue-600 px-6 py-3 rounded-full hover:bg-gray-300 transition flex items-center gap-2" type="button" role="button">
              <i class="fas fa-play-circle"></i>
              Ver Video
            </button>
            <button id="openLinkus" data-video="https://www.youtube.com/embed/LVb0_BUqskQ" class="bg-black text-white px-6 py-3 rounded-full hover:bg-gray-800 transition flex items-center gap-2" type="button" role="button">
              <i class="fas fa-mobile-alt"></i>
              Linkus UC
            </button>
          </div>
        </div>
        <!-- Imagen -->
        <div class="flex-1 mt-10 lg:mt-0 text-center animate-fadeInSlow">
          <img alt="Yeastar P-Series Phone System Screenshots" width="830" height="566"
               src="https://www.yeastar.com/wp-content/uploads/2023/08/easy-first-unified-communications-more-in-one-img.png" loading="lazy">
        </div>
      </div>
    </section>

    <!-- MODAL VIDEO -->
    <div id="videoModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-50" role="dialog" aria-modal="true" aria-label="Video de demostración">
      <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-3xl w-full relative">
        <button id="closeVideo" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-2xl" aria-label="Cerrar video">&times;</button>
        <div class="aspect-w-16 aspect-h-9">
          <iframe id="youtubeVideo" class="w-full h-[500px]" src="" title="Demo Video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
    </div>

    <!-- MODAL DEMO -->
    <div id="modalDemo" class="fixed inset-0 bg-black/80 hidden z-50 flex items-center justify-center" role="dialog" aria-modal="true" aria-label="Solicitar demo">
      <div class="bg-white rounded-3xl p-8 max-w-md w-full shadow-lg relative transform scale-90 opacity-0 transition-all duration-300">
        <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-xl font-bold" aria-label="Cerrar">&times;</button>
        <div class="text-center mb-6">
          <h3 class="text-3xl font-bold text-gray-800 mb-2">🚀 Solicitar Demo Gratuita</h3>
          <p class="text-gray-600 text-sm">Rellena tus datos para probar nuestro sistema de conmutador en la nube con numeración demo durante 30 días.</p>
        </div>
        <form id="demoForm" class="space-y-4" autocomplete="on">
          <div class="flex items-center border rounded-xl p-3 focus-within:ring-2 focus-within:ring-blue-400">
            <label for="nombre" class="sr-only">Nombre completo</label>
            <svg class="w-6 h-6 text-gray-400 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 0112 14a4 4 0 016.879 3.804M12 12a4 4 0 100-8 4 4 0 000 8z" /></svg>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre completo" required class="w-full outline-none" autocomplete="name">
          </div>
          <div class="flex items-center border rounded-xl p-3 focus-within:ring-2 focus-within:ring-blue-400">
            <label for="email" class="sr-only">Correo electrónico</label>
            <svg class="w-6 h-6 text-gray-400 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12c0-4.97-4.03-9-9-9S3 7.03 3 12c0 4.97 4.03 9 9 9s9-4.03 9-9z" /></svg>
            <input type="email" name="email" id="email" placeholder="Correo electrónico" required class="w-full outline-none" autocomplete="email">
          </div>
          <div class="flex items-center border rounded-xl p-3 focus-within:ring-2 focus-within:ring-blue-400">
            <label for="telefono" class="sr-only">Teléfono</label>
            <svg class="w-6 h-6 text-gray-400 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5v4a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2zm0 10v4a2 2 0 002 2h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2zm7-9v2a2 2 0 002 2h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2zm0 9v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2a2 2 0 00-2 2z" /></svg>
            <input type="tel" name="telefono" id="telefono" placeholder="Teléfono" required class="w-full outline-none" autocomplete="tel">
          </div>
          <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-full font-semibold hover:bg-blue-700 transition">
            Enviar y abrir WhatsApp
          </button>
        </form>
      </div>
    </div>

    <!-- FAQ -->
    <section id="faq-section" class="py-16 bg-white">
      <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-blue-700 mb-8 text-center">Preguntas frecuentes</h2>
        <div id="faq">
          <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
              <span>¿Qué es la telefonía IP en la nube?</span>
              <i class="faq-icon fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer" aria-hidden="true">
              <p class="text-gray-600">La telefonía IP en la nube es un sistema que permite realizar llamadas telefónicas a través de Internet en lugar de líneas telefónicas tradicionales. Utiliza tecnología VoIP (Voz sobre Protocolo de Internet) para convertir la voz en datos y enviarlos a través de la red.</p>
            </div>
          </div>
          <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
              <span>¿Cuáles son las ventajas de usar Norttek PBX?</span>
              <i class="faq-icon fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer" aria-hidden="true">
              <p class="text-gray-600">Norttek PBX ofrece múltiples ventajas, como la reducción de costos en llamadas, mayor flexibilidad y escalabilidad, integración con otras herramientas de negocio, y la posibilidad de trabajar desde cualquier lugar con conexión a Internet.</p>
            </div>
          </div>
          <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
              <span>¿Necesito un equipo especial para usar telefonía IP?</span>
              <i class="faq-icon fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer" aria-hidden="true">
              <p class="text-gray-600">No necesariamente. Puedes usar telefonía IP con dispositivos que ya tienes, como tu computadora, smartphone o tablet. También puedes optar por teléfonos físicos SIP que se integran a la perfección con nuestro sistema.</p>
            </div>
          </div>
          <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
              <span>¿Qué pasa si tengo problemas técnicos?</span>
              <i class="faq-icon fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer" aria-hidden="true">
              <p class="text-gray-600">Nuestro servicio incluye soporte técnico para ayudarte con cualquier inconveniente que puedas tener. Puedes contactarnos a través de nuestros canales de atención al cliente.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ANIMACIONES Y SCRIPTS -->
    <style>
    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fadeInUp 0.8s ease forwards; }
    </style>
    <script src="assets/js/telefonia.js"></script>
    <script>
    // Video Modal y Linkus
    (function() {
      const videoModal = document.getElementById('videoModal');
      const youtubeVideo = document.getElementById('youtubeVideo');
      const closeVideo = document.getElementById('closeVideo');
      const btnVideo = document.getElementById('openVideo');
      const btnLinkus = document.getElementById('openLinkus');

      btnVideo.addEventListener('click', () => {
        youtubeVideo.src = btnVideo.dataset.video;
        videoModal.classList.remove('hidden');
        youtubeVideo.focus();
      });
      btnLinkus.addEventListener('click', () => {
        youtubeVideo.src = btnLinkus.dataset.video;
        videoModal.classList.remove('hidden');
        youtubeVideo.focus();
      });
      closeVideo.addEventListener('click', () => {
        youtubeVideo.src = '';
        videoModal.classList.add('hidden');
      });
      videoModal.addEventListener('click', (e) => {
        if(e.target === videoModal){
          youtubeVideo.src = '';
          videoModal.classList.add('hidden');
        }
      });
      document.addEventListener('keydown', function(e) {
        if(e.key === "Escape") {
          videoModal.classList.add('hidden');
          youtubeVideo.src = '';
        }
      });
    })();

    // Modal Demo
    (function() {
      const modalDemo = document.getElementById('modalDemo');
      const openModal = document.getElementById('openModal');
      const closeModal = document.getElementById('closeModal');
      openModal.addEventListener('click', () => {
        modalDemo.classList.remove('hidden');
        modalDemo.querySelector('input').focus();
      });
      closeModal.addEventListener('click', () => {
        modalDemo.classList.add('hidden');
      });
      document.addEventListener('keydown', function(e) {
        if(e.key === "Escape") {
          modalDemo.classList.add('hidden');
        }
      });
      modalDemo.addEventListener('click', (e) => {
        if(e.target === modalDemo){
          modalDemo.classList.add('hidden');
        }
      });
    })();

    // Animaciones Hero con GSAP (si está disponible)
    window.addEventListener('load', () => {
      if(window.gsap) {
        gsap.to(".hero-text h1", {opacity:1, y:0, duration:1, ease:"power3.out"});
        gsap.to(".hero-text p", {opacity:1, y:0, duration:1, ease:"power3.out", delay:0.3});
        gsap.to(".hero-text div", {opacity:1, y:0, duration:1, ease:"power3.out", delay:0.6});
        gsap.to(".hero-image-container", {opacity:1, y:0, duration:1, ease:"power3.out", delay:0.9});
      }
    });
    </script>
    <?php include 'includes/footer.php'; ?>
</body>
</html>