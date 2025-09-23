/**
 * cartuchos.js
 * Funcionalidad principal para la página de cartuchos:
 * - Modal de foto y recorte con Cropper.js
 * - OCR para detectar modelo de impresora
 * - Filtrado en vivo de tabla de cartuchos
 * - Tabs horizontales y verticales (incluyendo FAQ)
 * - Inicialización de animación FAQ (sin GSAP)
 * 
 * Estructura modular y comentarios para facilitar mantenimiento.
 */

document.addEventListener('DOMContentLoaded', function() {
    // ==========================
    // Variables globales y referencias DOM
    // ==========================
    const buscador = document.getElementById('buscador'); // Input de búsqueda de cartuchos
    const fotoBtn = document.getElementById('fotoBtn'); // Botón para abrir modal de foto
    const btnBorrar = document.getElementById('limpiarBusqueda'); // Botón para limpiar búsqueda
    const contador = document.getElementById('total-resultados'); // Elemento que muestra el total de resultados
    const filas = document.querySelectorAll(".cartucho-row"); // Filas de la tabla de cartuchos

    // ==========================
    // Cargar dinámicamente Cropper.js si es necesario
    // ==========================
    // Carga la librería Cropper.js solo si no está cargada
    function loadCropperAssets(callback) {
        if (window.Cropper) return callback();
        // Cargar CSS de Cropper.js
        if (!document.getElementById('cropperjs-css')) {
            const link = document.createElement('link');
            link.id = 'cropperjs-css';
            link.rel = 'stylesheet';
            link.href = 'https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css';
            document.head.appendChild(link);
        }
        // Cargar JS de Cropper.js
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.js';
        script.onload = callback;
        document.body.appendChild(script);
    }

    // ==========================
    // Modal para tomar o cargar foto y recortar
    // ==========================
    // Muestra un modal para seleccionar o tomar una foto y luego recortarla
    function showFotoModal() {
        // Elimina cualquier modal anterior
        let oldModal = document.getElementById('foto-modal');
        if (oldModal) oldModal.remove();

        // Crea el modal y su contenido
        const modal = document.createElement('div');
        modal.id = 'foto-modal';
        modal.style.position = 'fixed';
        modal.style.top = 0;
        modal.style.left = 0;
        modal.style.width = '100vw';
        modal.style.height = '100vh';
        modal.style.background = 'rgba(0,0,0,0.6)';
        modal.style.display = 'flex';
        modal.style.alignItems = 'center';
        modal.style.justifyContent = 'center';
        modal.style.zIndex = 10000;

        const box = document.createElement('div');
        box.style.background = '#fff';
        box.style.padding = '2rem 1.5rem';
        box.style.borderRadius = '1rem';
        box.style.maxWidth = '95vw';
        box.style.boxShadow = '0 8px 32px rgba(0,0,0,0.18)';
        box.style.textAlign = 'center';
        box.style.position = 'relative';
        box.style.opacity = '0';
        box.style.transform = 'scale(0.92)';
        box.style.transition = 'opacity 0.35s cubic-bezier(.4,0,.2,1), transform 0.35s cubic-bezier(.4,0,.2,1)';

        // Botón cerrar
        const closeBtn = document.createElement('button');
        closeBtn.textContent = '×';
        closeBtn.style.position = 'absolute';
        closeBtn.style.top = '0.5rem';
        closeBtn.style.right = '1rem';
        closeBtn.style.background = 'transparent';
        closeBtn.style.color = '#888';
        closeBtn.style.border = 'none';
        closeBtn.style.fontSize = '2rem';
        closeBtn.style.cursor = 'pointer';
        closeBtn.addEventListener('click', () => modal.remove());
        box.appendChild(closeBtn);

        // Imagen de ejemplo e instrucciones
        const ejemploImg = document.createElement('img');
        ejemploImg.src = 'assets/img/ejemplo-modelo-impresora.jpg';
        ejemploImg.alt = 'Ejemplo de foto de modelo de impresora';
        ejemploImg.style.width = '400px';
        ejemploImg.style.borderRadius = '0.5rem';
        ejemploImg.style.boxShadow = '0 2px 8px rgba(0,0,0,0.10)';
        ejemploImg.style.marginBottom = '1rem';
        box.appendChild(ejemploImg);

        const instrucciones = document.createElement('div');
        instrucciones.innerHTML = `
            <h3 class="font-semibold text-blue-700 mb-2" style="font-size:1.1rem;">
                <i class="fas fa-info-circle"></i> ¿Cómo tomar la foto para detectar el modelo?
            </h3>
            <ul class="list-disc list-inside text-sm text-gray-700 space-y-1 pl-4" style="text-align:left; margin-bottom:1rem;">
                <li>Enfoca solo la zona donde aparece el <b>modelo exacto</b> de la impresora.</li>
                <li>Evita reflejos, sombras o desenfoque.</li>
                <li><b>El modelo debe ser perfectamente legible y estar derecho</b> (horizontal). No debe estar inclinado ni en vertical.</li>
                <li>Si el texto está de lado, <b>gira la imagen</b> usando la herramienta antes de analizar.</li>
                <li>Ejemplo de modelo: <span style="font-family:monospace;background:#f3f4f6;padding:2px 6px;border-radius:4px;">Laserjet Pro M404dn</span></li>
            </ul>
            <div class="mt-2 text-xs text-gray-500" style="font-size:0.9em;">
                <i class="fas fa-lightbulb text-yellow-400"></i>
                Mientras más cerca y claro esté el modelo, mejor será el resultado.
            </div>
        `;
        box.appendChild(instrucciones);

        // Input file oculto y botón para cargar/tomar foto
        const fotoInput = document.createElement('input');
        fotoInput.type = 'file';
        fotoInput.accept = 'image/*';
        fotoInput.style.display = 'none';
        box.appendChild(fotoInput);

        const tomarBtn = document.createElement('button');
        tomarBtn.innerHTML = `<span class="foto-btn-icon" style="display:inline-block;vertical-align:middle;margin-right:8px;">
            <i class="fas fa-camera"></i>
        </span>Tomar o seleccionar foto`;
        tomarBtn.style.margin = '1.5rem auto 0 auto';
        tomarBtn.style.padding = '0.75rem 2rem';
        tomarBtn.style.background = '#2563eb';
        tomarBtn.style.color = '#fff';
        tomarBtn.style.border = 'none';
        tomarBtn.style.borderRadius = '0.5rem';
        tomarBtn.style.fontSize = '1.1rem';
        tomarBtn.style.cursor = 'pointer';
        tomarBtn.style.transition = 'transform 0.2s, box-shadow 0.2s';
        tomarBtn.addEventListener('mouseenter', () => {
            tomarBtn.style.transform = 'scale(1.07)';
            tomarBtn.style.boxShadow = '0 4px 16px rgba(37,99,235,0.18)';
        });
        tomarBtn.addEventListener('mouseleave', () => {
            tomarBtn.style.transform = 'scale(1)';
            tomarBtn.style.boxShadow = 'none';
        });
        tomarBtn.addEventListener('click', () => fotoInput.click());
        box.appendChild(tomarBtn);

        // Animación de icono (rebote)
        setInterval(() => {
            const icon = tomarBtn.querySelector('.foto-btn-icon');
            if (icon) {
                icon.animate([
                    { transform: 'translateY(0)' },
                    { transform: 'translateY(-6px)' },
                    { transform: 'translateY(0)' }
                ], {
                    duration: 700,
                    iterations: 1
                });
            }
        }, 2200);

        // Evento para manejar la imagen seleccionada
        fotoInput.addEventListener('change', function() {
            if (!this.files || !this.files[0]) return;
            modal.remove();
            const file = this.files[0];
            loadCropperAssets(() => showCropperModal(URL.createObjectURL(file)));
        });

        modal.appendChild(box);
        document.body.appendChild(modal);

        // Animación de aparición del modal
        setTimeout(() => {
            box.style.opacity = '1';
            box.style.transform = 'scale(1)';
        }, 30);
    }

    // ==========================
    // Modal de recorte de imagen con Cropper.js
    // ==========================
    // Muestra un modal para recortar la imagen seleccionada usando Cropper.js
    // Permite rotar, recortar y cancelar. Al recortar, llama a analizarImagen con el blob resultante.
    function showCropperModal(imageSrc) {
        // Crea y muestra el modal para recortar la imagen seleccionada
        // Permite rotar, recortar y cancelar
        // Al recortar, llama a analizarImagen con el blob resultante
        let oldModal = document.getElementById('cropper-modal');
        if (oldModal) oldModal.remove();

        const modal = document.createElement('div');
        modal.id = 'cropper-modal';
        modal.style.position = 'fixed';
        modal.style.top = 0;
        modal.style.left = 0;
        modal.style.width = '100vw';
        modal.style.height = '100vh';
        modal.style.background = 'rgba(0,0,0,0.7)';
        modal.style.display = 'flex';
        modal.style.alignItems = 'center';
        modal.style.justifyContent = 'center';
        modal.style.zIndex = 10000;

        const box = document.createElement('div');
        box.style.background = '#fff';
        box.style.padding = '1rem';
        box.style.borderRadius = '1rem';
        box.style.maxWidth = '95vw';
        box.style.maxHeight = '90vh';
        box.style.textAlign = 'center';
        box.style.overflow = 'auto';
        box.style.opacity = '0';
        box.style.transform = 'scale(0.92)';
        box.style.transition = 'opacity 0.35s cubic-bezier(.4,0,.2,1), transform 0.35s cubic-bezier(.4,0,.2,1)';

        const title = document.createElement('h2');
        title.textContent = 'Recorta la zona del modelo de la impresora';
        title.style.fontSize = '1.1rem';
        title.style.marginBottom = '1rem';
        box.appendChild(title);

        const img = document.createElement('img');
        img.src = imageSrc;
        img.style.maxWidth = '80vw';
        img.style.maxHeight = '60vh';
        img.style.display = 'block';
        img.style.margin = '0 auto 1rem auto';
        box.appendChild(img);

        // Botón Rotar
        const rotateBtn = document.createElement('button');
        rotateBtn.textContent = 'Rotar 90°';
        rotateBtn.style.margin = '1rem 0.5rem 0 0';
        rotateBtn.style.padding = '0.5rem 1.5rem';
        rotateBtn.style.background = '#f59e42';
        rotateBtn.style.color = '#fff';
        rotateBtn.style.border = 'none';
        rotateBtn.style.borderRadius = '0.5rem';
        rotateBtn.style.fontSize = '1rem';
        rotateBtn.style.cursor = 'pointer';

        // Botón Recortar
        const cropBtn = document.createElement('button');
        cropBtn.textContent = 'Usar recorte';
        cropBtn.style.margin = '1rem 0.5rem 0 0';
        cropBtn.style.padding = '0.5rem 1.5rem';
        cropBtn.style.background = '#2563eb';
        cropBtn.style.color = '#fff';
        cropBtn.style.border = 'none';
        cropBtn.style.borderRadius = '0.5rem';
        cropBtn.style.fontSize = '1rem';
        cropBtn.style.cursor = 'pointer';

        // Botón Cancelar
        const cancelBtn = document.createElement('button');
        cancelBtn.textContent = 'Cancelar';
        cancelBtn.style.margin = '1rem 0 0 0.5rem';
        cancelBtn.style.padding = '0.5rem 1.5rem';
        cancelBtn.style.background = '#eee';
        cancelBtn.style.color = '#333';
        cancelBtn.style.border = 'none';
        cancelBtn.style.borderRadius = '0.5rem';
        cancelBtn.style.fontSize = '1rem';
        cancelBtn.style.cursor = 'pointer';

        box.appendChild(rotateBtn);
        box.appendChild(cropBtn);
        box.appendChild(cancelBtn);
        modal.appendChild(box);
        document.body.appendChild(modal);

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

        rotateBtn.addEventListener('click', function() {
            cropper.rotate(90);
        });

        cropBtn.addEventListener('click', async function() {
            const canvas = cropper.getCroppedCanvas({
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high'
            });
            modal.remove();
            canvas.toBlob(async function(blob) {
                await analizarImagen(blob);
            }, 'image/png');
        });

        cancelBtn.addEventListener('click', function() {
            modal.remove();
        });

        // Animación de aparición del modal
        setTimeout(() => {
            box.style.opacity = '1';
            box.style.transform = 'scale(1)';
        }, 30);
    }

    // ==========================
    // Analizar imagen con OCR y sugerir modelos
    // ==========================
    // Usa Tesseract.js para extraer texto de la imagen recortada y sugerir modelos de impresora
    // Si encuentra modelos, muestra un modal para seleccionar uno; si no, pone el texto detectado en el buscador
    async function analizarImagen(fileOrBlob) {
        buscador.value = "Analizando imagen...";
        buscador.disabled = true;

        const { data: { text } } = await Tesseract.recognize(
            fileOrBlob,
            'eng',
            {
                logger: m => console.log(m),
                preserve_interword_spaces: 1
            }
        );

        const lines = text.split('\n').map(l => l.trim()).filter(l => l.length > 0);
        // Busca patrones tipo M236sdw, L5652DN, etc.
        const modeloRegex = /\b([A-Z]{1,3}\d{2,5}[A-Z0-9]{0,4})\b/gi;
        let modelos = [];
        lines.forEach(line => {
            const found = line.match(modeloRegex);
            if (found) modelos.push(...found);
        });

        modelos = [...new Set(modelos)].filter(m => m.length > 4);

        if (modelos.length > 0) {
            showModelModal(modelos, (selected) => {
                buscador.value = selected;
                buscador.disabled = false;
                buscador.dispatchEvent(new Event('input'));
            });
        } else {
            buscador.value = text.trim().split('\n')[0];
            buscador.disabled = false;
            buscador.dispatchEvent(new Event('input'));
        }
    }

    // ==========================
    // Modal para seleccionar modelo detectado o escribir manualmente
    // ==========================
    // Muestra un modal con botones para cada modelo detectado y un input para escribir manualmente
    // Llama a onSelect con el modelo elegido o escrito
    function showModelModal(modelos, onSelect) {
        // Crea un modal con botones para cada modelo detectado
        // Permite escribir manualmente si no aparece el modelo
        // Llama a onSelect con el modelo elegido
        let oldModal = document.getElementById('modelo-modal');
        if (oldModal) oldModal.remove();

        const modal = document.createElement('div');
        modal.id = 'modelo-modal';
        modal.style.position = 'fixed';
        modal.style.top = 0;
        modal.style.left = 0;
        modal.style.width = '100vw';
        modal.style.height = '100vh';
        modal.style.background = 'rgba(0,0,0,0.5)';
        modal.style.display = 'flex';
        modal.style.alignItems = 'center';
        modal.style.justifyContent = 'center';
        modal.style.zIndex = 9999;

        const box = document.createElement('div');
        box.style.background = '#fff';
        box.style.padding = '2rem';
        box.style.borderRadius = '1rem';
        box.style.maxWidth = '90vw';
        box.style.boxShadow = '0 8px 32px rgba(0,0,0,0.18)';
        box.style.textAlign = 'center';
        box.style.opacity = '0';
        box.style.transform = 'scale(0.92)';
        box.style.transition = 'opacity 0.35s cubic-bezier(.4,0,.2,1), transform 0.35s cubic-bezier(.4,0,.2,1)';

        const title = document.createElement('h2');
        title.textContent = 'Selecciona el modelo de tu impresora';
        title.style.fontSize = '1.2rem';
        title.style.marginBottom = '1rem';
        box.appendChild(title);

        modelos.forEach(modelo => {
            const btn = document.createElement('button');
            btn.textContent = modelo.trim();
            btn.style.display = 'block';
            btn.style.margin = '0.5rem auto';
            btn.style.padding = '0.5rem 1.5rem';
            btn.style.background = '#2563eb';
            btn.style.color = '#fff';
            btn.style.border = 'none';
            btn.style.borderRadius = '0.5rem';
            btn.style.fontSize = '1rem';
            btn.style.cursor = 'pointer';
            btn.addEventListener('click', () => {
                modal.remove();
                onSelect(modelo.trim());
            });
            box.appendChild(btn);
        });

        // Opción para escribir manualmente
        const manual = document.createElement('input');
        manual.type = 'text';
        manual.placeholder = '¿No aparece? Escribe el modelo aquí';
        manual.style.display = 'block';
        manual.style.margin = '1rem auto 0.5rem auto';
        manual.style.padding = '0.5rem 1rem';
        manual.style.width = '80%';
        manual.style.border = '1px solid #ccc';
        manual.style.borderRadius = '0.5rem';
        box.appendChild(manual);

        const manualBtn = document.createElement('button');
        manualBtn.textContent = 'Usar este modelo';
        manualBtn.style.margin = '0.5rem auto 0 0';
        manualBtn.style.padding = '0.5rem 1.5rem';
        manualBtn.style.background = '#38bdf8';
        manualBtn.style.color = '#fff';
        manualBtn.style.border = 'none';
        manualBtn.style.borderRadius = '0.5rem';
        manualBtn.style.fontSize = '1rem';
        manualBtn.style.cursor = 'pointer';
        manualBtn.addEventListener('click', () => {
            if (manual.value.trim()) {
                modal.remove();
                onSelect(manual.value.trim());
            }
        });
        box.appendChild(manualBtn);

        // Botón cerrar
        const closeBtn = document.createElement('button');
        closeBtn.textContent = 'Cancelar';
        closeBtn.style.margin = '1rem auto 0 auto';
        closeBtn.style.display = 'block';
        closeBtn.style.background = 'transparent';
        closeBtn.style.color = '#888';
        closeBtn.style.border = 'none';
        closeBtn.style.fontSize = '1rem';
        closeBtn.style.cursor = 'pointer';
        closeBtn.addEventListener('click', () => modal.remove());
        box.appendChild(closeBtn);

        modal.appendChild(box);
        document.body.appendChild(modal);

        // Animación de aparición del modal
        setTimeout(() => {
            box.style.opacity = '1';
            box.style.transform = 'scale(1)';
        }, 30);
    }

    // ==========================
    // Evento para mostrar el modal de foto
    // ==========================
    // Al hacer click en el botón de foto, muestra el modal para tomar/cargar foto
    if (fotoBtn) {
        fotoBtn.addEventListener('click', function(e) {
            e.preventDefault();
            showFotoModal();
        });
    }

    // ==========================
    // Filtrado en vivo y contador de resultados
    // ==========================
    // Actualiza el contador de resultados visibles en la tabla
    function actualizarContador() {
        const visibles = Array.from(filas).filter(fila => fila.style.display !== "none");
        if (contador) contador.textContent = visibles.length;
    }

    // Normaliza texto para búsqueda (sin acentos, minúsculas)
    function normalizar(texto) {
        return texto.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    // Filtra las filas de la tabla según el input de búsqueda
    if (buscador) {
        buscador.addEventListener("input", function () {
            const filtro = normalizar(this.value.trim());
            const palabras = filtro.split(/\s+/);

            filas.forEach(fila => {
                const textoFila = Array.from(fila.cells)
                    .map(celda => normalizar(celda.innerText))
                    .join(" ");
                const mostrar = palabras.every(palabra => textoFila.includes(palabra));
                fila.style.display = mostrar ? "" : "none";
            });

            actualizarContador();
        });
    }

    // Limpia el filtro de búsqueda y muestra todas las filas
    if (btnBorrar) {
        btnBorrar.addEventListener("click", () => {
            if (buscador) buscador.value = "";
            filas.forEach(fila => fila.style.display = "");
            actualizarContador();
        });
    }

    // Inicializa el contador al cargar la página
    actualizarContador();

    // ==========================
    // Tabs funcionalidad (ejemplo horizontal)
    // ==========================
    // Controla los tabs principales (compatibilidades y preguntas frecuentes)
    const tabBtns = document.querySelectorAll('.ejemplo-tab-btn');
    const tabContents = {
        tab1: document.getElementById('compatibilidades'),
        tab2: document.getElementById('preguntas-frecuentes')
    };

    // Oculta todos los tabs y elimina la animación
    function hideAllTabs() {
        Object.values(tabContents).forEach(tc => {
            tc.classList.add('hidden');
            tc.classList.remove('tab-animate-in');
        });
    }

    // Maneja el click en los botones de tab
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Actualiza estilos de los botones
            tabBtns.forEach(b => b.classList.remove('active', 'text-gray-700', 'border-blue-400'));
            tabBtns.forEach(b => b.classList.add('text-gray-500'));

            btn.classList.add('active', 'text-gray-700', 'border-blue-400');
            btn.classList.remove('text-gray-500');

            // Muestra el contenido del tab seleccionado
            hideAllTabs();
            const tabId = btn.getAttribute('data-tab');
            const content = tabContents[tabId];
            if (content) {
                content.classList.remove('hidden');
                // Forzar reflow para reiniciar animación
                void content.offsetWidth;
                content.classList.add('tab-animate-in');
                // Si es el tab de preguntas frecuentes, reinicializa la animación FAQ (solo CSS/JS)
                if (tabId === 'tab2' && typeof window.faqFalconInit === 'function') {
                    setTimeout(() => {
                        window.faqFalconInit();
                    }, 50); // Pequeño delay para asegurar visibilidad
                }
            }
        });
    });

    // Mostrar por defecto el primer tab con animación
    hideAllTabs();
    if (tabBtns.length && tabContents.tab1) {
        tabBtns[0].classList.add('active', 'text-gray-700', 'border-blue-400');
        tabBtns[0].classList.remove('text-gray-500');
        tabContents.tab1.classList.remove('hidden');
        tabContents.tab1.classList.add('tab-animate-in');
    }

    // ==========================
    // Tabs funcionalidad para cartuchos-tab/cartuchos-tab-content (vertical)
    // ==========================
    // Controla los tabs secundarios (verticales) para otras secciones de cartuchos
    const cartuchosTabBtns = document.querySelectorAll('.cartuchos-tab');
    const cartuchosTabContents = document.querySelectorAll('.cartuchos-tab-content');

    cartuchosTabBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            cartuchosTabBtns.forEach(b => b.classList.remove('active'));
            cartuchosTabContents.forEach(tc => tc.classList.add('hidden'));

            btn.classList.add('active');
            const tabId = btn.getAttribute('data-tab');
            const content = document.getElementById('tab-' + tabId);
            if (content) content.classList.remove('hidden');
        });
    });

    // Muestra por defecto el primer tab vertical
    if (cartuchosTabBtns.length && cartuchosTabContents.length) {
        cartuchosTabBtns[0].classList.add('active');
        cartuchosTabContents[0].classList.remove('hidden');
        for (let i = 1; i < cartuchosTabContents.length; i++) {
            cartuchosTabContents[i].classList.add('hidden');
        }
    }
});
