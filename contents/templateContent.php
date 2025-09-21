<?php
/**
 * templateContent.php
 * Contenido para la página template.php - Información para desarrolladores
 * Compatible con la convención DRY de SEO y la estructura modular del proyecto.
 */
?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 text-white rounded-full mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Plantilla de Página</h1>
            <p class="text-xl text-gray-600">Archivo template para crear nuevas páginas en Norttek Solutions</p>
        </div>

        <!-- Alerta informativa -->
        <div class="bg-amber-50 border-l-4 border-amber-400 p-6 mb-8">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-amber-800">Información para Desarrolladores</h3>
                    <div class="mt-2 text-sm text-amber-700">
                        <p>
                            Este archivo (<code>template.php</code>) es una plantilla base para crear nuevas páginas. 
                            Ahora utiliza la convención DRY para SEO: solo necesitas definir <strong>una vez</strong> el título, descripción, URL e imagen, y estos se heredan automáticamente para Open Graph y Twitter Card.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instrucciones -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">📋 Cómo usar esta plantilla</h2>
            
            <div class="space-y-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold">1</div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Copiar y renombrar</h3>
                        <p class="text-gray-600">Copia <code>template.php</code> y renómbralo como tu nueva página (ej: <code>servicios.php</code>).</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold">2</div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Configurar SEO (DRY)</h3>
                        <p class="text-gray-600">
                            Modifica el array <code>$seo</code> con los datos principales de tu página:<br>
                            <code>title</code>, <code>description</code>, <code>keywords</code>, <code>robots</code>, <code>og_url</code>, <code>og_image</code>.<br>
                            <span class="text-blue-700 font-semibold">No necesitas repetir los valores para OG/Twitter, se heredan automáticamente.</span>
                        </p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold">3</div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Agregar recursos</h3>
                        <p class="text-gray-600">
                            Especifica archivos CSS y JS adicionales en <code>$cssFiles</code> y <code>$jsFiles</code> (sin extensión).<br>
                            Los archivos con el mismo nombre que la página se cargan automáticamente.
                        </p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold">4</div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Crear contenido</h3>
                        <p class="text-gray-600">
                            Crea <code>contents/{nombrePagina}Content.php</code> con el contenido principal de tu página.<br>
                            El sistema lo incluirá automáticamente según el nombre del archivo.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ejemplo de código actualizado -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">💻 Ejemplo de implementación</h2>
            
            <div class="bg-gray-900 text-gray-100 p-6 rounded-lg overflow-x-auto">
                <pre class="text-sm"><code><?php echo htmlspecialchars('<?php
// Ejemplo: servicios.php
$seo = [
    \'title\' => \'Norttek Solutions - Nuestros Servicios\',
    \'description\' => \'Conoce todos los servicios de seguridad que ofrece Norttek Solutions...\',
    \'keywords\' => \'servicios, seguridad, CCTV, alarmas\',
    \'robots\' => \'index, follow\',
    \'og_url\' => \'https://www.norttek.com.mx/servicios\',
    \'og_image\' => \'https://www.norttek.com.mx/assets/images/og-image.jpg\'
];
// No repitas og_title, og_description, twitter_title, etc. Se heredan automáticamente.

$pageName = basename(__FILE__, ".php");
$cssFiles = [\'servicios\']; // assets/css/servicios.css
$jsFiles = [\'servicios\'];  // assets/js/servicios.js

include __DIR__ . \'/includes/pageTemplate.php\';
?>'); ?></code></pre>
            </div>
        </div>

        <!-- Enlaces útiles -->
        <div class="mt-12 text-center">
            <p class="text-gray-600 mb-4">¿Necesitas más información?</p>
            <div class="space-x-4">
                <a href="/" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    ← Volver al inicio
                </a>
                <a href="https://github.com/cmeraz/norttek.com.mx" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition-colors">
                    Ver repositorio
                </a>
            </div>
        </div>

    </div>
</div>