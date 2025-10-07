<?php
/**
 * cuentasContent.php
 * Dashboard privado de cuentas de pago y datos empresariales
 * Carlos Prisciliano Meraz Marioni - Norttek Solutions
 * Estilo: Dashboard de clientes (internetContent.php)
 * 
 * SEGURIDAD: Solo visible para administradores autenticados o usuarios con token válido
 */

// Obtener variables de seguridad desde cuentas.php
$showShareButton = $showShareButton ?? false;
$isAdmin = $isAdmin ?? false;
?>

<!-- Mensajes de sistema (solo admin) -->
<?php if ($isAdmin && isset($successMessage)): ?>
<div style="position: fixed; top: 20px; right: 20px; z-index: 9999; background: #4caf50; color: white; padding: 16px 24px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); max-width: 400px;">
    <strong><i class="fa-solid fa-check-circle"></i> Éxito</strong>
    <p style="margin: 8px 0 0 0;"><?= htmlspecialchars($successMessage) ?></p>
    <div style="margin-top: 12px; padding: 10px; background: rgba(255,255,255,0.2); border-radius: 4px;">
        <p style="margin: 0; font-size: 12px; font-weight: 600;">Enlace de compartición:</p>
        <input type="text" id="generated-token-url" value="<?= htmlspecialchars($tokenURL ?? '') ?>" 
               style="width: 100%; padding: 8px; margin-top: 6px; border: none; border-radius: 4px; font-family: monospace; font-size: 12px;" 
               readonly onclick="this.select()">
        <button onclick="copyTokenURL()" style="margin-top: 8px; width: 100%; padding: 8px; background: white; color: #4caf50; border: none; border-radius: 4px; font-weight: 600; cursor: pointer;">
            <i class="fa-solid fa-copy"></i> Copiar Enlace
        </button>
    </div>
    <button onclick="this.parentElement.remove()" style="position: absolute; top: 8px; right: 8px; background: none; border: none; color: white; font-size: 20px; cursor: pointer; opacity: 0.7; line-height: 1;">&times;</button>
</div>
<script>
function copyTokenURL() {
    const input = document.getElementById('generated-token-url');
    input.select();
    document.execCommand('copy');
    
    const btn = event.target.closest('button');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="fa-solid fa-check"></i> ¡Copiado!';
    btn.style.background = '#2e7d32';
    btn.style.color = 'white';
    
    setTimeout(() => {
        btn.innerHTML = originalText;
        btn.style.background = 'white';
        btn.style.color = '#4caf50';
    }, 2000);
}
</script>
<?php endif; ?>

<!-- Admin Toolbar (solo visible para administrador) -->
<?php if ($isAdmin): ?>
<div style="position: fixed; bottom: 20px; left: 20px; z-index: 9999; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); font-size: 14px;">
    <i class="fa-solid fa-shield-halved"></i> <strong>Sesión Admin:</strong> <?= htmlspecialchars($_SESSION['admin_user'] ?? '') ?>
    <a href="?logout" style="margin-left: 16px; color: white; text-decoration: underline;">
        <i class="fa-solid fa-sign-out-alt"></i> Cerrar Sesión
    </a>
</div>
<?php endif; ?>

