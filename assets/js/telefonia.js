// Lógica modular de la página Telefonía
// (antes en telefonia-inline.js y previamente inline en telefoniaContent.php)

// Implementar sistema de notificaciones simple si no existe NTNotify
if (!window.NTNotify) {
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
(function(){
  const planButtons = document.querySelectorAll('.tel-plan__btn');
  console.log('[Telefonia.js] Botones de planes encontrados:', planButtons.length);
  
  planButtons.forEach((button, index) => {
    console.log(`[Telefonia.js] Inicializando botón de plan ${index + 1}:`, {
      plan: button.getAttribute('data-plan'),
      precio: button.getAttribute('data-precio'),
      ext: button.getAttribute('data-ext'),
      troncal: button.getAttribute('data-troncal')
    });
    
    button.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Obtener datos del plan
      const plan = this.getAttribute('data-plan') || 'Plan no especificado';
      const precio = this.getAttribute('data-precio') || 'Precio no especificado';
      const extensiones = this.getAttribute('data-ext') || 'Extensiones no especificadas';
      const troncal = this.getAttribute('data-troncal') || 'Troncal no especificado';
      const numeracion = this.getAttribute('data-numeracion') || 'Numeración LADA México';
      
      console.log('[Telefonia.js] Enviando solicitud de plan:', plan);
      
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
      
      // Abrir WhatsApp en nueva pestaña
      window.open(whatsappURL, '_blank');
      
      // Opcional: mostrar notificación de éxito si NTNotify está disponible
      if (window.NTNotify) {
        NTNotify.success(`Solicitud enviada: ${plan}`);
      }
    });
  });
  
  console.log('[Telefonia.js] Botones de planes inicializados correctamente');
})();

window.addEventListener('load',()=>{
  const heroTitle = document.querySelector('#hero #hero-title');
  const heroSub = document.querySelector('.telefonia-hero-sub');
  const heroActions = document.querySelector('.telefonia-hero-actions');
  const elems = [heroTitle, heroSub, heroActions];
  if(window.gsap){
    const baseEase='power3.out';
    if(heroTitle) gsap.to(heroTitle,{opacity:1,y:0,duration:1.35,ease:baseEase,delay:.15});
    if(heroSub) gsap.to(heroSub,{opacity:1,y:0,duration:1.35,ease:baseEase,delay:.55});
    if(heroActions) {
      // Primero revelar el contenedor
      gsap.to(heroActions,{opacity:1,y:0,duration:1.1,ease:baseEase,delay:.95});
      // Luego cada botón escalonado
      const btns = heroActions.querySelectorAll('.nt-btn');
      btns.forEach((btn,i)=>{
        gsap.fromTo(btn,{opacity:0,y:14,scale:.96},{opacity:1,y:0,scale:1,duration:1,ease:baseEase,delay:1.05 + i*0.12});
      });
    }
  } else {
    // Fallback sin GSAP: mostrar inmediatamente
    elems.forEach(el=>{ if(!el) return; el.style.opacity='1'; el.style.transform='none'; el.classList.remove('opacity-0','translate-y-10'); });
  }
});

console.info('[telefonia.js] animaciones hero extendidas sincronizadas con headings');