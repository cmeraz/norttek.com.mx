/**
 * Test de botones de planes - Telefonía Page
 * Este archivo verifica que los botones tel-plan__btn no se ejecuten múltiples veces
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('🧪 [Test Telefonía] Iniciando pruebas de ejecución única...');
    
    // Contador para verificar ejecuciones múltiples
    window.telefoniaTestExecutions = (window.telefoniaTestExecutions || 0) + 1;
    console.log(`🔢 [Test Telefonía] Ejecución número: ${window.telefoniaTestExecutions}`);
    
    if (window.telefoniaTestExecutions > 1) {
        console.warn(`⚠️ [Test Telefonía] ADVERTENCIA: Script ejecutándose múltiples veces (${window.telefoniaTestExecutions})`);
    }
    
    // Esperar un poco para que la página cargue completamente
    setTimeout(function() {
        testPlanButtons();
        monitorClickEvents();
    }, 1000);
});

function testPlanButtons() {
    console.log('🔍 [Test Telefonía] Verificando inicialización única...');
    
    // Verificar flags globales
    console.log('📊 [Test Telefonía] Estado de flags:');
    console.log(`   - telefoniaJSLoaded: ${window.telefoniaJSLoaded}`);
    console.log(`   - telefoniaButtonsInitialized: ${window.telefoniaButtonsInitialized}`);
    console.log(`   - Test executions: ${window.telefoniaTestExecutions}`);
    
    // Buscar todos los botones de planes
    const planButtons = document.querySelectorAll('.tel-plan__btn');
    console.log(`📋 [Test Telefonía] Botones encontrados: ${planButtons.length}`);
    
    if (planButtons.length === 0) {
        console.warn('⚠️ [Test Telefonía] No se encontraron botones de planes');
        return;
    }
    
    // Verificar cada botón
    planButtons.forEach((button, index) => {
        const listenerAdded = button.dataset.listenerAdded;
        const dataPlan = button.getAttribute('data-plan');
        
        console.log(`📋 [Test Telefonía] Botón ${index + 1}:`);
        console.log(`   - data-plan: "${dataPlan}"`);
        console.log(`   - listenerAdded: "${listenerAdded}"`);
        
        if (listenerAdded === 'true') {
            console.log(`✅ [Test Telefonía] Botón ${index + 1} correctamente marcado como inicializado`);
        } else {
            console.warn(`⚠️ [Test Telefonía] Botón ${index + 1} no está marcado como inicializado`);
        }
    });
}

function monitorClickEvents() {
    console.log('👁️ [Test Telefonía] Configurando monitoreo de clicks...');
    
    const planButtons = document.querySelectorAll('.tel-plan__btn');
    
    planButtons.forEach((button, index) => {
        // Contador de clicks por botón
        if (!button.dataset.clickCount) {
            button.dataset.clickCount = '0';
        }
        
        // Interceptar clicks para conteo (sin interferir con la funcionalidad real)
        button.addEventListener('click', function(e) {
            const currentCount = parseInt(button.dataset.clickCount) + 1;
            button.dataset.clickCount = currentCount.toString();
            
            console.log(`🖱️ [Test Telefonía] Click ${currentCount} en botón ${index + 1}: ${this.getAttribute('data-plan')}`);
            
            if (currentCount > 1) {
                console.log(`ℹ️ [Test Telefonía] Múltiples clicks detectados en botón ${index + 1} (${currentCount} veces)`);
            }
        }, true); // Usar capture para ejecutar antes que el listener principal
    });
}

// Función para simular y verificar comportamiento
window.testSingleExecution = function(buttonIndex = 0) {
    const planButtons = document.querySelectorAll('.tel-plan__btn');
    
    if (!planButtons[buttonIndex]) {
        console.error(`❌ [Test Manual] No existe botón con índice ${buttonIndex}`);
        return;
    }
    
    const button = planButtons[buttonIndex];
    console.log(`🧪 [Test Manual] Simulando click único en botón ${buttonIndex + 1}`);
    
    // Resetear contador para esta prueba
    button.dataset.clickCount = '0';
    
    // Simular click
    button.click();
    
    // Verificar resultado después de un momento
    setTimeout(() => {
        const clickCount = button.dataset.clickCount;
        const plan = button.getAttribute('data-plan');
        
        console.log(`📊 [Test Manual] Resultado para "${plan}":`);
        console.log(`   - Clicks registrados: ${clickCount}`);
        console.log(`   - Estado esperado: 1 click`);
        
        if (clickCount === '1') {
            console.log(`✅ [Test Manual] Comportamiento correcto: ejecución única`);
        } else {
            console.error(`❌ [Test Manual] Problema detectado: ${clickCount} ejecuciones`);
        }
    }, 500);
};

// Función para verificar estado global
window.checkTelefoniaState = function() {
    console.log('� [Debug] Estado actual del sistema:');
    console.log('   Global flags:');
    console.log(`     - telefoniaJSLoaded: ${window.telefoniaJSLoaded}`);
    console.log(`     - telefoniaButtonsInitialized: ${window.telefoniaButtonsInitialized}`);
    console.log(`     - Test executions: ${window.telefoniaTestExecutions}`);
    
    const buttons = document.querySelectorAll('.tel-plan__btn');
    console.log(`   Botones (${buttons.length}):`);
    
    buttons.forEach((button, index) => {
        console.log(`     Botón ${index + 1}:`);
        console.log(`       - listenerAdded: ${button.dataset.listenerAdded}`);
        console.log(`       - clickCount: ${button.dataset.clickCount || '0'}`);
        console.log(`       - data-plan: ${button.getAttribute('data-plan')}`);
    });
};

console.log('🧪 [Test Telefonía] Script de pruebas cargado.');
console.log('   - Usa testSingleExecution(0) para probar botón específico');
console.log('   - Usa checkTelefoniaState() para ver estado completo');