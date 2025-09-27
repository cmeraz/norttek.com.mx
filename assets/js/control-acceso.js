// Control de Acceso - preload de imagen del hero y fade-in
(function(){
  try {
    var hero = document.querySelector('.ca-hero');
    if(!hero) return;
    var bgUrl = "assets/img/accessControl-herobg.jpg";
    var img = new Image();
    var done = false;

    function markLoaded(){
      if(done) return; done = true;
      hero.classList.add('hero-loaded');
    }

    img.onload = markLoaded;
    img.onerror = markLoaded; // fallback: aún marcamos para no dejar el hero opaco
    img.src = bgUrl + (bgUrl.indexOf('?') === -1 ? '?v=' + Date.now() : '');

    // Fallback adicional por si onload no dispara (máx 2s)
    setTimeout(markLoaded, 2000);
  } catch(e){ /* noop */ }
})();
