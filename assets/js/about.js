// Animaciones para la página "Nosotros" usando Intersection Observer

document.addEventListener('DOMContentLoaded', () => {
  // Helper para animar elementos al entrar en viewport
  function animateOnView(selector, animationClass = 'about-visible') {
    const elements = document.querySelectorAll(selector);
    if (!('IntersectionObserver' in window)) {
      elements.forEach(el => el.classList.add(animationClass));
      return;
    }
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add(animationClass);
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });
    elements.forEach(el => observer.observe(el));
  }

  animateOnView('.about-animate-fade', 'about-visible-fade');
  animateOnView('.about-animate-left', 'about-visible-left');
  animateOnView('.about-animate-right', 'about-visible-right');
  animateOnView('.about-animate-up', 'about-visible-up');
  animateOnView('.about-animate-timeline', 'about-visible-timeline');
  animateOnView('.about-animate-cta', 'about-visible-cta');
});