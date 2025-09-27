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
    <div class="max-w-2xl mx-auto mb-8 site-status-wrap">
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
  "enlace" => "control-acceso" // normalizado a kebab-case
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

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-5 max-w-4xl mx-auto">
      <?php foreach ($itemsHero as $i => $item): ?>
        <a href="#<?= $item['enlace']; ?>" aria-label="Abrir sección <?= htmlspecialchars($item['titulo'], ENT_QUOTES, 'UTF-8'); ?>" class="group block focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400/70 rounded-2xl">
          <div class="nt-hero-card relative overflow-hidden rounded-2xl p-4 flex flex-col items-center gap-3 bg-white/20 backdrop-blur-md text-white border border-white/20 ring-1 ring-white/20 shadow-sm transition will-change-transform group-hover:shadow-lg group-hover:ring-orange-500/60 group-active:scale-[0.98]">
            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white shadow-sm">
              <?php if(isset($item['tipo']) && $item['tipo']=='fa'): ?>
                <i class="<?= $item['icono']; ?> text-lg"></i>
              <?php else: ?>
                <img src="<?= $item['icono']; ?>" alt="<?= $item['titulo']; ?>" class="w-7 h-7 object-contain filter invert-0"/>
              <?php endif; ?>
            </div>
            <span class="text-[13px] sm:text-sm font-semibold tracking-wide text-white/95 group-hover:text-orange-300 text-center">
              <?= $item['titulo']; ?>
            </span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SECCIÓN DE TIENDA: estilo app-like en tarjeta -->
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6">
    <div class="rounded-3xl bg-white/95 ring-1 ring-slate-200/70 shadow-sm p-6 md:p-10 grid md:grid-cols-2 items-center gap-8 md:gap-12">
      <div class="text-left">
        <?= nt_heading('Explora nuestra tienda en línea', 'fa-solid fa-store', 'md', 'Compra fácil y segura', ['animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
        <p class="nt-lead mt-6 text-slate-700">
          Catálogo amplio en <strong>seguridad</strong>, <strong>control de acceso</strong>, <strong>redes</strong>, <strong>cableado</strong>, <strong>automatización</strong>, <strong>audio ambiental</strong> y más. Compra desde cualquier dispositivo con envíos locales.
        </p>
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-7">
          <a href="https://tienda.norttek.com.mx" class="nt-btn nt-btn-primary"><i class="fas fa-store"></i><span>Visitar Tienda</span></a>
          <button id="btnWhatsapp" class="nt-btn nt-btn-outline" data-nt-modal-open="#modalWhatsapp"><i class="fab fa-whatsapp"></i><span>Compartir</span></button>
        </div>
      </div>
      <div class="flex justify-center">
        <div class="rounded-2xl overflow-hidden ring-1 ring-slate-200 bg-white shadow-sm">
          <img src="https://www.sicarx.com/images/new/analyze-data-03.webp" alt="Tienda en línea Norttek" class="w-full max-w-sm">
        </div>
      </div>
    </div>
  </div>
  </section>

<!-- Modal WhatsApp (sistema unificado .nt-modal) -->
<div id="modalWhatsapp" class="nt-modal-backdrop" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modalwhats-title">
  <div class="nt-modal" role="document">
    <button type="button" class="nt-modal-close" data-nt-modal-close aria-label="Cerrar">&times;</button>
    <?= nt_heading('Compartir tienda', 'fa-brands fa-whatsapp', 'sm', 'Envia el enlace por WhatsApp', ['class'=>'nt-heading-accent-hairline','id'=>'modalwhats-title']); ?>
    <div class="modal-body" style="margin-top:.6rem;">
      <label class="nt-field">
        <span class="text-xs font-semibold tracking-wide text-gray-600">Número destinatario</span>
        <input type="text" id="numeroWhatsapp" placeholder="Ej: 6251234455" class="nt-input" inputmode="numeric" />
      </label>
    </div>
    <div class="nt-modal-actions">
      <button id="enviarWhatsapp" class="nt-btn nt-btn-primary"><i class="fa-solid fa-paper-plane"></i><span>Enviar</span></button>
      <button class="nt-btn nt-btn-outline" data-nt-modal-close><i class="fa-solid fa-xmark"></i><span>Cerrar</span></button>
    </div>
  </div>
  </div>

<?php
// Incluir sección de servicios adicional
includeTemplate("servicios");
?>

<!-- Sección de preguntas frecuentes generada dinámicamente -->
<?= faq('faq-general', ['title' => 'Preguntas Frecuentes']) ?>

<style>
/* Override fuerte (naranja) para el alert "accent" sólo en esta página */
.site-status-wrap .nt-alert,
.nt-hero-wrapper .site-status-wrap .nt-alert.nt-alert-accent,
.nt-hero-wrapper .site-status-wrap .nt-alert.accent {
  background:linear-gradient(92deg,#ff8a00,#ff6a00) !important;
  border:1px solid #ff8a00 !important;
  color:#fff !important;
  box-shadow:0 4px 14px -4px rgba(255,118,0,.45);
}
.site-status-wrap .nt-alert a {
  color:#fff !important;
  text-decoration:underline;
}
@media (prefers-reduced-motion:reduce){
  .site-status-wrap .nt-alert {box-shadow:none !important;}
}

/* Hero cards: efecto glass + textos blancos + hover naranja */
.nt-hero-card{
  background: rgba(255,255,255,0.18);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,0.22);
  box-shadow: 0 12px 28px -16px rgba(2,6,23,.35), inset 0 0 0 1px rgba(255,255,255,.14);
}
.group:hover .nt-hero-card{
  /* Halo naranja sutil */
  box-shadow: 0 0 0 6px rgba(249,113,22,.16), 0 20px 42px -18px rgba(2,6,23,.55), inset 0 0 0 1px rgba(255,255,255,.2);
}
@keyframes ntPulseHaloOrange{
  0%,100%{ box-shadow: 0 0 0 0 rgba(249,113,22,.26), 0 16px 36px -18px rgba(2,6,23,.45), inset 0 0 0 1px rgba(255,255,255,.22); }
  50%{ box-shadow: 0 0 0 10px rgba(249,113,22,.12), 0 28px 46px -20px rgba(2,6,23,.6), inset 0 0 0 1px rgba(255,255,255,.26); }
}
.group:hover .nt-hero-card{ animation: ntPulseHaloOrange 1.6s ease-in-out infinite; }
</style>