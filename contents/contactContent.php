<?php
/**
 * contactContent.php
 * Contenido creativo y funcional para la página de contacto de Norttek Solutions
 */
?>

<section class="relative min-h-screen flex items-center justify-center py-24" style="padding-top:180px; background:linear-gradient(145deg,#f0f7ff,#e4effb);">
    <div class="absolute inset-0 pointer-events-none select-none">
    <img src="/assets/img/webpage.png" alt="" class="w-full h-full object-cover opacity-10">
    </div>
    <div class="relative z-10 max-w-3xl w-full mx-auto bg-white rounded-2xl shadow-xl p-10 nt-fade-in" id="contact-card">
        <div class="text-center mb-8">
            <?php echo nt_heading('¡Hablemos!', 'fa-solid fa-comments', 'lg', 'Compártenos tu proyecto o duda', ['id'=>'contact-heading','class'=>'nt-heading-accent-bar']); ?>
            <p class="nt-lead max-w-2xl mx-auto" style="margin-top:.9rem;">¿Tienes una idea, un reto o solo quieres saludar? Cuéntanos y te contactamos con soluciones a tu medida.</p>
        </div>
        <form id="contactForm" class="nt-form" autocomplete="off">
            <div class="nt-form-row">
                <div class="nt-field">
                    <label for="nombre">¿Cómo te llamas?</label>
                    <div class="nt-input-icon">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" id="nombre" name="nombre" required class="nt-input" placeholder="Tu nombre completo" autocomplete="name">
                    </div>
                </div>
                <div class="nt-field">
                    <label for="email">¿Cuál es tu correo?</label>
                    <div class="nt-input-icon">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" id="email" name="email" required class="nt-input" placeholder="tucorreo@email.com" autocomplete="email">
                    </div>
                </div>
            </div>
            <div class="nt-field">
                <label for="mensaje">¿Qué necesitas?</label>
                <textarea id="mensaje" name="mensaje" required rows="5" class="nt-input" placeholder="Cuéntanos tu idea, problema o proyecto..."></textarea>
                <span class="nt-help">Sé específico para ayudarte mejor.</span>
            </div>
            <div class="nt-form-row" style="align-items:stretch;">
                <button type="submit" class="nt-btn" data-variant="primary" style="flex:1 1 200px; justify-content:center;">
                    <i class="fa-solid fa-paper-plane"></i> Enviar mensaje
                </button>
                <a id="contact-whatsapp" href="https://wa.me/526252690097?text=Hola%20Norttek%20Solutions%2C%20quiero%20información" target="_blank" class="nt-btn" data-variant="outline" style="flex:1 1 200px; justify-content:center;">
                    <i class="fa-brands fa-whatsapp"></i> WhatsApp Directo
                </a>
            </div>
            <div id="contactSuccess" class="hidden nt-text-success text-center font-semibold mt-2" style="color:#15803d;"></div>
            <div id="contactError" class="hidden text-center font-semibold mt-2" style="color:#b91c1c;"></div>
        </form>
        <div class="mt-8 text-center nt-text-muted text-xs" style="letter-spacing:.4px;">
            <i class="fa-solid fa-lock nt-icon-accent"></i> Tus datos están seguros. Solo los usamos para responderte.
        </div>
    </div>
</section>