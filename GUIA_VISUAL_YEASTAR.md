# 🎨 Guía Visual Rápida - Estilo Yeastar

## Esquema de Colores Principal

```
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
BACKGROUNDS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
█ #ffffff  Blanco puro (cards, hero)
█ #f8fafc  Gris muy claro (background general)
█ #f9fafb  Gris claro (hover states)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
BORDERS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
█ #e5e7eb  Gris claro (borders principales)
█ #d1d5db  Gris medio (dividers)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
TEXTO
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
█ #111827  Negro suave (headings)
█ #374151  Gris oscuro (títulos)
█ #4b5563  Gris medio (body text)
█ #6b7280  Gris medio-claro (secondary)
█ #9ca3af  Gris claro (muted)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
ACENTOS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
█ #3b82f6  Azul (Básico, botones)
█ #f59e0b  Amber (Premium)
█ #8b5cf6  Violeta (Empresarial)
```

---

## Hero Section

```
┌──────────────────────────────────────────────────────┐
│                                                        │
│                   [FONDO BLANCO]                      │
│                                                        │
│              Título Grande y Oscuro                   │
│        Subtítulo en gris medio, legible              │
│                                                        │
│         ┌──────────┐  ┌──────────┐                   │
│         │ Botón #1 │  │ Botón #2 │                   │
│         └──────────┘  └──────────┘                   │
│              (Azul sólido #3b82f6)                    │
│                                                        │
└──────────────────────────────────────────────────────┘

Características:
• Background: Blanco con hint azul sutil
• Texto: Negro (#111827)
• Botones: Azul sólido, sin gradientes
• Sombras: Mínimas (0.1 opacity)
• Padding: 180-200px top
```

---

## Tarjeta de Plan

```
┌──────────────────────────────────────────────────────┐
├──────────────────────────────────────────────────────┤ ← Barra azul 4px
│                                   [BADGE]             │
│                                                        │
│   [ICONO]                                             │
│    64px                                               │
│                                                        │
│   Título del Plan                                     │
│   Descripción corta                                   │
│                                                        │
│   ✓ Característica 1                                 │
│   ✓ Característica 2                                 │
│   ✓ Característica 3                                 │
│                                                        │
│   ────────────────────────────── (separador)         │
│                                                        │
│   $999 /mes                                           │
│   (3rem, negro sólido)                                │
│                                                        │
│   ┌────────────────────────────┐                     │
│   │    Solicitar Plan          │                     │
│   └────────────────────────────┘                     │
│                                                        │
└──────────────────────────────────────────────────────┘

Características:
• Background: Blanco puro
• Border: 1px gris #e5e7eb
• Top accent: 4px color del plan
• Padding: 2.5rem 2rem
• Border-radius: 16px
• Shadow: 0 1px 3px rgba(0,0,0,0.06)
```

---

## Tarjeta de Dispositivo

```
┌──────────────────────────────────────────────────────┐
│                                                        │
│              [IMAGEN 16:10]                           │
│                                                        │
├────────────────────────────────────────────────────────┤
│                                                        │
│   [ICONO] Título del Dispositivo                      │
│    48px                                               │
│                                                        │
│   Descripción del dispositivo y sus                   │
│   características principales.                         │
│                                                        │
│   • Highlight 1                                       │
│   • Highlight 2                                       │
│                                                        │
└──────────────────────────────────────────────────────┘

Características:
• Background: Blanco
• Border: 1px gris #e5e7eb
• Border-radius: 16px
• Padding: 2rem 1.75rem
• Shadow: Mínima
```

---

## Botones

```
┌─────────────────┐
│  Texto Botón    │  ← Azul sólido #3b82f6
└─────────────────┘
     8px radius

Hover:
┌─────────────────┐
│  Texto Botón    │  ← Brightness 95%
└─────────────────┘
   ↑ -1px (sube ligeramente)

Características:
• Background: Color sólido (no gradiente)
• Color: #ffffff
• Padding: 0.875rem 1.5rem
• Border-radius: 8px
• Font-weight: 600
• Transition: 0.2s ease
• Hover: filter brightness + translateY(-1px)
```

---

## Iconos de Plan

```
┌──────────┐
│          │
│    🔧    │  ← 64x64px
│          │
└──────────┘

Características:
• Size: 64x64px
• Border-radius: 12px
• Background: rgba(color, 0.1) ← 10% opacity del color
• Color: Color del plan sólido
• Sin borders ni sombras decorativas
```

