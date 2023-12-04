<?php
// Validar datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

// Conectar a la base de datos
$connection = mysqli_connect($host, $user, $pass);

// Verificar la conexión a la base de datos
if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_error($connection));
}

// Seleccionar la base de datos
$datab = "iesanjuan";
$db = mysqli_select_db($connection, $datab);

// Verificar si la base de datos se seleccionó correctamente
if (!$db) {
    die("No se ha podido encontrar la Tabla: " . mysqli_error($connection));
}

// Recoger el ID de la consulta desde el formulario
$id_consulta = $_POST['id_consulta'];

// Consulta SQL para obtener la información del estudiante
$consulta_estudiante = "SELECT * FROM estudiante WHERE id_estudiante = '$id_consulta'";
$resultado_estudiante = mysqli_query($connection, $consulta_estudiante);

// Consulta SQL para obtener la información del acudiente
$consulta_acudiente = "SELECT * FROM acudiente WHERE id_acudiente = '$id_consulta'";
$resultado_acudiente = mysqli_query($connection, $consulta_acudiente);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado_estudiante) > 0) {
    $estudiante = mysqli_fetch_assoc($resultado_estudiante);
    echo "<h2>Información del Estudiante</h2>";
    echo "<p>ID Estudiante: " . $estudiante['id_estudiante'] . "</p>";
    echo "<p>Nombre: " . $estudiante['nombre'] . " " . $estudiante['apellidos'] . "</p>";
   
    // Continuar con los demás campos que desees mostrar
} elseif (mysqli_num_rows($resultado_acudiente) > 0) {
    $acudiente = mysqli_fetch_assoc($resultado_acudiente);
    echo "<h2>Información del Acudiente</h2>";
    echo "<p>ID Acudiente: " . $acudiente['id_acudiente'] . "</p>";
    echo "<p>Nombre: " . $acudiente['nombre'] . " " . $acudiente['apellidos'] . "</p>";
    echo "<p>Nro Celular: " . $acudiente['n_celular'] . "</p>";
    echo "<p>Direccion: " . $acudiente['direccion'] . "</p>";
    // Continuar con los demás campos que desees mostrar para el acudiente
} else {
    echo "<p>No se encontraron registros para el ID $id_consulta en la base de datos.</p>";
}

// Cerrar la conexión a la base de datos
mysqli_close($connection);
?>
