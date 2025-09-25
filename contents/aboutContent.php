<?php
/**
 * Contenido modular: Página Nosotros (about)
 * Estructura: Hero + Misión/Visión + Valores + Timeline + CTA
 */
?>
<section class="nt-hero-wrapper relative overflow-hidden" style="padding-top:150px;">
  <div class="absolute inset-0 -z-[1]" style="background:radial-gradient(circle at 20% 30%,rgba(14,165,233,.25),transparent 60%),radial-gradient(circle at 80% 70%,rgba(20,184,166,.25),transparent 55%),linear-gradient(180deg,#0f172a,#111827 70%,#0f172a);"></div>
  <div class="max-w-6xl mx-auto px-6 lg:px-12 text-center text-slate-100">
    <?php echo nt_heading('Sobre Norttek Solutions','fa-solid fa-layer-group','lg','Tecnología y seguridad con propósito',[ 'animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
    <p class="nt-lead max-w-3xl mx-auto text-slate-300" style="margin-top:1rem;">
      Integramos soluciones de <strong>seguridad electrónica, comunicaciones y redes</strong> con enfoque en continuidad operativa, escalabilidad y soporte honesto.
    </p>
    <div class="mt-8 flex flex-wrap justify-center gap-4">
      <a href="/contact" class="nt-btn" data-variant="primary"><i class="fa-solid fa-paper-plane"></i> Contáctanos</a>
      <a href="/telefonia" class="nt-btn" data-variant="outline"><i class="fa-solid fa-phone-volume"></i> Telefonía IP</a>
    </div>
  </div>
</section>

<section class="py-20 bg-white relative">
  <div class="max-w-6xl mx-auto px-6 lg:px-12 grid md:grid-cols-3 gap-12">
    <div class="md:col-span-2 space-y-10">
      <div>
        <?php echo nt_heading('Misión','fa-solid fa-bullseye','md',null,['animate'=>true,'delay'=>'sm','class'=>'nt-heading-accent-bar']); ?>
        <p class="text-gray-600 leading-relaxed mt-3">Proporcionar soluciones tecnológicas confiables que fortalezcan la seguridad, productividad y comunicación de nuestros clientes, construyendo relaciones duraderas basadas en claridad y soporte real.</p>
      </div>
      <div>
        <?php echo nt_heading('Visión','fa-solid fa-eye','md',null,['animate'=>true,'delay'=>'md','class'=>'nt-heading-accent-bar']); ?>
        <p class="text-gray-600 leading-relaxed mt-3">Ser un socio estratégico reconocido en el norte de México por integrar servicios de seguridad, voz y datos con un estándar humano y técnico superior.</p>
      </div>
      <div>
        <?php echo nt_heading('Valores','fa-solid fa-heart','md',null,['animate'=>true,'delay'=>'lg','class'=>'nt-heading-accent-bar']); ?>
        <ul class="grid sm:grid-cols-2 gap-4 mt-4 text-sm">
          <li class="p-4 rounded-lg bg-slate-50 border border-slate-100 flex gap-3"><i class="fa-solid fa-shield-halved text-teal-600 mt-1"></i> Confianza y ética profesional.</li>
          <li class="p-4 rounded-lg bg-slate-50 border border-slate-100 flex gap-3"><i class="fa-solid fa-gears text-teal-600 mt-1"></i> Mejora continua.</li>
          <li class="p-4 rounded-lg bg-slate-50 border border-slate-100 flex gap-3"><i class="fa-solid fa-user-check text-teal-600 mt-1"></i> Enfoque en la persona.</li>
            <li class="p-4 rounded-lg bg-slate-50 border border-slate-100 flex gap-3"><i class="fa-solid fa-handshake text-teal-600 mt-1"></i> Compromiso y claridad.</li>
        </ul>
      </div>
    </div>
    <div class="space-y-8">
      <?php echo nt_heading('En cifras','fa-solid fa-chart-column','sm',null,['class'=>'nt-heading-accent-bar']); ?>
      <div class="grid grid-cols-2 gap-4 text-center">
        <div class="p-4 bg-white border rounded-lg shadow-sm">
          <div class="text-2xl font-bold text-slate-800">8+</div>
          <div class="text-xs uppercase tracking-wide text-slate-500">Años</div>
        </div>
        <div class="p-4 bg-white border rounded-lg shadow-sm">
          <div class="text-2xl font-bold text-slate-800">120+</div>
          <div class="text-xs uppercase tracking-wide text-slate-500">Proyectos</div>
        </div>
        <div class="p-4 bg-white border rounded-lg shadow-sm">
          <div class="text-2xl font-bold text-slate-800">98%</div>
          <div class="text-xs uppercase tracking-wide text-slate-500">Satisfacción</div>
        </div>
        <div class="p-4 bg-white border rounded-lg shadow-sm">
          <div class="text-2xl font-bold text-slate-800">24/7</div>
          <div class="text-xs uppercase tracking-wide text-slate-500">Monitoreo</div>
        </div>
      </div>
      <div class="mt-10">
        <?php echo nt_heading('Evolución','fa-solid fa-timeline','sm',null,['class'=>'nt-heading-accent-bar']); ?>
        <ul class="mt-4 border-l-2 border-teal-500 pl-5 space-y-6 text-sm">
          <li><span class="block font-semibold text-slate-800">2018</span><span class="text-slate-600">Inicio de operaciones y primeras instalaciones CCTV.</span></li>
          <li><span class="block font-semibold text-slate-800">2020</span><span class="text-slate-600">Expansión a control de acceso y cableado estructurado.</span></li>
          <li><span class="block font-semibold text-slate-800">2023</span><span class="text-slate-600">Lanzamos plataforma de telefonía IP administrada.</span></li>
          <li><span class="block font-semibold text-slate-800">2025</span><span class="text-slate-600">Consolidación de suite integral de servicios convergentes.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="py-24 bg-slate-900 text-center text-slate-200 relative overflow-hidden">
  <div class="absolute inset-0 opacity-40" style="background:radial-gradient(circle at 50% 60%,rgba(20,184,166,.5),transparent 70%);"></div>
  <div class="relative max-w-4xl mx-auto px-6">
    <?php echo nt_heading('¿Listo para impulsar tu infraestructura?','fa-solid fa-rocket','md','Hablemos de tu proyecto',[ 'animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
    <p class="mt-4 text-slate-300">Te ayudamos a dimensionar y priorizar inversiones con enfoque técnico y retorno tangible.</p>
    <div class="mt-8 flex flex-wrap justify-center gap-4">
      <a href="/contact" class="nt-btn" data-variant="primary"><i class="fa-solid fa-comments"></i> Iniciar conversación</a>
      <a href="/cartuchos" class="nt-btn" data-variant="secondary"><i class="fa-solid fa-box"></i> Catálogo rápido</a>
    </div>
  </div>
</section>
<?php
/**
 * aboutContent.php
 * Contenido principal para la página "Nosotros" de Norttek Solutions
 * Sigue la convención modular y DRY del proyecto.
 */
?>

<section class="bg-white pb-16 nt-hero-wrapper" style="padding-top:250px;">
    <div class="max-w-5xl mx-auto px-6 lg:px-8">
        <!-- Hero Nosotros -->
        <div class="text-center mb-16 nt-fade-in">
            <?php echo nt_heading('Sobre Nosotros', 'fa-solid fa-users', 'xl', 'Conoce quiénes somos', ['id' => 'about-hero-heading','animate'=>true,'delay'=>'sm','class'=>'nt-heading-accent-bar']); ?>
            <p class="nt-lead max-w-2xl mx-auto" style="margin-top:1rem;">
                En <strong class="nt-icon-accent">Norttek Solutions</strong> combinamos experiencia, innovación y pasión para proteger y transformar hogares y empresas en todo México.
            </p>
        </div>

        <!-- Historia y valores -->
        <div class="grid md:grid-cols-2 gap-10 items-center mb-20">
            <div class="about-animate-left">
                <?php echo nt_heading('Nuestra Historia', 'fa-solid fa-hourglass-half', 'md', null, ['animate'=>true]); ?>
                <p class="text-gray-600 mb-4">
                    Desde <span class="font-semibold text-blue-700">2015</span>, Norttek Solutions ha evolucionado de un pequeño emprendimiento familiar a una empresa líder en <span class="font-semibold">seguridad electrónica</span> y <span class="font-semibold">automatización</span>. Nuestro crecimiento se basa en la confianza de nuestros clientes y la mejora continua de nuestro equipo.
                </p>
                <ul class="list-disc list-inside text-gray-600 mb-4">
                    <li>+500 proyectos exitosos en empresas y hogares</li>
                    <li>Soporte en todo México</li>
                    <li>Equipo certificado y en constante capacitación</li>
                </ul>
                <p class="text-gray-600">
                    Hoy, somos referentes en <span class="font-semibold">CCTV, alarmas inteligentes, control de acceso, redes y telefonía IP</span>, brindando soluciones integrales y soporte personalizado.
                </p>
            </div>
            <div class="flex justify-center about-animate-right relative">
                <img src="/assets/img/cctv-hero_img.jpg" alt="Equipo Norttek Solutions" class="nt-hero-bg-img opacity-30 hidden md:block">
                <div class="nt-hero-overlay hidden md:block"></div>
                <img src="/assets/img/logo-norttek.png" alt="Equipo Norttek Solutions" class="rounded-xl shadow-2xl w-full max-w-xs hover:scale-105 transition-transform duration-500 relative">
            </div>
        </div>

        <!-- Misión, Visión, Valores con animaciones -->
        <div class="grid md:grid-cols-3 gap-8 text-center mb-20">
            <div class="about-animate-up">
                <div class="text-blue-600 text-4xl mb-2"><i class="fas fa-bullseye"></i></div>
                <h3 class="font-semibold text-xl mb-2">Misión</h3>
                <p class="text-gray-600">
                    Brindar soluciones tecnológicas de seguridad y automatización que mejoren la calidad de vida y la productividad de nuestros clientes, con atención personalizada y tecnología de vanguardia.
                </p>
            </div>
            <div class="about-animate-up" style="animation-delay:0.2s;">
                <div class="text-blue-600 text-4xl mb-2"><i class="fas fa-eye"></i></div>
                <h3 class="font-semibold text-xl mb-2">Visión</h3>
                <p class="text-gray-600">
                    Ser la empresa mexicana líder en innovación, servicio y confianza en el sector de seguridad electrónica y automatización.
                </p>
            </div>
            <div class="about-animate-up" style="animation-delay:0.4s;">
                <div class="text-blue-600 text-4xl mb-2"><i class="fas fa-handshake"></i></div>
                <h3 class="font-semibold text-xl mb-2">Valores</h3>
                <ul class="text-gray-600 list-disc list-inside text-left inline-block">
                    <li>Compromiso</li>
                    <li>Honestidad</li>
                    <li>Innovación</li>
                    <li>Calidad</li>
                    <li>Trabajo en equipo</li>
                    <li>Responsabilidad social</li>
                </ul>
            </div>
        </div>

        <!-- Línea de tiempo con helper reutilizable -->
        <div class="mb-20">
            <?php
            echo nt_timeline([
                ['year'=>2015,'title'=>'Fundación de Norttek Solutions','text'=>'Iniciamos con proyectos residenciales y PYMES.'],
                ['year'=>2018,'title'=>'Expansión Nacional','text'=>'Alcanzamos clientes corporativos en todo México.'],
                ['year'=>2021,'title'=>'Innovación en Automatización','text'=>'Integramos IoT, control remoto y telefonía IP.'],
                ['year'=>2024,'title'=>'+500 Clientes Satisfechos','text'=>'Crecimiento sostenido con soporte especializado.']
            ], [
                'title' => 'Nuestra Trayectoria',
                'subtitle' => 'Evolución y crecimiento',
                'icon' => 'fa-solid fa-route'
            ]);
            ?>
        </div>

        <!-- CTA animada -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-400 rounded-lg p-10 text-center shadow-lg about-animate-cta">
            <?php echo nt_heading('¿Por qué elegir Norttek Solutions?', 'fa-solid fa-shield-halved', 'lg', 'Tecnología, soporte y confianza', ['style' => 'color:#fff;','animate'=>true]); ?>
            <p class="text-blue-50 mb-4 text-lg">
                Atención personalizada, soporte técnico especializado y soluciones a la medida.<br>
                Nuestro compromiso es tu tranquilidad y satisfacción.
            </p>
            <a href="/contact.php" class="nt-btn" data-variant="outline" style="background:linear-gradient(#fff,#fff) padding-box,var(--nt-gradient-border) border-box;">
                <i class="fa-solid fa-envelope-open-text"></i> Contáctanos
            </a>
        </div>
    </div>
</section>