<?php
// Contenido refactorizado de Telefonía IP - Experiencia educativa y emocional
// Estructura narrativa que guía al usuario no técnico paso a paso
?>

<!-- HERO INICIAL - Conexión emocional -->
<section class="telefonia-hero nt-hero-wrapper" id="hero" aria-labelledby="hero-title" style="position: relative; min-height: 600px; display: flex; align-items: center; justify-content: center; padding: 150px 1rem 90px;">
  <div class="telefonia-hero-bg" aria-hidden="true" style="position: absolute; inset: 0; background: url('assets/img/yeastar-hero.webp') center/cover no-repeat; z-index: 1; filter: brightness(1.3) contrast(1.1);"></div>

  <div class="telefonia-hero-inner" style="position: relative; z-index: 3; max-width: 980px; text-align: center; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">
    <div id="hero-title" style="margin-bottom: 2rem;">
      <?= nt_heading('¿Tu teléfono empresarial te limita?', 'fa-solid fa-phone-slash', 'xl', 'Es hora de evolucionar', ['animate' => true, 'delay' => 'sm','class'=>'nt-heading-hero nt-heading-invert']); ?>
    </div>
    <p class="telefonia-hero-sub" style="color: white; font-size: 1.25rem; line-height: 1.6; margin: 0 auto 2.5rem; max-width: 800px; text-shadow: 1px 1px 3px rgba(0,0,0,0.6);">
      Imagina poder <strong>atender llamadas desde cualquier lugar</strong>, transferir clientes sin cortes, grabar conversaciones importantes y tener reportes detallados de tu comunicación empresarial. <em>Todo sin cables, sin hardware complicado, sin dolores de cabeza.</em>
    </p>
    <div class="telefonia-hero-actions nt-stack-tight" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem;">
      <a href="#que-es" class="nt-btn nt-btn-primary nt-pulse" role="button"><i class="fa-solid fa-lightbulb"></i><span>Descubrir cómo funciona</span></a>
      <a href="#demo" class="nt-btn nt-btn-outline" role="button" data-nt-modal-open="#modalDemo"><i class="fa-solid fa-rocket"></i><span>Probar gratis 30 días</span></a>
    </div>
  </div>
</section>

<!-- PASO 1: ¿QUÉ ES TELEFONÍA IP? - Explicación simple -->
<section id="que-es" class="py-24 bg-white" aria-labelledby="que-es-title">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-20">
      <div id="que-es-title" class="nt-stack mb-6">
        <?= nt_heading('¿Qué es la Telefonía IP?', 'fa-solid fa-question-circle', 'lg', 'Una explicación simple', ['animate' => true, 'class'=>'nt-heading-accent-bar']); ?>
      </div>
      <p class="text-gray-700 max-w-4xl mx-auto text-xl leading-relaxed">
        Olvídate de los conceptos técnicos complicados. Te explicamos de manera sencilla qué es y por qué está revolucionando las comunicaciones empresariales.
      </p>
    </div>

    <!-- Historia evolutiva -->
    <div class="evolution-timeline mb-20">
      <!-- Imagen ilustrativa de la evolución -->
      <div class="text-center mb-12">
        <img src="assets/img/evolution-phones.jpg" alt="Evolución de sistemas telefónicos: de analógico a digital" class="mx-auto rounded-lg shadow-lg max-w-3xl w-full" loading="lazy">
      </div>
      
      <div class="grid md:grid-cols-3 gap-8 items-center">
        <!-- Era pasada -->
        <div class="timeline-era timeline-era--past">
          <div class="timeline-era__icon">
            <i class="fa-solid fa-phone-flip text-4xl text-gray-400"></i>
          </div>
          <h3 class="timeline-era__title">Era Analógica</h3>
          <p class="timeline-era__period">Años 1900-2000</p>
          <ul class="timeline-era__features">
            <li><i class="fa-solid fa-times text-red-500"></i>Cables físicos</li>
            <li><i class="fa-solid fa-times text-red-500"></i>Una ubicación</li>
            <li><i class="fa-solid fa-times text-red-500"></i>Solo llamar y colgar</li>
          </ul>
        </div>

        <!-- Transición -->
        <div class="timeline-transition">
          <div class="timeline-arrow">
            <i class="fa-solid fa-arrow-right text-3xl text-blue-500"></i>
          </div>
          <p class="timeline-evolution">Evolución tecnológica</p>
        </div>

        <!-- Era presente -->
        <div class="timeline-era timeline-era--present">
          <div class="timeline-era__icon">
            <i class="fa-solid fa-cloud text-4xl text-blue-500"></i>
          </div>
          <h3 class="timeline-era__title">Era Digital</h3>
          <p class="timeline-era__period">2000 - Presente</p>
          <ul class="timeline-era__features">
            <li><i class="fa-solid fa-check text-green-500"></i>Internet global</li>
            <li><i class="fa-solid fa-check text-green-500"></i>Cualquier lugar</li>
            <li><i class="fa-solid fa-check text-green-500"></i>Grabar y transferir</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Comparación detallada -->
    <div class="detailed-comparison mb-20">
      <!-- Imagen central de comparación -->
      <div class="text-center mb-12">
        <img src="assets/img/traditional-vs-voip.jpg" alt="Comparación: Sistema telefónico tradicional vs Telefonía IP" class="mx-auto rounded-lg shadow-lg max-w-4xl w-full" loading="lazy">
      </div>
      
      <div class="grid lg:grid-cols-2 gap-16 items-start">
        <!-- Lado tradicional -->
        <div class="comparison-side comparison-side--old">
          <div class="comparison-side__header">
            <div class="comparison-side__icon-wrapper">
              <i class="fa-solid fa-phone-flip text-5xl text-red-500"></i>
            </div>
            <h3 class="comparison-side__title">Sistema Tradicional</h3>
            <p class="comparison-side__subtitle">Lo que conoces actualmente</p>
          </div>
          
          <div class="comparison-problems">
            <h4 class="comparison-problems__title">Problemas comunes:</h4>
            <div class="space-y-4">
              <div class="problem-item">
                <i class="fa-solid fa-location-dot text-red-500 text-xl"></i>
                <div>
                  <strong>Ubicación fija:</strong>
                  <p class="text-sm text-gray-600">Solo funciona en la oficina</p>
                </div>
              </div>
              <div class="problem-item">
                <i class="fa-solid fa-clock text-red-500 text-xl"></i>
                <div>
                  <strong>Pérdida de tiempo:</strong>
                  <p class="text-sm text-gray-600">Configuraciones complicadas y lentas</p>
                </div>
              </div>
              <div class="problem-item">
                <i class="fa-solid fa-wrench text-red-500 text-xl"></i>
                <div>
                  <strong>Mantenimiento:</strong>
                  <p class="text-sm text-gray-600">Técnicos, reparaciones, actualizaciones</p>
                </div>
              </div>
              <div class="problem-item">
                <i class="fa-solid fa-ban text-red-500 text-xl"></i>
                <div>
                  <strong>Sin flexibilidad:</strong>
                  <p class="text-sm text-gray-600">No puedes grabar, transferir o crear extensiones</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Lado IP -->
        <div class="comparison-side comparison-side--new">
          <div class="comparison-side__header">
            <div class="comparison-side__icon-wrapper">
              <i class="fa-solid fa-cloud text-5xl text-blue-500"></i>
            </div>
            <h3 class="comparison-side__title">Telefonía IP</h3>
            <p class="comparison-side__subtitle">La evolución que necesitas</p>
          </div>
          
          <div class="comparison-benefits">
            <h4 class="comparison-benefits__title">Ventajas inmediatas:</h4>
            <div class="space-y-4">
              <div class="benefit-item">
                <i class="fa-solid fa-globe text-green-500 text-xl"></i>
                <div>
                  <strong>Libertad total:</strong>
                  <p class="text-sm text-gray-600">Funciona desde cualquier lugar del mundo</p>
                </div>
              </div>
              <div class="benefit-item">
                <i class="fa-solid fa-clock text-green-500 text-xl"></i>
                <div>
                  <strong>Configuración rápida:</strong>
                  <p class="text-sm text-gray-600">Lista para usar en minutos, no días</p>
                </div>
              </div>
              <div class="benefit-item">
                <i class="fa-solid fa-magic-wand-sparkles text-green-500 text-xl"></i>
                <div>
                  <strong>Cero mantenimiento:</strong>
                  <p class="text-sm text-gray-600">Nosotros nos encargamos de todo</p>
                </div>
              </div>
              <div class="benefit-item">
                <i class="fa-solid fa-star text-green-500 text-xl"></i>
                <div>
                  <strong>Herramientas profesionales:</strong>
                  <p class="text-sm text-gray-600">Grabación, transferencias, música en espera, reportes</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Explicación con analogía mejorada -->
    <div class="analogy-explanation">
      <div class="grid lg:grid-cols-3 gap-8 items-center">
        <div class="analogy-step">
          <div class="analogy-step__icon">
            <i class="fa-solid fa-envelope text-4xl text-gray-500"></i>
          </div>
          <h4 class="analogy-step__title">Antes: Cartas físicas</h4>
          <p class="analogy-step__desc">Lentas, costosas, limitadas a un lugar</p>
        </div>
        
        <div class="analogy-arrow">
          <i class="fa-solid fa-arrow-right text-3xl text-blue-500"></i>
          <p class="text-sm text-gray-600 mt-2">Evolución</p>
        </div>
        
        <div class="analogy-step">
          <div class="analogy-step__icon">
            <i class="fa-solid fa-at text-4xl text-blue-500"></i>
          </div>
          <h4 class="analogy-step__title">Ahora: Email</h4>
          <p class="analogy-step__desc">Instantáneo, económico, desde cualquier lugar</p>
        </div>
      </div>
      
      <div class="analogy-conclusion">
        <div class="highlight-box-enhanced">
          <div class="highlight-box-enhanced__icon">
            <i class="fa-solid fa-lightbulb text-3xl text-yellow-500"></i>
          </div>
          <div class="highlight-box-enhanced__content">
            <h4 class="highlight-box-enhanced__title">La Telefonía IP es la misma evolución</h4>
            <p class="highlight-box-enhanced__desc">
              Tu internet actual se convierte en un sistema telefónico profesional completo. 
              <strong>Mismo objetivo, pero infinitamente mejor.</strong>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PASO 2: BENEFICIOS TANGIBLES - Conexión emocional -->
