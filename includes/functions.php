<?php
/**
 * functions.php
 * Funciones utilitarias y helpers para plantillas, secciones y componentes FAQ.
 * 
 * Estructura y convenciones según la arquitectura modular de Norttek Solutions.
 */

/**
 * Incluye un template desde la carpeta /templates.
 * Uso: includeTemplate('header');
 */
function includeTemplate($templateName) {
    $templateName = basename($templateName); // Seguridad: evita rutas externas
    $file = __DIR__ . "/../templates/{$templateName}.php";

    if (file_exists($file)) {
        include $file;
    } else {
        echo "<!-- Template {$templateName}.php not found in templates folder {$file} -->";
    }
}

/**
 * Incluye una sección de template pasando variables (con valores por defecto).
 * Uso: includeSection('nombre', ['var1' => 'valor']);
 */
function includeSection($templateName, $variables = []) {
    $file = __DIR__ . "/$templateName.php";

    // Valores por defecto para SEO y otros
    $defaults = [
        'seo' => [
            'title' => 'Norttek Solutions',
            'description' => 'Soluciones de seguridad integral para empresas y hogares.',
            'keywords' => 'CCTV, alarmas, control de acceso, redes, automatización',
            'og_title' => 'Norttek Solutions',
            'og_description' => 'Seguridad confiable para tu hogar y oficina.',
            'og_url' => 'https://www.norttek.com.mx/',
            'og_image' => 'https://www.norttek.com.mx/assets/images/og-image.jpg',
            'twitter_title' => 'Norttek Solutions',
            'twitter_description' => 'Seguridad confiable para tu hogar y oficina.',
            'twitter_image' => 'https://www.norttek.com.mx/assets/images/og-image.jpg'
        ],
        'pageName' => basename($_SERVER['PHP_SELF'], ".php"),
        'cssFiles' => []
    ];

    // Mezcla variables enviadas con defaults
    $variables = array_merge($defaults, $variables);

    // Convierte elementos del array en variables locales
    extract($variables);

    if(file_exists($file)) {
        include $file;
    } else {
        echo "<!-- Template $templateName not found -->";
    }
}

/**
 * Renderiza un componente FAQ a partir de un archivo JSON arbitrario.
 * El JSON debe ser un array de objetos con "pregunta", "respuesta", "icono" (opcional), "imagen" (opcional).
 * Uso: echo renderFAQComponent('/ruta/faq.json', ['title' => 'Preguntas Frecuentes']);
 */
function renderFAQComponent($jsonFile, $options = []) {
    $title = isset($options['title']) ? htmlspecialchars($options['title']) : 'Preguntas Frecuentes';
    $iconoGenerico = 'fas fa-question-circle';

    if (!file_exists($jsonFile)) {
        return "<!-- FAQ JSON file not found: {$jsonFile} -->";
    }

    $faqs = json_decode(file_get_contents($jsonFile), true);
    if (!is_array($faqs)) {
        return "<!-- FAQ JSON invalid format: {$jsonFile} -->";
    }

    ob_start();
    ?>
    <section class="faq-component max-w-2xl mx-auto my-8">
        <h2 class="text-2xl font-bold mb-4 text-blue-700"><?= $title ?></h2>
        <div class="faq-list divide-y divide-gray-200">
            <?php foreach ($faqs as $i => $faq): 
                $icono = !empty($faq['icono']) ? htmlspecialchars($faq['icono']) : $iconoGenerico;
                $pregunta = isset($faq['pregunta']) ? htmlspecialchars($faq['pregunta']) : '';
                $respuesta = isset($faq['respuesta']) ? nl2br(htmlspecialchars($faq['respuesta'])) : '';
                // Si hay imagen, la incrusta al final de la respuesta
                if (!empty($faq['imagen'])) {
                    $imgSrc = htmlspecialchars($faq['imagen']);
                    $respuesta .= '<div class="mt-3"><img src="'.$imgSrc.'" alt="Imagen relacionada" class="rounded shadow max-h-40 mx-auto"></div>';
                }
            ?>
                <details class="py-3 group" <?= $i === 0 ? 'open' : '' ?>>
                    <summary class="cursor-pointer font-semibold text-gray-800 flex items-center justify-between gap-2">
                        <span>
                            <i class="<?= $icono ?> text-blue-500 mr-2"></i><?= $pregunta ?>
                        </span>
                        <span class="ml-2 transition-transform group-open:rotate-90">&#9654;</span>
                    </summary>
                    <div class="mt-2 text-gray-600"><?= $respuesta ?></div>
                </details>
            <?php endforeach; ?>
        </div>
    </section>
    <style>
        .faq-component details[open] summary span:last-child {
            transform: rotate(90deg);
        }
        .faq-component summary::-webkit-details-marker { display: none; }
        .faq-component img { max-width: 100%; height: auto; }
    </style>
    <?php
    return ob_get_clean();
}

