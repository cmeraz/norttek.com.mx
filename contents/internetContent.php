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
  <!-- Menú principal debajo del hero -->
  <div id="main-menu" style="display:flex; justify-content:center; gap:2rem; margin:2rem 0 2.5rem 0; padding-top:200px;">
    <button id="btn-nuevo" class="btn-contratar-link" style="font-size:1.2rem; padding:1rem 2.5rem;">Usuarios nuevos</button>
    <button id="btn-cliente" class="btn-contratar-link" style="font-size:1.2rem; padding:1rem 2.5rem;">Clientes existentes</button>
  </div>
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
  <!-- Menú principal debajo del hero -->
  <div id="main-menu" style="display:flex; justify-content:center; gap:2rem; margin:2rem 0 2.5rem 0; padding-top:200px;">
    <button id="btn-nuevo" class="btn-contratar-link" style="font-size:1.2rem; padding:1rem 2.5rem;">Usuarios nuevos</button>
    <button id="btn-cliente" class="btn-contratar-link" style="font-size:1.2rem; padding:1rem 2.5rem;">Clientes existentes</button>
  </div>
  <!-- Contenedor principal dinámico -->
  <div id="main-content-container">
    <div id="welcome-message" style="text-align:center; font-size:2.5rem; color:#d1d5db; font-weight:700; margin:4rem 0;">Bienvenido a Norttek Internet</div>
    <div id="nuevo-content" style="display:none; padding-top:0;">
      <main class="app-main" style="background:#f7f8fa; color:#222; font-family:'Roboto', Arial, sans-serif;">
        <section class="plans scroll-anim">
          <h2 style="text-align:center; margin-bottom:2rem; color:#1565c0;">Elige tu velocidad</h2>
          <div class="plan-cards">
            <!-- Planes renderizados aquí -->
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
            <!-- ...otros planes... -->
          </div>
        </section>
        <!-- Sección de instalación, premium, etc. -->
        <!-- ...puedes agregar más contenido aquí... -->
      </main>
    </div>
    <div id="cliente-content" style="display:none;">
      <div style="text-align:center; margin:4rem 0;">
        <h2 style="font-size:2.2rem; color:#1565c0; font-weight:800; margin-bottom:1.5rem;">Bienvenido cliente Norttek</h2>
        <p style="font-size:1.3rem; color:#444; margin-bottom:2rem;">Aquí puedes consultar tu estado de cuenta, soporte y promociones exclusivas.</p>
        <a href="https://clientes.norttek.com.mx" class="btn-contratar-link" style="font-size:1.1rem; padding:1rem 2.5rem;">Acceder a mi cuenta</a>
        <div style="margin-top:2rem;">
          <a href="mailto:soporte@norttek.com.mx" class="btn-contratar-link" style="font-size:1.1rem; padding:1rem 2.5rem; background:#1565c0; color:#fff;">Soporte técnico</a>
        </div>
      </div>
    </div>
  </div>
</div>
