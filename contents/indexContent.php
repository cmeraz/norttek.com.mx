<?php
/**
 * contents/indexContent.php
 * Contenido principal de la página de inicio
 */
?>

<!-- HERO -->
<section class="relative pt-24">
  <!-- Fondo con degradado, patrón de puntos e imagen -->
  <div class="absolute inset-0 bg-center z-[-1]" style="
    background-image: 
      linear-gradient(rgba(0, 50, 80, 0.7), rgba(0, 0, 0, 0.85)), 
      repeating-radial-gradient(rgba(255,255,255,0.12) 0 1px, transparent 1px 16px), 
      url('assets/img/cctv-hero_img.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  "></div>

  <!-- Contenido del hero -->
  <div class="relative max-w-7xl mx-auto px-6 py-32 text-center text-white">

    <h1 class="leading-snug pb-2">
      <span class="text-4xl md:text-5xl font-semibold">Protege</span>
      <span class="text-4xl md:text-5xl font-thin ml-1">tu espacio</span>
      <br />
      <span class="text-3xl md:text-4xl font-semibold">Potencia</span>
      <span class="text-3xl md:text-4xl font-thin ml-1">tu productividad</span>
    </h1>

    <h2 class="text-xl md:text-2xl font-thin mt-4 mb-4">
      Soluciones integrales para tu hogar y oficina
    </h2>

    <div class="max-w-4xl mx-auto mb-8">
      <p class="text-base md:text-lg font-thin leading-relaxed text-center">
        En <strong>Norttek Solutions</strong>, con sede en <strong>Cd. Cuauhtémoc, Chihuahua</strong>, ofrecemos soluciones integrales para hogares y empresas, combinando tecnología, seguridad y eficiencia. Trabajamos con <strong>empresas, oficinas, comercios y residencias</strong>, brindando servicios de <strong>CCTV</strong> de última generación, <strong>alarmas inteligentes</strong>, <strong>control de acceso</strong>, <strong>accesos vehiculares</strong>, <strong>redes confiables</strong> y <strong>cableado estructurado profesional</strong>. Además, proporcionamos soluciones de <strong>automatización</strong>, <strong>audio ambiental</strong>, <strong>telefonía IP</strong>, <strong>equipos electrónicos</strong> y servicios de <strong>consultoría y mantenimiento</strong>. Todo diseñado para que tu espacio funcione de manera segura, moderna y eficiente.
      </p>
    </div>

    <!-- Lista de servicios con iconos -->
<?php
$itemsHero = [
    [
        "titulo" => "Accesorios",
        "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/keyboard.png",
        "enlace" => "accesorios"
    ],
    [
        "titulo" => "Accesos vehiculares",
        "icono"  => "https://img.icons8.com/ios-filled/50/ffffff/car.png",
        "enlace" => "accesosVehiculares"
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
        "enlace" => "controlAcceso"
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
        "enlace" => "telefoniaIP"
    ]
];
?>


    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
        <?php foreach ($itemsHero as $item): ?>
            <a href="#<?= $item['enlace']; ?>">
                <div class="flex flex-col items-center gap-2 bg-white/10 rounded-lg p-4 hover:bg-white/20 transition">
                    <?php if(isset($item['tipo']) && $item['tipo']=='fa'): ?>
                        <i class="<?= $item['icono']; ?> text-2xl text-white"></i>
                    <?php else: ?>
                        <img src="<?= $item['icono']; ?>" alt="<?= $item['titulo']; ?>" class="w-10 h-10">
                    <?php endif; ?>
                    <span><?= $item['titulo']; ?></span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- SECCIÓN DE TIENDA -->
<section class="bg-gray-50 py-12">
  <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
    <div class="md:w-1/2 text-left">
      <h2 class="text-2xl font-bold text-blue-900 mb-4">Explora nuestra tienda en línea</h2>
      <p class="text-gray-700 mb-6">
        Descubre nuestro <strong>catálogo con un completo surtido de productos</strong> para tu hogar, negocio o empresa. Ofrecemos soluciones en <strong>seguridad, control de acceso, redes, cableado estructurado, automatización de iluminación y audio ambiental</strong>. Compra fácil y rápido <strong>directamente desde tu celular o computadora</strong>, con <strong>envíos a domicilio en toda la ciudad y zonas cercanas</strong>.
      </p>
      <div class="flex flex-col sm:flex-row gap-4">
        <a href="https://tienda.norttek.com.mx" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-700 text-white font-semibold rounded-xl shadow hover:bg-blue-800 transition">
          Visitar Tienda
        </a>
        <button id="btnWhatsapp" class="px-6 py-3 bg-green-500 text-white rounded-xl shadow hover:opacity-90 flex items-center gap-2">
          Compartir por WhatsApp
        </button>
      </div>
    </div>
    <div class="md:w-1/2 flex justify-center">
      <img src="https://www.sicarx.com/images/new/analyze-data-03.webp" alt="Tienda en línea Norttek" class="w-full max-w-sm">
    </div>
  </div>
</section>

<!-- Modal WhatsApp -->
<div id="modalWhatsapp" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
  <div class="bg-white rounded-xl p-6 w-80 relative">
    <h2 class="text-lg font-bold mb-4">Compartir Tienda en línea</h2>
    <label class="block mb-2">Número de WhatsApp de la persona a la que le quieres compartir el enlace:</label>
    <input type="text" id="numeroWhatsapp" placeholder="Ej: 6251234455" class="border p-2 w-full rounded mb-4" />
    <button id="enviarWhatsapp" class="bg-green-500 text-white px-4 py-2 rounded w-full">Enviar</button>
    <button id="cerrarModal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 font-bold">X</button>
  </div>
</div>

<?php
// Incluir sección de servicios adicional
includeTemplate("servicios");
?>

<?= faq('faq-general', ['title' => 'Preguntas Frecuentes']) ?>