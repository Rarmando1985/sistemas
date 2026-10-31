<?php require( 'init.php' ); ?>
<?php
$con=$app_db;
$id_sector=$_GET['id'];
$sql="DELETE FROM sector  WHERE id_sector='$id_sector'";
$query=mysqli_query($con,$sql);
    if($query){
        Header("Location: sector.php");
    }
?>
