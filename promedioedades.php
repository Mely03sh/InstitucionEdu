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

// Realiza la consulta para obtener los promedios de edades por grado
$query = "SELECT m.id_grado, AVG(e.edad) as promedio_edades
          FROM matricula m
          INNER JOIN estudiante e ON m.id_estudiante = e.id_estudiante
          GROUP BY m.id_grado";

$result = $conn->query($query);

if (!$result) {
    die("Error al realizar la consulta: " . $conn->error);
}

// Muestra el resultado en una tabla
echo "<h2>Listado de Grados con Promedio de Edades:</h2>";
echo "<table border='1'>";
echo "<tr><th>Grado</th><th>Promedio de Edades</th></tr>";

while ($row = $result->fetch_assoc()) {
    $id_grado = $row['id_grado'];
    $promedio_edades = $row['promedio_edades'];

    echo "<tr><td>Grado $id_grado</td><td>$promedio_edades</td></tr>";
}

echo "</table>";

// Cierra la conexión a la base de datos
$conn->close();
?>
