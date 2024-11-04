<?php
    include 'adds/header.php'
?>

<head>
    <link rel="stylesheet" href="css/tasks.css">
    <title>Tasks Centes</title>
</head>


<div class="home_content">
    <div class="dashboard-content">
        <div class="departament stat-card blue stat-value">
            Recursos Humanos
        </div>
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
            <div class="card-header">
                <div>
                    <h2>Recent Tasks</h2>
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
                    <button class="icon-button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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

    <!-- Modal para agregar una nueva tarea -->
    <div id="taskModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Create New Task</h2>
            <form id="taskForm" method="POST" action="create_task.php">
                <label for="codigo">Code:</label>
                <input type="text" id="codigo" name="codigo" maxlength="5" required>

                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>

                <label for="estimated_time">Estimated Time (date):</label>
                <input type="date" id="estimated_time" name="estimated_time" required>

                <label for="due_date">Due Date:</label>
                <input type="date" id="due_date" name="due_date" required>

                <label for="usuario">User :</label>
                <input type="number" id="usuario" name="usuario" required>

                <label for="estatus">Status:</label>
                <input type="number" id="estatus" name="estatus" required>

                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="1">Repetitive</option>
                    <option value="2">Independent</option>
                </select>

                <label for="difficulty">Difficulty:</label>
                <select id="difficulty" name="difficulty" required>
                    <option value="1">Easy</option>
                    <option value="2">Medium</option>
                    <option value="3">Hard</option>
                </select>

                <label for="priority">Priority:</label>
                <select id="priority" name="priority" required>
                    <option value="1">Low</option>
                    <option value="2">Medium</option>
                    <option value="3">High</option>
                </select>

                <button class="bottonCreateTask" type="submit">Create Task</button>
            </form>
        </div>
    </div>
    </main>
</div>
</div>

</body>
</html>