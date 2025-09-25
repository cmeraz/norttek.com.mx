// JS para la app móvil de Internet

document.addEventListener('DOMContentLoaded', function() {
  // Pre-carga de imagen hero para activar fade-in
  try {
    var hero = document.querySelector('.internet-hero');
    if (hero) {
      var bg = new Image();
      bg.onload = function(){ hero.classList.add('hero-loaded'); };
      bg.src = 'assets/img/internet-hero.jpg';
    }
  } catch(_) {}
  // Emojis como secuencias Unicode para máxima compatibilidad de renderizado
  var EMOJI = {
    wave: "\uD83D\uDC4B", // 👋
    check: "\u2705"       // ✅
  };
  // Eliminado ajuste manual de paddingTop (se unifica con el layout global)
  // Antes: applyHeaderOffset() añadía padding-top duplicando espacio.
  // Page fade-in
  try {
    var app = document.querySelector('.internet-app');
    if (app) requestAnimationFrame(function(){ app.classList.add('page-ready'); });
  // Menú inferior eliminado; los botones viven ahora en el hero (IDs conservados)
  } catch(_){}
  // Ya no se recalcula padding al redimensionar; el layout global maneja compensaciones.
  // Helper para transiciones: oculta con clase y muestra con forzado de reflow
  function showSection(el) {
    if (!el) return;
    el.style.display = 'block';
    // Forzar reflow para que la transición ocurra al quitar la clase
    void el.offsetWidth;
    el.classList.remove('section-hidden');
  }

  function hideSection(el) {
    if (!el) return;
    el.classList.add('section-hidden');
    // Ocultar del flujo tras la transición
    setTimeout(function() { el.style.display = 'none'; }, 230);
  }

  // Helper: convierte a Title Case respetando locale ES (para nombres en minúsculas)
  function toTitleCaseEs(str) {
    var locale = 'es-MX';
    return String(str)
      .split(/\s+/)
      .map(function(word){
        // Maneja compuestos con guión: "juan-pablo" -> "Juan-Pablo"
        return word.split('-').map(function(seg){
          if (!seg) return seg;
          var first = seg.charAt(0).toLocaleUpperCase(locale);
          var rest = seg.slice(1).toLocaleLowerCase(locale);
          return first + rest;
        }).join('-');
      })
      .join(' ');
  }

  // Helpers para persistir el nombre entre el modal y "Contacta a un asesor"
  function setStoredName(fullName, firstName) {
    try {
      localStorage.setItem('customerNameFull', fullName || '');
      localStorage.setItem('customerNameFirst', firstName || '');
    } catch(_) {}
  }
  function getStoredName() {
    try {
      return {
        full: localStorage.getItem('customerNameFull') || '',
        first: localStorage.getItem('customerNameFirst') || ''
      };
    } catch(_) { return { full: '', first: '' }; }
  }

  // Helpers para persistir y usar el plan seleccionado
  function setStoredPlan(megas, price) {
    try {
      localStorage.setItem('selectedPlanMegas', megas || '');
      localStorage.setItem('selectedPlanPrice', price || '');
    } catch(_) {}
  }
  function getStoredPlan() {
    try {
      return {
        megas: localStorage.getItem('selectedPlanMegas') || '',
        price: localStorage.getItem('selectedPlanPrice') || ''
      };
    } catch(_) { return { megas: '', price: '' }; }
  }
  function renderCtaPlan() {
    var cta = document.getElementById('contratar') || document.getElementById('solicitar');
    var formAlt = document.getElementById('abrir-formulario');
    if (!cta) return;
    var plan = getStoredPlan();
    var labelId = 'cta-plan-suffix';
    var suffix = document.getElementById(labelId);
    if (plan.megas) {
      if (!suffix) {
        suffix = document.createElement('span');
        suffix.id = labelId;
        suffix.style.marginLeft = '.5rem';
        suffix.style.fontWeight = '700';
        suffix.style.color = '#4f8cff';
        cta.appendChild(suffix);
      }
      suffix.textContent = plan.megas + ' Megas';
      try {
        var baseHref = (cta.getAttribute('data-base-href') || cta.getAttribute('href') || '').split('?')[0];
        cta.setAttribute('data-base-href', baseHref);
        cta.setAttribute('href', baseHref + '?plan=' + encodeURIComponent(plan.megas));
        if (formAlt) {
          var base2 = (formAlt.getAttribute('data-base-href') || formAlt.getAttribute('href') || '').split('?')[0];
          formAlt.setAttribute('data-base-href', base2);
          formAlt.setAttribute('href', base2 + '?plan=' + encodeURIComponent(plan.megas));
        }
      } catch(_) {}
    } else if (suffix) {
      suffix.remove();
      var base = cta.getAttribute('data-base-href');
      if (base) cta.setAttribute('href', base);
      if (formAlt && formAlt.getAttribute('data-base-href')) formAlt.setAttribute('href', formAlt.getAttribute('data-base-href'));
    }
  }

  // Menú principal: lógica de contenido dinámico
  var btnNuevo = document.getElementById('btn-nuevo');
  var btnCliente = document.getElementById('btn-cliente');
  var welcomeMsg = document.getElementById('welcome-message');
  var nuevoContent = document.getElementById('nuevo-content');
  var clienteContent = document.getElementById('cliente-content');

  function resetActive() {
    // Mantiene la semántica por si se reintroducen estilos de estado; actualmente no hay menú separado.
    if (btnNuevo) btnNuevo.classList.remove('active-menu');
    if (btnCliente) btnCliente.classList.remove('active-menu');
  }

  // Mostrar solo hero y bienvenida por defecto
  function mostrarBienvenida() {
    showSection(welcomeMsg);
    hideSection(nuevoContent);
    hideSection(clienteContent);
    resetActive();
  }

  // Mostrar contenido de usuarios nuevos
  function mostrarNuevo() {
    hideSection(welcomeMsg);
    // Abrir modal para capturar datos
    var modal = document.getElementById('nuevo-modal');
    if (modal) {
      modal.style.display = 'flex';
      // Enfocar el campo de nombre para facilitar el avance
      setTimeout(function(){
        var nameInput = document.getElementById('input-nombre');
        if (nameInput) { try { nameInput.focus(); } catch(_){} }
      }, 50);
    }
    hideSection(clienteContent);
  resetActive(); if (btnNuevo) btnNuevo.classList.add('active-menu');
    // Si ya se ha abierto antes (existe clase visited) hacer scroll inmediato a la sección de proceso
    try {
      if (nuevoContent && nuevoContent.classList.contains('visited')) {
        requestAnimationFrame(function(){
          var target = document.querySelector('.proceso-instalacion') || nuevoContent;
          var header = document.getElementById('site-header');
          var offset = (header && header.offsetHeight) ? header.offsetHeight + 8 : 70;
          var rect = target.getBoundingClientRect();
          var y = rect.top + window.pageYOffset - offset;
          window.scrollTo({ top: y, behavior: 'smooth' });
        });
      }
    } catch(_) {}
  }

  // Mostrar contenido de clientes existentes
  function mostrarCliente() {
    hideSection(welcomeMsg);
    hideSection(nuevoContent);
    showSection(clienteContent);
    resetActive(); if (btnCliente) btnCliente.classList.add('active-menu');
    // Scroll automático a la sección de clientes
    try {
      if (clienteContent) {
        requestAnimationFrame(function(){
          var header = document.getElementById('site-header');
          var offset = (header && header.offsetHeight) ? header.offsetHeight + 8 : 70;
          var rect = clienteContent.getBoundingClientRect();
          var targetY = rect.top + window.pageYOffset - offset;
          window.scrollTo({ top: targetY, behavior: 'smooth' });
        });
      }
    } catch(_) {}
  }

  if (btnNuevo) btnNuevo.addEventListener('click', mostrarNuevo);
  if (btnCliente) btnCliente.addEventListener('click', mostrarCliente);

  // Estado inicial
  // Asegura que las secciones ocultas tengan la clase para transición
  [nuevoContent, clienteContent].forEach(function(el){ if (el && el.style.display === 'none') el.classList.add('section-hidden'); });
  mostrarBienvenida();
  // Stagger para tarjetas de planes (usa transitionDelay)
  document.querySelectorAll('.plan-card.animate-card').forEach(function(card, i) {
    card.style.transitionDelay = (i * 0.12) + 's';
  });

    // Interceptar clic en "Contratar" de cada plan: desplazar al CTA, persistir plan y abrir WhatsApp con el plan seleccionado
    try {
      document.querySelectorAll('.plan-card a.btn-contratar-link').forEach(function(a){
        a.addEventListener('click', function(ev){
          ev.preventDefault();
          var planCard = a.closest('.plan-card');
          var megas = planCard ? (planCard.getAttribute('data-megas') || '').trim() : '';
          var price = '';
          try { var priceEl = planCard ? planCard.querySelector('.price') : null; price = priceEl ? priceEl.textContent.trim() : ''; } catch(_) {}
          var planText = megas ? (megas + ' Megas') : '';
          try { localStorage.setItem('selectedPlan', planText); } catch (_) {}
          try { setStoredPlan(megas, price); renderCtaPlan(); } catch(_) {}

          // Desplazar al botón de "Solicita tu Instalación" y resaltarlo
          try {
            var cta = document.getElementById('contratar') || document.getElementById('solicitar');
            if (cta) {
              var header = document.getElementById('site-header');
              var y = cta.getBoundingClientRect().top + window.pageYOffset - ((header && header.offsetHeight) || 0) - 10;
              window.scrollTo({ top: y, behavior: 'smooth' });
              cta.classList.remove('highlight-pulse');
              void cta.offsetWidth; // reflow para reiniciar animación
              cta.classList.add('highlight-pulse');
            }
          } catch(_) {}

          // Construir y abrir WhatsApp con el mensaje solicitado
          var nombreRaw = '';
          var inputNombre = document.getElementById('input-nombre');
          var asesorInput = document.getElementById('asesor-nombre');
          if (inputNombre && inputNombre.value) nombreRaw = inputNombre.value;
          else if (asesorInput && asesorInput.value) nombreRaw = asesorInput.value;
          var nombreTrim = (nombreRaw || '').trim().replace(/\s+/g, ' ');
          var nombre = nombreTrim;
          try { if (nombreTrim && nombreTrim === nombreTrim.toLocaleLowerCase('es-MX')) nombre = toTitleCaseEs(nombreTrim); } catch(_) {}
          var saludo = nombre ? (EMOJI.wave + ' Hola, mi nombre es ' + nombre + '.') : (EMOJI.wave + ' Hola.');
          var formLink = 'http://clientes.portalinternet.net/solicitar-instalacion/norttek/';
          var planLinea = planText ? ('Me gustaría contratar el plan de ' + planText + '.') : 'Me gustaría contratar un plan de internet.';
          var copy = saludo + '\n\n' +
                     planLinea + '\n\n' +
                     '¿Pueden ayudarme a continuar con la solicitud?\n\n' +
                     'Posteriormente llenaré el formulario para agendar mi instalación:\n' +
                     formLink + '\n\n' +
                     '✅ Quedo pendiente de su apoyo.';
          // Nota: ya no abrimos WhatsApp en el click del plan, solo guardamos y desplazamos al CTA.
        });
      });
    } catch(_) {}
  // Prefill de nombre si ya fue capturado previamente
  try {
    var stored = getStoredName();
    if (stored.full) {
      var asesorInput = document.getElementById('asesor-nombre');
      if (asesorInput && !asesorInput.value) asesorInput.value = stored.full;
      var modalNombre = document.getElementById('input-nombre');
      if (modalNombre && !modalNombre.value) modalNombre.value = stored.full;
    }
  } catch(_) {}

  // Inicializa CTA con plan seleccionado previo (si existe)
  try { renderCtaPlan(); } catch(_) {}

  // Animación scroll para secciones (IntersectionObserver)
  var revealTargets = document.querySelectorAll('.scroll-anim');
  try {
    var io = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          io.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -80px 0px', threshold: 0.1 });
    revealTargets.forEach(function(el) { io.observe(el); });
  } catch (_) {
    // Fallback simple
    function scrollAnim() {
      var winH = window.innerHeight;
      revealTargets.forEach(function(el) {
        var rect = el.getBoundingClientRect();
        if (rect.top < winH - 60) el.classList.add('visible');
      });
    }
    window.addEventListener('scroll', scrollAnim);
    scrollAnim();
  }

  // Formulario (eliminado)

  // Modal funcional: abrir/cerrar con botón y ESC
  var nuevoModal = document.getElementById('nuevo-modal');
  var closeModal = document.getElementById('close-modal');
  var cancelBtn = document.getElementById('btn-cancelar');

  // Función para cerrar el modal
  function cerrarModal() {
    if (nuevoModal) nuevoModal.style.display = 'none';
  }

  // Botón cerrar
  if (closeModal) {
    closeModal.addEventListener('click', function(){
      cerrarModal();
      // Volver a bienvenida si se cierra sin enviar
      mostrarBienvenida();
    });
  }
  if (cancelBtn) {
    cancelBtn.addEventListener('click', function(){
      cerrarModal();
      mostrarBienvenida();
    });
  }

  // Cerrar con ESC
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      cerrarModal();
      // Volver a bienvenida si se cierra con ESC
      mostrarBienvenida();
    }
  });

  // Para abrir el modal desde otro lugar:
  // nuevoModal.style.display = 'flex';

  // Lógica del formulario del modal: calcula costos y muestra contenido
  var modalForm = document.getElementById('modal-form');
  if (modalForm) {
    modalForm.addEventListener('submit', function(e) {
      e.preventDefault();
  var inputNombreEl = document.getElementById('input-nombre');
  var nombreRaw = (inputNombreEl || {}).value || '';
  // Normaliza espacios
  var nombreTrim = nombreRaw.trim().replace(/\s+/g, ' ');
  // Si todo viene en minúsculas, capitaliza por palabra (Juan Pablo, Ana-María)
  var nombreNorm = nombreTrim;
  try {
    if (nombreTrim && nombreTrim === nombreTrim.toLocaleLowerCase('es-MX')) {
      nombreNorm = toTitleCaseEs(nombreTrim);
      if (inputNombreEl) inputNombreEl.value = nombreNorm; // refleja el formato en el input
    }
  } catch(_) {}
  // Tomar solo el primer nombre para el saludo
  var primerNombre = nombreNorm.split(/\s+/)[0] || '';
      // Persistir y sincronizar con el formulario de asesor
      setStoredName(nombreNorm, primerNombre);
      try {
        var asesorInputSync = document.getElementById('asesor-nombre');
        if (asesorInputSync) asesorInputSync.value = nombreNorm;
      } catch(_) {}
  var antena = (document.querySelector('input[name="antena"]:checked') || {}).value || 'no';

      // Precios base
      var costoInstalacion = antena === 'si' ? 500 : 850; // si ya tiene servicio/antena: 500; no: 850
      var costoAntena = antena === 'si' ? 0 : 1800;       // solo si no tiene antena
      var total = costoInstalacion + costoAntena;

      // Mostrar/ocultar listas según equipo (antena)
      try {
        var listNo = document.querySelector('.proceso-list.equipo-false');
        var listSi = document.querySelector('.proceso-list.equipo-true');
        if (listNo) listNo.classList.remove('show');
        if (listSi) listSi.classList.remove('show');
        if (antena === 'si') {
          if (listSi) listSi.classList.add('show');
        } else {
          if (listNo) listNo.classList.add('show');
        }
      } catch(_) {}

      // Actualizar placeholders / costos
  var elUpfront = document.getElementById('install-upfront');
  var elCable = document.getElementById('install-cable-cost');
  var elTotal = document.getElementById('install-total');
  var cardAntena = document.getElementById('card-antena');
  var financing = document.getElementById('install-financing');
  var liFin = document.getElementById('li-antena-financiamiento');
  var procExplain = document.getElementById('process-explain');
      if (elUpfront) elUpfront.textContent = '$' + costoInstalacion.toLocaleString('es-MX');
      if (elCable) elCable.textContent = '$' + costoInstalacion.toLocaleString('es-MX');
      if (elTotal) elTotal.textContent = '$' + total.toLocaleString('es-MX');
      if (cardAntena) cardAntena.style.display = (antena === 'si') ? 'none' : '';
      if (financing) financing.style.display = (antena === 'si') ? 'none' : '';
      if (liFin) liFin.style.display = (antena === 'si') ? 'none' : '';
      if (procExplain) {
        if (antena === 'si') {
          procExplain.textContent = 'Como ya cuentas con antena, validaremos agenda y coordinaremos fecha y hora. Te enviaremos un link para pagar $500 por la instalación.';
        } else {
          procExplain.textContent = 'Si aún no tienes antena, validaremos agenda y coordinaremos fecha y hora. Te enviaremos un link para pagar $850 de instalación; la antena ($1,800) puede diferirse a 3 meses o pagarse de contado.';
        }
      }

      // Explicación dinámica y saludo
      var explain = document.getElementById('install-explain');
      if (explain) {
        var montoConfirm = '$' + costoInstalacion.toLocaleString('es-MX');
        explain.textContent = 'Cuando agendemos tu instalación, nos pondremos en contacto contigo para compartir nuestras cuentas o links de pago con tarjeta. Con el pago de ' + montoConfirm + ' podrás confirmar tu visita y asegurar la instalación.';
      }
      var greetWrap = document.getElementById('personal-greeting');
      var greetName = document.getElementById('customer-name');
      if (greetWrap && greetName && primerNombre.length > 0) {
        greetName.textContent = primerNombre;
        var detail = document.getElementById('greeting-detail');
        if (detail) {
          if (antena === 'si') {
            detail.textContent = 'Gracias por elegirnos,  Prepararemos tu instalación para aprovechar tu antena existente y agendar en el horario que mejor te acomode.';
          } else {
            detail.textContent = 'Gracias por elegirnos, . Prepararemos tu instalación con antena nueva y coordinaremos fecha y hora contigo.';
          }
        }
        greetWrap.style.display = 'block';
      }

      // Guardar selección
      try { localStorage.setItem('internetSection', 'nuevo'); } catch (_) {}

      // Cerrar modal y mostrar contenido
      cerrarModal();
      showSection(nuevoContent);
      try { nuevoContent.classList.add('visited'); } catch(_) {}
      // Desplazar suavemente a la sección de proceso inicial para ver costos
      try {
        var target = document.querySelector('.proceso-instalacion');
        if (target) {
          var header = document.getElementById('site-header');
          var y = target.getBoundingClientRect().top + window.pageYOffset - ((header && header.offsetHeight) || 0) - 8;
          window.scrollTo({ top: y, behavior: 'smooth' });
        }
      } catch(_) {}
    });
  }
  // Guardar selección cuando se navega entre pestañas del menú
  if (btnCliente) btnCliente.addEventListener('click', function(){ try { localStorage.setItem('internetSection', 'cliente'); } catch (_) {} });
  if (btnNuevo) btnNuevo.addEventListener('click', function(){ try { localStorage.setItem('internetSection', 'nuevo'); } catch (_) {} });

  // Smooth scroll to advisor with sticky header offset and highlight
  document.querySelectorAll('a.link-asesor').forEach(function(a){
    a.addEventListener('click', function(ev){
      var href = a.getAttribute('href') || '';
      if (href.startsWith('#')) {
        ev.preventDefault();
        var id = href.slice(1);
        var el = document.getElementById(id);
        if (el) {
          var header = document.getElementById('site-header');
          var y = el.getBoundingClientRect().top + window.pageYOffset - ((header && header.offsetHeight) || 0) - 10;
          window.scrollTo({ top: y, behavior: 'smooth' });
          // resaltar contenedor con animación
          el.classList.remove('highlight');
          void el.offsetWidth; // reflow to restart animation
          el.classList.add('highlight');
        }
      }
    });
  });

  // Contacta a un asesor (WhatsApp)
  try {
    var btnAsesor = document.querySelector('.btn-asesor');
    if (btnAsesor) {
      btnAsesor.addEventListener('click', function() {
        var nombreRaw = (document.getElementById('asesor-nombre') || {}).value || '';
        // Si el campo viene vacío, usa el nombre guardado del modal
        if (!nombreRaw.trim()) {
          var st = getStoredName();
          nombreRaw = st.full || st.first || '';
        }
        var nombreTrim = nombreRaw.trim().replace(/\s+/g, ' ');
        var nombre = nombreTrim;
        try {
          if (nombreTrim && nombreTrim === nombreTrim.toLocaleLowerCase('es-MX')) {
            nombre = toTitleCaseEs(nombreTrim);
          }
        } catch(_) {}
        // Mantener sincronizado el nombre almacenado si el usuario lo escribe aquí
        if (nombre) setStoredName(nombre, nombre.split(/\s+/)[0] || '');
  var saludo = nombre ? (EMOJI.wave + ' Hola, mi nombre es ' + nombre + '.') : (EMOJI.wave + ' Hola.');
  var planSel = '';
  try { planSel = localStorage.getItem('selectedPlan') || ''; } catch(_) {}
  var planLinea = planSel ? ('Me gustaría contratar el plan de ' + planSel + '.') : 'Me gustaría recibir más información sobre el servicio de Internet Norttek, costos de instalación y planes disponibles.';
  var formLink = 'http://clientes.portalinternet.net/solicitar-instalacion/norttek/';
  var copy = saludo + '\n\n' + planLinea + '\n\n' + '¿Pueden ayudarme a continuar con la solicitud?\n\n' + 'Posteriormente llenaré el formulario para agendar mi instalación:\n' + formLink + '\n\n' + EMOJI.check + ' Quedo pendiente de su apoyo.';
        var phone = '526252690997';
        var url = 'https://wa.me/' + phone + '?text=' + encodeURIComponent(copy);
        var msg = document.getElementById('asesor-msg');
        if (msg) msg.textContent = 'Abriendo WhatsApp…';
        window.open(url, '_blank');
      });
    }
  } catch(_) {}

  // (Eliminado) Manejador duplicado que abría WhatsApp desde el botón de plan

  // Al hacer click en el CTA final, asegurar que el plan elegido esté en el querystring
  try {
    var ctaBtn = document.getElementById('contratar') || document.getElementById('solicitar');
    if (ctaBtn) {
      ctaBtn.addEventListener('click', function(ev){
        // Evitar navegación al enlace: solo enviar WhatsApp
        if (ev && typeof ev.preventDefault === 'function') ev.preventDefault();
        if (ev && typeof ev.stopPropagation === 'function') ev.stopPropagation();

        // Construir mensaje solicitado
  var st = getStoredName();
  var nombre = (st.full || st.first || '').trim();
  try { if (nombre && nombre === nombre.toLocaleLowerCase('es-MX')) nombre = toTitleCaseEs(nombre); } catch(_) {}
  var saludo = nombre ? (EMOJI.wave + ' Hola, mi nombre es ' + nombre + '.') : (EMOJI.wave + ' Hola.');

        var plan = getStoredPlan();
        var planLinea = plan.megas ? ('Me gustaría contratar el plan de ' + plan.megas + ' Megas.') : 'Me gustaría contratar un plan de internet.';
        var formLink = 'http://clientes.portalinternet.net/solicitar-instalacion/norttek/';

  var copy = saludo + '\n\n' +
                   planLinea + '\n\n' +
                   '¿Pueden ayudarme a continuar con la solicitud?' + '\n\n' +
                   'Posteriormente llenaré el formulario para agendar mi instalación:\n' +
       formLink + '\n\n' +
       EMOJI.check + ' Quedo pendiente de su apoyo.';

        var wa = 'https://wa.me/526252690997?text=' + encodeURIComponent(copy);
        try { window.open(wa, '_blank'); } catch(_) {}
      });
    }
  } catch(_) {}
});
