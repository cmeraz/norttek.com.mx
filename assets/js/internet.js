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
});
