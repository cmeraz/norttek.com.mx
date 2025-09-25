## Guía de mensajes de commit (Español Neutro)

Para mantener coherencia y facilitar el historial del repositorio, sigue estas reglas:

### Formato base
```
tipo(scope): resumen breve en minúsculas e imperativo

Detalle opcional explicando el qué y el por qué.

Closes #ID (si aplica)
```

### Tipos admitidos
| Tipo | Uso |
|------|-----|
| feat | Nueva funcionalidad de usuario o módulo |
| fix | Corrección de bug |
| docs | Cambios solo en documentación |
| style | Formato (espacios, lint), sin lógica |
| refactor | Reestructuración interna sin cambio funcional |
| perf | Mejora de rendimiento |
| test | Añade o modifica pruebas |
| build | Cambios en tooling / dependencias / empaquetado |
| ci | Cambios en pipelines o automatizaciones |
| chore | Tareas menores (limpieza, bump, etc.) |

### Reglas clave
1. Escribir SIEMPRE en español neutro.
2. No iniciar con mayúscula salvo nombres propios.
3. No terminar la línea del resumen con punto.
4. Evitar frases largas (>72 caracteres) en la primera línea.
5. Usar imperativo: "agrega", "corrige", "actualiza", "elimina".
6. Evitar commits multitema; divide si abarca cosas no relacionadas.

### Ejemplos
```
feat(servicios): añade animación breathing extendida en highlight
fix(contacto): corrige validación de correo con dominios .mx
refactor(core): centraliza manejo de tokens CSS
perf(carrusel): reduce reflows eliminando lecturas forzadas
docs(readme): documenta proceso para nueva página modular
```

### Referencias a issues
En el bloque de detalle:
```
Closes #134
Related #140
```

### Mensajes generados por IA
Para asistentes (Copilot / ChatGPT / etc.):
Incluir siempre contexto suficiente para revisión humana. Evitar inglés salvo nombres técnicos.

---
Última actualización: automatizada para reforzar idioma español en la herramienta de escritorio.
