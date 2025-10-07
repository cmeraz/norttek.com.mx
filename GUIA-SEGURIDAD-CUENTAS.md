# 🔐 Guía Rápida - Sistema de Seguridad Panel de Cuentas

## ✅ Sistema Implementado y Listo para Usar

### 📋 Credenciales de Administrador

```
Usuario: cmeraz
Contraseña: Root01068280
```

## 🚀 Cómo Usar

### Como Administrador:

1. **Iniciar Sesión**
   - Ir a: `cuentas.php`
   - Ingresar usuario y contraseña
   - Se regenera automáticamente la sesión por seguridad

2. **Compartir la Página**
   - Clic en el botón **"Compartir Página"** (ya existente)
   - Se genera automáticamente un enlace único
   - El enlace completo aparece en un modal con botón para copiarlo
   - Formato: `https://tusitio.com/cuentas.php?token=XXXX`
   - **Válido por 24 horas**

3. **Cerrar Sesión**
   - Clic en "Cerrar Sesión" en el indicador de admin (esquina inferior izquierda)

### Como Usuario Invitado (con token):

1. **Acceder con Enlace**
   - Recibir enlace del administrador
   - Abrir URL: `cuentas.php?token=XXXX`
   - Ver contenido en modo solo lectura
   - **NO verás el botón de compartir**

2. **Expiración**
   - El token expira automáticamente después de 24 horas
   - Solicitar nuevo enlace al administrador si es necesario

## 🛡️ Protecciones de Seguridad

### Protección contra Fuerza Bruta
- ❌ Máximo **5 intentos fallidos** de login por IP
- 🔒 Bloqueo automático de **15 minutos**
- 📝 Todos los intentos se registran en el log
- ✅ El bloqueo se limpia automáticamente al expirar

### Sistema de Tokens
- 🔑 Tokens únicos de 32 caracteres hexadecimales
- ⏰ Expiración automática en 24 horas
- 🗑️ Limpieza automática de tokens expirados
- 📊 Metadata completa (fecha creación, expiración, creador)

### Registro de Accesos
Todos los eventos se registran en `data/log.txt`:
- ✓ Logins exitosos y fallidos
- ✓ Generación de tokens
- ✓ Uso de tokens (válidos e inválidos)
- ✓ Bloqueos de IP
- ✓ Intentos de acceso no autorizado

## 🔧 Administración del Sistema

### Script CLI de Gestión

```bash
php manage-security.php [comando]
```

### Comandos Disponibles:

```bash
# Ver todos los tokens activos
php manage-security.php list-tokens

# Ver IPs bloqueadas
php manage-security.php list-blocked

# Desbloquear una IP manualmente
php manage-security.php unblock-ip

# Revocar un token específico
php manage-security.php revoke-token

# Limpiar tokens expirados manualmente
php manage-security.php clean-expired

# Ver últimos 50 logs
php manage-security.php show-logs

# Ver estadísticas del sistema
php manage-security.php stats

# Generar nuevo hash de contraseña
php manage-security.php generate-hash
```

## 📁 Archivos del Sistema

```
cuentas.php                    # Lógica principal de seguridad
contents/cuentasContent.php    # UI integrada con seguridad
manage-security.php            # Herramienta CLI de administración

data/
├── tokens.json               # Tokens activos y expirados
├── blocked_ips.json          # IPs bloqueadas temporalmente
├── log.txt                   # Registro completo de accesos
└── README.md                 # Documentación técnica completa
```

## 🔍 Verificar Seguridad

### Ver logs recientes:
```bash
tail -n 50 data/log.txt
```

### Ver tokens activos:
```bash
cat data/tokens.json
```

### Ver IPs bloqueadas:
```bash
cat data/blocked_ips.json
```

## ⚙️ Personalización

### Cambiar Contraseña de Admin:

1. Generar nuevo hash:
```bash
php manage-security.php generate-hash
# Ingresar nueva contraseña cuando lo solicite
```

2. Actualizar en `cuentas.php`:
```php
define('ADMIN_PASSWORD_HASH', 'nuevo_hash_generado');
```

### Ajustar Tiempos:

Editar en `cuentas.php`:

```php
define('MAX_LOGIN_ATTEMPTS', 5);      // Cambiar intentos permitidos
define('LOCKOUT_TIME', 900);           // Cambiar tiempo de bloqueo (segundos)
define('TOKEN_EXPIRATION', 86400);     // Cambiar expiración de token (segundos)
```

## 🎯 Diferencias Clave

| Característica | Administrador | Usuario con Token |
|----------------|---------------|-------------------|
| Login requerido | ✅ Sí | ❌ No (acceso directo) |
| Ver contenido | ✅ Sí | ✅ Sí |
| Botón compartir | ✅ Visible | ❌ Oculto |
| Generar tokens | ✅ Sí | ❌ No |
| Cerrar sesión | ✅ Sí | ❌ N/A |
| Duración acceso | ♾️ Mientras sesión activa | ⏰ 24 horas |

## 📞 Soporte

Para dudas o problemas:
- 📧 Email: cmeraz@norttek.com.mx
- 📱 Teléfono: [tu número]

## ⚠️ Notas Importantes

1. **Seguridad de Archivos**
   - Los archivos en `data/` contienen información sensible
   - `.gitignore` configurado para NO subirlos a git
   - Verificar permisos: `data/` = 755, archivos = 644

2. **Backups**
   - Respaldar `data/tokens.json` periódicamente
   - Los logs pueden crecer, considerar rotación

3. **Tokens**
   - Cada token es de un solo uso por sesión
   - No compartir tokens públicamente
   - Revocar tokens comprometidos inmediatamente

4. **Monitoreo**
   - Revisar logs semanalmente
   - Verificar IPs bloqueadas inusuales
   - Validar tokens activos periódicamente

## 🎉 ¡Sistema Listo!

Tu página de cuentas ahora está completamente protegida con:
- ✅ Login seguro con hash bcrypt
- ✅ Protección contra fuerza bruta
- ✅ Sistema de compartición con tokens temporales
- ✅ Registro completo de accesos
- ✅ Herramientas CLI de administración
- ✅ Separación de privilegios admin/invitado

**Todo integrado con tu botón existente `btn-compartir`**
