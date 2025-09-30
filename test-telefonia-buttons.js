/**
 * Test de botones de planes - Telefonía Page
 * Este archivo verifica que todos los botones tel-plan__btn en telefonia.php funcionen correctamente
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('🧪 [Test Telefonía] Iniciando pruebas de botones de planes...');
    
    // Esperar un poco para que la página cargue completamente
    setTimeout(function() {
        testPlanButtons();
    }, 1000);
});

function testPlanButtons() {
    console.log('🔍 [Test Telefonía] Buscando botones de planes...');
    
    // Buscar todos los botones de planes
    const planButtons = document.querySelectorAll('.tel-plan__btn');
    console.log(`📋 [Test Telefonía] Botones encontrados: ${planButtons.length}`);
    
    if (planButtons.length === 0) {
        console.warn('⚠️ [Test Telefonía] No se encontraron botones de planes');
        return;
    }
    
    // Verificar cada botón
    planButtons.forEach((button, index) => {
        const dataPlan = button.getAttribute('data-plan');
        const dataPrecio = button.getAttribute('data-precio');
        const dataExt = button.getAttribute('data-ext');
        const dataTroncal = button.getAttribute('data-troncal');
        const dataNumeracion = button.getAttribute('data-numeracion');
        
        console.log(`📋 [Test Telefonía] Botón ${index + 1}:`);
        console.log(`   - data-plan: "${dataPlan}"`);
        console.log(`   - data-precio: "${dataPrecio}"`);
        console.log(`   - data-ext: "${dataExt}"`);
        console.log(`   - data-troncal: "${dataTroncal}"`);
        console.log(`   - data-numeracion: "${dataNumeracion}"`);
        
        // Verificar que el botón tenga todos los datos necesarios
        if (!dataPlan || dataPlan.trim() === '') {
            console.error(`❌ [Test Telefonía] Botón ${index + 1} no tiene data-plan válido`);
        }
        if (!dataPrecio || dataPrecio.trim() === '') {
            console.error(`❌ [Test Telefonía] Botón ${index + 1} no tiene data-precio válido`);
        }
        if (!dataExt || dataExt.trim() === '') {
            console.error(`❌ [Test Telefonía] Botón ${index + 1} no tiene data-ext válido`);
        }
        if (!dataTroncal || dataTroncal.trim() === '') {
            console.error(`❌ [Test Telefonía] Botón ${index + 1} no tiene data-troncal válido`);
        }
        
        if (dataPlan && dataPrecio && dataExt && dataTroncal) {
            console.log(`✅ [Test Telefonía] Botón ${index + 1} configurado correctamente`);
        }
    });
    
    // Verificar si NTNotify existe
    if (window.NTNotify) {
        console.log('✅ [Test Telefonía] Sistema de notificaciones NTNotify disponible');
        
        // Probar notificación
        setTimeout(() => {
            window.NTNotify.success('Test de notificación de telefonía exitoso');
        }, 2000);
    } else {
        console.warn('⚠️ [Test Telefonía] Sistema de notificaciones NTNotify no disponible');
    }
    
    // Probar manualmente el primer botón si existe
    if (planButtons.length > 0) {
        const firstButton = planButtons[0];
        const testPlan = firstButton.getAttribute('data-plan');
        
        if (testPlan && testPlan.trim() !== '') {
            console.log(`🧪 [Test Telefonía] Probando envío automático del primer plan: "${testPlan}"`);
            
            setTimeout(() => {
                // Simular click en el primer botón
                try {
                    // No ejecutar el click real para evitar abrir WhatsApp, solo verificar que el evento esté registrado
                    const events = getEventListeners ? getEventListeners(firstButton) : null;
                    console.log('✅ [Test Telefonía] Event listeners en primer botón:', events ? Object.keys(events) : 'No disponible en esta consola');
                } catch (error) {
                    console.error('❌ [Test Telefonía] Error al verificar event listeners:', error);
                }
            }, 3000);
        }
    }
    
    // Resumen final
    setTimeout(() => {
        console.log('📊 [Test Telefonía] Resumen de pruebas:');
        console.log(`   - Botones encontrados: ${planButtons.length}`);
        console.log(`   - Sistema de notificaciones: ${window.NTNotify ? 'Disponible' : 'No disponible'}`);
        console.log(`   - Clases esperadas: .tel-plan__btn`);
        console.log(`   - Datos requeridos: data-plan, data-precio, data-ext, data-troncal`);
    }, 5000);
}

// Función para probar manualmente un plan específico
window.testPlanMessage = function(planName, precio, extensiones, troncal) {
    console.log(`🧪 [Test Manual] Generando mensaje para plan: "${planName}"`);
    
    const mensaje = `🏢 *SOLICITUD DE PLAN TELEFONÍA IP*

📋 *Plan seleccionado:* ${planName || 'Plan no especificado'}
💰 *Precio:* ${precio || 'Precio no especificado'}
📞 *Extensiones:* ${extensiones || 'Extensiones no especificadas'}
🔗 *Troncal:* ${troncal || 'Troncal no especificado'}
📱 *Numeración:* Numeración LADA México

---

¡Hola! Estoy interesado en contratar el ${planName || 'plan'} de Norttek PBX. ¿Podrían proporcionarme más información sobre la instalación, configuración y pasos para comenzar?

Quedo pendiente de su apoyo. ¡Gracias! 🚀`;

    console.log('📱 [Test Manual] Mensaje generado:');
    console.log(mensaje);
    
    const mensajeCodificado = encodeURIComponent(mensaje);
    const whatsappURL = `https://wa.me/526252690997?text=${mensajeCodificado}`;
    
    console.log('🔗 [Test Manual] URL de WhatsApp generada:');
    console.log(whatsappURL);
    
    return {
        mensaje: mensaje,
        url: whatsappURL
    };
};

// Función para simular click en un botón específico (sin abrir WhatsApp)
window.simulatePlanClick = function(buttonIndex) {
    const planButtons = document.querySelectorAll('.tel-plan__btn');
    
    if (!planButtons[buttonIndex]) {
        console.error(`❌ [Test Manual] No existe botón con índice ${buttonIndex}`);
        return;
    }
    
    const button = planButtons[buttonIndex];
    const plan = button.getAttribute('data-plan');
    const precio = button.getAttribute('data-precio');
    const ext = button.getAttribute('data-ext');
    const troncal = button.getAttribute('data-troncal');
    
    console.log(`🎯 [Test Manual] Simulando click en botón ${buttonIndex + 1}: ${plan}`);
    
    // Ejecutar la lógica sin abrir WhatsApp
    return testPlanMessage(plan, precio, ext, troncal);
};

console.log('🧪 [Test Telefonía] Script de pruebas cargado.');
console.log('   - Usa testPlanMessage(plan, precio, ext, troncal) para probar mensajes');
console.log('   - Usa simulatePlanClick(0) para simular click en primer botón');