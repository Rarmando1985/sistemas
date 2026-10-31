<?php require( 'init.php' ); ?>
<?php

    $con=$app_db;
    $id_agencia=0;
    $usernam=$_POST['username'];
    $password=$_POST['password'];
    $id_sector=$_POST['sector'];
    $id_rol=$_POST['rol'];
    $codigoempleado=$_POST['Codeigoempleado'];
    $nombrecolaborador=$_POST['nombreusuario'];
    $correo=$_POST['correo'];

$sql="INSERT INTO usuarios VALUES('$id_agencia','$usernam','$password','$id_rol','$codigoempleado','$nombrecolaborador','$correo','$id_sector')"  ;
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: usuarios.php");

}else {
}
?>
