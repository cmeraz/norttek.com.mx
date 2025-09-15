<?php
$current = basename($_SERVER['PHP_SELF'], ".php");
$activePage = $current === 'index' ? 'inicio' : $current;

$pages = [
    'inicio'=>['label'=>'Inicio','icon'=>'fas fa-home'],
    'nosotros'=>['label'=>'Nosotros','icon'=>'fas fa-users'],
    'servicios'=>['label'=>'Servicios ▾','icon'=>'fas fa-cogs'],
    'cartuchos'=>['label'=>'Herramientas','icon'=>'fas fa-wrench'],
    'contacto'=>['label'=>'Contacto','icon'=>'fas fa-envelope']
];

$subpages = [
    'cctv'=>['label'=>'Seguridad y CCTV','icon'=>'fas fa-video'],
    'telefonia'=>['label'=>'Telefonía IP','icon'=>'fas fa-phone'],
    'control'=>['label'=>'Control de Acceso','icon'=>'fas fa-key'],
    'redes'=>['label'=>'Redes y Cableado','icon'=>'fas fa-network-wired'],
    'interfon'=>['label'=>'Interfón / Telefonía','icon'=>'fas fa-intercom']
];

$business_address = "Av. Rayon y Agustin Melgar, Cuauhtemoc";
$business_phone = "+52 (625) 269-0997";
$google_maps_link = "https://maps.app.goo.gl/Q6XmT59jjiWULAWu5?g_st=aw";
?>

<header id="site-header" class="fixed w-full z-50 bg-white shadow-md transition-all duration-300">

<!-- Desktop Header -->
<div class="hidden lg:flex flex-col w-full">

    <!-- Top Bar centrada -->
    <div class="flex items-center justify-center w-full gap-6 px-10 py-1 text-gray-700 text-sm relative">
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2">
                <i class="fas fa-map-marker-alt text-blue-600"></i>
                <span><?php echo $business_address; ?></span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-phone text-blue-600"></i>
                <span><?php echo $business_phone; ?></span>
            </div>
            <!-- Botón centrado dentro del topbar -->
            <a href="<?php echo $google_maps_link; ?>" target="_blank"
               class="bg-blue-600 text-white text-xs px-4 py-1.5 rounded shadow hover:bg-blue-700 transition flex items-center gap-1 font-medium">
                <i class="fas fa-map-marked-alt"></i> ¿Cómo llegar?
            </a>
        </div>
    </div>

    <!-- Logo y Tienda -->
    <div class="flex items-center justify-center w-full px-10 py-2 gap-6">
        <a href="index.php" class="flex items-center gap-2">
            <img src="https://norttek.com.mx/assets/img/logo-norttek.png" alt="Logo" class="w-14 h-auto">
            <span class="text-lg font-medium text-gray-900 tracking-tight">Norttek Solutions</span>
        </a>

        <a href="https://tienda.norttek.com.mx" target="_blank"
           class="bg-blue-600 text-white font-bold px-5 py-2 rounded shadow-lg hover:bg-blue-700 transition flex items-center gap-2 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l1-5H6.4M7 13l-1 5h12l-1-5M7 13h10m0 0L21 6H5l2 7z" />
            </svg>
            Tienda en línea
        </a>
    </div>

    <!-- Menú Desktop separado en su propio contenedor -->
    <div class="bg-white/90 shadow-inner py-1">
        <nav class="flex justify-center space-x-6 text-gray-800">
            <?php
            foreach($pages as $key=>$data){
                if($key === 'portafolio' || $key === 'planes') continue; // eliminar estos
                $label = $data['label'];
                $icon = $data['icon'];
                $isActiveMain = ($key === 'servicios' && array_key_exists($activePage, $subpages)) || ($activePage === $key);
                $activeClass = $isActiveMain ? 'font-bold text-blue-600' : 'font-normal hover:text-blue-600';

                if($key=='servicios'){
                    echo '<div class="relative group">';
                    echo '<a href="#servicios" class="flex items-center gap-1 px-3 py-1 rounded '.$activeClass.'"><i class="'.$icon.'"></i> '.$label.'</a>';
                    echo '<ul class="absolute left-0 top-full mt-1 w-52 bg-white rounded-md shadow-lg py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">';
                    foreach($subpages as $subkey=>$subdata){
                        $sublabel = $subdata['label'];
                        $subicon = $subdata['icon'];
                        $activeSubClass = ($activePage == $subkey) ? 'font-bold text-blue-600' : 'font-normal hover:text-blue-600';
                        echo '<li><a href="'.$subkey.'.php" class="flex items-center gap-2 px-3 py-1 rounded '.$activeSubClass.'"><i class="'.$subicon.'"></i> '.$sublabel.'</a></li>';
                    }
                    echo '</ul></div>';
                } else {
                    echo '<a href="'.$key.'.php" class="flex items-center gap-1 px-3 py-1 rounded '.$activeClass.'"><i class="'.$icon.'"></i> '.$label.'</a>';
                }
            }
            ?>
        </nav>
    </div>

