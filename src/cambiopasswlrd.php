<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
  // code...
}
?>

<?php require( 'templates/header.php' ); ?>

<?php require( 'init.php' ); ?>

<?php

    $con=$app_db;

    $sql="SELECT *  FROM usuarios";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Cambio de password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
            <div class="container mt-5">
                    <div class="row">

                        <div class="col-md-3">
                            <h3>Cambio Contraseña</h3>
                                <form action="updatepassword.php" method="POST">
                                    Usuario: <input type="text" class="form-control mb-3" name="user" placeholder="u" value="<?php echo $_SESSION['username']  ?>" disabled>
                                  Password Anterior:  <input type="text" class="form-control mb-3" name="pa" placeholder="Password">
                                  Password nuevo:  <input type="text" class="form-control mb-3" name="pn" placeholder="Password">
                                  Confirmacion Password:    <input type="text" class="form-control mb-3" name="pn1" placeholder="Password">

                                    <input type="submit" class="btn btn-primary">

                                </form>





                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th></th>
                                        <th>Id</th>
                                        <th>Usuario</th>
                                        <th>password</th>
                                        <th>Rol</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th></th>
                                                <th><?php  echo $row['id']?></th>
                                                <th><?php  echo $row['username']?></th>
                                                <th><?php  echo $row['password']?></th>
                                                <th><?php  echo $row['rol_id']?></th>
                                                <th><a href="actualizarusuario.php?id= <?php echo $row['id'] ?>"  class="btn btn-info">Editar</a></th>
                                                <th><a href="deleteusuario.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </body>
</html>
