<?php
// Conectar a la base de datos (asegúrate de tener esta parte en tu código)
$conexion = mysqli_connect("localhost", "root", "", "iesanjuan");

// Verificar la conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Recoger los datos del formulario
$grado = $_POST['grado'];
$grupo = $_POST['grupo'];

// Consulta SQL para obtener la lista de estudiantes en el grado y grupo especificados
$consulta = "SELECT * FROM matricula 
            INNER JOIN estudiante ON matricula.id_estudiante = estudiante.id_estudiante
            WHERE matricula.id_grado = $grado AND matricula.id_grupo = '$grupo'";

$resultado = mysqli_query($conexion, $consulta);

// Mostrar los resultados en una tabla
echo "<h3>Estudiantes en el Grado $grado, Grupo $grupo:</h3>";
echo "<table border='1'>";
echo "<tr><th>ID Estudiante</th><th>Nombre</th><th>Apellidos</th></tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila['id_estudiante'] . "</td>";
    echo "<td>" . $fila['nombre'] . "</td>";
    echo "<td>" . $fila['apellidos'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Cerrar la conexión
mysqli_close($conexion);
?>

