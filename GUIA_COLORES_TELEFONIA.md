# 🎨 Guía de Colores - Telefonía (Yeastar Style)

## Color System

### 🔷 Primary Colors (Cyan/Sky)
```css
/* Gradiente principal para botones y elementos destacados */
#0ea5e9  /* Sky 500 - Base */
#0284c7  /* Sky 600 - Medio */
#0369a1  /* Sky 700 - Oscuro */

/* Uso: Botones principales, iconos, enlaces, hover states */
```

### 🟡 Amber (Premium)
```css
/* Para plan premium y elementos destacados */
#f59e0b  /* Amber 500 - Base */
#d97706  /* Amber 600 - Medio */
#b45309  /* Amber 700 - Oscuro */

/* Uso: Plan Premium, elementos VIP, badges especiales */
```

### 🟣 Purple (Empresarial)
```css
/* Para plan empresarial */
#8b5cf6  /* Violet 500 - Base */
#7c3aed  /* Violet 600 - Medio */
#6d28d9  /* Violet 700 - Oscuro */

/* Uso: Plan Empresarial, características exclusivas */
```

### ⚫ Slate (Neutral)
```css
/* Sistema de grises consistente */
#0f172a  /* Slate 900 - Casi negro (headings principales) */
#1e293b  /* Slate 800 - Muy oscuro */
#334155  /* Slate 700 - Oscuro */
#475569  /* Slate 600 - Medio oscuro (body text) */
#64748b  /* Slate 500 - Medio (secondary text) */
#94a3b8  /* Slate 400 - Claro */
#cbd5e1  /* Slate 300 - Muy claro */
#e2e8f0  /* Slate 200 - Borders */
#f1f5f9  /* Slate 100 - Light backgrounds */
#f8fafc  /* Slate 50 - Casi blanco */
```

---

## 📐 Variables CSS por Componente

### Hero Buttons
```css
--_btn-bg: linear-gradient(135deg, #0ea5e9 0%, #0284c7 50%, #0369a1 100%);
--_btn-bg-hover: linear-gradient(135deg, #38bdf8 0%, #0ea5e9 50%, #0284c7 100%);
--_btn-color: #ffffff;
--_btn-color-hover: #ffffff;
```

### Plan Cards - Básico (Cyan)
```css
--plan-accent: #0ea5e9;
--plan-accent-soft: rgba(14,165,233,0.08);
--plan-accent-grad: linear-gradient(135deg, #0ea5e9 0%, #0284c7 50%, #0369a1 100%);
--plan-accent-border: rgba(14,165,233,0.3);
--plan-price-grad: linear-gradient(90deg, #0f172a, #1e293b);
--plan-bg: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
```

### Plan Cards - Premium (Amber)
```css
--plan-accent: #f59e0b;
--plan-accent-soft: rgba(245,158,11,0.08);
--plan-accent-grad: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #b45309 100%);
--plan-accent-border: rgba(245,158,11,0.3);
--plan-price-grad: linear-gradient(90deg, #78350f, #451a03);
```

### Plan Cards - Empresarial (Purple)
```css
--plan-accent: #8b5cf6;
--plan-accent-soft: rgba(139,92,246,0.08);
--plan-accent-grad: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
--plan-accent-border: rgba(139,92,246,0.3);
--plan-price-grad: linear-gradient(90deg, #4c1d95, #2e1065);
```

---

## 🌈 Uso de Color por Contexto

### Backgrounds
```css
/* Cards principales */
background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);

/* Cards destacadas */
background: linear-gradient(180deg, #ffffff 0%, #f0f9ff 100%);

/* Hero section */
background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
```

### Text Colors
```css
/* Headings principales */
color: #0f172a;  /* Slate 900 */

/* Body text */
color: #475569;  /* Slate 600 */

/* Secondary text */
color: #64748b;  /* Slate 500 */

/* Muted text */
color: #94a3b8;  /* Slate 400 */

/* Hero text */
color: #ffffff;  /* White */
color: #e2e8f0;  /* Slate 200 para subtítulos */
```

### Borders
```css
/* Subtle borders */
border: 1px solid #e2e8f0;  /* Slate 200 */

/* Medium borders */
border: 1px solid #cbd5e1;  /* Slate 300 */

/* Accent borders */
border: 1px solid rgba(14,165,233,0.3);  /* Cyan con transparencia */
```

