// Validación y envío para ambos botones: Enviar y WhatsApp

document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('contactForm');
  const successMsg = document.getElementById('contactSuccess');
  const errorMsg = document.getElementById('contactError');
  const whatsappBtn = document.querySelector('.contact-btn-alt');
  const whatsappNumber = '526252690997';

  if (!form || !whatsappBtn) return;

  // Función de validación
  function validateForm() {
    const nombre = form.nombre.value.trim();
    const email = form.email.value.trim();
    const mensaje = form.mensaje.value.trim();
    if (!nombre || !email || !mensaje) {
      errorMsg.textContent = "Todos los campos son obligatorios.";
      errorMsg.classList.remove('hidden');
      return false;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      errorMsg.textContent = "El correo electrónico no es válido.";
      errorMsg.classList.remove('hidden');
      return false;
    }
    errorMsg.classList.add('hidden');
    return { nombre, email, mensaje };
  }

  // Envío AJAX normal
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    successMsg.classList.add('hidden');
    errorMsg.classList.add('hidden');
    const datos = validateForm();
    if (!datos) return;

    // Deshabilita el botón para evitar doble envío
    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn) submitBtn.disabled = true;

    fetch('/includes/contact-form-handler.php', {
      method: 'POST',
      body: new FormData(form)
    })
    .then(res => res.ok ? res.json() : Promise.reject(res))
    .then(data => {
      if (data.success) {
        successMsg.textContent = "¡Gracias! Hemos recibido tu mensaje y te contactaremos pronto.";
        successMsg.classList.remove('hidden');
        form.reset();
      } else {
        errorMsg.textContent = data.error || "Ocurrió un error. Intenta de nuevo.";
        errorMsg.classList.remove('hidden');
      }
    })
    .catch(() => {
      errorMsg.textContent = "No se pudo enviar el mensaje. Intenta más tarde.";
      errorMsg.classList.remove('hidden');
    })
    .finally(() => {
      if (submitBtn) submitBtn.disabled = false;
    });
  });

  // WhatsApp: valida y arma el mensaje antes de redirigir
  whatsappBtn.addEventListener('click', function(e) {
    e.preventDefault();
    successMsg.classList.add('hidden');
    errorMsg.classList.add('hidden');
    const datos = validateForm();
    if (!datos) return;

    const texto =
      `¡Hola equipo de Norttek Solutions! 👋\n\n` +
      `Mi nombre es *${datos.nombre}* y estoy muy emocionado por conocer cómo pueden ayudarme a mejorar la seguridad y tecnología de mi espacio.\n\n` +
      `✉️ Correo: ${datos.email}\n` +
      `💬 Esto es lo que quiero compartirles:\n${datos.mensaje}\n\n` +
      `¿Podrían contactarme para brindarme una asesoría personalizada? ¡Estoy listo para transformar mi entorno con Norttek! 🚀🔒`;

    const url = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(texto)}`;
    window.open(url, '_blank');
  });
});