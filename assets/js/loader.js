document.addEventListener('DOMContentLoaded', function() {
    const loader = document.getElementById("loader");
    const mainContent = document.getElementById("main-content");
    const progressFill = document.querySelector(".progress-fill");
    const progressText = document.querySelector(".progress-text");
    const preloadImg = document.getElementById('preload-bg');

    console.log('Loader init', { loader: !!loader, mainContent: !!mainContent, progressFill: !!progressFill, progressText: !!progressText, preloadImg: !!preloadImg });

    function startLoader() {
        if (loader) loader.style.display = "flex";
        let progress = 0;

        function animateLoader() {
            progress += 3;
            if (progress > 100) progress = 100;

            if (progressFill) progressFill.style.width = progress + "%";
            if (progressText) progressText.textContent = Math.floor(progress) + "%";

            if (progress < 100) {
                requestAnimationFrame(animateLoader);
            } else {
                if (loader) loader.style.display = "none";
                if (mainContent) {
                    mainContent.style.display = "block";
                } else {
                    console.warn('main-content no encontrado, mostrando body por defecto.');
                    document.body.style.visibility = 'visible';
                }
            }
        }

        animateLoader();
    }

    if (!preloadImg) {
        console.warn('preload-bg no encontrado, iniciando loader directamente');
        startLoader();
        return;
    }

    if (preloadImg.complete) {
        startLoader();
    } else {
        preloadImg.onload = startLoader;
        preloadImg.onerror = startLoader;
    }
});