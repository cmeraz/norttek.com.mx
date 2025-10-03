/**
 * premium-enhancements.js
 * Script para botones flotantes y animaciones premium
 */

(function() {
    'use strict';

    // === CONSTANTES ===
    const SCROLL_THRESHOLD = 300; // px para mostrar botón scroll-to-top
    const WHATSAPP_NUMBER = '6145805162'; // Número de WhatsApp
    const WHATSAPP_MESSAGE = 'Hola, me gustaría obtener más información sobre sus servicios.';

    // === INICIALIZACIÓN ===
    document.addEventListener('DOMContentLoaded', function() {
        initFloatingButtons();
        initScrollAnimations();
        initSmoothScrolling();
    });

    /**
     * Inicializa los botones flotantes
     */
    function initFloatingButtons() {
        // Crear contenedor de botones flotantes si no existe
        if (!document.querySelector('.floating-buttons')) {
            createFloatingButtons();
        }

        // Configurar botón scroll-to-top
        const scrollTopBtn = document.querySelector('.floating-scroll-top');
        if (scrollTopBtn) {
            window.addEventListener('scroll', function() {
                toggleScrollTopButton(scrollTopBtn);
            });

            scrollTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                scrollToTop();
            });
        }

        // Configurar botón WhatsApp
        const whatsappBtn = document.querySelector('.floating-whatsapp');
        if (whatsappBtn) {
            whatsappBtn.addEventListener('click', function(e) {
                e.preventDefault();
                openWhatsApp();
            });
        }
    }

    /**
     * Crea los botones flotantes en el DOM
     */
    function createFloatingButtons() {
        const container = document.createElement('div');
        container.className = 'floating-buttons';
        container.innerHTML = `
            <!-- Botón WhatsApp -->
            <a href="#" class="floating-btn floating-whatsapp" data-tooltip="Chatea con nosotros" aria-label="Contactar por WhatsApp">
                <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
            </a>
            
            <!-- Botón Scroll to Top -->
            <a href="#" class="floating-btn floating-scroll-top" data-tooltip="Volver arriba" aria-label="Volver arriba">
                <i class="fa-solid fa-arrow-up" aria-hidden="true"></i>
            </a>
        `;

        document.body.appendChild(container);
    }

    /**
     * Muestra/oculta el botón scroll-to-top basado en la posición del scroll
     */
    function toggleScrollTopButton(button) {
        if (window.pageYOffset > SCROLL_THRESHOLD) {
            button.classList.add('visible');
        } else {
            button.classList.remove('visible');
        }
    }

    /**
     * Hace scroll suave hacia arriba
     */
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    /**
     * Abre WhatsApp con mensaje predefinido
     */
    function openWhatsApp() {
        const message = encodeURIComponent(WHATSAPP_MESSAGE);
        const url = `https://wa.me/${WHATSAPP_NUMBER}?text=${message}`;
        window.open(url, '_blank');
    }

    /**
     * Inicializa animaciones al hacer scroll (Intersection Observer)
     */
    function initScrollAnimations() {
        // Configurar Intersection Observer para animaciones
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Opcionalmente dejar de observar después de animar
                    // observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observar elementos con clases de animación
        const animatedElements = document.querySelectorAll(
            '.animate-fade-in-up, .animate-fade-in-down, .animate-fade-in-left, .animate-fade-in-right, .animate-scale-in'
        );

        animatedElements.forEach(function(element) {
            // Añadir opacidad 0 inicial si no está visible
            if (!element.classList.contains('visible')) {
                element.style.opacity = '0';
            }
            observer.observe(element);
        });
    }

    /**
     * Inicializa smooth scrolling para enlaces internos
     */
    function initSmoothScrolling() {
        const internalLinks = document.querySelectorAll('a[href^="#"]');
        
        internalLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                // Ignorar # solo
                if (href === '#' || href === '#!') {
                    return;
                }

                const target = document.querySelector(href);
                
                if (target) {
                    e.preventDefault();
                    
                    const headerOffset = 80; // Ajustar según altura del header
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Función auxiliar para añadir efectos de hover a iconos
     */
    function enhanceIcons() {
        // Añadir efecto pulse a iconos específicos
        const pulseIcons = document.querySelectorAll('.icon-pulse i');
        pulseIcons.forEach(function(icon) {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
            });
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });
    }

    /**
     * Inicializar AOS (Animate On Scroll) si está disponible
     */
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-out',
            once: true,
            offset: 100
        });
    }

    // Exponer funciones públicas si es necesario
    window.PremiumEnhancements = {
        scrollToTop: scrollToTop,
        openWhatsApp: openWhatsApp
    };

})();
