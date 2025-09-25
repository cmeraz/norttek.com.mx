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

    if(header){
        if(currentScroll > 100 && currentScroll > lastScroll){
            header.classList.add('bg-white/80', 'backdrop-blur-md');
            header.classList.remove('bg-white');
        } else {
            header.classList.remove('bg-white/80', 'backdrop-blur-md');
            header.classList.add('bg-white');
        }
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

// Toggle modo oscuro rápido
(function(){
    const root = document.documentElement;
    const storageKey = 'nt-theme';
    function applyTheme(val){
        if(val === 'dark'){ root.classList.add('dark'); document.body.classList.add('dark'); }
        else { root.classList.remove('dark'); document.body.classList.remove('dark'); }
    }
    // Preferencia inicial
    const stored = localStorage.getItem(storageKey);
    if(stored){ applyTheme(stored); }
    else if(window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches){
        applyTheme('dark');
    }
    // Escucha de media query para sincronizar si no hay override
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if(!localStorage.getItem(storageKey)){
            applyTheme(e.matches ? 'dark' : 'light');
        }
    });
    // API global simple
    window.NTTheme = {
        toggle(){
            const isDark = root.classList.contains('dark');
            const next = isDark ? 'light' : 'dark';
            applyTheme(next);
            localStorage.setItem(storageKey, next);
        },
        set(mode){ applyTheme(mode); localStorage.setItem(storageKey, mode); },
        current(){ return root.classList.contains('dark') ? 'dark' : 'light'; }
    };
})();

