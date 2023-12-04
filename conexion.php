

<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);
 // Recoger los datos del formulario
$id_estudiante = $_POST['id_estudiante'];
$tipo_id = $_POST['tipo_id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$direccion = $_POST['direccion'];
$discapacidad = $_POST['discapacidad'];
$pais_origen = $_POST['pais_origen'];
$correo = $_POST['correo'];
$sisben = $_POST['sisben'];
$sector = $_POST['sector'];
$calendario = $_POST['calendario'];
$dane = $_POST['dane'];
$estado = $_POST['estado'];

// guardamos los campos de acudiente
$id_acudiente = $_POST['id_acudiente'];
$tipo_id_acudiente = $_POST['tipo_id_acudiente']; // Corrected variable name
$nombres_acudiente = $_POST['nombres_acudiente']; // Corrected variable name
$apellidos_acudiente = $_POST['apellidos_acudiente']; // Corrected variable name
$celular_acudiente = $_POST['celular_acudiente'];
$correo_acudiente= $_POST['correo_acudiente'];
$direccion_acudiente= $_POST['direccion_acudiente'];
$parentesco_acudiente = $_POST['parentesco_acudiente'];

//datos de grado_grupo
$id_grado = $_POST['id_grado'];
$id_curso = $_POST['id_curso'];

//datos matricula
$fecha_matricula = $_POST['fecha_matricula'];

//datos de la sede
$id_sede = $_POST['id_sede'];
$nombre_sede = $_POST['nombre_sede'];
$direccion_sede = $_POST['direccion_sede'];




//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
        }
        //indicamos el nombre de la base datos
        $datab = "iesanjuan";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "<h3>Tabla seleccionada:</h3>" ;
        }
      
// Crear la consulta SQL de inserción para estudiante
 $instruccion_SQL = "INSERT INTO estudiante (id_estudiante, tipo_id, nombre, apellidos, fecha_n, edad, genero, direccion, discapacidad, pais_origen, correo, sisben, sector, calendario, dane, estado)
    VALUES ('$id_estudiante', '$tipo_id', '$nombre', '$apellidos','$fecha_nacimiento', '$edad','$genero','$direccion', '$discapacidad', '$pais_origen', '$correo', '$sisben', '$sector', '$calendario', '$dane', '$estado')";
$resultado = mysqli_query($connection,$instruccion_SQL);
// Crear la consulta SQL de inserción para acudiente
$instruccion_SQL = "INSERT INTO acudiente (id_acudiente,tipo_id,nombre,apellidos,n_celular,correo,direccion,parentesco)
    VALUES ('$id_acudiente', '$tipo_id_acudiente', '$nombres_acudiente', '$apellidos_acudiente', '$celular_acudiente', '$correo_acudiente','$direccion_acudiente', '$parentesco_acudiente')";
$resultado_a= mysqli_query($connection,$instruccion_SQL);
// Crear la consulta SQL de inserción para grado_grupo
$instruccion_SQL = "INSERT INTO grado_grupo (id_grado, id_grupo) VALUES ('$id_grado', '$id_curso')";

$resultado_gg = mysqli_query($connection,$instruccion_SQL);

// Crear la consulta SQL de inserción para matricula
$instruccion_SQL = "INSERT INTO matricula (id_estudiante, id_grado, id_grupo, fecha_matricula) VALUES ('$id_estudiante', '$id_grado', '$id_curso', '$fecha_matricula')";
$resultado_m = mysqli_query($connection,$instruccion_SQL);


// Crear la consulta SQL de inserción para sede
$instruccion_SQL = "INSERT INTO sede (id_sede, nombre, direccion) VALUES ('$id_sede', '$nombre_sede', '$direccion_sede')";

$resultado_ss = mysqli_query($connection,$instruccion_SQL);
$instruccion_SQL = "INSERT INTO estudiante_acudiente(id_estudiante, id_acudiente, fecha) VALUES ('$id_estudiante', '$id_acudiente', '$fecha_matricula')";

$resultado_ea = mysqli_query($connection,$instruccion_SQL);
$instruccion_SQL = "INSERT INTO estudiante_sede (id_estudiante,id_sede,fecha) VALUES ('$id_estudiante', '$id_sede', '$fecha_matricula')";

$resultado_es = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM estudiante";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}


echo "<table>";
echo "<tr>";
echo "<th><h1>id_estudiante</th></h1>";
echo "<th><h1>tipo_id</th></h1>";
echo "<th><h1>nombre</th></h1>";
echo "<th><h1>apellidos</th></h1>";
echo "<th><h1>fecha_n</th></h1>";
echo "<th><h1>direccion</th></h1>";
echo "<th><h1>discapaciadad</th></h1>";
echo "<th><h1>pais_origen</th></h1>";
echo "<th><h1>correo</th></h1>";
echo "<th><h1>sisben</th></h1>";
echo "<th><h1>sector</th></h1>";
echo "<th><h1>calendario</th></h1>";
echo "<th><h1>dane</th></h1>";
echo "<th><h1>estado</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
echo "<th><h2>" .$colum[id_estudiante]. "</th></h2>";
echo "<th><h2>" .$colum[tipo_id]. "</th></h2>";
echo "<th><h2>" .$colum[nombre]. "</th></h2>";
echo "<th><h2>" .$colum[apellidos]. "</th></h2>";
echo "<th><h2>" .$colum[fecha_n]. "</th></h2>";
echo "<th><h2>" .$colum[direccion]. "</th></h2>";
echo "<th><h2>" .$colum[discapaciadad]. "</th></h2>";
echo "<th><h2>" .$colum[pais_origen]. "</th></h2>";
echo "<th><h2>" .$colum[correo]. "</th></h2>";
echo "<th><h2>" .$colum[sisben]. "</th></h2>";
echo "<th><h2>" .$colum[sector]. "</th></h2>";
echo "<th><h2>" .$colum[calendario]. "</th></h2>";
echo "<th><h2>" .$colum[dane]. "</th></h2>";
echo "<th><h2>" .$colum[estado]. "</th></h2>";


    echo "</tr>";
}
echo "</table>";




mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="index.html"> Volver Atrás</a>';


?>

