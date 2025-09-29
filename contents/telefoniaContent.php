<?php
// Contenido modular de la página Telefonía (antes en telefonia.php completo)
// Asume variables: $pageName, $seo ya definidas por pageTemplate.
?>

<!-- HERO -->
<section class="telefonia-hero nt-hero-wrapper" id="hero" aria-labelledby="hero-title">
  <div class="telefonia-hero-bg" aria-hidden="true"></div>
  <div class="telefonia-hero-inner">
    <div id="hero-title" class="opacity-0 translate-y-10">
  <?= nt_heading('Telefonía IP en la Nube', 'fa-solid fa-phone-volume', 'xl', 'Norttek PBX', ['animate' => true, 'delay' => 'sm','class'=>'nt-heading-hero nt-heading-invert']); ?>
    </div>
    <p class="telefonia-hero-sub opacity-0 translate-y-10">
      Gestiona todas las comunicaciones de tu empresa de manera <strong>centralizada desde la nube</strong>. Administra <strong>extensiones</strong>, configura <strong>troncales</strong>, IVR personalizado, grabación de llamadas y <strong>reportes detallados</strong>. Accede desde <strong>PC, smartphone o teléfono físico</strong>, sin infraestructura local ni mantenimiento complejo.
    </p>
    <div class="telefonia-hero-actions opacity-0 translate-y-10 nt-stack-tight">
      <a href="#planes" class="nt-btn nt-btn-primary nt-pulse" role="button"><i class="fa-solid fa-coins"></i><span>Cotiza tu plan</span></a>
      <a href="#demo" class="nt-btn nt-btn-outline" role="button" data-nt-modal-open="#modalDemo"><i class="fa-solid fa-rocket"></i><span>Solicitar demo</span></a>
      <a href="#faq" class="nt-btn nt-btn-accent" role="button"><i class="fas fa-question-circle"></i><span>Preguntas Frecuentes</span></a>
    </div>
  </div>
</section>

<!-- DISPOSITIVOS -->
<section id="dispositivos" class="py-20 bg-gray-100" aria-labelledby="dispositivos-title">
  <div class="max-w-7xl mx-auto px-6 text-center">
  <div id="dispositivos-title" class="nt-stack-loose">
      <?= nt_heading('Accede desde cualquier dispositivo', 'fa-solid fa-display', 'lg', null, ['animate' => true,'class'=>'nt-heading-accent-bar']); ?>
    </div>
    <div class="dev-cards-grid">
      <!-- Nueva Card 1: PC / Laptop -->
      <article class="dev-card" data-device="pc" aria-labelledby="dev-pc-title">
        <div class="dev-card__media">
          <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/net2phones%20business%20phone%20system%20interface%20on%20a%20laptop.webp" alt="Interfaz PBX en laptop" loading="lazy" width="640" height="400">
        </div>
        <div class="dev-card__content">
          <h3 id="dev-pc-title" class="dev-card__title"><span class="dev-card__icon"><i class="fa-solid fa-computer" aria-hidden="true"></i></span>PC / Laptop</h3>
          <p class="dev-card__desc">Control total desde escritorio: panel unificado para llamadas, videollamadas, mensajería y reportes en tiempo real sin hardware adicional.</p>
          <ul class="dev-card__highlights" aria-label="Ventajas clave">
            <li><i class="fa-solid fa-circle-check"></i><span>Operación multi‑ventana</span></li>
            <li><i class="fa-solid fa-circle-check"></i><span>Atajos y productividad</span></li>
            <li><i class="fa-solid fa-circle-check"></i><span>Reportes inmediatos</span></li>
          </ul>
        </div>
      </article>
      <!-- Nueva Card 2: Smartphone / App Linkus -->
      <article class="dev-card dev-card--alt" data-device="mobile" aria-labelledby="dev-mobile-title">
        <div class="dev-card__media">
          <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/net2phone%D1%91s%20business%20phone%20system%20interface%20on%20mobile%20and%20tablet.webp" alt="Aplicación Linkus en smartphone y tablet" loading="lazy" width="640" height="400">
        </div>
        <div class="dev-card__content">
          <h3 id="dev-mobile-title" class="dev-card__title"><span class="dev-card__icon"><i class="fa-solid fa-mobile-screen-button" aria-hidden="true"></i></span>Smartphone / App Linkus</h3>
          <p class="dev-card__desc">Movilidad absoluta: extiende tu extensión a cualquier lugar y mantén presencia corporativa desde el móvil.</p>
          <ul class="dev-card__highlights" aria-label="Ventajas clave">
            <li><i class="fa-solid fa-circle-check"></i><span>Llamadas y transferencia</span></li>
            <li><i class="fa-solid fa-circle-check"></i><span>Grabación y buzón</span></li>
            <li><i class="fa-solid fa-circle-check"></i><span>Notificaciones push</span></li>
          </ul>
        </div>
      </article>
      <!-- Nueva Card 3: Teléfono físico SIP -->
      <article class="dev-card" data-device="sip" aria-labelledby="dev-sip-title">
        <div class="dev-card__media">
          <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/Desk%20Business%20Phone.webp" alt="Teléfono físico SIP de escritorio" loading="lazy" width="640" height="400">
        </div>
        <div class="dev-card__content">
          <h3 id="dev-sip-title" class="dev-card__title"><span class="dev-card__icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>Teléfono físico SIP</h3>
          <p class="dev-card__desc">Dispositivo dedicado para puestos operativos que requieren audio nítido y confiabilidad continua.</p>
          <ul class="dev-card__highlights" aria-label="Ventajas clave">
            <li><i class="fa-solid fa-circle-check"></i><span>Calidad de voz HD</span></li>
            <li><i class="fa-solid fa-circle-check"></i><span>Funciones avanzadas (colas / IVR)</span></li>
            <li><i class="fa-solid fa-circle-check"></i><span>Bajo mantenimiento</span></li>
          </ul>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- PLANES -->