<section id="beneficios" class="py-24 bg-gradient-to-br from-blue-50 to-indigo-100" aria-labelledby="beneficios-title">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
      <div id="beneficios-title" class="nt-stack">
        <?= nt_heading('¿Qué cambia en tu día a día?', 'fa-solid fa-heart', 'lg', 'Beneficios que sentirás desde el primer día', ['animate' => true, 'class'=>'nt-heading-accent-bar']); ?>
      </div>
      <p class="text-gray-700 max-w-3xl mx-auto text-lg">
        Más allá de la tecnología, estos son los cambios reales que experimentarás en tu empresa.
      </p>
      
      <!-- Imagen de beneficios empresariales -->
      <div class="mt-8 mb-8">
        <img src="assets/img/business-benefits-phone.jpg" alt="Empresarios utilizando telefonía IP para mejorar su comunicación" class="mx-auto rounded-lg shadow-lg max-w-3xl w-full" loading="lazy">
      </div>
    </div>

    <div class="benefits-grid grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Beneficio 1: Libertad -->
      <article class="benefit-card benefit-card--freedom">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-person-walking-arrow-loop-left"></i>
        </div>
        <h3 class="benefit-card__title">Libertad Total</h3>
        <p class="benefit-card__desc">
          Atiende llamadas de la empresa desde casa, en viaje de negocios o en la sucursal. Tu número empresarial te sigue a donde vayas.
        </p>
        <div class="benefit-card__example">
          <strong>Ejemplo real:</strong> "Estoy en casa con gripe, pero puedo atender a mis clientes como si estuviera en la oficina."
        </div>
      </article>

      <!-- Beneficio 2: Imagen profesional -->
      <article class="benefit-card benefit-card--professional">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-user-tie"></i>
        </div>
        <h3 class="benefit-card__title">Imagen Profesional</h3>
        <p class="benefit-card__desc">
          Contesta automáticamente con música en espera, transfiere llamadas sin cortes, y graba conversaciones importantes.
        </p>
        <div class="benefit-card__example">
          <strong>Ejemplo real:</strong> "Mis clientes piensan que tengo una gran empresa, aunque seamos solo 3 personas."
        </div>
      </article>

      <!-- Beneficio 3: Comunicación mejorada -->
      <article class="benefit-card benefit-card--communication">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-comments"></i>
        </div>
        <h3 class="benefit-card__title">Comunicación Mejorada</h3>
        <p class="benefit-card__desc">
          Llamadas ilimitadas nacionales, calidad de audio superior, y nunca más líneas ocupadas. Tu equipo siempre conectado.
        </p>
        <div class="benefit-card__example">
          <strong>Ejemplo real:</strong> "Mis clientes ya no escuchan 'línea ocupada'. Siempre hay alguien disponible para atenderlos."
        </div>
      </article>

      <!-- Beneficio 4: Control -->
      <article class="benefit-card benefit-card--control">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-chart-line"></i>
        </div>
        <h3 class="benefit-card__title">Control Total</h3>
        <p class="benefit-card__desc">
          Ve reportes de todas las llamadas, duración, quién llamó y cuándo. Información valiosa para tu negocio.
        </p>
        <div class="benefit-card__example">
          <strong>Ejemplo real:</strong> "Ahora sé exactamente cuándo llaman más clientes y puedo programar mejor mi personal."
        </div>
      </article>

      <!-- Beneficio 5: Simplicidad -->
      <article class="benefit-card benefit-card--simplicity">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-magic-wand-sparkles"></i>
        </div>
        <h3 class="benefit-card__title">Sin Complicaciones</h3>
        <p class="benefit-card__desc">
          No necesitas ser experto en tecnología. Se configura fácil y funciona solo. Nosotros nos encargamos del mantenimiento.
        </p>
        <div class="benefit-card__example">
          <strong>Ejemplo real:</strong> "Mi secretaria lo aprendió a usar en 10 minutos. Es más fácil que WhatsApp."
        </div>
      </article>

      <!-- Beneficio 6: Crecimiento -->
      <article class="benefit-card benefit-card--growth">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-chart-line-up"></i>
        </div>
        <h3 class="benefit-card__title">Escalabilidad Instantánea</h3>
        <p class="benefit-card__desc">
          Tu negocio crece y tu telefonía se adapta al instante. Sin comprar equipos, sin instalaciones complicadas, sin dolores de cabeza.
        </p>
        
        <div class="growth-scenarios">
          <div class="growth-scenario">
            <i class="fa-solid fa-user-plus text-green-500"></i>
            <span class="growth-scenario__text"><strong>+1 empleado</strong> = +1 extensión en 5 minutos</span>
          </div>
          <div class="growth-scenario">
            <i class="fa-solid fa-building text-blue-500"></i>
            <span class="growth-scenario__text"><strong>Nueva sucursal</strong> = Mismo sistema, cero instalación</span>
          </div>
          <div class="growth-scenario">
            <i class="fa-solid fa-phone-volume text-purple-500"></i>
            <span class="growth-scenario__text"><strong>Más llamadas</strong> = Más canales automáticamente</span>
          </div>
        </div>
        
        <div class="benefit-card__example">
          <strong>Caso real:</strong> "Empecé con 2 extensiones. Hoy tengo 15 empleados en 3 ciudades. El sistema creció conmigo sin complicaciones."
        </div>
        
        <div class="growth-timeline">
          <h5 class="growth-timeline__title">Tu crecimiento típico:</h5>
          <div class="growth-timeline__steps">
            <span class="growth-step">Mes 1: 1-3 ext.</span>
            <span class="growth-arrow">→</span>
            <span class="growth-step">Año 1: 5-10 ext.</span>
            <span class="growth-arrow">→</span>
            <span class="growth-step">Año 2+: 15+ ext.</span>
          </div>
          <p class="growth-timeline__note">Cada paso es instantáneo y sin costos de instalación</p>
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
          <button type="button" class="nt-btn tel-plan__btn" data-plan="Plan Básico" data-precio="$379 / mes + IVA" data-ext="1 extensión" data-troncal="1 troncal (2 canales)" data-numeracion="Numeración LADA México"><i class="fa-solid fa-cart-plus"></i><span>Solicitar Plan</span></button>
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
          <button type="button" class="nt-btn tel-plan__btn" data-plan="Plan Premium" data-precio="$605 / mes + IVA" data-ext="3 extensiones" data-troncal="1 troncal (2 canales)" data-numeracion="Numeración LADA México"><i class="fa-solid fa-cart-plus"></i><span>Solicitar Plan</span></button>
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
          <button type="button" class="nt-btn tel-plan__btn" data-plan="Plan Empresarial" data-precio="$1,490 / mes + IVA" data-ext="10 extensiones" data-troncal="1 troncal (10 canales)" data-numeracion="Numeración LADA México"><i class="fa-solid fa-cart-plus"></i><span>Solicitar Plan</span></button>
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
<?php
// Contenido refactorizado de Telefonía IP - Experiencia educativa y emocional
// Estructura narrativa que guía al usuario no técnico paso a paso
?>

