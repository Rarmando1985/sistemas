<?php require( 'init.php' ); ?>
<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
  // code...
}
?>
<?php

    $con=$app_db;

    $sql="SELECT *  FROM agencia";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
?>
<?php require( 'templates/header.php' ); ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title> INGRESAR AGENCIA</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body background= "">
            <div class="container mt-5">
                    <div class="row">

                        <div class="col-md-3">
                            <h3>Ingrese Agencias</h3>
                                <form action="insertaragencia.php" method="POST">
                                    <input type="text" class="form-control mb-3" name="id_agencia" placeholder="Id agencia"  disabled>
                                    <input type="text" class="form-control mb-3" name="cod_agencia" placeholder="Codigo Agencia" >
                                    <input type="text" class="form-control mb-3" name="agencia" placeholder="Agencia">
                                    <label><select  name="a">
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
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th></th>
                                        <th>Id_agencia</th>
                                        <th>Codigo Agencia</th>
                                        <th>Agencia</th>
                                        <th>Id Sector</th>
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
                                                <th><?php  echo $row['id_agencia']?></th>
                                                <th><?php  echo $row['cod_agencia']?></th>
                                                <th><?php  echo $row['Agencia']?></th>
                                                <th><?php  echo $row['id_sector']?></th>
                                                <th><a href="actualizaragencia.php?id= <?php echo $row['id_agencia'] ?>"  class="btn btn-info">Editar</a></th>
                                                <th><a href="deleteagencia.php?id=<?php echo $row['id_agencia'] ?>" class="btn btn-danger">Eliminar</a></th>
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
<?php require( 'templates/footer.php' );?>
