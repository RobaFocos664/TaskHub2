// Función para abrir el modal
function openModal() {
    document.getElementById('taskModal').style.display = 'flex';
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById('taskModal').style.display = 'none';
}

// Cerrar el modal si se hace clic fuera del contenido
window.onclick = function (event) {
    const modal = document.getElementById('taskModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};