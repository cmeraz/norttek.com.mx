/**
 * cuentas.js
 * Dashboard privado de cuentas de pago - Funcionalidades JavaScript
 * Carlos Prisciliano Meraz Marioni - Norttek Solutions
 * Estilo: Dashboard de clientes (internetContent.php)
 */

document.addEventListener('DOMContentLoaded', function() {
    initCuentasDashboard();
});

function initCuentasDashboard() {
    console.log('🏦 Inicializando Dashboard de Cuentas...');
    
    // Inicializar componentes
    initCopyButtons();
    initContactButtons();
    initShareButton();
    initPaymentForm();
    initAccountSelection();
    initScrollAnimations();
    initTabsSystem();
    
    // Inicializar animaciones de entrada
    initHeroAnimations();
}

// ==========================================================================
// Animaciones de entrada estilo Internet
// ==========================================================================
function initHeroAnimations() {
    // Animar elementos del hero con delays
    setTimeout(() => {
        const elementsToAnimate = document.querySelectorAll('.nt-heading-anim');
        elementsToAnimate.forEach((element, index) => {
            setTimeout(() => {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0) scale(1)';
            }, index * 150);
        });
    }, 100);
}

function initScrollAnimations() {
    // Intersection Observer para scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '-50px'
    });
    
    document.querySelectorAll('.scroll-anim').forEach(element => {
        observer.observe(element);
    });
}

// ==========================================================================
// Funcionalidad de copiado - estilo Internet
// ==========================================================================
function initCopyButtons() {
    document.querySelectorAll('.clip-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const textToCopy = this.dataset.copy;
            
            if (textToCopy) {
                copyToClipboard(textToCopy).then(() => {
                    showToastModern('✅ Copiado', textToCopy, 'success');
                    
                    // Animación de confirmación estilo Internet
                    this.style.transform = 'scale(0.9)';
                    this.style.color = '#4f8cff';
                    this.style.background = '#eef5ff';
                    
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                        this.style.color = '';
                        this.style.background = '';
                    }, 200);
                }).catch(() => {
                    showToastModern('❌ Error', 'No se pudo copiar', 'error');
                });
            }
        });
    });
}

async function copyToClipboard(text) {
    try {
        if (navigator.clipboard && window.isSecureContext) {
            await navigator.clipboard.writeText(text);
        } else {
            // Fallback para navegadores antiguos
            const textArea = document.createElement('textarea');
            textArea.value = text;
            textArea.style.position = 'fixed';
            textArea.style.opacity = '0';
            textArea.style.left = '-9999px';
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
        }
    } catch (error) {
        throw new Error('Error al copiar');
    }
}

// ==========================================================================
// Funcionalidad de vCards - estilo Internet
// ==========================================================================
function initContactButtons() {
    document.querySelectorAll('.btn-contact').forEach(button => {
        button.addEventListener('click', function() {
            const contactType = this.dataset.contact;
            
            // Animación de botón estilo Internet
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 12px 20px rgba(79, 140, 255, 0.3)';
            
            setTimeout(() => {
                this.style.transform = '';
                this.style.boxShadow = '';
            }, 300);
            
            if (contactType === 'personal') {
                downloadPersonalVCard();
            } else if (contactType === 'empresa') {
                downloadCompanyVCard();
            }
        });
    });
    
    // Botón especial para descargar ambos vCards
    const btnDescargarContactos = document.getElementById('btn-descargar-contactos');
    if (btnDescargarContactos) {
        btnDescargarContactos.addEventListener('click', function() {
            downloadPersonalVCard();
            setTimeout(() => downloadCompanyVCard(), 1000);
            showToastModern('📱 vCards', 'Descargando contactos...', 'info');
        });
    }
}

function downloadPersonalVCard() {
    const vCard = `BEGIN:VCARD
VERSION:3.0
N:Meraz Marioni;Carlos Prisciliano;;Arq;
FN:Carlos Prisciliano Meraz Marioni
ORG:Norttek Solutions
TITLE:Propietario
TEL;TYPE=CELL,VOICE:+52-625-837-4179
EMAIL;TYPE=WORK:cmeraz3944@gmail.com
ADR;TYPE=WORK:;;Calle Rayon y Agustin Melgar #608 Col Centro;Cd. Cuauhtémoc;Chihuahua;31500;México
URL:https://norttek.com.mx
NOTE:RFC: MEMC82010646A\\nCURP: MEMC820106HCHRRR03\\nID CIF: 15010076730\\nArquitecto - Propietario de Norttek Solutions
CATEGORIES:Empresario,Tecnología,Seguridad,Telecomunicaciones
END:VCARD`;

    downloadVCard(vCard, 'Carlos_Prisciliano_Meraz_Norttek.vcf');
    showToastModern('📱 vCard Personal', 'Descarga completada', 'success');
}

