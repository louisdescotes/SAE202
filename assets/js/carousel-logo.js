document.addEventListener('DOMContentLoaded', (event) => {
    const hoverImage = document.getElementById('hoverImage');
    const hoverDiv = document.getElementById('hoverDiv');

    hoverImage.addEventListener('mouseenter', () => {
        hoverDiv.style.display = 'block';
    });

    hoverImage.addEventListener('mouseleave', () => {
        hoverDiv.style.display = 'none';
    });
});


let currentIndex = 0;
const totalSlides = 3;
const interval = 3000; // Change slide every 3 seconds

setInterval(() => {
    currentIndex = (currentIndex + 1) % totalSlides;
    document.getElementById(`carousel-${currentIndex + 1}`).checked = true;
}, interval)