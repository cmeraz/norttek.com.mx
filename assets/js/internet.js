// JS para la app móvil de Internet

document.addEventListener('DOMContentLoaded', function() {
  // Ajuste por header fijo: desplaza el contenido para no quedar oculto
  function applyHeaderOffset() {
    var header = document.getElementById('site-header');
    var container = document.querySelector('.internet-app');
    if (!header || !container) return;
    var h = header.offsetHeight || 0;
    container.style.paddingTop = h + 'px';
  }
  applyHeaderOffset();
  // Page fade-in
  try {
    var app = document.querySelector('.internet-app');
    if (app) requestAnimationFrame(function(){ app.classList.add('page-ready'); });
    var menu = document.getElementById('main-menu');
    if (menu) setTimeout(function(){ menu.classList.add('menu-visible'); }, 120);
  } catch(_){}
  window.addEventListener('resize', function(){
    // ligero debounce
    clearTimeout(window.__hdrT);
    window.__hdrT = setTimeout(applyHeaderOffset, 80);
  });
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

  // Menú principal: lógica de contenido dinámico
  var btnNuevo = document.getElementById('btn-nuevo');
  var btnCliente = document.getElementById('btn-cliente');
  var welcomeMsg = document.getElementById('welcome-message');
  var nuevoContent = document.getElementById('nuevo-content');
  var clienteContent = document.getElementById('cliente-content');

  function resetActive() {
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
  }

  // Mostrar contenido de clientes existentes
  function mostrarCliente() {
    hideSection(welcomeMsg);
    hideSection(nuevoContent);
    showSection(clienteContent);
    resetActive(); if (btnCliente) btnCliente.classList.add('active-menu');
  }

  if (btnNuevo) btnNuevo.addEventListener('click', mostrarNuevo);
  if (btnCliente) btnCliente.addEventListener('click', mostrarCliente);

  // Estado inicial
  // Asegura que las secciones ocultas tengan la clase para transición
  [nuevoContent, clienteContent].forEach(function(el){ if (el && el.style.display === 'none') el.classList.add('section-hidden'); });
  mostrarBienvenida();
  // Animación de fichas al cargar
  document.querySelectorAll('.plan-card.animate-card').forEach(function(card, i) {
    card.style.animationDelay = (i * 0.15) + 's';
  });

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
  var nombre = (document.getElementById('input-nombre') || {}).value || '';
  // Tomar solo el primer nombre para el saludo
  var primerNombre = nombre.trim().split(/\s+/)[0] || '';
      var antena = (document.querySelector('input[name="antena"]:checked') || {}).value || 'no';

      // Precios base
      var costoInstalacion = antena === 'si' ? 500 : 850; // si ya tiene servicio/antena: 500; no: 850
      var costoAntena = antena === 'si' ? 0 : 1800;       // solo si no tiene antena
      var total = costoInstalacion + costoAntena;

      // Actualizar placeholders
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
        if (antena === 'si') {
          explain.textContent = 'Tienes antena/servicio: el pago anticipado por link es solo instalación ($500).';
        } else {
          explain.textContent = 'No tienes antena: el pago anticipado por link corresponde a instalación ($850) + antena ($1,800).';
        }
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
    });
  }
  // Guardar selección cuando se navega entre pestañas del menú
  if (btnCliente) btnCliente.addEventListener('click', function(){ try { localStorage.setItem('internetSection', 'cliente'); } catch (_) {} });
  if (btnNuevo) btnNuevo.addEventListener('click', function(){ try { localStorage.setItem('internetSection', 'nuevo'); } catch (_) {} });
});
