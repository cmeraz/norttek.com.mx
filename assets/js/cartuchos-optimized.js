/**
 * cartuchos-optimized.js
 * Búsqueda híbrida: Local primero, luego servidor
 */

document.addEventListener('DOMContentLoaded', function() {
    // Referencias DOM básicas
    const tabBtns = document.querySelectorAll('.ejemplo-tab-btn');
    const buscador = document.getElementById('buscador');
    const limpiarBtn = document.getElementById('limpiarBusqueda');
    const botonBuscar = document.getElementById('botonBuscar');
    const contador = document.getElementById('total-resultados');

    // Datos de la página
    const datosCartuchos = window.cartuchosData || {};

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
    // Búsqueda híbrida inteligente
    // ==========================
    function initBusquedaHibrida() {
        if (!buscador) return;

        let timeoutBusqueda;

        // Búsqueda en tiempo real (solo en página actual)
        buscador.addEventListener('input', function() {
            clearTimeout(timeoutBusqueda);
            cancelarBusquedaAutomatica(); // Cancelar auto-búsqueda si sigue escribiendo
            
            const query = this.value.toLowerCase().trim();
            
            // Búsqueda inmediata si hay menos de 2 caracteres
            if (query.length < 2) {
                mostrarTodosLosElementos();
                actualizarContador();
                return;
            }

            // Debounce corto para búsqueda local
            timeoutBusqueda = setTimeout(() => {
                buscarEnPaginaActual(query);
            }, 150);
        });

        // Submit solo con Enter o click en botón
        buscador.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                realizarBusquedaCompleta();
            }
        });

        if (botonBuscar) {
            botonBuscar.addEventListener('click', function(e) {
                e.preventDefault();
                realizarBusquedaCompleta();
            });
        }

        if (limpiarBtn) {
            limpiarBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.location.href = '?';
            });
        }
    }

    // Buscar solo en los elementos de la página actual
    function buscarEnPaginaActual(query) {
        const elementos = document.querySelectorAll('.cartucho-row');
        let visibles = 0;
        let hayCoincidencias = false;

        elementos.forEach(elemento => {
            const texto = elemento.textContent.toLowerCase();
            const coincide = texto.includes(query);
            
            elemento.style.display = coincide ? '' : 'none';
            if (coincide) {
                visibles++;
                hayCoincidencias = true;
            }
        });

        actualizarContador(visibles);
        
        // Mostrar indicador y auto-enviar si no hay resultados
        mostrarIndicadorBusqueda(query, hayCoincidencias, visibles);
        
        // Auto-enviar búsqueda completa si no hay resultados locales
        if (!hayCoincidencias && query.length >= 2) {
            programarBusquedaAutomatica(query);
        }
    }

    // Programar búsqueda automática después de unos segundos
    let timeoutBusquedaAutomatica;
    function programarBusquedaAutomatica(query) {
        // Cancelar búsqueda automática anterior
        clearTimeout(timeoutBusquedaAutomatica);
        
        // Programar nueva búsqueda automática
        timeoutBusquedaAutomatica = setTimeout(() => {
            // Verificar que el usuario no haya cambiado la búsqueda
            if (buscador.value.toLowerCase().trim() === query) {
                console.log('Auto-enviando búsqueda completa para:', query);
                
                // Mostrar indicador de auto-búsqueda
                mostrarIndicadorAutoBusqueda(query);
                
                // Enviar búsqueda completa automáticamente
                setTimeout(() => {
                    buscador.closest('form').submit();
                }, 1000); // 1 segundo más para mostrar el indicador
            }
        }, 2500); // 2.5 segundos de espera
    }

    // Cancelar búsqueda automática si el usuario sigue escribiendo
    function cancelarBusquedaAutomatica() {
        clearTimeout(timeoutBusquedaAutomatica);
        limpiarCuentaRegresiva();
    }

    // Realizar búsqueda completa en servidor
    function realizarBusquedaCompleta() {
        const query = buscador.value.trim();
        if (query) {
            // Mostrar loading
            if (botonBuscar) {
                const icon = botonBuscar.querySelector('i');
                icon.className = 'fa-solid fa-spinner fa-spin text-sm';
            }
            
            // Submit el formulario
            buscador.closest('form').submit();
        }
    }

    // Mostrar todos los elementos (limpiar filtro local)
    function mostrarTodosLosElementos() {
        const elementos = document.querySelectorAll('.cartucho-row');
        elementos.forEach(elemento => {
            elemento.style.display = '';
        });
        ocultarIndicadorBusqueda();
    }

    // Actualizar contador
    function actualizarContador(visible = null) {
        if (!contador) return;
        
        if (visible !== null) {
            contador.textContent = visible;
        } else {
            // Contar elementos visibles
            const elementosVisibles = document.querySelectorAll('.cartucho-row:not([style*="display: none"])');
            contador.textContent = elementosVisibles.length;
        }
    }

    // Mostrar indicador de búsqueda
    function mostrarIndicadorBusqueda(query, hayCoincidencias, resultados) {
        // Remover indicador anterior
        ocultarIndicadorBusqueda();

        if (!hayCoincidencias && query.length > 0) {
            // No hay resultados en página actual - con cuenta regresiva
            const indicador = document.createElement('div');
            indicador.id = 'indicador-busqueda';
            indicador.className = 'mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg text-center';
            indicador.innerHTML = `
                <div class="text-yellow-800 mb-2">
                    <i class="fa-solid fa-search text-yellow-600 mr-2"></i>
                    No se encontraron resultados para "<strong>${query}</strong>" en esta página
                </div>
                <div class="flex items-center justify-center gap-4">
                    <div class="text-blue-600 text-sm">
                        <i class="fa-solid fa-clock mr-1"></i>
                        Buscando en BD completa en <span id="countdown" class="font-bold">3</span>s...
                    </div>
                    <button onclick="document.getElementById('buscador').closest('form').submit()" 
                            class="inline-flex items-center px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm">
                        <i class="fa-solid fa-globe mr-2"></i>
                        Buscar ahora
                    </button>
                </div>
            `;
            
            // Insertar después del buscador
            const buscadorContainer = document.querySelector('.max-w-2xl.mx-auto.mb-8');
            if (buscadorContainer) {
                buscadorContainer.appendChild(indicador);
                
                // Iniciar cuenta regresiva
                iniciarCuentaRegresiva();
            }
        } else if (hayCoincidencias && resultados > 0) {
            // Hay resultados en página actual
            const indicador = document.createElement('div');
            indicador.id = 'indicador-busqueda';
            indicador.className = 'mt-2 text-center';
            indicador.innerHTML = `
                <div class="inline-flex items-center px-3 py-1 bg-green-50 text-green-700 rounded-full text-xs">
                    <i class="fa-solid fa-check-circle mr-1"></i>
                    ${resultados} resultado${resultados !== 1 ? 's' : ''} en página actual
                    <button onclick="document.getElementById('buscador').closest('form').submit()" 
                            class="ml-2 text-blue-600 hover:text-blue-800 underline">
                        Ver todos
                    </button>
                </div>
            `;
            
            const buscadorContainer = document.querySelector('.max-w-2xl.mx-auto.mb-8');
            if (buscadorContainer) {
                buscadorContainer.appendChild(indicador);
            }
        }
    }

    // Cuenta regresiva visual
    let intervaloCuentaRegresiva;
    function iniciarCuentaRegresiva() {
        let tiempo = 3;
        const countdownElement = document.getElementById('countdown');
        
        intervaloCuentaRegresiva = setInterval(() => {
            tiempo--;
            if (countdownElement) {
                countdownElement.textContent = tiempo;
            }
            
            if (tiempo <= 0) {
                clearInterval(intervaloCuentaRegresiva);
            }
        }, 1000);
    }

    // Limpiar cuenta regresiva
    function limpiarCuentaRegresiva() {
        clearInterval(intervaloCuentaRegresiva);
    }

    // Mostrar indicador de auto-búsqueda
    function mostrarIndicadorAutoBusqueda(query) {
        // Remover indicador anterior
        ocultarIndicadorBusqueda();
        
        const indicador = document.createElement('div');
        indicador.id = 'indicador-busqueda';
        indicador.className = 'mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg text-center';
        indicador.innerHTML = `
            <div class="text-blue-800 mb-2">
                <i class="fa-solid fa-spinner fa-spin text-blue-600 mr-2"></i>
                Buscando "<strong>${query}</strong>" en toda la base de datos...
            </div>
            <div class="text-blue-600 text-sm">
                No se encontró en la página actual, buscando en ${datosCartuchos.totalCartuchos || '5,000+'} cartuchos
            </div>
        `;
        
        // Insertar después del buscador
        const buscadorContainer = document.querySelector('.max-w-2xl.mx-auto.mb-8');
        if (buscadorContainer) {
            buscadorContainer.appendChild(indicador);
        }
    }

    // Ocultar indicador de búsqueda
    function ocultarIndicadorBusqueda() {
        const indicador = document.getElementById('indicador-busqueda');
        if (indicador) {
            indicador.remove();
        }
        limpiarCuentaRegresiva();
    }

    // Mostrar todos los elementos (limpiar filtro local)
    function mostrarTodosLosElementos() {
        const elementos = document.querySelectorAll('.cartucho-row');
        elementos.forEach(elemento => {
            elemento.style.display = '';
        });
        ocultarIndicadorBusqueda();
        cancelarBusquedaAutomatica();
    }

    // Cancelar búsqueda automática si el usuario sigue escribiendo
    function cancelarBusquedaAutomatica() {
        clearTimeout(timeoutBusquedaAutomatica);
        limpiarCuentaRegresiva();
    }

    // ==========================
    // Inicialización 
    // ==========================
    function init() {
        initTabs();
        initBusquedaHibrida();
        
        // Mostrar info de datos cargados
        if (datosCartuchos.cartuchosPagina) {
            console.log('Cartuchos híbridos cargados:');
            console.log('- En página actual:', datosCartuchos.cartuchosPagina.length);
            console.log('- Total en BD:', datosCartuchos.totalCartuchos);
            console.log('- Página actual:', datosCartuchos.paginaActual);
            console.log('- Búsqueda activa:', datosCartuchos.busquedaActiva || 'ninguna');
        }

        // Focus automático en buscador si no hay búsqueda activa
        if (buscador && !datosCartuchos.busquedaActiva) {
            setTimeout(() => {
                buscador.focus();
            }, 100);
        }
    }

    // Inicializar
    init();
});