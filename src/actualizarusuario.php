<?php

session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}
 ?>
<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>
<?php

    $con=$app_db;

$id=$_GET['id'];

$sql="SELECT * FROM usuarios WHERE id='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Actualizar</title>
        <link href="assets/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
                <div class="container mt-5">
                    <form action="updateusuarios.php" method="POST">


                                <input type="text" class="form-control mb-3" name="id" placeholder="Id" value="<?php echo $row['id']  ?>"  readonly>
                                <input type="text" class="form-control mb-3" name="username" placeholder="Nombre usuario" value="<?php echo $row['username']  ?>">
                                <input type="text" class="form-control mb-3" name="password" placeholder="Password" value="<?php echo $row['password']  ?>">
                                <input type="text" class="form-control mb-3" name="codeigoempleado" placeholder="Codigo de Empleado">
                                <input type="text" class="form-control mb-3" name="nombreusuario" placeholder="Nombre Colaborador">
                                <input type="email" class="form-control mb-3" name="correo" placeholder="Correo">

                                <label><select  name="rol">
                                  <?php

                                      $con=$app_db;
                                      $sql1="SELECT *  FROM roles";
                                      $query1=mysqli_query($con,$sql1);

                                  ?>
                                  <?php
                                    foreach ($query1 as $opciones) {?>
                                        <option  placeholder="Seleccione sector" value="<?php echo $opciones['id']?>"><?php echo $opciones['id'].'-'.$opciones['rol'] ?></option>
                                  <?php  }    ?>


                                </label>




                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>

                </div>
    </body>
</html>
