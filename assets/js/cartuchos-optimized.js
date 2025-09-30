/**
 * cartuchos-optimized.js
 * Búsqueda híbrida: Local primero, luego servidor
 */

// ==========================
// FUNCIONALIDAD DE BÚSQUEDA POR FOTO - GLOBAL
// ==========================

// Modal para tomar o cargar foto (disponible globalmente)
window.showFotoModal = function() {
    // Eliminar modal anterior
    let oldModal = document.getElementById('foto-modal');
    if (oldModal) oldModal.remove();

    // Crear modal
    const modal = document.createElement('div');
    modal.id = 'foto-modal';
    modal.className = 'fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50';

    const box = document.createElement('div');
    box.className = 'bg-white p-6 rounded-xl max-w-md mx-4 text-center transform transition-all duration-300 opacity-0 scale-95';

    // Botón cerrar
    const closeBtn = document.createElement('button');
    closeBtn.innerHTML = '×';
    closeBtn.className = 'absolute top-2 right-4 text-gray-400 text-3xl hover:text-gray-600 bg-transparent border-none cursor-pointer';
    closeBtn.addEventListener('click', () => modal.remove());
    box.style.position = 'relative';
    box.appendChild(closeBtn);

    // Imagen de ejemplo
    const ejemploImg = document.createElement('img');
    ejemploImg.src = 'assets/img/ejemplo-modelo-impresora.jpg';
    ejemploImg.alt = 'Ejemplo de foto de modelo de impresora';
    ejemploImg.className = 'w-full max-w-sm rounded-lg shadow-sm mb-4 mx-auto';
    box.appendChild(ejemploImg);

    // Instrucciones
    const instrucciones = document.createElement('div');
    instrucciones.innerHTML = `
        <h3 class="font-semibold text-blue-700 mb-3 text-lg">
            <i class="fas fa-info-circle mr-2"></i>¿Cómo tomar la foto?
        </h3>
        <ul class="text-left text-sm text-gray-700 space-y-2 mb-4">
            <li>• Enfoca solo la zona donde aparece el <strong>modelo exacto</strong></li>
            <li>• Evita reflejos, sombras o desenfoque</li>
            <li>• El modelo debe estar <strong>derecho y legible</strong></li>
            <li>• Ejemplo: <code class="bg-gray-100 px-2 py-1 rounded">LaserJet Pro M404dn</code></li>
        </ul>
    `;
    box.appendChild(instrucciones);

    // Input file oculto
    const fotoInput = document.createElement('input');
    fotoInput.type = 'file';
    fotoInput.accept = 'image/*';
    fotoInput.className = 'hidden';
    box.appendChild(fotoInput);

    // Botón para seleccionar foto
    const tomarBtn = document.createElement('button');
    tomarBtn.innerHTML = `
        <i class="fas fa-camera mr-2"></i>
        Seleccionar Foto
    `;
    tomarBtn.className = 'bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200';
    tomarBtn.addEventListener('click', () => fotoInput.click());
    box.appendChild(tomarBtn);

    // Evento para manejar imagen seleccionada
    fotoInput.addEventListener('change', function() {
        if (!this.files || !this.files[0]) return;
        modal.remove();
        const file = this.files[0];
        
        // Verificar si Cropper está disponible
        if (typeof Cropper !== 'undefined') {
            window.showCropperModal(URL.createObjectURL(file));
        } else {
            // Si no hay Cropper, analizar directamente
            window.analizarImagen(file);
        }
    });

    modal.appendChild(box);
    document.body.appendChild(modal);

    // Animación de aparición
    setTimeout(() => {
        box.classList.remove('opacity-0', 'scale-95');
        box.classList.add('opacity-100', 'scale-100');
    }, 10);
};