function downloadCompanyVCard() {
    const vCard = `BEGIN:VCARD
VERSION:3.0
FN:Norttek Solutions
N:Solutions;Norttek;;;
ORG:Norttek Solutions
EMAIL;TYPE=INTERNET:contacto@norttek.com.mx
TEL;TYPE=WORK:+52 625 269 0997
TEL;TYPE=WORK:+52 614 618 0778
ADR;TYPE=WORK:;;Calle Rayón y Agustín Melgar #608 Col Centro;Cd. Cuauhtémoc;Chihuahua;31500;México
URL:https://norttek.com.mx
NOTE:Empresa especializada en soluciones de seguridad integral\\nCCTV, Alarmas, Control de Acceso, Telefonía IP, Internet\\nRFC: MEMC82010646A\\nTel Cuauhtémoc: (625) 269-0997\\nTel Chihuahua: (614) 618-0778
CATEGORIES:Seguridad,Tecnología,Telecomunicaciones,CCTV,Alarmas
END:VCARD`;

    downloadVCard(vCard, 'Norttek_Solutions.vcf');
    showToastModern('🏢 vCard Empresa', 'Descarga completada', 'success');
}

function downloadVCard(vCardData, fileName) {
    const blob = new Blob([vCardData], { type: 'text/vcard;charset=utf-8' });
    const url = window.URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = fileName;
    link.style.display = 'none';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    window.URL.revokeObjectURL(url);
}

// ==========================================================================
// Funcionalidad de compartir - estilo Internet
// ==========================================================================
function initShareButton() {
    const shareBtn = document.getElementById('btn-compartir');
    
    if (shareBtn) {
        shareBtn.addEventListener('click', async function() {
            // Animación de botón
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 8px 16px rgba(79, 140, 255, 0.3)';
            
            setTimeout(() => {
                this.style.transform = '';
                this.style.boxShadow = '';
            }, 200);
            
            await sharePage();
        });
    }
}

async function sharePage() {
    const shareData = {
        title: 'Cuentas de Pago - Norttek Solutions',
        text: 'Información de cuentas bancarias y datos empresariales de Norttek Solutions',
        url: window.location.href
    };
    
    try {
        if (navigator.share && /android|iphone|ipad|mobile/i.test(navigator.userAgent)) {
            await navigator.share(shareData);
            showToastModern('📤 Compartido', 'Página compartida exitosamente', 'success');
        } else {
            // Fallback: Copiar URL
            await copyToClipboard(window.location.href);
            showToastModern('🔗 URL Copiada', 'Link copiado al portapapeles', 'success');
        }
    } catch (error) {
        if (error.name !== 'AbortError') {
            showToastModern('❌ Error', 'No se pudo compartir la página', 'error');
        }
    }
}

// ==========================================================================
// Selección de cuentas - estilo Internet
// ==========================================================================
function initAccountSelection() {
    document.querySelectorAll('.btn-select-account').forEach(button => {
        button.addEventListener('click', function() {
            const accountType = this.dataset.account;
            
            // Animación del botón
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 12px 20px rgba(16, 185, 129, 0.3)';
            
            setTimeout(() => {
                this.style.transform = '';
                this.style.boxShadow = '';
            }, 300);
            
            selectAccount(accountType);
        });
    });
}

function selectAccount(accountType) {
    // Remover selección previa
    document.querySelectorAll('.cuentas-card').forEach(card => {
        card.classList.remove('selected');
    });
    
    // Marcar como seleccionada
    const selectedCard = document.querySelector(`[data-account="${accountType}"]`).closest('.cuentas-card');
    if (selectedCard) {
        selectedCard.classList.add('selected');
        
        // Animación de selección
        selectedCard.style.transform = 'translateY(-6px) scale(1.02)';
        setTimeout(() => {
            selectedCard.style.transform = '';
        }, 500);
    }
    
    // Guardar selección
    try {
        localStorage.setItem('selectedAccount', accountType);
    } catch (error) {
        console.warn('No se pudo guardar la selección de cuenta');
    }
    
    // Notificación
    const accountNames = {
        'santander': 'Santander'
    };
    
    showToastModern('✅ Cuenta Seleccionada', `${accountNames[accountType]} - Lista para usar`, 'success');
}

