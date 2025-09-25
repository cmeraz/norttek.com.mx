<?php
/**
 * contents/indexContent.php
 * Contenido principal de la página de inicio
 */
?>

<!-- HERO: Sección principal con fondo unificado (.nt-hero-overlay) -->
<section class="nt-hero-wrapper relative overflow-hidden">
  <img src="assets/img/cctv-hero_img.jpg" alt="Fondo CCTV" class="nt-hero-bg-img" loading="lazy">
  <div class="nt-hero-overlay"></div>

  <!-- Contenido del hero -->
  <div class="relative max-w-7xl mx-auto px-6 py-24 text-center text-white">
    <div class="mb-6">
  <?= nt_heading('Protege tu espacio · Potencia tu productividad', 'fa-solid fa-shield-halved', 'lg', 'Soluciones integrales para hogar y empresa', ['animate'=>true,'delay'=>'sm','class'=>'nt-heading-hero nt-heading-invert']); ?>
    </div>
    <div class="max-w-2xl mx-auto mb-8">
  <?= nt_alert('accent', 'Sitio en actualización visual. Algunos módulos están en fase de integración al nuevo sistema.'); ?>
    </div>
    <div class="max-w-4xl mx-auto mb-10">
      <p class="text-base md:text-lg leading-relaxed font-light">
        En <strong>Norttek Solutions</strong> (Cd. Cuauhtémoc, Chihuahua) integramos <strong>seguridad</strong>, <strong>tecnología</strong> y <strong>automatización</strong> para empresas, oficinas, comercios y residencias: <strong>CCTV</strong>, <strong>alarmas inteligentes</strong>, <strong>control de acceso</strong>, <strong>accesos vehiculares</strong>, <strong>redes</strong>, <strong>cableado estructurado</strong>, <strong>automatización</strong>, <strong>audio ambiental</strong>, <strong>telefonía IP</strong>, <strong>electrónicos</strong> y <strong>consultoría</strong>.
      </p>
    </div>

    <!-- Lista de servicios con iconos -->
    <?php
    // Array de servicios para mostrar en el hero
    $itemsHero = [
        [
            "titulo" => "Accesorios",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/keyboard.png",
            "enlace" => "accesorios"
        ],
        [
            "titulo" => "Accesos vehiculares",
      "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/car.png",
      "enlace" => "accesoVehicular" // ajustado para coincidir con id real
        ],
        [
            "titulo" => "Alarmas",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/siren.png",
            "enlace" => "alarmas"
        ],
        [
            "titulo" => "Audio ambiental",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/speaker.png",
            "enlace" => "audioAmbiental"
        ],
        [
            "titulo" => "Automatización",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/light-on.png",
            "enlace" => "automatizacion"
        ],
        [
            "titulo" => "Cableado",
            "icono"  => "fas fa-plug",
            "enlace" => "cableado",
            "tipo"   => "fa"
        ],
        [
            "titulo" => "CCTV",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/zoom.png",
            "enlace" => "cctv"
        ],
        [
            "titulo" => "Cómputo",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/laptop.png",
            "enlace" => "computo"
        ],
        [
            "titulo" => "Control de acceso",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/lock.png",
      "enlace" => "ControlAcceso" // coincide exactamente con id existente (pendiente normalizar más adelante)
        ],
        [
            "titulo" => "Consultoría",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/business-report.png",
            "enlace" => "consultoria"
        ],
        [
            "titulo" => "Electrónicos",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/electronics.png",
            "enlace" => "electronicos"
        ],
        [
            "titulo" => "Impresión",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/print.png",
            "enlace" => "impresion"
        ],
        [
            "titulo" => "Mantenimiento",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/maintenance.png",
            "enlace" => "mantenimiento"
        ],
        [
            "titulo" => "Papelería",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/notepad.png",
            "enlace" => "papeleria"
        ],
        [
            "titulo" => "Redes",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/wifi.png",
            "enlace" => "redes"
        ],
        [
            "titulo" => "Telefonía IP",
            "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/phone.png",
      "enlace" => "telefonia" // alinea con id real
        ]
    ];
    ?>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-5 max-w-4xl mx-auto">
      <?php foreach ($itemsHero as $i => $item): ?>
        <a href="#<?= $item['enlace']; ?>" class="group block">
          <div class="relative overflow-hidden rounded-xl bg-white/10 backdrop-blur-sm p-4 flex flex-col items-center gap-3 border border-white/10 hover:border-white/30 transition shadow-sm hover:shadow">
            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white/15 group-hover:bg-white/25 transition">
              <?php if(isset($item['tipo']) && $item['tipo']=='fa'): ?>
                <i class="<?= $item['icono']; ?> text-xl text-white"></i>
              <?php else: ?>
                <img src="<?= $item['icono']; ?>" alt="<?= $item['titulo']; ?>" class="w-8 h-8 object-contain"/>
              <?php endif; ?>
            </div>
            <span class="text-sm font-medium tracking-wide group-hover:text-white/90"><?= $item['titulo']; ?></span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SECCIÓN DE TIENDA: Botones con iconos y modal para compartir por WhatsApp -->
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-14">
    <div class="md:w-1/2 text-left">
  <?= nt_heading('Explora nuestra tienda en línea', 'fa-solid fa-store', 'md', 'Compra fácil y segura', ['animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
      <p class="nt-lead mt-6">
        Catálogo amplio en <strong>seguridad</strong>, <strong>control de acceso</strong>, <strong>redes</strong>, <strong>cableado</strong>, <strong>automatización</strong>, <strong>audio ambiental</strong> y más. Compra desde cualquier dispositivo con envíos locales.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 mt-8">
        <a href="https://tienda.norttek.com.mx" class="nt-btn nt-btn-primary"><i class="fas fa-store"></i><span>Visitar Tienda</span></a>
        <button id="btnWhatsapp" class="nt-btn nt-btn-outline"><i class="fab fa-whatsapp"></i><span>Compartir</span></button>
      </div>
    </div>
    <div class="md:w-1/2 flex justify-center">
      <div class="rounded-2xl overflow-hidden shadow-lg ring-1 ring-gray-200 bg-white">
        <img src="https://www.sicarx.com/images/new/analyze-data-03.webp" alt="Tienda en línea Norttek" class="w-full max-w-sm">
      </div>
    </div>
  </div>
</section>

<!-- Modal WhatsApp para compartir enlace de la tienda -->
<div id="modalWhatsapp" class="fixed inset-0 bg-black/60 hidden justify-center items-center z-50">
  <div class="bg-white rounded-2xl p-6 w-80 relative shadow-xl nt-fade-in">
  <?= nt_heading('Compartir tienda', 'fa-brands fa-whatsapp', 'sm', 'Envia el enlace por WhatsApp', ['class'=>'nt-heading-accent-hairline']); ?>
    <label class="nt-field mt-4">
      <span class="text-xs font-semibold tracking-wide text-gray-600">Número destinatario</span>
      <input type="text" id="numeroWhatsapp" placeholder="Ej: 6251234455" class="nt-input" />
    </label>
    <div class="mt-5 flex flex-col gap-3">
      <button id="enviarWhatsapp" class="nt-btn nt-btn-primary w-full"><i class="fa-solid fa-paper-plane"></i><span>Enviar</span></button>
      <button id="cerrarModal" class="nt-btn nt-btn-outline w-full"><i class="fa-solid fa-xmark"></i><span>Cerrar</span></button>
    </div>
  </div>
</div>

<?php
// Incluir sección de servicios adicional
includeTemplate("servicios");
?>

<!-- Sección de preguntas frecuentes generada dinámicamente -->
<?= faq('faq-general', ['title' => 'Preguntas Frecuentes']) ?>