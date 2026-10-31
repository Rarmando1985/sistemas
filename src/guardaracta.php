<?php
session_start();
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 5 && $_SESSION['rol'] != 2)) {
  exit();
}

require('templates/header.php');
require('init.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = $app_db;
    if (!$con) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }
$acta = $_POST['acta'];
$date = $_POST['date'];
$punto=$_POST['punto'];
$estado="Comite";
    // Escapar el valor de la variable acta para evitar inyección de SQL
    $acta = mysqli_real_escape_string($con, $acta);

    // Recorrer las solicitudes seleccionadas y actualizar el campo "acta" en la base de datos
    if (isset($_POST['solicitudes']) && is_array($_POST['solicitudes'])) {
        foreach ($_POST['solicitudes'] as $solicitud) {
            $solicitud = mysqli_real_escape_string($con, $solicitud);
            // Actualizar el campo "acta" en la base de datos para la solicitud correspondiente
            $sql = "UPDATE solicitudes SET acta = '$acta', fechacomite = '$date', punto = '$punto', estado= '$estado' WHERE solicitud = '$solicitud'";
            mysqli_query($con, $sql);

            $id_comentario=0;
            $s=trim($solicitud);
            date_default_timezone_set('America/Guatemala');
            $fac=date('Y-m-d H:i:s');
            $u=$_SESSION['username'];
            $comentarios="";
            $estado1='Comite';
            $sql1="INSERT INTO comentarios VALUES('$id_comentario','$s','$u','$estado1','$comentarios' ,'$fac')";
              $query= mysqli_query($con,$sql1);

           $sql="UPDATE solicitudes SET  estado='$estado1' WHERE solicitud=$solicitud";
           $query=mysqli_query($con,$sql);

        }
    }

}
    mysqli_close($con);

?>


<?php require( 'templates/footer.php' );?>