// ==========================================================================
// Formulario de solicitud de pago - estilo Internet
// ==========================================================================
function initPaymentForm() {
    const form = document.getElementById('payment-request-form');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            handlePaymentRequest();
        });
        
        // Mejorar UX de inputs
        const inputs = form.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.borderColor = '#4f8cff';
                this.parentElement.style.boxShadow = '0 0 0 3px rgba(79, 140, 255, 0.1)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.borderColor = '';
                this.parentElement.style.boxShadow = '';
            });
        });
    }
}

function handlePaymentRequest() {
    const amount = document.getElementById('payment-amount').value;
    const concept = document.getElementById('payment-concept').value;
    const client = document.getElementById('client-name').value;
    
    // Validaciones con toasts estilo Internet
    if (!amount || parseFloat(amount) <= 0) {
        showToastModern('⚠️ Monto Inválido', 'Ingresa un monto válido', 'error');
        document.getElementById('payment-amount').focus();
        return;
    }
    
    if (!concept.trim()) {
        showToastModern('⚠️ Concepto Requerido', 'Ingresa el concepto del pago', 'error');
        document.getElementById('payment-concept').focus();
        return;
    }
    
    if (!client.trim()) {
        showToastModern('⚠️ Cliente Requerido', 'Ingresa el nombre del cliente', 'error');
        document.getElementById('client-name').focus();
        return;
    }
    
    // Generar solicitud de pago
    generatePaymentRequest(amount, concept, client);
}

function generatePaymentRequest(amount, concept, client) {
    // Mostrar modal de confirmación estilo Internet
    showModalModern(
        'Solicitud de Link de Pago',
        `<div class="payment-summary-modern">
            <div class="summary-item-modern">
                <span class="summary-label">Cliente:</span>
                <strong>${escapeHtml(client)}</strong>
            </div>
            <div class="summary-item-modern">
                <span class="summary-label">Concepto:</span>
                <strong>${escapeHtml(concept)}</strong>
            </div>
            <div class="summary-item-modern">
                <span class="summary-label">Monto:</span>
                <strong>$${parseFloat(amount).toLocaleString('es-MX', {minimumFractionDigits: 2})}</strong>
            </div>
            <div class="summary-note-modern">
                <i class="fa-solid fa-info-circle"></i>
                <p>Esta funcionalidad generará un link de pago seguro con Clip. El cliente recibirá un enlace para completar el pago de forma segura.</p>
            </div>
        </div>`
    );
    
    // Configurar acción del modal
    document.getElementById('modal-confirm').onclick = function() {
        // Simular procesamiento
        showToastModern('⏳ Procesando', 'Generando link de pago...', 'info');
        
        setTimeout(() => {
            closeModal();
            showToastModern('🔗 Link Generado', 'Solicitud enviada exitosamente', 'success');
            
            // Limpiar formulario
            document.getElementById('payment-request-form').reset();
            
            // Simular integración con Clip
            const message = `🏦 *Solicitud de Pago - Norttek Solutions*\n\n` +
                          `👤 *Cliente:* ${client}\n` +
                          `💰 *Monto:* $${parseFloat(amount).toLocaleString('es-MX', {minimumFractionDigits: 2})}\n` +
                          `📋 *Concepto:* ${concept}\n\n` +
                          `Se generará un link de pago seguro para completar la transacción.`;
            
            console.log('Mensaje para integración Clip:', message);
        }, 2000);
    };
}

// ==========================================================================
// Sistema de Toast/Notificaciones - estilo Internet
// ==========================================================================
function showToastModern(title, message, type = 'info') {
    // Crear contenedor si no existe
    let toastContainer = document.getElementById('toast-container-modern');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container-modern';
        toastContainer.className = 'toast-container-modern';
        document.body.appendChild(toastContainer);
    }
    
    const toast = document.createElement('div');
    toast.className = `toast-modern toast-${type}`;
    
    const icons = {
        success: '✅',
        error: '❌',
        info: 'ℹ️',
        warning: '⚠️'
    };
    
    toast.innerHTML = `
        <div class="toast-icon-modern">${icons[type] || icons.info}</div>
        <div class="toast-content-modern">
            <div class="toast-title-modern">${escapeHtml(title)}</div>
            <div class="toast-message-modern">${escapeHtml(message)}</div>
        </div>
        <button class="toast-close-modern" onclick="this.parentElement.remove()">
            <i class="fa-solid fa-times"></i>
        </button>
    `;
    
    // Animación de entrada
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(100%)';
    toastContainer.appendChild(toast);
    
    // Trigger animation
    requestAnimationFrame(() => {
        toast.style.opacity = '1';
        toast.style.transform = 'translateX(0)';
    });
    
    // Auto-remove después de 5 segundos
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }, 5000);
}

