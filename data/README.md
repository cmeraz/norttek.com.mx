# Sistema de Seguridad - Panel de Cuentas

## 📋 Descripción

Sistema completo de autenticación y compartición segura para el panel de cuentas de Norttek Solutions.

## 🔐 Características de Seguridad

### 1. Autenticación de Administrador
- **Usuario:** `cmeraz`
- **Contraseña:** `Root01068280`
- Almacenamiento seguro con `password_hash()` usando algoritmo bcrypt
- Regeneración automática de ID de sesión al iniciar sesión
- Variables de sesión: `admin_user`, `admin_role`, `login_time`

### 2. Protección contra Fuerza Bruta
- Máximo 5 intentos fallidos de login por IP
- Bloqueo automático de 15 minutos después de exceder límite
- Registro de todas las IPs bloqueadas en `blocked_ips.json`
- Limpieza automática de bloqueos expirados

### 3. Sistema de Tokens
- Generación de tokens únicos de 32 caracteres hexadecimales
- Expiración automática después de 24 horas
- Almacenamiento en `tokens.json` con metadata:
  - Fecha de creación
  - Timestamp de expiración
  - Usuario que lo creó
- Limpieza automática de tokens expirados al cargar la página

### 4. Registro de Accesos
- Log completo en `log.txt` con formato:
  - Timestamp
  - Dirección IP
  - Tipo de evento (login, token usado, error, etc.)
- Eventos registrados:
  - Logins exitosos y fallidos
  - Generación de tokens
  - Uso de tokens válidos
  - Intentos con tokens inválidos/expirados
  - Bloqueos de IP

### 5. Control de Acceso
- **Administrador:** Acceso completo, puede ver y usar botón de compartir
- **Usuario con token:** Acceso temporal de solo lectura, sin botón de compartir
- **Sin autenticación:** Pantalla de login

## 📁 Estructura de Archivos

```
data/
├── .gitignore          # Protege archivos sensibles
├── tokens.json         # Almacén de tokens activos
├── blocked_ips.json    # IPs bloqueadas temporalmente
└── log.txt            # Registro de todos los accesos
```

## 🔑 Flujo de Uso

### Como Administrador:
1. Iniciar sesión con credenciales
2. Ver contenido completo del panel
3. Clic en "Compartir Página" (botón existente `btn-compartir`)
4. Se genera automáticamente un enlace completo listo para copiar
5. El enlace es válido por 24 horas

### Como Usuario con Token:
1. Recibir enlace del administrador
2. Acceder mediante URL: `cuentas.php?token=XXXX`
3. Ver contenido en modo solo lectura
4. El botón de compartir NO es visible
5. Acceso expira después de 24 horas

## 🛡️ Medidas de Seguridad Implementadas

1. ✅ Sanitización de todas las entradas con `htmlspecialchars()`
2. ✅ Regeneración de session_id al autenticar
3. ✅ Contraseñas hasheadas con bcrypt (cost factor 10)
4. ✅ Tokens criptográficamente seguros con `random_bytes()`
5. ✅ Protección contra timing attacks en validación de contraseñas
6. ✅ Prevención de fuerza bruta con bloqueo temporal
7. ✅ Limpieza automática de datos expirados
8. ✅ Headers de seguridad (noindex, nofollow)
9. ✅ Logging completo de eventos de seguridad
10. ✅ Separación de privilegios (admin vs token)

## 📝 Personalización

### Cambiar credenciales de administrador:
```php
// En cuentas.php, modificar:
define('ADMIN_USER', 'nuevo_usuario');

// Generar nuevo hash:
php -r "echo password_hash('NuevaContraseña', PASSWORD_DEFAULT);"
// Actualizar:
define('ADMIN_PASSWORD_HASH', 'hash_generado');
```

### Ajustar tiempos:
```php
define('MAX_LOGIN_ATTEMPTS', 5);     // Intentos antes de bloquear
define('LOCKOUT_TIME', 900);          // 15 minutos en segundos
define('TOKEN_EXPIRATION', 86400);    // 24 horas en segundos
```

## 🔍 Verificación de Logs

Ver accesos recientes:
```bash
tail -n 50 data/log.txt
```

Ver tokens activos:
```bash
cat data/tokens.json | jq
```

Ver IPs bloqueadas:
```bash
cat data/blocked_ips.json | jq
```

## ⚠️ Notas Importantes

- Los archivos en `data/` contienen información sensible
- `.gitignore` está configurado para NO subirlos a git
- Asegurar que el directorio `data/` tenga permisos 755
- Los archivos JSON deben tener permisos 644
- Revisar logs periódicamente para detectar intentos de acceso no autorizado

## 🚀 Deploy

1. Subir archivos al servidor
2. Crear directorio `data/` con permisos correctos:
   ```bash
   mkdir data
   chmod 755 data
   ```
3. Los archivos JSON y log.txt se crearán automáticamente
4. Verificar que PHP tenga permisos de escritura en `data/`

## 📞 Soporte

Para dudas o problemas de seguridad, contactar a:
- Carlos Meraz - cmeraz@norttek.com.mx
