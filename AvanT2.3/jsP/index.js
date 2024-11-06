let currentIndex = 0;
const images = document.querySelectorAll('.image-slider img');
const totalImages = images.length;

function showNextImage() {
    images[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + 1) % totalImages;
    images[currentIndex].classList.add('active');
}

setInterval(showNextImage, 3300); // Cambia de imagen cada 3 segundos
