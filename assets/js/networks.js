// Animaciones para la página de redes usando Intersection Observer

document.addEventListener('DOMContentLoaded', () => {
  function animateOnView(selector, visibleClass) {
    const elements = document.querySelectorAll(selector);
    if (!('IntersectionObserver' in window)) {
      elements.forEach(el => el.classList.add(visibleClass));
      return;
    }
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add(visibleClass);
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });
    elements.forEach(el => observer.observe(el));
  }

  animateOnView('.networks-animate-fade', 'networks-visible-fade');
  animateOnView('.networks-animate-left', 'networks-visible-left');
  animateOnView('.networks-animate-right', 'networks-visible-right');
  animateOnView('.networks-animate-up', 'networks-visible-up');
  animateOnView('.networks-animate-cta', 'networks-visible-cta');
});