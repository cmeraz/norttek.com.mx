<?php
/**
 * Contenido principal para la página Control de Acceso (refactor 2025 design system)
 */
?>
<section class="nt-section pb-16 bg-white" style="padding-top:150px;">
    <div class="max-w-6xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-12">
            <?= nt_heading('Control de Acceso Inteligente', 'fa-solid fa-door-open', 'xl', null, true, ['id' => 'control-acceso-hero','animate'=>true,'delay'=>'sm']); ?>
            <p class="nt-lead max-w-3xl mx-auto mt-4">
                Gestiona y protege el acceso a tus instalaciones con tecnología biométrica, tarjetas, códigos QR y más.
                Soluciones para empresas, escuelas y residencias.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-14 items-center">
            <div class="order-2 md:order-1">
                <?= nt_heading('Ventajas de nuestro sistema', 'fa-solid fa-shield-halved', 'md', null, true, ['animate'=>true]); ?>
                <ul class="space-y-3 mt-6 mb-8">
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Control horario y reportes de asistencia</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Integración con cámaras y alarmas</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Acceso remoto y gestión desde app</span></li>
                    <li class="flex items-start gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i><span>Instalación profesional y soporte</span></li>
                </ul>
                <a href="/contact.php" class="nt-btn nt-btn-primary">
                    <i class="fa-solid fa-comments"></i><span>Solicita asesoría</span>
                </a>
            </div>
            <div class="flex justify-center order-1 md:order-2">
                <div class="relative rounded-2xl overflow-hidden shadow-lg max-w-sm w-full bg-gray-50">
                    <img src="/assets/img/cctv-hero_img.jpg" alt="Dispositivo de control de acceso" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>