</div>


  <!-- Mobile Header -->
  <div class="flex items-center justify-between lg:hidden px-4 py-2" id="mobile-header">
      <a href="index.php" class="flex items-center gap-2">
          <img src="https://norttek.com.mx/assets/img/logo-norttek.png" alt="Logo" class="w-12 h-auto">
          <span class="text-lg font-semibold text-gray-900">Norttek Solutions</span>
      </a>
      <button id="menu-btn" class="focus:outline-none text-gray-900">
          <!-- Icono creativo de menú -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
              <line x1="3" y1="9" x2="21" y2="9"/>
              <line x1="3" y1="15" x2="21" y2="15"/>
          </svg>
      </button>
  </div>

  <!-- Sidebar Móvil -->
  <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 opacity-0 pointer-events-none transition-opacity duration-300"></div>

  <div id="mobile-sidebar" class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50">
      <div class="flex items-center justify-between px-4 py-3 border-b">
          <span class="text-lg font-semibold">Menú</span>
          <button id="close-sidebar" class="text-gray-700 hover:text-gray-900 focus:outline-none">
              <i class="fas fa-times text-xl"></i>
          </button>
      </div>

      <!-- Info top bar dentro del sidebar -->
      <div class="px-4 py-3 border-b space-y-2 text-gray-700 text-sm">
          <div class="flex items-center gap-2">
              <i class="fas fa-map-marker-alt text-blue-600"></i>
              <span><?php echo $business_address; ?></span>
          </div>
          <div class="flex items-center gap-2">
              <i class="fas fa-phone text-blue-600"></i>
              <span><?php echo $business_phone; ?></span>
          </div>
          <a href="<?php echo $google_maps_link; ?>" target="_blank" class="bg-blue-600 text-white text-base px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition flex items-center gap-2 font-medium w-full justify-center">
              <i class="fas fa-map-marked-alt"></i> ¿Cómo llegar?
          </a>
      </div>

      <!-- Botón Tienda -->
      <div class="px-4 py-3 border-b">
          <a href="https://tienda.norttek.com.mx" target="_blank" class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg shadow-lg flex items-center gap-2 text-sm transition transform active:scale-95 active:bg-blue-700 active:shadow-inner w-full justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l1-5H6.4M7 13l-1 5h12l-1-5M7 13h10m0 0L21 6H5l2 7z" />
              </svg>
              Tienda en línea
          </a>
      </div>

      <!-- Menú dinámico -->
      <ul class="flex flex-col p-4 space-y-1 text-gray-800">
          <?php
          foreach($pages as $key=>$data){
              $label = $data['label'];
              $icon = $data['icon'];
              $isActiveMain = ($key === 'servicios' && array_key_exists($activePage, $subpages)) || ($activePage === $key);
              $activeClass = $isActiveMain ? 'font-bold text-blue-600' : 'font-normal hover:text-blue-600';

              if($key == 'servicios'){
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
                      echo '<li><a href="'.$subkey.'.php" class="flex items-center gap-2 py-1 px-3 rounded '.$activeSubClass.'"><i class="'.$subicon.' w-5"></i> '.$sublabel.'</a></li>';
                  }
                  echo '</ul>';
                  echo '</li>';
              } else {
                  echo '<li><a href="'.$key.'.php" class="flex items-center gap-2 py-2 px-3 rounded '.$activeClass.'"><i class="'.$icon.' w-5"></i> '.$label.'</a></li>';
              }
          }
          ?>
      </ul>
  </div>

</header>

<script>
const menuBtn = document.getElementById('menu-btn');
const sidebar = document.getElementById('mobile-sidebar');
const closeSidebar = document.getElementById('close-sidebar');
const overlay = document.getElementById('sidebar-overlay');

// Abrir sidebar
menuBtn.addEventListener('click', () => {
    sidebar.classList.remove('-translate-x-full');
    overlay.classList.remove('opacity-0', 'pointer-events-none');
});

// Cerrar sidebar
const cerrar = () => {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('opacity-0', 'pointer-events-none');
};
closeSidebar.addEventListener('click', cerrar);
overlay.addEventListener('click', cerrar);

// Toggle submenú "Servicios"
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

// Cerrar sidebar al hacer clic en enlaces
document.querySelectorAll('#mobile-sidebar a').forEach(link => {
    link.addEventListener('click', cerrar);
});
</script>
