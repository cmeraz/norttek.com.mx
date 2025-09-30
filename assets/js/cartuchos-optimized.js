/**
 * cartuchos-optimized.js
 * Versión optimizada para mejorar el rendimiento de la página de cartuchos
 * - Búsqueda por servidor (sin JavaScript)
 * - Sistema de tabs simplificado
 * - Eliminación de animaciones pesadas
 * - Solo funcionalidades esenciales
 */

document.addEventListener('DOMContentLoaded', function() {
    // Referencias DOM básicas
    const tabBtns = document.querySelectorAll('.ejemplo-tab-btn');
    const buscador = document.getElementById('buscador');
    const limpiarBtn = document.getElementById('limpiarBusqueda');

    // ==========================
    // Sistema de tabs simplificado
    // ==========================
    function initTabs() {
        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const tabId = this.dataset.tab;
                
                // Remover clase active de todos los botones
                tabBtns.forEach(b => b.classList.remove('active'));
                
                // Activar botón actual
                this.classList.add('active');
                
                // Mostrar/ocultar contenido
                mostrarTab(tabId);
            });
        });
    }

    function mostrarTab(tabId) {
        const tablaSection = document.querySelector('#compatibilidades');
        const faqSection = document.querySelector('#preguntas-frecuentes');
        
        if (tabId === 'tabla') {
            if (tablaSection) tablaSection.style.display = 'block';
            if (faqSection) faqSection.style.display = 'none';
        } else if (tabId === 'faq') {
            if (tablaSection) tablaSection.style.display = 'none';
            if (faqSection) faqSection.style.display = 'block';
        }
    }

    // ==========================
    // Mejoras UX para el buscador
    // ==========================
    function initBuscadorUX() {
        if (!buscador) return;

        // Auto-submit después de 2 segundos de inactividad (opcional)
        let timeoutId;
        
        buscador.addEventListener('input', function() {
            const form = this.closest('form');
            if (!form) return;
            
            // Cancelar el timeout anterior
            clearTimeout(timeoutId);
            
            // Si el campo está vacío, limpiar inmediatamente
            if (this.value.trim() === '') {
                window.location.href = '?';
                return;
            }
            
            // Auto-submit después de 1.5 segundos (opcional)
            timeoutId = setTimeout(() => {
                form.submit();
            }, 1500);
        });

        // Submit inmediato con Enter
        buscador.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                clearTimeout(timeoutId);
                e.preventDefault();
                this.closest('form').submit();
            }
        });
    }

    // ==========================
    // Inicialización 
    // ==========================
    function init() {
        initTabs();
        initBuscadorUX();
        
        // Mostrar total de elementos cargados
        const totalResultados = document.getElementById('total-resultados');
        if (totalResultados) {
            console.log('Cartuchos optimizados cargados - Total: ' + totalResultados.textContent);
        }
        
        // Focus automático en buscador si no hay búsqueda activa
        if (buscador && !buscador.value.trim()) {
            // Focus con delay para evitar problemas de renderizado
            setTimeout(() => {
                buscador.focus();
            }, 100);
        }
    }

    // Inicializar
    init();
});