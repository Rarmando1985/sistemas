<?php require( 'init.php' ); ?>
<?php
$con=$app_db;
$id_producto=$_POST['id_producto'];
$producto=$_POST['producto'];
$sql="UPDATE productos SET  id_producto='$id_producto', producto='$producto' WHERE id_producto='$id_producto'";
$query=mysqli_query($con,$sql);
    if($query){
        Header("Location: producto.php");
    }else {
      echo "error";
    }
?>
