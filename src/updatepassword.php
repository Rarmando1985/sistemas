<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
  // code...
}
?>
<?php require('init.php');
$con=$app_db;
    $username=$_SESSION['username'];
    $passwordn=$_POST['pn'];
      $passwordn1=$_POST['pn1'];
if($passwordn==$passwordn1) {
$sql="UPDATE usuarios SET  password='$passwordn1' WHERE username='$username'";
$query=mysqli_query($con,$sql);
  if($query){
      Header("Location: index.php");
  }
}
?>
