// assets/js/index.js
// Efecto de pulsado al click en las cards del hero
(function(){
  const root = document;
  function handleClick(e){
    // Permitir comportamiento normal del enlace, solo marcamos un efecto visual en el contenedor de la card
    const card = e.currentTarget.querySelector('.nt-hero-card');
    if(!card) return;
    // Reiniciar animación si estaba corriendo
    card.classList.remove('nt-clickpulse');
    // Forzar reflow para reiniciar keyframes
    // eslint-disable-next-line no-unused-expressions
    void card.offsetWidth;
    card.classList.add('nt-clickpulse');
    // Limpieza: quitar clase al terminar la animación
    const onEnd = ()=>{
      card.classList.remove('nt-clickpulse');
      card.removeEventListener('animationend', onEnd);
    };
    card.addEventListener('animationend', onEnd);
  }
  function init(){
    const links = root.querySelectorAll('.nt-hero-wrapper a.group');
    links.forEach(link => link.addEventListener('click', handleClick, { passive: true }));
  }
  if(document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
