<?php
/**
 * Contenido modular: Página Contacto
 * Incluye formulario accesible + datos directos + mapa embebido (placeholder)
 */
?>
<section class="nt-hero-wrapper relative">
  <div class="absolute inset-0 -z-[1]" style="background:linear-gradient(135deg,#0f172a,#134e4a 55%,#0f766e);opacity:.95;"></div>
  <div class="max-w-5xl mx-auto px-6 lg:px-10 text-slate-100">
    <?php echo nt_heading('Contacto','fa-solid fa-paper-plane','lg','Resolvemos dudas y diseñamos contigo',[ 'animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
    <p class="nt-lead max-w-2xl mt-4 text-slate-300">Cuéntanos tu necesidad y un especialista te responderá normalmente en menos de 24 horas hábiles.</p>
  </div>
</section>

<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16">
    <div>
      <?php echo nt_heading('Envíanos un mensaje','fa-solid fa-inbox','md',null,['class'=>'nt-heading-accent-bar']); ?>
      <form id="contact-form" class="mt-6 space-y-5" method="post" action="#" onsubmit="event.preventDefault(); NTNotify.success('Mensaje simulado enviado',{ttl:3500}); this.reset();">
        <div>
          <label for="cf-name" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1">Nombre</label>
          <input required id="cf-name" name="name" type="text" class="w-full rounded-md border border-slate-300 px-4 py-2.5 shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-300 outline-none transition" placeholder="Tu nombre completo">
        </div>
        <div class="grid sm:grid-cols-2 gap-5">
          <div>
            <label for="cf-email" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1">Correo</label>
            <input required id="cf-email" name="email" type="email" class="w-full rounded-md border border-slate-300 px-4 py-2.5 shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-300 outline-none" placeholder="tucorreo@empresa.com">
          </div>
          <div>
            <label for="cf-phone" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1">Teléfono</label>
            <input id="cf-phone" name="phone" type="tel" class="w-full rounded-md border border-slate-300 px-4 py-2.5 shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-300 outline-none" placeholder="Opcional">
          </div>
        </div>
        <div>
          <label for="cf-topic" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1">Interés</label>
          <select id="cf-topic" name="topic" class="w-full rounded-md border border-slate-300 px-4 py-2.5 bg-white shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-300 outline-none">
            <option value="cctv">CCTV / Videovigilancia</option>
            <option value="telefonia">Telefonía IP</option>
            <option value="acceso">Control de acceso</option>
            <option value="redes">Redes / Cableado</option>
            <option value="otro">Otro</option>
          </select>
        </div>
        <div>
          <label for="cf-msg" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1">Mensaje</label>
          <textarea required id="cf-msg" name="message" rows="6" class="w-full rounded-md border border-slate-300 px-4 py-3 shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-300 outline-none resize-y" placeholder="Describe brevemente tu requerimiento..."></textarea>
        </div>
        <div class="flex items-start gap-3 text-xs text-slate-600">
          <input id="cf-privacy" type="checkbox" required class="mt-0.5"> <label for="cf-privacy">Acepto el uso de mis datos conforme al <a href="#privacidad" class="text-teal-600 underline">aviso de privacidad</a>.</label>
        </div>
        <div class="pt-2 flex gap-4">
          <button type="submit" class="nt-btn" data-variant="primary"><i class="fa-solid fa-paper-plane"></i> Enviar</button>
          <button type="reset" class="nt-btn" data-variant="ghost"><i class="fa-solid fa-rotate-left"></i> Limpiar</button>
        </div>
      </form>
    </div>
    <div class="space-y-10">
      <?php echo nt_heading('Canales directos','fa-solid fa-headset','md',null,['class'=>'nt-heading-accent-bar']); ?>
      <ul class="space-y-4 text-sm text-slate-700">
        <li class="flex items-start gap-3"><i class="fa-solid fa-phone text-teal-600 mt-0.5"></i><div><strong>Teléfono:</strong> <a href="tel:+526252690997" class="text-teal-700 hover:underline">+52 (625) 269 0997</a></div></li>
        <li class="flex items-start gap-3"><i class="fa-solid fa-envelope text-teal-600 mt-0.5"></i><div><strong>Correo:</strong> <a href="mailto:contacto@norttek.com.mx" class="text-teal-700 hover:underline">contacto@norttek.com.mx</a></div></li>
        <li class="flex items-start gap-3"><i class="fa-brands fa-whatsapp text-teal-600 mt-0.5"></i><div><strong>WhatsApp:</strong> <a href="https://wa.me/526252690997" class="text-teal-700 hover:underline" target="_blank" rel="noopener">Chat inmediato</a></div></li>
        <li class="flex items-start gap-3"><i class="fa-solid fa-clock text-teal-600 mt-0.5"></i><div><strong>Horario:</strong> Lun-Vie 9:00–18:00 (GMT-6)</div></li>
      </ul>
      <div>
        <?php echo nt_heading('Ubicación','fa-solid fa-location-dot','sm',null,['class'=>'nt-heading-accent-bar']); ?>
        <div class="mt-3 text-sm text-slate-600 leading-relaxed">
          Rayón y Agustín Melgar #608<br>Zona Centro, Ciudad Cuauhtémoc, Chihuahua<br>CP 31500 • México
        </div>
        <div class="mt-5 aspect-video w-full rounded-xl overflow-hidden border border-slate-200 shadow-sm bg-slate-100 flex items-center justify-center text-slate-500 text-xs">
          Mapa próximamente
        </div>
      </div>
      <div class="pt-4">
        <?php echo nt_heading('Respuesta promedio','fa-solid fa-gauge-high','sm',null,['class'=>'nt-heading-accent-bar']); ?>
        <p class="mt-2 text-xs text-slate-500">La mayoría de las solicitudes reciben respuesta inicial en menos de <strong>6 horas hábiles</strong>.</p>
      </div>
    </div>
  </div>
</section>

<section class="py-24 bg-slate-900 text-center text-slate-200">
  <div class="max-w-3xl mx-auto px-6">
    <?php echo nt_heading('¿Prefieres una llamada guiada?','fa-solid fa-phone-volume','md','Agenda una sesión introductoria', ['class'=>'nt-heading-accent-bar']); ?>
    <p class="mt-4 text-slate-300">Coordinamos una videollamada corta para entender el contexto y estimar siguientes pasos.</p>
    <div class="mt-8 flex flex-wrap justify-center gap-4">
      <a href="tel:+526252690997" class="nt-btn" data-variant="primary"><i class="fa-solid fa-phone"></i> Llamar ahora</a>
      <a href="mailto:contacto@norttek.com.mx?subject=Agendar%20llamada" class="nt-btn" data-variant="outline"><i class="fa-solid fa-calendar-check"></i> Agendar</a>
    </div>
  </div>
</section>
<?php
/**
 * contactContent.php
 * Contenido creativo y funcional para la página de contacto de Norttek Solutions
 */
?>

<section class="relative min-h-screen flex items-center justify-center py-24" style="padding-top:180px; background:linear-gradient(145deg,#f0f7ff,#e4effb);">
    <div class="absolute inset-0 pointer-events-none select-none">
    <img src="/assets/img/webpage.png" alt="" class="w-full h-full object-cover opacity-10">
    </div>
    <div class="relative z-10 max-w-3xl w-full mx-auto bg-white rounded-2xl shadow-xl p-10 nt-fade-in" id="contact-card">
        <div class="text-center mb-8">
            <?php echo nt_heading('¡Hablemos!', 'fa-solid fa-comments', 'lg', 'Compártenos tu proyecto o duda', ['id'=>'contact-heading','class'=>'nt-heading-accent-bar']); ?>
            <p class="nt-lead max-w-2xl mx-auto" style="margin-top:.9rem;">¿Tienes una idea, un reto o solo quieres saludar? Cuéntanos y te contactamos con soluciones a tu medida.</p>
        </div>
        <form id="contactForm" class="nt-form" autocomplete="off">
            <div class="nt-form-row">
                <div class="nt-field">
                    <label for="nombre">¿Cómo te llamas?</label>
                    <div class="nt-input-icon">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" id="nombre" name="nombre" required class="nt-input" placeholder="Tu nombre completo" autocomplete="name">
                    </div>
                </div>
                <div class="nt-field">
                    <label for="email">¿Cuál es tu correo?</label>
                    <div class="nt-input-icon">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" id="email" name="email" required class="nt-input" placeholder="tucorreo@email.com" autocomplete="email">
                    </div>
                </div>
            </div>
            <div class="nt-field">
                <label for="mensaje">¿Qué necesitas?</label>
                <textarea id="mensaje" name="mensaje" required rows="5" class="nt-input" placeholder="Cuéntanos tu idea, problema o proyecto..."></textarea>
                <span class="nt-help">Sé específico para ayudarte mejor.</span>
            </div>
            <div class="nt-form-row" style="align-items:stretch;">
                <button type="submit" class="nt-btn" data-variant="primary" style="flex:1 1 200px; justify-content:center;">
                    <i class="fa-solid fa-paper-plane"></i> Enviar mensaje
                </button>
                <a id="contact-whatsapp" href="https://wa.me/526252690097?text=Hola%20Norttek%20Solutions%2C%20quiero%20información" target="_blank" class="nt-btn" data-variant="outline" style="flex:1 1 200px; justify-content:center;">
                    <i class="fa-brands fa-whatsapp"></i> WhatsApp Directo
                </a>
            </div>
            <div id="contactSuccess" class="hidden nt-text-success text-center font-semibold mt-2" style="color:#15803d;"></div>
            <div id="contactError" class="hidden text-center font-semibold mt-2" style="color:#b91c1c;"></div>
        </form>
        <div class="mt-8 text-center nt-text-muted text-xs" style="letter-spacing:.4px;">
            <i class="fa-solid fa-lock nt-icon-accent"></i> Tus datos están seguros. Solo los usamos para responderte.
        </div>
    </div>
</section>