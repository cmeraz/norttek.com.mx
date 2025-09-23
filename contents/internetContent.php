<!-- Modal de bienvenida para cliente nuevo -->
<div id="nuevo-modal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.35); z-index:9999; align-items:center; justify-content:center;">
  <button id="close-modal" type="button" style="position:absolute; top:1rem; right:1rem; background:none; border:none; font-size:1.5rem; color:#1565c0; cursor:pointer;">&times;</button>
  <div style="background:#fff; border-radius:1.2rem; max-width:350px; width:90vw; margin:auto; padding:2rem 1.5rem; box-shadow:0 8px 32px #0002; text-align:center; position:relative;">
    <h2 style="color:#1565c0;">¡Bienvenido!</h2>
    <form id="modal-form">
      <div style="margin-bottom:1.5rem;">
        <label for="input-nombre" style="font-weight:600;">¿Cuál es tu nombre?</label><br>
        <input id="input-nombre" name="nombre" type="text" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,}" maxlength="30" required style="width:90%; padding:0.7rem; border-radius:0.5rem; border:1px solid #90caf9; margin-top:1rem; font-size:1.1rem;" placeholder="Solo nombre, sin apellido" />
      </div>
      <div style="margin-bottom:1.5rem; text-align:left;">
        <label style="font-weight:600;">¿Ya tienes servicio con otra compañía?<br><small>(¿Tienes antena instalada?)</small></label><br>
        <label><input type="radio" name="antena" value="si" required> Sí</label>
        <label style="margin-left:2rem;"><input type="radio" name="antena" value="no"> No</label>
      </div>
  <button type="submit" id="btn-modal-continuar" class="btn-contratar-link" style="width:100%; margin-top:1.5rem;">Continuar</button>
    </form>
  </div>
