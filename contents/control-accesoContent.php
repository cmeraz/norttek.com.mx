<?php
/**
 * Contenido modular: Página Control de Acceso
 */
?>
<!-- HERO: Sección principal con imagen de fondo oscura -->
<section class="control-acceso-hero relative min-h-screen flex items-center">
  <!-- Fondo con imagen y overlay oscuro -->
  <div class="absolute inset-0 -z-[1]" style="
    background-image: 
      linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.75)), 
      url('assets/img/accessControl-herobg.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  "></div>
  
  <!-- Contenido del hero adaptado al fondo oscuro -->
  <div class="max-w-6xl mx-auto px-6 lg:px-12 text-white relative z-20">
    <div class="max-w-4xl">
      <?php echo nt_heading('Control de Acceso Inteligente','fa-solid fa-door-closed','xl','Gestión y trazabilidad de entradas con tecnología avanzada', ['animate'=>true,'class'=>'nt-heading-accent-bar text-white']); ?>
      <p class="text-xl leading-relaxed text-gray-200 mt-6 max-w-3xl">
        Soluciones biométricas, tarjetas RFID, códigos PIN y credenciales móviles para proteger tus activos y optimizar los flujos de personal en tiempo real.
      </p>
      <div class="mt-10 flex flex-wrap gap-4">
        <a href="/contact" class="bg-teal-600 hover:bg-teal-700 text-white px-8 py-4 rounded-lg font-semibold transition-all duration-300 flex items-center gap-3 shadow-lg hover:shadow-xl hover:scale-105">
          <i class="fa-solid fa-file-pen"></i> Solicitar evaluación gratuita
        </a>
        <a href="#modulos" class="border-2 border-white/30 hover:border-white/60 text-white hover:bg-white/10 px-8 py-4 rounded-lg font-semibold transition-all duration-300 flex items-center gap-3">
          <i class="fa-solid fa-layer-group"></i> Ver módulos
        </a>
      </div>
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
        <div class="control-acceso-module p-6 bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col">
          <h3 class="font-semibold text-slate-800 mb-2 flex items-center gap-2">
            <i class="fa-solid <?= $m['icon']; ?> text-teal-600 text-lg"></i> 
            <?= htmlspecialchars($m['t']); ?>
          </h3>
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

