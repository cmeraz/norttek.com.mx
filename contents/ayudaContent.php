<?php
/**
 * Contenido de la página de Ayuda y Documentación
 * Estilo moderno similar a Stripe Docs
 */
?>

<div class="docs-container">
    <!-- Sidebar de navegación -->
    <aside class="docs-sidebar">
        <div class="sidebar-header">
            <h3>
                <i class="fa-solid fa-life-ring"></i>
                Centro de Ayuda
            </h3>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-section">
                <h4>Primeros pasos</h4>
                <ul>
                    <li><a href="#sitio-web" class="nav-link active">Cómo usar el sitio web</a></li>
                </ul>
            </div>
            
            <div class="nav-section">
                <h4>Hik-Connect App</h4>
                <ul>
                    <li><a href="#hik-crear-cuenta" class="nav-link">Crear cuenta</a></li>
                    <li><a href="#hik-recuperar-password" class="nav-link">Recuperar contraseña</a></li>
                    <li><a href="#hik-compartir-dispositivo" class="nav-link">Compartir dispositivo</a></li>
                    <li><a href="#hik-vista-tiempo-real" class="nav-link">Vista en tiempo real</a></li>
                    <li><a href="#hik-recuperar-grabaciones" class="nav-link">Recuperar grabaciones</a></li>
                </ul>
            </div>
            
            <div class="nav-section">
                <h4>Hik-Connect Teams</h4>
                <ul>
                    <li><a href="#teams-crear-cuenta" class="nav-link">Crear cuenta</a></li>
                    <li><a href="#teams-recuperar-password" class="nav-link">Recuperar contraseña</a></li>
                    <li><a href="#teams-usuario-equipo" class="nav-link">Crear usuario de equipo</a></li>
                    <li><a href="#teams-usuarios-app" class="nav-link">Crear usuarios app</a></li>
                    <li><a href="#teams-manipular-dispositivos" class="nav-link">Manipular dispositivos</a></li>
                </ul>
            </div>
            
            <div class="nav-section">
                <h4>Problemas con cámaras</h4>
                <ul>
                    <li><a href="#camaras-no-se-ven" class="nav-link">Mis cámaras no se ven</a></li>
                    <li><a href="#camaras-rayas" class="nav-link">Se ven con rayas</a></li>
                    <li><a href="#camaras-parpadean" class="nav-link">Parpadean</a></li>
                    <li><a href="#camaras-mala-calidad" class="nav-link">Se ve de mala calidad</a></li>
                </ul>
            </div>
            
            <div class="nav-section">
                <h4>Problemas de Internet</h4>
                <ul>
                    <li><a href="#internet-sin-conexion" class="nav-link">No tengo internet</a></li>
                    <li><a href="#internet-lento" class="nav-link">Está lento el servicio</a></li>
                    <li><a href="#internet-reportar-pago" class="nav-link">Cómo reportar pago</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="sidebar-footer">
            <div class="support-card">
                <h5>¿Necesitas más ayuda?</h5>
                <p>Contacta nuestro soporte técnico</p>
                <a href="https://wa.me/5242728100" class="support-btn" target="_blank">
                    <i class="fa-brands fa-whatsapp"></i>
                    Contactar
                </a>
            </div>
        </div>
    </aside>
    
    <!-- Contenido principal -->
    <main class="docs-main">
        <div class="docs-header">
            <h1>Centro de Ayuda Norttek</h1>
            <p class="docs-subtitle">Encuentra soluciones rápidas a los problemas más comunes con nuestros servicios</p>
            
            <!-- Búsqueda -->
            <div class="search-container">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" id="docs-search" placeholder="Buscar en la documentación..." aria-label="Buscar">
                    <div class="search-shortcut">⌘K</div>
                </div>
            </div>
        </div>
        
        <div class="docs-content">
            
            <!-- Sección: Cómo usar el sitio web -->
            <section id="sitio-web" class="docs-section">
                <h2>Cómo usar el sitio web</h2>
                <p class="section-intro">Aprende a navegar y aprovechar todas las funcionalidades de nuestro sitio web.</p>
                
                <div class="content-grid">
                    <div class="feature-card">
                        <div class="card-icon">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <h3>Crear cuenta</h3>
                        <p>Regístrate para acceder a tu panel de control y gestionar tus servicios.</p>
                        <div class="steps">
                            <div class="step">
                                <span class="step-number">1</span>
                                <div class="step-content">
                                    <h4>Ir al registro</h4>
                                    <p>Haz clic en "Crear cuenta" en la parte superior del sitio</p>
                                </div>
                            </div>
                            <div class="step">
                                <span class="step-number">2</span>
                                <div class="step-content">
                                    <h4>Completar información</h4>
                                    <p>Llena el formulario con tu información personal y de contacto</p>
                                </div>
                            </div>
                            <div class="step">
                                <span class="step-number">3</span>
                                <div class="step-content">
                                    <h4>Verificar email</h4>
                                    <p>Revisa tu correo y haz clic en el enlace de verificación</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="card-icon">
                            <i class="fa-solid fa-sign-in-alt"></i>
                        </div>
                        <h3>Iniciar sesión</h3>
                        <p>Accede a tu cuenta para ver tus servicios y dispositivos.</p>
                        <div class="code-example">
                            <div class="code-header">
                                <span>URL de acceso</span>
                            </div>
                            <code>https://norttek.com.mx/cuentas.php</code>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="card-icon">
                            <i class="fa-solid fa-dashboard"></i>
                        </div>
                        <h3>Panel de control</h3>
                        <p>Navega por tu dashboard personal para gestionar todos tus servicios.</p>
                        <ul class="feature-list">
                            <li>Ver estado de dispositivos</li>
                            <li>Consultar facturas</li>
                            <li>Contactar soporte</li>
                            <li>Gestionar configuración</li>
                        </ul>
                    </div>
                </div>
            </section>
            
            <!-- Sección: Hik-Connect -->
            <section id="hik-connect" class="docs-section">
                <h2>Hik-Connect App</h2>
                <p class="section-intro">La aplicación móvil oficial para monitorear tus cámaras desde cualquier lugar.</p>
                
                <div class="subsection" id="hik-crear-cuenta">
                    <h3>Crear cuenta</h3>
                    <p>Cómo registrarte en la aplicación Hik-Connect para comenzar a usar tus cámaras.</p>
                    
                    <div class="alert alert-info">
                        <i class="fa-solid fa-info-circle"></i>
                        <div>
                            <strong>Importante:</strong> Descarga únicamente la app oficial desde las tiendas oficiales.
                        </div>
                    </div>
                    
                    <div class="step-by-step">
                        <div class="step">
                            <span class="step-number">1</span>
                            <div class="step-content">
                                <h4>Descargar la app</h4>
                                <p>Busca "Hik-Connect" en tu tienda de aplicaciones</p>
                                <div class="download-links">
                                    <a href="https://play.google.com/store/apps/details?id=com.hikvision.hik_connect" target="_blank" class="download-btn android">
                                        <i class="fa-brands fa-android"></i>
                                        Google Play
                                    </a>
                                    <a href="https://apps.apple.com/app/hik-connect/id1241222880" target="_blank" class="download-btn ios">
                                        <i class="fa-brands fa-apple"></i>
                                        App Store
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="step">
                            <span class="step-number">2</span>
                            <div class="step-content">
                                <h4>Abrir y registrarse</h4>
                                <p>Abre la app y selecciona "Crear cuenta nueva"</p>
                            </div>
                        </div>
                        
                        <div class="step">
                            <span class="step-number">3</span>
                            <div class="step-content">
                                <h4>Completar registro</h4>
                                <p>Llena el formulario con tu información:</p>
                                <ul>
                                    <li>Email válido</li>
                                    <li>Contraseña segura (mínimo 8 caracteres)</li>
                                    <li>Código de país correcto</li>
                                    <li>Número de teléfono</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="step">
                            <span class="step-number">4</span>
                            <div class="step-content">
                                <h4>Verificar cuenta</h4>
                                <p>Revisa tu email y confirma tu cuenta haciendo clic en el enlace de verificación</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="subsection" id="hik-recuperar-password">
                    <h3>Recuperar contraseña</h3>
                    <p>Si olvidaste tu contraseña de Hik-Connect, puedes recuperarla fácilmente.</p>
                    
                    <div class="quick-steps">
                        <div class="quick-step">
                            <span class="step-icon"><i class="fa-solid fa-mobile-screen-button" aria-hidden="true"></i></span>
                            <h4>En la app</h4>
                            <p>Toca "¿Olvidaste tu contraseña?" en la pantalla de inicio de sesión</p>
                        </div>
                        <div class="quick-step">
                            <span class="step-icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></span>
                            <h4>Ingresa tu email</h4>
                            <p>Escribe el email que usaste para registrarte</p>
                        </div>
                        <div class="quick-step">
                            <span class="step-icon"><i class="fa-solid fa-key" aria-hidden="true"></i></span>
                            <h4>Revisa tu correo</h4>
                            <p>Sigue las instrucciones del email para crear una nueva contraseña</p>
                        </div>
                    </div>
                </div>
                
                <div class="subsection" id="hik-compartir-dispositivo">
                    <h3>Compartir dispositivo</h3>
                    <p>Permite que otros usuarios vean tus cámaras sin compartir tu contraseña principal.</p>
                    
                    <div class="code-block">
                        <div class="code-header">
                            <span>Pasos para compartir</span>
                        </div>
                        <div class="code-content">
                            1. Abre la app Hik-Connect<br>
                            2. Ve a "Dispositivos" <i class="fa-solid fa-arrow-right" aria-hidden="true"></i> Selecciona tu cámara<br>
                            3. Toca el ícono de compartir (<i class="fa-solid fa-users" aria-hidden="true"></i>)<br>
                            4. Ingresa el email del usuario destinatario<br>
                            5. Selecciona permisos (solo ver o ver + controlar)<br>
                            6. Envía la invitación
                        </div>
                    </div>
                    
                    <div class="alert alert-warning">
                        <i class="fa-solid fa-exclamation-triangle"></i>
                        <div>
                            <strong>Nota:</strong> El usuario invitado debe tener una cuenta de Hik-Connect activa.
                        </div>
                    </div>
                </div>
                
                <div class="subsection" id="hik-vista-tiempo-real">
                    <h3>Vista en tiempo real</h3>
                    <p>Cómo ver tus cámaras en vivo desde la aplicación móvil.</p>
                    
                    <div class="feature-showcase">
                        <div class="showcase-item">
                            <h4><i class="fa-solid fa-video" aria-hidden="true"></i> Vista única</h4>
                            <p>Toca cualquier cámara en tu lista para ver en pantalla completa</p>
                        </div>
                        <div class="showcase-item">
                            <h4><i class="fa-solid fa-mobile-screen-button" aria-hidden="true"></i> Vista múltiple</h4>
                            <p>Desliza hacia la izquierda para ver hasta 4 cámaras simultáneamente</p>
                        </div>
                        <div class="showcase-item">
                            <h4><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Zoom digital</h4>
                            <p>Pellizca para hacer zoom en áreas específicas de la imagen</p>
                        </div>
                        <div class="showcase-item">
                            <h4><i class="fa-solid fa-camera" aria-hidden="true"></i> Captura</h4>
                            <p>Toca el botón de cámara para tomar capturas de pantalla</p>
                        </div>
                    </div>
                </div>
                
                <div class="subsection" id="hik-recuperar-grabaciones">
                    <h3>Recuperar grabaciones</h3>
                    <p>Accede al historial de grabaciones de tus cámaras.</p>
                    
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker">1</div>
                            <div class="timeline-content">
                                <h4>Seleccionar cámara</h4>
                                <p>Elige la cámara de la cual quieres ver las grabaciones</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">2</div>
                            <div class="timeline-content">
                                <h4>Ir a Playback</h4>
                                <p>Toca el ícono de reproducción (<i class="fa-solid fa-play" aria-hidden="true"></i>) en la parte inferior</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">3</div>
                            <div class="timeline-content">
                                <h4>Seleccionar fecha</h4>
                                <p>Usa el calendario para elegir el día que quieres revisar</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">4</div>
                            <div class="timeline-content">
                                <h4>Reproducir</h4>
                                <p>Navega por la línea de tiempo y reproduce los eventos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Sección: Hik-Connect Teams -->
            <section id="hik-connect-teams" class="docs-section">
                <h2>Hik-Connect Teams</h2>
                <p class="section-intro">Gestión avanzada para equipos de trabajo y múltiples usuarios.</p>
                
                <div class="subsection" id="teams-crear-cuenta">
                    <h3>Crear cuenta</h3>
                    <p>Configura una cuenta de Teams para gestionar múltiples usuarios y dispositivos.</p>
                    
                    <div class="comparison-table">
                        <div class="table-header">
                            <div class="table-cell">Característica</div>
                            <div class="table-cell">Hik-Connect</div>
                            <div class="table-cell">Hik-Connect Teams</div>
                        </div>
                        <div class="table-row">
                            <div class="table-cell">Usuarios</div>
                            <div class="table-cell">Personal</div>
                            <div class="table-cell">Múltiples usuarios</div>
                        </div>
                        <div class="table-row">
                            <div class="table-cell">Dispositivos</div>
                            <div class="table-cell">Hasta 32</div>
                            <div class="table-cell">Ilimitados</div>
                        </div>
                        <div class="table-row">
                            <div class="table-cell">Gestión</div>
                            <div class="table-cell">Individual</div>
                            <div class="table-cell">Administrador central</div>
                        </div>
                    </div>
                </div>
                
                <div class="subsection" id="teams-usuario-equipo">
                    <h3>Crear usuario de equipo</h3>
                    <p>Añade miembros a tu organización con diferentes niveles de acceso.</p>
                    
                    <div class="card-grid">
                        <div class="info-card">
                            <div class="card-header">
                                <i class="fa-solid fa-user-shield"></i>
                                <h4>Administrador</h4>
                            </div>
                            <ul>
                                <li>Control total de dispositivos</li>
                                <li>Gestionar usuarios</li>
                                <li>Configurar permisos</li>
                                <li>Ver todos los reportes</li>
                            </ul>
                        </div>
                        <div class="info-card">
                            <div class="card-header">
                                <i class="fa-solid fa-user"></i>
                                <h4>Usuario estándar</h4>
                            </div>
                            <ul>
                                <li>Ver cámaras asignadas</li>
                                <li>Reproducir grabaciones</li>
                                <li>Recibir notificaciones</li>
                                <li>Controles básicos</li>
                            </ul>
                        </div>
                        <div class="info-card">
                            <div class="card-header">
                                <i class="fa-solid fa-eye"></i>
                                <h4>Solo visualización</h4>
                            </div>
                            <ul>
                                <li>Ver video en vivo</li>
                                <li>Acceso de solo lectura</li>
                                <li>Sin controles</li>
                                <li>Sin configuración</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Sección: Problemas con cámaras -->
            <section id="problemas-camaras" class="docs-section">
                <h2>Problemas con tus cámaras</h2>
                <p class="section-intro">Diagnóstico y solución de problemas comunes con sistemas de videovigilancia.</p>
                
                <div class="subsection" id="camaras-no-se-ven">
                    <h3>Mis cámaras no se ven</h3>
                    <p>Cuando las cámaras aparecen offline o no muestran imagen.</p>
                    
                    <div class="troubleshooting">
                        <div class="trouble-step">
                            <div class="trouble-icon error">
                                <i class="fa-solid fa-power-off"></i>
                            </div>
                            <div class="trouble-content">
                                <h4>Verificar alimentación</h4>
                                <ul>
                                    <li>Revisa que el adaptador esté conectado</li>
                                    <li>Verifica que la toma de corriente funcione</li>
                                    <li>Si usa PoE, revisa el switch o NVR</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="trouble-step">
                            <div class="trouble-icon warning">
                                <i class="fa-solid fa-ethernet"></i>
                            </div>
                            <div class="trouble-content">
                                <h4>Revisar conexión de red</h4>
                                <ul>
                                    <li>Verifica que el cable de red esté bien conectado</li>
                                    <li>Prueba con otro cable de red</li>
                                    <li>Revisa que el router/switch tenga energía</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="trouble-step">
                            <div class="trouble-icon info">
                                <i class="fa-solid fa-wifi"></i>
                            </div>
                            <div class="trouble-content">
                                <h4>Verificar conexión a internet</h4>
                                <ul>
                                    <li>Prueba tu internet desde otro dispositivo</li>
                                    <li>Reinicia tu router (desconecta 30 segundos)</li>
                                    <li>Verifica que no hay cortes de servicio</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-success">
                        <i class="fa-solid fa-lightbulb"></i>
                        <div>
                            <strong>Consejo:</strong> Si después de estos pasos sigue sin funcionar, contacta soporte técnico con el modelo de tu cámara y descrición del problema.
                        </div>
                    </div>
                </div>
                
                <div class="subsection" id="camaras-rayas">
                    <h3>Se ven con rayas</h3>
                    <p>Problemas de interferencia o configuración que causan líneas en la imagen.</p>
                    
                    <div class="solution-grid">
                        <div class="solution-card">
                            <h4><i class="fa-solid fa-plug" aria-hidden="true"></i> Interferencia eléctrica</h4>
                            <p><strong>Causa:</strong> Cables cerca de fuentes eléctricas</p>
                            <p><strong>Solución:</strong> Aleja los cables de transformadores, motores o luces LED</p>
                        </div>
                        <div class="solution-card">
                            <h4><i class="fa-solid fa-tv" aria-hidden="true"></i> Frecuencia incorrecta</h4>
                            <p><strong>Causa:</strong> Configuración de Hz incorrecta</p>
                            <p><strong>Solución:</strong> Cambiar de 50Hz a 60Hz (o viceversa) en configuración</p>
                        </div>
                        <div class="solution-card">
                            <h4><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i> Cable dañado</h4>
                            <p><strong>Causa:</strong> Cable coaxial o UTP en mal estado</p>
                            <p><strong>Solución:</strong> Reemplazar el cable de video/datos</p>
                        </div>
                    </div>
                </div>
                
                <div class="subsection" id="camaras-parpadean">
                    <h3>Parpadean</h3>
                    <p>La imagen se ve intermitente o parpadeante.</p>
                    
                    <div class="diagnostic-flow">
                        <div class="flow-step">
                            <div class="flow-question">¿El parpadeo es durante el día o la noche?</div>
                            <div class="flow-branches">
                                <div class="flow-branch">
                                    <div class="branch-label">Día</div>
                                    <div class="branch-content">
                                        <p>Problema de alimentación o configuración</p>
                                        <ul>
                                            <li>Revisar adaptador de corriente</li>
                                            <li>Verificar configuración de exposición</li>
                                            <li>Comprobar frecuencia de red (50/60Hz)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flow-branch">
                                    <div class="branch-label">Noche</div>
                                    <div class="branch-content">
                                        <p>Problema con infrarrojos</p>
                                        <ul>
                                            <li>Limpiar el lente de los IR</li>
                                            <li>Verificar configuración día/noche</li>
                                            <li>Ajustar sensibilidad del sensor</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="subsection" id="camaras-mala-calidad">
                    <h3>Se ve de mala calidad</h3>
                    <p>La imagen se ve borrosa, pixelada o con poca definición.</p>
                    
                    <div class="quality-checklist">
                        <div class="checklist-item">
                            <input type="checkbox" id="check1">
                            <label for="check1">
                                <span class="checkmark"></span>
                                <div class="check-content">
                                    <h4>Limpiar lente</h4>
                                    <p>Usar paño suave y limpiador específico para cámaras</p>
                                </div>
                            </label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="check2">
                            <label for="check2">
                                <span class="checkmark"></span>
                                <div class="check-content">
                                    <h4>Verificar resolución</h4>
                                    <p>Asegurar que esté configurada en la resolución máxima</p>
                                </div>
                            </label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="check3">
                            <label for="check3">
                                <span class="checkmark"></span>
                                <div class="check-content">
                                    <h4>Ajustar enfoque</h4>
                                    <p>Si la cámara lo permite, ajustar el enfoque manualmente</p>
                                </div>
                            </label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="check4">
                            <label for="check4">
                                <span class="checkmark"></span>
                                <div class="check-content">
                                    <h4>Comprobar ancho de banda</h4>
                                    <p>Verificar que la conexión a internet soporte la calidad configurada</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Sección: Problemas de Internet -->
            <section id="problemas-internet" class="docs-section">
                <h2>Problemas del servicio de Internet</h2>
                <p class="section-intro">Soluciona problemas de conectividad y velocidad de tu servicio de Internet.</p>
                
                <div class="subsection" id="internet-sin-conexion">
                    <h3>No tengo internet</h3>
                    <p>Pasos para diagnosticar y resolver problemas de conectividad total.</p>
                    
                    <div class="emergency-banner">
                        <i class="fa-solid fa-exclamation-circle"></i>
                        <div>
                            <strong>¿Es una emergencia?</strong>
                            <p>Si necesitas internet urgentemente, llámanos al <a href="tel:+5242728100">(424) 272-8100</a></p>
                        </div>
                    </div>
                    
                    <div class="step-by-step detailed">
                        <div class="step">
                            <span class="step-number">1</span>
                            <div class="step-content">
                                <h4>Verificar equipos</h4>
                                <div class="sub-steps">
                                    <div class="sub-step">
                                        <span class="bullet">•</span>
                                        <p>Revisa que el router tenga luz encendida</p>
                                    </div>
                                    <div class="sub-step">
                                        <span class="bullet">•</span>
                                        <p>Verifica que el módem esté conectado y con energía</p>
                                    </div>
                                    <div class="sub-step">
                                        <span class="bullet">•</span>
                                        <p>Asegúrate que todos los cables estén bien conectados</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="step">
                            <span class="step-number">2</span>
                            <div class="step-content">
                                <h4>Reiniciar equipos</h4>
                                <div class="restart-sequence">
                                    <div class="sequence-item">
                                        <span class="sequence-number">1</span>
                                        <p>Desconecta el módem (30 segundos)</p>
                                    </div>
                                    <div class="sequence-arrow"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></div>
                                    <div class="sequence-item">
                                        <span class="sequence-number">2</span>
                                        <p>Desconecta el router (30 segundos)</p>
                                    </div>
                                    <div class="sequence-arrow"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></div>
                                    <div class="sequence-item">
                                        <span class="sequence-number">3</span>
                                        <p>Conecta primero el módem</p>
                                    </div>
                                    <div class="sequence-arrow"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></div>
                                    <div class="sequence-item">
                                        <span class="sequence-number">4</span>
                                        <p>Espera 2 minutos y conecta el router</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="step">
                            <span class="step-number">3</span>
                            <div class="step-content">
                                <h4>Probar conexión</h4>
                                <p>Conecta un dispositivo directamente al router con cable Ethernet y prueba la conexión</p>
                            </div>
                        </div>
                        
                        <div class="step">
                            <span class="step-number">4</span>
                            <div class="step-content">
                                <h4>Si sigue sin funcionar</h4>
                                <div class="contact-options">
                                    <a href="https://wa.me/5242728100?text=No%20tengo%20internet" class="contact-btn whatsapp">
                                        <i class="fa-brands fa-whatsapp"></i>
                                        WhatsApp Soporte
                                    </a>
                                    <a href="tel:+5242728100" class="contact-btn phone">
                                        <i class="fa-solid fa-phone"></i>
                                        Llamar ahora
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="subsection" id="internet-lento">
                    <h3>Está lento el servicio</h3>
                    <p>Diagnóstico y optimización de la velocidad de tu conexión a Internet.</p>
                    
                    <div class="speed-test-card">
                        <h4><i class="fa-solid fa-rocket" aria-hidden="true"></i> Test de velocidad</h4>
                        <p>Antes de reportar lentitud, realiza una prueba de velocidad:</p>
                        <div class="test-buttons">
                            <a href="https://www.speedtest.net/" target="_blank" class="test-btn">Speedtest.net</a>
                            <a href="https://fast.com/" target="_blank" class="test-btn">Fast.com</a>
                            <a href="https://speed.google.com/" target="_blank" class="test-btn">Google Speed Test</a>
                        </div>
                    </div>
                    
                    <div class="optimization-tips">
                        <h4>Consejos para optimizar tu conexión:</h4>
                        <div class="tips-grid">
                            <div class="tip-card">
                                <span class="tip-icon"><i class="fa-solid fa-mobile-screen-button" aria-hidden="true"></i></span>
                                <h5>Limita dispositivos conectados</h5>
                                <p>Desconecta dispositivos que no estés usando activamente</p>
                            </div>
                            <div class="tip-card">
                                <span class="tip-icon"><i class="fa-solid fa-tv" aria-hidden="true"></i></span>
                                <h5>Pausa streaming innecesario</h5>
                                <p>Detén Netflix, YouTube u otras apps de video que consuman ancho de banda</p>
                            </div>
                            <div class="tip-card">
                                <span class="tip-icon"><i class="fa-solid fa-download" aria-hidden="true"></i></span>
                                <h5>Pausa descargas grandes</h5>
                                <p>Suspende actualizaciones automáticas y descargas de archivos pesados</p>
                            </div>
                            <div class="tip-card">
                                <span class="tip-icon"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span>
                                <h5>Acércate al router</h5>
                                <p>Si usas WiFi, prueba conectarte más cerca del router o usa cable</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="speed-comparison">
                        <h4>¿Qué velocidad deberías tener?</h4>
                        <div class="speed-table">
                            <div class="speed-row header">
                                <div>Plan contratado</div>
                                <div>Velocidad mínima esperada</div>
                                <div>Uso recomendado</div>
                            </div>
                            <div class="speed-row">
                                <div>10 Mbps</div>
                                <div>8-9 Mbps</div>
                                <div>Navegación básica, 1-2 dispositivos</div>
                            </div>
                            <div class="speed-row">
                                <div>20 Mbps</div>
                                <div>16-18 Mbps</div>
                                <div>Streaming HD, 3-4 dispositivos</div>
                            </div>
                            <div class="speed-row">
                                <div>50 Mbps</div>
                                <div>40-45 Mbps</div>
                                <div>4K streaming, 5-8 dispositivos</div>
                            </div>
                            <div class="speed-row">
                                <div>100 Mbps</div>
                                <div>80-90 Mbps</div>
                                <div>Uso intensivo, 10+ dispositivos</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="subsection" id="internet-reportar-pago">
                    <h3>Cómo reportar pago</h3>
                    <p>Procedimiento para informar que has realizado el pago de tu servicio.</p>
                    
                    <div class="payment-methods">
                        <h4>Métodos de reporte según tu forma de pago:</h4>
                        
                        <div class="method-card">
                            <div class="method-header">
                                <i class="fa-solid fa-building-columns"></i>
                                <h5>Transferencia bancaria</h5>
                            </div>
                            <div class="method-content">
                                <p><strong>Qué necesitas:</strong></p>
                                <ul>
                                    <li>Comprobante de transferencia (captura o PDF)</li>
                                    <li>Monto exacto transferido</li>
                                    <li>Fecha y hora de la transferencia</li>
                                    <li>Últimos 4 dígitos de tu cuenta origen</li>
                                </ul>
                                <div class="report-buttons">
                                    <a href="https://wa.me/5242728100?text=Reportar%20pago%20por%20transferencia" class="report-btn primary">
                                        <i class="fa-brands fa-whatsapp"></i>
                                        Reportar por WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="method-card">
                            <div class="method-header">
                                <i class="fa-solid fa-credit-card"></i>
                                <h5>Tarjeta de crédito/débito</h5>
                            </div>
                            <div class="method-content">
                                <p><strong>Qué necesitas:</strong></p>
                                <ul>
                                    <li>Número de autorización</li>
                                    <li>Monto cargado</li>
                                    <li>Fecha y hora del cargo</li>
                                    <li>Últimos 4 dígitos de tu tarjeta</li>
                                </ul>
                                <div class="report-buttons">
                                    <a href="https://wa.me/5242728100?text=Reportar%20pago%20con%20tarjeta" class="report-btn primary">
                                        <i class="fa-brands fa-whatsapp"></i>
                                        Reportar por WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="method-card">
                            <div class="method-header">
                                <i class="fa-solid fa-money-bills"></i>
                                <h5>Pago en efectivo</h5>
                            </div>
                            <div class="method-content">
                                <p><strong>Qué necesitas:</strong></p>
                                <ul>
                                    <li>Ticket o comprobante del establecimiento</li>
                                    <li>Nombre del lugar donde pagaste</li>
                                    <li>Fecha y hora del pago</li>
                                    <li>Monto exacto pagado</li>
                                </ul>
                                <div class="report-buttons">
                                    <a href="https://wa.me/5242728100?text=Reportar%20pago%20en%20efectivo" class="report-btn primary">
                                        <i class="fa-brands fa-whatsapp"></i>
                                        Reportar por WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fa-solid fa-clock"></i>
                        <div>
                            <strong>Tiempo de procesamiento:</strong>
                            <ul>
                                <li>Transferencias SPEI: Inmediato a 2 horas</li>
                                <li>Tarjetas: Inmediato a 30 minutos</li>
                                <li>Efectivo: 2 a 24 horas</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
        
        <!-- Navegación inferior -->
        <div class="docs-navigation">
            <div class="nav-links">
                <a href="#" class="nav-link prev">
                    <i class="fa-solid fa-chevron-left"></i>
                    <span>Anterior</span>
                </a>
                <a href="#" class="nav-link next">
                    <span>Siguiente</span>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>
        </div>
        
        <!-- Footer de ayuda -->
        <div class="docs-footer-section">
            <div class="footer-content">
                <h3>¿Te ayudó esta información?</h3>
                <div class="feedback-buttons">
                    <button class="feedback-btn positive">
                        <i class="fa-solid fa-thumbs-up"></i>
                        Sí, me ayudó
                    </button>
                    <button class="feedback-btn negative">
                        <i class="fa-solid fa-thumbs-down"></i>
                        No me sirvió
                    </button>
                </div>
            </div>
            
            <div class="footer-contact">
                <h4>¿Necesitas más ayuda?</h4>
                <p>Nuestro equipo de soporte está disponible 24/7</p>
                <div class="contact-grid">
                    <a href="https://wa.me/5242728100" class="contact-option whatsapp" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i>
                        <div>
                            <strong>WhatsApp</strong>
                            <span>Respuesta inmediata</span>
                        </div>
                    </a>
                    <a href="tel:+5242728100" class="contact-option phone">
                        <i class="fa-solid fa-phone"></i>
                        <div>
                            <strong>Teléfono</strong>
                            <span>(424) 272-8100</span>
                        </div>
                    </a>
                    <a href="mailto:soporte@norttek.com.mx" class="contact-option email">
                        <i class="fa-solid fa-envelope"></i>
                        <div>
                            <strong>Email</strong>
                            <span>soporte@norttek.com.mx</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
    </main>
</div>