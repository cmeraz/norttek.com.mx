// Lenguaje = Español
// =============================================
// Archivo: assets/js/internet.js
// Propósito general:
//   Controla toda la interacción dinámica de la página de Internet:
//   - Navegación entre secciones (bienvenida, nuevos clientes, clientes existentes)
//   - Autenticación ligera de clientes mediante teléfono (lookup en JSON)
//   - Gestión de selección de planes (tarjetas tipo radio accesibles)
//   - Cálculo dinámico de costos de instalación y generación de calendario de pagos
//   - Gating (ocultar sección de costos hasta que el usuario elige un plan activamente)
//   - Construcción y envío del mensaje de WhatsApp (asesor y CTA final de instalación)
//   - Persistencia ligera en localStorage/sessionStorage (plan, escenario, nombre, auth cliente)
//   - Modal de captura de nombre reutilizable
//   - Animaciones de entrada, desplazamiento suave y pequeños efectos de realce
//
// Diseño / Filosofía:
//   * Cero dependencias externas para la lógica (solo APIs Web nativas)
//   * Fallbacks silenciosos (try/catch alrededor de llamadas potencialmente frágiles)
//   * Accesibilidad: uso de aria-label, aria-checked, role=radio, aria-disabled, focus management parcial
//   * Idempotencia: funciones como calcular() y updateCtaState() pueden invocarse múltiples veces sin efectos adversos
//   * Resiliencia: si localStorage falla (privacidad / modo incógnito), se degradan ciertas mejoras pero no se rompe el flujo
//
// Secciones principales del script (en orden aproximado):
//   1. Preparación DOM / helpers de UI (showSection/hideSection, Title Case)
//   2. Persistencia de nombre y plan
//   3. Menú y navegación entre vistas (bienvenida / nuevo / cliente)
//   4. Autenticación de cliente por teléfono (lookup + render de credenciales)
//   5. Lógica de costos de instalación (IIFE initInstalacionCostos)
//   6. Selección de planes (tarjetas interactivas)
//   7. Observers de animación y scroll
//   8. Módulo de login modal y acciones de cliente
//   9. WhatsApp (asesor, soporte y CTA final)
//  10. Copiado de datos bancarios
//  11. Modal de captura de nombre reutilizable
//
// Notas de mantenimiento:
//   - Si agregas un nuevo campo al calendario de pagos, modifica pushRow() y la extracción en enviarWhatsApp().
//   - Para ampliar el diferido de antena cambia CONST.sinEquipo.diferidoMeses.
//   - Para internacionalizar, centraliza textos en un objeto y reemplaza literales antes de extender a otro idioma.
// =============================================
// JS para la app de Internet