<!-- HERO INICIAL - Conexión emocional -->
<section class="telefonia-hero nt-hero-wrapper" id="hero" aria-labelledby="hero-title" style="position: relative; min-height: 600px; display: flex; align-items: center; justify-content: center; padding: 150px 1rem 90px;">
  <div class="telefonia-hero-bg" aria-hidden="true" style="position: absolute; inset: 0; background: url('assets/img/yeastar-hero.webp') center/cover no-repeat; z-index: 1; filter: brightness(1.3) contrast(1.1);"></div>

  <div class="telefonia-hero-inner" style="position: relative; z-index: 3; max-width: 980px; text-align: center; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">
    <div id="hero-title" style="margin-bottom: 2rem;">
      <?= nt_heading('¿Tu teléfono empresarial te limita?', 'fa-solid fa-phone-slash', 'xl', 'Es hora de evolucionar', ['animate' => true, 'delay' => 'sm','class'=>'nt-heading-hero nt-heading-invert']); ?>
    </div>
    <p class="telefonia-hero-sub" style="color: white; font-size: 1.25rem; line-height: 1.6; margin: 0 auto 2.5rem; max-width: 800px; text-shadow: 1px 1px 3px rgba(0,0,0,0.6);">
      Imagina poder <strong>atender llamadas desde cualquier lugar</strong>, transferir clientes sin cortes, grabar conversaciones importantes y tener reportes detallados de tu comunicación empresarial. <em>Todo sin cables, sin hardware complicado, sin dolores de cabeza.</em>
    </p>
    <div class="telefonia-hero-actions nt-stack-tight" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem;">
      <a href="#que-es" class="nt-btn nt-btn-primary nt-pulse" role="button"><i class="fa-solid fa-lightbulb"></i><span>Descubrir cómo funciona</span></a>
      <a href="#demo" class="nt-btn nt-btn-outline" role="button" data-nt-modal-open="#modalDemo"><i class="fa-solid fa-rocket"></i><span>Probar gratis 30 días</span></a>
    </div>
  </div>
</section>

<!-- PASO 1: ¿QUÉ ES TELEFONÍA IP? - Explicación simple -->
<section id="que-es" class="py-24 bg-white" aria-labelledby="que-es-title">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-20">
      <div id="que-es-title" class="nt-stack mb-6">
        <?= nt_heading('¿Qué es la Telefonía IP?', 'fa-solid fa-question-circle', 'lg', 'Una explicación simple', ['animate' => true, 'class'=>'nt-heading-accent-bar']); ?>
      </div>
      <p class="text-gray-700 max-w-4xl mx-auto text-xl leading-relaxed">
        Olvídate de los conceptos técnicos complicados. Te explicamos de manera sencilla qué es y por qué está revolucionando las comunicaciones empresariales.
      </p>
    </div>

    <!-- Historia evolutiva -->
    <div class="evolution-timeline mb-20">
      <!-- Imagen ilustrativa de la evolución -->
      <div class="text-center mb-12">
        <img src="assets/img/evolution-phones.jpg" alt="Evolución de sistemas telefónicos: de analógico a digital" class="mx-auto rounded-lg shadow-lg max-w-3xl w-full" loading="lazy">
      </div>
      
      <div class="grid md:grid-cols-3 gap-8 items-center">
        <!-- Era pasada -->
        <div class="timeline-era timeline-era--past">
          <div class="timeline-era__icon">
            <i class="fa-solid fa-phone-flip text-4xl text-gray-400"></i>
          </div>
          <h3 class="timeline-era__title">Era Analógica</h3>
          <p class="timeline-era__period">Años 1900-2000</p>
          <ul class="timeline-era__features">
            <li><i class="fa-solid fa-times text-red-500"></i>Cables físicos</li>
            <li><i class="fa-solid fa-times text-red-500"></i>Una ubicación</li>
            <li><i class="fa-solid fa-times text-red-500"></i>Solo llamar y colgar</li>
          </ul>
        </div>

        <!-- Transición -->
        <div class="timeline-transition">
          <div class="timeline-arrow">
            <i class="fa-solid fa-arrow-right text-3xl text-blue-500"></i>
          </div>
          <p class="timeline-evolution">Evolución tecnológica</p>
        </div>

        <!-- Era presente -->
        <div class="timeline-era timeline-era--present">
          <div class="timeline-era__icon">
            <i class="fa-solid fa-cloud text-4xl text-blue-500"></i>
          </div>
          <h3 class="timeline-era__title">Era Digital</h3>
          <p class="timeline-era__period">2000 - Presente</p>
          <ul class="timeline-era__features">
            <li><i class="fa-solid fa-check text-green-500"></i>Internet global</li>
            <li><i class="fa-solid fa-check text-green-500"></i>Cualquier lugar</li>
            <li><i class="fa-solid fa-check text-green-500"></i>Grabar y transferir</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Comparación detallada -->
    <div class="detailed-comparison mb-20">
      <!-- Imagen central de comparación -->
      <div class="text-center mb-12">
        <img src="assets/img/traditional-vs-voip.jpg" alt="Comparación: Sistema telefónico tradicional vs Telefonía IP" class="mx-auto rounded-lg shadow-lg max-w-4xl w-full" loading="lazy">
      </div>
      
      <div class="grid lg:grid-cols-2 gap-16 items-start">
        <!-- Lado tradicional -->
        <div class="comparison-side comparison-side--old">
          <div class="comparison-side__header">
            <div class="comparison-side__icon-wrapper">
              <i class="fa-solid fa-phone-flip text-5xl text-red-500"></i>
            </div>
            <h3 class="comparison-side__title">Sistema Tradicional</h3>
            <p class="comparison-side__subtitle">Lo que conoces actualmente</p>
          </div>
          
          <div class="comparison-problems">
            <h4 class="comparison-problems__title">Problemas comunes:</h4>
            <div class="space-y-4">
              <div class="problem-item">
                <i class="fa-solid fa-location-dot text-red-500 text-xl"></i>
                <div>
                  <strong>Ubicación fija:</strong>
                  <p class="text-sm text-gray-600">Solo funciona en la oficina</p>
                </div>
              </div>
              <div class="problem-item">
                <i class="fa-solid fa-clock text-red-500 text-xl"></i>
                <div>
                  <strong>Pérdida de tiempo:</strong>
                  <p class="text-sm text-gray-600">Configuraciones complicadas y lentas</p>
                </div>
              </div>
              <div class="problem-item">
                <i class="fa-solid fa-wrench text-red-500 text-xl"></i>
                <div>
                  <strong>Mantenimiento:</strong>
                  <p class="text-sm text-gray-600">Técnicos, reparaciones, actualizaciones</p>
                </div>
              </div>
              <div class="problem-item">
                <i class="fa-solid fa-ban text-red-500 text-xl"></i>
                <div>
                  <strong>Sin flexibilidad:</strong>
                  <p class="text-sm text-gray-600">No puedes grabar, transferir o crear extensiones</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Lado IP -->
        <div class="comparison-side comparison-side--new">
          <div class="comparison-side__header">
            <div class="comparison-side__icon-wrapper">
              <i class="fa-solid fa-cloud text-5xl text-blue-500"></i>
            </div>
            <h3 class="comparison-side__title">Telefonía IP</h3>
            <p class="comparison-side__subtitle">La evolución que necesitas</p>
          </div>
          
          <div class="comparison-benefits">
            <h4 class="comparison-benefits__title">Ventajas inmediatas:</h4>
            <div class="space-y-4">
              <div class="benefit-item">
                <i class="fa-solid fa-globe text-green-500 text-xl"></i>
                <div>
                  <strong>Libertad total:</strong>
                  <p class="text-sm text-gray-600">Funciona desde cualquier lugar del mundo</p>
                </div>
              </div>
              <div class="benefit-item">
                <i class="fa-solid fa-clock text-green-500 text-xl"></i>
                <div>
                  <strong>Configuración rápida:</strong>
                  <p class="text-sm text-gray-600">Lista para usar en minutos, no días</p>
                </div>
              </div>
              <div class="benefit-item">
                <i class="fa-solid fa-magic-wand-sparkles text-green-500 text-xl"></i>
                <div>
                  <strong>Cero mantenimiento:</strong>
                  <p class="text-sm text-gray-600">Nosotros nos encargamos de todo</p>
                </div>
              </div>
              <div class="benefit-item">
                <i class="fa-solid fa-star text-green-500 text-xl"></i>
                <div>
                  <strong>Herramientas profesionales:</strong>
                  <p class="text-sm text-gray-600">Grabación, transferencias, música en espera, reportes</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Explicación con analogía mejorada -->
    <div class="analogy-explanation">
      <div class="grid lg:grid-cols-3 gap-8 items-center">
        <div class="analogy-step">
          <div class="analogy-step__icon">
            <i class="fa-solid fa-envelope text-4xl text-gray-500"></i>
          </div>
          <h4 class="analogy-step__title">Antes: Cartas físicas</h4>
          <p class="analogy-step__desc">Lentas, costosas, limitadas a un lugar</p>
        </div>
        
        <div class="analogy-arrow">
          <i class="fa-solid fa-arrow-right text-3xl text-blue-500"></i>
          <p class="text-sm text-gray-600 mt-2">Evolución</p>
        </div>
        
        <div class="analogy-step">
          <div class="analogy-step__icon">
            <i class="fa-solid fa-at text-4xl text-blue-500"></i>
          </div>
          <h4 class="analogy-step__title">Ahora: Email</h4>
          <p class="analogy-step__desc">Instantáneo, económico, desde cualquier lugar</p>
        </div>
      </div>
      
      <div class="analogy-conclusion">
        <div class="highlight-box-enhanced">
          <div class="highlight-box-enhanced__icon">
            <i class="fa-solid fa-lightbulb text-3xl text-yellow-500"></i>
          </div>
          <div class="highlight-box-enhanced__content">
            <h4 class="highlight-box-enhanced__title">La Telefonía IP es la misma evolución</h4>
            <p class="highlight-box-enhanced__desc">
              Tu internet actual se convierte en un sistema telefónico profesional completo. 
              <strong>Mismo objetivo, pero infinitamente mejor.</strong>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PASO 2: BENEFICIOS TANGIBLES - Conexión emocional -->
