<?php
// Contenido modular de la página Telefonía (antes en telefonia.php completo)
// Asume variables: $pageName, $seo ya definidas por pageTemplate.
?>

<!-- HERO -->
<section class="relative py-28 nt-hero-wrapper" id="hero" aria-labelledby="hero-title" style="background:#0c2234;">
  <div class="absolute inset-0 pointer-events-none" style="background:radial-gradient(circle at 18% 32%,rgba(111,164,255,.35),transparent 60%),radial-gradient(circle at 82% 68%,rgba(155,196,255,.25),transparent 65%),linear-gradient(160deg,#0e2d44,#0a1d2b 65%);"></div>
  <div class="absolute inset-0 opacity-60 mix-blend-screen" style="background:repeating-linear-gradient(45deg,rgba(255,255,255,.04) 0 6px, transparent 6px 12px);"></div>
  <div class="absolute inset-0" style="background:linear-gradient(to bottom,rgba(10,25,38,.2),rgba(10,25,38,.9));"></div>
  <div class="relative max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-14 items-center">
    <div class="hero-text">
      <div id="hero-title" class="opacity-0 translate-y-10">
        <?= nt_heading('Telefonía IP en la Nube', 'fa-solid fa-phone-volume', 'xl', 'Norttek PBX', ['animate' => true, 'delay' => 'sm','class'=>'nt-heading-hero nt-heading-invert']); ?>
      </div>
      <p class="text-slate-200 text-lg leading-relaxed mt-5 opacity-0 translate-y-10 max-w-xl">
        Gestiona todas las comunicaciones de tu empresa de manera <strong>centralizada desde la nube</strong>. Administra <strong>extensiones</strong>, configura <strong>troncales</strong>, IVR personalizado, grabación de llamadas y <strong>reportes detallados</strong>. Accede desde <strong>PC, smartphone o teléfono físico</strong>, sin infraestructura local ni mantenimiento complejo.
      </p>
      <div class="mt-8 flex flex-wrap gap-4 opacity-0 translate-y-10">
        <a href="#planes" class="nt-btn nt-btn-primary nt-pulse" role="button"><i class="fa-solid fa-coins"></i><span>Cotiza tu plan</span></a>
        <a href="#demo" class="nt-btn nt-btn-outline" role="button"><i class="fa-solid fa-rocket"></i><span>Solicitar demo</span></a>
        <a href="#faq" class="nt-btn nt-btn-accent" role="button"><i class="fas fa-question-circle"></i><span>Preguntas Frecuentes</span></a>
      </div>
    </div>
    <div class="hero-image-container opacity-0 translate-y-10 relative">
      <div class="absolute -inset-4 rounded-3xl bg-gradient-to-tr from-blue-600/30 via-cyan-400/25 to-transparent blur-2xl"></div>
      <img class="hero-image rounded-2xl shadow-xl ring-1 ring-white/10" width="996" height="749" src="https://www.net2phone.com/hs-fs/hubfs/Business%20phone%20systems%20interface.webp?width=996&height=749&name=Business%20phone%20systems%20interface.webp" alt="Interfaz Norttek PBX en laptop">
    </div>
  </div>
</section>

