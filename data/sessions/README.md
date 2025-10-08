# Directorio de Sesiones

Este directorio almacena las sesiones PHP cuando el directorio por defecto del servidor no tiene permisos de escritura.

**IMPORTANTE:** Este directorio debe tener permisos 755 o 777 en el servidor.

En producción, ejecuta:
```bash
chmod 755 data/sessions
```

O si necesitas permisos más amplios:
```bash
chmod 777 data/sessions
```
