<?php
/**
 * Contenido modular: Página Alarmas Inteligentes
 */
?>
<section class="nt-hero-wrapper relative" style="padding-top:150px;">
  <div class="absolute inset-0 -z-[1]" style="background:linear-gradient(180deg,#04121d,#062f3d 55%,#04121d);"></div>
  <div class="max-w-6xl mx-auto px-6 lg:px-12 text-slate-100">
    <?php echo nt_heading('Alarmas Inteligentes','fa-solid fa-bell','lg','Detección temprana y reacción oportuna',[ 'animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
    <p class="nt-lead max-w-3xl text-slate-300 mt-4">Sistemas de alarma con sensores avanzados, integración móvil y escalabilidad para hogar, negocio y operación crítica.</p>
    <div class="mt-8 flex flex-wrap gap-4">
      <a href="/contact" class="nt-btn" data-variant="primary"><i class="fa-solid fa-file-signature"></i> Cotiza ahora</a>
      <a href="#caracteristicas" class="nt-btn" data-variant="outline"><i class="fa-solid fa-circle-info"></i> Características</a>
    </div>
  </div>
</section>

<section id="caracteristicas" class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6 lg:px-12">
    <?php echo nt_heading('Componentes clave','fa-solid fa-puzzle-piece','md',null,['class'=>'nt-heading-accent-bar']); ?>
    <div class="grid md:grid-cols-3 gap-8 mt-10">
      <div class="p-6 rounded-lg border border-slate-200 bg-white shadow-sm">
        <h3 class="font-semibold mb-2 text-slate-800 flex items-center gap-2"><i class="fa-solid fa-wifi text-teal-600"></i> Conectividad híbrida</h3>
        <p class="text-sm text-slate-600 leading-relaxed">Respaldos LTE/IP para continuidad aún con cortes de energía o caída de enlace principal.</p>
      </div>
      <div class="p-6 rounded-lg border border-slate-200 bg-white shadow-sm">
        <h3 class="font-semibold mb-2 text-slate-800 flex items-center gap-2"><i class="fa-solid fa-mobile-screen text-teal-600"></i> Control remoto</h3>
        <p class="text-sm text-slate-600 leading-relaxed">Arma, desarma y revisa eventos desde aplicación móvil segura con notificaciones push.</p>
      </div>
      <div class="p-6 rounded-lg border border-slate-200 bg-white shadow-sm">
        <h3 class="font-semibold mb-2 text-slate-800 flex items-center gap-2"><i class="fa-solid fa-microchip text-teal-600"></i> Sensores inteligentes</h3>
        <p class="text-sm text-slate-600 leading-relaxed">Detección de movimiento, apertura, humo, gas y temperatura con auto-prueba programada.</p>
      </div>
      <div class="p-6 rounded-lg border border-slate-200 bg-white shadow-sm">
        <h3 class="font-semibold mb-2 text-slate-800 flex items-center gap-2"><i class="fa-solid fa-house-signal text-teal-600"></i> Automatización</h3>
        <p class="text-sm text-slate-600 leading-relaxed">Escenas basadas en horarios, eventos o activación de sensores para iluminación y energía.</p>
      </div>
      <div class="p-6 rounded-lg border border-slate-200 bg-white shadow-sm">
        <h3 class="font-semibold mb-2 text-slate-800 flex items-center gap-2"><i class="fa-solid fa-shield-halved text-teal-600"></i> Cifrado y respaldo</h3>
        <p class="text-sm text-slate-600 leading-relaxed">Protocolos seguros y redundancia local + nube para registros críticos.</p>
      </div>
      <div class="p-6 rounded-lg border border-slate-200 bg-white shadow-sm">
        <h3 class="font-semibold mb-2 text-slate-800 flex items-center gap-2"><i class="fa-solid fa-headset text-teal-600"></i> Soporte 24/7</h3>
        <p class="text-sm text-slate-600 leading-relaxed">Atención prioritaria, diagnóstico remoto y SLA opcional por contrato.</p>
      </div>
    </div>
  </div>
</section>

<section class="py-20 bg-slate-50">
  <div class="max-w-5xl mx-auto px-6 lg:px-12">
    <?php echo nt_heading('Planes orientativos','fa-solid fa-basket-shopping','md',null,['class'=>'nt-heading-accent-bar']); ?>
    <div class="grid md:grid-cols-3 gap-8 mt-10">
      <div class="rounded-xl border border-slate-200 bg-white p-6 flex flex-col">
        <h3 class="font-semibold text-slate-800 mb-1">Residencial</h3>
        <p class="text-xs uppercase tracking-wide text-teal-600 font-medium mb-4">Nivel básico</p>
        <ul class="text-sm text-slate-600 space-y-2 flex-1">
          <li><i class="fa-solid fa-check text-teal-600 mr-1"></i> Panel IP + 6 sensores</li>
          <li><i class="fa-solid fa-check text-teal-600 mr-1"></i> App móvil</li>
          <li><i class="fa-solid fa-check text-teal-600 mr-1"></i> Batería de respaldo</li>
        </ul>
        <a href="/contact" class="nt-btn mt-6" data-variant="outline">Solicitar</a>
      </div>
      <div class="rounded-xl border-2 border-teal-500 bg-white p-6 shadow-sm relative flex flex-col">
        <div class="absolute -top-3 right-4 bg-teal-600 text-white text-[10px] px-2 py-1 rounded-full font-semibold tracking-wide">Popular</div>
        <h3 class="font-semibold text-slate-800 mb-1">Comercial</h3>
        <p class="text-xs uppercase tracking-wide text-teal-600 font-medium mb-4">Equilibrado</p>
        <ul class="text-sm text-slate-600 space-y-2 flex-1">
          <li><i class="fa-solid fa-check text-teal-600 mr-1"></i> Panel híbrido + 16 zonas</li>
          <li><i class="fa-solid fa-check text-teal-600 mr-1"></i> Sensores fuego & fuga gas</li>
          <li><i class="fa-solid fa-check text-teal-600 mr-1"></i> Integración CCTV</li>
        </ul>
        <a href="/contact" class="nt-btn mt-6" data-variant="primary">Cotizar</a>
      </div>
      <div class="rounded-xl border border-slate-200 bg-white p-6 flex flex-col">
        <h3 class="font-semibold text-slate-800 mb-1">Industrial</h3>
        <p class="text-xs uppercase tracking-wide text-teal-600 font-medium mb-4">Alta complejidad</p>
        <ul class="text-sm text-slate-600 space-y-2 flex-1">
          <li><i class="fa-solid fa-check text-teal-600 mr-1"></i> Diseño personalizado</li>
          <li><i class="fa-solid fa-check text-teal-600 mr-1"></i> Sensores especializados</li>
          <li><i class="fa-solid fa-check text-teal-600 mr-1"></i> Integración SCADA/IoT</li>
        </ul>
        <a href="/contact" class="nt-btn mt-6" data-variant="outline">Asesoría</a>
      </div>
    </div>
  </div>
</section>

<section class="py-24 bg-slate-900 text-center text-slate-200">
  <div class="max-w-4xl mx-auto px-6">
    <?php echo nt_heading('¿Listo para elevar tu seguridad?','fa-solid fa-lock','md','Te guiamos en la implementación', ['class'=>'nt-heading-accent-bar']); ?>
    <p class="mt-4 text-slate-300">Creamos una propuesta escalable y con prioridades claras para tu contexto.</p>
    <div class="mt-8 flex flex-wrap gap-4 justify-center">
      <a href="/contact" class="nt-btn" data-variant="primary"><i class="fa-solid fa-headset"></i> Hablar ahora</a>
      <a href="/cctv" class="nt-btn" data-variant="secondary"><i class="fa-solid fa-video"></i> Ver CCTV</a>
    </div>
  </div>
</section>
<?php
/**
 * Contenido principal para la página Alarmas Inteligentes (refactor 2025 design system)
 */
?>
<section class="nt-section pb-16 bg-white nt-hero-wrapper" style="padding-top:150px;">
    <div class="max-w-6xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-12">
            <?= nt_heading('Alarmas Inteligentes', 'fa-solid fa-bell', 'xl', null, ['id' => 'alarmas-hero','animate'=>true,'delay'=>'sm','class'=>'nt-heading-accent-bar']); ?>
            <p class="nt-lead max-w-3xl mx-auto mt-4">
                Sistemas de alarma con sensores de movimiento, apertura, humo y más. Recibe alertas en tu celular y mantén tu propiedad protegida 24/7.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-14 items-center">
            <div class="order-2 md:order-1">
                <?= nt_heading('¿Qué ofrecemos?', 'fa-solid fa-list-check', 'md', null, ['animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
                <ul class="space-y-3 mt-6 mb-8">
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Alarmas cableadas e inalámbricas</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Control desde app móvil</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Integración con cámaras y automatización</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Instalación y soporte profesional</span></li>
                </ul>
                <a href="/contact.php" class="nt-btn nt-btn-primary">
                    <i class="fa-solid fa-file-signature"></i><span>Cotiza tu sistema</span>
                </a>
            </div>
            <div class="flex justify-center order-1 md:order-2">
                <div class="relative rounded-2xl overflow-hidden shadow-lg max-w-sm w-full bg-gray-50">
                    <img src="/assets/img/cctv-hero_img.jpg" alt="Panel de alarma inteligente" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>
