<!-- Idioma Español -->
<div class="internet-app">
  <!-- Modal de login de cliente (refactorizado a modal común) -->
  <div id="cliente-login-modal" class="nt-modal-backdrop" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="cliente-login-title">
    <div class="nt-modal" role="document">
      <button type="button" class="nt-modal-close" id="cliente-login-close" data-nt-modal-close aria-label="Cerrar">&times;</button>
      <h3 id="cliente-login-title" class="nt-modal-title" style="display:flex; align-items:center; gap:.5rem;">
        <i class="fa-solid fa-user-shield" aria-hidden="true"></i>
        Acceso Cliente
      </h3>
      <p class="nt-modal-sub">Ingresa tu número de teléfono registrado para mostrar tus credenciales.</p>
      <form id="cliente-login-form" class="modal-body" autocomplete="off">
        <label for="cliente-login-phone" class="modal-label">Teléfono (10 dígitos)</label>
        <input id="cliente-login-phone" name="telefono" class="modal-input" type="tel" inputmode="numeric" pattern="[0-9]{10}" minlength="10" maxlength="14" required placeholder="Ej. 6251234567" aria-describedby="cliente-login-error" />
        <div id="cliente-login-error" role="alert" aria-live="assertive" style="display:none; background:#fff5f5; border:1px solid #f8caca; color:#b54848; padding:.6rem .75rem; border-radius:10px; font-size:.8rem; font-weight:600; line-height:1.4;">
          Teléfono no encontrado. Verifica que sea el número con el que te registraste.
        </div>
        <div class="nt-modal-actions modal-actions">
          <button type="submit" class="btn-primario btn btn-primary" id="cliente-login-submit">Continuar</button>
          <button type="button" class="btn-secundario btn btn-secondary" id="cliente-login-cancel" data-nt-modal-close>Cancelar</button>
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
    <section id="contacta-un-asesor" class="premium-box scroll-anim">
      <?= nt_heading('¿Dudas? Contacta a un asesor', 'fa-solid fa-comments', 'md', null, ['animate'=>true,'delay'=>'sm','class'=>'section-title']); ?>
      <p class="section-subtitle">
        Nuestros asesores están disponibles para resolver cualquier pregunta sobre planes, instalación, costos o cobertura en tu zona.
      </p>
      <div class="asesor-form-container">
        <div class="asesor-input-group">
          <div class="input-wrapper">
            <i class="fa-solid fa-user input-icon" aria-hidden="true"></i>
            <input id="asesor-nombre" class="asesor-input-modern" type="text" placeholder="Tu nombre completo" aria-label="Tu nombre completo" />
          </div>
          <button type="button" class="btn-asesor-modern">
            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
            <span>Contactar Asesor</span>
          </button>
        </div>
        <div class="asesor-features">
          <div class="asesor-feature">
            <i class="fa-solid fa-clock" aria-hidden="true"></i>
            <span>Respuesta inmediata</span>
          </div>
          <div class="asesor-feature">
            <i class="fa-solid fa-shield-check" aria-hidden="true"></i>
            <span>Información confiable</span>
          </div>
          <div class="asesor-feature">
            <i class="fa-solid fa-phone" aria-hidden="true"></i>
            <span>Soporte personalizado</span>
          </div>
        </div>
      </div>
      <div id="asesor-msg" class="asesor-msg-modern" aria-live="polite"></div>
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
        <section id="como-funciona" class="proceso-instalacion premium-box scroll-anim">
          <?= nt_heading('¿Cómo funciona nuestro servicio de internet?', 'fa-solid fa-list-check', 'md', null, ['animate'=>true,'delay'=>'sm','class'=>'section-title']); ?>
          <p class="section-subtitle">
            Brindamos conectividad inalámbrica estable mediante un enlace terrestre (no satelital) usando una antena exterior orientada a nuestra red local. Esto reduce latencia frente a soluciones satelitales y permite un servicio más consistente para videollamadas, streaming, gaming y trabajo remoto.
          </p>
          <div class="inst-flow" style="margin:1.2rem 0 1.4rem; display:grid; gap:1rem;">
            <div class="flow-steps" style="display:grid; gap:.9rem; grid-template-columns:repeat(auto-fit,minmax(220px,1fr));">
              <article class="flow-step" style="background:#f8fbff; border:1px solid #e2edf9; border-radius:14px; padding:.9rem .95rem; display:flex; flex-direction:column; gap:.4rem;">
                <h3 style="margin:0; font-size:.9rem; font-weight:800; display:flex; align-items:center; gap:.45rem; color:#0f172a;"><i class="fa-solid fa-location-crosshairs" style="color:#4f8cff;"></i> 1. Cobertura</h3>
                <p style="margin:0; font-size:.72rem; line-height:1.35; color:#4a5b6d;">Validamos que tu domicilio tenga línea de vista o señal aceptable hacia nuestros puntos de distribución.</p>
              </article>
              <article class="flow-step" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:.9rem .95rem; display:flex; flex-direction:column; gap:.4rem;">
                <h3 style="margin:0; font-size:.9rem; font-weight:800; display:flex; align-items:center; gap:.45rem; color:#0f172a;"><i class="fa-solid fa-wifi" style="color:#4f8cff;"></i> 2. Selección de Plan</h3>
                <p style="margin:0; font-size:.72rem; line-height:1.35; color:#4a5b6d;">Eliges la velocidad que se adapta a tus dispositivos y hábitos de uso (más abajo verás las opciones).</p>
              </article>
              <article class="flow-step" style="background:#f8fbff; border:1px solid #e2edf9; border-radius:14px; padding:.9rem .95rem; display:flex; flex-direction:column; gap:.4rem;">
                <h3 style="margin:0; font-size:.9rem; font-weight:800; display:flex; align-items:center; gap:.45rem; color:#0f172a;"><i class="fa-solid fa-clipboard-check" style="color:#4f8cff;"></i> 3. Programación</h3>
                <p style="margin:0; font-size:.72rem; line-height:1.35; color:#4a5b6d;">Agendamos fecha y hora; confirmas con tu pago inicial (ver costos al elegir un plan).</p>
              </article>
              <article class="flow-step" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:.9rem .95rem; display:flex; flex-direction:column; gap:.4rem;">
                <h3 style="margin:0; font-size:.9rem; font-weight:800; display:flex; align-items:center; gap:.45rem; color:#0f172a;"><i class="fa-solid fa-screwdriver-wrench" style="color:#4f8cff;"></i> 4. Instalación</h3>
                <p style="margin:0; font-size:.72rem; line-height:1.35; color:#4a5b6d;">Montaje / alineación de antena (si aplica), cableado limpio y configuración de tu router WiFi.</p>
              </article>
              <article class="flow-step" style="background:#f8fbff; border:1px solid #e2edf9; border-radius:14px; padding:.9rem .95rem; display:flex; flex-direction:column; gap:.4rem;">
                <h3 style="margin:0; font-size:.9rem; font-weight:800; display:flex; align-items:center; gap:.45rem; color:#0f172a;"><i class="fa-solid fa-bolt" style="color:#4f8cff;"></i> 5. Activación</h3>
                <p style="margin:0; font-size:.72rem; line-height:1.35; color:#4a5b6d;">Probamos estabilidad, velocidad y latencia. Te mostramos cómo reiniciar, consultar pagos y soporte.</p>
              </article>
              <article class="flow-step" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:.9rem .95rem; display:flex; flex-direction:column; gap:.4rem;">
                <h3 style="margin:0; font-size:.9rem; font-weight:800; display:flex; align-items:center; gap:.45rem; color:#0f172a;"><i class="fa-solid fa-headset" style="color:#4f8cff;"></i> 6. Soporte & Gestión</h3>
                <p style="margin:0; font-size:.72rem; line-height:1.35; color:#4a5b6d;">Acceso a panel / app para ver saldo, recibir avisos y contactar soporte técnico.</p>
              </article>
            </div>
          </div>

          <?= nt_heading('Costos base de instalación', 'fa-solid fa-coins', 'sm', null, ['animate'=>true,'delay'=>'md','class'=>'section-title']); ?>
          <p class="section-subtitle">El monto inicial depende de si ya cuentas con antena propia utilizable o necesitas una nueva. Los detalles dinámicos (calendario de pagos) aparecerán cuando selecciones un plan.</p>
          <div class="costos-grid" style="display:grid; gap:1rem; margin:1rem 0 1.4rem; grid-template-columns:repeat(auto-fit,minmax(240px,1fr));">
            <div class="costo-box" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:1rem .95rem; display:flex; flex-direction:column; gap:.5rem;">
              <h3 style="margin:0; font-size:.85rem; font-weight:800; letter-spacing:.5px; color:#0f172a; display:flex; align-items:center; gap:.4rem;"><i class="fa-solid fa-circle-check" style="color:#4f8cff;"></i> Ya tengo antena</h3>
              <ul style="margin:0; padding-left:1rem; font-size:.7rem; line-height:1.35; color:#4a5b6d; display:flex; flex-direction:column; gap:.3rem;">
                <li>Pago único: <strong>$500</strong></li>
                <li>Incluye reprogramación, alineación y ajuste WiFi</li>
                <li>Mes 2 en adelante: solo mensualidad del plan</li>
              </ul>
            </div>
            <div class="costo-box" style="background:#f8fbff; border:1px solid #e2edf9; border-radius:14px; padding:1rem .95rem; display:flex; flex-direction:column; gap:.5rem;">
              <h3 style="margin:0; font-size:.85rem; font-weight:800; letter-spacing:.5px; color:#0f172a; display:flex; align-items:center; gap:.4rem;"><i class="fa-solid fa-satellite-dish" style="color:#4f8cff;"></i> Necesito antena</h3>
              <ul style="margin:0; padding-left:1rem; font-size:.7rem; line-height:1.35; color:#4a5b6d; display:flex; flex-direction:column; gap:.3rem;">
                <li>Instalación: <strong>$850</strong></li>
                <li>Antena nueva: <strong>$1,800</strong> (contado o diferido 3 meses)</li>
                <li>Opción diferida: 1er mes pagas $850; meses 2–4 cuota antena + servicio</li>
              </ul>
            </div>
            <div class="costo-box" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:1rem .95rem; display:flex; flex-direction:column; gap:.55rem;">
              <h3 style="margin:0; font-size:.85rem; font-weight:800; letter-spacing:.5px; color:#0f172a; display:flex; align-items:center; gap:.4rem;"><i class="fa-solid fa-wallet" style="color:#4f8cff;"></i> Formas de pago</h3>
              <ul style="margin:0; padding-left:1rem; font-size:.7rem; line-height:1.35; color:#4a5b6d; display:flex; flex-direction:column; gap:.3rem;">
                <li>Transferencia (BBVA)</li>
                <li>Mercado Pago / Tarjeta</li>
                <li>Link de pago recurrente</li>
                <li>Comprobante por WhatsApp</li>
              </ul>
            </div>
          </div>
          <div class="callout-aviso" style="background:linear-gradient(135deg,rgba(79,140,255,.08),rgba(79,140,255,.02)); border:1px solid #d5e5f9; padding:1rem .95rem; border-radius:14px; display:flex; gap:.9rem; align-items:flex-start; margin-bottom:1.4rem;">
            <i class="fa-solid fa-circle-info" style="color:#4f8cff; font-size:1.1rem; line-height:1;"></i>
            <div style="font-size:.72rem; line-height:1.5; color:#425366;">
              Una vez confirmado tu pago inicial, agendamos la visita. La instalación típica toma entre <strong>60 y 90 minutos</strong> (dependiendo de ruta de cableado). Te mostramos pruebas de desempeño antes de cerrar el servicio.
            </div>
          </div>

          <!-- Guía para obtener costo de instalación -->
          <section id="costos-instalacion-guia" class="instalacion-costo-guia" style="margin-top:1.2rem;">
            <?= nt_heading('¿Cómo ver tu costo de instalación?', 'fa-solid fa-calculator', 'sm', null, ['class'=>'section-title','animate'=>true,'delay'=>'xl']); ?>
            <p class="section-subtitle" style="margin-top:.35rem;">Genera tu calendario de pagos y montos paso a paso:</p>
            <div class="nt-steps-grid" style="margin:.9rem 0 0; display:grid; gap:.85rem; grid-template-columns:repeat(auto-fit,minmax(210px,1fr));">
              <div class="nt-step-item scroll-anim" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:.75rem .8rem; display:flex; gap:.65rem; align-items:flex-start; position:relative; overflow:hidden;">
                <div style="width:34px; height:34px; flex:0 0 34px; border-radius:10px; background:linear-gradient(135deg,#eff6ff,#dbeafe); display:flex; align-items:center; justify-content:center; font-size:1rem; color:#2563eb; font-weight:700;">
                  <i class="fa-solid fa-hand-pointer" aria-hidden="true"></i>
                </div>
                <div style="font-size:.7rem; line-height:1.4; color:#455468; font-weight:500;">
                  <strong style="display:block; font-size:.72rem; letter-spacing:.4px; color:#0f172a;">1. Elige un plan</strong>
                  Usa “Elegir este plan” en la tarjeta que mejor se adapte a tu uso.
                </div>
              </div>
              <div class="nt-step-item scroll-anim" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:.75rem .8rem; display:flex; gap:.65rem; align-items:flex-start; position:relative; overflow:hidden;">
                <div style="width:34px; height:34px; flex:0 0 34px; border-radius:10px; background:linear-gradient(135deg,#f0f9ff,#e0f2fe); display:flex; align-items:center; justify-content:center; font-size:1rem; color:#0284c7; font-weight:700;">
                  <i class="fa-solid fa-eye" aria-hidden="true"></i>
                </div>
                <div style="font-size:.7rem; line-height:1.4; color:#455468; font-weight:500;">
                  <strong style="display:block; font-size:.72rem; letter-spacing:.4px; color:#0f172a;">2. Sección de costos</strong>
                  Se mostrará (o enfocará) automáticamente <em>Costos de Instalación</em>.
                </div>
              </div>
              <div class="nt-step-item scroll-anim" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:.75rem .8rem; display:flex; gap:.65rem; align-items:flex-start; position:relative; overflow:hidden;">
                <div style="width:34px; height:34px; flex:0 0 34px; border-radius:10px; background:linear-gradient(135deg,#f8fafc,#eef2f7); display:flex; align-items:center; justify-content:center; font-size:1rem; color:#475569; font-weight:700;">
                  <i class="fa-solid fa-diagram-project" aria-hidden="true"></i>
                </div>
                <div style="font-size:.7rem; line-height:1.4; color:#455468; font-weight:500;">
                  <strong style="display:block; font-size:.72rem; letter-spacing:.4px; color:#0f172a;">3. Escenario</strong>
                  Selecciona: <em>Ya tengo antena</em> o <em>Necesito antena</em>.
                </div>
              </div>
              <div class="nt-step-item scroll-anim" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:.75rem .8rem; display:flex; gap:.65rem; align-items:flex-start; position:relative; overflow:hidden;">
                <div style="width:34px; height:34px; flex:0 0 34px; border-radius:10px; background:linear-gradient(135deg,#fef9c3,#fde68a); display:flex; align-items:center; justify-content:center; font-size:1rem; color:#b45309; font-weight:700;">
                  <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
                </div>
                <div style="font-size:.7rem; line-height:1.4; color:#455468; font-weight:500;">
                  <strong style="display:block; font-size:.72rem; letter-spacing:.4px; color:#0f172a;">4. Forma de pago</strong>
                  Si necesitas antena: elegir <strong>Contado</strong> o <strong>Diferido</strong> (3 meses).
                </div>
              </div>
              <div class="nt-step-item scroll-anim" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:.75rem .8rem; display:flex; gap:.65rem; align-items:flex-start; position:relative; overflow:hidden;">
                <div style="width:34px; height:34px; flex:0 0 34px; border-radius:10px; background:linear-gradient(135deg,#e0f2fe,#bae6fd); display:flex; align-items:center; justify-content:center; font-size:1rem; color:#0369a1; font-weight:700;">
                  <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                </div>
                <div style="font-size:.7rem; line-height:1.4; color:#455468; font-weight:500;">
                  <strong style="display:block; font-size:.72rem; letter-spacing:.4px; color:#0f172a;">5. Calendario</strong>
                  Revisa Mes 1 a Mes 4 y el resumen dinámico generado.
                </div>
              </div>
              <div class="nt-step-item scroll-anim" style="background:#ffffff; border:1px solid #e2edf9; border-radius:14px; padding:.75rem .8rem; display:flex; gap:.65rem; align-items:flex-start; position:relative; overflow:hidden;">
                <div style="width:34px; height:34px; flex:0 0 34px; border-radius:10px; background:linear-gradient(135deg,#ecfdf5,#d1fae5); display:flex; align-items:center; justify-content:center; font-size:1rem; color:#047857; font-weight:700;">
                  <i class="fa-solid fa-share-nodes" aria-hidden="true"></i>
                </div>
                <div style="font-size:.7rem; line-height:1.4; color:#455468; font-weight:500;">
                  <strong style="display:block; font-size:.72rem; letter-spacing:.4px; color:#0f172a;">6. Continúa</strong>
                  Guarda / comparte montos y solicita tu instalación o asesoría.
                </div>
              </div>
            </div>
            <div style="margin-top:1rem; display:grid; gap:.9rem; grid-template-columns:repeat(auto-fit,minmax(250px,1fr));">
              <div style="background:#ffffff; border:1px solid #e2edf9; border-radius:12px; padding:.75rem .8rem; font-size:.65rem; line-height:1.45; color:#465362;">
                <strong>Contado vs Diferido:</strong> Contado pagas más el Mes 1 y desde el Mes 2 solo servicio. Diferido distribuye la antena (600 x 3) y reduce el desembolso inicial.
              </div>
              <div style="background:#f8fbff; border:1px solid #e2edf9; border-radius:12px; padding:.75rem .8rem; font-size:.65rem; line-height:1.45; color:#465362;">
                <strong>¿Cuál me conviene?</strong> Si puedes cubrirlo, contado simplifica. Si prefieres flujo ligero, usa diferido: tu servicio inicia igual sin espera.
              </div>
              <div style="background:#ffffff; border:1px solid #e2edf9; border-radius:12px; padding:.75rem .8rem; font-size:.65rem; line-height:1.45; color:#465362;">
                <strong>Transparencia:</strong> No hay penalización por diferir la antena: solo se divide el costo real en 3 meses.
              </div>
            </div>
            <p style="margin-top:1rem; font-size:.7rem; line-height:1.5; color:#4a5568;">¿Algo no cuadra? Escríbenos directo en <a href="#contacta-un-asesor" class="link-asesor">Contacta a un asesor</a> y revisamos tu caso.</p>
          </section>
        </section>

        <!-- Planes (segundo) -->
        <section class="plans scroll-anim" aria-label="Planes de Internet">
          <?= nt_heading('Elige tu velocidad', 'fa-solid fa-wifi', 'md', null, ['animate'=>true,'delay'=>'sm','class'=>'section-title']); ?>
          <p class="section-subtitle">
            Selecciona un plan para calcular automáticamente tus costos de instalación.
          </p>
          <div class="plan-cards int-plans" role="radiogroup" aria-label="Selecciona un plan de internet">
            <!-- Plan Starter -->
            <article class="int-plan-card animate-card nt-soft-seq selectable" role="radio" tabindex="0" aria-checked="false" data-nt-anim data-megas="10" data-plan-label="Starter 10 Mbps" data-plan-price="299">
              <header class="int-plan-header">
                <div class="int-plan-icon esencial" data-nt-icon-drift><i class="fa-solid fa-seedling" aria-hidden="true"></i></div>
                <h3 class="int-plan-title">Starter 10 Mbps</h3>
                <p class="int-plan-tagline">Ideal para comenzar</p>
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
              <div class="plan-select-indicator" aria-hidden="true">Haz clic para seleccionar</div>
            </article>
            <!-- Plan Plus -->
            <article class="int-plan-card destacado animate-card nt-soft-seq selectable" role="radio" tabindex="0" aria-checked="false" data-nt-anim data-megas="20" data-plan-label="Plus 20 Mbps" data-plan-price="399">
              <div class="int-plan-ribbon" aria-label="Plan Recomendado"><span>Recomendado</span></div>
              <header class="int-plan-header">
                <div class="int-plan-icon avanzado" data-nt-icon-drift><i class="fa-solid fa-layer-group" aria-hidden="true"></i></div>
                <h3 class="int-plan-title">Plus 20 Mbps</h3>
                <p class="int-plan-tagline">Más dispositivos en casa</p>
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
              <div class="plan-select-indicator" aria-hidden="true">Haz clic para seleccionar</div>
            </article>
            <!-- Plan Ultra -->
            <article class="int-plan-card animate-card nt-soft-seq selectable" role="radio" tabindex="0" aria-checked="false" data-nt-anim data-megas="30" data-plan-label="Ultra 30 Mbps" data-plan-price="499">
              <header class="int-plan-header">
                <div class="int-plan-icon superior" data-nt-icon-drift><i class="fa-solid fa-rocket" aria-hidden="true"></i></div>
                <h3 class="int-plan-title">Ultra 30 Mbps</h3>
                <p class="int-plan-tagline">Streaming y gaming fluido</p>
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
              <div class="plan-select-indicator" aria-hidden="true">Haz clic para seleccionar</div>
            </article>
          </div>
          </section>

          <!-- Costos de Instalación (refactor) -->
  <section class="instalacion-costos premium-box scroll-anim inst-costs-hidden" id="instalacion-costos" data-nt-anim>
          <div class="inst-header">
            <?= nt_heading('Costos de Instalación', 'fa-solid fa-screwdriver-wrench', 'md', null, ['animate'=>true,'delay'=>'sm','class'=>'section-title','style'=>'margin:0;']); ?>
            <p class="intro">
              Aquí verás el costo inicial según si ya cuentas con antena o necesitas una nueva. También puedes elegir pagar la antena de contado o diferirla a 3 meses.
            </p>
            
            <!-- Botones de selección de escenario -->
            <div class="escenario-selector" style="display: flex; gap: 1rem; justify-content: center; margin: 2rem 0;">
              <button id="btn-ya-tengo" class="btn-escenario" data-escenario="propio" style="background: #f8fafc; border: 2px solid #e2e8f0; color: #4a5568; padding: 1rem 1.5rem; border-radius: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s ease;">
                <i class="fa-solid fa-circle-check" style="margin-right: 0.5rem; color: #4f8cff;"></i>
                Ya tengo antena
              </button>
              <button id="btn-necesito" class="btn-escenario" data-escenario="sinequipo" style="background: #f8fafc; border: 2px solid #e2e8f0; color: #4a5568; padding: 1rem 1.5rem; border-radius: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s ease;">
                <i class="fa-solid fa-satellite-dish" style="margin-right: 0.5rem; color: #4f8cff;"></i>
                Necesito antena
              </button>
            </div>
          </div>
          <div class="escenarios-grid">
            <article class="escenario-card" id="esc-propio" data-esc="propio" style="display: none;">
              <header><h3><i class="fa-solid fa-circle-check"></i> Ya tengo antena</h3></header>
              <ul class="incluye">
                <li>Alineación de antena</li>
                <li>Reprogramación de equipo</li>
                <li>Configuración del módem WiFi</li>
              </ul>
              <div class="monto-principal">
                <div class="valor" data-monto="propio-total">$500 MXN</div>
                <div class="detalle">Anticipo único. Cubre todo.</div>
              </div>
              <div class="resumen-mini" data-role="propio-resumen">
                <strong>Pago inicial:</strong> $500 MXN<br>
                <strong>Pagos futuros:</strong> servicio (depende del plan).
              </div>
            </article>
            <article class="escenario-card" id="esc-sinequipo" data-esc="sinequipo" style="display: none;">
              <header><h3><i class="fa-solid fa-satellite-dish"></i> Necesito antena</h3></header>
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
                <p>CLABE: <code>722969040367244111</code><br>Ref: <code>INSTALACION</code></p>t
              </div>
              <div class="pago-box">
                <h5><i class="fa-solid fa-link"></i> Pago con Tarjeta</h5>
                <p>
                  <a id="btn-pagar-tarjeta-1" href="https://biolibre.mx/norttek" target="_blank" rel="noopener noreferrer" class="linkpay" style="color: #0ea5e9; font-weight: 600;">
                    <i class="fa-solid fa-external-link-alt"></i> Pagar con Tarjeta MercadoPago
                  </a><br>
                  <small style="color: #6b7280; font-size: 0.8rem;">Pagos seguros con tarjeta de crédito/débito</small>
                </p>
              </div>
            </div>
          </div>
          <div class="resumen-final">
            <h4><i class="fa-solid fa-calculator"></i> Resumen Dinámico</h4>
            <div id="inst-resumen-linea" class="res-line">Selecciona un escenario para ver el detalle de pagos.</div>
            <div class="nota-mini">La mensualidad mostrada se basa en el plan que selecciones arriba.</div>
          </div>
          <!-- CTA principal para avanzar con la contratación (reintroducido tras refactor) -->
          <div class="contrata-ahora-wrap" style="margin-top:1.4rem;">
            <a id="contratar" href="#" role="button" class="contrata-ahora-btn cta-install-anim" aria-label="Solicitar instalación por WhatsApp">
              <i class="fa-solid fa-wifi" aria-hidden="true"></i>
              <span>Solicitar Instalación</span>
            </a>
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
          <p>Solo tienes que ingresar a la app con tus credenciales:<br>
          <strong>Usuario:</strong> <code id="app-auth-usuario" style="font-weight:800; font-size:.95rem; color:#1f2937; background:#f3f4f6; padding:2px 6px; border-radius:4px;"></code><br>
          <strong>Contraseña:</strong> <code id="app-auth-password" style="font-weight:800; font-size:.95rem; color:#1f2937; background:#f3f4f6; padding:2px 6px; border-radius:4px;"></code></p>
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

      <!-- Pago con Tarjeta MercadoPago -->
      <div style="background:#f0f9ff; border:1px solid #0ea5e9; border-radius:10px; padding:.65rem .75rem; display:flex; flex-direction:column; gap:.45rem;">
        <strong style="font-size:.72rem; letter-spacing:.5px; text-transform:uppercase; color:#0369a1; display:flex; align-items:center; gap:.4rem;">
          <i class="fa-solid fa-credit-card" aria-hidden="true" style="color:#0ea5e9;"></i> 
          Pago con Tarjeta Crédito/Débito
        </strong>
        <div style="display:flex; flex-direction:column; gap:.3rem;">
          <p style="font-size:.65rem; color:#475569; margin:0; line-height:1.4;">
            Realiza pagos seguros con tu tarjeta de crédito o débito a través de MercadoPago
          </p>
          <a id="btn-pagar-tarjeta-2" href="https://biolibre.mx/norttek" target="_blank" rel="noopener noreferrer" 
             style="display:inline-flex; align-items:center; gap:.4rem; background:#0ea5e9; color:white; padding:.5rem .75rem; border-radius:6px; text-decoration:none; font-size:.68rem; font-weight:600; letter-spacing:.3px; text-transform:uppercase; transition:all 0.2s ease;">
            <i class="fa-solid fa-external-link-alt"></i>
            Pagar con Tarjeta
          </a>
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

