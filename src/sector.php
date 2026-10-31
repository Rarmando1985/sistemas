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

    $sql="SELECT *  FROM sector";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
            <div class="container mt-5">
                    <div class="row">

                        <div class="col-md-3">
                            <h3>Ingrese Sector/ Supervisor</h3>
                                <form action="insertarsector.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="id_sector" placeholder="Id Sector" width="10" readonly>
                                    <input type="text" class="form-control mb-3" name="sector" placeholder="Sector">
                                    <input type="text" class="form-control mb-3" name="id_supervisor" placeholder="Id Supervisor" width="10" >
                                    <input type="text" class="form-control mb-3" name="supervisor" placeholder="Supervisor">
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th></th>
                                        <th>ID_Sesctor</th>
                                        <th>Sector</th>
                                        <th>Id Supervisor</th>
                                        <th>Supervisor</th>
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
                                                <th><?php  echo $row['id_sector']?></th>
                                                <th><?php  echo $row['sector']?></th>
                                                <th><?php  echo $row['id_supervisor']?></th>
                                                <th><?php  echo $row['supervisor']?></th>
                                                <th><a href="actualizarsector.php?id= <?php echo $row['id_sector'] ?>"  class="btn btn-info">Editar</a></th>
                                                <th><a href="deletesector.php?id=<?php echo $row['id_sector'] ?>" class="btn btn-danger">Eliminar</a></th>
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
