/**
 * cartuchos.js - Modernizado
 * Funcionalidad principal para la página de cartuchos
 */

document.addEventListener('DOMContentLoaded', function() {
    // ==========================
    // Variables globales y referencias DOM
    // ==========================
    const buscador = document.getElementById('buscador');
    const fotoBtn = document.getElementById('fotoBtn');
    const btnBorrar = document.getElementById('limpiarBusqueda');
    const contador = document.getElementById('total-resultados');
    const filas = document.querySelectorAll(".cartucho-row");

    // Referencias para las pestañas modernizadas
    const tabBtns = document.querySelectorAll('.ejemplo-tab-btn');
    const tablaSection = document.querySelector('#compatibilidades');
    const faqSection = document.querySelector('#preguntas-frecuentes');

    // ==========================
    // Sistema de pestañas modernizado
    // ==========================
    function initModernTabs() {
        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const tabId = this.dataset.tab;
                
                // Actualizar botones
                tabBtns.forEach(b => {
                    const icon = b.querySelector('div');
                    const iconI = icon.querySelector('i');
                    
                    b.classList.remove('active');
                    b.classList.add('text-gray-600', 'hover:text-gray-900');
                    icon.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-purple-600');
                    icon.classList.add('bg-gray-200');
                    iconI.classList.remove('text-white');
                    iconI.classList.add('text-gray-600');
                });
                
                // Activar botón seleccionado
                this.classList.add('active');
                this.classList.remove('text-gray-600', 'hover:text-gray-900');
                const activeIcon = this.querySelector('div');
                const activeIconI = activeIcon.querySelector('i');
                activeIcon.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-purple-600');
                activeIcon.classList.remove('bg-gray-200');
                activeIconI.classList.add('text-white');
                activeIconI.classList.remove('text-gray-600');
                
                // Mostrar/ocultar secciones con animación
                if (tabId === 'tab1') {
                    showSection(tablaSection);
                    hideSection(faqSection);
                } else if (tabId === 'tab2') {
                    showSection(faqSection);
                    hideSection(tablaSection);
                }
            });
        });
    }

    function showSection(section) {
        section.classList.remove('hidden');
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            section.style.transition = 'all 0.3s ease';
            section.style.opacity = '1';
            section.style.transform = 'translateY(0)';
        }, 10);
    }

    function hideSection(section) {
        section.style.transition = 'all 0.3s ease';
        section.style.opacity = '0';
        section.style.transform = 'translateY(-20px)';
        
        setTimeout(() => {
            section.classList.add('hidden');
        }, 300);
    }

    // ==========================
    // Función de búsqueda mejorada
    // ==========================
    function configurarBusqueda() {
        if (!buscador) return;
        
        buscador.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            filtrarTabla(query);
        });

        if (btnBorrar) {
            btnBorrar.addEventListener('click', function() {
                buscador.value = '';
                filtrarTabla('');
                buscador.focus();
            });
        }
    }

    function filtrarTabla(query) {
        let visibles = 0;
        
        filas.forEach(fila => {
            const texto = fila.textContent.toLowerCase();
            const coincide = query === '' || texto.includes(query);
            
            if (coincide) {
                fila.style.display = '';
                fila.style.animation = 'fadeIn 0.3s ease';
                visibles++;
            } else {
                fila.style.display = 'none';
            }
        });
        
        actualizarContador(visibles);
    }

    function actualizarContador(visible) {
        if (contador) {
            contador.textContent = visible;
        }
    }

    function contarResultados() {
        if (contador) {
            contador.textContent = filas.length;
        }
    }

    // ==========================
    // Función de foto simplificada
    // ==========================
    function configurarFotoBtn() {
        if (!fotoBtn) return;
        
        fotoBtn.addEventListener('click', function() {
            // Mostrar notificación moderna
            showNotification('Funcionalidad de búsqueda por foto próximamente. ¡Usa el buscador de texto mientras tanto!');
        });
    }

    function showNotification(message) {
        // Crear notificación moderna
        const notification = document.createElement('div');
        notification.className = 'fixed top-20 right-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-4 rounded-2xl shadow-xl z-50 transform translate-x-full transition-transform duration-300';
        notification.innerHTML = `
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-info-circle"></i>
                <span>${message}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-2 text-white/80 hover:text-white">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(full)';
            setTimeout(() => notification.remove(), 300);
        }, 4000);
    }

    // ==========================
    // Efectos visuales adicionales
    // ==========================
    function initVisualEffects() {
        // Efecto hover mejorado en filas de tabla
        filas.forEach(fila => {
            fila.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.01)';
                this.style.boxShadow = '0 10px 25px rgba(0,0,0,0.1)';
                this.style.transition = 'all 0.3s ease';
            });
            
            fila.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = '';
            });
        });

        // Efecto en el buscador
        if (buscador) {
            buscador.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
                this.parentElement.style.boxShadow = '0 20px 40px rgba(59, 130, 246, 0.15)';
            });
            
            buscador.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
                this.parentElement.style.boxShadow = '';
            });
        }
    }

    // ==========================
    // FAQ Functionality - Mejorada
    // ==========================
    function initFAQFunctionality() {
        // Esperar un poco para que el DOM se cargue completamente
        setTimeout(() => {
            // Inicializar FAQ toggles
            const faqToggles = document.querySelectorAll('[data-faq-toggle]');
            const faqSearch = document.querySelector('[data-faq-search]');
            const faqExpand = document.querySelector('[data-faq-expand]');
            const faqCollapse = document.querySelector('[data-faq-collapse]');

            // Toggle individual FAQ items
            faqToggles.forEach((toggle, index) => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const expanded = this.getAttribute('aria-expanded') === 'true';
                    const targetId = this.getAttribute('aria-controls');
                    const target = targetId ? document.getElementById(targetId) : null;
                    const item = this.closest('.nt-faq-item');

                    if (target && item) {
                        if (expanded) {
                            // Cerrar
                            this.setAttribute('aria-expanded', 'false');
                            target.setAttribute('aria-hidden', 'true');
                            target.setAttribute('hidden', '');
                            item.setAttribute('data-expanded', 'false');
                            
                            // Animación de cierre
                            target.style.maxHeight = '0px';
                            target.style.opacity = '0';
                            target.style.paddingTop = '0px';
                        } else {
                            // Abrir
                            this.setAttribute('aria-expanded', 'true');
                            target.setAttribute('aria-hidden', 'false');
                            target.removeAttribute('hidden');
                            item.setAttribute('data-expanded', 'true');
                            
                            // Animación de apertura
                            target.style.maxHeight = '800px';
                            target.style.opacity = '1';
                            target.style.paddingTop = '8px';
                        }
                    }
                });
            });

            // Búsqueda en FAQ
            if (faqSearch) {
                faqSearch.addEventListener('input', function() {
                    const query = this.value.toLowerCase().trim();
                    const items = document.querySelectorAll('.nt-faq-item');

                    items.forEach(item => {
                        const text = item.textContent.toLowerCase();
                        const matches = query === '' || text.includes(query);
                        
                        if (matches) {
                            item.classList.remove('nt-faq-hidden');
                            item.style.display = '';
                        } else {
                            item.classList.add('nt-faq-hidden');
                            item.style.display = 'none';
                        }
                    });
                });
            }

            // Expandir todos
            if (faqExpand) {
                faqExpand.addEventListener('click', function(e) {
                    e.preventDefault();
                    faqToggles.forEach(toggle => {
                        const targetId = toggle.getAttribute('aria-controls');
                        const target = document.getElementById(targetId);
                        const item = toggle.closest('.nt-faq-item');

                        if (target && item && !item.classList.contains('nt-faq-hidden')) {
                            toggle.setAttribute('aria-expanded', 'true');
                            target.setAttribute('aria-hidden', 'false');
                            target.removeAttribute('hidden');
                            item.setAttribute('data-expanded', 'true');
                            
                            target.style.maxHeight = '800px';
                            target.style.opacity = '1';
                            target.style.paddingTop = '8px';
                        }
                    });
                });
            }

            // Colapsar todos
            if (faqCollapse) {
                faqCollapse.addEventListener('click', function(e) {
                    e.preventDefault();
                    faqToggles.forEach(toggle => {
                        const targetId = toggle.getAttribute('aria-controls');
                        const target = document.getElementById(targetId);
                        const item = toggle.closest('.nt-faq-item');

                        if (target && item) {
                            toggle.setAttribute('aria-expanded', 'false');
                            target.setAttribute('aria-hidden', 'true');
                            target.setAttribute('hidden', '');
                            item.setAttribute('data-expanded', 'false');
                            
                            target.style.maxHeight = '0px';
                            target.style.opacity = '0';
                            target.style.paddingTop = '0px';
                        }
                    });
                });
            }
        }, 300);
    }

    // Hacer disponible globalmente para compatibilidad
    window.NTFaqApply = function(searchInput) {
        if (!searchInput) return;
        
        const query = searchInput.value.toLowerCase().trim();
        const items = document.querySelectorAll('.nt-faq-item');

        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            const matches = query === '' || text.includes(query);
            
            if (matches) {
                item.classList.remove('nt-faq-hidden');
                item.style.display = '';
            } else {
                item.classList.add('nt-faq-hidden');
                item.style.display = 'none';
            }
        });
    };

    // ==========================
    // Inicialización de todas las funcionalidades
    // ==========================
    initModernTabs();
    configurarBusqueda();
    configurarFotoBtn();
    contarResultados();
    initVisualEffects();
    initFAQFunctionality();

    // Mostrar primera pestaña por defecto
    if (tabBtns.length > 0) {
        tabBtns[0].click();
    }
});

// Estilos CSS adicionales para animaciones
const styleSheet = document.createElement('style');
styleSheet.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .cartucho-row {
        transition: all 0.3s ease;
    }
    
    .ejemplo-tab-btn {
        transition: all 0.3s ease;
    }
    
    .ejemplo-tab-btn.active {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        color: #0f172a;
        transform: translateY(-1px);
    }
`;
document.head.appendChild(styleSheet);