<?php
// Configura la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taskhub";  // Cambia esto por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los equipos
$sql = "SELECT numero, nombre FROM equipo";
$result = $conn->query($sql);

$teams = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $teams[] = ['id' => $row['numero'], 'nombre' => $row['nombre']];
    }
}

echo json_encode($teams);

$conn->close();
?>
