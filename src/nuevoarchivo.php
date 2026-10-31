<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}
 ?>

<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>

<?php
//if (isset($_POST["submit"])) {
    $archivo = $_FILES["archivo"];
    $nombre_archivo = $archivo["name"];
    $archivo_temporal = $archivo["tmp_name"];
    $expediente=$_POST["expediente"];
    $comentarios1=$_POST["comentarios"];

    $carpeta_destino = 'Archivos/expedientes/'.$expediente;

    // Obtener la extensión del archivo
        $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

        // Definir las extensiones permitidas (pdf, imágenes)
        $extensiones_permitidas = array('pdf', 'jpg', 'jpeg', 'png', 'gif');

        // Verificar si la extensión del archivo está permitida
        if (!in_array($extension, $extensiones_permitidas)) {
            echo "Tipo de archivo no permitido. Solo se permiten archivos PDF e imágenes.";
        } else {
            $ruta_completa = $carpeta_destino . '/' . $nombre_archivo;

            if (file_exists($ruta_completa)) {
                echo "El archivo ya existe.";
            } else {
                move_uploaded_file($archivo_temporal, $ruta_completa);
                echo "Archivo subido correctamente.";

                $con=$app_db;


                  $id_comentario=0;
                $s=$expediente;

                date_default_timezone_set('America/Guatemala');

                $fac=date('Y-m-d H:i:s');

                $u=$_SESSION['username'];
                  $estado1="";
                  $comentarios="Se subio archivo ".$nombre_archivo." ".$comentarios1;
                  $sql="INSERT INTO comentarios VALUES('$id_comentario','$s','$u','$estado1','$comentarios' ,'$fac')";
                  $query= mysqli_query($con,$sql);

                  if($query){
                //      Header("Location: Fiduciario.php");

                  }else {
                  }


echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
            }
        }
    //}
    ?>
