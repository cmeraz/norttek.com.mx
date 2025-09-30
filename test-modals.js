// Script de prueba para modales de aviso
// Ejecutar en la consola del navegador en internet.php

console.log('=== PRUEBA DE MODALES DE AVISO ===');

// 1. Verificar que los elementos existen
function testElementsExist() {
  console.log('\n1. Verificando existencia de elementos:');
  
  const modalPago = document.getElementById('modal-aviso-pago');
  const modalWhatsApp = document.getElementById('modal-aviso-whatsapp');
  const btnPago1 = document.getElementById('btn-pagar-tarjeta-1');
  const btnPago2 = document.getElementById('btn-pagar-tarjeta-2');
  
  console.log('✓ Modal Aviso Pago:', !!modalPago);
  console.log('✓ Modal Aviso WhatsApp:', !!modalWhatsApp);
  console.log('✓ Botón Pagar Tarjeta 1:', !!btnPago1);
  console.log('✓ Botón Pagar Tarjeta 2:', !!btnPago2);
  
  return { modalPago, modalWhatsApp, btnPago1, btnPago2 };
}

// 2. Probar modal de pago manualmente
function testModalPago() {
  console.log('\n2. Probando modal de aviso de pago:');
  
  const modal = document.getElementById('modal-aviso-pago');
  if (modal) {
    modal.style.display = 'flex';
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    console.log('✓ Modal de pago mostrado');
    
    // Auto-cerrar después de 3 segundos
    setTimeout(() => {
      modal.style.display = 'none';
      modal.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
      console.log('✓ Modal de pago cerrado automáticamente');
    }, 3000);
  } else {
    console.log('✗ Modal de pago no encontrado');
  }
}

// 3. Probar modal de WhatsApp manualmente
function testModalWhatsApp() {
  console.log('\n3. Probando modal de aviso de WhatsApp:');
  
  const modal = document.getElementById('modal-aviso-whatsapp');
  if (modal) {
    modal.style.display = 'flex';
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    console.log('✓ Modal de WhatsApp mostrado');
    
    // Auto-cerrar después de 3 segundos
    setTimeout(() => {
      modal.style.display = 'none';
      modal.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
      console.log('✓ Modal de WhatsApp cerrado automáticamente');
    }, 3000);
  } else {
    console.log('✗ Modal de WhatsApp no encontrado');
  }
}

// 4. Simular clic en botón de pago
function testPaymentButtonClick() {
  console.log('\n4. Probando clic en botón de pago:');
  
  const btn = document.getElementById('btn-pagar-tarjeta-1');
  if (btn) {
    // Crear evento simulado
    const event = new Event('click', { bubbles: true, cancelable: true });
    btn.dispatchEvent(event);
    console.log('✓ Evento de clic enviado al botón de pago');
  } else {
    console.log('✗ Botón de pago no encontrado');
  }
}

// 5. Verificar listeners activos
function testListeners() {
  console.log('\n5. Verificando listeners activos:');
  
  // Verificar si los listeners están configurados
  const hasListeners = window.getEventListeners ? 
    window.getEventListeners(document).length > 0 : 
    'Función getEventListeners no disponible';
    
  console.log('Listeners en document:', hasListeners);
  console.log('Estado del sistema de modales: Configurado');
}

// Ejecutar todas las pruebas
function runAllTests() {
  const elements = testElementsExist();
  
  // Solo ejecutar pruebas si los elementos existen
  if (elements.modalPago && elements.modalWhatsApp) {
    setTimeout(() => testModalPago(), 1000);
    setTimeout(() => testModalWhatsApp(), 5000);
    setTimeout(() => testPaymentButtonClick(), 9000);
    setTimeout(() => testListeners(), 10000);
    
    console.log('\n📝 INSTRUCCIONES DE PRUEBA MANUAL:');
    console.log('1. Haz clic en cualquier botón "Pagar con Tarjeta" → Debería aparecer modal de aviso');
    console.log('2. Completa el formulario de nombre y envía WhatsApp → Debería aparecer modal de seguimiento');
    console.log('3. Presiona Escape o haz clic en "×" para cerrar modales');
    console.log('4. Revisa la consola para ver los logs de actividad');
  } else {
    console.log('✗ Algunos elementos no están disponibles. Verifica que estés en internet.php');
  }
}

// Ejecutar pruebas automáticamente
runAllTests();

// Exportar funciones para uso manual
window.testModals = {
  testElementsExist,
  testModalPago,
  testModalWhatsApp,
  testPaymentButtonClick,
  testListeners,
  runAllTests
};

console.log('\n🛠️  Funciones disponibles:');
console.log('testModals.testElementsExist() - Verificar elementos');
console.log('testModals.testModalPago() - Probar modal de pago');
console.log('testModals.testModalWhatsApp() - Probar modal de WhatsApp');
console.log('testModals.testPaymentButtonClick() - Simular clic en pago');
console.log('testModals.runAllTests() - Ejecutar todas las pruebas');