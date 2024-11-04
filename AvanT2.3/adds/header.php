<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleNew.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- Barra Superior -->
    <div class="top-bar">
        <span class="username">Usuario</span>
        <div class="user-menu">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="#ffffff"  class="icon icon-tabler icons-tabler-filled icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" /><path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                            </svg>
                            <div class="dropdown-content">
                                <h3>My Account</h3>
                                <hr>
                                <a href="#">Settings</a>
                                <a href="index.php">Logout</a>
                            </div>
        </div>
    </div>

    <!-- Barra Lateral -->
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="logo_name">TASK HUB</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>

        <ul class="nav_list">
            <li>
                <a href="Tasks.php">
                    <i class='bx bxs-check-square'></i>
                    <span class="links_name">Tasks</span>
                </a>
                <span class="tooltip">Tasks</span>
            </li>
            <li>
                <a href="Reports.php">
                    <i class='bx bxs-file-blank'></i>
                    <span class="links_name">Reports</span>
                </a>
                <span class="tooltip">Reports</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="links_name">Team</span>
                </a>
                <span class="tooltip">Team</span>
            </li>
            <li>
                <a href="departamentos.php">
                    <i class='bx bxs-building'></i>
                    <span class="links_name">Departments</span>
                </a>
                <span class="tooltip">Departments</span>
            </li>
            <li>
                <a href="departamentos.php">
                    <i class='bx bxs-calendar'></i>
                    <span class="links_name">Calendar</span>
                </a>
                <span class="tooltip">Calendar</span>
            </li>
        </ul>
    </div>

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        let searchBtn = document.querySelector(".bx-search");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        }
        searchBtn.onclick = function () {
            sidebar.classList.toggle("active");
        }
    </script>

    <script src="js/crearTarea.js"></script>

    <!-- Contenedor Principal -->
    <div class="main-content">
        <!-- Aquí va el contenido principal de la página -->
    
    </div>


