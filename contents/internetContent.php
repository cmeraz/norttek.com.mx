<div class="internet-app">
  <header class="app-header">
    <img src="assets/img/logo-norttek.png" alt="Norttek Logo" class="logo" />
    <h1>Internet Hogar</h1>
    <p class="subtitle">Conéctate fácil, rápido y seguro</p>
  </header>
  <main class="app-main">
    <section class="plans">
      <h2>Elige tu velocidad</h2>
      <div class="plan-cards">
        <div class="plan-card" data-megas="10">
          <h3>10 Megas</h3>
          <p class="price">$299/mes</p>
          <button class="btn-contratar" data-plan="10">Contratar</button>
        </div>
        <div class="plan-card" data-megas="20">
          <h3>20 Megas</h3>
          <p class="price">$399/mes</p>
          <button class="btn-contratar" data-plan="20">Contratar</button>
        </div>
        <div class="plan-card" data-megas="30">
          <h3>30 Megas</h3>
          <p class="price">$499/mes</p>
          <button class="btn-contratar" data-plan="30">Contratar</button>
        </div>
      </div>
    </section>
    <section class="extras">
      <h2>Opciones adicionales</h2>
      <ul class="extras-list">
        <li><span class="icon">📶</span> WiFi Mesh para cobertura total</li>
        <li><span class="icon">🔒</span> Seguridad avanzada (Firewall y control parental)</li>
        <li><span class="icon">📞</span> Soporte técnico 24/7</li>
        <li><span class="icon">💳</span> Pago en línea y domiciliación</li>
      </ul>
    </section>
    <section class="contacto">
      <h2>¿Listo para conectarte?</h2>
      <form id="form-internet" class="form-internet">
        <input type="text" name="nombre" placeholder="Tu nombre" required />
        <input type="tel" name="telefono" placeholder="Teléfono" required />
        <input type="email" name="email" placeholder="Correo electrónico" required />
        <select name="plan" required>
          <option value="">Selecciona tu plan</option>
          <option value="10">10 Megas</option>
          <option value="20">20 Megas</option>
          <option value="30">30 Megas</option>
        </select>
        <button type="submit" class="btn-enviar">Solicitar información</button>
      </form>
      <div id="form-msg"></div>
    </section>
  </main>
  <footer class="app-footer">
    <p>&copy; 2025 Norttek Solutions</p>
  </footer>
</div>
