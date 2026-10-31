<?php require( 'init.php' ); ?>
<?php
    $con=$app_db;
    $id_sector="0";
    $sector=$_POST['sector'];
    $id_supervisor=$_POST['id_supervisor'];
    $supervisor=$_POST['supervisor'];

$sql="INSERT INTO sector VALUES('$id_sector','$sector','$id_supervisor','$supervisor')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: sector.php");
}else {
}
?>