<section id="beneficios" class="py-24 bg-gradient-to-br from-blue-50 to-indigo-100" aria-labelledby="beneficios-title">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
      <div id="beneficios-title" class="nt-stack">
        <?= nt_heading('¿Qué cambia en tu día a día?', 'fa-solid fa-heart', 'lg', 'Beneficios que sentirás desde el primer día', ['animate' => true, 'class'=>'nt-heading-accent-bar']); ?>
      </div>
      <p class="text-gray-700 max-w-3xl mx-auto text-lg">
        Más allá de la tecnología, estos son los cambios reales que experimentarás en tu empresa.
      </p>
      
      <!-- Imagen de beneficios empresariales -->
      <div class="mt-8 mb-8">
        <img src="assets/img/business-benefits-phone.jpg" alt="Empresarios utilizando telefonía IP para mejorar su comunicación" class="mx-auto rounded-lg shadow-lg max-w-3xl w-full" loading="lazy">
      </div>
    </div>

    <div class="benefits-grid grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Beneficio 1: Libertad -->
      <article class="benefit-card benefit-card--freedom">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-person-walking-arrow-loop-left"></i>
        </div>
        <h3 class="benefit-card__title">Libertad Total</h3>
        <p class="benefit-card__desc">
          Atiende llamadas de la empresa desde casa, en viaje de negocios o en la sucursal. Tu número empresarial te sigue a donde vayas.
        </p>
        <div class="benefit-card__example">
          <strong>Ejemplo real:</strong> "Estoy en casa con gripe, pero puedo atender a mis clientes como si estuviera en la oficina."
        </div>
      </article>

      <!-- Beneficio 2: Imagen profesional -->
      <article class="benefit-card benefit-card--professional">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-user-tie"></i>
        </div>
        <h3 class="benefit-card__title">Imagen Profesional</h3>
        <p class="benefit-card__desc">
          Contesta automáticamente con música en espera, transfiere llamadas sin cortes, y graba conversaciones importantes.
        </p>
        <div class="benefit-card__example">
          <strong>Ejemplo real:</strong> "Mis clientes piensan que tengo una gran empresa, aunque seamos solo 3 personas."
        </div>
      </article>

      <!-- Beneficio 3: Comunicación mejorada -->
      <article class="benefit-card benefit-card--communication">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-comments"></i>
        </div>
        <h3 class="benefit-card__title">Comunicación Mejorada</h3>
        <p class="benefit-card__desc">
          Llamadas ilimitadas nacionales, calidad de audio superior, y nunca más líneas ocupadas. Tu equipo siempre conectado.
        </p>
        <div class="benefit-card__example">
          <strong>Ejemplo real:</strong> "Mis clientes ya no escuchan 'línea ocupada'. Siempre hay alguien disponible para atenderlos."
        </div>
      </article>

      <!-- Beneficio 4: Control -->
      <article class="benefit-card benefit-card--control">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-chart-line"></i>
        </div>
        <h3 class="benefit-card__title">Control Total</h3>
        <p class="benefit-card__desc">
          Ve reportes de todas las llamadas, duración, quién llamó y cuándo. Información valiosa para tu negocio.
        </p>
        <div class="benefit-card__example">
          <strong>Ejemplo real:</strong> "Ahora sé exactamente cuándo llaman más clientes y puedo programar mejor mi personal."
        </div>
      </article>

      <!-- Beneficio 5: Simplicidad -->
      <article class="benefit-card benefit-card--simplicity">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-magic-wand-sparkles"></i>
        </div>
        <h3 class="benefit-card__title">Sin Complicaciones</h3>
        <p class="benefit-card__desc">
          No necesitas ser experto en tecnología. Se configura fácil y funciona solo. Nosotros nos encargamos del mantenimiento.
        </p>
        <div class="benefit-card__example">
          <strong>Ejemplo real:</strong> "Mi secretaria lo aprendió a usar en 10 minutos. Es más fácil que WhatsApp."
        </div>
      </article>

      <!-- Beneficio 6: Crecimiento -->
      <article class="benefit-card benefit-card--growth">
        <div class="benefit-card__icon">
          <i class="fa-solid fa-chart-line-up"></i>
        </div>
        <h3 class="benefit-card__title">Escalabilidad Instantánea</h3>
        <p class="benefit-card__desc">
          Tu negocio crece y tu telefonía se adapta al instante. Sin comprar equipos, sin instalaciones complicadas, sin dolores de cabeza.
        </p>
        
        <div class="growth-scenarios">
          <div class="growth-scenario">
            <i class="fa-solid fa-user-plus text-green-500"></i>
            <span class="growth-scenario__text"><strong>+1 empleado</strong> = +1 extensión en 5 minutos</span>
          </div>
          <div class="growth-scenario">
            <i class="fa-solid fa-building text-blue-500"></i>
            <span class="growth-scenario__text"><strong>Nueva sucursal</strong> = Mismo sistema, cero instalación</span>
          </div>
          <div class="growth-scenario">
            <i class="fa-solid fa-phone-volume text-purple-500"></i>
            <span class="growth-scenario__text"><strong>Más llamadas</strong> = Más canales automáticamente</span>
          </div>
        </div>
        
        <div class="benefit-card__example">
          <strong>Caso real:</strong> "Empecé con 2 extensiones. Hoy tengo 15 empleados en 3 ciudades. El sistema creció conmigo sin complicaciones."
        </div>
        
        <div class="growth-timeline">
          <h5 class="growth-timeline__title">Tu crecimiento típico:</h5>
          <div class="growth-timeline__steps">
            <span class="growth-step">Mes 1: 1-3 ext.</span>
            <span class="growth-arrow">→</span>
            <span class="growth-step">Año 1: 5-10 ext.</span>
            <span class="growth-arrow">→</span>
            <span class="growth-step">Año 2+: 15+ ext.</span>
          </div>
          <p class="growth-timeline__note">Cada paso es instantáneo y sin costos de instalación</p>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- PASO 3: CÓMO FUNCIONA - Proceso simple -->
<section id="como-funciona" class="py-24 bg-white" aria-labelledby="como-funciona-title">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
      <div id="como-funciona-title" class="nt-stack">
        <?= nt_heading('¿Cómo funciona exactamente?', 'fa-solid fa-gears', 'lg', 'Un proceso de 3 pasos súper simple', ['animate' => true, 'class'=>'nt-heading-accent-bar']); ?>
      </div>
      <p class="text-gray-700 max-w-3xl mx-auto text-lg">
        No te preocupes por la parte técnica. Aquí te explicamos de manera sencilla cómo funciona todo.
      </p>
      
      <!-- Imagen del proceso de implementación -->
      <div class="mt-8 mb-8">
        <img src="assets/img/voip-setup-process.jpg" alt="Proceso simple de configuración de telefonía IP en 3 pasos" class="mx-auto max-w-4xl w-full" loading="lazy">
      </div>
    </div>

    <div class="process-steps">
      <!-- Paso 1 -->
      <div class="process-step process-step--1">
        <div class="process-step__visual">
          <div class="process-step__number">1</div>
          <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/Migrating%20From%20Legacy%20System.png" alt="Migración de sistema telefónico tradicional" loading="lazy">
        </div>
        <div class="process-step__content">
          <h3 class="process-step__title">Te asignamos tu número empresarial</h3>
          <p class="process-step__desc">
            Conservas tu número actual (portabilidad) o te asignamos uno nuevo con LADA de tu ciudad. Tus clientes siguen llamando al mismo número de siempre.
          </p>
          <ul class="process-step__benefits">
            <li><i class="fa-solid fa-check text-green-500"></i>Mantienes tu número actual</li>
            <li><i class="fa-solid fa-check text-green-500"></i>O obtienes uno nuevo con LADA local</li>
            <li><i class="fa-solid fa-check text-green-500"></i>Sin cambios para tus clientes</li>
          </ul>
        </div>
      </div>

      <!-- Paso 2 -->
      <div class="process-step process-step--2">
        <div class="process-step__visual">
          <div class="process-step__number">2</div>
          <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/net2phone%D1%91s%20business%20phone%20system%20interface%20on%20mobile%20and%20tablet.webp" alt="Aplicación móvil de telefonía empresarial" loading="lazy">
        </div>
        <div class="process-step__content">
          <h3 class="process-step__title">Instalas la aplicación (o usas tu teléfono)</h3>
          <p class="process-step__desc">
            Descargas nuestra app en tu celular, computadora, o conectas un teléfono físico. En 5 minutos ya tienes tu extensión funcionando.
          </p>
          <ul class="process-step__benefits">
            <li><i class="fa-solid fa-mobile"></i>Aplicación para celular y computadora</li>
            <li><i class="fa-solid fa-phone"></i>O teléfono físico tradicional</li>
            <li><i class="fa-solid fa-clock"></i>Configuración en 5 minutos</li>
          </ul>
        </div>
      </div>

      <!-- Paso 3 -->
      <div class="process-step process-step--3">
        <div class="process-step__visual">
          <div class="process-step__number">3</div>
          <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/net2phones%20business%20phone%20system%20interface%20on%20a%20laptop.webp" alt="Panel de control telefónico empresarial" loading="lazy">
        </div>
        <div class="process-step__content">
          <h3 class="process-step__title">¡Listo! Ya tienes telefonía profesional</h3>
          <p class="process-step__desc">
            Desde ese momento puedes hacer y recibir llamadas como cualquier empresa grande. Con grabación, transferencias, reportes y todas las funciones profesionales.
          </p>
          <ul class="process-step__benefits">
            <li><i class="fa-solid fa-record-vinyl"></i>Grabación automática de llamadas</li>
            <li><i class="fa-solid fa-random"></i>Transferencias sin cortes</li>
            <li><i class="fa-solid fa-chart-bar"></i>Reportes detallados</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PASO 4: DISPOSITIVOS - Flexibilidad total -->