</div>
<div class="internet-app">
  <section class="hero-internet">
    <div class="hero-bg">
      <img src="assets/img/cctv-hero_img.jpg" alt="Internet Hero" class="hero-img-bg" />
      <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
      <img src="assets/img/logo-norttek.png" alt="Norttek Logo" class="logo-hero" />
      <h1 class="hero-title">Internet Premium para tu Hogar</h1>
      <p class="hero-subtitle">Conéctate a la mejor experiencia, velocidad y soporte. ¡Descubre la diferencia Norttek!</p>
    </div>
  </section>
    <main class="app-main" style="background:#f7f8fa; color:#222; font-family:'Roboto', Arial, sans-serif;">
  <section class="plans scroll-anim">
    <h2 style="text-align:center; margin-bottom:2rem; color:#1565c0;">Elige tu velocidad</h2>
    <div class="plan-cards">
      <!-- Plan 10 Megas -->
      <div class="plan-card animate-card" data-megas="10">
        <div style="display:flex; flex-direction:column; align-items:flex-start; width:100%;">
          <div class="plan-megas">
            <span class="plan-mega-icon">⚡</span>
            <span class="plan-mega-value">10</span>
            <span class="plan-mega-unit">Megas</span>
          </div>
          <p class="price">$299/mes</p>
          <ul class="plan-info">
            <li>Ideal para 1-2 dispositivos</li>
            <li>Streaming HD y redes sociales</li>
            <li>Instalación rápida</li>
            <li class="ilimitado"><strong>Internet ilimitado</strong></li>
          </ul>
          <a class="btn-contratar-link" href="http://clientes.portalinternet.net/solicitar-instalacion/norttek/?plan=10" target="_blank">
            <span class="icon">🚀</span> Contratar
          </a>
        </div>
      </div>
      <!-- Plan 20 Megas -->
      <div class="plan-card animate-card" data-megas="20">
        <div style="display:flex; flex-direction:column; align-items:flex-start; width:100%;">
          <div class="plan-megas">
            <span class="plan-mega-icon">🚀</span>
            <span class="plan-mega-value">20</span>
            <span class="plan-mega-unit">Megas</span>
          </div>
          <p class="price">$399/mes</p>
          <ul class="plan-info">
            <li>Perfecto para familias pequeñas</li>
            <li>Videollamadas y gaming casual</li>
            <li>WiFi Mesh disponible</li>
            <li class="ilimitado"><strong>Internet ilimitado</strong></li>
          </ul>
          <a class="btn-contratar-link" href="http://clientes.portalinternet.net/solicitar-instalacion/norttek/?plan=20" target="_blank">
            <span class="icon">⚡</span> Contratar
          </a>
        </div>
      </div>
      <!-- Plan 30 Megas -->
      <div class="plan-card animate-card" data-megas="30">
        <div style="display:flex; flex-direction:column; align-items:flex-start; width:100%;">
          <div class="plan-megas">
            <span class="plan-mega-icon">🏆</span>
            <span class="plan-mega-value">30</span>
            <span class="plan-mega-unit">Megas</span>
          </div>
          <p class="price">$499/mes</p>
          <ul class="plan-info">
            <li>Para hogares conectados y gamers</li>
            <li>Streaming 4K y trabajo remoto</li>
            <li>Soporte prioritario</li>
            <li class="ilimitado"><strong>Internet ilimitado</strong></li>
          </ul>
          <a class="btn-contratar-link" href="http://clientes.portalinternet.net/solicitar-instalacion/norttek/?plan=30" target="_blank">
            <span class="icon">🏆</span> Contratar
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class="proceso-instalacion premium-box scroll-anim">
      <h2>¿Cómo solicitar tu servicio?</h2>
      <div class="proceso-pago-info">
        <strong>Antes de instalar, deberás pagar <span style="color:#00c6ff">$850</span> (instalación y módem WiFi).</strong><br>
        <span style="color:#aee1f9">Este monto <strong>ya incluye el primer mes de servicio</strong>. No se requiere pago adicional al momento de la instalación.</span>
      </div>
      <ul class="proceso-list">
        <li>Solicita la instalación seleccionando el botón <strong>Solicitar</strong> en el plan que prefieras.</li>
        <li>Agendaremos tu servicio coordinando la hora adecuada entre el instalador y tú.</li>
        <li>El costo de la antena (<strong>$1,800</strong>) se puede diferir en <strong>3 mensualidades</strong> junto con tus pagos de internet, o puedes pagarlo en una sola exhibición.</li>
      </ul>
    </section>
  <section class="instalacion premium-box scroll-anim">
      <div class="instalacion-header vertical">
        <span class="instalacion-icon">🛠️</span>
        <h2>Instalación</h2>
        <p class="instalacion-desc">Tu conexión lista en menos de 24 horas, con equipo de última generación y técnicos certificados.</p>
      </div>
      <div class="instalacion-cards">
        <div class="instalacion-card">
          <span class="card-icon">📡</span>
          <div>
            <h3>Antena</h3>
            <p>$1,800 <span class="diferido">(diferible a 3 meses)</span></p>
          </div>
        </div>
        <div class="instalacion-card">
          <span class="card-icon">📶</span>
          <div>
            <h3>Modem WiFi</h3>
            <p>$500</p>
          </div>
        </div>
        <div class="instalacion-card">
          <span class="card-icon">🔌</span>
          <div>
            <h3>Instalación y cableado</h3>
            <p>$350</p>
          </div>
        </div>
      </div>
      <div class="instalacion-total">
        <span class="total-label">Total:</span>
        <span class="total-amount">$2,650</span>
      </div>
      <div class="instalacion-info premium-info">
        <span class="icon">💡</span>
        <strong>¡Facilitamos tu pago!</strong> El costo de la antena (<strong>$1,800</strong>) puedes diferirlo en <strong>3 mensualidades</strong> junto con el pago de tu plan seleccionado.
      </div>
      <div class="contrata-ahora-wrap scroll-anim">
        <a href="http://clientes.portalinternet.net/solicitar-instalacion/norttek/" target="_blank" class="contrata-ahora-btn">
          <span class="contrata-icon">📝</span> Solicita tu Instalación
        </a>
      </div>
    </section>
    <!-- Opciones adicionales eliminadas -->
  <section class="app-wisphub premium-box scroll-anim">
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
      <div class="wisphub-links">
        <a href="https://play.google.com/store/apps/details?id=net.wisphub.app" target="_blank" class="wisphub-store">
          <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play" class="store-img" />
        </a>
        <a href="https://apps.apple.com/mx/app/wisphub/id6445943532" target="_blank" class="wisphub-store">
          <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store" class="store-img" />
        </a>
      </div>
    </section>
    <!-- Formulario de contacto eliminado -->
  </main>
    <footer class="app-footer" style="background:#eaf6ff; color:#2563eb; border-radius:1.5rem 1.5rem 0 0;">
    <p>&copy; 2025 Norttek Solutions</p>
  </footer>
</div>
