<?php
$attempted_url = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404 - Página no encontrada</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Animaciones originales */
    @keyframes float {0%,100%{transform:translateY(0);}50%{transform:translateY(-10px);}}
    @keyframes shake {0%,100%{transform:translateX(0);}10%,30%,50%,70%,90%{transform:translateX(-3px);}20%,40%,60%,80%{transform:translateX(3px);}}
    @keyframes rotate {0%{transform:rotate(0deg);}100%{transform:rotate(360deg);}}
    @keyframes pulse {0%,100%{transform:scale(1);opacity:1;}50%{transform:scale(1.03);opacity:0.9;}}
    @keyframes questionPulse {0%{transform:scale(1) rotate(0deg);opacity:1;}25%{transform:scale(1.1) rotate(5deg);opacity:0.9;}50%{transform:scale(1) rotate(0deg);opacity:1;}75%{transform:scale(1.1) rotate(-5deg);opacity:0.9;}100%{transform:scale(1) rotate(0deg);opacity:1;}}
    @keyframes binaryFall {0%{transform:translateY(-100px);opacity:0;}10%{opacity:1;}90%{opacity:1;}100%{transform:translateY(100vh);opacity:0;}}
    @keyframes cameraFlash {0%,100%{opacity:0;}50%{opacity:0.1;}}
    .floating {animation: float 3s ease-in-out infinite;}
    .shaking {animation: shake 0.5s ease-in-out infinite;}
    .rotating {animation: rotate 10s linear infinite;}
    .pulsing {animation: pulse 2s ease-in-out infinite;}
    .question-pulse {animation: questionPulse 2s ease-in-out infinite;}
    .glow-hover:hover {text-shadow: 0 0 10px rgba(59, 130, 246, 0.3);}
    .camera-flash {position:absolute;top:0;left:0;right:0;bottom:0;background:white;z-index:5;pointer-events:none;animation:cameraFlash 5s ease-in-out infinite;}
    .grid-pattern {background-image: linear-gradient(rgba(59,130,246,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.05) 1px, transparent 1px);background-size:20px 20px;}
    .camera-view {position:absolute;width:120px;height:80px;border:2px solid rgba(59,130,246,0.3);border-radius:5px;box-shadow:0 0 10px rgba(59,130,246,0.2);background-color: rgba(255,255,255,0.7);}
    .camera-view::before {content:"";position:absolute;width:20px;height:20px;background:rgba(59,130,246,0.2);border-radius:50%;top:-10px;left:-10px;}
    .camera-view::after {content:"CAM";position:absolute;bottom:-15px;left:5px;font-size:8px;color:rgba(59,130,246,0.5);font-family:monospace;}
    .security-badge {position:absolute;width:60px;height:60px;border:2px solid rgba(59,130,246,0.3);border-radius:50%;display:flex;align-items:center;justify-content:center;background-color:rgba(255,255,255,0.7);}
    .security-badge i {color: rgba(59,130,246,0.7);font-size:24px;}
    .binary-code {position:absolute;top:0;left:0;right:0;bottom:0;overflow:hidden;z-index:0;opacity:0.1;}
    .binary-digit {position:absolute;color:#3b82f6;font-family:monospace;font-size:12px;animation:binaryFall linear infinite;}
</style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col items-center justify-center overflow-hidden relative grid-pattern">
    <!-- Efectos -->
    <div class="camera-flash"></div>
    <div class="binary-code" id="binary-code"></div>
    <div class="camera-view" style="top:10%; left:10%;"></div>
    <div class="camera-view" style="top:10%; right:10%;"></div>
    <div class="camera-view" style="bottom:10%; left:10%;"></div>
    <div class="camera-view" style="bottom:10%; right:10%;"></div>
    <div class="security-badge" style="top:30%; left:20%;"><i class="fas fa-shield-alt"></i></div>
    <div class="security-badge" style="top:30%; right:20%;"><i class="fas fa-lock"></i></div>
    <div class="security-badge" style="bottom:30%; left:20%;"><i class="fas fa-eye"></i></div>
    <div class="security-badge" style="bottom:30%; right:20%;"><i class="fas fa-video"></i></div>

<!-- Logo y nombre de la empresa -->
<div class="flex items-center gap-4 mb-6">
    <img src="https://norttek.com.mx/assets/img/logo-norttek.png" alt="Norttek Solutions" class="w-16 h-auto">
    <span class="text-xl font-semibold" style="color: #1674a3;">Norttek Solutions</span>
</div>

<!-- Contenido principal -->
<div class="relative z-10 text-center px-6 py-10 rounded-xl bg-white bg-opacity-90 backdrop-blur-sm border border-gray-200 shadow-lg max-w-2xl mx-4">
    <div class="flex flex-col items-center">

        <!-- Icono animado -->
        <div class="question-pulse mb-6" style="color: #ef4444;">
            <i class="fas fa-exclamation-triangle fa-4x"></i>
        </div>

        <!-- Número 404 animado -->
        <h2 class="text-6xl md:text-7xl font-extrabold mb-6" style="color: #1674a3;">
            <span class="shaking">4</span>
            <span class="floating">0</span>
            <span class="shaking">4</span>
        </h2>

        <!-- URL arriba -->
        <div class="text-sm text-gray-500 mb-6 font-mono">
            Página solicitada: <span style="color: #1674a3;"><?php echo htmlspecialchars($attempted_url); ?></span>
        </div>

        <!-- Título principal debajo del icono -->
        <h1 class="text-4xl md:text-4xl font-bold mb-4" style="color: #1674a3;">
            Ups! Parece que la página no está disponible
        </h1>

       <!-- Explicación -->
<p class="text-gray-700 text-m font-light leading-relaxed mb-12 max-w-xl">
    Esto puede deberse a varias razones: la página fue eliminada, el enlace estaba mal escrito, o se movió a otra ubicación dentro de nuestro sitio. 
    Puedes volver al inicio o contactar a nuestro soporte técnico para que te ayudemos a resolverlo.
</p>


        <!-- Botones -->
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <a href="/" class="px-6 py-3 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 shadow-md flex items-center gap-2 text-white text-base" style="background-color: #1674a3;">
                <i class="fas fa-home"></i> Volver al inicio
            </a>
            <a href="https://wa.me/526252690997?text=<?php echo urlencode("Hola, intenté acceder a la página $attempted_url en tu sitio, pero no fue localizada. Por favor, podrían ayudarme a resolverlo?"); ?>" 
               class="px-6 py-3 bg-green-500 hover:bg-green-600 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 shadow-md flex items-center gap-2 text-white text-base">
                <i class="fas fa-headset"></i> Soporte técnico
            </a>
        </div>

        <!-- Nota adicional -->
        <div class="flex items-center gap-4 mt-4 text-sm" style="color: #1674a3;">
            <div class="h-2 w-2 rounded-full animate-pulse" style="background-color: #1674a3;"></div>
            <div class="font-mono">Error 404 - Página no encontrada</div>
            <div class="h-2 w-2 rounded-full animate-pulse" style="background-color: #1674a3;"></div>
        </div>
    </div>
</div>





    <canvas id="confetti-canvas" class="absolute inset-0 pointer-events-none z-20"></canvas>

    <script>
    document.addEventListener('DOMContentLoaded', function(){
