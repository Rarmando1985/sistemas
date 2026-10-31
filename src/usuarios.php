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
        <title> INGRESAR Usiario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
            <div class="container mt-5">
                    <div class="row">

                        <div class="col-md-3">
                            <h3>Ingrese Usuario</h3>
                                <form action="insertarusuario.php" method="POST">
                                    <input type="text" class="form-control mb-3" name="id" placeholder="Id usuarui"  disabled>
                                    <input type="text" class="form-control mb-3" name="username" placeholder="Usuario" >
                                    <input type="text" class="form-control mb-3" name="password" placeholder="Password">
                                    <input type="text" class="form-control mb-3" name="Codeigoempleado" placeholder="Codigo de Empleado">
                                    <input type="text" class="form-control mb-3" name="nombreusuario" placeholder="Nombre Colaborador">
                                    <input type="email" class="form-control mb-3" name="correo" placeholder="Correo">

                                    <label><select  name="sector">
                                      <?php

                                          $con=$app_db;
                                          $sql1="SELECT *  FROM sector";
                                          $query1=mysqli_query($con,$sql1);

                                      ?>
                                      <?php
                                        foreach ($query1 as $opciones) {?>
                                            <option  placeholder="Seleccione sector" value="<?php echo $opciones['id_sector']?>"><?php echo $opciones['id_sector'].'-'.$opciones['sector'] ?></option>
                                      <?php  }    ?>


                                    </label>

                                    <label><select  name="rol">
                                      <?php

                                      $con=$app_db;
                                      $sql2="SELECT *  FROM roles";
                                      $query2=mysqli_query($con,$sql2);

                                      ?>


                                    </label>




        <label><select  name="rol">
          <?php


          ?>
          <?php
            foreach ($query2 as $opciones) {?>
                <option  placeholder="Seleccione sector" value="<?php echo $opciones['id']?>"><?php echo $opciones['id'].'-'.$opciones['rol'] ?></option>
          <?php  }    ?>

        </label>
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
