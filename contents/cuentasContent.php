<?php
/**
 * cuentasContent.php
 * Dashboard privado de cuentas de pago y datos empresariales
 * Carlos Prisciliano Meraz Marioni - Norttek Solutions
 * Estilo: Dashboard de clientes (internetContent.php)
 */
?>

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
      <div class="flex flex-wrap justify-center gap-4 mt-8 opacity-0 nt-heading-anim delay-lg" style="transform:translateY(34px) scale(.955);">
        <button id="btn-compartir" class="nt-btn" data-variant="primary">
          <i class="fa-solid fa-share-alt" aria-hidden="true"></i>
          <span>Compartir Página</span>
        </button>
        <button id="btn-descargar-contactos" class="nt-btn" data-variant="accent">
          <i class="fa-solid fa-address-card" aria-hidden="true"></i>
          <span>Descargar vCards</span>
        </button>
      </div>
    </div>
  </section>

  <!-- Dashboard Principal -->
  <section class="cuentas-dashboard scroll-anim">
    <?= nt_heading('Información de Contacto y Cuentas', 'fa-solid fa-building-columns', 'md', null, ['animate'=>true,'delay'=>'sm']); ?>
    <p class="cuentas-dashboard-sub">Accede rápidamente a todos los datos empresariales y cuentas de pago de Norttek Solutions.</p>

    <!-- Grid de Cards -->
    <div class="cuentas-grid">
      
      <!-- Card de Información Personal -->
      <article class="cuentas-card profile-card wide nt-soft-seq nt-delay-1" data-nt-anim>
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
              <p class="rfc-badge">RFC: MEMC82010646A</p>
              <p class="curp-badge">CURP: MEMC820106HCHRRR03</p>
            </div>
          </div>
          
          <div class="contact-grid">
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
              <code class="clip-src" data-clip="6258374179">
                625-837-4179
                <button type="button" class="clip-btn" data-clip="6258374179" title="Copiar" aria-label="Copiar teléfono">
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
      <article class="cuentas-card company-card wide nt-soft-seq nt-delay-2" data-nt-anim>
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
      <article class="cuentas-card fiscal-card wide nt-soft-seq nt-delay-3" data-nt-anim>
        <h3>
          <i class="fa-solid fa-file-invoice" aria-hidden="true" data-nt-icon-drift></i> 
          Información Fiscal SAT
        </h3>
        <p>Datos oficiales registrados ante el Servicio de Administración Tributaria</p>
        
        <div class="fiscal-content">
          <div class="fiscal-header">
            <div class="sat-logo">
              <i class="fa-solid fa-certificate"></i>
            </div>
            <div class="fiscal-info">
              <h4>Constancia de Situación Fiscal</h4>
              <p class="fiscal-date">Actualizada: 28 de Septiembre de 2025</p>
            </div>
          </div>

          <div class="fiscal-grid">
            <div class="fiscal-item-modern">
              <span class="fiscal-label">Estado en el Padrón</span>
              <code class="clip-src status-active" data-clip="ACTIVO">
                ACTIVO
                <button type="button" class="clip-btn" data-clip="ACTIVO" title="Copiar" aria-label="Copiar estado">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
            
            <div class="fiscal-item-modern">
              <span class="fiscal-label">Fecha Inicio de Operaciones</span>
              <code class="clip-src" data-clip="20 de Septiembre de 2010">
                20 de Septiembre de 2010
                <button type="button" class="clip-btn" data-clip="20 de Septiembre de 2010" title="Copiar" aria-label="Copiar fecha inicio">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>

            <div class="fiscal-item-modern wide">
              <span class="fiscal-label">Actividades Económicas Principales</span>
              <div class="activities-list">
                <div class="activity-item">
                  <span class="activity-percentage">50%</span>
                  <span class="activity-desc">Comercio al por menor de artículos de papelería</span>
                </div>
                <div class="activity-item">
                  <span class="activity-percentage">30%</span>
                  <span class="activity-desc">Comercio al por menor de computadoras y sus accesorios</span>
                </div>
                <div class="activity-item">
                  <span class="activity-percentage">10%</span>
                  <span class="activity-desc">Comercio de teléfonos, aparatos de comunicación y accesorios</span>
                </div>
                <div class="activity-item">
                  <span class="activity-percentage">10%</span>
                  <span class="activity-desc">Comercio al por mayor de equipo de telecomunicaciones</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <small class="hint-url">Información oficial del SAT</small>
      </article>

      <!-- Card de Cuenta Santander -->
      <article class="cuentas-card bank-card santander-card wide nt-soft-seq nt-delay-4" data-nt-anim>
        <h3>
          <i class="fa-solid fa-university" aria-hidden="true" data-nt-icon-drift></i> 
          Cuenta Santander
        </h3>
        <div class="bank-content">
          <div class="bank-grid">
            <div class="bank-item-modern">
              <span class="bank-label">Sucursal</span>
              <code class="clip-src" data-clip="3792">
                3792
                <button type="button" class="clip-btn" data-clip="3792" title="Copiar" aria-label="Copiar sucursal">
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
              <code class="clip-src" data-clip="5579-0701-1270-7628">
                5579-0701-1270-7628
                <button type="button" class="clip-btn" data-clip="5579-0701-1270-7628" title="Copiar" aria-label="Copiar tarjeta">
                  <i class="fa-regular fa-clone"></i>
                </button>
              </code>
            </div>
          </div>
          
          <button type="button" class="cuentas-btn btn-select-account" data-account="santander">
            <i class="fa-solid fa-check"></i>
            Seleccionar Cuenta
          </button>
        </div>
        <small class="hint-url">Cuenta principal para pagos</small>
      </article>

      <!-- Card de Solicitud de Link de Pago -->
      <article class="cuentas-card payment-card nt-soft-seq nt-delay-5" data-nt-anim>
        <h3>
          <i class="fa-solid fa-link" aria-hidden="true" data-nt-icon-drift></i> 
          Solicitar Link de Pago
        </h3>
        <p>Genera un link de pago seguro con Clip para facilitar las transacciones.</p>
        
        <div class="clip-info-modern">
          <div class="clip-icon">
            <i class="fa-solid fa-mobile-alt"></i>
          </div>
          <p>Integración con plataforma Clip</p>
        </div>

        <form class="payment-form-modern" id="payment-request-form">
          <div class="form-group-modern">
            <label for="payment-amount">Monto</label>
            <div class="input-wrapper-modern">
              <span class="currency-symbol">$</span>
              <input type="number" id="payment-amount" name="amount" placeholder="0.00" step="0.01" min="1">
            </div>
          </div>
          
          <div class="form-group-modern">
            <label for="payment-concept">Concepto</label>
            <input type="text" id="payment-concept" name="concept" placeholder="Servicio de instalación CCTV">
          </div>
          
          <div class="form-group-modern">
            <label for="client-name">Cliente</label>
            <input type="text" id="client-name" name="client" placeholder="Nombre del cliente">
          </div>
          
          <button type="submit" class="cuentas-btn">
            <i class="fa-solid fa-paper-plane"></i>
            Generar Link de Pago
          </button>
        </form>
        
        <small class="hint-url">Integración con Clip</small>
      </article>

      <!-- Card de Ayuda y Soporte -->
      <article class="cuentas-card help-card nt-soft-seq nt-delay-6" data-nt-anim>
        <h3>
          <i class="fa-solid fa-headset" aria-hidden="true" data-nt-icon-drift></i> 
          Soporte y Ayuda
        </h3>
        <p>¿Necesitas ayuda con alguna funcionalidad? Contáctanos directamente.</p>
        
        <div class="support-options">
          <button type="button" class="cuentas-btn btn-soporte-wa" data-wa="Necesito ayuda con el panel de cuentas.">
            <i class="fa-brands fa-whatsapp"></i>
            WhatsApp Soporte
          </button>
          
          <div class="contact-quick">
            <div class="quick-contact">
              <i class="fa-solid fa-phone"></i>
              <span>625-269-0997</span>
            </div>
          </div>
        </div>
        
        <small class="hint-url">Soporte técnico disponible</small>
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