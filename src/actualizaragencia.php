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

$sql="SELECT * FROM agencia WHERE id_agencia='$id'";
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
                    <form action="updateagencia.php" method="POST">

                                <input type="hidden" name="cod_estudiante" value="<?php echo $row['cod_estudiante']  ?>">

                                <input type="text" class="form-control mb-3" name="id_agencia" placeholder="Dni" value="<?php echo $row['id_agencia']  ?>">
                                <input type="text" class="form-control mb-3" name="cod_agencia" placeholder="Nombres" value="<?php echo $row['cod_agencia']  ?>">
                                <input type="text" class="form-control mb-3" name="agencia" placeholder="Apellidos" value="<?php echo $row['Agencia']  ?>">
                                <label><select  name="a">
<?php

                                      $con=$app_db;

                                      $sql1="SELECT *  FROM sector";
                                      $query1=mysqli_query($con,$sql1);
                                        $row1=mysqli_fetch_array($query);
                                  ?>
<?php
                                    foreach ($query1 as $opciones) {?>
                                        <option name="sect" placeholder="Seleccione sector" value="<?php echo $opciones['id_sector']?>"><?php echo $opciones['id_sector'].'-'.$opciones['sector'] ?></option>
<?php  }    ?>
                                                                                                                                                          >

    </label>

                                <input type="text" class="form-control mb-3" name="id_sector" placeholder="Codigo Sector" value="<?php echo $row['id_sector']." Sector Actual"  ?>">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>

                </div>
    </body>
</html>
