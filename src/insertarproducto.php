<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>
<?php

    $con=$app_db;
    $id_producto=0;
    $producto=$_POST['producto'];


    echo $id_producto;
  echo   $producto;


$sql="INSERT INTO productos VALUES('$id_producto','$producto')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: producto.php");

}else {
}
?>