// ==========================================================================
// Sistema de Modal - estilo Internet
// ==========================================================================
function showModalModern(title, content) {
    const modal = document.getElementById('modal-confirmacion');
    const modalTitle = document.getElementById('modal-title');
    const modalContent = document.querySelector('#modal-confirmacion .modal-body');
    
    if (modal && modalTitle && modalContent) {
        modalTitle.innerHTML = `<i class="fa-solid fa-link"></i> ${title}`;
        modalContent.innerHTML = content;
        modal.style.display = 'flex';
        
        // Bloquear scroll del body
        document.body.style.overflow = 'hidden';
        
        // Animación de entrada
        modal.style.opacity = '0';
        requestAnimationFrame(() => {
            modal.style.opacity = '1';
        });
        
        // Focus en botón confirmar
        const confirmBtn = document.getElementById('modal-confirm');
        if (confirmBtn) {
            setTimeout(() => confirmBtn.focus(), 100);
        }
    }
}

function closeModal() {
    const modal = document.getElementById('modal-confirmacion');
    if (modal) {
        modal.style.opacity = '0';
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }, 200);
    }
}

// Event listeners para cerrar modal
document.addEventListener('DOMContentLoaded', function() {
    // Cerrar con botones
    document.querySelectorAll('[data-nt-modal-close]').forEach(btn => {
        btn.addEventListener('click', closeModal);
    });
    
    // Cerrar con ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
    
    // Cerrar con click en backdrop
    document.getElementById('modal-confirmacion')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
});

// ==========================================================================
// Utilidades
// ==========================================================================
function escapeHtml(text) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}

// ==========================================================================
// Sistema de Tabs Horizontales
// ==========================================================================
function initTabsSystem() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    // Configurar clicks en los botones de tabs
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remover clases activas de todos los botones y contenidos
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Activar el botón actual
            this.classList.add('active');
            
            // Mostrar el contenido correspondiente
            const targetContent = document.getElementById(targetTab);
            if (targetContent) {
                targetContent.classList.add('active');
                
                // Scroll suave hacia la sección de contenido
                setTimeout(() => {
                    const tabsMenuHeight = document.querySelector('.cuentas-tabs-menu').offsetHeight;
                    const dashboardTop = document.querySelector('.cuentas-dashboard').offsetTop;
                    const targetPosition = dashboardTop - tabsMenuHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }, 50);
            }
        });
        
        // Manejo de tooltips táctiles para móviles
        if (window.innerWidth <= 768) {
            let tooltipTimeout;
            
            // Mostrar tooltip en touch/tap prolongado
            button.addEventListener('touchstart', function(e) {
                if (!this.classList.contains('active')) {
                    tooltipTimeout = setTimeout(() => {
                        showMobileTooltip(this);
                    }, 500); // Mostrar después de 500ms
                }
            });
            
            // Cancelar tooltip si se suelta rápido
            button.addEventListener('touchend', function(e) {
                clearTimeout(tooltipTimeout);
                // Ocultar tooltip después de 2 segundos
                setTimeout(() => {
                    hideMobileTooltip();
                }, 2000);
            });
            
            // Cancelar si se mueve el dedo
            button.addEventListener('touchmove', function(e) {
                clearTimeout(tooltipTimeout);
            });
        }
    });
    
    // Asegurar que solo la primera tab esté activa al cargar
    const firstTab = document.querySelector('.tab-button[data-tab="info-personal"]');
    const firstContent = document.getElementById('info-personal');
    
    if (firstTab && firstContent) {
        // Remover todas las clases activas
        tabButtons.forEach(btn => btn.classList.remove('active'));
        tabContents.forEach(content => content.classList.remove('active'));
        
        // Activar la primera
        firstTab.classList.add('active');
        firstContent.classList.add('active');
    }
    
    console.log('📑 Sistema de tabs inicializado');
}

