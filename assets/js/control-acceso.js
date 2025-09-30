/**
 * control-acceso.js
 * Script para la página de Control de Acceso
 * - Precarga de imagen de fondo del hero
 * - Efecto parallax limitado al área visible del hero
 */

(function() {
  'use strict';

  // Preload de imagen de fondo del hero
  const preloadHeroImage = () => {
    const heroImg = new Image();
    heroImg.src = 'assets/img/accessControl-herobg.jpg';
    
    const hero = document.querySelector('.ca-hero');
    if (!hero) return;

    heroImg.onload = () => {
      hero.classList.add('hero-loaded');
      console.log('[Control Acceso] Imagen del hero cargada');
    };

    // Fallback: si la imagen tarda más de 2s, activar de todas formas
    setTimeout(() => {
      if (!hero.classList.contains('hero-loaded')) {
        hero.classList.add('hero-loaded');
        console.log('[Control Acceso] Hero activado por timeout');
      }
    }, 2000);
  };

  // Efecto parallax limitado al área visible del hero
  const initParallax = () => {
    const hero = document.querySelector('.ca-hero');
    if (!hero) return;

    // Respetar preferencia de movimiento reducido
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) {
      console.log('[Control Acceso] Parallax deshabilitado (prefers-reduced-motion)');
      return;
    }

    let ticking = false;
    let lastScrollY = 0;

    const updateParallax = () => {
      const rect = hero.getBoundingClientRect();
      const heroTop = rect.top;
      const heroHeight = rect.height;

      // Calcular offset: cuando el hero está en el tope del viewport, offset = 0
      // Conforme se hace scroll hacia abajo, el offset aumenta
      let offset = -heroTop;

      // Limitar el movimiento entre 0 y la altura del hero
      offset = Math.max(0, Math.min(offset, heroHeight));

      // Aplicar factor de parallax (0.25 = 25% del scroll)
      const parallax = offset * 0.25;

      // Setear la variable CSS
      hero.style.setProperty('--parallax', `${parallax}px`);
      
      ticking = false;
    };

    const onScroll = () => {
      lastScrollY = window.scrollY;
      if (!ticking) {
        window.requestAnimationFrame(updateParallax);
        ticking = true;
      }
    };

    // Event listeners
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', updateParallax);

    // Inicializar
    updateParallax();
  };

  // Inicialización cuando el DOM esté listo
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
      preloadHeroImage();
      initParallax();
    });
  } else {
    preloadHeroImage();
    initParallax();
  }
})();
