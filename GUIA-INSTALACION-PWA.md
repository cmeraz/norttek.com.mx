# 🔍 Por qué no aparece el botón de instalación PWA

## Razones Comunes

### 1️⃣ **PWA ya está instalada**
Si ya instalaste la app anteriormente, el evento `beforeinstallprompt` no se disparará.

**Solución:**
- Desinstala la PWA desde Chrome → Configuración → Aplicaciones instaladas
- O usa modo Incógnito para probar

---

### 2️⃣ **Rechazaste el prompt en las últimas 24 horas**
El código tiene una protección que no muestra el prompt si lo rechazaste recientemente.

**Solución:**
```javascript
// En la consola del navegador:
localStorage.removeItem('pwa-install-dismissed');
location.reload();
```

---

### 3️⃣ **Criterios de instalación no cumplidos**
Chrome requiere que se cumplan TODOS estos criterios:

✅ Servido sobre HTTPS (o localhost)  
✅ Manifest.json válido  
✅ Iconos 192x192 y 512x512  
✅ Service Worker registrado  
✅ Service Worker debe manejar evento `fetch`  
✅ El usuario debe interactuar con el sitio  

**Verificación:**
1. Abre DevTools (F12)
2. Application → Manifest (verificar sin errores)
3. Application → Service Workers (verificar activo)

---

### 4️⃣ **Navegador no soporta PWA**
El evento `beforeinstallprompt` solo funciona en:
- ✅ Chrome/Edge (Desktop y Android)
- ❌ Firefox (no soporta `beforeinstallprompt`)
- ❌ Safari iOS (usa su propio método)

**En iOS:**
- Safari → Compartir → "Agregar a pantalla de inicio"
- No hay prompt programático

---

### 5️⃣ **Ya se disparó el evento pero el botón no se creó**
Posible error en el código de creación del botón.

**Debug:**
```javascript
// En la consola:
window.addEventListener('beforeinstallprompt', (e) => {
    console.log('🎉 Evento capturado!', e);
    e.preventDefault();
    e.prompt(); // Mostrar directamente
});
```

---

## 🛠️ Pasos de Diagnóstico

### Paso 1: Abrir página de diagnóstico
```
http://localhost/norttek.com.mx/debug-pwa-install.html
```

Esto te mostrará:
- ✅ Estado del Service Worker
- ✅ Estado del Manifest
- ✅ Iconos presentes
- ✅ LocalStorage bloqueante
- ✅ Si PWA ya está instalada

---

### Paso 2: Limpiar estado
```javascript
// En la consola de internet.php:

// 1. Limpiar rechazo previo
localStorage.removeItem('pwa-install-dismissed');

// 2. Verificar si ya está instalada
console.log('Instalada:', window.matchMedia('(display-mode: standalone)').matches);

// 3. Verificar Service Worker
navigator.serviceWorker.getRegistrations().then(console.log);
```

---

### Paso 3: Forzar actualización
```bash
# En DevTools:
# Application → Service Workers → "Update"
# Application → Storage → "Clear site data"
# Ctrl + Shift + R (hard reload)
```

---

### Paso 4: Verificar manualmente el prompt
```javascript
// Agregar listener temporal en la consola:
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
    console.log('✅ beforeinstallprompt disparado!');
    e.preventDefault();
    deferredPrompt = e;
    console.log('Ejecuta: deferredPrompt.prompt()');
});

// Si se capturó, ejecutar:
deferredPrompt.prompt();
```

---

## 🎯 Solución Rápida

**Si ya rechazaste el prompt:**
```javascript
localStorage.removeItem('pwa-install-dismissed');
location.reload();
```

**Si PWA ya está instalada:**
1. Chrome → `chrome://apps/`
2. Clic derecho en "Internet Norttek" → Desinstalar
3. Recargar `internet.php`

**Si nada funciona:**
```javascript
// Modo incógnito + consola:
localStorage.clear();
navigator.serviceWorker.getRegistrations()
    .then(regs => regs.forEach(reg => reg.unregister()))
    .then(() => location.reload());
```

---

## 📱 Instalación Manual

### En Chrome Desktop:
1. Abre `internet.php`
2. Busca el ícono ⊕ en la barra de dirección
3. Clic → "Instalar Internet Norttek"

### En Chrome Android:
1. Abre `internet.php`
2. Menú (⋮) → "Agregar a pantalla de inicio"
3. Confirmar

### En Safari iOS:
1. Abre `internet.php`
2. Botón Compartir
3. "Agregar a pantalla de inicio"
4. Confirmar

---

## 🔧 Comandos Útiles para Debug

```javascript
// Ver si el evento beforeinstallprompt es soportado
console.log('Soportado:', 'onbeforeinstallprompt' in window);

// Ver modo de visualización actual
console.log('Display mode:', 
    window.matchMedia('(display-mode: standalone)').matches ? 'Standalone' : 'Browser'
);

// Ver Service Workers registrados
navigator.serviceWorker.getRegistrations()
    .then(regs => console.log('SWs:', regs.length, regs));

// Ver cache del Service Worker
caches.keys().then(console.log);

// Limpiar TODO
async function resetPWA() {
    localStorage.clear();
    const regs = await navigator.serviceWorker.getRegistrations();
    await Promise.all(regs.map(reg => reg.unregister()));
    const cacheNames = await caches.keys();
    await Promise.all(cacheNames.map(name => caches.delete(name)));
    console.log('✅ PWA reseteada completamente');
    location.reload();
}
```

---

## ✅ Checklist Final

Antes de que aparezca el botón:

- [ ] Service Worker registrado y activo
- [ ] Manifest.json cargado sin errores
- [ ] Iconos 192x192 y 512x512 presentes
- [ ] PWA NO instalada previamente
- [ ] NO rechazado en las últimas 24h
- [ ] Navegador compatible (Chrome/Edge)
- [ ] HTTPS o localhost
- [ ] Usuario ha interactuado con la página

Si TODO está ✅ y aún no aparece:
- Prueba en modo incógnito
- Prueba en otro navegador
- Verifica la consola por errores

---

## 📞 Soporte

Si nada funciona:
1. Abre `debug-pwa-install.html`
2. Toma screenshot del diagnóstico
3. Revisa errores en consola (F12)

**Nota:** En Firefox, el prompt automático NO existe. Solo instalación manual desde la barra de dirección.