// Modal de recorte con Cropper.js (disponible globalmente)
window.showCropperModal = function(imageSrc) {
    let oldModal = document.getElementById('cropper-modal');
    if (oldModal) oldModal.remove();

    const modal = document.createElement('div');
    modal.id = 'cropper-modal';
    modal.className = 'fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50';

    const box = document.createElement('div');
    box.className = 'bg-white p-4 rounded-xl max-w-4xl max-h-[90vh] overflow-auto text-center transform transition-all duration-300 opacity-0 scale-95';

    const title = document.createElement('h2');
    title.textContent = 'Recorta la zona del modelo de la impresora';
    title.className = 'text-lg font-semibold mb-4';
    box.appendChild(title);

    const img = document.createElement('img');
    img.src = imageSrc;
    img.className = 'max-w-full max-h-96 mx-auto block mb-4';
    box.appendChild(img);

    // Botones
    const buttonContainer = document.createElement('div');
    buttonContainer.className = 'flex gap-2 justify-center flex-wrap';

    const rotateBtn = document.createElement('button');
    rotateBtn.textContent = 'Rotar 90°';
    rotateBtn.className = 'bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg';

    const cropBtn = document.createElement('button');
    cropBtn.textContent = 'Usar recorte';
    cropBtn.className = 'bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg';

    const cancelBtn = document.createElement('button');
    cancelBtn.textContent = 'Cancelar';
    cancelBtn.className = 'bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg';

    buttonContainer.appendChild(rotateBtn);
    buttonContainer.appendChild(cropBtn);
    buttonContainer.appendChild(cancelBtn);
    box.appendChild(buttonContainer);

    modal.appendChild(box);
    document.body.appendChild(modal);

    // Inicializar Cropper
    let cropper = new Cropper(img, {
        viewMode: 1,
        aspectRatio: NaN,
        autoCropArea: 0.7,
        movable: true,
        zoomable: true,
        scalable: true,
        rotatable: true,
        responsive: true,
        background: false
    });

    // Eventos de botones
    rotateBtn.addEventListener('click', () => cropper.rotate(90));
    
    cropBtn.addEventListener('click', async () => {
        const canvas = cropper.getCroppedCanvas({
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high'
        });
        modal.remove();
        canvas.toBlob(async (blob) => {
            await window.analizarImagen(blob);
        }, 'image/png');
    });

    cancelBtn.addEventListener('click', () => modal.remove());

    // Animación de aparición
    setTimeout(() => {
        box.classList.remove('opacity-0', 'scale-95');
        box.classList.add('opacity-100', 'scale-100');
    }, 10);
};

