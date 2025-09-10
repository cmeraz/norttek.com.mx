feather.replace();

    // Modal
    const demoModal = document.getElementById('demoModal');
    const openDemoModalButtons = [document.getElementById('openDemoModal'), document.getElementById('openDemoModal2')];
    const closeModal = document.getElementById('closeModal');

    openDemoModalButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        demoModal.classList.remove('opacity-0','pointer-events-none');
        demoModal.classList.add('opacity-100');
        demoModal.querySelector('div').classList.remove('scale-95');
        demoModal.querySelector('div').classList.add('scale-100');
      });
    });

    closeModal.addEventListener('click', () => {
      demoModal.classList.add('opacity-0','pointer-events-none');
      demoModal.querySelector('div').classList.add('scale-95');
      demoModal.querySelector('div').classList.remove('scale-100');
    });

    // Form submit
    document.getElementById('demoForm').addEventListener('submit', function(e){
      e.preventDefault();
      const nombre = encodeURIComponent(this.nombre.value.trim());
      const email = encodeURIComponent(this.email.value.trim());
      const telefono = encodeURIComponent(this.telefono.value.trim());

      if(!nombre || !email || !telefono) return alert("Completa todos los campos correctamente.");

      const mensaje = `Hola, soy ${nombre}, mi email es ${email}, y quiero solicitar la demo del sistema de conmutador en la nube.`;
      window.open(`https://wa.me/526252690997?text=${mensaje}`, '_blank');
    });

    // WhatsApp header button
    document.getElementById('ctaWhatsapp').addEventListener('click', () => {
      window.open('https://wa.me/526252690997', '_blank');
    });
 
  // Abrir modal del hero
  const openModalHero = document.getElementById('openModalHero');
  const openModal = document.getElementById('openModal'); // tu modal existente
  openModalHero.addEventListener('click', () => openModal.classList.remove('hidden'));

  const btnWhatsapp = document.getElementById('btnWhatsapp');
  const modal = document.getElementById('modalWhatsapp');
  const cerrar = document.getElementById('cerrarModal');
  const enviar = document.getElementById('enviarWhatsapp');

  // Abrir modal
  btnWhatsapp.addEventListener('click', () => {
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  });

  // Cerrar modal
  cerrar.addEventListener('click', () => {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  });

  // Enviar mensaje por WhatsApp con código de país +52
  enviar.addEventListener('click', () => {
    const numeroLocal = document.getElementById('numeroWhatsapp').value.trim();
    if(numeroLocal === '') {
      alert('Por favor ingresa un número de WhatsApp');
      return;
    }
    const numero = '52' + numeroLocal; // Código de país fijo
    const mensaje = encodeURIComponent("¡Mira esta tienda online para empresas y oficinas! Pide todo desde tu celular y recibe tus productos cómodamente a domicilio. https://tienda.norttek.com.mx");

    window.open(`https://wa.me/${numero}?text=${mensaje}`, '_blank');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  });