# 📱 PWA Icons Generator - Internet Norttek

## 🎨 Iconos Necesarios

Para que la PWA funcione correctamente, necesitas generar los siguientes iconos en la carpeta `assets/img/pwa/`:

### Iconos principales (requeridos):
- `icon-72x72.png` (72x72px)
- `icon-96x96.png` (96x96px)
- `icon-128x128.png` (128x128px)
- `icon-144x144.png` (144x144px)
- `icon-152x152.png` (152x152px)
- `icon-192x192.png` (192x192px) - **IMPORTANTE**
- `icon-384x384.png` (384x384px)
- `icon-512x512.png` (512x512px) - **IMPORTANTE**

### Screenshots (opcional pero recomendado):
- `screenshot-wide.png` (1280x720px) - Desktop
- `screenshot-mobile.png` (750x1334px) - Mobile

### Shortcuts icons (opcional):
- `shortcut-speedtest.png` (96x96px)
- `shortcut-planes.png` (96x96px)
- `shortcut-contact.png` (96x96px)

### Splash screens iOS (opcional):
- `splash-640x1136.png` (iPhone 5)
- `splash-750x1334.png` (iPhone 6/7/8)
- `splash-1242x2208.png` (iPhone 6/7/8 Plus)
- `splash-1125x2436.png` (iPhone X)

### Microsoft:
- `tile-wide.png` (310x150px)

---

## 🛠️ Cómo Generar los Iconos

### Opción 1: Herramienta Online (Recomendada)

1. **PWA Asset Generator**
   - Ve a: https://www.pwabuilder.com/imageGenerator
   - Sube el logo de Norttek (preferiblemente 512x512px con fondo transparente)
   - Descarga todos los iconos generados
   - Colócalos en `assets/img/pwa/`

2. **Favicon Generator**
   - Ve a: https://realfavicongenerator.net/
   - Sube el logo
   - Marca la opción "Generate icons for mobile and tablets"
   - Descarga y extrae los iconos

### Opción 2: Manual con Photoshop/GIMP

1. Abre el logo de Norttek en Photoshop/GIMP
2. Para cada tamaño:
   - Image → Image Size
   - Establece el ancho y alto (ej: 512x512)
   - Exporta como PNG
   - Guarda con el nombre correspondiente

### Opción 3: Script Automático (ImageMagick)

Si tienes ImageMagick instalado:

```bash
# Navega a la carpeta del proyecto
cd assets/img/pwa/

# Coloca tu logo original como source.png (512x512 o mayor)
# Luego ejecuta:

convert source.png -resize 72x72 icon-72x72.png
convert source.png -resize 96x96 icon-96x96.png
convert source.png -resize 128x128 icon-128x128.png
convert source.png -resize 144x144 icon-144x144.png
convert source.png -resize 152x152 icon-152x152.png
convert source.png -resize 192x192 icon-192x192.png
convert source.png -resize 384x384 icon-384x384.png
convert source.png -resize 512x512 icon-512x512.png
```

---

## ✅ Verificación

Después de generar los iconos, verifica que todos existan:

```bash
# Windows PowerShell
Get-ChildItem -Path assets\img\pwa\ -Filter *.png

# Linux/Mac
ls -lh assets/img/pwa/
```

Deberías ver al menos 8 archivos PNG.

---

## 🧪 Probar la PWA

1. **Sube los archivos al servidor**
   - Asegúrate de que `manifest.json`, `sw.js` y los iconos estén accesibles

2. **Abre Chrome DevTools**
   - F12 → Application → Manifest
   - Verifica que no haya errores

3. **Prueba en móvil**
   - Abre `https://norttek.com.mx/internet.php` en Chrome/Safari móvil
   - Debería aparecer el prompt "Agregar a pantalla de inicio"

4. **Lighthouse Audit**
   - F12 → Lighthouse → Generate report
   - Verifica la puntuación PWA (debería ser 100/100)

---

## 📋 Checklist de Instalación

- [ ] Crear carpeta `assets/img/pwa/`
- [ ] Generar iconos (mínimo 192x192 y 512x512)
- [ ] Subir `manifest.json` al root
- [ ] Subir `sw.js` al root
- [ ] Subir `browserconfig.xml` al root
- [ ] Verificar que `internet.php` incluye los meta tags PWA
- [ ] Probar en Chrome DevTools → Application
- [ ] Probar instalación en dispositivo móvil
- [ ] Ejecutar Lighthouse audit

---

## 🎨 Diseño Recomendado para el Logo

Para mejores resultados en diferentes plataformas:

- **Formato:** PNG con transparencia
- **Tamaño base:** 512x512px o mayor
- **Área segura:** Deja un padding del 10% en todos los lados
- **Colores:** Usa los colores de marca de Norttek (#4f8cff, #3b82f6)
- **Fondo:** Transparente o sólido (evita gradientes complejos en iconos pequeños)

---

## 📚 Recursos Adicionales

- [PWA Builder](https://www.pwabuilder.com/)
- [Web.dev - PWA Checklist](https://web.dev/pwa-checklist/)
- [MDN - Progressive Web Apps](https://developer.mozilla.org/en-US/docs/Web/Progressive_web_apps)
- [Google Workbox](https://developers.google.com/web/tools/workbox)

---

¿Necesitas ayuda? Contacta al equipo de desarrollo de Norttek Solutions.