<section id="planes" class="py-24 bg-gray-50" aria-labelledby="planes-title">
  <div class="max-w-7xl mx-auto px-6 text-center nt-stack">
  <div id="planes-title" class="nt-stack">
      <?= nt_heading('Planes y llamadas ilimitadas', 'fa-solid fa-boxes-stacked', 'lg', null, ['animate' => true, 'delay' => 'sm','class'=>'nt-heading-accent-bar']); ?>
    </div>
  <p class="text-gray-700 max-w-2xl mx-auto text-lg">
      Elige el plan que mejor se adapta a tu empresa. Todos incluyen numeración LADA México y soporte técnico.
    </p>
    <div class="mt-14 tel-plans-modern grid md:grid-cols-3 gap-10">
      <!-- Nuevo Plan Básico -->
      <article class="tel-plan tel-plan--tier-basico" data-plan-tier="basico">
        <header class="tel-plan__hdr">
          <div class="tel-plan__icon" aria-hidden="true"><i class="fa-solid fa-circle-dot"></i></div>
          <div class="tel-plan__titles">
            <h3 class="tel-plan__name">Plan Básico</h3>
            <p class="tel-plan__tag">Para iniciar sin complicaciones</p>
          </div>
        </header>
        <div class="tel-plan__body">
          <ul class="tel-plan__features" aria-label="Características incluidas">
            <li><i class="fa-solid fa-phone"></i><span>1 extensión</span></li>
            <li><i class="fa-solid fa-diagram-project"></i><span>1 troncal (2 canales)</span></li>
            <li><i class="fa-solid fa-hashtag"></i><span>Numeración LADA México</span></li>
          </ul>
          <div class="tel-plan__meta">
            <div class="tel-plan__price" aria-label="Precio mensual">$379 <small>/ mes + IVA</small></div>
          </div>
        </div>
        <footer class="tel-plan__ftr">
          <a href="#" class="nt-btn tel-plan__btn" role="button" data-plan="Plan Básico" data-precio="$379 / mes + IVA" data-ext="1 extensión" data-troncal="1 troncal (2 canales)" data-numeracion="Numeración LADA México"><i class="fa-solid fa-cart-plus"></i><span>Solicitar Plan</span></a>
        </footer>
      </article>
      <!-- Nuevo Plan Premium -->
      <article class="tel-plan tel-plan--tier-premium is-featured" data-plan-tier="premium">
        <div class="tel-plan__badge" aria-label="Plan recomendado"><i class="fa-solid fa-award" aria-hidden="true"></i><span>Recomendado</span></div>
        <header class="tel-plan__hdr">
          <div class="tel-plan__icon" aria-hidden="true"><i class="fa-solid fa-star"></i></div>
          <div class="tel-plan__titles">
            <h3 class="tel-plan__name">Plan Premium</h3>
            <p class="tel-plan__tag">Más capacidad y escalabilidad</p>
          </div>
        </header>
        <div class="tel-plan__body">
          <ul class="tel-plan__features" aria-label="Características incluidas">
            <li><i class="fa-solid fa-phone"></i><span>3 extensiones</span></li>
            <li><i class="fa-solid fa-diagram-project"></i><span>1 troncal (2 canales)</span></li>
            <li><i class="fa-solid fa-hashtag"></i><span>Numeración LADA México</span></li>
          </ul>
          <div class="tel-plan__meta">
            <div class="tel-plan__price" aria-label="Precio mensual">$605 <small>/ mes + IVA</small></div>
          </div>
        </div>
        <footer class="tel-plan__ftr">
          <a href="#" class="nt-btn tel-plan__btn" role="button" data-plan="Plan Premium" data-precio="$605 / mes + IVA" data-ext="3 extensiones" data-troncal="1 troncal (2 canales)" data-numeracion="Numeración LADA México"><i class="fa-solid fa-cart-plus"></i><span>Solicitar Plan</span></a>
        </footer>
      </article>
      <!-- Nuevo Plan Empresarial -->
      <article class="tel-plan tel-plan--tier-empresarial" data-plan-tier="empresarial">
        <header class="tel-plan__hdr">
          <div class="tel-plan__icon" aria-hidden="true"><i class="fa-solid fa-building"></i></div>
          <div class="tel-plan__titles">
            <h3 class="tel-plan__name">Plan Empresarial</h3>
            <p class="tel-plan__tag">Expansión y operación intensiva</p>
          </div>
        </header>
        <div class="tel-plan__body">
          <ul class="tel-plan__features" aria-label="Características incluidas">
            <li><i class="fa-solid fa-phone"></i><span>10 extensiones</span></li>
            <li><i class="fa-solid fa-diagram-project"></i><span>1 troncal (10 canales)</span></li>
            <li><i class="fa-solid fa-hashtag"></i><span>Numeración LADA México</span></li>
          </ul>
          <div class="tel-plan__meta">
            <div class="tel-plan__price" aria-label="Precio mensual">$1,490 <small>/ mes + IVA</small></div>
          </div>
        </div>
        <footer class="tel-plan__ftr">
          <a href="#" class="nt-btn tel-plan__btn" role="button" data-plan="Plan Empresarial" data-precio="$1,490 / mes + IVA" data-ext="10 extensiones" data-troncal="1 troncal (10 canales)" data-numeracion="Numeración LADA México"><i class="fa-solid fa-cart-plus"></i><span>Solicitar Plan</span></a>
        </footer>
      </article>
    </div>
  </div>
