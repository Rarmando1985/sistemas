<?php require( 'init.php' ); ?>
<?php

$con=$app_db;

$id=$_GET['id'];

$sql="DELETE FROM usuarios  WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: usuarios.php");
    }
?>
