<?php
/**
 * yeastarContent.php
 * Contenido principal de la página de Yeastar Cloud PBX
 * 
 * Esta página presenta información sobre el sistema Yeastar Cloud PBX,
 * incluyendo características, planes, precios y casos de uso.
 * 
 * Estructura:
 * - Hero: Presentación principal del servicio
 * - Características: Principales ventajas de Yeastar
 * - Planes: Diferentes opciones de suscripción
 * - Casos de uso: Ejemplos de empresas
 * - FAQ: Preguntas frecuentes
 * - CTA: Llamados a la acción
 */
?>

<style>
    :root{--brand:#0f6fbf;--accent:#0fbf94;--bg:#f7f9fb;--card:#ffffff;--muted:#6b7280}
    *{box-sizing:border-box}
    body{font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; margin:0; color:#0f1724; background:var(--bg); line-height:1.5}
    .container{max-width:1100px;margin:0 auto;padding:24px}
    header{display:flex;align-items:center;justify-content:space-between;padding:18px 0}
    .logo{display:flex;gap:12px;align-items:center}
    .logo img{height:44px}
    nav a{margin-left:18px;color:var(--muted);text-decoration:none}
    /* Hero */
    .hero{display:flex;gap:32px;align-items:center;padding:32px 0}
    .hero-left{flex:1}
    .eyebrow{display:inline-block;padding:6px 10px;border-radius:999px;background:#e6f2ff;color:var(--brand);font-weight:600;font-size:13px}
    h1{font-size:32px;margin:16px 0}
    p.lead{color:var(--muted);margin-bottom:18px}
    .ctas{display:flex;gap:12px}
    .btn{padding:12px 16px;border-radius:10px;border:0;cursor:pointer;font-weight:600}
    .btn-primary{background:var(--brand);color:#fff}
    .btn-outline{background:transparent;border:1px solid #d1d5db;color:var(--brand)}
    .hero-right{flex:1;text-align:center}
    .mock{background:linear-gradient(180deg,#fff,#f3f7fb);border-radius:12px;padding:18px;box-shadow:0 6px 18px rgba(12,15,30,0.06);display:inline-block}
    .mock img{max-width:260px;height:auto}
    /* Cards */
    .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;margin:28px 0}
    .card{background:var(--card);padding:18px;border-radius:12px;box-shadow:0 6px 18px rgba(12,15,30,0.04)}
    .card h4{margin:0 0 8px}
    .muted{color:var(--muted);font-size:14px}
    /* Plans */
    .plans{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;margin:28px 0}
    .plan{background:linear-gradient(180deg,#fff,#fafcff);padding:18px;border-radius:12px;border:1px solid #eef2ff}
    .price{font-size:20px;font-weight:700;color:var(--brand)}
    /* Testimonials */
    .testimonials{display:flex;flex-direction:column;gap:12px;margin:28px 0}
    .testimonial{background:var(--card);padding:12px;border-radius:10px}
    footer{padding:28px 0;color:var(--muted)}
    /* FAQ */
    .faq{margin:24px 0}
    details{background:var(--card);padding:12px;border-radius:8px;margin-bottom:8px}
    /* Responsive small */
    @media (max-width:720px){h1{font-size:24px}.hero{flex-direction:column}.mock img{max-width:200px}}
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div class="logo">
        <img src="https://via.placeholder.com/160x44?text=Tu+Logo" alt="Logo">
        <div style="font-weight:700">Yeastar Cloud</div>
      </div>
      <nav>
        <a href="#features">Qué es</a>
        <a href="#plans">Planes</a>
        <a href="#faq">FAQ</a>
        <a href="#contact" class="btn btn-outline">Solicitar demo</a>
      </nav>
    </header>

    <!-- HERO -->
    <section class="hero">
      <div class="hero-left">
        <span class="eyebrow">Telefonía en la nube para empresas</span>
        <h1>Tu oficina en cualquier lugar. Telefonía profesional sin complicaciones.</h1>
        <p class="lead">Yeastar Cloud permite hacer y recibir llamadas desde celulares, computadoras o teléfonos de oficina, con integración CRM, apps móviles (Linkus) y administración sencilla desde el navegador.</p>
        <div class="ctas">
          <button class="btn btn-primary" onclick="openDemoForm()">Solicitar demo gratuita</button>
          <button class="btn btn-outline" onclick="scrollTo('#plans')">Ver planes</button>
        </div>

        <div style="margin-top:20px;color:var(--muted);font-size:14px">¿No sabes por dónde empezar? Agenda 15 min con un asesor y te ayudamos a elegir el plan.</div>
      </div>
      <div class="hero-right">
        <div class="mock">
          <img src="https://via.placeholder.com/320x220?text=Interfaz+Yeastar" alt="Interfaz Yeastar">
        </div>
      </div>
    </section>

    <!-- FEATURES -->
    <section id="features">
      <h2>¿Qué es Yeastar?</h2>
      <p class="muted">Un PBX en la nube que centraliza las comunicaciones de tu empresa sin necesidad de equipos físicos complejos.</p>

      <div class="grid">
        <div class="card">
          <h4>📞 Llamadas desde cualquier lugar</h4>
          <p class="muted">Atiende desde tu celular, laptop o teléfono de escritorio con la misma extensión.</p>
        </div>
        <div class="card">
          <h4>⚡ Instalación rápida</h4>
          <p class="muted">Configuración guiada: en minutos estará listo y funcionando.</p>
        </div>
        <div class="card">
          <h4>🔒 Seguridad y fiabilidad</h4>
          <p class="muted">Conexiones seguras y respaldo en la nube.</p>
        </div>
        <div class="card">
          <h4>🔗 Integraciones</h4>
          <p class="muted">CRM, WhatsApp, Linkus UC y más para mejorar productividad.</p>
        </div>
      </div>
    </section>

    <!-- HOW IT WORKS -->
    <section>
      <h2>Cómo funciona</h2>
      <p class="muted">Un flujo simple: tu número recibe la llamada → Yeastar gestiona la llamada en la nube → tú contestas desde donde prefieras.</p>
      <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:12px">
        <div class="card" style="flex:1;min-width:220px">
          <h4>1. Conserva tu número</h4>
          <p class="muted">Migramos tu número o te asignamos uno nuevo sin afectar a tus clientes.</p>
        </div>
        <div class="card" style="flex:1;min-width:220px">
          <h4>2. App Linkus</h4>
          <p class="muted">App móvil y de escritorio para que atiendas llamadas desde cualquier lugar.</p>
        </div>
        <div class="card" style="flex:1;min-width:220px">
          <h4>3. Administración web</h4>
          <p class="muted">Panel web para gestionar extensiones, colas, grabaciones y más.</p>
        </div>
      </div>
    </section>

    <!-- PLANS -->
    <section id="plans">
      <h2>Planes</h2>
      <p class="muted">Planes flexibles según tamaño de empresa. Precios de ejemplo.</p>
      <div class="plans">
        <div class="plan">
          <h3>Básico</h3>
          <div class="price">$XX / mes</div>
          <p class="muted">10 extensiones · 5 llamadas concurrentes · Soporte básico</p>
          <button class="btn btn-primary" style="margin-top:12px" onclick="openDemoForm('Básico')">Probar plan Básico</button>
        </div>
        <div class="plan">
          <h3>Profesional</h3>
          <div class="price">$XX / mes</div>
          <p class="muted">50 extensiones · 25 llamadas concurrentes · Integración CRM</p>
          <button class="btn btn-primary" style="margin-top:12px" onclick="openDemoForm('Profesional')">Probar plan Profesional</button>
        </div>
        <div class="plan">
          <h3>Empresarial</h3>
          <div class="price">$XX / mes</div>
          <p class="muted">100+ extensiones · Soporte prioritario · Personalización</p>
          <button class="btn btn-primary" style="margin-top:12px" onclick="openDemoForm('Empresarial')">Probar plan Empresarial</button>
        </div>
      </div>
    </section>

    <!-- TESTIMONIALS -->
    <section>
      <h2>Qué dicen nuestros clientes</h2>
      <div class="testimonials">
        <div class="testimonial">
          “Antes teníamos líneas saturadas. Con Yeastar ahora contestamos desde cualquier lugar y no perdemos llamadas.” — <strong>Empresa ABC</strong>
        </div>
        <div class="testimonial">
          "Migramos sin interrumpir operaciones y el soporte nos ayudó en todo el proceso." — <strong>Clínica XYZ</strong>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="faq">
      <h2>Preguntas frecuentes</h2>
      <details>
        <summary>¿Puedo conservar mi número actual?</summary>
        <p class="muted">Sí. Podemos portar tu número (dependiendo de políticas locales) o asignarte uno nuevo.</p>
      </details>
      <details>
        <summary>¿Qué pasa si se va la luz?</summary>
        <p class="muted">Si tu oficina pierde energía, las llamadas siguen en la nube y pueden dirigirse a celulares u otro número.</p>
      </details>
      <details>
        <summary>¿Necesito equipos especiales?</summary>
        <p class="muted">No necesariamente. Puedes usar la app Linkus, teléfonos IP compatibles o adaptadores.</p>
      </details>
    </section>

    <!-- CONTACT / DEMO FORM -->
    <section id="contact">
      <h2>Solicita una demo gratuita</h2>
      <p class="muted">Agenda 15 minutos con un asesor y te mostramos cómo funcionaría en tu negocio.</p>
      <form id="demoForm" onsubmit="sendDemoRequest(event)" style="display:grid;grid-template-columns:1fr 1fr;gap:12px;max-width:720px">
        <input type="text" id="name" placeholder="Nombre" required style="padding:12px;border-radius:8px;border:1px solid #e6eef8">
        <input type="tel" id="phone" placeholder="Teléfono" required style="padding:12px;border-radius:8px;border:1px solid #e6eef8">
        <input type="email" id="email" placeholder="Correo electrónico" required style="padding:12px;border-radius:8px;border:1px solid #e6eef8">
        <select id="planSelect" style="padding:12px;border-radius:8px;border:1px solid #e6eef8">
          <option value="">Interés en plan</option>
          <option>Básico</option>
          <option>Profesional</option>
          <option>Empresarial</option>
        </select>
        <textarea id="message" placeholder="Breve descripción de tu negocio / necesidades" style="grid-column:1/3;padding:12px;border-radius:8px;border:1px solid #e6eef8" rows="4"></textarea>
        <button type="submit" class="btn btn-primary" style="grid-column:1/3">Solicitar demo</button>
      </form>
    </section>

    <footer style="border-top:1px solid #eef2f7;margin-top:28px;padding-top:18px;display:flex;justify-content:space-between;align-items:center">
      <div>
        <strong>Norttek Solutions</strong><br>
        <small class="muted">Soporte y ventas · contacto@nortteksolutions.com</small>
      </div>
      <div class="muted">© <span id="year"></span> Norttek Solutions · Todos los derechos reservados</div>
    </footer>
  </div>

  <script>
    document.getElementById('year').textContent = new Date().getFullYear();

    function scrollTo(sel){document.querySelector(sel).scrollIntoView({behavior:'smooth'});}    

    // Demo form (simulación)
    function sendDemoRequest(e){
      e.preventDefault();
      const data = {
        name: document.getElementById('name').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        plan: document.getElementById('planSelect').value,
        message: document.getElementById('message').value
      };
      // Aquí podrías enviar a tu backend vía fetch
      console.log('Demo request', data);
      alert('Gracias. Tu solicitud ha sido recibida. Nos contactamos pronto.');
      document.getElementById('demoForm').reset();
    }

    function openDemoForm(plan){
      scrollTo('#contact');
      if(plan) document.getElementById('planSelect').value = plan;
    }
  </script>
</body>
</html>
