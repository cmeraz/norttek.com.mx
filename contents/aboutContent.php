<?php
/**
 * aboutContent.php
 * Contenido principal para la página "Nosotros" de Norttek Solutions
 * Sigue la convención modular y DRY del proyecto.
 */
?>

<section class="bg-white pb-16 nt-hero-wrapper" style="padding-top:250px;">
    <div class="max-w-5xl mx-auto px-6 lg:px-8">
        <!-- Hero Nosotros -->
        <div class="text-center mb-16 nt-fade-in">
            <?php echo nt_heading('Sobre Nosotros', 'fa-solid fa-users', 'xl', 'Conoce quiénes somos', true, ['id' => 'about-hero-heading','animate'=>true,'delay'=>'sm']); ?>
            <p class="nt-lead max-w-2xl mx-auto" style="margin-top:1rem;">
                En <strong class="nt-icon-accent">Norttek Solutions</strong> combinamos experiencia, innovación y pasión para proteger y transformar hogares y empresas en todo México.
            </p>
        </div>

        <!-- Historia y valores -->
        <div class="grid md:grid-cols-2 gap-10 items-center mb-20">
            <div class="about-animate-left">
                <?php echo nt_heading('Nuestra Historia', 'fa-solid fa-hourglass-half', 'md', null, false, ['animate'=>true]); ?>
                <p class="text-gray-600 mb-4">
                    Desde <span class="font-semibold text-blue-700">2015</span>, Norttek Solutions ha evolucionado de un pequeño emprendimiento familiar a una empresa líder en <span class="font-semibold">seguridad electrónica</span> y <span class="font-semibold">automatización</span>. Nuestro crecimiento se basa en la confianza de nuestros clientes y la mejora continua de nuestro equipo.
                </p>
                <ul class="list-disc list-inside text-gray-600 mb-4">
                    <li>+500 proyectos exitosos en empresas y hogares</li>
                    <li>Soporte en todo México</li>
                    <li>Equipo certificado y en constante capacitación</li>
                </ul>
                <p class="text-gray-600">
                    Hoy, somos referentes en <span class="font-semibold">CCTV, alarmas inteligentes, control de acceso, redes y telefonía IP</span>, brindando soluciones integrales y soporte personalizado.
                </p>
            </div>
            <div class="flex justify-center about-animate-right relative">
                <img src="/assets/img/cctv-hero_img.jpg" alt="Equipo Norttek Solutions" class="nt-hero-bg-img opacity-30 hidden md:block">
                <div class="nt-hero-overlay hidden md:block"></div>
                <img src="/assets/img/logo-norttek.png" alt="Equipo Norttek Solutions" class="rounded-xl shadow-2xl w-full max-w-xs hover:scale-105 transition-transform duration-500 relative">
            </div>
        </div>

        <!-- Misión, Visión, Valores con animaciones -->
        <div class="grid md:grid-cols-3 gap-8 text-center mb-20">
            <div class="about-animate-up">
                <div class="text-blue-600 text-4xl mb-2"><i class="fas fa-bullseye"></i></div>
                <h3 class="font-semibold text-xl mb-2">Misión</h3>
                <p class="text-gray-600">
                    Brindar soluciones tecnológicas de seguridad y automatización que mejoren la calidad de vida y la productividad de nuestros clientes, con atención personalizada y tecnología de vanguardia.
                </p>
            </div>
            <div class="about-animate-up" style="animation-delay:0.2s;">
                <div class="text-blue-600 text-4xl mb-2"><i class="fas fa-eye"></i></div>
                <h3 class="font-semibold text-xl mb-2">Visión</h3>
                <p class="text-gray-600">
                    Ser la empresa mexicana líder en innovación, servicio y confianza en el sector de seguridad electrónica y automatización.
                </p>
            </div>
            <div class="about-animate-up" style="animation-delay:0.4s;">
                <div class="text-blue-600 text-4xl mb-2"><i class="fas fa-handshake"></i></div>
                <h3 class="font-semibold text-xl mb-2">Valores</h3>
                <ul class="text-gray-600 list-disc list-inside text-left inline-block">
                    <li>Compromiso</li>
                    <li>Honestidad</li>
                    <li>Innovación</li>
                    <li>Calidad</li>
                    <li>Trabajo en equipo</li>
                    <li>Responsabilidad social</li>
                </ul>
            </div>
        </div>

        <!-- Línea de tiempo animada -->
        <div class="mb-20">
                <div class="text-center mb-8 nt-fade-in">
                    <?php echo nt_heading('Nuestra Trayectoria', 'fa-solid fa-route', 'md', 'Evolución y crecimiento', false, ['animate'=>true,'delay'=>'sm']); ?>
                </div>
            <div class="relative border-l-4 border-blue-200 pl-8">
                <div class="mb-10 about-animate-timeline" data-year="2015">
                    <span class="absolute -left-5 top-0 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg font-bold">2015</span>
                    <p class="text-gray-700 font-semibold">Fundación de Norttek Solutions</p>
                    <p class="text-gray-500 text-sm">Comenzamos con proyectos residenciales y pequeñas empresas.</p>
                </div>
                <div class="mb-10 about-animate-timeline" data-year="2018">
                    <span class="absolute -left-5 top-0 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg font-bold">2018</span>
                    <p class="text-gray-700 font-semibold">Expansión nacional</p>
                    <p class="text-gray-500 text-sm">Ampliamos nuestro alcance a todo México y grandes corporativos.</p>
                </div>
                <div class="mb-10 about-animate-timeline" data-year="2021">
                    <span class="absolute -left-5 top-0 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg font-bold">2021</span>
                    <p class="text-gray-700 font-semibold">Innovación en automatización</p>
                    <p class="text-gray-500 text-sm">Integramos soluciones IoT, control remoto y telefonía IP en la nube.</p>
                </div>
                <div class="mb-4 about-animate-timeline" data-year="2024">
                    <span class="absolute -left-5 top-0 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg font-bold">2024</span>
                    <p class="text-gray-700 font-semibold">+500 clientes satisfechos</p>
                    <p class="text-gray-500 text-sm">Seguimos creciendo con pasión y compromiso.</p>
                </div>
            </div>
        </div>

        <!-- CTA animada -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-400 rounded-lg p-10 text-center shadow-lg about-animate-cta">
            <?php echo nt_heading('¿Por qué elegir Norttek Solutions?', 'fa-solid fa-shield-halved', 'lg', 'Tecnología, soporte y confianza', false, ['style' => 'color:#fff;','animate'=>true]); ?>
            <p class="text-blue-50 mb-4 text-lg">
                Atención personalizada, soporte técnico especializado y soluciones a la medida.<br>
                Nuestro compromiso es tu tranquilidad y satisfacción.
            </p>
            <a href="/contact.php" class="nt-btn" data-variant="outline" style="background:linear-gradient(#fff,#fff) padding-box,var(--nt-gradient-border) border-box;">
                <i class="fa-solid fa-envelope-open-text"></i> Contáctanos
            </a>
        </div>
    </div>
</section>