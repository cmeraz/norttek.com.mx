// JS para la app móvil de Internet

document.addEventListener('DOMContentLoaded', function() {
  // Contratar plan
  document.querySelectorAll('.btn-contratar').forEach(function(btn) {
    btn.addEventListener('click', function() {
      const plan = btn.getAttribute('data-plan');
      document.querySelector('select[name="plan"]').value = plan;
      document.querySelector('input[name="nombre"]').focus();
    });
  });

  // Formulario
  const form = document.getElementById('form-internet');
  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      const nombre = form.nombre.value.trim();
      const telefono = form.telefono.value.trim();
      const email = form.email.value.trim();
      const plan = form.plan.value;
      if (!nombre || !telefono || !email || !plan) {
        mostrarMsg('Por favor, completa todos los campos.');
        return;
      }
      // Simulación de envío
      mostrarMsg('¡Gracias, ' + nombre + '! Pronto te contactaremos para el plan de ' + plan + ' Megas.');
      form.reset();
    });
  }

  function mostrarMsg(msg) {
    document.getElementById('form-msg').textContent = msg;
  }
});