<!-- Contenedor principal estilo Internet App -->
<div class="cuentas-app">
  
  <!-- Hero Section con estilo Norttek -->
  <section class="nt-hero-wrapper is-soft cuentas-hero" style="min-height:360px;" aria-label="Panel de Cuentas Norttek">
    <div class="hero-content max-w-6xl mx-auto px-6 py-12 text-center flex flex-col items-center">
      <div class="opacity-0 nt-heading-anim delay-sm" style="transform:translateY(34px) scale(.955);">
        <?= nt_heading('Panel de Cuentas', 'fa-solid fa-credit-card', 'xl', null, ['animate'=>false,'class'=>'nt-heading-hero nt-heading-invert nt-heading-accent-bar']); ?>
      </div>
      <p class="nt-hero-sub nt-hero-sub-invert nt-heading-anim delay-md" style="opacity:0; transform:translateY(34px) scale(.955); max-width:720px;">
        Información empresarial, datos de contacto y cuentas de pago de Norttek Solutions
      </p>
      </p>
      <div class="flex flex-wrap justify-center gap-4 mt-8 opacity-0 nt-heading-anim delay-lg" style="transform:translateY(34px) scale(.955);">
        
        <!-- Botón Compartir (solo visible para admin) -->
        <?php if ($showShareButton): ?>
        <form method="POST" action="" style="display: inline-block; margin: 0;">
            <button type="submit" name="generate_token" id="btn-compartir" class="nt-btn" data-variant="primary">
                <i class="fa-solid fa-share-alt" aria-hidden="true"></i>
                <span>Compartir Página</span>
            </button>
        </form>
        <?php endif; ?>
        
        <button id="btn-descargar-contactos" class="nt-btn" data-variant="accent">
          <i class="fa-solid fa-address-card" aria-hidden="true"></i>
          <span>Descargar vCards</span>
        </button>
        </button>
      </div>
    </div>
  </section>

  <!-- Menú de Tabs Horizontales -->
  <section class="cuentas-tabs-menu">
    <div class="tabs-container">
      <nav class="tabs-nav">
        <button class="tab-button active" data-tab="cuenta-santander" title="Cuenta Bancaria" data-tooltip="Cuenta Bancaria">
          <div class="tab-icon">
            <i class="fa-solid fa-university"></i>
          </div>
          <span class="tab-text">Cuenta Bancaria</span>
        </button>
        <button class="tab-button" data-tab="info-fiscal" title="Información Fiscal" data-tooltip="Información Fiscal">
          <div class="tab-icon">
            <i class="fa-solid fa-file-invoice"></i>
          </div>
          <span class="tab-text">Información Fiscal</span>
        </button>
        <button class="tab-button" data-tab="info-empresarial" title="Datos Empresariales" data-tooltip="Datos Empresariales">
          <div class="tab-icon">
            <i class="fa-solid fa-building"></i>
          </div>
          <span class="tab-text">Datos de la Empresa</span>
        </button>
        <button class="tab-button" data-tab="info-personal" title="Información Personal" data-tooltip="Información Personal">
          <div class="tab-icon">
            <i class="fa-solid fa-user-circle"></i>
          </div>
          <span class="tab-text">Información Personal</span>
        </button>
      </nav>
    </div>
  </section>

  <!-- Dashboard Principal -->
  <section class="cuentas-dashboard scroll-anim">
    <?= nt_heading('Información de Cuentas Bancarias y Datos de Contacto', 'fa-solid fa-building-columns', 'md', null, ['animate'=>true,'delay'=>'sm']); ?>
    <p class="cuentas-dashboard-sub">Accede rápidamente a todos los datos bancarios y cuentas de pago de Norttek Solutions.</p>

    <!-- Grid de Cards -->
    <div class="cuentas-grid">
      
      <!-- Card de Información Personal -->
      <article id="info-personal" class="cuentas-card profile-card wide nt-soft-seq nt-delay-1 tab-content" data-nt-anim>
        <h3>
          <i class="fa-solid fa-user-circle" aria-hidden="true" data-nt-icon-drift></i> 
          Información Personal
        </h3>
        <div class="profile-content">
          <div class="profile-header">
            <div class="avatar-modern">
              <span class="avatar-initials">CM</span>
            </div>
            <div class="profile-info">
              <h4>Carlos Prisciliano Meraz Marioni</h4>
              <p class="title-badge">Arq. - Propietario</p>
              <p class="rfc-badge">RFC: MEMC82010646A</p>
              <p class="curp-badge">CURP: MEMC820106HCHRRR03</p>
            </div>
          </div>
          
          <div class="contact-grid">
            <div class="contact-item-modern">
              <span class="contact-label">RFC</span>
              <code class="clip-src" data-clip="MEMC82010646A">
                MEMC82010646A
                <button type="button" class="clip-btn" data-clip="MEMC82010646A" title="Copiar" aria-label="Copiar RFC">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="contact-item-modern">
              <span class="contact-label">CURP</span>
              <code class="clip-src" data-clip="MEMC820106HCHRRR03">
                MEMC820106HCHRRR03
                <button type="button" class="clip-btn" data-clip="MEMC820106HCHRRR03" title="Copiar" aria-label="Copiar CURP">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="contact-item-modern">
              <span class="contact-label">Email Personal</span>
              <code class="clip-src" data-clip="cmeraz3944@gmail.com">
                cmeraz3944@gmail.com
                <button type="button" class="clip-btn" data-clip="cmeraz3944@gmail.com" title="Copiar" aria-label="Copiar email personal">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="contact-item-modern">
              <span class="contact-label">Teléfono Móvil</span>
              <code class="clip-src" data-clip="+52-625-837-4179">
                (625) 837-4179
                <button type="button" class="clip-btn" data-clip="+52-625-837-4179" title="Copiar" aria-label="Copiar teléfono">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="contact-item-modern">
              <span class="contact-label">Dirección</span>
              <code class="clip-src" data-clip="Calle Rayón y Agustín Melgar #608 Col Centro, Cd. Cuauhtémoc, Chihuahua, 31500">
                Calle Rayón y Agustín Melgar #608<br>
                Col Centro, Cd. Cuauhtémoc<br>
                Chihuahua, 31500
                <button type="button" class="clip-btn" data-clip="Calle Rayón y Agustín Melgar #608 Col Centro, Cd. Cuauhtémoc, Chihuahua, 31500" title="Copiar" aria-label="Copiar dirección">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
          </div>

          <button type="button" class="cuentas-btn btn-contact" data-contact="personal">
            <i class="fa-solid fa-download"></i>
            Descargar vCard Personal
          </button>
        </div>
        <small class="hint-url">Datos personales del propietario</small>
      </article>

      <!-- Card de Información Empresarial -->
      <article id="info-empresarial" class="cuentas-card company-card wide nt-soft-seq nt-delay-2 tab-content" data-nt-anim>
        <h3>
          <i class="fa-solid fa-building" aria-hidden="true" data-nt-icon-drift></i> 
          Norttek Solutions
        </h3>
        <div class="company-content">
          <div class="company-header">
            <div class="company-logo-container">
              <img src="assets/img/logo-norttek.png" alt="Norttek Solutions" class="company-logo-img">
            </div>
            <div class="company-info">
              <h4>Norttek Solutions</h4>
              <p class="company-tagline">Soluciones de Seguridad Integral</p>
            </div>
          </div>

          <div class="contact-grid">
            <div class="contact-item-modern">
              <span class="contact-label">Dirección Fiscal</span>
              <code class="clip-src" data-clip="Av. Rayón y Agustín Melgar #608, Col. Ciudad Cuauhtémoc Centro, 31500, Cuauhtémoc, Chihuahua">
                Av. Rayón y Agustín Melgar #608<br>
                Col. Ciudad Cuauhtémoc Centro<br>
                31500, Cuauhtémoc, Chihuahua
                <button type="button" class="clip-btn" data-clip="Av. Rayón y Agustín Melgar #608, Col. Ciudad Cuauhtémoc Centro, 31500, Cuauhtémoc, Chihuahua" title="Copiar" aria-label="Copiar dirección fiscal">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="contact-item-modern">
              <span class="contact-label">Email Corporativo</span>
              <code class="clip-src" data-clip="contacto@norttek.com.mx">
                contacto@norttek.com.mx
                <button type="button" class="clip-btn" data-clip="contacto@norttek.com.mx" title="Copiar" aria-label="Copiar email corporativo">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="contact-item-modern">
              <span class="contact-label">Teléfono Cuauhtémoc</span>
              <code class="clip-src" data-clip="6252690997">
                (625) 269-0997
                <button type="button" class="clip-btn" data-clip="6252690997" title="Copiar" aria-label="Copiar teléfono Cuauhtémoc">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="contact-item-modern">
              <span class="contact-label">Teléfono Chihuahua</span>
              <code class="clip-src" data-clip="6146180778">
                (614) 618-0778
                <button type="button" class="clip-btn" data-clip="6146180778" title="Copiar" aria-label="Copiar teléfono Chihuahua">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="contact-item-modern">
              <span class="contact-label">Régimen Fiscal</span>
              <code class="clip-src" data-clip="Régimen Simplificado de Confianza">
                Régimen Simplificado de Confianza
                <button type="button" class="clip-btn" data-clip="Régimen Simplificado de Confianza" title="Copiar" aria-label="Copiar régimen fiscal">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
          </div>

          <button type="button" class="cuentas-btn btn-contact" data-contact="empresa">
            <i class="fa-solid fa-download"></i>
            Descargar vCard Empresa
          </button>
        </div>
        <small class="hint-url">Información corporativa oficial</small>
      </article>

      <!-- Card de Información Fiscal SAT -->
      <article id="info-fiscal" class="cuentas-card fiscal-card wide nt-soft-seq nt-delay-3 tab-content" data-nt-anim>
        <h3>
          <i class="fa-solid fa-file-invoice" aria-hidden="true" data-nt-icon-drift></i> 
          Información Fiscal SAT
        </h3>
        <p>Datos oficiales registrados ante el Servicio de Administración Tributaria</p>
        
        <div class="fiscal-content">
          <a href="assets/documents/SAT.pdf" download="Constancia_Situacion_Fiscal_Norttek.pdf" class="fiscal-header fiscal-download-btn" title="Descargar Constancia de Situación Fiscal">
            <div class="sat-logo">
              <img src="assets/img/SAT-logo.png" alt="Logo SAT" class="sat-logo-img">
            </div>
            <div class="fiscal-info">
              <h4>Constancia de Situación Fiscal</h4>
              <p class="fiscal-date">Cuauhtémoc, Chihuahua - 28 de Septiembre de 2025</p>
              <div class="download-indicator">
                <i class="fa-solid fa-download" aria-hidden="true"></i>
                <span>Hacer clic para descargar</span>
              </div>
            </div>
          </a>

          <div class="fiscal-grid">
            <div class="fiscal-item-modern">
              <span class="fiscal-label">Nombre Completo</span>
              <code class="clip-src" data-clip="Carlos Prisciliano Meraz Marioni">
                Carlos Prisciliano Meraz Marioni
                <button type="button" class="clip-btn" data-clip="Carlos Prisciliano Meraz Marioni" title="Copiar" aria-label="Copiar nombre">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">RFC</span>
              <code class="clip-src rfc-badge" data-clip="MEMC82010646A">
                MEMC82010646A
                <button type="button" class="clip-btn" data-clip="MEMC82010646A" title="Copiar" aria-label="Copiar RFC">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">CURP</span>
              <code class="clip-src curp-badge" data-clip="MEMC820106HCHRRR03">
                MEMC820106HCHRRR03
                <button type="button" class="clip-btn" data-clip="MEMC820106HCHRRR03" title="Copiar" aria-label="Copiar CURP">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">ID CIF</span>
              <code class="clip-src cif-badge" data-clip="15010076730">
                15010076730
                <button type="button" class="clip-btn" data-clip="15010076730" title="Copiar" aria-label="Copiar ID CIF">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">Calle y Número</span>
              <code class="clip-src" data-clip="Av. Rayón y Agustín Melgar #608">
                Av. Rayón y Agustín Melgar #608
                <button type="button" class="clip-btn" data-clip="Av. Rayón y Agustín Melgar #608" title="Copiar" aria-label="Copiar calle y número">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">Colonia</span>
              <code class="clip-src" data-clip="Ciudad Cuauhtémoc Centro">
                Ciudad Cuauhtémoc Centro
                <button type="button" class="clip-btn" data-clip="Ciudad Cuauhtémoc Centro" title="Copiar" aria-label="Copiar colonia">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">Ciudad</span>
              <code class="clip-src" data-clip="Cuauhtémoc">
                Cuauhtémoc
                <button type="button" class="clip-btn" data-clip="Cuauhtémoc" title="Copiar" aria-label="Copiar ciudad">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">Estado</span>
              <code class="clip-src" data-clip="Chihuahua">
                Chihuahua
                <button type="button" class="clip-btn" data-clip="Chihuahua" title="Copiar" aria-label="Copiar estado">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">Código Postal</span>
              <code class="clip-src" data-clip="31500">
                31500
                <button type="button" class="clip-btn" data-clip="31500" title="Copiar" aria-label="Copiar código postal">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern wide">
              <span class="fiscal-label">Domicilio Fiscal Completo</span>
              <code class="clip-src" data-clip="Av. Rayón y Agustín Melgar #608, Col. Ciudad Cuauhtémoc Centro, 31500, Cuauhtémoc, Chihuahua">
                Av. Rayón y Agustín Melgar #608<br>
                Col. Ciudad Cuauhtémoc Centro<br>
                31500, Cuauhtémoc, Chihuahua
                <button type="button" class="clip-btn" data-clip="Av. Rayón y Agustín Melgar #608, Col. Ciudad Cuauhtémoc Centro, 31500, Cuauhtémoc, Chihuahua" title="Copiar" aria-label="Copiar domicilio completo">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">Estado en el Padrón</span>
              <code class="clip-src status-active" data-clip="ACTIVO">
                ACTIVO
                <button type="button" class="clip-btn" data-clip="ACTIVO" title="Copiar" aria-label="Copiar estado padrón">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">Fecha Inicio Operaciones</span>
              <code class="clip-src" data-clip="20 de Septiembre de 2010">
                20 de Septiembre de 2010
                <button type="button" class="clip-btn" data-clip="20 de Septiembre de 2010" title="Copiar" aria-label="Copiar fecha inicio">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern">
              <span class="fiscal-label">Último Cambio de Estado</span>
              <code class="clip-src" data-clip="08 de Mayo de 2013">
                08 de Mayo de 2013
                <button type="button" class="clip-btn" data-clip="08 de Mayo de 2013" title="Copiar" aria-label="Copiar último cambio">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
          </div>
        </div>
        <small class="hint-url">Información oficial del SAT • <i class="fa-solid fa-shield-check"></i> Certificado</small>
      </article>

      <!-- Card de Cuenta Santander -->
      <article id="cuenta-santander" class="cuentas-card bank-card santander-card wide nt-soft-seq nt-delay-4 tab-content active" data-nt-anim>
        <h3>
          <i class="fa-solid fa-university" aria-hidden="true" data-nt-icon-drift></i> 
          Cuenta Santander
        </h3>
        <p>Información completa para transferencias bancarias y pagos</p>
        
        <div class="bank-content">
          <div class="bank-grid">
            <div class="bank-item-modern">
              <span class="bank-label">Titular de la Cuenta</span>
              <code class="clip-src" data-clip="Carlos Prisciliano Meraz Marioni">
                Carlos Prisciliano Meraz Marioni
                <button type="button" class="clip-btn" data-clip="Carlos Prisciliano Meraz Marioni" title="Copiar" aria-label="Copiar titular">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="bank-item-modern highlight">
              <span class="bank-label">Número de Cuenta</span>
              <code class="clip-src" data-clip="60-58246039-4">
                60-58246039-4
                <button type="button" class="clip-btn" data-clip="60-58246039-4" title="Copiar" aria-label="Copiar cuenta">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="bank-item-modern highlight">
              <span class="bank-label">CLABE Interbancaria</span>
              <code class="clip-src" data-clip="014094605824603941">
                014094605824603941
                <button type="button" class="clip-btn" data-clip="014094605824603941" title="Copiar" aria-label="Copiar CLABE">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            <div class="bank-item-modern">
              <span class="bank-label">Tarjeta</span>
              <code class="clip-src" data-clip="5579-0701-6225-6427">
                5579-0701-6225-6427
                <button type="button" class="clip-btn" data-clip="5579-0701-6225-6427" title="Copiar" aria-label="Copiar tarjeta">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
          </div>

          <!-- Pago de Facturas con Tarjeta Clip.mx -->
          <div class="clip-payment-section" style="background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%); border: 1px solid #22c55e; border-radius: 12px; padding: 1.2rem; margin-bottom: 1.5rem;">
            <h4 style="color: #16a34a; margin: 0 0 0.8rem 0; display: flex; align-items: center; gap: 0.5rem; font-size: 1rem;">
              <i class="fa-solid fa-credit-card" style="color: #22c55e;"></i> 
              Pago de Facturas con Tarjeta
            </h4>
            <p style="margin: 0 0 1rem 0; color: #374151; font-size: 0.9rem; line-height: 1.5;">
              Paga tus facturas de forma rápida y segura con tarjeta de crédito o débito a través de Clip.mx
            </p>
            <a href="https://clip.mx/@NorttekSolutions" target="_blank" rel="noopener noreferrer" 
               style="display: inline-flex; align-items: center; gap: 0.5rem; background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); color: white; padding: 0.75rem 1.25rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.9rem; letter-spacing: 0.3px; text-transform: uppercase; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(34, 197, 94, 0.2);">
              <i class="fa-solid fa-external-link-alt"></i>
              Pagar con Clip.mx
            </a>
            <div style="margin-top: 0.8rem; padding-top: 0.8rem; border-top: 1px solid #bbf7d0;">
              <small style="color: #6b7280; font-size: 0.8rem;">
                <i class="fa-solid fa-shield-check" style="color: #22c55e; margin-right: 0.3rem;"></i>
                Pagos seguros procesados por Clip México
              </small>
            </div>
          </div>

          <!-- Información para Transferencias -->
          <div class="transfer-info">
            <h4><i class="fa-solid fa-exchange-alt"></i> Información para Transferencias</h4>
            <div class="transfer-grid">
              <div class="transfer-item-modern wide">
                <span class="transfer-label">Concepto de Pago Recomendado</span>
                <code class="clip-src concept-template" data-clip="[Tu Razón Social] - Factura(s): [Folios a liquidar]">
                  <span class="template-placeholder">[Tu Razón Social]</span> - Factura(s): <span class="template-placeholder">[Folios a liquidar]</span>
                  <button type="button" class="clip-btn" data-clip="[Tu Razón Social] - Factura(s): [Folios a liquidar]" title="Copiar" aria-label="Copiar concepto template">
                    <i class="fa-regular fa-clone"></i>
                  </button>
                </code>
              </div>
            </div>
            <div class="transfer-note">
              <i class="fa-solid fa-info-circle"></i>
              <span>Para facilitar la identificación de tu pago, incluye en el concepto tu razón social o nombre completo, seguido de los folios de las facturas que estás liquidando.</span>
            </div>
          </div>
          
          <button type="button" class="cuentas-btn btn-select-account" data-account="santander">
            <i class="fa-solid fa-check"></i>
            Seleccionar Cuenta
          </button>
        </div>
        <small class="hint-url">Cuenta principal para pagos y transferencias bancarias</small>
      </article>

    </div>
  </section>

</div>

<!-- Modal de Confirmación estilo Internet -->
<div id="modal-confirmacion" class="nt-modal-backdrop" style="display: none;" aria-hidden="true" role="dialog" aria-modal="true">
  <div class="nt-modal" role="document">
    <button type="button" class="nt-modal-close" data-nt-modal-close aria-label="Cerrar">&times;</button>
    <h3 id="modal-title" class="nt-modal-title" style="display:flex; align-items:center; gap:.5rem;">
      <i class="fa-solid fa-info-circle" aria-hidden="true"></i>
      Confirmación
    </h3>
    <p class="nt-modal-sub">Confirma la acción que deseas realizar.</p>
    <div class="modal-body">
      <div id="modal-content"></div>
    </div>
    <div class="nt-modal-actions">
      <button id="modal-confirm" class="btn-primario btn btn-primary">Confirmar</button>
      <button type="button" class="btn-secundario btn btn-secondary" data-nt-modal-close>Cancelar</button>
    </div>
  </div>
</div>