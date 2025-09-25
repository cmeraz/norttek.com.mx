// JS específico para la página ayuda-servicio
// Sistema de animaciones (versión optimizada):
// 1. Cada .ayuda-card entra con un fade-up corto (keyframe ayudaCardIn) y delay secuencial usando --card-delay.
// 2. Al concluir la animación principal (~420ms), se revela el contenido interno (h2, li, .action) con pequeños delays escalonados (28ms c/u).
// 3. Si el usuario tiene prefers-reduced-motion, se omiten delays y se muestra todo inmediatamente.
// 4. FAQ se anima cuando se carga: cada .faq-lite-item aparece con un fade-up ligero secuencial.
// 5. Se evita layout thrashing: delays aplicados via setTimeout en lotes pequeños; no se recalculan estilos dentro de bucles intensivos.
// 6. Integración futura con NTAnim: basta con envolver la llamada sequenceCards en un chequeo de modo si se desea unificar.
// Nota: Las clases previas (reveal, nt-delay-*) se sustituyen por is-visible / inner-fade / inner-show para mayor control.

document.addEventListener('DOMContentLoaded', function(){
  // --- Animación secuencial optimizada ---
  var cards = Array.prototype.slice.call(document.querySelectorAll('.ayuda-servicio-page .ayuda-card'));
  // Marcar para NTAnim también (si se desea que el modo Off afecte el estado base)
  cards.forEach(function(c){ if(!c.hasAttribute('data-nt-anim')) c.setAttribute('data-nt-anim',''); });
  var reduceMotion = false;
  try { reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches; } catch(_){ }

  function prepareInner(card){
    if (!card || card.__innerPrepared) return;
    card.__innerPrepared = true;
    // Marcar elementos internos (h2, listas, p.action) para fade escalonado interno
    var innerEls = [];
    var h2 = card.querySelector('h2'); if (h2) innerEls.push(h2);
    var listItems = card.querySelectorAll('ul li'); if (listItems.length) innerEls = innerEls.concat(Array.prototype.slice.call(listItems));
    var action = card.querySelector('.action'); if (action) innerEls.push(action);
    innerEls.forEach(function(el){ el.classList.add('inner-fade'); });
    card._innerEls = innerEls;
  }

  cards.forEach(prepareInner);

  function revealInner(card){
    if (!card || !card._innerEls) return;
    card.classList.add('inner-ready');
    card._innerEls.forEach(function(el, idx){
      // Delay escalonado corto
      var d = 40 + idx * 28; // ms
      setTimeout(function(){ el.classList.add('inner-show'); }, d);
    });
  }

  function sequenceCards(){
    if (!cards.length) return;
    // Si NTAnim está en modo off, mostrar todo directo
    try {
      if (window.NTAnim && window.NTAnim.current && window.NTAnim.current() === 'off') {
        cards.forEach(function(card){
          card.classList.add('is-visible','inner-ready');
          if(card._innerEls) card._innerEls.forEach(function(el){ el.classList.add('inner-fade','inner-show'); });
          card.style.opacity = 1; card.style.transform='none';
        });
        return;
      }
    } catch(_){ }
    // Intersección: al entrar se aplica is-visible con delay secuencial global
    try {
      var io = new IntersectionObserver(function(entries){
        entries.forEach(function(entry){
          if (entry.isIntersecting) {
            var card = entry.target;
            io.unobserve(card);
            card.classList.add('is-visible');
            // Revelar contenido interno tras finalizar animación principal
            if (reduceMotion) {
              card.classList.add('inner-ready');
              if (card._innerEls) card._innerEls.forEach(function(el){ el.classList.add('inner-fade','inner-show'); });
            } else {
              setTimeout(function(){ revealInner(card); }, 420); // coincide con duración de ayudaCardIn
            }
          }
        });
      }, { rootMargin:'0px 0px -12% 0px', threshold:0.15 });
      cards.forEach(function(card,i){
        card.style.setProperty('--card-delay', (i * 0.11)+'s');
        io.observe(card);
      });
    } catch(_) {
      // Fallback: mostrar todo de golpe
      cards.forEach(function(card){
        card.classList.add('is-visible','inner-ready');
        if (card._innerEls) card._innerEls.forEach(function(el){ el.classList.add('inner-fade','inner-show'); });
      });
    }
  }
  sequenceCards();

  // Fallback de seguridad: si después de 1s algún card sigue invisible, forzar visibles
  setTimeout(function(){
    cards.forEach(function(card){
      if(!card.classList.contains('is-visible')){
        card.classList.add('is-visible','inner-ready');
        if(card._innerEls) card._innerEls.forEach(function(el){ el.classList.add('inner-fade','inner-show'); });
        card.style.opacity = 1; card.style.transform='none';
      }
    });
  }, 1000);

  // Búsqueda en vivo
  var searchInput = document.getElementById('ayuda-search');
  function normalizar(str){ return (str||'').toLowerCase().normalize('NFD').replace(/\p{Diacritic}/gu,''); }
  function filtrar(){
    var term = normalizar(searchInput.value.trim());
    cards.forEach(function(c){
      if (!term) { c.style.display='flex'; return; }
      var txt = normalizar(c.textContent);
      c.style.display = txt.indexOf(term) >= 0 ? 'flex' : 'none';
    });
    try { localStorage.setItem('ayudaSearch', searchInput.value); } catch(_){}
  }
  if (searchInput) {
    try { var prev = localStorage.getItem('ayudaSearch') || ''; if (prev){ searchInput.value = prev; } } catch(_){}
    searchInput.addEventListener('input', filtrar);
    if (searchInput.value) filtrar();
  }

  // Deep link por hash (#velocidad-lenta etc.)
  function highlightFromHash(){
    var h = (location.hash||'').replace('#','');
    if(!h) return;
    var target = document.querySelector('.ayuda-card[data-slug="'+CSS.escape(h)+'"], #'+CSS.escape(h));
    if (target) {
      target.classList.add('highlight');
      setTimeout(function(){ target.classList.remove('highlight'); }, 2200);
      try {
        var header = document.getElementById('site-header');
        var off = (header && header.offsetHeight)? header.offsetHeight + 8 : 70;
        var y = target.getBoundingClientRect().top + window.pageYOffset - off - 6;
        window.scrollTo({ top:y, behavior:'smooth' });
      } catch(_){ }
    }
  }
  highlightFromHash();
  window.addEventListener('hashchange', highlightFromHash);

  // Convertir títulos en enlaces anclables
  cards.forEach(function(c){
    var slug = c.getAttribute('data-slug');
    if (!slug) return;
    var h2 = c.querySelector('h2');
    if (!h2) return;
    if (h2.dataset.linkWrapped) return;
    var text = h2.innerHTML;
    h2.innerHTML = '<a href="#'+slug+'" class="ayuda-anchor" style="text-decoration:none; color:inherit;">'+text+'</a>';
    h2.dataset.linkWrapped = '1';
  });

  // Lazy load FAQ usando data attribute
  var faqWrap = document.getElementById('ayuda-faq-wrapper');
  function animarFAQItems(){
    try {
      var items = faqWrap.querySelectorAll('.faq-lite-item');
      Array.prototype.slice.call(items).forEach(function(it,i){
        setTimeout(function(){ it.classList.add('faq-show'); }, 80 + i*55);
      });
    } catch(_){ }
  }

  function cargarFAQ(){
    if (!faqWrap || faqWrap.dataset.loaded) return;
    var name = faqWrap.getAttribute('data-faq-lazy');
    if (!name) return;
    fetch('json/faq/'+name+'.json', { cache:'no-cache' })
      .then(function(r){ if(!r.ok) throw new Error('No FAQ'); return r.json(); })
      .then(function(data){
        if(!Array.isArray(data)){ throw new Error('Formato inválido'); }
        var html = '<section class="faq-lite"><h2 class="faq-lite-title">Preguntas Frecuentes</h2>';
        html += '<div class="faq-lite-list">';
        data.forEach(function(item,i){
          var q = (item.pregunta||'').replace(/</g,'&lt;');
          var a = (item.respuesta||'').replace(/</g,'&lt;');
          html += '<details class="faq-lite-item" '+(i===0?'open':'')+'><summary>'+q+'</summary><div class="faq-lite-answer">'+a+'</div></details>';
        });
        html += '</div></section>';
        faqWrap.innerHTML = html;
        faqWrap.dataset.loaded = '1';
        animarFAQItems();
        // Integrar FAQ con NTAnim (si Off, mostrar inmediatamente)
        try {
          if (window.NTAnim && window.NTAnim.current && window.NTAnim.current() === 'off') {
            faqWrap.querySelectorAll('.faq-lite-item').forEach(function(it){ it.classList.add('faq-show'); it.style.opacity=1; it.style.transform='none'; });
          }
        } catch(_){ }
      })
      .catch(function(){ faqWrap.innerHTML = '<div class="ayuda-faq-placeholder" style="border-color:#f5c2c2;color:#b54848;">No se pudo cargar el FAQ.</div>'; });
  }
  if (faqWrap){
    try {
      var ioFaq = new IntersectionObserver(function(entries){
        entries.forEach(function(e){ if(e.isIntersecting){ cargarFAQ(); ioFaq.disconnect(); } });
      }, { rootMargin:'0px 0px -25% 0px'});
      ioFaq.observe(faqWrap);
    } catch(_){ cargarFAQ(); }
  }

  // Scroll suave para botón volver (si vuelve al asesor en página internet)
  document.querySelectorAll('.ayuda-servicio-page a[href^="#"]').forEach(function(a){
    a.addEventListener('click', function(ev){
      var href = a.getAttribute('href');
      if (!href || href.charAt(0) !== '#') return;
      var id = href.slice(1);
      var el = document.getElementById(id);
      if (!el) return;
      ev.preventDefault();
      var header = document.getElementById('site-header');
      var offset = (header && header.offsetHeight) ? header.offsetHeight + 8 : 70;
      var y = el.getBoundingClientRect().top + window.pageYOffset - offset;
      window.scrollTo({ top: y, behavior: 'smooth'});
    });
  });
});

