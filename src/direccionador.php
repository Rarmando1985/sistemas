<?php require( 'init.php' ); ?>
<?php
    $id=$_POST['a'];
    $con=$app_db;
    $sql="SELECT * FROM productos WHERE id_producto='$id'";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);

$producto = $row['producto']
?>
<?php
header('location:'. $producto.'.php');
?>
