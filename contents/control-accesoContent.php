<?php
/**
 * Contenido modular: Página Control de Acceso
 */
?>
<section class="ca-hero nt-hero-wrapper">
  <div class="ca-hero__content">
    <div class="max-w-6xl mx-auto px-6 lg:px-12">
      <?php echo nt_heading('Control de Acceso','fa-solid fa-door-closed','xl', 'Gestión y trazabilidad de entradas', ['animate'=>true,'class'=>'nt-heading-hero nt-heading-invert nt-heading-accent-bar']); ?>
      <p class="nt-lead ca-hero__lead max-w-3xl mt-4">Soluciones biométricas, tarjetas, PIN y credenciales móviles para proteger activos y optimizar flujos de personal.</p>
      <div class="mt-8 flex flex-wrap gap-4">
        <a href="/contact" class="nt-btn" data-variant="primary"><i class="fa-solid fa-file-pen"></i> Solicitar evaluación</a>
        <a href="#modulos" class="nt-btn" data-variant="subtle"><i class="fa-solid fa-layer-group"></i> Módulos</a>
      </div>
    </div>
  </div>
</section>

<section id="introduccion" class="py-20 bg-slate-50">
  <div class="max-w-4xl mx-auto px-6 lg:px-12">
    <div class="flex flex-col md:flex-row items-start gap-6">
      <img 
        src="assets/img/control-acceso-intro.jpg" 
        alt="Control de Acceso Norttek" 
        class="w-40 h-40 object-cover rounded-lg shadow-md flex-shrink-0 mx-auto md:mx-0"
      >
      <div class="text-left">
        <?php echo nt_heading('¿Qué es el Control de Acceso?','fa-solid fa-lock','md',null,['class'=>'nt-heading-accent-bar']); ?>
        <p class="mt-2 text-slate-600 leading-relaxed max-w-xl">
          El control de acceso es un sistema que regula y monitorea la entrada y salida de personas en áreas restringidas, utilizando tecnologías como biometría, tarjetas RFID, códigos PIN y más. Estos sistemas no solo mejoran la seguridad física, sino que también optimizan la gestión del personal y proporcionan auditorías detalladas para cumplir con normativas.
        </p>
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
  ['icon'=>'fa-fingerprint', 't'=>'Biometría', 'd'=>'Lectores de huella, rostro e iris con algoritmos rápidos y baja tasa de error.'],
  ['icon'=>'fa-id-card', 't'=>'Tarjetas / RFID', 'd'=>'Credenciales de proximidad como MIFARE o HID para acceso seguro y controlado.'],
  ['icon'=>'fa-keyboard', 't'=>'Teclado / PIN', 'd'=>'Ingreso mediante códigos numéricos o alfanuméricos configurables.'],
  ['icon'=>'fa-qrcode', 't'=>'Código QR', 'd'=>'Generación y escaneo de códigos QR dinámicos para accesos temporales o programados.'],
  ['icon'=>'fa-door-closed', 't'=>'Chapas electrónicas', 'd'=>'Cerraduras inteligentes que se controlan con tarjeta, PIN, huella o app móvil.'],
  ['icon'=>'fa-person-walking-arrow-right', 't'=>'Torniquetes', 'd'=>'Sistemas de acceso peatonal con torniquetes ópticos o de acero.'],
  ['icon'=>'fa-car', 't'=>'Barreras vehiculares', 'd'=>'Plumas automáticas, bolardos y semáforos para el control de vehículos.'],
  ['icon'=>'fa-camera', 't'=>'Reconocimiento de placas (LPR)', 'd'=>'Lectura automática de matrículas para apertura de portones o barreras.'],
  ['icon'=>'fa-video', 't'=>'Videoportero / Intercom', 'd'=>'Validación de identidad con video y audio en tiempo real desde un panel remoto.'],
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
