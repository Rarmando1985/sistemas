<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>
<?php

    $con=$app_db;
    $id_agencia=0;
    $cod_agencia=$_POST['cod_agencia'];
    $agencia=$_POST['agencia'];
    $id_sector=$_POST['a'];

    echo $id_agencia;
  echo   $cod_agencia;
  echo  $agencia;
  echo  $id_sector;


$sql="INSERT INTO agencia VALUES('$id_agencia','$cod_agencia','$agencia','$id_sector')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: agencias.php");

}else {
}
?>
