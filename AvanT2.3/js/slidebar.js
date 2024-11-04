document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.querySelector('.menu-button');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');

    menuButton.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
        if (sidebar.classList.contains('hidden')) {
            mainContent.style.marginLeft = '0';
        } else {
            mainContent.style.marginLeft = '250px'; // Ajusta según el ancho de la sidebar
        }
    });
});