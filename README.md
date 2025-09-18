# Norttek Solutions - Sitio Web

## Descripción

Este repositorio contiene la versión base del sitio web de **Norttek Solutions**, incluyendo una estructura modular con plantillas, recursos estáticos (CSS, JS, imágenes) y configuración de redirección mediante `.htaccess`.

El sitio está construido en **PHP** con inclusión de plantillas y carga automática de archivos CSS y JS según la página actual.

---

## Estructura del repositorio

```
norttek.com.mx/
├── assets/                 # Archivos estáticos
│   ├── css/                # Hojas de estilo
│   ├── img/                # Imágenes
│   └── js/                 # Scripts JavaScript
├── includes/               # Plantillas y componentes PHP
│   ├── footer.php
│   ├── header.php
│   ├── navbar.php
│   └── pageTemplate.php
├── .gitattributes          # Configuración de atributos de Git
├── .htaccess               # Reglas de reescritura y redirección
├── 404.php                 # Página de error 404
├── README.md               # Documentación del proyecto
├── about.php               # Página "Acerca de"
├── alarma.php              # Página de alarma
├── cctv.php                # Página de CCTV
├── contact.php             # Página de contacto
├── control-acceso.php      # Página de control de acceso
├── error.php               # Página de error genérica
├── index.php               # Página de inicio
├── inicio.php              # Página de inicio (redirige a index.php)
├── review.php              # Página de reseñas
├── telefonia.php           # Página de telefonía
└── test.php                # Página de pruebas
```

---

## Uso de plantillas e inclusión (`pageTemplate.php`)

Cada página incluye `pageTemplate.php` para estructurar el contenido y cargar automáticamente los archivos CSS y JS correspondientes.

### Pasos para crear una nueva página:

1. Crear archivo `mi_pagina.php` en la raíz.
2. Definir el nombre de la página:

```php
$pageName = basename(__FILE__, ".php");
```

3. Definir CSS específicos:

```php
$cssFiles = ['mi_pagina']; // Sin extensión
```

4. Definir JS específicos:

```php
$jsFiles = ['mi_pagina']; // Sin extensión
```

5. Incluir la plantilla:

```php
include __DIR__ . '/includes/pageTemplate.php';
```

Esto cargará automáticamente `assets/css/mi_pagina.css` y `assets/js/mi_pagina.js` si existen.

---

## Redirección de `inicio.php` a `index.php`

Para redirigir automáticamente mediante `.htaccess`:

```apache
RewriteEngine On
RewriteRule ^inicio\.php$ /index.php [R=301,L]
```

---

## Organización de carpetas y modularidad

* `includes/`: Componentes reutilizables (`header`, `footer`, `navbar`, `pageTemplate`).
* `assets/css/`: Hojas de estilo separadas por página.
* `assets/js/`: Scripts separados por página y librerías.
* `assets/img/`: Imágenes del sitio.

---

## Recomendaciones

* Mantener consistencia en los nombres de archivos CSS y JS para que se carguen automáticamente.
* Usar `includes/` para separar secciones y componentes, facilitando mantenimiento y escalabilidad.
* Revisar `.htaccess` para reglas de redirección y optimización SEO.

---

## Dependencias externas

* Tailwind CSS
* GSAP
* AOS (Animate On Scroll)
* FontAwesome
* Toastify

---

## Cómo contribuir

1. Clona el repositorio:

```bash
git clone https://github.com/cmeraz/norttek.com.mx.git
```

2. Crear nueva rama:

```bash
git checkout -b mi-nueva-funcionalidad
```

3. Hacer cambios y commit:

```bash
git add .
git commit -m "Agregar nueva funcionalidad"
```

4. Hacer push a la rama:

```bash
git push origin mi-nueva-funcionalidad
```

5. Crear Pull Request en GitHub.

---

## Licencia

Este proyecto es **privado** y para uso interno de Norttek Solutions.
