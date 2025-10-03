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
            // Móvil: sistema de toggle
            sectionMenu.classList.remove('is-collapsed');
            const isOpen = sectionMenu.classList.contains('is-open');
            if (sectionMenuToggle) {
                sectionMenuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                sectionMenuToggle.setAttribute('aria-label', 'Mostrar u ocultar navegación');
            }
        } else {
            // Desktop: sistema de collapse
            sectionMenu.classList.remove('is-open');
            const isCollapsed = sectionMenu.classList.contains('is-collapsed');
            if (sectionMenuToggle) {
                sectionMenuToggle.setAttribute('aria-expanded', 'false');
                sectionMenuToggle.setAttribute('aria-label', isCollapsed ? 'Expandir menú' : 'Contraer menú');
            }
        }
    };

    // Toggle del menú (móvil = mostrar/ocultar, desktop = expandir/contraer)
    if (sectionMenuToggle) {
        sectionMenuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            if (!sectionMenu) return;
            
            const isMobile = window.matchMedia('(max-width: 1024px)').matches;
            
            if (isMobile) {
                // Móvil: toggle open/close
                const willOpen = !sectionMenu.classList.contains('is-open');
                sectionMenu.classList.toggle('is-open', willOpen);
                sectionMenuToggle.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
            } else {
                // Desktop: toggle collapsed/expanded
                const willCollapse = !sectionMenu.classList.contains('is-collapsed');
                sectionMenu.classList.toggle('is-collapsed', willCollapse);
                sectionMenuToggle.setAttribute('aria-label', willCollapse ? 'Expandir menú' : 'Contraer menú');
            }
        });
    }

    // Click en enlaces del menú
    sectionMenuLinks.forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            console.log('Link clicked:', link.getAttribute('href'));
            
            // Cerrar menú si está en móvil
            if (sectionMenu && sectionMenu.classList.contains('is-open')) {
                sectionMenu.classList.remove('is-open');
                if (sectionMenuToggle) {
                    sectionMenuToggle.setAttribute('aria-expanded', 'false');
                }
            }
            
            // Activar enlace
            setActiveMenuLink(link);
            
            // Scroll suave a la sección
            const targetId = link.getAttribute('href');
            console.log('Target ID:', targetId);
            
            if (targetId && targetId.startsWith('#')) {
                const target = document.querySelector(targetId);
                console.log('Target element:', target);
                
                if (target) {
                    const navbarHeight = document.querySelector('#site-header')?.offsetHeight || 100;
                    const offset = navbarHeight + 20; // navbar + padding
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    
                    console.log('Scrolling to:', targetPosition);
                    
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
                const aTop = Math.abs(a.boundingClientRect.top);
                const bTop = Math.abs(b.boundingClientRect.top);
                return aTop - bTop;
            });

        if (visibleSections.length > 0) {
            const { target } = visibleSections[0];
            const activeLink = sectionLinkMap.get(target.id);
            if (activeLink && !activeLink.matches(':hover')) {
                setActiveMenuLink(activeLink);
            }
        }
    }, {
        threshold: [0.1, 0.3, 0.5],
        rootMargin: '-15% 0px -50% 0px'
    });

    sectionObserverTargets.forEach((section) => sectionObserver.observe(section));
    
    // Activar primer enlace por defecto
    if (sectionMenuLinks.length) {
        setTimeout(() => {
            setActiveMenuLink(sectionMenuLinks[0]);
        }, 500);
    }

    // ==========================================
    // SEGUIMIENTO DEL NAVBAR (scroll sync)
    // ==========================================
    const syncMenuWithNavbar = () => {
        const navbar = document.querySelector('#site-header');
        if (!navbar || !sectionMenu) return;
        
        const isScrolled = navbar.classList.contains('scrolled');
        const isMobile = window.matchMedia('(max-width: 1024px)').matches;
        
        // Solo ajustar en desktop
        if (!isMobile) {
            if (isScrolled) {
                sectionMenu.style.top = '90px';
            } else {
                sectionMenu.style.top = '140px';
            }
        }
    };

    // Observar cambios en la clase del navbar
    const navbarObserver = new MutationObserver(syncMenuWithNavbar);
    const navbar = document.querySelector('#site-header');
    if (navbar) {
        navbarObserver.observe(navbar, { attributes: true, attributeFilter: ['class'] });
    }

    // ==========================================
    // RESIZE HANDLER
    // ==========================================
    updateMenuLayout();
    syncMenuWithNavbar();
    
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            updateMenuLayout();
            syncMenuWithNavbar();
        }, 200);
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
    window.addEventListener('scroll', () => {
        updateFloatingCta();
        syncMenuWithNavbar();
    }, { passive: true });

    // ==========================================
    // SCROLL SUAVE PARA TODOS LOS ENLACES INTERNOS
    // ==========================================
    document.querySelectorAll('a[href^="#"]:not(.ai-section-menu__link)').forEach((link) => {
        link.addEventListener('click', (event) => {
            const targetId = link.getAttribute('href');
            if (!targetId || targetId === '#') return;
            
            const target = document.querySelector(targetId);
            if (target) {
                event.preventDefault();
                const navbarHeight = document.querySelector('#site-header')?.offsetHeight || 100;
                const offset = navbarHeight + 20;
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
        if (e.key === 'Escape' && sectionMenu) {
            if (sectionMenu.classList.contains('is-open')) {
                sectionMenu.classList.remove('is-open');
                if (sectionMenuToggle) {
                    sectionMenuToggle.setAttribute('aria-expanded', 'false');
                }
            }
        }
    });

    // ==========================================
    // CERRAR MENÚ AL HACER CLICK FUERA (móvil)
    // ==========================================
    document.addEventListener('click', (e) => {
        if (!sectionMenu) return;
        
        const isMobile = window.matchMedia('(max-width: 1024px)').matches;
        if (isMobile && sectionMenu.classList.contains('is-open')) {
            if (!sectionMenu.contains(e.target)) {
                sectionMenu.classList.remove('is-open');
                if (sectionMenuToggle) {
                    sectionMenuToggle.setAttribute('aria-expanded', 'false');
                }
            }
        }
    });
});
