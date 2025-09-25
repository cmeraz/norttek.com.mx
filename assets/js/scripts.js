// AOS Animacion para Footer
AOS.init({
    duration: 800,
    once: true
});

// Scroll header: cambio de fondo según scroll
const header = document.getElementById('site-header');
let lastScroll = 0;
window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if(currentScroll > 100 && currentScroll > lastScroll){
        header.classList.add('bg-white/80', 'backdrop-blur-md');
        header.classList.remove('bg-white');
    } else {
        header.classList.remove('bg-white/80', 'backdrop-blur-md');
        header.classList.add('bg-white');
    }

    lastScroll = currentScroll;
});

// Smooth scroll para anclas
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if(target){
            target.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Intersection Observer para animar encabezados con clase .nt-heading-anim
(function(){
    const items = document.querySelectorAll('.nt-heading-anim');
    if(!items.length) return;
    const obs = ('IntersectionObserver' in window) ? new IntersectionObserver((entries)=>{
        entries.forEach(entry => {
            if(entry.isIntersecting){
                entry.target.classList.add('is-visible');
            }
        });
    }, { threshold: 0.2 }) : null;
    items.forEach(el => {
        if(obs) obs.observe(el); else el.classList.add('is-visible');
    });
})();

// Tabs en página de cartuchos (Compatibilidades / FAQ)
(function(){
    const tabButtons = document.querySelectorAll('.ejemplo-tab-btn');
    if(!tabButtons.length) return;
    const tabSections = {
        'tab1': document.querySelector('#compatibilidades'),
        'tab2': document.querySelector('#preguntas-frecuentes')
    };
    function activate(id){
        tabButtons.forEach(btn => {
            const isTarget = btn.dataset.tab === id;
            btn.classList.toggle('active', isTarget);
            // Cambiar variantes visuales
            if(isTarget){
                btn.classList.add('nt-tab-active');
                btn.classList.remove('nt-btn-outline');
                btn.classList.add('nt-btn-primary');
            } else {
                btn.classList.remove('nt-tab-active');
                btn.classList.remove('nt-btn-primary');
                btn.classList.add('nt-btn-outline');
            }
        });
        Object.keys(tabSections).forEach(k => {
            if(tabSections[k]){
                tabSections[k].style.display = (k === id) ? 'block' : 'none';
            }
        });
    }
    tabButtons.forEach(btn => btn.addEventListener('click', () => activate(btn.dataset.tab)));
    // Estado inicial
    activate('tab1');
})();


