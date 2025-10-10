/**
 * PWA Install Manager
 * Maneja la instalación y registro del Service Worker
 */

let deferredPrompt;
let installButton;

// Registrar Service Worker
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('sw.js')
            .then(registration => {
                console.log('✅ Service Worker registrado:', registration.scope);
                
                // Verificar actualizaciones cada hora
                setInterval(() => {
                    registration.update();
                }, 60 * 60 * 1000);
                
                // Listener para actualizaciones
                registration.addEventListener('updatefound', () => {
                    const newWorker = registration.installing;
                    newWorker.addEventListener('statechange', () => {
                        if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                            showUpdateNotification();
                        }
                    });
                });
            })
            .catch(error => {
                console.error('❌ Error al registrar Service Worker:', error);
            });
    });
}

// Capturar evento beforeinstallprompt
window.addEventListener('beforeinstallprompt', (e) => {
    console.log('📱 Evento beforeinstallprompt capturado');
    
    // Prevenir el mini-infobar automático en móviles
    e.preventDefault();
    
    // Guardar el evento para usarlo después
    deferredPrompt = e;
    
    // Mostrar botón de instalación
    showInstallButton();
});

// Detectar cuando la app fue instalada
window.addEventListener('appinstalled', () => {
    console.log('✅ PWA instalada exitosamente');
    
    // Ocultar botón de instalación
    hideInstallButton();
    
    // Mostrar mensaje de éxito
    showToast('🎉 App instalada correctamente', 'success');
    
    // Limpiar el prompt
    deferredPrompt = null;
    
    // Tracking (opcional)
    if (typeof gtag !== 'undefined') {
        gtag('event', 'pwa_install', {
            event_category: 'PWA',
            event_label: 'Internet Norttek'
        });
    }
});

/**
 * Mostrar botón de instalación
 */
function showInstallButton() {
    // Verificar si ya existe el botón
    if (document.getElementById('pwa-install-btn')) {
        return;
    }
    
    // Crear contenedor del botón
    const installContainer = document.createElement('div');
    installContainer.id = 'pwa-install-container';
    installContainer.innerHTML = `
        <div class="pwa-install-prompt">
            <div class="pwa-prompt-content">
                <div class="pwa-prompt-icon">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                </div>
                <div class="pwa-prompt-text">
                    <h4>Instalar Aplicación</h4>
                    <p>Instala la app para acceso rápido y funcionalidad offline</p>
                </div>
                <div class="pwa-prompt-actions">
                    <button id="pwa-install-btn" class="btn-install">
                        <i class="fa-solid fa-download"></i>
                        Instalar
                    </button>
                    <button id="pwa-dismiss-btn" class="btn-dismiss">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(installContainer);
    
    // Animar entrada
    setTimeout(() => {
        installContainer.classList.add('show');
    }, 500);
    
    // Event listeners
    installButton = document.getElementById('pwa-install-btn');
    const dismissBtn = document.getElementById('pwa-dismiss-btn');
    
    installButton.addEventListener('click', installPWA);
    dismissBtn.addEventListener('click', () => {
        hideInstallButton();
        // Guardar en localStorage que el usuario rechazó
        localStorage.setItem('pwa-install-dismissed', Date.now());
    });
}

/**
 * Ocultar botón de instalación
 */
function hideInstallButton() {
    const container = document.getElementById('pwa-install-container');
    if (container) {
        container.classList.remove('show');
        setTimeout(() => {
            container.remove();
        }, 300);
    }
}

/**
 * Instalar PWA
 */
async function installPWA() {
    if (!deferredPrompt) {
        console.log('⚠️ No hay prompt de instalación disponible');
        return;
    }
    
    // Mostrar prompt nativo
    deferredPrompt.prompt();
    
    // Deshabilitar botón mientras se muestra el prompt
    if (installButton) {
        installButton.disabled = true;
        installButton.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Instalando...';
    }
    
    // Esperar respuesta del usuario
    const { outcome } = await deferredPrompt.userChoice;
    
    console.log(`👤 Usuario ${outcome === 'accepted' ? 'aceptó' : 'rechazó'} la instalación`);
    
    if (outcome === 'accepted') {
        hideInstallButton();
    } else {
        // Restaurar botón
        if (installButton) {
            installButton.disabled = false;
            installButton.innerHTML = '<i class="fa-solid fa-download"></i> Instalar';
        }
    }
    
    // Limpiar el prompt
    deferredPrompt = null;
}

/**
 * Mostrar notificación de actualización
 */
function showUpdateNotification() {
    const updateBanner = document.createElement('div');
    updateBanner.id = 'pwa-update-banner';
    updateBanner.innerHTML = `
        <div class="pwa-update-content">
            <i class="fa-solid fa-sync-alt"></i>
            <span>Nueva versión disponible</span>
            <button onclick="reloadPage()" class="btn-update">Actualizar</button>
        </div>
    `;
    
    document.body.appendChild(updateBanner);
    
    setTimeout(() => {
        updateBanner.classList.add('show');
    }, 100);
}

/**
 * Recargar página para aplicar actualización
 */
function reloadPage() {
    window.location.reload();
}

/**
 * Verificar si la app está instalada
 */
function isPWAInstalled() {
    // Detectar si se está ejecutando en modo standalone
    const isStandalone = window.matchMedia('(display-mode: standalone)').matches 
                      || window.navigator.standalone 
                      || document.referrer.includes('android-app://');
    
    return isStandalone;
}

/**
 * Mostrar toast notification
 */
function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `pwa-toast pwa-toast-${type}`;
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.classList.add('show');
    }, 100);
    
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}

/**
 * Verificar si mostrar prompt de instalación
 */
function checkInstallPrompt() {
    // No mostrar si ya está instalada
    if (isPWAInstalled()) {
        console.log('✅ PWA ya está instalada');
        return;
    }
    
    // No mostrar si el usuario rechazó recientemente (últimas 24 horas)
    const dismissed = localStorage.getItem('pwa-install-dismissed');
    if (dismissed) {
        const dayInMs = 24 * 60 * 60 * 1000;
        if (Date.now() - parseInt(dismissed) < dayInMs) {
            console.log('⏰ Prompt de instalación fue rechazado recientemente');
            return;
        }
    }
}

// Verificar al cargar la página
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', checkInstallPrompt);
} else {
    checkInstallPrompt();
}

// Log de estado
console.log('📱 PWA Manager cargado');
console.log('🔍 PWA instalada:', isPWAInstalled());
