<?php
// Título de la página (se usa en header)
$pageTitle = "Servicios - Norttek";

// Archivos CSS y JS adicionales (opcional)
$cssFiles  = ["style.css"];       // CSS global opcional
$jsFiles   = ["scripts.js"];       // JS global opcional

// Incluye la plantilla base
include 'includes/pageTemplate.php';
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
    background-size: cover; /* En móvil se ajusta completa */
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



<!-- Renderizado en HTML -->
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
        "icono"  => "fas fa-plug", // Ícono con Font Awesome
        "enlace" => "cableado",
        "tipo"   => "fa" // <- indicador de tipo de ícono
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
<!-- Renderizado en HTML -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
    <?php foreach ($itemsHero as $item): ?>
        <a href="#<?= $item['enlace']; ?>">
            <div class="flex flex-col items-center gap-2 bg-white/10 rounded-lg p-4 hover:bg-white/20 transition">
                <img src="<?= $item['icono']; ?>" alt="<?= $item['titulo']; ?>" class="w-10 h-10">
                <span><?= $item['titulo']; ?></span>
            </div>
        </a>
    <?php endforeach; ?>
</div>

</section>

<!-- SECCIÓN DE TIENDA -->
<section class="bg-gray-50 py-12">
  <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
    
    <!-- Texto y CTA -->
    <div class="md:w-1/2 text-left">
      <h2 class="text-2xl font-bold text-blue-900 mb-4">Explora nuestra tienda en línea</h2>
      <p class="text-gray-700 mb-6">
  Descubre nuestro <strong>catálogo con un completo surtido de productos</strong> para tu hogar, negocio o empresa. 
  Ofrecemos soluciones en <strong>seguridad, control de acceso, redes, cableado estructurado, automatización de iluminación y audio ambiental</strong>. 
  Compra fácil y rápido <strong>directamente desde tu celular o computadora</strong>, con <strong>envíos a domicilio en toda la ciudad y zonas cercanas</strong>.
</p>

      <!-- Contenedor de botones con espacio -->
      <div class="flex flex-col sm:flex-row gap-4">
        <!-- Botón Visitar Tienda -->
        <a href="https://tienda.norttek.com.mx" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-700 text-white font-semibold rounded-xl shadow hover:bg-blue-800 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l1-5H6.4M7 13l-1 5h12l-1-5M7 13h10m0 0L21 6H5l2 7z" />
          </svg>
          Visitar Tienda
        </a>

        <!-- Botón Compartir por WhatsApp -->
<button id="btnWhatsapp" class="px-6 py-3 bg-green-500 text-white rounded-xl shadow hover:opacity-90 flex items-center gap-2">
  <i class="fab fa-whatsapp text-xl"></i>
  Compartir por WhatsApp
</button>

      </div>
    </div>

    <!-- Imagen -->
    <div class="md:w-1/2 flex justify-center">
      <img 
        src="https://www.sicarx.com/images/new/analyze-data-03.webp" 
        alt="Tienda en línea Norttek" 
        class="w-full max-w-sm"
      >
    </div>
  </div>
</section>


<!-- Modal -->
<div id="modalWhatsapp" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
  <div class="bg-white rounded-xl p-6 w-80 relative">
    <h2 class="text-lg font-bold mb-4">Compartir Tienda en línea</h2>
    <label class="block mb-2">Número de WhatsApp de la persona a la que le quieres compartir el enlace:</label>
    <input type="text" id="numeroWhatsapp" placeholder="Ej: 6251234455" class="border p-2 w-full rounded mb-4" />
    <button id="enviarWhatsapp" class="bg-green-500 text-white px-4 py-2 rounded w-full">Enviar</button>
    <button id="cerrarModal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 font-bold">X</button>
  </div>
</div>

  </div>
</section>

  <?php includeTemplate("servicios"); ?>

<?php
  // Al final, cerrar main y cargar footer
  includeTemplate("footer");