### Shadows
```css
/* Subtle elevation */
box-shadow: 0 4px 20px rgba(0,0,0,0.06), 0 1px 4px rgba(0,0,0,0.04);

/* Medium elevation */
box-shadow: 0 8px 24px rgba(14,165,233,0.15), 0 4px 8px rgba(0,0,0,0.08);

/* High elevation */
box-shadow: 0 20px 40px rgba(14,165,233,0.15), 0 8px 16px rgba(0,0,0,0.08);

/* Featured elevation */
box-shadow: 0 24px 48px rgba(2,132,199,0.3), 0 12px 20px rgba(0,0,0,0.1);
```

---

## 🎯 Reglas de Uso

### ✅ DO (Hacer)
- Usar cyan (#0ea5e9) como color principal en toda la página
- Aplicar sombras con tinte del color temático (branded shadows)
- Mantener consistencia con el sistema Slate para grises
- Usar transparencias para variantes sutiles (rgba)
- Aplicar gradientes suaves (135deg o 180deg)

### ❌ DON'T (No hacer)
- No mezclar sistemas de grises (usar solo Slate)
- No usar sombras negras puras, agregar tinte de color
- No usar gradientes muy pronunciados (más de 3 stops)
- No usar colores primarios puros sin variación
- No usar transparencias altas (>0.8) en fondos

---

## 📱 Adaptaciones por Contexto

### Desktop
- Sombras más pronunciadas
- Bordes más amplios
- Colores más vibrantes

### Mobile
- Sombras más sutiles
- Menos gradientes complejos
- Colores ligeramente menos saturados

### Dark Mode (Futuro)
```css
/* Invertir paleta manteniendo proporciones */
--primary: #0ea5e9;  /* Mantener cyan */
--bg-primary: #0f172a;  /* Slate 900 */
--bg-secondary: #1e293b;  /* Slate 800 */
--text-primary: #f8fafc;  /* Slate 50 */
--text-secondary: #cbd5e1;  /* Slate 300 */
```

---

## 🔍 Contraste y Accesibilidad

### Ratios de Contraste (WCAG AA)
```
White (#ffffff) sobre Cyan (#0ea5e9): 2.9:1 ✅
Slate 900 (#0f172a) sobre White: 17.8:1 ✅✅
Slate 600 (#475569) sobre White: 8.6:1 ✅✅
Cyan (#0ea5e9) sobre Slate 900: 6.5:1 ✅
```

### Combinaciones Seguras
```css
/* Text sobre backgrounds claros */
#0f172a sobre #ffffff  ✅
#475569 sobre #f8fafc  ✅
#64748b sobre #ffffff  ✅

/* Text sobre backgrounds oscuros */
#ffffff sobre #0f172a  ✅
#e2e8f0 sobre #1e293b  ✅
#cbd5e1 sobre #334155  ✅

/* Accents sobre backgrounds */
#0ea5e9 sobre #ffffff  ⚠️ (solo para elementos no críticos)
#f59e0b sobre #ffffff  ⚠️ (solo para elementos no críticos)
```

---

## 🎨 Paleta Completa - Referencia Rápida

```
CYAN (Primary):
█ #0ea5e9  Sky 500
█ #0284c7  Sky 600
█ #0369a1  Sky 700

AMBER (Premium):
█ #f59e0b  Amber 500
█ #d97706  Amber 600
█ #b45309  Amber 700

PURPLE (Empresarial):
█ #8b5cf6  Violet 500
█ #7c3aed  Violet 600
█ #6d28d9  Violet 700

SLATE (Neutral):
█ #0f172a  Slate 900
█ #1e293b  Slate 800
█ #334155  Slate 700
█ #475569  Slate 600
█ #64748b  Slate 500
█ #94a3b8  Slate 400
█ #cbd5e1  Slate 300
█ #e2e8f0  Slate 200
█ #f1f5f9  Slate 100
█ #f8fafc  Slate 50
```

---

## 💡 Tips de Implementación

1. **Variables CSS**: Considerar crear CSS custom properties para facilitar cambios
2. **Consistencia**: Usar siempre los mismos valores, no aproximaciones
3. **Gradientes**: Preferir 2-3 stops máximo para mejor performance
4. **Sombras**: Usar múltiples capas sutiles en lugar de una sombra intensa
5. **Transparencias**: Usar rgba() para mejor control y performance
6. **Animaciones**: Aplicar transiciones a propiedades específicas, no "all" cuando sea posible

---

## 📚 Referencias

- **Tailwind CSS Slate**: Sistema de grises base
- **Tailwind CSS Sky**: Colores cyan principales
- **Material Design**: Principios de elevación y sombras
- **Yeastar Design**: Inspiración general de estética
