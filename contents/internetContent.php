<!-- Modal de bienvenida para cliente nuevo -->
<div id="nuevo-modal" class="internet-modal-backdrop" style="display:none;">
  <div class="internet-modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <button id="close-modal" type="button" class="modal-close" aria-label="Cerrar">&times;</button>
    <div class="modal-header">
      <h3 id="modal-title">Empecemos</h3>
      <p class="modal-subtitle">Cuéntanos un poco para personalizar tu instalación</p>
    </div>
    <form id="modal-form" class="modal-body">
      <div class="form-field">
        <label for="input-nombre">Nombre</label>
        <div style="position:relative;">
          <i class="fa-regular fa-user" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#6b7a90;"></i>
          <input id="input-nombre" name="nombre" type="text" maxlength="60" required placeholder="Nombre y apellido (opcional)" autocomplete="name" style="padding-left:2.2rem;" />
        </div>
      </div>
      <div class="form-field">
        <label>¿Ya cuenta con antena o equipo en tu domicilio?
        </label>
        <div class="radio-group" style="background:#f8fbff; border:1px solid #e7edf6; border-radius:10px; padding:.6rem .8rem;">
          <label class="radio-item"><input type="radio" name="antena" value="si" required> Sí</label>
          <label class="radio-item"><input type="radio" name="antena" value="no"> No</label>
        </div>
      </div>
        <ul style="list-style:none; padding:0; margin:.4rem 0 0; color:#6b7a90; display:flex; flex-direction:column; gap:.35rem;">
          <li style="display:flex; align-items:center; gap:.5rem;"><i class="fa-regular fa-circle-check" style="color:#6fa4ff;"></i> Instalación coordinada contigo</li>
          <li style="display:flex; align-items:center; gap:.5rem;"><i class="fa-regular fa-circle-check" style="color:#6fa4ff;"></i> Equipos nuevos y de ultima generacion</li>
          <li style="display:flex; align-items:center; gap:.5rem;"><i class="fa-regular fa-circle-check" style="color:#6fa4ff;"></i> App movil para registrar tus pagos</li>
        </ul>
      <div class="modal-actions">
        <button type="submit" id="btn-modal-continuar" class="btn btn-primary">Aceptar</button>
  <button type="button" id="btn-cancelar" class="btn btn-secondary">Cancelar</button>

      </div>
    </form>
  </div>
  
