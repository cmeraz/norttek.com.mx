// Lógica modular de la página Telefonía
// (antes en telefonia-inline.js y previamente inline en telefoniaContent.php)

// Prevenir inicialización múltiple del script
if (window.telefoniaJSLoaded) {
  console.log('[Telefonia.js] Script ya cargado, evitando re-inicialización');
  // Solo exportar las funciones si no existen
  if (!window.telefoniaButtonsInitialized) {
    console.log('[Telefonia.js] Re-inicializando solo botones...');
  } else {
    console.log('[Telefonia.js] Todo ya inicializado, saliendo');
    return;
  }
} else {
  window.telefoniaJSLoaded = true;
  console.log('[Telefonia.js] Iniciando carga del script');
}

// Implementar sistema de notificaciones simple si no existe NTNotify
if (!window.NTNotify) {
  console.log('[Telefonia.js] Inicializando sistema de notificaciones');
  window.NTNotify = {
    success: function(msg) { showSimpleNotification(msg, 'success'); },
    warning: function(msg) { showSimpleNotification(msg, 'warning'); },
    error: function(msg) { showSimpleNotification(msg, 'error'); }
  };
  
  function showSimpleNotification(message, type) {
    var notification = document.createElement('div');
    notification.style.cssText = 'position:fixed;top:20px;right:20px;z-index:10000;padding:12px 16px;border-radius:8px;color:white;font-weight:600;font-size:14px;max-width:300px;box-shadow:0 4px 12px rgba(0,0,0,0.15);transition:all 0.3s ease;';
    
    switch(type) {
      case 'success':
        notification.style.background = '#10b981';
        notification.innerHTML = '✅ ' + message;
        break;
      case 'warning':
        notification.style.background = '#f59e0b';
        notification.innerHTML = '⚠️ ' + message;
        break;
      case 'error':
        notification.style.background = '#ef4444';
        notification.innerHTML = '❌ ' + message;
        break;
    }
    
    // Animar entrada
    notification.style.opacity = '0';
    notification.style.transform = 'translateX(100%)';
    document.body.appendChild(notification);
    
    requestAnimationFrame(function() {
      notification.style.opacity = '1';
      notification.style.transform = 'translateX(0)';
    });
    
    // Auto-remove después de 3 segundos
    setTimeout(function() {
      if (notification.parentElement) {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100%)';
        setTimeout(function() {
          if (notification.parentElement) {
            notification.remove();
          }
        }, 300);
      }
    }, 3000);
  }
}

(function(){
  const youtubeVideo=document.getElementById('youtubeVideo');
  const modalSel = '#modalVideo';
  const btnVideo=document.getElementById('openVideo');
  const btnLinkus=document.getElementById('openLinkus');
  function openVideo(src){
    if(!youtubeVideo) return;
    let url=src||'';
    if(!url.includes('autoplay=1')) url+=(url.includes('?')?'&':'?')+'autoplay=1';
    youtubeVideo.src=url;
    if(window.NTModal){ NTModal.open(modalSel); }
  }
  function clearVideo(){ if(youtubeVideo){ youtubeVideo.src=''; } }
  if(btnVideo) btnVideo.addEventListener('click',()=>openVideo(btnVideo.dataset.video));
  if(btnLinkus) btnLinkus.addEventListener('click',()=>openVideo(btnLinkus.dataset.video));
  // Limpia el iframe al cerrar el modal (delegado por eventos del sistema unificado si existen)
  document.addEventListener('nt-modal:closed', (e)=>{ if(e.detail && e.detail.selector===modalSel) clearVideo(); });
})();

