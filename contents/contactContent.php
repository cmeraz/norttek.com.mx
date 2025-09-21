<?php
/**
 * contactContent.php
 * Contenido creativo y funcional para la página de contacto de Norttek Solutions
 */
?>

<section class="relative bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center py-24" style="padding-top:180px;">
    <div class="absolute inset-0 pointer-events-none select-none">
        <img src="/assets/images/contact-bg.svg" alt="" class="w-full h-full object-cover opacity-10">
    </div>
    <div class="relative z-10 max-w-3xl w-full mx-auto bg-white/90 rounded-2xl shadow-2xl p-10 animate-contact-fade">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-blue-700 mb-2 drop-shadow">¡Hablemos!</h1>
            <p class="text-lg text-gray-700">¿Tienes una idea, un reto o solo quieres saludar? Cuéntanos tu proyecto y te contactamos con soluciones a tu medida.</p>
        </div>
        <form id="contactForm" class="space-y-6" autocomplete="off">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-1">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">¿Cómo te llamas?</label>
                    <input type="text" id="nombre" name="nombre" required class="contact-input" placeholder="Tu nombre completo">
                </div>
                <div class="flex-1">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">¿Cuál es tu correo?</label>
                    <input type="email" id="email" name="email" required class="contact-input" placeholder="tucorreo@email.com">
                </div>
            </div>
            <div>
                <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">¿Qué necesitas?</label>
                <textarea id="mensaje" name="mensaje" required rows="4" class="contact-input" placeholder="Cuéntanos tu idea, problema o proyecto..."></textarea>
            </div>
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <button type="submit" class="contact-btn w-full md:w-auto flex items-center justify-center gap-2">
                    <i class="fas fa-paper-plane"></i> Enviar mensaje
                </button>
                <a href="https://wa.me/5215555555555?text=Hola%20Norttek%20Solutions%2C%20quiero%20más%20información" target="_blank" class="contact-btn-alt w-full md:w-auto flex items-center justify-center gap-2">
                    <i class="fab fa-whatsapp"></i> WhatsApp Directo
                </a>
            </div>
            <div id="contactSuccess" class="hidden text-green-600 text-center font-semibold mt-4"></div>
            <div id="contactError" class="hidden text-red-600 text-center font-semibold mt-4"></div>
        </form>
        <div class="mt-10 text-center text-gray-500 text-sm">
            <i class="fas fa-lock mr-1"></i> Tus datos están seguros. Solo los usamos para responderte.
        </div>
    </div>
</section>