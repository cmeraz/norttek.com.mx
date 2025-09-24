// JS para la app móvil de Internet

document.addEventListener('DOMContentLoaded', function() {
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
    showSection(nuevoContent);
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
  // Menú principal: lógica de contenido dinámico
  var btnNuevo = document.getElementById('btn-nuevo');
  var btnCliente = document.getElementById('btn-cliente');
  var welcomeMsg = document.getElementById('welcome-message');
  var nuevoContent = document.getElementById('nuevo-content');
  var clienteContent = document.getElementById('cliente-content');

  // Mostrar solo hero y bienvenida por defecto
  function mostrarBienvenida() {
    welcomeMsg.style.display = 'block';
    nuevoContent.style.display = 'none';
    clienteContent.style.display = 'none';
    btnNuevo.classList.remove('active-menu');
    btnCliente.classList.remove('active-menu');
  }

  // Mostrar contenido de usuarios nuevos (todo el contenido principal)
  function mostrarNuevo() {
    welcomeMsg.style.display = 'none';
    nuevoContent.style.display = 'block';
    clienteContent.style.display = 'none';
    btnNuevo.classList.add('active-menu');
    btnCliente.classList.remove('active-menu');
  }

  // Mostrar contenido de clientes existentes (solo la vista de cliente)
  function mostrarCliente() {
    welcomeMsg.style.display = 'none';
    nuevoContent.style.display = 'none';
    clienteContent.style.display = 'block';
    btnNuevo.classList.remove('active-menu');
    btnCliente.classList.add('active-menu');
  }

  // Eventos de los botones
  if (btnNuevo && btnCliente) {
    btnNuevo.addEventListener('click', mostrarNuevo);
    btnCliente.addEventListener('click', mostrarCliente);
  }

  // Mostrar bienvenida al cargar
  mostrarBienvenida();
  // Animación de fichas al cargar
  document.querySelectorAll('.plan-card.animate-card').forEach(function(card, i) {
    card.style.animationDelay = (i * 0.15) + 's';
  });

  // Animación scroll para secciones
  function scrollAnim() {
    var elems = document.querySelectorAll('.scroll-anim');
    var winH = window.innerHeight;
    elems.forEach(function(el) {
      var rect = el.getBoundingClientRect();
      if (rect.top < winH - 60) {
        el.classList.add('visible');
      }
    });
  }
  window.addEventListener('scroll', scrollAnim);
  scrollAnim();

  // Formulario (eliminado)

  // Modal funcional: abrir/cerrar con botón y ESC
  var nuevoModal = document.getElementById('nuevo-modal');
  var closeModal = document.getElementById('close-modal');

  // Función para cerrar el modal
  function cerrarModal() {
    if (nuevoModal) nuevoModal.style.display = 'none';
  }

  // Botón cerrar
  if (closeModal) {
    closeModal.addEventListener('click', cerrarModal);
  }

  // Cerrar con ESC
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      cerrarModal();
    }
  });

  // Para abrir el modal desde otro lugar:
  // nuevoModal.style.display = 'flex';
});
