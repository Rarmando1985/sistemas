<?php require( 'init.php' ); ?>
<?php
$con=$app_db;

$id=$_POST['id'];
$usernam=$_POST['username'];
$password=$_POST['password'];
$id_rol=$_POST['rol'];
$codigoempleado=$_POST['codeigoempleado'];
$nombrecolaborador=$_POST['nombreusuario'];
$correo=$_POST['correo'];

$sql="UPDATE usuarios SET  username='$usernam', password='$password', rol_id='$id_rol', codigoempleado='$codigoempleado', nombrecolaborador='$nombrecolaborador', correo='$correo' WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: usuarios.php");
    }

?>
