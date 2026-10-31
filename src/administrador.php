<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
  // code...


  if ($_SESSION['rol'] !=1){
    header('location: login.php');
    // code...
  }
}
 ?>
<html lang="es">

<body>


Administrador


<br>
<a href="logout.php">Cerrar sesion</a>



</body>


</html>