document.addEventListener('DOMContentLoaded', function() {
  // Pre-carga de imagen hero para activar fade-in
  try {
    var hero = document.querySelector('.internet-hero');
    if (hero) {
      var bg = new Image();
      bg.onload = function(){ hero.classList.add('hero-loaded'); };
      bg.src = 'assets/img/internet-hero.jpg';
    }
  } catch(_) {}
  // Emojis como secuencias Unicode para máxima compatibilidad de renderizado
  var EMOJI = {
    wave: "\uD83D\uDC4B", // 👋
    check: "\u2705"       // ✅
  };
  // Eliminado ajuste manual de paddingTop (se unifica con el layout global)
  // Antes: applyHeaderOffset() añadía padding-top duplicando espacio.
  // Page fade-in
  try {
    var app = document.querySelector('.internet-app');
    if (app) requestAnimationFrame(function(){ app.classList.add('page-ready'); });
  // Menú inferior eliminado; los botones viven ahora en el hero (IDs conservados)
  } catch(_){}
  // Ya no se recalcula padding al redimensionar; el layout global maneja compensaciones.
  // Helper para transiciones: oculta con clase y muestra con forzado de reflow
  /**
   * Muestra una sección aplicando display:block y forzando reflow para permitir
   * que las transiciones CSS (clase .section-hidden) se animen correctamente.
   * @param {HTMLElement} el
   */
  function showSection(el) {
    if (!el) return;
    el.style.display = 'block';
    // Forzar reflow para que la transición ocurra al quitar la clase
    void el.offsetWidth;
    el.classList.remove('section-hidden');
  }

  /**
   * Oculta una sección añadiendo la clase de transición y luego cambiando display
   * tras un pequeño timeout (sincrónico con la duración en CSS) para sacarla del flujo.
   * @param {HTMLElement} el
   */
  function hideSection(el) {
    if (!el) return;
    el.classList.add('section-hidden');
    // Ocultar del flujo tras la transición
    setTimeout(function() { el.style.display = 'none'; }, 230);
  }

  // Helper: convierte a Title Case respetando locale ES (para nombres en minúsculas)
  /**
   * Convierte una cadena a Title Case tomando en cuenta minúsculas/ mayúsculas
   * y separadores con guión. Se usa para normalizar nombres ingresados en minúsculas.
   * @param {string} str
   * @returns {string}
   */
  function toTitleCaseEs(str) {
    var locale = 'es-MX';
    return String(str)
      .split(/\s+/)
      .map(function(word){
        // Maneja compuestos con guión: "juan-pablo" -> "Juan-Pablo"
        return word.split('-').map(function(seg){
          if (!seg) return seg;
          var first = seg.charAt(0).toLocaleUpperCase(locale);
          var rest = seg.slice(1).toLocaleLowerCase(locale);
          return first + rest;
        }).join('-');
      })
      .join(' ');
  }

  // Helpers para persistir el nombre entre el modal y "Contacta a un asesor"
  /**
   * Persiste el nombre completo y el primer nombre para reutilizar en mensajes.
   */
  function setStoredName(fullName, firstName) {
    try {
      localStorage.setItem('customerNameFull', fullName || '');
      localStorage.setItem('customerNameFirst', firstName || '');
    } catch(_) {}
  }
  /**
   * Recupera nombre almacenado; devuelve objeto con propiedades full y first.
   */
  function getStoredName() {
    try {
      return {
        full: localStorage.getItem('customerNameFull') || '',
        first: localStorage.getItem('customerNameFirst') || ''
      };
    } catch(_) { return { full: '', first: '' }; }
  }

  // Helpers para persistir y usar el plan seleccionado
  /**
   * Guarda el plan seleccionado (megas y precio mensual) en localStorage.
   */
  function setStoredPlan(megas, price) {
    try {
      localStorage.setItem('selectedPlanMegas', megas || '');
      localStorage.setItem('selectedPlanPrice', price || '');
    } catch(_) {}
  }
  /**
   * Retorna el plan almacenado; si no existe devuelve campos vacíos.
   */
  function getStoredPlan() {
    try {
      return {
        megas: localStorage.getItem('selectedPlanMegas') || '',
        price: localStorage.getItem('selectedPlanPrice') || ''
      };
    } catch(_) { return { megas: '', price: '' }; }
  }
  /**
   * Ajusta el CTA principal eliminando sufijos dinámicos anteriores
   * y asegurando un aria-label estable y descriptivo.
   */
  function renderCtaPlan() {
    var cta = document.getElementById('contratar') || document.getElementById('solicitar');
    var formAlt = document.getElementById('abrir-formulario');
    if (!cta) return;
    // Texto fijo, sin sufijos dinámicos
    try {
      var suffix = document.getElementById('cta-plan-suffix');
      if (suffix) suffix.remove();
    } catch(_) {}
    // Asegurar label accesible estable
    cta.setAttribute('aria-label', 'Solicitar instalación por WhatsApp');
  }

  // Menú principal: lógica de contenido dinámico
  var btnNuevo = document.getElementById('btn-nuevo');
  var btnCliente = document.getElementById('btn-cliente');
  var welcomeMsg = document.getElementById('welcome-message');
  var nuevoContent = document.getElementById('nuevo-content');
  var clienteContent = document.getElementById('cliente-content');

  /**
   * Limpia estado visual de botones de menú (si se reintroducen estilos activos).
   */
  function resetActive() {
    // Mantiene la semántica por si se reintroducen estilos de estado; actualmente no hay menú separado.
    if (btnNuevo) btnNuevo.classList.remove('active-menu');
    if (btnCliente) btnCliente.classList.remove('active-menu');
  }

  // Mostrar solo hero y bienvenida por defecto
  /**
   * Vista inicial: muestra mensaje de bienvenida y oculta otras secciones.
   */
  function mostrarBienvenida() {
    showSection(welcomeMsg);
    hideSection(nuevoContent);
    hideSection(clienteContent);
    resetActive();
  }

  // Mostrar contenido de usuarios nuevos (sin modal de captura)
  /**
   * Activa contenido para nuevos clientes: muestra sección principal y hace scroll
   * automático la primera vez hasta el bloque de proceso de instalación.
   */
  function mostrarNuevo() {
    hideSection(welcomeMsg);
    hideSection(clienteContent);
    showSection(nuevoContent);
    resetActive(); if (btnNuevo) btnNuevo.classList.add('active-menu');
    try { nuevoContent.classList.add('visited'); } catch(_) {}
    // Scroll inicial a sección "¿Cómo funciona" la primera vez
    try {
      var target = document.querySelector('.proceso-instalacion') || nuevoContent;
      if (target) {
        var header = document.getElementById('site-header');
        var offset = (header && header.offsetHeight) ? header.offsetHeight + 8 : 70;
        var rect = target.getBoundingClientRect();
        if (!nuevoContent.__scrolledOnce) {
          var y = rect.top + window.pageYOffset - offset;
          window.scrollTo({ top: y, behavior: 'smooth' });
          nuevoContent.__scrolledOnce = true;
        }
      }
    } catch(_) {}
  }

  // Mostrar contenido de clientes existentes
  // --- Autenticación básica de cliente (por teléfono) ---
  var clienteLoginModal = null;
  var clientesCache = null; // se carga bajo demanda
  var clientesLoading = false;
  var clientesPhoneIndex = null; // Map de telefono normalizado -> registro

  /**
   * Obtiene objeto de autenticación del cliente (nombre, usuario, teléfonos) desde localStorage.
   * @returns {object|null}
   */
  function getAuth() {
    try {
      var raw = localStorage.getItem('clienteAuth');
      if (!raw) return null;
      return JSON.parse(raw);
    } catch(_) { return null; }
  }
  /** Guarda objeto de autenticación serializado. */
  function setAuth(obj) {
    try { localStorage.setItem('clienteAuth', JSON.stringify(obj || {})); } catch(_) {}
  }
  /** Elimina credenciales del cliente almacenadas. */
  function clearAuth() {
    try { localStorage.removeItem('clienteAuth'); } catch(_) {}
  }
  /** Normaliza un teléfono extrayendo solo dígitos. */
  function normalizePhone(p) { return (p||'').replace(/[^0-9]/g,''); }
  /** Indica si existe sesión de cliente con usuario válido. */
  function clienteEstaAutenticado() { return !!(getAuth() && getAuth().usuario); }

  /**
   * Carga (una vez) listado de clientes desde json/clientes.json, construye índice de teléfonos.
   * Devuelve Promesa con array de registros. Implementa cola simple si ya hay fetch en curso.
   */
  function fetchClientes() {
    return new Promise(function(resolve, reject){
      if (clientesCache) return resolve(clientesCache);
      if (clientesLoading) {
        var int = setInterval(function(){ if(!clientesLoading){ clearInterval(int); resolve(clientesCache||[]); } }, 80);
        return;
      }
      clientesLoading = true;
      fetch('json/clientes.json', { cache:'no-cache' })
        .then(function(r){ if(!r.ok) throw new Error('Carga fallida'); return r.json(); })
        .then(function(data){
          clientesCache = Array.isArray(data)?data:[];
          // Construir índice de teléfonos y validar duplicados
          try {
            clientesPhoneIndex = Object.create(null);
            var dupes = [];
            clientesCache.forEach(function(item, idx){
              var tels = Array.isArray(item.Telefonos)?item.Telefonos:[];
              if(!tels.length){ /* se puede loggear si se requiere */ }
              tels.forEach(function(tRaw){
                var t = normalizePhone(tRaw);
                if(!t) return;
                if(clientesPhoneIndex[t]) {
                  dupes.push({ telefono:t, existente: clientesPhoneIndex[t].Usuario, duplicado: item.Usuario });
                } else {
                  clientesPhoneIndex[t] = item;
                }
              });
            });
            if(dupes.length && window.console){
              console.warn('[Clientes] Teléfonos duplicados detectados:', dupes.slice(0,10));
            }
          } catch(errIdx){ console.error('Error construyendo índice de clientes', errIdx); }
          resolve(clientesCache);
        })
        .catch(function(err){ console.error('Error cargando clientes.json', err); reject(err); })
        .finally(function(){ clientesLoading = false; });
    });
  }

  /**
   * Busca un cliente por teléfono normalizado (usa índice si disponible, si no hace escaneo lineal).
   * @param {string} phone
   * @param {Array} list
   */
  function findClientByPhone(phone, list) {
    var target = normalizePhone(phone);
    if (!target || target.length < 7) return null;
    // Usar índice si está disponible
    if (clientesPhoneIndex && clientesPhoneIndex[target]) return clientesPhoneIndex[target];
    // Fallback escaneo lineal (si índice no construido aún)
    list = list || clientesCache || [];
    for (var i=0;i<list.length;i++) {
      var item = list[i];
      var tels = Array.isArray(item.Telefonos)?item.Telefonos:[];
      for (var j=0;j<tels.length;j++) {
        if (normalizePhone(tels[j]) === target) {
          return item;
        }
      }
    }
    return null;
  }

  /** Refleja datos de autenticación en el panel de cliente (nombre, usuario, teléfonos). */
  function renderClienteAuthInfo() {
    var box = document.getElementById('cliente-auth-info');
    if (!box) return;
    var auth = getAuth();
    if (auth && auth.usuario) {
      try {
        var nomEl = document.getElementById('cliente-auth-nombre');
        var usuEl = document.getElementById('cliente-auth-usuario');
        var passEl = document.getElementById('cliente-auth-pass');
        var telEl = document.getElementById('cliente-auth-tels');
        var refNombre = document.getElementById('ref-pago-nombre');
        var refUsuario = document.getElementById('ref-pago-usuario');
        if (nomEl) nomEl.textContent = auth.nombre || '';
        if (usuEl) {
          var simpleUser = (auth.usuario||'').replace(/@.*$/,'');
          usuEl.textContent = simpleUser;
        }
        if (passEl) passEl.textContent = 'norttek123';
        if (telEl) telEl.textContent = (auth.telefonos||[]).join(', ');
        // Poblar referencias de pago
        if (refNombre) {
          var simpleName = auth.nombre || '';
            refNombre.firstChild && (refNombre.firstChild.textContent = simpleName || '-- ');
            refNombre.setAttribute('data-clip', simpleName);
            var btnN = refNombre.querySelector('button.clip-btn'); if(btnN) btnN.setAttribute('data-clip', simpleName);
        }
        if (refUsuario) {
          var simpleUser2 = (auth.usuario||'').replace(/@.*$/,'');
            refUsuario.firstChild && (refUsuario.firstChild.textContent = simpleUser2 || '-- ');
            refUsuario.setAttribute('data-clip', simpleUser2);
            var btnU = refUsuario.querySelector('button.clip-btn'); if(btnU) btnU.setAttribute('data-clip', simpleUser2);
        }
        box.style.display = 'block';
      } catch(_) {}
    } else {
      box.style.display = 'none';
    }
  }

  /** Muestra modal de login y enfoca input de teléfono. */
  function abrirLoginCliente() {
    if (!clienteLoginModal) clienteLoginModal = document.getElementById('cliente-login-modal');
    if (clienteLoginModal) {
      clienteLoginModal.style.display = 'flex';
      setTimeout(function(){
        try { var inp = document.getElementById('cliente-login-phone'); if (inp) inp.focus(); } catch(_){}
      }, 50);
    } else {
      if (window.NTNotify) NTNotify.warning('No se pudo abrir el modal de acceso. Recarga la página.');
      else console.warn('Modal de login cliente no encontrado');
    }
  }
  /** Oculta modal de login de cliente. */
  function cerrarLoginCliente() {
    if (clienteLoginModal) clienteLoginModal.style.display = 'none';
  }

  // mostrarCliente(true) => fuerza scroll centrado (solo tras login);
  // mostrarCliente(event) o sin argumento => no hace scroll automático
  /**
   * Muestra dashboard de cliente autenticado o fuerza apertura de modal si no autenticado.
   * doScroll=true centra visualmente el dashboard tras login.
   */
  function mostrarCliente(doScroll) {
    // Si no autenticado, abrir modal en lugar de mostrar dashboard
    if (!clienteEstaAutenticado()) {
      abrirLoginCliente();
      return;
    }
    hideSection(welcomeMsg);
    hideSection(nuevoContent);
    showSection(clienteContent);
    resetActive(); if (btnCliente) btnCliente.classList.add('active-menu');
    renderClienteAuthInfo();
    // Re-disparar animaciones para elementos que pudieron haberse secuenciado mientras estaban ocultos
    try {
      var cards = clienteContent ? clienteContent.querySelectorAll('.nt-soft-seq') : [];
      // Failsafe: pasado un lapso breve, forzar visibilidad si algún elemento sigue oculto
      setTimeout(function(){
        cards.forEach(function(card){
          if (window.getComputedStyle(card).opacity === '0') {
            card.style.opacity = 1;
            card.style.transform = 'none';
          }
        });
      }, 600);
      cards.forEach(function(card){
        var compOpacity = window.getComputedStyle(card).opacity;
        if (compOpacity === '0') {
          // Si el gestor global existe, usar su secuenciador sobre el contenedor;
          // de lo contrario, forzar visible inmediatamente
          card.classList.remove('nt-anim-soft-in');
          card.style.animationDelay = '';
          card.__ntAnimatedInitial = false;
        }
      });
      if (window.NTAnim && typeof window.NTAnim.sequence === 'function') {
        window.NTAnim.sequence(clienteContent);
      } else {
        cards.forEach(function(card){ card.style.opacity = 1; card.style.transform = 'none'; });
      }
    } catch(_) {}
    if (doScroll === true) {
      try {
        setTimeout(function(){
          var dash = document.querySelector('.cliente-dashboard');
          if (dash) {
            if (dash.scrollIntoView) {
              dash.scrollIntoView({ behavior: 'smooth', block: 'center' });
              setTimeout(function(){
                try {
                  var header = document.getElementById('site-header');
                  if (header) {
                    var rect = dash.getBoundingClientRect();
                    var headerH = header.offsetHeight || 0;
                    if (rect.top < headerH + 10) {
                      var y = rect.top + window.pageYOffset - headerH - 10;
                      window.scrollTo({ top: y, behavior: 'smooth' });
                    }
                  }
                } catch(_) {}
              }, 380);
            } else {
              var header2 = document.getElementById('site-header');
              var headerH2 = header2 ? header2.offsetHeight : 0;
              var top = dash.getBoundingClientRect().top + window.pageYOffset - headerH2 - 10;
              window.scrollTo({ top: top, behavior: 'smooth' });
            }
          }
        }, 60);
      } catch(_) {}
    }
  }

  if (btnNuevo) btnNuevo.addEventListener('click', mostrarNuevo);
  if (btnCliente) btnCliente.addEventListener('click', mostrarCliente);

  // Estado inicial
  // Asegura que las secciones ocultas tengan la clase para transición
  [nuevoContent, clienteContent].forEach(function(el){ if (el && el.style.display === 'none') el.classList.add('section-hidden'); });
  mostrarBienvenida();
  // Eliminada restauración automática de sección previa para evitar scroll inesperado
  try { localStorage.removeItem('internetSection'); } catch(_) {}
  // Stagger para tarjetas de planes (usa transitionDelay)
  document.querySelectorAll('.plan-card.animate-card').forEach(function(card, i) {
    card.style.transitionDelay = (i * 0.12) + 's';
  });

  /* === Lógica Costos de Instalación Refactor === */
  /**
   * Módulo autoejecutable para costos de instalación.
   * Responsabilidades:
   *  - Mostrar/ocultar sección según gating (plan seleccionado en esta sesión)
   *  - Gestionar escenario (propio / sin equipo) y forma de pago antena
   *  - Generar calendario de pagos y resumen dinámico
   *  - Actualizar estado del CTA final (habilitado/inhabilitado)
   */
  (function initInstalacionCostos(){
    var rootSec = document.getElementById('instalacion-costos');
    if(!rootSec) return;
    // Gating activado: la sección permanece oculta hasta que se elige un plan.
    var escPropio = document.getElementById('esc-propio');
    var escSin = document.getElementById('esc-sinequipo');
    var radiosPago = rootSec.querySelectorAll('input[name="pago-antena"]');
    var notaDiferido = rootSec.querySelector('[data-role="nota-diferido"]');
    var tabla = document.getElementById('tabla-calendario');
    var tbody = tabla ? tabla.querySelector('tbody') : null;
    var placeholder = document.getElementById('tabla-placeholder');
    var resumenLinea = document.getElementById('inst-resumen-linea');
    var botonesEsc = rootSec.querySelectorAll('[data-select-esc]');
  var sinEquipoResumen = rootSec.querySelector('[data-role="sin-equipo-resumen"]');
  var propioResumen = rootSec.querySelector('[data-role="propio-resumen"]');

  var STATE = { escenario:null, pagoAntena:'contado' };
    var CONST = {
      propio:{ anticipo:500 },
      sinEquipo:{ antena:1800, instalacion:850, diferidoMeses:3 }
    };

  /** Obtiene plan actual (megas, price) del almacenamiento. */
  function getPlan(){
      try { return { megas: localStorage.getItem('selectedPlanMegas')||'', price: parseFloat(localStorage.getItem('selectedPlanPrice')||'')||0 }; } catch(_){ return {megas:'', price:0}; }
    }
  /** Anima y revela la sección de costos si no estaba visible. */
  function revealSection(){
      if(rootSec.classList.contains('inst-costs-visible')) return;
      rootSec.classList.remove('inst-costs-hidden');
      rootSec.classList.add('inst-costs-visible');
      // Scroll al mostrarse
      try {
        setTimeout(function(){
          var header = document.getElementById('site-header');
          var offset = (header && header.offsetHeight) ? header.offsetHeight + 8 : 70;
          var rect = rootSec.getBoundingClientRect();
          var y = rect.top + window.pageYOffset - offset;
          window.scrollTo({ top: y, behavior: 'smooth' });
        }, 40);
      } catch(_){}
    }
  /** Oculta la sección de costos (usado cuando se pierde gating). */
  function hideSection(){
      rootSec.classList.add('inst-costs-hidden');
      rootSec.classList.remove('inst-costs-visible');
    }
  /** Controla gating: sólo visible si hay plan y flag de sesión planChosenSession. */
  function updateVisibility(triggered){
      // La sección sólo se muestra si hay plan elegido en esta sesión (interacción del usuario)
      try {
        var plan = getPlan();
        var sessionChosen = false;
        try { sessionChosen = sessionStorage.getItem('planChosenSession') === '1'; } catch(_) {}
        if(plan.megas && plan.price && sessionChosen){
          revealSection();
        } else {
          hideSection();
          return; // Mantener oculta hasta interacción
        }
      } catch(_){ }
    }
    function fmt(n){ return '$'+n.toLocaleString('es-MX'); }

  /** Cambia escenario activo, recalcula y persiste en localStorage. */
  function seleccionarEscenario(esc){
      STATE.escenario = esc;
      [escPropio, escSin].forEach(function(card){ if(!card) return; card.classList.toggle('active', card.getAttribute('data-esc')===esc); });
      if(placeholder) placeholder.style.display = 'none';
      calcular();
      try { localStorage.setItem('installScenario', esc==='propio'?'propio':'sinequipo'); } catch(_) {}
      updateCtaState();
    }
  /** Ajusta modo de pago de antena (contado / diferido) y recalcula. */
  function setPagoAntena(mode){ STATE.pagoAntena = mode; if(notaDiferido) notaDiferido.style.display = (mode==='diferido')?'block':'none'; calcular(); }

  /** Limpia tbody del calendario de pagos. */
  function limpiarTabla(){ if(tbody) tbody.innerHTML=''; }
  /** Agrega fila al calendario (mes, monto, detalle). */
  function pushRow(mes, monto, detalle){ if(!tbody) return; var tr=document.createElement('tr'); tr.innerHTML='<td>'+mes+'</td><td class="monto">'+fmt(monto)+'</td><td>'+detalle+'</td>'; tbody.appendChild(tr);}    

  /**
   * Recalcula calendario dependiendo de plan, escenario y forma de pago antena.
   * Aplica placeholders cuando faltan selecciones.
   */
  function calcular(){
      var plan = getPlan();
      updateCtaState(plan);
      if(!plan.price){
        limpiarTabla();
        if(resumenLinea) resumenLinea.textContent='Selecciona un plan para continuar.';
        if(placeholder){ placeholder.style.display='flex'; placeholder.textContent='Primero elige un plan.'; }
        return;
      }
      if(!STATE.escenario){
        limpiarTabla();
        if(resumenLinea) resumenLinea.textContent='Ahora selecciona un escenario (con o sin antena).';
        if(placeholder){ placeholder.style.display='flex'; placeholder.textContent='Selecciona un escenario para generar el calendario.'; }
        return;
      }
      limpiarTabla();
      var servicio = plan.price;
      if(STATE.escenario==='propio'){
        // Mes 1 anticipo completo
        pushRow('Mes 1', CONST.propio.anticipo, 'Anticipo (incluye alineación, reprogramación, configuración)');
        pushRow('Mes 2', servicio, 'Servicio');
        pushRow('Mes 3', servicio, 'Servicio');
        pushRow('Mes 4', servicio, 'Servicio');
        if(resumenLinea) resumenLinea.innerHTML = '<strong>Escenario Equipo Propio:</strong> Pagas '+fmt(CONST.propio.anticipo)+' el primer mes y a partir del Mes 2 solo el servicio ('+fmt(servicio)+').';
        if(propioResumen){
          propioResumen.innerHTML = '<strong>Pago inicial:</strong> '+fmt(CONST.propio.anticipo)+'<br><strong>Pagos futuros:</strong> servicio ('+fmt(servicio)+')';
        }
      } else {
        var anticipo = CONST.sinEquipo.instalacion; // 850
        var antena = CONST.sinEquipo.antena; // 1800
        if(STATE.pagoAntena==='contado'){
          pushRow('Mes 1', anticipo + antena, 'Instalación + Antena (contado)');
          pushRow('Mes 2', servicio, 'Servicio');
          pushRow('Mes 3', servicio, 'Servicio');
          pushRow('Mes 4', servicio, 'Servicio');
          if(resumenLinea) resumenLinea.innerHTML = '<strong>Escenario Sin Equipo (Contado):</strong> Pagas '+fmt(anticipo+antena)+' el primer mes; desde Mes 2 solo el servicio ('+fmt(servicio)+').';
        } else {
          var cuota = antena / CONST.sinEquipo.diferidoMeses; // 600
          pushRow('Mes 1', anticipo, 'Anticipo instalación');
          for(var m=2;m<=4;m++){
            if(m-1 <= CONST.sinEquipo.diferidoMeses){
              pushRow('Mes '+m, servicio + cuota, 'Servicio + cuota antena');
            } else {
              pushRow('Mes '+m, servicio, 'Servicio');
            }
          }
          if(resumenLinea) resumenLinea.innerHTML = '<strong>Escenario Sin Equipo (Diferido):</strong> Mes 1 pagas anticipo '+fmt(anticipo)+'. Meses 2-'+(CONST.sinEquipo.diferidoMeses+1)+' servicio + cuota ('+fmt(servicio+cuota)+'). Después sólo servicio.';
        }
        if(sinEquipoResumen){
          if(STATE.pagoAntena==='contado') sinEquipoResumen.innerHTML = '<strong>Pago inicial:</strong> '+fmt(anticipo+antena)+'<br><strong>Pagos futuros:</strong> solo servicio ('+fmt(servicio)+')';
          else sinEquipoResumen.innerHTML = '<strong>Pago inicial:</strong> '+fmt(anticipo)+'<br><strong>Cuota antena:</strong> '+fmt(antena)+' en '+CONST.sinEquipo.diferidoMeses+' meses ('+fmt(antena/CONST.sinEquipo.diferidoMeses)+' c/u)';
        }
      }
      updateCtaState(plan);
      // Aplicar delays escalonados a las filas recién generadas
      try {
        var filas = tbody ? Array.prototype.slice.call(tbody.querySelectorAll('tr')) : [];
        filas.forEach(function(fr,i){ fr.style.animationDelay = (i*0.12)+'s'; });
      } catch(_){ }
    }

  /** Actualiza clases y aria del CTA final según si hay plan + escenario. */
  function updateCtaState(planObj){
      try {
        var cta = document.getElementById('contratar');
        if(!cta) return;
        var plan = planObj || getPlan();
        var escenario = STATE.escenario;
        var habilitado = !!(plan && plan.price && escenario);
        cta.classList.toggle('cta-disabled', !habilitado);
        cta.setAttribute('aria-disabled', habilitado ? 'false':'true');
        if(!habilitado){ cta.title = 'Selecciona un plan y un escenario para continuar'; }
        else { cta.title = 'Enviar solicitud de instalación por WhatsApp'; }
      } catch(_){ }
    }

    botonesEsc.forEach(function(btn){
      btn.addEventListener('click', function(){ seleccionarEscenario(btn.getAttribute('data-select-esc')); });
    });
    radiosPago.forEach(function(r){ r.addEventListener('change', function(){ setPagoAntena(r.value); }); });
    // Recalcular cuando se actualiza el plan
  document.addEventListener('nt-plan-updated', function(e){ updateVisibility(e && e.detail && e.detail.triggered===true); calcular(); });
  window.addEventListener('storage', function(ev){ if(ev.key==='selectedPlanMegas'||ev.key==='selectedPlanPrice'){ updateVisibility(false); calcular(); } });

    // Estado inicial desde localStorage si existe selección previa
    try {
      var prevEsc = localStorage.getItem('installScenario');
      // La selección de escenario se aplicará después de que exista plan; si no hay plan todavía, se ignorará.
      if(prevEsc==='propio' || prevEsc==='sinequipo'){ STATE.escenario = prevEsc==='propio'?'propio':'sinequipo'; }
    } catch(_) {}
    updateVisibility(false); // Mostrará u ocultará según exista plan previo
    calcular(); // Generará mensajes placeholder apropiados
  })();

    // Nueva lógica: selección directa de tarjetas (rol radio)
    try {
      var planCards = Array.prototype.slice.call(document.querySelectorAll('.int-plan-card.selectable'));
      function clearPlanSelection(){ planCards.forEach(function(c){ c.setAttribute('aria-checked','false'); c.classList.remove('selected'); }); }
      function choosePlan(card, opts){
        if(!card) return;
        var doScroll = !opts || opts.scroll !== false;
        var megas = (card.getAttribute('data-megas') || '').trim();
        var price = (card.getAttribute('data-plan-price') || '').trim();
        var planText = megas ? (megas + ' Megas') : '';
        clearPlanSelection();
        card.setAttribute('aria-checked','true');
        card.classList.add('selected');
        try { localStorage.setItem('selectedPlan', planText); } catch(_) {}
        try { setStoredPlan(megas, price); sessionStorage.setItem('planChosenSession','1'); document.dispatchEvent(new CustomEvent('nt-plan-updated',{ detail:{ triggered:true }})); } catch(_) {}
        if(doScroll){
          // Enfocar calendario sólo en selección activa del usuario
          try {
            var calendario = document.querySelector('.calendario-costos');
            var header = document.getElementById('site-header');
            if (calendario) {
              var y = calendario.getBoundingClientRect().top + window.pageYOffset - ((header && header.offsetHeight) || 0) - 12;
              window.scrollTo({ top: y, behavior: 'smooth' });
              calendario.classList.remove('highlight'); void calendario.offsetWidth; calendario.classList.add('highlight');
              setTimeout(function(){ calendario && calendario.classList.remove('highlight'); }, 2000);
            }
          } catch(_) {}
        }
      }
      planCards.forEach(function(card){
        card.addEventListener('click', function(){ choosePlan(card); });
        card.addEventListener('keydown', function(ev){ if(ev.key==='Enter' || ev.key===' '){ ev.preventDefault(); choosePlan(card); } });
      });
      // Restaurar selección previa de plan sin hacer scroll
      try {
        var storedMegas = localStorage.getItem('selectedPlanMegas');
        var storedPrice = localStorage.getItem('selectedPlanPrice');
        if(storedMegas && storedPrice){
          var match = planCards.find(function(c){ return (c.getAttribute('data-megas')||'').trim() === storedMegas; });
          if(match){
            // Sólo marcamos visualmente; NO disparamos evento para no mostrar la sección aún.
            clearPlanSelection();
            match.setAttribute('aria-checked','true');
            match.classList.add('selected');
          }
        }
      } catch(_) {}
    } catch(_) {}
  // Prefill de nombre si ya fue capturado previamente
  try {
    var stored = getStoredName();
    if (stored.full) {
      var asesorInput = document.getElementById('asesor-nombre');
      if (asesorInput && !asesorInput.value) asesorInput.value = stored.full;
    }
  } catch(_) {}

  // Inicializa CTA con plan seleccionado previo (si existe)
  try { renderCtaPlan(); } catch(_) {}

  // Animación scroll para secciones (IntersectionObserver)
  var revealTargets = document.querySelectorAll('.scroll-anim');
  try {
    var io = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          io.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -80px 0px', threshold: 0.1 });
    revealTargets.forEach(function(el) { io.observe(el); });
  } catch (_) {
    // Fallback simple
    function scrollAnim() {
      var winH = window.innerHeight;
      revealTargets.forEach(function(el) {
        var rect = el.getBoundingClientRect();
        if (rect.top < winH - 60) el.classList.add('visible');
      });
    }
    window.addEventListener('scroll', scrollAnim);
    scrollAnim();
  }

  // Formulario (eliminado)

  // Eliminado: modal de bienvenida y formulario de captura (flujo ahora directo)
  // Guardar selección cuando se navega entre pestañas del menú
  if (btnCliente) btnCliente.addEventListener('click', function(){ try { localStorage.setItem('internetSection', 'cliente'); } catch (_) {} });
  if (btnNuevo) btnNuevo.addEventListener('click', function(){ try { localStorage.setItem('internetSection', 'nuevo'); } catch (_) {} });

  // --- Listeners del login cliente ---
  try {
    clienteLoginModal = document.getElementById('cliente-login-modal');
    var loginClose = document.getElementById('cliente-login-close');
    var loginCancel = document.getElementById('cliente-login-cancel');
    var loginForm = document.getElementById('cliente-login-form');
    var loginError = document.getElementById('cliente-login-error');
    var logoutBtn = document.getElementById('cliente-auth-logout');
    if (loginClose) loginClose.addEventListener('click', function(){ cerrarLoginCliente(); });
    if (loginCancel) loginCancel.addEventListener('click', function(){ cerrarLoginCliente(); });
    if (logoutBtn) logoutBtn.addEventListener('click', function(){ clearAuth(); renderClienteAuthInfo(); mostrarBienvenida(); });
    if (loginForm) {
      loginForm.addEventListener('submit', function(ev){
        ev.preventDefault();
        if (loginError) loginError.style.display = 'none';
        var phoneInput = document.getElementById('cliente-login-phone');
        var phoneVal = normalizePhone((phoneInput && phoneInput.value) || '');
        if (!phoneVal || phoneVal.length < 8) {
          if (loginError) { loginError.textContent = 'Ingresa un teléfono válido.'; loginError.style.display='block'; }
          return;
        }
        fetchClientes().then(function(list){
          var found = findClientByPhone(phoneVal, list);
          if (!found) {
            if (loginError) { loginError.textContent = 'Teléfono no encontrado. Verifica tu número.'; loginError.style.display = 'block'; }
            return;
          }
          var authObj = {
            nombre: found.Nombre || '',
            usuario: found.Usuario || '',
            telefonos: Array.isArray(found.Telefonos) ? found.Telefonos : []
          };
            // Normalizar nombre a Title Case si viene todo en minúsculas
          try { if (authObj.nombre && authObj.nombre === authObj.nombre.toLocaleLowerCase('es-MX')) authObj.nombre = toTitleCaseEs(authObj.nombre); } catch(_){}
          setAuth(authObj);
          cerrarLoginCliente();
          mostrarCliente(true); // re-entra ya autenticado y ahora sí hace scroll centrado
        }).catch(function(){ if (loginError) { loginError.textContent = 'No se pudo validar. Intenta más tarde.'; loginError.style.display='block'; } });
      });
    }
  } catch(_) {}

  // Si ya hay auth almacenada, preparar UI
  try { if (clienteEstaAutenticado()) renderClienteAuthInfo(); } catch(_) {}

  // Smooth scroll to advisor with sticky header offset and highlight
  document.querySelectorAll('a.link-asesor').forEach(function(a){
    a.addEventListener('click', function(ev){
      var href = a.getAttribute('href') || '';
      if (href.startsWith('#')) {
        ev.preventDefault();
        var id = href.slice(1);
        var el = document.getElementById(id);
        if (el) {
          var header = document.getElementById('site-header');
          var y = el.getBoundingClientRect().top + window.pageYOffset - ((header && header.offsetHeight) || 0) - 10;
          window.scrollTo({ top: y, behavior: 'smooth' });
          // resaltar contenedor con animación
          el.classList.remove('highlight');
          void el.offsetWidth; // reflow to restart animation
          el.classList.add('highlight');
        }
      }
    });
  });

  // Contacta a un asesor (WhatsApp)
  try {
    var btnAsesor = document.querySelector('.btn-asesor');
    if (btnAsesor) {
      btnAsesor.addEventListener('click', function() {
        var nombreRaw = (document.getElementById('asesor-nombre') || {}).value || '';
        // Si el campo viene vacío, usa el nombre guardado del modal
        if (!nombreRaw.trim()) {
          var st = getStoredName();
          nombreRaw = st.full || st.first || '';
        }
        var nombreTrim = nombreRaw.trim().replace(/\s+/g, ' ');
        var nombre = nombreTrim;
        try {
          if (nombreTrim && nombreTrim === nombreTrim.toLocaleLowerCase('es-MX')) {
            nombre = toTitleCaseEs(nombreTrim);
          }
        } catch(_) {}
        // Mantener sincronizado el nombre almacenado si el usuario lo escribe aquí
        if (nombre) setStoredName(nombre, nombre.split(/\s+/)[0] || '');
  var saludo = nombre ? (EMOJI.wave + ' Hola, mi nombre es ' + nombre + '.') : (EMOJI.wave + ' Hola.');
  var planSel = '';
  try { planSel = localStorage.getItem('selectedPlan') || ''; } catch(_) {}
  var planLinea = planSel ? ('Me gustaría contratar el plan de ' + planSel + '.') : 'Me gustaría recibir más información sobre el servicio de Internet Norttek, costos de instalación y planes disponibles.';
  var formLink = 'http://clientes.portalinternet.net/solicitar-instalacion/norttek/';
  var copy = saludo + '\n\n' + planLinea + '\n\n' + '¿Pueden ayudarme a continuar con la solicitud?\n\n' + 'Posteriormente llenaré el formulario para agendar mi instalación:\n' + formLink + '\n\n' + EMOJI.check + ' Quedo pendiente de su apoyo.';
        var phone = '526252690997';
        var url = 'https://wa.me/' + phone + '?text=' + encodeURIComponent(copy);
        var msg = document.getElementById('asesor-msg');
        if (msg) msg.textContent = 'Abriendo WhatsApp…';
        window.open(url, '_blank');
      });
    }
  } catch(_) {}

  // Botón soporte técnico dentro del dashboard cliente
  try {
    document.querySelectorAll('.btn-soporte-wa').forEach(function(btn){
      btn.addEventListener('click', function(){
        var baseMsg = btn.getAttribute('data-wa') || 'Necesito soporte técnico para mi servicio.';
        var st = getStoredName();
        var nombre = (st.full || st.first || '').trim();
        if (nombre && nombre === nombre.toLocaleLowerCase('es-MX')) {
          try { nombre = toTitleCaseEs(nombre); } catch(_){ }
        }
        var saludo = nombre ? (EMOJI.wave + ' Hola, soy ' + nombre + '.') : (EMOJI.wave + ' Hola.');
        var copy = saludo + '\n\n' + baseMsg + '\n\n' + EMOJI.check + ' Quedo pendiente de su apoyo.';
        var wa = 'https://wa.me/526252690997?text=' + encodeURIComponent(copy);
        window.open(wa, '_blank');
      });
    });
  } catch(_) {}

  // --- Copiar datos bancarios ---
  try {
    function copiarValor(valor){
      if(!valor) return;
      var ok = false;
      if(navigator.clipboard && navigator.clipboard.writeText){
        navigator.clipboard.writeText(valor).then(function(){
          ok = true; if(window.NTNotify) NTNotify.success('Copiado');
        }).catch(function(){ fallbackCopy(valor); });
      } else { fallbackCopy(valor); }
      function fallbackCopy(text){
        try {
          var ta = document.createElement('textarea');
          ta.value = text;
          ta.style.position='fixed';
          ta.style.top='-1000px';
          document.body.appendChild(ta);
          ta.select();
          document.execCommand('copy');
          document.body.removeChild(ta);
          if(window.NTNotify) NTNotify.success('Copiado');
        } catch(e){ if(window.NTNotify) NTNotify.warning('No se pudo copiar'); }
      }
    }
    document.querySelectorAll('.cliente-card.cuentas-card .clip-btn').forEach(function(btn){
      btn.addEventListener('click', function(){ copiarValor(btn.getAttribute('data-clip')); });
    });
  } catch(_) {}

  // (Eliminado) Manejador duplicado que abría WhatsApp desde el botón de plan

  // Al hacer click en el CTA final, asegurar que el plan elegido esté en el querystring
  try {
    var ctaBtn = document.getElementById('contratar') || document.getElementById('solicitar');
    if (ctaBtn) {
      ctaBtn.addEventListener('click', function(ev){
        if (ev) { if(ev.preventDefault) ev.preventDefault(); if(ev.stopPropagation) ev.stopPropagation(); }
        var debugInfo = { stage:'pre-validate', plan:null, scen:null, hasName:false };
        var planVal = null, scenVal = null;
        try { planVal = localStorage.getItem('selectedPlanPrice'); debugInfo.plan = planVal; } catch(_){ }
        try { scenVal = localStorage.getItem('installScenario'); debugInfo.scen = scenVal; } catch(_){ }
        // Validación gating
        if(!planVal || !scenVal){
          console.warn('[CTA Instalación] Bloqueado por falta de selección', debugInfo);
          if(window.NTNotify){ NTNotify.warning('Selecciona un plan y un escenario antes de continuar.'); }
          if(ctaBtn){ ctaBtn.classList.add('cta-disabled-ping'); setTimeout(function(){ ctaBtn.classList.remove('cta-disabled-ping'); }, 1200); }
          return;
        }
        var st = getStoredName();
        var nombre = (st.full || st.first || '').trim();
        debugInfo.hasName = !!nombre;
        if(!nombre){
          console.log('[CTA Instalación] Abriendo modal para capturar nombre', debugInfo);
          return abrirModalNombre(function(capt){ if(capt){ enviarWhatsApp(capt); } else { console.log('[CTA Instalación] Usuario cerró modal sin nombre'); } });
        }
        console.log('[CTA Instalación] Enviando WhatsApp con nombre almacenado', debugInfo);
        enviarWhatsApp(nombre);
      });
      // Exponer función de prueba en consola
      try {
        window.__debugCtaInstalacion = function(){
          var planVal = localStorage.getItem('selectedPlanPrice');
          var scenVal = localStorage.getItem('installScenario');
          var name = (localStorage.getItem('customerNameFull')||'').trim();
          return { planVal:planVal, scenVal:scenVal, name:name, disabled: ctaBtn.classList.contains('cta-disabled') };
        };
      } catch(_) {}
    }
    function enviarWhatsApp(nombre){
      try { if (nombre && nombre === nombre.toLocaleLowerCase('es-MX')) nombre = toTitleCaseEs(nombre); } catch(_) {}
      var saludo = nombre ? (EMOJI.wave + ' Hola, mi nombre es ' + nombre + '.') : (EMOJI.wave + ' Hola.');
      var plan = (function(){ try { return { megas: localStorage.getItem('selectedPlanMegas')||'', price: localStorage.getItem('selectedPlanPrice')||'' }; } catch(_){ return {megas:'', price:''}; } })();
      var planLinea = plan.megas ? ('Plan seleccionado: ' + plan.megas + ' Megas (' + (plan.price?('$'+plan.price+'/mes'):'mensualidad pendiente') + ').') : 'Aún no aparece un plan seleccionado.';
      var escenario = (function(){ try { return localStorage.getItem('installScenario')||''; } catch(_){ return ''; } })();
      var escenarioDesc = '';
      if(escenario==='propio') escenarioDesc = 'Escenario: Ya cuento con antena.';
      else if(escenario==='sinequipo') { var pago='contado'; try { var radio=document.querySelector('input[name="pago-antena"]:checked'); if(radio) pago=radio.value; } catch(_) {} escenarioDesc='Escenario: Necesito antena. Forma de pago antena: '+(pago==='diferido'?'Diferido (3 meses)':'Contado'); }
      else escenarioDesc = 'Escenario aún no seleccionado.';
      var calendarioLineas=[]; try { var filas=document.querySelectorAll('#tabla-calendario tbody tr'); if(filas.length){ filas.forEach(function(tr){ var c=tr.querySelectorAll('td'); if(c.length>=3){ calendarioLineas.push(c[0].textContent.trim()+': '+c[1].textContent.trim()+' ('+c[2].textContent.trim()+')'); } }); } } catch(_) {}
      var calendarioTexto = calendarioLineas.length ? ('Calendario de pagos:\n'+calendarioLineas.join('\n')) : 'Calendario de pagos aún no generado (falta plan o escenario).';
      var resumen=''; try { var rl=document.getElementById('inst-resumen-linea'); if(rl) resumen = rl.textContent.trim() || rl.innerText.trim(); } catch(_) {}
      resumen = resumen ? 'Resumen: '+resumen : 'Resumen pendiente.';
      var formLink='http://clientes.portalinternet.net/solicitar-instalacion/norttek/';
      var cuerpo=[saludo,'',planLinea,escenarioDesc,'',calendarioTexto,'',resumen,'','Formulario:',formLink,'',EMOJI.check+' Quedo atento(a), gracias.'].join('\n');
      var wa='https://wa.me/526252690997?text='+encodeURIComponent(cuerpo);
      try { window.open(wa,'_blank'); } catch(_) {}
    }
  } catch(_) {}

  // Modal captura de nombre (implementación si no existe aún)
  if(typeof window.abrirModalNombre !== 'function'){
    window.abrirModalNombre = function(onDone){
      try {
        var backdrop = document.getElementById('nombre-modal-backdrop');
        var input = document.getElementById('nombre-modal-input');
        var form = document.getElementById('nombre-modal-form');
        if(!backdrop || !input || !form){ if(onDone) onDone(null); return; }
        function cerrar(resultado){
          backdrop.style.display='none';
          backdrop.setAttribute('aria-hidden','true');
          document.body.style.overflow='';
          document.removeEventListener('keydown', escL);
          if(resultado && resultado.trim()){
            var full = resultado.trim();
            var first = full.split(/\s+/)[0];
            setStoredName(full, first);
            if(onDone) onDone(full);
          } else { if(onDone) onDone(null); }
        }
        function escL(e){ if(e.key==='Escape'){ cerrar(null); } }
        document.addEventListener('keydown', escL);
        backdrop.style.display='flex';
        backdrop.setAttribute('aria-hidden','false');
        document.body.style.overflow='hidden';
        setTimeout(function(){ try { input.focus(); } catch(_) {} }, 40);
        form.addEventListener('submit', function(ev){ ev.preventDefault(); cerrar(input.value); }, { once:true });
        backdrop.querySelectorAll('[data-close-nombre]').forEach(function(btn){ btn.addEventListener('click', function(){ cerrar(null); }, { once:true }); });
      } catch(err){ if(onDone) onDone(null); }
    };
  }

});
