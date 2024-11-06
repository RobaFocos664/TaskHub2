<?php
// Configura la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taskhub"; // Cambia esto por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los usuarios
$sql = "SELECT numero, nombreUsuario FROM usuario"; // Cambia "usuarios" por el nombre real de tu tabla
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = ['id' => $row['numero'], 'nombre' => $row['nombreUsuario']];
    }
}

echo json_encode($users);

$conn->close();
?>
