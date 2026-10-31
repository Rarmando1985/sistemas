<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}
?>
<?php require( 'init.php' ); ?>
<?php
$u=$_SESSION['username'];
$expediente = $_GET["expediente"];
$con=$app_db;
$vo=$_POST['submit'];
$comentarios=$_POST['comentarios'];
$id_comentario=0;
$s=trim($expediente);
date_default_timezone_set('America/Guatemala');
$fac=date('Y-m-d H:i:s');
$estado1=$vo;
$sql="INSERT INTO comentarios VALUES('$id_comentario','$s','$u','$estado1','$comentarios' ,'$fac')";
$query= mysqli_query($con,$sql);
$sql="UPDATE solicitudes SET  estado='$estado1' WHERE solicitud=$expediente";
$query=mysqli_query($con,$sql);




if($estado1=='Autorizado'){
Header("Location: resolucion.php?expediente=". ltrim($expediente));
}else {
  Header("Location: bandejaanalista.php");

}
?>
<head>
  <title>Tipo de  Ampliacion</title>
</head>
<body>
    </select>
    <br><br>
    <input type="submit" value="Enviar">
  </form>
</body>
</html>