<section id="dispositivos" class="py-24 bg-gray-50" aria-labelledby="dispositivos-title">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16">
      <div id="dispositivos-title" class="nt-stack">
        <?= nt_heading('Úsalo desde cualquier dispositivo', 'fa-solid fa-devices', 'lg', 'La flexibilidad que necesitas', ['animate' => true, 'class'=>'nt-heading-accent-bar']); ?>
      </div>
      <p class="text-gray-700 max-w-3xl mx-auto text-lg">
        No te ates a un solo dispositivo. Tu telefonía empresarial funciona en todo lo que ya tienes.
      </p>
    </div>

    <div class="devices-showcase">
      <div class="devices-grid grid md:grid-cols-3 gap-10">
        <!-- Dispositivo 1: Smartphone -->
        <article class="device-card device-card--mobile">
          <div class="device-card__visual">
            <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/net2phone%D1%91s%20business%20phone%20system%20interface%20on%20mobile%20and%20tablet.webp" alt="Aplicación móvil Linkus" loading="lazy">
          </div>
          <div class="device-card__content">
            <div class="device-card__header">
              <i class="fa-solid fa-mobile-screen-button text-3xl text-blue-500"></i>
              <h3 class="device-card__title">Tu Smartphone</h3>
            </div>
            <p class="device-card__desc">
              Convierte tu celular personal en el teléfono de la empresa. Atiende, transfiere y graba llamadas desde cualquier lugar.
            </p>
            <div class="device-card__scenario">
              <strong>Perfecto para:</strong> Vendedores, ejecutivos, dueños que viajan mucho.
            </div>
            <ul class="device-card__features">
              <li><i class="fa-solid fa-check"></i>App gratuita (Linkus)</li>
              <li><i class="fa-solid fa-check"></i>Llamadas y videollamadas</li>
              <li><i class="fa-solid fa-check"></i>Notificaciones en tiempo real</li>
            </ul>
          </div>
        </article>

        <!-- Dispositivo 2: Computadora -->
        <article class="device-card device-card--desktop">
          <div class="device-card__visual">
            <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/net2phones%20business%20phone%20system%20interface%20on%20a%20laptop.webp" alt="Software de escritorio para telefonía" loading="lazy">
          </div>
          <div class="device-card__content">
            <div class="device-card__header">
              <i class="fa-solid fa-computer text-3xl text-green-500"></i>
              <h3 class="device-card__title">Tu Computadora</h3>
            </div>
            <p class="device-card__desc">
              Maneja todas las llamadas desde tu PC. Ideal para secretarias, recepcionistas y personal administrativo.
            </p>
            <div class="device-card__scenario">
              <strong>Perfecto para:</strong> Recepcionistas, secretarias, personal de oficina.
            </div>
            <ul class="device-card__features">
              <li><i class="fa-solid fa-check"></i>Panel completo de control</li>
              <li><i class="fa-solid fa-check"></i>Reportes y estadísticas</li>
              <li><i class="fa-solid fa-check"></i>Gestión de múltiples líneas</li>
            </ul>
          </div>
        </article>

        <!-- Dispositivo 3: Teléfono físico -->
        <article class="device-card device-card--physical">
          <div class="device-card__visual">
            <img src="https://4423252.fs1.hubspotusercontent-na1.net/hubfs/4423252/Desk%20Business%20Phone.webp" alt="Teléfono físico empresarial" loading="lazy">
          </div>
          <div class="device-card__content">
            <div class="device-card__header">
              <i class="fa-solid fa-phone text-3xl text-purple-500"></i>
              <h3 class="device-card__title">Teléfono Físico</h3>
            </div>
            <p class="device-card__desc">
              ¿Prefieres un teléfono tradicional? Conectamos teléfonos físicos de alta calidad con todas las funciones inteligentes.
            </p>
            <div class="device-card__scenario">
              <strong>Perfecto para:</strong> Personal que prefiere teléfonos tradicionales, puestos fijos.
            </div>
            <ul class="device-card__features">
              <li><i class="fa-solid fa-check"></i>Audio de alta definición</li>
              <li><i class="fa-solid fa-check"></i>Pantalla con información</li>
              <li><i class="fa-solid fa-check"></i>Botones programables</li>
            </ul>
          </div>
        </article>
      </div>

      <!-- Combinación de dispositivos -->
      <div class="devices-combination mt-20">
        <div class="combination-wrapper">
          <!-- Título principal con animación -->
          <div class="combination-header text-center mb-12">
            <div class="combination-icon-group">
              <i class="fa-solid fa-mobile-screen-button text-3xl text-blue-500"></i>
              <i class="fa-solid fa-plus text-xl text-gray-400 mx-3"></i>
              <i class="fa-solid fa-computer text-3xl text-green-500"></i>
              <i class="fa-solid fa-plus text-xl text-gray-400 mx-3"></i>
              <i class="fa-solid fa-phone text-3xl text-purple-500"></i>
            </div>
            <h3 class="combination-title">¿Lo mejor de todo?</h3>
            <p class="combination-subtitle">Funciona en todos tus dispositivos simultáneamente</p>
          </div>

          <!-- Demostración visual del flujo -->
          <div class="workflow-demonstration">
            <div class="workflow-scenario">
              <h4 class="workflow-scenario__title">Ejemplo de uso real:</h4>
              <div class="workflow-steps">
                <!-- Paso 1 -->
                <div class="workflow-step">
                  <div class="workflow-step__number">1</div>
                  <div class="workflow-step__device">
                    <i class="fa-solid fa-mobile-screen-button text-blue-500"></i>
                    <span>Celular</span>
                  </div>
                  <div class="workflow-step__action">
                    <strong>Recibes llamada</strong>
                    <p>Cliente llama mientras estás en la calle</p>
                  </div>
                </div>

                <!-- Flecha -->
                <div class="workflow-arrow">
                  <i class="fa-solid fa-arrow-right"></i>
                </div>

                <!-- Paso 2 -->
                <div class="workflow-step">
                  <div class="workflow-step__number">2</div>
                  <div class="workflow-step__device">
                    <i class="fa-solid fa-computer text-green-500"></i>
                    <span>Computadora</span>
                  </div>
                  <div class="workflow-step__action">
                    <strong>Transfieres sin cortar</strong>
                    <p>Llegas a la oficina y cambias de dispositivo</p>
                  </div>
                </div>

                <!-- Flecha -->
                <div class="workflow-arrow">
                  <i class="fa-solid fa-arrow-right"></i>
                </div>

                <!-- Paso 3 -->
                <div class="workflow-step">
                  <div class="workflow-step__number">3</div>
                  <div class="workflow-step__device">
                    <i class="fa-solid fa-phone text-purple-500"></i>
                    <span>Teléfono físico</span>
                  </div>
                  <div class="workflow-step__action">
                    <strong>Terminas la llamada</strong>
                    <p>Con mejor audio para tomar notas importantes</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Beneficios clave destacados -->
          <div class="combination-benefits">
            <div class="benefits-grid grid md:grid-cols-3 gap-6">
              <div class="combination-benefit">
                <div class="combination-benefit__icon">
                  <i class="fa-solid fa-sync-alt text-blue-500"></i>
                </div>
                <h5 class="combination-benefit__title">Sincronización Automática</h5>
                <p class="combination-benefit__desc">
                  Todos tus dispositivos comparten la misma información: contactos, historial de llamadas y configuración.
                </p>
              </div>

              <div class="combination-benefit">
                <div class="combination-benefit__icon">
                  <i class="fa-solid fa-exchange-alt text-green-500"></i>
                </div>
                <h5 class="combination-benefit__title">Transferencias Fluidas</h5>
                <p class="combination-benefit__desc">
                  Cambia de un dispositivo a otro sin que el cliente se dé cuenta. Sin interrupciones, sin complicaciones.
                </p>
              </div>

              <div class="combination-benefit">
                <div class="combination-benefit__icon">
                  <i class="fa-solid fa-shield-check text-purple-500"></i>
                </div>
                <h5 class="combination-benefit__title">Respaldo Automático</h5>
                <p class="combination-benefit__desc">
                  Si un dispositivo falla, los otros siguen funcionando. Nunca pierdes una llamada importante.
                </p>
              </div>
            </div>
          </div>

          <!-- Call to action mejorado -->
          <div class="combination-cta">
            <div class="cta-highlight">
              <i class="fa-solid fa-magic-wand-sparkles text-4xl text-yellow-500 mb-4"></i>
              <h4 class="cta-title">Un solo número, infinitas posibilidades</h4>
              <p class="cta-description">
                Tu número empresarial funciona donde tú estés, como tú lo necesites, cuando tú quieras.
              </p>
              <a href="#planes" class="nt-btn nt-btn-primary nt-btn-lg">
                <i class="fa-solid fa-rocket"></i>
                <span>Ver planes disponibles</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PASO 5: CASOS DE USO REALES - Historias de éxito -->
