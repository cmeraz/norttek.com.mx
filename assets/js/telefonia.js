// Referencias
  const openVideoBtn = document.getElementById("openVideo");
  const videoModal = document.getElementById("videoModal");
  const closeVideoBtn = document.getElementById("closeVideo");
  const youtubeVideo = document.getElementById("youtubeVideo");

  // Abrir modal con video
  openVideoBtn.addEventListener("click", () => {
    videoModal.classList.remove("hidden");
    youtubeVideo.src = "https://www.youtube.com/embed/HVc0M7uDKAE?autoplay=1";
  });

  // Cerrar modal y detener video
  closeVideoBtn.addEventListener("click", () => {
    videoModal.classList.add("hidden");
    youtubeVideo.src = "";
  });

  // Cerrar modal al hacer click fuera
  videoModal.addEventListener("click", (e) => {
    if (e.target === videoModal) {
      videoModal.classList.add("hidden");
      youtubeVideo.src = "";
    }
  });

  <!-- JS FAQ y botones WhatsApp -->

    // FAQ con contenido más enriquecido
  const faqs = [
    { 
      q: "¿Qué es una PBX en la nube?", 
      a: "Una PBX en la nube es un sistema telefónico alojado en servidores remotos que utiliza Internet para gestionar llamadas. Esto elimina la necesidad de equipos físicos en tu oficina y te permite escalar fácilmente tu comunicación empresarial." 
    },
    { 
      q: "¿Puedo usar mis teléfonos actuales?", 
      a: "Sí. Nuestra solución es compatible con la mayoría de los teléfonos IP que soporten el protocolo SIP. Además, puedes integrar aplicaciones móviles y clientes de escritorio sin costo adicional." 
    },
    { 
      q: "¿Se puede usar fuera de la oficina?", 
      a: "Por supuesto. Podrás atender llamadas desde cualquier lugar mediante tu PC, aplicación móvil o un teléfono físico configurado. Toda la comunicación está protegida con seguridad TLS/SRTP para mayor tranquilidad." 
    },
    { 
      q: "¿Qué ventajas ofrece frente a un conmutador físico?", 
      a: "Reducción de costos de mantenimiento, escalabilidad inmediata, actualizaciones automáticas, movilidad total y la posibilidad de gestionar reportes y grabaciones desde cualquier dispositivo." 
    }
  ];

  const container = document.getElementById("faq");

  faqs.forEach(({q, a}) => {
    const item = document.createElement("div");
    item.className = "bg-white shadow-md rounded-lg overflow-hidden transition-all duration-300";

    item.innerHTML = `
      <button class="w-full flex justify-between items-center p-4 text-left focus:outline-none">
        <span class="font-semibold text-gray-800">${q}</span>
        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
      </button>
      <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
        <p class="p-4 text-gray-600">${a}</p>
      </div>
    `;

    const btn = item.querySelector("button");
    const answer = item.querySelector("div");
    const icon = item.querySelector("i");

    btn.addEventListener("click", () => {
      const isOpen = answer.style.maxHeight && answer.style.maxHeight !== "0px";

      if (isOpen) {
        answer.style.maxHeight = "0px";
        icon.classList.remove("rotate-180");
      } else {
        answer.style.maxHeight = answer.scrollHeight + "px";
        icon.classList.add("rotate-180");
      }
    });

    container.appendChild(item);
  });

    // WhatsApp botones
    document.addEventListener('DOMContentLoaded', () => {
      const botones = document.querySelectorAll('a[data-plan]');
      botones.forEach(boton => {
        boton.addEventListener('click', function(e) {
          e.preventDefault();
          const plan = boton.getAttribute('data-plan');
          const precio = boton.getAttribute('data-precio');
          const extensiones = boton.getAttribute('data-ext');
          const troncal = boton.getAttribute('data-troncal');
          const numeracion = boton.getAttribute('data-numeracion');
          const mensaje = "\u{1F44B} ¡Hola!\nQuiero cotizar el *" + plan + "* \u{1F4E6}\n\n" +
                          "\u{2705} Extensiones: " + extensiones + "\n" +
                          "\u{2705} Troncal y canales: " + troncal + "\n" +
                          "\u{2705} Numeración: " + numeracion + "\n" +
                          "\u{1F4B0} Precio: " + precio;
          const url = "https://wa.me/526252690997?text=" + encodeURIComponent(mensaje);
          window.open(url, '_blank');
        });
      });
    });

    document.addEventListener('DOMContentLoaded', () => {
      // Todas tus referencias y lógica aquí

      // Ejemplo para el modal demo:
      const openModalBtn = document.getElementById('openModal');
      const modal = document.getElementById('modalDemo');
      const closeModalBtn = document.getElementById('closeModal');

      function openModalFunc() {
        modal.classList.remove('hidden');
        setTimeout(() => {
          modal.children[0].classList.remove('scale-90', 'opacity-0');
        }, 50);
      }

      function closeModalFunc() {
        modal.children[0].classList.add('scale-90', 'opacity-0');
        setTimeout(() => {
          modal.classList.add('hidden');
        }, 300);
      }

      if (openModalBtn && closeModalBtn && modal) {
        openModalBtn.addEventListener('click', openModalFunc);
        closeModalBtn.addEventListener('click', closeModalFunc);
        modal.addEventListener('click', e => {
          if(e.target === modal) closeModalFunc();
        });
      }

      // Validación y envío
      const form = document.getElementById('demoForm');

      function sanitizeInput(str) {
        const temp = document.createElement('div');
        temp.textContent = str;
        return encodeURIComponent(temp.textContent.trim());
      }

      form.addEventListener('submit', e => {
        e.preventDefault();

        let nombre = document.getElementById('nombre').value;
        let email = document.getElementById('email').value;
        let telefono = document.getElementById('telefono').value;

        let errores = [];

        if(nombre.trim().length < 2) errores.push("El nombre es demasiado corto.");
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!emailRegex.test(email.trim())) errores.push("El correo electrónico no es válido.");
        const telefonoRegex = /^[0-9]{10,15}$/;
        if(!telefonoRegex.test(telefono.trim())) errores.push("El teléfono debe tener solo números y entre 10 y 15 dígitos.");

        if(errores.length > 0){
          alert("Por favor corrige los siguientes errores:\n\n" + errores.join("\n"));
          return;
        }

        // Sanitizar
        nombre = sanitizeInput(nombre);
        email = sanitizeInput(email);
        telefono = sanitizeInput(telefono);

        const mensaje = `¡Hola!%0AQuiero solicitar la demo del sistema de conmutador en la nube.%0A%0ANombre: ${nombre}%0AEmail: ${email}%0ATeléfono: ${telefono}`;

        window.open(`https://wa.me/526252690997?text=${mensaje}`, '_blank');

        closeModalFunc();
        form.reset();
      });


      window.addEventListener("load", () => {
        // Animar título
        gsap.to("#hero h1", { duration: 1, opacity: 1, y: 0, ease: "power2.out" });
        // Animar párrafo
        gsap.to("#hero p", { duration: 1, opacity: 1, y: 0, delay: 0.3, ease: "power2.out" });
        // Animar botones
        gsap.to("#hero .mt-6", { duration: 1, opacity: 1, y: 0, delay: 0.6, ease: "back.out(1.5)" });
        // Animar imagen
        gsap.to(".hero-image-container", { duration: 1, opacity: 1, y: 0, delay: 0.9, ease: "power2.out" });
      });
    });

    document.addEventListener('DOMContentLoaded', () => {
      const videoModal = document.getElementById('videoModal');
      const youtubeVideo = document.getElementById('youtubeVideo');
      const closeVideo = document.getElementById('closeVideo');
      const btnVideo = document.getElementById('openVideo');
      const btnLinkus = document.getElementById('openLinkus');

      function openVideoModal(btn) {
        let url = btn.dataset.video || '';
        // Asegura que autoplay=1 esté presente
        if (!url.includes('autoplay=1')) {
          url += (url.includes('?') ? '&' : '?') + 'autoplay=1';
        }
        youtubeVideo.src = url;
        videoModal.classList.remove('hidden');
        youtubeVideo.focus();
      }

      if (btnVideo) btnVideo.addEventListener('click', () => openVideoModal(btnVideo));
      if (btnLinkus) btnLinkus.addEventListener('click', () => openVideoModal(btnLinkus));
      if (closeVideo) closeVideo.addEventListener('click', () => {
        youtubeVideo.src = '';
        videoModal.classList.add('hidden');
      });
      if (videoModal) videoModal.addEventListener('click', (e) => {
        if (e.target === videoModal) {
          youtubeVideo.src = '';
          videoModal.classList.add('hidden');
        }
      });
      document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") {
          youtubeVideo.src = '';
          videoModal.classList.add('hidden');
        }
      });
    });

    document.addEventListener('DOMContentLoaded', () => {
      const faqs = [
        {
          q: "¿Qué es una PBX en la nube?",
          a: "Una PBX en la nube es un sistema telefónico alojado en servidores remotos que utiliza Internet para gestionar llamadas. Esto elimina la necesidad de equipos físicos en tu oficina y te permite escalar fácilmente tu comunicación empresarial."
        },
        {
          q: "¿Puedo usar mis teléfonos actuales?",
          a: "Sí. Nuestra solución es compatible con la mayoría de los teléfonos IP que soporten el protocolo SIP. Además, puedes integrar aplicaciones móviles y clientes de escritorio sin costo adicional."
        },
        {
          q: "¿Se puede usar fuera de la oficina?",
          a: "Por supuesto. Podrás atender llamadas desde cualquier lugar mediante tu PC, aplicación móvil o un teléfono físico configurado. Toda la comunicación está protegida con seguridad TLS/SRTP para mayor tranquilidad."
        },
        {
          q: "¿Qué ventajas ofrece frente a un conmutador físico?",
          a: "Reducción de costos de mantenimiento, escalabilidad inmediata, actualizaciones automáticas, movilidad total y la posibilidad de gestionar reportes y grabaciones desde cualquier dispositivo."
        }
      ];

      const container = document.getElementById("faq");
      if (!container) return;

      faqs.forEach(({ q, a }, idx) => {
        const item = document.createElement("div");
        item.className = "faq-item";
        item.innerHTML = `
          <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-${idx}">
            <span>${q}</span>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
          </button>
          <div class="faq-answer" id="faq-answer-${idx}" aria-hidden="true">
            ${a}
          </div>
        `;
        const btn = item.querySelector(".faq-question");
        const answer = item.querySelector(".faq-answer");

        btn.addEventListener("click", () => {
          const isOpen = item.classList.contains("open");
          // Cierra todos los demás
          document.querySelectorAll('.faq-item.open').forEach(el => {
            if (el !== item) {
              el.classList.remove("open");
              el.querySelector(".faq-question").setAttribute("aria-expanded", "false");
              el.querySelector(".faq-answer").setAttribute("aria-hidden", "true");
            }
          });
          // Alterna el actual
          item.classList.toggle("open");
          btn.setAttribute("aria-expanded", String(!isOpen));
          answer.setAttribute("aria-hidden", String(isOpen));
        });

        container.appendChild(item);
      });
    });