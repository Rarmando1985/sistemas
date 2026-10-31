<!DOCTYPE html>

<?php

session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
  // code...


  if ($_SESSION['rol'] !=2){
    header('location: login.php');
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