<section id="casos-uso" class="py-24 bg-white" aria-labelledby="casos-uso-title">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
      <div id="casos-uso-title" class="nt-stack">
        <?= nt_heading('¿Cómo lo usan empresas reales?', 'fa-solid fa-users', 'lg', 'Historias de éxito de nuestros clientes', ['animate' => true, 'class'=>'nt-heading-accent-bar']); ?>
      </div>
      <p class="text-gray-700 max-w-3xl mx-auto text-lg">
        Estas son historias reales de empresas que ya transformaron su comunicación con Telefonía IP.
      </p>
      
      <!-- Imagen de empresas exitosas -->
      <div class="mt-8 mb-8">
        <img src="assets/img/successful-businesses-voip.jpg" alt="Empresas exitosas utilizando sistemas de telefonía IP" class="mx-auto rounded-lg shadow-lg max-w-4xl w-full" loading="lazy">
      </div>
    </div>

    <div class="use-cases grid lg:grid-cols-2 gap-12">
      <!-- Caso 1: Despacho contable -->
      <article class="use-case use-case--accounting">
        <div class="use-case__header">
          <div class="use-case__avatar">
            <i class="fa-solid fa-calculator"></i>
          </div>
          <div class="use-case__meta">
            <h3 class="use-case__title">Despacho Contable González</h3>
            <p class="use-case__subtitle">5 empleados • Ciudad de México</p>
          </div>
        </div>
        <div class="use-case__content">
          <blockquote class="use-case__quote">
            "Antes tenía 3 líneas telefónicas separadas y era un caos coordinar todo. Ahora con una sola línea IP tengo todo centralizado y mis contadores pueden atender clientes desde casa durante temporada alta. Es como tener la oficina en todos lados."
          </blockquote>
          <div class="use-case__benefits">
            <h4>Lo que más valora:</h4>
            <ul>
              <li><i class="fa-solid fa-network-wired text-green-500"></i>Todo centralizado y organizado</li>
              <li><i class="fa-solid fa-home text-blue-500"></i>Trabajo remoto en temporada alta</li>
              <li><i class="fa-solid fa-record-vinyl text-purple-500"></i>Grabación de consultas importantes</li>
            </ul>
          </div>
        </div>
      </article>

      <!-- Caso 2: Agencia inmobiliaria -->
      <article class="use-case use-case--realestate">
        <div class="use-case__header">
          <div class="use-case__avatar">
            <i class="fa-solid fa-building"></i>
          </div>
          <div class="use-case__meta">
            <h3 class="use-case__title">Inmobiliaria Vanguardia</h3>
            <p class="use-case__subtitle">8 agentes • Guadalajara</p>
          </div>
        </div>
        <div class="use-case__content">
          <blockquote class="use-case__quote">
            "Mis agentes están todo el día en la calle viendo propiedades. Antes perdíamos muchas llamadas. Ahora cada agente atiende con su celular y el cliente piensa que tenemos una oficina gigante. Las ventas subieron 40%."
          </blockquote>
          <div class="use-case__benefits">
            <h4>Lo que más valora:</h4>
            <ul>
              <li><i class="fa-solid fa-phone text-green-500"></i>0% llamadas perdidas</li>
              <li><i class="fa-solid fa-chart-up text-blue-500"></i>40% más ventas</li>
              <li><i class="fa-solid fa-user-tie text-purple-500"></i>Imagen profesional móvil</li>
            </ul>
          </div>
        </div>
      </article>

      <!-- Caso 3: Clínica dental -->
      <article class="use-case use-case--dental">
        <div class="use-case__header">
          <div class="use-case__avatar">
            <i class="fa-solid fa-tooth"></i>
          </div>
          <div class="use-case__meta">
            <h3 class="use-case__title">Clínica Dental Sonrisa</h3>
            <p class="use-case__subtitle">3 consultorios • Monterrey</p>
          </div>
        </div>
        <div class="use-case__content">
          <blockquote class="use-case__quote">
            "La recepcionista maneja citas de los 3 consultorios desde una sola extensión. Los reportes me muestran las horas pico para programar mejor las citas. Y cuando hay emergencias, los doctores pueden atender desde casa."
          </blockquote>
          <div class="use-case__benefits">
            <h4>Lo que más valora:</h4>
            <ul>
              <li><i class="fa-solid fa-calendar text-green-500"></i>Gestión centralizada de citas</li>
              <li><i class="fa-solid fa-chart-bar text-blue-500"></i>Análisis de horas pico</li>
              <li><i class="fa-solid fa-user-doctor text-purple-500"></i>Emergencias desde casa</li>
            </ul>
          </div>
        </div>
      </article>

      <!-- Caso 4: Empresa de logística -->
      <article class="use-case use-case--logistics">
        <div class="use-case__header">
          <div class="use-case__avatar">
            <i class="fa-solid fa-truck"></i>
          </div>
          <div class="use-case__meta">
            <h3 class="use-case__title">Transportes Rápidos del Norte</h3>
            <p class="use-case__subtitle">15 empleados • Tijuana</p>
          </div>
        </div>
        <div class="use-case__content">
          <blockquote class="use-case__quote">
            "Tenemos choferes en carretera, personal en almacén y vendedores visitando clientes. Todos están conectados al mismo sistema. Los clientes llaman a un número y nosotros decidimos quién atiende según el tipo de consulta."
          </blockquote>
          <div class="use-case__benefits">
            <h4>Lo que más valora:</h4>
            <ul>
              <li><i class="fa-solid fa-route text-green-500"></i>Equipo conectado en movimiento</li>
              <li><i class="fa-solid fa-filter text-blue-500"></i>Enrutamiento inteligente</li>
              <li><i class="fa-solid fa-headset text-purple-500"></i>Coordinación en tiempo real</li>
            </ul>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- PLANES Y PRECIOS -->
