# 🏢 Norttek Solutions - Sitio Web Corporativo

**Sitio web oficial de Norttek Solutions** - Empresa especializada en soluciones de seguridad integral, telecomunicaciones y tecnología para empresas y hogares.

[![Estado del Proyecto](https://img.shields.io/badge/Estado-Activo-brightgreen.svg)](https://github.com/cmeraz/norttek.com.mx)
[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-blue.svg)](https://php.net)
[![Licencia](https://img.shields.io/badge/Licencia-Privado-red.svg)](LICENSE)

---

## 📋 Tabla de Contenido

1. [🎯 Sobre el Proyecto](#-sobre-el-proyecto)
2. [🏗️ Arquitectura](#️-arquitectura)
3. [🚀 Instalación Rápida](#-instalación-rápida)
4. [📁 Estructura Detallada](#-estructura-detallada)
5. [🔧 Desarrollo](#-desarrollo)
6. [📚 Guías de Uso](#-guías-de-uso)
7. [🛡️ Seguridad](#️-seguridad)
8. [🤝 Contribuir](#-contribuir)
9. [📞 Soporte](#-soporte)

---

## 🎯 Sobre el Proyecto

**Norttek Solutions** es una plataforma web moderna que presenta los servicios de:

### Servicios Principales
- 🔒 **Sistemas CCTV** - Videovigilancia profesional
- 🚨 **Alarmas de Seguridad** - Protección 24/7
- 🏢 **Control de Acceso** - Gestión inteligente de entradas
- 📞 **Telefonía IP** - Comunicaciones empresariales
- 🌐 **Internet** - Conectividad de alta velocidad
- 🖨️ **Cartuchos de Impresora** - Suministros originales

### Características Técnicas
- **Framework:** PHP 8.0+ modular
- **Frontend:** Tailwind CSS + JavaScript vanilla
- **Arquitectura:** MVC simplificado con componentes reutilizables
- **SEO:** Optimizado para motores de búsqueda
- **Responsive:** Diseño adaptativo móvil-first
- **Performance:** Carga optimizada de recursos

---

## 🏗️ Arquitectura

### Patrón de Diseño: Template System Modular

```mermaid
graph TD
    A[Página Principal] --> B[pageTemplate.php]
    B --> C[header.php]
    B --> D[navbar.php]
    B --> E[{pageName}Content.php]
    B --> F[footer.php]
    
    E --> G[Contenido Específico]
    E --> H[JSON Data Files]
    E --> I[Componentes Reutilizables]
    
    subgraph "Auto-Loading"
        J[CSS por página]
        K[JS por página]
    end
```

### Principios Arquitectónicos

1. **Separación de Responsabilidades**
   - Contenido en `/contents/`
   - Componentes en `/includes/`
   - Templates reutilizables en `/templates/`

2. **Auto-Loading Inteligente**
   - CSS y JS se cargan automáticamente por nombre de página
   - Recursos compartidos en archivos base

3. **Data-Driven Content**
   - Datos de productos en JSON (`/includes/json/`)
   - Contenido dinámico separado de la presentación

---

## 🚀 Instalación Rápida

### Requisitos del Sistema
- **Servidor Web:** Apache 2.4+ / Nginx 1.18+
- **PHP:** 8.0 o superior
- **Módulos PHP:** `json`, `mbstring`, `fileinfo`
- **Base de Datos:** No requerida (sitio estático con datos JSON)

### Instalación Local (Laragon/XAMPP)

```bash
# 1. Clonar el repositorio
git clone https://github.com/cmeraz/norttek.com.mx.git

# 2. Navegar al directorio
cd norttek.com.mx

# 3. Configurar servidor local
# - Copiar a htdocs/www según tu stack
# - Configurar virtual host (opcional)

# 4. Verificar permisos (Linux/Mac)
chmod -R 755 assets/
chmod -R 644 includes/json/
```

### Configuración de Producción

```apache
# .htaccess (incluido en el proyecto)
RewriteEngine On
RewriteRule ^inicio\.php$ /index.php [R=301,L]

# Headers de seguridad
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options DENY
Header always set X-XSS-Protection "1; mode=block"
```

---

## 📁 Estructura Detallada

```
📁 norttek.com.mx/
├── 📁 .github/                    # GitHub workflows y templates
│   ├── copilot-instructions.md    # Instrucciones para AI/Copilot
│   └── workflows/                 # CI/CD automático
│
├── 📁 assets/                     # Recursos estáticos
│   ├── 📁 css/                    # Hojas de estilo
│   │   ├── style.css              # Estilos base globales
│   │   ├── loader.css             # Animaciones de carga
│   │   ├── index.css              # Estilos específicos del home
│   │   ├── internet.css           # Estilos del servicio de internet
│   │   └── [pagina].css           # Auto-cargados por página
│   │
│   ├── 📁 js/                     # Scripts JavaScript
│   │   ├── scripts.js             # Funciones globales
│   │   ├── loader.js              # Control de preloader
│   │   ├── home.js                # Interacciones del home
│   │   ├── telefonia.js           # Funcionalidad telefonía
│   │   └── [pagina].js            # Auto-cargados por página
│   │
│   └── 📁 img/                    # Imágenes y recursos gráficos
│       ├── logo-norttek.png       # Logo corporativo
│       ├── favicon.ico            # Favicon del sitio
│       └── [recursos diversos]    # Imágenes de servicios
│
├── 📁 includes/                   # Componentes PHP core
│   ├── header.php                 # <head> y metadatos SEO
│   ├── navbar.php                 # Navegación principal
│   ├── footer.php                 # Pie de página
│   ├── pageTemplate.php           # Template base modular
│   ├── functions.php              # Utilidades y helpers PHP
│   ├── contact-form-handler.php   # Procesador de formularios
│   │
│   └── 📁 json/                   # Base de datos JSON
│       ├── cartuchos.json         # Catálogo de cartuchos
│       ├── hp-color.json          # Cartuchos HP color
│       ├── brother.json           # Cartuchos Brother
│       ├── samsung1.json          # Cartuchos Samsung serie 1
│       └── [otros-productos].json # Más datos de productos
│
├── 📁 contents/                   # Contenido principal de páginas
│   ├── indexContent.php           # Home / página principal
│   ├── cctvContent.php            # Sistemas de videovigilancia
│   ├── telefoniaContent.php       # Telefonía IP
│   ├── internetContent.php        # Servicio de internet
│   ├── cartuchosContent.php       # Catálogo de cartuchos
│   ├── contactContent.php         # Formulario de contacto
│   └── [pagina]Content.php        # Contenido específico por página
│
├── 📁 templates/                  # Plantillas reutilizables
│   ├── servicios.php              # Template base de servicios
│   ├── telefonia-planes.php       # Planes de telefonía
│   ├── telefonia-funciones.php    # Características técnicas
│   └── telefonia-faq.php          # Preguntas frecuentes
│
├── 📁 herramientas/               # Utilidades de desarrollo
├── 📁 extra/                      # Recursos adicionales
├── 📁 json/                       # Datos JSON adicionales
│
├── 📄 index.php                   # Página principal (Home)
├── 📄 cctv.php                    # Sistemas CCTV
├── 📄 telefonia.php               # Telefonía IP
├── 📄 internet.php                # Servicio de Internet
├── 📄 cartuchos.php               # Catálogo de cartuchos
├── 📄 contact.php                 # Contacto
├── 📄 about.php                   # Acerca de nosotros
├── 📄 alarma.php                  # Sistemas de alarma
├── 📄 control-acceso.php          # Control de acceso
├── 📄 soporte.php                 # Soporte técnico
├── 📄 networks.php                # Redes y conectividad
├── 📄 search.php                  # Búsqueda en el sitio
├── 📄 ayuda-servicio.php          # Centro de ayuda
│
├── 📄 404.php                     # Página de error 404
├── 📄 error.php                   # Manejador de errores
├── 📄 test.php                    # Página de pruebas
├── 📄 template.php                # Template de ejemplo
│
├── 📄 .htaccess                   # Configuración Apache
├── 📄 .gitignore                  # Archivos ignorados por Git
├── 📄 README.md                   # Esta documentación
└── 📄 README_STYLE.md             # Guía de estilos y UI
```

---

## 🔧 Desarrollo

### Crear una Nueva Página

#### 1️⃣ Crear archivo principal
```php
<?php
// mi-servicio.php
$pageName = basename(__FILE__, ".php");

// SEO específico (opcional)
$seo = [
    'title' => 'Mi Servicio - Norttek Solutions',
    'description' => 'Descripción del servicio...',
    'keywords' => 'servicio, norttek, seguridad'
];

// CSS específicos (opcional)
$cssFiles = ['mi-servicio', 'componente-extra'];

// JS específicos (opcional)  
$jsFiles = ['mi-servicio'];

include __DIR__ . '/includes/pageTemplate.php';
?>
```

#### 2️⃣ Crear contenido
```php
<?php
// contents/mi-servicioContent.php
echo nt_heading('Mi Nuevo Servicio', 'fa-solid fa-shield', 'xl');
?>

<section class="premium-box">
    <div class="container mx-auto px-4">
        <!-- Contenido de la página -->
    </div>
</section>
```

#### 3️⃣ Agregar estilos (opcional)
```css
/* assets/css/mi-servicio.css */
.mi-servicio-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 4rem 0;
}
```

#### 4️⃣ Agregar JavaScript (opcional)
```javascript
// assets/js/mi-servicio.js
document.addEventListener('DOMContentLoaded', function() {
    console.log('Mi servicio cargado');
});
```

### Sistema de Navegación

La navegación se define en `includes/navbar.php`:

```php
$menuItems = [
    ['label' => 'Inicio', 'url' => 'index.php', 'icon' => 'fa-home'],
    [
        'label' => 'Servicios',
        'icon' => 'fa-cogs',
        'submenu' => [
            ['label' => 'CCTV', 'url' => 'cctv.php', 'icon' => 'fa-video'],
            ['label' => 'Alarmas', 'url' => 'alarma.php', 'icon' => 'fa-shield']
        ]
    ]
];
```

### Funciones Auxiliares

```php
// Incluir template
includeTemplate('mi-template');

// Generar heading estandarizado
echo nt_heading('Título', 'fa-icon', 'size', 'Subtítulo');

// Incluir sección con variables
includeSection('header', ['seo' => $seo, 'pageName' => $pageName]);
```

---

## 📚 Guías de Uso

### 🎨 Sistema de Diseño

El sitio utiliza un **design system** basado en:

#### Componentes Base
- `.premium-box` - Contenedores con sombra y borde
- `.section-title` - Títulos de sección estandarizados  
- `.btn-modern` - Botones con estilo corporativo
- `.input-wrapper` - Campos de formulario con iconos

#### Colores Corporativos
```css
:root {
    --primary: #1e40af;      /* Azul corporativo */
    --secondary: #7c3aed;    /* Morado */
    --accent: #059669;       /* Verde */
    --warning: #d97706;      /* Naranja */
    --danger: #dc2626;       /* Rojo */
    --dark: #1f2937;         /* Gris oscuro */
}
```

#### Tipografía
- **Headers:** Inter, system-ui, sans-serif
- **Body:** system-ui, -apple-system, sans-serif
- **Monospace:** 'Fira Code', Consolas, monospace

### 📊 Gestión de Datos

#### Productos (JSON)
Los datos de productos se almacenan en `includes/json/`:

```json
{
  "hp-color": [
    {
      "modelo": "HP 664 Color",
      "codigo": "F6V28AL",
      "compatibilidad": ["DeskJet 1115", "DeskJet 2135"],
      "precio": "$320",
      "disponible": true
    }
  ]
}
```

#### Uso en PHP
```php
<?php
$cartuchos = json_decode(file_get_contents(__DIR__ . '/../includes/json/hp-color.json'), true);

foreach($cartuchos['hp-color'] as $cartucho): ?>
    <div class="producto-card">
        <h3><?= htmlspecialchars($cartucho['modelo']) ?></h3>
        <p>Precio: <?= htmlspecialchars($cartucho['precio']) ?></p>
    </div>
<?php endforeach; ?>
```

### 📱 Responsive Design

El sitio implementa **mobile-first design**:

```css
/* Móvil por defecto */
.container { padding: 1rem; }

/* Tablet */
@media (min-width: 768px) {
    .container { padding: 2rem; }
}

/* Desktop */
@media (min-width: 1024px) {
    .container { padding: 3rem; }
}
```

---

## 🛡️ Seguridad

### Medidas Implementadas

#### Sanitización de Datos
```php
// Siempre escapar salida HTML
echo htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8');

// Validar rutas de archivos
$templateName = basename($templateName); // Evita directory traversal
```

#### Headers de Seguridad
```apache
# .htaccess
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options DENY
Header always set X-XSS-Protection "1; mode=block"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

#### Validación de Formularios
```php
// contact-form-handler.php
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if (!$email) {
    die('Email inválido');
}
```

### 🔒 Buenas Prácticas

1. **Nunca exponer información sensible** en el código cliente
2. **Validar y sanitizar** todas las entradas del usuario
3. **Usar HTTPS** en producción
4. **Mantener PHP actualizado** (8.0+)
5. **Revisar logs** regularmente

---

## 🤝 Contribuir

### Flujo de Trabajo Git

```bash
# 1. Crear rama para nueva funcionalidad
git checkout -b feature/nueva-funcionalidad

# 2. Hacer cambios y commits descriptivos
git add .
git commit -m "feat: agregar sistema de búsqueda de productos"

# 3. Push y crear Pull Request
git push origin feature/nueva-funcionalidad
```

### Convenciones de Código

#### PHP
```php
<?php
/**
 * Documentar todas las funciones públicas
 * @param string $param Descripción del parámetro
 * @return mixed Descripción del retorno
 */
function miFuncion($param) {
    // Usar camelCase para variables
    $miVariable = 'valor';
    
    // Usar PascalCase para clases
    class MiClase {}
}
?>
```

#### CSS
```css
/* Usar kebab-case para clases */
.mi-componente {
    /* Propiedades ordenadas alfabéticamente */
    background: #fff;
    border: 1px solid #ddd;
    padding: 1rem;
}

/* Usar BEM para componentes complejos */
.card {}
.card__header {}
.card__header--destacado {}
```

#### JavaScript
```javascript
// Usar camelCase
const miVariable = 'valor';

// Funciones descriptivas
function inicializarComponente() {
    // Usar const/let en lugar de var
    const elemento = document.getElementById('mi-elemento');
    
    if (!elemento) {
        console.error('Elemento no encontrado');
        return;
    }
}
```

### 📝 Commit Messages

Seguir el estándar [Conventional Commits](https://www.conventionalcommits.org/):

```bash
feat: agregar nueva funcionalidad
fix: corregir bug en modal
docs: actualizar README
style: mejorar estilos del header
refactor: optimizar carga de recursos
test: agregar pruebas unitarias
chore: actualizar dependencias
```

---

## 📞 Soporte

### 🚨 Reportar Problemas

1. **Verificar** que no sea un problema conocido
2. **Crear issue** en GitHub con:
   - Descripción del problema
   - Pasos para reproducir
   - Screenshots (si aplica)
   - Información del navegador/servidor

### 💬 Canales de Comunicación

- **Issues:** Para bugs y mejoras
- **Discussions:** Para preguntas generales
- **Email:** desarrollo@norttek.com.mx (interno)

### 🔧 Herramientas de Debug

```php
// Habilitar modo debug (solo desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log personalizado
error_log("Debug: " . print_r($variable, true));
```

### 📋 Checklist de Deployment

- [ ] ✅ Tests locales pasados
- [ ] 🔍 Código revisado por peer
- [ ] 🛡️ Headers de seguridad configurados
- [ ] 📱 Responsive design verificado
- [ ] ⚡ Performance optimizada
- [ ] 🔗 Links y formularios probados
- [ ] 📊 Analytics configurados

---

## 📈 Métricas y Analytics

### Performance Goals
- **Tiempo de carga:** < 3 segundos
- **First Contentful Paint:** < 1.5 segundos
- **Largest Contentful Paint:** < 2.5 segundos
- **Cumulative Layout Shift:** < 0.1

### SEO Targets
- **Core Web Vitals:** ✅ Pass
- **Mobile Friendly:** ✅ Pass
- **Page Speed Score:** > 90

---

## 🏆 Créditos

### Equipo de Desarrollo
- **Líder Técnico:** [Nombre]
- **Frontend Developer:** [Nombre]  
- **Backend Developer:** [Nombre]
- **UI/UX Designer:** [Nombre]

### Tecnologías Utilizadas
- **PHP** 8.0+ - Backend logic
- **Tailwind CSS** - Styling framework
- **GSAP** - Animations
- **AOS** - Scroll animations
- **FontAwesome** - Icons
- **Toastify** - Notifications

---

## 📄 Licencia

Este proyecto es **propiedad privada** de **Norttek Solutions**.

**Todos los derechos reservados.** El uso, distribución o modificación está restringido al personal autorizado de Norttek Solutions.

---

<div align="center">

**🔒 Norttek Solutions - Seguridad Confiable**

[🌐 Sitio Web](https://www.norttek.com.mx) • [📧 Contacto](mailto:contacto@norttek.com.mx) • [📞 Soporte](tel:+526252690997)

---

*Documentación actualizada: Septiembre 2025*

</div>