// Script de diagnóstico para el botón "Ya eres cliente"
// Ejecutar en la consola del navegador en internet.php

console.log('=== DIAGNÓSTICO BOTÓN "YA ERES CLIENTE" ===');

// 1. Verificar que el botón existe
function testButtonExists() {
  console.log('\n1. Verificando existencia del botón:');
  
  const btnCliente = document.getElementById('btn-cliente');
  console.log('✓ Botón btn-cliente:', !!btnCliente);
  
  if (btnCliente) {
    console.log('✓ Botón visible:', btnCliente.offsetParent !== null);
    console.log('✓ Botón habilitado:', !btnCliente.disabled);
    console.log('✓ Listeners:', getEventListeners ? getEventListeners(btnCliente) : 'No disponible');
  }
  
  return btnCliente;
}

// 2. Verificar que el modal existe
function testModalExists() {
  console.log('\n2. Verificando existencia del modal:');
  
  const modal = document.getElementById('cliente-login-modal');
  console.log('✓ Modal cliente-login-modal:', !!modal);
  
  if (modal) {
    console.log('✓ Display actual:', window.getComputedStyle(modal).display);
    console.log('✓ aria-hidden:', modal.getAttribute('aria-hidden'));
    console.log('✓ Visible:', modal.offsetParent !== null);
  }
  
  return modal;
}

// 3. Probar función mostrarCliente directamente
function testMostrarCliente() {
  console.log('\n3. Probando función mostrarCliente:');
  
  if (typeof mostrarCliente === 'function') {
    console.log('✓ Función mostrarCliente existe');
    try {
      mostrarCliente();
      console.log('✓ Función ejecutada sin errores');
    } catch(e) {
      console.error('✗ Error ejecutando mostrarCliente:', e);
    }
  } else {
    console.error('✗ Función mostrarCliente no existe');
  }
}

// 4. Probar función abrirLoginCliente directamente
function testAbrirLoginCliente() {
  console.log('\n4. Probando función abrirLoginCliente:');
  
  if (typeof abrirLoginCliente === 'function') {
    console.log('✓ Función abrirLoginCliente existe');
    try {
      abrirLoginCliente();
      console.log('✓ Función ejecutada sin errores');
    } catch(e) {
      console.error('✗ Error ejecutando abrirLoginCliente:', e);
    }
  } else {
    console.error('✗ Función abrirLoginCliente no existe');
  }
}

// 5. Simular click en el botón
function testButtonClick() {
  console.log('\n5. Simulando click en el botón:');
  
  const btnCliente = document.getElementById('btn-cliente');
  if (btnCliente) {
    console.log('✓ Simulando click...');
    
    // Crear evento de click
    const event = new MouseEvent('click', {
      bubbles: true,
      cancelable: true,
      view: window
    });
    
    btnCliente.dispatchEvent(event);
    console.log('✓ Evento click enviado');
  } else {
    console.error('✗ Botón no encontrado');
  }
}

// 6. Verificar estado de autenticación
function testAuth() {
  console.log('\n6. Verificando estado de autenticación:');
  
  if (typeof clienteEstaAutenticado === 'function') {
    const isAuth = clienteEstaAutenticado();
    console.log('✓ clienteEstaAutenticado():', isAuth);
    
    if (typeof getAuth === 'function') {
      const auth = getAuth();
      console.log('✓ getAuth():', auth);
    }
  } else {
    console.error('✗ Función clienteEstaAutenticado no existe');
  }
}

// 7. Verificar NTModal
function testNTModal() {
  console.log('\n7. Verificando NTModal:');
  
  console.log('✓ window.NTModal:', !!window.NTModal);
  if (window.NTModal) {
    console.log('✓ NTModal.open:', typeof window.NTModal.open);
    console.log('✓ NTModal.close:', typeof window.NTModal.close);
  }
}

// Ejecutar todas las pruebas
function runAllTests() {
  const btn = testButtonExists();
  const modal = testModalExists();
  testAuth();
  testNTModal();
  
  if (btn && modal) {
    testMostrarCliente();
    testAbrirLoginCliente();
    testButtonClick();
  }
  
  console.log('\n📝 INSTRUCCIONES:');
  console.log('1. Revisa los resultados arriba');
  console.log('2. Intenta hacer clic manual en "Ya eres cliente"');
  console.log('3. Si no funciona, ejecuta: testButtonClick()');
  console.log('4. Para abrir modal manualmente: testAbrirLoginCliente()');
}

// Ejecutar automáticamente
runAllTests();

// Exportar funciones para uso manual
window.debugCliente = {
  testButtonExists,
  testModalExists,
  testMostrarCliente,
  testAbrirLoginCliente,
  testButtonClick,
  testAuth,
  testNTModal,
  runAllTests
};

console.log('\n🛠️ Funciones disponibles:');
console.log('debugCliente.testButtonExists() - Verificar botón');
console.log('debugCliente.testModalExists() - Verificar modal'); 
console.log('debugCliente.testButtonClick() - Simular click');
console.log('debugCliente.testAbrirLoginCliente() - Abrir modal');
console.log('debugCliente.runAllTests() - Ejecutar todas las pruebas');