# 🎨 Cheat Sheet - Diseño Telefonía Yeastar Style

## 🚀 Quick Reference

### Colores Principales
```
Primary:    #0ea5e9  (Cyan Sky)
Premium:    #f59e0b  (Amber)
Empresarial:#8b5cf6  (Purple)
Dark:       #0f172a  (Slate 900)
Text:       #475569  (Slate 600)
Border:     #e2e8f0  (Slate 200)
```

### Espaciado Común
```
Padding Cards:     2rem 1.75rem 2.25rem
Gap Flex:          1.25rem
Gap Grid:          2rem
Border Radius:     20-24px
Border Radius Btn: 12px
Border Radius Badge: 8px
```

### Tamaños de Fuente
```
Hero Heading:  Heredado (grande)
Card Title:    1.25rem
Precio:        2.25rem
Body:          0.95rem
Badge:         0.65rem
Button:        0.85-0.95rem
```

### Sombras
```
Reposo:  0 4px 20px rgba(0,0,0,0.06)
Hover:   0 20px 40px rgba(14,165,233,0.15)
Button:  0 8px 24px rgba(14,165,233,0.4)
```

### Transiciones
```
Duration: 0.3s - 0.4s
Easing:   cubic-bezier(0.4, 0, 0.2, 1)
```

---

## 🎯 Aplicación Rápida

### Hero Button
```css
background: linear-gradient(135deg, #0ea5e9, #0284c7, #0369a1);
padding: 1rem 1.75rem;
border-radius: 12px;
box-shadow: 0 4px 14px rgba(14,165,233,0.3);
```

### Card Plan
```css
background: linear-gradient(180deg, #ffffff, #f8fafc);
padding: 2rem 1.75rem 2.25rem;
border-radius: 24px;
border: 1px solid #e2e8f0;
box-shadow: 0 4px 20px rgba(0,0,0,0.06);
```

### Card Hover
```css
transform: translateY(-8px);
box-shadow: 0 20px 40px rgba(14,165,233,0.15);
```

### Icono
```css
width: 68px;
height: 68px;
border-radius: 16px;
color: #0ea5e9;
```

---

## 📋 Clase por Función

| Elemento | Clase Principal | Color Accent |
|----------|----------------|--------------|
| Hero | `.telefonia-hero` | - |
| Hero Bg | `.telefonia-hero-bg` | Slate gradient |
| Hero Button | `.nt-btn` | Cyan (#0ea5e9) |
| Plan Card | `.tel-plan-card` | Variable tier |
| Plan Badge | `.plan-badge-ribbon` | Tier gradient |
| Plan Icon | `.tel-plan-icon` | Tier color |
| Plan Button | `.tel-plan-cta .nt-btn` | Tier color |
| Device Card | `.dev-card` | Cyan (#0ea5e9) |
| Device Alt | `.dev-card--alt` | Amber (#f59e0b) |

---

## 🔧 Modificadores Rápidos

### Data Attributes
```css
[data-plan-tier="basico"]      → Cyan
[data-plan-tier="premium"]     → Amber
[data-plan-tier="empresarial"] → Purple
```

### Estados
```css
:hover        → Transform + Shadow
:focus-within → Outline 2px
:active       → Transform reduce
.destacado    → Border 2px + Shadow enhanced
```

---

## 💡 Tips Rápidos

1. **Colores**: Siempre usar Slate para grises
2. **Sombras**: Agregar tinte de color (branded)
3. **Borders**: Usar transparencias para sutileza
4. **Spacing**: Preferir rem sobre px
5. **Hover**: Siempre incluir transform + shadow
6. **Iconos**: Animar con translateX(3px)
7. **Gradientes**: Máximo 3 stops
8. **Border Radius**: 8px (small), 12px (medium), 20-24px (large)

---

## 🎨 Gradientes Listos
```css
/* Primary */
linear-gradient(135deg, #0ea5e9, #0284c7, #0369a1)

/* Premium */
linear-gradient(135deg, #f59e0b, #d97706, #b45309)

/* Empresarial */
linear-gradient(135deg, #8b5cf6, #7c3aed, #6d28d9)

/* Background */
linear-gradient(180deg, #ffffff, #f8fafc)

/* Hero Bg */
linear-gradient(135deg, #0f172a, #1e293b, #334155)
```

---

## 📱 Breakpoints
```css
@media (max-width: 640px)  → Mobile
@media (max-width: 900px)  → Tablet
@media (min-width: 900px)  → Desktop
@media (min-width: 1100px) → Large Desktop
```

---

## ⚡ Performance Tips
- Usar `transform` y `opacity` para animaciones
- Evitar animar `width`, `height`, `top`, `left`
- Usar `will-change` solo cuando sea necesario
- Preferir `transition` específicas vs `all`

---

## 🔍 Debug Rápido

### Problema: Sombra muy intensa
```css
/* Cambiar */
rgba(0,0,0,0.5)
/* Por */
rgba(0,0,0,0.06)
```

### Problema: Color muy saturado
```css
/* Agregar transparencia */
rgba(14,165,233,0.08)
```

### Problema: Transición lenta
```css
/* Cambiar */
0.8s ease
/* Por */
0.4s cubic-bezier(0.4, 0, 0.2, 1)
```

---

## 📦 Extensiones Futuras

### Dark Mode Variables
```css
--primary: #0ea5e9;
--bg-dark: #0f172a;
--text-dark: #f8fafc;
```

### Custom Properties
```css
:root {
  --nt-primary: #0ea5e9;
  --nt-shadow-sm: 0 4px 20px rgba(0,0,0,0.06);
  --nt-radius-lg: 24px;
  --nt-transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
```

---

## 🎓 Recursos

- **Tailwind CSS**: Color reference
- **Material Design**: Elevation system
- **Can I Use**: Browser compatibility
- **WebAIM**: Contrast checker

---

**Última actualización**: 2025-10-01
**Versión**: 1.0.0 (Yeastar Style)
**Estado**: ✅ Producción
