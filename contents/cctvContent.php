<?php
/**
 * Contenido principal para la página CCTV
 */
?>
<section class="pb-16 nt-hero-wrapper" style="padding-top:150px; background:linear-gradient(180deg,#f8fbff,#ffffff);">
    <div class="max-w-5xl mx-auto px-6 lg:px-8 nt-fade-in">
        <div class="text-center mb-12">
            <?php echo nt_heading('Cámaras de Seguridad y Videovigilancia', 'fa-solid fa-video', 'lg', 'Protege lo que más importa', ['id'=>'cctv-main-heading','animate'=>true,'delay'=>'sm']); ?>
            <p class="nt-lead max-w-2xl mx-auto" style="margin-top:.9rem;">
                Protege lo que más importa con tecnología de punta en CCTV. Instalamos, configuramos y damos soporte a sistemas de videovigilancia para empresas, comercios y hogares.
            </p>
        </div>
        <div class="grid md:grid-cols-2 gap-10 items-center mb-16">
            <div>
                <?php echo nt_heading('¿Por qué elegir Norttek?', 'fa-solid fa-shield-halved', 'md', null, ['animate'=>true]); ?>
                <ul class="list-disc list-inside text-gray-600 mb-4">
                    <li>Monitoreo remoto desde tu celular o PC</li>
                    <li>Grabación 24/7 y alertas inteligentes</li>
                    <li>Integración con alarmas y control de acceso</li>
                    <li>Soporte técnico y garantía</li>
                </ul>
                <a href="/contact.php" class="nt-btn" data-variant="primary">
                    <i class="fa-solid fa-file-signature"></i> Solicita una cotización
                </a>
            </div>
            <div class="flex justify-center relative">
                <div class="nt-hero-overlay hidden md:block"></div>
                <img src="/assets/img/cctv-hero_img.jpg" alt="Cámaras de seguridad Norttek" class="rounded-lg shadow-md w-full max-w-xs relative">
            </div>
        </div>
    </div>
</section>