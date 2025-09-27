/**
 * Control de Acceso - JavaScript
 * Animaciones de scroll reveal y interacciones
 */

document.addEventListener('DOMContentLoaded', function() {
    // Inicializar animaciones cuando el DOM esté listo
    initScrollReveal();
    initHeroAnimations();
    initModuleInteractions();
    initSmoothScrolling();
});

/**
 * Configuración de animaciones de scroll reveal
 */
function initScrollReveal() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -10% 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observar módulos para animación de entrada
    const modules = document.querySelectorAll('.control-acceso-module');
    modules.forEach(function(module, index) {
        module.classList.add('control-acceso-animate');
        observer.observe(module);
    });

    // Observar secciones principales
    const sections = document.querySelectorAll('#modulos, section[class*="beneficios"], section[class*="demo"]');
    sections.forEach(function(section) {
        const headings = section.querySelectorAll('.nt-heading');
        headings.forEach(function(heading) {
            heading.classList.add('control-acceso-animate');
            observer.observe(heading);
        });
    });
}

/**
 * Animaciones específicas del hero
 */
function initHeroAnimations() {
    const hero = document.querySelector('.control-acceso-hero');
    if (!hero) return;

    // Parallax suave en el scroll (solo en desktop)
    if (window.innerWidth > 1024) {
        let ticking = false;
        
        function updateParallax() {
            const scrolled = window.pageYOffset;
            const heroHeight = hero.offsetHeight;
            const rate = scrolled * -0.3; // Velocidad del parallax
            
            if (scrolled < heroHeight) {
                const bgElement = hero.querySelector('[style*="background-image"]');
                if (bgElement) {
                    bgElement.style.transform = `translateY(${rate}px)`;
                }
            }
            
            ticking = false;
        }

        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }

        window.addEventListener('scroll', requestTick, { passive: true });
    }

    // Animación de entrada de los botones del hero
    setTimeout(function() {
        const buttons = hero.querySelectorAll('a');
        buttons.forEach(function(button, index) {
            button.style.opacity = '0';
            button.style.transform = 'translateY(20px)';
            
            setTimeout(function() {
                button.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                button.style.opacity = '1';
                button.style.transform = 'translateY(0)';
            }, (index + 1) * 200);
        });
    }, 500);
}

/**
 * Interacciones de los módulos
 */
function initModuleInteractions() {
    const modules = document.querySelectorAll('.control-acceso-module');
    
    modules.forEach(function(module) {
        // Efecto de pulso suave al hacer hover
        module.addEventListener('mouseenter', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'scale(1.1) rotate(5deg)';
            }
        });

        module.addEventListener('mouseleave', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'scale(1) rotate(0deg)';
            }
        });

        // Accesibilidad: permitir activación con teclado
        module.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });

        // Hacer los módulos enfocables para accesibilidad
        if (!module.hasAttribute('tabindex')) {
            module.setAttribute('tabindex', '0');
        }
    });
}

/**
 * Scroll suave para enlaces internos
 */
function initSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                
                const headerHeight = document.querySelector('header')?.offsetHeight || 80;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Agregar foco al elemento target para accesibilidad
                target.setAttribute('tabindex', '-1');
                target.focus();
                
                // Remover el tabindex después de un tiempo
                setTimeout(function() {
                    target.removeAttribute('tabindex');
                }, 1000);
            }
        });
    });
}

/**
 * Funciones de utilidad para efectos adicionales
 */

// Función para agregar un efecto de "typing" a textos específicos
function typeWriter(element, text, speed = 50) {
    let i = 0;
    element.innerHTML = '';
    
    function type() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    
    type();
}

// Función para crear partículas de fondo (opcional, para efectos premium)
function createBackgroundParticles() {
    const hero = document.querySelector('.control-acceso-hero');
    if (!hero) return;
    
    const particlesContainer = document.createElement('div');
    particlesContainer.className = 'hero-particles';
    particlesContainer.style.cssText = `
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    `;
    
    hero.appendChild(particlesContainer);
    
    // Crear partículas flotantes sutiles
    for (let i = 0; i < 15; i++) {
        const particle = document.createElement('div');
        particle.style.cssText = `
            position: absolute;
            width: ${Math.random() * 6 + 2}px;
            height: ${Math.random() * 6 + 2}px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            animation: float ${Math.random() * 10 + 10}s infinite ease-in-out;
        `;
        
        particlesContainer.appendChild(particle);
    }
    
    // CSS para la animación de flotación
    const style = document.createElement('style');
    style.textContent = `
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.1; }
            50% { transform: translateY(-30px) rotate(180deg); opacity: 0.3; }
        }
    `;
    document.head.appendChild(style);
}

// Performance: usar requestAnimationFrame para animaciones suaves
function rafThrottle(callback) {
    let running = false;
    return function() {
        if (running) return;
        running = true;
        requestAnimationFrame(function() {
            callback.apply(this, arguments);
            running = false;
        }.bind(this));
    };
}

// Inicializar efectos adicionales si se desea
// Descomenta la siguiente línea para activar partículas de fondo
// setTimeout(createBackgroundParticles, 1000);

// Lazy loading para mejorar performance
function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(function(img) {
        imageObserver.observe(img);
    });
}

// Inicializar lazy loading
lazyLoadImages();