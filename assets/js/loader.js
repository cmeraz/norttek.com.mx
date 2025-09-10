window.addEventListener('load', function() {
    const loader = document.getElementById("loader");
    const mainContent = document.getElementById("main-content");
    const progressFill = document.querySelector(".progress-fill");
    const progressText = document.querySelector(".progress-text");

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
});