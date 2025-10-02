// Lógica modular de la página Telefonía
// (antes en telefonia-inline.js y previamente inline en telefoniaContent.php)

// Prevenir inicialización múltiple del script
(function() {
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
})();

// ==========================================
// HERO: Rotación aleatoria de imágenes de fondo
// ==========================================
(function() {
  const heroBackground = document.getElementById('heroBackground');
  const indicators = document.querySelectorAll('.hero-indicator');
  
  if (!heroBackground || indicators.length === 0) {
    console.log('[Telefonia.js] Hero background o indicadores no encontrados');
    return;
  }

  // Array de imágenes de fondo desde la carpeta yeastar-hero
  const backgroundImages = [
    'assets/img/yeastar-hero/linkus-desktop-client-banner.png',
    'assets/img/yeastar-hero/linkus-mobile-client-img.webp',
    'assets/img/yeastar-hero/linkus-web-client-img.webp',
    'assets/img/yeastar-hero/software-pbx-banner.png'
  ];

  let currentIndex = Math.floor(Math.random() * backgroundImages.length);
  let autoRotateInterval;

  // Función para cambiar la imagen de fondo
  function changeBackground(index, withTransition = true) {
    if (index < 0 || index >= backgroundImages.length) return;
    
    currentIndex = index;
    
    // Aplicar transición suave
    if (withTransition) {
      heroBackground.style.opacity = '0';
    }
    
    setTimeout(() => {
      heroBackground.style.backgroundImage = `url('${backgroundImages[index]}')`;
      if (withTransition) {
        heroBackground.style.opacity = '1';
      }
      
      // Actualizar indicadores
      indicators.forEach((indicator, idx) => {
        if (idx === index) {
          indicator.classList.add('active');
        } else {
          indicator.classList.remove('active');
        }
      });
    }, withTransition ? 400 : 0);
  }

  // Función para avanzar a la siguiente imagen
  function nextBackground() {
    const nextIndex = (currentIndex + 1) % backgroundImages.length;
    changeBackground(nextIndex);
  }

  // Establecer imagen inicial aleatoria
  changeBackground(currentIndex, false);

  // Auto-rotar cada 6 segundos
  function startAutoRotate() {
    stopAutoRotate();
    autoRotateInterval = setInterval(nextBackground, 6000);
  }

  function stopAutoRotate() {
    if (autoRotateInterval) {
      clearInterval(autoRotateInterval);
    }
  }

  // Iniciar auto-rotación
  startAutoRotate();

  // Manejar clicks en los indicadores
  indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
      changeBackground(index);
      stopAutoRotate();
      // Reiniciar auto-rotación después de 10 segundos de inactividad
      setTimeout(startAutoRotate, 10000);
    });
  });

  // Pausar auto-rotación al hacer hover sobre el hero
  heroBackground.parentElement.addEventListener('mouseenter', stopAutoRotate);
  heroBackground.parentElement.addEventListener('mouseleave', startAutoRotate);

  console.log('[Telefonia.js] Hero background rotation inicializado');
})();

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

// Inicialización consolidada de todos los elementos de la página
document.addEventListener('DOMContentLoaded', function() {
  // Verificar si ya se inicializó para evitar duplicados
  if (window.telefoniaInitialized) {
    console.log('[Telefonia.js] Ya inicializado, evitando duplicación');
    return;
  }
  
  console.log('[Telefonia.js] === INICIO INICIALIZACIÓN ===');
  
  // === HERO VISIBILITY ===
  console.log('[Telefonia.js] Configurando visibilidad del hero...');
  const heroTitle = document.querySelector('#hero #hero-title');
  const heroSub = document.querySelector('.telefonia-hero-sub');
  const heroActions = document.querySelector('.telefonia-hero-actions');
  const elems = [heroTitle, heroSub, heroActions];
  
  // Mostrar elementos del hero inmediatamente
  elems.forEach(el => {
    if (el) {
      el.style.opacity = '1';
      el.style.transform = 'none';
      el.classList.remove('opacity-0', 'translate-y-10');
    }
  });
  console.log('[Telefonia.js] Hero elements made visible');
  
  // === PLAN BUTTONS ===
  console.log('[Telefonia.js] Inicializando botones de planes...');
  
  const planButtons = document.querySelectorAll('.tel-plan__btn');
  console.log(`[Telefonia.js] Botones de planes encontrados: ${planButtons.length}`);
  
  if (planButtons.length === 0) {
    console.error('[Telefonia.js] ¡NO SE ENCONTRARON BOTONES DE PLANES!');
    return;
  }
  
  planButtons.forEach((button, index) => {
    console.log(`[Telefonia.js] Configurando botón ${index + 1}:`, button);
    
    // Verificar si el botón ya tiene el listener para evitar duplicados
    if (button.dataset.listenerAdded === 'true') {
      console.log(`[Telefonia.js] Botón ${index + 1} ya tiene listener, saltando...`);
      return;
    }
    
    // Log de atributos del botón
    console.log(`[Telefonia.js] Botón ${index + 1} datos:`, {
      plan: button.getAttribute('data-plan'),
      precio: button.getAttribute('data-precio'),
      ext: button.getAttribute('data-ext'),
      troncal: button.getAttribute('data-troncal')
    });
    
    button.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      
      console.log('[Telefonia.js] ¡¡¡ CLICK DETECTADO EN BOTÓN DE PLAN !!!');
      console.log('[Telefonia.js] Botón clickeado:', this);
      
      // Obtener datos del plan
      const plan = this.getAttribute('data-plan') || 'Plan no especificado';
      const precio = this.getAttribute('data-precio') || 'Precio no especificado';
      const extensiones = this.getAttribute('data-ext') || 'Extensiones no especificadas';
      const troncal = this.getAttribute('data-troncal') || 'Troncal no especificado';
      const numeracion = this.getAttribute('data-numeracion') || 'Numeración LADA México';
      
      console.log('[Telefonia.js] Datos extraídos del plan:', { plan, precio, extensiones, troncal, numeracion });
      
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
      console.log('[Telefonia.js] URL de WhatsApp generada:', whatsappURL);
      
      // Abrir WhatsApp en nueva pestaña
      console.log('[Telefonia.js] Abriendo WhatsApp...');
      window.open(whatsappURL, '_blank');
      
      // Mostrar notificación si está disponible
      if (window.NTNotify) {
        NTNotify.success(`Solicitud enviada: ${plan}`);
      }
      
      console.log('[Telefonia.js] Proceso de WhatsApp completado');
    });
    
    // Marcar que el botón ya tiene listener
    button.dataset.listenerAdded = 'true';
    console.log(`[Telefonia.js] Botón ${index + 1} marcado como inicializado`);
  });
  
  console.log('[Telefonia.js] === INICIALIZACIÓN COMPLETADA ===');
  
  // Marcar como inicializado para evitar duplicaciones
  window.telefoniaInitialized = true;
});

console.info('[telefonia.js] animaciones hero extendidas sincronizadas con headings');