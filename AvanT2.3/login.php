<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="left-section">
            <a href="index.php" class="back-link">Volver</a>
            <h1>Sign in to <br><span>TaskHub</span></h1>
            <div class="image-container">
                <img src="img/pngtree-task-list-png-image_5687735.png" alt="Rocket Image">
            </div>
        </div>
        <div class="right-section">
            <h2>Welcome to <span>TaskHub</span></h2>
            <h3>Sign in</h3>
            <form>
                <label for="username">Enter your username</label>
                <input type="text" id="username" placeholder="Username">
                
                <label for="password">Enter your Password</label>
                <input type="password" id="password" placeholder="Password">
                
                <a href="#" class="forgot-password">Forgot Password?</a>
                
                <button type="button" class="sign-in-button" onclick="location.href='Tasks.php';">Sign in</button>

            </form>
            <p class="welcome-text">Welcome!<br>We are a team that seeks to satisfy and improve the needs of our consumers through software and in this software you can have a management of your employees, work teams, tasks at your fingertips on a website.</p>
        </div>
    </div>
</body>
</html>
