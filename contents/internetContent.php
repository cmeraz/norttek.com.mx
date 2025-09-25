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
  <section class="hero-internet nt-hero-wrapper" style="min-height:420px;">
    <img src="assets/img/cctv-hero_img.jpg" alt="Internet Hero" class="nt-hero-bg-img" />
    <div class="nt-hero-overlay"></div>
    <div class="hero-content">
      <img src="assets/img/logo-norttek.png" alt="Norttek Logo" class="logo-hero" />
  <?= nt_heading('Internet para el Hogar y la Oficina', 'fa-solid fa-wifi', 'xl', null, ['animate'=>true,'delay'=>'sm','class'=>'nt-heading-hero']); ?>
  <p class="hero-subtitle nt-heading-anim delay-md" style="opacity:0; transform:translateY(34px) scale(.955);">Conéctate a internet en donde otras compañias no llegan.</p>
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
  <!-- Menú principal debajo del hero -->
  <div id="main-menu">
    <button id="btn-nuevo" class="btn-contratar-link"><i class="fa-solid fa-list-ul" aria-hidden="true"></i> Conoce los planes</button>
    <button id="btn-cliente" class="btn-contratar-link"><i class="fa-solid fa-user-shield" aria-hidden="true"></i> ¿Ya eres cliente?</button>
  </div>
  <!-- Contenedor principal dinámico -->
  <div id="main-content-container">
    <div id="welcome-message" class="section-toggle" style="text-align:center; font-size:2.2rem; color:#a7b3cc; font-weight:800; margin:3rem 0;">Bienvenido a Norttek Internet</div>
    <div id="nuevo-content" class="section-toggle" style="display:none;">
      <div id="personal-greeting" style="display:none; text-align:center; margin-bottom:1rem; color:#4f8cff; font-weight:800;">
        <div class="greet-line" style="font-size:1.6rem;">Hola, <span id="customer-name"></span></div>
        <div id="greeting-detail" style="font-weight:600; color:#6b7a90; margin-top:.35rem;">Gracias por interesarte en nuestro servicio, aqui podrás encontrar información sobre nuestros planes, y sobre los costos de instalación. Si requieres mas información, puedes contactarnos directamente.</div>
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
          <div class="plan-cards">
            <!-- Planes renderizados aquí -->
            <div class="plan-card animate-card" data-megas="10">
              <div style="display:flex; flex-direction:column; align-items:center; width:100%;">
                <div class="plan-megas">
                  <h3>Plan Esencial</h3>
                  <i class="fa-solid fa-bolt plan-mega-icon" aria-hidden="true"></i>
                  <span class="plan-mega-value">10</span>
                  <span class="plan-mega-unit">Megas</span>
                </div>
                <p class="price">$299/mes</p>
                <ul class="plan-info">
                  <li><i class="fa-solid fa-mobile"></i> Ideal para 1-2 dispositivos</li>
                  <li><i class="fa-solid fa-video"></i> Streaming HD y redes sociales</li>
                  <li><i class="fa-solid fa-phone"></i> Videollamadas</li>
                  <li><i class="fa-solid fa-laptop"></i> Trabajo remoto</li>
                  <li><i class="fa-solid fa-wrench"></i> Instalación rápida</li>
                  <li class="ilimitado"><i class="fa-solid fa-circle-right"></i><strong> Internet ilimitado</strong></li>
                </ul>
                <a class="btn-contratar-link" href="#contratar" target="_blank">
                  <i class="fa-solid fa-rocket icon" aria-hidden="true"></i> Obtener Plan
                </a>
              </div>
            </div>
            <!-- Plan 20 Mbps -->
            <div class="plan-card animate-card" data-megas="20">
              <span class="plan-badge" aria-hidden="true">Recomendado</span>
              <div style="display:flex; flex-direction:column; align-items:center; width:100%;">
                <div class="plan-megas">
                  <h3>Plan Avanzado</h3>
                  <i class="fa-solid fa-bolt plan-mega-icon" aria-hidden="true"></i>
                  <span class="plan-mega-value">20</span>
                  <span class="plan-mega-unit">Megas</span>
                </div>
                <p class="price">$399/mes</p>
                <ul class="plan-info">
                  <li><i class="fa-solid fa-mobile"></i> Ideal para 3-8 dispositivos</li>
                  <li><i class="fa-solid fa-video"></i> Streaming HD y videollamadas estables</li>
                  <li><i class="fa-solid fa-headset"></i> Juegos en línea</li>
                  <li><i class="fa-solid fa-arrow-down"></i> Descargas rápidas</li>
                  <li><i class="fa-solid fa-wrench"></i> Instalación rápida</li>
                  <li class="ilimitado"><i class="fa-solid fa-circle-right"></i><strong> Internet ilimitado</strong></li>
                </ul>
                <a class="btn-contratar-link" href="#contratar" target="_blank">
                  <i class="fa-solid fa-rocket icon" aria-hidden="true"></i> Obtener Plan
                </a>
              </div>
            </div>

            <!-- Plan 30 Mbps -->
            <div class="plan-card animate-card" data-megas="30">
              <div style="display:flex; flex-direction:column; align-items:center; width:100%;">
                <div class="plan-megas">
                  <h3>Plan Superior</h3>
                  <i class="fa-solid fa-bolt plan-mega-icon" aria-hidden="true"></i>
                  <span class="plan-mega-value">30</span>
                  <span class="plan-mega-unit">Megas</span>
                </div>
                <p class="price">$499/mes</p>
                <ul class="plan-info">
                    <li><i class="fa-solid fa-mobile"></i> Ideal para 8 dispositivos en adelante</li>
                  <li><i class="fa-solid fa-video"></i> Streaming Full HD/4K puntual</li>
                  <li><i class="fa-solid fa-laptop"></i> Home office y clases en línea</li>
                  <li><i class="fa-solid fa-gamepad"></i> Experiencia de juego fluida</li>
                  <li><i class="fa-solid fa-wrench"></i> Instalación rápida</li>
                  <li class="ilimitado"><i class="fa-solid fa-circle-right"></i><strong> Internet ilimitado</strong></li>
                </ul>
                <a class="btn-contratar-link" href="#contratar" target="_blank">
                  <i class="fa-solid fa-rocket icon" aria-hidden="true"></i> Obtener Plan
                </a>
              </div>
              </div>

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
      <div style="text-align:center; margin:3rem 0;">
  <?= nt_heading('Bienvenido cliente Norttek', 'fa-solid fa-user-shield', 'md', null, ['animate'=>true,'delay'=>'sm']); ?>
        <p style="font-size:1.1rem; color:#a7b3cc; margin-bottom:1.5rem;">Consulta tu cuenta, soporte y promociones exclusivas.</p>
        <a href="https://clientes.norttek.com.mx" class="btn-contratar-link">Acceder a mi cuenta</a>
        <div style="margin-top:1rem;">
          <a href="mailto:soporte@norttek.com.mx" class="btn-contratar-link">Soporte técnico</a>
        </div>
      </div>
      <!-- App Wisphub (solo clientes) -->
      <section class="app-wisphub premium-box scroll-anim" style="margin:1rem auto 2rem; max-width:820px; text-align:center;">
        <div class="app-header-wisphub">
          <img src="http://wisphub-media.s3.amazonaws.com/media/uploadsCKEditor/jorge%40wisphub/2020/02/20/logo-servicio-wifi.png" alt="Wisphub App" class="wisphub-logo" />
          <h2>Administra tu servicio desde la app móvil</h2>
        </div>
        <ul class="wisphub-benefits">
          <li>Consulta y reporta tus pagos fácilmente</li>
          <li>Recibe notificaciones y recordatorios</li>
          <li>Administra tu cuenta y servicio desde cualquier lugar</li>
          <li>Disponible para Android y iOS</li>
        </ul>
        <div class="wisphub-links" style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
          <a href="https://play.google.com/store/apps/details?id=net.wisphub.app" target="_blank" class="wisphub-store" style="text-decoration:none;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play" class="store-img" style="height:48px; width:160px; object-fit:contain; display:block;" />
          </a>
          <a href="https://apps.apple.com/mx/app/wisphub/id6445943532" target="_blank" class="wisphub-store" style="text-decoration:none;">
            <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store" class="store-img" style="height:48px; width:160px; object-fit:contain; display:block;" />
          </a>
        </div>
      </section>
    </div>
  </div>
</div>

<!-- Script específico de la vista de Internet -->
<script src="assets/js/internet.js"></script>
