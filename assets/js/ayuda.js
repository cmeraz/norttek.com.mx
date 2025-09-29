/**
 * AYUDA.JS - FUNCIONALIDAD PARA DOCUMENTACIÓN
 * Estilo moderno similar a Stripe Docs
 */

document.addEventListener('DOMContentLoaded', function() {
    // ===================================
    // VARIABLES GLOBALES
    // ===================================
    
    const sidebar = document.querySelector('.docs-sidebar');
    const navLinks = document.querySelectorAll('.nav-link');
    const searchInput = document.getElementById('docs-search');
    const sections = document.querySelectorAll('.docs-section');
    const checkboxes = document.querySelectorAll('.checklist-item input[type="checkbox"]');
    const feedbackButtons = document.querySelectorAll('.feedback-btn');
    
    // ===================================
    // NAVEGACIÓN DEL SIDEBAR
    // ===================================
    
    function initSidebarNavigation() {
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remover active de todos los links
                navLinks.forEach(l => l.classList.remove('active'));
                
                // Agregar active al link clickeado
                this.classList.add('active');
                
                // Obtener el target del href
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    // Smooth scroll al elemento
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Highlight temporal del elemento
                    targetElement.style.transform = 'translateX(4px)';
                    targetElement.style.transition = 'transform 0.3s ease';
                    
                    setTimeout(() => {
                        targetElement.style.transform = 'translateX(0)';
                    }, 300);
                }
                
                // Cerrar sidebar en mobile
                if (window.innerWidth <= 1024) {
                    sidebar.classList.remove('open');
                }
            });
        });
    }
    
    // ===================================
    // BÚSQUEDA EN VIVO
    // ===================================
    
    function initSearch() {
        if (!searchInput) return;
        
        let searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.toLowerCase().trim();
            
            searchTimeout = setTimeout(() => {
                if (query === '') {
                    showAllContent();
                    return;
                }
                
                searchContent(query);
            }, 300);
        });
        
        // Shortcut Cmd/Ctrl + K para focus en búsqueda
        document.addEventListener('keydown', function(e) {
            if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                e.preventDefault();
                searchInput.focus();
            }
        });
    }
    
    function searchContent(query) {
        const allContent = document.querySelectorAll('.docs-section, .subsection, .docs-article, .feature-card, .solution-card, .tip-card, .method-card');
        let hasResults = false;
        
        allContent.forEach(element => {
            const text = element.textContent.toLowerCase();
            const isMatch = text.includes(query);
            
            if (isMatch) {
                element.style.display = '';
                hasResults = true;
                
                // Highlight del texto encontrado
                highlightSearchTerm(element, query);
            } else {
                element.style.display = 'none';
            }
        });
        
        // Mostrar mensaje si no hay resultados
        showNoResults(!hasResults, query);
    }
    
    function highlightSearchTerm(element, query) {
        // Simple highlight - puede mejorarse
        const walker = document.createTreeWalker(
            element,
            NodeFilter.SHOW_TEXT,
            null,
            false
        );
        
        const textNodes = [];
        let node;
        
        while (node = walker.nextNode()) {
            textNodes.push(node);
        }
        
        textNodes.forEach(textNode => {
            const text = textNode.textContent;
            const regex = new RegExp(`(${query})`, 'gi');
            
            if (regex.test(text)) {
                const highlightedHTML = text.replace(regex, '<mark style="background: #fff3cd; padding: 2px 4px; border-radius: 3px;">$1</mark>');
                
                const wrapper = document.createElement('span');
                wrapper.innerHTML = highlightedHTML;
                textNode.parentNode.replaceChild(wrapper, textNode);
            }
        });
    }
    
    function showAllContent() {
        // Remover highlights
        const marks = document.querySelectorAll('mark');
        marks.forEach(mark => {
            const parent = mark.parentNode;
            parent.replaceChild(document.createTextNode(mark.textContent), mark);
            parent.normalize();
        });
        
        // Mostrar todo el contenido
        const allContent = document.querySelectorAll('.docs-section, .subsection, .docs-article, .feature-card, .solution-card, .tip-card, .method-card');
        allContent.forEach(element => {
            element.style.display = '';
        });
        
        // Ocultar mensaje de no resultados
        showNoResults(false);
    }
    
    function showNoResults(show, query = '') {
        let noResultsDiv = document.getElementById('no-results');
        
        if (show && !noResultsDiv) {
            noResultsDiv = document.createElement('div');
            noResultsDiv.id = 'no-results';
            noResultsDiv.className = 'no-results';
            noResultsDiv.innerHTML = `
                <div style="text-align: center; padding: 60px 20px; color: #6b7280;">
                    <i class="fa-solid fa-search" style="font-size: 48px; margin-bottom: 16px; opacity: 0.5;"></i>
                    <h3>No encontramos resultados para "${query}"</h3>
                    <p>Intenta con otros términos o navega por las secciones del menú lateral.</p>
                    <button onclick="document.getElementById('docs-search').value = ''; document.getElementById('docs-search').dispatchEvent(new Event('input'))" 
                            style="margin-top: 16px; padding: 8px 16px; background: var(--docs-primary); color: white; border: none; border-radius: 6px; cursor: pointer;">
                        Limpiar búsqueda
                    </button>
                </div>
            `;
            
            document.querySelector('.docs-content').appendChild(noResultsDiv);
        } else if (!show && noResultsDiv) {
            noResultsDiv.remove();
        }
    }
    
    // ===================================
    // CHECKLIST INTERACTIVO
    // ===================================
    
    function initChecklist() {
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const label = this.nextElementSibling;
                
                if (this.checked) {
                    label.style.transform = 'scale(1.02)';
                    label.style.borderColor = 'var(--docs-success)';
                    label.style.background = 'rgba(0, 217, 36, 0.05)';
                    
                    // Animación de éxito
                    setTimeout(() => {
                        label.style.transform = 'scale(1)';
                    }, 200);
                    
                    // Sonido de éxito (opcional)
                    playSuccessSound();
                } else {
                    label.style.borderColor = 'var(--docs-border)';
                    label.style.background = 'var(--docs-bg-secondary)';
                }
                
                // Calcular progreso
                updateChecklistProgress();
            });
        });
    }
    
    function updateChecklistProgress() {
        const totalChecks = checkboxes.length;
        const checkedItems = document.querySelectorAll('.checklist-item input[type="checkbox"]:checked').length;
        
        if (totalChecks > 0) {
            const progress = (checkedItems / totalChecks) * 100;
            console.log(`Progreso del checklist: ${progress}%`);
            
            // Mostrar mensaje de felicitación si se completó todo
            if (progress === 100) {
                showCompletionMessage();
            }
        }
    }
    
    function showCompletionMessage() {
        // Crear notificación temporal
        const notification = document.createElement('div');
        notification.className = 'completion-notification';
        notification.innerHTML = `
            <div style="position: fixed; top: 20px; right: 20px; background: var(--docs-success); color: white; 
                        padding: 16px 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); 
                        z-index: 1000; animation: slideInRight 0.3s ease;">
                <i class="fa-solid fa-check-circle" style="margin-right: 8px;"></i>
                ¡Excelente! Has completado todos los pasos
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Remover después de 4 segundos
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 4000);
    }
    
    function playSuccessSound() {
        // Crear un sonido suave de éxito usando Web Audio API
        try {
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            
            oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
            oscillator.frequency.exponentialRampToValueAtTime(1000, audioContext.currentTime + 0.1);
            
            gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);
            
            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.1);
        } catch (error) {
            // Silently fail if Web Audio API is not supported
        }
    }
    
    // ===================================
    // FEEDBACK SYSTEM
    // ===================================
    
    function initFeedback() {
        feedbackButtons.forEach(button => {
            button.addEventListener('click', function() {
                const isPositive = this.classList.contains('positive');
                sendFeedback(isPositive);
                
                // Deshabilitar botones después del click
                feedbackButtons.forEach(btn => btn.disabled = true);
                
                // Mostrar mensaje de agradecimiento
                showFeedbackThanks(isPositive);
            });
        });
    }
    
    function sendFeedback(isPositive) {
        // Aquí puedes enviar el feedback a tu servidor
        const feedbackData = {
            positive: isPositive,
            page: window.location.pathname,
            timestamp: new Date().toISOString(),
            userAgent: navigator.userAgent
        };
        
        console.log('Feedback enviado:', feedbackData);
        
        // Ejemplo de envío (descomenta si tienes un endpoint)
        /*
        fetch('/api/feedback', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(feedbackData)
        });
        */
    }
    
    function showFeedbackThanks(isPositive) {
        const feedbackSection = document.querySelector('.footer-content');
        const message = isPositive 
            ? '¡Gracias! Nos alegra que te haya sido útil 🎉'
            : 'Gracias por tu feedback. Trabajaremos para mejorar esta sección 💪';
        
        feedbackSection.innerHTML = `
            <div style="padding: 20px; background: var(--docs-bg-secondary); border-radius: 8px; border: 1px solid var(--docs-border);">
                <h3 style="margin: 0 0 8px 0; color: var(--docs-success);">Feedback recibido</h3>
                <p style="margin: 0; color: var(--docs-text-secondary);">${message}</p>
            </div>
        `;
    }
    
    // ===================================
    // SMOOTH SCROLLING PARA ENLACES INTERNOS
    // ===================================
    
    function initSmoothScrolling() {
        const internalLinks = document.querySelectorAll('a[href^="#"]');
        
        internalLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Actualizar URL sin recargar página
                    history.pushState(null, null, `#${targetId}`);
                }
            });
        });
    }
    
    // ===================================
    // SCROLL SPY PARA NAVIGATION
    // ===================================
    
    function initScrollSpy() {
        let ticking = false;
        
        function updateActiveNav() {
            const scrollPosition = window.scrollY + 100; // Offset para header
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionBottom = sectionTop + section.offsetHeight;
                const sectionId = section.getAttribute('id');
                
                if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                    // Actualizar navegación activa
                    navLinks.forEach(link => link.classList.remove('active'));
                    
                    const activeLink = document.querySelector(`.nav-link[href="#${sectionId}"]`);
                    if (activeLink) {
                        activeLink.classList.add('active');
                    }
                }
            });
            
            ticking = false;
        }
        
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateActiveNav);
                ticking = true;
            }
        }
        
        window.addEventListener('scroll', requestTick);
    }
    
    // ===================================
    // TOOLTIPS Y HELPERS
    // ===================================
    
    function initTooltips() {
        const tooltipTriggers = document.querySelectorAll('[data-tooltip]');
        
        tooltipTriggers.forEach(trigger => {
            trigger.addEventListener('mouseenter', function() {
                showTooltip(this);
            });
            
            trigger.addEventListener('mouseleave', function() {
                hideTooltip();
            });
        });
    }
    
    function showTooltip(element) {
        const tooltipText = element.getAttribute('data-tooltip');
        
        const tooltip = document.createElement('div');
        tooltip.id = 'custom-tooltip';
        tooltip.className = 'custom-tooltip';
        tooltip.textContent = tooltipText;
        tooltip.style.cssText = `
            position: absolute;
            background: #1a1f36;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12px;
            z-index: 1000;
            pointer-events: none;
            opacity: 0;
            transform: translateY(-5px);
            transition: all 0.2s ease;
        `;
        
        document.body.appendChild(tooltip);
        
        // Posicionar tooltip
        const rect = element.getBoundingClientRect();
        tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
        tooltip.style.top = rect.top - tooltip.offsetHeight - 8 + 'px';
        
        // Animar entrada
        setTimeout(() => {
            tooltip.style.opacity = '1';
            tooltip.style.transform = 'translateY(0)';
        }, 10);
    }
    
    function hideTooltip() {
        const tooltip = document.getElementById('custom-tooltip');
        if (tooltip) {
            tooltip.style.opacity = '0';
            tooltip.style.transform = 'translateY(-5px)';
            setTimeout(() => tooltip.remove(), 200);
        }
    }
    
    // ===================================
    // COPY TO CLIPBOARD
    // ===================================
    
    function initCopyToClipboard() {
        const codeBlocks = document.querySelectorAll('.code-example, .code-block');
        
        codeBlocks.forEach(block => {
            // Agregar botón de copiar
            const copyButton = document.createElement('button');
            copyButton.className = 'copy-button';
            copyButton.innerHTML = '<i class="fa-solid fa-copy"></i>';
            copyButton.style.cssText = `
                position: absolute;
                top: 8px;
                right: 8px;
                background: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                color: rgba(255, 255, 255, 0.7);
                padding: 6px 8px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 12px;
                transition: all 0.2s ease;
            `;
            
            // Hacer el bloque relativo para posicionar el botón
            block.style.position = 'relative';
            block.appendChild(copyButton);
            
            copyButton.addEventListener('click', function() {
                const code = block.querySelector('code');
                if (code) {
                    copyToClipboard(code.textContent);
                    
                    // Feedback visual
                    this.innerHTML = '<i class="fa-solid fa-check"></i>';
                    this.style.background = 'rgba(0, 217, 36, 0.2)';
                    this.style.color = '#00D924';
                    
                    setTimeout(() => {
                        this.innerHTML = '<i class="fa-solid fa-copy"></i>';
                        this.style.background = 'rgba(255, 255, 255, 0.1)';
                        this.style.color = 'rgba(255, 255, 255, 0.7)';
                    }, 2000);
                }
            });
            
            // Mostrar/ocultar botón en hover
            block.addEventListener('mouseenter', function() {
                copyButton.style.opacity = '1';
            });
            
            block.addEventListener('mouseleave', function() {
                copyButton.style.opacity = '0.7';
            });
        });
    }
    
    function copyToClipboard(text) {
        if (navigator.clipboard) {
            navigator.clipboard.writeText(text);
        } else {
            // Fallback para navegadores más antiguos
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
        }
    }
    
    // ===================================
    // MOBILE MENU TOGGLE
    // ===================================
    
    function initMobileMenu() {
        // Crear botón de menú móvil si no existe
        if (!document.querySelector('.mobile-menu-toggle')) {
            const menuToggle = document.createElement('button');
            menuToggle.className = 'mobile-menu-toggle';
            menuToggle.innerHTML = '<i class="fa-solid fa-bars"></i>';
            menuToggle.style.cssText = `
                display: none;
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 1001;
                background: var(--docs-primary);
                color: white;
                border: none;
                padding: 12px;
                border-radius: 8px;
                cursor: pointer;
                box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            `;
            
            document.body.appendChild(menuToggle);
            
            // Toggle functionality
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                
                // Cambiar icono
                const icon = this.querySelector('i');
                if (sidebar.classList.contains('open')) {
                    icon.className = 'fa-solid fa-times';
                } else {
                    icon.className = 'fa-solid fa-bars';
                }
            });
            
            // Cerrar menú al hacer click fuera
            document.addEventListener('click', function(e) {
                if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                    sidebar.classList.remove('open');
                    menuToggle.querySelector('i').className = 'fa-solid fa-bars';
                }
            });
            
            // Mostrar/ocultar botón según el tamaño de pantalla
            function toggleMobileButton() {
                if (window.innerWidth <= 1024) {
                    menuToggle.style.display = 'block';
                } else {
                    menuToggle.style.display = 'none';
                    sidebar.classList.remove('open');
                }
            }
            
            window.addEventListener('resize', toggleMobileButton);
            toggleMobileButton(); // Ejecutar al inicio
        }
    }
    
    // ===================================
    // ANIMACIONES CSS ADICIONALES
    // ===================================
    
    function addCustomAnimations() {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOutRight {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
            
            .copy-button {
                opacity: 0.7;
                transition: opacity 0.2s ease;
            }
            
            .copy-button:hover {
                background: rgba(255, 255, 255, 0.2) !important;
                color: rgba(255, 255, 255, 0.9) !important;
            }
        `;
        document.head.appendChild(style);
    }
    
    // ===================================
    // INICIALIZACIÓN
    // ===================================
    
    function init() {
        console.log('🚀 Inicializando Ayuda.js...');
        
        initSidebarNavigation();
        initSearch();
        initChecklist();
        initFeedback();
        initSmoothScrolling();
        initScrollSpy();
        initTooltips();
        initCopyToClipboard();
        initMobileMenu();
        addCustomAnimations();
        
        console.log('✅ Ayuda.js inicializado correctamente');
        
        // Manejar enlaces directos con hash
        if (window.location.hash) {
            const targetId = window.location.hash.substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                setTimeout(() => {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 500);
            }
        }
    }
    
    // Ejecutar inicialización
    init();
    
    // ===================================
    // UTILIDADES PÚBLICAS
    // ===================================
    
    // Exponer algunas funciones para uso global
    window.AyudaDocs = {
        search: searchContent,
        clearSearch: showAllContent,
        scrollToSection: function(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    };
});

// ===================================
// FUNCIONES DE UTILIDAD ADICIONALES
// ===================================

// Detectar modo oscuro del sistema
function detectDarkMode() {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.documentElement.classList.add('dark-mode');
    }
    
    // Escuchar cambios
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (e.matches) {
            document.documentElement.classList.add('dark-mode');
        } else {
            document.documentElement.classList.remove('dark-mode');
        }
    });
}

// Métricas básicas de uso
function trackPageMetrics() {
    const startTime = performance.now();
    
    window.addEventListener('beforeunload', function() {
        const endTime = performance.now();
        const timeSpent = Math.round(endTime - startTime);
        
        // Enviar métricas (opcional)
        console.log(`Tiempo en página: ${timeSpent}ms`);
    });
}

// Inicializar funciones adicionales
document.addEventListener('DOMContentLoaded', function() {
    detectDarkMode();
    trackPageMetrics();
});

// Service Worker para cache (opcional)
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        // Descomenta si quieres implementar cache offline
        /*
        navigator.serviceWorker.register('/sw.js')
            .then(function(registration) {
                console.log('SW registrado con éxito:', registration);
            })
            .catch(function(registrationError) {
                console.log('Error al registrar SW:', registrationError);
            });
        */
    });
}