// servicios.js
// Lógica de animación AOS init y desplazamiento centrado para seccion soluciones + FAQ

(function(){
  // Init AOS después de load
  window.addEventListener('load', () => {
    const main = document.getElementById('main-content');
    if(main) main.style.display = 'block';
    if(window.AOS){ AOS.init({ duration: 1000, once: false }); }
  });

  // Scroll ancla centrando bloque imagen+contenido
  document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('a[href^="#"]');
    const header = document.getElementById('site-header');

    function getHeaderHeight(){
      return header ? header.getBoundingClientRect().height : 0;
    }
    function smoothScrollTo(targetY, duration = 650){
      const startY = window.scrollY || window.pageYOffset;
      const diff = targetY - startY; let start;
      function step(ts){ if(!start) start=ts; const t=Math.min(1,(ts-start)/duration); const eased = t<.5?4*t*t*t:1-Math.pow(-2*t+2,3)/2; window.scrollTo(0,startY+diff*eased); if(t<1) requestAnimationFrame(step); }
      requestAnimationFrame(step);
    }

    function normalizeId(raw){
      if(!raw) return raw;
      // Mantener IDs existentes tal cual si existen, si no probar kebab-case y lower
      if(document.getElementById(raw)) return raw;
      const kebab = raw
        .replace(/([a-z])([A-Z])/g,'$1-$2')
        .replace(/[_\s]+/g,'-')
        .toLowerCase();
      if(document.getElementById(kebab)) return kebab;
      return raw; // fallback original
    }

    // Si hay hash al cargar, intentar desplazar después de un pequeño delay
    if(location.hash){
      setTimeout(()=>{
        const raw = location.hash.substring(1);
        const norm = normalizeId(raw);
        const wrapper = document.getElementById(norm);
        if(wrapper){
          const card = wrapper.querySelector('.card-content');
          const img = wrapper.querySelector('img');
          if(card){
            const cardRect = card.getBoundingClientRect();
            const imgRect = img? img.getBoundingClientRect():cardRect;
            const unionTop = Math.min(cardRect.top,imgRect.top);
            const unionBottom = Math.max(cardRect.bottom,imgRect.bottom);
            const unionHeight = unionBottom - unionTop;
            const absoluteUnionTop = window.scrollY + unionTop;
            const viewportH = window.innerHeight; const headerH = getHeaderHeight();
            const targetY = absoluteUnionTop - headerH - (viewportH * 0.45 - unionHeight/2) - 5;
            smoothScrollTo(Math.max(0,targetY));
            card.classList.add('highlight');
            // Timers para hash inicial (breathing 12s, luego fade y cleanup)
            clearTimeout(card._hlFadeTimer);
            clearTimeout(card._hlRemoveTimer);
            card._hlFadeTimer = setTimeout(()=>{ card.classList.add('highlight-fading'); }, 12000);
            card._hlRemoveTimer = setTimeout(()=>{ card.classList.remove('highlight','highlight-fading'); card.style.boxShadow=''; }, 13200);
          }
        }
      }, 350);
    }

    let scrolling = false; let scrollTimer;

    links.forEach(link=>{
      link.addEventListener('click', e=>{
        const href = link.getAttribute('href');
        if(!href || href === '#') return;
        let id = href.substring(1);
        id = normalizeId(id);
        const wrapper = document.getElementById(id);
        if(!wrapper) return;
        const card = wrapper.querySelector('.card-content');
        const img  = wrapper.querySelector('img');
        if(!card){ return; }
        e.preventDefault();

        if(scrolling) return; // throttling
        scrolling = true; clearTimeout(scrollTimer);
        scrollTimer = setTimeout(()=> scrolling=false, 900);

        // Actualizamos hash normalizado sin desplazar instantáneo
        if(history.replaceState){
          history.replaceState(null,'', '#' + id);
        } else {
          location.hash = id;
        }

        document.querySelectorAll('.card-content').forEach(c=>c.classList.remove('highlight'));

        const cardRect = card.getBoundingClientRect();
        const imgRect = img ? img.getBoundingClientRect():cardRect;
        const unionTop = Math.min(cardRect.top, imgRect.top);
        const unionBottom = Math.max(cardRect.bottom, imgRect.bottom);
        const unionHeight = unionBottom - unionTop;
        const absoluteUnionTop = window.scrollY + unionTop;
        const viewportH = window.innerHeight; const headerH = getHeaderHeight();
        const targetY = absoluteUnionTop - headerH - (viewportH * 0.45 - unionHeight/2) - 5; // ajuste fino -5px
        smoothScrollTo(Math.max(0,targetY));

  card.classList.add('highlight');
        card.style.transition = 'background-color .3s, box-shadow .6s';
  card.style.boxShadow = '0 0 0 3px #ffb347,0 0 0 7px rgba(255,179,71,.35),0 10px 32px -8px rgba(15,23,42,.35)';
        // Animación sutil de imagen
        if(img){
          img.style.transition = 'transform .9s cubic-bezier(.4,1,.4,1), filter .9s';
          img.style.transform = 'scale(1.035)';
          img.style.filter = 'brightness(1.05)';
          setTimeout(()=>{ if(img){ img.style.transform=''; img.style.filter=''; } }, 1200);
        }
        // Foco accesible al heading dentro de la card si existe
        const heading = card.querySelector('h3');
        if(heading){ heading.setAttribute('tabindex','-1'); setTimeout(()=> heading.focus({preventScroll:true}), 30); }
        // Secuencia de desvanecimiento programado (breathing 12s total)
        clearTimeout(card._hlFadeTimer);
        clearTimeout(card._hlRemoveTimer);
        card._hlFadeTimer = setTimeout(()=>{
          card.classList.add('highlight-fading');
        }, 12000); // inicia fade tras 12s de breathing
        card._hlRemoveTimer = setTimeout(()=>{
          card.classList.remove('highlight','highlight-fading');
          card.style.boxShadow='';
        }, 13200);
      });
    });

    // FAQ animación y acordeón (selector basado en clases generadas en functions.php)
    const faqInit = () => {
      const items = document.querySelectorAll('.faq-fade');
      if('IntersectionObserver' in window){
        const obs = new IntersectionObserver(entries=>{
          entries.forEach(entry=>{
            if(entry.isIntersecting){ entry.target.classList.add('faq-visible'); }
            else { entry.target.classList.remove('faq-visible'); }
          });
        },{threshold:.15});
        items.forEach(i=>obs.observe(i));
      } else { items.forEach(i=>i.classList.add('faq-visible')); }

      document.querySelectorAll('.faq-falcon__question').forEach(q=>{
        q.addEventListener('click',()=> toggleFaq(q));
        q.addEventListener('keydown',e=>{ if(e.key==='Enter'|| e.key===' ') { e.preventDefault(); toggleFaq(q);} });
      });

      function toggleFaq(q){
        const item = q.closest('.faq-falcon__item');
        if(!item) return;
        const answer = item.querySelector('.faq-falcon__answer');
        const arrow = q.querySelector('.faq-falcon__arrow');
        const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px' && answer.style.opacity === '1';
        document.querySelectorAll('.faq-falcon__item').forEach(i=>{
          const a=i.querySelector('.faq-falcon__answer');
            const ar=i.querySelector('.faq-falcon__arrow');
            a.style.maxHeight='0'; a.style.opacity='0'; if(ar){ ar.style.transform='rotate(0deg)'; ar.style.color='#60a5fa'; }
        });
        if(!isOpen){
          answer.style.maxHeight = answer.scrollHeight + 'px';
          answer.style.opacity='1';
          if(arrow){ arrow.style.transform='rotate(180deg)'; arrow.style.color='#2563eb'; }
        }
      }

      const first = document.querySelector('.faq-falcon__item .faq-falcon__answer');
      const firstArrow = document.querySelector('.faq-falcon__item .faq-falcon__arrow');
      if(first){ first.style.maxHeight = first.scrollHeight + 'px'; first.style.opacity='1'; if(firstArrow){ firstArrow.style.transform='rotate(180deg)'; firstArrow.style.color='#2563eb'; } }
    };

    faqInit();
  });
})();