// =============================================
// Gestor Global de Animaciones (NTAnim)
// Modos: full | performance | off
// - Secuenciado adaptativo basado en posición en viewport
// - Persistencia en localStorage
// - Respeto a prefers-reduced-motion
// - Icon drift loops sólo en modos full/performance
// =============================================
(function(){
    const STORAGE_KEY = 'nt-anim-mode';
    const NOTIFIED_KEY = 'nt-anim-rm-notified';
    const body = document.body;
    const mqReduced = window.matchMedia('(prefers-reduced-motion: reduce)');
    let mode = 'full';
    let initialized = false;
    let seqObserver = null;
    let mutationObserver = null;
    let performanceCap = 14; // número máximo de animaciones "reales" en modo performance
    let animatedCount = 0;
    let lastNotifyTs = 0;

    const now = () => performance.now();
    const canNotify = () => (now() - lastNotifyTs) > 1200;
    const notify = (msg, type='info') => { if(window.NTNotify && canNotify()) { lastNotifyTs = now(); NTNotify[type](msg); } };

    function readStoredMode(){
        const stored = localStorage.getItem(STORAGE_KEY);
        if(stored && ['full','performance','off'].includes(stored)) return stored;
        return 'full';
    }

    function effectiveMode(requested){
        if(mqReduced.matches) return 'off';
        return requested;
    }

    function applyModeClasses(){
        body.setAttribute('data-anim-mode', mode);
    }

    function sequenceElements(rootScope){
        const scope = rootScope || document;
        const candidates = Array.from(scope.querySelectorAll('[data-nt-anim], .nt-soft-seq'))
            .filter(el => {
                if(el.__ntAnimatedInitial || el.__ntAnimating) return false;
                const cs = window.getComputedStyle(el);
                // Ignorar elementos en display:none o dentro de un contenedor oculto (offsetParent null) para evitar queden congelados
                if(cs.display === 'none' || cs.visibility === 'hidden' || el.offsetParent === null) return false;
                return true;
            });
        if(!candidates.length) return;

        // Ordenar por posición vertical (top) y luego horizontal (left) para consistencia
        const ordered = candidates.map(el => ({ el, rect: el.getBoundingClientRect() }))
            .sort((a,b)=> a.rect.top === b.rect.top ? a.rect.left - b.rect.left : a.rect.top - b.rect.top)
            .map(o => o.el);

        let baseDelay = 65; // ms
        let delayAccum = 0;
        const viewportH = window.innerHeight;

        ordered.forEach((el, idx) => {
            const r = el.getBoundingClientRect();
            const inViewport = r.top < viewportH * 0.94 && r.bottom > 0;
            let applyAnim = true;
            if(mode === 'performance'){
                if(animatedCount >= performanceCap){ applyAnim = false; }
                else if(!inViewport){ applyAnim = false; }
            } else if(mode === 'off') {
                applyAnim = false;
            }

            if(applyAnim){
                const adaptiveStep = (idx < 12) ? 1 : (idx < 24 ? 0.65 : 0.4);
                delayAccum += baseDelay * adaptiveStep;
                const localDelay = delayAccum;
                el.__ntAnimating = true;
                el.style.animationDelay = (localDelay/1000)+'s';
                el.classList.add('nt-anim-soft-in');
                setTimeout(()=>{
                    el.style.animationDelay = '';
                    el.__ntAnimatedInitial = true; el.__ntAnimating = false;
                }, localDelay + 1200);
                animatedCount++;
            } else {
                // Fallback: si está fuera de viewport en performance simplemente no marcamos initial para que pueda animarse luego
                if(mode === 'performance' && !inViewport && animatedCount < performanceCap){
                    // dejarlo pendiente
                } else {
                    el.style.opacity = 1; el.style.transform = 'none';
                    el.__ntAnimatedInitial = true;
                }
            }
        });
    }

    function observeLazy(){
        if(mutationObserver) return;
        mutationObserver = new MutationObserver(muts => {
            muts.forEach(m => {
                if(m.addedNodes && m.addedNodes.length){
                    m.addedNodes.forEach(n => {
                        if(n.nodeType === 1){
                            if(n.matches && (n.matches('[data-nt-anim], .nt-soft-seq'))){
                                sequenceElements(n.parentNode || document);
                            } else {
                                const inner = n.querySelectorAll ? n.querySelectorAll('[data-nt-anim], .nt-soft-seq') : [];
                                if(inner.length) sequenceElements(n);
                            }
                        }
                    });
                }
            });
        });
        mutationObserver.observe(document.body, { childList:true, subtree:true });
    }

    function handleScrollPerformance(){
        if(mode !== 'performance') return;
        if(animatedCount >= performanceCap) return;
        sequenceElements();
    }

    function removePrep(){
        if(body.classList.contains('nt-anim-prep')){
            body.classList.remove('nt-anim-prep');
        }
    }

    function setMode(next){
        if(!['full','performance','off'].includes(next)) return;
        const prev = mode;
        mode = effectiveMode(next);
        localStorage.setItem(STORAGE_KEY, mode);
        applyModeClasses();
        if(prev !== mode){
            if(mode !== 'off'){
                animatedCount = 0;
                // Reaplicar animaciones a elementos que no se habían animado
                document.querySelectorAll('[data-nt-anim], .nt-soft-seq').forEach(el => {
                    if(!el.__ntAnimatedInitial){ el.classList.remove('nt-anim-soft-in'); el.style.opacity=''; el.style.transform=''; }
                });
                requestAnimationFrame(()=>sequenceElements());
            } else {
                // Mostrar todo inmediatamente
                document.querySelectorAll('[data-nt-anim], .nt-soft-seq').forEach(el => { el.style.opacity=1; el.style.transform='none'; });
            }
            notify(`<strong>Modo animaciones:</strong> ${mode}`, 'info');
        }
        updateToggleUI();
    }

    function updateToggleUI(){
        const menu = document.querySelector('#nt-anim-toggle .nt-anim-menu');
        if(!menu) return;
        menu.querySelectorAll('button[data-mode]').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.mode === mode);
        });
    }

    function buildToggle(){
        if(document.getElementById('nt-anim-toggle')) return;
        const wrap = document.createElement('div');
        wrap.id = 'nt-anim-toggle';
        wrap.innerHTML = `
            <button class="nt-anim-main" aria-haspopup="true" aria-expanded="false" title="Control de animaciones"><i class="fa-solid fa-wand-magic-sparkles"></i>Animaciones</button>
            <div class="nt-anim-menu" role="menu" aria-label="Seleccionar modo animaciones">
                <button data-mode="full" role="menuitem"><i class="fa-solid fa-star"></i> Completo</button>
                <button data-mode="performance" role="menuitem"><i class="fa-solid fa-gauge-high"></i> Performance</button>
                <button data-mode="off" role="menuitem"><i class="fa-solid fa-ban"></i> Off</button>
            </div>`;
        document.body.appendChild(wrap);
        const mainBtn = wrap.querySelector('.nt-anim-main');
        const menu = wrap.querySelector('.nt-anim-menu');
        mainBtn.addEventListener('click', ()=>{
            wrap.classList.toggle('open');
            const open = wrap.classList.contains('open');
            mainBtn.setAttribute('aria-expanded', open?'true':'false');
        });
        menu.addEventListener('click', e => {
            const btn = e.target.closest('button[data-mode]');
            if(!btn) return;
            setMode(btn.dataset.mode);
            wrap.classList.remove('open');
            mainBtn.setAttribute('aria-expanded','false');
        });
        document.addEventListener('click', e => { if(!wrap.contains(e.target)) { wrap.classList.remove('open'); mainBtn.setAttribute('aria-expanded','false'); }});
        updateToggleUI();
    }

    function onReducedChange(){
        if(mqReduced.matches){
            const prev = mode;
            mode = 'off'; applyModeClasses();
            if(!localStorage.getItem(NOTIFIED_KEY)){
                notify('<strong>Movimiento reducido activo.</strong> Animaciones deshabilitadas.');
                localStorage.setItem(NOTIFIED_KEY,'1');
            }
            if(prev !== 'off') updateToggleUI();
            document.querySelectorAll('[data-nt-anim], .nt-soft-seq').forEach(el => { el.style.opacity=1; el.style.transform='none'; });
        } else {
            // Restaurar modo almacenado
            setMode(readStoredMode());
        }
    }

    function init(){
        if(initialized) return; initialized = true;
        buildToggle();
        mode = effectiveMode(readStoredMode());
        applyModeClasses();
        // Secuenciar en primer frame
        requestAnimationFrame(()=>{ sequenceElements(); removePrep(); });
        observeLazy();
        window.addEventListener('scroll', handleScrollPerformance, { passive:true });
        mqReduced.addEventListener('change', onReducedChange);
        if(mqReduced.matches) onReducedChange();
    }

    // API pública
    window.NTAnim = { init, setMode, sequence: sequenceElements, current: () => mode };

    // Preparación inicial (blur) y arranque
    if(!body.classList.contains('nt-anim-prep')) body.classList.add('nt-anim-prep');
    document.addEventListener('DOMContentLoaded', ()=>{
        init();
        // Fallback para asegurar remoción del blur si algo se demora
        setTimeout(removePrep, 900);
    });
})();


