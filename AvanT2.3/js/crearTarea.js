function openModal() {
    document.getElementById('taskModal').style.display = 'flex';
}

// Cerrar el modal
function closeModal() {
    document.getElementById('taskModal').style.display = 'none';
}

window.onclick = function (event) {
    const modal = document.getElementById('taskModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

// Enviar formulario
document.getElementById('submitTask').onclick = function () {
    const formData = new FormData(document.getElementById('taskForm'));

    fetch('create_task.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            document.getElementById('taskModal').style.display = 'none';
            document.getElementById('taskForm').reset(); // Limpiar el formulario
        })
        .catch(error => console.error('Error:', error));
};


function toggleAssignmentField() {
    var assignmentType = document.getElementById("assignmentType").value;
    var employeeField = document.getElementById("employeeField");
    var teamField = document.getElementById("teamField");

    if (assignmentType === "employee") {
        employeeField.style.display = "block";
        teamField.style.display = "none";
    } else if (assignmentType === "team") {
        teamField.style.display = "block";
        employeeField.style.display = "none";
    } else {
        employeeField.style.display = "none";
        teamField.style.display = "none";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('move-button').addEventListener('click', function () {
    var cardHeader = document.getElementById('white-box');
    var calendar = document.getElementById('calendar-container');
    var movedContent = document.getElementById('moved-content');
    var mainContent = document.querySelector('.home_content');
    var recentTasksTitle = document.getElementById('recent-tasks-title');

    if (movedContent.contains(cardHeader)) {

        document.querySelector('.task-table-card').prepend(cardHeader);
        mainContent.classList.remove('content-hidden');
        cardHeader.classList.remove('moved-header');
        calendar.classList.add('hidden');
        recentTasksTitle.innerText = "Recent Tasks";
    } else {
        movedContent.appendChild(cardHeader);
        mainContent.classList.add('content-hidden');
        cardHeader.classList.add('moved-header');
        calendar.classList.remove('hidden');
        recentTasksTitle.innerText = "Calendar";
    }
});
});

function loadSubtareas() {
    fetch('../AVANT22/get_subtareas.php')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        subtareas = data;
        generateCalendar(currentMonth, currentYear);
    })
    .catch(error => console.error('Error al cargar las subtareas:', error));
}

let currentDate = new Date();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

const months = [
    "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", 
    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
];

const daysOfWeek = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

let subtareas = [];

function generateCalendar(month, year) {
    const calendarDays = document.getElementById("calendar-days");
    calendarDays.innerHTML = "";
    const monthYearText = document.getElementById("month-year");
    monthYearText.innerText = `${months[month]} ${year}`;

    const firstDay = new Date(year, month).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const adjustedFirstDay = (firstDay === 0 ? 6 : firstDay - 1);

    for (let i = 0; i < adjustedFirstDay; i++) {
        const emptyCell = document.createElement("div");
        calendarDays.appendChild(emptyCell);
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const dayCell = document.createElement("div");
        dayCell.classList.add("day");

        if (day <= 7) {
            const dayOfWeek = daysOfWeek[(adjustedFirstDay + day - 1) % 7]; 
            dayCell.innerHTML = `<span class="day-name">${dayOfWeek}</span><br>${day}`;
        } else {
            dayCell.innerText = day;
        }

        if (day === currentDate.getDate() && month === currentDate.getMonth() && year === currentDate.getFullYear()) {
            dayCell.classList.add("day-today");
        }

        const subtareaForDay = subtareas.filter(subtarea => {
            const fechaInicio = new Date(subtarea.fechaInicio);
            const adjustedDate = new Date(fechaInicio.getTime() + fechaInicio.getTimezoneOffset() * 60000);
            const currentDayDate = new Date(year, month, day);
            
            return adjustedDate.getDate() === currentDayDate.getDate() &&
                   adjustedDate.getMonth() === currentDayDate.getMonth() &&
                   adjustedDate.getFullYear() === currentDayDate.getFullYear();
        });

        if (subtareaForDay.length > 0) {
            subtareaForDay.forEach(subtarea => {
                const subtareaContainer = document.createElement("div");
                subtareaContainer.classList.add("subtarea-container");

                const line = document.createElement("div");
                line.classList.add("line");

                const subtareaButton = document.createElement("button");
                subtareaButton.classList.add("subtarea-button");
                subtareaButton.innerText = subtarea.titulo;

                subtareaButton.addEventListener("click", () => {
                    mostrarDetallesSubtarea(subtarea);
                });

                subtareaContainer.appendChild(line);
                subtareaContainer.appendChild(subtareaButton);
        
                dayCell.appendChild(subtareaContainer);
            });
        }
        
        

        calendarDays.appendChild(dayCell);
    }
}


