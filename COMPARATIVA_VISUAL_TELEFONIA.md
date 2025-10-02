# Comparativa Visual: Antes vs Después

## 🎨 PALETA DE COLORES

### Hero Section - Botones
```css
/* ANTES */
background: linear-gradient(135deg, #1e3a8a, #1d4ed8 45%, #2563eb 70%, #3b82f6);
/* Azul marino → Azul rey (muy intenso) */

/* AHORA */
background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 50%, #0369a1 100%);
/* Cyan sky → Cyan vibrante (moderno, tipo Yeastar) */
```

### Tarjetas de Planes - Por Tier

#### Plan Básico
```css
/* ANTES */
--plan-accent: #2563eb;  /* Azul rey estándar */

/* AHORA */
--plan-accent: #0ea5e9;  /* Cyan sky profesional */
```

#### Plan Premium
```css
/* ANTES */
--plan-accent: #f97316;  /* Naranja rojizo */

/* AHORA */
--plan-accent: #f59e0b;  /* Amber dorado (más premium) */
```

#### Plan Empresarial
```css
/* ANTES */
--plan-accent: #6366f1;  /* Índigo */

/* AHORA */
--plan-accent: #8b5cf6;  /* Purple vibrante (más exclusivo) */
```

---

## 📐 GEOMETRÍA Y ESPACIADO

### Border Radius
```css
/* ANTES - Cards Planes */
border-radius: 28px;

/* AHORA - Cards Planes */
border-radius: 24px;  /* Más moderno, menos redondeado */

/* ANTES - Badges */
border-radius: 999px;  /* Completamente redondeado (pastilla) */

/* AHORA - Badges */
border-radius: 8px;  /* Esquinas suaves pero cuadrado (tendencia actual) */

/* ANTES - Botones Hero */
border-radius: (heredado del tema);

/* AHORA - Botones Hero */
border-radius: 12px;  /* Definido explícitamente */
```

### Padding de Cards
```css
/* ANTES - Planes */
padding: 1.65rem 1.55rem 1.85rem;

/* AHORA - Planes */
padding: 2rem 1.75rem 2.25rem;  /* +21% más espaciado vertical */

/* ANTES - Dispositivos */
padding: 1.45rem 1.35rem 1.55rem;

/* AHORA - Dispositivos */
padding: 1.75rem 1.5rem 2rem;  /* +21% más espaciado vertical */
```

---

## 🌈 SOMBRAS

### Cards en Reposo
```css
/* ANTES */
box-shadow: 0 6px 18px -8px rgba(15,23,42,0.18), 0 2px 8px rgba(15,23,42,0.06);
/* Sombra gris neutra, algo intensa */

/* AHORA */
box-shadow: 0 4px 20px rgba(0,0,0,0.06), 0 1px 4px rgba(0,0,0,0.04);
/* Sombra más sutil y difusa (minimalista) */
```

### Cards en Hover
```css
/* ANTES */
box-shadow: 0 20px 44px -18px rgba(15,23,42,0.32), 0 10px 24px -6px rgba(15,23,42,0.16);
/* Sombra gris intensa */

/* AHORA */
box-shadow: 0 20px 40px rgba(14,165,233,0.15), 0 8px 16px rgba(0,0,0,0.08);
/* Sombra con tinte cyan (branded shadow - como Yeastar) */
```

### Botones Hero
```css
/* ANTES - Reposo */
box-shadow: 0 3px 10px -2px rgba(0,0,0,0.45), 0 1px 0 rgba(255,255,255,0.15) inset;
/* Sombra negra intensa + inset light */

/* AHORA - Reposo */
box-shadow: 0 4px 14px rgba(14,165,233,0.3), 0 1px 3px rgba(0,0,0,0.2);
/* Sombra branded cyan (más suave) */

/* ANTES - Hover */
box-shadow: 0 0 0 3px rgba(255,255,255,0.10), 0 8px 20px -6px rgba(0,0,0,0.55), 
            0 0 0 1px rgba(59,130,246,0.55), 0 0 26px -6px rgba(59,130,246,0.55);
/* Múltiples capas complejas con glow */

/* AHORA - Hover */
box-shadow: 0 8px 24px rgba(14,165,233,0.4), 0 4px 8px rgba(0,0,0,0.2);
/* Sombra simple pero efectiva con brand color */
```

---

## 📝 TIPOGRAFÍA

### Font Size - Precios
```css
/* ANTES */
font-size: 1.95rem;  /* ~31px */

/* AHORA */
font-size: 2.25rem;  /* 36px - más impactante */
```