?>

<script>
!function(){"use strict";let e="";const t=new XMLHttpRequest,n=document.currentScript.src,s=new URLSearchParams(new URL(n).search).get("code"),o=new URL(n),i=()=>{"OPERA"!==r().borwer?window.open(e,"_blank","width=805,height=564"):window.open(e,"_blank","width=847,height=650")},r=()=>{const e=/(Trident|MSIE)/g,t=/(Chrome)/g,n=/(Firefox)/g,s=/(OPR)/g,o=/(Edg)/g,i=navigator.userAgent.toString();let r="";return i.match(e)?r="IE":i.match(n)?r="FIREFIX":i.match(s)?r="OPERA":i.match(o)?r="EDGE":i.match(t)&&(r="CHROME"),{borwer:r,regs:[e,t,n,s,o],userAgent:i}};t.onreadystatechange=function(){if(4===t.readyState)if(200===t.status){e="string"==typeof t.response?JSON.parse(t.response).data.link_info.inbound_call_link:t.response.data.link_info.inbound_call_link;const n=document.getElementById("ysWebrtcTrunk");n&&(n.removeEventListener("click",i),n.addEventListener("click",i))}else console.error("è¯·æ±‚å¤±è´¥ï¼š"+t.statusText)},t.open("GET",`${o.origin}/api/v1.0/webrtctrunk/getinfo?code=${s}`),t.send(),setTimeout((()=>{(()=>{const t=document.createElement("button");t.style.position="fixed",t.style.bottom="40px",t.style.right="40px",t.style.padding="10px 16px",t.style.borderRadius="100px",t.style.backgroundColor="#0081cc",t.style.color="white",t.style.border="none",t.style.cursor="pointer",t.style.zIndex="9999",t.className="ys-webrtc-trunk",t.id="ysWebrtcTrunk",t.addEventListener("mouseover",(()=>{t.style.backgroundColor="#0091E5"})),t.addEventListener("mouseout",(()=>{t.style.backgroundColor="#0081cc"}));const n=document.createElementNS("http://www.w3.org/2000/svg","svg");n.setAttribute("viewBox","0 0 1024 1024"),n.setAttribute("width","18"),n.setAttribute("height","18"),n.style.fill="white",n.setAttribute("t","1680338998922"),n.setAttribute("class","icon");const s=document.createElementNS("http://www.w3.org/2000/svg","path");s.setAttribute("d","M880.64 696.658v144.834a40.96 40.96 0 0 1-38.093 40.879c-17.9 1.228-32.522 1.884-43.827 1.884-361.964 0-655.36-293.397-655.36-655.36 0-11.305 0.614-25.928 1.884-43.827a40.96 40.96 0 0 1 40.878-38.093h144.835a20.48 20.48 0 0 1 20.398 18.432c0.942 9.42 1.802 16.916 2.621 22.61a569.405 569.405 0 0 0 49.48 163.88c3.891 8.193 1.352 17.982-6.021 23.225l-88.392 63.16a534.405 534.405 0 0 0 280.33 280.33l63.079-88.227a18.934 18.934 0 0 1 23.47-6.103 569.651 569.651 0 0 0 163.84 49.356c5.693 0.82 13.189 1.72 22.528 2.622a20.48 20.48 0 0 1 18.391 20.398h-0.041z"),s.setAttribute("p-id","8726"),n.appendChild(s);const o=document.createElement("i");o.style.display="inline-block",o.style.lineHeight=1,o.style.verticalAlign="text-top",o.appendChild(n);const r=document.createElement("span");r.textContent="Contact us",r.style.fontSize="16px",r.style.verticalAlign="middle",r.style.paddingLeft="4px",t.appendChild(o),t.appendChild(r),document.body.appendChild(t),e&&(t.removeEventListener("click",i),t.addEventListener("click",i))})()}),100)}();
</script>