// Reaccionar a cambio de modo de animación global.
// Hook simple: interceptar setMode si aún no está parcheado.
(function(){
  if(!window.NTAnim || !window.NTAnim.setMode) return;
  if(window.NTAnim.__ayudaHooked) return; // evitar doble hook
  const originalSetMode = window.NTAnim.setMode;
  window.NTAnim.setMode = function(m){
    originalSetMode(m);
    try {
      var mode = window.NTAnim.current ? window.NTAnim.current() : 'full';
      var root = document.querySelector('.ayuda-servicio-page');
      if(!root) return;
      var cards = root.querySelectorAll('.ayuda-card');
      if(mode === 'off'){
        cards.forEach(function(c){
          c.classList.add('is-visible','inner-ready');
          c.style.opacity=1; c.style.transform='none';
          var inners = c.querySelectorAll('.inner-fade');
          inners.forEach(function(el){ el.classList.add('inner-show'); el.style.opacity=1; el.style.transform='none'; });
        });
        var faqItems = root.querySelectorAll('.faq-lite-item');
        faqItems.forEach(function(it){ it.classList.add('faq-show'); it.style.opacity=1; it.style.transform='none'; });
      } else {
        // Re-secuenciar si cambiamos desde off -> otro
        // (Opcional: sólo re-secuenciar si todavía hay tarjetas sin is-visible inicial, aquí se rehace animación light)
        cards.forEach(function(c){
          if(!c.__reAnimated && !c.__ntAnimatedInitial){
            c.classList.remove('is-visible','inner-ready');
            c.style.opacity=''; c.style.transform='';
            c.__reAnimated = true;
          }
        });
      }
    } catch(_){ }
  };
  window.NTAnim.__ayudaHooked = true;
})();
