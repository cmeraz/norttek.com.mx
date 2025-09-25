<?php
/**
 * Contenido principal para la página Alarmas Inteligentes (refactor 2025 design system)
 */
?>
<section class="nt-section pb-16 bg-white nt-hero-wrapper" style="padding-top:150px;">
    <div class="max-w-6xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-12">
            <?= nt_heading('Alarmas Inteligentes', 'fa-solid fa-bell', 'xl', null, true, ['id' => 'alarmas-hero','animate'=>true,'delay'=>'sm']); ?>
            <p class="nt-lead max-w-3xl mx-auto mt-4">
                Sistemas de alarma con sensores de movimiento, apertura, humo y más. Recibe alertas en tu celular y mantén tu propiedad protegida 24/7.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-14 items-center">
            <div class="order-2 md:order-1">
                <?= nt_heading('¿Qué ofrecemos?', 'fa-solid fa-list-check', 'md', null, true, ['animate'=>true]); ?>
                <ul class="space-y-3 mt-6 mb-8">
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Alarmas cableadas e inalámbricas</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Control desde app móvil</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Integración con cámaras y automatización</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Instalación y soporte profesional</span></li>
                </ul>
                <a href="/contact.php" class="nt-btn nt-btn-primary">
                    <i class="fa-solid fa-file-signature"></i><span>Cotiza tu sistema</span>
                </a>
            </div>
            <div class="flex justify-center order-1 md:order-2">
                <div class="relative rounded-2xl overflow-hidden shadow-lg max-w-sm w-full bg-gray-50">
                    <img src="/assets/img/cctv-hero_img.jpg" alt="Panel de alarma inteligente" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>
