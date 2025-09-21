# Norttek Solutions - Sitio Web

Bienvenido al repositorio oficial del sitio web de **Norttek Solutions**.

Este proyecto implementa una estructura modular y escalable utilizando **PHP**, con plantillas reutilizables y carga automática de recursos según la página. Aquí encontrarás todo lo necesario para desplegar, mantener y extender el sitio institucional de Norttek.

---

## 🚀 Características principales

- **Estructura modular:** Uso de componentes PHP (`header`, `footer`, `navbar`, etc.) para facilitar el mantenimiento y la escalabilidad.
- **Carga automática de recursos:** Los archivos CSS y JS se cargan dinámicamente según la página activa.
- **Redirección y SEO:** Configuración de `.htaccess` para rutas amigables y buenas prácticas SEO.
- **Separación de recursos:** Archivos estáticos (CSS, JS, imágenes) organizados para fácil gestión.
- **Soporte para librerías modernas:** Integración con Tailwind CSS, GSAP, AOS, FontAwesome y Toastify.

---

## 📁 Estructura del repositorio

```
norttek.com.mx/
├── assets/                 
│   ├── css/                # Hojas de estilo por página
│   ├── img/                # Imágenes
│   └── js/                 # Scripts JavaScript por página
├── includes/               # Plantillas y componentes PHP reutilizables
│   ├── footer.php
│   ├── header.php
│   ├── navbar.php
│   └── pageTemplate.php
├── .gitattributes
├── .htaccess               # Reglas de reescritura y SEO
├── 404.php                 # Página de error 404
├── README.md               # Documentación del proyecto
├── about.php
├── alarma.php
├── cctv.php
├── contact.php
├── control-acceso.php
├── error.php
├── index.php
├── inicio.php
├── review.php
├── telefonia.php
└── test.php
```

---

## 🧩 Uso de plantillas e inclusión dinámica

Cada página PHP utiliza `pageTemplate.php` para estructurar el contenido y cargar automáticamente los archivos CSS y JS propios.

### Ejemplo: Crear una nueva página

1. **Crear un archivo** `mi_pagina.php` en la raíz.
2. **Asignar nombre de página:**
   ```php
   $pageName = basename(__FILE__, ".php");
   ```
3. **Definir CSS específicos:**
   ```php
   $cssFiles = ['mi_pagina']; // Sin extensión
   ```
4. **Definir JS específicos:**
   ```php
   $jsFiles = ['mi_pagina']; // Sin extensión
   ```
5. **Incluir la plantilla:**
   ```php
   include __DIR__ . '/includes/pageTemplate.php';
   ```
Esto cargará automáticamente `assets/css/mi_pagina.css` y `assets/js/mi_pagina.js` si existen.

---

## 🔀 Redirección y SEO

Para redirigir automáticamente `inicio.php` a `index.php`, agrega en `.htaccess`:

```apache
RewriteEngine On
RewriteRule ^inicio\.php$ /index.php [R=301,L]
```

- **Consejo:** Revisa y actualiza `.htaccess` para mantener reglas limpias, rutas amigables y optimización SEO.

---

## 📦 Dependencias externas

El sitio utiliza las siguientes librerías y frameworks:

- [Tailwind CSS](https://tailwindcss.com/)
- [GSAP](https://greensock.com/gsap/)
- [AOS (Animate On Scroll)](https://michalsnik.github.io/aos/)
- [FontAwesome](https://fontawesome.com/)
- [Toastify](https://apvarun.github.io/toastify-js/)

---

## 🛠️ Recomendaciones y buenas prácticas

- **Consistencia:** Mantén los nombres de archivos CSS y JS iguales al nombre de la página correspondiente.
- **Componentización:** Usa la carpeta `includes/` para secciones y componentes reutilizables.
- **Organización:** Separa los recursos por tipo y por página para facilitar la gestión.
- **SEO:** Mantén actualizadas las reglas de `.htaccess` y los metadatos de cada página.
- **Escalabilidad:** Agrega nuevas páginas siguiendo el método modular descrito arriba.

---

## 🤝 Cómo contribuir

1. **Clona el repositorio:**
   ```bash
   git clone https://github.com/cmeraz/norttek.com.mx.git
   ```
2. **Crea una rama nueva:**
   ```bash
   git checkout -b mi-nueva-funcionalidad
   ```
3. **Realiza tus cambios y haz commit:**
   ```bash
   git add .
   git commit -m "Agregar nueva funcionalidad"
   ```
4. **Haz push a tu rama:**
   ```bash
   git push origin mi-nueva-funcionalidad
   ```
5. **Abre un Pull Request en GitHub.**

---

## 🔒 Licencia

Este proyecto es **privado** y su uso está restringido al equipo de Norttek Solutions.

---
¿Tienes dudas o sugerencias? Contacta al equipo de desarrollo de Norttek Solutions.