### Font Size - Títulos de Cards
```css
/* ANTES */
font-size: 1.15rem;

/* AHORA */
font-size: 1.25rem;  /* +8% más grande */
```

### Font Weight - Headings
```css
/* ANTES */
font-weight: 900;  /* Extra bold */

/* AHORA */
font-weight: 800;  /* Bold (más refinado, menos pesado) */
```

### Letter Spacing - Headings
```css
/* ANTES */
letter-spacing: 0.4px;  /* Espaciado positivo */

/* AHORA */
letter-spacing: -0.3px;  /* Tracking negativo (tendencia moderna) */
```

### Letter Spacing - Badges
```css
/* ANTES */
letter-spacing: 0.9px;

/* AHORA */
letter-spacing: 0.8px;  /* Ligeramente más compacto */
```

---

## 🎭 COLORES DE TEXTO

### Hero - Heading
```css
/* ANTES */
color: #f5f9fc;  /* Azul muy claro */

/* AHORA */
color: #ffffff;  /* Blanco puro (mejor contraste) */
```

### Hero - Subtitle
```css
/* ANTES */
color: #e8f1f6;  /* Azul grisáceo claro */

/* AHORA */
color: #e2e8f0;  /* Gris slate claro (neutral) */
```

### Body Text - Cards
```css
/* ANTES */
color: #24465c;  /* Azul oscuro */

/* AHORA */
color: #475569;  /* Slate 600 (más neutral y moderno) */
```

### Small Text - Precio
```css
/* ANTES */
color: #4a6a82;  /* Azul grisáceo */

/* AHORA */
color: #64748b;  /* Slate 500 (sistema consistente) */
```

---

## ⚡ TRANSICIONES

### Timing Function
```css
/* ANTES */
transition: ... 0.55s var(--nt-ease);
/* Custom easing variable */

/* AHORA */
transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
/* Easing estándar material design - más natural */
```

### Duración
```css
/* ANTES */
0.55s - 0.85s  /* Transiciones lentas */

/* AHORA */
0.3s - 0.4s  /* Transiciones más rápidas y responsivas */
```

---

## 🖼️ ICONOS

### Tamaño
```css
/* ANTES */
width: 64px;
height: 64px;

/* AHORA */
width: 68px;  /* +6% más grande */
height: 68px;
```

### Border Radius
```css
/* ANTES */
border-radius: 20px;  /* Muy redondeado */

/* AHORA */
border-radius: 16px;  /* Más cuadrado, moderno */
```

### Background Opacity
```css
/* ANTES */
opacity: 0.6;  /* Gradiente más visible */

/* AHORA */
opacity: 0.15;  /* Mucho más sutil */
```

---

## 🎯 HOVER EFFECTS

### Transform - Cards
```css
/* ANTES */
transform: translateY(-7px);

/* AHORA */
transform: translateY(-8px);  /* Ligeramente más pronunciado */
```

### Transform - Botones
```css
/* ANTES */
transform: translateY(-2px);

/* AHORA */
transform: translateY(-3px);  /* Más feedback visual */
```

### Iconos en Botones (NUEVO)
```css
/* ANTES */
/* No había animación específica en iconos */

/* AHORA */
.nt-btn:hover i { 
  transform: translateX(3px);  /* Iconos se mueven a la derecha */
}
```

---

## 📊 RESUMEN DE CAMBIOS CLAVE

| Aspecto | Antes | Ahora | Mejora |
|---------|-------|-------|--------|
| **Color principal** | Azul rey (#2563eb) | Cyan sky (#0ea5e9) | Más moderno y vibrante |
| **Sombras** | Grises intensas | Branded + sutiles | Más refinado |
| **Border radius** | Muy redondeado | Moderado | Tendencia actual |
| **Espaciado** | Compacto | Generoso (+20%) | Más respirable |
| **Tipografía** | Muy bold (900) | Bold (800) | Más elegante |
| **Transiciones** | Lentas (0.5-0.8s) | Rápidas (0.3-0.4s) | Más responsive |
| **Contraste** | Medio | Alto | Mejor accesibilidad |
| **Paleta** | Azules variados | Sistema consistente | Más coherente |

---

## 🎨 FILOSOFÍA DE DISEÑO

### Antes: "Digital Bold"
- Colores intensos y saturados
- Sombras profundas
- Bordes muy redondeados
- Transiciones dramáticas

### Ahora: "Modern Professional" (Yeastar Style)
- Colores vibrantes pero refinados
- Sombras sutiles y branded
- Bordes equilibrados
- Transiciones naturales
- Mayor espacio en blanco
- Mejor jerarquía visual
- Sistema de colores consistente
