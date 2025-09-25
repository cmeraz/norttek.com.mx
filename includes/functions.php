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
 * 
 * @param string $templateName Nombre del template (sin extensión)
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
 * Genera un encabezado estandarizado según el nuevo sistema visual 2025.
 * Ejemplo:
 *   echo nt_heading('Instalación Profesional', 'fa-solid fa-plug', 'lg', 'Opcional subtítulo', true);
 * @param string $text       Texto principal del heading
 * @param string $icon       Clase(s) del icono FontAwesome (sin <i>)
 * @param string $size       xl|lg|md|sm (default lg)
 * @param string|null $sub   Subtítulo opcional (renderizado debajo en menor tamaño)
 * @param bool $underline    Si true añade una barra decorativa inferior
 * @param array $attrs       Atributos HTML extra (['id' => 'mi-id'])
 * @return string            HTML del encabezado
 */
function nt_heading($text, $icon = 'fa-solid fa-circle', $size = 'lg', $sub = null, $underline = false, $attrs = []) {
    $allowedSizes = ['xl','lg','md','sm'];
    if (!in_array($size, $allowedSizes, true)) { $size = 'lg'; }
    $cls = 'nt-heading nt-heading-' . $size . ($underline ? ' underline' : '');

    // Soporte de flags especiales dentro de $attrs sin romper firma existente
    $animate = false;
    $delay = null;
    if (isset($attrs['animate'])) {
        $animate = (bool)$attrs['animate'];
        unset($attrs['animate']);
    }
    if (isset($attrs['delay'])) {
        $delay = in_array($attrs['delay'], ['sm','md','lg'], true) ? $attrs['delay'] : null;
        unset($attrs['delay']);
    }
    if (isset($attrs['class'])) { // permitir clases extra
        $cls .= ' ' . trim(preg_replace('/\s+/', ' ', $attrs['class']));
        unset($attrs['class']);
    }
    if ($animate) {
        $cls .= ' nt-heading-anim';
        if ($delay) { $cls .= ' delay-' . $delay; }
    }

    $attrStr = '';
    if (!empty($attrs) && is_array($attrs)) {
        foreach ($attrs as $k => $v) {
            if ($v === null) continue;
            $k = htmlspecialchars($k, ENT_QUOTES, 'UTF-8');
            $v = htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
            $attrStr .= " {$k}='{$v}'";
        }
    }
    $iconHtml = $icon ? '<i class="'.htmlspecialchars($icon, ENT_QUOTES, 'UTF-8').'"></i>' : '';
    $html  = '<div class="'.$cls.'"'.$attrStr.'>'.$iconHtml.'<span>'.htmlspecialchars($text, ENT_QUOTES, 'UTF-8').'</span>';
    if ($sub) {
        $html .= '<span class="nt-sub">'.htmlspecialchars($sub, ENT_QUOTES, 'UTF-8').'</span>';
    }
    $html .= '</div>';
    return $html;
}

/**
 * Incluye una sección de template pasando variables (con valores por defecto).
 * Uso: includeSection('nombre', ['var1' => 'valor']);
 * 
 * @param string $templateName Nombre del template (sin extensión)
 * @param array $variables Variables a pasar al template
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
            'og_image' => 'https://www.norttek.com.mx/assets/img/webpage.png',
            'twitter_title' => 'Norttek Solutions',
            'twitter_description' => 'Seguridad confiable para tu hogar y oficina.',
            'twitter_image' => 'https://www.norttek.com.mx/assets/img/webpage.png'
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
 * 
 * @param string $jsonFile Ruta absoluta al archivo JSON
 * @param array $options Opciones como 'title'
 * @return string HTML renderizado del componente FAQ
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
                <!-- Cada pregunta frecuente se muestra como un <details> para accesibilidad y UX -->
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
        /* Rota el icono de flecha cuando el <details> está abierto */
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
 * 
 * @param string $jsonName Nombre del archivo JSON (sin extensión)
 * @param array $options Opciones como 'title'
 * @return string HTML renderizado del componente FAQ
 */
function faq($jsonName, $options = []) {
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
            <!-- Cada pregunta frecuente es un bloque con animación de aparición y acordeón -->
            <div class="faq-falcon__item faq-fade" data-faq-index="<?= $i ?>">
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
        /* Contenedor principal del FAQ */
        .faq-falcon__container {
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 4px 32px 0 rgba(37,99,235,0.09);
            padding: 2rem 1rem;
        }
        /* Separador entre items */
        .faq-falcon__item + .faq-falcon__item {
            border-top: 1px solid #e0e7ef;
        }
        /* Accesibilidad: outline al enfocar pregunta */
        .faq-falcon__question:focus {
            outline: 2px solid #2563eb;
            outline-offset: 2px;
        }
        /* Flecha animada */
        .faq-falcon__arrow {
            transition: transform 0.4s cubic-bezier(.4,0,.2,1);
        }
        /* Respuesta con transición de altura y opacidad */
        .faq-falcon__answer {
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(.4,0,.2,1), opacity 0.5s cubic-bezier(.4,0,.2,1);
            will-change: max-height, opacity;
        }
        /* Icono de pregunta */
        .faq-falcon__icon {
            min-width: 2.5rem;
            min-height: 2.5rem;
        }
        /* Hover en icono */
        .faq-falcon__question:hover .faq-falcon__icon {
            background: #2563eb;
            color: #fff;
            transition: background 0.2s, color 0.2s;
        }
        .faq-falcon__answer img { max-width: 100%; height: auto; }
        /* Animación de aparición al hacer scroll */
        .faq-fade {
            opacity: 0;
            transform: translateY(60px) scale(0.97);
            transition: opacity 0.6s cubic-bezier(.4,1.4,.6,1), transform 0.6s cubic-bezier(.4,1.4,.6,1);
        }
        .faq-fade.faq-visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    </style>
    <script>
    // Animación de aparición con Intersection Observer
    document.addEventListener('DOMContentLoaded', function() {
        // Observa cada item FAQ y le agrega la clase de animación cuando entra en pantalla
        var items = document.querySelectorAll('.faq-fade');
        if ('IntersectionObserver' in window) {
            var obs = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('faq-visible');
                    } else {
                        entry.target.classList.remove('faq-visible');
                    }
                });
            }, { threshold: 0.15 });
            items.forEach(function(item) { obs.observe(item); });
        } else {
            // Fallback: muestra todos si no hay soporte para IntersectionObserver
            items.forEach(function(item) { item.classList.add('faq-visible'); });
        }

        // Lógica de acordeón: abre/cierra respuestas al hacer click o usar teclado
        document.querySelectorAll('.faq-falcon__question').forEach(function(q, idx) {
            q.onclick = function() {
                var item = q.closest('.faq-falcon__item');
                var answer = item.querySelector('.faq-falcon__answer');
                var arrow = q.querySelector('.faq-falcon__arrow');
                var isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px' && answer.style.opacity === '1';

                // Cierra todos los items
                document.querySelectorAll('.faq-falcon__item').forEach(function(i) {
                    var a = i.querySelector('.faq-falcon__answer');
                    var ar = i.querySelector('.faq-falcon__arrow');
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
            };
            // Accesibilidad: permite abrir/cerrar con Enter o Space
            q.onkeydown = function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    q.click();
                }
            };
        });

        // Abre el primer item por defecto al cargar la página
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
    });
    </script>
    <?php
    return ob_get_clean();
}
?>
