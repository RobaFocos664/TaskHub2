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

// Consulta para obtener el último código que empieza con "TT"
$sql = "SELECT codigo FROM tarea WHERE codigo LIKE 'TT%' ORDER BY codigo DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtiene el último código y extrae el número
    $row = $result->fetch_assoc();
    $lastCode = $row['codigo'];
    $number = (int)substr($lastCode, 2) + 1;  // Incrementa el número
} else {
    // Si no hay registros, comienza desde 1
    $number = 1;
}

// Genera el nuevo código con ceros iniciales y asegura que tenga 3 dígitos
$newCode = 'TT' . str_pad($number, 3, '0', STR_PAD_LEFT);

echo json_encode(['code' => $newCode]);

$conn->close();
?>
