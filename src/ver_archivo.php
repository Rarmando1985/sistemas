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


 if (isset($_GET['archivo'])) {
     $archivo = ltrim($_GET['archivo']);
     $expediente = ltrim($_GET['expediente']);
     $directorio = 'Archivos/expedientes/'.$expediente; // Reemplaza con la ruta de la carpeta que deseas mostrar los archivos

     // Verificar que el archivo exista y sea accesible


           // Verificar que el archivo exista y sea accesible
           if (file_exists($directorio . '/' . $archivo)) {
               echo '<embed src="' . $directorio . '/'. $archivo . '" type="application/pdf" width="100%" height="600px" />';
           } else {
               echo "El archivo no existe o no es accesible.";
               echo $directorio;
echo $archivo;
           }

   }
   ?>

  <?php require( 'templates/footer.php' );?>
