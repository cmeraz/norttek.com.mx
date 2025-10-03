/**
 * yeastar-ai.js
 * Microinteracciones y animaciones para la landing premium de Yeastar AI.
 */

document.addEventListener('DOMContentLoaded', () => {
    const animatedGroups = document.querySelectorAll('.ai-animate-group');
    const animatedSingles = document.querySelectorAll('.ai-animate');
    const floatingCta = document.getElementById('aiFloatingCta');

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
