<?php
// Datos de conexión al servidor de base de datos
$user = "root";
$pass = "";
$host = "localhost";
$database = "iesanjuan";

// Conexión a la base de datos
$connection = mysqli_connect($host, $user, $pass);
if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_error());
}

// Selección de la base de datos
$db = mysqli_select_db($connection, $database);
if (!$db) {
    die("No se ha podido encontrar la tabla: " . mysqli_error());
}

// Recoger los datos del formulario del estudiante
$id_estudiante = $_POST['id_estudiante'];
$tipo_id = $_POST['tipo_id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$discapacidad = $_POST['discapacidad'];
$pais_origen = $_POST['pais_origen'];
$correo = $_POST['correo'];
$sisben = $_POST['sisben'];
$sector = $_POST['sector'];
$calendario = $_POST['calendario'];
$dane = $_POST['dane'];
$estado = $_POST['estado'];

// Recoger los datos del formulario del acudiente existente
$id_acudiente = $_POST['id_acudiente'];
$fecha_matricula = $_POST['fecha_matricula'];
// Recoger los datos del formulario de la sede
$id_sede = $_POST['id_sede'];
$nombre_sede = $_POST['nombre_sede'];
$direccion_sede = $_POST['direccion_sede'];

// Recoger los datos del formulario del grado y grupo
$id_grado = $_POST['id_grado'];
$id_grupo = $_POST['id_grupo'];

// Crear la consulta SQL de inserción para el estudiante
$instruccion_SQL = "INSERT INTO estudiante (id_estudiante, tipo_id, nombre, apellidos, fecha_n, direccion, discapacidad, pais_origen, correo, sisben, sector, calendario, dane, estado)
    VALUES ('$id_estudiante', '$tipo_id', '$nombre', '$apellidos','$fecha_nacimiento', '$direccion', '$discapacidad', '$pais_origen', '$correo', '$sisben', '$sector', '$calendario', '$dane', '$estado')";
$resultado_estudiante = mysqli_query($connection, $instruccion_SQL);
// Crear la consulta SQL de inserción para la sede
$instruccion_SQL = "INSERT INTO sede (id_sede, nombre, direccion) VALUES ('$id_sede', '$nombre_sede', '$direccion_sede')";
$resultado_sede = mysqli_query($connection, $instruccion_SQL);

// Crear la consulta SQL de inserción para el grado y grupo
$instruccion_SQL = "INSERT INTO grado_grupo (id_grado, id_grupo) VALUES ('$id_grado', '$id_grupo')";
$resultado_grado_grupo = mysqli_query($connection, $instruccion_SQL);

// Crear la consulta SQL de inserción para matricula
$instruccion_SQL = "INSERT INTO matricula (id_estudiante, id_grado, id_grupo, fecha_matricula) VALUES ('$id_estudiante', '$id_grado', '$id_grupo', '$fecha_matricula')";
$resultado_m = mysqli_query($connection,$instruccion_SQL);
// Verificar si las inserciones fueron exitosas
if ($resultado_sede && $resultado_grado_grupo) {
    echo "Sede y Grado-Grupo registrados exitosamente.";
} else {
    echo "Error al registrar Sede y Grado-Grupo: " . mysqli_error($connection);
}
// Verificar si la inserción del estudiante fue exitosa
if ($resultado_estudiante) {
    // Crear la consulta SQL de inserción para la relación estudiante-acudiente
    $instruccion_SQL = "INSERT INTO estudiante_acudiente (id_estudiante, id_acudiente, fecha) VALUES ('$id_estudiante', '$id_acudiente', '$fecha_matricula')";
    $resultado_relacion = mysqli_query($connection, $instruccion_SQL);

    if ($resultado_relacion) {
        echo "Estudiante registrado y relacionado con acudiente exitosamente.";
    } else {
        echo "Error al relacionar estudiante con acudiente: " . mysqli_error($connection);
    }
} else {
    echo "Error al registrar estudiante: " . mysqli_error($connection);
}

// Cerrar la conexión
mysqli_close($connection);
?>
