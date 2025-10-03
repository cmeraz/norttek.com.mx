<!-- Aviso de Privacidad Content -->
<div class="container mx-auto py-8 px-4">
    
    <!-- Header -->
    <div class="text-center mb-8">
        <?php nt_heading('Aviso de Privacidad', 'fa-solid fa-user-shield', 'xl', 'Protección de datos personales conforme a la LFPDPPP', ['animate'=>true,'class'=>'nt-heading-accent-bar']); ?>
        <p class="text-gray-600 mt-4">
            <strong>Última actualización:</strong> <?= date('d/m/Y') ?>
        </p>
        <div class="inline-flex items-center bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-medium mt-2">
            <i class="fa-solid fa-shield-halved mr-2"></i>
            Cumplimos con la Ley Federal de Protección de Datos Personales
        </div>
    </div>

    <!-- Contenido Legal -->
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-8 space-y-8">

            <!-- Responsable del Tratamiento -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-building mr-3"></i>
                    Responsable del Tratamiento de Datos
                </h2>
                <div class="bg-blue-50 p-6 rounded-lg">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <p class="font-semibold text-blue-800 mb-2">Razón Social:</p>
                            <p class="text-gray-700">[ESPECIFICAR RAZÓN SOCIAL COMPLETA]</p>
                            
                            <p class="font-semibold text-blue-800 mb-2 mt-4">RFC:</p>
                            <p class="text-gray-700">[ESPECIFICAR RFC]</p>
                        </div>
                        <div>
                            <p class="font-semibold text-blue-800 mb-2">Domicilio:</p>
                            <p class="text-gray-700">[ESPECIFICAR DOMICILIO FISCAL COMPLETO]</p>
                            
                            <p class="font-semibold text-blue-800 mb-2 mt-4">Contacto:</p>
                            <p class="text-gray-700">
                                <i class="fa-solid fa-envelope" aria-hidden="true"></i> [ESPECIFICAR EMAIL]<br>
                                <i class="fa-solid fa-phone" aria-hidden="true"></i> [ESPECIFICAR TELÉFONO]
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Datos que Recabamos -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-database mr-3"></i>
                    Datos Personales que Recabamos
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="border-l-4 border-green-500 pl-6">
                        <h3 class="font-semibold text-lg text-green-700 mb-3">Datos de Identificación</h3>
                        <ul class="text-gray-700 space-y-1">
                            <li>• Nombre completo</li>
                            <li>• RFC (si aplica)</li>
                            <li>• CURP (si aplica)</li>
                            <li>• Identificación oficial</li>
                            <li>• Comprobante de domicilio</li>
                        </ul>
                    </div>
                    <div class="border-l-4 border-blue-500 pl-6">
                        <h3 class="font-semibold text-lg text-blue-700 mb-3">Datos de Contacto</h3>
                        <ul class="text-gray-700 space-y-1">
                            <li>• Teléfono fijo y móvil</li>
                            <li>• Correo electrónico</li>
                            <li>• Dirección completa</li>
                            <li>• Redes sociales (si aplica)</li>
                        </ul>
                    </div>
                    <div class="border-l-4 border-purple-500 pl-6">
                        <h3 class="font-semibold text-lg text-purple-700 mb-3">Datos Laborales</h3>
                        <ul class="text-gray-700 space-y-1">
                            <li>• Empresa donde labora</li>
                            <li>• Puesto o cargo</li>
                            <li>• Datos de contacto laboral</li>
                            <li>• Giro de la empresa</li>
                        </ul>
                    </div>
                    <div class="border-l-4 border-orange-500 pl-6">
                        <h3 class="font-semibold text-lg text-orange-700 mb-3">Datos Técnicos</h3>
                        <ul class="text-gray-700 space-y-1">
                            <li>• Dirección IP</li>
                            <li>• Cookies del navegador</li>
                            <li>• Datos de navegación web</li>
                            <li>• Preferencias de usuario</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Finalidades del Tratamiento -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-bullseye mr-3"></i>
                    Finalidades del Tratamiento
                </h2>
                
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-green-700 mb-3">
                        <i class="fa-solid fa-check-circle mr-2"></i>
                        Finalidades Primarias (Necesarias para el servicio)
                    </h3>
                    <div class="bg-green-50 p-6 rounded-lg">
                        <ul class="text-gray-700 space-y-2">
                            <li>• Prestación de servicios de seguridad y telecomunicaciones</li>
                            <li>• Elaboración de cotizaciones y contratos</li>
                            <li>• Facturación y cobranza</li>
                            <li>• Soporte técnico y mantenimiento</li>
                            <li>• Cumplimiento de obligaciones contractuales</li>
                            <li>• Atención de quejas y sugerencias</li>
                            <li>• Cumplimiento de obligaciones legales</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-blue-700 mb-3">
                        <i class="fa-solid fa-star mr-2"></i>
                        Finalidades Secundarias (Requieren consentimiento)
                    </h3>
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <ul class="text-gray-700 space-y-2">
                            <li>• Envío de promociones y ofertas especiales</li>
                            <li>• Invitaciones a eventos y capacitaciones</li>
                            <li>• Estudios de mercado y mejora de servicios</li>
                            <li>• Comunicación de nuevos productos y servicios</li>
                            <li>• Fidelización y programas de lealtad</li>
                        </ul>
                        <div class="mt-4 p-4 bg-white border-2 border-blue-200 rounded-lg">
                            <p class="text-sm text-gray-600">
                                <strong>Nota:</strong> Si no desea que sus datos se utilicen para finalidades secundarias, 
                                puede manifestarlo enviando un email a [ESPECIFICAR EMAIL] sin que esto afecte los servicios contratados.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Derechos ARCO -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-key mr-3"></i>
                    Sus Derechos (ARCO)
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-green-50 to-blue-50 p-6 rounded-lg">
                        <h3 class="font-bold text-lg text-green-700 mb-3 flex items-center">
                            <i class="fa-solid fa-search mr-2"></i>
                            Acceso
                        </h3>
                        <p class="text-gray-700 text-sm">
                            Conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso.
                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-6 rounded-lg">
                        <h3 class="font-bold text-lg text-blue-700 mb-3 flex items-center">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>
                            Rectificación
                        </h3>
                        <p class="text-gray-700 text-sm">
                            Solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta.
                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-red-50 p-6 rounded-lg">
                        <h3 class="font-bold text-lg text-purple-700 mb-3 flex items-center">
                            <i class="fa-solid fa-ban mr-2"></i>
                            Cancelación
                        </h3>
                        <p class="text-gray-700 text-sm">
                            Dar de baja su información personal de nuestras bases de datos cuando considere que no se requiere para alguna de las finalidades señaladas.
                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-red-50 to-orange-50 p-6 rounded-lg">
                        <h3 class="font-bold text-lg text-red-700 mb-3 flex items-center">
                            <i class="fa-solid fa-shield-halved mr-2"></i>
                            Oposición
                        </h3>
                        <p class="text-gray-700 text-sm">
                            Oponerse al uso de sus datos personales para finalidades específicas, especialmente para fines comerciales.
                        </p>
                    </div>
                </div>

                <div class="mt-6 bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-r-lg">
                    <h4 class="font-semibold text-lg text-yellow-800 mb-3">¿Cómo ejercer sus derechos ARCO?</h4>
                    <ol class="text-gray-700 space-y-2">
                        <li><strong>1.</strong> Envíe su solicitud por escrito a: <span class="font-mono bg-gray-100 px-2 py-1 rounded">[ESPECIFICAR EMAIL]</span></li>
                        <li><strong>2.</strong> Incluya: nombre completo, domicilio, teléfono, email, copia de identificación oficial</li>
                        <li><strong>3.</strong> Describa claramente qué derecho desea ejercer y los datos involucrados</li>
                        <li><strong>4.</strong> Recibirá respuesta en un plazo máximo de <strong>20 días hábiles</strong></li>
                    </ol>
                </div>
            </section>

            <!-- Medidas de Seguridad -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-lock mr-3"></i>
                    Medidas de Seguridad
                </h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center p-6 bg-green-50 rounded-lg">
                        <div class="text-3xl text-green-600 mb-3">
                            <i class="fa-solid fa-server"></i>
                        </div>
                        <h3 class="font-semibold text-green-700 mb-2">Seguridad Física</h3>
                        <p class="text-gray-600 text-sm">
                            Servidores protegidos en centros de datos certificados con acceso restringido.
                        </p>
                    </div>
                    <div class="text-center p-6 bg-blue-50 rounded-lg">
                        <div class="text-3xl text-blue-600 mb-3">
                            <i class="fa-solid fa-code"></i>
                        </div>
                        <h3 class="font-semibold text-blue-700 mb-2">Seguridad Técnica</h3>
                        <p class="text-gray-600 text-sm">
                            Encriptación SSL, firewalls, sistemas de autenticación y copias de respaldo.
                        </p>
                    </div>
                    <div class="text-center p-6 bg-purple-50 rounded-lg">
                        <div class="text-3xl text-purple-600 mb-3">
                            <i class="fa-solid fa-users-gear"></i>
                        </div>
                        <h3 class="font-semibold text-purple-700 mb-2">Seguridad Administrativa</h3>
                        <p class="text-gray-600 text-sm">
                            Políticas de privacidad, capacitación del personal y auditorías regulares.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Transferencias -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-share-nodes mr-3"></i>
                    Transferencias de Datos
                </h2>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Sus datos personales pueden ser compartidos con terceros únicamente en los siguientes casos:
                    </p>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">Sin requerir consentimiento:</h4>
                            <ul class="text-gray-700 space-y-1 text-sm">
                                <li>• Autoridades competentes por mandato legal</li>
                                <li>• Proveedores de servicios necesarios (hosting, mensajería)</li>
                                <li>• Instituciones financieras para procesamiento de pagos</li>
                                <li>• Empresas de mantenimiento y soporte técnico</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">Requiriendo consentimiento:</h4>
                            <ul class="text-gray-700 space-y-1 text-sm">
                                <li>• Empresas afiliadas o subsidiarias</li>
                                <li>• Socios comerciales para ofertas conjuntas</li>
                                <li>• Empresas de investigación de mercados</li>
                                <li>• Cualquier otro tercero no mencionado</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cookies -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-cookie-bite mr-3"></i>
                    Uso de Cookies y Tecnologías Similares
                </h2>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        Nuestro sitio web utiliza cookies y tecnologías similares para mejorar su experiencia de navegación, 
                        recordar sus preferencias y proporcionar contenido personalizado.
                    </p>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="bg-green-50 p-4 rounded-lg text-center">
                            <div class="text-2xl text-green-600 mb-2">
                                <i class="fa-solid fa-cog"></i>
                            </div>
                            <h4 class="font-semibold text-green-700">Funcionales</h4>
                            <p class="text-xs text-gray-600 mt-1">Esenciales para el funcionamiento del sitio</p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg text-center">
                            <div class="text-2xl text-blue-600 mb-2">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <h4 class="font-semibold text-blue-700">Analíticas</h4>
                            <p class="text-xs text-gray-600 mt-1">Para análisis y mejora del sitio</p>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg text-center">
                            <div class="text-2xl text-purple-600 mb-2">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>
                            <h4 class="font-semibold text-purple-700">Marketing</h4>
                            <p class="text-xs text-gray-600 mt-1">Para publicidad personalizada</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cambios al Aviso -->
            <section>
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-clock-rotate-left mr-3"></i>
                    Cambios al Aviso de Privacidad
                </h2>
                <div class="bg-orange-50 border-l-4 border-orange-400 p-6 rounded-r-lg">
                    <p class="text-gray-700 leading-relaxed">
                        Nos reservamos el derecho de efectuar modificaciones o actualizaciones al presente aviso de privacidad 
                        para atender novedades legislativas, políticas internas o nuevos requerimientos para la prestación 
                        u ofrecimiento de nuestros servicios o productos.
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-4">
                        Estas modificaciones estarán disponibles al público a través de nuestro sitio web 
                        <strong>www.norttek.com.mx</strong> o se los haremos saber a través de los medios de contacto que nos haya proporcionado.
                    </p>
                </div>
            </section>

            <!-- Contacto para Privacidad -->
            <section class="border-t-2 border-blue-200 pt-8">
                <h2 class="text-2xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fa-solid fa-envelope mr-3"></i>
                    Contacto para Temas de Privacidad
                </h2>
                <div class="bg-blue-50 p-6 rounded-lg">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Para cualquier consulta sobre este aviso de privacidad, el tratamiento de sus datos personales, 
                        así como para ejercer sus derechos ARCO, puede contactar a nuestro responsable de protección de datos:
                    </p>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <p class="font-semibold text-blue-800"><i class="fa-solid fa-envelope" aria-hidden="true"></i> Email especializado:</p>
                            <p class="text-gray-700 font-mono bg-white px-3 py-2 rounded border">
                                privacidad@norttek.com.mx
                            </p>
                            <p class="font-semibold text-blue-800"><i class="fa-solid fa-phone" aria-hidden="true"></i> Teléfono:</p>
                            <p class="text-gray-700">[ESPECIFICAR TELÉFONO]</p>
                        </div>
                        <div class="space-y-2">
                            <p class="font-semibold text-blue-800"><i class="fa-solid fa-building" aria-hidden="true"></i> Horario de atención:</p>
                            <p class="text-gray-700">
                                Lunes a Viernes: 9:00 - 18:00 hrs<br>
                                Sábados: 9:00 - 14:00 hrs
                            </p>
                            <p class="font-semibold text-blue-800">⏱️ Tiempo de respuesta:</p>
                            <p class="text-gray-700">Máximo 20 días hábiles</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <!-- Botones de acción -->
    <div class="text-center mt-8 space-x-4">
        <a href="terminos.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
            <i class="fa-solid fa-file-contract mr-2"></i>
            Ver Términos de Uso
        </a>
        <a href="contact.php" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
            <i class="fa-solid fa-envelope mr-2"></i>
            Contactar
        </a>
    </div>

</div>