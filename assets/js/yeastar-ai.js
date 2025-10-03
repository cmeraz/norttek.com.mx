/**
 * yeastar-ai.js
 * Microinteracciones y animaciones para la landing premium de Yeastar AI.
 */

document.addEventListener('DOMContentLoaded', () => {
    const animatedGroups = document.querySelectorAll('.ai-animate-group');
    const animatedSingles = document.querySelectorAll('.ai-animate');
    const floatingCta = document.getElementById('aiFloatingCta');
    const sectionMenu = document.querySelector('.ai-section-menu');
    const sectionMenuToggle = sectionMenu ? sectionMenu.querySelector('.ai-section-menu__toggle') : null;
    const sectionMenuLinks = sectionMenu ? Array.from(sectionMenu.querySelectorAll('.ai-section-menu__link')) : [];

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

    const setActiveMenuLink = (link) => {
        if (!sectionMenuLinks.length || !link) return;
        sectionMenuLinks.forEach((item) => {
            item.classList.toggle('is-active', item === link);
        });
    };

    const applyMenuBreakpoint = () => {
        if (!sectionMenu) return;
        const isMobile = window.matchMedia('(max-width: 1023px)').matches;
        sectionMenu.classList.toggle('is-mobile', isMobile);
        if (!isMobile) {
            sectionMenu.classList.remove('is-open');
            if (sectionMenuToggle) {
                sectionMenuToggle.setAttribute('aria-expanded', 'true');
            }
        } else if (sectionMenuToggle) {
            const expanded = sectionMenu.classList.contains('is-open');
            sectionMenuToggle.setAttribute('aria-expanded', expanded ? 'true' : 'false');
        }
    };

    const collapseMenuOnMobile = () => {
        if (!sectionMenu || !sectionMenu.classList.contains('is-mobile')) return;
        sectionMenu.classList.remove('is-open');
        if (sectionMenuToggle) {
            sectionMenuToggle.setAttribute('aria-expanded', 'false');
        }
    };

    sectionMenuToggle?.addEventListener('click', () => {
        if (!sectionMenu) return;
        const willOpen = !sectionMenu.classList.contains('is-open');
        sectionMenu.classList.toggle('is-open', willOpen);
        if (sectionMenuToggle) {
            sectionMenuToggle.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
        }
    });

    sectionMenuLinks.forEach((link) => {
        link.addEventListener('click', () => {
            collapseMenuOnMobile();
            setActiveMenuLink(link);
        });
    });

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
        const visibleEntries = entries
            .filter((entry) => entry.isIntersecting)
            .sort((a, b) => b.intersectionRatio - a.intersectionRatio);

        if (!visibleEntries.length) return;

        const { target } = visibleEntries[0];
        const activeLink = sectionLinkMap.get(target.id);
        if (activeLink) {
            setActiveMenuLink(activeLink);
        }
    }, { threshold: 0.4, rootMargin: '-20% 0px -45% 0px' });

    sectionObserverTargets.forEach((section) => sectionObserver.observe(section));
    if (sectionMenuLinks.length) {
        setActiveMenuLink(sectionMenuLinks[0]);
    }

    applyMenuBreakpoint();
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(applyMenuBreakpoint, 180);
    });

    const updateFloatingCta = () => {
        if (!floatingCta) return;
        const offset = window.scrollY;
        if (offset > 320) {
            floatingCta.style.opacity = '1';
            floatingCta.style.transform = 'translateY(0)';
        } else {
            floatingCta.style.opacity = '0';
            floatingCta.style.transform = 'translateY(18px)';
        }
    };

    updateFloatingCta();
    window.addEventListener('scroll', updateFloatingCta, { passive: true });

    document.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const targetId = link.getAttribute('href');
            if (!targetId || targetId === '#') return;
            const target = document.querySelector(targetId);
            if (target) {
                event.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});
