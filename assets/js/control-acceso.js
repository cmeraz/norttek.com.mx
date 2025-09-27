// Control de Acceso - preload de imagen del hero y fade-in
(function(){
  try {
    var hero = document.querySelector('.ca-hero');
    if(!hero) return;
    var bgUrl = "assets/img/accessControl-herobg.jpg";
    var img = new Image();
    var done = false;
    var parallaxEnabled = true;
    try {
      parallaxEnabled = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    } catch(e) { parallaxEnabled = true; }

    function markLoaded(){
      if(done) return; done = true;
      hero.classList.add('hero-loaded');
    }

    img.onload = markLoaded;
    img.onerror = markLoaded; // fallback: aún marcamos para no dejar el hero opaco
    img.src = bgUrl + (bgUrl.indexOf('?') === -1 ? '?v=' + Date.now() : '');

    // Fallback adicional por si onload no dispara (máx 2s)
    setTimeout(markLoaded, 2000);

    // Parallax suave controlando la variable CSS --parallax
    if(parallaxEnabled){
      var ticking = false;
      var viewportH = window.innerHeight || document.documentElement.clientHeight;

      function computeOffset(){
        var rect = hero.getBoundingClientRect();
        var h = rect.height || hero.offsetHeight || 0;
        // Progreso relativo solo mientras el hero cruza el viewport superior
        var progress = -rect.top; // 0 en top; aumenta al hacer scroll
        if (progress < 0) progress = 0;
        if (progress > h) progress = h; // clamp al alto del hero
        // Factor de parallax (más pequeño = movimiento más sutil)
        var factor = 0.25; // 25% del desplazamiento relativo
        var offset = Math.round(progress * factor);
        return offset;
      }

      function rafUpdate(){
        var offset = computeOffset();
        hero.style.setProperty('--parallax', offset + 'px');
        ticking = false;
      }

      function onScroll(){
        if(!ticking){
          ticking = true;
          window.requestAnimationFrame(rafUpdate);
        }
      }

      function onResize(){
        viewportH = window.innerHeight || document.documentElement.clientHeight;
        onScroll();
      }

      // Init y listeners
      onScroll();
      window.addEventListener('scroll', onScroll, { passive: true });
      window.addEventListener('resize', onResize);
    }
  } catch(e){ /* noop */ }
})();