<!-- Modal Unificado para Datos de Usuario (Estilo Acceso Cliente) -->
<div id="modal-datos-usuario" class="nt-modal-backdrop" style="display: none;" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modal-datos-title">
  <div class="nt-modal" role="document">
    <button type="button" class="nt-modal-close" data-nt-modal-close aria-label="Cerrar">&times;</button>
    <h3 id="modal-datos-title" class="nt-modal-title" style="display:flex; align-items:center; gap:.5rem;">
      <i id="modal-datos-icon" class="fa-solid fa-user" aria-hidden="true"></i>
      <span id="modal-datos-title-text">Tu Nombre</span>
    </h3>
    <p id="modal-datos-sub" class="nt-modal-sub">Ingresa tu nombre para personalizar el mensaje de WhatsApp y agilizar tu solicitud.</p>
    <form id="modal-datos-form" class="modal-body" autocomplete="off">
      <!-- Campo de nombre (solo para instalación) -->
      <div id="campo-nombre" class="form-field">
        <label for="input-nombre" class="modal-label">Nombre completo</label>
        <input id="input-nombre" name="nombre" type="text" class="modal-input" 
               placeholder="Ej. Juan Pérez" maxlength="60" required />
      </div>
      
      <!-- Campo de teléfono (solo para cliente) -->
      <div id="campo-telefono" class="form-field" style="display: none;">
        <label for="input-telefono" class="modal-label">Teléfono (10 dígitos)</label>
        <input id="input-telefono" name="telefono" class="modal-input" type="tel" inputmode="numeric" 
               pattern="[0-9]{10}" minlength="10" maxlength="14" required 
               placeholder="Ej. 6251234567" aria-describedby="modal-datos-error" />
      </div>
      
      <div id="modal-datos-error" role="alert" aria-live="assertive" style="display:none; background:#fff5f5; border:1px solid #f8caca; color:#b54848; padding:.6rem .75rem; border-radius:10px; font-size:.8rem; font-weight:600; line-height:1.4;">
        Error en la validación
      </div>
      
      <div class="nt-modal-actions modal-actions">
        <button type="submit" id="modal-datos-submit" class="btn-primario btn btn-primary">Continuar</button>
        <button type="button" class="btn-secundario btn btn-secondary" data-nt-modal-close>Cancelar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal de Aviso: Pago con Tarjeta -->
