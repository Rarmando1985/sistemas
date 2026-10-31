

<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>
<?php

    $con=$app_db;


$id_agencia=$_POST['id_agencia'];
$cod_agencia=$_POST['cod_agencia'];
$agencia=$_POST['agencia'];
$id_sector=$_POST['id_sector'];

echo $id_agencia;
echo $cod_agencia;
echo $agencia;
echo $id_sector;

$sql="UPDATE agencia SET  agencia='$agencia', cod_agencia='$cod_agencia', id_sector='$id_sector' WHERE id_agencia='$id_agencia'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: agencias.php");
    }else {
      echo "error";
    }
?>
