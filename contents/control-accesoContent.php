<?php
/**
 * Contenido modular: Página Control de Acceso
 */
?>
<section class="nt-hero-wrapper relative" style="padding-top:150px;">
  <div class="absolute inset-0 -z-[1]" style="background:radial-gradient(circle at 30% 40%,rgba(13,148,136,.4),transparent 65%),radial-gradient(circle at 80% 70%,rgba(8,145,178,.35),transparent 60%),linear-gradient(180deg,#0f172a,#082f49 70%);"></div>
  <div class="max-w-6xl mx-auto px-6 lg:px-12 text-slate-100">
    <?php echo nt_heading('Control de Acceso','fa-solid fa-door-closed','lg','Gestión y trazabilidad de entradas', ['animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
    <p class="nt-lead max-w-3xl text-slate-300 mt-4">Soluciones biométricas, tarjetas, PIN y credenciales móviles para proteger activos y optimizar flujos de personal.</p>
    <div class="mt-8 flex flex-wrap gap-4">
      <a href="/contact" class="nt-btn" data-variant="primary"><i class="fa-solid fa-file-pen"></i> Solicitar evaluación</a>
      <a href="#modulos" class="nt-btn" data-variant="outline"><i class="fa-solid fa-layer-group"></i> Módulos</a>
    </div>
  </div>
</section>

<section id="modulos" class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6 lg:px-12">
    <?php echo nt_heading('Módulos disponibles','fa-solid fa-cubes','md',null,['class'=>'nt-heading-accent-bar']); ?>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
      <?php
        $mods = [
          ['icon'=>'fa-fingerprint','t'=>'Biometría','d'=>'Lectores de huella y reconocimiento facial con algoritmos rápidos y baja tasa de fallo.'],
          ['icon'=>'fa-id-card','t'=>'Tarjetas / RFID','d'=>'Credenciales de proximidad, MIFARE, control multi-sitio y zonas seguras.'],
          ['icon'=>'fa-mobile-screen','t'=>'Credencial móvil','d'=>'Autenticación vía app segura y códigos dinámicos temporales (OTP).'],
          ['icon'=>'fa-turn-up','t'=>'Torniquetes','d'=>'Integración con torniquetes ópticos y de acero para alto flujo.'],
          ['icon'=>'fa-truck-ramp-box','t'=>'Control vehicular','d'=>'Lectura de placas, tags UHF y automatización de barreras.'],
          ['icon'=>'fa-cloud-arrow-up','t'=>'Monitoreo central','d'=>'Plataforma en la nube con reportes, bitácoras y auditoría granular.'],
        ];
        foreach($mods as $m): ?>
        <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm flex flex-col">
          <h3 class="font-semibold text-slate-800 mb-2 flex items-center gap-2"><i class="fa-solid <?= $m['icon']; ?> text-teal-600"></i> <?= htmlspecialchars($m['t']); ?></h3>
          <p class="text-sm text-slate-600 leading-relaxed flex-1"><?= htmlspecialchars($m['d']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="py-20 bg-slate-50">
  <div class="max-w-6xl mx-auto px-6 lg:px-12">
    <?php echo nt_heading('Beneficios clave','fa-solid fa-square-check','md',null,['class'=>'nt-heading-accent-bar']); ?>
    <div class="grid md:grid-cols-3 gap-8 mt-10 text-sm">
      <div class="p-5 bg-white border border-slate-200 rounded-lg">
        <h4 class="font-semibold mb-2 text-slate-800">Escalabilidad</h4>
        <p class="text-slate-600 leading-relaxed">Desde un solo acceso hasta decenas de edificios integrados en multi-sitio.</p>
      </div>
      <div class="p-5 bg-white border border-slate-200 rounded-lg">
        <h4 class="font-semibold mb-2 text-slate-800">Auditoría granular</h4>
        <p class="text-slate-600 leading-relaxed">Registros firmados, exportables y trazabilidad para cumplimiento normativo.</p>
      </div>
      <div class="p-5 bg-white border border-slate-200 rounded-lg">
        <h4 class="font-semibold mb-2 text-slate-800">Integración</h4>
        <p class="text-slate-600 leading-relaxed">CCTV, alarmas, directorio corporativo (LDAP/AD) y APIs de terceros.</p>
      </div>
    </div>
  </div>
</section>

<section class="py-24 bg-slate-900 text-center text-slate-200">
  <div class="max-w-4xl mx-auto px-6">
    <?php echo nt_heading('¿Quieres una demo funcional?','fa-solid fa-plug','md','Te mostramos flujo real de usuario', ['class'=>'nt-heading-accent-bar']); ?>
    <p class="mt-4 text-slate-300">Preparamos un escenario simulado con accesos, roles y reportes para tu comité.</p>
    <div class="mt-8 flex flex-wrap gap-4 justify-center">
      <a href="/contact" class="nt-btn" data-variant="primary"><i class="fa-solid fa-calendar-check"></i> Agendar demo</a>
      <a href="/alarma" class="nt-btn" data-variant="secondary"><i class="fa-solid fa-bell"></i> Ver Alarmas</a>
    </div>
  </div>
</section>
<?php
/**
 * Contenido principal para la página Control de Acceso (refactor 2025 design system)
 */
?>
<section class="nt-section pb-16 bg-white nt-hero-wrapper" style="padding-top:150px;">
    <div class="max-w-6xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-12">
            <?= nt_heading('Control de Acceso Inteligente', 'fa-solid fa-door-open', 'xl', null, ['id' => 'control-acceso-hero','animate'=>true,'delay'=>'sm','class'=>'nt-heading-accent-bar']); ?>
            <p class="nt-lead max-w-3xl mx-auto mt-4">
                Gestiona y protege el acceso a tus instalaciones con tecnología biométrica, tarjetas, códigos QR y más.
                Soluciones para empresas, escuelas y residencias.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-14 items-center">
            <div class="order-2 md:order-1">
                <?= nt_heading('Ventajas de nuestro sistema', 'fa-solid fa-shield-halved', 'md', null, ['animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
                <ul class="space-y-3 mt-6 mb-8">
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Control horario y reportes de asistencia</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Integración con cámaras y alarmas</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Acceso remoto y gestión desde app</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Instalación profesional y soporte</span></li>
                </ul>
                <a href="/contact.php" class="nt-btn nt-btn-primary">
                    <i class="fa-solid fa-comments"></i><span>Solicita asesoría</span>
                </a>
            </div>
            <div class="flex justify-center order-1 md:order-2">
                <div class="relative rounded-2xl overflow-hidden shadow-lg max-w-sm w-full bg-gray-50">
                    <img src="/assets/img/cctv-hero_img.jpg" alt="Dispositivo de control de acceso" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>
