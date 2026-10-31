
<?php

session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {

  if ($_SESSION['rol'] !=1){
    header('location: index.php');
  }
}
 ?>


<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>
<a href="logout.php">Cerrar sesion   <?php
  echo $_SESSION['rol'];
  echo $_SESSION['username'];
  ?></a>

<?php require( 'templates/footer.php' );?>
