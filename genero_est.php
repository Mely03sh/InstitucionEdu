<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iesanjuan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realiza la consulta para obtener el total de estudiantes por sexo en cada grado
$query = "SELECT m.id_grado, e.genero, COUNT(*) as total_estudiantes
          FROM matricula m
          INNER JOIN estudiante e ON m.id_estudiante = e.id_estudiante
          GROUP BY m.id_grado, e.genero";

$result = $conn->query($query);

if (!$result) {
    die("Error al realizar la consulta: " . $conn->error);
}

// Muestra el resultado en una tabla
echo "<h2>Total de Estudiantes por Sexo y Grado:</h2>";
echo "<table border='1'>";
echo "<tr><th>Grado</th><th>Sexo</th><th>Total de Estudiantes</th></tr>";

while ($row = $result->fetch_assoc()) {
    $id_grado = $row['id_grado'];
    $sexo = $row['genero'];
    $total_estudiantes = $row['total_estudiantes'];

    echo "<tr><td>Grado $id_grado</td><td>$sexo</td><td>$total_estudiantes</td></tr>";
}

echo "</table>";

// Cierra la conexión a la base de datos
$conn->close();
?>