<!-- DISPOSITIVOS -->
<section id="dispositivos" class="py-20 bg-gray-100" aria-labelledby="dispositivos-title">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <div id="dispositivos-title" class="mb-14">
      <?= nt_heading('Accede desde cualquier dispositivo', 'fa-solid fa-display', 'lg', null, ['animate' => true,'class'=>'nt-heading-accent-bar']); ?>
    </div>
    <div class="grid md:grid-cols-1 gap-8">
      <!-- Card 1: PC / Laptop -->
      <div class="md:flex md:items-center md:gap-8 bg-white rounded-2xl shadow-lg p-6 transform transition hover:-translate-y-2 hover:shadow-2xl animate-fade-in">
        <div class="md:w-1/3 flex justify-center">
          <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/net2phones%20business%20phone%20system%20interface%20on%20a%20laptop.webp" alt="Interfaz PBX en laptop" class="rounded-2xl shadow" loading="lazy">
        </div>
        <div class="md:w-2/3 mt-6 md:mt-0 text-left">
          <?= nt_heading('PC / Laptop', 'fa-solid fa-computer', 'md', null, ['class'=>'nt-heading-accent-bar']); ?>
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
          <?= nt_heading('Smartphone / App Linkus', 'fa-solid fa-mobile-screen-button', 'md', null, ['class'=>'nt-heading-accent-bar']); ?>
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
          <?= nt_heading('Teléfono físico SIP', 'fa-solid fa-phone', 'md', null, ['class'=>'nt-heading-accent-bar']); ?>
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
<section id="planes" class="py-24 bg-gray-50" aria-labelledby="planes-title">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <div id="planes-title" class="mb-6">
      <?= nt_heading('Planes y llamadas ilimitadas', 'fa-solid fa-boxes-stacked', 'lg', null, ['animate' => true, 'delay' => 'sm','class'=>'nt-heading-accent-bar']); ?>
    </div>
    <p class="text-gray-700 mb-6 max-w-2xl mx-auto text-lg">
      Elige el plan que mejor se adapta a tu empresa. Todos incluyen numeración LADA México y soporte técnico.
    </p>
    <div class="mt-14 grid md:grid-cols-3 gap-10">
      <!-- Plan Básico -->
      <div class="bg-white p-8 rounded-3xl shadow-lg flex flex-col justify-between border border-gray-100">
        <?= nt_heading('Plan Básico', 'fa-solid fa-circle-dot', 'sm', null, ['animate' => true, 'delay' => 'sm']); ?>
        <ul class="text-gray-700 mb-6 space-y-2 text-left">
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>1 extensión</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>1 troncal (2 canales)</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>Numeración LADA México</li>
        </ul>
        <p class="font-bold text-blue-600 text-xl mb-6">$379 / mes + IVA</p>
        <a href="#" data-plan="Plan Básico" data-precio="$379 / mes + IVA" data-ext="1 extensión" data-troncal="1 troncal (2 canales)" data-numeracion="Numeración LADA México" class="nt-btn nt-btn-primary justify-center w-full mt-auto" role="button">
          <i class="fa-solid fa-cart-plus"></i><span>Solicitar Plan</span>
        </a>
      </div>
      <!-- Plan Premium -->
      <div class="bg-white p-8 rounded-3xl shadow-lg border-2 border-blue-600 relative flex flex-col justify-between">
        <span class="absolute top-0 left-0 bg-yellow-400 text-xs font-bold px-3 py-1 rounded-br-2xl">Recomendado</span>
        <?= nt_heading('Plan Premium', 'fa-solid fa-star', 'sm', null, ['animate' => true, 'delay' => 'md']); ?>
        <ul class="text-gray-700 mb-6 space-y-2 text-left">
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>3 extensiones</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>1 troncal (2 canales)</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>Numeración LADA México</li>
        </ul>
        <p class="font-bold text-blue-600 text-xl mb-6">$605 / mes + IVA</p>
        <a href="#" data-plan="Plan Premium" data-precio="$605 / mes + IVA" data-ext="3 extensiones" data-troncal="1 troncal (2 canales)" data-numeracion="Numeración LADA México" class="nt-btn nt-btn-primary justify-center w-full mt-auto" role="button">
          <i class="fa-solid fa-cart-plus"></i><span>Solicitar Plan</span>
        </a>
      </div>
      <!-- Plan Empresarial -->
      <div class="bg-white p-8 rounded-3xl shadow-lg flex flex-col justify-between border border-gray-100">
        <?= nt_heading('Plan Empresarial', 'fa-solid fa-building', 'sm', null, ['animate' => true, 'delay' => 'lg']); ?>
        <ul class="text-gray-700 mb-6 space-y-2 text-left">
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>10 extensiones</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>1 troncal (10 canales)</li>
          <li class="flex items-center"><span class="text-blue-500 mr-2">✔</span>Numeración LADA México</li>
        </ul>
        <p class="font-bold text-blue-600 text-xl mb-6">$1,490 / mes + IVA</p>
        <a href="#" data-plan="Plan Empresarial" data-precio="$1,490 / mes + IVA" data-ext="10 extensiones" data-troncal="1 troncal (10 canales)" data-numeracion="Numeración LADA México" class="nt-btn nt-btn-primary justify-center w-full mt-auto" role="button">
          <i class="fa-solid fa-cart-plus"></i><span>Solicitar Plan</span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- DEMO -->
<section id="demo" class="py-24 bg-gray-50" aria-labelledby="demo-title">
  <div class="max-w-7xl mx-auto px-6 lg:flex lg:items-center lg:justify-between gap-10">
    <div class="flex-1 text-center lg:text-left animate-fadeInSlow">
      <div id="demo-title" class="mb-4"><?= nt_heading('¿Listo para migrar a la nube?', 'fa-solid fa-cloud-arrow-up', 'lg', 'Solicita tu demo gratuita', ['animate' => true, 'delay' => 'sm','class'=>'nt-heading-accent-bar']); ?></div>
      <p class="text-gray-700 text-lg mb-6">
        Eleva la productividad de tu empresa, reduce costos y olvídate del mantenimiento de sistemas locales. Solicita ahora tu <strong>demo gratuita de 30 días</strong> y prueba todas las funciones avanzadas de Norttek PBX.
      </p>
      <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
        <button id="openModal" class="nt-btn nt-btn-primary" type="button" role="button"><i class="fas fa-clipboard-check"></i><span>Solicitar Demo</span></button>
        <button id="openVideo" data-video="https://www.youtube.com/embed/HVc0M7uDKAE?si=IGVoEfbvS5Rl5-tG" class="nt-btn nt-btn-outline" type="button" role="button"><i class="fas fa-play-circle"></i><span>Ver Video</span></button>
        <button id="openLinkus" data-video="https://www.youtube.com/embed/LVb0_BUqskQ" class="nt-btn nt-btn-dark" type="button" role="button"><i class="fas fa-mobile-alt"></i><span>Linkus UC</span></button>
      </div>
    </div>
    <div class="flex-1 mt-10 lg:mt-0 text-center animate-fadeInSlow">
      <img alt="Yeastar P-Series Phone System Screenshots" width="830" height="566" src="https://www.yeastar.com/wp-content/uploads/2023/08/easy-first-unified-communications-more-in-one-img.png" loading="lazy">
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
        <svg class="w-6 h-6 text-gray-400 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5v4a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2zm0 10v4a2 2 0 002 2h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2zm7-9v2a2 2 0 002 2h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2z" /></svg>
        <input type="tel" name="telefono" id="telefono" placeholder="Teléfono" required class="w-full outline-none" autocomplete="tel">
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-full font-semibold hover:bg-blue-700 transition">
        Enviar y abrir WhatsApp
      </button>
    </form>
  </div>
</div>

<!-- FAQ -->
<div id="faq" class="mt-24">
  <?= faq('faq-telefonia', ['title' => 'Preguntas Frecuentes']) ?>
</div>

<!-- JS específico de la página -->
<?php $jsFiles[] = 'telefonia'; ?>