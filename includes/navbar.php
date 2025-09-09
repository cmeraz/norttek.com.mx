<?php
$current = basename($_SERVER['PHP_SELF'], ".php");

// Si es index.php, lo consideramos 'inicio'
$activePage = $current === 'index' ? 'inicio' : $current;

$pages = [
    'inicio'=>['label'=>'Inicio','icon'=>'fas fa-home'],
    'nosotros'=>['label'=>'Nosotros','icon'=>'fas fa-users'],
    'servicios'=>['label'=>'Servicios ▾','icon'=>'fas fa-cogs'],
    'portafolio'=>['label'=>'Portafolio','icon'=>'fas fa-briefcase'],
    'planes'=>['label'=>'Planes','icon'=>'fas fa-list-alt'],
    'contacto'=>['label'=>'Contacto','icon'=>'fas fa-envelope']
];

$subpages = [
    'cctv'=>['label'=>'Seguridad y CCTV','icon'=>'fas fa-video'],
    'telefonia'=>['label'=>'Telefonía IP','icon'=>'fas fa-phone'],
    'control'=>['label'=>'Control de Acceso','icon'=>'fas fa-key'],
    'redes'=>['label'=>'Redes y Cableado','icon'=>'fas fa-network-wired'],
    'interfon'=>['label'=>'Interfón / Telefonía','icon'=>'fas fa-intercom']
];

// Datos de contacto
$business_address = "Av. Rayon y Agustin Melgar, Cuauhtemoc";
$business_phone = "+52 (625) 269-0997";
$google_maps_link = "https://maps.app.goo.gl/Q6XmT59jjiWULAWu5?g_st=aw";
?>

<header id="site-header" class="fixed w-full z-50 bg-white shadow-md transition-all duration-300">

  <!-- Desktop Header -->
  <div class="hidden lg:flex items-center justify-between w-full gap-4 px-6 lg:px-20 py-3">
      <!-- Logo -->
      <a href="#inicio" class="flex items-center space-x-4">
          <img src="https://norttek.com.mx/assets/img/logo-norttek.png" alt="Logo" class="w-16 h-auto">
          <span class="text-lg font-medium text-gray-900 tracking-tight">Norttek Solutions</span>
      </a>

      <!-- Top Bar -->
      <div class="flex items-center gap-6 text-gray-700 text-sm">
          <div class="flex items-center gap-2">
              <i class="fas fa-map-marker-alt text-blue-600"></i>
              <span><?php echo $business_address; ?></span>
          </div>
          <div class="flex items-center gap-2">
              <i class="fas fa-phone text-blue-600"></i>
              <span><?php echo $business_phone; ?></span>
          </div>
          <a href="<?php echo $google_maps_link; ?>" target="_blank"
             class="bg-gray-900 text-white text-sm px-4 py-1.5 rounded shadow hover:bg-gray-800 transition flex items-center gap-2 font-medium">
              <i class="fas fa-map-marked-alt"></i>
              ¿Cómo llegar?
          </a>
      </div>

      <!-- Botón Tienda -->
      <a href="https://tienda.norttek.com.mx" target="_blank" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l1-5H6.4M7 13l-1 5h12l-1-5M7 13h10m0 0L21 6H5l2 7z" />
          </svg>
          Tienda en línea
      </a>
  </div>

  <!-- Menú Desktop -->
  <nav class="hidden md:flex container mx-auto justify-center space-x-6 text-gray-800 bg-white/90 py-2 shadow-inner">
    <?php
    foreach($pages as $key=>$data){
        $label = $data['label'];
        $icon = $data['icon'];
        $isActiveMain = ($key === 'servicios' && array_key_exists($activePage, $subpages)) || ($activePage === $key);
        $activeClass = $isActiveMain ? 'font-bold text-blue-600' : 'font-normal hover:text-blue-600';

        if($key=='servicios'){
            echo '<div class="relative group">';
            echo '<a href="#servicios" class="flex items-center gap-2 px-3 py-2 rounded '.$activeClass.'"><i class="'.$icon.'"></i> '.$label.'</a>';
            echo '<ul class="absolute left-0 top-full mt-2 w-56 bg-white rounded-md shadow-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">';
            foreach($subpages as $subkey=>$subdata){
                $sublabel = $subdata['label'];
                $subicon = $subdata['icon'];
                $activeSubClass = ($activePage == $subkey) ? 'font-bold text-blue-600' : 'font-normal hover:text-blue-600';
                echo '<li><a href="'.$subkey.'" class="flex items-center gap-2 px-4 py-2 rounded '.$activeSubClass.'"><i class="'.$subicon.'"></i> '.$sublabel.'</a></li>';
            }
            echo '</ul></div>';
        } else {
            echo '<a href="'.$key.'" class="flex items-center gap-2 px-3 py-2 rounded '.$activeClass.'"><i class="'.$icon.'"></i> '.$label.'</a>';
        }
    }
    ?>
  </nav>

  <!-- Mobile Header -->
  <div class="flex flex-col lg:hidden transition-all duration-300" id="mobile-header">
      <!-- Top bar móvil -->
      <div id="mobile-top-bar" class="flex flex-col items-center text-gray-700 text-sm gap-1 w-full mb-2 transition-all duration-300">
          <div class="flex items-center gap-2">
              <i class="fas fa-map-marker-alt text-blue-600"></i>
              <span><?php echo $business_address; ?></span>
          </div>
          <div class="flex items-center gap-2">
              <i class="fas fa-phone text-blue-600"></i>
              <span><?php echo $business_phone; ?></span>
          </div>
          <a href="<?php echo $google_maps_link; ?>" target="_blank"
             class="bg-gray-900 text-white text-sm px-4 py-1.5 rounded shadow hover:bg-gray-800 transition flex items-center gap-2 font-medium">
              <i class="fas fa-map-marked-alt"></i>
              ¿Cómo llegar?
          </a>
      </div>

      <!-- Fila principal móvil: logo y botones -->
      <div class="flex items-center justify-between px-4">
          <a href="#inicio" class="flex items-center space-x-2">
              <img src="https://norttek.com.mx/assets/img/logo-norttek.png" alt="Logo" class="w-16 h-auto transition-all duration-300" id="mobile-logo">
              <span class="text-lg font-medium text-gray-900 tracking-tight transition-all duration-300 hidden" id="mobile-logo-text">Norttek Solutions</span>
          </a>

          <a href="https://tienda.norttek.com.mx" target="_blank"
             class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg shadow-lg flex items-center gap-2 text-sm transition transform active:scale-95 active:bg-blue-700 active:shadow-inner"
             id="mobile-store-btn">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M3 3h2l.4 2M7 13h10l1-5H6.4M7 13l-1 5h12l-1-5M7 13h10m0 0L21 6H5l2 7z" />
              </svg>
              <span>Tienda en línea</span>
          </a>

          <button id="menu-btn" class="md:hidden focus:outline-none ml-2">
              <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
              </svg>
          </button>
      </div>
  </div>

  <!-- Menú móvil -->
  <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
    <ul class="flex flex-col p-4 space-y-1 text-gray-800">
      <?php
      foreach($pages as $key=>$data){
          $label = $data['label'];
          $icon = $data['icon'];
          $isActiveMain = ($key === 'servicios' && array_key_exists($activePage, $subpages)) || ($activePage === $key);
          $activeClass = $isActiveMain ? 'font-bold text-blue-600' : 'font-normal hover:text-blue-600';

          if($key=='servicios'){
              echo '<li>';
              echo '<button class="flex items-center justify-between w-full py-2 px-3 rounded '.$activeClass.' servicios-toggle">';
              echo '<span class="flex items-center gap-2"><i class="'.$icon.' w-5"></i> '.$label.'</span>';
              echo '<svg class="w-4 h-4 transition-transform transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">';
              echo '<path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>';
              echo '</svg>';
              echo '</button>';
              echo '<ul class="sub-menu overflow-hidden max-h-0 flex-col pl-6 mt-1 space-y-1 transition-all duration-300">';
              foreach($subpages as $subkey=>$subdata){
                  $sublabel = $subdata['label'];
                  $subicon = $subdata['icon'];
                  $activeSubClass = ($activePage == $subkey) ? 'font-bold text-blue-600' : 'font-normal hover:text-blue-600';
                  echo '<li><a href="#'.$subkey.'" class="flex items-center gap-2 py-1 px-3 rounded '.$activeSubClass.'"><i class="'.$subicon.' w-5"></i> '.$sublabel.'</a></li>';
              }
              echo '</ul>';
              echo '</li>';
          } else {
              echo '<li><a href="#'.$key.'" class="flex items-center gap-2 py-2 px-3 rounded '.$activeClass.'"><i class="'.$icon.' w-5"></i> '.$label.'</a></li>';
          }
      }
      ?>
    </ul>
  </div>

