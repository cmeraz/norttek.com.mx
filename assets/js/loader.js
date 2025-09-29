/**
 * Loader Remasterizado - Norttek Solutions
 * Versión mejorada con animaciones fluidas y efectos modernos
 */

document.addEventListener('DOMContentLoaded', function() {
    const loader = document.getElementById("loader");
    const mainContent = document.getElementById("main-content");
    const progressFill = document.querySelector(".progress-fill");
    const percentageText = document.querySelector(".percentage");
    const loadingText = document.querySelector(".loading-text");
    const preloadImg = document.getElementById('preload-bg');
    const logoContainer = document.querySelector(".logo-container");
    
    // Mensajes de carga dinámicos
    const loadingMessages = [
        "Inicializando...",
        "Cargando recursos...",
        "Preparando interfaz...",
        "Optimizando contenido...",
        "Finalizando...",
        "¡Listo!"
    ];

    function startLoader() {
        // El loader ya está visible por CSS, solo asegurar que esté activo
        loader.style.display = "flex";
        loader.style.opacity = "1";
        
        // Variables de control de animación
        let progress = 0;
        let messageIndex = 0;
        let animationSpeed = 1.2; // Velocidad base
        let lastMessageChange = 0;
        
        // Efecto de pulsación en el logo
        setTimeout(() => {
            logoContainer.style.animation = "logoEntrance 1s ease-out, logoPulse 2s ease-in-out 1s infinite";
        }, 500);

        function animateLoader() {
            // Incremento progresivo más realista
            const increment = Math.random() * 3 + animationSpeed;
            progress += increment;
            
            // Ralentizar al final para efecto más realista
            if (progress > 70) {
                animationSpeed = 0.8;
            }
            if (progress > 90) {
                animationSpeed = 0.3;
            }
            
            if (progress > 100) progress = 100;

            // Actualizar barra de progreso
            progressFill.style.width = progress + "%";
            percentageText.textContent = Math.floor(progress) + "%";
            
            // Cambiar mensaje de carga según el progreso
            const newMessageIndex = Math.floor((progress / 100) * (loadingMessages.length - 1));
            if (newMessageIndex !== messageIndex && progress < 100) {
                messageIndex = newMessageIndex;
                loadingText.style.animation = "none";
                loadingText.textContent = loadingMessages[messageIndex];
                setTimeout(() => {
                    loadingText.style.animation = "textPulse 2s ease-in-out infinite";
                }, 50);
            }

            // Efectos especiales según el progreso
            if (progress >= 25 && progress < 26) {
                addSparkleEffect();
            }
            
            if (progress >= 50 && progress < 51) {
                addGlowEffect();
            }
            
            if (progress >= 75 && progress < 76) {
                addFinalGlow();
            }

            if (progress < 100) {
                requestAnimationFrame(animateLoader);
            } else {
                // Finalizar carga con efectos de salida
                finishLoading();
            }
        }

        animateLoader();
    }

    // Efecto de destellos
    function addSparkleEffect() {
        const sparkles = document.createElement('div');
        sparkles.className = 'sparkle-effect';
        sparkles.style.cssText = `
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(79,195,247,0.3) 0%, transparent 50%);
            border-radius: 50%;
            animation: sparkle 0.6s ease-out forwards;
            pointer-events: none;
            z-index: 3;
        `;
        
        logoContainer.appendChild(sparkles);
        setTimeout(() => sparkles.remove(), 600);
    }

    // Efecto de resplandor medio
    function addGlowEffect() {
        progressFill.style.boxShadow = "0 0 20px rgba(0,188,212,0.8), inset 0 0 20px rgba(255,255,255,0.2)";
        setTimeout(() => {
            progressFill.style.boxShadow = "";
        }, 1000);
    }

    // Efecto de resplandor final
    function addFinalGlow() {
        const glow = document.createElement('div');
        glow.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(0,188,212,0.1) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
            animation: finalGlow 2s ease-out forwards;
        `;
        
        loader.appendChild(glow);
        setTimeout(() => glow.remove(), 2000);
    }

    // Finalización con efectos de salida elegantes
    function finishLoading() {
        loadingText.textContent = "¡Listo!";
        percentageText.style.color = "#4fc3f7";
        
        // Efecto de zoom out y fade
        setTimeout(() => {
            loader.style.transition = "all 0.8s cubic-bezier(0.4, 0, 0.2, 1)";
            loader.style.transform = "scale(1.1)";
            loader.style.opacity = "0";
            
            setTimeout(() => {
                loader.style.display = "none";
                
                // Restaurar scroll del body
                document.body.classList.add('loaded');
                document.documentElement.style.overflow = 'auto';
                
                if (mainContent) {
                    mainContent.style.display = "block";
                    mainContent.style.opacity = "0";
                    mainContent.style.transform = "translateY(20px)";
                    
                    // Animación de entrada del contenido principal
                    setTimeout(() => {
                        mainContent.style.transition = "all 0.6s ease-out";
                        mainContent.style.opacity = "1";
                        mainContent.style.transform = "translateY(0)";
                    }, 50);
                }
            }, 800);
        }, 300);
    }

    // Agregar estilos CSS adicionales dinámicamente
    const additionalStyles = document.createElement('style');
    additionalStyles.textContent = `
        @keyframes sparkle {
            0% { opacity: 0; transform: scale(0.5); }
            50% { opacity: 1; transform: scale(1.2); }
            100% { opacity: 0; transform: scale(1.5); }
        }
        
        @keyframes logoPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        @keyframes finalGlow {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }
    `;
    document.head.appendChild(additionalStyles);

    // Inicialización mejorada con detección de carga
    function initializeLoader() {
        // Verificar si todos los recursos críticos están cargados
        const criticalResources = [preloadImg];
        let loadedResources = 0;
        
        function checkResourceLoaded() {
            loadedResources++;
            if (loadedResources === criticalResources.length) {
                startLoader();
            }
        }
        
        // Si la imagen ya está cargada en caché
        if (preloadImg.complete) {
            checkResourceLoaded();
        } else {
            preloadImg.onload = checkResourceLoaded;
            preloadImg.onerror = checkResourceLoaded; // Continuar incluso si hay error
        }
        
        // Timeout de seguridad - iniciar animación del loader después de 3 segundos máximo
        setTimeout(() => {
            if (!progressFill || progressFill.style.width === "" || progressFill.style.width === "0%") {
                startLoader();
            }
        }, 3000);
    }

    // Inicializar el loader
    initializeLoader();
});
