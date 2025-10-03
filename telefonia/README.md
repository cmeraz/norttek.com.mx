# Carpeta /telefonia - Documentación

Esta carpeta contiene todos los archivos relacionados con la sección de Telefonía IP del sitio web Norttek Solutions.

## Estructura

```
/telefonia/
├── index.php                    # Página principal de Telefonía IP
├── assets/
│   ├── css/
│   │   └── telefonia.css       # Estilos específicos de telefonía
│   └── js/
│       └── telefonia.js        # JavaScript específico de telefonía
├── contents/
│   └── telefoniaContent.php    # Contenido HTML de la página principal
├── templates/
│   ├── telefonia-demo.php      # Template de demo
│   ├── telefonia-faq.php       # Template de FAQ
│   ├── telefonia-funciones.php # Template de funcionalidades
│   └── telefonia-planes.php    # Template de planes
└── includes/
    └── json/
        └── faqs/
            └── faq-telefonia.json  # Datos de preguntas frecuentes
```

## Cómo agregar nuevas páginas relacionadas

Para agregar nuevas páginas relacionadas con telefonía (por ejemplo, páginas de productos específicos, casos de uso, etc.):

### 1. Crear el archivo PHP principal

Crea un nuevo archivo en `/telefonia/`, por ejemplo `productos.php`:

```php
<?php
$pageName = 'telefonia-productos';
$seo = [
  'title' => 'Productos de Telefonía IP | Norttek Solutions',
  'description' => 'Descripción de la página',
  // ... más metadatos SEO
];

// Cargar funciones
include __DIR__ . '/../includes/functions.php';

// Cargar header y navbar
includeSection('header', ['seo' => $seo, 'pageName' => $pageName, 'cssFiles' => []]);
?>
<!-- CSS específico si es necesario -->
<link rel="stylesheet" href="/telefonia/assets/css/productos.css">
<?php
includeSection('navbar');

// Contenido
echo '<main id="main-content" class="nt-main-shell">' . PHP_EOL;
$contentFile = __DIR__ . '/contents/productosContent.php';
if(file_exists($contentFile)){
    include $contentFile;
}
echo "</main>";

// Footer
includeSection('footer');
?>
<!-- JS específico si es necesario -->
<script src="/telefonia/assets/js/productos.js" defer></script>
```

### 2. Crear el archivo de contenido

Crea el archivo de contenido en `/telefonia/contents/productosContent.php` con el HTML del contenido.

### 3. Agregar CSS y JS (opcional)

Si necesitas estilos o scripts específicos:
- CSS: `/telefonia/assets/css/productos.css`
- JS: `/telefonia/assets/js/productos.js`

### 4. Actualizar el navbar (si es necesario)

Si quieres que aparezca en el menú, actualiza `/includes/navbar.php`.

## Notas importantes

### Rutas de assets
- **Imágenes globales**: Usar `../assets/img/` (desde archivos en `/telefonia/contents/`)
- **CSS/JS de telefonía**: Usar `/telefonia/assets/css/` o `/telefonia/assets/js/` (rutas absolutas)

### Convenciones
- Nombres de archivo: `kebab-case` (ejemplo: `mi-pagina.php`)
- Archivos de contenido: `{nombre}Content.php` en `/telefonia/contents/`
- CSS específico: Mismo nombre que la página en `/telefonia/assets/css/`
- JS específico: Mismo nombre que la página en `/telefonia/assets/js/`

## Redirección

El archivo `.htaccess` en la raíz del proyecto contiene una regla para redirigir de `/telefonia.php` a `/telefonia/`:

```apache
RewriteRule ^telefonia\.php$ /telefonia/ [R=301,L]
```

## Mantenimiento

Esta estructura permite:
- ✅ Mantener todo relacionado con telefonía en un solo lugar
- ✅ Facilitar el mantenimiento y actualizaciones
- ✅ Escalar fácilmente agregando nuevas páginas
- ✅ Evitar conflictos con otras secciones del sitio