// Analizar imagen con OCR (disponible globalmente)
window.analizarImagen = async function(fileOrBlob) {
    // Mostrar estado de carga
    const buscador = document.getElementById('buscador');
    if (!buscador) return;

    const valorOriginal = buscador.value;
    buscador.value = "🔍 Analizando imagen...";
    buscador.disabled = true;

    try {
        // Usar Tesseract.js para OCR
        if (typeof Tesseract === 'undefined') {
            throw new Error('Tesseract.js no está disponible');
        }

        const { data: { text } } = await Tesseract.recognize(
            fileOrBlob,
            'eng',
            {
                logger: m => console.log('OCR:', m),
                preserve_interword_spaces: 1
            }
        );

        console.log('Texto detectado:', text);

        // Buscar patrones de modelos de impresora mejorados
        const lines = text.split('\n').map(l => l.trim()).filter(l => l.length > 0);
        
        // Patrones comunes de modelos de impresora
        const patterns = [
            // HP LaserJet, OfficeJet, DeskJet, etc.
            /\b(LaserJet|OfficeJet|DeskJet|Envy|PhotoSmart)\s+(Pro\s+)?([A-Z]*\d+[A-Z0-9]*)\b/gi,
            // Samsung ML, SCX, SL, etc.
            /\b(ML|SCX|SL|CLX|CLP)-?(\d+[A-Z0-9]*)\b/gi,
            // Brother HL, DCP, MFC, etc.
            /\b(HL|DCP|MFC|FAX)-?(\d+[A-Z0-9]*)\b/gi,
            // Canon i-SENSYS, PIXMA, etc.
            /\b(i-SENSYS|PIXMA|imageCLASS)\s+([A-Z]*\d+[A-Z0-9]*)\b/gi,
            // Epson WorkForce, Expression, etc.
            /\b(WorkForce|Expression|EcoTank)\s+([A-Z]*\d+[A-Z0-9]*)\b/gi,
            // Xerox Phaser, WorkCentre, etc.
            /\b(Phaser|WorkCentre)\s+(\d+[A-Z0-9]*)\b/gi,
            // Kyocera TASKalfa, ECOSYS, etc.
            /\b(TASKalfa|ECOSYS|FS)\s*-?(\d+[A-Z0-9]*)\b/gi,
            // Patrón genérico para modelos alfanuméricos
            /\b([A-Z]{1,4}\d{2,5}[A-Z0-9]{0,6})\b/gi
        ];
        
        let modelos = [];
        
        lines.forEach(line => {
            patterns.forEach(pattern => {
                const matches = [...line.matchAll(pattern)];
                matches.forEach(match => {
                    if (match.length >= 3) {
                        // Para patrones con marca y modelo
                        const marca = match[1];
                        const modelo = match[match.length - 1]; // Último grupo capturado
                        modelos.push(`${marca} ${modelo}`.trim());
                    } else if (match.length === 2) {
                        // Para patrón genérico
                        modelos.push(match[1].trim());
                    }
                });
            });
        });

        // Filtrar y limpiar modelos únicos
        modelos = [...new Set(modelos)]
            .filter(m => {
                const cleaned = m.trim();
                // Filtrar modelos muy cortos o que sean solo números
                return cleaned.length >= 3 && 
                       !/^\d+$/.test(cleaned) && 
                       !/^[A-Z]+$/.test(cleaned);
            })
            .map(m => m.trim())
            .sort((a, b) => {
                // Priorizar modelos con marcas conocidas
                const marcasConocidas = ['LaserJet', 'OfficeJet', 'DeskJet', 'Envy', 'ML', 'SCX', 'HL', 'DCP', 'MFC'];
                const aHasMarca = marcasConocidas.some(marca => a.includes(marca));
                const bHasMarca = marcasConocidas.some(marca => b.includes(marca));
                if (aHasMarca && !bHasMarca) return -1;
                if (!aHasMarca && bHasMarca) return 1;
                return a.length - b.length; // Modelos más cortos primero
            })
            .slice(0, 5); // Máximo 5 modelos

        console.log('Modelos detectados:', modelos);

        buscador.disabled = false;

        if (modelos.length > 0) {
            window.showModelModal(modelos, (selectedModel) => {
                buscador.value = selectedModel;
                // Disparar búsqueda
                const inputEvent = new Event('input', { bubbles: true });
                buscador.dispatchEvent(inputEvent);
            });
        } else {
            // Si no se detectaron modelos, usar primera línea de texto
            const firstLine = lines[0] || text.substring(0, 50);
            buscador.value = firstLine.trim();
            
            // Mostrar mensaje informativo
            window.mostrarMensaje('No se detectaron modelos específicos. Se usó el texto: "' + firstLine + '"', 'warning');
            
            // Disparar búsqueda
            const inputEvent = new Event('input', { bubbles: true });
            buscador.dispatchEvent(inputEvent);
        }

    } catch (error) {
        console.error('Error en OCR:', error);
        buscador.value = valorOriginal;
        buscador.disabled = false;
        window.mostrarMensaje('Error al analizar la imagen. Intenta con una foto más clara.', 'error');
    }
};

