/**
 * telefonia-refactored.js
 * JavaScript para la página de Telefonía IP refactorizada
 * Incluye rotación random de imágenes de fondo del hero
 */

(function() {
    'use strict';

    // ========================================
    // ROTACIÓN RANDOM DE IMAGEN DE FONDO HERO
    // ========================================
    
    /**
     * Array de imágenes disponibles en la carpeta yeastar-hero
     * Estas imágenes se cargarán aleatoriamente como fondo del hero
     */
    const heroImages = [
        'assets/img/yeastar-hero/linkus-desktop-client-banner.png',
        'assets/img/yeastar-hero/linkus-mobile-client-img.webp',
        'assets/img/yeastar-hero/linkus-web-client-img.webp',
        'assets/img/yeastar-hero/software-pbx-banner.png'
    ];

    /**
     * Selecciona una imagen random del array y la establece como fondo
     */
    function setRandomHeroBackground() {
        const heroBackground = document.getElementById('heroBackground');
        
        if (!heroBackground) {
            console.warn('Elemento #heroBackground no encontrado');
            return;
        }

        // Seleccionar imagen aleatoria
        const randomIndex = Math.floor(Math.random() * heroImages.length);
        const selectedImage = heroImages[randomIndex];

        // Establecer la imagen de fondo
        heroBackground.style.backgroundImage = `url('${selectedImage}')`;

        // Log para debugging (remover en producción si es necesario)
        console.log(`Hero background set to: ${selectedImage}`);
    }

    // ========================================
    // INICIALIZACIÓN
    // ========================================
    
    /**
     * Inicializar funcionalidad al cargar el DOM
     */
    function init() {
        // Establecer imagen de fondo random
        setRandomHeroBackground();

        // GSAP animations para el hero (si GSAP está disponible)
        if (window.gsap) {
            // Animar el título del hero
            gsap.from('.telefonia-hero-inner .hero-title-wrapper', {
                opacity: 0,
                y: 30,
                duration: 1,
                ease: 'power3.out',
                delay: 0.2
            });

            // Animar el subtítulo
            gsap.from('.telefonia-hero-sub', {
                opacity: 0,
                y: 20,
                duration: 1,
                ease: 'power3.out',
                delay: 0.5
            });

            // Animar los botones
            gsap.from('.telefonia-hero-actions', {
                opacity: 0,
                y: 20,
                duration: 1,
                ease: 'back.out(1.5)',
                delay: 0.8
            });
        }
    }

    // ========================================
    // MODAL DEMO (si existe)
    // ========================================
    
    function initModalDemo() {
        const modalDemo = document.getElementById('modalDemo');
        const openModalBtn = document.querySelectorAll('[data-nt-modal-open="#modalDemo"]');
        const closeModalBtn = document.querySelector('#modalDemo [data-nt-modal-close]');

        if (!modalDemo) return;

        // Abrir modal
        openModalBtn.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                modalDemo.classList.remove('hidden');
                modalDemo.setAttribute('aria-hidden', 'false');
                
                // Focus en el primer input si existe
                const firstInput = modalDemo.querySelector('input, textarea');
                if (firstInput) {
                    setTimeout(() => firstInput.focus(), 100);
                }
            });
        });

        // Cerrar modal
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', () => {
                modalDemo.classList.add('hidden');
                modalDemo.setAttribute('aria-hidden', 'true');
            });
        }

        // Cerrar con Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modalDemo.classList.contains('hidden')) {
                modalDemo.classList.add('hidden');
                modalDemo.setAttribute('aria-hidden', 'true');
            }
        });

        // Cerrar al hacer click fuera
        modalDemo.addEventListener('click', (e) => {
            if (e.target === modalDemo) {
                modalDemo.classList.add('hidden');
                modalDemo.setAttribute('aria-hidden', 'true');
            }
        });
    }

    // ========================================
    // SMOOTH SCROLL PARA ANCLAS
    // ========================================
    
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                // Ignorar enlaces que solo tienen '#'
                if (href === '#') return;

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // ========================================
    // EJECUTAR AL CARGAR EL DOM
    // ========================================
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            init();
            initModalDemo();
            initSmoothScroll();
        });
    } else {
        // DOM ya está cargado
        init();
        initModalDemo();
        initSmoothScroll();
    }

})();
