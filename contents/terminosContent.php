<!-- Términos de Uso Content -->
<div class="container mx-auto py-8 px-4">
    
    <!-- Header -->
    <div class="text-center mb-8">
        <?php nt_heading('Términos de Uso', 'fa-solid fa-file-contract', 'xl', 'Condiciones generales de uso de nuestros servicios', ['animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
        <p class="text-gray-600 mt-4">
            <strong>Última actualización:</strong> <?= date('d/m/Y') ?>
        </p>
    </div>

    <!-- Contenido Legal -->
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-8 space-y-8">

            <!-- 1. Introducción -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-info-circle mr-3"></i>
                    1. Introducción
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Los presentes términos y condiciones regulan el uso de los servicios proporcionados por 
                    <strong>Norttek Solutions</strong>, empresa dedicada a brindar soluciones de seguridad integral 
                    incluyendo sistemas CCTV, alarmas, control de acceso, redes y telecomunicaciones.
                </p>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Al contratar nuestros servicios o utilizar nuestro sitio web, usted acepta estar sujeto a estos 
                    términos y condiciones en su totalidad.
                </p>
            </section>

            <!-- 2. Definiciones -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-book mr-3"></i>
                    2. Definiciones
                </h2>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <dl class="space-y-4">
                        <div>
                            <dt class="font-semibold text-gray-900">"La Empresa" o "Norttek":</dt>
                            <dd class="text-gray-700">Se refiere a Norttek Solutions y sus servicios.</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-gray-900">"El Cliente":</dt>
                            <dd class="text-gray-700">Persona física o moral que contrata los servicios.</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-gray-900">"Servicios":</dt>
                            <dd class="text-gray-700">Instalación, mantenimiento y soporte de sistemas de seguridad, redes y telecomunicaciones.</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-gray-900">"Sitio Web":</dt>
                            <dd class="text-gray-700">El portal www.norttek.com.mx y todas sus páginas asociadas.</dd>
                        </div>
                    </dl>
                </div>
            </section>

            <!-- 3. Servicios Ofrecidos -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-shield-halved mr-3"></i>
                    3. Servicios Ofrecidos
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="border-l-4 border-blue-500 pl-4">
                        <h3 class="font-semibold text-lg mb-2">Sistemas de Seguridad</h3>
                        <ul class="text-gray-700 space-y-1">
                            <li>• Cámaras CCTV (interiores y exteriores)</li>
                            <li>• Sistemas de alarmas</li>
                            <li>• Control de acceso</li>
                            <li>• Monitoreo remoto</li>
                        </ul>
                    </div>
                    <div class="border-l-4 border-green-500 pl-4">
                        <h3 class="font-semibold text-lg mb-2">Telecomunicaciones</h3>
                        <ul class="text-gray-700 space-y-1">
                            <li>• Redes de datos</li>
                            <li>• Telefonía IP</li>
                            <li>• Internet empresarial</li>
                            <li>• Soporte técnico</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- 4. Obligaciones del Cliente -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-user-check mr-3"></i>
                    4. Obligaciones del Cliente
                </h2>
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-r-lg">
                    <ul class="text-gray-700 space-y-2">
                        <li>• Proporcionar información veraz y actualizada</li>
                        <li>• Permitir el acceso necesario para instalaciones y mantenimiento</li>
                        <li>• Realizar los pagos en tiempo y forma según lo acordado</li>
                        <li>• Notificar cambios relevantes que afecten el servicio</li>
                        <li>• Usar los servicios conforme a su propósito y la ley</li>
                        <li>• Mantener la confidencialidad de credenciales de acceso</li>
                    </ul>
                </div>
            </section>

            <!-- 5. Garantías -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-award mr-3"></i>
                    5. Garantías y Responsabilidades
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-green-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-lg text-green-700 mb-3">Nuestras Garantías</h3>
                        <ul class="text-gray-700 space-y-2">
                            <li>• Equipos nuevos: 12 meses</li>
                            <li>• Instalaciones: 6 meses</li>
                            <li>• Mano de obra: 3 meses</li>
                            <li>• Soporte técnico especializado</li>
                        </ul>
                    </div>
                    <div class="bg-red-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-lg text-red-700 mb-3">Limitaciones</h3>
                        <ul class="text-gray-700 space-y-2">
                            <li>• Daños por mal uso o negligencia</li>
                            <li>• Modificaciones no autorizadas</li>
                            <li>• Desastres naturales</li>
                            <li>• Daños por terceros</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- 6. Precios y Pagos -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-credit-card mr-3"></i>
                    6. Precios y Condiciones de Pago
                </h2>
                <div class="bg-blue-50 p-6 rounded-lg">
                    <ul class="text-gray-700 space-y-2">
                        <li>• Los precios son en pesos mexicanos más IVA</li>
                        <li>• Cotizaciones válidas por 30 días</li>
                        <li>• Anticipo del 50% para iniciar trabajos</li>
                        <li>• Pago de liquidación contra entrega</li>
                        <li>• Aceptamos efectivo, transferencia y cheques</li>
                        <li>• Intereses moratorios: 2% mensual por pagos vencidos</li>
                    </ul>
                </div>
            </section>

            <!-- 7. Propiedad Intelectual -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-copyright mr-3"></i>
                    7. Propiedad Intelectual
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Todos los contenidos de nuestro sitio web, incluyendo pero no limitado a textos, gráficos, 
                    logotipos, iconos, imágenes, clips de audio, descargas digitales y software, son propiedad 
                    de Norttek Solutions y están protegidos por las leyes mexicanas e internacionales de derechos de autor.
                </p>
            </section>

            <!-- 8. Privacidad -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-user-shield mr-3"></i>
                    8. Protección de Datos
                </h2>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        El manejo de sus datos personales se rige por nuestro 
                        <a href="privacidad.php" class="text-blue-600 hover:text-blue-800 font-semibold underline">
                            Aviso de Privacidad
                        </a>, el cual cumple con la Ley Federal de Protección de Datos Personales en Posesión de los Particulares.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Nos comprometemos a proteger la confidencialidad de su información y a utilizarla únicamente 
                        para los fines establecidos en dicho aviso.
                    </p>
                </div>
            </section>

            <!-- 9. Modificaciones -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-edit mr-3"></i>
                    9. Modificaciones a los Términos
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Norttek Solutions se reserva el derecho de modificar estos términos en cualquier momento. 
                    Las modificaciones serán efectivas inmediatamente después de su publicación en nuestro sitio web. 
                    Es responsabilidad del cliente revisar periódicamente estos términos.
                </p>
            </section>

            <!-- 10. Ley Aplicable -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-gavel mr-3"></i>
                    10. Ley Aplicable y Jurisdicción
                </h2>
                <div class="bg-gray-100 p-6 rounded-lg">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Estos términos y condiciones se rigen por las leyes de los Estados Unidos Mexicanos.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Para la resolución de cualquier controversia derivada de estos términos, las partes se 
                        someten expresamente a la jurisdicción de los tribunales competentes de 
                        <strong>[ESPECIFICAR CIUDAD]</strong>, renunciando a cualquier otro fuero que pudiera corresponderles.
                    </p>
                </div>
            </section>

            <!-- Contacto -->
            <section class="border-t-2 border-blue-200 pt-8">
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-phone mr-3"></i>
                    Contacto
                </h2>
                <div class="bg-blue-50 p-6 rounded-lg">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Para cualquier consulta sobre estos términos y condiciones, puede contactarnos:
                    </p>
                    <div class="grid md:grid-cols-2 gap-6 text-sm">
                        <div>
                            <p class="font-semibold text-gray-800"><i class="fa-solid fa-envelope" aria-hidden="true"></i> Email:</p>
                            <p class="text-gray-700">[ESPECIFICAR EMAIL]</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800"><i class="fa-solid fa-phone" aria-hidden="true"></i> Teléfono:</p>
                            <p class="text-gray-700">[ESPECIFICAR TELÉFONO]</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800"><i class="fa-solid fa-building" aria-hidden="true"></i> Dirección:</p>
                            <p class="text-gray-700">[ESPECIFICAR DIRECCIÓN COMPLETA]</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800"><i class="fa-solid fa-globe" aria-hidden="true"></i> Sitio web:</p>
                            <p class="text-gray-700">www.norttek.com.mx</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <!-- Botones de acción -->
    <div class="text-center mt-8 space-x-4">
        <a href="privacidad.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
            <i class="fa-solid fa-user-shield mr-2"></i>
            Ver Aviso de Privacidad
        </a>
        <a href="contact.php" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
            <i class="fa-solid fa-envelope mr-2"></i>
            Contactar
        </a>
    </div>

</div>