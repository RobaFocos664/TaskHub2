<?php
include 'adds/header.php'
    ?>

<?php
$servidor = "localhost";
$usuario_db = "root";
$contraseña_db = "";
$nombre_bd = "taskhub";

$conn = new mysqli($servidor, $usuario_db, $contraseña_db, $nombre_bd);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = uniqid();

    $stmt = $conn->prepare("INSERT INTO tarea (codigo, titulo, descripcion, tiempoEstimado, fechaEntrega, usuario, equipo, estatus, tipo, dificultad, prioridad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiiiiii", $codigo, $titulo, $descripcion, $tiempoEstimado, $fechaEntrega, $usuario, $equipo, $estatus, $tipo, $dificultad, $prioridad);

    $codigo = $_POST['codigo'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $tiempoEstimado = $_POST['tiempoEstimado'];
    $fechaEntrega = $_POST['fechaEntrega'];
    $usuario = $_POST['usuario'] ?? null;
    $equipo = $_POST['team'] ?? null;
    $estatus = $_POST['estatus'];
    $tipo = $_POST['tipo'];
    $dificultad = $_POST['dificultad'];
    $prioridad = $_POST['prioridad'];

    if ($stmt->execute()) {
        echo "Nueva tarea creada exitosamente con código: " . $codigo;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<div class="home_content">
    
<div id="moved-content"></div>
    <div class="dashboard-content">
        <div class="stat-cards">
            <div class="stat-card blue">
                <div class="stat-header">
                    <h3>Total Tasks</h3>
                    <i data-lucide="clipboard-list"></i>
                </div>
                <div class="stat-content">
                    <p class="stat-value">123</p>
                    <p class="stat-description">+2 from last week</p>
                </div>
            </div>
            <div class="stat-card purple">
                <div class="stat-header">
                    <h3>In Progress</h3>
                    <i data-lucide="users"></i>
                </div>
                <div class="stat-content">
                    <p class="stat-value">45</p>
                    <p class="stat-description">-1 from yesterday</p>
                </div>
            </div>
            <div class="stat-card green">
                <div class="stat-header">
                    <h3>Completed</h3>
                    <i data-lucide="bar-chart"></i>
                </div>
                <div class="stat-content">
                    <p class="stat-value">78</p>
                    <p class="stat-description">+3 from last week</p>
                </div>
            </div>
        </div>

        <div class="task-table-card">
        <div class="white-box" id="white-box">

            <div class="card-header">
                <div>
                    <h2 id="recent-tasks-title">Recent Tasks</h2>
                    <p>Overview of your team's latest tasks</p>
                </div>
                <div class="card-actions">
                    <button class="create-task-button" onclick="openModal()">
                        <i data-lucide="plus-circle"></i> Create New Task
                    </button>
                    <button class="icon-button"><svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-arrow-autofit-height" width="32" height="32"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h6" />
                            <path d="M18 14v7" />
                            <path d="M18 3v7" />
                            <path d="M15 18l3 3l3 -3" />
                            <path d="M15 6l3 -3l3 3" />
                        </svg></button>
                    <button class="icon-button"><svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-columns-3" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M3 3m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v16a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1zm6 -1v18m6 -18v18" />
                        </svg></button>
                    <button class="icon-button" id="move-button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-month">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                            <path d="M16 3v4" />
                            <path d="M8 3v4" />
                            <path d="M4 11h16" />
                            <path d="M7 14h.013" />
                            <path d="M10.01 14h.005" />
                            <path d="M13.01 14h.005" />
                            <path d="M16.015 14h.005" />
                            <path d="M13.015 17h.005" />
                            <path d="M7.01 17h.005" />
                            <path d="M10.01 17h.005" />
                        </svg>

                    </button>
                </div>
            </div>
            <div id="calendar-container" class="hidden">
                        <div class="calendar">
                            <div class="calendar-header">
                                <button id="prev-month">Anterior</button>
                                <h2 id="month-year"></h2>
                                <button id="next-month">Siguiente</button>
                            </div>
                            <div class="calendar-body">
                            
                                <div id="calendar-days" class="days-grid"></div>
                            </div>
                        </div>
                    </div>
            </div>
            <table class="task-table">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Assignee</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Progress</th>
                        <th>Difficulty</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="window.location.href='individualTask.php'" style="cursor: pointer;">
                        <td>Implement new feature</td>
                        <td>John Doe</td>
                        <td><span class="badge in-progress">In Progress</span></td>
                        <td><span class="badge high">High</span></td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress" style="width: 65%"></div>
                            </div>
                            <span class="progress-text">65%</span>
                        </td>
                        <td>Medium</td>
                        <td><button class="icon-button"><i data-lucide="arrow-right"></i></button></td>
                    </tr>
                    <tr onclick="window.location.href='individualTask.php'" style="cursor: pointer;">
                        <td>Review code changes</td>
                        <td>Jane Smith</td>
                        <td><span class="badge pending">Pending</span></td>
                        <td><span class="badge medium">Medium</span></td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress" style="width: 0%"></div>
                            </div>
                            <span class="progress-text">0%</span>
                        </td>
                        <td>Easy</td>
                        <td><button class="icon-button"><i data-lucide="arrow-right"></i></button></td>
                    </tr>
                    <tr onclick="window.location.href='individualTask.php'" style="cursor: pointer;">
                        <td>Update documentation</td>
                        <td>Mike Johnson</td>
                        <td><span class="badge finished">Finished</span></td>
                        <td><span class="badge low">Low</span></td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress" style="width: 100%"></div>
                            </div>
                            <span class="progress-text">100%</span>
                        </td>
                        <td>Easy</td>
                        <td><button class="icon-button"><i data-lucide="arrow-right"></i></button></td>
                    </tr>
                    <tr onclick="window.location.href='individualTask.php'" style="cursor: pointer;">
                        <td>Fix reported bugs</td>
                        <td>Emily Brown</td>
                        <td><span class="badge in-progress">In Progress</span></td>
                        <td><span class="badge high">High</span></td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress" style="width: 40%"></div>
                            </div>
                            <span class="progress-text">40%</span>
                        </td>
                        <td>Hard</td>
                        <td><button class="icon-button"><i data-lucide="arrow-right"></i></button></td>
                    </tr>
                    <tr onclick="window.location.href='individualTask.php'" style="cursor: pointer;">
                        <td>Prepare sprint report</td>
                        <td>Alex Lee</td>
                        <td><span class="badge pending">Pending</span></td>
                        <td><span class="badge medium">Medium</span></td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress" style="width: 0%"></div>
                            </div>
                            <span class="progress-text">0%</span>
                        </td>
                        <td>Medium</td>
                        <td><button class="icon-button"><i data-lucide="arrow-right"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div id="subtarea-modal" class="modal1">
                <div class="modal-content1">
                    <span class="close-button">&times;</span>
                    <h3>Detalles de la Subtarea</h3>
                    <p id="modal-titulo"></p>
                    <p id="modal-descripcion"></p>
                    <p id="modal-tiempoEstimado"></p>
                    <p id="modal-avance"></p>
                </div>
            </div>



    <!-- Modal  -->
    <div id="taskModal" class="modal">
    <div class="modal-content" style="background-color: black; color: white;">
    <span class="close" onclick="closeModal('taskModal')">&times;</span>
        <!-- Título en blanco que cubre toda la parte superior -->
        <div style="background-color: white; color: black; padding: 10px; margin-top: -20px; margin-left: -20px; margin-right: -20px;">
            <h2 style="margin: 0;">Select who is assigned</h2>
        </div>
            <!-- Contenedor en flex con línea divisoria blanca -->
            <div style="display: flex; gap: 20px; border-top: 1px solid white; padding-top: 20px;">
                
                <!-- Columna 1: Teams -->
                <div style="flex: 1; border-right: 2px solid white; padding-right: 10px;">
                    <h3>Teams</h3>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>
                    </div>
                    <p>Select team to be able to assign a task to the team you want</p>
                    <button type="button" onclick="openTeamModal()" style="margin-top: 10px;">Selection</button>
                </div>

                <!-- Columna 2: Users -->
                <div style="flex: 1; padding-left: 10px;">
                    <h3>Users</h3>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                    </div>
                    <p>Select user to be able to assign a task to the user you want</p>
                    <button type="button" onclick="openUserModal()" style="margin-top: 10px;">Selection</button>
                </div>
            </div>
</div>
</div>

<div id="teamTaskModal" class="modal">
    <div class="modal-team-content">
        <span class="close" onclick="closeModal1('teamTaskModal')">&times;</span>
        <h2>Create New Task</h2>
        <form id="taskForm" method="POST" action="Tasks.php">
            <label for="team">Team:</label>
            <select id="team" name="team" required>
                <option value="">Select a Team</option>
                <!-- Los equipos se cargarán aquí mediante JavaScript -->
            </select>

            <label for="codigo">Code:</label>
            <input type="text" id="codigo" name="codigo" maxlength="5" readonly required>

            <label for="title">Title:</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="description">Description:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <label for="estimated_time">Estimated Time (date):</label>
            <input type="date" id="tiempoEstimado" name="tiempoEstimado" required>

            <label for="due_date">Due Date:</label>
            <input type="date" id="fechaEntrega" name="fechaEntrega" required>

            <label for="Status">Status:</label>
            <select id="estatus" name="estatus" required>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>

            <label for="type">Type:</label>
            <select id="tipo" name="tipo" required>
                <option value="1">Repetitive</option>
                <option value="2">Independent</option>
            </select>

            <label for="difficulty">Difficulty:</label>
            <select id="dificultad" name="dificultad" required>
                <option value="1">Easy</option>
                <option value="2">Medium</option>
                <option value="3">Hard</option>
            </select>

            <label for="priority">Priority:</label>
            <select id="prioridad" name="prioridad" required>
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
            </select>

            <button class="bottonCreateTask" id="submitTask" type="submit">Create Task</button>
        </form>
    </div>
</div>

<div id="userTaskModal" class="modal">
    <div class="modal-team-content">
        <span class="close" onclick="closeModal2('userTaskModal')">&times;</span>
        <h2>Create New Task</h2>
        <form id="taskForm" method="POST" action="Tasks.php">
            <label for="usuario">Assignee</label>
            <select id="usuario" name="usuario" required>
                <option value="">Select a User</option>
                <!-- Los usuarios se cargarán aquí mediante JavaScript -->
            </select>

            <label for="codigo">Code:</label>
            <input type="text" id="codigoUser" name="codigo" maxlength="5" readonly required >

            <label for="title">Title:</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="description">Description:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <label for="estimated_time">Estimated Time (date):</label>
            <input type="date" id="tiempoEstimado" name="tiempoEstimado" required>

            <label for="due_date">Due Date:</label>
            <input type="date" id="fechaEntrega" name="fechaEntrega" required>

            <label for="Status">Status:</label>
            <select id="estatus" name="estatus" required>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>

            <label for="type">Type:</label>
            <select id="tipo" name="tipo" required>
                <option value="1">Repetitive</option>
                <option value="2">Independent</option>
            </select>

            <label for="difficulty">Difficulty:</label>
            <select id="dificultad" name="dificultad" required>
                <option value="1">Easy</option>
                <option value="2">Medium</option>
                <option value="3">Hard</option>
            </select>

            <label for="priority">Priority:</label>
            <select id="prioridad" name="prioridad" required>
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
            </select>

            <button class="bottonCreateTask" id="submitTask" type="submit">Create Task</button>
        </form>
    </div>
</div>
</main>
</div>



<!-- slidebar -->

<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let searchBtn = document.querySelector(".bx-search");

    btn.onclick = function () {
        sidebar.classList.toggle("active");
    }
    btn.onclick = function () {
        sidebar.classList.toggle("active");
    }
</script>


<!-- CREATE TASK -->
<script src="js/crearTarea.js"></script>


</body>

</html>