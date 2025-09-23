let slides = document.querySelectorAll('.slide');
let current = 0;

function showSlide(index) {
    slides.forEach((slide, i) => slide.style.display = (i === index) ? 'block' : 'none');
}

function nextSlide() {
    current = (current + 1) % slides.length;
    showSlide(current);
}

showSlide(current);
setInterval(nextSlide, 4000); // change toutes les 4 secondes
