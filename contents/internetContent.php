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
  <!-- Modal de login de cliente existente -->
  <div id="cliente-login-modal" class="internet-modal-backdrop" style="display:none;">
    <div class="internet-modal" role="dialog" aria-modal="true" aria-labelledby="cliente-login-title">
      <button type="button" class="modal-close" id="cliente-login-close" aria-label="Cerrar">&times;</button>
      <div class="modal-header">
        <h3 id="cliente-login-title" style="display:flex; align-items:center; gap:.5rem;">
          <i class="fa-solid fa-user-shield" aria-hidden="true"></i>
          Acceso Cliente
        </h3>
        <p class="modal-subtitle">Ingresa tu número de teléfono registrado para mostrar tus credenciales.</p>
      </div>
      <form id="cliente-login-form" class="modal-body" autocomplete="off">
        <div class="form-field">
          <label for="cliente-login-phone">Teléfono (10 dígitos)</label>
          <div style="position:relative;">
            <i class="fa-solid fa-phone" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#6b7a90;"></i>
            <input id="cliente-login-phone" name="telefono" type="tel" inputmode="numeric" pattern="[0-9]{10}" minlength="10" maxlength="14" required placeholder="Ej. 6251234567" style="padding-left:2.2rem;" />
          </div>
        </div>
        <div id="cliente-login-error" style="display:none; background:#fff5f5; border:1px solid #f8caca; color:#b54848; padding:.6rem .75rem; border-radius:10px; font-size:.8rem; font-weight:600; line-height:1.4;">
          Teléfono no encontrado. Verifica que sea el número con el que te registraste.
        </div>
        <div class="modal-actions">
          <button type="submit" class="btn btn-primary" id="cliente-login-submit">Continuar</button>
          <button type="button" class="btn btn-secondary" id="cliente-login-cancel">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
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
            <article class="int-plan-card animate-card nt-soft-seq" data-nt-anim data-megas="10">
              <header class="int-plan-header">
                <div class="int-plan-icon esencial" data-nt-icon-drift><i class="fa-solid fa-bolt" aria-hidden="true"></i></div>
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
            <article class="int-plan-card destacado animate-card nt-soft-seq" data-nt-anim data-megas="20">
              <div class="int-plan-ribbon" aria-label="Plan Recomendado"><span>Recomendado</span></div>
              <header class="int-plan-header">
                <div class="int-plan-icon avanzado" data-nt-icon-drift><i class="fa-solid fa-bolt" aria-hidden="true"></i></div>
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
            <article class="int-plan-card animate-card nt-soft-seq" data-nt-anim data-megas="30">
              <header class="int-plan-header">
                <div class="int-plan-icon superior" data-nt-icon-drift><i class="fa-solid fa-bolt" aria-hidden="true"></i></div>
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

          <!-- Costos de Instalación (refactor) -->
        <section class="instalacion-costos premium-box scroll-anim" id="instalacion-costos" data-nt-anim>
          <div class="inst-header">
            <i class="fa-solid fa-screwdriver-wrench instalacion-icon" aria-hidden="true"></i>
            <?= nt_heading('Costos de Instalación', 'fa-solid fa-screwdriver-wrench', 'md', null, ['animate'=>true,'delay'=>'sm','class'=>'section-title','style'=>'margin:0;']); ?>
            <p class="intro">
              Aquí verás el costo inicial según si ya cuentas con antena o necesitas una nueva. También puedes elegir pagar la antena de contado o diferirla a 3 meses.
            </p>
          </div>
          <div class="escenarios-grid">
            <article class="escenario-card" id="esc-propio" data-esc="propio">
              <header><h3><i class="fa-solid fa-circle-check"></i> Ya tengo antena</h3><span class="tag">Escenario 1</span></header>
              <ul class="incluye">
                <li>Alineación de antena</li>
                <li>Reprogramación de equipo</li>
                <li>Configuración del módem WiFi</li>
              </ul>
              <div class="monto-principal">
                <div class="valor" data-monto="propio-total">$500 MXN</div>
                <div class="detalle">Anticipo único. Cubre todo.</div>
              </div>
              <div class="resumen-mini">
                <strong>Pago inicial:</strong> $500 MXN<br>
                <strong>Pagos futuros:</strong> solo la mensualidad del plan.
              </div>
              <button class="btn-escoger" data-select-esc="propio">Usar este escenario</button>
            </article>
            <article class="escenario-card" id="esc-sinequipo" data-esc="sinequipo">
              <header><h3><i class="fa-solid fa-satellite-dish"></i> Necesito antena</h3><span class="tag alt">Escenario 2</span></header>
              <ul class="incluye">
                <li>Antena nueva <strong>$1,800</strong></li>
                <li>Instalación, cableado y módem WiFi <strong>$850</strong></li>
              </ul>
              <div class="monto-principal">
                <div class="valor" data-monto="sinequipo-total">$2,650 MXN</div>
                <div class="detalle">Costo total si pagas de contado.</div>
              </div>
              <fieldset class="pago-opciones">
                <legend>Forma de pago de la antena</legend>
                <label class="radio"><input type="radio" name="pago-antena" value="contado" checked> <span>Pago de contado ($2,650 MXN inicial)</span></label>
                <label class="radio"><input type="radio" name="pago-antena" value="diferido"> <span>Pago diferido (antena en 3 mensualidades)</span></label>
                <div class="nota-diferido" data-role="nota-diferido" style="display:none;">Mes 1 pagas anticipo ($850). Meses 2-4: servicio + cuota antena. Después solo servicio.</div>
              </fieldset>
              <div class="resumen-mini" data-role="sin-equipo-resumen"></div>
              <button class="btn-escoger" data-select-esc="sinequipo">Usar este escenario</button>
            </article>
          </div>
          <div class="calendario-costos">
            <h4><i class="fa-solid fa-calendar-check"></i> Calendario de Pagos (primeros meses)</h4>
            <div class="tabla-wrap">
              <table id="tabla-calendario" aria-label="Calendario de pagos instalación">
                <thead><tr><th>Mes</th><th>Monto</th><th>Detalle</th></tr></thead>
                <tbody></tbody>
              </table>
              <div class="tabla-placeholder" id="tabla-placeholder">Selecciona un escenario y un plan para ver montos.</div>
            </div>
          </div>
          <div class="formas-pago">
            <h4><i class="fa-solid fa-wallet"></i> Formas de Pago</h4>
            <div class="formas-grid">
              <div class="pago-box">
                <h5><i class="fa-solid fa-building-columns"></i> BBVA</h5>
                <p>CLABE: <code>012 345 678901234567</code><br>Cuenta: <code>1234567890</code></p>
              </div>
              <div class="pago-box">
                <h5><i class="fa-solid fa-credit-card"></i> Mercado Pago</h5>
                <p>Alias: <code>norttek.mp</code><br>Ref: <code>INSTALACION</code></p>
              </div>
              <div class="pago-box">
                <h5><i class="fa-solid fa-link"></i> Links de Tarjeta</h5>
                <p>
                  <a href="#" class="linkpay" data-link="mp-link">Pagar ahora</a><br>
                  <a href="#" class="linkpay" data-link="mp-recurrente">Pago recurrente (cargo mensual)</a>
                </p>
              </div>
            </div>
          </div>
          <div class="resumen-final">
            <h4><i class="fa-solid fa-calculator"></i> Resumen Dinámico</h4>
            <div id="inst-resumen-linea" class="res-line">Selecciona un escenario para ver el detalle de pagos.</div>
            <div class="nota-mini">La mensualidad mostrada se basa en el plan que selecciones arriba.</div>
          </div>
        </section>
      </main>
    </div>
  <div id="cliente-content" class="section-toggle" style="display:none;">
    <section class="cliente-dashboard scroll-anim">
      <?= nt_heading('Panel del Cliente', 'fa-solid fa-gauge-high', 'md', null, ['animate'=>true,'delay'=>'sm']); ?>
      <p class="cliente-dashboard-sub">Accede rápidamente a las herramientas de tu servicio Norttek.</p>
      <div id="cliente-auth-info" style="display:none; margin:0 auto 1.4rem; max-width:820px; text-align:left; background:linear-gradient(135deg, rgba(111,164,255,.12), rgba(111,164,255,.04)); border:1px solid rgba(111,164,255,.35); border-radius:16px; padding:1rem 1rem 1.05rem; position:relative; overflow:hidden; box-shadow:0 4px 14px -4px rgba(15,23,42,.18), 0 2px 6px rgba(15,23,42,.08);">
        <div style="display:flex; flex-direction:column; gap:.4rem;">
          <div style="font-weight:900; font-size:1.05rem; display:flex; align-items:center; gap:.45rem; color:#0f172a;">
            <i class="fa-solid fa-circle-user" aria-hidden="true" style="color:#4f8cff;"></i>
            <span>Hola, <span id="cliente-auth-nombre"></span></span>
          </div>
          <div style="display:grid; gap:.55rem; grid-template-columns: repeat(auto-fit, minmax(180px,1fr)); font-size:.8rem;">
            <div style="display:flex; flex-direction:column; gap:.25rem; background:#fff; border:1px solid #e2edf9; border-radius:10px; padding:.6rem .7rem;">
              <span style="font-weight:700; color:#6b7a90; letter-spacing:.5px; font-size:.65rem; text-transform:uppercase;">Usuario</span>
              <code id="cliente-auth-usuario" style="font-weight:800; font-size:.85rem; color:#1f2937;">--</code>
            </div>
            <div style="display:flex; flex-direction:column; gap:.25rem; background:#fff; border:1px solid #e2edf9; border-radius:10px; padding:.6rem .7rem;">
              <span style="font-weight:700; color:#6b7a90; letter-spacing:.5px; font-size:.65rem; text-transform:uppercase;">Password</span>
              <code id="cliente-auth-pass" style="font-weight:800; font-size:.85rem; color:#1f2937;">norttek123</code>
            </div>
            <div style="display:flex; flex-direction:column; gap:.25rem; background:#fff; border:1px solid #e2edf9; border-radius:10px; padding:.6rem .7rem;">
              <span style="font-weight:700; color:#6b7a90; letter-spacing:.5px; font-size:.65rem; text-transform:uppercase;">Teléfonos</span>
              <code id="cliente-auth-tels" style="font-weight:800; font-size:.85rem; color:#1f2937; word-break:break-all;">--</code>
            </div>
          </div>
          <div style="display:flex; flex-wrap:wrap; gap:.5rem; margin-top:.4rem;">
            <button type="button" id="cliente-auth-logout" style="background:linear-gradient(#fff,#fff) padding-box, linear-gradient(135deg,var(--danger-500) 0%, var(--danger-600) 100%) border-box; border:1px solid transparent; color:#b42318; font-weight:800; font-size:.7rem; letter-spacing:.5px; text-transform:uppercase; padding:.5rem .75rem; border-radius:8px; cursor:pointer; box-shadow:0 3px 10px var(--danger-ring);">Cerrar Sesión</button>
            <small style="align-self:center; font-size:.65rem; font-weight:600; color:#6b7a90;">La contraseña es temporal y genérica.</small>
          </div>
        </div>
      </div>
  <div class="cliente-grid">
  <article class="cliente-card login-card nt-soft-seq nt-breath" data-nt-anim>
    <h3><i class="fa-solid fa-right-to-bracket" aria-hidden="true" data-nt-icon-drift></i> Inicio de Sesión</h3>
          <p>Ingresa usando solo tu usuario (sin el slug de empresa).</p>
          <a href="https://clientes.portalinternet.net/accounts/login/?empresa=norttek" target="_blank" class="cliente-btn" rel="noopener noreferrer">Ir a Login</a>
          <small class="hint-url">URL: /accounts/login/?empresa=norttek</small>
        </article>
  <article class="cliente-card saldo-card nt-soft-seq nt-breath" data-nt-anim>
    <h3><i class="fa-solid fa-wallet" aria-hidden="true" data-nt-icon-drift></i> Consultar Saldo</h3>
          <p>Revisa tu saldo pendiente de forma directa.</p>
          <a href="http://clientes.portalinternet.net/saldo/norttek/" target="_blank" class="cliente-btn" rel="noopener noreferrer">Ver Saldo</a>
          <small class="hint-url">/saldo/norttek/</small>
        </article>
  <article class="cliente-card soporte-card nt-soft-seq nt-breath" data-nt-anim>
    <h3><i class="fa-solid fa-headset" aria-hidden="true" data-nt-icon-drift></i> Soporte Técnico</h3>
          <p>¿Tienes una falla? Contáctanos por WhatsApp.</p>
          <button type="button" class="cliente-btn btn-soporte-wa" data-wa="Necesito soporte técnico para mi servicio.">Solicitar Soporte</button>
          <small class="hint-url">WhatsApp directo</small>
        </article>
  <article class="cliente-card ayuda-card nt-soft-seq nt-breath" data-nt-anim>
    <h3><i class="fa-solid fa-circle-info" aria-hidden="true" data-nt-icon-drift></i> Ayuda y Soluciones</h3>
          <p>Consulta fallas comunes y pasos recomendados.</p>
          <a href="ayuda-servicio.php" class="cliente-btn" rel="noopener">Ver Guía</a>
          <small class="hint-url">/ayuda-servicio</small>
        </article>
  <article class="cliente-card app-card wide nt-soft-seq nt-breath" data-nt-anim>
    <h3><i class="fa-solid fa-mobile-screen" aria-hidden="true" data-nt-icon-drift></i> App Servicio WiFi</h3>
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
  <article class="cliente-card cuentas-card wide nt-soft-seq nt-breath" data-nt-anim>
    <h3><i class="fa-solid fa-building-columns" aria-hidden="true" data-nt-icon-drift></i> Cuentas para Pago</h3>
    <div style="display:flex; flex-direction:column; gap:.75rem; font-size:.78rem;">
      <div style="background:#f8fbff; border:1px solid #e2edf9; border-radius:10px; padding:.65rem .7rem; display:flex; flex-direction:column; gap:.35rem;">
        <strong style="font-size:.72rem; letter-spacing:.5px; text-transform:uppercase; color:#4f5d70; display:flex; align-items:center; gap:.4rem;"><i class="fa-solid fa-piggy-bank" aria-hidden="true" style="color:#4f8cff;"></i> BBVA Bancomer</strong>
        <div style="display:grid; gap:.45rem; grid-template-columns:repeat(auto-fit,minmax(190px,1fr));">
          <div style="display:flex; flex-direction:column; gap:.2rem;">
            <span style="font-weight:600; color:#6b7a90; font-size:.62rem; letter-spacing:.5px; text-transform:uppercase;">Cuenta</span>
            <code class="clip-src" data-clip="1529734333">152 973 4333 <button type="button" class="clip-btn" data-clip="1529734333" title="Copiar" aria-label="Copiar cuenta"><i class="fa-regular fa-clone"></i></button></code>
          </div>
          <div style="display:flex; flex-direction:column; gap:.2rem;">
            <span style="font-weight:600; color:#6b7a90; font-size:.62rem; letter-spacing:.5px; text-transform:uppercase;">CLABE</span>
            <code class="clip-src" data-clip="012180015297343334">012 180 01529734333 4 <button type="button" class="clip-btn" data-clip="012180015297343334" title="Copiar" aria-label="Copiar CLABE"><i class="fa-regular fa-clone"></i></button></code>
          </div>
          <div style="display:flex; flex-direction:column; gap:.2rem;">
            <span style="font-weight:600; color:#6b7a90; font-size:.62rem; letter-spacing:.5px; text-transform:uppercase;">Tarjeta</span>
            <code class="clip-src" data-clip="4152313948990200">4152 3139 4899 0200 <button type="button" class="clip-btn" data-clip="4152313948990200" title="Copiar" aria-label="Copiar tarjeta"><i class="fa-regular fa-clone"></i></button></code>
          </div>
        </div>
      </div>
      <div style="background:#fff; border:1px solid #e2edf9; border-radius:10px; padding:.65rem .7rem; display:flex; flex-direction:column; gap:.4rem;">
        <strong style="font-size:.72rem; letter-spacing:.5px; text-transform:uppercase; color:#4f5d70; display:flex; align-items:center; gap:.4rem;"><i class="fa-solid fa-wallet" aria-hidden="true" style="color:#4f8cff;"></i> MercadoPago</strong>
        <div style="display:flex; flex-direction:column; gap:.25rem;">
          <span style="font-weight:600; color:#6b7a90; font-size:.62rem; letter-spacing:.5px; text-transform:uppercase;">CLABE</span>
          <code class="clip-src" data-clip="722969040367244111">722969040367244111 <button type="button" class="clip-btn" data-clip="722969040367244111" title="Copiar" aria-label="Copiar CLABE MercadoPago"><i class="fa-regular fa-clone"></i></button></code>
        </div>
      </div>
      <div style="background:#f8fbff; border:1px solid #e2edf9; border-radius:10px; padding:.65rem .75rem; display:flex; flex-direction:column; gap:.45rem;">
        <strong style="font-size:.72rem; letter-spacing:.5px; text-transform:uppercase; color:#4f5d70; display:flex; align-items:center; gap:.4rem;"><i class="fa-solid fa-tag" aria-hidden="true" style="color:#4f8cff;"></i> Referencia de Pago</strong>
        <div style="display:grid; gap:.55rem; grid-template-columns:repeat(auto-fit,minmax(170px,1fr));">
          <div style="display:flex; flex-direction:column; gap:.25rem;">
            <span style="font-weight:600; color:#6b7a90; font-size:.62rem; letter-spacing:.5px; text-transform:uppercase;">Nombre</span>
            <code id="ref-pago-nombre" class="clip-src" data-clip="" style="font-weight:800; color:#1f2937;">-- <button type="button" class="clip-btn" data-clip="" data-ref="nombre" title="Copiar" aria-label="Copiar nombre"><i class="fa-regular fa-clone"></i></button></code>
          </div>
          <div style="display:flex; flex-direction:column; gap:.25rem;">
            <span style="font-weight:600; color:#6b7a90; font-size:.62rem; letter-spacing:.5px; text-transform:uppercase;">Usuario</span>
            <code id="ref-pago-usuario" class="clip-src" data-clip="" style="font-weight:800; color:#1f2937;">-- <button type="button" class="clip-btn" data-clip="" data-ref="usuario" title="Copiar" aria-label="Copiar usuario"><i class="fa-regular fa-clone"></i></button></code>
          </div>
        </div>
        <small style="font-size:.6rem; font-weight:600; letter-spacing:.5px; color:#6b7a90;">Usa tu nombre o usuario como referencia/concepto para identificar tu pago.</small>
      </div>
      <small style="color:#6b7a90; line-height:1.4;">Verifica siempre que los datos coincidan antes de realizar tu pago. Envía tu comprobante por WhatsApp para agilizar la aplicación.</small>
    </div>
  </article>
      </div>
    </section>
  </div>
  </div>
</div>

<!-- Script específico de la vista de Internet -->
<script src="assets/js/internet.js"></script>