// Funciones para tooltips móviles
function showMobileTooltip(button) {
    // Remover tooltip existente
    hideMobileTooltip();
    
    const tooltip = document.createElement('div');
    tooltip.className = 'mobile-tooltip';
    tooltip.textContent = button.getAttribute('data-tooltip');
    tooltip.id = 'mobile-tooltip-active';
    
    // Posicionar el tooltip
    const rect = button.getBoundingClientRect();
    tooltip.style.position = 'fixed';
    tooltip.style.bottom = (window.innerHeight - rect.top + 10) + 'px';
    tooltip.style.left = (rect.left + rect.width / 2) + 'px';
    tooltip.style.transform = 'translateX(-50%)';
    tooltip.style.background = 'rgba(0, 0, 0, 0.9)';
    tooltip.style.color = 'white';
    tooltip.style.padding = '8px 12px';
    tooltip.style.borderRadius = '6px';
    tooltip.style.fontSize = '12px';
    tooltip.style.zIndex = '10000';
    tooltip.style.pointerEvents = 'none';
    tooltip.style.whiteSpace = 'nowrap';
    tooltip.style.animation = 'tooltipFadeIn 0.2s ease-in-out';
    
    document.body.appendChild(tooltip);
}

function hideMobileTooltip() {
    const existingTooltip = document.getElementById('mobile-tooltip-active');
    if (existingTooltip) {
        existingTooltip.style.animation = 'tooltipFadeOut 0.2s ease-in-out';
        setTimeout(() => {
            if (existingTooltip.parentNode) {
                existingTooltip.parentNode.removeChild(existingTooltip);
            }
        }, 200);
    }
}

// CSS dinámico para toasts y elementos adicionales
const additionalStyles = document.createElement('style');
additionalStyles.textContent = `
/* Toast Container Modern */
.toast-container-modern {
    position: fixed;
    top: 2rem;
    right: 2rem;
    z-index: 10000;
    display: flex;
    flex-direction: column;
    gap: .75rem;
    pointer-events: none;
}

.toast-modern {
    background: white;
    border: 1px solid #e4ecf6;
    border-radius: 12px;
    padding: 1rem;
    box-shadow: 0 8px 25px rgba(15,23,42,.1);
    display: flex;
    align-items: center;
    gap: .75rem;
    max-width: 380px;
    pointer-events: all;
    transition: all .3s ease;
    border-left: 4px solid var(--primary);
}

.toast-modern.toast-success { border-left-color: #10b981; }
.toast-modern.toast-error { border-left-color: #ef4444; }
.toast-modern.toast-warning { border-left-color: #f59e0b; }

.toast-icon-modern {
    font-size: 1.2rem;
    flex-shrink: 0;
}

.toast-content-modern {
    flex: 1;
    min-width: 0;
}

.toast-title-modern {
    font-weight: 800;
    color: #0f172a;
    font-size: .9rem;
    margin-bottom: .25rem;
}

.toast-message-modern {
    font-size: .8rem;
    color: var(--muted);
    line-height: 1.4;
}

.toast-close-modern {
    background: none;
    border: none;
    color: #9aa8bb;
    cursor: pointer;
    padding: .25rem;
    border-radius: 4px;
    font-size: .8rem;
    flex-shrink: 0;
    transition: all .2s ease;
}

.toast-close-modern:hover {
    color: #6b7a90;
    background: #f1f5f9;
}

/* Payment Summary Modern */
.payment-summary-modern {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.summary-item-modern {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .75rem;
    background: #f8fbff;
    border: 1px solid #e2edf9;
    border-radius: 8px;
}

.summary-label {
    color: var(--muted);
    font-size: .85rem;
}

.summary-note-modern {
    background: #fef3c7;
    border: 1px solid #f59e0b;
    border-radius: 8px;
    padding: 1rem;
    display: flex;
    gap: .75rem;
    align-items: flex-start;
    margin-top: .5rem;
}

.summary-note-modern i {
    color: #d97706;
    margin-top: .1rem;
    flex-shrink: 0;
}

.summary-note-modern p {
    margin: 0;
    color: #92400e;
    font-size: .85rem;
    line-height: 1.4;
}

/* Selected Account Styling */
.cuentas-card.selected {
    border-color: #4f8cff;
    box-shadow: 0 8px 25px rgba(79, 140, 255, 0.15);
    background: linear-gradient(180deg, #fefefe, #f8fbff);
}

.cuentas-card.selected h3 {
    color: #4f8cff;
}

/* Responsive Toast */
@media (max-width: 768px) {
    .toast-container-modern {
        top: 1rem;
        right: 1rem;
        left: 1rem;
    }
    
    .toast-modern {
        max-width: none;
    }
}
`;

document.head.appendChild(additionalStyles);