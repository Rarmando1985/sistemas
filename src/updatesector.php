<?php require( 'init.php' ); ?>
<?php
$con=$app_db;
$id_sector=$_POST['id_sector'];
$sector=$_POST['sector'];
$id_supervisor=$_POST['id_supervisor'];
$supervisor=$_POST['supervisor'];
$sql="UPDATE sector SET  id_sector='$id_sector',sector='$sector',id_supervisor='$id_supervisor',supervisor='$supervisor' WHERE id_sector='$id_sector'";
$query=mysqli_query($con,$sql);
    if($query){
        Header("Location: sector.php");
    }
?>
