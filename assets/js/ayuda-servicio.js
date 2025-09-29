/* ==========================================================================// JS específico para la página ayuda-servicio

   Sistema de Documentación - JavaScript// Sistema de animaciones (versión optimizada):

   Navegación, búsqueda y funcionalidad interactiva// 1. Cada .ayuda-card entra con un fade-up corto (keyframe ayudaCardIn) y delay secuencial usando --card-delay.

   ========================================================================== */// 2. Al concluir la animación principal (~420ms), se revela el contenido interno (h2, li, .action) con pequeños delays escalonados (28ms c/u).

// 3. Si el usuario tiene prefers-reduced-motion, se omiten delays y se muestra todo inmediatamente.

document.addEventListener('DOMContentLoaded', function() {// 4. FAQ se anima cuando se carga: cada .faq-lite-item aparece con un fade-up ligero secuencial.

    'use strict';// 5. Se evita layout thrashing: delays aplicados via setTimeout en lotes pequeños; no se recalculan estilos dentro de bucles intensivos.

// 6. Integración futura con NTAnim: basta con envolver la llamada sequenceCards en un chequeo de modo si se desea unificar.

    // ==========================================================================// Nota: Las clases previas (reveal, nt-delay-*) se sustituyen por is-visible / inner-fade / inner-show para mayor control.

    // VARIABLES GLOBALES

    // ==========================================================================document.addEventListener('DOMContentLoaded', function(){

      // --- Animación secuencial optimizada ---

    const docsRoot = document.getElementById('docs-root');  var cards = Array.prototype.slice.call(document.querySelectorAll('.ayuda-servicio-page .ayuda-card'));

    if (!docsRoot) return;  // Marcar para NTAnim también (si se desea que el modo Off afecte el estado base)

      cards.forEach(function(c){ if(!c.hasAttribute('data-nt-anim')) c.setAttribute('data-nt-anim',''); });

    const searchInput = document.getElementById('docs-search');  var reduceMotion = false;

    const searchClear = document.getElementById('search-clear');  try { reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches; } catch(_){ }

    const categoryTabs = document.querySelectorAll('.category-tab');

    const docsSections = document.querySelectorAll('.docs-section');  function prepareInner(card){

    const overviewButtons = document.querySelectorAll('.overview-btn');    if (!card || card.__innerPrepared) return;

    const searchSuggestions = document.querySelectorAll('.search-suggestion');    card.__innerPrepared = true;

    // Marcar elementos internos (h2, listas, p.action) para fade escalonado interno

    let currentCategory = 'all';    var innerEls = [];

    let searchTimeout = null;    var h2 = card.querySelector('h2'); if (h2) innerEls.push(h2);

        var listItems = card.querySelectorAll('ul li'); if (listItems.length) innerEls = innerEls.concat(Array.prototype.slice.call(listItems));

    // ==========================================================================    var action = card.querySelector('.action'); if (action) innerEls.push(action);

    // SISTEMA DE NAVEGACIÓN POR CATEGORÍAS    innerEls.forEach(function(el){ el.classList.add('inner-fade'); });

    // ==========================================================================    card._innerEls = innerEls;

      }

    function showSection(categoryId) {

        // Ocultar todas las secciones  cards.forEach(prepareInner);

        docsSections.forEach(section => {

            section.classList.remove('active');  function revealInner(card){

        });    if (!card || !card._innerEls) return;

            card.classList.add('inner-ready');

        // Mostrar la sección seleccionada    card._innerEls.forEach(function(el, idx){

        const targetSection = document.querySelector(`[data-category="${categoryId}"]`);      // Delay escalonado corto

        if (targetSection) {      var d = 40 + idx * 28; // ms

            targetSection.classList.add('active');      setTimeout(function(){ el.classList.add('inner-show'); }, d);

                });

            // Scroll suave a la sección  }

            setTimeout(() => {

                targetSection.scrollIntoView({   function sequenceCards(){

                    behavior: 'smooth',     if (!cards.length) return;

                    block: 'start'     // Si NTAnim está en modo off, mostrar todo directo

                });    try {

            }, 100);      if (window.NTAnim && window.NTAnim.current && window.NTAnim.current() === 'off') {

        }        cards.forEach(function(card){

                  card.classList.add('is-visible','inner-ready');

        // Actualizar tabs          if(card._innerEls) card._innerEls.forEach(function(el){ el.classList.add('inner-fade','inner-show'); });

        categoryTabs.forEach(tab => {          card.style.opacity = 1; card.style.transform='none';

            tab.classList.remove('active');        });

        });        return;

              }

        const activeTab = document.querySelector(`[data-category="${categoryId}"]`);    } catch(_){ }

        if (activeTab && activeTab.classList.contains('category-tab')) {    // Intersección: al entrar se aplica is-visible con delay secuencial global

            activeTab.classList.add('active');    try {

        }      var io = new IntersectionObserver(function(entries){

                entries.forEach(function(entry){

        currentCategory = categoryId;          if (entry.isIntersecting) {

                    var card = entry.target;

        // Actualizar URL sin recargar            io.unobserve(card);

        if (categoryId !== 'all') {            card.classList.add('is-visible');

            window.history.replaceState(null, null, `#${categoryId}`);            // Revelar contenido interno tras finalizar animación principal

        } else {            if (reduceMotion) {

            window.history.replaceState(null, null, window.location.pathname);              card.classList.add('inner-ready');

        }              if (card._innerEls) card._innerEls.forEach(function(el){ el.classList.add('inner-fade','inner-show'); });

    }            } else {

                  setTimeout(function(){ revealInner(card); }, 420); // coincide con duración de ayudaCardIn

    // Event listeners para tabs de categorías            }

    categoryTabs.forEach(tab => {          }

        tab.addEventListener('click', function() {        });

            const categoryId = this.dataset.category;      }, { rootMargin:'0px 0px -12% 0px', threshold:0.15 });

            showSection(categoryId);      cards.forEach(function(card,i){

                    card.style.setProperty('--card-delay', (i * 0.11)+'s');

            // Efecto de ripple en el tab        io.observe(card);

            createRipple(this);      });

        });    } catch(_) {

    });      // Fallback: mostrar todo de golpe

          cards.forEach(function(card){

    // Event listeners para botones de overview        card.classList.add('is-visible','inner-ready');

    overviewButtons.forEach(button => {        if (card._innerEls) card._innerEls.forEach(function(el){ el.classList.add('inner-fade','inner-show'); });

        button.addEventListener('click', function() {      });

            const targetCategory = this.dataset.target;    }

            showSection(targetCategory);  }

              sequenceCards();

            // Efecto de ripple en el botón

            createRipple(this);  // Fallback de seguridad: si después de 1s algún card sigue invisible, forzar visibles

        });  setTimeout(function(){

    });    cards.forEach(function(card){

          if(!card.classList.contains('is-visible')){

    // ==========================================================================        card.classList.add('is-visible','inner-ready');

    // SISTEMA DE BÚSQUEDA        if(card._innerEls) card._innerEls.forEach(function(el){ el.classList.add('inner-fade','inner-show'); });

    // ==========================================================================        card.style.opacity = 1; card.style.transform='none';

          }

    function performSearch(query) {    });

        query = query.toLowerCase().trim();  }, 1000);

        

        if (query === '') {  // Búsqueda en vivo

            // Si no hay búsqueda, mostrar overview  var searchInput = document.getElementById('ayuda-search');

            showSection('all');  function normalizar(str){ return (str||'').toLowerCase().normalize('NFD').replace(/\p{Diacritic}/gu,''); }

            return;  function filtrar(){

        }    var term = normalizar(searchInput.value.trim());

            cards.forEach(function(c){

        // Buscar en todos los artículos      if (!term) { c.style.display='flex'; return; }

        const articles = document.querySelectorAll('.docs-article');      var txt = normalizar(c.textContent);

        const sections = document.querySelectorAll('.docs-section');      c.style.display = txt.indexOf(term) >= 0 ? 'flex' : 'none';

        let hasResults = false;    });

            try { localStorage.setItem('ayudaSearch', searchInput.value); } catch(_){}

        // Ocultar todas las secciones primero  }

        sections.forEach(section => {  if (searchInput) {

            section.classList.remove('active');    try { var prev = localStorage.getItem('ayudaSearch') || ''; if (prev){ searchInput.value = prev; } } catch(_){}

        });    searchInput.addEventListener('input', filtrar);

            if (searchInput.value) filtrar();

        // Buscar coincidencias  }

        articles.forEach(article => {

            const title = article.querySelector('h3')?.textContent.toLowerCase() || '';  // Deep link por hash (#velocidad-lenta etc.)

            const content = article.querySelector('.article-content')?.textContent.toLowerCase() || '';  function highlightFromHash(){

            const slug = article.dataset.slug || '';    var h = (location.hash||'').replace('#','');

            const section = article.closest('.docs-section');    if(!h) return;

                var target = document.querySelector('.ayuda-card[data-slug="'+CSS.escape(h)+'"], #'+CSS.escape(h));

            if (title.includes(query) || content.includes(query) || slug.includes(query)) {    if (target) {

                article.style.display = 'block';      target.classList.add('highlight');

                if (section) {      setTimeout(function(){ target.classList.remove('highlight'); }, 2200);

                    section.classList.add('active');      try {

                    hasResults = true;        var header = document.getElementById('site-header');

                }        var off = (header && header.offsetHeight)? header.offsetHeight + 8 : 70;

                        var y = target.getBoundingClientRect().top + window.pageYOffset - off - 6;

                // Highlight del término buscado        window.scrollTo({ top:y, behavior:'smooth' });

                highlightSearchTerm(article, query);      } catch(_){ }

            } else {    }

                article.style.display = 'none';  }

                removeHighlight(article);  highlightFromHash();

            }  window.addEventListener('hashchange', highlightFromHash);

        });

          // Convertir títulos en enlaces anclables

        // Si no hay resultados, mostrar mensaje  cards.forEach(function(c){

        if (!hasResults) {    var slug = c.getAttribute('data-slug');

            showNoResults(query);    if (!slug) return;

        }    var h2 = c.querySelector('h2');

            if (!h2) return;

        // Actualizar tabs    if (h2.dataset.linkWrapped) return;

        categoryTabs.forEach(tab => {    var text = h2.innerHTML;

            tab.classList.remove('active');    h2.innerHTML = '<a href="#'+slug+'" class="ayuda-anchor" style="text-decoration:none; color:inherit;">'+text+'</a>';

        });    h2.dataset.linkWrapped = '1';

    }  });

    

    function showNoResults(query) {  // Lazy load FAQ usando data attribute

        // Crear o mostrar sección de "sin resultados"  var faqWrap = document.getElementById('ayuda-faq-wrapper');

        let noResultsSection = document.querySelector('.no-results-section');  function animarFAQItems(){

        if (!noResultsSection) {    try {

            noResultsSection = document.createElement('div');      var items = faqWrap.querySelectorAll('.faq-lite-item');

            noResultsSection.className = 'no-results-section docs-section';      Array.prototype.slice.call(items).forEach(function(it,i){

            noResultsSection.innerHTML = `        setTimeout(function(){ it.classList.add('faq-show'); }, 80 + i*55);

                <div class="construction-notice">      });

                    <i class="fa-solid fa-magnifying-glass"></i>    } catch(_){ }

                    <h3>No se encontraron resultados</h3>  }

                    <p>No encontramos documentación que coincida con "<strong class="search-term"></strong>"</p>

                    <div style="margin-top: 2rem;">  function cargarFAQ(){

                        <button class="overview-btn" onclick="document.getElementById('docs-search').value=''; document.querySelector('.no-results-section').classList.remove('active'); document.querySelector('[data-category=all]').click();">    if (!faqWrap || faqWrap.dataset.loaded) return;

                            <i class="fa-solid fa-arrow-left"></i>    var name = faqWrap.getAttribute('data-faq-lazy');

                            Volver al inicio    if (!name) return;

                        </button>    fetch('json/faq/'+name+'.json', { cache:'no-cache' })

                    </div>      .then(function(r){ if(!r.ok) throw new Error('No FAQ'); return r.json(); })

                </div>      .then(function(data){

            `;        if(!Array.isArray(data)){ throw new Error('Formato inválido'); }

            document.querySelector('.docs-main').appendChild(noResultsSection);        var html = '<section class="faq-lite"><h2 class="faq-lite-title">Preguntas Frecuentes</h2>';

        }        html += '<div class="faq-lite-list">';

                data.forEach(function(item,i){

        noResultsSection.querySelector('.search-term').textContent = query;          var q = (item.pregunta||'').replace(/</g,'&lt;');

        noResultsSection.classList.add('active');          var a = (item.respuesta||'').replace(/</g,'&lt;');

    }          html += '<details class="faq-lite-item" '+(i===0?'open':'')+'><summary>'+q+'</summary><div class="faq-lite-answer">'+a+'</div></details>';

            });

    function highlightSearchTerm(article, term) {        html += '</div></section>';

        // Remover highlights previos        faqWrap.innerHTML = html;

        removeHighlight(article);        faqWrap.dataset.loaded = '1';

                animarFAQItems();

        // Aplicar nuevo highlight (simple implementación)        // Integrar FAQ con NTAnim (si Off, mostrar inmediatamente)

        const walker = document.createTreeWalker(        try {

            article,          if (window.NTAnim && window.NTAnim.current && window.NTAnim.current() === 'off') {

            NodeFilter.SHOW_TEXT,            faqWrap.querySelectorAll('.faq-lite-item').forEach(function(it){ it.classList.add('faq-show'); it.style.opacity=1; it.style.transform='none'; });

            null,          }

            false        } catch(_){ }

        );      })

              .catch(function(){ faqWrap.innerHTML = '<div class="ayuda-faq-placeholder" style="border-color:#f5c2c2;color:#b54848;">No se pudo cargar el FAQ.</div>'; });

        const textNodes = [];  }

        let node;  if (faqWrap){

        while (node = walker.nextNode()) {    try {

            textNodes.push(node);      var ioFaq = new IntersectionObserver(function(entries){

        }        entries.forEach(function(e){ if(e.isIntersecting){ cargarFAQ(); ioFaq.disconnect(); } });

              }, { rootMargin:'0px 0px -25% 0px'});

        textNodes.forEach(textNode => {      ioFaq.observe(faqWrap);

            const text = textNode.textContent;    } catch(_){ cargarFAQ(); }

            const regex = new RegExp(`(${term})`, 'gi');  }

            if (regex.test(text)) {

                const highlighted = text.replace(regex, '<mark class="search-highlight">$1</mark>');  // Scroll suave para botón volver (si vuelve al asesor en página internet)

                const span = document.createElement('span');  document.querySelectorAll('.ayuda-servicio-page a[href^="#"]').forEach(function(a){

                span.innerHTML = highlighted;    a.addEventListener('click', function(ev){

                textNode.parentNode.replaceChild(span, textNode);      var href = a.getAttribute('href');

            }      if (!href || href.charAt(0) !== '#') return;

        });      var id = href.slice(1);

    }      var el = document.getElementById(id);

          if (!el) return;

    function removeHighlight(article) {      ev.preventDefault();

        const highlights = article.querySelectorAll('mark.search-highlight');      var header = document.getElementById('site-header');

        highlights.forEach(mark => {      var offset = (header && header.offsetHeight) ? header.offsetHeight + 8 : 70;

            mark.outerHTML = mark.innerHTML;      var y = el.getBoundingClientRect().top + window.pageYOffset - offset;

        });      window.scrollTo({ top: y, behavior: 'smooth'});

    }    });

      });

    function clearSearch() {});

        searchInput.value = '';

        // Reaccionar a cambio de modo de animación global.

        // Mostrar todos los artículos// Hook simple: interceptar setMode si aún no está parcheado.

        const articles = document.querySelectorAll('.docs-article');(function(){

        articles.forEach(article => {  if(!window.NTAnim || !window.NTAnim.setMode) return;

            article.style.display = 'block';  if(window.NTAnim.__ayudaHooked) return; // evitar doble hook

            removeHighlight(article);  const originalSetMode = window.NTAnim.setMode;

        });  window.NTAnim.setMode = function(m){

            originalSetMode(m);

        // Ocultar "sin resultados"    try {

        const noResults = document.querySelector('.no-results-section');      var mode = window.NTAnim.current ? window.NTAnim.current() : 'full';

        if (noResults) {      var root = document.querySelector('.ayuda-servicio-page');

            noResults.classList.remove('active');      if(!root) return;

        }      var cards = root.querySelectorAll('.ayuda-card');

              if(mode === 'off'){

        // Volver al overview        cards.forEach(function(c){

        showSection('all');          c.classList.add('is-visible','inner-ready');

    }          c.style.opacity=1; c.style.transform='none';

              var inners = c.querySelectorAll('.inner-fade');

    // Event listeners para búsqueda          inners.forEach(function(el){ el.classList.add('inner-show'); el.style.opacity=1; el.style.transform='none'; });

    if (searchInput) {        });

        searchInput.addEventListener('input', function() {        var faqItems = root.querySelectorAll('.faq-lite-item');

            const query = this.value;        faqItems.forEach(function(it){ it.classList.add('faq-show'); it.style.opacity=1; it.style.transform='none'; });

                  } else {

            // Debounce para optimizar        // Re-secuenciar si cambiamos desde off -> otro

            clearTimeout(searchTimeout);        // (Opcional: sólo re-secuenciar si todavía hay tarjetas sin is-visible inicial, aquí se rehace animación light)

            searchTimeout = setTimeout(() => {        cards.forEach(function(c){

                performSearch(query);          if(!c.__reAnimated && !c.__ntAnimatedInitial){

            }, 300);            c.classList.remove('is-visible','inner-ready');

                        c.style.opacity=''; c.style.transform='';

            // Mostrar/ocultar botón de limpiar            c.__reAnimated = true;

            if (searchClear) {          }

                searchClear.style.display = query ? 'block' : 'none';        });

            }      }

        });    } catch(_){ }

          };

        // Búsqueda en tiempo real mientras se escribe  window.NTAnim.__ayudaHooked = true;

        searchInput.addEventListener('keydown', function(e) {})();

            if (e.key === 'Enter') {
                e.preventDefault();
                performSearch(this.value);
            }
            if (e.key === 'Escape') {
                clearSearch();
            }
        });
    }
    
    if (searchClear) {
        searchClear.addEventListener('click', clearSearch);
    }
    
    // Event listeners para sugerencias de búsqueda
    searchSuggestions.forEach(suggestion => {
        suggestion.addEventListener('click', function() {
            const query = this.dataset.query;
            searchInput.value = query;
            performSearch(query);
            
            // Efecto visual
            createRipple(this);
        });
    });
    
    // ==========================================================================
    // EFECTOS VISUALES Y ANIMACIONES
    // ==========================================================================
    
    function createRipple(element) {
        const ripple = document.createElement('span');
        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = rect.width / 2 - size / 2;
        const y = rect.height / 2 - size / 2;
        
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            transform: scale(0);
            background: rgba(255, 255, 255, 0.6);
            left: ${x}px;
            top: ${y}px;
            width: ${size}px;
            height: ${size}px;
            pointer-events: none;
        `;
        
        element.style.position = 'relative';
        element.style.overflow = 'hidden';
        element.appendChild(ripple);
        
        // Animar el ripple
        ripple.animate([
            { transform: 'scale(0)', opacity: 1 },
            { transform: 'scale(1)', opacity: 0 }
        ], {
            duration: 600,
            easing: 'ease-out'
        }).addEventListener('finish', () => {
            ripple.remove();
        });
    }
    
    // Animación de entrada para los cards
    function animateCards() {
        const cards = document.querySelectorAll('.overview-card, .docs-article');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    }
    
    // Animación para los stats del hero
    function animateStats() {
        const statNumbers = document.querySelectorAll('.stat-number');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    const finalNumber = target.textContent;
                    const isPlus = finalNumber.includes('+');
                    const number = parseInt(finalNumber.replace(/[^0-9]/g, ''));
                    
                    animateNumber(target, 0, number, 2000, isPlus);
                    observer.unobserve(target);
                }
            });
        });
        
        statNumbers.forEach(stat => observer.observe(stat));
    }
    
    function animateNumber(element, start, end, duration, hasPlus = false) {
        const startTime = performance.now();
        
        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            const easeOutCubic = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(start + (end - start) * easeOutCubic);
            
            element.textContent = current + (hasPlus ? '+' : '');
            
            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                element.textContent = end + (hasPlus ? '+' : '');
            }
        }
        
        requestAnimationFrame(update);
    }
    
    // ==========================================================================
    // NAVEGACIÓN POR URL
    // ==========================================================================
    
    function handleHashNavigation() {
        const hash = window.location.hash.slice(1);
        if (hash) {
            // Verificar si es una categoría válida
            const validCategories = ['sitio-web', 'hik-connect', 'camaras', 'internet', 'pagos', 'soporte', 'recursos'];
            if (validCategories.includes(hash)) {
                showSection(hash);
                return;
            }
            
            // Verificar si es un artículo específico
            const article = document.querySelector(`[data-slug="${hash}"]`);
            if (article) {
                const section = article.closest('.docs-section');
                if (section) {
                    const category = section.dataset.category;
                    showSection(category);
                    setTimeout(() => {
                        article.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        article.style.boxShadow = '0 0 20px rgba(79, 140, 255, 0.3)';
                        setTimeout(() => {
                            article.style.boxShadow = '';
                        }, 2000);
                    }, 500);
                }
            }
        }
    }
    
    // ==========================================================================
    // FUNCIONALIDADES ADICIONALES
    // ==========================================================================
    
    // Smooth scroll para enlaces internos
    function initSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                const target = document.querySelector(href);
                
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    }
    
    // Copiar enlace de artículo
    function initCopyLinks() {
        const articles = document.querySelectorAll('.docs-article[data-slug]');
        articles.forEach(article => {
            article.addEventListener('dblclick', function() {
                const slug = this.dataset.slug;
                const url = window.location.origin + window.location.pathname + '#' + slug;
                
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(url).then(() => {
                        showToast('Enlace copiado al portapapeles');
                    });
                } else {
                    // Fallback para navegadores sin clipboard API
                    const textArea = document.createElement('textarea');
                    textArea.value = url;
                    document.body.appendChild(textArea);
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);
                    showToast('Enlace copiado al portapapeles');
                }
            });
        });
    }
    
    // Toast notification simple
    function showToast(message) {
        const toast = document.createElement('div');
        toast.style.cssText = `
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--docs-text);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            z-index: 1000;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
        `;
        toast.textContent = message;
        
        document.body.appendChild(toast);
        
        // Mostrar
        setTimeout(() => {
            toast.style.transform = 'translateY(0)';
            toast.style.opacity = '1';
        }, 100);
        
        // Ocultar y remover
        setTimeout(() => {
            toast.style.transform = 'translateY(100px)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
    
    // Scroll to top button
    function initScrollToTop() {
        const scrollBtn = document.createElement('button');
        scrollBtn.innerHTML = '<i class="fa-solid fa-arrow-up"></i>';
        scrollBtn.style.cssText = `
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--docs-primary);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            z-index: 99;
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.3s ease;
            box-shadow: var(--docs-shadow-lg);
        `;
        
        scrollBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        document.body.appendChild(scrollBtn);
        
        // Mostrar/ocultar según scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollBtn.style.opacity = '1';
                scrollBtn.style.transform = 'scale(1)';
            } else {
                scrollBtn.style.opacity = '0';
                scrollBtn.style.transform = 'scale(0.8)';
            }
        });
    }
    
    // ==========================================================================
    // INICIALIZACIÓN
    // ==========================================================================
    
    function init() {
        // Navegación inicial basada en URL
        handleHashNavigation();
        
        // Inicializar funcionalidades
        initSmoothScroll();
        initCopyLinks();
        initScrollToTop();
        
        // Inicializar animaciones
        setTimeout(() => {
            animateCards();
            animateStats();
        }, 300);
        
        // Event listeners globales
        window.addEventListener('hashchange', handleHashNavigation);
        
        // Optimización para dispositivos móviles
        if (window.innerWidth <= 768) {
            // Hacer que los tabs sean más táctiles en móvil
            categoryTabs.forEach(tab => {
                tab.style.minHeight = '44px';
                tab.style.minWidth = '44px';
            });
        }
        
        // Personalización según prefers-reduced-motion
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReducedMotion) {
            document.documentElement.style.setProperty('--animation-duration', '0.1s');
        }
        
        console.log('📚 Sistema de documentación inicializado correctamente');
    }
    
    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
});

// ==========================================================================
// FUNCIONES GLOBALES ACCESIBLES
// ==========================================================================

// Función para navegar programáticamente
window.navigateToSection = function(categoryId) {
    const event = new CustomEvent('navigate-docs', { detail: { category: categoryId } });
    document.dispatchEvent(event);
};

// Event listener personalizado para navegación
document.addEventListener('navigate-docs', function(e) {
    const categoryId = e.detail.category;
    const tab = document.querySelector(`[data-category="${categoryId}"]`);
    if (tab) {
        tab.click();
    }
});