<section id="planes" class="py-24 bg-gradient-to-br from-gray-50 to-blue-50" aria-labelledby="planes-title">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <div id="planes-title" class="nt-stack mb-16">
      <?= nt_heading('Elige tu plan ideal', 'fa-solid fa-boxes-stacked', 'lg', 'Precios transparentes, sin sorpresas', ['animate' => true, 'class'=>'nt-heading-accent-bar']); ?>
    </div>
    <p class="text-gray-700 max-w-3xl mx-auto text-lg mb-12">
      Todos los planes incluyen llamadas ilimitadas nacionales, numeración LADA México, soporte técnico especializado y funciones profesionales avanzadas.
    </p>
    
    <!-- Imagen de planes empresariales -->
    <div class="mb-12">
      <img src="assets/img/voip-pricing-plans.jpg" alt="Planes de telefonía IP adaptados a diferentes tipos de empresas" class="mx-auto rounded-lg shadow-lg max-w-3xl w-full" loading="lazy">
    </div>

    <div class="pricing-cards grid md:grid-cols-3 gap-10">
      <!-- Plan Básico -->
      <article class="pricing-card pricing-card--basic">
        <div class="pricing-card__badge">
          <i class="fa-solid fa-seedling"></i>
          <span>Ideal para empezar</span>
        </div>
        <header class="pricing-card__header">
          <h3 class="pricing-card__name">Plan Básico</h3>
          <div class="pricing-card__price">
            <span class="currency">$</span>
            <span class="amount">379</span>
            <span class="period">/ mes</span>
          </div>
          <p class="pricing-card__subtitle">Perfecto para negocios pequeños</p>
        </header>

        <div class="pricing-card__features">
          <ul>
            <li class="feature-highlight">
              <i class="fa-solid fa-phone"></i>
              <div>
                <strong>1 extensión</strong>
                <small>Para una persona</small>
              </div>
            </li>
            <li class="feature-highlight">
              <i class="fa-solid fa-diagram-project"></i>
              <div>
                <strong>1 troncal (2 canales)</strong>
                <small>2 llamadas simultáneas</small>
              </div>
            </li>
            <li><i class="fa-solid fa-infinity"></i>Llamadas ilimitadas nacionales</li>
            <li><i class="fa-solid fa-hashtag"></i>Numeración LADA México</li>
            <li><i class="fa-solid fa-record-vinyl"></i>Grabación de llamadas</li>
            <li><i class="fa-solid fa-voicemail"></i>Buzón de voz</li>
            <li><i class="fa-solid fa-headset"></i>Soporte técnico incluido</li>
          </ul>
        </div>

        <footer class="pricing-card__footer">
          <button type="button" class="nt-btn tel-plan__btn" data-plan="Plan Básico" data-precio="$379 / mes + IVA" data-ext="1 extensión" data-troncal="1 troncal (2 canales)" data-numeracion="Numeración LADA México">
            <i class="fa-solid fa-cart-plus"></i>
            <span>Empezar ahora</span>
          </button>
          <p class="pricing-card__note">+ IVA • Sin permanencia forzosa</p>
        </footer>
      </article>

      <!-- Plan Premium (Destacado) -->
      <article class="pricing-card pricing-card--premium featured">
        <div class="pricing-card__badge">
          <i class="fa-solid fa-crown"></i>
          <span>Más popular</span>
        </div>
        <header class="pricing-card__header">
          <h3 class="pricing-card__name">Plan Premium</h3>
          <div class="pricing-card__price">
            <span class="currency">$</span>
            <span class="amount">605</span>
            <span class="period">/ mes</span>
          </div>
          <p class="pricing-card__subtitle">El equilibrio perfecto</p>
        </header>

        <div class="pricing-card__features">
          <ul>
            <li class="feature-highlight">
              <i class="fa-solid fa-phone"></i>
              <div>
                <strong>3 extensiones</strong>
                <small>Para tu equipo</small>
              </div>
            </li>
            <li class="feature-highlight">
              <i class="fa-solid fa-diagram-project"></i>
              <div>
                <strong>1 troncal (2 canales)</strong>
                <small>2 llamadas simultáneas</small>
              </div>
            </li>
            <li><i class="fa-solid fa-infinity"></i>Llamadas ilimitadas nacionales</li>
            <li><i class="fa-solid fa-hashtag"></i>Numeración LADA México</li>
            <li><i class="fa-solid fa-record-vinyl"></i>Grabación de llamadas</li>
            <li><i class="fa-solid fa-voicemail"></i>Buzón de voz</li>
            <li><i class="fa-solid fa-random"></i>Transferencia de llamadas</li>
            <li><i class="fa-solid fa-chart-bar"></i>Reportes básicos</li>
            <li><i class="fa-solid fa-headset"></i>Soporte técnico prioritario</li>
          </ul>
        </div>

        <footer class="pricing-card__footer">
          <button type="button" class="nt-btn tel-plan__btn nt-btn-primary" data-plan="Plan Premium" data-precio="$605 / mes + IVA" data-ext="3 extensiones" data-troncal="1 troncal (2 canales)" data-numeracion="Numeración LADA México">
            <i class="fa-solid fa-cart-plus"></i>
            <span>Elegir Premium</span>
          </button>
          <p class="pricing-card__note">+ IVA • Sin permanencia forzosa</p>
        </footer>
      </article>

      <!-- Plan Empresarial -->
      <article class="pricing-card pricing-card--enterprise">
        <div class="pricing-card__badge">
          <i class="fa-solid fa-building"></i>
          <span>Máximo poder</span>
        </div>
        <header class="pricing-card__header">
          <h3 class="pricing-card__name">Plan Empresarial</h3>
          <div class="pricing-card__price">
            <span class="currency">$</span>
            <span class="amount">1,490</span>
            <span class="period">/ mes</span>
          </div>
          <p class="pricing-card__subtitle">Para operaciones intensivas</p>
        </header>

        <div class="pricing-card__features">
          <ul>
            <li class="feature-highlight">
              <i class="fa-solid fa-phone"></i>
              <div>
                <strong>10 extensiones</strong>
                <small>Para toda la empresa</small>
              </div>
            </li>
            <li class="feature-highlight">
              <i class="fa-solid fa-diagram-project"></i>
              <div>
                <strong>1 troncal (10 canales)</strong>
                <small>10 llamadas simultáneas</small>
              </div>
            </li>
            <li><i class="fa-solid fa-infinity"></i>Llamadas ilimitadas nacionales</li>
            <li><i class="fa-solid fa-hashtag"></i>Numeración LADA México</li>
            <li><i class="fa-solid fa-record-vinyl"></i>Grabación de llamadas</li>
            <li><i class="fa-solid fa-voicemail"></i>Buzón de voz</li>
            <li><i class="fa-solid fa-random"></i>Transferencia de llamadas</li>
            <li><i class="fa-solid fa-users-cog"></i>Colas de llamadas</li>
            <li><i class="fa-solid fa-robot"></i>IVR personalizado</li>
            <li><i class="fa-solid fa-chart-line"></i>Reportes avanzados</li>
            <li><i class="fa-solid fa-phone-volume"></i>Soporte 24/7</li>
          </ul>
        </div>

        <footer class="pricing-card__footer">
          <button type="button" class="nt-btn tel-plan__btn" data-plan="Plan Empresarial" data-precio="$1,490 / mes + IVA" data-ext="10 extensiones" data-troncal="1 troncal (10 canales)" data-numeracion="Numeración LADA México">
            <i class="fa-solid fa-cart-plus"></i>
            <span>Solicitar ahora</span>
          </button>
          <p class="pricing-card__note">+ IVA • Sin permanencia forzosa</p>
        </footer>
      </article>
    </div>

    <!-- Garantía y beneficios adicionales -->
    <div class="pricing-extras mt-16">
      <div class="extras-grid grid md:grid-cols-3 gap-8">
        <div class="extra-item">
          <i class="fa-solid fa-shield-check text-green-500 text-3xl mb-3"></i>
          <h4 class="font-bold text-lg mb-2">Garantía 30 días</h4>
          <p class="text-gray-600">Si no te convence, cancelas sin penalización</p>
        </div>
        <div class="extra-item">
          <i class="fa-solid fa-tools text-blue-500 text-3xl mb-3"></i>
          <h4 class="font-bold text-lg mb-2">Configuración incluida</h4>
          <p class="text-gray-600">Nosotros configuramos todo por ti</p>
        </div>
        <div class="extra-item">
          <i class="fa-solid fa-arrow-up text-purple-500 text-3xl mb-3"></i>
          <h4 class="font-bold text-lg mb-2">Escalabilidad inmediata</h4>
          <p class="text-gray-600">Crece o reduce según necesites</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DEMO Y PRUEBA GRATIS -->
<section id="demo" class="py-24 bg-gradient-to-r from-blue-600 to-indigo-700 text-white" aria-labelledby="demo-title">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <div id="demo-title" class="mb-8">
      <?= nt_heading('¿Listo para probarlo sin riesgo?', 'fa-solid fa-rocket', 'lg', 'Demo gratuita de 30 días', ['animate' => true, 'class'=>'nt-heading-invert']); ?>
    </div>
    <p class="text-xl mb-8 max-w-3xl mx-auto leading-relaxed">
      No te quedes con dudas. <strong>Prueba Norttek PBX gratis por 30 días</strong> con todas las funciones incluidas. Si no te convence, no pagas nada.
    </p>

    <div class="demo-benefits grid md:grid-cols-3 gap-8 mb-12">
      <div class="demo-benefit">
        <i class="fa-solid fa-calendar-days text-4xl mb-4 text-blue-200"></i>
        <h3 class="text-xl font-bold mb-2">30 días completos</h3>
        <p class="text-blue-100">Tiempo suficiente para probar todo</p>
      </div>
      <div class="demo-benefit">
        <i class="fa-solid fa-unlock text-4xl mb-4 text-blue-200"></i>
        <h3 class="text-xl font-bold mb-2">Funciones completas</h3>
        <p class="text-blue-100">Acceso a todas las características</p>
      </div>
      <div class="demo-benefit">
        <i class="fa-solid fa-credit-card text-4xl mb-4 text-blue-200"></i>
        <h3 class="text-xl font-bold mb-2">Sin tarjeta de crédito</h3>
        <p class="text-blue-100">No pedimos datos de pago</p>
      </div>
    </div>

    <div class="demo-actions flex flex-wrap justify-center gap-6">
      <button class="nt-btn nt-btn-white nt-btn-lg" type="button" data-nt-modal-open="#modalDemo">
        <i class="fa-solid fa-play-circle"></i>
        <span>Solicitar demo gratuita</span>
      </button>
      <button class="nt-btn nt-btn-outline-white nt-btn-lg" type="button" data-nt-modal-open="#modalVideo" data-video="https://www.youtube.com/embed/HVc0M7uDKAE?si=IGVoEfbvS5Rl5-tG">
        <i class="fa-solid fa-video"></i>
        <span>Ver demostración</span>
      </button>
    </div>
  </div>
