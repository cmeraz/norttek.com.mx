
  // Reemplaza los íconos Feather
  feather.replace();

  // ==========================
  // MODAL DEMO
  // ==========================
  const demoModal = document.getElementById('demoModal');
  const openDemoModalButtons = [
    document.getElementById('openDemoModal'),
    document.getElementById('openDemoModal2')
  ];
  const closeDemoModal = document.getElementById('closeModal');

  openDemoModalButtons.forEach(btn => {
    if(btn) {
      btn.addEventListener('click', () => {
        demoModal.classList.remove('opacity-0','pointer-events-none');
        demoModal.classList.add('opacity-100');
        demoModal.querySelector('div').classList.remove('scale-95');
        demoModal.querySelector('div').classList.add('scale-100');
      });
    }
  });

  closeDemoModal.addEventListener('click', () => {
    demoModal.classList.add('opacity-0','pointer-events-none');
    demoModal.querySelector('div').classList.add('scale-95');
    demoModal.querySelector('div').classList.remove('scale-100');
  });

  // Envío de formulario demo
  const demoForm = document.getElementById('demoForm');
  demoForm.addEventListener('submit', function(e){
    e.preventDefault();
    const nombre = encodeURIComponent(this.nombre.value.trim());
    const email = encodeURIComponent(this.email.value.trim());
    const telefono = encodeURIComponent(this.telefono.value.trim());

    if(!nombre || !email || !telefono){
      return alert("Completa todos los campos correctamente.");
    }

    const mensaje = `Hola, soy ${nombre}, mi email es ${email}, y quiero solicitar la demo del sistema de conmutador en la nube.`;
    window.open(`https://wa.me/526252690997?text=${mensaje}`, '_blank');
  });

  // ==========================
  // MODAL WHATSAPP
  // ==========================
  const btnWhatsapp = document.getElementById('btnWhatsapp');
  const modalWhatsapp = document.getElementById('modalWhatsapp');
  const cerrarWhatsappModal = document.getElementById('cerrarModal');
  const enviarWhatsapp = document.getElementById('enviarWhatsapp');

  // Abrir modal WhatsApp
  btnWhatsapp.addEventListener('click', () => {
    modalWhatsapp.classList.remove('hidden');
    modalWhatsapp.classList.add('flex');
  });

  // Cerrar modal WhatsApp
  cerrarWhatsappModal.addEventListener('click', () => {
    modalWhatsapp.classList.add('hidden');
    modalWhatsapp.classList.remove('flex');
  });

  // Enviar mensaje WhatsApp
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
    modalWhatsapp.classList.add('hidden');
    modalWhatsapp.classList.remove('flex');
  });
