<?php
    include 'adds/header.php'
?>

<head>
    <link rel="stylesheet" href="css/indTask.css">
    <title>Subtask</title>
    <title>Task</title>
</head>

<div class="home_content">
    <div class="scroll-area">
    <div class="container">
        <div class="top">
            <h2><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-book"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6l0 13" /><path d="M12 6l0 13" /><path d="M21 6l0 13" /></svg>Build sign up flow</h2>
            <p class="assigned">Assigned to · Due Jul. 7</p>
            <div class="info-boxes">
                <div class="info-box">
                    <h4>Tiempo Restante</h4>
                    <p>1 Hora</p>
                </div>
                <div class="info-box">
                    <h4>Porcentaje de Avance</h4>
                    <div class="progress-bar"><span style="width: 71%;"></span> </div><p >71%</p>
                </div>
                <div class="info-box">
                    <h4>Avance</h4>
                    <p><span class="badge pending">Pending</span></p>
                </div>
                <div class="info-box">
                    <h4>Priority</h4>
                    <span class="badge medium">Medium</span>
                </div>
            </div>
        </div>
        <div class="description">
            <h3>Description</h3>
            <p>We need to implement a user-friendly sign up process that guides new users through account creation, including email verification, password setup, and onboarding steps. This should be streamlined and intuitive, with clear instructions and minimal friction. The goal is to increase sign up conversion rates and provide a positive experience for new customers.</p>
        </div>
        <div>
            <h3>Subtasks</h3>
            <table class="task-table">
                <thead>
                    <tr>
                        <th class="title">Title</th>
                        <th class="description">Description</th>
                        <th class="avance">Avance</th>
                    </tr>
                </thead>
                <tbody>
                <tr onclick="window.location.href='subTask.php'" style="cursor: pointer;">
                        <td>Set up sign up form</td>
                        <td>Create a web form with input fields for email, password, and other required information...</td>
                        <td><span class="badge in-progress">In Progress</span></td>
                    </tr>
                    <tr onclick="window.location.href='subTask.php'" style="cursor: pointer;">
                        <td>Implement email verification</td>
                        <td>Develop a system for sending automated emails to new users after they sign up...</td>
                        <td><span class="badge finished">Finished</span></td>
                    </tr>
                    <tr onclick="window.location.href='subTask.php'" style="cursor: pointer;">
                        <td>Design onboarding process</td>
                        <td>Collaborate with the design team to create a user-friendly onboarding flow...</td>
                        <td><span class="badge pending">Pending</span></td>
                    </tr>
                    <tr onclick="window.location.href='subTask.php'" style="cursor: pointer;">
                        <td>Integrate with authentication service</td>
                        <td>Connect the sign up process to an existing authentication service or identity provider...</td>
                        <td><span class="badge in-progress">In Progress</span></td>
                    </tr>
                    <tr>
                        <td>Integrate with authentication service</td>
                        <td>Connect the sign up process to an existing authentication service or identity provider...</td>
                        <td><span class="badge in-progress">In Progress</span></td>
                    </tr>
                    <tr>
                        <td>Integrate with authentication service</td>
                        <td>Connect the sign up process to an existing authentication service or identity provider...</td>
                        <td><span class="badge in-progress">In Progress</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>


    
</body>
</html>