</section>

<!-- INFORMACIÓN TÉCNICA AVANZADA -->
<section id="info-tecnica" class="py-24 bg-gray-900 text-white" aria-labelledby="info-tecnica-title">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
      <div id="info-tecnica-title" class="nt-stack">
        <?= nt_heading('Información técnica detallada', 'fa-solid fa-microchip', 'lg', 'Para usuarios experimentados', ['animate' => true, 'class'=>'nt-heading-invert']); ?>
      </div>
      <p class="text-gray-300 max-w-3xl mx-auto text-lg">
        Especificaciones técnicas, protocolos, integraciones y detalles avanzados del sistema Norttek PBX.
      </p>
    </div>

    <div class="technical-content">
      <!-- Especificaciones del sistema -->
      <div class="tech-section mb-12">
        <h3 class="text-2xl font-bold mb-6 text-blue-400"><i class="fa-solid fa-server mr-3"></i>Especificaciones del Sistema</h3>
        <div class="grid md:grid-cols-2 gap-8">
          <div class="tech-specs">
            <h4 class="text-lg font-semibold mb-4 text-gray-300">Infraestructura y Plataforma</h4>
            <ul class="space-y-2 text-gray-400">
              <li><strong>Base:</strong> Yeastar P-Series Cloud PBX</li>
              <li><strong>Arquitectura:</strong> Sistema distribuido en la nube</li>
              <li><strong>Disponibilidad:</strong> 99.9% SLA garantizado</li>
              <li><strong>Redundancia:</strong> Múltiples centros de datos</li>
              <li><strong>Escalabilidad:</strong> 1-1000+ extensiones</li>
              <li><strong>Actualizaciones:</strong> Automáticas sin interrupciones</li>
            </ul>
          </div>
          <div class="tech-specs">
            <h4 class="text-lg font-semibold mb-4 text-gray-300">Protocolos y Compatibilidad</h4>
            <ul class="space-y-2 text-gray-400">
              <li><strong>Protocolos VoIP:</strong> SIP, IAX2, H.323</li>
              <li><strong>Códecs de audio:</strong> G.711, G.722, G.729, Opus</li>
              <li><strong>Códecs de video:</strong> H.264, VP8</li>
              <li><strong>Seguridad:</strong> TLS, SRTP, HTTPS</li>
              <li><strong>NAT:</strong> Soporte completo NAT traversal</li>
              <li><strong>QoS:</strong> DSCP, Traffic Shaping</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Características avanzadas -->
      <div class="tech-section mb-12">
        <h3 class="text-2xl font-bold mb-6 text-green-400"><i class="fa-solid fa-cogs mr-3"></i>Características Avanzadas</h3>
        <div class="grid md:grid-cols-3 gap-8">
          <div class="tech-feature">
            <h4 class="text-lg font-semibold mb-3 text-white">Sistema IVR</h4>
            <ul class="text-sm text-gray-400 space-y-1">
              <li>• IVR multi-nivel personalizable</li>
              <li>• Text-to-Speech integrado</li>
              <li>• Menús dinámicos por horario</li>
              <li>• Soporte para múltiples idiomas</li>
              <li>• Integración con bases de datos</li>
            </ul>
          </div>
          <div class="tech-feature">
            <h4 class="text-lg font-semibold mb-3 text-white">Colas y ACD</h4>
            <ul class="text-sm text-gray-400 space-y-1">
              <li>• Automatic Call Distribution</li>
              <li>• Estrategias de enrutamiento</li>
              <li>• Monitoreo en tiempo real</li>
              <li>• Música en espera personalizada</li>
              <li>• Callback automático</li>
            </ul>
          </div>
          <div class="tech-feature">
            <h4 class="text-lg font-semibold mb-3 text-white">Reportes y Analytics</h4>
            <ul class="text-sm text-gray-400 space-y-1">
              <li>• CDR detallados en tiempo real</li>
              <li>• Dashboards personalizables</li>
              <li>• Exportación CSV/PDF</li>
              <li>• APIs para integración</li>
              <li>• Alertas automáticas</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Integraciones -->
      <div class="tech-section mb-12">
        <h3 class="text-2xl font-bold mb-6 text-purple-400"><i class="fa-solid fa-plug mr-3"></i>Integraciones y APIs</h3>
        <div class="grid md:grid-cols-2 gap-8">
          <div class="integration-category">
            <h4 class="text-lg font-semibold mb-4 text-gray-300">CRM y Business Tools</h4>
            <div class="integration-grid grid grid-cols-2 gap-4">
              <div class="integration-item">
                <i class="fa-brands fa-salesforce text-xl text-blue-500"></i>
                <span class="text-sm">Salesforce</span>
              </div>
              <div class="integration-item">
                <i class="fa-brands fa-hubspot text-xl text-orange-500"></i>
                <span class="text-sm">HubSpot</span>
              </div>
              <div class="integration-item">
                <i class="fa-brands fa-microsoft text-xl text-blue-400"></i>
                <span class="text-sm">Microsoft 365</span>
              </div>
              <div class="integration-item">
                <i class="fa-brands fa-google text-xl text-red-500"></i>
                <span class="text-sm">Google Workspace</span>
              </div>
            </div>
          </div>
          <div class="integration-category">
            <h4 class="text-lg font-semibold mb-4 text-gray-300">APIs Disponibles</h4>
            <ul class="space-y-2 text-gray-400">
              <li><strong>REST API:</strong> Control completo del sistema</li>
              <li><strong>WebRTC:</strong> Llamadas desde navegador</li>
              <li><strong>Webhook:</strong> Eventos en tiempo real</li>
              <li><strong>AMI:</strong> Asterisk Manager Interface</li>
              <li><strong>SDK:</strong> Desarrollo de aplicaciones</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Requerimientos técnicos -->
      <div class="tech-section">
        <h3 class="text-2xl font-bold mb-6 text-red-400"><i class="fa-solid fa-network-wired mr-3"></i>Requerimientos y Configuración</h3>
        <div class="grid md:grid-cols-2 gap-8">
          <div class="requirements">
            <h4 class="text-lg font-semibold mb-4 text-gray-300">Requerimientos de Red</h4>
            <table class="w-full text-sm">
              <tbody class="text-gray-400">
                <tr class="border-b border-gray-700">
                  <td class="py-2 font-medium">Ancho de banda por llamada:</td>
                  <td class="py-2">64-100 Kbps</td>
                </tr>
                <tr class="border-b border-gray-700">
                  <td class="py-2 font-medium">Latencia máxima:</td>
                  <td class="py-2">< 150ms</td>
                </tr>
                <tr class="border-b border-gray-700">
                  <td class="py-2 font-medium">Jitter máximo:</td>
                  <td class="py-2">< 30ms</td>
                </tr>
                <tr class="border-b border-gray-700">
                  <td class="py-2 font-medium">Pérdida de paquetes:</td>
                  <td class="py-2">< 1%</td>
                </tr>
                <tr>
                  <td class="py-2 font-medium">Puertos requeridos:</td>
                  <td class="py-2">5060 (SIP), 10000-20000 (RTP)</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="requirements">
            <h4 class="text-lg font-semibold mb-4 text-gray-300">Dispositivos Compatibles</h4>
            <div class="space-y-4">
              <div>
                <h5 class="font-medium text-white mb-2">Teléfonos IP Certificados:</h5>
                <ul class="text-sm text-gray-400 space-y-1">
                  <li>• Yealink T21P, T23G, T27G, T46G, T48G</li>
                  <li>• Grandstream GXP1625, GXP2130, GXP2170</li>
                  <li>• Fanvil X3S, X4G, X5S, X6</li>
                  <li>• Htek UC902, UC903, UC924</li>
                </ul>
              </div>
              <div>
                <h5 class="font-medium text-white mb-2">Aplicaciones Cliente:</h5>
                <ul class="text-sm text-gray-400 space-y-1">
                  <li>• Linkus Mobile (iOS/Android)</li>
                  <li>• Linkus Desktop (Windows/macOS/Linux)</li>
                  <li>• Linkus Web Client</li>
                  <li>• Cualquier softphone SIP estándar</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modales originales mantenidos -->
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
<div id="faq" class="bg-white py-24">
  <div class="max-w-4xl mx-auto px-6">
    <?= faq('faq-telefonia', ['title' => 'Preguntas Frecuentes']) ?>
  </div>
</div>