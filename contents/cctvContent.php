<?php
/**
 * Contenido modular: Página CCTV
 */
?>
<section class="cctv-hero nt-hero-wrapper">
  <div class="cctv-hero__content">
    <div class="max-w-6xl mx-auto px-6 lg:px-12">
      <?php echo nt_heading('Videovigilancia CCTV','fa-solid fa-video', 'xl', 'Monitoreo visual para seguridad integral', ['animate'=>true,'class'=>'nt-heading-hero nt-heading-invert nt-heading-accent-bar']); ?>
      <p class="nt-lead cctv-hero__lead max-w-3xl mt-4">Cámaras de alta definición, grabación continua y análisis inteligente para proteger tus instalaciones 24/7.</p>
      <div class="mt-8 flex flex-wrap gap-4">
        <a href="/contact" class="nt-btn" data-variant="primary"><i class="fa-solid fa-file-pen"></i> Solicitar evaluación</a>
        <a href="#modulos" class="nt-btn" data-variant="subtle"><i class="fa-solid fa-layer-group"></i> Módulos</a>
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
        ['icon'=>'fa-video', 't'=>'Cámaras IP', 'd'=>'Cámaras de alta definición con conexión a red para monitoreo remoto.'],
        ['icon'=>'fa-cctv', 't'=>'Cámaras PTZ', 'd'=>'Cámaras motorizadas con control de paneo, tilt y zoom para cobertura dinámica.'],
        ['icon'=>'fa-hdd', 't'=>'Grabadores NVR/DVR', 'd'=>'Dispositivos para almacenamiento local y gestión de video en tiempo real.'],
        ['icon'=>'fa-cloud', 't'=>'Grabación en la nube', 'd'=>'Almacenamiento seguro y acceso remoto a grabaciones desde cualquier dispositivo.'],
        ['icon'=>'fa-bell', 't'=>'Detección de movimiento', 'd'=>'Alertas automáticas activadas por movimientos en zonas configurables.'],
        ['icon'=>'fa-user-shield', 't'=>'Análisis de video', 'd'=>'Funciones inteligentes como reconocimiento facial y conteo de personas.'],
        ['icon'=>'fa-wifi', 't'=>'Cámaras inalámbricas', 'd'=>'Instalación sencilla sin cableado, ideal para espacios temporales o difíciles.'],
        ['icon'=>'fa-monitor-heart-rate', 't'=>'Monitoreo en tiempo real', 'd'=>'Visualización simultánea de múltiples cámaras con interfaz intuitiva.'],
        ['icon'=>'fa-shield-alt', 't'=>'Ciberseguridad', 'd'=>'Protección avanzada para evitar accesos no autorizados y garantizar integridad de datos.'],
      ];
      foreach($mods as $m): ?>
      <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm flex flex-col">
        <h3 class="font-semibold text-slate-800 mb-2 flex items-center gap-2">
          <i class="fa-solid <?= $m['icon']; ?> text-teal-600"></i> <?= htmlspecialchars($m['t']); ?>
        </h3>
        <p class="text-sm text-slate-600 leading-relaxed flex-1"><?= htmlspecialchars($m['d']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>