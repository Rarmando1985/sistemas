<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>
<?php

    $con=$app_db;

$id_agencia=$_GET['id'];

$sql="DELETE FROM agencia  WHERE id_agencia='$id_agencia'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: agencias.php");
    }
?>
