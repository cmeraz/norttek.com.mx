/**
 * yeastar-ai.js
 * Microinteracciones y animaciones para la landing premium de Yeastar AI.
 */

document.addEventListener('DOMContentLoaded', () => {
    // Elementos principales
    const animatedGroups = document.querySelectorAll('.ai-animate-group');
    const animatedSingles = document.querySelectorAll('.ai-animate');
    const floatingCta = document.getElementById('aiFloatingCta');
    const sectionMenu = document.querySelector('.ai-section-menu');
    const sectionMenuToggle = sectionMenu ? sectionMenu.querySelector('.ai-section-menu__toggle') : null;
    const sectionMenuLinks = sectionMenu ? Array.from(sectionMenu.querySelectorAll('.ai-section-menu__link')) : [];

    // ==========================================
    // ANIMACIONES DE ENTRADA
    // ==========================================
    animatedGroups.forEach((group) => {
        const children = Array.from(group.children);
        children.forEach((child, index) => {
            child.style.setProperty('--ai-index', index.toString());
        });
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.14 });

    animatedGroups.forEach((group) => observer.observe(group));
    animatedSingles.forEach((node) => observer.observe(node));

    // ==========================================
    // MENÚ DE NAVEGACIÓN
    // ==========================================

    // Establecer enlace activo
    const setActiveMenuLink = (link) => {
        if (!sectionMenuLinks.length || !link) return;
        sectionMenuLinks.forEach((item) => {
            item.classList.toggle('is-active', item === link);
        });
    };

    // Gestión responsive del menú
    const updateMenuLayout = () => {
        if (!sectionMenu) return;
        const isMobile = window.matchMedia('(max-width: 1024px)').matches;
        
        if (isMobile) {
            // Mostrar toggle en móvil
            sectionMenu.classList.add('is-mobile');
            const isOpen = sectionMenu.classList.contains('is-open');
            if (sectionMenuToggle) {
                sectionMenuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            }
        } else {
            // Desktop: siempre visible
            sectionMenu.classList.remove('is-mobile', 'is-open');
            if (sectionMenuToggle) {
                sectionMenuToggle.setAttribute('aria-expanded', 'false');
            }
        }
    };

    // Toggle del menú móvil
    if (sectionMenuToggle) {
        sectionMenuToggle.addEventListener('click', () => {
            if (!sectionMenu) return;
            const willOpen = !sectionMenu.classList.contains('is-open');
            sectionMenu.classList.toggle('is-open', willOpen);
            sectionMenuToggle.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
        });
    }

    // Click en enlaces del menú
    sectionMenuLinks.forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Cerrar menú si está en móvil
            if (sectionMenu && sectionMenu.classList.contains('is-mobile')) {
                sectionMenu.classList.remove('is-open');
                if (sectionMenuToggle) {
                    sectionMenuToggle.setAttribute('aria-expanded', 'false');
                }
            }
            
            // Activar enlace
            setActiveMenuLink(link);
            
            // Scroll suave a la sección
            const targetId = link.getAttribute('href');
            if (targetId && targetId.startsWith('#')) {
                const target = document.querySelector(targetId);
                if (target) {
                    const offset = 100; // Offset para el navbar
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // ==========================================
    // OBSERVADOR DE SECCIONES (detección automática)
    // ==========================================
    const sectionLinkMap = new Map();
    const sectionObserverTargets = [];

    sectionMenuLinks.forEach((link) => {
        const targetId = link.getAttribute('href');
        if (!targetId || !targetId.startsWith('#')) return;
        const section = document.querySelector(targetId);
        if (!section) return;
        sectionLinkMap.set(section.id, link);
        sectionObserverTargets.push(section);
    });

    const sectionObserver = new IntersectionObserver((entries) => {
        const visibleSections = entries
            .filter((entry) => entry.isIntersecting)
            .sort((a, b) => {
                // Priorizar la sección más alta en pantalla
                const aTop = a.boundingClientRect.top;
                const bTop = b.boundingClientRect.top;
                return Math.abs(aTop) - Math.abs(bTop);
            });

        if (visibleSections.length > 0) {
            const { target } = visibleSections[0];
            const activeLink = sectionLinkMap.get(target.id);
            if (activeLink) {
                setActiveMenuLink(activeLink);
            }
        }
    }, {
        threshold: [0.1, 0.5],
        rootMargin: '-15% 0px -50% 0px'
    });

    sectionObserverTargets.forEach((section) => sectionObserver.observe(section));
    
    // Activar primer enlace por defecto
    if (sectionMenuLinks.length) {
        setActiveMenuLink(sectionMenuLinks[0]);
    }

    // ==========================================
    // RESIZE HANDLER
    // ==========================================
    updateMenuLayout();
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(updateMenuLayout, 200);
    });

    // ==========================================
    // CTA FLOTANTE
    // ==========================================
    const updateFloatingCta = () => {
        if (!floatingCta) return;
        const offset = window.scrollY;
        if (offset > 400) {
            floatingCta.style.opacity = '1';
            floatingCta.style.transform = 'translateY(0)';
            floatingCta.style.pointerEvents = 'all';
        } else {
            floatingCta.style.opacity = '0';
            floatingCta.style.transform = 'translateY(20px)';
            floatingCta.style.pointerEvents = 'none';
        }
    };

    updateFloatingCta();
    window.addEventListener('scroll', updateFloatingCta, { passive: true });

    // ==========================================
    // SCROLL SUAVE PARA TODOS LOS ENLACES INTERNOS
    // ==========================================
    document.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const targetId = link.getAttribute('href');
            if (!targetId || targetId === '#') return;
            
            const target = document.querySelector(targetId);
            if (target) {
                event.preventDefault();
                const offset = 100;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ==========================================
    // CERRAR MENÚ AL HACER ESC (móvil)
    // ==========================================
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && sectionMenu && sectionMenu.classList.contains('is-open')) {
            sectionMenu.classList.remove('is-open');
            if (sectionMenuToggle) {
                sectionMenuToggle.setAttribute('aria-expanded', 'false');
            }
        }
    });
});