</div>
<div class="internet-app">
  <section class="nt-hero-wrapper is-soft internet-hero" style="min-height:420px;" aria-label="Conectividad inalámbrica Norttek">
    <div class="hero-content max-w-6xl mx-auto px-6 py-16 text-center flex flex-col items-center">
      <div class="opacity-0 nt-heading-anim delay-sm" style="transform:translateY(34px) scale(.955);">
  <?= nt_heading('Internet para el Hogar y la Oficina', 'fa-solid fa-wifi', 'xl', null, ['animate'=>false,'class'=>'nt-heading-hero nt-heading-invert nt-heading-accent-bar']); ?>
      </div>
  <p class="nt-hero-sub nt-hero-sub-invert nt-heading-anim delay-md" style="opacity:0; transform:translateY(34px) scale(.955); max-width:820px;">Conéctate a internet donde otras compañías no llegan.</p>
      <div class="flex flex-wrap justify-center gap-4 mt-10 opacity-0 nt-heading-anim delay-lg" style="transform:translateY(34px) scale(.955);">
        <a id="btn-nuevo" href="#" class="nt-btn" data-variant="primary" role="button"><i class="fa-solid fa-list-ul" aria-hidden="true"></i><span>Ver Planes</span></a>
        <a href="#contacta-un-asesor" class="nt-btn" data-variant="subtle"><i class="fa-solid fa-comments" aria-hidden="true"></i><span>Contactar</span></a>
        <a id="btn-cliente" href="#" class="nt-btn" data-variant="accent" role="button"><i class="fa-solid fa-user-shield" aria-hidden="true"></i><span>Ya eres cliente</span></a>
      </div>
    </div>
  </section>
    <section id="contacta-un-asesor" class="asesor-section premium-box scroll-anim">
  <?= nt_heading('¿Dudas? Contacta a un asesor', 'fa-solid fa-comments', 'md', null, ['animate'=>true,'delay'=>'sm']); ?>
      <div class="asesor-row">
        <input id="asesor-nombre" class="asesor-input" type="text" placeholder="Tu nombre" aria-label="Tu nombre" />
        <button type="button" class="btn-asesor">
          <span class="icon-whatsapp">📲</span>
          Contacta a un asesor
        </button>
      </div>
      <p class="asesor-hint">Se abrirá WhatsApp con un mensaje prellenado.</p>
      <div id="asesor-msg" class="asesor-msg" aria-live="polite"></div>
    </section>
  <!-- Contenedor principal dinámico -->
  <div id="main-content-container">
    <div id="welcome-message" class="section-toggle" style="text-align:center; font-size:2.2rem; color:#a7b3cc; font-weight:800; margin:3rem 0;">Bienvenido a Norttek Internet</div>
    <div id="nuevo-content" class="section-toggle" style="display:none;">
  <div id="personal-greeting" class="greet-anim" style="display:none; text-align:center; margin-bottom:1rem; color:#4f8cff; font-weight:800;">
        <div class="greet-line" style="font-size:1.6rem;">Hola, <span id="customer-name"></span></div>
  <div id="greeting-detail" style="font-weight:600; color:#6b7a90; margin-top:.35rem;">Gracias por interesarte en nuestro servicio. Aquí verás cómo funciona, los costos según tu caso y los planes disponibles. Si tienes dudas puedes escribirnos en cualquier momento o contactar a un asesor.</div>
      </div>
      <main class="app-main">
        <!-- Proceso de instalación (primero) -->
        <section class="proceso-instalacion premium-box scroll-anim">
          <?= nt_heading('¿Cómo funciona nuestro servicio de internet?', 'fa-solid fa-list-check', 'md', null, ['animate'=>true,'delay'=>'sm','class'=>'section-title']); ?>
          <p class="section-subtitle">
            Nuestro internet llega a tu hogar de forma inalámbrica, a través de una antena exterior que se conecta con nuestros equipos locales en tu zona.
            <strong>No se trata de internet satelital.</strong>
          </p>
          <hr class="section-divider" />
          <?= nt_heading('¿Qué necesitas para tu instalación?', 'fa-solid fa-screwdriver-wrench', 'md', null, ['animate'=>true,'delay'=>'md','class'=>'section-title']); ?>
          <p class="section-subtitle">Tu costo de instalación depende de si ya cuentas con antena o no. Con la información que nos diste en el formulario, te preparamos un resumen personalizado de costos.</p>
          <ul class="proceso-list equipo-false">
            <li><strong>Costo de instalación:</strong> $850 (único pago)</li>
            <li id="li-antena-financiamiento"><strong>Antena:</strong> $1,800 — puede pagarse de contado o diferirse a 3 meses junto con tu servicio de internet</li>
          </ul>
          <ul class="proceso-list equipo-true">
            <li><strong>Costo de instalación:</strong> $500 (pago único), incluye programación, alineación de antena y ajuste de router WiFi si se requiere.</li>
          </ul>
          <div id="process-payment-note" class="process-note">
            <p><strong>Es muy importante que realices la solicitud de tu instalación</strong>, ya que necesitamos toda tu información para <b>dar de alta tu cuenta</b>, <b>programar tus equipos</b> y asegurarnos de que <b>el técnico lleve todo lo necesario el día de la instalación</b>.</p>
            <p>Una vez que tengas claro el plan que más se adapte a tus necesidades, <strong>completa el formulario de solicitud</strong>. Con tus datos registrados, podremos <b>agendar la instalación</b> y nos pondremos en contacto contigo para <b>definir la fecha y hora que mejor se acomode a tu rutina</b>.</p>
            <p>El día de la visita, un técnico se comunicará contigo para <strong>indicar dónde colocar tu router WiFi</strong> y comenzar con la <b>programación del sistema, la alineación de la antena y cualquier ajuste necesario para que todo funcione a la perfección</b>.</p>
          </div>

          <hr class="section-divider" />
          <?= nt_heading('¿Qué plan debo elegir?', 'fa-solid fa-wifi', 'md', null, ['animate'=>true,'delay'=>'lg','class'=>'section-title']); ?>
          <p class="section-subtitle">Todos nuestros planes se adaptan casi a cualquiera de las necesidades de hoy en día como son:</p>
          <ul class="proceso-list">
            <li>Videollamadas</li>
            <li>Video Streaming (Netflix, YouTube, etc.)</li>
            <li>Redes sociales (Facebook, Instagram, Twitter, etc.)</li>
            <li>Mensajería instantánea (WhatsApp, Telegram, etc.)</li>
            <li>Trabajo remoto (Zoom, Microsoft Teams, Google Meet, etc.)</li>
            <li>Dispositivos conectados en casa (IoT, asistentes de voz, etc.)</li>
            <li>Juegos en línea</li>
            <li>Visualizar cámaras de videovigilancia</li>
            <li>Descargas y subidas de archivos</li>
            <li>Trabajos escolares</li>
          </ul>
          <p class="section-subtitle" style="margin-top:.6rem;">
            Teniendo en cuenta toda la información que nos proporcionaste, te presentamos los planes de internet disponibles para nuestros usuarios. A continuación, podrás ver las opciones para elegir el plan que mejor se adapte a tu rutina y disfrutar de un servicio confiable desde el primer día. Si tienes alguna duda, no dudes en contactarnos directamente <a href="#contacta-un-asesor" class="link-asesor">dando click aqui</a>.
          </p>
        </section>

        <!-- Planes (segundo) -->
        <section class="plans scroll-anim">
          <?= nt_heading('Elige tu velocidad', 'fa-solid fa-wifi', 'md', null, ['animate'=>true,'delay'=>'sm','class'=>'section-title']); ?>
          <p class="section-subtitle">
            Como guía: pocos dispositivos y uso básico funcionan bien con planes de menor velocidad; para una familia completa de 4-6 personas y múltiples dispositivos, recomendamos planes de 20 Mbps o más.
          </p>
          <div class="plan-cards int-plans">
            <!-- Plan Esencial -->
            <article class="int-plan-card animate-card" data-megas="10">
              <header class="int-plan-header">
                <div class="int-plan-icon esencial"><i class="fa-solid fa-bolt" aria-hidden="true"></i></div>
                <h3 class="int-plan-title">Plan Esencial</h3>
                <p class="int-plan-tagline">Conecta y navega lo básico</p>
              </header>
              <ul class="int-plan-features">
                <li><i class="fa-solid fa-mobile"></i> Ideal 1-2 dispositivos</li>
                <li><i class="fa-solid fa-video"></i> Streaming HD & redes</li>
                <li><i class="fa-solid fa-phone"></i> Videollamadas</li>
                <li><i class="fa-solid fa-laptop"></i> Trabajo remoto ligero</li>
                <li><i class="fa-solid fa-wrench"></i> Instalación rápida</li>
                <li class="ilimitado"><i class="fa-solid fa-circle-right"></i><strong> Internet ilimitado</strong></li>
              </ul>
              <div class="int-plan-pricewrap">
                <span class="int-plan-price">$299 <small>/ mes</small></span>
              </div>
              <div class="int-plan-cta">
                <a class="btn-contratar-link" href="#contratar" target="_blank">
                  <i class="fa-solid fa-rocket icon" aria-hidden="true"></i> Obtener Plan
                </a>
              </div>
            </article>
            <!-- Plan Avanzado -->
            <article class="int-plan-card destacado animate-card" data-megas="20">
              <div class="int-plan-ribbon" aria-label="Plan Recomendado"><span>Recomendado</span></div>
              <header class="int-plan-header">
                <div class="int-plan-icon avanzado"><i class="fa-solid fa-bolt" aria-hidden="true"></i></div>
                <h3 class="int-plan-title">Plan Avanzado</h3>
                <p class="int-plan-tagline">Familias y uso concurrente</p>
              </header>
              <ul class="int-plan-features">
                <li><i class="fa-solid fa-mobile"></i> 3-8 dispositivos</li>
                <li><i class="fa-solid fa-video"></i> Streaming HD estable</li>
                <li><i class="fa-solid fa-headset"></i> Juegos en línea</li>
                <li><i class="fa-solid fa-arrow-down"></i> Descargas rápidas</li>
                <li><i class="fa-solid fa-wrench"></i> Instalación rápida</li>
                <li class="ilimitado"><i class="fa-solid fa-circle-right"></i><strong> Internet ilimitado</strong></li>
              </ul>
              <div class="int-plan-pricewrap">
                <span class="int-plan-price">$399 <small>/ mes</small></span>
              </div>
              <div class="int-plan-cta">
                <a class="btn-contratar-link" href="#contratar" target="_blank">
                  <i class="fa-solid fa-rocket icon" aria-hidden="true"></i> Obtener Plan
                </a>
              </div>
            </article>
            <!-- Plan Superior -->
            <article class="int-plan-card animate-card" data-megas="30">
              <header class="int-plan-header">
                <div class="int-plan-icon superior"><i class="fa-solid fa-bolt" aria-hidden="true"></i></div>
                <h3 class="int-plan-title">Plan Superior</h3>
                <p class="int-plan-tagline">Multiuso + gaming ocasional</p>
              </header>
              <ul class="int-plan-features">
                <li><i class="fa-solid fa-mobile"></i> 8+ dispositivos</li>
                <li><i class="fa-solid fa-video"></i> Streaming Full HD / 4K puntual</li>
                <li><i class="fa-solid fa-laptop"></i> Home office & clases</li>
                <li><i class="fa-solid fa-gamepad"></i> Juego fluido</li>
                <li><i class="fa-solid fa-wrench"></i> Instalación rápida</li>
                <li class="ilimitado"><i class="fa-solid fa-circle-right"></i><strong> Internet ilimitado</strong></li>
              </ul>
              <div class="int-plan-pricewrap">
                <span class="int-plan-price">$499 <small>/ mes</small></span>
              </div>
              <div class="int-plan-cta">
                <a class="btn-contratar-link" href="#contratar" target="_blank">
                  <i class="fa-solid fa-rocket icon" aria-hidden="true"></i> Obtener Plan
                </a>
              </div>
            </article>
          </div>
          </section>

          <!-- Costos de Instalación (último) -->
        <section class="instalacion premium-box scroll-anim">
          <div class="instalacion-header vertical">
            <i class="fa-solid fa-screwdriver-wrench instalacion-icon" aria-hidden="true"></i>
            <?= nt_heading('Instalación', 'fa-solid fa-screwdriver-wrench', 'md', null, ['animate'=>true,'delay'=>'sm','class'=>'section-title','style'=>'margin:0;']); ?>
            <p><strong>Recuerda, es muy importante que realices la solicitud de tu instalación</strong>, ya que necesitamos toda tu información para <b>dar de alta tu cuenta</b>, <b>programar tus equipos</b> y asegurarnos de que <b>el técnico lleve todo lo necesario el día de la instalación</b>. Solo presiona el boton de <em>Solicita tu instalacion</em>, para ser llevado al formulario y puedas proporcionar tu informacion.</p>
          </div>
          <div class="instalacion-cards">
            <div id="card-antena" class="instalacion-card">
              <i class="fa-solid fa-satellite-dish card-icon" aria-hidden="true"></i>
              <div>
                <h3>Antena</h3>
                <p>$1,800 <span class="diferido">(diferible a 3 meses)</span></p>
              </div>
            </div>
            <div class="instalacion-card">
              <i class="fa-solid fa-plug card-icon" aria-hidden="true"></i>
              <div>
                <h3>Instalación y cableado</h3>
                <p id="install-cable-cost">$Variable$</p>
              </div>
            </div>
          </div>
          <div class="instalacion-total">
            <span class="total-label">Total:</span>
            <span id="install-total" class="total-amount">$Variable$</span>
          </div>
          <div id="install-explain" style="text-align:center; margin-top:.5rem;"></div>
          <!-- Pago anticipado (movido abajo, previo al CTA) -->
          <div class="proceso-pago-info" style="margin-top: .8rem;">
            <strong>El pago anticipado es de <span id="install-upfront" style="color:#00c6ff">$850</span>.</strong><br>
            <span style="color:#6b7a90">Este monto cubre los <strong>costos de instalación y equipo</strong> y puede variar si <strong>ya cuentas o no con antena</strong>.</span>
          </div>
          <div id="install-financing" class="instalacion-info premium-info">
            <i class="fa-regular fa-lightbulb icon" aria-hidden="true"></i>
            <span class="instalacion-info-text"><strong>¡Facilitamos tu pago!</strong> El costo de la antena (<strong>$1,800</strong>) puedes diferirlo en <strong>3 mensualidades</strong> junto con el pago de tu plan seleccionado.</span>
          </div>
          <div class="contrata-ahora-wrap scroll-anim">
            <a id="contratar" href="http://clientes.portalinternet.net/solicitar-instalacion/norttek/" target="_blank" class="contrata-ahora-btn">
              <i class="fa-solid fa-pen-to-square contrata-icon" aria-hidden="true"></i> Solicita tu Instalación
            </a>
            <div style="margin-top:.5rem; text-align:center;">
              <a id="abrir-formulario" href="http://clientes.portalinternet.net/solicitar-instalacion/norttek/" target="_blank" rel="noopener noreferrer" style="font-size:.95rem; color:#6b7a90; text-decoration:underline;">
                Abrir formulario sin WhatsApp
              </a>
            </div>
          </div>
        </section>
      </main>
    </div>
  <div id="cliente-content" class="section-toggle" style="display:none;">
    <section class="cliente-dashboard scroll-anim">
      <?= nt_heading('Panel del Cliente', 'fa-solid fa-gauge-high', 'md', null, ['animate'=>true,'delay'=>'sm']); ?>
      <p class="cliente-dashboard-sub">Accede rápidamente a las herramientas de tu servicio Norttek.</p>
      <div class="cliente-grid">
        <article class="cliente-card login-card">
          <h3><i class="fa-solid fa-right-to-bracket" aria-hidden="true"></i> Inicio de Sesión</h3>
          <p>Ingresa usando solo tu usuario (sin el slug de empresa).</p>
          <a href="https://clientes.portalinternet.net/accounts/login/?empresa=norttek" target="_blank" class="cliente-btn" rel="noopener noreferrer">Ir a Login</a>
          <small class="hint-url">URL: /accounts/login/?empresa=norttek</small>
        </article>
        <article class="cliente-card saldo-card">
          <h3><i class="fa-solid fa-wallet" aria-hidden="true"></i> Consultar Saldo</h3>
          <p>Revisa tu saldo pendiente de forma directa.</p>
          <a href="http://clientes.portalinternet.net/saldo/norttek/" target="_blank" class="cliente-btn" rel="noopener noreferrer">Ver Saldo</a>
          <small class="hint-url">/saldo/norttek/</small>
        </article>
        <article class="cliente-card soporte-card">
          <h3><i class="fa-solid fa-headset" aria-hidden="true"></i> Soporte Técnico</h3>
          <p>¿Tienes una falla? Contáctanos por WhatsApp.</p>
          <button type="button" class="cliente-btn btn-soporte-wa" data-wa="Necesito soporte técnico para mi servicio.">Solicitar Soporte</button>
          <small class="hint-url">WhatsApp directo</small>
        </article>
        <article class="cliente-card ayuda-card">
          <h3><i class="fa-solid fa-circle-info" aria-hidden="true"></i> Ayuda y Soluciones</h3>
          <p>Consulta fallas comunes y pasos recomendados.</p>
          <a href="ayuda-servicio.php" class="cliente-btn" rel="noopener">Ver Guía</a>
          <small class="hint-url">/ayuda-servicio</small>
        </article>
        <article class="cliente-card app-card wide">
          <h3><i class="fa-solid fa-mobile-screen" aria-hidden="true"></i> App Servicio WiFi</h3>
          <p>Administra pagos, notificaciones y tu red desde la app oficial.</p>
          <div class="app-links-inline">
            <a href="https://play.google.com/store/apps/details?id=net.wisphub.app" target="_blank" rel="noopener" class="mini-store">
              <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play" />
            </a>
            <a href="https://apps.apple.com/mx/app/wisphub/id6445943532" target="_blank" rel="noopener" class="mini-store">
              <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store" />
            </a>
          </div>
        </article>
      </div>
    </section>
  </div>
  </div>
</div>

<!-- Script específico de la vista de Internet -->
<script src="assets/js/internet.js"></script>