function prevMonth() {
    if (currentMonth === 0) {
        currentMonth = 11;
        currentYear--;
    } else {
        currentMonth--;
    }
    generateCalendar(currentMonth, currentYear);
}

function nextMonth() {
    if (currentMonth === 11) {
        currentMonth = 0;
        currentYear++;
    } else {
        currentMonth++;
    }
    generateCalendar(currentMonth, currentYear);
}

function mostrarDetallesSubtarea(subtarea) {
    document.getElementById("modal-titulo").innerText = `Título: ${subtarea.titulo || "No disponible"}`;
    document.getElementById("modal-descripcion").innerText = `Descripción: ${subtarea.descripcion || "No disponible"}`;

    const fechaEstimado = Date.parse(subtarea.tiempoEstimado);
    document.getElementById("modal-tiempoEstimado").innerText = `Tiempo Estimado: ${
        !isNaN(fechaEstimado) ? new Date(fechaEstimado).toLocaleDateString() : "No disponible"
    }`;

    document.getElementById("modal-avance").innerText = `Avance: ${
        subtarea.avance != null ? subtarea.avance + "%" : "No disponible"
    }`;

    document.getElementById("subtarea-modal").style.display = "block";
}

document.querySelector(".close-button").addEventListener("click", () => {
    document.getElementById("subtarea-modal").style.display = "none";
});

window.addEventListener("click", (event) => {
    const modal = document.getElementById("subtarea-modal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
});

document.getElementById("prev-month").addEventListener("click", prevMonth);
document.getElementById("next-month").addEventListener("click", nextMonth);


loadSubtareas();

/* Modal para crear tareas a los equipos*/

function openModal1(modalId) {
    document.getElementById(modalId).style.display = 'flex';
}

// Función para cerrar los modales
function closeModal1(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Función para abrir el modal específico de tareas para el equipo
function openTeamModal() {
    closeModal1('taskModal');
    openModal1('teamTaskModal');
    fetchCode();
    loadTeams();

}

// Función para hacer la solicitud AJAX y obtener el siguiente código
function fetchCode() {
    fetch('getNextCode.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('codigo').value = data.code;
        })
        .catch(error => console.error('Error al obtener el código:', error));
}

function loadTeams() {
    fetch('getTeams.php')
        .then(response => response.json())
        .then(data => {
            const teamSelect = document.getElementById('team');
            teamSelect.innerHTML = '<option value="">Select a Team</option>'; // Limpia opciones previas
            data.forEach(team => {
                const option = document.createElement('option');
                option.value = team.id;
                option.textContent = `${team.id} - ${team.nombre}`;
                teamSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar equipos:', error));
}

window.onclick = function (event) {
    const modal = document.getElementById('teamTaskModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

/*MODAL PARA CREAR TAREAS DE USUARIOS*/

function openModal2(modalId) {
    document.getElementById(modalId).style.display = 'flex';
}

// Función para cerrar los modales
function closeModal2(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Función para abrir el modal específico de tareas para el equipo
function openUserModal() {
    closeModal2('taskModal');
    openModal2('userTaskModal');
    fetchCodeUser();
    loadUsers();
}

function fetchCodeUser() {
    fetch('getNextCodeUser.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('codigoUser').value = data.code;
        })
        .catch(error => console.error('Error al obtener el código:', error));
}

function loadUsers() {
    fetch('getUsers.php')
        .then(response => response.json())
        .then(data => {
            const userSelect = document.getElementById('usuario');
            userSelect.innerHTML = '<option value="">Select a User</option>'; // Limpia opciones previas
            data.forEach(user => {
                const option = document.createElement('option');
                option.value = user.id;
                option.textContent = `${user.id} - ${user.nombre}`;
                userSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar usuarios:', error));
}

window.onclick = function (event) {
    const modal = document.getElementById('userTaskModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};