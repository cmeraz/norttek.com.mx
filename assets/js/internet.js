// JS para la app móvil de Internet

document.addEventListener('DOMContentLoaded', function() {
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
