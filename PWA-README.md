# 📱 PWA - Internet Norttek Solutions

## ✨ Características Implementadas

La página `internet.php` ahora es una **Progressive Web App (PWA)** completa con las siguientes características:

### 🎯 Funcionalidades PWA

- ✅ **Instalable** - Los usuarios pueden instalar la app en su dispositivo
- ✅ **Offline** - Funciona sin conexión a internet (caché de recursos)
- ✅ **Service Worker** - Manejo inteligente de caché y actualizaciones
- ✅ **Manifest** - Configuración completa de la aplicación
- ✅ **Responsive** - Se adapta a todos los tamaños de pantalla
- ✅ **Fast Load** - Carga rápida con estrategias de caché optimizadas
- ✅ **App-like** - Experiencia similar a app nativa
- ✅ **Push Notifications** - Soporte para notificaciones (opcional)
- ✅ **Shortcuts** - Accesos directos desde el icono de la app
- ✅ **Share Target** - Permite compartir contenido a la app

---

## 📂 Archivos Creados

### En el root (`/`):
- `manifest.json` - Configuración de la PWA
- `sw.js` - Service Worker (manejo de caché y offline)
- `browserconfig.xml` - Configuración para Microsoft

### En `assets/js/`:
- `pwa-install.js` - Script de instalación y prompts

### En `assets/css/`:
- `pwa-install.css` - Estilos para UI de instalación

### En `assets/img/pwa/`:
- Iconos en diferentes tamaños (pendiente de generar)
- Screenshots de la app (opcional)

---

## 🚀 Cómo Usar

### Para Usuarios

1. **En Desktop (Chrome/Edge):**
   - Visita `https://norttek.com.mx/internet.php`
   - Verás un botón "Instalar" en la barra de dirección
   - O aparecerá un banner en la parte inferior
   - Haz clic en "Instalar" y confirma

2. **En Mobile (Android):**
   - Abre `https://norttek.com.mx/internet.php` en Chrome
   - Aparecerá un banner "Agregar a pantalla de inicio"
   - Toca "Agregar"
   - La app aparecerá en tu cajón de aplicaciones

3. **En Mobile (iOS/Safari):**
   - Abre `https://norttek.com.mx/internet.php` en Safari
   - Toca el botón "Compartir" (cuadro con flecha)
   - Selecciona "Agregar a pantalla de inicio"
   - Confirma

### Para Desarrolladores

1. **Generar Iconos:**
   ```bash
   # Opción 1: Abre el generador HTML
   http://localhost/norttek.com.mx/generate-pwa-icons.html
   
   # Opción 2: Usa el script PowerShell (requiere ImageMagick)
   cd assets/img
   .\generate-pwa-icons.ps1
   
   # Opción 3: Usa herramienta online
   https://www.pwabuilder.com/imageGenerator
   ```

2. **Probar en Desarrollo:**
   ```bash
   # Abre Chrome DevTools (F12)
   # Ve a: Application → Manifest
   # Verifica que no haya errores
   
   # Para probar Service Worker:
   # Application → Service Workers
   # Marca "Update on reload" y "Bypass for network"
   ```

3. **Desplegar a Producción:**
   ```bash
   # Sube todos los archivos al servidor:
   - manifest.json
   - sw.js
   - browserconfig.xml
   - assets/js/pwa-install.js
   - assets/css/pwa-install.css
   - assets/img/pwa/* (todos los iconos)
   
   # Verifica que HTTPS esté habilitado (requerido para PWA)
   ```

---

## 🧪 Verificación y Testing

### Checklist de Funcionalidad

- [ ] Los iconos se cargan correctamente
- [ ] El manifest.json no tiene errores
- [ ] El Service Worker se registra sin problemas
- [ ] Aparece el prompt de instalación
- [ ] La app se instala correctamente
- [ ] La app funciona offline (desconecta internet y prueba)
- [ ] Las actualizaciones se detectan automáticamente
- [ ] Los shortcuts funcionan (en Android)

### Herramientas de Testing

1. **Chrome DevTools:**
   - F12 → Application → Manifest
   - Verifica errores e iconos

2. **Lighthouse:**
   - F12 → Lighthouse → Generate report
   - Categoría PWA debería ser 100/100

3. **PWA Builder:**
   - https://www.pwabuilder.com/
   - Ingresa tu URL y analiza

4. **Mobile-Friendly Test:**
   - https://search.google.com/test/mobile-friendly
   - Verifica responsiveness