// Modal para seleccionar modelo detectado (disponible globalmente)
window.showModelModal = function(modelos, onSelect) {
    let oldModal = document.getElementById('modelo-modal');
    if (oldModal) oldModal.remove();

    const modal = document.createElement('div');
    modal.id = 'modelo-modal';
    modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';

    const box = document.createElement('div');
    box.className = 'bg-white p-6 rounded-xl max-w-md mx-4 text-center transform transition-all duration-300 opacity-0 scale-95';

    const title = document.createElement('h2');
    title.innerHTML = '<i class="fas fa-search mr-2 text-blue-600"></i>Modelos detectados';
    title.className = 'text-xl font-semibold mb-4 text-gray-800';
    box.appendChild(title);

    const subtitle = document.createElement('p');
    subtitle.textContent = 'Selecciona el modelo de tu impresora:';
    subtitle.className = 'text-gray-600 mb-4';
    box.appendChild(subtitle);

    // Botones para cada modelo detectado
    modelos.forEach((modelo, index) => {
        const btn = document.createElement('button');
        btn.textContent = modelo;
        btn.className = 'block w-full mb-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg font-medium transition-colors duration-200';
        btn.addEventListener('click', () => {
            modal.remove();
            onSelect(modelo);
        });
        box.appendChild(btn);
    });

    // Input manual
    const manualContainer = document.createElement('div');
    manualContainer.className = 'mt-4 pt-4 border-t border-gray-200';
    
    const manualLabel = document.createElement('p');
    manualLabel.textContent = '¿No aparece tu modelo?';
    manualLabel.className = 'text-sm text-gray-600 mb-2';
    manualContainer.appendChild(manualLabel);

    const manualInput = document.createElement('input');
    manualInput.type = 'text';
    manualInput.placeholder = 'Escribe el modelo aquí';
    manualInput.className = 'w-full px-3 py-2 border border-gray-300 rounded-lg mb-2 focus:outline-none focus:border-blue-500';
    manualContainer.appendChild(manualInput);

    const manualBtn = document.createElement('button');
    manualBtn.textContent = 'Usar este modelo';
    manualBtn.className = 'w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg';
    manualBtn.addEventListener('click', () => {
        const valor = manualInput.value.trim();
        if (valor) {
            modal.remove();
            onSelect(valor);
        }
    });
    manualContainer.appendChild(manualBtn);

    box.appendChild(manualContainer);

    // Botón cerrar
    const closeBtn = document.createElement('button');
    closeBtn.textContent = 'Cancelar';
    closeBtn.className = 'mt-4 text-gray-500 hover:text-gray-700 bg-transparent border-none cursor-pointer';
    closeBtn.addEventListener('click', () => modal.remove());
    box.appendChild(closeBtn);

    modal.appendChild(box);
    document.body.appendChild(modal);

    // Animación de aparición
    setTimeout(() => {
        box.classList.remove('opacity-0', 'scale-95');
        box.classList.add('opacity-100', 'scale-100');
    }, 10);

    // Focus en primer botón o input manual
    setTimeout(() => {
        if (modelos.length > 0) {
            box.querySelector('button').focus();
        } else {
            manualInput.focus();
        }
    }, 100);
};

// Función para mostrar mensajes (disponible globalmente)
window.mostrarMensaje = function(texto, tipo = 'info') {
    // Crear elemento de mensaje
    const mensaje = document.createElement('div');
    const iconos = {
        'info': 'fas fa-info-circle',
        'success': 'fas fa-check-circle',
        'warning': 'fas fa-exclamation-triangle',
        'error': 'fas fa-times-circle'
    };
    
    const colores = {
        'info': 'bg-blue-100 border-blue-400 text-blue-700',
        'success': 'bg-green-100 border-green-400 text-green-700',
        'warning': 'bg-yellow-100 border-yellow-400 text-yellow-700',
        'error': 'bg-red-100 border-red-400 text-red-700'
    };

    mensaje.innerHTML = `
        <i class="${iconos[tipo]} mr-2"></i>
        ${texto}
    `;
    mensaje.className = `fixed top-4 right-4 z-50 ${colores[tipo]} border px-4 py-3 rounded-lg shadow-lg max-w-sm transform transition-all duration-300 translate-x-full opacity-0`;

    document.body.appendChild(mensaje);

    // Animación de entrada
    setTimeout(() => {
        mensaje.classList.remove('translate-x-full', 'opacity-0');
    }, 10);

    // Auto-remover después de 5 segundos
    setTimeout(() => {
        mensaje.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => mensaje.remove(), 300);
    }, 5000);
};

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

    // Configurar botón de foto
    function configurarFotoBtn() {
        const fotoBtn = document.getElementById('fotoBtn');
        if (!fotoBtn) return;
        
        fotoBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.showFotoModal();
        });
    }

    // Inicializar funcionalidad de foto
    configurarFotoBtn();
});