(function(){
  const form=document.getElementById('demoForm');
  if(!form) return;
  form.addEventListener('submit',e=>{
    e.preventDefault();
    const nombre=form.nombre.value.trim();
    const email=form.email.value.trim();
    const telefono=(form.telefono.value||'').replace(/\D+/g,'').trim();
    const emailOk=/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    const telOk=/^[0-9]{10,15}$/.test(telefono);
    if(nombre.length<2||!emailOk||!telOk){ if(window.NTNotify){ NTNotify.warning('Revisa los datos del formulario',{ttl:3000}); } return; }
    const msg=encodeURIComponent(`¡Hola!%0AQuiero solicitar la demo PBX.%0A%0ANombre: ${nombre}%0ACorreo: ${email}%0ATeléfono: ${telefono}`);
    window.open(`https://wa.me/526252690997?text=${msg}`,'_blank');
    form.reset();
    if(window.NTModal){ NTModal.close('#modalDemo'); }
  });
})();

// Funcionalidad para botones de planes de telefonía
// Inicialización simplificada de botones de planes
document.addEventListener('DOMContentLoaded', function() {
  console.log('[Telefonia.js] Inicializando botones de planes...');
  
  const planButtons = document.querySelectorAll('.tel-plan__btn');
  console.log('[Telefonia.js] Botones encontrados:', planButtons.length);
  
  planButtons.forEach((button, index) => {
    console.log(`[Telefonia.js] Configurando botón ${index + 1}`);
    
    button.addEventListener('click', function(e) {
      e.preventDefault();
      console.log('[Telefonia.js] Click en botón de plan detectado');
      
      // Obtener datos del plan
      const plan = this.getAttribute('data-plan') || 'Plan no especificado';
      const precio = this.getAttribute('data-precio') || 'Precio no especificado';
      const extensiones = this.getAttribute('data-ext') || 'Extensiones no especificadas';
      const troncal = this.getAttribute('data-troncal') || 'Troncal no especificado';
      const numeracion = this.getAttribute('data-numeracion') || 'Numeración LADA México';
      
      console.log('[Telefonia.js] Datos del plan:', { plan, precio, extensiones, troncal });
      
      // Crear mensaje para WhatsApp
      const mensaje = `🏢 *SOLICITUD DE PLAN TELEFONÍA IP*

📋 *Plan seleccionado:* ${plan}
💰 *Precio:* ${precio}
📞 *Extensiones:* ${extensiones}
🔗 *Troncal:* ${troncal}
📱 *Numeración:* ${numeracion}

---

¡Hola! Estoy interesado en contratar el ${plan} de Norttek PBX. ¿Podrían proporcionarme más información sobre la instalación, configuración y pasos para comenzar?

Quedo pendiente de su apoyo. ¡Gracias! 🚀`;

      // Codificar el mensaje para URL
      const mensajeCodificado = encodeURIComponent(mensaje);
      
      // Crear URL de WhatsApp
      const whatsappURL = `https://wa.me/526252690997?text=${mensajeCodificado}`;
      console.log('[Telefonia.js] Abriendo WhatsApp...');
      
      // Abrir WhatsApp en nueva pestaña
      window.open(whatsappURL, '_blank');
      
      // Mostrar notificación si está disponible
      if (window.NTNotify) {
        NTNotify.success(`Solicitud enviada: ${plan}`);
      }
    });
  });
  
  console.log('[Telefonia.js] Botones de planes inicializados correctamente');
});

// Asegurar que el hero sea visible inmediatamente
document.addEventListener('DOMContentLoaded', function() {
  const heroTitle = document.querySelector('#hero #hero-title');
  const heroSub = document.querySelector('.telefonia-hero-sub');
  const heroActions = document.querySelector('.telefonia-hero-actions');
  const elems = [heroTitle, heroSub, heroActions];
  
  // Mostrar elementos inmediatamente
  elems.forEach(el => {
    if (el) {
      el.style.opacity = '1';
      el.style.transform = 'none';
      el.classList.remove('opacity-0', 'translate-y-10');
    }
  });
  
  console.log('[telefonia.js] Hero elements made visible immediately');
});

console.info('[telefonia.js] animaciones hero extendidas sincronizadas con headings');