---

## Badges

```
┌────────────┐
│  POPULAR   │  ← 6px radius
└────────────┘

Características:
• Background: Color del plan sólido
• Color: #ffffff
• Padding: 0.5rem 1rem
• Font-size: 0.75rem
• Font-weight: 600
• Border-radius: 6px (no 999px)
• Shadow: 0 1px 3px rgba(0,0,0,0.12)
```

---

## Espaciado General

```
Hero:
  padding-top:    180px - 200px
  padding-bottom: 120px - 140px
  gap:            2rem

Cards:
  padding:        2.5rem 2rem
  gap:            1.5rem
  border-radius:  16px

Grid:
  gap:            2rem
  
Listas:
  gap:            0.875rem
  
Botones:
  padding:        0.875rem 1.5rem
  gap (con icon): 0.5rem
```

---

## Tipografía Scale

```
3rem    ← Precios (grande)
1.5rem  ← Títulos de cards
1.25rem ← Subtítulos importantes
1.2rem  ← Hero subtitle
1rem    ← Body text
0.9375rem ← Botones
0.875rem  ← Taglines
0.75rem   ← Badges
```

---

## Font Weights

```
700 ← Headings principales
600 ← Botones, semi-bold
500 ← Highlights, énfasis
400 ← Body text, regular
```

---

## Sombras (3 niveles)

```
Nivel 1 - Reposo:
box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);

Nivel 2 - Hover:
box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);

Nivel 3 - Elevado:
box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
```

---

## Transiciones

```css
/* Universal */
transition: all 0.2s ease;

/* Transforms comunes */
hover: translateY(-1px) a translateY(-2px)
hover: scale(1.03)

/* Filters */
hover: brightness(0.95)
```

---

## Border Radius Scale

```
6px  ← Badges, elementos pequeños
8px  ← Botones estándar
10px ← Iconos pequeños
12px ← Iconos medianos
16px ← Cards principales
```

---

## Estados Hover

```
Cards:
  border-color: rgba(accent, 0.3)
  transform: translateY(-2px)
  shadow: nivel 2

Botones:
  filter: brightness(0.95)
  transform: translateY(-1px)
  shadow: nivel 2

Imágenes:
  transform: scale(1.03)
```

---

## Responsive Breakpoints

```
Mobile    < 640px
Tablet    640px - 900px  
Desktop   > 900px
Large     > 1100px
```

---

## Checklist Visual

```
✓ Fondo claro (blanco/gris muy claro)
✓ Texto oscuro (alto contraste)
✓ Botones sólidos (sin gradientes)
✓ Sombras sutiles (0.06 - 0.1 opacity)
✓ Border-radius moderado (8-16px)
✓ Espaciado generoso (2-2.5rem padding)
✓ Tipografía clara (Inter, tamaños grandes)
✓ Iconos simples (sin decoración)
✓ Transiciones rápidas (0.2s)
✓ Top accent bar en cards destacadas
✓ Sin overlays complejos
✓ Sin backdrop-filters
✓ Sin animaciones dramáticas
```

---

## Filosofía en 3 Palabras

```
LIMPIO • PROFESIONAL • MINIMALISTA
```

---

## Quick Copy-Paste

```css
/* Card básica Yeastar */
.card {
  background: #ffffff;
  border: 1px solid #e5e7eb;
  border-radius: 16px;
  padding: 2.5rem 2rem;
  box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
  transition: all 0.2s ease;
}

.card:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
}

/* Botón Yeastar */
.button {
  background: #3b82f6;
  color: #ffffff;
  padding: 0.875rem 1.5rem;
  border-radius: 8px;
  font-weight: 600;
  border: none;
  box-shadow: 0 1px 3px rgba(0,0,0,0.1), 0 1px 2px rgba(0,0,0,0.06);
  transition: all 0.2s ease;
}

.button:hover {
  filter: brightness(0.95);
  transform: translateY(-1px);
  box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
}

/* Icono plan */
.icon {
  width: 64px;
  height: 64px;
  border-radius: 12px;
  background: rgba(59,130,246,0.1);
  color: #3b82f6;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.75rem;
}
```

---

**Referencia Rápida Completa** ✨
