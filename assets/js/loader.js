document.addEventListener('DOMContentLoaded', function() {
    const loader = document.getElementById("loader");
    const mainContent = document.getElementById("main-content");
    const progressFill = document.querySelector(".progress-fill");
    const progressText = document.querySelector(".progress-text");
    const preloadImg = document.getElementById('preload-bg');

    function startLoader() {
        loader.style.display = "flex";
        let progress = 0;

        function animateLoader() {
            progress += 3; // velocidad del avance
            if(progress > 100) progress = 100;

            progressFill.style.width = progress + "%";
            progressText.textContent = Math.floor(progress) + "%";

            if(progress < 100) {
                requestAnimationFrame(animateLoader);
            } else {
                loader.style.display = "none";
                mainContent.style.display = "block";
            }
        }

        animateLoader();
    }

    // Si la imagen ya está cargada en caché, onload no se dispara, por eso revisamos complete
    if (preloadImg.complete) {
        startLoader();
    } else {
        preloadImg.onload = startLoader;
        preloadImg.onerror = startLoader; // en caso de error, igual iniciamos loader
    }
});
