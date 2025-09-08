// AOS Animacion para Footer
AOS.init({
    duration: 800,
    once: true
});

// Scroll header: cambio de fondo según scroll
const header = document.getElementById('site-header');
let lastScroll = 0;
window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if(currentScroll > 100 && currentScroll > lastScroll){
        header.classList.add('bg-white/80', 'backdrop-blur-md');
        header.classList.remove('bg-white');
    } else {
        header.classList.remove('bg-white/80', 'backdrop-blur-md');
        header.classList.add('bg-white');
    }

    lastScroll = currentScroll;
});

// Smooth scroll para anclas
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if(target){
            target.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});