/**
 * Renderiza un componente FAQ a partir de un archivo JSON ubicado en /json/faq/{archivo}.json.
 * El JSON debe ser un array de objetos con "pregunta", "respuesta", "icono" (opcional), "imagen" (opcional).
 * Uso: echo faq('faq-general', ['title' => 'Preguntas Frecuentes']);
 */
function faq($jsonName, $options = []) {
    // Construye la ruta al archivo JSON de FAQ
    $jsonFile = __DIR__ . '/../json/faq/' . basename($jsonName) . '.json';
    $title = isset($options['title']) ? htmlspecialchars($options['title']) : 'Preguntas Frecuentes';
    $iconoGenerico = 'fas fa-question-circle';

    if (!file_exists($jsonFile)) {
        return "<!-- FAQ JSON file not found: {$jsonFile} -->";
    }

    $faqs = json_decode(file_get_contents($jsonFile), true);
    if (!is_array($faqs)) {
        return "<!-- FAQ JSON invalid format: {$jsonFile} -->";
    }

    // Incluir GSAP y ScrollTrigger solo una vez para animaciones
    static $gsapLoaded = false;
    if (!$gsapLoaded) {
        echo '<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>';
        $gsapLoaded = true;
    }

    ob_start();
    ?>
    <section class="faq-falcon max-w-4xl mx-auto my-16 px-4">
        <h2 class="faq-falcon__title text-3xl md:text-4xl font-extrabold text-center mb-10 text-blue-800"><?= $title ?></h2>
        <div class="faq-falcon__container">
            <?php foreach ($faqs as $i => $faq): 
                $icono = !empty($faq['icono']) ? htmlspecialchars($faq['icono']) : $iconoGenerico;
                $pregunta = isset($faq['pregunta']) ? htmlspecialchars($faq['pregunta']) : '';
                $respuesta = isset($faq['respuesta']) ? nl2br(htmlspecialchars($faq['respuesta'])) : '';
                if (!empty($faq['imagen'])) {
                    $imgSrc = htmlspecialchars($faq['imagen']);
                    $respuesta .= '<div class="mt-4"><img src="'.$imgSrc.'" alt="Imagen relacionada" class="rounded-xl shadow-lg max-h-48 mx-auto border border-blue-100"></div>';
                }
            ?>
            <div class="faq-falcon__item" data-faq-index="<?= $i ?>">
                <div class="faq-falcon__question flex items-center gap-3 cursor-pointer py-4 px-6 rounded-lg transition hover:bg-blue-50" tabindex="0">
                    <span class="faq-falcon__icon flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600 text-xl">
                        <i class="<?= $icono ?>"></i>
                    </span>
                    <span class="faq-falcon__qtext flex-1 text-lg font-semibold"><?= $pregunta ?></span>
                    <span class="faq-falcon__arrow text-2xl text-blue-400 transition-transform duration-300">&#x25BC;</span>
                </div>
                <div class="faq-falcon__answer px-8 pb-6 text-gray-700 text-base leading-relaxed" style="<?= $i === 0 ? 'max-height:500px;opacity:1;' : 'max-height:0;opacity:0;' ?>">
                    <?= $respuesta ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <style>
        /* Estilos para el componente FAQ Falcon */
        .faq-falcon__container {
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 4px 32px 0 rgba(37,99,235,0.09);
            padding: 2rem 1rem;
        }
        .faq-falcon__item + .faq-falcon__item {
            border-top: 1px solid #e0e7ef;
        }
        .faq-falcon__question:focus {
            outline: 2px solid #2563eb;
            outline-offset: 2px;
        }
        .faq-falcon__arrow {
            transition: transform 0.4s cubic-bezier(.4,0,.2,1);
        }
        .faq-falcon__answer {
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(.4,0,.2,1), opacity 0.5s cubic-bezier(.4,0,.2,1);
            will-change: max-height, opacity;
        }
        .faq-falcon__icon {
            min-width: 2.5rem;
            min-height: 2.5rem;
        }
        .faq-falcon__question:hover .faq-falcon__icon {
            background: #2563eb;
            color: #fff;
            transition: background 0.2s, color 0.2s;
        }
        .faq-falcon__answer img { max-width: 100%; height: auto; }
        .faq-falcon__item.faq-hidden {
            opacity: 0 !important;
            pointer-events: none;
            transform: scale(0.96) translateY(80px) !important;
            transition: opacity 0.5s, transform 0.5s;
        }
    </style>
    <script>
    window.faqFalconInit = function() {
        // Toggle de preguntas y respuestas
        document.querySelectorAll('.faq-falcon__question').forEach(function(q, idx) {
            q.addEventListener('click', function() {
                const item = q.closest('.faq-falcon__item');
                const answer = item.querySelector('.faq-falcon__answer');
                const arrow = q.querySelector('.faq-falcon__arrow');
                const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px' && answer.style.opacity === '1';

                // Cierra todos los items
                document.querySelectorAll('.faq-falcon__item').forEach(function(i) {
                    const a = i.querySelector('.faq-falcon__answer');
                    const ar = i.querySelector('.faq-falcon__arrow');
                    a.style.maxHeight = '0';
                    a.style.opacity = '0';
                    if (ar) ar.style.transform = 'rotate(0deg)';
                    if (ar) ar.style.color = '#60a5fa';
                });

                // Abre el seleccionado si no estaba abierto
                if (!isOpen) {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                    answer.style.opacity = '1';
                    if (arrow) {
                        arrow.style.transform = 'rotate(180deg)';
                        arrow.style.color = '#2563eb';
                    }
                }
            });
            // Accesibilidad: abrir/cerrar con Enter o Space
            q.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    q.click();
                }
            });
        });
        // Abre el primero por defecto
        var first = document.querySelector('.faq-falcon__item .faq-falcon__answer');
        var firstArrow = document.querySelector('.faq-falcon__item .faq-falcon__arrow');
        if (first) {
            first.style.maxHeight = first.scrollHeight + 'px';
            first.style.opacity = '1';
            if (firstArrow) {
                firstArrow.style.transform = 'rotate(180deg)';
                firstArrow.style.color = '#2563eb';
            }
        }

        // Animación GSAP en scroll (entrada y salida)
        if (window.gsap && window.ScrollTrigger) {
            gsap.set('.faq-falcon__item', {opacity: 0, y: 80, scale: 0.96});
            ScrollTrigger.batch('.faq-falcon__item', {
                onEnter: batch => {
                    batch.forEach(el => el.classList.remove('faq-hidden'));
                    gsap.to(batch, {
                        opacity: 1,
                        y: 0,
                        scale: 1,
                        stagger: 0.13,
                        duration: 0.7,
                        ease: "back.out(1.7)",
                        overwrite: 'auto'
                    });
                },
                onLeave: batch => {
                    batch.forEach(el => el.classList.add('faq-hidden'));
                },
                onEnterBack: batch => {
                    batch.forEach(el => el.classList.remove('faq-hidden'));
                    gsap.to(batch, {
                        opacity: 1,
                        y: 0,
                        scale: 1,
                        stagger: 0.13,
                        duration: 0.7,
                        ease: "back.out(1.7)",
                        overwrite: 'auto'
                    });
                },
                onLeaveBack: batch => {
                    batch.forEach(el => el.classList.add('faq-hidden'));
                },
                once: false,
                start: "top+=200 bottom",
                end: "bottom top"
            });
        }
    };
    document.addEventListener('DOMContentLoaded', window.faqFalconInit);
    </script>
    <?php
    return ob_get_clean();
}
?>