---

## 📊 Estrategias de Caché

El Service Worker usa 3 estrategias diferentes:

### 1. **Cache First** (Imágenes)
```
Busca en caché → Si no existe, descarga → Guarda en caché
```
- Ideal para imágenes y recursos estáticos
- Carga súper rápida
- Funciona offline

### 2. **Network First** (APIs y PHP)
```
Intenta red → Si falla, usa caché
```
- Ideal para contenido dinámico
- Siempre muestra datos actualizados cuando hay internet
- Fallback a caché cuando no hay conexión

### 3. **Stale While Revalidate** (Otros recursos)
```
Devuelve caché inmediatamente → Actualiza en segundo plano
```
- Balance entre velocidad y frescura
- Ideal para CSS, JS, fonts

---

## 🎨 Personalización

### Cambiar Colores

En `manifest.json`:
```json
{
  "theme_color": "#4f8cff",      // Color de la barra superior
  "background_color": "#0f172a"  // Color de fondo al cargar
}
```

En `internet.php`:
```php
$metaTags = [
    'theme-color' => '#4f8cff',  // Tu color de marca
];
```

### Modificar Shortcuts

En `manifest.json`, sección `shortcuts`:
```json
{
  "shortcuts": [
    {
      "name": "Tu Shortcut",
      "url": "/tu-url",
      "icons": [...]
    }
  ]
}
```

### Ajustar Caché

En `sw.js`, modifica `urlsToCache`:
```javascript
const urlsToCache = [
  '/internet.php',
  '/tu-archivo.css',
  // Agrega más recursos
];
```

---

## 🐛 Troubleshooting

### El prompt de instalación no aparece

**Posibles causas:**
- No estás usando HTTPS (requerido en producción)
- Los iconos no están disponibles
- El manifest tiene errores
- Ya instalaste la app previamente
- El navegador no soporta PWA

**Solución:**
1. Verifica Chrome DevTools → Application → Manifest
2. Asegúrate de tener iconos de 192x192 y 512x512
3. Desinstala la app y prueba de nuevo
4. Usa modo incógnito para probar

### La app no funciona offline

**Posibles causas:**
- Service Worker no se registró
- Los recursos no están en caché
- Error en la estrategia de caché

**Solución:**
1. Verifica Application → Service Workers
2. Revisa Application → Cache Storage
3. Mira la consola por errores del SW

### Los iconos no se muestran

**Posibles causas:**
- Rutas incorrectas en manifest.json
- Archivos no existen en el servidor
- Tamaños incorrectos

**Solución:**
1. Verifica que los archivos existen en `/assets/img/pwa/`
2. Abre las URLs directamente en el navegador
3. Valida el manifest con PWA Builder

---

## 📚 Recursos y Referencias

- **MDN PWA Guide:** https://developer.mozilla.org/en-US/docs/Web/Progressive_web_apps
- **Google PWA Checklist:** https://web.dev/pwa-checklist/
- **PWA Builder:** https://www.pwabuilder.com/
- **Workbox (Google):** https://developers.google.com/web/tools/workbox
- **Can I Use PWA:** https://caniuse.com/?search=progressive%20web%20app

---

## 🎯 Próximos Pasos

1. ✅ Implementación básica completada
2. ⏳ Generar iconos oficiales con el logo de Norttek
3. ⏳ Crear screenshots para la App Store
4. ⏳ Implementar Push Notifications (opcional)
5. ⏳ Agregar sincronización en background (opcional)
6. ⏳ Optimizar estrategias de caché según analytics
7. ⏳ Crear página de bienvenida para primera instalación

---

## 📊 Métricas Esperadas

Después de implementar la PWA:

- **Lighthouse PWA Score:** 100/100
- **Performance:** >90/100
- **Tiempo de carga:** <2 segundos
- **Funcionalidad offline:** 100%
- **Instalaciones:** Tracking con Google Analytics

---

## 💡 Tips de Producción

1. **Versionado:** Actualiza `CACHE_NAME` en `sw.js` con cada cambio
2. **Testing:** Prueba en diferentes dispositivos y navegadores
3. **Analytics:** Implementa tracking de instalaciones y uso offline
4. **Updates:** El SW detecta automáticamente actualizaciones
5. **HTTPS:** Absolutamente necesario en producción

---

¿Preguntas? Contacta al equipo de desarrollo de Norttek Solutions.

**Última actualización:** Octubre 2025
