// Lenguaje = Español
    // ==========================
    // NOTA: Lógica de anclas y FAQ movida a servicios.js para separación de responsabilidades.
    // ==========================
    // REEMPLAZAR ICONOS FEATHER
    // ==========================
    if (typeof feather !== "undefined") {
        feather.replace();
    }

    // ==========================
    // FUNCION GENERICA PARA MODALES
    // ==========================
    function initModal({ btnId, modalId, closeId }) {
        const btn = document.getElementById(btnId);
        const modal = document.getElementById(modalId);
        const closeBtn = document.getElementById(closeId);

        if (btn && modal && closeBtn) {
            btn.addEventListener('click', () => {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });

            closeBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        } else {
            console.warn(`Elementos del modal ${modalId} no encontrados en el DOM`);
        }
    }

    // Inicializar modales
    initModal({ btnId: 'btnWhatsapp', modalId: 'modalWhatsapp', closeId: 'cerrarModal' });
    initModal({ btnId: 'btnDemo', modalId: 'demoModal', closeId: 'cerrarDemoModal' });
    // Agrega más modales aquí sin redeclarar variables

    // ==========================
    // MODAL WHATSAPP CON ENVIO
    // ==========================
    const enviarWhatsapp = document.getElementById('enviarWhatsapp');
    if(enviarWhatsapp) {
        enviarWhatsapp.addEventListener('click', () => {
            const numeroLocal = document.getElementById('numeroWhatsapp').value.trim();
            if(numeroLocal === '') {
                alert('Por favor ingresa un número de WhatsApp');
                return;
            }
            const numero = '52' + numeroLocal; // Código país México
            const mensaje = encodeURIComponent(
                "¡Mira esta tienda online para empresas y oficinas! Pide todo desde tu celular y recibe tus productos cómodamente a domicilio. https://tienda.norttek.com.mx"
            );
            window.open(`https://wa.me/${numero}?text=${mensaje}`, '_blank');

            const modalWhatsapp = document.getElementById('modalWhatsapp');
            if(modalWhatsapp) {
                modalWhatsapp.classList.add('hidden');
                modalWhatsapp.classList.remove('flex');
            }
        });
    }

    // ==========================
    // TOASTIFY (opcional)
    // ==========================
    if (typeof Toastify !== "undefined") {
        // Ejemplo de notificación
        // Toastify({ text: "Página cargada correctamente", duration: 3000 }).showToast();
    }
