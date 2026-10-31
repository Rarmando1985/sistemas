<?php

session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
  // code...


  if ($_SESSION['rol'] !=2){
    header('location: index.php');
    // code...
  }
}
 ?>
<html lang="es">

<body>


Colaborador
<br>
<a href="logout.php">Cerrar sesion</a>



</body>


</html>


<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>

<?php require( 'templates/footer.php' );
