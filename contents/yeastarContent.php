<?php
/**
 * yeastarContent.php
 * Contenido principal de la página de Yeastar Cloud PBX
 * 
 * Esta página presenta información sobre el sistema Yeastar Cloud PBX,
 * incluyendo características, planes, precios y casos de uso.
 * 
 * Estructura:
 * - Hero: Presentación principal del servicio
 * - Características: Principales ventajas de Yeastar
 * - Planes: Diferentes opciones de suscripción
 * - Casos de uso: Ejemplos de empresas
 * - FAQ: Preguntas frecuentes
 * - CTA: Llamados a la acción
 */
?>

<style>
    :root {
        --yeastar-primary: #1E5EFF;
        --yeastar-primary-dark: #0D47D9;
        --yeastar-secondary: #00D4AA;
        --yeastar-accent: #FF6B35;
        --yeastar-dark: #0F1419;
        --yeastar-text: #2D3748;
        --yeastar-text-light: #718096;
        --yeastar-bg: #FFFFFF;
        --yeastar-bg-light: #F7FAFC;
        --yeastar-bg-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --yeastar-border: #E2E8F0;
        --yeastar-shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
        --yeastar-shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --yeastar-shadow-lg: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
        --yeastar-shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Inter', Roboto, 'Helvetica Neue', Arial, sans-serif;
        color: var(--yeastar-text);
        background: var(--yeastar-bg);
        line-height: 1.6;
        overflow-x: hidden;
    }

    .yeastar-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* ==========================================
       HERO SECTION - Inspirado en Yeastar
       ========================================== */
    .yeastar-hero {
        position: relative;
        padding: 120px 0 80px;
        background: linear-gradient(135deg, #f6f9fc 0%, #eef2f7 100%);
        overflow: hidden;
    }

    .yeastar-hero::before {
        content: '';
        position: absolute;
        top: 0;
        right: -10%;
        width: 60%;
        height: 100%;
        background: radial-gradient(ellipse at center, rgba(30, 94, 255, 0.08) 0%, transparent 70%);
        pointer-events: none;
    }

    .yeastar-hero-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .yeastar-hero-left {
        animation: fadeInUp 0.8s ease-out;
    }

    .yeastar-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: rgba(30, 94, 255, 0.1);
        border: 1px solid rgba(30, 94, 255, 0.2);
        border-radius: 50px;
        color: var(--yeastar-primary);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 24px;
    }

    .yeastar-hero h1 {
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 800;
        line-height: 1.2;
        color: var(--yeastar-dark);
        margin-bottom: 24px;
        letter-spacing: -0.02em;
    }

    .yeastar-hero h1 .highlight {
        background: linear-gradient(135deg, var(--yeastar-primary), var(--yeastar-secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .yeastar-hero-lead {
        font-size: 18px;
        color: var(--yeastar-text-light);
        margin-bottom: 32px;
        line-height: 1.8;
        max-width: 540px;
    }

    .yeastar-cta-group {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .yeastar-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 28px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        border: none;
        outline: none;
    }

    .yeastar-btn-primary {
        background: var(--yeastar-primary);
        color: white;
        box-shadow: 0 4px 14px rgba(30, 94, 255, 0.3);
    }

    .yeastar-btn-primary:hover {
        background: var(--yeastar-primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 94, 255, 0.4);
    }

    .yeastar-btn-outline {
        background: white;
        color: var(--yeastar-primary);
        border: 2px solid var(--yeastar-border);
    }

    .yeastar-btn-outline:hover {
        border-color: var(--yeastar-primary);
        background: rgba(30, 94, 255, 0.05);
        transform: translateY(-2px);
    }

    .yeastar-hero-trust {
        font-size: 14px;
        color: var(--yeastar-text-light);
    }

    .yeastar-hero-right {
        position: relative;
        animation: fadeInRight 0.8s ease-out;
    }

    .yeastar-hero-mockup {
        position: relative;
        background: white;
        border-radius: 20px;
        padding: 20px;
        box-shadow: var(--yeastar-shadow-xl);
        transform: perspective(1000px) rotateY(-5deg);
        transition: transform 0.5s ease;
    }

    .yeastar-hero-mockup:hover {
        transform: perspective(1000px) rotateY(0deg);
    }

    .yeastar-hero-mockup img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        display: block;
    }

    /* ==========================================
       FEATURES SECTION
       ========================================== */
    .yeastar-section {
        padding: 80px 0;
    }

    .yeastar-section-header {
        text-align: center;
        max-width: 720px;
        margin: 0 auto 60px;
    }

    .yeastar-section-title {
        font-size: clamp(32px, 4vw, 42px);
        font-weight: 700;
        color: var(--yeastar-dark);
        margin-bottom: 16px;
        letter-spacing: -0.02em;
    }

    .yeastar-section-subtitle {
        font-size: 18px;
        color: var(--yeastar-text-light);
        line-height: 1.7;
    }

    .yeastar-features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 32px;
    }

    .yeastar-feature-card {
        background: white;
        padding: 32px;
        border-radius: 16px;
        border: 1px solid var(--yeastar-border);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .yeastar-feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--yeastar-primary), var(--yeastar-secondary));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .yeastar-feature-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--yeastar-shadow-lg);
        border-color: var(--yeastar-primary);
    }

    .yeastar-feature-card:hover::before {
        transform: scaleX(1);
    }

    .yeastar-feature-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 20px;
        background: linear-gradient(135deg, rgba(30, 94, 255, 0.1), rgba(0, 212, 170, 0.1));
    }

    .yeastar-feature-card h4 {
        font-size: 20px;
        font-weight: 700;
        color: var(--yeastar-dark);
        margin-bottom: 12px;
    }

    .yeastar-feature-card p {
        color: var(--yeastar-text-light);
        font-size: 15px;
        line-height: 1.7;
    }

    /* ==========================================
       HOW IT WORKS SECTION
       ========================================== */
    .yeastar-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
        position: relative;
    }

    .yeastar-step {
        position: relative;
        text-align: center;
        padding: 40px 24px;
    }

    .yeastar-step-number {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--yeastar-primary), var(--yeastar-secondary));
        color: white;
        font-size: 24px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        box-shadow: 0 8px 20px rgba(30, 94, 255, 0.3);
    }

    .yeastar-step h4 {
        font-size: 20px;
        font-weight: 700;
        color: var(--yeastar-dark);
        margin-bottom: 12px;
    }

    .yeastar-step p {
        color: var(--yeastar-text-light);
        font-size: 15px;
    }

    /* ==========================================
       PLANS SECTION
       ========================================== */
    .yeastar-bg-alt {
        background: var(--yeastar-bg-light);
    }

    .yeastar-plans-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 32px;
        max-width: 1100px;
        margin: 0 auto;
    }

    .yeastar-plan-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        border: 2px solid var(--yeastar-border);
        transition: all 0.3s ease;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .yeastar-plan-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--yeastar-shadow-xl);
        border-color: var(--yeastar-primary);
    }

    .yeastar-plan-card.featured {
        border-color: var(--yeastar-primary);
        box-shadow: 0 0 0 1px var(--yeastar-primary), var(--yeastar-shadow-lg);
        transform: scale(1.05);
    }

    .yeastar-plan-badge {
        position: absolute;
        top: -12px;
        right: 24px;
        padding: 6px 16px;
        background: var(--yeastar-accent);
        color: white;
        font-size: 12px;
        font-weight: 700;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .yeastar-plan-name {
        font-size: 24px;
        font-weight: 700;
        color: var(--yeastar-dark);
        margin-bottom: 16px;
    }

    .yeastar-plan-price {
        font-size: 42px;
        font-weight: 800;
        color: var(--yeastar-primary);
        margin-bottom: 8px;
    }

    .yeastar-plan-price span {
        font-size: 18px;
        color: var(--yeastar-text-light);
        font-weight: 500;
    }

    .yeastar-plan-description {
        color: var(--yeastar-text-light);
        font-size: 15px;
        margin-bottom: 28px;
        padding-bottom: 28px;
        border-bottom: 1px solid var(--yeastar-border);
    }

    .yeastar-plan-features {
        list-style: none;
        margin-bottom: 32px;
        flex-grow: 1;
    }

    .yeastar-plan-features li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 12px;
        font-size: 15px;
        color: var(--yeastar-text);
    }

    .yeastar-plan-features li::before {
        content: '✓';
        color: var(--yeastar-secondary);
        font-weight: 700;
        font-size: 18px;
    }

    /* ==========================================
       TESTIMONIALS SECTION
       ========================================== */
    .yeastar-testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 32px;
    }

    .yeastar-testimonial {
        background: white;
        padding: 32px;
        border-radius: 16px;
        border: 1px solid var(--yeastar-border);
        box-shadow: var(--yeastar-shadow-sm);
        transition: all 0.3s ease;
    }

    .yeastar-testimonial:hover {
        box-shadow: var(--yeastar-shadow-md);
        transform: translateY(-4px);
    }

    .yeastar-testimonial-text {
        font-size: 16px;
        line-height: 1.8;
        color: var(--yeastar-text);
        margin-bottom: 20px;
        font-style: italic;
    }

    .yeastar-testimonial-author {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .yeastar-testimonial-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--yeastar-primary), var(--yeastar-secondary));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 20px;
    }

    .yeastar-testimonial-info strong {
        display: block;
        color: var(--yeastar-dark);
        font-weight: 600;
        font-size: 15px;
    }

    .yeastar-testimonial-info span {
        color: var(--yeastar-text-light);
        font-size: 14px;
    }

    /* ==========================================
       FAQ SECTION
       ========================================== */
    .yeastar-faq-list {
        max-width: 800px;
        margin: 0 auto;
    }

    .yeastar-faq-item {
        background: white;
        border: 1px solid var(--yeastar-border);
        border-radius: 12px;
        margin-bottom: 16px;
        overflow: hidden;
    }

    .yeastar-faq-item summary {
        padding: 24px;
        cursor: pointer;
        font-weight: 600;
        font-size: 17px;
        color: var(--yeastar-dark);
        list-style: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.2s ease;
    }

    .yeastar-faq-item summary:hover {
        background: var(--yeastar-bg-light);
    }

    .yeastar-faq-item summary::after {
        content: '+';
        font-size: 24px;
        color: var(--yeastar-primary);
        transition: transform 0.2s ease;
    }

    .yeastar-faq-item[open] summary::after {
        transform: rotate(45deg);
    }

    .yeastar-faq-content {
        padding: 0 24px 24px;
        color: var(--yeastar-text-light);
        line-height: 1.7;
    }

    /* ==========================================
       CONTACT FORM SECTION
       ========================================== */
    .yeastar-contact-form {
        max-width: 700px;
        margin: 0 auto;
        background: white;
        padding: 48px;
        border-radius: 20px;
        box-shadow: var(--yeastar-shadow-lg);
        border: 1px solid var(--yeastar-border);
    }

    .yeastar-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .yeastar-form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .yeastar-form-group.full-width {
        grid-column: 1 / -1;
    }

    .yeastar-form-label {
        font-size: 14px;
        font-weight: 600;
        color: var(--yeastar-dark);
    }

    .yeastar-form-input,
    .yeastar-form-select,
    .yeastar-form-textarea {
        padding: 14px 16px;
        border: 2px solid var(--yeastar-border);
        border-radius: 10px;
        font-size: 15px;
        font-family: inherit;
        transition: all 0.2s ease;
        outline: none;
    }

    .yeastar-form-input:focus,
    .yeastar-form-select:focus,
    .yeastar-form-textarea:focus {
        border-color: var(--yeastar-primary);
        box-shadow: 0 0 0 3px rgba(30, 94, 255, 0.1);
    }

    .yeastar-form-textarea {
        resize: vertical;
        min-height: 120px;
    }

    /* ==========================================
       ANIMATIONS
       ========================================== */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* ==========================================
       RESPONSIVE DESIGN
       ========================================== */
    @media (max-width: 768px) {
        .yeastar-hero {
            padding: 80px 0 60px;
        }

        .yeastar-hero-content {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .yeastar-hero h1 {
            font-size: 36px;
        }

        .yeastar-hero-mockup {
            transform: none;
        }

        .yeastar-section {
            padding: 60px 0;
        }

        .yeastar-features-grid {
            grid-template-columns: 1fr;
        }

        .yeastar-steps {
            grid-template-columns: 1fr;
        }

        .yeastar-plans-grid {
            grid-template-columns: 1fr;
        }

        .yeastar-plan-card.featured {
            transform: scale(1);
        }

        .yeastar-testimonials-grid {
            grid-template-columns: 1fr;
        }

        .yeastar-form-grid {
            grid-template-columns: 1fr;
        }

        .yeastar-contact-form {
            padding: 32px 24px;
        }

        .yeastar-cta-group {
            flex-direction: column;
        }

        .yeastar-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- ============================================
     HERO SECTION
     ============================================ -->
<section class="yeastar-hero">
  <div class="yeastar-container">
    <div class="yeastar-hero-content">
      <div class="yeastar-hero-left">
        <div class="yeastar-badge">
          <img src="assets/img/yeastar-hero/Yeastar-Logo-Vector.svg-.png" alt="Yeastar Logo" style="height:32px;vertical-align:middle;"> 
        </div>
        <h1>Centralita telefónica en la nube con <span class="highlight">Yeastar</span></h1>
        <p class="yeastar-hero-lead">Gestiona todas las comunicaciones de tu negocio desde cualquier lugar con nuestra plataforma avanzada de telefonía IP. Fácil, escalable y sin complicaciones.</p>
        <div class="yeastar-cta-group">
          <a href="#contacto" class="yeastar-btn yeastar-btn-primary" onclick="scrollToContact(event)">
            <span>Solicitar Demo</span>
            <span>→</span>
          </a>
          <a href="#planes" class="yeastar-btn yeastar-btn-outline" onclick="scrollToPlans(event)">
            <span>Ver Planes</span>
            <span>→</span>
          </a>
        </div>
        <p class="yeastar-hero-trust">✓ Sin instalación local • ✓ Actualización automática • ✓ Soporte experto 24/7</p>
      </div>
      <div class="yeastar-hero-right">
        <div class="yeastar-hero-mockup">
          <img src="/assets/img/yeastar-hero/linkus-desktop-client-banner.png" alt="Linkus Desktop Client - Dashboard Yeastar Cloud PBX">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================
     FEATURES SECTION
     ============================================ -->
<section class="yeastar-section" id="features">
  <div class="yeastar-container">
    <div class="yeastar-section-header">
      <h2 class="yeastar-section-title">¿Por qué elegir Yeastar Cloud PBX?</h2>
      <p class="yeastar-section-subtitle">Una solución completa para transformar las comunicaciones de tu empresa con tecnología de última generación.</p>
    </div>
    
    <div class="yeastar-features-grid">
      <div class="yeastar-feature-card">
        <div class="yeastar-feature-icon">📞</div>
        <h4>Llamadas desde cualquier lugar</h4>
        <p>Atiende desde tu celular, laptop o teléfono de escritorio con la misma extensión. Total flexibilidad para trabajar remoto o híbrido.</p>
      </div>
      
      <div class="yeastar-feature-card">
        <div class="yeastar-feature-icon">⚡</div>
        <h4>Instalación rápida</h4>
        <p>Configuración guiada en minutos. Sin necesidad de equipos físicos complejos ni técnicos especializados. Empieza a operar el mismo día.</p>
      </div>
      
      <div class="yeastar-feature-card">
        <div class="yeastar-feature-icon">🔒</div>
        <h4>Seguridad empresarial</h4>
        <p>Conexiones cifradas, respaldo automático en la nube y cumplimiento de estándares internacionales de seguridad.</p>
      </div>
      
      <div class="yeastar-feature-card">
        <div class="yeastar-feature-icon">🔗</div>
        <h4>Integraciones inteligentes</h4>
        <p>Conecta con CRM, WhatsApp Business, Microsoft Teams, Linkus UC y más de 100 aplicaciones empresariales.</p>
      </div>
      
      <div class="yeastar-feature-card">
        <div class="yeastar-feature-icon">📊</div>
        <h4>Reportes en tiempo real</h4>
        <p>Analiza métricas de llamadas, rendimiento del equipo y satisfacción del cliente con dashboards interactivos.</p>
      </div>
      
      <div class="yeastar-feature-card">
        <div class="yeastar-feature-icon">🌐</div>
        <h4>Escalabilidad infinita</h4>
        <p>Crece sin límites: añade extensiones, usuarios y funciones según las necesidades de tu empresa.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================
     HOW IT WORKS SECTION
     ============================================ -->
<section class="yeastar-section yeastar-bg-alt">
  <div class="yeastar-container">
    <div class="yeastar-section-header">
      <h2 class="yeastar-section-title">Cómo funciona en 3 pasos</h2>
      <p class="yeastar-section-subtitle">Un proceso simple y transparente para que tu empresa empiece a operar con telefonía profesional.</p>
    </div>
    
    <div class="yeastar-steps">
      <div class="yeastar-step">
        <div class="yeastar-step-number">1</div>
        <h4>Conserva tu número</h4>
        <p>Migramos tu número actual o te asignamos uno nuevo sin afectar a tus clientes. Sin interrupciones en el servicio.</p>
      </div>
      
      <div class="yeastar-step">
        <div class="yeastar-step-number">2</div>
        <h4>Instala la App Linkus</h4>
        <p>Descarga la app móvil y de escritorio para atender llamadas desde cualquier dispositivo con tu extensión corporativa.</p>
      </div>
      
      <div class="yeastar-step">
        <div class="yeastar-step-number">3</div>
        <h4>Administra desde la web</h4>
        <p>Panel intuitivo para gestionar extensiones, colas de llamadas, grabaciones, reportes y toda tu configuración.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================
     PLANS SECTION
     ============================================ -->
<section class="yeastar-section" id="planes">
  <div class="yeastar-container">
    <div class="yeastar-section-header">
      <h2 class="yeastar-section-title">Planes diseñados para cada empresa</h2>
      <p class="yeastar-section-subtitle">Elige el plan que mejor se adapte al tamaño y necesidades de tu negocio. Precios transparentes sin sorpresas.</p>
    </div>
    
    <div class="yeastar-plans-grid">
      <!-- Plan Básico -->
      <div class="yeastar-plan-card">
        <h3 class="yeastar-plan-name">Básico</h3>
        <div class="yeastar-plan-price">$XX<span> /mes</span></div>
        <p class="yeastar-plan-description">Ideal para pequeños negocios y emprendedores que empiezan.</p>
        <ul class="yeastar-plan-features">
          <li>Hasta 10 extensiones</li>
          <li>5 llamadas concurrentes</li>
          <li>App Linkus incluida</li>
          <li>Grabación de llamadas</li>
          <li>Soporte por email</li>
          <li>IVR básico</li>
        </ul>
        <button class="yeastar-btn yeastar-btn-outline" onclick="openDemoForm('Básico')" style="width:100%">Solicitar demo</button>
      </div>
      
      <!-- Plan Profesional (Destacado) -->
      <div class="yeastar-plan-card featured">
        <div class="yeastar-plan-badge">Más popular</div>
        <h3 class="yeastar-plan-name">Profesional</h3>
        <div class="yeastar-plan-price">$XX<span> /mes</span></div>
        <p class="yeastar-plan-description">Para empresas en crecimiento que necesitan más capacidad.</p>
        <ul class="yeastar-plan-features">
          <li>Hasta 50 extensiones</li>
          <li>25 llamadas concurrentes</li>
          <li>Integración CRM</li>
          <li>Colas de llamadas avanzadas</li>
          <li>Reportes y analytics</li>
          <li>Soporte prioritario 24/7</li>
          <li>WhatsApp Business</li>
          <li>IVR multinivel</li>
        </ul>
        <button class="yeastar-btn yeastar-btn-primary" onclick="openDemoForm('Profesional')" style="width:100%">Solicitar demo</button>
      </div>
      
      <!-- Plan Empresarial -->
      <div class="yeastar-plan-card">
        <h3 class="yeastar-plan-name">Empresarial</h3>
        <div class="yeastar-plan-price">$XX<span> /mes</span></div>
        <p class="yeastar-plan-description">Solución completa para grandes organizaciones.</p>
        <ul class="yeastar-plan-features">
          <li>100+ extensiones ilimitadas</li>
          <li>Llamadas concurrentes ilimitadas</li>
          <li>Integración Microsoft Teams</li>
          <li>Contact Center completo</li>
          <li>API personalizada</li>
          <li>Soporte dedicado 24/7</li>
          <li>Onboarding personalizado</li>
          <li>SLA garantizado</li>
        </ul>
        <button class="yeastar-btn yeastar-btn-outline" onclick="openDemoForm('Empresarial')" style="width:100%">Solicitar demo</button>
      </div>
    </div>
  </div>
</section>

<!-- ============================================
     TESTIMONIALS SECTION
     ============================================ -->
<section class="yeastar-section yeastar-bg-alt">
  <div class="yeastar-container">
    <div class="yeastar-section-header">
      <h2 class="yeastar-section-title">Qué dicen nuestros clientes</h2>
      <p class="yeastar-section-subtitle">Historias reales de empresas que transformaron sus comunicaciones con Yeastar.</p>
    </div>
    
    <div class="yeastar-testimonials-grid">
      <div class="yeastar-testimonial">
        <p class="yeastar-testimonial-text">"Antes teníamos líneas saturadas y perdíamos llamadas importantes. Con Yeastar ahora contestamos desde cualquier lugar y nuestro equipo puede trabajar remoto sin problemas. La inversión se pagó sola en 3 meses."</p>
        <div class="yeastar-testimonial-author">
          <div class="yeastar-testimonial-avatar">AB</div>
          <div class="yeastar-testimonial-info">
            <strong>Antonio Benítez</strong>
            <span>Director, Empresa ABC</span>
          </div>
        </div>
      </div>
      
      <div class="yeastar-testimonial">
        <p class="yeastar-testimonial-text">"La migración fue increíblemente fácil. El equipo de Norttek nos ayudó en todo el proceso y no tuvimos ni un minuto de inactividad. Los reportes nos permiten optimizar la atención al cliente constantemente."</p>
        <div class="yeastar-testimonial-author">
          <div class="yeastar-testimonial-avatar">MG</div>
          <div class="yeastar-testimonial-info">
            <strong>María González</strong>
            <span>Gerente de Operaciones, Clínica XYZ</span>
          </div>
        </div>
      </div>
      
      <div class="yeastar-testimonial">
        <p class="yeastar-testimonial-text">"La integración con nuestro CRM fue un game changer. Ahora vemos el historial del cliente antes de contestar. El ROI es impresionante: aumentamos las ventas un 35% en el primer trimestre."</p>
        <div class="yeastar-testimonial-author">
          <div class="yeastar-testimonial-avatar">RC</div>
          <div class="yeastar-testimonial-info">
            <strong>Roberto Castro</strong>
            <span>Gerente Comercial, Tech Solutions</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================
     FAQ SECTION
     ============================================ -->
<section class="yeastar-section" id="faq">
  <div class="yeastar-container">
    <div class="yeastar-section-header">
      <h2 class="yeastar-section-title">Preguntas frecuentes</h2>
      <p class="yeastar-section-subtitle">Resolvemos las dudas más comunes sobre Yeastar Cloud PBX.</p>
    </div>
    
    <div class="yeastar-faq-list">
      <details class="yeastar-faq-item">
        <summary>¿Puedo conservar mi número telefónico actual?</summary>
        <div class="yeastar-faq-content">
          <p>Sí, en la mayoría de los casos podemos portar tu número actual sin interrumpir el servicio. El proceso de portabilidad toma entre 5-10 días hábiles dependiendo de tu proveedor actual. También podemos asignarte un número nuevo si lo prefieres.</p>
        </div>
      </details>
      
      <details class="yeastar-faq-item">
        <summary>¿Qué sucede si se va la luz en mi oficina?</summary>
        <div class="yeastar-faq-content">
          <p>Al ser una solución 100% en la nube, si tu oficina pierde energía las llamadas siguen funcionando. Puedes redirigirlas automáticamente a celulares, sucursales o trabajar desde casa. Tus clientes nunca notarán la diferencia.</p>
        </div>
      </details>
      
      <details class="yeastar-faq-item">
        <summary>¿Necesito comprar teléfonos especiales?</summary>
        <div class="yeastar-faq-content">
          <p>No es obligatorio. Puedes usar la aplicación Linkus en celulares y computadoras sin costo adicional. Si prefieres teléfonos físicos IP, son compatibles con más de 200 modelos de marcas como Yealink, Fanvil y Grandstream.</p>
        </div>
      </details>
      
      <details class="yeastar-faq-item">
        <summary>¿Cuánto tiempo toma la implementación?</summary>
        <div class="yeastar-faq-content">
          <p>La configuración básica puede estar lista en menos de 1 día. Para implementaciones empresariales con integraciones CRM y personalización avanzada, el proceso típico es de 1-2 semanas. Incluimos capacitación para tu equipo.</p>
        </div>
      </details>
      
      <details class="yeastar-faq-item">
        <summary>¿Puedo hacer llamadas internacionales?</summary>
        <div class="yeastar-faq-content">
          <p>Sí, el sistema soporta llamadas internacionales. Las tarifas dependen del plan contratado y el destino. Ofrecemos paquetes especiales para empresas con alto volumen de llamadas internacionales.</p>
        </div>
      </details>
      
      <details class="yeastar-faq-item">
        <summary>¿Qué tipo de soporte técnico incluye?</summary>
        <div class="yeastar-faq-content">
          <p>Todos los planes incluyen soporte técnico en español. El plan Básico tiene soporte por email, Profesional incluye chat y teléfono 24/7, y Empresarial cuenta con un gerente de cuenta dedicado y SLA garantizado.</p>
        </div>
      </details>
    </div>
  </div>
</section>

<!-- ============================================
     CONTACT FORM SECTION
     ============================================ -->
<section class="yeastar-section yeastar-bg-alt" id="contacto">
  <div class="yeastar-container">
    <div class="yeastar-section-header">
      <h2 class="yeastar-section-title">Solicita una demo gratuita</h2>
      <p class="yeastar-section-subtitle">Agenda 15 minutos con un asesor y te mostramos cómo Yeastar puede transformar las comunicaciones de tu empresa.</p>
    </div>
    
    <form class="yeastar-contact-form" id="demoForm" onsubmit="sendDemoRequest(event)">
      <div class="yeastar-form-grid">
        <div class="yeastar-form-group">
          <label class="yeastar-form-label" for="name">Nombre completo*</label>
          <input type="text" id="name" class="yeastar-form-input" placeholder="Juan Pérez" required>
        </div>
        
        <div class="yeastar-form-group">
          <label class="yeastar-form-label" for="phone">Teléfono*</label>
          <input type="tel" id="phone" class="yeastar-form-input" placeholder="+52 555 123 4567" required>
        </div>
        
        <div class="yeastar-form-group">
          <label class="yeastar-form-label" for="email">Correo electrónico*</label>
          <input type="email" id="email" class="yeastar-form-input" placeholder="juan@empresa.com" required>
        </div>
        
        <div class="yeastar-form-group">
          <label class="yeastar-form-label" for="planSelect">Plan de interés</label>
          <select id="planSelect" class="yeastar-form-select">
            <option value="">Selecciona un plan</option>
            <option value="Básico">Básico</option>
            <option value="Profesional">Profesional</option>
            <option value="Empresarial">Empresarial</option>
            <option value="No estoy seguro">No estoy seguro / Asesoría</option>
          </select>
        </div>
        
        <div class="yeastar-form-group full-width">
          <label class="yeastar-form-label" for="message">Cuéntanos sobre tu empresa y necesidades</label>
          <textarea id="message" class="yeastar-form-textarea" placeholder="Somos una empresa de 30 personas y necesitamos mejorar nuestra atención telefónica..."></textarea>
        </div>
        
        <div class="yeastar-form-group full-width">
          <button type="submit" class="yeastar-btn yeastar-btn-primary" style="width:100%">
            <span>Solicitar demo gratuita</span>
            <span>→</span>
          </button>
          <p style="font-size:13px; color:var(--yeastar-text-light); margin-top:12px; text-align:center;">
            Al enviar aceptas nuestra <a href="/privacidad.php" style="color:var(--yeastar-primary)">política de privacidad</a>. Te contactaremos en menos de 24 horas.
          </p>
        </div>
      </div>
    </form>
  </div>
</section>

<script>
  // Smooth scroll functions
  function scrollToContact(e) {
    e.preventDefault();
    document.getElementById('contacto').scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
  
  function scrollToPlans(e) {
    e.preventDefault();
    document.getElementById('planes').scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
  
  // Open demo form with preselected plan
  function openDemoForm(plan) {
    document.getElementById('contacto').scrollIntoView({ behavior: 'smooth', block: 'start' });
    if (plan) {
      setTimeout(() => {
        document.getElementById('planSelect').value = plan;
      }, 500);
    }
  }
  
  // Handle demo form submission
  function sendDemoRequest(e) {
    e.preventDefault();
    
    const formData = {
      name: document.getElementById('name').value,
      phone: document.getElementById('phone').value,
      email: document.getElementById('email').value,
      plan: document.getElementById('planSelect').value,
      message: document.getElementById('message').value,
      timestamp: new Date().toISOString()
    };
    
    // Aquí puedes integrar con tu backend
    // fetch('/includes/contact-form-handler.php', {
    //   method: 'POST',
    //   headers: { 'Content-Type': 'application/json' },
    //   body: JSON.stringify(formData)
    // })
    
    console.log('Demo request:', formData);
    
    // Mostrar mensaje de éxito
    alert('¡Gracias por tu interés! Tu solicitud ha sido recibida. Un asesor se contactará contigo en menos de 24 horas para agendar tu demo personalizada.');
    
    // Reset form
    document.getElementById('demoForm').reset();
  }
</script>
