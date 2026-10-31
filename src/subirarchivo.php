<?php require( 'templates/header.php' ); ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
	// code...
}else {

}
 ?>

<?php require( 'init.php' ); ?>

<?php
//

  $nsolicitud = $_get["expediente"];
//Creacion de carpeta y subir archivo

$micarpeta = 'Archivos/expedientes/'.$nsolicitud;
if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}

if (isset($_POST['upload'])) {

    $archivo = $_FILES['archivo']['name'];

    //si el campo archivo no viene vacio
    if ($archivo != "") {
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];

        //Realizamos algunas comprobaciones antes de realizar la subida
        //En este caso solo queremos subir imágenes tipo: gif, jpg, jpeg, png y de un tamaño máximo de 2000000 bytes
        if (!((strpos($tipo, "gif") || strpos($tipo, "pdf") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            echo 'Error al subir el fichero.';
        }
        else {
            $directorio = 'Archivos/expedientes/'.$nsolicitud.'/';
            //si el archivo no existe
            if (!file_exists($directorio.$archivo)) {
               //Mover el archivo al directorio creado o ya existente
               if (move_uploaded_file($temp, $directorio.$archivo)) {
                    //cambiamos los permisos del fichero
                    chmod($directorio.$archivo, 0777);
$con=$app_db;
                    //echo 'Se ha subido correctamente el fichero '.$archivo;
               }
            }
        }
    }
    else {
        echo 'Error al subir el fichero.';
    }
}
 ?>
