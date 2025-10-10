/**
 * Service Worker - Internet Norttek PWA
 * Versión: 1.0.0
 * Proporciona funcionalidad offline y caché de recursos
 */

const CACHE_NAME = 'norttek-internet-v1.0.1';
const urlsToCache = [
  './internet.php',
  './assets/css/internet.css',
  './assets/css/style.css',
  './assets/css/nt-theme.css',
  './assets/css/loader.css',
  './assets/js/internet.js',
  './assets/img/logo-norttek.png',
  './assets/img/favicon-32x32.png',
  // Iconos PWA
  './assets/img/pwa/icon-192x192.png',
  './assets/img/pwa/icon-512x512.png',
];

// Instalación del Service Worker
self.addEventListener('install', event => {
  console.log('🔧 Service Worker instalando...');
  
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('📦 Cacheando recursos...');
        return cache.addAll(urlsToCache);
      })
      .then(() => {
        console.log('✅ Service Worker instalado correctamente');
        return self.skipWaiting(); // Activar inmediatamente
      })
      .catch(error => {
        console.error('❌ Error al instalar Service Worker:', error);
      })
  );
});

// Activación del Service Worker
self.addEventListener('activate', event => {
  console.log('🚀 Service Worker activando...');
  
  const cacheWhitelist = [CACHE_NAME];
  
  event.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            if (!cacheWhitelist.includes(cacheName)) {
              console.log('🗑️ Eliminando caché antiguo:', cacheName);
              return caches.delete(cacheName);
            }
          })
        );
      })
      .then(() => {
        console.log('✅ Service Worker activado');
        return self.clients.claim(); // Tomar control inmediatamente
      })
  );
});

// Estrategia de caché: Network First con fallback a Cache
self.addEventListener('fetch', event => {
  const { request } = event;
  const url = new URL(request.url);
  
  // Solo cachear peticiones HTTP/HTTPS
  if (!url.protocol.startsWith('http')) {
    return;
  }
  
  // Estrategia diferente para diferentes tipos de recursos
  if (request.destination === 'image') {
    // Imágenes: Cache First
    event.respondWith(cacheFirst(request));
  } else if (request.url.includes('/api/') || request.url.includes('.php')) {
    // APIs y PHP: Network First
    event.respondWith(networkFirst(request));
  } else {
    // Otros recursos: Stale While Revalidate
    event.respondWith(staleWhileRevalidate(request));
  }
});

/**
 * Estrategia Cache First
 * Busca primero en caché, si no encuentra hace petición de red
 */
async function cacheFirst(request) {
  const cache = await caches.open(CACHE_NAME);
  const cached = await cache.match(request);
  
  if (cached) {
    return cached;
  }
  
  try {
    const response = await fetch(request);
    if (response.ok) {
      cache.put(request, response.clone());
    }
    return response;
  } catch (error) {
    console.error('Error en fetch:', error);
    return new Response('Offline', { status: 503 });
  }
}

/**
 * Estrategia Network First
 * Intenta red primero, si falla usa caché
 */
async function networkFirst(request) {
  const cache = await caches.open(CACHE_NAME);
  
  try {
    const response = await fetch(request);
    if (response.ok) {
      cache.put(request, response.clone());
    }
    return response;
  } catch (error) {
    const cached = await cache.match(request);
    if (cached) {
      return cached;
    }
    return new Response('Offline - No cached version', { 
      status: 503,
      statusText: 'Service Unavailable'
    });
  }
}

/**
 * Estrategia Stale While Revalidate
 * Devuelve caché inmediatamente y actualiza en segundo plano
 */
async function staleWhileRevalidate(request) {
  const cache = await caches.open(CACHE_NAME);
  const cached = await cache.match(request);
  
  const fetchPromise = fetch(request)
    .then(response => {
      if (response.ok) {
        cache.put(request, response.clone());
      }
      return response;
    })
    .catch(() => cached);
  
  return cached || fetchPromise;
}

// Sincronización en segundo plano
self.addEventListener('sync', event => {
  console.log('🔄 Sincronización en segundo plano:', event.tag);
  
  if (event.tag === 'sync-data') {
    event.waitUntil(syncData());
  }
});

async function syncData() {
  console.log('📡 Sincronizando datos...');
  // Implementar lógica de sincronización si es necesario
}

// Notificaciones Push (opcional)
self.addEventListener('push', event => {
  console.log('🔔 Notificación push recibida');
  
  const options = {
    body: event.data ? event.data.text() : 'Nueva notificación de Norttek',
    icon: '/assets/img/pwa/icon-192x192.png',
    badge: '/assets/img/pwa/icon-72x72.png',
    vibrate: [200, 100, 200],
    tag: 'norttek-notification',
    actions: [
      {
        action: 'open',
        title: 'Abrir',
        icon: '/assets/img/pwa/icon-72x72.png'
      },
      {
        action: 'close',
        title: 'Cerrar'
      }
    ]
  };
  
  event.waitUntil(
    self.registration.showNotification('Norttek Solutions', options)
  );
});

// Manejo de clicks en notificaciones
self.addEventListener('notificationclick', event => {
  console.log('👆 Click en notificación');
  
  event.notification.close();
  
  if (event.action === 'open') {
    event.waitUntil(
      clients.openWindow('/internet.php')
    );
  }
});

// Logging de errores
self.addEventListener('error', event => {
  console.error('❌ Error en Service Worker:', event.error);
});

self.addEventListener('unhandledrejection', event => {
  console.error('❌ Promise rechazada en Service Worker:', event.reason);
});

console.log('📱 Service Worker de Internet Norttek PWA cargado');
