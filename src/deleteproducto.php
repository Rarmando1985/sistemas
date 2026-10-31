<?php require( 'init.php' ); ?>
<?php
$con=$app_db;
$id_producto=$_GET['id'];
$sql="DELETE FROM productos WHERE id_producto='$id_producto'";
$query=mysqli_query($con,$sql);
    if($query){
        Header("Location: producto.php");
    }
?>