</header>

<script>
const mobileHeader = document.getElementById('mobile-header');
const mobileTopBar = document.getElementById('mobile-top-bar');
const mobileLogo = document.getElementById('mobile-logo');
const mobileLogoText = document.getElementById('mobile-logo-text');
const mobileStoreBtn = document.getElementById('mobile-store-btn');
const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    // SOLO afectar móvil
    if(window.innerWidth < 1024){
        if(currentScroll > lastScroll){
            // Scroll hacia abajo: contraer header
            mobileTopBar.classList.add('hidden');
            mobileHeader.style.paddingTop = '0.5rem';
            mobileLogo.classList.add('w-12');
            mobileLogoText.classList.remove('hidden');
            mobileLogoText.classList.add('text-sm');
            mobileStoreBtn.classList.add('px-3','py-1.5','text-xs');
        } else {
            // Scroll hacia arriba: expandir header
            mobileTopBar.classList.remove('hidden');
            mobileHeader.style.paddingTop = '';
            mobileLogo.classList.remove('w-12');
            mobileLogoText.classList.add('hidden');
            mobileLogoText.classList.remove('text-sm');
            mobileStoreBtn.classList.remove('px-3','py-1.5','text-xs');
        }
    }

    lastScroll = currentScroll;
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e){
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if(target) target.scrollIntoView({ behavior:'smooth', block:'start' });
    });
});

// Toggle menú móvil
menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));

// Toggle submenú
document.querySelectorAll('.servicios-toggle').forEach(button => {
    button.addEventListener('click', () => {
        const subMenu = button.nextElementSibling;
        const icon = button.querySelector('svg');
        if(subMenu.style.maxHeight && subMenu.style.maxHeight !== '0px'){
            subMenu.style.maxHeight = '0';
        } else {
            subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
        }
        icon.classList.toggle('rotate-180');
    });
});
</script>