</section>

<!-- DEMO -->
<section id="demo" class="py-24 bg-gray-50" aria-labelledby="demo-title">
  <div class="max-w-7xl mx-auto px-6 lg:flex lg:items-center lg:justify-between gap-10 nt-stack">
    <div class="flex-1 text-center lg:text-left animate-fadeInSlow">
      <div id="demo-title" class="mb-4"><?= nt_heading('¿Listo para migrar a la nube?', 'fa-solid fa-cloud-arrow-up', 'lg', 'Solicita tu demo gratuita', ['animate' => true, 'delay' => 'sm','class'=>'nt-heading-accent-bar']); ?></div>
      <p class="text-gray-700 text-lg mb-6">
        Eleva la productividad de tu empresa, reduce costos y olvídate del mantenimiento de sistemas locales. Solicita ahora tu <strong>demo gratuita de 30 días</strong> y prueba todas las funciones avanzadas de Norttek PBX.
      </p>
      <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
        <button id="openModal" class="nt-btn nt-btn-primary" type="button" role="button" data-nt-modal-open="#modalDemo"><i class="fas fa-clipboard-check"></i><span>Solicitar Demo</span></button>
        <button id="openVideo" data-video="https://www.youtube.com/embed/HVc0M7uDKAE?si=IGVoEfbvS5Rl5-tG" class="nt-btn nt-btn-outline" type="button" role="button" data-nt-modal-open="#modalVideo"><i class="fas fa-play-circle"></i><span>Ver Video</span></button>
        <button id="openLinkus" data-video="https://www.youtube.com/embed/LVb0_BUqskQ" class="nt-btn nt-btn-dark" type="button" role="button" data-nt-modal-open="#modalVideo"><i class="fas fa-mobile-alt"></i><span>Linkus UC</span></button>
      </div>
    </div>
    <div class="flex-1 mt-10 lg:mt-0 text-center animate-fadeInSlow">
      <img alt="Yeastar P-Series Phone System Screenshots" width="830" height="566" src="https://www.yeastar.com/wp-content/uploads/2023/08/easy-first-unified-communications-more-in-one-img.png" loading="lazy">
    </div>
  </div>
