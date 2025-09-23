// JS para la app móvil de Internet

document.addEventListener('DOMContentLoaded', function() {
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
