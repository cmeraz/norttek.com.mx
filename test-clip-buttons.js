/**
 * Test de botones de copiar - Internet Page
 * Este archivo verifica que todos los botones de copiar en internet.php funcionen correctamente
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('🧪 [Test Internet] Iniciando pruebas de botones de copiar...');
    
    // Esperar un poco para que la página cargue completamente
    setTimeout(function() {
        testCopyButtons();
    }, 1000);
});

function testCopyButtons() {
    console.log('🔍 [Test Internet] Buscando botones de copiar...');
    
    // Buscar todos los botones de copiar
    const copyButtons = document.querySelectorAll('.clip-btn');
    console.log(`📋 [Test Internet] Botones encontrados: ${copyButtons.length}`);
    
    if (copyButtons.length === 0) {
        console.warn('⚠️ [Test Internet] No se encontraron botones de copiar');
        return;
    }
    
    // Verificar cada botón
    copyButtons.forEach((button, index) => {
        const dataClip = button.getAttribute('data-clip');
        const label = button.getAttribute('aria-label') || 'Sin etiqueta';
        
        console.log(`📋 [Test Internet] Botón ${index + 1}:`);
        console.log(`   - data-clip: "${dataClip}"`);
        console.log(`   - aria-label: "${label}"`);
        console.log(`   - Elemento padre:`, button.parentElement.textContent.trim().substring(0, 50) + '...');
        
        // Verificar que el botón tenga data-clip
        if (!dataClip || dataClip.trim() === '') {
            console.error(`❌ [Test Internet] Botón ${index + 1} no tiene data-clip válido`);
        } else {
            console.log(`✅ [Test Internet] Botón ${index + 1} configurado correctamente`);
        }
    });
    
    // Verificar si NTNotify existe
    if (window.NTNotify) {
        console.log('✅ [Test Internet] Sistema de notificaciones NTNotify disponible');
        
        // Probar notificación
        setTimeout(() => {
            window.NTNotify.success('Test de notificación exitoso');
        }, 2000);
    } else {
        console.warn('⚠️ [Test Internet] Sistema de notificaciones NTNotify no disponible');
    }
    
    // Verificar si la función copiarValor existe
    if (window.copiarValor) {
        console.log('✅ [Test Internet] Función copiarValor disponible globalmente');
    } else {
        console.warn('⚠️ [Test Internet] Función copiarValor no disponible globalmente');
    }
    
    // Probar manualmente el primer botón si existe
    if (copyButtons.length > 0) {
        const firstButton = copyButtons[0];
        const testValue = firstButton.getAttribute('data-clip');
        
        if (testValue && testValue.trim() !== '') {
            console.log(`🧪 [Test Internet] Probando copia automática del primer botón: "${testValue}"`);
            
            setTimeout(() => {
                // Simular click en el primer botón
                try {
                    firstButton.click();
                    console.log('✅ [Test Internet] Click simulado en primer botón ejecutado');
                } catch (error) {
                    console.error('❌ [Test Internet] Error al simular click:', error);
                }
            }, 3000);
        }
    }
    
    // Resumen final
    setTimeout(() => {
        console.log('📊 [Test Internet] Resumen de pruebas:');
        console.log(`   - Botones encontrados: ${copyButtons.length}`);
        console.log(`   - Sistema de notificaciones: ${window.NTNotify ? 'Disponible' : 'No disponible'}`);
        console.log(`   - API Clipboard: ${navigator.clipboard ? 'Disponible' : 'No disponible'}`);
        console.log(`   - Contexto seguro: ${window.isSecureContext ? 'Sí (HTTPS/localhost)' : 'No (HTTP)'}`);
    }, 5000);
}

// Función para probar manualmente un valor específico
window.testCopyValue = function(value) {
    if (!value) {
        console.error('❌ [Test Manual] Proporciona un valor para probar');
        return;
    }
    
    console.log(`🧪 [Test Manual] Probando copia de: "${value}"`);
    
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(value).then(() => {
            console.log('✅ [Test Manual] Copia exitosa con Clipboard API');
            if (window.NTNotify) window.NTNotify.success('Copia manual exitosa');
        }).catch((error) => {
            console.error('❌ [Test Manual] Error con Clipboard API:', error);
        });
    } else {
        // Fallback method
        try {
            const textArea = document.createElement('textarea');
            textArea.value = value;
            textArea.style.position = 'fixed';
            textArea.style.opacity = '0';
            textArea.style.left = '-9999px';
            document.body.appendChild(textArea);
            textArea.select();
            const successful = document.execCommand('copy');
            document.body.removeChild(textArea);
            
            if (successful) {
                console.log('✅ [Test Manual] Copia exitosa con execCommand');
                if (window.NTNotify) window.NTNotify.success('Copia manual exitosa (fallback)');
            } else {
                console.error('❌ [Test Manual] Error con execCommand');
            }
        } catch (error) {
            console.error('❌ [Test Manual] Error con método fallback:', error);
        }
    }
};

console.log('🧪 [Test Internet] Script de pruebas cargado. Usa testCopyValue("texto") para pruebas manuales.');