</section>

<!-- Modal Video (sistema unificado .nt-modal) -->
<div id="modalVideo" class="nt-modal-backdrop" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modalvideo-title">
  <div class="nt-modal nt-modal-wide" role="document">
    <button type="button" class="nt-modal-close" data-nt-modal-close aria-label="Cerrar">&times;</button>
    <?= nt_heading('Video demostración', 'fa-solid fa-video', 'sm', 'Reproduce el video de Telefonía', ['class'=>'nt-heading-accent-hairline','id'=>'modalvideo-title']); ?>
    <div class="modal-body" style="margin-top:.6rem;">
      <div class="nt-aspect-video">
        <iframe id="youtubeVideo" src="" title="Demo Video" allow="autoplay; encrypted-media" allowfullscreen loading="lazy"></iframe>
      </div>
    </div>
    <div class="nt-modal-actions">
      <button class="nt-btn nt-btn-outline" data-nt-modal-close><i class="fa-solid fa-xmark"></i><span>Cerrar</span></button>
    </div>
  </div>
  </div>

<!-- Modal Demo (sistema unificado .nt-modal) -->
<div id="modalDemo" class="nt-modal-backdrop" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modaldemo-title">
  <div class="nt-modal" role="document">
    <button type="button" class="nt-modal-close" data-nt-modal-close aria-label="Cerrar">&times;</button>
    <?= nt_heading('Solicitar Demo Gratuita', 'fa-solid fa-rocket', 'sm', 'Prueba Norttek PBX por 30 días', ['class'=>'nt-heading-accent-hairline','id'=>'modaldemo-title']); ?>
    <div class="modal-body" style="margin-top:.6rem;">
      <form id="demoForm" class="nt-form nt-stack" autocomplete="on">
        <label class="nt-field">
          <span class="nt-label">Nombre completo</span>
          <input type="text" name="nombre" id="nombre" placeholder="Tu nombre" required class="nt-input" autocomplete="name">
        </label>
        <label class="nt-field">
          <span class="nt-label">Correo electrónico</span>
          <input type="email" name="email" id="email" placeholder="tucorreo@empresa.com" required class="nt-input" autocomplete="email">
        </label>
        <label class="nt-field">
          <span class="nt-label">Teléfono</span>
          <input type="tel" name="telefono" id="telefono" placeholder="10 dígitos" required class="nt-input" autocomplete="tel" inputmode="tel">
        </label>
      </form>
    </div>
    <div class="nt-modal-actions">
      <button type="submit" form="demoForm" class="nt-btn nt-btn-primary"><i class="fa-solid fa-paper-plane"></i><span>Enviar y abrir WhatsApp</span></button>
      <button class="nt-btn nt-btn-outline" data-nt-modal-close><i class="fa-solid fa-xmark"></i><span>Cerrar</span></button>
    </div>
  </div>
  </div>

<!-- FAQ -->
<div id="faq" class="mt-24">
  <?= faq('faq-telefonia', ['title' => 'Preguntas Frecuentes']) ?>
</div>

<!-- JS específico de la página -->
<?php $jsFiles[] = 'telefonia'; ?>