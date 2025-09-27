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
    // WhatsApp modal ahora usa el sistema unificado .nt-modal vía data-nt-modal-open (no requiere initModal)
    // initModal({ btnId: 'btnDemo', modalId: 'demoModal', closeId: 'cerrarDemoModal' }); // (si existe)
    // Agrega más modales aquí sin redeclarar variables

    // ==========================
    // MODAL WHATSAPP CON ENVIO
    // ==========================
    const enviarWhatsapp = document.getElementById('enviarWhatsapp');
    const numeroWhatsapp = document.getElementById('numeroWhatsapp');
    // Sanear input a solo dígitos y limitar longitud común (10-13)
    if(numeroWhatsapp){
        numeroWhatsapp.addEventListener('input', function(){
            const digits = (this.value || '').replace(/[^0-9]/g,'');
            this.value = digits.slice(0, 13);
        });
        numeroWhatsapp.addEventListener('keyup', function(e){
            if(e.key === 'Enter' && enviarWhatsapp){ enviarWhatsapp.click(); }
        });
    }
    if(enviarWhatsapp) {
        enviarWhatsapp.addEventListener('click', () => {
            const raw = (document.getElementById('numeroWhatsapp')?.value || '').trim();
            const digits = raw.replace(/[^0-9]/g,'');
            if(!digits){ alert('Por favor ingresa un número de WhatsApp'); return; }
            let numero = digits;
            // Si el usuario escribe 10 dígitos, asumimos MX y preponemos 52
            if(digits.length === 10){ numero = '52' + digits; }
            // Si ya incluye 52 al inicio y tiene 12-13 dígitos, lo respetamos
            else if(digits.startsWith('52') && digits.length >= 12){ numero = digits; }
            // Otros casos: fallback a MX
            else if(digits.length < 12){ numero = '52' + digits; }

            const mensaje = encodeURIComponent(
                "¡Mira esta tienda online para empresas y oficinas! Pide todo desde tu celular y recibe tus productos cómodamente a domicilio. https://tienda.norttek.com.mx"
            );
            window.open(`https://wa.me/${numero}?text=${mensaje}`, '_blank');

            const modalWhatsapp = document.getElementById('modalWhatsapp');
            if(modalWhatsapp) {
                if(window.NTModal){ NTModal.close(modalWhatsapp); }
                else { modalWhatsapp.classList.add('hidden'); modalWhatsapp.classList.remove('flex'); }
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
