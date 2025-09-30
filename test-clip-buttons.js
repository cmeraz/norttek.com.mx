// Test script para verificar botones de copiar
console.log('🧪 Iniciando test de botones de copiar...');

// Verificar que existen elementos con clase clip-btn
const buttons = document.querySelectorAll('.clip-btn');
console.log(`📋 Botones encontrados: ${buttons.length}`);

buttons.forEach((button, index) => {
    console.log(`📋 Botón ${index + 1}:`, {
        'data-clip': button.dataset.clip,
        'text': button.textContent?.trim(),
        'visible': button.offsetParent !== null
    });
});

// Test manual de la función de copiar
window.testCopy = function(text) {
    console.log('🧪 Probando copiar:', text);
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(() => {
            console.log('✅ Copiado exitosamente con Clipboard API');
        }).catch(err => {
            console.error('❌ Error con Clipboard API:', err);
        });
    } else {
        console.log('📋 Clipboard API no disponible, usando fallback');
    }
};

console.log('🧪 Test completado. Usa testCopy("texto") para probar manualmente.');