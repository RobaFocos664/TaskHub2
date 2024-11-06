<?php
header(header: 'Content-Type: application/json'); // Asegúrate de que el tipo de contenido es JSON

// Establecer la conexión
$conn = new mysqli('localhost', 'root', '', 'taskhub');

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(['error' => 'Conexión fallida: ' . $conn->connect_error]));
}
$sql = "
    SELECT 
        subtarea.titulo, 
        subtarea.descripcion, 
        subtarea.tiempoEstimado, 
        subtarea.avance, 
        planificacion.fechaInicio 
    FROM subtarea
    JOIN planificacion ON subtarea.planificacion = planificacion.codigo
";
// Cambia esto si el nombre de la columna o las tablas son diferentes

$result = $conn->query($sql);


$subtareas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subtareas[] = $row; // Agregar cada fila a un array
    }
}

echo json_encode($subtareas);
 // Asegúrate de devolver un JSON válido
$conn->close(); // Cerrar la conexión
?>