<div id="modal-aviso-pago" class="nt-modal-backdrop" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modal-aviso-pago-title" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: none; justify-content: center; align-items: center; z-index: 9999;">
  <div class="nt-modal" role="document" style="max-width: 500px; width: 90%; max-height: 90vh; overflow-y: auto; background: white; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); position: relative;">
    <button type="button" class="nt-modal-close" data-nt-modal-close aria-label="Cerrar" style="position: absolute; top: 16px; right: 16px; background: none; border: none; font-size: 24px; cursor: pointer; color: #6b7280; z-index: 10;">&times;</button>
    <div class="modal-body text-center" style="padding: 2rem;">
      <div class="mb-4">
        <i class="fa-solid fa-credit-card" style="font-size: 3rem; color: #0ea5e9; margin-bottom: 1rem;"></i>
        <h3 id="modal-aviso-pago-title" class="nt-modal-title" style="color: #1e293b; margin-bottom: 1rem;">
          ¡Importante! Después de tu Pago
        </h3>
      </div>
      <div class="alert-content" style="background: #f0f9ff; border: 1px solid #0ea5e9; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; text-align: left;">
        <p style="margin: 0 0 1rem 0; font-weight: 600; color: #0c4a6e;">
          <i class="fa-solid fa-info-circle" style="color: #0ea5e9; margin-right: 0.5rem;"></i>
          No olvides reportar tu pago:
        </p>
        <ul style="margin: 0; padding-left: 1.2rem; color: #374151; line-height: 1.6;">
          <li><strong>Opción 1:</strong> Reporta tu pago directamente en la aplicación web de clientes</li>
          <li><strong>Opción 2:</strong> Envía tu comprobante de pago por WhatsApp para que sea aplicado a tu cuenta</li>
        </ul>
        <div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 0.75rem; margin-top: 1rem; border-radius: 0 8px 8px 0;">
          <p style="margin: 0; font-size: 0.9rem; color: #92400e;">
            <i class="fa-solid fa-exclamation-triangle" style="color: #f59e0b; margin-right: 0.5rem;"></i>
            <strong>Recuerda:</strong> Tu pago se reflejará una vez que sea reportado y validado.
          </p>
        </div>
      </div>
      <div class="modal-actions" style="display: flex; gap: 0.75rem; justify-content: center;">
        <button type="button" class="btn-primario" id="btn-entendido-pago" data-nt-modal-close style="min-width: 120px;">
          <i class="fa-solid fa-check"></i>
          Entendido
        </button>
        <a href="https://biolibre.mx/norttek" target="_blank" rel="noopener noreferrer" class="btn-secundario" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; min-width: 120px; justify-content: center;">
          <i class="fa-solid fa-external-link-alt"></i>
          Ir a Pagar
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Aviso: Después de WhatsApp -->
<div id="modal-aviso-whatsapp" class="nt-modal-backdrop" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modal-aviso-whatsapp-title" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); display: none; justify-content: center; align-items: center; z-index: 9999;">
  <div class="nt-modal" role="document" style="max-width: 520px; width: 90%; max-height: 85vh; overflow-y: auto; background: white; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.25); position: relative;">
    <button type="button" class="nt-modal-close" data-nt-modal-close aria-label="Cerrar" style="position: absolute; top: 12px; right: 12px; background: #f3f4f6; border: none; width: 28px; height: 28px; border-radius: 50%; font-size: 16px; cursor: pointer; color: #6b7280; display: flex; align-items: center; justify-content: center; transition: all 0.2s;">&times;</button>
    
    <!-- Contenido de confirmación compactado -->
    <div class="modal-body" style="padding: 1.5rem 1.5rem 1.25rem;">
      <!-- Encabezado compacto -->
      <div style="text-align: center; margin-bottom: 1rem;">
        <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #4f8cff 0%, #3b82f6 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.75rem;">
          <i class="fa-solid fa-check" style="font-size: 1.2rem; color: white;"></i>
        </div>
        <h3 id="modal-aviso-whatsapp-title" style="color: #1f2937; margin: 0; font-size: 1.25rem; font-weight: 700;">
          Confirmar Solicitud
        </h3>
        <p style="color: #6b7280; margin: 0.25rem 0 0; font-size: 0.85rem;">
          Revisa los detalles antes de enviar
        </p>
      </div>
      
      <!-- Datos en grid compacto -->
      <div style="display: grid; gap: 0.75rem; margin-bottom: 1rem;">
        <!-- Información Personal -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 0.75rem;">
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
            <i class="fa-solid fa-user" style="color: #4f8cff; font-size: 0.9rem;"></i>
            <span style="color: #374151; font-size: 0.85rem; font-weight: 600;">Cliente</span>
          </div>
          <span id="confirm-nombre" style="color: #1f2937; font-weight: 600; font-size: 0.9rem;">-</span>
        </div>

        <!-- Plan seleccionado -->
        <div style="background: #f0f9ff; border: 1px solid #bae6fd; border-radius: 8px; padding: 0.75rem;">
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
            <i class="fa-solid fa-wifi" style="color: #0ea5e9; font-size: 0.9rem;"></i>
            <span style="color: #374151; font-size: 0.85rem; font-weight: 600;">Plan</span>
          </div>
          <div style="display: grid; gap: 0.25rem;">
            <span id="confirm-plan" style="color: #1f2937; font-weight: 600; font-size: 0.9rem;">-</span>
            <span id="confirm-escenario" style="color: #6b7280; font-size: 0.8rem;">-</span>
          </div>
        </div>

        <!-- Costos -->
        <div style="background: #fefce8; border: 1px solid #fde047; border-radius: 8px; padding: 0.75rem;">
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
            <i class="fa-solid fa-calculator" style="color: #eab308; font-size: 0.9rem;"></i>
            <span style="color: #374151; font-size: 0.85rem; font-weight: 600;">Costos</span>
          </div>
          <div id="confirm-costos" style="display: grid; gap: 0.25rem; font-size: 0.8rem;">
            <!-- Se llenarán dinámicamente -->
          </div>
        </div>
      </div>

      <!-- Aviso compacto -->
      <div style="background: #eff6ff; border: 1px solid #dbeafe; border-radius: 6px; padding: 0.6rem; margin-bottom: 1rem; font-size: 0.8rem;">
        <div style="display: flex; align-items: start; gap: 0.5rem;">
          <i class="fa-solid fa-info-circle" style="color: #3b82f6; margin-top: 0.1rem; font-size: 0.9rem;"></i>
          <span style="color: #374151; line-height: 1.4;">
            <strong style="color: #1e40af;">Próximo paso:</strong> Tu solicitud se enviará por WhatsApp. Después deberás llenar el formulario de instalación.
          </span>
        </div>
      </div>
      
      <!-- Botones compactos -->
      <div style="display: flex; gap: 0.75rem; justify-content: center;">
        <button type="button" class="btn-secundario" data-nt-modal-close style="min-width: 100px; padding: 10px 16px; background: #f9fafb; color: #6b7280; border: 1px solid #d1d5db; border-radius: 6px; font-weight: 500; cursor: pointer; transition: all 0.2s; font-size: 0.85rem;">
          <i class="fa-solid fa-arrow-left" style="margin-right: 0.4rem;"></i>
          Volver
        </button>
        <button type="button" class="btn-primario" id="btn-enviar-whatsapp-final" style="min-width: 140px; padding: 10px 18px; background: #3b82f6; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; transition: all 0.2s; box-shadow: 0 2px 4px rgba(59, 130, 246, 0.2); font-size: 0.85rem;">
          <i class="fa-solid fa-paper-plane" style="margin-right: 0.4rem;"></i>
          Proceder con Solicitud
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Estilos adicionales para modales mejorados -->
<style>
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideIn {
  from { opacity: 0; transform: translateY(-10px) scale(0.98); }
  to { opacity: 1; transform: translateY(0) scale(1); }
}

.nt-modal-backdrop {
  animation: fadeIn 0.2s ease-out;
}

.nt-modal {
  animation: slideIn 0.3s ease-out;
}

/* Hover effects simples */
.nt-modal-close:hover {
  background: #e5e7eb !important;
  color: #374151 !important;
}

.btn-primario:hover {
  background: #16a34a !important;
  transform: translateY(-1px);
}

.btn-secundario:hover {
  background: #f3f4f6 !important;
  border-color: #9ca3af !important;
}

/* Responsive simple */
@media (max-width: 640px) {
  .nt-modal {
    margin: 1rem;
    max-width: calc(100% - 2rem);
  }
  
  .modal-body {
    padding: 1.5rem !important;
  }
  
  .modal-actions {
    flex-direction: column;
    gap: 0.75rem !important;
  }
  
  .modal-actions button {
    width: 100% !important;
    min-width: unset !important;
  }
}

/* Focus simple */
.btn-primario:focus,
.btn-secundario:focus,
.nt-modal-close:focus {
  outline: 2px solid #3b82f6;
  outline-offset: 2px;
}

/* Centrado perfecto */
.nt-modal-backdrop {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1rem;
}
</style>
