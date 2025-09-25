# Norttek Design System (2025 Refresh)

Este documento resume los componentes centrales implementados durante la refactorización visual.

## Tokens (CSS Variables)
Ubicados en `assets/css/style.css` bajo `:root`.
- Color fondo base: `--nt-bg`
- Superficies: `--nt-surface`, `--nt-surface-alt`
- Texto: `--nt-text`, `--nt-text-muted`
- Marca primaria: `--nt-primary`, `--nt-primary-strong`
- Acento cálido (iconos): `--nt-accent`
- Estados: `--nt-danger`, `--nt-danger-strong`
- Overlay Hero / Gradiente texto: `--nt-hero-overlay`, `--nt-hero-gradient-text`

## Headings
Helper PHP: `nt_heading($text, $icon, $size, $sub, $underline, $attrs)`
- Tamaños: `xl | lg | md | sm`
- Atributos especiales en `$attrs`:
  - `animate => true` (aplica clases de animación)
  - `delay => sm|md|lg` (retrasa entrada)
  - `class` (agrega clases extra)
- Modificador: `nt-heading-emphasis` (para héroes, gradiente de texto)
- Subtítulo (`$sub`) se renderiza en `<span class="nt-sub">` bajo el título.

Ejemplo:
```php
<?= nt_heading('Control de Acceso Inteligente', 'fa-solid fa-door-open', 'xl', 'Seguridad y gestión centralizada', true, ['animate'=>true,'delay'=>'sm']); ?>
```

## Botones
Clase base: `.nt-btn`
Variantes disponibles (como clase adicional o `data-variant`):
- `nt-btn-primary`
- `nt-btn-outline`
- `nt-btn-accent`
- `nt-btn-dark`
- `nt-btn-danger`

Grupos: `.nt-btn-group`
Tabs activos: `nt-tab-active` (añadido vía JS en cartuchos).

## Formularios
- Contenedor: `.nt-form`
- Campo: `.nt-field` (incluye `<label>` y el control)
- Input genérico: `.nt-input`
- Icon wrapper: `.nt-input-icon`

## Secciones
Uso de tarjetas/secciones destacadas: `.nt-section` y variante suave `.nt-section.inset`.

## Animaciones
- Headings: `.nt-heading-anim` + `.is-visible` (IntersectionObserver en `assets/js/scripts.js`).
- Delays: `delay-sm | delay-md | delay-lg`.

## Tablas
Placeholder para uniformar tablas: `.nt-table` y cabezal propuesto: `.nt-table-head`.

## Utilidades
- Texto secundario: `.nt-lead`
- Ícono acento: `.nt-icon-accent`
- Fade genérico: `.nt-fade-in`
- Badges: `.nt-badge`

## Patrones Implementados
- Hero con heading énfasis y gradiente de texto para secciones clave (ej. Telefonía).
- Grids de servicios estilizados con tarjetas translúcidas + blur.
- Tabs reactivas (cartuchos) controladas vía JS para alternar secciones y variantes.

## Extensión Futura Sugerida
1. Modo oscuro (duplicar tokens con `@media (prefers-color-scheme: dark)` o `body.dark`).
2. Sistema de utilidades spacing / layout propio para reducir dependencias de clases Tailwind residuales.
3. Unificación de rutas de imágenes (`/assets/img/` vs `/assets/images/`).
4. Componente de alertas (`.nt-alert`).
5. Componente de steps / timeline reutilizable (basado en About timeline).

## Convenciones PHP
- Centralizar todas las llamadas de headings mediante helper para cambios globales futuros.
- Mantener arrays de datos (ej. servicios home) para fácil iteración + internacionalización futura.

## Ejemplo Completo
```php
<section class="nt-section inset">
  <?= nt_heading('Planes y llamadas ilimitadas', 'fa-solid fa-boxes-stacked', 'lg', null, true, ['animate'=>true]); ?>
  <p class="nt-lead mt-4">Elige el plan que mejor se adapta a tu empresa.</p>
  <a href="#contacto" class="nt-btn nt-btn-primary mt-6"><i class="fa-solid fa-comments"></i><span>Hablar con un asesor</span></a>
</section>
```

---
Última actualización: auto-generado durante refactor (branch `feature/remastering`).
